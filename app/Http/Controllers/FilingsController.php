<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class FilingsController extends Controller
{
//-Filings
//bsaApplicationStatus
//    public function bsaApplicationStatus()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','bsaApplicationStatus'])->get();
//        return view('portal.models.bsaApplicationStatus', compact('properties'));
//    }
//dobNowFacadeFilings
//    public function dobNowFacadeFilings()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dobNowFacadeFilings'])->get();
//        return view('portal.models.dobNowFacadeFilings', compact('properties'));
//    }
//dobNowJobFilings
//    public function dobNowJobFilings()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dobNowJobFilings'])->get();
//        return view('portal.models.dobNowJobFilings', compact('properties'));
//    }
//dobJobFilings
//    public function dobJobFilings()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dobJobFilings'])->get();
//        return view('portal.models.dobJobFilings', compact('properties'));
//    }
//dobNowSafetyBoiler
//    public function dobNowSafetyBoiler()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dobNowSafetyBoiler'])->get();
//        return view('portal.models.dobNowSafetyBoiler', compact('properties'));
//    }
//dotSidewalkCorrespondences
//    public function dotSidewalkCorrespondences()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dotSidewalkCorrespondences'])->get();
//        return view('portal.models.dotSidewalkCorrespondences', compact('properties'));
//    }
//dotSidewalkInspections
//    public function dotSidewalkInspections()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dotSidewalkInspections'])->get();
//        return view('portal.models.dotSidewalkInspections', compact('properties'));
//    }
//hpdDwellingRegistrations
//    public function hpdDwellingRegistrations()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','hpdDwellingRegistrations'])->get();
//        return view('portal.models.hpdDwellingRegistrations', compact('properties'));
//    }
//hpdHousingLitigations
//    public function hpdHousingLitigations()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','hpdHousingLitigations'])->get();
//        return view('portal.models.hpdHousingLitigations', compact('properties'));
//    }

//BSA Applications
    public function bsaApplicationStatus($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'bsaApplicationStatus'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'bsaApplicationStatus'])->get();
        return view('portal.content.bsaApplicationStatus', compact('properties'));
    }

// HPD LER
    //HPDregistrations
    public function HPDregistrations($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'hpdDwellingRegistrations'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'hpdDwellingRegistrations'])->get();
        return view('portal.content.HPDregistrations', compact('properties'));
    }


    //HPDlitigations
    public function HPDlitigations($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'hpdHousingLitigations'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'hpdHousingLitigations'])->get();
        return view('portal.content.HPDlitigations', compact('properties'));
    }

//INSPECTIONLAR

//dobNowSafetyBoiler
    public function DOBinspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowSafetyBoiler'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowSafetyBoiler'])->get();
        return view('portal.content.DOBinspections', compact('properties'));
    }

//FACADE inspections
    public function FACADEinspections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowFacadeFilings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowFacadeFilings'])->get();
        return view('portal.content.FACADEinspections', compact('properties'));
    }


// PERMITS
//DOBboilerPermits
    public function DOBboilerPermits($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowSafetyBoiler'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowSafetyBoiler'])->get();
        return view('portal.models.dobNowSafetyBoiler', compact('properties'));
    }

//    DOBnowJobFilings
    public function DOBnowJobFilings($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobNowJobFilings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobNowJobFilings'])->get();
        return view('portal.content.DOBnowJobFilings', compact('properties'));
    }

//  DOBjobFilings
    public function DOBjobFilings($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobJobFilings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobJobFilings'])->get();
        return view('portal.content.DOBjobFilings', compact('properties'));
    }

}
