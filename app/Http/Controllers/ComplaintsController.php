<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ComplaintsController extends Controller
{
    //-Complaints
//dobComplaints
//    public function dobComplaints()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dobComplaints'])->get();
//        return view('portal.models.dobComplaints', compact('properties'));
//    }
//hpdRepairVacateOrders
//    public function hpdRepairVacateOrders()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','hpdRepairVacateOrders'])->get();
//        return view('portal.models.hpdRepairVacateOrders', compact('properties'));
//    }
//landmarkComplaints
//    public function landmarkComplaints()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','landmarkComplaints'])->get();
//        return view('portal.models.landmarkComplaints', compact('properties'));
//    }


//DOB LAR
    //DOB Complaints
    public function DOBComplaints($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobComplaints'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobComplaints'])->get();
        return view('portal.content.DOBcomplaints', compact('properties'));
    }

    //DOB swo
    public function DOBswo($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'dobComplaints'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'dobComplaints'])->get();
        return view('portal.content.DOBswo', compact('properties'));
    }

// HPD LER
    //HPDcomplaints
    public function HPDcomplaints($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'hpdComplaints'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'hpdComplaints'])->get();
        return view('portal.content.HPDcomplaints', compact('properties'));
    }

    public function HPDrepairs($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'hpdEmergencyRepairs'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'hpdEmergencyRepairs'])->get();
        return view('portal.content.HPDrepairs', compact('properties'));
    }

}
