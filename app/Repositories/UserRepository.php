<?php

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return User::class;
    }
}
