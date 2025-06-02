<?php

/*
|--------------------------------------------------------------------------
| Tests Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Notifications\NewAlertNotification;
use App\User;
use Illuminate\Support\Facades\DB;

Route::get('/mail', function () {
    $user = App\User::first();
    $content['name'] = $user->name;
    $content["properties"] = $user->properties;
    $content["phone"] = $user->contact_number;
    $content["password"] = "pass";
    $content["email"] = $user->email;
    return view('mails.first-signup-mail', compact("content"));
});

Route::get('/mailattach', function () {
    $user = App\User::where("id", 2)->first();
    $pdf = PDF::loadView('pdf.summaryPdf', compact("user"), [], ['format' => 'A4']);
    $user->notify(new \App\Notifications\SummaryReport($user, $pdf));
    return $pdf->stream('document.pdf');
});

Route::get('/summary', 'SummaryController@summary');
Route::get('/summary2', 'SummaryController@summary2');
Route::get('/dobboilerReminder', function () {
    $item = App\Models\DobNowSafetyBoiler::where('inspection_date', '09/03/2019 00:00:00')->orderby('inspection_date', 'asc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    $expired = "false";
    return view('mails.reminders.dobboilerReminder', compact("user", "property", "expired", "item"));
});

Route::get('/depcatsReminder', function () {
    $item = App\Models\DepCatsPermits::where('status', 'LIKE', '%CURRENT%')->first();
    $property = $item->properties->first();
    $user = $property->user;
    $expired = "false";
    return view('mails.reminders.depcatsReminder', compact("user", "property", "expired", "item"));
});

Route::get('/facadeReminder', function () {
    $item = App\Models\DobNowFacadeFilings::where('submitted_on', '2018-03-23 00:00:00')->orderby('submitted_on', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    $expired = "false";
    return view('mails.reminders.facadeReminder', compact("user", "property", "expired", "item"));
});

Route::get('/othersReminder', function () {
    $item = App\Models\OtherInspections::where('due_date', '2024-06-06')->first();
    $property = $item->property;
    $user = $item->property->user;
    $expired = "false";
    return view('mails.reminders.othersReminder', compact("user", "property", "expired", "item"));
});

Route::get('/bsaApplicationStatus', function () {
    $item = App\Models\BSAApplicationStatus::orderby('filed', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.bsaApplicationStatus', compact("user", "property", "item"));
});

Route::get('/depCatsPermits', function () {
    $item = App\Models\DepCatsPermits::orderby('issuedate', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.depCatsPermits', compact("user", "property", "item"));
});

Route::get('/dobCertOccupancy', function () {
    $item = App\Models\DobCertOccupancy::orderby('c_o_issue_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobCertOccupancy', compact("user", "property", "item"));
});

Route::get('/dobComplaints', function () {
    $item = App\Models\DobComplaints::orderby('status', 'asc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobComplaints', compact("user", "property", "item"));
});

Route::get('/dobJobFilings', function () {
    $item = App\Models\DobJobFilings::orderby('latest_action_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobJobFilings', compact("user", "property", "item"));
});

Route::get('/dobNowApprovedPermits', function () {
    $item = App\Models\DobNowApprovedPermits::orderby('issued_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobNowApprovedPermits', compact("user", "property", "item"));
});


Route::get('/dobNowElectricalPermits', function () {
    $item = App\Models\DobNowElectricalPermits::orderby('filing_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobNowElectricalPermits', compact("user", "property", "item"));
});

Route::get('/dobNowElevatorPermits', function () {
    $item = App\Models\DobNowElevatorPermits::orderby('filing_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobNowElevatorPermits', compact("user", "property", "item"));
});

Route::get('/dobNowFacadeFilings', function () {
    $item = App\Models\DobNowFacadeFilings::orderby('filing_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobNowFacadeFilings', compact("user", "property", "item"));
});

Route::get('/dobNowJobFilings', function () {
    $item = App\Models\DobNowJobFilings::orderby('filing_status', 'asc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobNowJobFilings', compact("user", "property", "item"));
});

Route::get('/dobNowSafetyBoiler', function () {
    $item = App\Models\DobNowSafetyBoiler::orderby('inspection_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobNowSafetyBoiler', compact("user", "property", "item"));
});

Route::get('/dobPermits', function () {
    $item = App\Models\DobPermits::orderby('filing_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobPermits', compact("user", "property", "item"));
});

Route::get('/dobViolations', function () {
    $item = App\Models\DobViolations::orderby('issue_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dobViolations', compact("user", "property", "item"));
});

Route::get('/dotSidewalkCorrespondences', function () {
    $item = App\Models\DotSidewalkCorrespondences::orderby('date_received', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dotSidewalkCorrespondences', compact("user", "property", "item"));
});

Route::get('/dotSidewalkInspections', function () {
    $item = App\Models\DotSidewalkInspections::orderby('inspection_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.dotSidewalkInspections', compact("user", "property", "item"));
});

Route::get('/ecbViolations', function () {
    $item = App\Models\EcbViolations::orderby('hearing_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.ecbViolations', compact("user", "property", "item"));
});

Route::get('/fdnyActiveViolOrders', function () {
    $item = App\Models\FdnyActiveViolOrders::orderby('updated_at', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.fdnyActiveViolOrders', compact("user", "property", "item"));
});

Route::get('/fdnyCertOfFitness', function () {
    $item = App\Models\FdnyCertOfFitness::orderby('updated_at', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.fdnyCertOfFitness', compact("user", "property", "item"));
});

Route::get('/fdnyInspections', function () {
    $item = App\Models\FdnyInspections::orderby('updated_at', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.fdnyInspections', compact("user", "property", "item"));
});

Route::get('/hpdComplaints', function () {
    $item = App\Models\HpdComplaints::orderby('status', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.hpdComplaints', compact("user", "property", "item"));
});

Route::get('/hpdDwellingRegistrations', function () {
    $item = App\Models\HpdDwellingRegistrations::orderby('registrationenddate', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.hpdDwellingRegistrations', compact("user", "property", "item"));
});

Route::get('/hpdHousingLitigations', function () {
    $item = App\Models\HpdHousingLitigations::where('casestatus', '!=', 'CLOSED')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.hpdHousingLitigations', compact("user", "property", "item"));
});

Route::get('/hpdRepairVacateOrders', function () {
    $item = App\Models\HpdRepairVacateOrders::orderby('vacate_effective_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.hpdRepairVacateOrders', compact("user", "property", "item"));
});

Route::get('/hpdViolations', function () {
    $item = App\Models\HpdViolations::orderby('inspectiondate', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.hpdViolations', compact("user", "property", "item"));
});

Route::get('/landmarkComplaints', function () {
    $item = App\Models\LandmarkComplaints::orderby('date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.landmarkComplaints', compact("user", "property", "item"));
});

Route::get('/landmarkPermits', function () {
    $item = App\Models\LandmarkPermits::first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.landmarkPermits', compact("user", "property", "item"));
});

Route::get('/landmarkViolations', function () {
    $item = App\Models\LandmarkViolations::orderby('vio_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.landmarkViolations', compact("user", "property", "item"));
});

Route::get('/oathHearings', function () {
    $item = App\Models\OathHearings::orderby('violation_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.oathHearings', compact("user", "property", "item"));
});

Route::get('/serviceRequests311', function () {
    $item = App\Models\ServiceRequests311::orderby('created_date', 'desc')->first();
    $property = $item->properties->first();
    $user = $property->user;
    return view('mails.alerts.serviceRequests311', compact("user", "property", "item"));
});

Route::get('/violationmail', function () {
    $user = App\User::where("id", 2)->first();
    $date = $user->created_at;
    $alerts = array();
    foreach ($user->properties()->get() as $property) {
        if ($property->hasNewAlertFromDate($date)) array_push($alerts, $property);
    }

    return view('mails.summary-mail', compact("alerts", "user", "date"));
});

Route::get('/alerts-details', function () {
    $user = App\User::where("id", 2)->first();
    $date = $user->created_at;
    $alerts = $user->properties;
//    $alerts = array();
//    foreach ($user->properties()->get() as $property) {
//        if ($property->hasNewAlertFromDate($date)) array_push($alerts, $property);
//    }

    return view('frontend.alertsdetails', compact("alerts", "user", "date"));
});

Route::get('/full-report', function () {
    $user = App\User::where("id", 2)->first();
    $date = $user->created_at;
    $alerts = $user->properties;
//    $alerts = array();
//    foreach ($user->properties()->get() as $property) {
//        if ($property->hasNewAlertFromDate($date)) array_push($alerts, $property);
//    }

    return view('frontend.reports.fullreport', compact("alerts", "user", "date"));
});


Route::get('/new-emails', function () {
    $users = User::all();
    foreach ($users as $user) {
        if ($user->level() > 2) {
            $bins = collect($user->properties()->pluck('bin'));
            $bbls = collect($user->properties()->pluck('bbl'));
            $result = DB::table('alert_collector')->whereIn('bin', $bins)->orWhereIn('bbl', $bbls)->get();
            if ($result->count()) {
                $updates = "";
                $newalerts = "";
                foreach ($result->pluck('dataset')->unique() as $dataset) {
                    foreach ($result->where('dataset', $dataset) as $alert) {
                        $property = \App\Models\Property::where('bbl', $alert->bbl)->orWhere('bin', $alert->bin)->first();
                        $item = new $dataset(json_decode($alert->original_data, true));
                        $changes = json_decode($alert->dirty_data, true);
                        if ($changes)
                            $updates .= view($item->mailview, ['item' => $item, 'user' => $user, 'property' => $property, 'changes' => $changes, 'subject' => $item->getMailSubject($changes ? true : false)])->render();
                        else
                            $newalerts .= view($item->mailview, ['item' => $item, 'user' => $user, 'property' => $property, 'changes' => $changes, 'subject' => $item->getMailSubject($changes ? true : false)])->render();
                    }
                }
                if ($newalerts) {
                    $testuser = User::whereId(62)->first();
                    $testuser->notify(new NewAlertNotification($testuser, $newalerts, true));
//                    $user->notify();
                }
                if ($updates) {
                    $testuser = User::whereId(62)->first();
                    $testuser->notify(new NewAlertNotification($testuser, $updates, false));
                    //$user->notify();
                }

            }
        }
    }
    DB::table('alert_collector')->truncate();
});