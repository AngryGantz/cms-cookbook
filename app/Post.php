<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use \App\Step;
class Post extends Model
{


	/**
	 *  Relations for othe tables
	 */
    public function steps()
    {
        return $this->hasMany('App\Step');
    }

     public function setStepsAttribute($steps)
     {
         $this->steps()->detach();
         if ( ! $steps) return;
         if ( ! $this->exists) $this->save();

         $this->steps()->attach($steps);
     }



//    public function ingridients()
//    {
//        return $this->hasMany('Ingridient');
//    }

    /**
     * Markers for this post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function markers()
    {
        return $this->belongsToMany('App\Marker');
    }

    /**
     * Update Markers for this post
     *
     * @param $markers
     */
	public function setMarkersAttribute($markers)
	{
	    $this->markers()->detach();
	    if ( ! $markers) return;
	    if ( ! $this->exists) $this->save();

	    $this->markers()->attach($markers);
	}

    /**
     * Autor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postStatus()
    {
        return $this->belongsTo('App\Models\PostStatus', 'postStatus_id');
    }


}
