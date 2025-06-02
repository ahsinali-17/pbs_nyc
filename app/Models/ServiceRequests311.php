<?php
//TODO: Remove department of homeless services from our alerts, I have realized how unnecessary it is.
// TODO: Closed status can be removed 1 week after resolution update date.
//TODO: Lets remove both Taxi alert sections as well. I find it to be unnecessary now that I review the types of alerts it sends.
//TODO: Remove panhandling if possible. I do want to keep NYPD 100% but I do not think we need panhandling complaint type.
//TODO: Jon karar verecek.
namespace App\Models;

use App\Helpers\Helper;

class ServiceRequests311 extends ODataModel
{
    public $subject = "New 311 SERVICE REQUESTS Record Filed";
    public $updateSubject = "New 311 SERVICE REQUESTS Record Update";
    public $reminderSubject = "311 SERVICE REQUESTS Record Reminder";
    public $mailview = 'mails.alerts.serviceRequests311';
    protected $datasetId = "erm2-nwe9";
    protected $datasetName = "311 Service Requests from 2010 to Present";
    protected $dataColumn = "bbl";
    protected $dataSocrataKey = "bbl";
    protected $updateFrequency = 'daily';
    protected $table = 'service_requests';
    protected $primaryKey = 'unique_key';
    protected $notifiables = [
        'created_date',
        'closed_date',
        'status',
//        'resolution_action_updated_date',
    ];
    protected $selectables = ['unique_key',
        'created_date',
        'closed_date',
        'agency',
        'complaint_type',
        'descriptor',
        'status',
        'resolution_description',
        'resolution_action_updated_date',
        'bbl',
    ];
    protected $fillable = ['unique_key',
        'created_date',
        'closed_date',
        'agency',
        'agency_name',
        'complaint_type',
        'descriptor',
        'location_type',
        'incident_zip',
        'incident_address',
        'street_name',
        'cross_street_1',
        'cross_street_2',
        'intersection_street_1',
        'intersection_street_2',
        'address_type',
        'city',
        'landmark',
        'facility_type',
        'status',
        'due_date',
        'resolution_description',
        'resolution_action_updated_date',
        'community_board',
        'bbl',
        'borough',
        'x_coordinate_state_plane',
        'y_coordinate_state_plane',
        'open_data_channel_type',
        'park_facility_name',
        'park_borough',
        'vehicle_type',
        'taxi_company_borough',
        'taxi_pick_up_location',
        'bridge_highway_name',
        'bridge_highway_direction',
        'road_ramp',
        'bridge_highway_segment',
        'latitude',
        'longitude'];
    protected $casts = [
        'unique_key' => 'string',
    ];

    public function createdDate()
    {
        return Helper::carbonParseYmd($this->created_date);
    }

    public function resolutionActionUpdatedDate()
    {
        return Helper::carbonParseYmd($this->resolution_action_updated_date);
    }

    public function closedDate()
    {
        return Helper::carbonParseYmd($this->closed_date);
    }

    public function getMailSubject($isUpdate)
    {
        if ($isUpdate) {
            if ($this->agency) {
                return "New " . $this->agency . " Complaint Status Update";
            } else {
                return $this->subject;
            }
        } else {
            if ($this->agency) {
                return "New " . $this->agency . " Complaint Filed";
            } else {
                return $this->updateSubject;
            }
        }
    }

//    protected function getWhereString()
//    {
//        return parent::getWhereString() . " and created_date > '2018-01-01T00:00:00.000'";
//    }


    public function scopeSummary($query)
    {
        return $query;
//        return $query->where('created_date', '>', '2018-01-01T00:00:00.000');
    }

    public function scopeClosed($query)
    {
        return $query->where('status', '!=', 'Closed');
    }

}
