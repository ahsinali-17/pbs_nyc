@extends('portal.master')

@section('title', 'PBS Member Portal')

@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-fw fa-mail-bulk"></i> Dashboard</h1>
@stop

@php
    if(!$user->notifySettings) {$user->notifySettings()->create(); $user->load('notifySettings');}
    if(!$user->reminderSettings){ $user->reminderSettings()->create(); $user->load('reminderSettings');}
    if(!$user->summarySettings) {$user->summarySettings()->create(); $user->load('summarySettings');}
@endphp

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#propertyList"
                                                        data-toggle="tab"><i class="fas fa-fw fa-clipboard-list"></i>
                                        Property List</a></li>
                                <li class="nav-item"><a class="nav-link" href="#manageproperty" data-toggle="tab"><i
                                                class="fas fa-fw fa-folder-plus"></i> Manage Properties</a></li>
                                <li class="nav-item"><a class="nav-link" href="#propertySummary" data-toggle="tab"><i
                                                class="fas fa-fw fa-file-contract"></i>Property Summary</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i
                                                class="fas fa-fw fa-users-cog"></i>Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                {{--                        PROPERTY LİST--}}
                                <div class="active tab-pane" id="propertyList">
                                    <!-- The timeline -->
                                    <div style="display: inline; float:right; width: 100%;">
                                        <table id="resultstable" data-order='[[ 0, "desc" ]]'
                                               class="table table-bordered table-striped" autosize="1"
                                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                                               width="100%"
                                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                            <thead>
                                            <tr>

                                                <th>ADDRESS</th>
                                                <th class="text-center" width="10%">Sync Status</th>
                                                <th class="text-center" width="10%">View</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->properties as $property)
                                                <tr>
                                                    <td>{{$property->getAddress()}}</td>
                                                    <td class="text-center">@if($property->sync_at)<i style="color: green" class="fas fa-check-circle"></i>@else<i
                                                                style="color: darkred" class="fas fa-sync-alt fa-spin"></i> @endif</td>
                                                    <td class="text-center">
                                                        <a href="{{route('singleBuildingProfile',['buildingid'=>$property->id])}}"><i
                                                                    class="fas fa-search"></i> </a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>ADDRESS</th>
                                                <th>Sync Status</th>
                                                <th>View</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="manageproperty">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#addwithaddress"
                                                                    data-toggle="tab"><i class="fas fa-plus-circle"></i>
                                                    Add Property with Address</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#addwithbinnumber"
                                                                    data-toggle="tab"><i class="fas fa-plus-circle"></i>
                                                    Add Property with BIN Number</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                                    href="{{route('addpropertyrequest')}}"
                                                                    target="_blank"><i style=" color: green"
                                                                                       class="fas fa-plus-circle"></i>
                                                    Add Property For Me</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#deleteproperty"
                                                                    data-toggle="tab"><i style="color: darkred"
                                                                                         class="fas fa-minus-circle"></i>
                                                    Delete Property</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="addwithaddress">
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Add a Property with Address
                                                            information</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="tab-container px-3">
                                                            <div class="form-widget" id="alert-subscribe-form">

                                                                <form id="PaneldenPropertyEkleme"
                                                                      action="include/form.php" autocomplete="off"
                                                                      class="nobottommargin" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-12">
                                                                            <label class="text-black-50 nobottommargin"
                                                                                   for="panel-boro">Borough</label>
                                                                            <select class="selectpicker form-control bg-gri"
                                                                                    data-style="bg-gri"
                                                                                    data-live-search="false"
                                                                                    data-size="6" name="panel-boro"
                                                                                    id="panel-boro">
                                                                                <option class="bg-gri" value>Select a
                                                                                    Borough
                                                                                </option>
                                                                                <option class="bg-gri" value="1">
                                                                                    Manhattan
                                                                                </option>
                                                                                <option class="bg-gri" value="2">Bronx
                                                                                </option>
                                                                                <option class="bg-gri" value="3">
                                                                                    Brooklyn
                                                                                </option>
                                                                                <option class="bg-gri" value="4">
                                                                                    Queens
                                                                                </option>
                                                                                <option class="bg-gri" value="5">Staten
                                                                                    Islands
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 col-12">
                                                                            <label class="text-black-50 nobottommargin"
                                                                                   for="panel-house-no">House
                                                                                Number:</label>
                                                                            <input class="form-control bg-gri"
                                                                                   id="panel-house-no"
                                                                                   name="panel-house-no" type="text"
                                                                                   value="">
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label class="text-black-50 nobottommargin"
                                                                                   for="panel-street-name2">Street
                                                                                Name:</label> (NOTE: Please wait a few
                                                                            second to get list)
                                                                            <select class="form-control bg-gri"
                                                                                    data-style="bg-gri"
                                                                                    id="panel-street-name2"
                                                                                    name="panel-street-name2"
                                                                                    style="width: 100%"></select>
                                                                        </div>
                                                                        <div class="col-md-12 mt-4 clearfix">
                                                                            <button disabled id="subscribealertbtn"
                                                                                    class="btn btn-secondary btn-block">
                                                                                <b>Add Property</b></button>

                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="addwithbinnumber">
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Add with bin number</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <label class="text-black-50 nobottommargin"
                                                                       for="search-by-bin">BIN
                                                                    Number:</label>
                                                                <select class="form-control bg-gri"
                                                                        data-style="bg-gri"
                                                                        id="search-by-bin"
                                                                        name="search-by-bin"
                                                                        style="width: 100%"></select>
                                                            </div>

                                                            <div class="col-md-12 mt-4 clearfix disabled">
                                                                <button id="addbybin" disabled
                                                                        class="btn btn-secondary btn-block">
                                                                    <b>Add property </b></button>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="deleteproperty">
                                                <div style="display: inline; float:right; width: 100%;">
                                                    <table id="resultstable3" data-order='[[ 1, "desc" ]]'
                                                           class="table table-bordered table-striped" autosize="1"
                                                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                                                           width="100%"
                                                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                        <thead>
                                                        <tr>

                                                            <th>ADDRESS</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($user->properties as $property)
                                                            <tr>
                                                                <td> {{$property->getAddress()}}</td>
                                                                <td>
                                                                    <button class="btn btn-block btn-outline-danger btn-sm"
                                                                            type="button" style="width: 100%;"
                                                                            onclick="propertyDelete({{$property->id}})"
                                                                            data-toggle="modal"
                                                                            data-target="#confirmDelete"
                                                                            data-title="Delete Role Admin"
                                                                            data-message="Are you sure you want to delete Role: Admin?">
                                                                        <span class="hidden-xs hidden-sm">Delete </span><i
                                                                                class="fas fa-trash-restore-alt"
                                                                                aria-hidden="true"></i>
                                                                    </button>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>

                                                            <th>ADDRESS</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                                {{--                        PROPERTY SUMARY--}}
                                <div class="tab-pane" id="propertySummary">
                                    <!-- The timeline -->
                                    <div style="width: 100%;display: inline;">
                                        <div style="display: inline; float:right; width: 100%;">
                                            <a class="btn btn-success" href="{{route('downloadSummary')}}" role="button">Download Full Summary Report</a>
                                            <hr>
                                        </div>
                                        <div style="display: inline; float:right; width: 100%;">
                                            <table id="resultstable2" data-order='[[ 0, "desc" ]]'
                                                   class="table table-bordered table-striped" autosize="1"
                                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                                   width="100%"
                                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                <thead>
                                                <tr>

                                                    <th>ADDRESS</th>
                                                    <th>DOB VIOL.</th>
                                                    <th>DOB COMP.</th>
                                                    <th>ECB HEAR.</th>
                                                    <th>ECB VIOL.</th>
                                                    <th>ECB PENA.</th>
                                                    <th>HPD VIOL.</th>
                                                    <th>HPD COMP.</th>
                                                    <th>HPD REPA.</th>
                                                    <th>311 SER.</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($propers = \DB::table('property_active_summary')->where('user_id',$user->id)->get())
                                                @foreach($propers as $property)
                                                    <tr>
                                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                                        <td>
                                                            <a href="{{route('liveViolationSingle',['buildingid'=>$property->id])}}">{{$property->dob_violations_count}}
                                                                <i class="fas fa-search"></i> </a></td>
                                                        <td>
                                                            <a href="{{route('DOBcomplaintsSingle',['buildingid'=>$property->id])}}">{{$property->dob_complaints_count}}
                                                                <i class="fas fa-search"></i> </a></td>
                                                        <td>
                                                            <a href="{{route('ECBliveHearingsSingle',['buildingid'=>$property->id])}}">{{$property->ecb_hearings_count}}
                                                                <i class="fas fa-search"></i> </a></td>
                                                        <td>
                                                            <a href="{{route('ECBviolationsSingle',['buildingid'=>$property->id])}}">{{$property->ecb_violations_count}}
                                                                <i class="fas fa-search"></i> </a></td>
                                                        <td>
                                                            <a href="{{route('ECBviolationsSingle',['buildingid'=>$property->id])}}">
                                                                ${{$property->ecb_violations_penality}} </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('HPDliveViolationsSingle',['buildingid'=>$property->id])}}">{{$property->hpd_violations_count}}
                                                                <i class="fas fa-search"></i> </a></td>
                                                        <td>
                                                            <a href="{{route('HPDcomplaintsSingle',['buildingid'=>$property->id])}}"> {{$property->hpd_complaints_count}}
                                                                <i class="fas fa-search"></i> </a></td>
                                                        <td>
                                                            <a href="{{route('HPDrepairsSingle',['buildingid'=>$property->id])}}"> {{$property->hpd_emergency_repairs_count}}
                                                                <i class="fas fa-search"></i> </a></td>
                                                        <td>
                                                            <a href="{{route('SERVICErequests311Single',['buildingid'=>$property->id])}}"> {{$property->service_requests311_count}}
                                                                <i class="fas fa-search"></i> </a></td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>$</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{--                        SETTİNGS--}}
                                <div class="tab-pane" id="settings">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#notifications"
                                                                    data-toggle="tab">Notifications</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#reminders"
                                                                    data-toggle="tab">Reminders</a>
                                            </li>
                                            {{--                                            <li class="nav-item"><a class="nav-link" href="#summary" data-toggle="tab">Summary</a>--}}
                                            {{--                                            </li>--}}
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="notifications">
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><i class="fas fa-mail-bulk"></i>Notifications
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <strong><i class="fas fa-clock"></i> Get notification
                                                            by</strong> <br/>
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label class="btn btn-secondary">
                                                                <input type="radio" name="notificationsentby"
                                                                       value="email"
                                                                       autocomplete="off" {{$user->notifySettings->sent_by==="email"?"checked":""}}><i
                                                                        class="fas fa-mail-bulk"></i> Email
                                                            </label>
                                                            <label class="btn btn-secondary">
                                                                <input type="radio" name="notificationsentby"
                                                                       value="app"
                                                                       autocomplete="off" {{$user->notifySettings->sent_by==="app"?"checked":""}}><i
                                                                        class="fas fa-mobile"></i>
                                                                App
                                                            </label>
                                                            <label class="btn btn-secondary">
                                                                <input type="radio" name="notificationsentby"
                                                                       value="both"
                                                                       autocomplete="off" {{$user->notifySettings->sent_by==="both"?"checked":""}}><i
                                                                        class="fas fa-reply-all"></i> Both
                                                            </label>
                                                        </div>
                                                        <hr>
                                                        <br/>
                                                        {{--                                                        <div id="notificationgroup">--}}
                                                        {{--                                                            <!-- Default inline 1-->--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}
                                                        {{--                                                                <input type="checkbox" name="dobnotification"--}}
                                                        {{--                                                                       class="custom-control-input"--}}
                                                        {{--                                                                       id="dobnotification" disabled {{$user->notifySettings->dob?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="dobnotification">--}}
                                                        {{--                                                                    <strong><i class="fas fa-city"></i>--}}
                                                        {{--                                                                        DOB</strong></label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="ecbnotification" name="ecbnotification"--}}
                                                        {{--                                                                       disabled {{$user->notifySettings->ecb?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="ecbnotification">--}}
                                                        {{--                                                                    <strong><i class="fas fa-pencil-ruler"></i>--}}
                                                        {{--                                                                        ECB</strong></label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="fdnynotification" name="fdnynotification"--}}
                                                        {{--                                                                       disabled {{$user->notifySettings->fdny?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="fdnynotification">--}}
                                                        {{--                                                                    <strong><i class="fas fa-fire-alt mr-1"></i>--}}
                                                        {{--                                                                        FDNY</strong> </label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="hpdnotification" name="hpdnotification"--}}
                                                        {{--                                                                       disabled {{$user->notifySettings->hpd?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="hpdnotification">--}}
                                                        {{--                                                                    <strong><i class="fas fa-house-damage"></i>--}}
                                                        {{--                                                                        HPD</strong>--}}
                                                        {{--                                                                </label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="inspectionnotification"--}}
                                                        {{--                                                                       name="inspectionnotification" disabled {{$user->notifySettings->inspections?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="inspectionnotification">--}}
                                                        {{--                                                                    <strong><i class="fas fa-fw fa-check"></i>--}}
                                                        {{--                                                                        Inspections</strong></label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="permitsnotification"--}}
                                                        {{--                                                                       name="permitsnotification" disabled {{$user->notifySettings->permits?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="permitsnotification">--}}
                                                        {{--                                                                    <strong><i class="fas fa-stream"></i>--}}
                                                        {{--                                                                        Permits</strong>--}}
                                                        {{--                                                                </label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}
                                                    </div>
                                                    <button id="editnotifications"
                                                            class="btn btn-secondary btn-block"><b>Edit Notification
                                                            Options</b></button>
                                                    <button id="savenotifications"
                                                            class="btn btn-primary btn-block d-none"><b>Save
                                                            Notification
                                                            Options</b></button>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="reminders">
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><i class="fas fa-clock"></i>Reminders
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <strong><i class="fas fa-clock"></i> Get reminders
                                                            by</strong> <br/>
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label class="btn btn-secondary">
                                                                <input type="radio" name="remindersentby"
                                                                       value="email"
                                                                       autocomplete="off" {{$user->reminderSettings->sent_by==="email"?"checked":""}}><i
                                                                        class="fas fa-mail-bulk"></i> Email
                                                            </label>
                                                            <label class="btn btn-secondary">
                                                                <input type="radio" name="remindersentby" value="app"
                                                                       autocomplete="off" {{$user->reminderSettings->sent_by==="app"?"checked":""}}><i
                                                                        class="fas fa-mobile"></i>
                                                                App
                                                            </label>
                                                            <label class="btn btn-secondary">
                                                                <input type="radio" name="remindersentby" value="both"
                                                                       autocomplete="off" {{$user->reminderSettings->sent_by==="both"?"checked":""}}><i
                                                                        class="fas fa-reply-all"></i> Both
                                                            </label>
                                                        </div>
                                                        <hr>
                                                        <br/>
                                                        {{--                                                        <div id="remindergroup">--}}
                                                        {{--                                                            <!-- Default inline 1-->--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}
                                                        {{--                                                                <input type="checkbox" name="dobreminder"--}}
                                                        {{--                                                                       class="custom-control-input"--}}
                                                        {{--                                                                       id="dobreminder" disabled {{$user->reminderSettings->dob?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="dobreminder">--}}
                                                        {{--                                                                    <strong><i class="fas fa-city"></i>--}}
                                                        {{--                                                                        DOB</strong></label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="ecbreminder" name="ecbreminder" disabled {{$user->reminderSettings->ecb?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="ecbreminder">--}}
                                                        {{--                                                                    <strong><i class="fas fa-pencil-ruler"></i>--}}
                                                        {{--                                                                        ECB</strong></label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="fdnyreminder" name="fdnyreminder" disabled {{$user->reminderSettings->fdny?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="fdnyreminder">--}}
                                                        {{--                                                                    <strong><i class="fas fa-fire-alt mr-1"></i>--}}
                                                        {{--                                                                        FDNY</strong> </label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="hpdreminder" name="hpdreminder" disabled {{$user->reminderSettings->hpd?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="hpdreminder">--}}
                                                        {{--                                                                    <strong><i class="fas fa-house-damage"></i>--}}
                                                        {{--                                                                        HPD</strong>--}}
                                                        {{--                                                                </label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="inspectionreminder"--}}
                                                        {{--                                                                       name="inspectionreminder" disabled {{$user->reminderSettings->inspections?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="inspectionreminder">--}}
                                                        {{--                                                                    <strong><i class="fas fa-fw fa-check"></i>--}}
                                                        {{--                                                                        Inspections</strong></label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            <div class="custom-control custom-checkbox custom-control-inline">--}}

                                                        {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                                        {{--                                                                       id="permitsreminder"--}}
                                                        {{--                                                                       name="permitsreminder" disabled {{$user->reminderSettings->permits?"checked":""}}>--}}
                                                        {{--                                                                <label class="custom-control-label"--}}
                                                        {{--                                                                       for="permitsreminder">--}}
                                                        {{--                                                                    <strong><i class="fas fa-stream"></i>--}}
                                                        {{--                                                                        Permits</strong>--}}
                                                        {{--                                                                </label>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}
                                                    </div>
                                                    <button id="editreminders"
                                                            class="btn btn-secondary btn-block"><b>Edit Reminder
                                                            Options</b></button>
                                                    <button id="savereminders"
                                                            class="btn btn-primary btn-block d-none"><b>Save Reminder
                                                            Options</b></button>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                            {{--                                            <div class="tab-pane" id="summary">--}}
                                            {{--                                                <div class="card card-secondary">--}}
                                            {{--                                                    <div class="card-header">--}}
                                            {{--                                                        <h3 class="card-title"><i class="fas fa-newspaper"></i> Summary--}}
                                            {{--                                                            Report</h3>--}}
                                            {{--                                                    </div>--}}

                                            {{--                                                    <!-- /.card-header -->--}}
                                            {{--                                                    <div class="card-body">--}}

                                            {{--                                                        <strong><i class="fas fa-clock"></i> Get reports by</strong>--}}
                                            {{--                                                        <br/>--}}
                                            {{--                                                        <div class="btn-group btn-group-toggle"--}}
                                            {{--                                                             data-toggle="buttons">--}}
                                            {{--                                                            <label class="btn btn-secondary">--}}
                                            {{--                                                                <input type="radio" name="summarysentby" value="email"--}}
                                            {{--                                                                       autocomplete="off" {{$user->summarySettings->sent_by==="email"?"checked":""}}><i--}}
                                            {{--                                                                        class="fas fa-mail-bulk"></i> Email--}}
                                            {{--                                                            </label>--}}
                                            {{--                                                            <label class="btn btn-secondary">--}}
                                            {{--                                                                <input type="radio" name="summarysentby" value="app"--}}
                                            {{--                                                                       autocomplete="off" {{$user->summarySettings->sent_by==="app"?"checked":""}}><i--}}
                                            {{--                                                                        class="fas fa-mobile"></i>--}}
                                            {{--                                                                App--}}
                                            {{--                                                            </label>--}}
                                            {{--                                                            <label class="btn btn-secondary">--}}
                                            {{--                                                                <input type="radio" name="summarysentby" value="both"--}}
                                            {{--                                                                       autocomplete="off" {{$user->summarySettings->sent_by==="both"?"checked":""}}><i--}}
                                            {{--                                                                        class="fas fa-reply-all"></i> Both--}}
                                            {{--                                                            </label>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                        <hr>--}}
                                            {{--                                                        <!-- Default inline 1-->--}}
                                            {{--                                                        <div class="form-group">--}}
                                            {{--                                                            <div class="custom-control custom-switch">--}}
                                            {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                            {{--                                                                       id="week1" {{$user->summarySettings->weekly?"checked":""}}>--}}
                                            {{--                                                                <label class="custom-control-label" for="week1">Weekly</label>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                            <div class="custom-control custom-switch">--}}
                                            {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                            {{--                                                                       id="month1" {{$user->summarySettings->monthly?"checked":""}}>--}}
                                            {{--                                                                <label class="custom-control-label" for="month1">Monthly</label>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                            <div class="custom-control custom-switch">--}}
                                            {{--                                                                <input type="checkbox" class="custom-control-input"--}}
                                            {{--                                                                       id="month3" {{$user->summarySettings->quarterly?"checked":""}}>--}}
                                            {{--                                                                <label class="custom-control-label" for="month3">Quarterly</label>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <button id="savereports"--}}
                                            {{--                                                       class="btn btn-primary btn-block"><b>Save Summary--}}
                                            {{--                                                            Options</b></button>--}}
                                            {{--                                                    <!-- /.card-body -->--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{$user->adminlte_image()}}"
                                     alt="User profile picture">
                            </div>
                            <div class="mt-2 text-center">
                                <button id="profilephoto" type="button" class="text-center btn btn-primary btn-sm">
                                    Change Profile Photo
                                </button>
                            </div>
                            <h3 class="profile-username text-center">{{$user->name}}</h3>
                            @if(Auth::check() && Auth::user()->hasRole('admin'))
                                <p class="text-center">
                                    <img width="50px" src="{{asset('images/others/PBSSTAFF.png')}}">
                                </p>
                            @else
                                <p class="text-center">@if($user->subscription()->stripe_price==="price_1HAytXCHIQPIgwSn9ZKMI4NF")
                                        <img width="50px" src="{{asset('images/others/gold.png')}}">
                                    @elseif($user->subscription()->stripe_price==="price_1H6CrcCHIQPIgwSnOHJIVdUk") <img
                                                width="50px" src="{{asset('images/others/bronze.png')}}">
                                    @else Undefined @endif</p>
                            @endif

                            <p class="text-muted text-center">{{$user->email}}</p>
                            <p class="text-muted text-center">{{$user->company}}</p>
                            <p class="text-muted text-center">{{$user->address}}</p>
                            <p class="text-muted text-center">{{$user->contact_number}}</p>
                            <hr>
                            @if(Auth::check() && (!Auth::user()->hasRole('admin')))
                                <h5> Subscription Info</h5>
                                <table width="100%">
                                    <tbody>
                                    <tr>
                                        <td width="25%">
                                            Status
                                        </td>
                                        <td>
                                            <b>  {{Str::upper($user->subscription()->stripe_status)}} </b>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td width="25%">
                                            Plan
                                        </td>
                                        <td width="25%">
                                            @if($user->subscription()->stripe_price==="price_1HAytXCHIQPIgwSn9ZKMI4NF")
                                                <b>Gold</b>
                                            @elseif($user->subscription()->stripe_price==="price_1H6CrcCHIQPIgwSnOHJIVdUk")
                                                <b>Bronze</b>
                                            @else <b>Undefined</b> @endif
                                        </td>
                                    </tr>
                                    <tr>

                                        <td width="25%">
                                            Ends
                                        </td>
                                        <td width="25%">
                                            <b>  {{$user->subscription()->trial_ends_at}}</b>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td width="25%">
                                            Member since
                                        </td>
                                        <td width="25%">
                                            <b>  {{$user->created_at->isoformat('LL')}}</b>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endif

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total Properties</b> <a class="float-right">{{$user->properties->count()}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Balance</b> <a id="balance" class="float-right">0</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Hearings</b> <a id="totalecb" class="float-right">0</a>
                                </li>
                            </ul>

                            <a href="#" id="editprofile" class="btn btn-secondary btn-block"><b>Edit Profile</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('js')

    <script src="{{ asset('js/tagsinput.js') }}"></script>

    <script
            src="{{asset('js/components/typehead.js')}}"></script>
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script>
        $('#editnotifications').on('click', function () {
            $('#savenotifications').removeClass('d-none');
            $('#editnotifications').addClass('d-none');
            $('div#notificationgroup').children().children().prop('disabled', false)
        });

        $('#savenotifications').on('click', function () {
            $('#editnotifications').removeClass('d-none');
            $('#savenotifications').addClass('d-none');
            $('div#notificationgroup').children().children().prop('disabled', true);

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", '{{route('settings.notify.update')}}');
            var token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = $('meta[name="csrf-token"]').attr('content');
            form.appendChild(token);
            var notificationsentby = document.createElement('input');
            notificationsentby.type = 'hidden';
            notificationsentby.name = 'sent_by';
            notificationsentby.value = $('input[name=notificationsentby]:checked').val();
            form.appendChild(notificationsentby);
            var dobnotification = document.createElement('input');
            dobnotification.type = 'hidden';
            dobnotification.name = 'dob';
            dobnotification.value = $('#dobnotification').is(':checked');
            form.appendChild(dobnotification);
            var ecbnotification = document.createElement('input');
            ecbnotification.type = 'hidden';
            ecbnotification.name = 'ecb';
            ecbnotification.value = $('#ecbnotification').is(':checked');
            form.appendChild(ecbnotification);
            var fdnynotification = document.createElement('input');
            fdnynotification.type = 'hidden';
            fdnynotification.name = 'fdny';
            fdnynotification.value = $('#fdnynotification').is(':checked');
            form.appendChild(fdnynotification);
            var hpdnotification = document.createElement('input');
            hpdnotification.type = 'hidden';
            hpdnotification.name = 'hpd';
            hpdnotification.value = $('#hpdnotification').is(':checked');
            form.appendChild(hpdnotification);
            var inspectionnotification = document.createElement('input');
            inspectionnotification.type = 'hidden';
            inspectionnotification.name = 'inspections';
            inspectionnotification.value = $('#inspectionnotification').is(':checked');
            form.appendChild(inspectionnotification);
            var permitsnotification = document.createElement('input');
            permitsnotification.type = 'hidden';
            permitsnotification.name = 'permits';
            permitsnotification.value = $('#permitsnotification').is(':checked');
            form.appendChild(permitsnotification);
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        });
        $('#editreminders').on('click', function () {
            $('#savereminders').removeClass('d-none');
            $('#editreminders').addClass('d-none');
            $('div#remindergroup').children().children().prop('disabled', false);
        });

        $('#savereminders').on('click', function () {
            $('#editreminders').removeClass('d-none');
            $('#savereminders').addClass('d-none');
            $('div#remindergroup').children().children().prop('disabled', true);

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", '{{route('settings.reminder.update')}}');
            var token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = $('meta[name="csrf-token"]').attr('content');
            form.appendChild(token);
            var remindersentby = document.createElement('input');
            remindersentby.type = 'hidden';
            remindersentby.name = 'sent_by';
            remindersentby.value = $('input[name=remindersentby]:checked').val();
            form.appendChild(remindersentby);
            var dobreminder = document.createElement('input');
            dobreminder.type = 'hidden';
            dobreminder.name = 'dob';
            dobreminder.value = $('#dobreminder').is(':checked');
            form.appendChild(dobreminder);
            var ecbreminder = document.createElement('input');
            ecbreminder.type = 'hidden';
            ecbreminder.name = 'ecb';
            ecbreminder.value = $('#ecbreminder').is(':checked');
            form.appendChild(ecbreminder);
            var fdnyreminder = document.createElement('input');
            fdnyreminder.type = 'hidden';
            fdnyreminder.name = 'fdny';
            fdnyreminder.value = $('#fdnyreminder').is(':checked');
            form.appendChild(fdnyreminder);
            var hpdreminder = document.createElement('input');
            hpdreminder.type = 'hidden';
            hpdreminder.name = 'hpd';
            hpdreminder.value = $('#hpdreminder').is(':checked');
            form.appendChild(hpdreminder);
            var inspectionreminder = document.createElement('input');
            inspectionreminder.type = 'hidden';
            inspectionreminder.name = 'inspections';
            inspectionreminder.value = $('#inspectionreminder').is(':checked');
            form.appendChild(inspectionreminder);
            var permitsreminder = document.createElement('input');
            permitsreminder.type = 'hidden';
            permitsreminder.name = 'permits';
            permitsreminder.value = $('#permitsreminder').is(':checked');
            form.appendChild(permitsreminder);
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        });

        $('#savereports').on('click', function () {

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", '{{route('settings.summary.update')}}');
            var token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = $('meta[name="csrf-token"]').attr('content');
            form.appendChild(token);
            var summarysentby = document.createElement('input');
            summarysentby.type = 'hidden';
            summarysentby.name = 'sent_by';
            summarysentby.value = $('input[name=summarysentby]:checked').val();
            form.appendChild(summarysentby);
            var weeklysummary = document.createElement('input');
            weeklysummary.type = 'hidden';
            weeklysummary.name = 'weekly';
            weeklysummary.value = $('#week1').is(':checked');
            form.appendChild(weeklysummary);
            var monthlysummary = document.createElement('input');
            monthlysummary.type = 'hidden';
            monthlysummary.name = 'monthly';
            monthlysummary.value = $('#month1').is(':checked');
            form.appendChild(monthlysummary);
            var quarterlysummary = document.createElement('input');
            quarterlysummary.type = 'hidden';
            quarterlysummary.name = 'quarterly';
            quarterlysummary.value = $('#month3').is(':checked');
            form.appendChild(quarterlysummary);
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        });


    </script>

    <script>
        function propertyDelete(id) {
            Swal.fire({
                title: 'Delete',
                text: "Selected property will be removed from your list, please confirm.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove!'
            }).then((result) => {
                if (result.value) {

                    var route = "{{route('delete.single.property.from.user')}}";
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $.post(route, {id: id, _token: token})
                        .done(function (data) {
                            if (data === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Successfully Removed',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                location.reload();
                            } else if (data === 'fail') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data,
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    text: 'An error occured.!',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                            }
                        })
                        .fail(function () {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured.!',
                                showConfirmButton: false,
                                timer: 1000
                            });
                        });
                    return false;
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            // function toogle(b){b.value=(b.value=="ON")?"OFF":"ON";}


            $('#addPropertyButton').on('click', function () {
                console.log("call add new prop modal");
            });


            var elem = $("#PanelPropertyListesi");
            elem.tagsinput({
                itemValue: 'id',
                itemText: 'text',
                tagClass: 'bootstrap-tagsinput badge big label label-danger'
            });


            $("#PaneldenPropertyEkleme").submit(function (e) {
                e.preventDefault();
                if ($("#PanelPropertyListesi").val()) {
                    var route = "{{ route('add.property.to.user') }}";
                    var properties = $("#PanelPropertyListesi").tagsinput("items");
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $.post(route, {properties: properties, _token: token})
                        .done(function (data) {
                            if (data === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Successfully Added',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                table1.ajax.reload();
                                $("#PanelPropertyListesi").tagsinput("removeAll");
                                $("#PanelPropertyListesi").val('');
                                $('#target').toggle();
                            } else if (data === 'Email already in use.') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data,
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    text: 'An error occured.!',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                            }
                        })
                        .fail(function () {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured.!',
                                showConfirmButton: false,
                                timer: 1000
                            });
                        });
                    return false;
                }
                Swal.fire({
                    text: 'You did not add any property!',
                    showConfirmButton: false,
                    timer: 1000
                });
                return false;
            });
        });


        function PanelAddProperty() {
            var boroelm = $("#panel-boro");
            var borobtnelm = $('[data-id="panel-boro"]');
            var housenoelm = $('#panel-house-no');
            var streetnameelm = $('#panel-street-name');
            if (!boroelm.val()) {
                borobtnelm.css('borderColor', "red").css('borderWidth', 2);
            } else {
                borobtnelm.css('borderWidth', 0);
            }

            if (!housenoelm.val()) {
                housenoelm.css('borderColor', "red").css('borderWidth', 2);
                //return false;
            } else {
                housenoelm.css('borderWidth', 0);
            }

            if (!streetnameelm.val()) {
                streetnameelm.css('borderColor', "red").css('borderWidth', 2);
                //    return false;
            } else {
                streetnameelm.css('borderWidth', 0);
            }

            if (boroelm.val() && housenoelm.val() && streetnameelm.val()) {

                var elem = $("#PanelPropertyListesi");
                // Selecting the input element and get its value
                var boro = boroelm.find(":selected").text();

                var house = housenoelm.val();
                var street = streetnameelm.val();
                var lng = elem.tagsinput("items").length;
                var tagsinputici = lng + 1 + "    -  " + streetnameelm.data('active').bin + " | " + house + ", " + street + ", " + boro;


                // Displaying the value

                // confirm('Do you want to save the form ??');

                Swal.fire({
                    title: 'Successfull!',
                    text: 'Your property is added to list.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000
                });
                elem.tagsinput('add', {
                    id: streetnameelm.data('active').bin,
                    house: house,
                    street: streetnameelm.data('active').stname,//street,
                    text: tagsinputici
                });
                elem.val(JSON.stringify(elem.tagsinput("items")));
                housenoelm.val('');
                streetnameelm.val('');
                boroelm.selectpicker('val', '');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill the form correctly!',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
        }

    </script>



    <script>
        var route = "{{ route('property.search.ac') }}";

        $('#panel-street-name2').select2({
            width: 'resolve',
            minimumInputLength: 4,
            containerCssClass: 'bg-gri',
            dropdownCssClass: 'bg-gri',
            ajax: {
                type: 'POST',
                url: route,

                dataType: 'json',
                data: function (params) {
                    var borough = $("#panel-boro").val();
                    var house = $('#panel-house-no').val();

                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (borough && house && params.term.length > 3) {
                        var query = {
                            borough: borough, house: house, term: params.term, _token: token
                        };
                        return query;
                    } else {
                        return false;
                    }
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    var data2 = $.map(data, function (obj) {
                        obj.id = obj.bin; // replace pk with your identifier
                        obj.text = obj.bin + ": " + (obj.lhnd.trim() === obj.hhnd.trim() ? obj.lhnd.trim() : obj.lhnd.trim() + " to " + obj.hhnd.trim()) + " - " + obj.stname; // replace pk with your identifier

                        return obj;
                    });
                    return {
                        results: data2
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });


        $('#panel-street-name2').on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);


            var boroelm = $("#panel-boro");
            var borobtnelm = $('[data-id="panel-boro"]');
            var housenoelm = $('#panel-house-no');
            var streetnameelm = $('#panel-street-name2');
            if (!boroelm.val()) {
                borobtnelm.css('borderColor', "red").css('borderWidth', '2px');
            } else {
                borobtnelm.css('borderWidth', '1px');
            }

            if (!housenoelm.val()) {
                housenoelm.css('borderColor', "red").css('borderWidth', '2px');
                //return false;
            } else {
                housenoelm.css('borderWidth', '1px');
            }

            if (!streetnameelm.val()) {
                streetnameelm.css('borderColor', "red").css('borderWidth', '2px');
                //    return false;
            } else {
                streetnameelm.css('borderWidth', '1px');
            }

            if (boroelm.val() && housenoelm.val() && streetnameelm.val()) {

                var elem = $("#PanelPropertyListesi");
                // Selecting the input element and get its value
                var boro = boroelm.find(":selected").text();
                var house = housenoelm.val();
                var street = data.stname;
                //var lng = elem.tagsinput("items").length;
                var tagsinputici = data.bin + " | " + house + ", " + street + ", " + boro;


                // Displaying the value

                // confirm('Do you want to save the form ??');

                // Swal.fire({
                //         title: 'Successfull!',
                //         text: 'Your property is added to list.',
                //         icon: 'success',
                //         showConfirmButton: false,
                //         timer: 1000
                //     }
                // );
                window.selecteddata = {
                    id: data.bin,
                    house: house,
                    street: street,
                    zipcode: data.zipcode,
                    text: tagsinputici,
                };

                $('#subscribealertbtn').removeAttr('disabled');

                // housenoelm.val('');
                // streetnameelm.val('');
                // boroelm.selectpicker('val', '');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill the form correctly!',
                    showConfirmButton: false,
                    timer: 1000
                });
            }

        });

        $('#subscribealertbtn').on('click', function (e) {
            var route = "{{ route('add.property.to.user') }}";
            var properties = [window.selecteddata];
            var token = $('meta[name="csrf-token"]').attr('content');
            $.post(route, {properties: properties, _token: token})
                .done(function (data) {
                    if (data === 'success') {
                        Swal.fire({
                            icon: 'success',
                            text: 'Successfully Added',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        location.reload();
                    } else if (data === 'Email already in use.') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data,
                            showConfirmButton: false,
                            timer: 1000
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occured.!',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                })
                .fail(function () {
                    Swal.fire({
                        icon: 'error',
                        text: 'An error occured.!',
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
            return false;
        });


        var routeByBin = "{{ route('property.searchbybin.ac') }}";

        $('#search-by-bin').select2({
            width: 'resolve',
            minimumInputLength: 7,
            containerCssClass: 'bg-gri',
            dropdownCssClass: 'bg-gri',
            ajax: {
                type: 'POST',
                url: routeByBin,

                dataType: 'json',
                data: function (params) {


                    var token = $('meta[name="csrf-token"]').attr('content');

                    return {bin: params.term, _token: token};

                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    var data2 = $.map(data, function (obj) {
                        obj.id = obj.bin; // replace pk with your identifier
                        obj.house = obj.lhnd.trim();
                        obj.zipcode = obj.zipcode;
                        obj.text = obj.bin + " - " + obj.stname + " - House Number : " + obj.lhnd.trim() + " to " + obj.hhnd.trim(); // replace pk with your identifier

                        return obj;
                    });
                    return {
                        results: data2
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        $('#search-by-bin').on('select2:select', function (e) {
            window.selecteddata = e.params.data;
            $('#addbybin').removeAttr('disabled');
        });

        // $('#search-by-bin').on('select2:opening', function (e) {
        //     $('#addbybin').attr('disabled', 'disabled');
        // });

        $('#addbybin').on('click', function (e) {
            var route = "{{ route('add.property.to.user') }}";
            window.selecteddata.street = window.selecteddata.stname;
            window.selecteddata.house = window.selecteddata.lhnd.trim();
            var properties = [window.selecteddata];
            var token = $('meta[name="csrf-token"]').attr('content');
            $.post(route, {properties: properties, _token: token})
                .done(function (data) {
                    if (data === 'success') {
                        Swal.fire({
                            icon: 'success',
                            text: 'Successfully Added',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#search-by-bin').empty();
                        $('#addbybin').attr('disabled', 'disabled');
                        location.reload();
                    } else if (data === 'Email already in use.') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data,
                            showConfirmButton: false,
                            timer: 1000
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occured.!',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                })
                .fail(function () {
                    Swal.fire({
                        icon: 'error',
                        text: 'An error occured.!',
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
            return false;
        });
    </script>

    {{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
    {{--    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css">--}}
    <script>
        var profilephoto = document.getElementById("profilephoto");
        var editsummarize = document.getElementById("editsummarize");
        var editprofile = document.getElementById("editprofile");
        var editnotifications = document.getElementById("editnotifications");
        profilephoto.onclick = async function () {
            const {value: file} = await Swal.fire({
                title: 'Select image',
                input: 'file',
                inputAttributes: {
                    'id': 'image',
                    'accept': 'image/*',
                    'aria-label': 'Upload your profile picture'
                }
            });

            if (file) {
                const reader = new FileReader()
                reader.onload = (e) => {
                    var formData = new FormData();
                    var file = $('.swal2-file')[0].files[0];
                    formData.append("image", file);
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        method: 'post',
                        url: "{{route('profile.update')}}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (resp) {
                            Swal.fire({
                                title: 'Your uploaded picture',
                                imageUrl: e.target.result,
                                imageAlt: 'The uploaded picture'
                            }).then()
                            {
                                location.reload();
                            }
                        },
                        error: function () {
                            Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})
                        }
                    });
                }
                reader.readAsDataURL(file)
            }
        }
        editprofile.onclick = async function () {
            const {value: val} = await Swal.fire({
                title: '<strong>Profile update</strong>',
                icon: 'info',
                html: '<table class="table table-bordered table-striped"><thead><tr>' +
                    '<th>Value Option</th><th>New Value</th></tr></thead><tbody>' +
                    '<tr><td>User Name</td><td>{{$user->name}}</td></tr>' +
                    '<tr><td>Email</td><td><input placeholder="{{$user->email}}" type="text" id="email"></td></tr>' +
                    '<tr><td>Company</td><td><input placeholder="{{$user->company}}" type="text" id="company"></td></tr>' +
                    '<tr><td>Address</td><td><input placeholder="{{$user->address}}" type="text" id="address"></td></tr>' +
                    '<tr><td>Phone Number</td><td><input placeholder="{{$user->contact_number}}" type="text" id="phone"></td></tr>' +
                    '</tbody></table>',

                showCloseButton: true,
                showConfirmButton: true,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Save!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i> Cancel',
                cancelButtonAriaLabel: 'Thumbs down'
            });

            if (val) {
                var formData = new FormData();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var company = $('#company').val();
                var address = $('#address').val();
                if (email) {
                    formData.append("email", email);
                }
                if (phone) {
                    formData.append("phone", phone);
                }
                if (company) {
                    formData.append("company", company);
                }
                if (address) {
                    formData.append("address", address);
                }
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: 'post',
                    url: "{{route('profile.update')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        Swal.fire({
                            title: 'Your information updated.',
                        }).then()
                        {
                            location.reload();
                        }
                    },
                    error: function () {
                        Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})
                    }
                });
            }
        };
        $(function () {
            $('#resultstable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "pageLength": 50,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-alt" style="font-size: 1.2em;"></i>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf" style="font-size: 1.2em;"></i>',
                        titleAttr: 'PDF'
                    }
                ],
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

            });

            $('#resultstable3').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "pageLength": 50,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-alt" style="font-size: 1.2em;"></i>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf" style="font-size: 1.2em;"></i>',
                        titleAttr: 'PDF'
                    }
                ],
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

            });
            $('#resultstable2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "pageLength": 50,

                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;

                    // converting to interger to find total
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // computing column Total of the complete result
                    var total0 = api
                        .column(1)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal($.parseHTML(b)[0].text);
                        }, 0);

                    var total1 = api
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal($.parseHTML(b)[0].text);
                        }, 0);

                    var total2 = api
                        .column(3)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal($.parseHTML(b)[0].text);
                        }, 0);

                    var total3 = api
                        .column(4)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal($.parseHTML(b)[0].text);
                        }, 0);

                    var total4 = api
                        .column(5)
                        .data()
                        .reduce(function (a, b) {
                            return "$ " + (intVal(a) + intVal($.parseHTML(b)[0].text)).toFixed(2);
                        }, 0);
                    var total5 = api
                        .column(6)
                        .data()
                        .reduce(function (a, b) {
                            return (intVal(a) + intVal($.parseHTML(b)[0].text));
                        }, 0);
                    var total6 = api
                        .column(7)
                        .data()
                        .reduce(function (a, b) {
                            return (intVal(a) + intVal($.parseHTML(b)[0].text));
                        }, 0);
                    var total7 = api
                        .column(8)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal($.parseHTML(b)[0].text);
                        }, 0);
                    var total8 = api
                        .column(9)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal($.parseHTML(b)[0].text);
                        }, 0);


                    // Update footer by showing the total with the reference of the column index
                    $(api.column(0).footer()).html('Total');
                    $(api.column(1).footer()).html(total0);
                    $(api.column(2).footer()).html(total1);
                    $(api.column(3).footer()).html(total2);
                    $('#totalecb').html(total2);
                    $(api.column(4).footer()).html(total3);
                    $(api.column(5).footer()).html(total4);
                    $('#balance').html(total4);
                    $(api.column(6).footer()).html(total5);
                    $(api.column(7).footer()).html(total6);
                    $(api.column(8).footer()).html(total7);
                    $(api.column(9).footer()).html(total8);
                },
                "processing": true,
                "serverSide": false,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-alt" style="font-size: 1.2em;"></i>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf" style="font-size: 1.2em;"></i>',
                        titleAttr: 'PDF'
                    }
                ],
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

            });
        });
    </script>
@stop
