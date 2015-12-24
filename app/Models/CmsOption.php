<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsOption extends Model
{
    public static function getValue($key)
    {
        if ($v = CmsOption::where('name', '=', $key)->firstOrFail())
            return $v->value;
        else return '';
    }
}
