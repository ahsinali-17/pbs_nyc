<?php

namespace App\Http\Controllers;

use App\Models\OtherInspections;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtherInspectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Auth::user()->properties()->withoutAll(['address', 'otherInspections'])->get();
        return view('portal.content.Otherinspections', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->only(['property_id', 'type', 'status', 'content', 'due_date', 'alert_date']);
        $data['alert_date'] = Carbon::parse($data['due_date'])->addWeeks(-$data['alert_date']);
        $property = Auth::user()->properties()->withoutAll()->where('id', $data['property_id'])->firstOrFail();
        $property->otherInspections()->create($data);
        return redirect()->route('otherinspections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\OtherInspections $otherInspections
     * @return \Illuminate\Http\Response
     */
    public function show(OtherInspections $otherInspections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\OtherInspections $otherInspections
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inspection = OtherInspections::where('id',$id)->firstOrFail();
        return view('portal.content.Otherinspections-edit',compact('inspection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OtherInspections $otherInspections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $inspectionid)
    {
        //
        $data = $request->only(['property_id', 'type', 'status', 'content', 'due_date', 'alert_date']);
        $data['alert_date'] = Carbon::parse($data['due_date'])->addWeeks(-$data['alert_date'])->format('Y-m-d');
//        $data['due_date'] = Carbon::parse($data['due_date']);
        $property = Auth::user()->properties()->withoutAll()->where('id', $data['property_id'])->firstOrFail();
        $inspection = $property->otherInspections()->where('id',$inspectionid)->firstOrFail();
//        dd($data);
        $inspection->update($data);
        return redirect()->route('otherinspections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\OtherInspections $otherInspections
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \request()->only(['property_id']);
        $property = Auth::user()->properties()->withoutAll()->where('id', $data['property_id'])->firstOrFail();
        if ($property) {
            $inspection = $property->otherInspections()->where('id',$id)->firstOrFail();
            $inspection->delete();
        }
        return redirect()->route('otherinspections.index');
    }
}
