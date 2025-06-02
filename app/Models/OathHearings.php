<?php
//TODO: Defaulted show for 1 year from decision date (this is expiration time to reopen the case). If possible we can alert them after default result they have 60 days to reopen the case. Is this possible? :)
//TODO: IN VIOLATION-> Remove if in violation AND paid in full
//TODO: Stipulated show for 30 days from decision date.
//TODO: Dismissed show for 30 days from decision date.
//TODO: NONE iseeeee -> Always keep and remind them of the upcoming hearing as discussed.
//TODO:      YUKARDAKİLER hearing resultta aşşadakiler hearing status
//TODO:If Written Off only show for 30 days from decision date. Another date I missed and just noticed, very sorry. OATH section should include Decision Date column. Date only, not the time.
//TODO:If corresponding ticket number is CURED in the ecb violation section we can remove this violation from this section.
//TODO: IF DOS is paid in full it can be removed after 30 days from this section.
//TODO: JONDAN HEPİİSİ İÇİN HABER BEKLİYOK
namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class OathHearings extends ODataModel
{
    public $subject = "New OATH HEARINGS Record Filed";
    public $updateSubject = "New OATH HEARINGS Status Update";
    public $reminderSubject = "OATH HEARINGS Status Reminder";
    public $mailview = 'mails.alerts.oathHearings';
    public $incrementing = false;
    protected $datasetId = "jz4z-kudi";
    protected $datasetName = "OATH Hearings Division Case Status";
    protected $dataColumn = "bbl";
    protected $dataSocrataKey = "bbl";
    protected $primaryKey = 'ticket_number';
    protected $table = 'oath_hearings';
    protected $with = ['ecbViolation'];
    protected $keyType = 'string';

    protected $notifiables = [
        'violation_date',
        'hearing_status',
        'hearing_result',
        'hearing_date',
        'penalty_imposed',
        'compliance_status',
        'balance_due',
    ];
    protected $selectables = ['ticket_number',
        'violation_date',
        'issuing_agency',
        'respondent_first_name',
        'respondent_last_name',
        'hearing_status',
        'hearing_result',
        'scheduled_hearing_location',
        'hearing_date',
        'violation_description',
        'charge_1_code_description',
        'violation_location_borough',
        'violation_location_block_no',
        'violation_location_lot_no',
        'penalty_imposed',
        'compliance_status',
        'balance_due',
    ];

    protected $fillable = ['ticket_number',
        'violation_date',
        'violation_time',
        'issuing_agency',
        'respondent_first_name',
        'respondent_last_name',
        'balance_due',
        'violation_location_borough',
        'violation_location_block_no',
        'violation_location_lot_no',
        'violation_location_house',
        'violation_location_street_name',
        'violation_location_floor',
        'violation_location_city',
        'violation_location_zip_code',
        'violation_location_state_name',
        'respondent_address_borough',
        'respondent_address_house',
        'respondent_address_street_name',
        'respondent_address_city',
        'respondent_address_zip_code',
        'respondent_address_state_name',
        'hearing_status',
        'hearing_result',
        'scheduled_hearing_location',
        'hearing_date',
        'hearing_time',
        'decision_location_borough',
        'decision_date',
        'total_violation_amount',
        'violation_details',
        'date_judgment_docketed',
        'respondent_address_or_facility_number_for_fdny_and_dob_tickets',
        'penalty_imposed',
        'paid_amount',
        'additional_penalties_or_late_fees',
        'compliance_status',
        'violation_description',
        'charge_1_code',
        'charge_1_code_section',
        'charge_1_code_description',
        'charge_1_infraction_amount',
        'charge_2_code',
        'charge_2_code_section',
        'charge_2_code_description',
        'charge_2_infraction_amount',
        'charge_3_code',
        'charge_3_code_section',
        'charge_3_code_description',
        'charge_3_infraction_amount',
        'charge_4_code',
        'charge_4_code_section',
        'charge_4_code_description',
        'charge_4_infraction_amount',
        'charge_5_code',
        'charge_5_code_section',
        'charge_5_code_description',
        'charge_5_infraction_amount',
        'charge_6_code',
        'charge_6_code_section',
        'charge_6_code_description',
        'charge_6_infraction_amount',
        'charge_7_code',
        'charge_7_code_section',
        'charge_7_code_description',
        'charge_7_infraction_amount',
        'charge_8_code',
        'charge_8_code_section',
        'charge_8_code_description',
        'charge_8_infraction_amount',
        'charge_9_code',
        'charge_9_code_section',
        'charge_9_code_description',
        'charge_9_infraction_amount',
        'charge_10_code',
        'charge_10_code_section',
        'charge_10_code_description',
        'charge_10_infraction_amount',
        'bbl'];


    protected $casts = [
        'ticket_number' => 'string',
        'viol_number' => 'string',
    ];
    protected $appends = ['viol_number'];

    public function getViolNumberAttribute()
    {
        return substr($this->ticket_number, 1);
    }

    public function ecbViolation()
    {
        return $this->hasOne(EcbViolations::class, 'ecb_violation_number', 'viol_number');
    }

    public function violationDate()
    {
        return Helper::carbonParseYmd($this->violation_date);
    }

    public function hearingDate()
    {
        return Helper::carbonParseYmd($this->hearing_date);
    }

    public function scopeFdny($query)
    {
        $list = ['FIRE DEPARTMENT', 'FIRE DEPARTMENT OF NYC'];
        return $query->whereIn('issuing_agency', $list);
    }

    public function scopeSanitation($query)
    {
        $list = ['SANITATION DEPT', 'SANITATION ENVIRON. POLICE', 'SANITATION OTHERS', 'SANITATION PIU',
            'SANITATION POLICE', 'SANITATION RECYCLING', 'DSNY - SANITATION ENFORCEMENT AGENTS', 'DSNY - SANITATION OTHERS'];
        return $query->whereIn('issuing_agency', $list);
    }

    public function scopePolice($query)
    {
        $list = ['POLICE DEPARTMENT',
            'POLICE DEPT',
            'DEP. POLICE'];
        return $query->whereIn('issuing_agency', $list);
    }

    public function scopeDohmh($query)
    {
        $list = ['812 - DOHMH', 'ASBESTOS CONTROL PROGRAM', 'DEPT OF HEALTH', 'DOHMH - LEAD',
            'DOHMH - OFFICE OF ENVIRONMENTAL INVESTIGATION', 'DOHMH - PEST CONTROL', 'DOHMH - PEST CONTROL SERVICES',
            'DOHMH - PUBLIC HEALTH ENGINEERING', 'DOHMH - TRIBUNAL', 'HAZ. MATERIALS', 'PCS - DOHMH',
            'WATER TANK - DOHMH'];
        return $query->whereIn('issuing_agency', $list);
    }

    public function scopeBuilding($query)
    {
        $list = ['BUILDINGS DEPARTMENT',
            'DEPARTMENT OF BUILDINGS',
            'DEPT OF BLDGS',
            'DEPT. OF BUILDINGS'];
        return $query->whereIn('issuing_agency', $list);
    }

    public function scopeParkPorts($query)
    {
        $list = ['DEPT OF PORTS AND TERMINALS',
            'DEPT OF TRAN',
            'DEPT OF TRANSPORTATION',
            'NYPD TRANSPORT INTELLIGENCE DI',
            'PARKS AND RECR',
            'PARKS DEPARTMENT'];
        return $query->whereIn('issuingagency', $list);
    }

    public function scopeHpdDdc($query)
    {
        $list = ['NYC DDC',
            'HPD',
            'LANDMARKS PRESERVATION'];
        return $query->whereIn('issuing_agency', $list);
    }

    public function scopeOthers($query)
    {
        $list = ['DEPT OF CONSUMER AFFAIRS',
            'DOS - ENFORCEMENT AGENTS'];
        return $query->whereIn('issuing_agency', $list);
    }

    public function getPdfLink()
    {
        return 'http://a820-ecbticketfinder.nyc.gov/GetViolationImage?violationNumber=' . $this->ticket_number;
    }

    public function insertData($result)
    {
        $result["bbl"] = Helper::getBoroId($result["violation_location_borough"]) . $result["violation_location_block_no"] . $result["violation_location_lot_no"];
        parent::insertData($result); // TODO: Change the autogenerated stub
    }
//
//    protected function insertSyncData($results)
//    {
//        foreach ($results as $result) {
//            $result["bbl"] = Helper::getBoroId($result["violation_location_borough"]) . $result["violation_location_block_no"] . $result["violation_location_lot_no"];
//            //self::updateOrCreate([self::getKeyName() => $result[self::getKeyName()]], $result);
//            $this->insertData($result);
//        }
//    }

    public function scopeSummary($query)
    {
        return $query
            ->whereRaw("hearing_result <> 'HEARING COMPLETED' and hearing_result <> 'WRITTEN OFF' and hearing_status <> 'WRITTEN OFF'
            and not (
            (
            hearing_status = 'HEARING COMPLETED'
            or hearing_status = 'STAYED'
            or hearing_status = 'DEFAULTED'
            or hearing_status = 'DOCKETED'
            or hearing_status = 'PAID IN FULL'
            or hearing_status = 'APPEAL DECIS RENDERD'
            )
            and hearing_date::date < (NOW() - INTERVAL '90 DAY'))
            and not (
            (
            hearing_result like 'DEFAULT%'
            or hearing_result = 'DEFAULT'
            or hearing_result = 'STIPULATED'
            )
            and hearing_date::date < (NOW() - INTERVAL '90 DAY'))
            and not (hearing_result = 'IN VIOLATION' and hearing_status = 'PAID IN FULL' and hearing_date::date < (NOW() - INTERVAL '90 DAY'))
            ");
    }

    public function scopeImposed($query)
    {
//        Str::contains($item->hearing_result, 'IN VIOLATION')
//        || Str::contains($item->hearing_result, 'in violation')
//        || Str::contains($item->hearing_result, 'In Violation')
        return $query->where('hearing_result', 'LIKE', '%IN%VIOLATION%');
    }


    protected function getWhereString($force=false)
    {
        if($force) {
            $array = DB::table('bin_bbl_unique')->get();
            $sql = "";
            foreach ($array as $item) {
                $sql .= "(violation_location_borough = '" . Helper::getBoroName($item->boro) . "' and violation_location_block_no = '" . $item->block . "' and violation_location_lot_no = '" . $item->lot . "') OR";
            }
            $sql = substr($sql, 0, -3);
//        $str .= " and hearing_date > '2018-01-01T00:00:00.000'";
            return $sql;
        }
        else {


            $notsynced = DB::table('bin_bbl_unique')->where('sync_at', null)->get();
            $synced = DB::table('bin_bbl_unique')->where('sync_at', '!=', null)->get();
            $lastsync = $synced->pluck('sync_at')->min();

            $notsyncedsql = "";
            if ($notsynced->count()) {

                foreach ($notsynced as $item) {
                    $notsyncedsql .= "(violation_location_borough = '" . Helper::getBoroName($item->boro) . "' and violation_location_block_no = '" . $item->block . "' and violation_location_lot_no = '" . $item->lot . "') OR";
                }
                $notsyncedsql = substr($notsyncedsql, 0, -3);
            }

            $syncedsql = "";
            if ($synced->count()) {

                foreach ($synced as $item) {
                    $syncedsql .= "(violation_location_borough = '" . Helper::getBoroName($item->boro) . "' and violation_location_block_no = '" . $item->block . "' and violation_location_lot_no = '" . $item->lot . "') OR";
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
