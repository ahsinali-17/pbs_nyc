<?php


Route::impersonate();

// Authentication Routes
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes 
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    // Password Reset Routes
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

    // Password Confirmation Routes
    Route::get('password/confirm', 'ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'ConfirmPasswordController@confirm');
});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['level:5']], function () {
        Route::group(['prefix' => 'newsletter'], function () {
            Route::resource('campaign', 'NewsletterController');
            Route::post('campaign/{id}/send', 'NewsletterController@send')->name('campaign.send');
            Route::post('campaign/{id}/sendtest', 'NewsletterController@sendtest')->name('campaign.sendtest');
            Route::post('campaign/imageupload', 'NewsletterController@imageupload')->name('campaign.imageupload');
            Route::get('campaign/{id}/replicate', 'NewsletterController@replicateCampaign')->name('campaign.replicate');
            Route::get('campaign/{id}/report', 'NewsletterController@report')->name('campaign.report');

            Route::resource('lists', 'NewsletterListsController');
            Route::resource('lists.subscribers', 'NewsletterSubscribersController');
            Route::post('lists/{listid}/subscribers-bulkadd', 'NewsletterSubscribersController@bulkAdd')->name('lists.subscribers.bulkadd');
            Route::get('lists/{listid}/subscribers-bulkadd', 'NewsletterSubscribersController@bulkAddView')->name('lists.subscribers.bulkaddview');
        });
        // Sync Status Monitor
        Route::get('/sync-status', function () {
            return view('portal.sync');
        })->name('sync.status');

        Route::resource('settings', 'SettingsController');
        //client list
        Route::get('/clients', 'LoginAsClientController@userList')->name('loginasclient');

        Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () {
            Route::resource('article', 'ArticleController');
            Route::resource('category', 'CategoryController');
        });
        //HPD Mailings
//        Route::resource('hpdmailing', 'HpdAnnualMailingController');
//        Route::resource('hpdmailingfile', 'HpdAnnualMailingFilesController')->only(['store', 'destroy']);
    });

    Route::group(['middleware' => ['level:3']], function () {

        //HPD Mailings
        Route::resource('hpdmailing', 'HpdAnnualMailingController');
        Route::resource('hpdmailingfile', 'HpdAnnualMailingFilesController')->only(['store', 'destroy']);
    });


    //settings
    Route::post('/user/summary-settings/update', 'SettingsController@updateSummarySettings')->name('settings.summary.update');
    Route::post('/user/notify-settings/update', 'SettingsController@updateNotifySettings')->name('settings.notify.update');
    Route::post('/user/reminder-settings/update', 'SettingsController@updateReminderSettings')->name('settings.reminder.update');

    //payments
    Route::get('/update-payment-method', 'PaymentController@updatePaymentMethod')->name('payment.method.update');
    Route::post('/set-default-payment-method', 'PaymentController@setDefaultPaymentMethod')->name('payment.method.setdefault');
    Route::get('/subscribe', 'PaymentController@subscribe')->name('payment.subscribe');
    Route::post('/need-payment', 'PaymentController@payAmount')->name('payment.need-payment');


    // Bronze Member
    Route::group(['middleware' => ['bronze']], function () {
        Route::get('/', 'PortalController@index')->name('portal.index')->middleware(['paid']);
        Route::get('calender', function () {
            $user = auth()->user();
            return view('portal.content.calender', compact('user'));
        })->name('calender');
    });

    // Summary
    Route::group(['middleware' => ['level:3']], function () {
        Route::get('/summary', function () {
            $user = auth()->user();


            $path = public_path('pdfstorage/' . $user->id . '-' . now()->format('YmdHi') . '.pdf');

            if (file_exists($path)) {
                return Response::make(file_get_contents($path), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="summary-' . now()->format('YmdHi') . '.pdf"'
                ]);

            }

            $options = [
                'header-html' => view('pdf.summary-header'),
                'footer-html' => view('pdf.summary-footer'),
                'orientation' => 'portrait',
                'encoding' => 'UTF-8',
                'margin-top' => 45,
                'margin-left' => 0,
                'margin-right' => 0,
                'margin-bottom' => 40,
                'header-spacing' => 5,
                'footer-spacing' => 5,
                'user-style-sheet' => base_path('/public/css/bootstrap.css'),
            ];

            $user->load('properties');
            $pdf = \PDF::loadView('pdf.NEWnewSummaryPdf', compact("user"));
            $pdf->setOptions($options);
            $pdf->save($path);

            return Response::make(file_get_contents($path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="summary-' . now()->format('YmdHi') . '.pdf"'
            ]);
//            return $pdf->stream('report.pdf');
        })->name('downloadSummary');
    });

