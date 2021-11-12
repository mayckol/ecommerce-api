<?php

namespace App\Repositories;

use App\Models\UserRoles;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRolesRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return UserRoles::class;
    }
}
