<?php

namespace App\Http\Controllers;

use App\Models\HpdAnnualMailing;
use App\Models\HpdAnnualMailingFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HpdAnnualMailingFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'mailing_id' => 'required',
            'file_type' => 'required',
            'description' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $data = $request->only('mailing_id',
            'file_type',
            'description',
            'file_upload_date');

        if ($request->file('file')) {
            $path = $request->file('file')->store('public/annualmailingfiles');
            $data['file_url'] = $path;
        }

        HpdAnnualMailing::find($data['mailing_id'])->files()->create($data);

        return redirect()->route('hpdmailing.show',$data['mailing_id']);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\HpdAnnualMailingFiles $hpdmailingfile
     * @return \Illuminate\Http\Response
     */
    public function show(HpdAnnualMailingFiles $hpdmailingfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\HpdAnnualMailingFiles $hpdmailingfile
     * @return \Illuminate\Http\Response
     */
    public function edit(HpdAnnualMailingFiles $hpdmailingfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HpdAnnualMailingFiles $hpdmailingfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HpdAnnualMailingFiles $hpdmailingfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\HpdAnnualMailingFiles $hpdmailingfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(HpdAnnualMailingFiles $hpdmailingfile)
    {
        $mailingid = $hpdmailingfile->mailing_id;
        Storage::delete($hpdmailingfile->file_url);
        $hpdmailingfile->delete();

        return redirect()->route('hpdmailing.show',$mailingid);
    }
}
