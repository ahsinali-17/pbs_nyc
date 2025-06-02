<?php

namespace App\Models\Codes;


use Illuminate\Database\Eloquent\Model;

class DobComplaintDispositionCodes extends Model
{
    protected $table = 'dob_complaints_disposition_codes';

    protected $fillable = [
        'code',
        'description',
        'category'
    ];

}
