<?php

namespace App\Models;

use App\Helpers\Helper;
use Carbon\Carbon;

class HpdRepairVacateOrders extends ODataModel
{
    public $subject = "New HPD Repair/Vacate Order Filed";
    public $updateSubject = "New HPD Repair/Vacate Order Status Update";
    public $reminderSubject = "HPD Repair/Vacate Order Status Reminder";
    public $mailview = 'mails.alerts.hpdRepairVacateOrders';
    protected $datasetId = "tb8q-a3ar";
    protected $datasetName = "Order to Repair/Vacate Orders";

    protected $dataColumn = "bin";

    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'building_id';

    protected $table = 'hpd_repair_vacate_orders';

    protected $notifiables = [
        'number_of_vacated_units',
        'actual_rescind_date',
        'vacate_effective_date',
        'primary_vacate_reason',
        'registration_id',
        'bin',
        'vacate_order_number',
        'building_id',
        'vacate_type'];

    protected $selectables = [
        'number_of_vacated_units',
        'actual_rescind_date',
        'vacate_effective_date',
        'primary_vacate_reason',
        'registration_id',
        'bin',
        'vacate_order_number',
        'building_id',
        'vacate_type'];

    protected $fillable = ['nta',
        'census_tract',
        'council_district',
        'community_board',
        'longitude',
        'postoce',
        'number_of_vacated_units',
        'actual_rescind_date',
        'vacate_effective_date',
        'primary_vacate_reason',
        'registration_id',
        'bin',
        'vacate_order_number',
        'street_name',
        'house_number',
        'boro_short_name',
        'building_id',
        'bbl',
        'latitude',
        'vacate_type'];


    protected $casts = [
        'building_id' => 'string',
    ];

    public function actualRescindDate()
    {
        return Helper::carbonParseYmd($this->actual_rescind_date);
    }

    public function vacateEffectiveDate()
    {
        return Helper::carbonParseYmd($this->vacate_effective_date);
    }

    public function scopeSummary($query)
    {
        return $query->where('vacate_effective_date', '>', '2018-01-01T00:00:00.000');
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and vacate_effective_date > '2018-01-01T00:00:00.000'";
//    }
}
