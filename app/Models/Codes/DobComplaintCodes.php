<?php

namespace App\Models\Codes;


use Illuminate\Database\Eloquent\Model;

class DobComplaintCodes extends Model
{
    protected $table = 'dob_complaints_codes';

    protected $fillable = [
        'code',
        'description',
        'priority'
    ];

    public function scopeSwo($query)
    {
        return $query->where('description', 'LIKE', '%ORDER%');
    }

    public function scopeNotSwo($query)
    {
        return $query->where('description', 'NOT LIKE', '%ORDER%');
    }

}