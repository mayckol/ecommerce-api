<?php

namespace App\Repositories;

use App\Models\Feedstock;
use Prettus\Repository\Eloquent\BaseRepository;

class FeedstockRepository extends BaseRepository {

    public function boot(){}

    function model(){
       return Feedstock::class;
    }
}
