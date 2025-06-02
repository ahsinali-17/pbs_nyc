<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Handle OPTIONS requests for all routes
Route::options('{any}', function() {
    return response('', 200);
})->where('any', '.*');

// CSRF Token route
Route::get('/csrf-token', function (Request $request) {
    return response()->json(['token' => csrf_token()]);
});

Route::get('pbs/public/api/csrf-token', function (Request $request) {
    return response()->json(['token' => csrf_token()]);
});

Route::get('user', 'UserController@getCurrentUser');
Route::post('user/register', 'UserController@register');
Route::post('user/login', 'UserController@login');
Route::post('user/update', 'UserController@update');
Route::get('user/logout', 'UserController@logout');
Route::get('user/properties', 'ApiController@getProperties');

Route::post('user/DOBliveViolations', 'ApiController@getDOBviols');
Route::post('user/DOBswo', 'ApiController@getDOBswo');
Route::post('user/DOBcomplaints', 'ApiController@getDOBcomplaints');

Route::post('user/ECBliveHearings', 'ApiController@getECBhearings');
Route::post('user/ECBliveDue', 'ApiController@getECBpenalties');
Route::post('user/ECBdefaulted', 'ApiController@getECBdefaulted');
Route::post('user/ECBimposed', 'ApiController@getECBimposed');
Route::post('user/ECBoverpaid', 'ApiController@getECBoverpaid');
Route::post('user/ECBcorrections', 'ApiController@getECBcorrections');
Route::post('user/ECBcomplaints', 'ApiController@getECBcomplaints');
Route::post('user/ECBviolations', 'ApiController@getECBviolations');

Route::post('user/FDNYliveHearings', 'ApiController@getFDNYhearings');
Route::post('user/FDNYcorrections', 'ApiController@getFDNYcorrections');
Route::post('user/FDNYliveDue', 'ApiController@getFDNYpenalties');
Route::post('user/FDNYactiveViolOrders', 'ApiController@getFDNYviolationorders');
Route::post('user/FDNYcomplaints', 'ApiController@getFDNYcomplaints');

Route::post('user/HPDliveViolations', 'ApiController@getHPDviolations');
Route::post('user/HPDcomplaints', 'ApiController@getHPDcomplaints');
Route::post('user/HPDrepairs', 'ApiController@getHPDrepairs');
Route::post('user/HPDlitigations', 'ApiController@getHPDlitigations');
Route::post('user/HPDregistrations', 'ApiController@getHPDregistrations');

Route::post('user/InspectionsDOBboiler', 'ApiController@getInspectionsDOBboiler');
Route::post('user/InspectionsDEPboiler', 'ApiController@getInspectionsDEPboiler');
Route::post('user/InspectionsFacade', 'ApiController@getInspectionsFacade');
Route::post('user/InspectionsOthers', 'ApiController@getInspectionsOthers');

Route::post('user/PermitsDOBpermits', 'ApiController@getPermitsDOBpermits');
Route::post('user/PermitsDOBNOWpermits', 'ApiController@getPermitsDOBNOWpermits');
Route::post('user/PermitsDOBElevatorpermits', 'ApiController@getPermitsDOBElevatorpermits');
Route::post('user/PermitsDOBahv', 'ApiController@getPermitsDOBahv');
Route::post('user/PermitsFDNYAccount', 'ApiController@getPermitsFDNYAccount');
Route::post('user/PermitsElevator', 'ApiController@getPermitsElevator');
Route::post('user/DobJobFilings', 'ApiController@getDobJobFilings');
Route::post('user/DobNowJobFilings', 'ApiController@getDobNowJobFilings');
Route::post('user/BsaApplicationStatus', 'ApiController@getBsaApplicationStatus');

Route::get('user/articles', 'ApiController@getLastArticles');
Route::post('user/articlecontent', 'ApiController@getArticleContent');
Route::post('user/setting', 'SettingsController@getSetting');
Route::post('user/sendemail','ApiController@contactUs');

Route::post('user/notifications','ApiController@getNotifications');
Route::post('user/readNotification','ApiController@readNotification');

Route::post('contact', 'Api\ContactController@submit');



