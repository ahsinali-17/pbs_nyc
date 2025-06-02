<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HearingsController extends Controller
{
//-Hearings
//oathHearings
//    public function oathHearings()
//    {
//        $properties = Auth::user()->properties()->withoutAll(['address', 'oathHearings'])->get();
//        return view('portal.models.oathHearings', compact('properties'));
//    }
//serviceRequests311
    public function SERVICErequests311($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'serviceRequests311'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'serviceRequests311'])->get();
        return view('portal.content.SERVICErequests311', compact('properties'));
    }

//ECB LER

    //ECB liveHearings
    public function ECBliveHearings($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'oathHearings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'oathHearings'])->get();
        return view('portal.content.ECBliveHearings', compact('properties'));
    }

    //ECB liveDue
    public function ECBliveDue($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'oathHearings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'oathHearings'])->get();
        return view('portal.content.ECBliveDue', compact('properties'));
    }

    //defaulted
    public function defaulted($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'oathHearings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'oathHearings'])->get();
        return view('portal.content.ECBdefaulted', compact('properties'));
    }

    //imposed
    public function imposed($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address'])->with(['oathHearings' => function ($query) {
                $query->imposed();
            }])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address'])->with(['oathHearings' => function ($query) {
                $query->imposed();
            }])->get();
        return view('portal.content.ECBimposed', compact('properties'));
    }

    //overpaid
    public function overpaid($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'oathHearings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'oathHearings'])->get();
        return view('portal.content.ECBoverpaid', compact('properties'));
    }

    //ECB corrections
    public function ECBcorrections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address'])->with(['oathHearings' => function ($query) {
                $query->where('hearing_result', '<>', 'DISMISSED');
            }])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address'])->with(['oathHearings' => function ($query) {
                $query->where('hearing_result', '<>', 'DISMISSED');
            }])->get();
        return view('portal.content.ECBcorrections', compact('properties'));
    }

    //ECBcomplaints
    public function ECBcomplaints($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address'])->with(['serviceRequests311' => function ($query) {
                $query->closed();
            }])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address'])->with(['serviceRequests311' => function ($query) {
                $query->closed();
            }])->get();
        return view('portal.content.ECBcomplaints', compact('properties'));
    }

//FDNY LER
    //FDNYliveHearings
    public function FDNYliveHearings($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'oathHearings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'oathHearings'])->get();
        return view('portal.content.FDNYliveHearings', compact('properties'));
    }

    //FDNYliveDue
    public function FDNYliveDue($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address', 'oathHearings'])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address', 'oathHearings'])->get();
        return view('portal.content.FDNYliveDue', compact('properties'));
    }

    //FDNY corrections
    public function FDNYCorrections($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address'])->with(['oathHearings' => function ($query) {
                $query->where('hearing_result', '<>', 'DISMISSED');
            }])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address'])->with(['oathHearings' => function ($query) {
                $query->where('hearing_result', '<>', 'DISMISSED');
            }])->get();
        return view('portal.content.FDNYcorrections', compact('properties'));
    }


    //FDNY complaints
    public function FDNYcomplaints($buildingid = null)
    {
        if ($buildingid)
            $properties = Auth::user()->properties()->where('id', $buildingid)->withoutAll(['address'])->with(['serviceRequests311' => function ($query) {
                $query->closed();
            }])->get();
        else
            $properties = Auth::user()->properties()->withoutAll(['address'])->with(['serviceRequests311' => function ($query) {
                $query->closed();
            }])->get();
        return view('portal.content.FDNYcomplaints', compact('properties'));
    }


}
