<?php

namespace App\Models;


use App\Helpers\Helper;

class FdnyInspections extends ODataModel
{
    public $subject = "New FDNY Inspection Issued";
    public $updateSubject = "New FDNY Inspection Status Update";
    public $reminderSubject = "FDNY Inspection Status Reminder";
    public $mailview = 'mails.alerts.fdnyInspections';
    protected $datasetId = "ssq6-fkht";
    protected $datasetName = "FDNY Inspection";

    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";

    protected $primaryKey = 'acct_id';

    protected $table = 'fdny_inspections';

    protected $updateFrequency = 'daily';


    protected $notifiables = [
        "last_insp_stat",
    ];

    protected $selectables = [
        "acct_id",
        "acct_num",
        "owner_name",
        "last_visit_dt",
        "last_full_insp_dt",
        "last_insp_stat",
        "bin",
    ];


    protected $fillable = [
        "acct_id",
        "alpha",
        "acct_num",
        "owner_name",
        "last_visit_dt",
        "last_full_insp_dt",
        "last_insp_stat",
        "prem_addr",
        "bin",
        "communitydistrict",
        "citycouncildistrict",
        "bbl",
        "cent_latitude",
        "cent_longitude",
        "zipcode",
        "borough",
        "number",
        "street",
        "census_tract",
        "nta",
    ];


    protected $casts = [
        'bin' => 'string',
    ];

    public function lastVisitDate()
    {
        return Helper::carbonParseYmd($this->last_visit_dt);
    }

    public function lastFullInspectionDate()
    {
        return Helper::carbonParseYmd($this->last_full_insp_dt);
    }


    public function scopeSummary($query)
    {
        return $query->where('last_visit_dt', '>', '2018-01-01T00:00:00.000');
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and last_visit_dt > '2018-01-01T00:00:00.000'";
//    }

}
