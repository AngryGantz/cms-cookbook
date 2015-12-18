<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menuitem extends Model
{
    /**
     * Menu - owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    /**
     * If type menuitem is MarkerGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function markerGroup()
    {
        return $this->hasOne('App\MarkerGroup');
    }

    /**
     * Type of menu item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\MenuitemType');
    }


}

