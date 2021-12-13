<?php

namespace Botble\CustomField\Repositories\Caches;

use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Botble\Support\Repositories\Caches\CacheAbstractDecorator;

class FieldGroupCacheDecorator extends CacheAbstractDecorator implements FieldGroupInterface
{
    /**
     * {@inheritDoc}
     */
    public function getFieldGroups(array $condition = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function createFieldGroup(array $data)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function createOrUpdateFieldGroup($id, array $data)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function updateFieldGroup($id, array $data)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
