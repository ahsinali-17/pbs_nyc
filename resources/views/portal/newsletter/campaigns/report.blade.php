@extends('portal.master')

@section('title', 'View Campaign')
@section('plugins.Datatables', true)
@section('css')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
@stop

@section('content_header')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Report of {{ $campaignReport->campaign_title }}</h1>
                </div>

                <div class="card-body">
                    <h2>Overview</h2>
                    <hr style="border-top: 1px dashed black">
                    <h2>        {{ $campaignReport->emails_sent }} Recipients</h2>

                    <div class="row">
                        <div class="col-6">
                            <b>Audience: </b>{{ $campaignReport->list_name}}<br>
                            <b>Subject: </b> {{ $campaignReport->subject_line }}
                        </div>
                        <div class="col-6">
                            <b>Delivered: </b> {{(\Carbon\Carbon::parse($campaignReport->send_time,'UTC')->setTimezone('America/New_York')->toDateTimeString())}}
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-3 text-center"><span
                                    style="font-size: xx-large">{{ $campaignReport->opens->unique_opens }}</span><br>
                            <h5>Unique Opened</h5><h6><i>{{ $campaignReport->opens->opens_total }} Total</i></h6></div>
                        <div class="col-3 text-center"><span
                                    style="font-size: xx-large">{{ $campaignReport->clicks->unique_clicks }}</span><br>
                            <h5>Unique Clicked</h5><h6><i>{{ $campaignReport->clicks->clicks_total }} Total</i></h6>
                        </div>
                        <div class="col-3 text-center"><span
                                    style="font-size: xx-large">{{ $campaignReport->bounces->hard_bounces+$campaignReport->bounces->soft_bounces }}</span><br>
                            <h5>Bounced</h5></div>
                        <div class="col-3 text-center"><span
                                    style="font-size: xx-large">{{ $campaignReport->unsubscribed}}</span><br><h5>
                                Unsubscribed</h5></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6 ml-0">Successfull deliveries</div>
                                <div class="col-6 mr-0">{{$campaignReport->emails_sent-($campaignReport->bounces->hard_bounces+$campaignReport->bounces->soft_bounces)}}</div>
                                <div class="col-6 ml-0">Total Opened</div>
                                <div class="col-6 mr-0">{{ $campaignReport->opens->opens_total }}</div>
                                <div class="col-6 ml-0">Last Opened</div>
                                <div class="col-6 mr-0">{{ \Carbon\Carbon::parse($campaignReport->opens->last_open,'UTC')->setTimezone('America/New_York')->toDateTimeString() }}</div>
                                <div class="col-6 ml-0">Forwarded</div>
                                <div class="col-6 ml-0">{{ $campaignReport->forwards->forwards_count }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6 ml-0">Successfull deliveries</div>
                                <div class="col-6 mr-0">{{sprintf("%01.2f",$campaignReport->clicks->unique_clicks/$campaignReport->opens->unique_opens*100)}}
                                    %
                                </div>
                                <div class="col-6 ml-0">Clicks Opened</div>
                                <div class="col-6 mr-0">{{ $campaignReport->clicks->clicks_total }}</div>
                                <div class="col-6 ml-0">Last clicked</div>
                                <div class="col-6 mr-0">{{ \Carbon\Carbon::parse($campaignReport->clicks->last_click,'UTC')->setTimezone('America/New_York')->toDateTimeString() }}</div>
                                <div class="col-6 ml-0">Abuse Reports</div>
                                <div class="col-6 ml-0">{{ $campaignReport->abuse_reports }}</div>
                            </div>
                        </div>

                    </div>
                    <hr style="border-top: 1px dashed black">
                    <h2>Opens by location</h2>
                    <hr>
                    <table id="resultstable" data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped"
                           autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <tr>
                            <th>Country</th>
                            <th>Region</th>
                            <th>Opened</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($campaignLocationReport->locations as $location)
                            <tr>
                                <td><img width="60px"
                                         src="https://catamphetamine.gitlab.io/country-flag-icons/3x2/{{$location->country_code}}.svg">
                                    - {{$location->country_code}}</td>
                                <td>{{$location->region_name}}</td>
                                <td>{{$location->opens}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <hr style="border-top: 1px dashed black">
                    <h2>Subscribers activity</h2>
                    <hr>
                    <h3> Last 24-hour performance</h3>
                    <div class="row">
                        <div class="col-9"></div>
                        <div style="border: #0E76A8 solid" class="col-1 mr-1 pr-0"> Opened</div>
                        <div style="border: #0E76A8 dashed" class="col-1 mr-0 pr-0"> Clicked</div>
                    </div>
                    <div id="chartdiv"></div>
                    <hr style="border-top: 1px dashed black">
                    <h2>Links clicked</h2>
                    <hr>
                    <table id="clicktable" data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped"
                           autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <th>URL</th>
                        <th>Total Click</th>
                        <th>Percentage</th>
                        <th>Unique Click</th>
                        <th>Percentage</th>
                        <th>Last Click</th>
                        </thead>
                        <tbody>
                        @foreach($campaignClickReport->urls_clicked as $clickedurl)
                            <tr>
                                <td>{{$clickedurl->url}}</td>
                                <td>{{$clickedurl->total_clicks}}</td>
                                <td><p style="font-size: small">
                                        (<i> {{$clickedurl->click_percentage}}%</i>)</p></td>
                                <td>{{$clickedurl->unique_clicks}}</td>
                                <td><p style="font-size: small">
                                        (<i> {{$clickedurl->unique_click_percentage}}%</i>)</p></td>
                                <td>{{(\Carbon\Carbon::parse($clickedurl->last_click,'UTC')->setTimezone('America/New_York')->toDateTimeString())}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr style="border-top: 1px dashed black">
                    <h2>Mailing Details</h2>
                    <hr>
                    Total opens: {{$campaignOpenReport->total_opens}} and total interaction
                    is {{$campaignOpenReport->total_items}}.
                    <table id="membertable" data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped"
                           autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <th>Email Adress</th>
                        <th>Status</th>
                        <th>Active?</th>
                        <th>Open Count</th>
                        </thead>
                        <tbody>
                        @foreach($campaignOpenReport->members as $member)
                            <tr>
                                <td>{{$member->email_address}}</td>
                                <td>{{$member->contact_status}}</td>
                                <td>{{$member->list_is_active}}</td>
                                <td>{{$member->opens_count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr style="border-top: 1px dashed black">
                    <h2>Domain Performance</h2>
                    <hr>
                    Below is the domain performance for {{$campaignDomainPerformanceReport->total_sent}}
                    <table id="domaintable" data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped"
                           autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <th>Domain</th>
                        <th>Emails</th>
                        <th>Bounces</th>
                        <th>Opens</th>
                        <th>OpensClicks</th>
                        <th>Unsubs</th>
                        <th>Delivered</th>
                        </thead>
                        <tbody>
                        @foreach($campaignDomainPerformanceReport->domains as $domain)
                            <tr>
                                <td>{{$domain->domain}}</td>
                                <td>{{$domain->emails_sent}} <br/><span style="font-size: small"> (<i>{{$domain->emails_pct}} </i>)                   </span>
                                </td>
                                <td>{{$domain->bounces}} <br/><span
                                            style="font-size: small"> (<i>{{$domain->bounces_pct}}    </i>)                    </span>
                                </td>
                                <td>{{$domain->opens}} <br/><span
                                            style="font-size: small"> (<i>{{$domain->opens_pct}}      </i>)                    </span>
                                </td>
                                <td>{{$domain->clicks}} <br/><span
                                            style="font-size: small"> (<i>{{$domain->clicks_pct}}     </i>)                    </span>
                                </td>
                                <td>{{$domain->unsubs}} <br/><span
                                            style="font-size: small"> (<i>{{$domain->unsubs_pct}}     </i>)                    </span>
                                </td>
                                <td>{{$domain->delivered}}        </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="col-md-12 mt-2">
                        {{ Html::linkRoute('campaign.index', '<< See all campaigns', array(), ['class' => 'btn btn-secondary btn-block btn-h1-spacing']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        var table;
        $(function () {
            table = $('#resultstable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
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
            $('#clicktable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
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
            $('#membertable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
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
            $('#domaintable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
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
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function () {

// Themes begin
            am4core.useTheme(am4themes_animated);

// Themes end

// Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
            chart.data = [
                    @foreach($campaignReport->timeseries as $time)
                {
                    date: new Date('{{\Carbon\Carbon::parse($time->timestamp,'UTC')->setTimezone('America/New_York')->format('Y-m-d\TH:i:s')}}'),
                    value1: {{$time->unique_opens}},
                    value2: {{$time->recipients_clicks}},
                },
                @endforeach
            ];

// Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 50;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
            var series = chart.series.push(new am4charts.LineSeries());

            series.dataFields.valueY = "value1";
            series.dataFields.dateX = "date";
            series.strokeWidth = 2;
            series.minBulletDistance = 10;
            series.tooltipText = "[bold]{value1} Opens";
            series.tooltip.pointerOrientation = "vertical";


// Create series
            var series2 = chart.series.push(new am4charts.LineSeries());
            series2.dataFields.valueY = "value2";
            series2.dataFields.dateX = "date";
            series2.strokeWidth = 2;
            series2.strokeDasharray = "3,4";
            series2.stroke = series.stroke;
            series2.minBulletDistance = 10;
            series2.tooltipText = "[bold]{value2} Clicks";
            series2.tooltip.pointerOrientation = "vertical";


// Add cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.xAxis = dateAxis;

        }); // end am4core.ready()
    </script>
@stop
