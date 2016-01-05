<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 05.01.16
 * Time: 1:07
 */

namespace App\Helpers;

use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;
use Storage;

class ImgHelper
{

    public static function getAvatar($id = '', $w='', $h='')
    {
        if($id=='')
        {
            if($user=Sentinel::check())
            {
                if($user->avatar != '')
                {
                    $fpath = 'imgpref/' . $user->avatar;
                    if($w != '') $fpath = $fpath . '/' . $w;
                    if($h != '') $fpath = $fpath . '/' . $h;
                    return $fpath;
                }else {
                    if(file_exists(storage_path('app/avatars/'.$user->id.'.jpg')))
                    {
                        $fpath = 'storage/app/avatars/'.$user->id.'.jpg';
                        if($w != '') $fpath = $fpath . '/' . $w;
                        if($h != '') $fpath = $fpath . '/' . $h;
                        return $fpath;
                    }
                    return ImgHelper::getNoFotoAvatar($w, $h);
                }
            }
            return ImgHelper::getNoFotoAvatar($w, $h);
        }
        if(! $user=Sentinel::findById($id)) return ImgHelper::getNoFotoAvatar($w, $h);
        if($user->avatar != '')
        {
            $fpath = 'imgpref/' . $user->avatar;
            if($w != '') $fpath = $fpath . '/' . $w;
            if($h != '') $fpath = $fpath . '/' . $h;
            return $fpath;

        }else {
            if(file_exists(storage_path('app/avatars/'.$user->id.'.jpg')))
            {
                $fpath = 'storage/app/avatars/'.$user->id.'.jpg';
                if($w != '') $fpath = $fpath . '/' . $w;
                if($h != '') $fpath = $fpath . '/' . $h;
                return $fpath;

            }
            return ImgHelper::getNoFotoAvatar($w, $h);
        }
    }

    public static function getNoFoto()
    {

        return asset('assets/majestic/images/nofoto.png');
    }

    public static function getNoFotoAvatar($w, $h)
    {
        $fpath = 'storage/app/avatars/nofoto.png';
        if($w != '') $fpath = $fpath . '/' . $w;
        if($h != '') $fpath = $fpath . '/' . $h;
        return $fpath;
    }

    public static function isAvatar($id)
    {
        if(! $user=Sentinel::findById($id)) return false;
        if($user->avatar != '') return true;
        if(file_exists(storage_path('app/avatars/'.$user->id.'.jpg'))) return true;
        return false;
    }


}