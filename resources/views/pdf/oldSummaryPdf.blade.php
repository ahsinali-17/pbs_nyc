<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<![endif]-->
    <title>Email Template</title>

    <style type="text/css">
        @media print {
            .new-page {
                page-break-before: always;
            }
        }

        .newsection {
            page-break-after: always;
        }

        /*@page {*/
        /*    header: page-header;*/
        /*    footer: page-footer;*/
        /*    margin: 220px 0 150px 0;*/
        /*    margin-footer: 0;*/
        /*    margin-header: 0;*/
        /*    text-align: left !important;*/
        /*}*/

        {{--@font-face {--}}
        {{--    font-family: 'Muli';--}}
        {{--    src: url({{ storage_path('fonts/roboto-bold_1e996688829091a02d8ce32f4ce56696.ttf')}}) format("truetype");--}}
        {{--    font-weight: 400;--}}
        {{--    font-style: normal;--}}
        {{--}--}}

        body {
            margin: 0;
            font-family: 'Muli', sans-serif !important;

        }


        table, tr, td {
            padding: 0;
            border-collapse: collapse;
        }

        table {
            width: 100%;
            page-break-inside: auto;
            font-size: 8pt;
            letter-spacing: 0.125em;
        }


        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .page-break-before {
            page-break-before: always;
        }

        .container {
            padding: 0 35pt;
        }

        main .container {
            margin-top: 2em;
        }

        main h2 {
            margin: 0 0 .8em;
            page-break-after: avoid;
        }

        main p, main .table-wrapper {
            margin: 0 0 1em;
        }

        .clearfix {
            clear: both;
        }


        .vertical-bar {
            display: block;
            width: 100px;
            border-bottom: 1px solid #ccc;
            margin: 0 auto;
        }

        .col1 {
            width: 8.33333%;
        }

        .col2 {
            width: 16.66667%;
        }

        .col3 {
            width: 25%;
        }

        .col4 {
            width: 33.33333%;
        }

        .col5 {
            width: 41.66667%;
        }

        .col6 {
            width: 50%;
        }

        .col7 {
            width: 58.33333%;
        }

        .col8 {
            width: 66.66667%;
        }

        .col9 {
            width: 75%;
        }

        .col10 {
            width: 83.33333%;
        }

        .col11 {
            width: 91.66667%;
        }

        .col12 {
            width: 100%;
        }

        .renklendir tr:nth-child(odd) {
            background-color: #f2f2f2 !important;
        }

        .renklendir th {
            padding: 10px 0;
        }

        .renklendir {
            border-bottom: 2px solid #000000 !important;
            line-height: 22px;
        }

        .renklendir th {
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
        }


        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }


    </style>

</head>
<body>
@php
    $bottomNote='<span><i>This report shows a part of the records.As: If you have more than 10 buildings,it will show one record for each building. If you have fewer than 10 buildings, the last ten data information will be shown.You can see all of the information by <a href="https://pbs.nyc/portal/">using our member portal system</a></i></span>';
    $noRecord='<div style="margin-top:15%; border-radius: 50px; width:100%;text-align: center;height: 75px;;"><span style="padding-top: 20px"> <i>*There is no record in the database.</i></span></div>'
@endphp

