<?php

namespace App;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyNotes extends Model
{
    //
    protected $table = 'property_notes';

    protected $fillable = ['user_id', 'property_id', 'title', 'content'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','id')->withoutAll();
    }

    public function user()
    {
        return $this->property->user;
    }
}
