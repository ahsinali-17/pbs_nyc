<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenDataSet extends Model
{
    //
    protected $table = 'open_data_sets';

    protected $fillable = ['name','api_id','last_sync','created_at','updated_at'];


}
