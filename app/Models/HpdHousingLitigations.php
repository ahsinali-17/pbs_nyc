<?php

namespace App\Models;

use App\Helpers\Helper;

class HpdHousingLitigations extends ODataModel
{
    public $subject = "New Housing Litigations Filed";
    public $updateSubject = "New Housing Litigations Status Update";
    public $reminderSubject = "Housing Litigations Status Reminder";
    public $mailview = 'mails.alerts.hpdHousingLitigations';
    protected $datasetId = "59kj-x8nc";
    protected $datasetName = "Housing Litigations";

    protected $dataColumn = "bin";

    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'litigationid';

    protected $table = 'hpd_housing_litigations';

    protected $notifiables = [
        'casestatus',
        'caseopendate',
        'casejudgement',
        'findingdate',
    ];

    protected $selectables = [
        'casestatus',
        'casetype',
        'caseopendate',
        'litigationid',
        'casejudgement',
        'findingdate',
        'respondent',
        'bin'];

    protected $fillable = ['longitude',
        'latitude',
        'casestatus',
        'casetype',
        'bbl',
        'council_district',
        'caseopendate',
        'casejudgement',
        'housenumber',
        'buildingid',
        'zip',
        'streetname',
        'nta',
        'boroid',
        'census_tract',
        'findingdate',
        'community_district',
        'penalty',
        'respondent',
        'block',
        'lot',
        'litigationid',
        'findingofharassment',
        'bin'];


    protected $casts = [
        'litigationid' => 'string',
    ];


    public function scopeSummary($query)
    {
        return $query->where('casestatus', 'not like', '%CLOSE%');
    }

    public function caseopenDate()
    {
        return Helper::carbonParseYmd($this->caseopendate);
    }

    public function findingDate()
    {
        return Helper::carbonParseYmd($this->findingdate);
    }


}
