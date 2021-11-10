<?php

namespace App\Repositories;

use App\Models\Rating;
use Prettus\Repository\Eloquent\BaseRepository;

class RatingRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return Rating::class;
    }
}
