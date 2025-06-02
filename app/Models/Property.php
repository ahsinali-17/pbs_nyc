<?php

namespace App\Models;

use App\Helpers\Helper;
use App\PropertyDocuments;
use App\PropertyNotes;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Property extends Model
{

    protected $fillable = ['bin', 'bbl', 'boro', 'block', 'lot', 'house_number', 'stname', 'lat', 'lng', 'zipcode', 'sync_at', 'contact_name', 'contact_address', 'contact_number', 'photo', 'alerted_at'];

    protected $casts = [
        'sync_at' => 'datetime',
        'alerted_at' => 'datetime'
    ];

    protected $with = [
        //"address",
        "bsaApplicationStatus",
        "depCatsPermits",
        "dobCertOccupancy",
        "dobComplaints",
        "dobJobFilings",
        "dobNowApprovedPermits",
        "dobNowElectricalPermits",
        "dobNowElevatorPermits",
        "dobNowFacadeFilings",
        "dobNowJobFilings",
        "dobNowSafetyBoiler",
        "dobPermits",
        "dobViolations",
        "dotSidewalkCorrespondences",
        "dotSidewalkInspections",
        "ecbViolations",
        "fdnyActiveViolOrders",
        "fdnyCertOfFitness",
        "fdnyInspections",
        "hpdComplaints",
        "hpdDwellingRegistrations",
        "hpdHousingLitigations",
        "hpdJurisdiction",
        "hpdRepairVacateOrders",
        "hpdViolations",
        "landmarkComplaints",
        "landmarkPermits",
        "landmarkViolations",
        "oathHearings",
        "serviceRequests311",
        "otherInspections"
    ];

    protected $withCount = [
        //"address",
        "bsaApplicationStatus",
        "depCatsPermits",
        "dobCertOccupancy",
        "dobComplaints",
        "dobJobFilings",
        "dobNowApprovedPermits",
        "dobNowElectricalPermits",
        "dobNowElevatorPermits",
        "dobNowFacadeFilings",
        "dobNowJobFilings",
        "dobNowSafetyBoiler",
        "dobPermits",
        "dobViolations",
        "dotSidewalkCorrespondences",
        "dotSidewalkInspections",
        "ecbViolations",
        "fdnyActiveViolOrders",
        "fdnyCertOfFitness",
        "fdnyInspections",
        "hpdComplaints",
        "hpdDwellingRegistrations",
        "hpdHousingLitigations",
        "hpdJurisdiction",
        "hpdRepairVacateOrders",
        "hpdViolations",
        "landmarkComplaints",
        "landmarkPermits",
        "landmarkViolations",
        "oathHearings",
        "serviceRequests311",
        "otherInspections"];


    public function pluto()
    {
        return $this->hasOne('App\Models\PropertyPluto', 'bbl', 'bbl');
    }

    public function summary()
    {
        return $this->hasOne('App\Models\PropertyActiveSummary','id','id');
    }

    public function address()
    {

        $relation = $this->addressRelation();

        if ($this->house_number) {

            if (Str::contains($this->house_number, '-')) {
                $housenum = explode('-', $this->house_number);
                $outdoor = $housenum[0];
                $indoor = $housenum[1];

                $parity = $outdoor % 2;

                if ($indoor > 0)
                    $parity = $indoor % 2;

                if ($parity == 0)
                    $parity = 2;

                $relation = $this->addressRelation()
                    ->where('lhn_first', '<=', $outdoor)
                    ->where('hhn_first', '>=', $outdoor)
                    ->where('lhn_second', '<=', $indoor)
                    ->where('hhn_second', '>=', $indoor)
                    ->where('parity', $parity)
//                    ->whereRaw('CAST(SUBSTRING(lhns,2,5) AS INTEGER) <= ' . $outdoor)
//                    ->whereRaw('CAST(SUBSTRING(hhns,2,5) AS INTEGER) >= ' . $outdoor)
//                    ->whereRaw('CAST(SUBSTRING(lhns,7,3) AS INTEGER)<= ' . $indoor)
//                    ->whereRaw('CAST(SUBSTRING(hhns,7,3) AS INTEGER)>= ' . $indoor)
                    ->whereRaw('addrtype = \'\'');
            } else {


                $parity = $this->house_number % 2;
                if ($parity == 0)
                    $parity = 2;


                $relation = $this->addressRelation()
                    ->where('lhn_first', '<=', $this->house_number)
                    ->where('hhn_first', '>=', $this->house_number)
                    ->where('parity', $parity)
//                ->whereRaw('CAST(SUBSTRING(lhns,2,5) AS INTEGER) <= ' . $this->house_number)
//                ->whereRaw('CAST(SUBSTRING(hhns,2,5) AS INTEGER) >= ' . $this->house_number)
                    ->whereRaw('addrtype = \'\'');
            }
        }
        return $relation;
    }

    public function addressRelation()
    {

        return $this->hasOne('App\Models\PropertyAdress', 'bin', 'bin');


    }

    public function getAddress()
    {
        return trim($this->bin . " - " . $this->house_number . " " . $this->stname . ", " . Helper::getBoroName($this->boro) . ", NY " . $this->zipcode);
    }

    public function getFullAddressAttribute()
    {
        return trim($this->house_number . " " . $this->stname . ", " . Helper::getBoroName($this->boro) . ", NY " . $this->zipcode);
    }

    public function getAddressOnlyWithHouseStreet()
    {
        return trim($this->house_number . " " . $this->stname);
    }

    public function getSmallAddress($limit = 10)
    {
        return Str::limit($this->getAddressWithoutBin(), $limit);
    }

    public function getAddressWithoutBin()
    {
        return trim($this->house_number . " " . $this->stname . ", " . Helper::getBoroName($this->boro) . ", NY " . $this->zipcode);
    }

//    public function hasNewAlertFromDate($date)
//    {
//        return
//            $this->bsaApplicationStatus()->isNew($date) || $this->depCatsPermits()->isNew($date) || $this->dobCertOccupancy()->isNew($date) ||
//            $this->dobComplaints()->isNew($date) || $this->dobJobFilings()->isNew($date) || $this->dobNowApprovedPermits()->isNew($date) ||
//            $this->dobNowElectricalPermits()->isNew($date) || $this->dobNowElevatorPermits()->isNew($date) || $this->dobNowFacadeFilings()->isNew($date)
//            || $this->dobNowJobFilings()->isNew($date) || $this->dobNowSafetyBoiler()->isNew($date) || $this->dobPermits()->isNew($date) || $this->dobViolations()->isNew($date) ||
//            $this->dotSidewalkCorrespondences()->isNew($date) || $this->dotSidewalkInspections()->isNew($date) || $this->ecbViolations()->isNew($date) ||
//            $this->hpdComplaints()->isNew($date) || $this->hpdDwellingRegistrations()->isNew($date) || $this->hpdHousingLitigations()->isNew($date) ||
//            $this->hpdJurisdiction()->isNew($date) || $this->hpdLocalLaw7()->isNew($date) || $this->hpdRepairVacateOrders()->isNew($date) ||
//            $this->hpdViolations()->isNew($date) || $this->landmarkComplaints()->isNew($date) || $this->landmarkPermits()->isNew($date) ||
//            $this->landmarkViolations()->isNew($date) || $this->oathHearings()->isNew($date) || $this->serviceRequests311()->isNew($date);
//    }

    public function bsaApplicationStatus()
    {
        return $this->hasMany('App\Models\BSAApplicationStatus', 'bin', 'bin');
    }

    public function depCatsPermits()
    {
        //todo
        return $this->hasMany('App\Models\DepCatsPermits', 'bbl', 'bbl');
    }

    public function dobCertOccupancy()
    {
        //todo
        return $this->hasMany('App\Models\DobCertOccupancy', 'bin_number', 'bin');
    }

    public function dobComplaints()
    {
        $relation = $this->hasMany('App\Models\DobComplaints', 'bin', 'bin');
        $relation->getQuery()
            ->distinctOn('complaint_number')
            ->orderBy('complaint_number')
            ->orderBy('dobrundate', 'desc');
        return $relation;
    }

    public function dobJobFilings()
    {
        //todo
        return $this->hasMany('App\Models\DobJobFilings', 'bin__', 'bin');
    }

    public function dobNowApprovedPermits()
    {
        //todo
        return $this->hasMany('App\Models\DobNowApprovedPermits', 'bin', 'bin');
    }

    public function dobNowElectricalPermits()
    {
        //todo
        return $this->hasMany('App\Models\DobNowElectricalPermits', 'bin', 'bin');
    }

    public function dobNowElevatorPermits()
    {
        //todo
        return $this->hasMany('App\Models\DobNowElevatorPermits', 'bin', 'bin');
    }

    public function dobNowFacadeFilings()
    {
        //todo
        return $this->hasMany('App\Models\DobNowFacadeFilings', 'bin', 'bin');
    }

    public function dobNowJobFilings()
    {
        //todo
        return $this->hasMany('App\Models\DobNowJobFilings', 'bin', 'bin');
    }

    public function dobNowSafetyBoiler()
    {
        //todo
        return $this->hasMany('App\Models\DobNowSafetyBoiler', 'bin_number', 'bin');
    }

    public function dobPermits()
    {
        return $this->hasMany('App\Models\DobPermits', 'bin__', 'bin');
    }

    public function dobViolations()
    {
        return $this->hasMany('App\Models\DobViolations', 'bin', 'bin');
    }

    public function dotSidewalkCorrespondences()
    {
        //todo
        return $this->hasMany('App\Models\DotSidewalkCorrespondences', 'bbl', 'bbl');
    }

    public function dotSidewalkInspections()
    {
        //todo
        return $this->hasMany('App\Models\DotSidewalkInspections', 'bin', 'bin');
    }

    public function ecbViolations()
    {
        return $this->hasMany('App\Models\EcbViolations', 'bin', 'bin');
    }

    public function hpdComplaints()
    {
        return $this->hasMany('App\Models\HpdComplaints', 'bbl', 'bbl');
    }

    public function hpdDwellingRegistrations()
    {
        //todo
        return $this->hasMany('App\Models\HpdDwellingRegistrations', 'bin', 'bin');
    }

    public function hpdHousingLitigations()
    {
        //todo
        return $this->hasMany('App\Models\HpdHousingLitigations', 'bin', 'bin');
    }

    public function hpdJurisdiction()
    {
        //todo
        return $this->hasMany('App\Models\HpdJurisdiction', 'bin', 'bin');
    }

    public function hpdLocalLaw7()
    {
        //todo
        return $this->hasMany('App\Models\HpdLocalLaw7', 'bin', 'bin');
    }

    public function hpdRepairVacateOrders()
    {
        //todo
        return $this->hasMany('App\Models\HpdRepairVacateOrders', 'bin', 'bin');
    }

    public function hpdEmergencyRepairs()
    {
        //todo
        return $this->hasMany('App\Models\HpdEmergencyRepairs', 'bin', 'bin');
    }

    public function hpdViolations()
    {
        return $this->hasMany('App\Models\HpdViolations', 'bin', 'bin');
    }

    public function landmarkComplaints()
    {
        return $this->hasMany('App\Models\LandmarkComplaints', 'bin', 'bin');
    }

    public function landmarkPermits()
    {
        return $this->hasMany('App\Models\LandmarkPermits', 'bbl', 'bbl');
    }

    public function landmarkViolations()
    {
        return $this->hasMany('App\Models\LandmarkViolations', 'bin', 'bin');
    }

    public function oathHearings()
    {
        return $this->hasMany('App\Models\OathHearings', 'bbl', 'bbl');
    }

    public function serviceRequests311()
    {
        //todo
        return $this->hasMany('App\Models\ServiceRequests311', 'bbl', 'bbl');
    }

    public function fdnyActiveViolOrders()
    {
        return $this->hasMany('App\Models\FdnyActiveViolOrders', 'bin', 'bin');
    }

    public function fdnyCertOfFitness()
    {
        return $this->hasMany('App\Models\FdnyCertOfFitness', 'bin', 'bin');
    }

    public function fdnyInspections()
    {
        return $this->hasMany('App\Models\FdnyInspections', 'bin', 'bin');
    }

    public function hpdMailings()
    {
        return $this->hasMany('App\Models\HpdAnnualMailing', 'property_id', 'id');
    }

    public function otherInspections()
    {
        return $this->hasMany('App\Models\OtherInspections', 'property_id', 'id');
    }

    public function image()
    {
        if ($this->photo)
            return $this->photo;
        $photo = "https://maps.googleapis.com/maps/api/streetview?size=400x800&location=" . $this->lat . "," . $this->lng . "&fov=120&source=outdoor&key=GOOGLEAPIKEYWILLBEWRITTEN";
        $file = file_get_contents($photo);
        if ($file) {
            $uploaded = Storage::put('public/propertyPhotos/' . $this->id . '.jfif', $file);
            if ($uploaded) {
                $path = Storage::url('public/propertyPhotos/' . $this->id . '.jfif');
                $this->photo = $path;
                $this->save();
                return $path;
            }
        }
        return $photo;
    }

    public function bisweb()
    {

        return "http://a810-bisweb.nyc.gov/bisweb/PropertyProfileOverviewServlet?bin=" . $this->bin . "&go4=+GO+&requestid=0";
    }

    public function scopeWithoutAll($query, $except = [])
    {
        if (!is_array($except))
            $except = array($except);
        $removal = array_diff($this->with, $except);
        return $query->without($removal);
    }

    public function documents()
    {
        return $this->hasMany(PropertyDocuments::class, 'property_id', 'id');
    }

    public function notes()
    {
        return $this->hasMany(PropertyNotes::class, 'property_id', 'id');
    }


//    public function users()
//    {
//        return $this->belongsToMany('App\User', 'user_properties', 'property_id', 'user_id')->withTimestamps();
//    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
