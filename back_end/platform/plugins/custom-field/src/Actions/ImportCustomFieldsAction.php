<?php

namespace Botble\CustomField\Actions;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Botble\CustomField\Repositories\Interfaces\FieldItemInterface;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Validator;

class ImportCustomFieldsAction extends AbstractAction
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
     * ImportCustomFieldsAction constructor.
     * @param FieldGroupInterface $fieldGroupRepository
     * @param FieldItemInterface $fieldItemRepository
     */
    public function __construct(FieldGroupInterface $fieldGroupRepository, FieldItemInterface $fieldItemRepository)
    {
        $this->fieldGroupRepository = $fieldGroupRepository;
        $this->fieldItemRepository = $fieldItemRepository;
    }

    /**
     * @param array $fieldGroupsData
     * @return array
     * @throws Exception
     */
    public function run(array $fieldGroupsData)
    {
        DB::beginTransaction();

        foreach ($fieldGroupsData as $fieldGroup) {
            if (!is_array($fieldGroup)) {
                continue;
            }

            $validator = Validator::make($fieldGroup, [
                'order'  => 'integer|min:0|required',
                'rules'  => 'json|required',
                'title'  => 'required|max:255',
                'status' => ['required', Rule::in(BaseStatusEnum::values())],
            ]);

            if ($validator->fails()) {
                DB::rollBack();
                return $this->error($validator->messages()->first());
            }

            $fieldGroup['created_by'] = Auth::id();
            $item = $this->fieldGroupRepository->create($fieldGroup);
            if (!$item) {
                DB::rollBack();
                return $this->error();
            }
            $createItems = $this->createFieldItem(Arr::get($fieldGroup, 'items', []), $item->id);
            if ($createItems['error']) {
                DB::rollBack();
                return $this->error($createItems['message']);
            }
        }

        DB::commit();

        return $this->success();
    }

    /**
     * @param array $items
     * @param int $fieldGroupId
     * @param null|int $parentId
     * @return bool[]
     */
    protected function createFieldItem(array $items, $fieldGroupId, $parentId = null): array
    {
        foreach ($items as $item) {

            $validator = Validator::make($item, [
                'order' => 'integer|min:0|required',
                'title' => 'required|max:255',
                'slug'  => 'required|max:255',
                'type'  => 'required|max:100',
            ]);

            if ($validator->fails()) {
                return [
                    'error'   => true,
                    'message' => $validator->messages()->first(),

                ];
            }

            $item['field_group_id'] = $fieldGroupId;
            $item['parent_id'] = $parentId;
            $item['created_by'] = Auth::id();
            $field = $this->fieldItemRepository->create($item);

            if (!$field) {
                return [
                    'error'   => true,
                    'message' => null,
                ];
            }

            $createChildren = $this->createFieldItem(Arr::get($item, 'children', []), $fieldGroupId, $field->id);

            if (!$createChildren) {
                return [
                    'error'   => true,
                    'message' => null,
                ];
            }
        }

        return [
            'error' => false,
        ];
    }
}
