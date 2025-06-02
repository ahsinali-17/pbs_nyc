<?php

namespace App\Models;


class DobNowJobFilings extends ODataModel
{
    public $subject = "New DOB Now Job Filed";
    public $updateSubject = "New DOB Now Job Status Update";
    public $reminderSubject = "DOB Now Job Reminder";
    public $mailview = 'mails.alerts.dobNowJobFilings';
    protected $datasetId = "w9ak-ipjd";
    protected $datasetName = "DOB NOW: Build – Job Application Filings";

    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";

    protected $updateFrequency = 'daily';

    protected $primaryKey = 'job_filing_number';

    protected $table = 'dob_now_job_filings';

    protected $notifiables = [
        'filing_status',
    ];

    protected $selectables = ['job_filing_number',
        'filing_status',
        'bin',
        'work_on_floor',
        'applicant_license',
        'applicant_first_name',
        'applicant_last_name'
    ];

    protected $fillable = ['job_filing_number',
        'filing_status',
        'house_no',
        'street_name',
        'borough',
        'block',
        'lot',
        'bin',
        'commmunity_board',
        'work_on_floor',
        'apt_condo_no_s',
        'applicant_professional_title',
        'applicant_license',
        'applicant_first_name',
        'applicants_middle_initial',
        'applicant_last_name',
        'owner_s_business_name',
        'owner_s_street_name',
        'city',
        'state',
        'zip',
        'filing_representative_first_name',
        'filing_representative_middle_initial',
        'filing_representative_last_name',
        'filing_representative_business_name',
        'filing_representative_street_name',
        'filing_representative_city',
        'filing_representative_state',
        'filing_representative_zip',
        'sprinkler_work_type',
        'plumbing_work_type',
        'initial_cost',
        'total_construction_floor_area',
        'review_building_code',
        'little_e',
        'unmapped_cco_street',
        'request_legalization',
        'includes_permanent_removal',
        'in_compliance_with_nycecc',
        'exempt_from_nycecc',
        'building_type',
        'existing_stories',
        'existing_height',
        'existing_dwelling_units',
        'proposed_no_of_stories',
        'proposed_height',
        'proposed_dwelling_units',
        'specialinspectionrequirement',
        'special_inspection_agency_number',
        'progressinspectionrequirement',
        'built_1_information_value',
        'built_2_information_value',
        'built_2_a_information_value',
        'built_2_b_information_value',
        'standpipe',
        'antenna',
        'curb_cut',
        'sign',
        'fence',
        'scaffold',
        'shed',
        'latitude',
        'longitude',
        'council_district',
        'census_tract',
        'nta',
        'bin_2'];


    protected $casts = [
        'job_filing_number' => 'string',
    ];


    public function scopeSummary($query)
    {
        return $query->where('filing_status', '!=', 'LOC Issued')
            ->where('filing_status', '!=', 'TA Certificates of Operation Issued');
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and (
//        filing_status != 'LOC Issued'
//        and filing_status != 'TA Certificate of Operation Issued'
//        )";
//        // TODO: Tarihi 6 ay öncesinden büyük olanları veya statusu pending - initial/new - continued - continuedcontinued olanları getiriyor.
//    }

}
