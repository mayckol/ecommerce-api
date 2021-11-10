<?php

namespace App\Repositories;

use App\Models\Role;
use Prettus\Repository\Eloquent\BaseRepository;

class RoleRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return Role::class;
    }
}
