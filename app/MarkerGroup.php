<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkerGroup extends Model
{
    public function markers()
    {
        return $this->belongsToMany('App\Marker')->orderBy('sortorder', 'ASC');
    }


	public function setMarkersAttribute($markers)
	{
	    $this->markers()->detach();
	    if ( ! $markers) return;
	    if ( ! $this->exists) $this->save();
	    $this->markers()->attach($markers);
	}    
}
