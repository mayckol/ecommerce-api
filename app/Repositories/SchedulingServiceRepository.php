<?php

namespace App\Repositories;

use App\Models\SchedulingService;
use Prettus\Repository\Eloquent\BaseRepository;

class SchedulingServiceRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return SchedulingService::class;
    }
}
