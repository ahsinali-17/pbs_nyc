<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PermitsController extends Controller
{
//-Permits
//dobCertOccupancy
    public function dobCertOccupancy($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobCertOccupancy'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobCertOccupancy'])->get();
        return view('portal.models.dobCertOccupancy', compact('properties'));
    }

//dobPermits
    public function dobPermitss($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobPermits'])->get();
        return view('portal.models.dobPermits', compact('properties'));
    }

//dobNowApprovedPermits
    public function dobNowApprovedPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowApprovedPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowApprovedPermits'])->get();
        return view('portal.models.dobNowApprovedPermits', compact('properties'));
    }

//dobNowElectricalPermits
    public function dobNowElectricalPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowElectricalPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowElectricalPermits'])->get();
        return view('portal.models.dobNowElectricalPermits', compact('properties'));
    }

//dobNowElevatorPermits
    public function dobNowElevatorPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowElevatorPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowElevatorPermits'])->get();
        return view('portal.models.dobNowElevatorPermits', compact('properties'));
    }

//depCatsPermits
    public function depCatsPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'depCatsPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'depCatsPermits'])->get();
        return view('portal.models.depCatsPermits', compact('properties'));
    }


//landmarkPermits
    public function landmarkPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'landmarkPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'landmarkPermits'])->get();
        return view('portal.models.landmarkPermits', compact('properties'));
    }

//    INSPECTIONS
//DEPinspections
    public function DEPinspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'depCatsPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'depCatsPermits'])->get();
        return view('portal.content.DEPinspections', compact('properties'));
    }

//ELEVATORinspections
    public function ELEVATORinspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowElevatorPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowElevatorPermits'])->get();
        return view('portal.content.ELEVATORinspections', compact('properties'));
    }

    //DOBapprovedPermits
    public function DOBapprovedPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobPermits'])->get();
        return view('portal.content.DOBapprovedPermits', compact('properties'));
    }

    //DOBpermits
    public function DOBpermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobPermits'])->get();
        return view('portal.content.DOBpermits', compact('properties'));
    }

    //DOBahvPermits
    public function DOBahvPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobPermits'])->get();
        return view('portal.content.DOBahvPermits', compact('properties'));
    }

    //DOBelevatorPermits
    public function DOBelevatorPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowElevatorPermits'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowElevatorPermits'])->get();
        return view('portal.content.DOBelevatorPermits', compact('properties'));
    }

    //DOBelevatorPermits
    public function FDNYcofPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        return view('portal.content.FDNYcofPermits', compact('properties'));
    }




    //BOŞLAR COMING SOONLAR
    public function FDNYinspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        return view('portal.content.FDNYinspections', compact('properties'));
    }

    public function LL84inspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        return view('portal.content.LL84inspections', compact('properties'));
    }

    public function LL87inspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        return view('portal.content.LL87inspections', compact('properties'));
    }

    public function LL152inspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        return view('portal.content.LL152inspections', compact('properties'));
    }

    public function Otherinspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'FdnyCertOfFitness'])->get();
        return view('portal.content.Otherinspections', compact('properties'));
    }

}
