<?php

namespace App\Repositories;

use App\Models\WorkerService;
use Prettus\Repository\Eloquent\BaseRepository;

class WorkerServiceRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return WorkerService::class;
    }
}
