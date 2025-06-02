<?php

namespace App\Models;

use App\Helpers\Helper;
use Carbon\Carbon;

class DotSidewalkCorrespondences extends ODataModel
{
    public $subject = "New DOT SIDEWALK Record Filed";
    public $updateSubject = "New DOT SIDEWALK Records Update";
    public $reminderSubject = "DOT SIDEWALK Record Reminder";
    public $mailview = 'mails.alerts.dotSidewalkCorrespondences';
    protected $datasetId = "bheb-sjfi";
    protected $datasetName = "Sidewalk Correspondences";

    protected $dataColumn = "bbl";
    protected $dataSocrataKey = "bbl";

    protected $primaryKey = 'date_received_bbl';

    protected $table = 'dot_sidewalk_correspondences';

    protected $updateFrequency = 'monthly';

    protected $notifiables = [
        'issue',
        'other_log',
        'date_closed',];

    protected $selectables = [
        'bbl',
        'issue',
        'other_log',
        'date_closed',
        'date_received'];


    protected $fillable = [
        'date_received_bbl',
        'ccu',
        'nta',
        'longitude',
        'violation',
        'bbl',
        'council_district',
        'cross_streets',
        'issue',
        'bc',
        'sim',
        'borough',
        'osm',
        'other_log',
        'referred_routed_to',
        'date_closed',
        'postcode',
        'class',
        'community_board',
        'results_of_inspection',
        'address',
        'resoultion',
        'bin',
        'census_tract',
        'latitude',
        'lot',
        'block',
        'date_received'];


    protected $casts = [
        'date_received' => 'string',
        'bbl' => 'string',
    ];

    public function dateReceived()
    {
        return Helper::carbonParseYmd($this->date_received);
    }

    public function insertData($result)
    {
        $result["date_received_bbl"] = $result["date_received"] . "_" . $result["bbl"];
        parent::insertData($result);
    }


    public function scopeSummary($query)
    {
        return $query->where('date_received', '>', '2018-01-01T00:00:00.000');
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and date_received > '2018-01-01T00:00:00.000'";
//    }
}
