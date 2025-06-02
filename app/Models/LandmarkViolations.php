<?php

namespace App\Models;

use App\Helpers\Helper;
use Carbon\Carbon;

class LandmarkViolations extends ODataModel
{
    public $subject = "New LANDMARKS Violation Issued";
    public $updateSubject = "New LANDMARKS Violation Status Update";
    public $reminderSubject = "LANDMARKS Violation Status Reminder";
    public $mailview = 'mails.alerts.landmarkViolations';
    protected $datasetId = "wycc-5aqt";
    protected $datasetName = "Landmarks Violations";
    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";
    protected $table = 'landmark_violations';
    protected $updateFrequency = 'monthly';
    protected $primaryKey = 'lpc';

    protected $notifiables = [
        "vio_date",
        "violation_class",
        "rescinded",
    ];

    protected $selectables = ["lpc",
        "bin",
        "vio_date",
        "violation_class",
        "rescinded",
    ];

    protected $fillable = ["lpc",
        "fiscal_year",
        "firstoflot",
        "longitude",
        "bbl",
        "community_board",
        "community_district",
        "_2010_census_tract",
        "bin",
        "nta",
        "postcode",
        "street",
        "street_name",
        "boro",
        "firstofblock",
        "historic_district",
        "vio_date",
        "wl_date",
        "nov_date",
        "violation_class",
        "rescinded",
        "rescended_date",
        "latitude"];


    protected $casts = [
        'lpc' => 'string',
    ];

    public function scopeSummary($query)
    {
        return $query->where('vio_date', '>', '2018-01-01T00:00:00.000');
    }

    public function vioDate()
    {
        return Helper::carbonParseYmd($this->vio_date);
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and vio_date > '2018-01-01T00:00:00.000'";
//    }

}
