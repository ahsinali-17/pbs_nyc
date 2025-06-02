<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class HpdComplaints extends ODataModel
{
    public $subject = "New HPD Complaint Filed";
    public $updateSubject = "New HPD Complaint Status Update";
    public $reminderSubject = "HPD Complaint Status Reminder";
    public $mailview = 'mails.alerts.hpdComplaints';
    protected $datasetId = "uwyv-629c";
    protected $datasetName = "Housing Maintenance Code Complaints";
    protected $dataColumn = "bbl";
    protected $dataSocrataKey = "bbl";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'complaintid';

    protected $table = 'hpd_complaints';

    protected $notifiables = [
        'receiveddate',
        'status',
        'statusdate',
    ];

    protected $selectables = ['complaintid',
        'buildingid',
        'apartment',
        'receiveddate',
        'status',
        'statusdate',
        'boroughid',
        'block',
        'lot',
    ];


    protected $fillable = ['complaintid',
        'buildingid',
        'boroughid',
        'borough',
        'housenumber',
        'streetname',
        'zip',
        'block',
        'lot',
        'apartment',
        'communityboard',
        'receiveddate',
        'statusid',
        'status',
        'statusdate',
        'bbl'];


    protected $casts = [
        'complaintid' => 'string',
    ];


    public function complaintProblems()
    {
        return $this->hasMany('\App\Models\HpdComplaintProblems', 'complaintid', 'complaintid');
    }

    public function insertData($result)
    {
        $result["bbl"] = $result["boroughid"] . sprintf("%05d", (int)$result["block"]) . sprintf("%04d", (int)$result["lot"]);
        parent::insertData($result);
    }

    public function scopeSummary($query)
    {
        return $query->where(function ($query) {
            $query->where(function ($query) {
                $query->where('status', '=', 'CLOSE')
                    ->where('statusdate', '>', now()->addMonths(-1)->format('Y-m-d') . "T00:00:00.000");
            })
                ->orWhere('status', '=', 'OPEN');
        });
    }

    public function receivedDate()
    {
        return Helper::carbonParseYmd($this->receiveddate);
    }

    public function statusDate()
    {
        return Helper::carbonParseYmd($this->statusdate);
    }

    protected function getWhereString($force = false)
    {
        if ($force) {

            $array = DB::table('bin_bbl_unique')->get();
            $sql = "";
            foreach ($array as $item) {
                $sql .= "(boroughid = '" . $item->boro . "' and block = '" . (int)$item->block . "' and lot = '" . (int)$item->lot . "') OR";
            }
            $sql = substr($sql, 0, -3);
            return $sql;
        } else {


            $notsynced = DB::table('bin_bbl_unique')->where('sync_at', null)->get();
            $synced = DB::table('bin_bbl_unique')->where('sync_at', '!=', null)->get();
            $lastsync = $synced->pluck('sync_at')->min();

            $notsyncedsql = "";
            if ($notsynced->count()) {

                foreach ($notsynced as $item) {
                    $notsyncedsql .= "(boroughid = '" . $item->boro . "' and block = '" . (int)$item->block . "' and lot = '" . (int)$item->lot . "') OR";
                }
                $notsyncedsql = substr($notsyncedsql, 0, -3);
            }

            $syncedsql = "";
            if ($synced->count()) {

                foreach ($synced as $item) {
                    $syncedsql .= "(boroughid = '" . $item->boro . "' and block = '" . (int)$item->block . "' and lot = '" . (int)$item->lot . "') OR";
                }
                $syncedsql = substr($syncedsql, 0, -3);
                $syncedsql = '(' . $syncedsql . ') and :updated_at > \'' . \Carbon\Carbon::parse($lastsync)->addDays(-14)->toDateString() . '\'';
            }


            if ($notsynced->count() && $synced->count())
                return "(" . $syncedsql . ") or (" . $notsyncedsql . ")";
            elseif ($synced->count())
                return $syncedsql;
            else
                return $notsyncedsql;
        }
    }
}
