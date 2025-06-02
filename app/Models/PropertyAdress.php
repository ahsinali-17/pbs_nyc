<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAdress extends Model
{
    protected $table = 'property_address_directory';

    public function pluto()
    {
        return $this->hasOne('App\Models\PropertyPluto','bbl','bbl');
    }
}
