<?php

namespace App\Http\Controllers;

use App\Models\HpdAnnualMailing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HpdAnnualMailingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Auth::user()->properties()->withoutAll(['address', 'hpdMailings'])->get();
        return view('portal.hpdmailing.index')->withProperties($properties);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $address = Auth::user()->properties()->withoutAll(['address', 'hpdMailings'])->get();
        return view('portal.hpdmailing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'property_id' => 'required',
            'inspection_type' => 'required',
            'apartment_number' => 'required',
            'tenant_first_name' => 'required',
//            'tenant_middle_name' => 'max:100',
            'tenant_last_name' => 'required|max:100',
            'tenant_address' => 'required|max:1000',
            'tenant_phone' => 'required|max:1000',
//            'owner_name' => 'max:1000',
//            'owner_phone' => 'max:1000',
//            'owner_address' => 'max:1000',
//            'mailing_notice' => 'max:1000000',
//            'status' => 'max:1000',
//            'sending_address' => 'max:1000',
//            'construction_year' => 'max:4',
//            'construction_type' => 'max:1000',
//            'floor_number_above_ground' => 'max:100',
//            'floor_number_below_ground' => 'max:100',
//            'sprinkler_system' => 'max:1000',
//            'sprinkler_coverage' => 'max:1000',
//            'sprinkler_coverage_dwelling_units' => 'max:1000',
//            'sprinkler_coverage_hallways' => 'max:1000',
//            'sprinkler_coverage_stairwells' => 'max:1000',
//            'sprinkler_coverage_compactor_chute' => 'max:1000',
//            'sprinkler_coverage_other' => 'max:100000',
//            'alarm_status' => 'max:1000',
//            'manual_pull_station' => 'max:1000',
//            'pa_status' => 'max:1000',
//            'speaker_location' => 'max:100000',
//            'speaker_location_other' => 'max:10000',
//            'egress' => 'max:1000000',
//            'other_information' => 'max:100000',
//            'date_prepared' => 'max:12312312312',
//            'due_date' => 'max:12312312312',
//            'last_alert_date' => 'max:12312312312',
//            'mail_send_date' => 'max:12312312312',
//            'wg_ap_a_check',
//            'wg_ap_b_under_ten',
//            'wg_ap_b_not_under_ten',
//            'wg_ap_b_installed',
//            'wg_ap_b_not_installed',
//            'wg_ap_b_i_want_guard',
//            'wg_ap_b_need_repair',
//            'wg_ap_b_not_need_repair',
//            'lead_five_to_ten',
        ]);

        $data = $request->only([
            'inspection_type',
            'apartment_number',
            'tenant_first_name',
            'tenant_middle_name',
            'tenant_last_name',
            'tenant_address',
            'tenant_phone',
            'owner_name',
            'owner_phone',
            'owner_address',
            'mailing_notice',
            'status',
            'sending_address',
            'construction_year',
            'construction_type',
            'floor_number_above_ground',
            'floor_number_below_ground',
            'sprinkler_system',
            'sprinkler_coverage',
            'sc_dwelling_units',
            'sc_hallways',
            'sc_stairwells',
            'sc_chute',
            'sc_other',
            'alarm_status',
            'manual_pull_station',
            'pa_status',
            'speaker_location',
            'speaker_location_other',
            'egress',
            'other_information',
            'date_prepared',
            'due_date',
            'mail_send_date',
            'last_alert_date',
            'wg_ap_a_check',
            'wg_ap_b_under_ten',
            'wg_ap_b_not_under_ten',
            'wg_ap_b_installed',
            'wg_ap_b_not_installed',
            'wg_ap_b_i_want_guard',
            'wg_ap_b_need_repair',
            'wg_ap_b_not_need_repair',
            'lead_five_to_ten',
        ]);

        $property = Auth::user()->properties()->withoutAll()->whereId($request->get('property_id'))->firstOrFail();

        $hpdmail = $property->hpdMailings()->create($data);
