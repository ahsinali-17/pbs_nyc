@extends('portal.master')

@section('title', 'Hpd Annual Mailings')

@section('plugins.Summernote', true)
@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('css')
    <style type="text/css">

        .s1 {
            color: #231F20;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8pt;
        }

        .s2 {
            color: #231F20;
            font-family: "Copperplate Gothic Bold", sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 11pt;
        }

        .s5 {
            color: #231F20;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
            margin: 0pt;
        }

        .s3 {
            color: #231F20;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        .s4 {
            color: #231F20;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10pt;
        }

        .s6 {
            color: #25408F;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10pt;
        }


        .s7 {
            color: #25408F;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            font-size: 10pt;
        }

        .s8 {
            color: #25408F;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9pt;
        }


        .s10 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        .s11 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10pt;
        }

        .s12 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        li {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
        }

        #l1 > li:before {
            content: "• ";
            color: #25408F;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10pt;
        }

        li {
            display: block;
        }

        #l2 {
            padding-left: 0pt;
        }

        #l2 > li:before {
            content: "• ";
            color: #25408F;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10pt;
        }

        li {
            display: block;
        }

        #l3 {
            padding-left: 0pt;
        }

        #l3 > li:before {
            content: "• ";
            color: #25408F;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10pt;
        }

        hr.half-width {
            width: 50%;
            margin: 0 auto;
            color: white;
            background-color: white;
            border-color: white;
        }
    </style>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::model($hpdAnnualMailing,['route' => ['hpdmailing.update',$hpdAnnualMailing->id],'files'=>'true','method' => 'PUT']) !!}
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#basics" data-toggle="tab">
                                    <i class="fas fa-fw fa-clipboard-list"></i>Basic</a></li>
                            <li class="nav-item"><a class="nav-link" href="#firesafety" data-toggle="tab">
                                    <i class="fas fa-fw fa-clipboard-list"></i>Fire Safety</a></li>
                            <li class="nav-item"><a class="nav-link" href="#windowguard" data-toggle="tab">
                                    <i class="fas fa-fw fa-folder-plus"></i> Window Guards</a></li>
                            <li class="nav-item"><a class="nav-link" href="#lead" data-toggle="tab">
                                    <i class="fas fa-fw fa-file-contract"></i>Lead Poisoning</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="basics">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card bg-light">
                                            <div class="card-header hover text-muted border-bottom-0"
                                                 aria-expanded="false">
                                                <i class="fas fa-plus-circle"></i><b>Basics</b>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        {!! Form::label('property_id', 'Property', ['class' => 'control-label']) !!}
                                                        {!! Form::select('property_id',  Auth::user()->properties()->withoutAll()->get()->pluck('full_address','id') , null , ['class' => 'form-control','placeholder' => 'Select a property...']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-lg-6">
                                                        {!! Form::label('inspection_type', 'Inspection Type', ['class' => 'control-label']) !!}
                                                        {!! Form::text('inspection_type', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="form-group  col-lg-6">
                                                        {!! Form::label('apartment_number', 'Apartment Number', ['class' => 'control-label']) !!}
                                                        {!! Form::text('apartment_number', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        {!! Form::label('tenant_first_name', 'Tenant First Name', ['class' => 'control-label']) !!}
                                                        {!! Form::text('tenant_first_name', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        {!! Form::label('tenant_middle_name', 'Tenant Middle Name', ['class' => 'control-label']) !!}
                                                        {!! Form::text('tenant_middle_name', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        {!! Form::label('tenant_last_name', 'Tenant Last Name', ['class' => 'control-label']) !!}
                                                        {!! Form::text('tenant_last_name', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-lg-8">
                                                        {!! Form::label('tenant_address', 'Tenant Address', ['class' => 'control-label']) !!}
                                                        {!! Form::text('tenant_address', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        {!! Form::label('tenant_phone', 'Tenant Phone Number', ['class' => 'control-label']) !!}
                                                        {!! Form::text('tenant_phone', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card bg-light">
                                            <div class="card-header hover text-muted border-bottom-0"
                                                 aria-expanded="false">
                                                <i class="fas fa-plus-circle"></i><b>BUILDING OWNER/REPRESENTATIVE:</b>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="form-group">
                                                    {!! Form::label('owner_name', 'Owner Name', ['class' => 'control-label']) !!}
                                                    {!! Form::text('owner_name', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('owner_address', 'Owner Address', ['class' => 'control-label']) !!}
                                                    {!! Form::text('owner_address', null, ['class' => 'form-control']) !!}
                                                </div>

                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            {!! Form::label('sending_address', 'Sending Address', ['class' => 'control-label']) !!}
                                                            {!! Form::text('sending_address', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            {!! Form::label('owner_phone', 'Owner Phone', ['class' => 'control-label']) !!}
                                                            {!! Form::text('owner_phone', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('mailing_notice', 'Mailing Note', ['class' => 'control-label']) !!}
                                                    {!! Form::text('mailing_notice', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card bg-light">
                                            <div class="card-header hover text-muted border-bottom-0"
                                                 aria-expanded="false">
                                                <i class="fas fa-plus-circle"></i><b>BUILDING INFORMATION</b>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            {!! Form::label('construction_year', 'Construction Year', ['class' => 'control-label']) !!}
                                                            {!! Form::text('construction_year', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            {!! Form::label('construction_type', 'Type of Construction', ['class' => 'control-label']) !!}
                                                            {!! Form::select('construction_type', ['Combustible'=>'Combustible','Non-Combustible'=>'Non-Combustible'],null, ['class' => 'form-control','placeholder' => 'Select']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            {!! Form::label('floor_number_above_ground', 'Above Ground', ['class' => 'control-label']) !!}
                                                            {!! Form::text('floor_number_above_ground', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            {!! Form::label('floor_number_below_ground', 'Below Ground', ['class' => 'control-label']) !!}
                                                            {!! Form::text('floor_number_below_ground', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="firesafety">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card bg-light">
                                            <div class="card-header hover text-muted border-bottom-0"
                                                 aria-expanded="false">
                                                <i class="fas fa-plus-circle"></i><b>Sprinkler System Coverage</b>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {!! Form::label('sprinkler_system', 'Sprinkler System', ['class' => 'control-label']) !!}
                                                            {!! Form::select('sprinkler_system',['Yes'=>'Yes','No'=>'No'] ,null,['class' => 'form-control','placeholder' => 'Select']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {!! Form::label('sprinkler_coverage', 'Sprinkler Sys. Coverage', ['class' => 'control-label']) !!}
                                                            {!! Form::select('sprinkler_coverage',['EntireBuilding'=>'Entire Building','Partial (complete all that apply)'=>'Partial (complete all that apply):'], null, ['class' => 'form-control','placeholder'=>'Select']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            {!! Form::label('sc_dwelling_units', 'Dwelling Units', ['class' => 'control-label']) !!}
                                                            {!! Form::text('sc_dwelling_units', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            {!! Form::label('sc_hallways', 'Hallways', ['class' => 'control-label']) !!}
                                                            {!! Form::text('sc_hallways', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            {!! Form::label('sc_stairwells', 'Stairwells', ['class' => 'control-label']) !!}
                                                            {!! Form::text('sc_stairwells', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            {!! Form::label('sc_chute', 'Compactor Chute', ['class' => 'control-label']) !!}
                                                            {!! Form::text('sc_chute', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            {!! Form::label('sc_other', 'Other', ['class' => 'control-label']) !!}
                                                            {!! Form::text('sc_other', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card bg-light">
                                                    <div class="card-header hover text-muted border-bottom-0"
                                                         aria-expanded="false">
                                                        <i class="fas fa-plus-circle"></i><b>Fire Alarm System</b>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="form-group">
                                                            {!! Form::label('alarm_status', 'Alarm Status', ['class' => 'control-label']) !!}
                                                            {!! Form::select('alarm_status',['Yes'=>'Yes','No'=>'No','Transmits Alarm to Fire Dept/Fire Alarm Co'=>'Transmits Alarm to Fire Dept/Fire Alarm Co'], null, ['class' => 'form-control','placeholder' => 'Select']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('manual_pull_station', 'Manual Pull Station', ['class' => 'control-label']) !!}
                                                            {!! Form::text('manual_pull_station', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="card bg-light">
                                                    <div class="card-header hover text-muted border-bottom-0"
                                                         aria-expanded="false">
                                                        <i class="fas fa-plus-circle"></i><b>Public Address System</b>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="form-group">
                                                            {!! Form::label('pa_status', 'Status', ['class' => 'control-label']) !!}
                                                            {!! Form::select('pa_status',['Yes'=>'Yes','No'=>'No'], null, ['class' => 'form-control','placeholder' => 'Select']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('speaker_location', 'Speaker Location', ['class' => 'control-label']) !!}
                                                            {!! Form::select('speaker_location',['Stairwell'=>'Stairwell','Hallway'=>'Hallway','DwellingUnit'=>'DwellingUnit','Other'=>'Other'], null, ['class' => 'form-control','placeholder' => 'Select']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('speaker_location_other', 'Other', ['class' => 'control-label']) !!}
                                                            {!! Form::text('speaker_location_other', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card bg-light">
                                            <div class="card-header hover text-muted border-bottom-0"
                                                 aria-expanded="false">
                                                <i class="fas fa-plus-circle"></i><b>Means of Egress</b>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="form-group">
                                                    {!! Form::hidden('egress', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <table id="egresstable" class="display text-center"
                                                       border="solid 1px !important;" cellspacing="0"
                                                       width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Type of Egress</th>
                                                        <th>Identification</th>
                                                        <th>Location</th>
                                                        <th>Leads to</th>
                                                    </tr>
                                                    </thead>
                                                    {{--                            <tfoot>--}}
                                                    {{--                            <tr>--}}
                                                    {{--                                <th>#</th>--}}
                                                    {{--                                <th>Type of Egress</th>--}}
                                                    {{--                                <th>Identification</th>--}}
                                                    {{--                                <th>Location</th>--}}
                                                    {{--                                <th>Leads to</th>--}}
                                                    {{--                            </tr>--}}
                                                    {{--                            </tfoot>--}}
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-12">
                                        <div class="card bg-light">
                                            <div class="card-header hover text-muted border-bottom-0"
                                                 aria-expanded="false">
                                                <i class="fas fa-plus-circle"></i><b>Other Infos</b>
                                            </div>
                                            <div class="card-body pt-0">

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('date_prepared', 'Prepared Date', ['class' => 'control-label']) !!}
                                                            {!! Form::date('date_prepared',  old('date_prepared',$hpdAnnualMailing->date_prepared??now())->format('Y-m-d'), ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('mail_send_date', 'Mailing Send Date', ['class' => 'control-label']) !!}
                                                            {!! Form::date('mail_send_date', old('mail_send_date',$hpdAnnualMailing->mail_send_date??now())->format('Y-m-d'), ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('status', 'All operation finished?', ['class' => 'control-label']) !!}
                                                            <br/>
                                                            {!! Form::checkbox('status', '1', null,  ['id' => 'status','data-toggle'=>'switchbutton','data-size'=>'lg','data-onstyle'=>"outline-success", 'data-offstyle'=>"outline-secondary",'data-onlabel'=>"Ready", 'data-offlabel'=>"Not Ready"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            {!! Form::label('other_information', 'Other Information', ['class' => 'control-label']) !!}
                                                            {!! Form::textarea('other_information', null, ['class' => 'form-control','rows'=>8]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="windowguard">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#apendixa"
                                                                data-toggle="tab"><i class="fas fa-plus-circle"></i>
                                                Window Guards Appendix A</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#apendixb"
                                                                data-toggle="tab"><i class="fas fa-plus-circle"></i>
                                                Window Guards Appendix B</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="apendixa">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Appendix A</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="tab-container px-3">
                                                        <div style="border: solid 1px black" class="row">
                                                            <div class="col-2">
                                                                <img class="mt-1 pt-1"
                                                                     src="{{asset('images/hpdmailings/nychealth.png')}}">
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p class="s1"
                                                                   style="padding-top: 7pt;padding-left: 0pt;text-indent: 0pt;text-align: left;">
                                                                    New York City <br>Department of Health <br/>and
                                                                    Mental
                                                                    Hygiene</p>
                                                            </div>
                                                            <div class="col-10">

                                                                <p class="s2"
                                                                   style="padding-top: 3pt;text-indent: 0pt;text-align: right;">
                                                                    Appendix A</p>
                                                                <h1 style="padding-top: 1pt;text-indent: 0pt;line-height: 33pt;text-align: center;  color: #0054A4; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold;  text-decoration: none; font-size: 30pt;">
                                                                    WINDOW GUARDS REQUIRED</h1>
                                                                <h3 style="text-indent: 0pt;line-height: 15pt;text-align: center; color: #0054A4; font-family: Tahoma, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 14pt;">
                                                                    Lease Notice to Tenant</h3>
                                                                <p class="s5"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    You are required by law to have window guards
                                                                    installed in all windows if a child
                                                                    10 years of age or younger lives in your
                                                                    apartment.</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    Your landlord is required by law to install window
                                                                    guards in your apartment:
                                                                    if a child 10 years of age or younger lives in your
                                                                    apartment,</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    OR</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    if you ask him to install window guards at any time
                                                                    (you need not give a reason).</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    It is a violation of law to refuse, interfere with
                                                                    installation, or remove window guards where
                                                                    required.</p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                {{--                                                                {!! Form::open(['route' => 'hpdmailing.store','files'=>'true']) !!}--}}
                                                                <h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
                                                                    CHECK ONE:</h2>
                                                                <div style="padding-left: 16pt;" class="form-group">
                                                                    {!! Form::radio('wg_ap_a_check','CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT', false)  !!}
                                                                    {!! Form::label('wg_ap_a_check', 'CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT', ['class' => 'control-label']) !!}
                                                                </div>
                                                                <div style="padding-left: 16pt;" class="form-group">
                                                                    {!! Form::radio('wg_ap_a_check','NO CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT',false ) !!}
                                                                    {!! Form::label('wg_ap_a_check', 'NO CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT', ['class' => 'control-label']) !!}
                                                                </div>
                                                                <div style="padding-left: 16pt;" class="form-group">
                                                                    {!! Form::radio('wg_ap_a_check','I WANT WINDOW GUARDS EVEN THOUGH I HAVE NO CHILDREN 10 YEARS OF AGE OR YOUNGER',false) !!}
                                                                    {!! Form::label('wg_ap_a_check', 'I WANT WINDOW GUARDS EVEN THOUGH I HAVE NO CHILDREN 10 YEARS OF AGE OR YOUNGER', ['class' => 'control-label']) !!}
                                                                </div>

                                                                <p style="text-indent: 0pt;text-align: left;">
                                                                    <br/></p>
                                                                <p class="s4"
                                                                   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
                                                                <div style="border-top: 1px solid">Tenant (Print)</div>
                                                                </p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p class="s4"
                                                                   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
                                                                <div class="row" style="border-top: 1px solid">
                                                                    <div class="col-9 text-left"> Tenant’s Signature
                                                                    </div>
                                                                    <div class="col-3">
                                                                        Date
                                                                    </div>
                                                                </div>
                                                                </p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p class="s4"
                                                                   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
                                                                <div class="row" style="border-top: 1px solid">
                                                                    <div class="col-9 text-left"> Tenant’s Address</div>
                                                                    <div class="col-3">
                                                                        Apt No.
                                                                    </div>
                                                                </div>
                                                                </p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                            </div>
                                                            <div class="col-12">
                                                                <h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif;
                                                                    font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
                                                                    RETURN THIS FORM TO:</h2>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <div class="row">
                                                                    <div class="col-9" style="padding-left: 16pt;">
                                                                        <p style="border-top: 1px solid black">

                                                                            Owner/Manager
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-3">

                                                                    </div>

                                                                </div>
                                                                {{--                                                                <p class="s4"--}}
                                                                {{--                                                                   style="padding-left: 16pt;text-indent: 0pt;text-align: left;">--}}
                                                                {{--                                                                    Owner/Manager</p>--}}
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <div class="row">
                                                                    <div class="col-9" style="padding-left: 16pt;">
                                                                        <p style="border-top: 1px solid black">

                                                                            Owner/Manager’s Address
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-3">

                                                                    </div>

                                                                </div>
                                                                {{--                                                                <p class="s4"--}}
                                                                {{--                                                                   style="padding-left: 16pt;text-indent: 0pt;text-align: left;">--}}
                                                                {{--                                                                    Owner/Manager’s Address</p>--}}
                                                                <p style="padding-top: 0pt;padding-left: 158pt;text-indent: 0pt;text-align: center;">
                                                                    <i><b>For Further Information call 311 for <BR/>Window
                                                                            Falls Prevention</b></i></p>
                                                            </div>
                                                        </div>
                                                        <p class="s1"
                                                           style="padding-top: 5pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
                                                            <i>WF-013 (Rev. 11/2018)</i></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="apendixb">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Appendix B</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="tab-container px-3">
                                                        <div style="border: solid 1px black" class="row">
                                                            <div class="col-2">
                                                                <img class="mt-1 pt-1"
                                                                     src="{{asset('images/hpdmailings/nychealth.png')}}">
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p class="s1"
                                                                   style="padding-top: 7pt;padding-left: 0pt;text-indent: 0pt;text-align: left;">
                                                                    New York City <br>Department of Health <br/>and
                                                                    Mental
                                                                    Hygiene</p>
                                                            </div>
                                                            <div class="col-10">

                                                                <p class="s2"
                                                                   style="padding-top: 3pt;text-indent: 0pt;text-align: right;">
                                                                    Appendix B</p>
                                                                <h1 style="padding-top: 1pt;text-indent: 0pt;line-height: 33pt;text-align: center;  color: #0054A4; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold;  text-decoration: none; font-size: 30pt;">
                                                                    WINDOW GUARDS REQUIRED</h1>
                                                                <h3 style="text-indent: 0pt;line-height: 15pt;text-align: center; color: #0054A4; font-family: Tahoma, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 14pt;">
                                                                    Lease Notice to Tenant</h3>
                                                                <p class="s5"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    You are required by law to have window guards
                                                                    installed in all windows if a child
                                                                    10 years of age or younger lives in your
                                                                    apartment.</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    Your landlord is required by law to install window
                                                                    guards in your apartment:
                                                                    if a child 10 years of age or younger lives in your
                                                                    apartment,</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    OR</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    if you ask him to install window guards at any time
                                                                    (you need not give a reason).</p>
                                                                <p class="s3"
                                                                   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
                                                                    It is a violation of law to refuse, interfere with
                                                                    installation, or remove window guards
                                                                    where required, or to fail to complete and return
                                                                    this form to your landlord. If this
                                                                    form is not returned promptly an inspection by the
                                                                    landlord will follow.</p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                {{--                                                                {!! Form::open(['route' => 'hpdmailing.store','files'=>'true']) !!}--}}
                                                                <h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
                                                                    CHECK WHICHEVER APPLY:</h2>
                                                                <div class="form-check">
                                                                    <div class="col-12 s5">
                                                                        {!! Form::checkbox('wg_ap_b_under_ten', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                                        - {!! Form::label('wg_ap_b_under_ten', 'CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT', ['class' => 'form-check-label']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <div class="col-12 s5">
                                                                        {!! Form::checkbox('wg_ap_b_not_under_ten', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                                        - {!! Form::label('wg_ap_b_not_under_ten', 'NO CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT', ['class' => 'form-check-label']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <div class="col-12 s5">
                                                                        {!! Form::checkbox('wg_ap_b_installed', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                                        - {!! Form::label('wg_ap_b_installed', 'WINDOW GUARDS ARE INSTALLED IN ALL WINDOWS*', ['class' => 'form-check-label']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <div class="col-12 s5">
                                                                        {!! Form::checkbox('wg_ap_b_not_installed', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                                        - {!! Form::label('wg_ap_b_not_installed', 'WINDOW GUARDS ARE NOT INSTALLED IN ALL WINDOWS*', ['class' => 'form-check-label']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <div class="col-12 s5">
                                                                        {!! Form::checkbox('wg_ap_b_i_want_guard', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                                        - {!! Form::label('wg_ap_b_i_want_guard', 'I WANT WINDOW GUARDS EVEN THOUGH I HAVE NO CHILDREN 10 YEARS OF AGE OR YOUNGER', ['class' => 'form-check-label']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <div class="col-12 s5">
                                                                        {!! Form::checkbox('wg_ap_b_need_repair', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                                        - {!! Form::label('wg_ap_b_need_repair', 'WINDOW GUARDS NEED MAINTENANCE OR REPAIR', ['class' => 'form-check-label']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <div class="col-12 s5">
                                                                        {!! Form::checkbox('wg_ap_b_not_need_repair', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                                        - {!! Form::label('wg_ap_b_not_need_repair', 'WINDOW GUARDS DO NOT NEED MAINTENANCE OR REPAIR', ['class' => 'form-check-label']) !!}
                                                                    </div>
                                                                </div>
                                                                {{--                                                                {!! Form::close() !!}--}}
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;">
                                                                    <br/></p>
                                                                <p class="s4"
                                                                   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
                                                                <div style="border-top: 1px solid">Tenant (Print)</div>
                                                                </p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p class="s4"
                                                                   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
                                                                <div class="row" style="border-top: 1px solid">
                                                                    <div class="col-9 text-left"> Tenant’s Signature
                                                                    </div>
                                                                    <div class="col-3">
                                                                        Date
                                                                    </div>
                                                                </div>
                                                                </p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p class="s4"
                                                                   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
                                                                <div class="row" style="border-top: 1px solid">
                                                                    <div class="col-9 text-left"> Tenant’s Address</div>
                                                                    <div class="col-3">
                                                                        Apt No.
                                                                    </div>
                                                                </div>
                                                                </p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                            </div>
                                                            <div class="col-12">
                                                                <h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif;
                                                                    font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
                                                                    RETURN THIS FORM TO:</h2>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <div class="row">
                                                                    <div class="col-9" style="padding-left: 16pt;">
                                                                        <p style="border-top: 1px solid black">

                                                                            Owner/Manager
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-3">

                                                                    </div>

                                                                </div>
                                                                {{--                                                                <p class="s4"--}}
                                                                {{--                                                                   style="padding-left: 16pt;text-indent: 0pt;text-align: left;">--}}
                                                                {{--                                                                    Owner/Manager</p>--}}
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <div class="row">
                                                                    <div class="col-9" style="padding-left: 16pt;">
                                                                        <p style="border-top: 1px solid black">

                                                                            Owner/Manager’s Address
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-3">

                                                                    </div>

                                                                </div>
                                                                {{--                                                                <p class="s4"--}}
                                                                {{--                                                                   style="padding-left: 16pt;text-indent: 0pt;text-align: left;">--}}
                                                                {{--                                                                    Owner/Manager’s Address</p>--}}
                                                                <p class="s5"
                                                                   style="padding-top: 5pt;padding-left: 158pt;text-indent: 0pt;text-align: center; color: #0054A4;">
                                                                    <i>Deadline for return: February 15, 2020</i></p>
                                                                <p style="padding-top: 0pt;padding-left: 158pt;text-indent: 0pt;text-align: center;">
                                                                    <i><b>For Further Information call 311 for Window
                                                                            Falls
                                                                            Prevention</b></i></p>
                                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                                <p>*Except windows giving access to fire escapes or
                                                                    windows
                                                                    on
                                                                    the first floor that are required means of egress
                                                                    from
                                                                    the
                                                                    dwelling unit.</p>
                                                            </div>

                                                        </div>
                                                        <p class="s1"
                                                           style="padding-top: 5pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
                                                            <i>(Rev. 11/2018)</i></p>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="tab-pane" id="lead">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">PROTECT YOUR CHILD FROM LEAD POISONING AND WINDOW
                                            FALLS</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-container px-3">
                                            <table width="100%" class="col-12">
                                                <tbody style="width: 100%">
                                                <tr>
                                                    <td><img alt="image" height="59"
                                                             src="{{asset('images/hpdmailings/nychealth.png')}}"
                                                             width="125"/></td>
                                                    <td><p class="s1 pt-0"
                                                           style="padding-top: 4pt;padding-left: 207pt;text-indent: 0pt;text-align: left;">
                                                            FOR USE AS OF JANUARY 1, 2020</p></td>
                                                    <td><p class="s2"
                                                           style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
                                                            To: <span class="s1">Tenant</span></p>
                                                        <p class="s2"
                                                           style="padding-top: 2pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
                                                            From: <span class="s1">Landlord/Building Owner</span></p>
                                                        <p class="s2"
                                                           style="padding-top: 2pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
                                                            Date: <span class="s1">      /      /</span></p></td>
                                                </tr>
                                                </tbody>
                                            </table>


                                            <h1 style="padding-top: 4pt;text-indent: 0pt;text-align: center; color: #002a80;
                                            font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px; ">
                                                PROTECT
                                                YOUR CHILD FROM LEAD POISONING AND WINDOW FALLS</h1>
                                            <p style="padding-left: 2pt;text-indent: 0pt;text-align: center;"><span
                                                        class="s3"
                                                        style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;display: table;margin: 0px auto 0px auto;padding: 5px; "> Annual Notice </span>
                                            </p>
                                            <p class="s4"
                                               style="padding-top: 8pt;padding-left: 14pt;text-indent: 0pt;text-align: center;">
                                                New York City law requires that tenants living in buildings with three
                                                or more apartments complete this
                                                form and return it to their landlord before <b>February 15</b>, each
                                                year. <b>If you do not return this form, your landlord is required to
                                                    visit your apartment to determine if a child resides in
                                                    your apartment.</b></p>
                                            {{--                                            Mavi Alan--}}
                                            <div class="row"
                                                 style="background-color: #b6d0ed!important; border-radius: 12px">
                                                <div class="col-6 pl-0">
                                                    <p style="text-indent: 0pt;text-align: left;"><br/></p>

                                                    <p style="padding-left: 2pt;text-indent: 0pt;text-align: center;">
                                                        <span class="s3"
                                                              style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                                                                 font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;
                                                                 display: table;margin: 0px auto 0px -5px;padding: 5px; ">Peeling Lead Paint
                                                        </span>
                                                    </p>
                                                    <p class="s6"
                                                       style="padding-top: 6pt;padding-left: 18pt;text-indent: 0pt;text-align: left;">
                                                        <b>By law</b><span class="p">, your landlord is required to inspect your apartment for peeling paint and other lead paint hazards at least once a year if a child 5 years or younger lives with you or routinely spends 10 or more hours each week in your apartment.</span>
                                                    </p>
                                                    <ul id="l1">
                                                        <li style="padding-top: 9pt;padding-left: 29pt;text-indent: -11pt;text-align: justify;">
                                                            <p class="s6" style="display: inline;">You must notify your
                                                                landlord in
                                                                writing
                                                                if a child 5 years or younger comes to
                                                                live with you during the year or routinely spends 10 or
                                                                more
                                                                hours each week in your apartment.</p></li>
                                                        <li style="padding-top: 4pt;padding-left: 29pt;text-indent: -11pt;text-align: left;">
                                                            <p class="s6" style="display: inline;">If a child 5 years or
                                                                younger
                                                                lives with
                                                                you or routinely spends 10 or more hours
                                                                each week in your apartment, your landlord must inspect
                                                                your
                                                                apartment and provide you with the results of these
                                                                paint
                                                                inspections.</p></li>
                                                        <li class="s6"
                                                            style="padding-top: 4pt;padding-left: 29pt;text-indent: -11pt;text-align: left;">
                                                            <p style="display: inline;">Your landlord must use safe work
                                                                practices to repair all peeling paint and other
                                                                lead paint hazards.</p></li>
                                                        <li class="s6"
                                                            style="padding-top: 4pt;padding-left: 29pt;text-indent: -11pt;text-align: left;">
                                                            <p class="s7" style="display: inline;"><b>Always report
                                                                    peeling
                                                                    paint
                                                                    to your landlord. Call 311 if your landlord
                                                                    does not respond.</b></p></li>
                                                        <hr class="half-width">
                                                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                        <p class="s8"
                                                           style="padding-top: 6pt;padding-left: 19pt;text-indent: 1pt;line-height: 9pt;text-align: center;">
                                                            These notice and inspection requirements apply to buildings
                                                            with
                                                            three or more
                                                            apartments built before 1960. They also apply to such
                                                            buildings
                                                            built between 1960 and 1978 if the landlord knows that lead
                                                            paint is present.</p>
                                                    </ul>
                                                </div>
                                                <div class="col-6 pr-0">
                                                    <p style="text-indent: 0pt;text-align: left;"><br/></p>

                                                    <p style="padding-left: 2pt;text-indent: 0pt;text-align: center;">
                                                        <span class="s3"
                                                              style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                                                                 font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;
                                                                 display: table;margin: 0px -5px 0px auto;padding: 5px; ">Window Guards
                                                        </span>
                                                    </p>
                                                    <p class="s6"
                                                       style="padding-top: 6pt;padding-left: 18pt;text-indent: 0pt;text-align: left;">
                                                        <b>By law</b><span class="p">, your landlord is required to install window guards in all of your windows if a child 10 years or younger lives with you, OR if you request window guards (even if no children live with you).</span>
                                                    </p>
                                                    <ul id="l2">
                                                        <li style="padding-top: 9pt;padding-left: 29pt;text-indent: -11pt;text-align: left;">
                                                            <p class="s6" style="display: inline;">It is against the law
                                                                <span
                                                                        class="p">for you to interfere with installation, or remove window guards where they are required. Air conditioners in windows must be permanently installed.</span>
                                                            </p></li>

                                                        <li style="padding-top: 4pt;padding-left: 29pt;text-indent: -11pt;text-align: left;">
                                                            <p class="s6" style="display: inline;">Window guards must be
                                                                installed
                                                                so there
                                                                is no space greater than 4½ inches above
                                                                or below the guard, on the side of the guard, or between
                                                                the
                                                                bars.</p></li>
                                                        <li style="padding-top: 4pt;padding-left: 29pt;text-indent: -11pt;text-align: left;">
                                                            <p class="s6" style="display: inline;">ONLY windows that
                                                                open to fire
                                                                escapes,
                                                                and one window in each first floor
                                                                apartment when there is a fire escape on the outside of
                                                                the
                                                                building, are legally exempt from this requirement.</p>
                                                        </li>
                                                    </ul>
                                                    <hr class="half-width">
                                                    <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                    <p class="s8"
                                                       style="padding-left: 56pt;text-indent: -20pt;line-height: 9pt;text-align: center;">
                                                        These requirements apply to all buildings with three or more
                                                        apartments,
                                                        regardless of when they were
                                                        built.</p>
                                                </div>
                                            </div>
                                            {{--                                            Mavi alan bitti--}}
                                            <h3 style="padding-top: 9pt;padding-bottom: 1pt;padding-left: 77pt;text-indent: 0pt;text-align: center;">
                                                Fill out and detach the bottom part of this form and return it to your
                                                landlord.</h3>
                                            <hr style="border-top: 2px dashed black">
                                            <div style="border: solid 2px black">
                                                <p class="s1"
                                                   style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                    Please check all boxes that apply:</p>
                                                {{--                                                {!! Form::open(['route' => 'hpdmailing.store','files'=>'true']) !!}--}}
                                                <div class="form-check">
                                                    <div class="col-12 s5">
                                                        {!! Form::checkbox('lead_five_to_ten', '1', false,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                                                        {!! Form::label('lead_five_to_ten', 'A child 5 years or younger lives in my apartment or routinely spends
                                                        10
                                                        or more hours each week in my
                                                        apartment.', ['class' => 'form-check-label']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-check">

                                                    <div class="custom-control custom-checkbox s1"
                                                         style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                        <p type="checkbox" class="custom-control-input"
                                                           id="defaultUnchecked" disabled></p>
                                                        <label class="custom-control-label" for="defaultUnchecked">A
                                                            child
                                                            10 years or younger lives in my apartment and:</label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox s1"
                                                         style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                        <p type="checkbox" class="custom-control-input"
                                                           id="defaultUnchecked" disabled></p>
                                                        <label class="custom-control-label" for="defaultUnchecked">Window
                                                            guards are installed in all windows as required.</label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox s1"
                                                         style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                        <p type="checkbox" class="custom-control-input"
                                                           id="defaultUnchecked" disabled></p>
                                                        <label class="custom-control-label" for="defaultUnchecked">Window
                                                            guards need repair</label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox s1"
                                                         style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                        <p type="checkbox" class="custom-control-input"
                                                           id="defaultUnchecked" disabled></p>
                                                        <label class="custom-control-label" for="defaultUnchecked">Window
                                                            guards are NOT installed in all windows as required.</label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox s1"
                                                         style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                        <p type="checkbox" class="custom-control-input"
                                                           id="defaultUnchecked" disabled></p>
                                                        <label class="custom-control-label" for="defaultUnchecked">No
                                                            child
                                                            10 years or younger lives in my apartment:</label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox s1"
                                                         style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                        <p type="checkbox" class="custom-control-input"
                                                           id="defaultUnchecked" disabled></p>
                                                        <label class="custom-control-label" for="defaultUnchecked">I
                                                            want
                                                            window guards installed anyway.</label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox s1"
                                                         style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                                                        <p type="checkbox" class="custom-control-input"
                                                           id="defaultUnchecked" disabled></p>
                                                        <label class="custom-control-label" for="defaultUnchecked">I
                                                            have
                                                            window guards, but they need repair.</label>
                                                    </div>


                                                </div>
                                                <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                                <div>
                                                    <table cellspacing="0" width="100%"
                                                           style="border-collapse:collapse;margin-left:15.6pt">
                                                        <tr style="height:35pt">
                                                            <td style="width:139pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="text-indent: 0pt;text-align: left;">
                                                                    Last
                                                                    Name</p>
                                                            </td>
                                                            <td style="width:136pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 79pt;text-indent: 0pt;text-align: left;">
                                                                    First
                                                                    Name</p></td>
                                                            <td style="width:49pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt"/>
                                                            <td style="width:57pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt"/>
                                                            <td style="width:140pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 23pt;text-indent: 0pt;text-align: left;">
                                                                    Middle
                                                                    Initial</p></td>
                                                        </tr>
                                                        <tr style="height:34pt">
                                                            <td style="width:139pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="text-indent: 0pt;text-align: left;">
                                                                    Street
                                                                    Address</p></td>
                                                            <td style="width:136pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 78pt;text-indent: 0pt;text-align: left;">
                                                                    Apt.#</p>
                                                            </td>
                                                            <td style="width:49pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 12pt;text-indent: 0pt;text-align: left;">
                                                                    City</p>
                                                            </td>
                                                            <td style="width:57pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 14pt;text-indent: 0pt;text-align: left;">
                                                                    State</p>
                                                            </td>
                                                            <td style="width:140pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 21pt;text-indent: 0pt;text-align: left;">
                                                                    ZIP
                                                                    Code</p></td>
                                                        </tr>
                                                        <tr style="height:13pt">
                                                            <td style="width:139pt;border-top-style:solid;border-top-width:1pt">
                                                                <p class="s10"
                                                                   style="text-indent: 0pt;line-height: 12pt;text-align: left;">
                                                                    Signature</p></td>
                                                            <td style="width:136pt;border-top-style:solid;border-top-width:1pt"/>
                                                            <td style="width:49pt;border-top-style:solid;border-top-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 15pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                                                                    Date</p></td>
                                                            <td style="width:57pt;border-top-style:solid;border-top-width:1pt"/>
                                                            <td style="width:140pt;border-top-style:solid;border-top-width:1pt">
                                                                <p class="s10"
                                                                   style="padding-left: 25pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                                                                    Telephone Number</p></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                            <p style="padding-left: 2pt;text-indent: 0pt;text-align: center;"><span
                                                        class="s3"
                                                        style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;display: table;margin: 0px auto 0px auto;padding: 5px; ">
                                                    Deadline for return: February 15, 2020</span>
                                            </p>
                                            <p class="s11" style="text-indent: 0pt;text-align: right;">Return form to:
                                                name and address of landlord or managing agent. Call 311 for more
                                                information about preventing lead poisoning and window
                                                falls.</p>
                                            <p class="s12" style="padding-top: 3pt;text-indent: 0pt;text-align: right;">
                                                Approved 10/1/2019</p>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    {!! Form::submit('Update Mailing', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
                                </div>
                                <div class="col-2">
                                    {{ Form::reset('Reset',['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop

@section('js')
    <!-- page script -->
    <script>
        $(document).ready(function () {
            var table;
            $('#egress').value = null;

            const createdCell = function (cell) {
                let original;
                cell.setAttribute('contenteditable', true)
                cell.setAttribute('spellcheck', false)
                cell.addEventListener("focus", function (e) {
                    original = e.target.textContent
                })
                cell.addEventListener("blur", function (e) {
                    if (original !== e.target.textContent) {
                        const row = table.row(e.target.parentElement)
                        row.invalidate('dom')
                        // console.log('Row changed: ', table.data())
                        var lastdata = table.data().toArray();
                        document.getElementsByName('egress')[0].value = JSON.stringify(lastdata);
                        // $('#egress').val(table.data());
                    }
                })
            }

            table = $('#egresstable').DataTable({
                paging: false,
                stateSave: false,
                lengthChange: true,
                searching: false,
                ordering: true,
                info: false,
                autoWidth: false,
                fixedHeader: true,
                scrollX: false,
                responsive: true,
                columnDefs: [{
                    className: 'dt-body-center',
                    targets: '_all',
                    createdCell: createdCell
                }]
            });

            if (document.getElementsByName('egress')[0].value) {
                table.clear();
                table.rows.add(JSON.parse(document.getElementsByName('egress')[0].value)).draw();
            }
        });
    </script>
@append