<div style="margin: 0 40px;">
    <div class="newsection" style="text-align: left;">
{{--        <div style="text-align: center; padding-top: 22%">--}}
{{--            <img src="{{ asset('images/logos/black.jpg')}}">--}}
{{--        </div>--}}
        <h1 style="padding-top: 200px; text-align: center">SUMMARY REPORT</h1>
        <h2 style="text-align: center">Dear {{$user->name}}</h2>
        <p style="text-align: center;"> Below is a summary report generated on {{now()->format('Y-m-d')}}. <br/>
            You can simply reply this email or book a consultation for further assistance.</p>
        <div style="margin: 0 30%; border-radius: 50px; width:40%;text-align: center;height: 50px;padding:10px; background:rgba(35,36,35,0.54);">
            <a href="https://calendly.com/proactivebuildingsolutions" target="_blank"
               style="display:block;font-size:16px; text-align:center; font-weight:bold;color:#ffffff; text-decoration:underline;">
                BOOK A CONSULTATION
            </a>
        </div>
    </div> {{--  First Page --}}
    <div class="newsection" style="text-align: left;">

        <h1>PROPERTY LIST OVERVIEW</h1>
        <hr>
        This report covers property summary for the following {{$user->properties->count()}} properties <br/>

        <div style="width: 100%;display: inline;">
            <div style="display: inline; float:right; width: 100%; font-size: 12pt;">
                <table class="renklendir" autosize="1"
                       style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                       width="100%"
                       border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                    <thead>
                    <tr>
                        <th style="width: 12%!important">ADDRESS</th>
                        <th style="text-align: center;">DOB <br/>VIOLATIONS</th>
                        <th style="text-align: center">DOB <br/>COMPLAINTS</th>
                        <th style="text-align: center">ECB <br/>HEARINGS</th>
                        <th style="text-align: center">ECB <br/>VIOLATIONS</th>
                        <th style="text-align: center">ECB <br/>PENALTIES DUE</th>
                        <th style="text-align: center">HPD <br/>VIOL</th>
                        <th style="text-align: center">HPD <br/>COMP</th>
                        <th style="text-align: center">HPD <br/>REPAIR</th>
                        <th style="text-align: center">EXPIRED<br/> PERMIT</th>
                        <th style="text-align: center">311 SERV <br/>NOTIF.</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->properties as $property)
                        <tr bgcolor="#d3d3d3">
                            <td style="text-align: center;"> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                            <td style="text-align: center;"> {{$property->dob_violations_count}}</td>
                            <td style="text-align: center"> {{$property->dob_complaints_count}}</td>
                            <td style="text-align: center; border-left:2px solid grey;"> {{$property->oath_hearings_count}}</td>
                            <td style="text-align: center"> {{$property->ecb_violations_count}}</td>
                            <td style="text-align: center">
                                $ {{$property->ecbViolations->sum('penality_imposed')-$property->ecbViolations->sum('amount_paid')}}</td>
                            <td style="text-align: center; border-left:2px solid grey;"> {{$property->hpd_violations_count}}</td>
                            <td style="text-align: center"> {{$property->hpd_complaints_count}}</td>
                            <td style="text-align: center"> {{$property->hpd_repair_vacate_orders_count}}</td>
                            <td style="text-align: center; border-left:2px solid grey;"> {{$property->dob_permits_count}}</td>
                            <td style="text-align: center; border-left:2px solid grey;">{{$property->service_requests311_count}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div> {{--  PROPERTY SUMMARY LIST --}}

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">COMPLAINTS</h1>
    </div> {{--  COMPLAINTS --}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB COMPLAINTS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_complaints_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} DOB Complaints for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Complaint Number</th>
                    <th>Status</th>
                    <th>Date Entered</th>
                    <th>Complaint Code</th>
                    <th>Unit</th>
                    <th>Disposition Code</th>
                    <th>Inspection Date</th>
                </tr>
                </thead>
                <tbody>
                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobComplaints->sortByDesc('date_entered') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}}</td>
                                <td>{{$item->complaint_number}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->dateEntered()}}</td>
                                <td>{{$item->complaintCode->description}}
                                    <br/>(Priority:<b> {{$item->complaintCode->priority}}</b>)
                                </td>
                                <td>{{\App\Helpers\Helper::getFullComplaintUnit($item->unit)}}</td>
                                <td>{{$item->dispositionCode == null ? $item->disposition_code :$item->dispositionCode->description}}</td>
                                <td>{{$item->inspectionDate()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobComplaints->sortByDesc('date_entered') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}}</td>
                                <td>{{$item->complaint_number}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->dateEntered()}}</td>
                                <td>{{$item->complaintCode->description}}
                                    <br/>(Priority:<b> {{$item->complaintCode->priority}}</b>)
                                </td>
                                <td>{{\App\Helpers\Helper::getFullComplaintUnit($item->unit)}}</td>
                                <td>{{$item->dispositionCode == null ? $item->disposition_code :$item->dispositionCode->description}}</td>
                                <td>{{$item->inspectionDate()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        @endif
        {!! $bottomNote !!}
    </div> {{--  DobComplaints --}}
    <div class="newsection" style="text-align: left;">
        <h1>HPD COMPLAINTS</h1>
        <hr>
        @php
            $i = $user->properties->sum('hpd_complaints_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}

        @else
            <h2>HPD Complaints for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Complaint#</th>
                    <th>Building#</th>
                    <th>Apartment</th>
                    <th>Received Date</th>
                    <th>Status</th>
                    <th>Status Date</th>
                </tr>
                </thead>
                <tbody>
                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdComplaints->sortByDesc('statusdate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->complaintid}}</td>
                                <td>{{$item->buildingid}}</td>
                                <td>{{$item->apartment}}</td>
                                <td>{{$item->receivedDate()}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->statusDate()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->hpdComplaints->sortByDesc('statusdate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->complaintid}}</td>
                                <td>{{$item->buildingid}}</td>
                                <td>{{$item->apartment}}</td>
                                <td>{{$item->receivedDate()}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->statusDate()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--  HPD Complaints --}}
    <div class="newsection" style="text-align: left;">
        <h1>LANDMARK COMPLAINTS</h1>
        <hr>
        @php
            $i = $user->properties->sum('landmark_complaints_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>Landmark Complaints for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Date</th>
                    <th>Issued Violation</th>
                    <th>Work Reported</th>
                </tr>
                </thead>
                <tbody>
                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->landmarkComplaints->sortByDesc('date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} @endif{{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->date()}}</td>
                                <td>{{$item->issued_violation}}</td>
                                <td>{{$item->work_reported}}</td>
                            </tr>

                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->landmarkComplaints->sortByDesc('date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->date()}}</td>
                                <td>{{$item->issued_violation}}</td>
                                <td>{{$item->work_reported}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach

                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--  Landmark Complaints --}}
    <div class="newsection" style="text-align: left;">
        <h1>HPD Vacate Orders</h1>
        <hr>
        @php
            $i = $user->properties->sum('hpd_repair_vacate_orders_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} HPD Vacate Orders for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Vacated Units Numbers</th>
                    <th>Actual Rescind Date</th>
                    <th>Vacate Effective Date</th>
                    <th>Primary Vacate Reason</th>
                    <th>Registration #id</th>
                    <th>Vacate Order Number</th>
                    <th>Vacate Type</th>
                </tr>
                </thead>
                <tbody>
                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdRepairVacateOrders->sortByDesc('vacate_effective_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->number_of_vacated_units}}</td>
                                <td>{{$item->actualRescindDate()}}</td>
                                <td>{{$item->vacateEffectiveDate()}}</td>
                                <td>{{$item->primary_vacate_reason}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->ecb_number}}</td>
                                <td>{{$item->vacate_type}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->hpdRepairVacateOrders->sortByDesc('vacate_effective_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->number_of_vacated_units}}</td>
                                <td>{{$item->actualRescindDate()}}</td>
                                <td>{{$item->vacateEffectiveDate()}}</td>
                                <td>{{$item->primary_vacate_reason}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->ecb_number}}</td>
                                <td>{{$item->vacate_type}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--  HPD Vacate Orders  --}}

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">VIOLATIONS</h1>
    </div> {{--  VIOLATIONS --}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB VIOLATIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_violations_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} DOB Violations Type for {{$user->properties->count()}} properties. </h2>
            <div style="width: 100%">
                <div style="float: left;width: 100%">
                    <table class="renklendir" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>Issue Date</th>
                            <th>Violation number</th>
                            <th>Comments</th>
                            <th>Description</th>
                            <th>Number</th>
                            <th>Violation Category</th>
                            <th>Violation TypeXX</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($i<10)
                            @foreach($user->properties as $property)

                                @foreach($property->dobViolations->sortByDesc('issue_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} </td>
                                        <td>{{$item->issueDate()}}</td>
                                        <td>{{$item->violation_number}}</td>
                                        <td>{{$item->disposition_comments}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->violation_category}}</td>
                                        <td>{{$item->violation_type}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)

                                @foreach($property->dobViolations->sortByDesc('issue_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->issueDate()}}</td>
                                        <td>{{$item->violation_number}}</td>
                                        <td>{{$item->disposition_comments}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->violation_category}}</td>
                                        <td>{{$item->violation_type}}</td>
                                    </tr>
                                    @break
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        {!! $bottomNote !!}
        @endif
    </div> {{--  DobViolations --}}
{{--    <div class="newsection" style="text-align: left;">--}}
{{--        {!! $bottomNote !!}--}}
{{--    </div>--}}
    <div class="newsection" style="text-align: left;">
        <h1>ECB VIOLATIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('ecb_violations_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} ECB Violations Type for {{$user->properties->count()}} properties </h2>
            <div style="width: 100%">
                <div style="float: left;width: 100%">
                    <table class="renklendir" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>ECB Violation Number</th>
                            <th>ECB Violation Status</th>
                            <th>Hearing Date</th>
                            <th>Hearing Time</th>
                            <th>Issue Date</th>
                            <th>Respondent Name</th>
                            <th>Violation Type</th>
                            <th>Violation Description</th>
                            <th>Penality Imposed</th>
                            <th>Hearing Status</th>
                            <th>Certification Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($i<10)
                            @foreach($user->properties as $property)
                                @foreach($property->ecbViolations->sortByDesc('hearing_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->ecb_violation_number}}</td>
                                        <td>{{$item->ecb_violation_status}}</td>
                                        <td>{{$item->hearingDate()}}</td>
                                        <td>{{number_format((($item->hearing_time)/100),2)}}</td>
                                        <td>{{$item->issueDate()}}</td>
                                        <td>{{$item->respondent_name}}</td>
                                        <td>{{$item->violation_type}}</td>
                                        <td>{{$item->violation_description}}</td>
                                        <td>${{$item->penality_imposed}}</td>
                                        <td>{{$item->hearing_status}}</td>
                                        <td>{{$item->certification_status}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)
                                @foreach($property->ecbViolations->sortByDesc('hearing_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->ecb_violation_number}}</td>
                                        <td>{{$item->ecb_violation_status}}</td>
                                        <td>{{$item->hearingDate()}}</td>
                                        <td>{{number_format((($item->hearing_time)/100),2)}}</td>
                                        <td>{{$item->issueDate()}}</td>
                                        <td>{{$item->respondent_name}}</td>
                                        <td>{{$item->violation_type}}</td>
                                        <td>{{$item->violation_description}}</td>
                                        <td>${{$item->penality_imposed}}</td>
                                        <td>{{$item->hearing_status}}</td>
                                        <td>{{$item->certification_status}}</td>
                                    </tr>
                                    @break
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div> {{--  ecbViolations --}}
    <div class="newsection" style="text-align: left;">
        {!! $bottomNote !!}
    </div>
    <div class="newsection" style="text-align: left;">
        <h1>HPD VIOLATIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('hpd_violations_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} HPD Violations Type for {{$user->properties->count()}} properties </h2>
            <div style="width: 100%">

                <div style="float: left;width: 100%">
                    <table class="renklendir" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>Violation #</th>
                            <th>Apartment</th>
                            <th>Class</th>
                            <th>Inspection Date</th>
                            <th>Nov Description</th>
                            <th>Nov Issued Date</th>
                            <th>Violation Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($i<10)
                            @foreach($user->properties as $property)
                                @foreach($property->hpdViolations->sortByDesc('novissueddate') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->violationid}}</td>
                                        <td>{{$item->apartment}}</td>
                                        <td>{{$item->class}}</td>
                                        <td>{{$item->inspectiondate()}}</td>
                                        <td>{{$item->novdescription}}</td>
                                        <td>{{$item->novissuedDate()}}</td>
                                        <td>{{$item->violationstatus}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)
                                @foreach($property->hpdViolations->sortByDesc('novissueddate') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->violationid}}</td>
                                        <td>{{$item->apartment}}</td>
                                        <td>{{$item->class}}</td>
                                        <td>{{$item->inspectiondate()}}</td>
                                        <td>{{$item->novdescription}}</td>
                                        <td>{{$item->novissuedDate()}}</td>
                                        <td>{{$item->violationstatus}}</td>
                                    </tr>
                                    @break
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        {!! $bottomNote !!}
        @endif
    </div> {{--  hpdViolations --}}
    <div class="newsection" style="text-align: left;">
    </div>
    <div class="newsection" style="text-align: left;">
        <h1>Landmark VIOLATIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('landmark_violations_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Landmark Violations Type for {{$user->properties->count()}} properties </h2>
            <div style="width: 100%">

                <div style="float: left;width: 100%">
                    <table class="renklendir" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>Violation Date</th>
                            <th>Violation class</th>
                            <th>Rescinded</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($i<10)
                            @foreach($user->properties as $property)
                                @foreach($property->landmarkViolations->sortByDesc('vio_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                        <td>{{$item->vioDate()}}</td>
                                        <td>{{$item->violation_class}}</td>
                                        <td>{{$item->rescinded}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)
                                @foreach($property->landmarkViolations->sortByDesc('vio_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                        <td>{{$item->vioDate()}}</td>
                                        <td>{{$item->violation_class}}</td>
                                        <td>{{$item->rescinded}}</td>
                                    </tr>
                                    @break
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        {!! $bottomNote !!}
        @endif
    </div> {{--  landmarkViolations --}}
    <div class="newsection" style="text-align: left;">
    </div>
    <div class="newsection" style="text-align: left;">
        <h1>FDNY ACTIVE VIOLATIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('fdny_active_viol_orders_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} FDNY Violations Type for {{$user->properties->count()}} properties </h2>
            <div style="width: 100%">

                <div style="float: left;width: 100%">
                    <table class="renklendir" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>Violation #</th>
                            <th>Violation Date</th>
                            <th>Violation Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($i<10)
                            @foreach($user->properties as $property)
                                @foreach($property->fdnyActiveViolOrders->sortByDesc('vio_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                        <td>{{$item->vio_id}}</td>
                                        <td>{{$item->violationDate()}}</td>
                                        <td>{{$item->vio_law_desc}}</td>
                                        <td>{{$item->action}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)
                                @foreach($property->fdnyActiveViolOrders->sortByDesc('vio_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                        <td>{{$item->vio_id}}</td>
                                        <td>{{$item->violationDate()}}</td>
                                        <td>{{$item->vio_law_desc}}</td>
                                        <td>{{$item->action}}</td>
                                    </tr>
                                    @break
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        {!! $bottomNote !!}
        @endif
    </div> {{--  FDNYViolations --}}


    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">FILINGS</h1>
    </div> {{--  Filings --}}
    <div class="newsection" style="text-align: left;">
        <h1>BSA APPLICATION STATUS</h1>
        <hr>
        @php
            $i = $user->properties->sum('bsa_application_status_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} BSA Application Status for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Filed Date</th>
                    <th>Application</th>
                    <th>Calendar Code</th>
                    <th>Current Status</th>
                    <th>Status Date</th>
                </tr>
                </thead>
                <tbody>
                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->bsaApplicationStatus->sortByDesc('date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->filedDate()}}</td>
                                <td>{{$item->application}}</td>
                                <td>{{$item->calendar}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->date()}}</td> {{--Always keep the latest status date row for BSA.--}}
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->bsaApplicationStatus->sortByDesc('date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->filedDate()}}</td>
                                <td>{{$item->application}}</td>
                                <td>{{$item->calendar}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->date()}}</td> {{--Always keep the latest status date row for BSA.--}}
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--  BSA Applicatiıon --}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB NOW JOB FILINGS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_now_job_filings_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>DOB NOW Job Filings for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Filing Number</th>
                    <th>Status</th>
                    <th>Floor</th>
                    <th>Applicant License</th>
                    <th>Applicant First Name</th>
                    <th>Last Name</th>
                </tr>
                </thead>
                <tbody>

                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowJobFilings->sortByDesc('job_filing_number') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_filing_number}}</td>
                                <td>{{$item->filing_status}}</td>
                                <td>{{$item->work_on_floor}}</td>
                                <td>{{$item->applicant_license}}</td>
                                <td>{{$item->applicant_first_name}}</td>
                                <td>{{$item->applicant_last_name}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowJobFilings->sortByDesc('job_filing_number') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_filing_number}}</td>
                                <td>{{$item->filing_status}}</td>
                                <td>{{$item->work_on_floor}}</td>
                                <td>{{$item->applicant_license}}</td>
                                <td>{{$item->applicant_first_name}}</td>
                                <td>{{$item->applicant_last_name}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif

                </tbody>
            </table>

        {!! $bottomNote !!}
        @endif
    </div> {{-- dob Now JobFilings --}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB NOW FACADE FILINGS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_now_facade_filings_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} DOB NOW Facade Filings for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Control No</th>
                    <th>Filing Type</th>
                    <th>Cycle</th>
                    <th>Submitted On</th>
                    <th>Current Status</th>
                    <th>Qewi Name</th>
                </tr>
                </thead>
                <tbody>
                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowFacadeFilings->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->control_no}}</td>
                                <td>{{$item->filing_type}}</td>
                                <td>{{$item->cycle}}</td>
                                <td>{{$item->submitted_on}}</td>
                                <td>{{$item->current_status}}</td>
                                <td>{{$item->qewi_name}}</td>
                            </tr>

                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowFacadeFilings->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->control_no}}</td>
                                <td>{{$item->filing_type}}</td>
                                <td>{{$item->cycle}}</td>
                                <td>{{$item->submitted_on}}</td>
                                <td>{{$item->current_status}}</td>
                                <td>{{$item->qewi_name}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>

        {!! $bottomNote !!}
        @endif
    </div> {{-- dobNowFacadeFilings --}}
    <div class="newsection" style="text-align: left;">
        <h1>There are {{$i}} DOB NOW SAFETY BOILER</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_now_safety_boiler_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>Dob Now Safety Boiler for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Boiler#</th>
                    <th>Report Type</th>
                    <th>Applicant First Name</th>
                    <th>Last Name</th>
                    <th>Applicant License Number</th>
                    <th>Inspection Date</th>
                    <th>Inspection Type</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowSafetyBoiler->sortByDesc('inspection_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->boiler_id}}</td>
                                <td>{{$item->report_type}}</td>
                                <td>{{$item->applicantfirst_name}}</td>
                                <td>{{$item->applicant_last_name}}</td>
                                <td>{{$item->applicant_license_number}}</td>
                                <td>{{\Illuminate\Support\Str::substr($item->inspection_date,0,10)}}</td>
                                <td>{{$item->inspection_type}}</td>
                                <td>{{$item->report_status}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowSafetyBoiler->sortByDesc('inspection_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->boiler_id}}</td>
                                <td>{{$item->report_type}}</td>
                                <td>{{$item->applicantfirst_name}}</td>
                                <td>{{$item->applicant_last_name}}</td>
                                <td>{{$item->applicant_license_number}}</td>
                                <td>{{\Illuminate\Support\Str::substr($item->inspection_date,0,10)}}</td>
                                <td>{{$item->inspection_type}}</td>
                                <td>{{$item->report_status}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{-- dobNowSafetyBoiler --}}
    <div class="newsection" style="text-align: left;">
        <h1>DOT SIDEWALK INSPECTION</h1>
        <hr>
        @php
            $i = $user->properties->sum('dot_sidewalk_inspections_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Dot Sidewalk Inspections for {{$user->properties->count()}} properties </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>SR#</th>
                    <th>Inspection Date</th>
                    <th>Failure Reason</th>
                    <th>Pass Fail</th>
                    <th>Violation</th>
                    <th>Permit(s)</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dotSidewalkInspections->sortByDesc('inspection_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->sr}}</td>
                                <td>{{$item->inspectionDate()}}</td>
                                <td>{{$item->reason_for_failure}}</td>
                                <td>{{$item->pass_fail}}</td>
                                <td>{{$item->violation}}</td>
                                <td>{{$item->permit}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dotSidewalkInspections->sortByDesc('inspection_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->sr}}</td>
                                <td>{{$item->inspectionDate()}}</td>
                                <td>{{$item->reason_for_failure}}</td>
                                <td>{{$item->pass_fail}}</td>
                                <td>{{$item->violation}}</td>
                                <td>{{$item->permit}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{-- dotSidewalkInspections --}}
    <div class="newsection" style="text-align: left;">
        <h1>FDNY INSPECTIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('fdny_inspections_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Bureau of Fire Prevention - Inspections for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Acct Number</th>
                    <th>Owner Name</th>
                    <th>Status</th>
                    <th>Last Full Ins Date</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->fdnyInspections->sortByDesc('acct_id') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->acct_num}}</td>
                                <td>{{$item->owner_name}}</td>
                                <td>{{$item->last_insp_stat}}</td>
                                <td>{{$item->lastFullInspectionDate()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->fdnyInspections->sortByDesc('acct_id') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->acct_num}}</td>
                                <td>{{$item->owner_name}}</td>
                                <td>{{$item->last_insp_stat}}</td>
                                <td>{{$item->lastFullInspectionDate()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{-- FDNYInspections --}}
    <div class="newsection" style="text-align: left;">
        <h1>HPD DWELLING REGISTRATIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('hpd_dwelling_registrations_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Hpd Dwelling Registrations {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Last Registration Date</th>
                    <th>Registration #</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdDwellingRegistrations->sortByDesc('registrationenddate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->lastregistrationDate()}}</td>
                                <td>{{$item->registrationid}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->hpdDwellingRegistrations->sortByDesc('registrationenddate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->lastregistrationDate()}}</td>
                                <td>{{$item->registrationid}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{-- hpdDwellingRegistrations --}}
    <div class="newsection" style="text-align: left;">
        <h1>HPD HOUSING LITIGATIONS</h1>
        <hr>
        @php
            $i = $user->properties->sum('hpd_housing_litigations_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Hpd Housing Litigations for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Litigation #ID</th>
                    <th>Case Status</th>
                    <th>Case Type</th>
                    <th>Caseopen Date</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdHousingLitigations->sortByDesc('caseopendate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->litigationid}}</td>
                                <td>{{$item->casestatus}}</td>
                                <td>{{$item->casetype}}</td>
                                <td>{{$item->caseopenDate()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->hpdHousingLitigations->sortByDesc('caseopendate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->litigationid}}</td>
                                <td>{{$item->casestatus}}</td>
                                <td>{{$item->casetype}}</td>
                                <td>{{$item->caseopenDate()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach

                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{-- hpdHousingLitigations --}}

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">PERMITS</h1>
    </div> {{--  Permits --}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB CERTIFICATE of OCCUPANCY</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_cert_occupancy_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Dob Certificate Occupancy for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Job Number</th>
                    <th>Job Type</th>
                    <th>Issue Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobCertOccupancy->sortByDesc('c_o_issue_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_number}}</td>
                                <td>{{$item->job_type}}</td>
                                <td>{{$item->issuedDate()}}</td>
                                <td>{{$item->application_status_raw}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else            @foreach($user->properties as $property)
                    @foreach($property->dobCertOccupancy->sortByDesc('c_o_issue_date') as $item)
                        <tr>
                            <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                            <td>{{$item->job_number}}</td>
                            <td>{{$item->job_type}}</td>
                            <td>{{$item->issuedDate()}}</td>
                            <td>{{$item->application_status_raw}}</td>
                        </tr>
                        @break
                    @endforeach
                @endforeach

                @endif

                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--dobCertOccupancy--}}
    <div class="newsection" style="text-align: left;">
        <h1>FDNY CERTIFICATE OF FITNESS</h1>
        <hr>
        @php
            $i =$user->properties->sum('fdny_cert_of_fitness_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} FDNY Certificate of Fitness for {{$user->properties->count()}} properties </h2>
            <div style="width: 100%">

                <div style="float: left;width: 100%">
                    <table class="renklendir" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>COF #</th>
                            <th>COF TYPE</th>
                            <th>Holder</th>
                            <th>Expiration</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($i<10)
                            @foreach($user->properties as $property)
                                @foreach($property->fdnyCertOfFitness->sortByDesc('expires_on') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                        <td>{{$item->cof_id}}</td>
                                        <td>{{$item->cof_type}}</td>
                                        <td>{{$item->holder_name}}</td>
                                        <td>{{$item->expireDate()}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)
                                @foreach($property->fdnyCertOfFitness->sortByDesc('expires_on') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                        <td>{{$item->cof_id}}</td>
                                        <td>{{$item->cof_type}}</td>
                                        <td>{{$item->holder_name}}</td>
                                        <td>{{$item->expireDate()}}</td>
                                    </tr>
                                    @break
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        {!! $bottomNote !!}
        @endif
    </div> {{--  FdnyCertOfFitness --}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB PERMITS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_permits_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Dob Permits for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Job #</th>
                    <th>Work Type</th>
                    <th>Issue Date</th>
                    <th>Expire Date</th>
                    <th>Status</th>
                    <th>Filing Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>License</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobPermits->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job__}}</td>
                                <td>{{$item->work_type}}</td>
                                <td>{{$item->issuanceDate()}}</td>
                                <td>{{$item->expirationDate()}}</td>
                                <td>{{$item->permit_status}}</td>
                                <td>{{$item->filingDate()}}</td>
                                <td>{{$item->permittee_s_first_name}}</td>
                                <td>{{$item->permittee_s_last_name}}</td>
                                <td>{{$item->permittee_s_business_name}}</td>
                                <td>{{$item->permittee_s_license__}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobPermits->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job__}}</td>
                                <td>{{$item->work_type}}</td>
                                <td>{{$item->issuanceDate()}}</td>
                                <td>{{$item->expirationDate()}}</td>
                                <td>{{$item->permit_status}}</td>
                                <td>{{$item->filingDate()}}</td>
                                <td>{{$item->permittee_s_first_name}}</td>
                                <td>{{$item->permittee_s_last_name}}</td>
                                <td>{{$item->permittee_s_business_name}}</td>
                                <td>{{$item->permittee_s_license__}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--dobPermits--}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB NOW APPROVED PERMITS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_now_approved_permits_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}}  Dob Now Approved Permits for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Filing Number</th>
                    <th>Work Floor</th>
                    <th>Work Type</th>
                    <th>Permit License</th>
                    <th>Applicant License</th>
                    <th>Issued Date</th>
                </tr>
                </thead>
                <tbody>
                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowApprovedPermits->sortByDesc('issued_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_filing_number}}</td>
                                <td>{{$item->work_on_floor}}</td>
                                <td>{{$item->work_type}}</td>
                                <td>{{$item->permittee_s_license_type}}</td>
                                <td>{{$item->applicant_license}}</td>
                                <td>{{$item->issuedDate()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowApprovedPermits->sortByDesc('issued_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_filing_number}}</td>
                                <td>{{$item->work_on_floor}}</td>
                                <td>{{$item->work_type}}</td>
                                <td>{{$item->permittee_s_license_type}}</td>
                                <td>{{$item->applicant_license}}</td>
                                <td>{{$item->issuedDate()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--dobNowApprovedPermits--}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB NOW ELECTRICAL PERMITS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_now_electrical_permits_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}}  Dob Now Electrical Permits for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Job Number</th>
                    <th>Issue Date</th>
                    <th>Filing Date</th>
                    <th>Status</th>
                    <th>Applicant First Name</th>
                    <th>Last Name</th>
                    <th>License Type</th>
                    <th>License number</th>
                    <th>Company</th>
                </tr>
                </thead>
                <tbody>

                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowElectricalPermits->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_number}}</td>
                                <td>{{$item->permitIssuedDate()}}</td>
                                <td>{{$item->filingDate()}}</td>
                                <td>{{$item->filing_status}}</td>
                                <td>{{$item->applicant_first_name}}</td>
                                <td>{{$item->applicant_last_name}}</td>
                                <td>{{$item->license_type}}</td>
                                <td>{{$item->license_number}}</td>
                                <td>{{$item->firm_name}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowElectricalPermits->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_number}}</td>
                                <td>{{$item->permitIssuedDate()}}</td>
                                <td>{{$item->filingDate()}}</td>
                                <td>{{$item->filing_status}}</td>
                                <td>{{$item->applicant_first_name}}</td>
                                <td>{{$item->applicant_last_name}}</td>
                                <td>{{$item->license_type}}</td>
                                <td>{{$item->license_number}}</td>
                                <td>{{$item->firm_name}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--dobNowElectricalPermits--}}
    <div class="newsection" style="text-align: left;">
        <h1>DOB NOW ELEVATOR PERMITS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dob_now_elevator_permits_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Dob Now Elevator Permits for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Job Number</th>
                    <th>Filing Date</th>
                    <th>Status</th>
                    <th>Permit Date</th>
                    <th>Signed Off Date</th>
                    <th>Applicant First Name</th>
                    <th>Last Name</th>
                    <th>Business Name</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowElevatorPermits->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_number}}</td>
                                <td>{{$item->filingDate()}}</td>
                                <td>{{$item->filing_status}}</td>
                                <td>{{$item->permitEntireDate()}}</td>
                                <td>{{$item->signedOffDate()}}</td>
                                <td>{{$item->applicant_firstname}}</td>
                                <td>{{$item->applicant_lastname}}</td>
                                <td>{{$item->applicant_businessname}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowElevatorPermits->sortByDesc('filing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_number}}</td>
                                <td>{{$item->filingDate()}}</td>
                                <td>{{$item->filing_status}}</td>
                                <td>{{$item->permitEntireDate()}}</td>
                                <td>{{$item->signedOffDate()}}</td>
                                <td>{{$item->applicant_firstname}}</td>
                                <td>{{$item->applicant_lastname}}</td>
                                <td>{{$item->applicant_businessname}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach

                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--dobNowElevatorPermits--}}
    <div class="newsection" style="text-align: left;">
        <h1>DEP CATS PERMITS</h1>
        <hr>
        @php
            $i = $user->properties->sum('dep_cats_permits_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Dep Cats Permits for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Request#</th>
                    <th>Application#</th>
                    <th>Request Type</th>
                    <th>Expire Date</th>
                    <th>Issue Date</th>
                    <th>Current Status</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->depCatsPermits->sortByDesc('issuedate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->requestid}}</td>
                                <td>{{$item->applicationid}}</td>
                                <td>{{$item->requesttype}}</td>
                                <td>{{$item->expirationDate()}}</td>
                                <td>{{$item->issueDate()}}</td>
                                <td>{{$item->status}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->depCatsPermits->sortByDesc('issuedate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->requestid}}</td>
                                <td>{{$item->applicationid}}</td>
                                <td>{{$item->requesttype}}</td>
                                <td>{{$item->expirationDate()}}</td>
                                <td>{{$item->issueDate()}}</td>
                                <td>{{$item->status}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--depCatsPermits--}}
    <div class="newsection" style="text-align: left;">
        <h1>LANDMARK PERMITS</h1>
        <hr>
        @php
            $i = $user->properties->sum('landmark_permits_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Landmark Permits for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Docket</th>
                    <th>Received Date</th>
                    <th>Applicant Name</th>
                    <th>Regulation Type</th>
                    <th>Issue Date</th>
                    <th>Expiration Date</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->landmarkPermits->sortByDesc('docket') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->docket}}</td>
                                <td>{{$item->receivedDate()}}</td>
                                <td>{{$item->applicant_name}}</td>
                                <td>{{$item->regulation_type}}</td>
                                <td>{{$item->issueDate()}}</td>
                                <td>{{$item->expirationDate()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->landmarkPermits->sortByDesc('docket') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->docket}}</td>
                                <td>{{$item->receivedDate()}}</td>
                                <td>{{$item->applicant_name}}</td>
                                <td>{{$item->regulation_type}}</td>
                                <td>{{$item->issueDate()}}</td>
                                <td>{{$item->expirationDate()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--landmarkPermits--}}
    <div class="newsection" style="text-align: left;">
        <h1>DOT SIDEWALK CORRESPONDENCES</h1>
        <hr>
        @php
            $i = $user->properties->sum('dot_sidewalk_correspondences_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Dot Sidewalk Correspondences for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Issue</th>
                    <th>Other Log</th>
                    <th>Received Date</th>
                </tr>
                </thead>
                <tbody>
                @if($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dotSidewalkCorrespondences->sortByDesc('date_received') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->issue}}</td>
                                <td>{{$item->other_log}}</td>
                                <td>{{$item->dateReceived()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dotSidewalkCorrespondences->sortByDesc('date_received') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->issue}}</td>
                                <td>{{$item->other_log}}</td>
                                <td>{{$item->dateReceived()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif

                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--dotSidewalkCorrespondences--}}

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">HEARINGS</h1>
    </div>{{--  Hearings --}}


    {{--    <div class="newsection" style="text-align: left;">--}}
    {{--        <h1>HPD COMPLAINT PROBLEMS</h1>--}}
    {{--        <hr>--}}
    {{--        <h2>HPD Complaint Problems for {{$user->properties->count()}} properties </h2>--}}

    {{--        <table class="renklendir" autosize="1"--}}
    {{--               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"--}}
    {{--               width="100%"--}}
    {{--               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">--}}
    {{--            <thead>--}}
    {{--            <tr>--}}
    {{--                <th>ADDRESS</th>--}}
    {{--                <th>Problem#</th>--}}
    {{--                <th>Complaint#</th>--}}
    {{--                <th>Unit Type</th>--}}
    {{--                <th>Space Type</th>--}}
    {{--                <th>Priority</th>--}}
    {{--                <th>Status</th>--}}
    {{--                <th>Status Date</th>--}}
    {{--            </tr>--}}
    {{--            </thead>--}}
    {{--            <tbody>--}}
    {{--            @foreach($user->properties as $property)--}}
    {{--                @foreach($property->serviceRequests311 as $item)--}}
    {{--                    <tr>--}}
    {{--                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>--}}
    {{--                        <td>{{$item->problemid}}</td>--}}
    {{--                        <td>{{$item->complaintid}}</td>--}}
    {{--                        <td>{{$item->unittype}}</td>--}}
    {{--                        <td>{{$item->spacetype}}</td>--}}
    {{--                        <td>{{$item->type}}</td>--}}
    {{--                        <td>{{$item->status}}</td>--}}
    {{--                        <td>{{$item->statusDate()}}</td>--}}
    {{--                    </tr>--}}
    {{--                @endforeach--}}
    {{--            @endforeach--}}
    {{--            </tbody>--}}
    {{--        </table>--}}
    {{--    </div> --}}{{--hpdComplaintProblems--}}


    <div class="newsection" style="text-align: left;">
        <h1>OATH HEARINGS</h1>
        <hr>
        @php
            $i = $user->properties->sum('oath_hearings_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Oath Hearings for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Ticket Number</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>Respondent First Name</th>
                    <th>Last Name</th>
                    <th>Hearing Status</th>
                    <th>Hearing Result</th>
                    <th>Scheduled Hearing Location</th>
                    <th>Hearing Date</th>
                    <th>Charge 1 Code Description</th>
                </tr>
                </thead>
                <tbody>

                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->oathHearings->sortByDesc('hearing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->respondent_first_name}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->hearing_status}}</td>
                                <td>{{$item->hearing_result}}</td>
                                <td>{{$item->scheduled_hearing_location}}</td>
                                <td>{{$item->hearingDate()}}</td>
                                <td>{{$item->charge_1_code_description}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->oathHearings->sortByDesc('hearing_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->respondent_first_name}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->hearing_status}}</td>
                                <td>{{$item->hearing_result}}</td>
                                <td>{{$item->scheduled_hearing_location}}</td>
                                <td>{{$item->hearingDate()}}</td>
                                <td>{{$item->charge_1_code_description}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--oathHearings--}}
    <div class="newsection" style="text-align: left;">
        <h1>311 SERVICES REQUESTS</h1>
        <hr>
        @php
            $i = $user->properties->sum('service_requests_311_count');
        @endphp
        @if ($i==0)
            {!! $noRecord !!}
        @else
            <h2>There are {{$i}} Service Requests 311 for {{$user->properties->count()}} properties </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Unique Key</th>
                    <th>Created Date</th>
                    <th>Agency</th>
                    <th>Complaint Type</th>
                    <th>Complaint Description</th>
                    <th>Status</th>
                    <th>Resolution Description</th>
                    <th>Resolution Update Date</th>
                </tr>
                </thead>
                <tbody>

                @if ($i<10)
                    @foreach($user->properties as $property)
                        @foreach($property->serviceRequests311->sortByDesc('created_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->unique_key}}</td>
                                <td>{{$item->createdDate()}}</td>
                                <td>{{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}</td>
                                <td>{{$item->complaint_type}}</td>
                                <td>{{$item->descriptor}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->resolution_description}}</td>
                                <td>{{$item->resolutionActionUpdatedDate()}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->serviceRequests311->sortByDesc('created_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->unique_key}}</td>
                                <td>{{$item->createdDate()}}</td>
                                <td>{{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}</td>
                                <td>{{$item->complaint_type}}</td>
                                <td>{{$item->descriptor}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->resolution_description}}</td>
                                <td>{{$item->resolutionActionUpdatedDate()}}</td>
                            </tr>
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        {!! $bottomNote !!}
        @endif
    </div> {{--serviceRequests311--}}


    <div style="margin: 0 30%; border-radius: 50px; width:40%;text-align: center;height: 50px;padding:10px; background:rgba(35,36,35,0.54);">
        <a href="https://calendly.com/proactivebuildingsolutions" target="_blank"
           style="display:block;font-size:16px; text-align:center; font-weight:bold;color:#ffffff; text-decoration:underline;">
            BOOK A CONSULTATION
        </a>
    </div>
</div>


</body>
</html>

