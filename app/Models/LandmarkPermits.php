<?php

namespace App\Models;


use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class LandmarkPermits extends ODataModel
{
    public $subject = "New LPC Permit Issued";
    public $updateSubject = "New LPC Permit Status Update";
    public $reminderSubject = "LPC Permit Status Reminder";
    public $mailview = 'mails.alerts.landmarkPermits';
    protected $datasetId = "dpm2-m9mq";
    protected $datasetName = "LPC Permit Application Information";

    protected $dataColumn = "bbl";
    protected $dataSocrataKey = "bbl";

    protected $primaryKey = 'docket';

    protected $table = 'landmark_permit_application';

    protected $notifiables = [
        "received_date",
        "issue_date",
        "expiration_date",
    ];

    protected $selectables = ["docket",
        "received_date",
        "applicant_name",
        "regulation_type",
        "issue_date",
        "borough",
        "block",
        "lot",
        "expiration_date",
    ];

    protected $fillable = ["docket",
        "address",
        'expiration_date',
        "received_date",
        "bbl",
        "borough",
        "block",
        "lot",
        "lmnametype",
        "applicant_name",
        "applicant_co",
        "applicant_address1",
        "applicant_address2",
        "applicant_zip",
        "applicant_city",
        "applicant_state",
        "owner_name",
        "owner_address1",
        "owner_address2",
        "owner_zip",
        "owner_city",
        "owner_state",
        "communityboard",
        "worktypes",
        "regulation_type",
        "issue_date",
        "xcoordinate",
        "ycoordinate",
        "latitude",
        "longitude",
        "regulation_number",
        "owner_co",
        "community_board",
        "council_district",
        "census_tract",
        "bin",
        "nta",
        "zip_code"];

    protected $casts = [
        'docket' => 'string',
    ];

    public function insertData($result)
    {
        if ($result["docket"] === "LPC-20-07253")
            return;
        $result["bbl"] = Helper::getBoroId(strtoupper($result["borough"])) . sprintf("%05d", (int)$result["block"]) . sprintf("%04d", (int)$result["lot"]);
        parent::insertData($result);
    }

    public function scopeSummary($query)
    {
        return $query;
//        return $query->where('received_date', '>', '2016-01-01T00:00:00.000');
    }

    public function receivedDate()
    {
        return Helper::carbonParseYmd($this->received_date);
    }

    public function issueDate()
    {
        return Helper::carbonParseYmd($this->issue_date);
    }

    public function expirationDate()
    {
        return Helper::carbonParseYmd($this->expiration_date);
    }

    protected function getWhereString($force = false)
    {
        if ($force) {
            $array = DB::table('bin_bbl_unique')->get();
            $sql = "";
            foreach ($array as $item) {
                $sql .= "(borough = '" . Helper::getBoroName($item->boro) . "' and block = '" . (int)$item->block . "' and lot = '" . (int)$item->lot . "') OR";
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
                    $notsyncedsql .= "(borough = '" . Helper::getBoroName($item->boro) . "' and block = '" . (int)$item->block . "' and lot = '" . (int)$item->lot . "') OR";
                }
                $notsyncedsql = substr($notsyncedsql, 0, -3);
            }

            $syncedsql = "";
            if ($synced->count()) {

                foreach ($synced as $item) {
                    $syncedsql .= "(borough = '" . Helper::getBoroName($item->boro) . "' and block = '" . (int)$item->block . "' and lot = '" . (int)$item->lot . "') OR";
                }
                $syncedsql = substr($syncedsql, 0, -3);
                $syncedsql = '(' . $syncedsql . ') and :updated_at > \'' . \Carbon\Carbon::parse($lastsync)->toDateString() . '\'';
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
