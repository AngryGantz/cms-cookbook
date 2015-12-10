<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{

	protected $fillable = ['text', 'img', 'post_id', 'id'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
