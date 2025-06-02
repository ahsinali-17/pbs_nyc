<?php
namespace App\Models;

use App\Helpers\Helper;
use Carbon\Carbon;

class HpdComplaintProblems extends ODataModel
{
//    public $subject = "New HPD Complaint Filed";
//    public $mailview = 'mails.alerts.hpdComplaints';
    protected $datasetId = "a2nx-4u46";
    protected $datasetName = "Housing Maintenance Code Complaints - Problems";
    protected $dataColumn = "complaintid";
    protected $dataSocrataKey = "complaintid";
    protected $updateFrequency = 'daily';

    protected $primaryKey = 'problemid';

    protected $table = 'hpd_complaint_problems';

    protected $notifiables = [
        'problemid',
        'complaintid',
        'unittypeid',
        'unittype',
        'spacetypeid',
        'spacetype',
        'typeid',
        'type',
        'majorcategoryid',
        'majorcategory',
        'minorcategoryid',
        'minorcategory',
        'codeid',
        'code',
        'statusid',
        'status',
        'statusdate',
        'statusdescription',
    ];

    protected $selectables = [
        'problemid',
        'complaintid',
        'unittypeid',
        'unittype',
        'spacetypeid',
        'spacetype',
        'typeid',
        'type',
        'majorcategoryid',
        'majorcategory',
        'minorcategoryid',
        'minorcategory',
        'codeid',
        'code',
        'statusid',
        'status',
        'statusdate',
        'statusdescription',
    ];


    protected $fillable = [
        'problemid',
        'complaintid',
        'unittypeid',
        'unittype',
        'spacetypeid',
        'spacetype',
        'typeid',
        'type',
        'majorcategoryid',
        'majorcategory',
        'minorcategoryid',
        'minorcategory',
        'codeid',
        'code',
        'statusid',
        'status',
        'statusdate',
        'statusdescription',
    ];




    protected $casts = [
        'problemid' => 'string',
    ];


    protected function getWhereString($force=false)
    {
        $array = HpdComplaints::all('complaintid')->pluck('complaintid')->unique()->flatten()->toArray();
        //$array = ["1046919", "1046920", "1046921", "1046922", "1046923", "1046924", "1046925", "1046926"];
        return $this->dataSocrataKey . ' in(' . $this->arrayToQuotedString($array) . ')';
    }

    public function statusDate()
    {
        return Helper::carbonParseYmd($this->statusdate);
    }
}
