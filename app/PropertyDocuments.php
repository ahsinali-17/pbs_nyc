<?php

namespace App;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyDocuments extends Model
{


    protected $table = 'property_documents';

    protected $fillable = ['user_id', 'property_id', 'type', 'path'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','id')->withoutAll();
    }

    public function user()
    {
        return $this->property->user;
    }
}