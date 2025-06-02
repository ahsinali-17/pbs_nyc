<?php

namespace App\Models;

class HpdJurisdiction extends ODataModel
{
    protected $datasetId = "kj4p-ruqc";
    protected $datasetName = "Buildings Subject to HPD Jurisdiction";

    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";

    protected $primaryKey = 'buildingid';

    protected $table = 'hpd_juristiction';

    protected $notifiables = ['dobbuildingclass',
        'dobbuildingclassid',
        'streetname',
        'legalstories',
        'legalclassb',
        'registrationid',
        'recordstatusid',
        'recordstatus',
        'zip',
        'block',
        'lot',
        'boroid',
        'bin',
        'communityboard',
        'censustract',
        'managementprogram',
        'boro',
        'legalclassa',
        'lifecycle',
        'buildingid',
        'housenumber',
        'lowhousenumber',
        'highhousenumber'];

    protected $selectables = ['dobbuildingclass',
        'dobbuildingclassid',
        'streetname',
        'legalstories',
        'legalclassb',
        'registrationid',
        'recordstatusid',
        'recordstatus',
        'zip',
        'block',
        'lot',
        'boroid',
        'bin',
        'communityboard',
        'censustract',
        'managementprogram',
        'boro',
        'legalclassa',
        'lifecycle',
        'buildingid',
        'housenumber',
        'lowhousenumber',
        'highhousenumber'];

    protected $fillable = ['dobbuildingclass',
        'dobbuildingclassid',
        'streetname',
        'legalstories',
        'legalclassb',
        'registrationid',
        'recordstatusid',
        'recordstatus',
        'zip',
        'block',
        'lot',
        'boroid',
        'bin',
        'communityboard',
        'censustract',
        'managementprogram',
        'boro',
        'legalclassa',
        'lifecycle',
        'buildingid',
        'housenumber',
        'lowhousenumber',
        'highhousenumber'];


    protected $casts = [
        'buildingid' => 'string',
    ];


    public function scopeSummary($query)
    {
        return $query;
    }
}
