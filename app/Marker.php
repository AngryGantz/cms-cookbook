<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use \SleepingOwl\WithJoin\WithJoinTrait;
    public function markerGroups()
    {
        return $this->belongsToMany('App\MarkerGroup');
    }

    public function recipies()
    {
        return $this->belongsToMany('App\Post');
    }



}
