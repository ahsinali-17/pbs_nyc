<?php

namespace App\Observers;

use App\Models\Property;
use Illuminate\Support\Facades\Log;

class PropertyObserver
{
    /**
     * Handle the property "created" event.
     *
     * @param Property $property
     * @return void
     */
    public function created(Property $property)
    {
        //
    }

    /**
     * Handle the property "updated" event.
     *
     * @param Property $property
     * @return void
     */
    public function updated(Property $property)
    {
        //
    }

    /**
     * Handle the property "deleting" event.
     *
     * @param Property $property
     * @return void
     */
    public function deleting(Property $property)
    {
//        $property->bsaApplicationStatus()->delete();
//        $property->depCatsPermits()->delete();
//        $property->dobCertOccupancy()->delete();
//        $property->dobComplaints()->delete();
//        $property->dobJobFilings()->delete();
//        $property->dobNowApprovedPermits()->delete();
//        $property->dobNowElectricalPermits()->delete();
//        $property->dobNowElevatorPermits()->delete();
//        $property->dobNowFacadeFilings()->delete();
//        $property->dobNowJobFilings()->delete();
//        $property->dobNowSafetyBoiler()->delete();
//        $property->dobPermits()->delete();
//        $property->dobViolations()->delete();
//        $property->dotSidewalkCorrespondences()->delete();
//        $property->dotSidewalkInspections()->delete();
//        $property->ecbViolations()->delete();
//        $property->fdnyActiveViolOrders()->delete();
//        $property->fdnyCertOfFitness()->delete();
//        $property->fdnyInspections()->delete();
//        $property->hpdComplaints()->delete();
//        $property->hpdDwellingRegistrations()->delete();
//        $property->hpdHousingLitigations()->delete();
//        $property->hpdJurisdiction()->delete();
//        $property->hpdLocalLaw7()->delete();
//        $property->hpdRepairVacateOrders()->delete();
//        $property->hpdViolations()->delete();
//        $property->landmarkComplaints()->delete();
//        $property->landmarkPermits()->delete();
//        $property->landmarkViolations()->delete();
//        $property->oathHearings()->delete();
//        $property->serviceRequests311()->delete();
    }

    /**
     * Handle the property "deleted" event.
     *
     * @param Property $property
     * @return void
     */
    public function deleted(Property $property)
    {
        //
    }

    /**
     * Handle the property "restored" event.
     *
     * @param Property $property
     * @return void
     */
    public function restored(Property $property)
    {
        //
    }

    /**
     * Handle the property "force deleted" event.
     *
     * @param Property $property
     * @return void
     */
    public function forceDeleted(Property $property)
    {
        //
    }
}
