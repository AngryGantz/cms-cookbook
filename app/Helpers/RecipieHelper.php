<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 09.01.16
 * Time: 0:26
 */

namespace App\Helpers;

use App\Post;
use DB;


class RecipieHelper
{

   /**
    * Get $num recipies with max views
    *
    * @param $num
    * @return mixed
    */
   public static function getPopularRecipies($num) {
      return Post::where('postStatus_id','=', 3)->orderBy('views', 'desc')->take($num)->get();
//      return  DB::table('posts')->where('postStatus_id','=', 3)->orderBy('views', 'desc')->take($num)->get();
   }

   /**
    * Get $num recipies with max views
    *
    * @param $num
    * @return mixed
    */
   public static function getRatingRecipies($num) {
      return Post::where('postStatus_id','=', 3)->orderBy('avrating', 'desc')->take($num)->get();
   }


   /**
    *  Get last $num recipies
    *
    * @param $num
    * @return array|static[]
    */
   public static function getLastRecipies($num) {
//      if (DB::table('posts')->count() <= $num )
//      {
         return Post::where('postStatus_id','=', 3)->orderBy('created_at', 'desc')->take($num)->get();
//         return  DB::table('posts')->where('postStatus_id','=', 3)->orderBy('created_at', 'desc')->get();
//      } else {
//         return  DB::table('posts')->where('postStatus_id','=', 3)->orderBy('created_at', 'desc')->take($num)->get();
//      }
   }

   public static function getRandomRecipie()
   {
      return Post::where('postStatus_id','=', 3)->orderByRaw("RAND()")->first();
   }


}