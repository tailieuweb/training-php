<?php

namespace Botble\CustomField\Actions;

use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Botble\CustomField\Repositories\Interfaces\FieldItemInterface;

class ExportCustomFieldsAction extends AbstractAction
{
    /**
     * @var FieldGroupInterface
     */
    protected $fieldGroupRepository;

    /**
     * @var FieldItemInterface
     */
    protected $fieldItemRepository;

    /**
     * ExportCustomFieldsAction constructor.
     * @param FieldGroupInterface $fieldGroupRepository
     * @param FieldItemInterface $fieldItemRepository
     */
    public function __construct(FieldGroupInterface $fieldGroupRepository, FieldItemInterface $fieldItemRepository)
    {
        $this->fieldGroupRepository = $fieldGroupRepository;

        $this->fieldItemRepository = $fieldItemRepository;
    }

    /**
     * @param array $fieldGroupIds
     * @return array
     */
    public function run(array $fieldGroupIds)
    {
        if (!$fieldGroupIds) {
            $fieldGroups = $this->fieldGroupRepository
                ->allBy([], [], ['id', 'title', 'status', 'order', 'rules'])
                ->toArray();
        } else {
            $fieldGroups = $this->fieldGroupRepository
                ->allBy([
                    ['id', 'IN', $fieldGroupIds],
                ], [], ['id', 'title', 'status', 'order', 'rules'])
                ->toArray();
        }

        foreach ($fieldGroups as &$fieldGroup) {
            $fieldGroup['items'] = $this->getFieldItems($fieldGroup['id']);
        }

        return $this->success(null, $fieldGroups);
    }

    /**
     * @param int $fieldGroupId
     * @param null|int $parentId
     * @return array
     */
    protected function getFieldItems($fieldGroupId, $parentId = null)
    {
        $fieldItems = $this->fieldItemRepository
            ->allBy([
                'field_group_id' => $fieldGroupId,
                'parent_id'      => $parentId,
            ])
            ->toArray();

        foreach ($fieldItems as &$fieldItem) {
            $fieldItem['children'] = $this->getFieldItems($fieldGroupId, $fieldItem['id']);
        }

        return $fieldItems;
    }
}
