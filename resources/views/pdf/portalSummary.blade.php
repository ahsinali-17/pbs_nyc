<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<![endif]-->
    <title>Property Summary Report</title>

    <style type="text/css">

        .newsection {
            page-break-before: always;
            page-break-after: avoid;
        }

        @page {
            header: page-header;
            footer: page-footer;
            margin: 220px 0 150px 0;
            margin-footer: 0;
            margin-header: 0;
            text-align: left !important;
        }


        body {
            margin: 0;
            font-family: 'Roboto', sans-serif !important;

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

    </style>

</head>
<body>
{{--@php--}}
{{--    $bottomNote='<span><i>This report shows a part of the records.As: If you have more than 10 buildings,it will show one record for each building. If you have fewer than 10 buildings, the last ten data information will be shown.You can see all of the information by <a href="https://pbs.nyc/portal/">using our member portal system</a></i></span>';--}}
{{--    $noRecord='<div style="margin-top:15%; border-radius: 50px; width:100%;text-align: center;height: 75px;;"><span style="padding-top: 20px"> <i>*There is no record in the database.</i></span></div>'--}}
{{--@endphp--}}

<div style="margin: 0 40px;">
    <div class="newsection">
        <div style="text-align: center; padding-top: 3%">
            <img width="70%" src="{{asset('images/summary/report.png')}}">
        </div>
        <h1 style="padding-top: 5%; text-align: center">SUMMARY REPORT</h1>
        <h2 style="padding-top: 5%; text-align: center">Dear {{$user->name}}</h2>
        <h4 style="padding-top: 20%; text-align: center;"> Below is a summary report generated
            on {{now()->format('Y-m-d')}}. <br/></h4>
        <div style="padding-top: 1%; text-align: center;">
            <p>You can simply reply to this email or book a consultation for further assistance.</p>
            <div style="margin: 0 30%; border-radius: 50px; width:40%;text-align: center;height: 50px;padding:10px; background:rgba(35,36,35,0.54);">
                <a href="https://pbs.nyc/calender" target="_blank"
                   style="display:block;font-size:16px; text-align:center; font-weight:bold;color:#ffffff; text-decoration:underline;">
                    BOOK A CONSULTATION
                </a>
            </div>
        </div>
    </div> {{--  First Page --}}
    <div class="newsection" style="text-align: left;">

        <h1>PROPERTY OVERVIEW</h1>
        <hr>
        <p style="color: darkred">This summary report covers the following {{$user->properties->count()}}
            properties:</p> <br/><br/>

        <table class="renklendir" autosize="1"
               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
               width="100%"
               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
            <thead>
            <tr>

                <th>Address</th>
                <th>DOB<br/>VIOL.</th>
                <th>DOB<br/>COMP.</th>
                <th>ECB<br/>HEAR.</th>
                <th>ECB<br/>VIOL.</th>
                <th>ECB<br/>PENA.</th>
                <th>HPD<br/>VIOL.</th>
                <th>HPD<br/>COMP.</th>
                <th>HPD<br/>REPA.</th>
                <th>311<br/>SER.</th>
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
                $dobSWVO=0;
                $overpaid=0;
                $ecbpenalty=0;
                $ecbdefaulted=0;
                $ecbimposed=0;
                $ecbcorrections=0;
                $ecbcomplaints=0;
                $fdnycorrections=0;
                $fdnyhearings=0;
                $fdnypenalty=0;
                $fdnyactive=0;
                $fdnycomplaints=0;
                $toplamproperty=$user->properties->count();

            @endphp

            @foreach($user->properties as $property)
                @foreach($property->dobComplaints as $dobswvo)
                    @php
                        if($dobswvo->complaintCode!=null && Str::contains($dobswvo->complaintCode->description, 'ORDER') && $dobswvo->status === "ACTIVE")
                        $dobSWVO++;
                    @endphp
                @endforeach
                @foreach($property->dobPermits()->summary()->get()->sortByDesc('filing_date') as $item)
                    @php $dobPC++; @endphp
                @endforeach
                @foreach($property->oathHearings()->where('hearing_result','<>','DISMISSED')->get() as $item)
                    @if(!( $item->hearing_status === 'HEARING COMPLETED'
                             || $item->hearing_status === 'WRITTEN OFF'
                             || $item->hearing_status ==='STAYED'
                             || ($item->ecbViolation != null ? Str::contains($item->ecbViolation->certification_status,'ACCEPTED') : false)
                             || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'DEPARTMENT OF SANITATION' && $item->hearing_status === 'PAID IN FULL')
                             || ((\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === '' || \App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === null) && $item->hearing_status === 'PAID IN FULL')
                             || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'ASBESTOS CONTROL PROGRAM' && $item->hearing_status === 'PAID IN FULL' && $item->hearing_result === 'STIPULATED')
                             || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'FIRE DEPARTMENT' && $item->hearing_status === 'PAID IN FULL' && $item->hearing_result === 'STIPULATED')))

                        @if(Str::contains(\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency),'FIRE'))

                            @php $fdnycorrections++; @endphp
                        @endif
                        @php $ecbcorrections++; @endphp
                    @endif
                @endforeach
                @foreach($property->oathHearings()->imposed()->get() as $item)
                    @if($item->compliance_status !== null && $item->compliance_status !== '' && $item->compliance_status!== 'All Terms Met' )

                        @php $ecbimposed++; @endphp
                    @endif
                @endforeach

                @foreach($property->oathHearings as $item)
                    @if(intval($item->balance_due)<0)
                        @php $overpaid++; @endphp
                    @endif

                    @if(Str::contains($item->compliance_status, 'Due') || Str::contains($item->compliance_status, 'DUE') || Str::contains($item->compliance_status, 'due'))
                        @php $ecbpenalty++; @endphp
                    @endif

                    @if(!Str::contains($item->compliance_status, 'MET') && Str::contains(Str::upper($item->hearing_result),'DEFAULTED'))
                        @php $ecbdefaulted++; @endphp
                    @endif


                    {{--                    @if(--}}


                    {{--    Str::contains(\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency), 'FIRE') && ((!Str::contains($item->hearing_result, 'WRITTEN') && !Str::contains($item->hearing_result, 'COMPLETED')) || (!Str::contains($item->hearing_result, 'WRITTEN') && !Str::contains($item->hearing_result, 'COMPLETED'))))--}}
                    {{--                        @php $fdnyhearings++; @endphp--}}

                    {{--                    @endif--}}
                    @if((Str::contains($item->compliance_status, 'Due') || Str::contains($item->compliance_status, 'DUE') || Str::contains($item->compliance_status, 'due'))&& Str::contains(\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency), 'FIRE'))
                        @php $fdnypenalty++; @endphp
                    @endif
                @endforeach
                @foreach($property->fdnyActiveViolOrders as $item)
                    @php $fdnyactive++; @endphp
                @endforeach

                @foreach($property->dobNowElevatorPermits()->summary()->get()->sortByDesc('filing_date') as $item)
                    @php $dobNELEVATPC++; @endphp
                @endforeach
                @php $ecbcomplaints+=$property->serviceRequests311()->where('status','not like','%Closed%')->where('status','not like','%Assigned%')->count(); @endphp
                @php $fdnycomplaints+=$property->serviceRequests311()->where('status','not like','%Closed%')->where('status','not like','%Assigned%')->where('agency','like','%FDNY%')->count(); @endphp
                @foreach($property->serviceRequests311()->closed()->get()->sortByDesc('created_date') as $item)
                    @php $SRC++; @endphp
                @endforeach
            @endforeach


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
                    $dobCOC+=$propcount->dob_cert_occupancy_count;
                    $dotSIC+=$propcount->dot_sidewalk_inspections_count;
                    $dotSCC+=$propcount->dot_sidewalk_correspondences_count;
                    $hpdDRC+=$propcount->hpd_dwelling_registrations_count;
                    $hpdHLC+=$propcount->hpd_housing_litigations_count;
                    $OHC+=$propcount->oath_hearings_count;
                    $hpdERC+=$propcount->hpd_emergency_repairs_count;
                    $hpdCC+=$propcount->hpd_complaints_count;
                    $hpdVC+=$propcount->hpd_violations_count;
                    $ecbVPC+=$propcount->ecb_violations_penality;
                    $ecbVC+=$propcount->ecb_violations_count;
                    $ecbHC+=$propcount->ecb_hearings_count;
                    $dobCC+=$propcount->dob_complaints_count;
                    $dobVC+=$propcount->dob_violations_count;
                    $fdnyhearings+=$propcount->fdny_hearings_count;
                @endphp
                <tr>
                    <td>{{Str::limit($propcount->house_number.' '.$propcount->stname.' '.\App\Helpers\Helper::getBoroAbbr($propcount->boro),22)}}</td>

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
            @php $dobCC-=$dobSWVO;
            @endphp
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

    </div> {{--  PROPERTY SUMMARY LIST --}}

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 40%; text-align: center"><img
                    src="{{asset('images/summary/iconDOBbw-100.png')}}"><br/><br/>DEPARTMENT
            OF BUILDINGS</h1>
    </div> {{--  DOB --}}
    {{--                        PROPERTY SUMARY--}}
    @if ($dobCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB COMPLAINTS</h1>
            <hr>
            <h2>There are a total of {{$dobCC}} DOB Complaints for: </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->dobComplaints as $item)
                        @if($item->complaintCode != null && !Str::contains($item->complaintCode->description, 'ORDER') && $item->status === "ACTIVE")
                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
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
                            @if ($dobCC>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  DobComplaints --}}
    @if ($dobSWVO!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB Stop Work/Vacate Orders</h1>
            <hr>
            <h2>There are a total of {{$dobSWVO}} DOB Stop Work/Vacate Orders: </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->dobComplaints as $item)
                        @if($item->complaintCode != null && Str::contains($item->complaintCode->description, 'ORDER') )
                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
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
                            @if ($dobSWVO>11)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  DOB Stop Work/Vacate Orders --}}
    @if ($dobVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB VIOLATIONS</h1>
            <hr>
            <h2>There are a total of {{$dobVC}} DOB Violations: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid; page-break-after: always; margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Issue Date</th>
                    <th>Comments</th>
                    <th>Description</th>
                    <th>Number</th>
                    <th>Violation Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->dobViolations()->summary()->get()->sortByDesc('issue_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->issueDate()}}</td>
                            <td>{{Str::limit($item->disposition_comments,16)}}</td>
                            <td>{{Str::limit($item->description,16)}}</td>
                            <td>{{$item->number}}</td>
                            <td>{{$item->violation_type}}</td>
                        </tr>
                        @if ($dobVC>10)
                            {{--                                    @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  DobViolations --}}
    <div class="newsection" style="text-align: left;">

        <h1 style="padding-top: 40%; text-align: center"><img
                    src="{{asset('images/summary/iconECB-100.png')}}"><br/><br/>ENVIROMENTAL
            CONTROL BOARD</h1>
    </div> {{--  Environmental Control Board --}}
    @if ($ecbHC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB HEARINGS</h1>
            <hr>
            <h2>There are a total of {{$ecbHC}} ECB Hearings: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>Respondent Name</th>
                    <th>Hearing Status</th>
                    <th>Hearing Result</th>
                    {{--                    <th>Scheduled Hearing Location</th>--}}
                    <th>Hearing Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->oathHearings as $item)
                        @if(!(($item->hearing_result != null
                        && ($item->hearing_result === 'HEARING COMPLETED'
                        ||$item->hearing_result === 'WRITTEN OFF'))
                                        || ($item->hearing_status != null && $item->hearing_status === 'WRITTEN OFF')
                                        || (($item->hearing_status === 'HEARING COMPLETED' || $item->hearing_status === 'STAYED' || $item->hearing_status === 'DEFAULTED' ||
                                         $item->hearing_status === 'DOCKETED' || $item->hearing_status === 'PAID IN FULL' || $item->hearing_status === 'APPEAL DECIS RENDERD' ||
                                         $item->hearing_result === 'STIPULATD' || Str::contains($item->hearing_result,"DEFAULT") || ($item->hearing_result === 'IN VIOLATION' && $item->hearing_status === 'PAID IN FULL')) &&
                                         Carbon\Carbon::parse($item->hearing_date) < now()->addDays(-90))
                             ))

                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{$item->issuing_agency}}</td>
                                <td>{{Str::limit(trim($item->respondent_first_name . ' ' . $item->respondent_last_name),12)}}</td>
                                <td>{{$item->hearing_status}}</td>
                                <td>{{$item->hearing_result}}</td>
                                {{--                            <td>{{$item->scheduled_hearing_location}}</td>--}}
                                <td>{{$item->hearingDate()}}</td>
                            </tr>
                            @if ($ecbHC>10)
                                {{--                            @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>
    @endif{{--ECB Hearings--}}
    @if ($ecbVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB VIOLATIONS</h1>
            <hr>
            <h2>There are a total of {{$ecbVC}} ECB Violations: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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

                @foreach($user->properties as $property)
                    @foreach($property->ecbViolations as $item)
                        @if($item->ecb_violation_status==='ACTIVE')
                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
                                <td>{{$item->hearingDate()}}</td>
                                <td>{{Str::limit($item->respondent_name,17)}}</td>
                                <td>{{$item->violation_type}}</td>
                                <td>${{$item->penality_imposed}}</td>
                                <td>${{$item->balance_due}}</td>
                                <td>{{$item->hearing_status}}</td>
                                <td>{{$item->ecb_violation_status}}</td>
                                <td>{{$item->certification_status}}</td>
                            </tr>
                            @if ($ecbVC>10)
                                {{--                                        @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>

        </div>
    @endif{{--  ecbViolations --}}
    @if ($ecbpenalty!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB ALL PENALTIES</h1>
            <hr>
            <h2>There are a total of {{$ecbpenalty}} ECB penalties: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Balance</th>
                    <th>Respondent</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>ECB #</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>


                @foreach($user->properties as $property)
                    @foreach($property->oathHearings as $item)
                        @if(Str::contains(Str::upper($item->compliance_status), 'DUE'))
                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
                                <td>$ {{$item->balance_due}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->compliance_status}}</td>
                            </tr>
                            @if ($ecbpenalty>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--ECB ALL Penalties--}}
    @if ($ecbdefaulted!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB DEFAULTED</h1>
            <hr>
            <h2>There are a total of {{$ecbdefaulted}} ECB Defaulted Data: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Balance</th>
                    <th>Respondent</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>ECB #</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->oathHearings()->where('hearing_result','like','%DEFAULTED%')->get() as $item)
                        @if(!Str::contains(Str::upper($item->compliance_status), 'MET'))
                            <tr>
                                <td>{{$property->getSmallAddress(12) }}</td>
                                <td>$ {{$item->balance_due}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->compliance_status}}</td>
                            </tr>
                            @if ($ecbdefaulted>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--ECB Defaulted--}}
    @if ($ecbimposed!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB IMPOSED</h1>
            <hr>
            <h2>There are a total of {{$ecbimposed}} ECB Imposed Data:</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Balance</th>
                    <th>Client</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>ECB #</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>


                @foreach($user->properties as $property)
                    @foreach($property->oathHearings()->imposed()->get() as $item)
                        @if($item->compliance_status !== null && $item->compliance_status !== '' && $item->compliance_status!== 'All Terms Met' )
                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
                                <td>$ {{$item->balance_due}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->compliance_status}}</td>
                            </tr>
                            @if ($ecbimposed>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>
    @endif{{--ECB Imposed--}}
    @if ($overpaid!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB OVERPAIDS</h1>
            <hr>
            <h2>There are a total of {{$overpaid}} ECB Overpaid Data </h2>
            <table class="renklendir" autosize="1" data-order='[[ 1, "desc" ]]'
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Balance</th>
                    <th>Respondent</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>ECB #</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>


                @foreach($user->properties as $property)
                    @foreach($property->oathHearings as $item)
                        @if(intval($item->balance_due)<0)
                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
                                <td>$ {{$item->balance_due}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->compliance_status}}</td>
                            </tr>
                            @if ($overpaid>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--ECB Over Paid--}}
    @if ($ecbcorrections!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB CORRECTIONS</h1>
            <hr>
            <h2>There are a total of {{$ecbcorrections}} ECB Corrections: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Balance</th>
                    <th>Respondent</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>ECB #</th>
                    <th>HEARING Stat.</th>
                    <th>HEARING Res.</th>
                    <th>ECB Status</th>
                    <th>Cert. status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->oathHearings()->where('hearing_result','<>','DISMISSED')->get() as $item)
                        @if(!( $item->hearing_status === 'HEARING COMPLETED'
                        || $item->hearing_status === 'WRITTEN OFF'
                        || $item->hearing_status ==='STAYED'
                        || ($item->ecbViolation != null ? Str::contains($item->ecbViolation->certification_status,'ACCEPTED') : false)
                        || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'DEPARTMENT OF SANITATION' && $item->hearing_status === 'PAID IN FULL')
                        || ((\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === '' || \App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === null) && $item->hearing_status === 'PAID IN FULL')
                        || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'ASBESTOS CONTROL PROGRAM' && $item->hearing_status === 'PAID IN FULL' && $item->hearing_result === 'STIPULATED')
                        || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'FIRE DEPARTMENT' && $item->hearing_status === 'PAID IN FULL' && $item->hearing_result === 'STIPULATED')))

                            <tr>
                                <td>{{$property->getSmallAddress(12) }}</td>
                                <td>$ {{$item->balance_due}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{($item->issuing_agency)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->hearing_status}}</td>
                                <td>{{$item->hearing_result}}</td>
                                <td>{{$item->ecbViolation != null ? $item->ecbViolation->ecb_violation_status : "-" }}</td>
                                <td>{{$item->ecbViolation != null ? $item->ecbViolation->certification_status : "-" }}</td>
                            </tr>
                            @if ($ecbcorrections>10)
                                {{--                            @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--ECB Corrections--}}
    @if ($ecbcomplaints!=0)
        <div class="newsection" style="text-align: left;">
            <h1>ECB COMPLAINTS</h1>
            <hr>
            <h2>There are a total of {{$ecbcomplaints}} ECB Complaints: </h2>

            <hr>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Complaint #</th>
                    <th>Received</th>
                    <th>Agency</th>
                    <th>Type</th>
                    <th>Desc</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->properties as $property)
                    @foreach($property->serviceRequests311()->where('status','not like','%Closed%')->where('status','not like','%Assigned%')->get() as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->unique_key}}</td>
                            <td>{{$item->createdDate()}}</td>
                            <td>{{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}</td>
                            <td>{{$item->complaint_type}}</td>
                            <td>{{$item->descriptor}}</td>
                            <td>{{$item->status}}</td>
                        </tr>
                        @if ($ecbcomplaints>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--ECB Complaints--}}
    <br/>
    <div class="newsection" style="text-align: left;">

        <h1 style="padding-top: 40%; text-align: center"><img src="{{asset('images/summary/iconFDNYbw-100.png')}}"><br/><br/>NYC
            FIRE DEPARTMENT</h1>
    </div> {{--  New York City Fire Department --}}
    @if ($fdnyAVOC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY ACTIVE VIOLATIONS</h1>
            <hr>
            <h2>There are a total of {{$fdnyAVOC}} FDNY Violations:</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Violation #</th>
                    <th>Violation Date</th>
                    <th>Violation Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->properties as $property)
                    @foreach($property->fdnyActiveViolOrders()->summary()->get()->sortByDesc('vio_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->vio_id}}</td>
                            <td>{{$item->violationDate()}}</td>
                            <td>{{$item->vio_law_desc}}</td>
                            <td>{{$item->action}}</td>
                        </tr>
                        @if ($fdnyAVOC>10)
                            {{--                                    @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  FDNYViolations --}}
    @if ($fdnyCOFC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY CERTIFICATES OF FITNESS</h1>
            <hr>
            <h2>There are a total of {{$fdnyCOFC}} FDNY Certificates of Fitness Data: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>COF #</th>
                    <th>COF TYPE</th>
                    <th>Holder</th>
                    <th>Expiration</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->fdnyCertOfFitness()->summary()->get()->sortByDesc('expires_on') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->cof_id}}</td>
                            <td>{{$item->cof_type}}</td>
                            <td>{{$item->holder_name}}</td>
                            <td>{{$item->expireDate()}}</td>
                        </tr>
                        @if($fdnyCOFC>10)
                            {{--                                    @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  FdnyCertOfFitness --}}
    @if ($fdnyhearings!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY HEARINGS</h1>
            <hr>
            <h2>There are a total of {{$fdnyhearings}} FDNY Hearings: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>ECB #</th>
                    <th>Client</th>
                    <th>Hearing Date</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>Description</th>
                    <th>Hearing Status</th>
                    <th>Hearing Result</th>
                </tr>
                </thead>
                <tbody>


                @foreach($user->properties as $property)
                    @foreach($property->oathHearings()->summary()->get() as $item)
                        @if(Str::contains(\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency), 'FIRE'))
                            <tr>
                                <td> {{$property->getSmallAddress(12) }}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->hearingDate()}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->charge_1_code_description}}</td>
                                <td>{{$item->hearing_status}}</td>
                                <td>{{$item->hearing_result}}</td>
                            </tr>
                            @if ($fdnyhearings>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--FDNY Hearings--}}
    @if ($fdnycorrections!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY CORRECTION</h1>
            <hr>
            <h2>There are a total of {{$fdnycorrections}} FDNY Corrections: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>ADDRESS</th>
                    <th>Balance</th>
                    <th>Respondent</th>
                    <th>Violation Date</th>
                    <th>ECB #</th>
                    <th>HEARING Stat.</th>
                    <th>HEARING Res.</th>
                    <th>ECB Status</th>
                    <th>Cert. status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->oathHearings()->where('hearing_result','<>','DISMISSED')->get() as $item)
                        @if(Str::contains(\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency), 'FIRE') && !( $item->hearing_status === 'HEARING COMPLETED'
                       || $item->hearing_status === 'WRITTEN OFF'
                       || $item->hearing_status ==='STAYED'
                       || ($item->ecbViolation != null ? Str::contains($item->ecbViolation->certification_status,'ACCEPTED') : false)
                       || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'DEPARTMENT OF SANITATION' && $item->hearing_status === 'PAID IN FULL')
                       || ((\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === '' || \App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === null) && $item->hearing_status === 'PAID IN FULL')
                       || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'ASBESTOS CONTROL PROGRAM' && $item->hearing_status === 'PAID IN FULL' && $item->hearing_result === 'STIPULATED')
                       || (\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency) === 'FIRE DEPARTMENT' && $item->hearing_status === 'PAID IN FULL' && $item->hearing_result === 'STIPULATED')))
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}}</td>
                                <td>$ {{$item->balance_due}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->hearing_status}}</td>
                                <td>{{$item->hearing_result}}</td>
                                <td>{{$item->ecbViolation != null ? $item->ecbViolation->ecb_violation_status : "-" }}</td>
                                <td>{{$item->ecbViolation != null ? $item->ecbViolation->certification_status : "-" }}</td>
                            </tr>
                            @if ($fdnycorrections>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--FDNY Correction--}}
    @if ($fdnypenalty!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY PENALTIES</h1>
            <hr>
            <h2>There are a total of {{$fdnypenalty}} FDNY Penalties: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Balance</th>
                    <th>Client</th>
                    <th>Violation Date</th>
                    <th>Issuing Agency</th>
                    <th>ECB #</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->oathHearings as $item)
                        @if((Str::contains($item->compliance_status, 'Due') || Str::contains($item->compliance_status, 'DUE') || Str::contains($item->compliance_status, 'due'))&& Str::contains(\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency), 'FIRE'))
                            <tr>
                                <td> {{$property->house_number}} {{$property->stname}}</td>
                                <td>$ {{$item->balance_due}}</td>
                                <td>{{$item->respondent_last_name}}</td>
                                <td>{{$item->violationDate()}}</td>
                                <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td>{{$item->compliance_status}}</td>
                            </tr>
                            @if ($fdnypenalty>10)
                                {{--                                @break--}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--FDNY Penalties--}}
    @if ($fdnyactive!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY ACTIVE VIOLATION ORDERS</h1>
            <hr>
            <h2>There are a total of {{$fdnyactive}} FDNY Active Viol Orders: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Violation Date</th>
                    <th>Respondent</th>
                    <th>Viol #</th>
                    <th>Viol Law #</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->properties as $property)
                    @foreach($property->fdnyActiveViolOrders as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->vioDate()}}</td>
                            <td>{{$item->acct_owner}}</td>
                            <td>{{$item->violation_num}}</td>
                            <td>{{$item->vio_law_num}}</td>
                            <td>{{$item->vio_law_desc}}</td>
                            <td>{{$item->action}}</td>
                        </tr>
                        @if ($fdnyactive>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--FDNY Violation Orders--}}
    @if ($fdnycomplaints!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY COMPLAINTS</h1>
            <hr>
            <h2>There are a total of {{$fdnycomplaints}} FDNY Complaints: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Complaint #</th>
                    <th>Received</th>
                    <th>Agency</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->properties as $property)
                    @foreach($property->serviceRequests311()->where('status','not like','%Closed%')->where('status','not like','%Assigned%')->where('agency','like','%FDNY%')->get() as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->unique_key}}</td>
                            <td>{{$item->createdDate()}}</td>
                            <td>{{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}</td>
                            <td>{{$item->complaint_type}}</td>
                            <td>{{$item->descriptor}}</td>
                            <td>{{$item->status}}</td>
                        </tr>
                        @if ($fdnycomplaints<10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--FDNY Complaints--}}
    <div class="newsection" style="text-align: left;">

        <h1 style="padding-top: 40%; text-align: center"><img
                    src="{{asset('images/summary/iconHPDbw-100.png')}}"><br/><br/>DEPARTMENT
            OF HOUSING PRESERVATION</h1>
    </div> {{--  Department of Housing Preservation --}}
    @if ($hpdVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD VIOLATIONS</h1>
            <hr>
            <h2>There are a total of {{$hpdVC}} HPD Violations: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->hpdViolations()->summary()->get()->sortByDesc('novissueddate') as $item)
                        <tr>
                            <td>{{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->violationid}}</td>
                            <td>{{$item->apartment}}</td>
                            <td>{{$item->class}}</td>
                            <td>{{$item->inspectiondate()}}</td>
                            <td>{{Str::limit($item->novdescription,50)}}</td>
                            <td>{{$item->novissuedDate()}}</td>
                            <td>{{$item->violationstatus}}</td>
                        </tr>
                        @if ($hpdVC>10)
                            {{--                                    @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  hpdViolations --}}
    @if ($hpdCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD COMPLAINTS</h1>
            <hr>
            <h2>There are a total of {{$hpdCC}} HPD Complaints: </h2>

            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Complaint#</th>
                    <th>Building#</th>
                    <th>Apartment</th>
                    <th>Received Date</th>
                    <th>Status</th>
                    <th>Status Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->properties as $property)
                    @foreach($property->hpdComplaints()->summary()->get()->sortByDesc('statusdate') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->complaintid}}</td>
                            <td>{{$item->buildingid}}</td>
                            <td>{{$item->apartment}}</td>
                            <td>{{$item->receivedDate()}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->statusDate()}}</td>
                        </tr>
                        @if ($hpdCC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  HPD Complaints --}}
    @if ($LVC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>Landmark VIOLATIONS</h1>
            <hr>
            <h2>There are a total of {{$LVC}} Landmark Violations:</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Violation Date</th>
                    <th>Violation class</th>
                    <th>Rescinded</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->landmarkViolations()->summary()->get()->sortByDesc('vio_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->vioDate()}}</td>
                            <td>{{$item->violation_class}}</td>
                            <td>{{$item->rescinded}}</td>
                        </tr>
                        @if($LVC>10)
                            {{--                                    @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  landmarkViolations --}}
    @if ($hpdHLC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD HOUSING LITIGATIONS</h1>
            <hr>
            <h2>There are a total of {{$hpdHLC}} Hpd Housing Litigations:</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Litigation #ID</th>
                    <th>Case Status</th>
                    <th>Case Type</th>
                    <th>Caseopen Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->hpdHousingLitigations()->summary()->get()->sortByDesc('caseopendate') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->litigationid}}</td>
                            <td>{{$item->casestatus}}</td>
                            <td>{{$item->casetype}}</td>
                            <td>{{$item->caseopenDate()}}</td>
                        </tr>
                        @if($hpdHLC>10)
                            {{--                                @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{-- hpdHousingLitigations --}}
    @if ($hpdDRC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD DWELLING REGISTRATIONS</h1>
            <hr>
            <h2>There are a total of {{$hpdDRC}} Hpd Dwelling Registrations: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Last Registration Date</th>
                    <th>Registration #</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->properties as $property)
                    @foreach($property->hpdDwellingRegistrations()->summary()->get()->sortByDesc('registrationenddate') as $item)
                        <tr>
                            <td> {{$property->getAddressWithoutBin() }}</td>
                            <td>{{$item->lastregistrationDate()}}</td>
                            <td>{{$item->registrationid}}</td>
                        </tr>
                        @if($hpdDRC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{-- hpdDwellingRegistrations --}}
    @if ($hpdERC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD REPAIRS</h1>
            <hr>
            <h2>There are a total of {{$hpdERC}} Hpd Repairs: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>OMO #</th>
                    <th>Issued Date</th>
                    <th width="38%">Description</th>
                    <th>Award</th>
                    <th>Charged</th>
                    <th>DOF</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->hpdEmergencyRepairs()->where('omostatusreason','like','%access%')->get() as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->omoid}}</td>
                            <td>{{$item->omoCreateDate()}}</td>
                            <td>{{$item->omodescription}}</td>
                            <td>$ {{$item->omoawardamount}}</td>
                            <td>$ {{$item->charges == null ? "-":$item->charges->chargeamount}}</td>
                            <td>{{$item->charges == null ? "-": $item->charges->dateTransferDof()}}</td>
                            <td>{{$item->omostatusreason}}</td>
                        </tr>
                        @if($hpdERC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{-- HPD Repairs --}}
    @if ($hpdRVOC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>HPD Vacate Orders</h1>
            <hr>
            <h2>There are a total of {{$hpdRVOC}} HPD Vacate Orders:</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->hpdRepairVacateOrders()->summary()->get()->sortByDesc('vacate_effective_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->number_of_vacated_units}}</td>
                            <td>{{$item->actualRescindDate()}}</td>
                            <td>{{$item->vacateEffectiveDate()}}</td>
                            <td>{{$item->primary_vacate_reason}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->ecb_number}}</td>
                            <td>{{$item->vacate_type}}</td>
                        </tr>
                        @if ($hpdRVOC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  HPD Vacate Orders  --}}
    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 40%; text-align: center"><img
                    src="{{asset('images/summary/iconINSPECTION-100.png')}}"><br/><br/>INSPECTIONS</h1>
    </div> {{--Inspections--}}
    @if ($dobNSBC==0)
        <div class="newsection" style="text-align: left;">
            <h1> DOB NOW SAFETY BOILER</h1>
            <hr>
            <h2>There are a total of {{$dobNSBC}} Dob Now Safety Boiler: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->dobNowSafetyBoiler()->summary()->get()->sortByDesc('inspection_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->boiler_id}}</td>
                            <td>{{$item->report_type}}</td>
                            <td>{{$item->applicantfirst_name}}</td>
                            <td>{{$item->applicant_last_name}}</td>
                            <td>{{$item->applicant_license_number}}</td>
                            <td>{{\Illuminate\Support\Str::substr($item->inspection_date,0,10)}}</td>
                            <td>{{$item->inspection_type}}</td>
                            <td>{{$item->report_status}}</td>
                        </tr>
                        @if($dobNSBC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{-- DOB Boiler --}}
    @if ($depCPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DEP CATS</h1>
            <hr>
            <h2>There are a total of {{$depCPC}} Dep Cats:</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Request#</th>
                    <th>Application#</th>
                    <th>Request Type</th>
                    <th>Expire Date</th>
                    <th>Issue Date</th>
                    <th>Current Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->depCatsPermits()->summary()->get()->sortByDesc('issuedate') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->requestid}}</td>
                            <td>{{$item->applicationid}}</td>
                            <td>{{$item->requesttype}}</td>
                            <td>{{$item->expirationDate()}}</td>
                            <td>{{$item->issueDate()}}</td>
                            <td>{{$item->status}}</td>
                        </tr>
                        @if($depCPC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--DEP Boiler--}}
    @if ($dobNFFC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW FACADE FILINGS</h1>
            <hr>
            <h2>There are a total of {{$dobNFFC}} DOB NOW Facade Filings: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Control No</th>
                    <th>Filing Type</th>
                    <th>Cycle</th>
                    <th>Submitted On</th>
                    <th>Current Status</th>
                    <th>Qewi Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->dobNowFacadeFilings()->summary()->get()->sortByDesc('filing_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->control_no}}</td>
                            <td>{{$item->filing_type}}</td>
                            <td>{{$item->cycle}}</td>
                            <td>{{$item->submitted_on}}</td>
                            <td>{{$item->current_status}}</td>
                            <td>{{$item->qewi_name}}</td>
                        </tr>
                        @if ($dobNFFC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{-- dobNowFacadeFilings --}}
    @if ($dobNJFC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW JOB FILINGS</h1>
            <hr>
            <h2>There are a total of {{$dobNJFC}} DOB NOW Job Filings: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Filing Number</th>
                    <th>Status</th>
                    <th>Floor</th>
                    <th>Applicant License</th>
                    <th>Applicant Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->dobNowJobFilings()->summary()->get()->sortByDesc('job_filing_number') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->job_filing_number}}</td>
                            <td>{{$item->filing_status}}</td>
                            <td>{{$item->work_on_floor}}</td>
                            <td>{{$item->applicant_license}}</td>
                            <td>{{trim($item->applicant_first_name.' '.$item->applicant_last_name)}}</td>
                        </tr>
                        @if ($dobNJFC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>
    @endif{{-- dob Now JobFilings --}}
    @if ($fdnyIC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>FDNY INSPECTIONS</h1>
            <hr>
            <h2>There are a total of {{$fdnyIC}} Bureau of Fire Prevention - Inspections: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Acct Number</th>
                    <th>Owner Name</th>
                    <th>Status</th>
                    <th>Last Full Ins Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->fdnyInspections()->summary()->get()->sortByDesc('acct_id') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->acct_num}}</td>
                            <td>{{$item->owner_name}}</td>
                            <td>{{$item->last_insp_stat}}</td>
                            <td>{{$item->lastFullInspectionDate()}}</td>
                        </tr>
                        @if($fdnyIC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{-- FDNYInspections --}}
    @if ($dotSIC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOT SIDEWALK INSPECTION</h1>
            <hr>
            <h2>There are a total of {{$dotSIC}} Dot Sidewalk Inspections: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>SR#</th>
                    <th>Inspection Date</th>
                    <th>Failure Reason</th>
                    <th>Pass Fail</th>
                    <th>Violation</th>
                    <th>Permit(s)</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->properties as $property)
                    @foreach($property->dotSidewalkInspections()->summary()->get()->sortByDesc('inspection_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->sr}}</td>
                            <td>{{$item->inspectionDate()}}</td>
                            <td>{{$item->reason_for_failure}}</td>
                            <td>{{$item->pass_fail}}</td>
                            <td>{{$item->violation}}</td>
                            <td>{{$item->permit}}</td>
                        </tr>
                        @if($dotSIC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{-- dotSidewalkInspections --}}
    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 40%; text-align: center">
            <img src="{{asset('images/summary/iconPERMIT-100.png')}}"><br/><br/>PERMITS</h1>
    </div> {{--Permits--}}
    @if ($dobPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB PERMITS</h1>
            <hr>
            <h2>There are a total of {{$dobPC}} Dob Permits:</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->dobPermits()->summary()->get()->sortByDesc('filing_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
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
                        @if($dobPC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--dobPermits--}}
    @if ($dobNAPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW APPROVED PERMITS</h1>
            <hr>
            <h2>There are a total of {{$dobNAPC}} Dob Now Approved Permits: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Filing Number</th>
                    <th>Work Floor</th>
                    <th>Work Type</th>
                    <th>Permit License</th>
                    <th>Applicant License</th>
                    <th>Issued Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->dobNowApprovedPermits()->summary()->get()->sortByDesc('issued_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->job_filing_number}}</td>
                            <td>{{$item->work_on_floor}}</td>
                            <td>{{$item->work_type}}</td>
                            <td>{{$item->permittee_s_license_type}}</td>
                            <td>{{$item->applicant_license}}</td>
                            <td>{{$item->issuedDate()}}</td>
                        </tr>
                        @if ($dobNAPC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--dobNowApprovedPermits--}}
    @if ($dobNEPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW ELECTRICAL PERMITS</h1>
            <hr>
            <h2>There are a total of {{$dobNEPC}} Dob Now Electrical Permits: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Job Number</th>
                    <th>Issue Date</th>
                    <th>Filing Date</th>
                    <th>Status</th>
                    <th>Applicant Name</th>
                    <th>License Type</th>
                    <th>License number</th>
                    <th>Company</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->dobNowElectricalPermits()->summary()->get()->sortByDesc('filing_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->job_number}}</td>
                            <td>{{$item->permitIssuedDate()}}</td>
                            <td>{{$item->filingDate()}}</td>
                            <td>{{$item->filing_status}}</td>
                            <td>{{trim($item->applicant_first_name.' '.$item->applicant_last_name)}}</td>
                            <td>{{$item->license_type}}</td>
                            <td>{{$item->license_number}}</td>
                            <td>{{$item->firm_name}}</td>
                        </tr>
                        @if ($dobNEPC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--dobNowElectricalPermits--}}
    @if ($dobNELEVATPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOB NOW ELEVATOR PERMITS</h1>
            <hr>
            <h2>There are a total of {{$dobNELEVATPC}} Dob Now Elevator Permits: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->dobNowElevatorPermits()->summary()->get()->sortByDesc('filing_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->job_number}}</td>
                            <td>{{$item->filingDate()}}</td>
                            <td>{{$item->filing_status}}</td>
                            <td>{{$item->permitEntireDate()}}</td>
                            <td>{{$item->signedOffDate()}}</td>
                            <td>{{$item->applicant_firstname}}</td>
                            <td>{{$item->applicant_lastname}}</td>
                            <td>{{$item->applicant_businessname}}</td>
                        </tr>
                        @if($dobNELEVATPC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--dobNowElevatorPermits--}}

    @if ($LPC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>LANDMARK PERMITS</h1>
            <hr>
            <h2>There are a total of {{$LPC}} Landmark Permits: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Docket</th>
                    <th>Received Date</th>
                    <th>Applicant Name</th>
                    <th>Regulation Type</th>
                    <th>Issue Date</th>
                    <th>Expiration Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->landmarkPermits()->summary()->get()->sortByDesc('docket') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->docket}}</td>
                            <td>{{$item->receivedDate()}}</td>
                            <td>{{$item->applicant_name}}</td>
                            <td>{{$item->regulation_type}}</td>
                            <td>{{$item->issueDate()}}</td>
                            <td>{{$item->expirationDate()}}</td>
                        </tr>
                        @if($LPC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--landmarkPermits--}}

    <div class="newsection" style="text-align: left;">
        <h1 style="padding-top: 40%; text-align: center">
            <img width="" src="{{asset('images/summary/others.png')}}"><br/><br/>OTHERS</h1>
    </div> {{--Others--}}
    @if ($SRC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>311 SERVICES REQUESTS</h1>
            <hr>
            <h2>There are a total of {{$SRC}} Service Requests</h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
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
                @foreach($user->properties as $property)
                    @foreach($property->serviceRequests311()->closed()->get()->sortByDesc('created_date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->unique_key}}</td>
                            <td>{{$item->createdDate()}}</td>
                            <td>{{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}</td>
                            <td>{{$item->complaint_type}}</td>
                            <td>{{$item->descriptor}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->resolution_description}}</td>
                            <td>{{$item->resolutionActionUpdatedDate()}}</td>
                        </tr>
                        @if ($SRC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--serviceRequests311--}}
    @if ($dotSCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>DOT SIDEWALK CORRESPONDENCES</h1>
            <hr>
            <h2>There are a total of {{$dotSCC}} Dot Sidewalk Correspondences: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Issue</th>
                    <th>Other Log</th>
                    <th>Received Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->dotSidewalkCorrespondences()->summary()->get()->sortByDesc('date_received') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->issue}}</td>
                            <td>{{$item->other_log}}</td>
                            <td>{{$item->dateReceived()}}</td>
                        </tr>
                        @if($dotSCC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>
    @endif{{--dotSidewalkCorrespondences--}}
    @if ($LCC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>LANDMARK COMPLAINTS</h1>
            <hr>
            <h2>There are a total of {{$LCC}} Landmark Complaints: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Issued Violation</th>
                    <th>Work Reported</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->landmarkComplaints()->summary()->get()->sortByDesc('date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->date()}}</td>
                            <td>{{$item->issued_violation}}</td>
                            <td>{{$item->work_reported}}</td>
                        </tr>
                        @if ($LCC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  Landmark Complaints --}}
    @if ($bsaASC!=0)
        <div class="newsection" style="text-align: left;">
            <h1>BSA APPLICATION STATUS</h1>
            <hr>
            <h2>There are a total of {{$bsaASC}} BSA Application: </h2>
            <table class="renklendir" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Filed Date</th>
                    <th>Application</th>
                    <th>Calendar Code</th>
                    <th>Current Status</th>
                    <th>Status Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->properties as $property)
                    @foreach($property->bsaApplicationStatus()->summary()->get()->sortByDesc('date') as $item)
                        <tr>
                            <td> {{$property->getSmallAddress(12) }}</td>
                            <td>{{$item->filedDate()}}</td>
                            <td>{{$item->application}}</td>
                            <td>{{$item->calendar}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->date()}}</td> {{--Always keep the latest status date row for BSA.--}}
                        </tr>
                        @if ($bsaASC>10)
                            {{--                            @break--}}
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endif{{--  BSA Applicatiıon --}}
    <div class="newsection">
        <span style="padding-top: 30px"><i>This report shows a summary of all properties within. You can access every detail and customize your alerts by   <a
                        href="https://pbs.nyc/portal/">using our member portal.</a></i></span>
        <h1 style="padding-top: 5%; text-align: center">
            <img src="{{asset('images/summary/consultant.png')}}"><br/></h1>
        <div style="margin: 0 30%; border-radius: 50px; width:40%;text-align: center;height: 50px;padding:10px; background:rgba(35,36,35,0.54);">
            <a href="https://pbs.nyc/calender" target="_blank"
               style="display:block;font-size:16px; text-align:center; font-weight:bold;color:#ffffff; text-decoration:underline;">
                BOOK A CONSULTATION
            </a>
        </div>

    </div>

</div>


</body>
</html>
