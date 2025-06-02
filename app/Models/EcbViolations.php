<?php

namespace App\Models;

use App\Helpers\Helper;
use Carbon\Carbon;

class EcbViolations extends ODataModel
{
    public $subject = "New ECB Violation Issued";
    public $updateSubject = "New ECB Violation Status Update";
    public $reminderSubject = "ECB Violation Status Reminder";
    public $mailview = 'mails.alerts.ecbViolations';
    protected $datasetId = "6bgk-3dad";
    protected $datasetName = "DOB ECB Violations";
    protected $keyType = 'string';
    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'daily';

    protected $primaryKey = 'ecb_violation_number';

    protected $table = 'ecb_violations';

    protected $notifiables = [
        'ecb_violation_status',
        'hearing_date',
        'issue_date',
        'severity',
        'penality_imposed',
        'hearing_status',];

    protected $selectables = ['ecb_violation_number',
        'ecb_violation_status',
        'dob_violation_number',
        'bin',
        'hearing_date',
        'hearing_time',
        'issue_date',
        'severity',
        'respondent_name',
        'violation_type',
        'violation_description',
        'penality_imposed',
        'amount_paid',
        'balance_due',
        'section_law_description1',
        'hearing_status',
        'certification_status'];

    protected $fillable = ['isn_dob_bis_extract',
        'ecb_violation_number',
        'ecb_violation_status',
        'dob_violation_number',
        'bin',
        'boro',
        'block',
        'lot',
        'bbl',
        'hearing_date',
        'hearing_time',
        'served_date',
        'issue_date',
        'severity',
        'violation_type',
        'respondent_name',
        'respondent_house_number',
        'respondent_street',
        'respondent_city',
        'respondent_zip',
        'violation_description',
        'penality_imposed',
        'amount_paid',
        'balance_due',
        'infraction_code1',
        'section_law_description1',
        'infraction_code2',
        'section_law_description2',
        'infraction_code3',
        'section_law_description3',
        'infraction_code4',
        'section_law_description4',
        'infraction_code5',
        'section_law_description5',
        'infraction_code6',
        'section_law_description6',
        'infraction_code7',
        'section_law_description7',
        'infraction_code8',
        'section_law_description8',
        'infraction_code9',
        'section_law_description9',
        'infraction_code10',
        'section_law_description10',
        'aggravated_level',
        'hearing_status',
        'certification_status'];


    protected $casts = [
        'ecb_violation_number' => 'string',
        'balance_due'=>'double'
    ];

    public function getPdfLink()
    {
        return 'http://a820-ecbticketfinder.nyc.gov/GetViolationImage?violationNumber=' . $this->ecb_violation_number;
    }

    public function hearingDate()
    {
        return Helper::carbonParseYmd($this->hearing_date);
    }

    public function issueDate()
    {
        return Helper::carbonParseYmd($this->issue_date);
    }

    public function scopeSummary($query)
    {
        return $query->where(function ($query) {
            $query->where('ecb_violation_status', '=', 'RESOLVE')->where(function ($query) {
                $query->where('hearing_date', 'LIKE', now()->addMonths(-1)->format('Y/m/%'))
                    ->orWhere('hearing_date', 'LIKE', now()->format('Y/m/%'));
            });
        })
            ->orWhere('ecb_violation_status', '!=', 'RESOLVE');
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and
//        (
//        (ecb_violation_status = 'RESOLVE' and hearing_date LIKE '" . now()->addMonths(-1)->format('Y/m/%') . "')
//        or (ecb_violation_status = 'RESOLVE'  and hearing_date LIKE '" . now()->format('Y/m/%') . "')
//        or ecb_violation_status != 'RESOLVE'
//        )";
//    }
}
