<?php

namespace App\Providers;

use App\Models\BSAApplicationStatus;
use App\Models\DepCatsPermits;
use App\Models\DobCertOccupancy;
use App\Models\DobComplaints;
use App\Models\DobJobFilings;
use App\Models\DobNowApprovedPermits;
use App\Models\DobNowElectricalPermits;
use App\Models\DobNowFacadeFilings;
use App\Models\DobNowJobFilings;
use App\Models\DobNowSafetyBoiler;
use App\Models\DobPermits;
use App\Models\DobViolations;
use App\Models\DotSidewalkCorrespondences;
use App\Models\DotSidewalkInspections;
use App\Models\EcbViolations;
use App\Models\FdnyActiveViolOrders;
use App\Models\FdnyCertOfFitness;
use App\Models\FdnyInspections;
use App\Models\HpdComplaints;
use App\Models\HpdDwellingRegistrations;
use App\Models\HpdHousingLitigations;
use App\Models\HpdRepairVacateOrders;
use App\Models\HpdViolations;
use App\Models\LandmarkComplaints;
use App\Models\LandmarkPermits;
use App\Models\LandmarkViolations;
use App\Models\OathHearings;
use App\Models\Property;
use App\Models\ServiceRequests311;
use App\Observers\AlertObserver;
use App\Observers\PropertyObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Property::observe(PropertyObserver::class);
        BSAApplicationStatus::observe(AlertObserver::class);
        DepCatsPermits::observe(AlertObserver::class);
        DobCertOccupancy::observe(AlertObserver::class);
        DobComplaints::observe(AlertObserver::class);
        DobJobFilings::observe(AlertObserver::class);
        DobNowApprovedPermits::observe(AlertObserver::class);
        DobNowElectricalPermits::observe(AlertObserver::class);
        DobNowElectricalPermits::observe(AlertObserver::class);
        DobNowFacadeFilings::observe(AlertObserver::class);
        DobNowJobFilings::observe(AlertObserver::class);
        DobNowSafetyBoiler::observe(AlertObserver::class);
        DobPermits::observe(AlertObserver::class);
        DobViolations::observe(AlertObserver::class);
        DotSidewalkCorrespondences::observe(AlertObserver::class);
        DotSidewalkInspections::observe(AlertObserver::class);
        EcbViolations::observe(AlertObserver::class);
        FdnyActiveViolOrders::observe(AlertObserver::class);
        FdnyCertOfFitness::observe(AlertObserver::class);
        FdnyInspections::observe(AlertObserver::class);
        HpdComplaints::observe(AlertObserver::class);
        HpdDwellingRegistrations::observe(AlertObserver::class);
        HpdHousingLitigations::observe(AlertObserver::class);
        HpdRepairVacateOrders::observe(AlertObserver::class);
        HpdViolations::observe(AlertObserver::class);
        LandmarkComplaints::observe(AlertObserver::class);
        LandmarkPermits::observe(AlertObserver::class);
        LandmarkViolations::observe(AlertObserver::class);
        OathHearings::observe(AlertObserver::class);
        ServiceRequests311::observe(AlertObserver::class);
    }
}
