<?php

namespace App\Models;

use App\Helpers\Helper;

class FdnyActiveViolOrders extends ODataModel
{
    public $subject = "New FDNY Violation Order Issued";
    public $updateSubject = "New FDNY Violation Order Status Update";
    public $reminderSubject = "FDNY Violation Order Status Reminder";
    public $mailview = 'mails.alerts.fdnyActiveViolOrders';
    protected $datasetId = "bi53-yph3";
    protected $datasetName = "FDNY Active Violation Orders";

    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";

    protected $primaryKey = 'vio_id';

    protected $table = 'fdny_active_viol_orders';

    protected $updateFrequency = 'daily';


    protected $notifiables = [
        "vio_date",

    ];

    protected $selectables = [
        "vio_id",
        "acct_num",
        "acct_owner",
        "violation_num",
        "vio_law_num",
        "vio_law_desc",
        "vio_date",
        "action",
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


    protected $fillable = [
        "vio_id",
        "acct_num",
        "acct_owner",
        "violation_num",
        "vio_law_num",
        "vio_law_desc",
        "vio_date",
        "action",
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

    public function vioDate()
    {
        return Helper::carbonParseYmd($this->vio_date);
    }

    public function violationDate()
    {
        return Helper::carbonParseYmd($this->vio_date);
    }

    public function scopeSummary($query)
    {
        return $query;
    }


}
