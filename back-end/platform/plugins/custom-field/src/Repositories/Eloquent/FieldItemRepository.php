<?php

namespace Botble\CustomField\Repositories\Eloquent;

use Botble\CustomField\Repositories\Interfaces\FieldItemInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;

class FieldItemRepository extends RepositoriesAbstract implements FieldItemInterface
{

    /**
     * {@inheritDoc}
     */
    public function deleteFieldItem($id)
    {
        return $this->model->whereIn('id', (array)$id)->delete();
    }

    /**
     * {@inheritDoc}
     */
    public function getGroupItems($groupId, $parentId = null)
    {
        return $this->model
            ->where([
                'field_group_id' => $groupId,
                'parent_id'      => $parentId,
            ])
            ->orderBy('order', 'ASC')
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function updateWithUniqueSlug($id, array $data)
    {
        $data['slug'] = $this->makeUniqueSlug($id, $data['parent_id'], $data['slug'], $data['position']);

        return $this->createOrUpdate($data, compact('id'));
    }

    /**
     * @param int $id
     * @param int $parentId
     * @param string $slug
     * @return string
     */
    protected function makeUniqueSlug($id, $parentId, $slug, $position)
    {
        $isExist = $this->getFirstBy([
            'slug'      => $slug,
            'parent_id' => $parentId,
        ]);

        if ($isExist && (int)$id != (int)$isExist->id) {
            return $slug . '_' . time() . $position;
        }

        return $slug;
    }
}
