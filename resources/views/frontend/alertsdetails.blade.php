@extends('frontend.master')

@php($pageTitle ='Alert Details')

@section('meta')
    {{--meta etiketleri--}}
@stop

@section('css')
    {{--css kodları--}}
    <style>

        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }    </style>
    <!-- Bootstrap Data Table Plugin -->
    <link rel="stylesheet" href="{{asset('css/components/bs-datatable.css')}}"
          type="text/css"/>
@stop

@section('slider')
    {{--slider bölümü--}}
@stop

@section('content')
    {{--content bölümü--}}
    <!--		Iceriklerrrr -->
    <div class="content-wrap">
        <div class="container-fluid clearfix px-5">
            <div><h2>Alerts until {{ date('Y-m-d H:i:s') }}</h2>
                <p>The contents below is a full-detailed report for your properties:</p>
            </div>

            <div class="divider divider-center"><img src="{{ asset('images/others/dividerlogo50.png') }}"
                                                     width="30px"/></div>

            <div class="table-responsive">
                <table id="datatable1" class="table table-striped text-white table-bordered" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 25%;">Property Address</th>
                        <th style="width: 6.36%;">DOB VIOL</th>
                        <th style="width: 6.36%;">DOB COMP</th>
                        <th style="width: 6.36%;">STOP WORK</th>
                        <th style="width: 6.36%;">VACATE ORDER</th>
                        <th style="width: 6.36%;">ECB HEARINGS</th>
                        <th style="width: 6.36%;">ECB CORRECT.</th>
                        <th style="width: 6.36%;">ECB DEFAULT</th>
                        <th style="width: 6.36%;">ECB IMPOSED</th>
                        <th style="width: 6.36%;">HPD VIOL</th>
                        <th style="width: 6.36%;">HPD %UNIT</th>
                        <th style="width: 6.36%;">HPD COMP</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="text-align:right; color:red; width: 20%;"><b>TOTAL</b></th>
                        <th style="width: 6%;">DOB VIOL</th>
                        <th style="width: 6%;">DOB COMP</th>
                        <th style="width: 6%;">STOP WORK</th>
                        <th style="width: 6%;">VACATE ORDER</th>
                        <th style="width: 6%;">ECB HEARINGS</th>
                        <th style="width: 6%;">ECB CORRECT.</th>
                        <th style="width: 6%;">ECB DEFAULT</th>
                        <th style="width: 6%;">ECB IMPOSED</th>
                        <th style="width: 6%;">HPD VIOL</th>
                        <th style="width: 6%;">HPD %UNIT</th>
                        <th style="width: 6%;">HPD COMP</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)

                    @foreach($alerts as $property)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$property->getAddress()}}</td>
                            <td>{{$property->dobViolations->count()}}</td>
                            <td>{{$property->dobComplaints->count()}}</td>
                            <td>{{$property->dobPermits()->where("permit_type","R")->count()}}</td>
                            <td>{{$property->hpdRepairVacateOrders->count()}}</td>
                            <td>{{$property->oathHearings()->where("issuing_agency")->count()}}</td>
                            <td>{{$property->ecbViolations()->where("hearing_status","DISMISSED")->count()}}</td>
                            <td>${{$property->ecbViolations()->sum("amount_paid")}}</td>
                            <td>${{$property->ecbViolations()->sum("penality_imposed")}}</td>
                            <td>{{$property->hpdViolations->count()}}</td>
                            <td>-</td>
                            <td>{{$property->hpdComplaints->count()}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--            dobViolations--}}
            1
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobViolations
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>bbl</th>
                                <th>isn_dob_bis_viol</th>
                                <th>boro</th>
                                <th>bin</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>issue_date</th>
                                <th>violation_type_code</th>
                                <th>violation_number</th>
                                <th>house_number</th>
                                <th>street</th>
                                <th>disposition_date</th>
                                <th>disposition_comments</th>
                                <th>device_number</th>
                                <th>description</th>
                                <th>ecb_number</th>
                                <th>number</th>
                                <th>violation_category</th>
                                <th>violation_type</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>bbl</th>
                                <th>isn_dob_bis_viol</th>
                                <th>boro</th>
                                <th>bin</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>issue_date</th>
                                <th>violation_type_code</th>
                                <th>violation_number</th>
                                <th>house_number</th>
                                <th>street</th>
                                <th>disposition_date</th>
                                <th>disposition_comments</th>
                                <th>device_number</th>
                                <th>description</th>
                                <th>ecb_number</th>
                                <th>number</th>
                                <th>violation_category</th>
                                <th>violation_type</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)



                                @foreach($property->dobViolations()->limit(5)->get() as $violation)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->isn_dob_bis_viol}}</td>
                                        <td>{{$violation->boro}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->issue_date}}</td>
                                        <td>{{$violation->violation_type_code}}</td>
                                        <td>{{$violation->violation_number}}</td>
                                        <td>{{$violation->house_number}}</td>
                                        <td>{{$violation->street}}</td>
                                        <td>{{$violation->disposition_date}}</td>
                                        <td>{{$violation->disposition_comments}}</td>
                                        <td>{{$violation->device_number}}</td>
                                        <td>{{$violation->description}}</td>
                                        <td>{{$violation->ecb_number}}</td>
                                        <td>{{$violation->number}}</td>
                                        <td>{{$violation->violation_category}}</td>
                                        <td>{{$violation->violation_type}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            bsaApplicationStatus--}}
            2
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>bsaApplicationStatus
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>filed</th>
                                <th>application</th>
                                <th>calendar</th>
                                <th>section</th>
                                <th>street_number</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>borough_code</th>
                                <th>block</th>
                                <th>lots</th>
                                <th>zoning_district</th>
                                <th>cb</th>
                                <th>project_description</th>
                                <th>status</th>
                                <th>date</th>
                                <th>postcode</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>bbl</th>
                                <th>nta</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>filed</th>
                                <th>application</th>
                                <th>calendar</th>
                                <th>section</th>
                                <th>street_number</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>borough_code</th>
                                <th>block</th>
                                <th>lots</th>
                                <th>zoning_district</th>
                                <th>cb</th>
                                <th>project_description</th>
                                <th>status</th>
                                <th>date</th>
                                <th>postcode</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>bbl</th>
                                <th>nta</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)



                                @foreach($property->bsaApplicationStatus()->limit(5)->get() as $violation)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->filed}}</td>
                                        <td>{{$violation->application}}</td>
                                        <td>{{$violation->calendar}}</td>
                                        <td>{{$violation->section}}</td>
                                        <td>{{$violation->street_number}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->borough_code}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lots}}</td>
                                        <td>{{$violation->zoning_district}}</td>
                                        <td>{{$violation->cb}}</td>
                                        <td>{{$violation->project_description}}</td>
                                        <td>{{$violation->status}}</td>
                                        <td>{{$violation->date}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->nta}}</td>

                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            depCatsPermits--}}
            3
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>depCatsPermits
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>requestid</th>
                                <th>applicationid</th>
                                <th>requesttype</th>
                                <th>house</th>
                                <th>street</th>
                                <th>borough</th>
                                <th>bin</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>ownername</th>
                                <th>expirationdate</th>
                                <th>make</th>
                                <th>model</th>
                                <th>burnermake</th>
                                <th>burnermodel</th>
                                <th>primaryfuel</th>
                                <th>secondaryfuel</th>
                                <th>quantity</th>
                                <th>issuedate</th>
                                <th>status</th>
                                <th>premisename</th>
                                <th>bbl</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>requestid</th>
                                <th>applicationid</th>
                                <th>requesttype</th>
                                <th>house</th>
                                <th>street</th>
                                <th>borough</th>
                                <th>bin</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>ownername</th>
                                <th>expirationdate</th>
                                <th>make</th>
                                <th>model</th>
                                <th>burnermake</th>
                                <th>burnermodel</th>
                                <th>primaryfuel</th>
                                <th>secondaryfuel</th>
                                <th>quantity</th>
                                <th>issuedate</th>
                                <th>status</th>
                                <th>premisename</th>
                                <th>bbl</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)



                                @foreach($property->depCatsPermits()->limit(5)->get() as $violation)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->requestid}}</td>
                                        <td>{{$violation->applicationid}}</td>
                                        <td>{{$violation->requesttype}}</td>
                                        <td>{{$violation->house}}</td>
                                        <td>{{$violation->street}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->ownername}}</td>
                                        <td>{{$violation->expirationdate}}</td>
                                        <td>{{$violation->make}}</td>
                                        <td>{{$violation->model}}</td>
                                        <td>{{$violation->burnermake}}</td>
                                        <td>{{$violation->burnermodel}}</td>
                                        <td>{{$violation->primaryfuel}}</td>
                                        <td>{{$violation->secondaryfuel}}</td>
                                        <td>{{$violation->quantity}}</td>
                                        <td>{{$violation->issuedate}}</td>
                                        <td>{{$violation->status}}</td>
                                        <td>{{$violation->premisename}}</td>
                                        <td>{{$violation->bbl}}</td>

                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobNowApprovedPermits--}}
            4
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobNowApprovedPermits
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>filing_reason</th>
                                <th>house_no</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>lot</th>
                                <th>bin</th>
                                <th>block</th>
                                <th>c_b_no</th>
                                <th>apt_condo_no_s</th>
                                <th>work_on_floor</th>
                                <th>work_type</th>
                                <th>permittee_s_license_type</th>
                                <th>applicant_license</th>
                                <th>applicant_first_name</th>
                                <th>applicant_middle_name</th>
                                <th>applicant_last_name</th>
                                <th>applicant_business_name</th>
                                <th>applicant_business_address</th>
                                <th>filing_representative_first_name</th>
                                <th>filing_representative_middle_initial</th>
                                <th>filing_representative_last_name</th>
                                <th>filing_representative_business_name</th>
                                <th>work_permit</th>
                                <th>approved_date</th>
                                <th>issued_date</th>
                                <th>expired_date</th>
                                <th>job_description</th>
                                <th>estimated_job_costs</th>
                                <th>owner_business_name</th>
                                <th>owner_name</th>
                                <th>owner_street_address</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>owner_zip_code</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>filing_reason</th>
                                <th>house_no</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>lot</th>
                                <th>bin</th>
                                <th>block</th>
                                <th>c_b_no</th>
                                <th>apt_condo_no_s</th>
                                <th>work_on_floor</th>
                                <th>work_type</th>
                                <th>permittee_s_license_type</th>
                                <th>applicant_license</th>
                                <th>applicant_first_name</th>
                                <th>applicant_middle_name</th>
                                <th>applicant_last_name</th>
                                <th>applicant_business_name</th>
                                <th>applicant_business_address</th>
                                <th>filing_representative_first_name</th>
                                <th>filing_representative_middle_initial</th>
                                <th>filing_representative_last_name</th>
                                <th>filing_representative_business_name</th>
                                <th>work_permit</th>
                                <th>approved_date</th>
                                <th>issued_date</th>
                                <th>expired_date</th>
                                <th>job_description</th>
                                <th>estimated_job_costs</th>
                                <th>owner_business_name</th>
                                <th>owner_name</th>
                                <th>owner_street_address</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>owner_zip_code</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)



                                @foreach($property->dobNowApprovedPermits()->limit(5)->get() as $violation)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->job_filing_number}}</td>
                                        <td>{{$violation->filing_reason}}</td>
                                        <td>{{$violation->house_no}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->c_b_no}}</td>
                                        <td>{{$violation->apt_condo_no_s}}</td>
                                        <td>{{$violation->work_on_floor}}</td>
                                        <td>{{$violation->work_type}}</td>
                                        <td>{{$violation->permittee_s_license_type}}</td>
                                        <td>{{$violation->applicant_license}}</td>
                                        <td>{{$violation->applicant_first_name}}</td>
                                        <td>{{$violation->applicant_middle_name}}</td>
                                        <td>{{$violation->applicant_last_name}}</td>
                                        <td>{{$violation->applicant_business_name}}</td>
                                        <td>{{$violation->applicant_business_address}}</td>
                                        <td>{{$violation->filing_representative_first_name}}</td>
                                        <td>{{$violation->filing_representative_middle_initial}}</td>
                                        <td>{{$violation->filing_representative_last_name}}</td>
                                        <td>{{$violation->filing_representative_business_name}}</td>
                                        <td>{{$violation->work_permit}}</td>
                                        <td>{{$violation->approved_date}}</td>
                                        <td>{{$violation->issued_date}}</td>
                                        <td>{{$violation->expired_date}}</td>
                                        <td>{{$violation->job_description}}</td>
                                        <td>{{$violation->estimated_job_costs}}</td>
                                        <td>{{$violation->owner_business_name}}</td>
                                        <td>{{$violation->owner_name}}</td>
                                        <td>{{$violation->owner_street_address}}</td>
                                        <td>{{$violation->owner_city}}</td>
                                        <td>{{$violation->owner_state}}</td>
                                        <td>{{$violation->owner_zip_code}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobCertOccupancy--}}
            5
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobCertOccupancy
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_number</th>
                                <th>job_type</th>
                                <th>c_o_issue_date</th>
                                <th>bin_number</th>
                                <th>borough</th>
                                <th>house_number</th>
                                <th>street_name</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>postcode</th>
                                <th>pr_dwelling_unit</th>
                                <th>ex_dwelling_unit</th>
                                <th>application_status_raw</th>
                                <th>filing_status_raw</th>
                                <th>item_number</th>
                                <th>issue_type</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>community_board</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>bbl</th>
                                <th>nta</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_number</th>
                                <th>job_type</th>
                                <th>c_o_issue_date</th>
                                <th>bin_number</th>
                                <th>borough</th>
                                <th>house_number</th>
                                <th>street_name</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>postcode</th>
                                <th>pr_dwelling_unit</th>
                                <th>ex_dwelling_unit</th>
                                <th>application_status_raw</th>
                                <th>filing_status_raw</th>
                                <th>item_number</th>
                                <th>issue_type</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>community_board</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>bbl</th>
                                <th>nta</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)



                                @foreach($property->dobCertOccupancy()->limit(5)->get() as $violation)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->job_number}}</td>
                                        <td>{{$violation->job_type}}</td>
                                        <td>{{$violation->c_o_issue_date}}</td>
                                        <td>{{$violation->bin_number}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->house_number}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->pr_dwelling_unit}}</td>
                                        <td>{{$violation->ex_dwelling_unit}}</td>
                                        <td>{{$violation->application_status_raw}}</td>
                                        <td>{{$violation->filing_status_raw}}</td>
                                        <td>{{$violation->item_number}}</td>
                                        <td>{{$violation->issue_type}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->nta}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobComplaints--}}
            6
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobComplaints
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>complaint_number</th>
                                <th>status</th>
                                <th>date_entered</th>
                                <th>house_number</th>
                                <th>zip_code</th>
                                <th>house_street</th>
                                <th>bin</th>
                                <th>community_board</th>
                                <th>special_district</th>
                                <th>complaint_category</th>
                                <th>unit</th>
                                <th>disposition_date</th>
                                <th>disposition_code</th>
                                <th>inspection_date</th>
                                <th>dobrundate</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>complaint_number</th>
                                <th>status</th>
                                <th>date_entered</th>
                                <th>house_number</th>
                                <th>zip_code</th>
                                <th>house_street</th>
                                <th>bin</th>
                                <th>community_board</th>
                                <th>special_district</th>
                                <th>complaint_category</th>
                                <th>unit</th>
                                <th>disposition_date</th>
                                <th>disposition_code</th>
                                <th>inspection_date</th>
                                <th>dobrundate</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)



                                @foreach($property->dobComplaints()->limit(5)->get() as $violation)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->complaint_number}}</td>
                                        <td>{{$violation->status}}</td>
                                        <td>{{$violation->date_entered}}</td>
                                        <td>{{$violation->house_number}}</td>
                                        <td>{{$violation->zip_code}}</td>
                                        <td>{{$violation->house_street}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->special_district}}</td>
                                        <td>{{$violation->complaint_category}}</td>
                                        <td>{{$violation->unit}}</td>
                                        <td>{{$violation->disposition_date}}</td>
                                        <td>{{$violation->disposition_code}}</td>
                                        <td>{{$violation->inspection_date}}</td>
                                        <td>{{$violation->dobrundate}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobJobFilings--}}
            7
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>DOB Job Filings
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job__</th>
                                <th>doc__</th>
                                <th>borough</th>
                                <th>house__</th>
                                <th>street_name</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bin__</th>
                                <th>job_type</th>
                                <th>job_status</th>
                                <th>job_status_descrp</th>
                                <th>latest_action_date</th>
                                <th>building_type</th>
                                <th>community___board</th>
                                <th>cluster</th>
                                <th>landmarked</th>
                                <th>adult_estab</th>
                                <th>loft_board</th>
                                <th>city_owned</th>
                                <th>little_e</th>
                                <th>pc_filed</th>
                                <th>efiling_filed</th>
                                <th>plumbing</th>
                                <th>mechanical</th>
                                <th>boiler</th>
                                <th>fuel_burning</th>
                                <th>fuel_storage</th>
                                <th>standpipe</th>
                                <th>sprinkler</th>
                                <th>fire_alarm</th>
                                <th>equipment</th>
                                <th>fire_suppression</th>
                                <th>curb_cut</th>
                                <th>other</th>
                                <th>other_description</th>
                                <th>applicant_s_first_name</th>
                                <th>applicant_s_last_name</th>
                                <th>applicant_professional_title</th>
                                <th>applicant_license__</th>
                                <th>professional_cert</th>
                                <th>pre__filing_date</th>
                                <th>paid</th>
                                <th>fully_paid</th>
                                <th>assigned</th>
                                <th>approved</th>
                                <th>fully_permitted</th>
                                <th>initial_cost</th>
                                <th>total_est__fee</th>
                                <th>fee_status</th>
                                <th>existing_zoning_sqft</th>
                                <th>proposed_zoning_sqft</th>
                                <th>horizontal_enlrgmt</th>
                                <th>vertical_enlrgmt</th>
                                <th>enlargement_sq_footage</th>
                                <th>street_frontage</th>
                                <th>existingno_of_stories</th>
                                <th>proposed_no_of_stories</th>
                                <th>existing_height</th>
                                <th>proposed_height</th>
                                <th>existing_dwelling_units</th>
                                <th>proposed_dwelling_units</th>
                                <th>existing_occupancy</th>
                                <th>proposed_occupancy</th>
                                <th>site_fill</th>
                                <th>zoning_dist1</th>
                                <th>zoning_dist2</th>
                                <th>zoning_dist3</th>
                                <th>special_district_1</th>
                                <th>special_district_2</th>
                                <th>owner_type</th>
                                <th>non_profit</th>
                                <th>owner_s_first_name</th>
                                <th>owner_s_last_name</th>
                                <th>owner_s_business_name</th>
                                <th>owner_s_house_number</th>
                                <th>owner_shouse_street_name</th>
                                <th>city_</th>
                                <th>state</th>
                                <th>zip</th>
                                <th>owner_sphone__</th>
                                <th>job_description</th>
                                <th>dobrundate</th>
                                <th>job_s1_no</th>
                                <th>total_construction_floor_area</th>
                                <th>withdrawal_flag</th>
                                <th>signoff_date</th>
                                <th>special_action_status</th>
                                <th>special_action_date</th>
                                <th>building_class</th>
                                <th>job_no_good_count</th>
                                <th>gis_latitude</th>
                                <th>gis_longitude</th>
                                <th>gis_council_district</th>
                                <th>gis_census_tract</th>
                                <th>gis_nta_name</th>
                                <th>gis_bin</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job__</th>
                                <th>doc__</th>
                                <th>borough</th>
                                <th>house__</th>
                                <th>street_name</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bin__</th>
                                <th>job_type</th>
                                <th>job_status</th>
                                <th>job_status_descrp</th>
                                <th>latest_action_date</th>
                                <th>building_type</th>
                                <th>community___board</th>
                                <th>cluster</th>
                                <th>landmarked</th>
                                <th>adult_estab</th>
                                <th>loft_board</th>
                                <th>city_owned</th>
                                <th>little_e</th>
                                <th>pc_filed</th>
                                <th>efiling_filed</th>
                                <th>plumbing</th>
                                <th>mechanical</th>
                                <th>boiler</th>
                                <th>fuel_burning</th>
                                <th>fuel_storage</th>
                                <th>standpipe</th>
                                <th>sprinkler</th>
                                <th>fire_alarm</th>
                                <th>equipment</th>
                                <th>fire_suppression</th>
                                <th>curb_cut</th>
                                <th>other</th>
                                <th>other_description</th>
                                <th>applicant_s_first_name</th>
                                <th>applicant_s_last_name</th>
                                <th>applicant_professional_title</th>
                                <th>applicant_license__</th>
                                <th>professional_cert</th>
                                <th>pre__filing_date</th>
                                <th>paid</th>
                                <th>fully_paid</th>
                                <th>assigned</th>
                                <th>approved</th>
                                <th>fully_permitted</th>
                                <th>initial_cost</th>
                                <th>total_est__fee</th>
                                <th>fee_status</th>
                                <th>existing_zoning_sqft</th>
                                <th>proposed_zoning_sqft</th>
                                <th>horizontal_enlrgmt</th>
                                <th>vertical_enlrgmt</th>
                                <th>enlargement_sq_footage</th>
                                <th>street_frontage</th>
                                <th>existingno_of_stories</th>
                                <th>proposed_no_of_stories</th>
                                <th>existing_height</th>
                                <th>proposed_height</th>
                                <th>existing_dwelling_units</th>
                                <th>proposed_dwelling_units</th>
                                <th>existing_occupancy</th>
                                <th>proposed_occupancy</th>
                                <th>site_fill</th>
                                <th>zoning_dist1</th>
                                <th>zoning_dist2</th>
                                <th>zoning_dist3</th>
                                <th>special_district_1</th>
                                <th>special_district_2</th>
                                <th>owner_type</th>
                                <th>non_profit</th>
                                <th>owner_s_first_name</th>
                                <th>owner_s_last_name</th>
                                <th>owner_s_business_name</th>
                                <th>owner_s_house_number</th>
                                <th>owner_shouse_street_name</th>
                                <th>city_</th>
                                <th>state</th>
                                <th>zip</th>
                                <th>owner_sphone__</th>
                                <th>job_description</th>
                                <th>dobrundate</th>
                                <th>job_s1_no</th>
                                <th>total_construction_floor_area</th>
                                <th>withdrawal_flag</th>
                                <th>signoff_date</th>
                                <th>special_action_status</th>
                                <th>special_action_date</th>
                                <th>building_class</th>
                                <th>job_no_good_count</th>
                                <th>gis_latitude</th>
                                <th>gis_longitude</th>
                                <th>gis_council_district</th>
                                <th>gis_census_tract</th>
                                <th>gis_nta_name</th>
                                <th>gis_bin</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dobJobFilings()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->job__}}</td>
                                        <td>{{$violation->doc__}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->house__}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->bin__}}</td>
                                        <td>{{$violation->job_type}}</td>
                                        <td>{{$violation->job_status}}</td>
                                        <td>{{$violation->job_status_descrp}}</td>
                                        <td>{{$violation->latest_action_date}}</td>
                                        <td>{{$violation->building_type}}</td>
                                        <td>{{$violation->community___board}}</td>
                                        <td>{{$violation->cluster}}</td>
                                        <td>{{$violation->landmarked}}</td>
                                        <td>{{$violation->adult_estab}}</td>
                                        <td>{{$violation->loft_board}}</td>
                                        <td>{{$violation->city_owned}}</td>
                                        <td>{{$violation->little_e}}</td>
                                        <td>{{$violation->pc_filed}}</td>
                                        <td>{{$violation->efiling_filed}}</td>
                                        <td>{{$violation->plumbing}}</td>
                                        <td>{{$violation->mechanical}}</td>
                                        <td>{{$violation->boiler}}</td>
                                        <td>{{$violation->fuel_burning}}</td>
                                        <td>{{$violation->fuel_storage}}</td>
                                        <td>{{$violation->standpipe}}</td>
                                        <td>{{$violation->sprinkler}}</td>
                                        <td>{{$violation->fire_alarm}}</td>
                                        <td>{{$violation->equipment}}</td>
                                        <td>{{$violation->fire_suppression}}</td>
                                        <td>{{$violation->curb_cut}}</td>
                                        <td>{{$violation->other}}</td>
                                        <td>{{$violation->other_description}}</td>
                                        <td>{{$violation->applicant_s_first_name}}</td>
                                        <td>{{$violation->applicant_s_last_name}}</td>
                                        <td>{{$violation->applicant_professional_title}}</td>
                                        <td>{{$violation->applicant_license__}}</td>
                                        <td>{{$violation->professional_cert}}</td>
                                        <td>{{$violation->pre__filing_date}}</td>
                                        <td>{{$violation->paid}}</td>
                                        <td>{{$violation->fully_paid}}</td>
                                        <td>{{$violation->assigned}}</td>
                                        <td>{{$violation->approved}}</td>
                                        <td>{{$violation->fully_permitted}}</td>
                                        <td>{{$violation->initial_cost}}</td>
                                        <td>{{$violation->total_est__fee}}</td>
                                        <td>{{$violation->fee_status}}</td>
                                        <td>{{$violation->existing_zoning_sqft}}</td>
                                        <td>{{$violation->proposed_zoning_sqft}}</td>
                                        <td>{{$violation->horizontal_enlrgmt}}</td>
                                        <td>{{$violation->vertical_enlrgmt}}</td>
                                        <td>{{$violation->enlargement_sq_footage}}</td>
                                        <td>{{$violation->street_frontage}}</td>
                                        <td>{{$violation->existingno_of_stories}}</td>
                                        <td>{{$violation->proposed_no_of_stories}}</td>
                                        <td>{{$violation->existing_height}}</td>
                                        <td>{{$violation->proposed_height}}</td>
                                        <td>{{$violation->existing_dwelling_units}}</td>
                                        <td>{{$violation->proposed_dwelling_units}}</td>
                                        <td>{{$violation->existing_occupancy}}</td>
                                        <td>{{$violation->proposed_occupancy}}</td>
                                        <td>{{$violation->site_fill}}</td>
                                        <td>{{$violation->zoning_dist1}}</td>
                                        <td>{{$violation->zoning_dist2}}</td>
                                        <td>{{$violation->zoning_dist3}}</td>
                                        <td>{{$violation->special_district_1}}</td>
                                        <td>{{$violation->special_district_2}}</td>
                                        <td>{{$violation->owner_type}}</td>
                                        <td>{{$violation->non_profit}}</td>
                                        <td>{{$violation->owner_s_first_name}}</td>
                                        <td>{{$violation->owner_s_last_name}}</td>
                                        <td>{{$violation->owner_s_business_name}}</td>
                                        <td>{{$violation->owner_s_house_number}}</td>
                                        <td>{{$violation->owner_shouse_street_name}}</td>
                                        <td>{{$violation->city_}}</td>
                                        <td>{{$violation->state}}</td>
                                        <td>{{$violation->zip}}</td>
                                        <td>{{$violation->owner_sphone__}}</td>
                                        <td>{{$violation->job_description}}</td>
                                        <td>{{$violation->dobrundate}}</td>
                                        <td>{{$violation->job_s1_no}}</td>
                                        <td>{{$violation->total_construction_floor_area}}</td>
                                        <td>{{$violation->withdrawal_flag}}</td>
                                        <td>{{$violation->signoff_date}}</td>
                                        <td>{{$violation->special_action_status}}</td>
                                        <td>{{$violation->special_action_date}}</td>
                                        <td>{{$violation->building_class}}</td>
                                        <td>{{$violation->job_no_good_count}}</td>
                                        <td>{{$violation->gis_latitude}}</td>
                                        <td>{{$violation->gis_longitude}}</td>
                                        <td>{{$violation->gis_council_district}}</td>
                                        <td>{{$violation->gis_census_tract}}</td>
                                        <td>{{$violation->gis_nta_name}}</td>
                                        <td>{{$violation->gis_bin}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobNowElectricalPermits--}}
            8
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobNowElectricalPermits
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>job_number</th>
                                <th>filing_number</th>
                                <th>filing_date</th>
                                <th>filing_type</th>
                                <th>filing_status</th>
                                <th>job_status</th>
                                <th>house_number</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>zip_code</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bin</th>
                                <th>community_board</th>
                                <th>joint_venture_work</th>
                                <th>building_use_type</th>
                                <th>applicant_first_name</th>
                                <th>applicant_last_name</th>
                                <th>license_type</th>
                                <th>license_number</th>
                                <th>firm_name</th>
                                <th>firm_number</th>
                                <th>firm_address</th>
                                <th>city</th>
                                <th>state</th>
                                <th>zip</th>
                                <th>general_liability_company</th>
                                <th>general_liability_policy</th>
                                <th>general_liability_expiration</th>
                                <th>worker_comp_company_name</th>
                                <th>worker_comp_policy</th>
                                <th>worker_comp_expiration_date</th>
                                <th>disability_company_name</th>
                                <th>disability_policy</th>
                                <th>disability_expiration_date</th>
                                <th>owner_first_name</th>
                                <th>owner_last_name</th>
                                <th>title</th>
                                <th>business_name</th>
                                <th>owner_address</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>owner_zip</th>
                                <th>owner_type</th>
                                <th>auth_rep_first_name</th>
                                <th>auth_rep_last_name</th>
                                <th>auth_rep_owner_relation</th>
                                <th>coo_related</th>
                                <th>const_bis_job_number</th>
                                <th>removal_of_vio_or_owner</th>
                                <th>svc_work_notify_utility</th>
                                <th>general_wiring</th>
                                <th>lighting_work</th>
                                <th>temp_construction_svc</th>
                                <th>temp_light_power</th>
                                <th>hvac_wiring</th>
                                <th>boiler_burner_wiring</th>
                                <th>category_work_list</th>
                                <th>_3_wire</th>
                                <th>_4_wire</th>
                                <th>_10_points</th>
                                <th>existing_meters</th>
                                <th>new_meters</th>
                                <th>remove_meters</th>
                                <th>total_meters</th>
                                <th>job_description</th>
                                <th>permit_issued_date</th>
                                <th>job_start_date</th>
                                <th>completion_date</th>
                                <th>filing_fee</th>
                                <th>legalization_fee</th>
                                <th>nogood_check_fee</th>
                                <th>total_billable_work_fee</th>
                                <th>amount_paid</th>
                                <th>amount_due</th>
                                <th>payment_method</th>
                                <th>gis_latitude</th>
                                <th>gis_longitude</th>
                                <th>gis_council_district</th>
                                <th>gis_census_tract</th>
                                <th>gis_bin</th>
                                <th>gis_bbl</th>
                                <th>gis_nta_name</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>job_number</th>
                                <th>filing_number</th>
                                <th>filing_date</th>
                                <th>filing_type</th>
                                <th>filing_status</th>
                                <th>job_status</th>
                                <th>house_number</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>zip_code</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bin</th>
                                <th>community_board</th>
                                <th>joint_venture_work</th>
                                <th>building_use_type</th>
                                <th>applicant_first_name</th>
                                <th>applicant_last_name</th>
                                <th>license_type</th>
                                <th>license_number</th>
                                <th>firm_name</th>
                                <th>firm_number</th>
                                <th>firm_address</th>
                                <th>city</th>
                                <th>state</th>
                                <th>zip</th>
                                <th>general_liability_company</th>
                                <th>general_liability_policy</th>
                                <th>general_liability_expiration</th>
                                <th>worker_comp_company_name</th>
                                <th>worker_comp_policy</th>
                                <th>worker_comp_expiration_date</th>
                                <th>disability_company_name</th>
                                <th>disability_policy</th>
                                <th>disability_expiration_date</th>
                                <th>owner_first_name</th>
                                <th>owner_last_name</th>
                                <th>title</th>
                                <th>business_name</th>
                                <th>owner_address</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>owner_zip</th>
                                <th>owner_type</th>
                                <th>auth_rep_first_name</th>
                                <th>auth_rep_last_name</th>
                                <th>auth_rep_owner_relation</th>
                                <th>coo_related</th>
                                <th>const_bis_job_number</th>
                                <th>removal_of_vio_or_owner</th>
                                <th>svc_work_notify_utility</th>
                                <th>general_wiring</th>
                                <th>lighting_work</th>
                                <th>temp_construction_svc</th>
                                <th>temp_light_power</th>
                                <th>hvac_wiring</th>
                                <th>boiler_burner_wiring</th>
                                <th>category_work_list</th>
                                <th>_3_wire</th>
                                <th>_4_wire</th>
                                <th>_10_points</th>
                                <th>existing_meters</th>
                                <th>new_meters</th>
                                <th>remove_meters</th>
                                <th>total_meters</th>
                                <th>job_description</th>
                                <th>permit_issued_date</th>
                                <th>job_start_date</th>
                                <th>completion_date</th>
                                <th>filing_fee</th>
                                <th>legalization_fee</th>
                                <th>nogood_check_fee</th>
                                <th>total_billable_work_fee</th>
                                <th>amount_paid</th>
                                <th>amount_due</th>
                                <th>payment_method</th>
                                <th>gis_latitude</th>
                                <th>gis_longitude</th>
                                <th>gis_council_district</th>
                                <th>gis_census_tract</th>
                                <th>gis_bin</th>
                                <th>gis_bbl</th>
                                <th>gis_nta_name</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dobNowElectricalPermits()->limit(5)->get() as $violation)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->job_filing_number}}</td>
                                        <td>{{$violation->job_number}}</td>
                                        <td>{{$violation->filing_number}}</td>
                                        <td>{{$violation->filing_date}}</td>
                                        <td>{{$violation->filing_type}}</td>
                                        <td>{{$violation->filing_status}}</td>
                                        <td>{{$violation->job_status}}</td>
                                        <td>{{$violation->house_number}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->zip_code}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->joint_venture_work}}</td>
                                        <td>{{$violation->building_use_type}}</td>
                                        <td>{{$violation->applicant_first_name}}</td>
                                        <td>{{$violation->applicant_last_name}}</td>
                                        <td>{{$violation->license_type}}</td>
                                        <td>{{$violation->license_number}}</td>
                                        <td>{{$violation->firm_name}}</td>
                                        <td>{{$violation->firm_number}}</td>
                                        <td>{{$violation->firm_address}}</td>
                                        <td>{{$violation->city}}</td>
                                        <td>{{$violation->state}}</td>
                                        <td>{{$violation->zip}}</td>
                                        <td>{{$violation->general_liability_company}}</td>
                                        <td>{{$violation->general_liability_policy}}</td>
                                        <td>{{$violation->general_liability_expiration}}</td>
                                        <td>{{$violation->worker_comp_company_name}}</td>
                                        <td>{{$violation->worker_comp_policy}}</td>
                                        <td>{{$violation->worker_comp_expiration_date}}</td>
                                        <td>{{$violation->disability_company_name}}</td>
                                        <td>{{$violation->disability_policy}}</td>
                                        <td>{{$violation->disability_expiration_date}}</td>
                                        <td>{{$violation->owner_first_name}}</td>
                                        <td>{{$violation->owner_last_name}}</td>
                                        <td>{{$violation->title}}</td>
                                        <td>{{$violation->business_name}}</td>
                                        <td>{{$violation->owner_address}}</td>
                                        <td>{{$violation->owner_city}}</td>
                                        <td>{{$violation->owner_state}}</td>
                                        <td>{{$violation->owner_zip}}</td>
                                        <td>{{$violation->owner_type}}</td>
                                        <td>{{$violation->auth_rep_first_name}}</td>
                                        <td>{{$violation->auth_rep_last_name}}</td>
                                        <td>{{$violation->auth_rep_owner_relation}}</td>
                                        <td>{{$violation->coo_related}}</td>
                                        <td>{{$violation->const_bis_job_number}}</td>
                                        <td>{{$violation->removal_of_vio_or_owner}}</td>
                                        <td>{{$violation->svc_work_notify_utility}}</td>
                                        <td>{{$violation->general_wiring}}</td>
                                        <td>{{$violation->lighting_work}}</td>
                                        <td>{{$violation->temp_construction_svc}}</td>
                                        <td>{{$violation->temp_light_power}}</td>
                                        <td>{{$violation->hvac_wiring}}</td>
                                        <td>{{$violation->boiler_burner_wiring}}</td>
                                        <td>{{$violation->category_work_list}}</td>
                                        <td>{{$violation->_3_wire}}</td>
                                        <td>{{$violation->_4_wire}}</td>
                                        <td>{{$violation->_10_points}}</td>
                                        <td>{{$violation->existing_meters}}</td>
                                        <td>{{$violation->new_meters}}</td>
                                        <td>{{$violation->remove_meters}}</td>
                                        <td>{{$violation->total_meters}}</td>
                                        <td>{{$violation->job_description}}</td>
                                        <td>{{$violation->permit_issued_date}}</td>
                                        <td>{{$violation->job_start_date}}</td>
                                        <td>{{$violation->completion_date}}</td>
                                        <td>{{$violation->filing_fee}}</td>
                                        <td>{{$violation->legalization_fee}}</td>
                                        <td>{{$violation->nogood_check_fee}}</td>
                                        <td>{{$violation->total_billable_work_fee}}</td>
                                        <td>{{$violation->amount_paid}}</td>
                                        <td>{{$violation->amount_due}}</td>
                                        <td>{{$violation->payment_method}}</td>
                                        <td>{{$violation->gis_latitude}}</td>
                                        <td>{{$violation->gis_longitude}}</td>
                                        <td>{{$violation->gis_council_district}}</td>
                                        <td>{{$violation->gis_census_tract}}</td>
                                        <td>{{$violation->gis_bin}}</td>
                                        <td>{{$violation->gis_bbl}}</td>
                                        <td>{{$violation->gis_nta_name}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobNowElevatorPermits--}}
            9
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobNowElevatorPermits
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>job_number</th>
                                <th>filing_number</th>
                                <th>filing_date</th>
                                <th>filing_type</th>
                                <th>elevatordevicetype</th>
                                <th>filing_status</th>
                                <th>filingstatus_or_filingincludes</th>
                                <th>building_code</th>
                                <th>electrical_permit_number</th>
                                <th>bin</th>
                                <th>house_number</th>
                                <th>street_name</th>
                                <th>zip</th>
                                <th>borough</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>building_type</th>
                                <th>buildingstories</th>
                                <th>is_in_conjunction</th>
                                <th>associatedjobnumber</th>
                                <th>total_construction_floor</th>
                                <th>plan_examiner_assigned_date</th>
                                <th>incomplete_date</th>
                                <th>last_incomplete_submission</th>
                                <th>first_objection_date</th>
                                <th>last_objection_date</th>
                                <th>resubmission_date</th>
                                <th>permit_entire_date</th>
                                <th>signedoff_date</th>
                                <th>applicant_firstname</th>
                                <th>applicant_lastname</th>
                                <th>applicant_businessname</th>
                                <th>applicant_address</th>
                                <th>applicant_city</th>
                                <th>applicant_state</th>
                                <th>applicant_zip</th>
                                <th>applicant_license_number</th>
                                <th>designprofessional_firstname</th>
                                <th>designprofessional_lastname</th>
                                <th>designprofessional</th>
                                <th>designprofessional_address</th>
                                <th>designprofessional_city</th>
                                <th>designprofessional_state</th>
                                <th>designprofessional_zip</th>
                                <th>designprofessional_license</th>
                                <th>owner_firstname</th>
                                <th>owner_lastname</th>
                                <th>owner_title</th>
                                <th>owner_businessname</th>
                                <th>owner_address</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>owner_zip</th>
                                <th>owner_type</th>
                                <th>asbestosabatementcompliance</th>
                                <th>depacp5controlno</th>
                                <th>descriptionofwork</th>
                                <th>gl_company</th>
                                <th>gl_policy</th>
                                <th>gl_expirationdate</th>
                                <th>worker_compensation_company</th>
                                <th>worker_compensation_policy</th>
                                <th>worker_compensation</th>
                                <th>disability_company</th>
                                <th>disability_policy</th>
                                <th>disability_expirationdate</th>
                                <th>estimated_cost</th>
                                <th>filing_fee</th>
                                <th>no_good_check</th>
                                <th>total_fee</th>
                                <th>amount_paid</th>
                                <th>amount_due</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>community_district_number</th>
                                <th>city_council_district</th>
                                <th>census_tract</th>
                                <th>bbl</th>
                                <th>nta_name</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>job_number</th>
                                <th>filing_number</th>
                                <th>filing_date</th>
                                <th>filing_type</th>
                                <th>elevatordevicetype</th>
                                <th>filing_status</th>
                                <th>filingstatus_or_filingincludes</th>
                                <th>building_code</th>
                                <th>electrical_permit_number</th>
                                <th>bin</th>
                                <th>house_number</th>
                                <th>street_name</th>
                                <th>zip</th>
                                <th>borough</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>building_type</th>
                                <th>buildingstories</th>
                                <th>is_in_conjunction</th>
                                <th>associatedjobnumber</th>
                                <th>total_construction_floor</th>
                                <th>plan_examiner_assigned_date</th>
                                <th>incomplete_date</th>
                                <th>last_incomplete_submission</th>
                                <th>first_objection_date</th>
                                <th>last_objection_date</th>
                                <th>resubmission_date</th>
                                <th>permit_entire_date</th>
                                <th>signedoff_date</th>
                                <th>applicant_firstname</th>
                                <th>applicant_lastname</th>
                                <th>applicant_businessname</th>
                                <th>applicant_address</th>
                                <th>applicant_city</th>
                                <th>applicant_state</th>
                                <th>applicant_zip</th>
                                <th>applicant_license_number</th>
                                <th>designprofessional_firstname</th>
                                <th>designprofessional_lastname</th>
                                <th>designprofessional</th>
                                <th>designprofessional_address</th>
                                <th>designprofessional_city</th>
                                <th>designprofessional_state</th>
                                <th>designprofessional_zip</th>
                                <th>designprofessional_license</th>
                                <th>owner_firstname</th>
                                <th>owner_lastname</th>
                                <th>owner_title</th>
                                <th>owner_businessname</th>
                                <th>owner_address</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>owner_zip</th>
                                <th>owner_type</th>
                                <th>asbestosabatementcompliance</th>
                                <th>depacp5controlno</th>
                                <th>descriptionofwork</th>
                                <th>gl_company</th>
                                <th>gl_policy</th>
                                <th>gl_expirationdate</th>
                                <th>worker_compensation_company</th>
                                <th>worker_compensation_policy</th>
                                <th>worker_compensation</th>
                                <th>disability_company</th>
                                <th>disability_policy</th>
                                <th>disability_expirationdate</th>
                                <th>estimated_cost</th>
                                <th>filing_fee</th>
                                <th>no_good_check</th>
                                <th>total_fee</th>
                                <th>amount_paid</th>
                                <th>amount_due</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>community_district_number</th>
                                <th>city_council_district</th>
                                <th>census_tract</th>
                                <th>bbl</th>
                                <th>nta_name</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dobNowElevatorPermits()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->job_filing_number}}</td>
                                        <td>{{$violation->job_number}}</td>
                                        <td>{{$violation->filing_number}}</td>
                                        <td>{{$violation->filing_date}}</td>
                                        <td>{{$violation->filing_type}}</td>
                                        <td>{{$violation->elevatordevicetype}}</td>
                                        <td>{{$violation->filing_status}}</td>
                                        <td>{{$violation->filingstatus_or_filingincludes}}</td>
                                        <td>{{$violation->building_code}}</td>
                                        <td>{{$violation->electrical_permit_number}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->house_number}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->zip}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->building_type}}</td>
                                        <td>{{$violation->buildingstories}}</td>
                                        <td>{{$violation->is_in_conjunction}}</td>
                                        <td>{{$violation->associatedjobnumber}}</td>
                                        <td>{{$violation->total_construction_floor}}</td>
                                        <td>{{$violation->plan_examiner_assigned_date}}</td>
                                        <td>{{$violation->incomplete_date}}</td>
                                        <td>{{$violation->last_incomplete_submission}}</td>
                                        <td>{{$violation->first_objection_date}}</td>
                                        <td>{{$violation->last_objection_date}}</td>
                                        <td>{{$violation->resubmission_date}}</td>
                                        <td>{{$violation->permit_entire_date}}</td>
                                        <td>{{$violation->signedoff_date}}</td>
                                        <td>{{$violation->applicant_firstname}}</td>
                                        <td>{{$violation->applicant_lastname}}</td>
                                        <td>{{$violation->applicant_businessname}}</td>
                                        <td>{{$violation->applicant_address}}</td>
                                        <td>{{$violation->applicant_city}}</td>
                                        <td>{{$violation->applicant_state}}</td>
                                        <td>{{$violation->applicant_zip}}</td>
                                        <td>{{$violation->applicant_license_number}}</td>
                                        <td>{{$violation->designprofessional_firstname}}</td>
                                        <td>{{$violation->designprofessional_lastname}}</td>
                                        <td>{{$violation->designprofessional}}</td>
                                        <td>{{$violation->designprofessional_address}}</td>
                                        <td>{{$violation->designprofessional_city}}</td>
                                        <td>{{$violation->designprofessional_state}}</td>
                                        <td>{{$violation->designprofessional_zip}}</td>
                                        <td>{{$violation->designprofessional_license}}</td>
                                        <td>{{$violation->owner_firstname}}</td>
                                        <td>{{$violation->owner_lastname}}</td>
                                        <td>{{$violation->owner_title}}</td>
                                        <td>{{$violation->owner_businessname}}</td>
                                        <td>{{$violation->owner_address}}</td>
                                        <td>{{$violation->owner_city}}</td>
                                        <td>{{$violation->owner_state}}</td>
                                        <td>{{$violation->owner_zip}}</td>
                                        <td>{{$violation->owner_type}}</td>
                                        <td>{{$violation->asbestosabatementcompliance}}</td>
                                        <td>{{$violation->depacp5controlno}}</td>
                                        <td>{{$violation->descriptionofwork}}</td>
                                        <td>{{$violation->gl_company}}</td>
                                        <td>{{$violation->gl_policy}}</td>
                                        <td>{{$violation->gl_expirationdate}}</td>
                                        <td>{{$violation->worker_compensation_company}}</td>
                                        <td>{{$violation->worker_compensation_policy}}</td>
                                        <td>{{$violation->worker_compensation}}</td>
                                        <td>{{$violation->disability_company}}</td>
                                        <td>{{$violation->disability_policy}}</td>
                                        <td>{{$violation->disability_expirationdate}}</td>
                                        <td>{{$violation->estimated_cost}}</td>
                                        <td>{{$violation->filing_fee}}</td>
                                        <td>{{$violation->no_good_check}}</td>
                                        <td>{{$violation->total_fee}}</td>
                                        <td>{{$violation->amount_paid}}</td>
                                        <td>{{$violation->amount_due}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->community_district_number}}</td>
                                        <td>{{$violation->city_council_district}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->nta_name}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobNowJobFilings--}}
            10
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobNowJobFilings
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>filing_status</th>
                                <th>house_no</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bin</th>
                                <th>commmunity_board</th>
                                <th>work_on_floor</th>
                                <th>apt_condo_no_s</th>
                                <th>applicant_professional_title</th>
                                <th>applicant_license</th>
                                <th>applicant_first_name</th>
                                <th>applicants_middle_initial</th>
                                <th>applicant_last_name</th>
                                <th>owner_s_business_name</th>
                                <th>owner_s_street_name</th>
                                <th>city</th>
                                <th>state</th>
                                <th>zip</th>
                                <th>filing_representative_first_name</th>
                                <th>filing_representative_middle_initial</th>
                                <th>filing_representative_last_name</th>
                                <th>filing_representative_business_name</th>
                                <th>filing_representative_street_name</th>
                                <th>filing_representative_city</th>
                                <th>filing_representative_state</th>
                                <th>filing_representative_zip</th>
                                <th>sprinkler_work_type</th>
                                <th>plumbing_work_type</th>
                                <th>initial_cost</th>
                                <th>total_construction_floor_area</th>
                                <th>review_building_code</th>
                                <th>little_e</th>
                                <th>unmapped_cco_street</th>
                                <th>request_legalization</th>
                                <th>includes_permanent_removal</th>
                                <th>in_compliance_with_nycecc</th>
                                <th>exempt_from_nycecc</th>
                                <th>building_type</th>
                                <th>existing_stories</th>
                                <th>existing_height</th>
                                <th>existing_dwelling_units</th>
                                <th>proposed_no_of_stories</th>
                                <th>proposed_height</th>
                                <th>proposed_dwelling_units</th>
                                <th>specialinspectionrequirement</th>
                                <th>special_inspection_agency_number</th>
                                <th>progressinspectionrequirement</th>
                                <th>built_1_information_value</th>
                                <th>built_2_information_value</th>
                                <th>built_2_a_information_value</th>
                                <th>built_2_b_information_value</th>
                                <th>standpipe</th>
                                <th>antenna</th>
                                <th>curb_cut</th>
                                <th>sign</th>
                                <th>fence</th>
                                <th>scaffold</th>
                                <th>shed</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>nta</th>
                                <th>bin_2</th>


                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>job_filing_number</th>
                                <th>filing_status</th>
                                <th>house_no</th>
                                <th>street_name</th>
                                <th>borough</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bin</th>
                                <th>commmunity_board</th>
                                <th>work_on_floor</th>
                                <th>apt_condo_no_s</th>
                                <th>applicant_professional_title</th>
                                <th>applicant_license</th>
                                <th>applicant_first_name</th>
                                <th>applicants_middle_initial</th>
                                <th>applicant_last_name</th>
                                <th>owner_s_business_name</th>
                                <th>owner_s_street_name</th>
                                <th>city</th>
                                <th>state</th>
                                <th>zip</th>
                                <th>filing_representative_first_name</th>
                                <th>filing_representative_middle_initial</th>
                                <th>filing_representative_last_name</th>
                                <th>filing_representative_business_name</th>
                                <th>filing_representative_street_name</th>
                                <th>filing_representative_city</th>
                                <th>filing_representative_state</th>
                                <th>filing_representative_zip</th>
                                <th>sprinkler_work_type</th>
                                <th>plumbing_work_type</th>
                                <th>initial_cost</th>
                                <th>total_construction_floor_area</th>
                                <th>review_building_code</th>
                                <th>little_e</th>
                                <th>unmapped_cco_street</th>
                                <th>request_legalization</th>
                                <th>includes_permanent_removal</th>
                                <th>in_compliance_with_nycecc</th>
                                <th>exempt_from_nycecc</th>
                                <th>building_type</th>
                                <th>existing_stories</th>
                                <th>existing_height</th>
                                <th>existing_dwelling_units</th>
                                <th>proposed_no_of_stories</th>
                                <th>proposed_height</th>
                                <th>proposed_dwelling_units</th>
                                <th>specialinspectionrequirement</th>
                                <th>special_inspection_agency_number</th>
                                <th>progressinspectionrequirement</th>
                                <th>built_1_information_value</th>
                                <th>built_2_information_value</th>
                                <th>built_2_a_information_value</th>
                                <th>built_2_b_information_value</th>
                                <th>standpipe</th>
                                <th>antenna</th>
                                <th>curb_cut</th>
                                <th>sign</th>
                                <th>fence</th>
                                <th>scaffold</th>
                                <th>shed</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>nta</th>
                                <th>bin_2</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dobNowJobFilings()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->job_filing_number}}</td>
                                        <td>{{$violation->filing_status}}</td>
                                        <td>{{$violation->house_no}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->commmunity_board}}</td>
                                        <td>{{$violation->work_on_floor}}</td>
                                        <td>{{$violation->apt_condo_no_s}}</td>
                                        <td>{{$violation->applicant_professional_title}}</td>
                                        <td>{{$violation->applicant_license}}</td>
                                        <td>{{$violation->applicant_first_name}}</td>
                                        <td>{{$violation->applicants_middle_initial}}</td>
                                        <td>{{$violation->applicant_last_name}}</td>
                                        <td>{{$violation->owner_s_business_name}}</td>
                                        <td>{{$violation->owner_s_street_name}}</td>
                                        <td>{{$violation->city}}</td>
                                        <td>{{$violation->state}}</td>
                                        <td>{{$violation->zip}}</td>
                                        <td>{{$violation->filing_representative_first_name}}</td>
                                        <td>{{$violation->filing_representative_middle_initial}}</td>
                                        <td>{{$violation->filing_representative_last_name}}</td>
                                        <td>{{$violation->filing_representative_business_name}}</td>
                                        <td>{{$violation->filing_representative_street_name}}</td>
                                        <td>{{$violation->filing_representative_city}}</td>
                                        <td>{{$violation->filing_representative_state}}</td>
                                        <td>{{$violation->filing_representative_zip}}</td>
                                        <td>{{$violation->sprinkler_work_type}}</td>
                                        <td>{{$violation->plumbing_work_type}}</td>
                                        <td>{{$violation->initial_cost}}</td>
                                        <td>{{$violation->total_construction_floor_area}}</td>
                                        <td>{{$violation->review_building_code}}</td>
                                        <td>{{$violation->little_e}}</td>
                                        <td>{{$violation->unmapped_cco_street}}</td>
                                        <td>{{$violation->request_legalization}}</td>
                                        <td>{{$violation->includes_permanent_removal}}</td>
                                        <td>{{$violation->in_compliance_with_nycecc}}</td>
                                        <td>{{$violation->exempt_from_nycecc}}</td>
                                        <td>{{$violation->building_type}}</td>
                                        <td>{{$violation->existing_stories}}</td>
                                        <td>{{$violation->existing_height}}</td>
                                        <td>{{$violation->existing_dwelling_units}}</td>
                                        <td>{{$violation->proposed_no_of_stories}}</td>
                                        <td>{{$violation->proposed_height}}</td>
                                        <td>{{$violation->proposed_dwelling_units}}</td>
                                        <td>{{$violation->specialinspectionrequirement}}</td>
                                        <td>{{$violation->special_inspection_agency_number}}</td>
                                        <td>{{$violation->progressinspectionrequirement}}</td>
                                        <td>{{$violation->built_1_information_value}}</td>
                                        <td>{{$violation->built_2_information_value}}</td>
                                        <td>{{$violation->built_2_a_information_value}}</td>
                                        <td>{{$violation->built_2_b_information_value}}</td>
                                        <td>{{$violation->standpipe}}</td>
                                        <td>{{$violation->antenna}}</td>
                                        <td>{{$violation->curb_cut}}</td>
                                        <td>{{$violation->sign}}</td>
                                        <td>{{$violation->fence}}</td>
                                        <td>{{$violation->scaffold}}</td>
                                        <td>{{$violation->shed}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->bin_2}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobNowSafetyBoiler--}}
            11
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobNowSafetyBoiler
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>tracking_number</th>
                                <th>boiler_id</th>
                                <th>report_type</th>
                                <th>applicantfirst_name</th>
                                <th>applicant_last_name</th>
                                <th>applicant_license_type</th>
                                <th>applicant_license_number</th>
                                <th>owner_first_name</th>
                                <th>owner_last_name</th>
                                <th>boiler_make</th>
                                <th>boiler_model</th>
                                <th>pressure_type</th>
                                <th>inspection_type</th>
                                <th>inspection_date</th>
                                <th>defects_exist</th>
                                <th>lff_45_days</th>
                                <th>lff_180_days</th>
                                <th>filing_fee</th>
                                <th>total_amount_paid</th>
                                <th>report_status</th>
                                <th>bin_number</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>tracking_number</th>
                                <th>boiler_id</th>
                                <th>report_type</th>
                                <th>applicantfirst_name</th>
                                <th>applicant_last_name</th>
                                <th>applicant_license_type</th>
                                <th>applicant_license_number</th>
                                <th>owner_first_name</th>
                                <th>owner_last_name</th>
                                <th>boiler_make</th>
                                <th>boiler_model</th>
                                <th>pressure_type</th>
                                <th>inspection_type</th>
                                <th>inspection_date</th>
                                <th>defects_exist</th>
                                <th>lff_45_days</th>
                                <th>lff_180_days</th>
                                <th>filing_fee</th>
                                <th>total_amount_paid</th>
                                <th>report_status</th>
                                <th>bin_number</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dobNowSafetyBoiler()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->tracking_number}}</td>
                                        <td>{{$violation->boiler_id}}</td>
                                        <td>{{$violation->report_type}}</td>
                                        <td>{{$violation->applicantfirst_name}}</td>
                                        <td>{{$violation->applicant_last_name}}</td>
                                        <td>{{$violation->applicant_license_type}}</td>
                                        <td>{{$violation->applicant_license_number}}</td>
                                        <td>{{$violation->owner_first_name}}</td>
                                        <td>{{$violation->owner_last_name}}</td>
                                        <td>{{$violation->boiler_make}}</td>
                                        <td>{{$violation->boiler_model}}</td>
                                        <td>{{$violation->pressure_type}}</td>
                                        <td>{{$violation->inspection_type}}</td>
                                        <td>{{$violation->inspection_date}}</td>
                                        <td>{{$violation->defects_exist}}</td>
                                        <td>{{$violation->lff_45_days}}</td>
                                        <td>{{$violation->lff_180_days}}</td>
                                        <td>{{$violation->filing_fee}}</td>
                                        <td>{{$violation->total_amount_paid}}</td>
                                        <td>{{$violation->report_status}}</td>
                                        <td>{{$violation->bin_number}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dobPermits--}}
            12
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dobPermits
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>borough</th>
                                <th>bin__</th>
                                <th>house__</th>
                                <th>street_name</th>
                                <th>job__</th>
                                <th>job_doc___</th>
                                <th>job_type</th>
                                <th>self_cert</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>community_board</th>
                                <th>zip_code</th>
                                <th>bldg_type</th>
                                <th>residential</th>
                                <th>special_district_1</th>
                                <th>special_district_2</th>
                                <th>work_type</th>
                                <th>permit_status</th>
                                <th>filing_status</th>
                                <th>permit_type</th>
                                <th>permit_sequence__</th>
                                <th>permit_subtype</th>
                                <th>oil_gas</th>
                                <th>site_fill</th>
                                <th>filing_date</th>
                                <th>issuance_date</th>
                                <th>expiration_date</th>
                                <th>job_start_date</th>
                                <th>permittee_s_first_name</th>
                                <th>permittee_s_last_name</th>
                                <th>permittee_s_business_name</th>
                                <th>permittee_s_phone__</th>
                                <th>permittee_s_license_type</th>
                                <th>permittee_s_license__</th>
                                <th>act_as_superintendent</th>
                                <th>permittee_s_other_title</th>
                                <th>hic_license</th>
                                <th>site_safety_mgr_s_first_name</th>
                                <th>site_safety_mgr_s_last_name</th>
                                <th>site_safety_mgr_business_name</th>
                                <th>superintendent_first___last_name</th>
                                <th>superintendent_business_name</th>
                                <th>owner_s_business_type</th>
                                <th>non_profit</th>
                                <th>owner_s_business_name</th>
                                <th>owner_s_first_name</th>
                                <th>owner_s_last_name</th>
                                <th>owner_s_house__</th>
                                <th>owner_s_house_street_name</th>
                                <th>city</th>
                                <th>state</th>
                                <th>owner_s_zip_code</th>
                                <th>owner_s_phone__</th>
                                <th>dobrundate</th>
                                <th>permit_si_no</th>
                                <th>gis_latitude</th>
                                <th>gis_longitude</th>
                                <th>gis_council_district</th>
                                <th>gis_census_tract</th>
                                <th>gis_nta_name</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>borough</th>
                                <th>bin__</th>
                                <th>house__</th>
                                <th>street_name</th>
                                <th>job__</th>
                                <th>job_doc___</th>
                                <th>job_type</th>
                                <th>self_cert</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>community_board</th>
                                <th>zip_code</th>
                                <th>bldg_type</th>
                                <th>residential</th>
                                <th>special_district_1</th>
                                <th>special_district_2</th>
                                <th>work_type</th>
                                <th>permit_status</th>
                                <th>filing_status</th>
                                <th>permit_type</th>
                                <th>permit_sequence__</th>
                                <th>permit_subtype</th>
                                <th>oil_gas</th>
                                <th>site_fill</th>
                                <th>filing_date</th>
                                <th>issuance_date</th>
                                <th>expiration_date</th>
                                <th>job_start_date</th>
                                <th>permittee_s_first_name</th>
                                <th>permittee_s_last_name</th>
                                <th>permittee_s_business_name</th>
                                <th>permittee_s_phone__</th>
                                <th>permittee_s_license_type</th>
                                <th>permittee_s_license__</th>
                                <th>act_as_superintendent</th>
                                <th>permittee_s_other_title</th>
                                <th>hic_license</th>
                                <th>site_safety_mgr_s_first_name</th>
                                <th>site_safety_mgr_s_last_name</th>
                                <th>site_safety_mgr_business_name</th>
                                <th>superintendent_first___last_name</th>
                                <th>superintendent_business_name</th>
                                <th>owner_s_business_type</th>
                                <th>non_profit</th>
                                <th>owner_s_business_name</th>
                                <th>owner_s_first_name</th>
                                <th>owner_s_last_name</th>
                                <th>owner_s_house__</th>
                                <th>owner_s_house_street_name</th>
                                <th>city</th>
                                <th>state</th>
                                <th>owner_s_zip_code</th>
                                <th>owner_s_phone__</th>
                                <th>dobrundate</th>
                                <th>permit_si_no</th>
                                <th>gis_latitude</th>
                                <th>gis_longitude</th>
                                <th>gis_council_district</th>
                                <th>gis_census_tract</th>
                                <th>gis_nta_name</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dobPermits()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->bin__}}</td>
                                        <td>{{$violation->house__}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->job__}}</td>
                                        <td>{{$violation->job_doc___}}</td>
                                        <td>{{$violation->job_type}}</td>
                                        <td>{{$violation->self_cert}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->zip_code}}</td>
                                        <td>{{$violation->bldg_type}}</td>
                                        <td>{{$violation->residential}}</td>
                                        <td>{{$violation->special_district_1}}</td>
                                        <td>{{$violation->special_district_2}}</td>
                                        <td>{{$violation->work_type}}</td>
                                        <td>{{$violation->permit_status}}</td>
                                        <td>{{$violation->filing_status}}</td>
                                        <td>{{$violation->permit_type}}</td>
                                        <td>{{$violation->permit_sequence__}}</td>
                                        <td>{{$violation->permit_subtype}}</td>
                                        <td>{{$violation->oil_gas}}</td>
                                        <td>{{$violation->site_fill}}</td>
                                        <td>{{$violation->filing_date}}</td>
                                        <td>{{$violation->issuance_date}}</td>
                                        <td>{{$violation->expiration_date}}</td>
                                        <td>{{$violation->job_start_date}}</td>
                                        <td>{{$violation->permittee_s_first_name}}</td>
                                        <td>{{$violation->permittee_s_last_name}}</td>
                                        <td>{{$violation->permittee_s_business_name}}</td>
                                        <td>{{$violation->permittee_s_phone__}}</td>
                                        <td>{{$violation->permittee_s_license_type}}</td>
                                        <td>{{$violation->permittee_s_license__}}</td>
                                        <td>{{$violation->act_as_superintendent}}</td>
                                        <td>{{$violation->permittee_s_other_title}}</td>
                                        <td>{{$violation->hic_license}}</td>
                                        <td>{{$violation->site_safety_mgr_s_first_name}}</td>
                                        <td>{{$violation->site_safety_mgr_s_last_name}}</td>
                                        <td>{{$violation->site_safety_mgr_business_name}}</td>
                                        <td>{{$violation->superintendent_first___last_name}}</td>
                                        <td>{{$violation->superintendent_business_name}}</td>
                                        <td>{{$violation->owner_s_business_type}}</td>
                                        <td>{{$violation->non_profit}}</td>
                                        <td>{{$violation->owner_s_business_name}}</td>
                                        <td>{{$violation->owner_s_first_name}}</td>
                                        <td>{{$violation->owner_s_last_name}}</td>
                                        <td>{{$violation->owner_s_house__}}</td>
                                        <td>{{$violation->owner_s_house_street_name}}</td>
                                        <td>{{$violation->city}}</td>
                                        <td>{{$violation->state}}</td>
                                        <td>{{$violation->owner_s_zip_code}}</td>
                                        <td>{{$violation->owner_s_phone__}}</td>
                                        <td>{{$violation->dobrundate}}</td>
                                        <td>{{$violation->permit_si_no}}</td>
                                        <td>{{$violation->gis_latitude}}</td>
                                        <td>{{$violation->gis_longitude}}</td>
                                        <td>{{$violation->gis_council_district}}</td>
                                        <td>{{$violation->gis_census_tract}}</td>
                                        <td>{{$violation->gis_nta_name}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dotSidewalkCorrespondences--}}
            13
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dotSidewalkCorrespondences
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>ccu</th>
                                <th>nta</th>
                                <th>longitude</th>
                                <th>violation</th>
                                <th>bbl</th>
                                <th>council_district</th>
                                <th>cross_streets</th>
                                <th>issue</th>
                                <th>bc</th>
                                <th>sim</th>
                                <th>borough</th>
                                <th>osm</th>
                                <th>other_log</th>
                                <th>referred_routed_to</th>
                                <th>date_closed</th>
                                <th>postcode</th>
                                <th>class</th>
                                <th>community_board</th>
                                <th>results_of_inspection</th>
                                <th>address</th>
                                <th>resoultion</th>
                                <th>bin</th>
                                <th>census_tract</th>
                                <th>latitude</th>
                                <th>lot</th>
                                <th>block</th>
                                <th>date_received</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>ccu</th>
                                <th>nta</th>
                                <th>longitude</th>
                                <th>violation</th>
                                <th>bbl</th>
                                <th>council_district</th>
                                <th>cross_streets</th>
                                <th>issue</th>
                                <th>bc</th>
                                <th>sim</th>
                                <th>borough</th>
                                <th>osm</th>
                                <th>other_log</th>
                                <th>referred_routed_to</th>
                                <th>date_closed</th>
                                <th>postcode</th>
                                <th>class</th>
                                <th>community_board</th>
                                <th>results_of_inspection</th>
                                <th>address</th>
                                <th>resoultion</th>
                                <th>bin</th>
                                <th>census_tract</th>
                                <th>latitude</th>
                                <th>lot</th>
                                <th>block</th>
                                <th>date_received</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dotSidewalkCorrespondences()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->ccu}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->violation}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->cross_streets}}</td>
                                        <td>{{$violation->issue}}</td>
                                        <td>{{$violation->bc}}</td>
                                        <td>{{$violation->sim}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->osm}}</td>
                                        <td>{{$violation->other_log}}</td>
                                        <td>{{$violation->referred_routed_to}}</td>
                                        <td>{{$violation->date_closed}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->class}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->results_of_inspection}}</td>
                                        <td>{{$violation->address}}</td>
                                        <td>{{$violation->resoultion}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->date_received}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--            dotSidewalkInspections--}}
            14
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>dotSidewalkInspections
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>census_tract</th>
                                <th>council_district</th>
                                <th>latitude</th>
                                <th>postcode</th>
                                <th>vdd</th>
                                <th>nta</th>
                                <th>borough</th>
                                <th>sr</th>
                                <th>bbl</th>
                                <th>bin</th>
                                <th>inspection_date</th>
                                <th>community_board</th>
                                <th>date_results_are_mailed</th>
                                <th>reason_for_failure</th>
                                <th>pass_fail</th>
                                <th>assigned_date</th>
                                <th>violation_issue_date</th>
                                <th>attempt</th>
                                <th>violation</th>
                                <th>lot</th>
                                <th>block</th>
                                <th>borocode</th>
                                <th>site_street_address</th>
                                <th>request_date</th>
                                <th>car_needed_y_n</th>
                                <th>longitude</th>
                                <th>homeowner_contractor</th>
                                <th>permit</th>
                                <th>expedited'</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>census_tract</th>
                                <th>council_district</th>
                                <th>latitude</th>
                                <th>postcode</th>
                                <th>vdd</th>
                                <th>nta</th>
                                <th>borough</th>
                                <th>sr</th>
                                <th>bbl</th>
                                <th>bin</th>
                                <th>inspection_date</th>
                                <th>community_board</th>
                                <th>date_results_are_mailed</th>
                                <th>reason_for_failure</th>
                                <th>pass_fail</th>
                                <th>assigned_date</th>
                                <th>violation_issue_date</th>
                                <th>attempt</th>
                                <th>violation</th>
                                <th>lot</th>
                                <th>block</th>
                                <th>borocode</th>
                                <th>site_street_address</th>
                                <th>request_date</th>
                                <th>car_needed_y_n</th>
                                <th>longitude</th>
                                <th>homeowner_contractor</th>
                                <th>permit</th>
                                <th>expedited'</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->dotSidewalkInspections()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->vdd}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->sr}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->inspection_date}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->date_results_are_mailed}}</td>
                                        <td>{{$violation->reason_for_failure}}</td>
                                        <td>{{$violation->pass_fail}}</td>
                                        <td>{{$violation->assigned_date}}</td>
                                        <td>{{$violation->violation_issue_date}}</td>
                                        <td>{{$violation->attempt}}</td>
                                        <td>{{$violation->violation}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->borocode}}</td>
                                        <td>{{$violation->site_street_address}}</td>
                                        <td>{{$violation->request_date}}</td>
                                        <td>{{$violation->car_needed_y_n}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->homeowner_contractor}}</td>
                                        <td>{{$violation->permit}}</td>
                                        <td>{{$violation->expedited}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--ecbViolations --}}
            15
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>ecbViolations
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>isn_dob_bis_extract</th>
                                <th>ecb_violation_number</th>
                                <th>ecb_violation_status</th>
                                <th>dob_violation_number</th>
                                <th>bin</th>
                                <th>boro</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bbl</th>
                                <th>hearing_date</th>
                                <th>hearing_time</th>
                                <th>served_date</th>
                                <th>issue_date</th>
                                <th>severity</th>
                                <th>violation_type</th>
                                <th>respondent_name</th>
                                <th>respondent_house_number</th>
                                <th>respondent_street</th>
                                <th>respondent_city</th>
                                <th>respondent_zip</th>
                                <th>violation_description</th>
                                <th>penality_imposed</th>
                                <th>amount_paid</th>
                                <th>balance_due</th>
                                <th>infraction_code1</th>
                                <th>section_law_description1</th>
                                <th>infraction_code2</th>
                                <th>section_law_description2</th>
                                <th>infraction_code3</th>
                                <th>section_law_description3</th>
                                <th>infraction_code4</th>
                                <th>section_law_description4</th>
                                <th>infraction_code5</th>
                                <th>section_law_description5</th>
                                <th>infraction_code6</th>
                                <th>section_law_description6</th>
                                <th>infraction_code7</th>
                                <th>section_law_description7</th>
                                <th>infraction_code8</th>
                                <th>section_law_description8</th>
                                <th>infraction_code9</th>
                                <th>section_law_description9</th>
                                <th>infraction_code10</th>
                                <th>section_law_description10</th>
                                <th>aggravated_level</th>
                                <th>hearing_status</th>
                                <th>certification_status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>isn_dob_bis_extract</th>
                                <th>ecb_violation_number</th>
                                <th>ecb_violation_status</th>
                                <th>dob_violation_number</th>
                                <th>bin</th>
                                <th>boro</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>bbl</th>
                                <th>hearing_date</th>
                                <th>hearing_time</th>
                                <th>served_date</th>
                                <th>issue_date</th>
                                <th>severity</th>
                                <th>violation_type</th>
                                <th>respondent_name</th>
                                <th>respondent_house_number</th>
                                <th>respondent_street</th>
                                <th>respondent_city</th>
                                <th>respondent_zip</th>
                                <th>violation_description</th>
                                <th>penality_imposed</th>
                                <th>amount_paid</th>
                                <th>balance_due</th>
                                <th>infraction_code1</th>
                                <th>section_law_description1</th>
                                <th>infraction_code2</th>
                                <th>section_law_description2</th>
                                <th>infraction_code3</th>
                                <th>section_law_description3</th>
                                <th>infraction_code4</th>
                                <th>section_law_description4</th>
                                <th>infraction_code5</th>
                                <th>section_law_description5</th>
                                <th>infraction_code6</th>
                                <th>section_law_description6</th>
                                <th>infraction_code7</th>
                                <th>section_law_description7</th>
                                <th>infraction_code8</th>
                                <th>section_law_description8</th>
                                <th>infraction_code9</th>
                                <th>section_law_description9</th>
                                <th>infraction_code10</th>
                                <th>section_law_description10</th>
                                <th>aggravated_level</th>
                                <th>hearing_status</th>
                                <th>certification_status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->ecbViolations()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->isn_dob_bis_extract}}</td>
                                        <td>{{$violation->ecb_violation_number}}</td>
                                        <td>{{$violation->ecb_violation_status}}</td>
                                        <td>{{$violation->dob_violation_number}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->boro}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->hearing_date}}</td>
                                        <td>{{$violation->hearing_time}}</td>
                                        <td>{{$violation->served_date}}</td>
                                        <td>{{$violation->issue_date}}</td>
                                        <td>{{$violation->severity}}</td>
                                        <td>{{$violation->violation_type}}</td>
                                        <td>{{$violation->respondent_name}}</td>
                                        <td>{{$violation->respondent_house_number}}</td>
                                        <td>{{$violation->respondent_street}}</td>
                                        <td>{{$violation->respondent_city}}</td>
                                        <td>{{$violation->respondent_zip}}</td>
                                        <td>{{$violation->violation_description}}</td>
                                        <td>{{$violation->penality_imposed}}</td>
                                        <td>{{$violation->amount_paid}}</td>
                                        <td>{{$violation->balance_due}}</td>
                                        <td>{{$violation->infraction_code1}}</td>
                                        <td>{{$violation->section_law_description1}}</td>
                                        <td>{{$violation->infraction_code2}}</td>
                                        <td>{{$violation->section_law_description2}}</td>
                                        <td>{{$violation->infraction_code3}}</td>
                                        <td>{{$violation->section_law_description3}}</td>
                                        <td>{{$violation->infraction_code4}}</td>
                                        <td>{{$violation->section_law_description4}}</td>
                                        <td>{{$violation->infraction_code5}}</td>
                                        <td>{{$violation->section_law_description5}}</td>
                                        <td>{{$violation->infraction_code6}}</td>
                                        <td>{{$violation->section_law_description6}}</td>
                                        <td>{{$violation->infraction_code7}}</td>
                                        <td>{{$violation->section_law_description7}}</td>
                                        <td>{{$violation->infraction_code8}}</td>
                                        <td>{{$violation->section_law_description8}}</td>
                                        <td>{{$violation->infraction_code9}}</td>
                                        <td>{{$violation->section_law_description9}}</td>
                                        <td>{{$violation->infraction_code10}}</td>
                                        <td>{{$violation->section_law_description10}}</td>
                                        <td>{{$violation->aggravated_level}}</td>
                                        <td>{{$violation->hearing_status}}</td>
                                        <td>{{$violation->certification_status}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      hpdComplaints --}}
            16
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>hpdComplaints
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>complaintid</th>
                                <th>buildingid</th>
                                <th>boroughid</th>
                                <th>borough</th>
                                <th>housenumber</th>
                                <th>streetname</th>
                                <th>zip</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>apartment</th>
                                <th>communityboard</th>
                                <th>receiveddate</th>
                                <th>statusid</th>
                                <th>status</th>
                                <th>statusdate</th>
                                <th>bbl</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>complaintid</th>
                                <th>buildingid</th>
                                <th>boroughid</th>
                                <th>borough</th>
                                <th>housenumber</th>
                                <th>streetname</th>
                                <th>zip</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>apartment</th>
                                <th>communityboard</th>
                                <th>receiveddate</th>
                                <th>statusid</th>
                                <th>status</th>
                                <th>statusdate</th>
                                <th>bbl</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->hpdComplaints()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->complaintid}}</td>
                                        <td>{{$violation->buildingid}}</td>
                                        <td>{{$violation->boroughid}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->housenumber}}</td>
                                        <td>{{$violation->streetname}}</td>
                                        <td>{{$violation->zip}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->apartment}}</td>
                                        <td>{{$violation->communityboard}}</td>
                                        <td>{{$violation->receiveddate}}</td>
                                        <td>{{$violation->statusid}}</td>
                                        <td>{{$violation->status}}</td>
                                        <td>{{$violation->statusdate}}</td>
                                        <td>{{$violation->bbl}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      hpdDwellingRegistrations --}}
            17
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>hpdDwellingRegistrations
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>lastregistrationdate</th>
                                <th>streetcode</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>housenumber</th>
                                <th>buildingid</th>
                                <th>registrationid</th>
                                <th>streetname</th>
                                <th>highhousenumber</th>
                                <th>boro</th>
                                <th>boroid</th>
                                <th>communityboard</th>
                                <th>bin</th>
                                <th>registrationenddate</th>
                                <th>lowhousenumber</th>
                                <th>zip</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>lastregistrationdate</th>
                                <th>streetcode</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>housenumber</th>
                                <th>buildingid</th>
                                <th>registrationid</th>
                                <th>streetname</th>
                                <th>highhousenumber</th>
                                <th>boro</th>
                                <th>boroid</th>
                                <th>communityboard</th>
                                <th>bin</th>
                                <th>registrationenddate</th>
                                <th>lowhousenumber</th>
                                <th>zip</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->hpdDwellingRegistrations()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->lastregistrationdate}}</td>
                                        <td>{{$violation->streetcode}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->housenumber}}</td>
                                        <td>{{$violation->buildingid}}</td>
                                        <td>{{$violation->registrationid}}</td>
                                        <td>{{$violation->streetname}}</td>
                                        <td>{{$violation->highhousenumber}}</td>
                                        <td>{{$violation->boro}}</td>
                                        <td>{{$violation->boroid}}</td>
                                        <td>{{$violation->communityboard}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->registrationenddate}}</td>
                                        <td>{{$violation->lowhousenumber}}</td>
                                        <td>{{$violation->zip}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      hpdHousingLitigations --}}
            18
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>hpdHousingLitigations
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>longitude</th>
                                <th>latitude</th>
                                <th>casestatus</th>
                                <th>casetype</th>
                                <th>bbl</th>
                                <th>council_district</th>
                                <th>caseopendate</th>
                                <th>casejudgement</th>
                                <th>housenumber</th>
                                <th>buildingid</th>
                                <th>zip</th>
                                <th>streetname</th>
                                <th>nta</th>
                                <th>boroid</th>
                                <th>census_tract</th>
                                <th>findingdate</th>
                                <th>community_district</th>
                                <th>penalty</th>
                                <th>respondent</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>litigationid</th>
                                <th>findingofharassment</th>
                                <th>bin</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>longitude</th>
                                <th>latitude</th>
                                <th>casestatus</th>
                                <th>casetype</th>
                                <th>bbl</th>
                                <th>council_district</th>
                                <th>caseopendate</th>
                                <th>casejudgement</th>
                                <th>housenumber</th>
                                <th>buildingid</th>
                                <th>zip</th>
                                <th>streetname</th>
                                <th>nta</th>
                                <th>boroid</th>
                                <th>census_tract</th>
                                <th>findingdate</th>
                                <th>community_district</th>
                                <th>penalty</th>
                                <th>respondent</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>litigationid</th>
                                <th>findingofharassment</th>
                                <th>bin</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->hpdHousingLitigations()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->casestatus}}</td>
                                        <td>{{$violation->casetype}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->caseopendate}}</td>
                                        <td>{{$violation->casejudgement}}</td>
                                        <td>{{$violation->housenumber}}</td>
                                        <td>{{$violation->buildingid}}</td>
                                        <td>{{$violation->zip}}</td>
                                        <td>{{$violation->streetname}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->boroid}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->findingdate}}</td>
                                        <td>{{$violation->community_district}}</td>
                                        <td>{{$violation->penalty}}</td>
                                        <td>{{$violation->respondent}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->litigationid}}</td>
                                        <td>{{$violation->findingofharassment}}</td>
                                        <td>{{$violation->bin}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      hpdJurisdiction --}}
            19
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>hpdJurisdiction
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>dobbuildingclass</th>
                                <th>dobbuildingclassid</th>
                                <th>streetname</th>
                                <th>legalstories</th>
                                <th>legalclassb</th>
                                <th>registrationid</th>
                                <th>recordstatusid</th>
                                <th>recordstatus</th>
                                <th>zip</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>boroid</th>
                                <th>bin</th>
                                <th>communityboard</th>
                                <th>censustract</th>
                                <th>managementprogram</th>
                                <th>boro</th>
                                <th>legalclassa</th>
                                <th>lifecycle</th>
                                <th>buildingid</th>
                                <th>housenumber</th>
                                <th>lowhousenumber</th>
                                <th>highhousenumber</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>dobbuildingclass</th>
                                <th>dobbuildingclassid</th>
                                <th>streetname</th>
                                <th>legalstories</th>
                                <th>legalclassb</th>
                                <th>registrationid</th>
                                <th>recordstatusid</th>
                                <th>recordstatus</th>
                                <th>zip</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>boroid</th>
                                <th>bin</th>
                                <th>communityboard</th>
                                <th>censustract</th>
                                <th>managementprogram</th>
                                <th>boro</th>
                                <th>legalclassa</th>
                                <th>lifecycle</th>
                                <th>buildingid</th>
                                <th>housenumber</th>
                                <th>lowhousenumber</th>
                                <th>highhousenumber</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->hpdJurisdiction()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->dobbuildingclass}}</td>
                                        <td>{{$violation->dobbuildingclassid}}</td>
                                        <td>{{$violation->streetname}}</td>
                                        <td>{{$violation->legalstories}}</td>
                                        <td>{{$violation->legalclassb}}</td>
                                        <td>{{$violation->registrationid}}</td>
                                        <td>{{$violation->recordstatusid}}</td>
                                        <td>{{$violation->recordstatus}}</td>
                                        <td>{{$violation->zip}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->boroid}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->communityboard}}</td>
                                        <td>{{$violation->censustract}}</td>
                                        <td>{{$violation->managementprogram}}</td>
                                        <td>{{$violation->boro}}</td>
                                        <td>{{$violation->legalclassa}}</td>
                                        <td>{{$violation->lifecycle}}</td>
                                        <td>{{$violation->buildingid}}</td>
                                        <td>{{$violation->housenumber}}</td>
                                        <td>{{$violation->lowhousenumber}}</td>
                                        <td>{{$violation->highhousenumber}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      hpdLocalLaw7 --}}
            20
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>hpdLocalLaw7
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>lot</th>
                                <th>geocoded_column_city</th>
                                <th>geocoded_column_zip</th>
                                <th>geocoded_column_state</th>
                                <th>geocoded_column_address</th>
                                <th>boro</th>
                                <th>block</th>
                                <th>bbl</th>
                                <th>hnum_lo</th>
                                <th>hnum_hi</th>
                                <th>str_name</th>
                                <th>crfn</th>
                                <th>deed_date</th>
                                <th>price</th>
                                <th>cap_rate</th>
                                <th>borough_cap_rate</th>
                                <th>yearqtr</th>
                                <th>postcode</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>community_board</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>nta</th>
                                <th>geocoded_column</th>
                                <th>grantee</th>
                                <th>borough</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>lot</th>
                                <th>geocoded_column_city</th>
                                <th>geocoded_column_zip</th>
                                <th>geocoded_column_state</th>
                                <th>geocoded_column_address</th>
                                <th>boro</th>
                                <th>block</th>
                                <th>bbl</th>
                                <th>hnum_lo</th>
                                <th>hnum_hi</th>
                                <th>str_name</th>
                                <th>crfn</th>
                                <th>deed_date</th>
                                <th>price</th>
                                <th>cap_rate</th>
                                <th>borough_cap_rate</th>
                                <th>yearqtr</th>
                                <th>postcode</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>community_board</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>nta</th>
                                <th>geocoded_column</th>
                                <th>grantee</th>
                                <th>borough</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->hpdLocalLaw7()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->geocoded_column_city}}</td>
                                        <td>{{$violation->geocoded_column_zip}}</td>
                                        <td>{{$violation->geocoded_column_state}}</td>
                                        <td>{{$violation->geocoded_column_address}}</td>
                                        <td>{{$violation->boro}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->hnum_lo}}</td>
                                        <td>{{$violation->hnum_hi}}</td>
                                        <td>{{$violation->str_name}}</td>
                                        <td>{{$violation->crfn}}</td>
                                        <td>{{$violation->deed_date}}</td>
                                        <td>{{$violation->price}}</td>
                                        <td>{{$violation->cap_rate}}</td>
                                        <td>{{$violation->borough_cap_rate}}</td>
                                        <td>{{$violation->yearqtr}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->geocoded_column}}</td>
                                        <td>{{$violation->grantee}}</td>
                                        <td>{{$violation->borough}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      hpdRepairVacateOrders --}}
            21
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>hpdRepairVacateOrders
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>building_id</th>
                                <th>nta</th>
                                <th>census_tract</th>
                                <th>council_district</th>
                                <th>community_board</th>
                                <th>longitude</th>
                                <th>postoce</th>
                                <th>number_of_vacated_units</th>
                                <th>actual_rescind_date</th>
                                <th>vacate_effective_date</th>
                                <th>primary_vacate_reason</th>
                                <th>registration_id</th>
                                <th>bin</th>
                                <th>vacate_order_number</th>
                                <th>street_name</th>
                                <th>house_number</th>
                                <th>boro_short_name</th>
                                <th>bbl</th>
                                <th>latitude</th>
                                <th>vacate_type</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>building_id</th>
                                <th>nta</th>
                                <th>census_tract</th>
                                <th>council_district</th>
                                <th>community_board</th>
                                <th>longitude</th>
                                <th>postoce</th>
                                <th>number_of_vacated_units</th>
                                <th>actual_rescind_date</th>
                                <th>vacate_effective_date</th>
                                <th>primary_vacate_reason</th>
                                <th>registration_id</th>
                                <th>bin</th>
                                <th>vacate_order_number</th>
                                <th>street_name</th>
                                <th>house_number</th>
                                <th>boro_short_name</th>
                                <th>bbl</th>
                                <th>latitude</th>
                                <th>vacate_type</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->hpdRepairVacateOrders()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->building_id}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->postoce}}</td>
                                        <td>{{$violation->number_of_vacated_units}}</td>
                                        <td>{{$violation->actual_rescind_date}}</td>
                                        <td>{{$violation->vacate_effective_date}}</td>
                                        <td>{{$violation->primary_vacate_reason}}</td>
                                        <td>{{$violation->registration_id}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->vacate_order_number}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->house_number}}</td>
                                        <td>{{$violation->boro_short_name}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->vacate_type}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      hpdViolations --}}
            22
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>hpdViolations
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>violationid</th>
                                <th>buildingid</th>
                                <th>registrationid</th>
                                <th>boroid</th>
                                <th>borough</th>
                                <th>housenumber</th>
                                <th>lowhousenumber</th>
                                <th>highhousenumber</th>
                                <th>streetname</th>
                                <th>streetcode</th>
                                <th>postcode</th>
                                <th>apartment</th>
                                <th>story</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>class</th>
                                <th>inspectiondate</th>
                                <th>approveddate</th>
                                <th>originalcertifybydate</th>
                                <th>originalcorrectbydate</th>
                                <th>newcertifybydate</th>
                                <th>newcorrectbydate</th>
                                <th>certifieddate</th>
                                <th>ordernumber</th>
                                <th>novid</th>
                                <th>novdescription</th>
                                <th>novissueddate</th>
                                <th>currentstatusid</th>
                                <th>currentstatus</th>
                                <th>currentstatusdate</th>
                                <th>novtype</th>
                                <th>violationstatus</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>communityboard</th>
                                <th>councildistrict</th>
                                <th>censustract</th>
                                <th>bin</th>
                                <th>bbl</th>
                                <th>nta</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>violationid</th>
                                <th>buildingid</th>
                                <th>registrationid</th>
                                <th>boroid</th>
                                <th>borough</th>
                                <th>housenumber</th>
                                <th>lowhousenumber</th>
                                <th>highhousenumber</th>
                                <th>streetname</th>
                                <th>streetcode</th>
                                <th>postcode</th>
                                <th>apartment</th>
                                <th>story</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>class</th>
                                <th>inspectiondate</th>
                                <th>approveddate</th>
                                <th>originalcertifybydate</th>
                                <th>originalcorrectbydate</th>
                                <th>newcertifybydate</th>
                                <th>newcorrectbydate</th>
                                <th>certifieddate</th>
                                <th>ordernumber</th>
                                <th>novid</th>
                                <th>novdescription</th>
                                <th>novissueddate</th>
                                <th>currentstatusid</th>
                                <th>currentstatus</th>
                                <th>currentstatusdate</th>
                                <th>novtype</th>
                                <th>violationstatus</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>communityboard</th>
                                <th>councildistrict</th>
                                <th>censustract</th>
                                <th>bin</th>
                                <th>bbl</th>
                                <th>nta</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->hpdViolations()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->violationid}}</td>
                                        <td>{{$violation->buildingid}}</td>
                                        <td>{{$violation->registrationid}}</td>
                                        <td>{{$violation->boroid}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->housenumber}}</td>
                                        <td>{{$violation->lowhousenumber}}</td>
                                        <td>{{$violation->highhousenumber}}</td>
                                        <td>{{$violation->streetname}}</td>
                                        <td>{{$violation->streetcode}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->apartment}}</td>
                                        <td>{{$violation->story}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->class}}</td>
                                        <td>{{$violation->inspectiondate}}</td>
                                        <td>{{$violation->approveddate}}</td>
                                        <td>{{$violation->originalcertifybydate}}</td>
                                        <td>{{$violation->originalcorrectbydate}}</td>
                                        <td>{{$violation->newcertifybydate}}</td>
                                        <td>{{$violation->newcorrectbydate}}</td>
                                        <td>{{$violation->certifieddate}}</td>
                                        <td>{{$violation->ordernumber}}</td>
                                        <td>{{$violation->novid}}</td>
                                        <td>{{$violation->novdescription}}</td>
                                        <td>{{$violation->novissueddate}}</td>
                                        <td>{{$violation->currentstatusid}}</td>
                                        <td>{{$violation->currentstatus}}</td>
                                        <td>{{$violation->currentstatusdate}}</td>
                                        <td>{{$violation->novtype}}</td>
                                        <td>{{$violation->violationstatus}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->communityboard}}</td>
                                        <td>{{$violation->councildistrict}}</td>
                                        <td>{{$violation->censustract}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->nta}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      landmarkComplaints --}}
            23
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>landmarkComplaints
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>log</th>
                                <th>latitude</th>
                                <th>address</th>
                                <th>district</th>
                                <th>date</th>
                                <th>complaint</th>
                                <th>borough</th>
                                <th>issued_violation</th>
                                <th>census_tract</th>
                                <th>additional_comments</th>
                                <th>nta</th>
                                <th>closed</th>
                                <th>work_reported</th>
                                <th>street_name</th>
                                <th>postcode</th>
                                <th>community_council</th>
                                <th>longitude</th>
                                <th>community_board</th>
                                <th>bin</th>
                                <th>bbl</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>log</th>
                                <th>latitude</th>
                                <th>address</th>
                                <th>district</th>
                                <th>date</th>
                                <th>complaint</th>
                                <th>borough</th>
                                <th>issued_violation</th>
                                <th>census_tract</th>
                                <th>additional_comments</th>
                                <th>nta</th>
                                <th>closed</th>
                                <th>work_reported</th>
                                <th>street_name</th>
                                <th>postcode</th>
                                <th>community_council</th>
                                <th>longitude</th>
                                <th>community_board</th>
                                <th>bin</th>
                                <th>bbl</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->landmarkComplaints()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->log}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->address}}</td>
                                        <td>{{$violation->district}}</td>
                                        <td>{{$violation->date}}</td>
                                        <td>{{$violation->complaint}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->issued_violation}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->additional_comments}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->closed}}</td>
                                        <td>{{$violation->work_reported}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->community_council}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->bbl}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      landmarkPermits --}}
            24
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>landmarkPermits
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>docket</th>
                                <th>address</th>
                                <th>received_date</th>
                                <th>borough</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>lmnametype</th>
                                <th>applicant_name</th>
                                <th>applicant_co</th>
                                <th>applicant_address1</th>
                                <th>applicant_address2</th>
                                <th>applicant_zip</th>
                                <th>applicant_city</th>
                                <th>applicant_state</th>
                                <th>owner_name</th>
                                <th>owner_address1</th>
                                <th>owner_address2</th>
                                <th>owner_zip</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>communityboard</th>
                                <th>worktypes</th>
                                <th>regulation_type</th>
                                <th>issue_date</th>
                                <th>xcoordinate</th>
                                <th>ycoordinate</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>regulation_number</th>
                                <th>owner_co</th>
                                <th>expiration_date</th>
                                <th>community_board</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>nta</th>
                                <th>zip_code</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>docket</th>
                                <th>address</th>
                                <th>received_date</th>
                                <th>borough</th>
                                <th>block</th>
                                <th>lot</th>
                                <th>lmnametype</th>
                                <th>applicant_name</th>
                                <th>applicant_co</th>
                                <th>applicant_address1</th>
                                <th>applicant_address2</th>
                                <th>applicant_zip</th>
                                <th>applicant_city</th>
                                <th>applicant_state</th>
                                <th>owner_name</th>
                                <th>owner_address1</th>
                                <th>owner_address2</th>
                                <th>owner_zip</th>
                                <th>owner_city</th>
                                <th>owner_state</th>
                                <th>communityboard</th>
                                <th>worktypes</th>
                                <th>regulation_type</th>
                                <th>issue_date</th>
                                <th>xcoordinate</th>
                                <th>ycoordinate</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>regulation_number</th>
                                <th>owner_co</th>
                                <th>expiration_date</th>
                                <th>community_board</th>
                                <th>council_district</th>
                                <th>census_tract</th>
                                <th>bin</th>
                                <th>nta</th>
                                <th>zip_code</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->landmarkPermits()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->docket}}</td>
                                        <td>{{$violation->address}}</td>
                                        <td>{{$violation->received_date}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->block}}</td>
                                        <td>{{$violation->lot}}</td>
                                        <td>{{$violation->lmnametype}}</td>
                                        <td>{{$violation->applicant_name}}</td>
                                        <td>{{$violation->applicant_co}}</td>
                                        <td>{{$violation->applicant_address1}}</td>
                                        <td>{{$violation->applicant_address2}}</td>
                                        <td>{{$violation->applicant_zip}}</td>
                                        <td>{{$violation->applicant_city}}</td>
                                        <td>{{$violation->applicant_state}}</td>
                                        <td>{{$violation->owner_name}}</td>
                                        <td>{{$violation->owner_address1}}</td>
                                        <td>{{$violation->owner_address2}}</td>
                                        <td>{{$violation->owner_zip}}</td>
                                        <td>{{$violation->owner_city}}</td>
                                        <td>{{$violation->owner_state}}</td>
                                        <td>{{$violation->communityboard}}</td>
                                        <td>{{$violation->worktypes}}</td>
                                        <td>{{$violation->regulation_type}}</td>
                                        <td>{{$violation->issue_date}}</td>
                                        <td>{{$violation->xcoordinate}}</td>
                                        <td>{{$violation->ycoordinate}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->regulation_number}}</td>
                                        <td>{{$violation->owner_co}}</td>
                                        <td>{{$violation->expiration_date}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->council_district}}</td>
                                        <td>{{$violation->census_tract}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->zip_code}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      landmarkViolations --}}
            25
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>landmarkViolations
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>lpc</th>
                                <th>fiscal_year</th>
                                <th>firstoflot</th>
                                <th>longitude</th>
                                <th>bbl</th>
                                <th>community_board</th>
                                <th>community_district</th>
                                <th>_2010_census_tract</th>
                                <th>bin</th>
                                <th>nta</th>
                                <th>postcode</th>
                                <th>street</th>
                                <th>street_name</th>
                                <th>boro</th>
                                <th>firstofblock</th>
                                <th>historic_district</th>
                                <th>vio_date</th>
                                <th>wl_date</th>
                                <th>nov_date</th>
                                <th>violation_class</th>
                                <th>rescinded</th>
                                <th>rescended_date</th>
                                <th>latitude</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>lpc</th>
                                <th>fiscal_year</th>
                                <th>firstoflot</th>
                                <th>longitude</th>
                                <th>bbl</th>
                                <th>community_board</th>
                                <th>community_district</th>
                                <th>_2010_census_tract</th>
                                <th>bin</th>
                                <th>nta</th>
                                <th>postcode</th>
                                <th>street</th>
                                <th>street_name</th>
                                <th>boro</th>
                                <th>firstofblock</th>
                                <th>historic_district</th>
                                <th>vio_date</th>
                                <th>wl_date</th>
                                <th>nov_date</th>
                                <th>violation_class</th>
                                <th>rescinded</th>
                                <th>rescended_date</th>
                                <th>latitude</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->landmarkViolations()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->lpc}}</td>
                                        <td>{{$violation->fiscal_year}}</td>
                                        <td>{{$violation->firstoflot}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->community_district}}</td>
                                        <td>{{$violation->_2010_census_tract}}</td>
                                        <td>{{$violation->bin}}</td>
                                        <td>{{$violation->nta}}</td>
                                        <td>{{$violation->postcode}}</td>
                                        <td>{{$violation->street}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->boro}}</td>
                                        <td>{{$violation->firstofblock}}</td>
                                        <td>{{$violation->historic_district}}</td>
                                        <td>{{$violation->vio_date}}</td>
                                        <td>{{$violation->wl_date}}</td>
                                        <td>{{$violation->nov_date}}</td>
                                        <td>{{$violation->violation_class}}</td>
                                        <td>{{$violation->rescinded}}</td>
                                        <td>{{$violation->rescended_date}}</td>
                                        <td>{{$violation->latitude}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      oathHearings --}}
            26
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>oathHearings
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>ticket_number</th>
                                <th>violation_date</th>
                                <th>violation_time</th>
                                <th>issuing_agency</th>
                                <th>respondent_first_name</th>
                                <th>respondent_last_name</th>
                                <th>balance_due</th>
                                <th>violation_location_borough</th>
                                <th>violation_location_block_no</th>
                                <th>violation_location_lot_no</th>
                                <th>violation_location_house</th>
                                <th>violation_location_street_name</th>
                                <th>violation_location_floor</th>
                                <th>violation_location_city</th>
                                <th>violation_location_zip_code</th>
                                <th>violation_location_state_name</th>
                                <th>respondent_address_borough</th>
                                <th>respondent_address_house</th>
                                <th>respondent_address_street_name</th>
                                <th>respondent_address_city</th>
                                <th>respondent_address_zip_code</th>
                                <th>respondent_address_state_name</th>
                                <th>hearing_status</th>
                                <th>hearing_result</th>
                                <th>scheduled_hearing_location</th>
                                <th>hearing_date</th>
                                <th>hearing_time</th>
                                <th>decision_location_borough</th>
                                <th>decision_date</th>
                                <th>total_violation_amount</th>
                                <th>violation_details</th>
                                <th>date_judgment_docketed</th>
                                <th>respondent_address_or_facility_number_for_fdny_and_dob_tickets</th>
                                <th>penalty_imposed</th>
                                <th>paid_amount</th>
                                <th>additional_penalties_or_late_fees</th>
                                <th>compliance_status</th>
                                <th>violation_description</th>
                                <th>charge_1_code</th>
                                <th>charge_1_code_section</th>
                                <th>charge_1_code_description</th>
                                <th>charge_1_infraction_amount</th>
                                <th>charge_2_code</th>
                                <th>charge_2_code_section</th>
                                <th>charge_2_code_description</th>
                                <th>charge_2_infraction_amount</th>
                                <th>charge_3_code</th>
                                <th>charge_3_code_section</th>
                                <th>charge_3_code_description</th>
                                <th>charge_3_infraction_amount</th>
                                <th>charge_4_code</th>
                                <th>charge_4_code_section</th>
                                <th>charge_4_code_description</th>
                                <th>charge_4_infraction_amount</th>
                                <th>charge_5_code</th>
                                <th>charge_5_code_section</th>
                                <th>charge_5_code_description</th>
                                <th>charge_5_infraction_amount</th>
                                <th>charge_6_code</th>
                                <th>charge_6_code_section</th>
                                <th>charge_6_code_description</th>
                                <th>charge_6_infraction_amount</th>
                                <th>charge_7_code</th>
                                <th>charge_7_code_section</th>
                                <th>charge_7_code_description</th>
                                <th>charge_7_infraction_amount</th>
                                <th>charge_8_code</th>
                                <th>charge_8_code_section</th>
                                <th>charge_8_code_description</th>
                                <th>charge_8_infraction_amount</th>
                                <th>charge_9_code</th>
                                <th>charge_9_code_section</th>
                                <th>charge_9_code_description</th>
                                <th>charge_9_infraction_amount</th>
                                <th>charge_10_code</th>
                                <th>charge_10_code_section</th>
                                <th>charge_10_code_description</th>
                                <th>charge_10_infraction_amount</th>
                                <th>bbl</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>ticket_number</th>
                                <th>violation_date</th>
                                <th>violation_time</th>
                                <th>issuing_agency</th>
                                <th>respondent_first_name</th>
                                <th>respondent_last_name</th>
                                <th>balance_due</th>
                                <th>violation_location_borough</th>
                                <th>violation_location_block_no</th>
                                <th>violation_location_lot_no</th>
                                <th>violation_location_house</th>
                                <th>violation_location_street_name</th>
                                <th>violation_location_floor</th>
                                <th>violation_location_city</th>
                                <th>violation_location_zip_code</th>
                                <th>violation_location_state_name</th>
                                <th>respondent_address_borough</th>
                                <th>respondent_address_house</th>
                                <th>respondent_address_street_name</th>
                                <th>respondent_address_city</th>
                                <th>respondent_address_zip_code</th>
                                <th>respondent_address_state_name</th>
                                <th>hearing_status</th>
                                <th>hearing_result</th>
                                <th>scheduled_hearing_location</th>
                                <th>hearing_date</th>
                                <th>hearing_time</th>
                                <th>decision_location_borough</th>
                                <th>decision_date</th>
                                <th>total_violation_amount</th>
                                <th>violation_details</th>
                                <th>date_judgment_docketed</th>
                                <th>respondent_address_or_facility_number_for_fdny_and_dob_tickets</th>
                                <th>penalty_imposed</th>
                                <th>paid_amount</th>
                                <th>additional_penalties_or_late_fees</th>
                                <th>compliance_status</th>
                                <th>violation_description</th>
                                <th>charge_1_code</th>
                                <th>charge_1_code_section</th>
                                <th>charge_1_code_description</th>
                                <th>charge_1_infraction_amount</th>
                                <th>charge_2_code</th>
                                <th>charge_2_code_section</th>
                                <th>charge_2_code_description</th>
                                <th>charge_2_infraction_amount</th>
                                <th>charge_3_code</th>
                                <th>charge_3_code_section</th>
                                <th>charge_3_code_description</th>
                                <th>charge_3_infraction_amount</th>
                                <th>charge_4_code</th>
                                <th>charge_4_code_section</th>
                                <th>charge_4_code_description</th>
                                <th>charge_4_infraction_amount</th>
                                <th>charge_5_code</th>
                                <th>charge_5_code_section</th>
                                <th>charge_5_code_description</th>
                                <th>charge_5_infraction_amount</th>
                                <th>charge_6_code</th>
                                <th>charge_6_code_section</th>
                                <th>charge_6_code_description</th>
                                <th>charge_6_infraction_amount</th>
                                <th>charge_7_code</th>
                                <th>charge_7_code_section</th>
                                <th>charge_7_code_description</th>
                                <th>charge_7_infraction_amount</th>
                                <th>charge_8_code</th>
                                <th>charge_8_code_section</th>
                                <th>charge_8_code_description</th>
                                <th>charge_8_infraction_amount</th>
                                <th>charge_9_code</th>
                                <th>charge_9_code_section</th>
                                <th>charge_9_code_description</th>
                                <th>charge_9_infraction_amount</th>
                                <th>charge_10_code</th>
                                <th>charge_10_code_section</th>
                                <th>charge_10_code_description</th>
                                <th>charge_10_infraction_amount</th>
                                <th>bbl</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->oathHearings()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->ticket_number}}</td>
                                        <td>{{$violation->violation_date}}</td>
                                        <td>{{$violation->violation_time}}</td>
                                        <td>{{$violation->issuing_agency}}</td>
                                        <td>{{$violation->respondent_first_name}}</td>
                                        <td>{{$violation->respondent_last_name}}</td>
                                        <td>{{$violation->balance_due}}</td>
                                        <td>{{$violation->violation_location_borough}}</td>
                                        <td>{{$violation->violation_location_block_no}}</td>
                                        <td>{{$violation->violation_location_lot_no}}</td>
                                        <td>{{$violation->violation_location_house}}</td>
                                        <td>{{$violation->violation_location_street_name}}</td>
                                        <td>{{$violation->violation_location_floor}}</td>
                                        <td>{{$violation->violation_location_city}}</td>
                                        <td>{{$violation->violation_location_zip_code}}</td>
                                        <td>{{$violation->violation_location_state_name}}</td>
                                        <td>{{$violation->respondent_address_borough}}</td>
                                        <td>{{$violation->respondent_address_house}}</td>
                                        <td>{{$violation->respondent_address_street_name}}</td>
                                        <td>{{$violation->respondent_address_city}}</td>
                                        <td>{{$violation->respondent_address_zip_code}}</td>
                                        <td>{{$violation->respondent_address_state_name}}</td>
                                        <td>{{$violation->hearing_status}}</td>
                                        <td>{{$violation->hearing_result}}</td>
                                        <td>{{$violation->scheduled_hearing_location}}</td>
                                        <td>{{$violation->hearing_date}}</td>
                                        <td>{{$violation->hearing_time}}</td>
                                        <td>{{$violation->decision_location_borough}}</td>
                                        <td>{{$violation->decision_date}}</td>
                                        <td>{{$violation->total_violation_amount}}</td>
                                        <td>{{$violation->violation_details}}</td>
                                        <td>{{$violation->date_judgment_docketed}}</td>
                                        <td>{{$violation->respondent_address_or_facility_number_for_fdny_and_dob_tickets}}</td>
                                        <td>{{$violation->penalty_imposed}}</td>
                                        <td>{{$violation->paid_amount}}</td>
                                        <td>{{$violation->additional_penalties_or_late_fees}}</td>
                                        <td>{{$violation->compliance_status}}</td>
                                        <td>{{$violation->violation_description}}</td>
                                        <td>{{$violation->charge_1_code}}</td>
                                        <td>{{$violation->charge_1_code_section}}</td>
                                        <td>{{$violation->charge_1_code_description}}</td>
                                        <td>{{$violation->charge_1_infraction_amount}}</td>
                                        <td>{{$violation->charge_2_code}}</td>
                                        <td>{{$violation->charge_2_code_section}}</td>
                                        <td>{{$violation->charge_2_code_description}}</td>
                                        <td>{{$violation->charge_2_infraction_amount}}</td>
                                        <td>{{$violation->charge_3_code}}</td>
                                        <td>{{$violation->charge_3_code_section}}</td>
                                        <td>{{$violation->charge_3_code_description}}</td>
                                        <td>{{$violation->charge_3_infraction_amount}}</td>
                                        <td>{{$violation->charge_4_code}}</td>
                                        <td>{{$violation->charge_4_code_section}}</td>
                                        <td>{{$violation->charge_4_code_description}}</td>
                                        <td>{{$violation->charge_4_infraction_amount}}</td>
                                        <td>{{$violation->charge_5_code}}</td>
                                        <td>{{$violation->charge_5_code_section}}</td>
                                        <td>{{$violation->charge_5_code_description}}</td>
                                        <td>{{$violation->charge_5_infraction_amount}}</td>
                                        <td>{{$violation->charge_6_code}}</td>
                                        <td>{{$violation->charge_6_code_section}}</td>
                                        <td>{{$violation->charge_6_code_description}}</td>
                                        <td>{{$violation->charge_6_infraction_amount}}</td>
                                        <td>{{$violation->charge_7_code}}</td>
                                        <td>{{$violation->charge_7_code_section}}</td>
                                        <td>{{$violation->charge_7_code_description}}</td>
                                        <td>{{$violation->charge_7_infraction_amount}}</td>
                                        <td>{{$violation->charge_8_code}}</td>
                                        <td>{{$violation->charge_8_code_section}}</td>
                                        <td>{{$violation->charge_8_code_description}}</td>
                                        <td>{{$violation->charge_8_infraction_amount}}</td>
                                        <td>{{$violation->charge_9_code}}</td>
                                        <td>{{$violation->charge_9_code_section}}</td>
                                        <td>{{$violation->charge_9_code_description}}</td>
                                        <td>{{$violation->charge_9_infraction_amount}}</td>
                                        <td>{{$violation->charge_10_code}}</td>
                                        <td>{{$violation->charge_10_code_section}}</td>
                                        <td>{{$violation->charge_10_code_description}}</td>
                                        <td>{{$violation->charge_10_infraction_amount}}</td>
                                        <td>{{$violation->bbl}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{--                                      serviceRequests311 --}}
            27
            <div class="toggle px-5 toggle-bg" data-state="open">
                <div class="togglet toggleta"><i class="toggle-closed icon-ok-circle"></i><i
                            class="toggle-open icon-remove-circle"></i>serviceRequests311
                </div>
                <div class="togglec">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-striped text-white table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>unique_key</th>
                                <th>created_date</th>
                                <th>closed_date</th>
                                <th>agency</th>
                                <th>agency_name</th>
                                <th>complaint_type</th>
                                <th>descriptor</th>
                                <th>location_type</th>
                                <th>incident_zip</th>
                                <th>incident_address</th>
                                <th>street_name</th>
                                <th>cross_street_1</th>
                                <th>cross_street_2</th>
                                <th>intersection_street_1</th>
                                <th>intersection_street_2</th>
                                <th>address_type</th>
                                <th>city</th>
                                <th>landmark</th>
                                <th>facility_type</th>
                                <th>status</th>
                                <th>due_date</th>
                                <th>resolution_description</th>
                                <th>resolution_action_updated_date</th>
                                <th>community_board</th>
                                <th>bbl</th>
                                <th>borough</th>
                                <th>x_coordinate_state_plane</th>
                                <th>y_coordinate_state_plane</th>
                                <th>open_data_channel_type</th>
                                <th>park_facility_name</th>
                                <th>park_borough</th>
                                <th>vehicle_type</th>
                                <th>taxi_company_borough</th>
                                <th>taxi_pick_up_location</th>
                                <th>bridge_highway_name</th>
                                <th>bridge_highway_direction</th>
                                <th>road_ramp</th>
                                <th>bridge_highway_segment</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>location</th>
                                <th>location_address</th>
                                <th>location_city</th>
                                <th>location_state</th>
                                <th>location_zip</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Property Address</th>
                                <th>unique_key</th>
                                <th>created_date</th>
                                <th>closed_date</th>
                                <th>agency</th>
                                <th>agency_name</th>
                                <th>complaint_type</th>
                                <th>descriptor</th>
                                <th>location_type</th>
                                <th>incident_zip</th>
                                <th>incident_address</th>
                                <th>street_name</th>
                                <th>cross_street_1</th>
                                <th>cross_street_2</th>
                                <th>intersection_street_1</th>
                                <th>intersection_street_2</th>
                                <th>address_type</th>
                                <th>city</th>
                                <th>landmark</th>
                                <th>facility_type</th>
                                <th>status</th>
                                <th>due_date</th>
                                <th>resolution_description</th>
                                <th>resolution_action_updated_date</th>
                                <th>community_board</th>
                                <th>bbl</th>
                                <th>borough</th>
                                <th>x_coordinate_state_plane</th>
                                <th>y_coordinate_state_plane</th>
                                <th>open_data_channel_type</th>
                                <th>park_facility_name</th>
                                <th>park_borough</th>
                                <th>vehicle_type</th>
                                <th>taxi_company_borough</th>
                                <th>taxi_pick_up_location</th>
                                <th>bridge_highway_name</th>
                                <th>bridge_highway_direction</th>
                                <th>road_ramp</th>
                                <th>bridge_highway_segment</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>location</th>
                                <th>location_address</th>
                                <th>location_city</th>
                                <th>location_state</th>
                                <th>location_zip</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1)
                            @foreach($alerts as $property)
                                @foreach($property->serviceRequests311()->limit(5)->get() as $violation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$property->getAddress()}}</td>
                                        <td>{{$violation->unique_key}}</td>
                                        <td>{{$violation->created_date}}</td>
                                        <td>{{$violation->closed_date}}</td>
                                        <td>{{$violation->agency}}</td>
                                        <td>{{$violation->agency_name}}</td>
                                        <td>{{$violation->complaint_type}}</td>
                                        <td>{{$violation->descriptor}}</td>
                                        <td>{{$violation->location_type}}</td>
                                        <td>{{$violation->incident_zip}}</td>
                                        <td>{{$violation->incident_address}}</td>
                                        <td>{{$violation->street_name}}</td>
                                        <td>{{$violation->cross_street_1}}</td>
                                        <td>{{$violation->cross_street_2}}</td>
                                        <td>{{$violation->intersection_street_1}}</td>
                                        <td>{{$violation->intersection_street_2}}</td>
                                        <td>{{$violation->address_type}}</td>
                                        <td>{{$violation->city}}</td>
                                        <td>{{$violation->landmark}}</td>
                                        <td>{{$violation->facility_type}}</td>
                                        <td>{{$violation->status}}</td>
                                        <td>{{$violation->due_date}}</td>
                                        <td>{{$violation->resolution_description}}</td>
                                        <td>{{$violation->resolution_action_updated_date}}</td>
                                        <td>{{$violation->community_board}}</td>
                                        <td>{{$violation->bbl}}</td>
                                        <td>{{$violation->borough}}</td>
                                        <td>{{$violation->x_coordinate_state_plane}}</td>
                                        <td>{{$violation->y_coordinate_state_plane}}</td>
                                        <td>{{$violation->open_data_channel_type}}</td>
                                        <td>{{$violation->park_facility_name}}</td>
                                        <td>{{$violation->park_borough}}</td>
                                        <td>{{$violation->vehicle_type}}</td>
                                        <td>{{$violation->taxi_company_borough}}</td>
                                        <td>{{$violation->taxi_pick_up_location}}</td>
                                        <td>{{$violation->bridge_highway_name}}</td>
                                        <td>{{$violation->bridge_highway_direction}}</td>
                                        <td>{{$violation->road_ramp}}</td>
                                        <td>{{$violation->bridge_highway_segment}}</td>
                                        <td>{{$violation->latitude}}</td>
                                        <td>{{$violation->longitude}}</td>
                                        <td>{{$violation->location}}</td>
                                        <td>{{$violation->location_address}}</td>
                                        <td>{{$violation->location_city}}</td>
                                        <td>{{$violation->location_state}}</td>
                                        <td>{{$violation->location_zip}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>
    </div>
@stop

@section('js')
    {{--javascript bölümü--}}

    <script src="{{asset('js/components/bs-datatable.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("[id^='datatable-']").each(function () {
                $(this).dataTable({
                    "scrollX": true,
                    "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                });

            });
            $("[data-state='open'] > .togglet").each(function () {
                $(this).toggleClass('toggleta').next('.togglec').slideToggle(1000);
                // $(this).attr("data-state","closed");
            });

            $('#datatable1').dataTable({
                "scrollX": true,
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$\-,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    for (i = 2; i < 13; i++) {
                        // Total over all pages
                        total = api
                            .column(i)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);


                        // Update footer
                        $(api.column(i).footer()).html(total
                        );
                    }
                }
            });
        });
    </script>
@stop
