<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function menuitems()
    {
        return $this->hasMany('App\Models\Menuitem');
    }

    public function setStepsAttribute($menuitems)
    {
        $this->menuitems()->detach();
        if ( ! $menuitems) return;
        if ( ! $this->exists) $this->save();

        $this->menuitems()->attach($menuitems);
    }

}
