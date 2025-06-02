<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ViolationsController extends Controller
{

//dobViolations
//    public function dobViolations()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','dobViolations'])->get();
//        return view('portal.models.dobViolations', compact('properties'));
//    }
//ecbViolations
    public function ECBViolations($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'ecbViolations'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'ecbViolations'])->get();
        return view('portal.content.ECBviolations', compact('properties'));
    }
//hpdViolations
//    public function hpdViolations()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','hpdViolations'])->get();
//        return view('portal.models.hpdViolations', compact('properties'));
//    }
//landmarkViolations
//    public function landmarkViolations()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address','landmarkViolations'])->get();
//        return view('portal.models.landmarkViolations', compact('properties'));
//    }

//DOB LAR
    //dobLiveViolations
    public function DOBliveViolations()
    {
        //$properties = Auth::user()->properties()->withoutAll(['address','dobViolations'])->get();
        //return view('portal.content.DOBliveViolations', compact('properties'));
        return view('portal.content.DOBliveViolations');
    }

    //dobLiveViolations
    public function DOBliveViolationsSingle($buildingid)
    {
        //$properties = Auth::user()->properties()->withoutAll(['address','dobViolations'])->get();
        //return view('portal.content.DOBliveViolations', compact('properties'));
        return view('portal.content.DOBliveViolations', compact('buildingid'));
    }

//FDNY LER

    //FDNYViolations
    public function FDNYactiveViolOrders($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'fdnyActiveViolOrders'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'fdnyActiveViolOrders'])->get();
        return view('portal.content.FDNYActiveViolOrders', compact('properties'));
    }

//HPD LER

    //HPDliveViolations
    public function HPDliveViolations($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'hpdViolations'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'hpdViolations'])->get();
        return view('portal.content.HPDliveViolations', compact('properties'));
    }
}
