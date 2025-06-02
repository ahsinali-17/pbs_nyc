@extends('frontend.master')

@php($pageTitle ='Monthly Report')

@section('meta')
    {{--meta etiketleri--}}
@stop

@section('css')
    {{--css kodları--}}
    <style>
        .chart-samples ul { list-style: none; }

        .chart-samples h4 {
            text-transform: uppercase;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .chart-samples li {
            font-size: 16px;
            line-height: 2.2;
            font-weight: 600;
        }

        .chart-samples li a:not(:hover) { color: #AAA; }

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
            <div><h2>From the REGISERED DATE to {{ date('Y-m-d H:i:s') }}</h2>
                <p>The contents below is a full-detailed report for your properties:</p>
            </div>

            <div class="divider divider-center"><img src="{{ asset('images/others/dividerlogo50.png') }}"
                                                     width="30px"/></div>

            <section id="page-title">

                <div class="container clearfix">
                    <h1>Building Overview</h1>
                    <span>This report covers important compliance data for the following <u>USER_PROPERTY_SAYISI</u> properties:</span>

                </div>

            </section>
{{--                        USER PROPERTIES OVERVIEW--}}
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


{{--            Permits--}}
            <section id="page-title">

                <div class="container clearfix">
                    <h1>Permits</h1>
                    <span>This report covers important compliance data for the following <u>{{$user->properties->count()}}</u> properties:</span>

                </div>



            </section>

            <div class="bottommargin divcenter" style="max-width: 750px; min-height: 350px;">
                <canvas id="chart-0"></canvas>
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



                                @foreach($property->dobViolations as $violation)

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
{{--2 burada başladı--}}


{{--            27 burada bitti--}}
        </div>
    </div>
@stop

@section('js')
    {{--javascript bölümü--}}

    <script src="{{asset('js/components/bs-datatable.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/chart-utils.js')}}"></script>

    <script>
        var MONTHS = ["dobNowApprovedPermits", "dobNowSafetyBoiler","dobNowElectricalPermits", "dobNowElevatorPermits", "dobPermits", "landmarkPermits",  "Other", "Other", "Other", "Other", "Other", "Other"];
        var color = Chart.helpers.color;
        var horizontalBarChartData = {
            labels: ["dobNowApprovedPermits", "dobNowSafetyBoiler","dobNowElectricalPermits", "dobNowElevatorPermits", "dobPermits", "landmarkPermits"],
            datasets: [{
                label: 'Permits',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    {{$user->dobNowApprovedPermits()->count()}},
                    {{$user->dobNowSafetyBoiler()->count()}},
                    {{$user->dobNowElectricalPermits()->count()}},
                    {{$user->dobNowElevatorPermits()->count()}},
                    {{$user->dobPermits()->count()}},
                    {{$user->landmarkPermits()->count()}},
                ]
            }]

        };

        // Define a plugin to provide data labels
        Chart.plugins.register({
            afterDatasetsDraw: function(chart, easing) {
                // To only draw at the end of animation, check for easing === 1
                var ctx = document.getElementById("chart-0").getContext("2d");

                chart.data.datasets.forEach(function (dataset, i) {
                    var meta = chart.getDatasetMeta(i);
                    if (!meta.hidden) {
                        meta.data.forEach(function(element, index) {
                            // Draw the text in black, with the specified font
                            ctx.fillStyle = 'rgb(242,242,242)';

                            var fontSize = 16;
                            var fontStyle = 'normal';
                            var fontFamily = 'Helvetica Neue';
                            ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                            // Just naively convert to string for now
                            var dataString = dataset.data[index].toString();

                            // Make sure alignment settings are correct
                            ctx.textAlign = 'left';
                            ctx.textBaseline = 'middle';

                            var padding = 5;
                            var position = element.tooltipPosition();
                            ctx.fillText(dataString, position.x+padding, position.y);
                        });
                    }
                });
            }
        });
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
                   // Bar Grafk
            var ctx = document.getElementById("chart-0").getContext("2d");
            window.myHorizontalBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: horizontalBarChartData,
                options: {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each horizontal bar to be 2px wide

                    elements: {
                        rectangle: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Permits for Full'
                    }
                }
            });
        });
        var colorNames = Object.keys(window.chartColors);

    </script>
@stop
