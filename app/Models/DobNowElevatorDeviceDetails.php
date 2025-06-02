<?php

namespace App\Models;


class DobNowElevatorDeviceDetails extends ODataModel
{
    public $subject = "New DOB Now Elevator Device Details";
    public $mailview = 'mails.alerts.dobNowElevatorPermits';
    protected $datasetId = "juyv-2jek";
    protected $datasetName = "DOB NOW: Build Elevator Device Details";

    protected $dataColumn = "bin";
    protected $dataSocrataKey = "job_filing_number";

    protected $primaryKey = 'job_filing_device_id';

    protected $table = 'dob_now_elevator_device_details';

    protected $updateFrequency = 'daily';


    protected $selectables = [
        'job_filing_number',
        'device_id',
        'device_type',
        'device_status',
        'bis_nyc_device_id',
        'elevator_type',
        'elevator_sub_type',
        'travel_from_floor',
        'travel_to_floor',
        'elevator_capacity_lbs',
    ];


    protected $fillable = [
        'job_filing_device_id',
        'job_filing_number',
        'device_id',
        'device_type',
        'device_status',
        'bis_nyc_device_id',
        'elevator_type',
        'elevator_sub_type',
        'travel_from_floor',
        'travel_to_floor',
        'elevator_capacity_lbs',];

    protected $casts = [
        'job_filing_number' => 'string'
    ];

    public function insertData($result)
    {
        $result["job_filing_device_id"] = $result['job_filing_number'] . "_" . $result["device_id"];
        parent::insertData($result);
    }


    protected function getWhereString($force=false)
    {
        $array = DobNowElevatorPermits::all('job_filing_number')->pluck('job_filing_number')->unique()->flatten()->toArray();
        //$array = ["1046919", "1046920", "1046921", "1046922", "1046923", "1046924", "1046925", "1046926"];
        return $this->dataSocrataKey . ' in(' . $this->arrayToQuotedString($array) . ')';
    }

}
