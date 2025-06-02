<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPluto extends Model
{
    //
    protected $table='pluto_20v3';

    protected $hidden=['geom'];


    public function address()
    {
        return $this->belongsTo('App\Models\PropertyAdress','bbl','bbl');
    }
}
