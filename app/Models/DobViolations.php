<?php

namespace App\Models;

use App\Helpers\Helper;

class DobViolations extends ODataModel
{
    public $subject = "New DOB Violation Issued";
    public $updateSubject = "New DOB Violation Status Update";
    public $reminderSubject = "DOB Violation Status Reminder";
    public $mailview = 'mails.alerts.dobViolations';
    protected $datasetId = "3h2n-5cm9";
    protected $datasetName = "DOB Violations";
    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'daily';
    protected $table = 'dob_violations';
    protected $primaryKey = 'isn_dob_bis_viol';

    protected $notifiables = [
        'disposition_date',
        'violation_category',
    ];

    protected $selectables = [
        'isn_dob_bis_viol',
        'bin',
        'issue_date',
        'violation_number',
        'disposition_date',
        'disposition_comments',
        'description',
        'ecb_number',
        'device_number',
        'number',
        'violation_type_code',
        'violation_category',
        'violation_type'
    ];

    protected $fillable = ['bbl',
        'isn_dob_bis_viol',
        'boro',
        'bin',
        'block',
        'lot',
        'issue_date',
        'violation_type_code',
        'violation_number',
        'house_number',
        'street',
        'disposition_date',
        'disposition_comments',
        'device_number',
        'description',
        'ecb_number',
        'number',
        'violation_category',
        'violation_type'];


    protected $casts = [
        'isn_dob_bis_viol' => 'string',
    ];

    public function issueDate()
    {
        return Helper::carbonParseYmd($this->issue_date);
    }

    public function dispositionDate()
    {
        return Helper::carbonParseYmd($this->disposition_date);
    }

    public function scopeSummary($query)
    {
        return $query->whereBetween('disposition_date', [now()->addMonths(-1)->format('Ymd'), now()->format('Ymd')])
            ->orWhere(function ($query) {
                $query->where('violation_category', 'NOT LIKE', '%Resolved')
                    ->where('violation_category', 'NOT LIKE', '%DISMISSED');
            });
    }

    public function scopeIsOpen($query)
    {
        return $query->where('disposition_date', null);


    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and
//        (
//        (disposition_date between '" . now()->addMonths(-1)->format('Ymd') . "' and '" . now()->format('Ymd') . "')
//        or (violation_category NOT LIKE '%Resolved' and violation_category NOT LIKE '%DISMISSED')
//        )";
//
//    }

}
