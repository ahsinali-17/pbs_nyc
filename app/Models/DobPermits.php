<?php

namespace App\Models;


use App\Helpers\Helper;
use Carbon\Carbon;

class DobPermits extends ODataModel
{
    public $subject = "New Dob Permit Issued";
    public $updateSubject = "New Dob Permit Status Update";
    public $reminderSubject = "Dob Permit Status Reminder";
    public $mailview = 'mails.alerts.dobPermits';
    protected $datasetId = "ipu4-2q9a";
    protected $datasetName = "DOB Permit Issuance";

    protected $dataColumn = "bin";
    public $dataSocrataKey = "bin__";

    protected $primaryKey = 'permit_si_no';

    protected $table = 'dob_permit_issuance';

    protected $updateFrequency = 'daily';

    protected $maps = [
        'bin__' => 'bin',
    ];

    protected $appends =['bin'];


    protected $notifiables = [
        "permit_status",
        "filing_date",
        "issuance_date",
        "expiration_date",
    ];

    protected $selectables = ["bin__",
        "job__",
        "work_type",
        "permit_status",
        "filing_date",
        "issuance_date",
        "expiration_date",
        "permittee_s_first_name",
        "permittee_s_last_name",
        "permittee_s_business_name",
        "permittee_s_license__",
        "dobrundate",
        "permit_si_no",
    ];


    protected $fillable = ["borough",
        "bin__",
        "house__",
        "street_name",
        "job__",
        "job_doc___",
        "job_type",
        "self_cert",
        "block",
        "lot",
        "community_board",
        "zip_code",
        "bldg_type",
        "residential",
        "special_district_1",
        "special_district_2",
        "work_type",
        "permit_status",
        "filing_status",
        "permit_type",
        "permit_sequence__",
        "permit_subtype",
        "oil_gas",
        "site_fill",
        "filing_date",
        "issuance_date",
        "expiration_date",
        "job_start_date",
        "permittee_s_first_name",
        "permittee_s_last_name",
        "permittee_s_business_name",
        "permittee_s_phone__",
        "permittee_s_license_type",
        "permittee_s_license__",
        "act_as_superintendent",
        "permittee_s_other_title",
        "hic_license",
        "site_safety_mgr_s_first_name",
        "site_safety_mgr_s_last_name",
        "site_safety_mgr_business_name",
        "superintendent_first___last_name",
        "superintendent_business_name",
        "owner_s_business_type",
        "non_profit",
        "owner_s_business_name",
        "owner_s_first_name",
        "owner_s_last_name",
        "owner_s_house__",
        "owner_s_house_street_name",
        "city",
        "state",
        "owner_s_zip_code",
        "owner_s_phone__",
        "dobrundate",
        "permit_si_no",
        "gis_latitude",
        "gis_longitude",
        "gis_council_district",
        "gis_census_tract",
        "gis_nta_name"];


    protected $casts = [
        'bin__' => 'string',
    ];

    public static function getWorkType($worktype)
    {
        switch ($worktype) {
            case "BL":
                return "Boiler";
                break;
            case "CC":
                return "Curb Cut";
                break;
            case "EQ":
                return "Construction Equipment";
                break;
            case "FA":
                return "Fire Alarm";
                break;
            case "FB":
                return "Fuel Burning";
                break;
            case "FP":
                return "Fire Suppression";
                break;
            case "FS":
                return "Fuel Storage";
                break;
            case "MH":
                return "Mechanical/HVAC";
                break;
            case "NB":
                return "New Building";
                break;
            case "OT":
                return "Other";
                break;
            case "PL":
                return "Plumbing";
                break;
            case "SD":
                return "Standpipe";
                break;
            case "SP":
                return "Sprinkler";
                break;
            default:
                return $worktype;
                break;
        }
    }

    public static function getPermitType($permitType)
    {
        switch ($permitType) {
            case "AL":
                return "Alteration";
                break;
            case "DM":
                return "Demolition";
                break;
            case "EQ":
                return "Construction Equipment";
                break;
            case "EW":
                return "Equipment Work";
                break;
            case "FO":
                return "Foundation";
                break;
            case "NB":
                return "New Building";
                break;
            case "Pl":
                return "Plumbing";
                break;
            case "SG":
                return "Sign";
                break;
            default:
                return $permitType;
                break;
        }
    }

    public static function getPermitSubType($permitSubType)
    {
        switch ($permitSubType) {
            case "BL":
                return "Boiler";
                break;
            case "CH":
                return "Chute";
                break;
            case "EA":
                return "Earthwork";
                break;
            case "FA":
                return "Fire Alarm";
                break;
            case "FB":
                return "Fuel Burning";
                break;
            case "FN":
                return "Fence";
                break;
            case "FP":
                return "Fire Suppression";
                break;
            case "FS":
                return "Fuel Storage";
                break;
            case "MH":
                return "Mechanical/HVAC";
                break;
            case "OT":
                return "Other";
                break;
            case "SF":
            case "SC":
                return "Scaffold";
                break;
            case "SD":
                return "Standpipe";
                break;
            case "SH":
                return "Sidewalk Shed";
                break;
            case "SP":
                return "Sprinkler";
                break;
            default:
                return $permitSubType;
                break;
        }
    }

    public function filingDate()
    {
        return Carbon::parse($this->filing_date)->format("Y-m-d");
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and filing_date > '" . now()->addMonths(-1)->format('Y-m-d') . "T00:00:00.000'"; // TODO: Change the autogenerated stub
//    }

    public function issuanceDate()
    {
        return Helper::carbonParseYmd($this->issuance_date);
    }

    public function expirationDate()
    {
        return Helper::carbonParseYmd($this->expiration_date);
    }

    public function scopeSummary($query)
    {
        return $query->where('filing_date', '>', now()->addMonths(-1)->format('Y-m-d') . "T00:00:00.000");
    }

    public function getBinAttribute()
    {
        return $this->attributes['bin__'];
    }

}
