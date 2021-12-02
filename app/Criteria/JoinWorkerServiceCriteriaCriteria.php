<?php

namespace App\Criteria;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class JoinWorkerServiceCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class JoinWorkerServiceCriteriaCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model
            ->select(['feedstocks.*', 'worker_services.*'])
            ->join('worker_services', 'feedstocks.worker_service_id', '=', 'worker_services.id')
            ->join('users', 'worker_services.worker_id', '=', 'users.id')
            ->where(['users.id' => Auth::user()->id]);
    }
}
