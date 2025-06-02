<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:developer', ['only' => ['create']]);
        $this->middleware('role:developer', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();

        return view('portal.settings.index')->withSettings($settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portal.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'key' => 'required|unique:settings',
        ]);

        $data = $request->only(['key', 'value', 'type', 'description', 'category']);
        if ($data['type'] == Settings::BOOL && !$request->has('value')) {
            $data['value'] = 0;
        }

        $setting = new Settings($data);
        $setting->save();


        Session::flash('success', "Setting: <i>" . $setting->key . "</i> successfully created.");

        return redirect()->route('settings.show', $setting->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Settings $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $setting)
    {
//        dd($article);
        return view('portal.settings.show')->withSetting($setting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Settings $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $setting)
    {
        return view('portal.settings.edit')->withSetting($setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Settings $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $setting)
    {

        $data = $request->only(['value', 'key', 'type', 'description', 'category']);

        if (isset($data['type']) && $data['type'] == Settings::BOOL && !$request->has('value')) {
            $data['value'] = 0;
        }

        $setting->update($data);
        $setting->save();

        Session::flash('success', "Setting: <i>" . $setting->key . "</i> successfully updated.");

        return redirect()->route('settings.show', $setting->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Settings $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $setting)
    {
        $key = $setting->key;
        $setting->delete();

        Session::flash('success', "Setting: <i>" . $key . "</i> successfully deleted.");

        return redirect()->route('settings.index');
    }

    //
    public function updateNotifySettings(Request $request)
    {
        $data = $request->only(['sent_by', 'dob', 'ecb', 'fdny', 'hpd', 'inspections', 'permits']);
        $request->user()->notifySettings()->updateOrCreate(['user_id' => $request->user()->id], $data);
        return redirect()->back();
    }

    public function updateReminderSettings(Request $request)
    {

        $data = $request->only(['sent_by', 'dob', 'ecb', 'fdny', 'hpd', 'inspections', 'permits']);
        $request->user()->reminderSettings()->updateOrCreate(['user_id' => $request->user()->id], $data);
        return redirect()->back();
    }

    public function updateSummarySettings(Request $request)
    {
        $data = $request->only(['sent_by', 'weekly', 'monthly', 'quarterly']);
        $request->user()->summarySettings()->updateOrCreate(['user_id' => $request->user()->id], $data);
        return redirect()->back();
    }

    public function getSetting(Request $request)
    {
        $value = Settings::get($request->key);
        return response()->json([
            'success' => true,
            'data' => $value,
        ]);
    }
}
