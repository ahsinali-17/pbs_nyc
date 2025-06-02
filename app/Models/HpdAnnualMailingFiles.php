<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HpdAnnualMailingFiles extends Model
{
    protected $table = 'hpd_annual_mailing_files';

    protected $fillable =
        ['mailing_id',
        'file_type',
        'file_url',
        'description',
        'file_upload_date'
    ];

    protected $casts = ['file_upload_date' => 'datetime'];

    protected $dateFormat = 'Y-m-d';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

}
