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

        @page {
            header: page-header;
            footer: page-footer;
            margin: 220px 0 150px 0;
            margin-footer: 0;
            margin-header: 0;
            text-align: left !important;
        }

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

        .renklendir {
            border-bottom: 2px solid #000000 !important;
            line-height: 22px;
        }

        .renklendir th {
            padding: 10px 0;
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
    <div class="newsection">
        <div style="text-align: center; padding-top: 22%">
            <img src="{{ asset('images/logos/black.jpg')}}">
        </div>
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
                    @php
                        $propers = \DB::table('property_active_summary')->where('user_id',$user->id)->get();
                        $hpdVC=0;
                        $hpdRVOC=0;
                        $hpdHLC=0;
                        $hpdERC=0;
                        $hpdDRC=0;
                        $hpdCC=0;
                        $fdnyIC=0;
                        $fdnyCOFC=0;
                        $fdnyAVOC=0;
                        $ecbVC=0;
                        $ecbVPC=0;
                        $ecbPC=0;
                        $ecbHC=0;
                        $dotSIC=0;
                        $dotSCC=0;
                        $dobVC=0;
                        $dobPC=0;
                        $dobNSBC=0;
                        $dobNJFC=0;
                        $dobNFFC=0;
                        $dobNEPC=0;
                        $dobNELEVATPC=0;
                        $dobNAPC=0;
                        $dobCOC=0;
                        $dobCC=0;
                        $depCPC=0;
                        $bsaASC=0;
                        $SRC=0;
                        $OHC=0;
                        $LVC=0;
                        $LPC=0;
                        $LCC=0;
                        $toplamproperty=$user->properties->count();

                    @endphp


                    @foreach($propers as $propcount)
                        @php

                            $LCC+=$propcount->landmark_complaints_count;
                            $LPC+=$propcount->landmark_permits_count;
                            $LVC+=$propcount->landmark_violations_count;
                            $depCPC+=$propcount->dep_cats_permits_count;
                            $hpdRVOC+=$propcount->hpd_repair_vacate_orders_count;
                            $fdnyAVOC+=$propcount->fdny_active_viol_orders_count;
                            $fdnyCOFC+=$propcount->fdny_cert_of_fitness_count;
                            $fdnyIC+=$propcount->fdny_inspections_count;
                            $bsaASC+=$propcount->bsa_application_status_count;
                            $dobNJFC+=$propcount->dob_now_job_filings_count;
                            $dobNFFC+=$propcount->dob_now_facade_filings_count;
                            $dobNSBC+=$propcount->dob_now_safety_boiler_count;
                            $dobNAPC+=$propcount->dob_now_approved_permits_count;
                            $dobNEPC+=$propcount->dob_now_electrical_permits_count;
                            $dobNELEVATPC+=$propcount->dob_now_elevator_permits_count;
                            $dobCOC+=$propcount->dob_cert_occupancy_count;
                            $dobPC+=$propcount->dob_permits_count;
                            $dotSIC+=$propcount->dot_sidewalk_inspections_count;
                            $dotSCC+=$propcount->dot_sidewalk_correspondences_count;
                            $hpdDRC+=$propcount->hpd_dwelling_registrations_count;
                            $hpdHLC+=$propcount->hpd_housing_litigations_count;
                            $OHC+=$propcount->oath_hearings_count;
                            $SRC+=$propcount->service_requests311_count;
                            $hpdERC+=$propcount->hpd_emergency_repairs_count;
                            $hpdCC+=$propcount->hpd_complaints_count;
                            $hpdVC+=$propcount->hpd_violations_count;
                            $ecbVPC+=$propcount->ecb_violations_penality;
                            $ecbVC+=$propcount->ecb_violations_count;
                            $ecbHC+=$propcount->ecb_hearings_count;
                            $dobCC+=$propcount->dob_complaints_count;
                            $dobVC+=$propcount->dob_violations_count;


                        @endphp
                        <tr>
                            <td>@php $adresim=$propcount->house_number.'&nbsp;'.$propcount->stname.'&nbsp;'.\App\Helpers\Helper::getBoroAbbr($propcount->boro);
                                echo substr($adresim, 0, 16);
                                @endphp</td>
                            <td>
                                {{$propcount->dob_violations_count}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                {{$propcount->dob_complaints_count}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                {{$propcount->ecb_hearings_count}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                {{$propcount->ecb_violations_count}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                ${{$propcount->ecb_violations_penality}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                {{$propcount->hpd_violations_count}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                {{$propcount->hpd_complaints_count}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                {{$propcount->hpd_emergency_repairs_count}}
                                <i class="fas fa-search"></i></td>
                            <td>
                                {{$propcount->service_requests311_count}}
                                <i class="fas fa-search"></i></td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>{{$dobVC}}</th>
                        <th>{{$dobCC}}</th>
                        <th>{{$ecbHC}}</th>
                        <th>{{$ecbVC}}</th>
                        <th>${{$ecbVPC}}</th>
                        <th>{{$hpdVC}}</th>
                        <th>{{$hpdCC}}</th>
                        <th>{{$hpdERC}}</th>
                        <th>{{$SRC}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div> {{--  PROPERTY SUMMARY LIST --}}

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">COMPLAINTS</h1>
    </div> {{--  COMPLAINTS --}}
    {{--                        PROPERTY SUMARY--}}
    @if ($dobCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB COMPLAINTS</h1>
            <hr>
            <h2>There are {{$dobCC}} DOB Complaints for {{$toplamproperty}} properties </h2>

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
                @if ($dobCC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobComplaints as $item)
                            @if(!Str::contains($item->complaintCode->description, 'ORDER') && $item->status === "ACTIVE")
                                <tr>
                                    <td>{{$property->house_number}} {{$property->stname}}</td>
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
                            @endif
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobComplaints as $item)
                            @if(!Str::contains($item->complaintCode->description, 'ORDER'))
                                <tr>
                                    <td>{{$property->house_number}} {{$property->stname}}</td>
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
                            @endif
                            @break
                        @endforeach
                    @endforeach
                @endif
                </tbody>
            </table>
        </div> {{--  DobComplaints --}}
    @endif
    @if ($hpdCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD COMPLAINTS</h1>
            <hr>
            <h2>There are {{$hpdCC}} HPD Complaints for {{$toplamproperty}} properties </h2>

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
                @if ($hpdCC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdComplaints()->summary()->get()->sortByDesc('statusdate') as $item)
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
                        @foreach($property->hpdComplaints()->summary()->get()->sortByDesc('statusdate') as $item)
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
        </div> {{--  HPD Complaints --}}
    @endif
    @if ($LCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>LANDMARK COMPLAINTS</h1>
            <hr>
            <h2>Landmark Complaints for {{$toplamproperty}} properties </h2>

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
                @if ($LCC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->landmarkComplaints()->summary()->get()->sortByDesc('date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->date()}}</td>
                                <td>{{$item->issued_violation}}</td>
                                <td>{{$item->work_reported}}</td>
                            </tr>

                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->landmarkComplaints()->summary()->get()->sortByDesc('date') as $item)
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
        </div> {{--  Landmark Complaints --}}
    @endif
    @if ($hpdRVOC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD Vacate Orders</h1>
            <hr>
            <h2>There are {{$hpdRVOC}} HPD Vacate Orders for {{$toplamproperty}} properties </h2>

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
                @if ($hpdRVOC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdRepairVacateOrders()->summary()->get()->sortByDesc('vacate_effective_date') as $item)
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
                        @foreach($property->hpdRepairVacateOrders()->summary()->get()->sortByDesc('vacate_effective_date') as $item)
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
        </div> {{--  HPD Vacate Orders  --}}
    @endif

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">VIOLATIONS</h1>
    </div> {{--  VIOLATIONS --}}
    @if ($dobVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB VIOLATIONS</h1>
            <hr>
            <h2>There are {{$dobVC}} DOB Violations Type for {{$toplamproperty}} properties. </h2>
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
                            <th>Comments</th>
                            <th>Description</th>
                            <th>Number</th>
                            <th>Violation TypeXX</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($dobVC<10)
                            @foreach($user->properties as $property)

                                @foreach($property->dobViolations()->summary()->get()->sortByDesc('issue_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} </td>
                                        <td>{{$item->issueDate()}}</td>
                                        <td>
                                            @php
                                                if(strlen($item->disposition_comments)>16) echo substr($item->disposition_comments,0,16).'..';
                                                else echo $item->disposition_comments;
                                            @endphp
                                        </td>
                                        <td>@php if (strlen($item->description)>16) echo substr($item->description, 0, 16).'...';
                                            else echo $item->description;
                                            @endphp</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->violation_type}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)

                                @foreach($property->dobViolations()->summary()->get()->sortByDesc('issue_date') as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->issueDate()}}</td>
                                        <td>
                                            @php
                                                if(strlen($item->disposition_comments)>16) echo substr($item->disposition_comments,0,16).'..';
                                                else echo $item->disposition_comments;
                                            @endphp
                                        </td>
                                        <td>@php if (strlen($item->description)>16) echo substr($item->description, 0, 16).'...';
                                            else echo $item->description;
                                            @endphp</td>
                                        <td>{{$item->number}}</td>
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
        </div> {{--  DobViolations --}}
    @endif
    @if ($ecbVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB VIOLATIONS</h1>
            <hr>
            <h2>There are {{$ecbVC}} ECB Violations Type for {{$toplamproperty}} properties </h2>
            <div style="width: 100%">
                <div style="float: left;width: 100%">
                    <table class="renklendir" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>Hearing Date</th>
                            <th>Respondent</th>
                            <th>Viol Type</th>
                            <th>Penality Imposed</th>
                            <th>Balance</th>
                            <th>Hearing</th>
                            <th>ECB Viol. Status</th>
                            <th>Certification Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($ecbVC<10)
                            @foreach($user->properties as $property)
                                @foreach($property->ecbViolations as $item)
                                    @if($item->ecb_violation_status==='ACTIVE')
                                        <tr>
                                            <td> {{$property->house_number}} {{$property->stname}}</td>
                                            <td>{{$item->hearingDate()}}</td>
                                            <td>{{$item->respondent_name}}</td>
                                            <td>{{$item->violation_type}}</td>
                                            <td>${{$item->penality_imposed}}</td>
                                            <td>${{$item->balance_due}}</td>
                                            <td>{{$item->hearing_status}}</td>
                                            <td>{{$item->ecb_violation_status}}</td>
                                            <td>{{$item->certification_status}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            @foreach($user->properties as $property)
                                @foreach($property->ecbViolations as $item)
                                    @if($item->ecb_violation_status==='ACTIVE')
                                        <tr>
                                            <td> {{$property->house_number}} {{$property->stname}}</td>
                                            <td>{{$item->hearingDate()}}</td>
                                            <td>{{$item->respondent_name}}</td>
                                            <td>{{$item->violation_type}}</td>
                                            <td>${{$item->penality_imposed}}</td>
                                            <td>${{$item->balance_due}}</td>
                                            <td>{{$item->hearing_status}}</td>
                                            <td>{{$item->ecb_violation_status}}</td>
                                            <td>{{$item->certification_status}}</td>
                                        </tr>
                                        @break
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div> {{--  ecbViolations --}}
    @endif
    @if ($hpdVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD VIOLATIONS</h1>
            <hr>
            <h2>There are {{$hpdVC}} HPD Violations Type for {{$toplamproperty}} properties </h2>
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
                        @if ($hpdVC<10)
                            @foreach($user->properties as $property)
                                @foreach($property->hpdViolations()->summary()->get()->sortByDesc('novissueddate') as $item)
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
                                @foreach($property->hpdViolations()->summary()->get()->sortByDesc('novissueddate') as $item)
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
        </div> {{--  hpdViolations --}}
    @endif
    @if ($LVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>Landmark VIOLATIONS</h1>
            <hr>
            <h2>There are {{$LVC}} Landmark Violations Type for {{$toplamproperty}} properties </h2>
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
                        @if($LVC<10)
                            @foreach($user->properties as $property)
                                @foreach($property->landmarkViolations()->summary()->get()->sortByDesc('vio_date') as $item)
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
                                @foreach($property->landmarkViolations()->summary()->get()->sortByDesc('vio_date') as $item)
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
        </div> {{--  landmarkViolations --}}
    @endif
    @if ($fdnyAVOC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY ACTIVE VIOLATIONS</h1>
            <hr>
            <h2>There are {{$fdnyAVOC}} FDNY Violations Type for {{$toplamproperty}} properties </h2>
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
                        @if ($fdnyAVOC<10)
                            @foreach($user->properties as $property)
                                @foreach($property->fdnyActiveViolOrders()->summary()->get()->sortByDesc('vio_date') as $item)
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
                                @foreach($property->fdnyActiveViolOrders()->summary()->get()->sortByDesc('vio_date') as $item)
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
        </div> {{--  FDNYViolations --}}
    @endif


    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">FILINGS</h1>
    </div> {{--  Filings --}}
    @if ($bsaASC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>BSA APPLICATION STATUS</h1>
            <hr>
            <h2>There are {{$bsaASC}} BSA Application Status for {{$toplamproperty}} properties </h2>

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
                @if ($bsaASC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->bsaApplicationStatus()->summary()->get()->sortByDesc('date') as $item)
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
                        @foreach($property->bsaApplicationStatus()->summary()->get()->sortByDesc('date') as $item)
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
        </div> {{--  BSA Applicatiıon --}}
    @endif
    @if ($dobNJFC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW JOB FILINGS</h1>
            <hr>
            <h2>DOB NOW Job Filings for {{$toplamproperty}} properties </h2>

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

                @if ($dobNJFC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowJobFilings()->summary()->get()->sortByDesc('job_filing_number') as $item)
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
                        @foreach($property->dobNowJobFilings()->summary()->get()->sortByDesc('job_filing_number') as $item)
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
        </div> {{-- dob Now JobFilings --}}
    @endif
    @if ($dobNFFC==0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW FACADE FILINGS</h1>
            <hr>
            <h2>There are {{$dobNFFC}} DOB NOW Facade Filings for {{$toplamproperty}} properties </h2>

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
                @if ($dobNFFC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowFacadeFilings()->summary()->get()->sortByDesc('filing_date') as $item)
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
                        @foreach($property->dobNowFacadeFilings()->summary()->get()->sortByDesc('filing_date') as $item)


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
        </div> {{-- dobNowFacadeFilings --}}
    @endif
    @if ($dobNSBC==0)
        <div class="newsection" style="text-align: left;">
            <h1> DOB NOW SAFETY BOILER</h1>
            <hr>
            <h2>There are {{$dobNSBC}} Dob Now Safety Boiler for {{$toplamproperty}} properties </h2>

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
                @if($dobNSBC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowSafetyBoiler()->summary()->get()->sortByDesc('inspection_date') as $item)
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
                        @foreach($property->dobNowSafetyBoiler()->summary()->get()->sortByDesc('inspection_date') as $item)
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
        </div> {{-- dobNowSafetyBoiler --}}
    @endif
    @if ($dotSIC==0)
        <div class="newsection" style="text-align: left;">
            <h1>DOT SIDEWALK INSPECTION</h1>
            <hr>
            <h2>There are {{$dotSIC}} Dot Sidewalk Inspections for {{$toplamproperty}} properties </h2>
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
                @if($dotSIC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dotSidewalkInspections()->summary()->get()->sortByDesc('inspection_date') as $item)
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
                        @foreach($property->dotSidewalkInspections()->summary()->get()->sortByDesc('inspection_date') as $item)
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
        </div> {{-- dotSidewalkInspections --}}
    @endif
    @if ($fdnyIC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY INSPECTIONS</h1>
            <hr>
            <h2>There are {{$fdnyIC}} Bureau of Fire Prevention - Inspections for {{$toplamproperty}}
                properties </h2>

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
                @if($fdnyIC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->fdnyInspections()->summary()->get()->sortByDesc('acct_id') as $item)
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
                        @foreach($property->fdnyInspections()->summary()->get()->sortByDesc('acct_id') as $item)
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
        </div> {{-- FDNYInspections --}}
    @endif
    @if ($hpdDRC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD DWELLING REGISTRATIONS</h1>
            <hr>
            <h2>There are {{$hpdDRC}} Hpd Dwelling Registrations {{$toplamproperty}} properties </h2>

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
                @if($hpdDRC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdDwellingRegistrations()->summary()->get()->sortByDesc('registrationenddate') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->lastregistrationDate()}}</td>
                                <td>{{$item->registrationid}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->hpdDwellingRegistrations()->summary()->get()->sortByDesc('registrationenddate') as $item)
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
        </div> {{-- hpdDwellingRegistrations --}}
    @endif
    @if ($hpdHLC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD HOUSING LITIGATIONS</h1>
            <hr>
            <h2>There are {{$hpdHLC}} Hpd Housing Litigations for {{$toplamproperty}} properties </h2>

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
                @if($hpdHLC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->hpdHousingLitigations()->summary()->get()->sortByDesc('caseopendate') as $item)
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
                        @foreach($property->hpdHousingLitigations()->summary()->get()->sortByDesc('caseopendate') as $item)
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
        </div> {{-- hpdHousingLitigations --}}
    @endif

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">PERMITS</h1>
    </div> {{--  Permits --}}
    @if ($dobCOC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB CERTIFICATES of OCCUPANCY</h1>
            <hr>
            <h2>There are {{$dobCOC}} Dob Certificate Occupancy for {{$toplamproperty}} properties </h2>

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
                @if($dobCOC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobCertOccupancy()->summary()->get()->sortByDesc('c_o_issue_date') as $item)
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                <td>{{$item->job_number}}</td>
                                <td>{{$item->job_type}}</td>
                                <td>{{$item->issuedDate()}}</td>
                                <td>{{$item->application_status_raw}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    @foreach($user->properties as $property)
                        @foreach($property->dobCertOccupancy()->summary()->get()->sortByDesc('c_o_issue_date') as $item)
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
        </div> {{--dobCertOccupancy--}}
    @endif
    @if ($fdnyCOFC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY CERTIFICATES OF FITNESS</h1>
            <hr>
            <h2>There are {{$fdnyCOFC}} FDNY Certificates of Fitness for {{$toplamproperty}} properties </h2>
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
                        @if($fdnyCOFC<10)
                            @foreach($user->properties as $property)
                                @foreach($property->fdnyCertOfFitness()->summary()->get()->sortByDesc('expires_on') as $item)
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
                                @foreach($property->fdnyCertOfFitness()->summary()->get()->sortByDesc('expires_on') as $item)
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
        </div> {{--  FdnyCertOfFitness --}}
    @endif
    @if ($dobPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB PERMITS</h1>
            <hr>
            <h2>There are {{$dobPC}} Dob Permits for {{$toplamproperty}} properties </h2>

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
                @if($dobPC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobPermits()->summary()->get()->sortByDesc('filing_date') as $item)
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
                        @foreach($property->dobPermits()->summary()->get()->sortByDesc('filing_date') as $item)
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
        </div> {{--dobPermits--}}
    @endif
    @if ($dobNAPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW APPROVED PERMITS</h1>
            <hr>
            {!! $noRecord !!}
            @else
                <h2>There are {{$dobNAPC}} Dob Now Approved Permits for {{$toplamproperty}} properties </h2>

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
                    @if ($dobNAPC<10)
                        @foreach($user->properties as $property)
                            @foreach($property->dobNowApprovedPermits()->summary()->get()->sortByDesc('issued_date') as $item)
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
                            @foreach($property->dobNowApprovedPermits()->summary()->get()->sortByDesc('issued_date') as $item)
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
        </div> {{--dobNowApprovedPermits--}}
    @endif
    @if ($dobNEPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW ELECTRICAL PERMITS</h1>
            <hr>
            <h2>There are {{$dobNEPC}} Dob Now Electrical Permits for {{$toplamproperty}} properties </h2>

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

                @if ($dobNEPC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowElectricalPermits()->summary()->get()->sortByDesc('filing_date') as $item)
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
                        @foreach($property->dobNowElectricalPermits()->summary()->get()->sortByDesc('filing_date') as $item)
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
        </div> {{--dobNowElectricalPermits--}}
    @endif
    @if ($dobNELEVATPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW ELEVATOR PERMITS</h1>
            <hr>
            <h2>There are {{$dobNELEVATPC}} Dob Now Elevator Permits for {{$toplamproperty}}
                properties </h2>

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
                @if($dobNELEVATPC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->dobNowElevatorPermits()->summary()->get()->sortByDesc('filing_date') as $item)
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
                        @foreach($property->dobNowElevatorPermits()->summary()->get()->sortByDesc('filing_date') as $item)
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
        </div> {{--dobNowElevatorPermits--}}
    @endif
    @if ($depCPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DEP CATS PERMITS</h1>
            <hr>
            {!! $noRecord !!}
            @else
                <h2>There are {{$depCPC}} Dep Cats Permits for {{$toplamproperty}} properties </h2>

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
                    @if($depCPC<10)
                        @foreach($user->properties as $property)
                            @foreach($property->depCatsPermits()->summary()->get()->sortByDesc('issuedate') as $item)
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
                            @foreach($property->depCatsPermits()->summary()->get()->sortByDesc('issuedate') as $item)
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
        </div> {{--depCatsPermits--}}
    @endif
    @if ($LPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>LANDMARK PERMITS</h1>
            <hr>
            <h2>There are {{$LPC}} Landmark Permits for {{$toplamproperty}} properties </h2>

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
                @if($LPC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->landmarkPermits()->summary()->get()->sortByDesc('docket') as $item)
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
                        @foreach($property->landmarkPermits()->summary()->get()->sortByDesc('docket') as $item)
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
        </div> {{--landmarkPermits--}}
    @endif
    @if ($dotSCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOT SIDEWALK CORRESPONDENCES</h1>
            <hr>
            {!! $noRecord !!}
            @else
                <h2>There are {{$dotSCC}} Dot Sidewalk Correspondences for {{$toplamproperty}} properties </h2>

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
                    @if($dotSCC<10)
                        @foreach($user->properties as $property)
                            @foreach($property->dotSidewalkCorrespondences()->summary()->get()->sortByDesc('date_received') as $item)
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
                            @foreach($property->dotSidewalkCorrespondences()->summary()->get()->sortByDesc('date_received') as $item)
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
        </div> {{--dotSidewalkCorrespondences--}}
    @endif

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 50%; text-align: center">HEARINGS</h1>
    </div>{{--  Hearings --}}


    @if ($OHC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>OATH HEARINGS</h1>
            <hr>
            <h2>There are {{$OHC}} Oath Hearings for {{$toplamproperty}} properties </h2>

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

                @if ($OHC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->oathHearings()->summary()->get()->sortByDesc('hearing_date') as $item)
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
                        @foreach($property->oathHearings()->summary()->get()->sortByDesc('hearing_date') as $item)
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
        </div> {{--oathHearings--}}
    @endif
    @if ($SRC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>311 SERVICES REQUESTS</h1>
            <hr>
            <h2>There are {{$SRC}} Service Requests 311 for {{$toplamproperty}} properties </h2>

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

                @if ($SRC<10)
                    @foreach($user->properties as $property)
                        @foreach($property->serviceRequests311()->summary()->get()->sortByDesc('created_date') as $item)
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
                        @foreach($property->serviceRequests311()->summary()->get()->sortByDesc('created_date') as $item)
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
        </div> {{--serviceRequests311--}}
    @endif


    <div style="margin: 0 30%; border-radius: 50px; width:40%;text-align: center;height: 50px;padding:10px; background:rgba(35,36,35,0.54);">
        <a href="https://calendly.com/proactivebuildingsolutions" target="_blank"
           style="display:block;font-size:16px; text-align:center; font-weight:bold;color:#ffffff; text-decoration:underline;">
            BOOK A CONSULTATION
        </a>
    </div>
</div>


</body>
</html>
