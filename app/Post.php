<?php

namespace App;

use willvincent\Rateable\Rateable;
use Lanz\Commentable\Commentable;
use Illuminate\Database\Eloquent\Model;
use \App\MarkerGroup;
use DB;

class Post extends Model
    {

    use Rateable;
    use Commentable;
    use \SleepingOwl\WithJoin\WithJoinTrait;
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

    /**
     * Get Rating of recipie
     *
     * @return float rating
     */
    public function getRating()
    {
        return round($this->averageRating(),1);
    }

    /**
     * Get round rating of recipie
     *
     * @return ineger round rating
     */
    public function getRoundRating()
    {
        $avrate = intval(round($this->averageRating()));
        return $avrate;
    }

    /**
     * @param $idMarkerGroup
     * @return string name MarkerGroup
     */
    public function getMarkerGroupById($idMarkerGroup)
    {
        $markerGroup = MarkerGroup::find($idMarkerGroup);
        return $markerGroup->name;
    }

    /**
     * @param $idMarkerGroup
     * @return string name Marker belong to this post and MarkerGroup
     */
    public function getMarkerNameByMarkerGroupId($idMarkerGroup)
    {
        $markersInThisRecipie = $this->markers;
        $markersGroup = MarkerGroup::find($idMarkerGroup);
        $markersInMarkerGroupById = $markersGroup->markers;
        $arrIdMarkersFromGroup = [];
        foreach ($markersInMarkerGroupById as $marker)
        {
            $arrIdMarkersFromGroup[] = $marker->id;
        }


        foreach ($markersInThisRecipie as $marker)
        {
            if (in_array($marker->id, $arrIdMarkersFromGroup))
            {
                return $marker->name;
            }
        }
        return "";
    }

    /**
     *  Related recipies
     *
     * @param $count
     * @return mixed
     */
    public function getRelatedRecipies($count)
    {
        if ( $this->markers->count() == 0) return null;
        $marker = $this->markers->random();
        if ($marker->recipies->count() < $count ) {
            return $marker->recipies->except($this->id);
        }
        else
            return $marker->recipies->random($count)->except($this->id);
    }

    /**
     * Get $num recipies with max views
     *
     * @param $num
     * @return mixed
     */
    public static function getPopularRecipies($num) {
        return  DB::table('posts')->orderBy('views', 'desc')->take($num)->get();
    }

    /**
     *  Get last $num recipies
     *
     * @param $num
     * @return array|static[]
     */
    public static function getLastRecipies($num) {
        if (DB::table('posts')->count() <= $num )
        {
            return  DB::table('posts')->orderBy('created_at', 'desc')->get();
        } else {
            return  DB::table('posts')->orderBy('created_at', 'desc')->take($num)->get();
        }
    }

    public static function getRandomRecipie()
    {
        return Post::orderByRaw("RAND()")->first();
    }

}