// Gold Member
    Route::group(['middleware' => ['gold']], function () {

        //DASHBOARD LAR
        Route::get('notifications', 'PortalController@notifications')->name('notifications')->middleware(['level:4']);
        Route::get('buildingQuickview', 'PortalController@buildingQuickview')->name('buildingQuickview')->middleware(['level:4']);
        Route::get('buildingProfiles', 'BuildingProfileController@buildingProfiles')->name('buildingProfiles')->middleware(['level:4']);
        Route::get('buildingProfiles/{buildingid}', 'BuildingProfileController@singleBuildingProfile')->name('singleBuildingProfile')->middleware(['level:4']);

        //Property Dedicated Contact
        Route::post('buildingProfiles/dedicatedcontact', 'PropertyController@dedicatedcontact')->name('property.dedicatedcontact.update')->middleware(['level:4']);

        Route::post('buildingProfiles/photoUpdate/{id}', 'PropertyController@photoUpdate')->name('property.photo.update')->middleware(['level:4']);
        Route::post('buildingProfiles/photoDelete/{id}', 'PropertyController@photoDelete')->name('property.photo.delete')->middleware(['level:4']);

        //Property Documents
        Route::post('buildingProfiles/{buildingid}/documents/add', 'PropertyDocumentsController@store')->name('property.documents.store')->middleware(['level:4']);
        Route::post('buildingProfiles/{buildingid}/documents/delete', 'PropertyDocumentsController@destroy')->name('property.documents.destroy')->middleware(['level:4']);


        //Property Notes
        Route::post('buildingProfiles/{buildingid}/notes/add', 'PropertyNotesController@store')->name('property.notes.store')->middleware(['level:4']);
        Route::post('buildingProfiles/{buildingid}/notes/delete', 'PropertyNotesController@destroy')->name('property.notes.destroy')->middleware(['level:4']);


        Route::get('recordsQuickview', 'PortalController@recordsQuickview')->name('recordsQuickview')->middleware(['level:4']);
        Route::get('properties', 'PortalController@properties')->name('properties')->middleware(['level:4']);
        Route::get('profile', 'PortalController@profile')->name('profile')->middleware(['level:4']);
        Route::post('profile/update', 'UserController@updatePortal')->name('profile.update')->middleware(['level:4']);


        //DOB LAR
        Route::get('DOBliveViolations', 'ViolationsController@DOBliveViolations')->name('liveViolation')->middleware(['level:4']);
        Route::get('DOBliveViolations/{buildingid}', 'ViolationsController@DOBliveViolationsSingle')->name('liveViolationSingle')->middleware(['level:4']);
        Route::get('DOBswo', 'ComplaintsController@DOBswo')->name('DOBswo')->middleware(['level:4']);
        Route::get('DOBswo/{buildingid}', 'ComplaintsController@DOBswo')->name('DOBswoSingle')->middleware(['level:4']);
        Route::get('DOBcomplaints', 'ComplaintsController@DOBComplaints')->name('DOBcomplaints')->middleware(['level:4']);
        Route::get('DOBcomplaints/{buildingid}', 'ComplaintsController@DOBComplaints')->name('DOBcomplaintsSingle')->middleware(['level:4']);


        //Portal datatableajax routes.
        Route::get('/user/dobViolations', 'ApiController@getDobViolations')->name('user.dobViolations')->middleware(['auth']);
        Route::get('/user/dobViolations/{buildingid}', 'ApiController@getDobViolations')->name('user.dobViolationsSingle')->middleware(['auth']);


        //ECB LER
        Route::get('ECBliveHearings', 'HearingsController@ECBliveHearings')->name('ECBliveHearings')->middleware(['level:4']);
        Route::get('ECBliveHearings/{buildingid}', 'HearingsController@ECBliveHearings')->name('ECBliveHearingsSingle')->middleware(['level:4']);
        Route::get('ECBliveDue', 'HearingsController@ECBliveDue')->name('ECBliveDue')->middleware(['level:4']);
        Route::get('ECBliveDue/{buildingid}', 'HearingsController@ECBliveDue')->name('ECBliveDueSingle')->middleware(['level:4']);
        Route::get('defaulted', 'HearingsController@defaulted')->name('defaulted')->middleware(['level:4']);
        Route::get('defaulted/{buildingid}', 'HearingsController@defaulted')->name('defaultedSingle')->middleware(['level:4']);
        Route::get('imposed', 'HearingsController@imposed')->name('imposed')->middleware(['level:4']);
        Route::get('imposed/{buildingid}', 'HearingsController@imposed')->name('imposedSingle')->middleware(['level:4']);
        Route::get('overpaid', 'HearingsController@overpaid')->name('overpaid')->middleware(['level:4']);
        Route::get('overpaid/{buildingid}', 'HearingsController@overpaid')->name('overpaidSingle')->middleware(['level:4']);
        Route::get('ECBcorrections', 'HearingsController@ECBcorrections')->name('ECBcorrections')->middleware(['level:4']);
        Route::get('ECBcorrections/{buildingid}', 'HearingsController@ECBcorrections')->name('ECBcorrectionsSingle')->middleware(['level:4']);
        Route::get('ECBcomplaints', 'HearingsController@ECBcomplaints')->name('ECBcomplaints')->middleware(['level:4']);
        Route::get('ECBcomplaints/{buildingid}', 'HearingsController@ECBcomplaints')->name('ECBcomplaintsSingle')->middleware(['level:4']);
        Route::get('ECBviolations', 'ViolationsController@ECBviolations')->name('ECBviolations')->middleware(['level:4']);      // menüde yok
        Route::get('ECBviolations/{buildingid}', 'ViolationsController@ECBviolations')->name('ECBviolationsSingle')->middleware(['level:4']);  // menüde


        //FDNY LER
        Route::get('FDNYliveHearings', 'HearingsController@FDNYliveHearings')->name('FDNYliveHearings')->middleware(['level:4']);
        Route::get('FDNYliveHearings/{buildingid}', 'HearingsController@FDNYliveHearings')->name('FDNYliveHearingsSingle')->middleware(['level:4']);
        Route::get('FDNYcorrections', 'HearingsController@FDNYcorrections')->name('FDNYcorrections')->middleware(['level:4']);
        Route::get('FDNYcorrections/{buildingid}', 'HearingsController@FDNYcorrections')->name('FDNYcorrectionsSingle')->middleware(['level:4']);
        Route::get('FDNYliveDue', 'HearingsController@FDNYliveDue')->name('FDNYliveDue')->middleware(['level:4']);
        Route::get('FDNYliveDue/{buildingid}', 'HearingsController@FDNYliveDue')->name('FDNYliveDueSingle')->middleware(['level:4']);
        Route::get('FDNYactiveViolOrders', 'ViolationsController@FDNYactiveViolOrders')->name('FDNYactiveViolOrders')->middleware(['level:4']);
        Route::get('FDNYactiveViolOrders/{buildingid}', 'ViolationsController@FDNYactiveViolOrders')->name('FDNYactiveViolOrdersSingle')->middleware(['level:4']);
        Route::get('FDNYcomplaints', 'HearingsController@FDNYcomplaints')->name('FDNYcomplaints')->middleware(['level:4']);
        Route::get('FDNYcomplaints/{buildingid}', 'HearingsController@FDNYcomplaints')->name('FDNYcomplaintsSingle')->middleware(['level:4']);


        //HPD LER
        Route::get('HPDliveViolations', 'ViolationsController@HPDliveViolations')->name('HPDliveViolations')->middleware(['level:4']);
        Route::get('HPDliveViolations/{buildingid}', 'ViolationsController@HPDliveViolations')->name('HPDliveViolationsSingle')->middleware(['level:4']);
        Route::get('HPDcomplaints', 'ComplaintsController@HPDcomplaints')->name('HPDcomplaints')->middleware(['level:4']);
        Route::get('HPDcomplaints/{buildingid}', 'ComplaintsController@HPDcomplaints')->name('HPDcomplaintsSingle')->middleware(['level:4']);
        Route::get('HPDrepairs', 'ComplaintsController@HPDrepairs')->name('HPDrepairs')->middleware(['level:4']);
        Route::get('HPDrepairs/{buildingid}', 'ComplaintsController@HPDrepairs')->name('HPDrepairsSingle')->middleware(['level:4']);
        Route::get('HPDlitigations', 'FilingsController@HPDlitigations')->name('HPDlitigations')->middleware(['level:4']);
        Route::get('HPDlitigations/{buildingid}', 'FilingsController@HPDlitigations')->name('HPDlitigationsSingle')->middleware(['level:4']);
        Route::get('HPDregistrations', 'FilingsController@HPDregistrations')->name('HPDregistrations')->middleware(['level:4']);
        Route::get('HPDregistrations/{buildingid}', 'FilingsController@HPDregistrations')->name('HPDregistrationsSingle')->middleware(['level:4']);


        //INSPECTIONS LAR
        Route::get('DOBinspections', 'FilingsController@DOBinspections')->name('DOBinspections')->middleware(['level:4']);
        Route::get('DOBinspections/{buildingid}', 'FilingsController@DOBinspections')->name('DOBinspectionsSingle')->middleware(['level:4']);
        Route::get('FACADEinspections', 'FilingsController@FACADEinspections')->name('FACADEinspections')->middleware(['level:4']);
        Route::get('FACADEinspections/{buildingid}', 'FilingsController@FACADEinspections')->name('FACADEinspectionsSingle')->middleware(['level:4']);
        Route::get('DEPinspections', 'PermitsController@DEPinspections')->name('DEPinspections')->middleware(['level:4']);
        Route::get('DEPinspections/{buildingid}', 'PermitsController@DEPinspections')->name('DEPinspectionsSingle')->middleware(['level:4']);
        Route::get('ELEVATORinspections', 'PermitsController@ELEVATORinspections')->name('ELEVATORinspections')->middleware(['level:4']);
        Route::get('ELEVATORinspections/{buildingid}', 'PermitsController@ELEVATORinspections')->name('ELEVATORinspectionsSingle')->middleware(['level:4']);
        Route::get('FDNYinspections', 'PermitsController@FDNYinspections')->name('FDNYinspections')->middleware(['level:4']);
        Route::get('LL84inspections', 'PermitsController@LL84inspections')->name('LL84inspections')->middleware(['level:4']);
        Route::get('LL87inspections', 'PermitsController@LL87inspections')->name('LL87inspections')->middleware(['level:4']);
        Route::get('LL152inspections', 'PermitsController@LL152inspections')->name('LL152inspections')->middleware(['level:4']);


        //other inspections
        Route::get('Otherinspections', 'OtherInspectionsController@index')->name('otherinspections.index')->middleware(['level:4']);
        Route::get('Otherinspections/{inspectionid}/edit', 'OtherInspectionsController@edit')->name('otherinspections.edit')->middleware(['level:4']);
        Route::post('Otherinspections', 'OtherInspectionsController@store')->name('otherinspections.store')->middleware(['level:4']);
        Route::post('Otherinspections/{inspectionid}/save', 'OtherInspectionsController@update')->name('otherinspections.update')->middleware(['level:4']);
        Route::post('Otherinspections/{inspectionid}/delete', 'OtherInspectionsController@destroy')->name('otherinspections.destroy')->middleware(['level:4']);


        //PERMITS   LER
        Route::get('DOBapprovedPermits', 'PermitsController@DOBapprovedPermits')->name('DOBapprovedPermits')->middleware(['level:4']);
        Route::get('DOBapprovedPermits/{buildingid}', 'PermitsController@DOBapprovedPermits')->name('DOBapprovedPermitsSingle')->middleware(['level:4']);
        Route::get('DOBpermits', 'PermitsController@DOBpermits')->name('DOBpermits')->middleware(['level:4']);
        Route::get('DOBpermits/{buildingid}', 'PermitsController@DOBpermits')->name('DOBpermitsSingle')->middleware(['level:4']);
        Route::get('DOBelevatorPermits', 'PermitsController@DOBelevatorPermits')->name('DOBelevatorPermits')->middleware(['level:4']);
        Route::get('DOBelevatorPermits/{buildingid}', 'PermitsController@DOBelevatorPermits')->name('DOBelevatorPermitsSingle')->middleware(['level:4']);
        Route::get('DOBboilerPermits', 'FilingsController@DOBboilerPermits')->name('DOBboilerPermits')->middleware(['level:4']);
        Route::get('DOBboilerPermits/{buildingid}', 'FilingsController@DOBboilerPermits')->name('DOBboilerPermitsSingle')->middleware(['level:4']);
        Route::get('DOBahvPermits', 'PermitsController@DOBahvPermits')->name('DOBahvPermits')->middleware(['level:4']);
        Route::get('DOBahvPermits/{buildingid}', 'PermitsController@DOBahvPermits')->name('DOBahvPermitsSingle')->middleware(['level:4']);
        Route::get('FDNYcofPermits', 'PermitsController@FDNYcofPermits')->name('FDNYcofPermits')->middleware(['level:4']);
        Route::get('FDNYcofPermits/{buildingid}', 'PermitsController@FDNYcofPermits')->name('FDNYcofPermitsSingle')->middleware(['level:4']);
        Route::get('DOBnowJobFilings', 'FilingsController@DOBnowJobFilings')->name('DOBnowJobFilings')->middleware(['level:4']);
        Route::get('DOBnowJobFilings/{buildingid}', 'FilingsController@DOBnowJobFilings')->name('DOBnowJobFilingsSingle')->middleware(['level:4']);
        Route::get('DOBjobFilings', 'FilingsController@DOBjobFilings')->name('DOBjobFilings')->middleware(['level:4']);
        Route::get('DOBjobFilings/{buildingid}', 'FilingsController@DOBjobFilings')->name('DOBjobFilingsSingle')->middleware(['level:4']);
        Route::get('BSAApplications', 'FilingsController@bsaApplicationStatus')->name('bsaApplicationStatus')->middleware(['level:4']);


        //311 servis kısmı menüde yok
        Route::get('SERVICErequests311', 'HearingsController@SERVICErequests311')->name('SERVICErequests311')->middleware(['level:4']);
        Route::get('SERVICErequests311/{buildingid}', 'HearingsController@SERVICErequests311')->name('SERVICErequests311Single')->middleware(['level:4']);


        //-Complaints
        //dobComplaints
        //hpdComplaints
        //hpdRepairVacateOrders
        //landmarkComplaints
        Route::group(['prefix' => 'complaints', 'middleware' => ['activity']], function () {
            Route::get('dobComplaints', 'ComplaintsController@dobComplaints')->name('complaints.dobComplaints');
            Route::get('hpdComplaints', 'ComplaintsController@hpdComplaints')->name('complaints.hpdComplaints');
            Route::get('hpdRepairVacateOrders', 'ComplaintsController@hpdRepairVacateOrders')->name('complaints.hpdRepairVacateOrders');
            Route::get('landmarkComplaints', 'ComplaintsController@landmarkComplaints')->name('complaints.landmarkComplaints');
        });

        Route::group(['prefix' => 'tickets'], function () {
            Route::post('create', 'TicketController@create')->name('building.ticket.post');
        });


        //-Violations
        //dobViolations
        //ecbViolations
        //hpdViolations
        //landmarkViolations
        Route::group(['prefix' => 'violations', 'middleware' => ['activity']], function () {
            Route::get('dobViolations', 'ViolationsController@dobViolations')->name('violations.dobViolations');
            Route::get('ecbViolations', 'ViolationsController@ecbViolations')->name('violations.ecbViolations');
            Route::get('hpdViolations', 'ViolationsController@hpdViolations')->name('violations.hpdViolations');
            Route::get('landmarkViolations', 'ViolationsController@landmarkViolations')->name('violations.landmarkViolations');

        });


        //-Filings
        //bsaApplicationStatus
        //dobNowFacadeFilings
        //dobNowJobFilings
        //dobNowSafetyBoiler
        //dobJobFilings
        //dotSidewalkCorrespondences
        //dotSidewalkInspections
        //hpdDwellingRegistrations
        //hpdHousingLitigations
        Route::group(['prefix' => 'filings', 'middleware' => ['activity']], function () {
            Route::get('bsaApplicationStatus', 'FilingsController@bsaApplicationStatus')->name('filings.bsaApplicationStatus');
            Route::get('dobNowFacadeFilings', 'FilingsController@dobNowFacadeFilings')->name('filings.dobNowFacadeFilings');
            Route::get('dobNowJobFilings', 'FilingsController@dobNowJobFilings')->name('filings.dobNowJobFilings');
            Route::get('dobJobFilings', 'FilingsController@dobJobFilings')->name('filings.dobJobFilings');
            Route::get('dobNowSafetyBoiler', 'FilingsController@dobNowSafetyBoiler')->name('filings.dobNowSafetyBoiler');
            Route::get('dotSidewalkCorrespondences', 'FilingsController@dotSidewalkCorrespondences')->name('filings.dotSidewalkCorrespondences');
            Route::get('dotSidewalkInspections', 'FilingsController@dotSidewalkInspections')->name('filings.dotSidewalkInspections');
            Route::get('hpdDwellingRegistrations', 'FilingsController@hpdDwellingRegistrations')->name('filings.hpdDwellingRegistrations');
            Route::get('hpdHousingLitigations', 'FilingsController@hpdHousingLitigations')->name('filings.hpdHousingLitigations');
        });


        //-Permits
        //dobCertOccupancy
        //dobPermits
        //dobNowApprovedPermits
        //dobNowElectricalPermits
        //dobNowElevatorPermits
        //depCatsPermits
        //landmarkPermits
        Route::group(['prefix' => 'permits', 'middleware' => ['activity']], function () {
            Route::get('dobCertOccupancy', 'PermitsController@dobCertOccupancy')->name('permits.dobCertOccupancy');
            Route::get('dobPermits', 'PermitsController@dobPermits')->name('permits.dobPermits');
            Route::get('dobNowApprovedPermits', 'PermitsController@dobNowApprovedPermits')->name('permits.dobNowApprovedPermits');
            Route::get('dobNowElectricalPermits', 'PermitsController@dobNowElectricalPermits')->name('permits.dobNowElectricalPermits');
            Route::get('dobNowElevatorPermits', 'PermitsController@dobNowElevatorPermits')->name('permits.dobNowElevatorPermits');
            Route::get('depCatsPermits', 'PermitsController@depCatsPermits')->name('permits.depCatsPermits');
            Route::get('landmarkPermits', 'PermitsController@landmarkPermits')->name('permits.landmarkPermits');

        });


        //-Hearings
        //oathHearings
        //serviceRequests311
        Route::group(['prefix' => 'hearings', 'middleware' => ['activity']], function () {
            Route::get('oathHearings', 'HearingsController@oathHearings')->name('hearings.oathHearings');
            Route::get('serviceRequests311', 'HearingsController@serviceRequests311')->name('hearings.serviceRequests311');

        });
    });


    Route::group(['middleware' => ['level:6']], function () {
        Route::get('search', 'PropertySearchController@index')->name('property.search');
        //Route::get('autocomplete', 'PropertySearchController@search')->name('property.search.ac');

        Route::get('list', 'PropertyListController@index')->name('property.list');
        Route::post('addtomylist', 'PropertyListController@add')->name('property.list.add');


        //roles routes override --------------------------------------------------------------------------------------------------------------------
        Route::group([
            'middleware' => ['level:6'],
            'as' => 'laravelroles::',
            'namespace' => '\jeremykenedy\LaravelRoles\App\Http\Controllers',
        ], function () {

            // Dashboards and CRUD Routes
            Route::resource('roles', 'LaravelRolesController');
            Route::resource('permissions', 'LaravelPermissionsController');

            // Deleted Roles Dashboard and CRUD Routes
            Route::get('roles-deleted', 'LaravelRolesDeletedController@index')->name('roles-deleted');
            Route::get('role-deleted/{id}', 'LaravelRolesDeletedController@show')->name('role-show-deleted');
            Route::put('role-restore/{id}', 'LaravelRolesDeletedController@restoreRole')->name('role-restore');
            Route::post('roles-deleted-restore-all', 'LaravelRolesDeletedController@restoreAllDeletedRoles')->name('roles-deleted-restore-all');
            Route::delete('roles-deleted-destroy-all', 'LaravelRolesDeletedController@destroyAllDeletedRoles')->name('destroy-all-deleted-roles');
            Route::delete('role-destroy/{id}', 'LaravelRolesDeletedController@destroy')->name('role-item-destroy');

            // Deleted Permissions Dashboard and CRUD Routes
            Route::get('permissions-deleted', 'LaravelpermissionsDeletedController@index')->name('permissions-deleted');
            Route::get('permission-deleted/{id}', 'LaravelpermissionsDeletedController@show')->name('permission-show-deleted');
            Route::put('permission-restore/{id}', 'LaravelpermissionsDeletedController@restorePermission')->name('permission-restore');
            Route::post('permissions-deleted-restore-all', 'LaravelpermissionsDeletedController@restoreAllDeletedPermissions')->name('permissions-deleted-restore-all');
            Route::delete('permissions-deleted-destroy-all', 'LaravelpermissionsDeletedController@destroyAllDeletedPermissions')->name('destroy-all-deleted-permissions');
            Route::delete('permission-destroy/{id}', 'LaravelpermissionsDeletedController@destroy')->name('permission-item-destroy');
        });


        //logger routes override --------------------------------------------------------------------------------------------------------------------
        Route::group(['prefix' => 'activity', 'namespace' => '\jeremykenedy\LaravelLogger\App\Http\Controllers', 'middleware' => ['activity']], function () {

            // Dashboards
            Route::get('/', 'LaravelLoggerController@showAccessLog')->name('activity');
            Route::get('/cleared', ['uses' => 'LaravelLoggerController@showClearedActivityLog'])->name('cleared');

            // Drill Downs
            Route::get('/log/{id}', 'LaravelLoggerController@showAccessLogEntry');
            Route::get('/cleared/log/{id}', 'LaravelLoggerController@showClearedAccessLogEntry');

            // Forms
            Route::delete('/clear-activity', ['uses' => 'LaravelLoggerController@clearActivityLog'])->name('clear-activity');
            Route::delete('/destroy-activity', ['uses' => 'LaravelLoggerController@destroyActivityLog'])->name('destroy-activity');
            Route::post('/restore-log', ['uses' => 'LaravelLoggerController@restoreClearedActivityLog'])->name('restore-activity');
        });

        // users routes --------------------------------------------------------------------------------------------------------------------
        Route::group(['namespace' => '\jeremykenedy\laravelusers\app\Http\Controllers'], function () {
            Route::resource('users', 'UsersManagementController', [
                'names' => [
                    'index' => 'users',
                    'destroy' => 'user.destroy',
                ],
            ]);
        });

        Route::middleware(['auth'])->group(function () {
            Route::post('search-users', '\jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@search')->name('search-users');
        });

    });


    //Route::group(['middleware' => '', function () use ($main_route) {
    //Ticket public route
    Route::get("tickets/complete", '\Kordy\Ticketit\Controllers\TicketsController@indexComplete')
        ->name("tickets-complete");
    Route::get("tickets/data/{id?}", '\Kordy\Ticketit\Controllers\TicketsController@data')
        ->name("tickets.data");

    $field_name = last(explode('/', 'tickets'));
    Route::resource('tickets', '\Kordy\Ticketit\Controllers\TicketsController', [
        'names' => [
            'index' => 'tickets.index',
            'store' => 'tickets.store',
            'create' => 'tickets.create',
            'update' => 'tickets.update',
            'show' => 'tickets.show',
            'destroy' => 'tickets.destroy',
            'edit' => 'tickets.edit',
        ],
        'parameters' => [
            'tickets' => 'ticket',
        ],
    ]);

    //Ticket Comments public route
    $field_name = last(explode('/', "tickets-comment"));
    Route::resource("tickets-comment", '\Kordy\Ticketit\Controllers\CommentsController', [
        'names' => [
            'index' => "tickets-comment.index",
            'store' => "tickets-comment.store",
            'create' => "tickets-comment.create",
            'update' => "tickets-comment.update",
            'show' => "tickets-comment.show",
            'destroy' => "tickets-comment.destroy",
            'edit' => "tickets-comment.edit",
        ],
        'parameters' => [
            'tickets-comment' => 'ticket_comment',
        ],
    ]);

    //Ticket complete route for permitted user.
    Route::get("tickets/{id}/complete", '\Kordy\Ticketit\Controllers\TicketsController@complete')
        ->name("tickets.complete");

    //Ticket reopen route for permitted user.
    Route::get("tickets/{id}/reopen", '\Kordy\Ticketit\Controllers\TicketsController@reopen')
        ->name("tickets.reopen");
    //});

    Route::group(['middleware' => '\Kordy\Ticketit\Middleware\IsAgentMiddleware'], function () {

        //API return list of agents in particular category
        Route::get("tickets/agents/list/{category_id?}/{ticket_id?}", [
            'as' => 'ticketsagentselectlist',
            'uses' => '\Kordy\Ticketit\Controllers\TicketsController@agentSelectList',
        ]);
    });

    Route::group(['middleware' => '\Kordy\Ticketit\Middleware\IsAdminMiddleware'], function () {
        //Ticket admin index route (ex. http://url/tickets-admin/)
        Route::get("tickets-admin/indicator/{indicator_period?}", [
            'as' => 'dashboard.dashboard.indicator',
            'uses' => '\Kordy\Ticketit\Controllers\DashboardController@index',
        ]);
        Route::get('tickets-admin', '\Kordy\Ticketit\Controllers\DashboardController@index');

        //Ticket statuses admin routes (ex. http://url/tickets-admin/status)
        Route::resource("tickets-admin/status", '\Kordy\Ticketit\Controllers\StatusesController', [
            'names' => [
                'index' => "dashboard.status.index",
                'store' => "dashboard.status.store",
                'create' => "dashboard.status.create",
                'update' => "dashboard.status.update",
                'show' => "dashboard.status.show",
                'destroy' => "dashboard.status.destroy",
                'edit' => "dashboard.status.edit",
            ],
        ]);

        //Ticket priorities admin routes (ex. http://url/tickets-admin/priority)
        Route::resource("tickets-admin/priority", '\Kordy\Ticketit\Controllers\PrioritiesController', [
            'names' => [
                'index' => "dashboard.priority.index",
                'store' => "dashboard.priority.store",
                'create' => "dashboard.priority.create",
                'update' => "dashboard.priority.update",
                'show' => "dashboard.priority.show",
                'destroy' => "dashboard.priority.destroy",
                'edit' => "dashboard.priority.edit",
            ],
        ]);

        //Agents management routes (ex. http://url/tickets-admin/agent)
        Route::resource("tickets-admin/agent", '\Kordy\Ticketit\Controllers\AgentsController', [
            'names' => [
                'index' => "dashboard.agent.index",
                'store' => "dashboard.agent.store",
                'create' => "dashboard.agent.create",
                'update' => "dashboard.agent.update",
                'show' => "dashboard.agent.show",
                'destroy' => "dashboard.agent.destroy",
                'edit' => "dashboard.agent.edit",
            ],
        ]);

        //Agents management routes (ex. http://url/tickets-admin/agent)
        Route::resource("tickets-admin/category", '\Kordy\Ticketit\Controllers\CategoriesController', [
            'names' => [
                'index' => "dashboard.category.index",
                'store' => "dashboard.category.store",
                'create' => "dashboard.category.create",
                'update' => "dashboard.category.update",
                'show' => "dashboard.category.show",
                'destroy' => "dashboard.category.destroy",
                'edit' => "dashboard.category.edit",
            ],
        ]);

        //Settings configuration routes (ex. http://url/tickets-admin/configuration)
        Route::resource("tickets-admin/configuration", '\Kordy\Ticketit\Controllers\ConfigurationsController', [
            'names' => [
                'index' => "dashboard.configuration.index",
                'store' => "dashboard.configuration.store",
                'create' => "dashboard.configuration.create",
                'update' => "dashboard.configuration.update",
                'show' => "dashboard.configuration.show",
                'destroy' => "dashboard.configuration.destroy",
                'edit' => "dashboard.configuration.edit",
            ],
        ]);

        //Administrators configuration routes (ex. http://url/tickets-admin/administrators)
        Route::resource("tickets-admin/administrator", '\Kordy\Ticketit\Controllers\AdministratorsController', [
            'names' => [
                'index' => "dashboard.administrator.index",
                'store' => "dashboard.administrator.store",
                'create' => "dashboard.administrator.create",
                'update' => "dashboard.administrator.update",
                'show' => "dashboard.administrator.show",
                'destroy' => "dashboard.administrator.destroy",
                'edit' => "dashboard.administrator.edit",
            ],
        ]);

        //Tickets demo data route (ex. http://url/tickets-admin/demo-seeds/)
        // Route::get("$admin_route/demo-seeds", '\Kordy\Ticketit\Controllers\InstallController@demoDataSeeder');
    });


});

