<?php

namespace App\Models;


use App\Helpers\Helper;

class DobNowSafetyBoiler extends ODataModel
{
    public $subject = "New Boiler Records Filed";
    public $updateSubject = "New Boiler Records Status Update";
    public $reminderSubject = "Boiler Records Reminder";
    public $mailview = 'mails.alerts.dobNowSafetyBoiler';
    protected $datasetId = "52dp-yji6";
    protected $datasetName = "DOB NOW: Safety Boiler";

    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin_number";

    protected $updateFrequency = 'daily';

    protected $primaryKey = 'tracking_number';

    protected $table = 'dob_now_safety_boiler';

    protected $notifiables = [
        'inspection_date',
        'report_status',];

    protected $selectables = ['tracking_number',
        'boiler_id',
        'report_type',
        'applicantfirst_name',
        'applicant_last_name',
        'applicant_license_number',
        'inspection_type',
        'inspection_date',
        'report_status',
        'bin_number'];

    protected $fillable = ['tracking_number',
        'boiler_id',
        'report_type',
        'applicantfirst_name',
        'applicant_last_name',
        'applicant_license_type',
        'applicant_license_number',
        'owner_first_name',
        'owner_last_name',
        'boiler_make',
        'boiler_model',
        'pressure_type',
        'inspection_type',
        'inspection_date',
        'defects_exist',
        'lff_45_days',
        'lff_180_days',
        'filing_fee',
        'total_amount_paid',
        'report_status',
        'bin_number'];


    protected $casts = [
        'bin_number' => 'string',
    ];


    public function scopeSummary($query)
    {
        return $query->where(function ($query) {
            $query->where('inspection_date', 'LIKE', now()->addYears(-1)->format('%/%/Y') . "%")
                ->orWhere('inspection_date', 'LIKE', now()->format('%/%/Y') . "%");
        });
    }

    public function inspectionDate()
    {
        return Helper::carbonParseYmd($this->inspection_date);
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and
//        (inspection_date LIKE '" . now()->addYears(-1)->format('%/%/Y') . "%'
//        or inspection_date LIKE '" . now()->format('%/%/Y') . "%'
//        )";
//    }

    public function getBinAttribute()
    {
        return $this->bin_number;
    }
}
