<?php

namespace Botble\CustomField\Repositories\Eloquent;

use Botble\CustomField\Models\FieldItem;
use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Botble\CustomField\Repositories\Interfaces\CustomFieldInterface;
use Botble\CustomField\Repositories\Interfaces\FieldItemInterface;
use Illuminate\Support\Str;
use RvMedia;

class FieldGroupRepository extends RepositoriesAbstract implements FieldGroupInterface
{
    /**
     * @var FieldItemRepository
     */
    protected $fieldItemRepository;

    /**
     * @var CustomFieldRepository
     */
    protected $customFieldRepository;

    /**
     * FieldGroupRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);

        $this->fieldItemRepository = app(FieldItemInterface::class);
        $this->customFieldRepository = app(CustomFieldInterface::class);
    }

    /**
     * {@inheritDoc}
     */
    public function getFieldGroups(array $condition = [])
    {
        return $this->model
            ->where($condition)
            ->orderBy('order', 'ASC')
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getFieldGroupItems(
        $groupId,
        $parentId = null,
        $withValue = false,
        $morphClass = null,
        $morphId = null
    ) {
        $result = [];

        $fieldItems = $this->fieldItemRepository->getGroupItems($groupId, $parentId);

        foreach ($fieldItems as $row) {
            $item = [
                'id'           => $row->id,
                'title'        => $row->title,
                'slug'         => $row->slug,
                'instructions' => $row->instructions,
                'type'         => $row->type,
                'options'      => json_decode($row->options),
                'items'        => $this->getFieldGroupItems($groupId, $row->id, $withValue, $morphClass, $morphId),
            ];
            if ($withValue === true) {
                if ($row->type === 'repeater') {
                    $item['value'] = $this->getRepeaterValue($item['items'],
                        $this->getFieldItemValue($row, $morphClass, $morphId)
                    );

                    if (!is_array($item['value'])) {
                        continue;
                    }

                    foreach ($item['value'] as $child) {
                        $this->getRepeaterValues($item['value']);
                    }

                } else {
                    $item['value'] = $this->getFieldItemValue($row, $morphClass, $morphId);
                }

                if ($row->type == 'image' && !empty($item['value'])) {
                    $item['thumb'] = RvMedia::getImageUrl($item['value'], 'thumb');
                }

                if ($row->type == 'file' && !empty($item['value'])) {
                    $item['full_url'] = RvMedia::url($item['value']);
                }
            }

            $result[] = $item;
        }

        return $result;
    }

    /**
     * @param array $items
     */
    protected function getRepeaterValues(array &$items): array
    {
        foreach ($items as &$child) {
            foreach ($child as &$item) {
                if ($item['type'] == 'repeater') {
                    $this->getRepeaterValues($item['value']);
                }

                if ($item['type'] == 'image') {
                    $item['thumb'] = RvMedia::getImageUrl($item['value'], 'thumb');
                }

                if ($item['type'] == 'file') {
                    $item['full_url'] = RvMedia::url($item['value']);
                }
            }
        }

        return $items;
    }

    /**
     * @param array $items
     * @param array|string $data
     * @return array|string
     */
    protected function getRepeaterValue($items, $data)
    {
        if (!$items) {
            return null;
        }

        $data = $data ?: [];
        if (!is_array($data)) {
            $data = json_decode((string)$data, true);
        }

        $result = [];
        foreach ($data as $key => $row) {
            $cloned = $items;
            foreach ($cloned as $keyItem => $item) {
                foreach ($row as $currentData) {
                    if ((int)$item['id'] !== (int)$currentData['field_item_id']) {
                        continue;
                    }

                    if ($item['type'] === 'repeater') {
                        $item['value'] = $this->getRepeaterValue($item['items'], $currentData['value']);
                    } else {
                        $item['value'] = $currentData['value'];
                    }

                    $cloned[$keyItem] = $item;
                }
            }
            $result[$key] = $cloned;
        }

        return $result;
    }

    /**
     * @param FieldItem $fieldItem
     * @param string $morphClass
     * @param int $morphId
     * @return Eloquent|mixed
     */
    protected function getFieldItemValue($fieldItem, $morphClass, $morphId)
    {
        if (is_object($morphClass)) {
            $morphClass = get_class($morphClass);
        }

        $field = $this->customFieldRepository->getFirstBy([
            'use_for'       => $morphClass,
            'use_for_id'    => $morphId,
            'slug'          => $fieldItem->slug,
            'field_item_id' => $fieldItem->id,
        ]);

        return ($field) ? $field->value : null;
    }

    /**
     * {@inheritDoc}
     */
    public function createFieldGroup(array $data)
    {
        $result = $this->create($data);

        if ($result) {
            if (Arr::get($data, 'group_items')) {
                $this->editGroupItems(json_decode((string)$data['group_items'], true), $result->id);
            }
        }

        return $result;
    }

    /**
     * @param array $items
     * @param int $groupId
     * @param int|null|Eloquent $parentId
     */
    protected function editGroupItems(array $items, $groupId, $parentId = null)
    {
        $position = 0;
        foreach ($items as $row) {
            $position++;

            $id = $row['id'];

            $data = [
                'field_group_id' => $groupId,
                'parent_id'      => $parentId,
                'title'          => $row['title'],
                'order'          => $position,
                'type'           => $row['type'],
                'options'        => json_encode($row['options']),
                'instructions'   => $row['instructions'],
                'slug'           => Str::slug($row['slug'], '_') ?: Str::slug($row['title'], '_'),
                'position'       => $position,
            ];

            $result = $this->fieldItemRepository->updateWithUniqueSlug($id, $data);

            if ($result) {

                $this->editGroupItems($row['items'], $groupId, $result->id);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function createOrUpdateFieldGroup($id, array $data)
    {
        $result = $this->createOrUpdate($data, compact('id'));

        if ($result) {
            if (Arr::get($data, 'deleted_items')) {
                $this->fieldItemRepository->deleteFieldItem(json_decode((string)$data['deleted_items'], true));
            }

            if (Arr::get($data, 'group_items')) {
                $this->editGroupItems(json_decode((string)$data['group_items'], true), $result->id);
            }
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function updateFieldGroup($id, array $data)
    {
        $result = $this->createOrUpdate($data, compact('id'));

        if ($result) {
            if (Arr::get($data, 'deleted_items')) {
                $this->fieldItemRepository->deleteFieldItem(json_decode((string)$data['deleted_items'], true));
            }

            if (Arr::get($data, 'group_items')) {
                $this->editGroupItems(json_decode((string)$data['group_items'], true), $result->id);
            }
        }

        return $result;
    }
}
