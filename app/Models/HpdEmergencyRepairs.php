<?php

namespace App\Models;

use App\Helpers\Helper;

class HpdEmergencyRepairs extends ODataModel
{
    public $subject = "New HPD Emergency Repair Order Filed";
    public $updateSubject = "New HPD Emergency Repair Order Status Update";
    public $reminderSubject = "HPD Emergency Repair Order Status Reminder";
    public $mailview = 'mails.alerts.hpdEmergencyRepairOrders';
    protected $datasetId = "mdbu-nrqn";
    protected $datasetName = "HPD Open Market Orders";

    protected $dataColumn = "bin";

    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'omoid';

    protected $table = 'hpd_emergency_repairs';

    protected $notifiables = [
        'omoid',
        'omonumber',
        'buildingid',
        'lifecycle',
        'worktypegeneral',
        'omostatusreason',
        'omoawardamount',
        'omocreatedate',
        'netchangeorders',
        'omoawarddate',
        'omodescription',
        'bin',
    ];

    protected $selectables = [
        'omoid',
        'omonumber',
        'buildingid',
        'lifecycle',
        'worktypegeneral',
        'omostatusreason',
        'omoawardamount',
        'omocreatedate',
        'netchangeorders',
        'omoawarddate',
        'omodescription',
        'bin',
    ];

    protected $fillable = [
        'omoid',
        'omonumber',
        'buildingid',
        'lifecycle',
        'worktypegeneral',
        'omostatusreason',
        'omoawardamount',
        'omocreatedate',
        'netchangeorders',
        'omoawarddate',
        'omodescription',
        'bin',
    ];


    protected $casts = [
    ];


    public function scopeSummary($query)
    {
        return $query;
    }

    public function omoCreateDate()
    {
        return Helper::carbonParseYmd($this->omocreatedate);
    }

    public function omoAwardDate()
    {
        return Helper::carbonParseYmd($this->omoawarddate);
    }

    public function charges()
    {
        return $this->hasOne('\App\Models\HpdEmergencyRepairsCharges', 'omonumber', 'omonumber');
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and vacate_effective_date > '2018-01-01T00:00:00.000'";
//    }
}
