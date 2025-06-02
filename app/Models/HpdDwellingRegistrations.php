<?php

namespace App\Models;

use App\Helpers\Helper;

class HpdDwellingRegistrations extends ODataModel
{
    public $subject = "New HPD Registration Filed";
    public $updateSubject = "New HPD Registration Status Update";
    public $reminderSubject = "HPD Registration Status Reminder";
    public $mailview = 'mails.alerts.hpdDwellingRegistrations';
    protected $datasetId = "tesw-yqqr";
    protected $datasetName = "Multiple Dwelling Registrations";

    protected $dataColumn = "bin";

    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'registrationid';

    protected $table = 'hpd_dwelling_registrations';

    protected $notifiables = [];

    protected $selectables = [
        'lastregistrationdate',
        'registrationid',
        'bin',
        'registrationenddate',
    ];

    protected $fillable = ['lastregistrationdate',
        'streetcode',
        'block',
        'lot',
        'housenumber',
        'buildingid',
        'registrationid',
        'streetname',
        'highhousenumber',
        'boro',
        'boroid',
        'communityboard',
        'bin',
        'registrationenddate',
        'lowhousenumber',
        'zip'];


    protected $casts = [
        'registrationid' => 'string',
    ];


    public function scopeSummary($query)
    {
        return $query;
    }

    public function lastregistrationDate()
    {
        return Helper::carbonParseYmd($this->lastregistrationdate);
    }

    public function registrationendDate()
    {
        return Helper::carbonParseYmd($this->registrationenddate);
    }


    public function contacts()
    {
        return $this->hasMany('\App\Models\HpdRegistrationsContacts', 'registrationid', 'registrationid');
    }
}