//        $hpdmail = new HpdAnnualMailing($data);
        $hpdmail->save();

        Session::flash('success', "New Hpd Mailing successfully created.");

        return redirect()->route('hpdmailing.show', $hpdmail->id);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\HpdAnnualMailing $hpdmailing
     * @return \Illuminate\Http\Response
     */
    public function show(HpdAnnualMailing $hpdmailing)
    {
//        $property= Auth::user()->properties()->withoutAll()->whereId($hpdmailing->property_id)->firstOrFail();
        return view('portal.hpdmailing.show')->withHpdAnnualMailing($hpdmailing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\HpdAnnualMailing $hpdmailing
     * @return \Illuminate\Http\Response
     */
    public function edit(HpdAnnualMailing $hpdmailing)
    {
        return view('portal.hpdmailing.edit')->withHpdAnnualMailing($hpdmailing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HpdAnnualMailing $hpdmailing
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, HpdAnnualMailing $hpdmailing)
    {
        $request->validate([
            'inspection_type' => 'required',
            'apartment_number' => 'required|max:10',
            'tenant_first_name' => 'required|max:100',
            'tenant_middle_name' => 'max:100',
            'tenant_last_name' => 'required|max:100',
            'tenant_address' => 'required|max:1000',
            'tenant_phone' => 'required|max:1000',
            'owner_name' => 'max:1000',
            'owner_phone' => 'max:1000',
            'owner_address' => 'max:1000',
            'mailing_notice' => 'max:1000000',
            'status' => 'max:1000',
            'sending_address' => 'max:1000',
            'construction_year' => 'max:4',
            'construction_type' => 'max:1000',
            'floor_number_above_ground' => 'max:100',
            'floor_number_below_ground' => 'max:100',
            'sprinkler_system' => 'max:1000',
            'sprinkler_coverage' => 'max:1000',
            'sc_dwelling_units' => 'max:1000',
            'sc_hallways' => 'max:1000',
            'sc_stairwells' => 'max:1000',
            'sc_chute' => 'max:1000',
            'sc_other' => 'max:100000',
            'alarm_status' => 'max:1000',
            'manual_pull_station' => 'max:1000',
            'pa_status' => 'max:1000',
            'speaker_location' => 'max:100000',
            'speaker_location_other' => 'max:10000',
            'egress' => 'max:1000000',
            'other_information' => 'max:100000',
            'date_prepared' => 'max:12312312312',
            'due_date' => 'max:12312312312',
            'last_alert_date' => 'max:12312312312',
            'mail_send_date' => 'max:12312312312',
            'wg_ap_a_check',
            'wg_ap_b_under_ten',
            'wg_ap_b_not_under_ten',
            'wg_ap_b_installed',
            'wg_ap_b_not_installed',
            'wg_ap_b_i_want_guard',
            'wg_ap_b_need_repair',
            'wg_ap_b_not_need_repair',
            'lead_five_to_ten',
        ]);

        $data = $request->only([
            'inspection_type',
            'apartment_number',
            'tenant_first_name',
            'tenant_middle_name',
            'tenant_last_name',
            'tenant_address',
            'tenant_phone',
            'owner_name',
            'owner_phone',
            'owner_address',
            'mailing_notice',
            'status',
            'sending_address',
            'construction_year',
            'construction_type',
            'floor_number_above_ground',
            'floor_number_below_ground',
            'sprinkler_system',
            'sprinkler_coverage',
            'sc_dwelling_units',
            'sc_hallways',
            'sc_stairwells',
            'sc_chute',
            'sc_other',
            'alarm_status',
            'manual_pull_station',
            'pa_status',
            'speaker_location',
            'speaker_location_other',
            'egress',
            'other_information',
            'date_prepared',
            'due_date',
            'mail_send_date',
            'last_alert_date',
            'wg_ap_a_check',
            'wg_ap_b_under_ten',
            'wg_ap_b_not_under_ten',
            'wg_ap_b_installed',
            'wg_ap_b_not_installed',
            'wg_ap_b_i_want_guard',
            'wg_ap_b_need_repair',
            'wg_ap_b_not_need_repair',
            'lead_five_to_ten',
        ]);
        $hpdmailing->update($data);
        $hpdmailing->save();


        return redirect()->route('hpdmailing.show', $hpdmailing->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\HpdAnnualMailing $hpdmailing
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(HpdAnnualMailing $hpdmailing)
    {
        $hpdmailing->delete();

        Session::flash('success', "Successfully deleted.");

        return redirect()->route('hpdmailing.index');

    }

    public function fileUpload(HpdAnnualMailing $hpdmailing)
    {
        request()->validate([
                'file_type' => 'required',
                'description' => 'required',
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
            ]
        );
        $data = request()->only([
            'file_type',
            'description',
        ]);
        if (request()->file('file')) {
            $data['file_url'] = request()->file('file')->store('public/mailingfiles');
            $data['file_upload_date'] = now();
        }
        $hpdmailing->files()->create($data);
        return redirect()->back();
    }
}
