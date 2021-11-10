<?php

namespace App\Repositories;

use App\Models\Service;
use Prettus\Repository\Eloquent\BaseRepository;

class ServiceRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return Service::class;
    }
}
