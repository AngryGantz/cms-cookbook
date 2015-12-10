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
    
    // public function setStepsAttribute($steps)
    // {
    //     $this->steps()->detach();
    //     if ( ! $steps) return;
    //     if ( ! $this->exists) $this->save();

    //     $this->markers()->attach($markers);
    // }  



    public function ingridients()
    {
        return $this->hasMany('Ingridient');
    }

    public function markers()
    {
        return $this->belongsToMany('App\Marker');
    }
    
	public function setMarkersAttribute($markers)
	{
	    $this->markers()->detach();
	    if ( ! $markers) return;
	    if ( ! $this->exists) $this->save();

	    $this->markers()->attach($markers);
	}   

}
