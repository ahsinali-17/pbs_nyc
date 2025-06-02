<?php

namespace App\Models;

use Carbon\Carbon;

class HpdRegistrationsContacts extends ODataModel
{
    public $subject = "New HPD Registration Filed";
    public $updateSubject = "New HPD Registration Status Update";
    public $reminderSubject = "HPD Registration Status Reminder";
    public $mailview = 'mails.alerts.hpdDwellingRegistrations';
    protected $datasetId = "feu5-w2e2";
    protected $datasetName = "HPD Registrations Contacts";

    protected $dataColumn = "bin";

    protected $dataSocrataKey = "registrationid";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'registrationcontactid';

    protected $table = 'hpd_registrations_contacts';

    protected $notifiables = [
        'registrationcontactid',
        'registrationid',
        'type',
        'contactdescription',
        'corporationname',
        'title',
        'firstname',
        'middleinitial',
        'lastname',
        'businesshousenumber',
        'businessstreetname',
        'businessapartment',
        'businesscity',
        'businessstate',
        'businesszip',
    ];

    protected $selectables = [
        'registrationcontactid',
        'registrationid',
        'type',
        'contactdescription',
        'corporationname',
        'title',
        'firstname',
        'middleinitial',
        'lastname',
        'businesshousenumber',
        'businessstreetname',
        'businessapartment',
        'businesscity',
        'businessstate',
        'businesszip',
    ];

    protected $fillable = ['registrationcontactid',
        'registrationid',
        'type',
        'contactdescription',
        'corporationname',
        'title',
        'firstname',
        'middleinitial',
        'lastname',
        'businesshousenumber',
        'businessstreetname',
        'businessapartment',
        'businesscity',
        'businessstate',
        'businesszip'
    ];


    protected $casts = [
        'registrationcontactid' => 'string',
    ];

    protected function getWhereString($force=false)
    {
        $array = HpdDwellingRegistrations::all('registrationid')->pluck('registrationid')->unique()->flatten()->toArray();
        //$array = ["1046919", "1046920", "1046921", "1046922", "1046923", "1046924", "1046925", "1046926"];
        return $this->dataSocrataKey . ' in(' . $this->arrayToQuotedString($array) . ')';
    }

    public function scopeSummary($query)
    {
        return $query;
    }
}
