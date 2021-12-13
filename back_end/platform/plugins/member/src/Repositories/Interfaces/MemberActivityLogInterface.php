<?php

namespace Botble\Member\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface MemberActivityLogInterface extends RepositoryInterface
{
    /**
     * @param $memberId
     * @param int $paginate
     * @return Collection
     */
    public function getAllLogs($memberId, $paginate = 10);
}
