<?php

namespace App;

use App\Models\Property;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Cashier\Billable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoleAndPermission;
    use Billable;
    use Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact_number', 'photo', 'company', 'address'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'subscription'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $withCount = ['properties'];

    public static function getCurrentUser($request)
    {
        if (!User::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required'
            ], 422);
        }

        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    public static function checkToken($token)
    {
        if ($token->token) {
            return true;
        }
        return false;
    }

    public function getSubscriptionAttribute($value)
    {
        return $this->subscription();
    }

    /**
     * @return bool
     */
    public function canImpersonate()
    {
        // For example
        return $this->level() > 4;
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        // For example
        return $this->level() < 6;
    }

    public function adminlte_image()
    {
        return $this->photo ?? 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        return $this->email;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function notifySettings()
    {
        return $this->hasOne(UserNotifySettings::class, 'user_id', 'id');
    }

    public function reminderSettings()
    {

        return $this->hasOne(UserReminderSettings::class, 'user_id', 'id');
    }

    public function summarySettings()
    {

        return $this->hasOne(UserSummarySettings::class, 'user_id', 'id');
    }

    public function bsaApplicationStatus($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('bsaApplicationStatus', $a, $m, $k);
    }

    private function filteredODataModels($filter, $a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->properties()->has($filter)->with([$filter => function ($q) use ($a, $m, $k) {
            if (!$k) {
                $k = now()->addDays(-1);
            }
            if (!$a)
                $q;
            else
                $q->where($a, $m, $k);
        }])->get();//->pluck($filter)->flatten();
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'user_id', 'id');
    }

    public function depCatsPermits($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('depCatsPermits', $a, $m, $k);
    }

    public function dobCertOccupancy($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobCertOccupancy', $a, $m, $k);
    }

    public function dobComplaints($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobComplaints', $a, $m, $k);
    }

    public function dobJobFilings($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobJobFilings', $a, $m, $k);
    }

    public function dobNowApprovedPermits($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobNowApprovedPermits', $a, $m, $k);
    }

    public function dobNowElectricalPermits($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobNowElectricalPermits', $a, $m, $k);
    }

    public function dobNowElevatorPermits($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobNowElevatorPermits', $a, $m, $k);
    }

    public function dobNowFacadeFilings($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobNowFacadeFilings', $a, $m, $k);
    }

    public function dobNowJobFilings($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobNowJobFilings', $a, $m, $k);
    }

    public function dobNowSafetyBoiler($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobNowSafetyBoiler', $a, $m, $k);
    }

    public function dobPermits($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobPermits', $a, $m, $k);
    }

    public function dobViolations($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dobViolations', $a, $m, $k);
    }

    public function dotSidewalkCorrespondences($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dotSidewalkCorrespondences', $a, $m, $k);
    }

    public function dotSidewalkInspections($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('dotSidewalkInspections', $a, $m, $k);
    }

    public function ecbViolations($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('ecbViolations', $a, $m, $k);
    }

    public function fdnyActiveViolOrders($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('fdnyActiveViolOrders', $a, $m, $k);
    }

    public function fdnyCertOfFitness($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('fdnyCertOfFitness', $a, $m, $k);
    }

    public function fdnyInspections($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('fdnyInspections', $a, $m, $k);
    }

    public function hpdComplaints($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('hpdComplaints', $a, $m, $k);
    }

    public function hpdDwellingRegistrations($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('hpdDwellingRegistrations', $a, $m, $k);
    }

    public function hpdHousingLitigations($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('hpdHousingLitigations', $a, $m, $k);
    }

    public function hpdJurisdiction($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('hpdJurisdiction', $a, $m, $k);
    }

    public function hpdLocalLaw7($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('hpdLocalLaw7', $a, $m, $k);
    }

    public function hpdRepairVacateOrders($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('hpdRepairVacateOrders', $a, $m, $k);
    }

    public function hpdViolations($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('hpdViolations', $a, $m, $k);
    }

    public function landmarkComplaints($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('landmarkComplaints', $a, $m, $k);
    }

    public function landmarkPermits($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('landmarkPermits', $a, $m, $k);
    }

    public function landmarkViolations($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('landmarkViolations', $a, $m, $k);
    }

    public function oathHearings($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('oathHearings', $a, $m, $k);
    }

    public function serviceRequests311($a = "updated_at", $m = ">", $k = "2020-01-01 00:00:00")
    {
        return $this->filteredODataModels('serviceRequests311', $a, $m, $k);
    }

    public function getEmailAttribute($value)
    {
        return Str::lower($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Str::lower($value);
    }
}
