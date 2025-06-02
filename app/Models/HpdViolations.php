<?php

namespace App\Models;

use App\Helpers\Helper;

class HpdViolations extends ODataModel
{
    public $subject = "New HPD Violation Issued";
    public $updateSubject = "New HPD Violation Status Update";
    public $reminderSubject = "HPD Violation Status Reminder";
    public $mailview = 'mails.alerts.hpdViolations';
    protected $datasetId = "wvxf-dwi5";
    protected $datasetName = "Housing Maintenance Code Violations";

    protected $dataColumn = "bin";

    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'daily';

    protected $primaryKey = 'violationid';

    protected $table = 'hpd_violations';

    protected $notifiables = [
        'inspectiondate',
        'approveddate',
        'violationstatus',
        'currentstatus',
    ];

    protected $selectables = ['violationid',
        'registrationid',
        'apartment',
        'class',
        'inspectiondate',
        'approveddate',
        'novdescription',
        'novissueddate',
        'violationstatus',
        'currentstatus',
        'bin',
    ];

    protected $fillable = ['violationid',
        'buildingid',
        'registrationid',
        'boroid',
        'borough',
        'housenumber',
        'lowhousenumber',
        'highhousenumber',
        'streetname',
        'streetcode',
        'postcode',
        'apartment',
        'story',
        'block',
        'lot',
        'class',
        'inspectiondate',
        'approveddate',
        'originalcertifybydate',
        'originalcorrectbydate',
        'newcertifybydate',
        'newcorrectbydate',
        'certifieddate',
        'ordernumber',
        'novid',
        'novdescription',
        'novissueddate',
        'currentstatusid',
        'currentstatus',
        'currentstatusdate',
        'novtype',
        'violationstatus',
        'latitude',
        'longitude',
        'communityboard',
        'councildistrict',
        'censustract',
        'bin',
        'bbl',
        'nta'];


    protected $casts = [
        'violationid' => 'string',
        'registrationid' => 'string',
    ];

    public function inspectionDate()
    {
            return Helper::carbonParseYmd($this->attributes['inspectiondate']);
    }

    public function novissuedDate()
    {
            return Helper::carbonParseYmd($this->attributes['novissueddate']);
    }

    public function scopeSummary($query)
    {
        return $query->where(function ($query) {
            $query->where(function ($query) {
                $query->where('violationstatus', '=', 'Close')
                    ->where('novissueddate', '>', now()->addMonths(-1)->format('Y-m-d') . "T00:00:00.000");
            })
                ->orWhere('violationstatus', '=', 'Open');
        });
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and
//        (
//           (violationstatus = 'Close' and novissueddate > '" . now()->addMonths(-1)->format('Y-m-d') . "T00:00:00.000')
//        or (violationstatus = 'Open')
//        )";
//    }
}
