<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HpdAnnualMailing extends Model
{
    protected $table = 'hpd_annual_mailings';

    protected $fillable = [
        'inspection_type',
        'apartment_number',
        'tenant_first_name',
        'tenant_middle_name',
        'tenant_last_name',
        'tenant_address',
        'tenant_phone',
        'owner_name',
        'owner_phone',
        'owner_address',
        'mailing_notice',
        'status',
        'sending_address',
        'construction_year',
        'construction_type',
        'floor_number_above_ground',
        'floor_number_below_ground',
        'sprinkler_system',
        'sprinkler_coverage',
        'sc_dwelling_units',
        'sc_hallways',
        'sc_stairwells',
        'sc_chute',
        'sc_other',
        'alarm_status',
        'manual_pull_station',
        'pa_status',
        'speaker_location',
        'speaker_location_other',
        'egress',
        'other_information',
        'date_prepared',
        'due_date',
        'mail_send_date',
        'last_alert_date',
        'wg_ap_a_check',
        'wg_ap_b_under_ten',
        'wg_ap_b_not_under_ten',
        'wg_ap_b_installed',
        'wg_ap_b_not_installed',
        'wg_ap_b_i_want_guard',
        'wg_ap_b_need_repair',
        'wg_ap_b_not_need_repair',
        'lead_five_to_ten',
    ];

    protected $casts = [
        'date_prepared' => 'datetime',
        'due_date' => 'datetime',
        'mail_send_date' => 'datetime',
        'last_alert_date' => 'datetime'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(HpdAnnualMailingFiles::class, 'mailing_id', 'id');
    }
}
