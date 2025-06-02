<?php
//TODO: Always show fail until the same violation eventually passes.
//TODO: Show pass for 30 days from inspection date for each permit number.         BU TAMAM
namespace App\Models;


use App\Helpers\Helper;
use Carbon\Carbon;

class DotSidewalkInspections extends ODataModel
{
    public $subject = "New DOT SIDEWALK Inspection Filed";
    public $updateSubject = "New DOT SIDEWALK Inspection Status Update";
    public $reminderSubject = "New DOT SIDEWALK Inspection Status Reminder";
    public $mailview = 'mails.alerts.dotSidewalkInspections';
    protected $datasetId = "p4u2-3jgx";
    protected $datasetName = "Sidewalk Dismissal Inspection Tracking";
    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";
    protected $primaryKey = 'permit_request_date';
    protected $table = 'dot_sidewalk_inspections';
    protected $updateFrequency = 'monthly';

    protected $notifiables = [
        'inspection_date',
        'pass_fail',
        'request_date',
    ];

    protected $selectables = [
        'sr',
        'bin',
        'inspection_date',
        'reason_for_failure',
        'pass_fail',
        'violation',
        'request_date',
        'permit',
    ];

    protected $fillable = [
        'permit_request_date',
        'census_tract',
        'council_district',
        'latitude',
        'postcode',
        'vdd',
        'nta',
        'borough',
        'sr',
        'bbl',
        'bin',
        'inspection_date',
        'community_board',
        'date_results_are_mailed',
        'reason_for_failure',
        'pass_fail',
        'assigned_date',
        'violation_issue_date',
        'attempt',
        'violation',
        'lot',
        'block',
        'borocode',
        'site_street_address',
        'request_date',
        'car_needed_y_n',
        'longitude',
        'homeowner_contractor',
        'permit',
        'expedited'];


    protected $casts = [
        'permit' => 'string',
        'request_date' => 'string',
    ];

    public function inspectionDate()
    {
        return Helper::carbonParseYmd($this->inspection_date);
    }

    public function insertData($result)
    {
        $result["permit_request_date"] = $result["permit"] . "_" . $result["request_date"];
        parent::insertData($result);
    }


    public function scopeSummary($query)
    {
        return $query->where('inspection_date', '>', now()->addMonths(-1)->format('Y-m-d') . "T00:00:00.000")
            ->orWhereIn('pass_fail', ['FAIL', 'fail', 'Fail', 'failed']);
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and
//        (
//           (inspection_date > '" . now()->addMonths(-1)->format('Y-m-d') . "T00:00:00.000')
//        or (pass_fail = 'FAIL' or pass_fail = 'fail' or pass_fail = 'Fail' or pass_fail = 'failed')
//        )";
//    }

}
