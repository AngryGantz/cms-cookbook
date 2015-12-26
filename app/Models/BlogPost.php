<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use Lanz\Commentable\Commentable;

class BlogPost extends Model
{
    use Rateable;
    use Commentable;
    use \Conner\Tagging\Taggable;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function statusName()
    {
        return $this->belongsTo('App\Models\PostStatus', 'status');
    }

}
