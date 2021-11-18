<?php

namespace Botble\CustomField\Actions;

use Botble\Base\Events\DeletedContentEvent;
use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Exception;

class DeleteCustomFieldAction extends AbstractAction
{
    /**
     * @var FieldGroupInterface
     */
    protected $fieldGroupRepository;

    /**
     * DeleteCustomFieldAction constructor.
     * @param FieldGroupInterface $fieldGroupRepository
     */
    public function __construct(FieldGroupInterface $fieldGroupRepository)
    {
        $this->fieldGroupRepository = $fieldGroupRepository;
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function run($id)
    {
        $fieldGroup = $this->fieldGroupRepository->findOrFail($id);
        $result = $this->fieldGroupRepository->delete($fieldGroup);

        event(new DeletedContentEvent(CUSTOM_FIELD_MODULE_SCREEN_NAME, request(), $fieldGroup));

        if (!$result) {
            return $this->error();
        }

        return $this->success(null, [
            'id' => $result,
        ]);
    }
}
