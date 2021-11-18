<?php

namespace Botble\CustomField\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Eloquent;
use Exception;
use Illuminate\Support\Collection;

interface FieldGroupInterface extends RepositoryInterface
{
    /**
     * @param array $condition
     * @return Collection
     */
    public function getFieldGroups(array $condition = []);

    /**
     * @param array $data
     * @return int|Eloquent
     */
    public function createFieldGroup(array $data);

    /**
     * @param int|null $id
     * @param array $data
     * @return int
     * @throws Exception
     */
    public function createOrUpdateFieldGroup($id, array $data);

    /**
     * @param int|null $id
     * @param array $data
     * @return int|Eloquent
     * @throws Exception
     */
    public function updateFieldGroup($id, array $data);

    /**
     * @param int $groupId
     * @param null $parentId
     * @param bool $withValue
     * @param null $morphClass
     * @param null $morphId
     * @return array
     */
    public function getFieldGroupItems(
        $groupId,
        $parentId = null,
        $withValue = false,
        $morphClass = null,
        $morphId = null
    );
}
