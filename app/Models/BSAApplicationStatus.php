<?php

namespace App\Models;


use App\Helpers\Helper;

class BSAApplicationStatus extends ODataModel
{
    public $subject = "New BSA Application Filed";
    public $updateSubject = "New BSA Application Status Update";
    public $reminderSubject = "BSA Application Status Reminder";
    public $mailview = 'mails.alerts.bsaApplicationStatus';
    protected $datasetId = "yvxd-uipr";
    protected $datasetName = "Board of Standards and Appeals (BSA) Applications Status";

    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";

    protected $primaryKey = 'filed_calendar';

    protected $table = 'bsa_application_status';
    protected $updateFrequency = 'daily';

    protected $notifiables = [
        'filed',
        'application',
        'calendar',
        'status',
        'date',
    ];

    protected $selectables = ['filed',
        'application',
        'calendar',
        'street_number',
        'street_name',
        'borough',
        'status',
        'date',
        'bin',
    ];

    protected $fillable = [
        'filed_calendar',
        'filed',
        'application',
        'calendar',
        'section',
        'street_number',
        'street_name',
        'borough',
        'borough_code',
        'block',
        'lots',
        'zoning_district',
        'cb',
        'project_description',
        'status',
        'date',
        'postcode',
        'latitude',
        'longitude',
        'council_district',
        'census_tract',
        'bin',
        'bbl',
        'nta'
    ];

    protected $casts = [
        'filed' => 'string',
        'calendar' => 'string'
    ];

    public function filedDate()
    {
        return Helper::carbonParseYmd($this->filed);
    }

    public function date()
    {
        return Helper::carbonParseYmd($this->date);
    }

    public function insertData($result)
    {
        $result["filed_calendar"] = $result["filed"] . "_" . $result["calendar"];
        parent::insertData($result);
    }

    public function scopeSummary($query)
    {
        return $query->where('date', '>', now()->addMonths(-6)->format('Y-m-d') . 'T00:00:00.000')
            ->whereIn('status', ['Pending', 'Initial/New', 'Continued', 'ContinuedContinued', 'Decision']);


    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and (
//        date > '" . now()->addMonths(-6)->format('Y-m-d') . "T00:00:00.000'
//        or status = 'Pending'
//        or status = 'Initial/New'
//        or status = 'Continued'
//        or status = 'ContinuedContinued'
//        or status = 'Decision'
//        )";
//        // TODO: Tarihi 6 ay öncesinden büyük olanları veya statusu pending - initial/new - continued - continuedcontinued olanları getiriyor.
//    }

}
