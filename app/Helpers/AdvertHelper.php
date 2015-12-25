<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 17:56
 */

namespace App\Helpers;

use App\Models\Advert;

class AdvertHelper {

    public static function getRandomAdvertByPlace($place)
    {
        $ads = Advert::where('place', '=', $place)->orderByRaw("RAND()")->first();

        if (! $ads ) return null;

        if (! $ads->active) return null;

        if ($ads->show_title) $advert['title'] = $ads->title; else $advert['title'] = null;
        if ($ads->show_img)
        {
            $advert['img'] =  $ads->img ;
            $advert['imglink'] = $ads->imglink;
        }
        else
            $advert['img'] = null;
        if ($ads->show_text) $advert['text'] = $ads->text; else $advert['text'] = null ;
        return $advert;
    }
}