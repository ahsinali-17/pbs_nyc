<?php

namespace App\Models;

use App\Helpers\Helper;
use Carbon\Carbon;

class HpdEmergencyRepairsCharges extends ODataModel
{
//    public $subject = "New HPD Emergency Repair Order Update";
//    public $mailview = 'mails.alerts.hpdEmergencyRepairOrders';
    protected $datasetId = "emrz-5p35";
    protected $datasetName = "HPD Open Market Orders Charges";

    protected $dataColumn = "omonumber";

    protected $dataSocrataKey = "omonumber";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'unique_key';

    protected $table = 'hpd_emergency_repairs_charges';



    protected $notifiables = [
        'invoiceid',
        'invoicesequenceid',
        'omonumber',
        'invoicestatus',
        'invoicedate',
        'invoicebillamount',
        'invoicepayamount',
        'salestax',
        'adminfee',
        'paymentid',
        'chargeamount',
        'datetransferdof',
        'unique_key',
    ];

    protected $selectables = [
        'invoiceid',
        'invoicesequenceid',
        'omonumber',
        'invoicestatus',
        'invoicedate',
        'invoicebillamount',
        'invoicepayamount',
        'salestax',
        'adminfee',
        'paymentid',
        'chargeamount',
        'datetransferdof',
        'unique_key',
    ];

    protected $fillable = [
        'invoiceid',
        'invoicesequenceid',
        'omonumber',
        'invoicestatus',
        'invoicedate',
        'invoicebillamount',
        'invoicepayamount',
        'salestax',
        'adminfee',
        'paymentid',
        'chargeamount',
        'datetransferdof',
        'unique_key',
    ];


    protected $casts = [
    ];


    public function scopeSummary($query)
    {
        return $query;
    }

    public function dateTransferDof()
    {
        return Helper::carbonParseYmd($this->datetransferdof);
    }

    public function invoiceDate()
    {
        return Helper::carbonParseYmd($this->invoicedate);
    }


    protected function getWhereString($force=false)
    {
        $array = HpdEmergencyRepairs::all('omonumber')->pluck('omonumber')->unique()->flatten()->toArray();
        //$array = ["1046919", "1046920", "1046921", "1046922", "1046923", "1046924", "1046925", "1046926"];
        return $this->dataSocrataKey . ' in(' . $this->arrayToQuotedString($array) . ')';
    }

}
