@extends('portal.master')

@section('title', 'Building Quickview')
@section('plugins.Datatables', true)

{{--@section('css')--}}
{{--    <style>--}}
{{--        .color-palette {--}}
{{--            height: 35px;--}}
{{--            line-height: 35px;--}}
{{--            text-align: right;--}}
{{--            padding-right: .75rem;--}}
{{--        }--}}

{{--        .color-palette.disabled {--}}
{{--            text-align: center;--}}
{{--            padding-right: 0;--}}
{{--            display: block;--}}
{{--        }--}}

{{--        .color-palette-set {--}}
{{--            margin-bottom: 15px;--}}
{{--        }--}}

{{--        .color-palette span {--}}
{{--            display: none;--}}
{{--            font-size: 12px;--}}
{{--        }--}}

{{--        .color-palette:hover span {--}}
{{--            display: block;--}}
{{--        }--}}

{{--        .color-palette.disabled span {--}}
{{--            display: block;--}}
{{--            text-align: left;--}}
{{--            padding-left: .75rem;--}}
{{--        }--}}

{{--        .color-palette-box h4 {--}}
{{--            position: absolute;--}}
{{--            left: 1.25rem;--}}
{{--            margin-top: .75rem;--}}
{{--            color: rgba(255, 255, 255, 0.8);--}}
{{--            font-size: 12px;--}}
{{--            display: block;--}}
{{--            z-index: 7;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}

@section('css')
    <style>
        #map_wrapper {
            height: 400px;
        }

        #map_canvas {
            width: 100%;
            height: 100%;
        }

        .info_content {
            text-align: center;
        }
    </style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-puzzle-piece"></i> Property Overview</h1>
@stop


@section('content')
    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">
                    <div id="map_wrapper">
                        <div id="map_canvas" class="mapping"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- row  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h31 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        PROPERTY LIST
                    </h31>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div style="width: 100%;display: inline;">
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
                                {{--                                                @foreach($user->properties as $property)--}}
                                {{--                                                    <tr>--}}
                                {{--                                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>--}}
                                {{--                                                        <td> <a href="{{route('liveViolationSingle',['buildingid'=>$property->id])}}">{{$property->dobViolations()->isOpen()->count()}} <i class="fas fa-search"></i> </a></td>--}}
                                {{--                                                        <td> <a href="{{route('DOBcomplaintsSingle',['buildingid'=>$property->id])}}">{{$property->dobComplaints->where('status','ACTIVE')->count()}} <i class="fas fa-search"></i> </a> </td>--}}
                                {{--                                                        <td>  <a href="{{route('ECBliveHearingsSingle',['buildingid'=>$property->id])}}">{{$property->oathHearings()->where('hearing_status','DEFAULT')->where('hearing_status','DOCKETED')->count()}} <i class="fas fa-search"></i> </a></td>--}}
                                {{--                                                        <td> <a href="{{route('ECBviolationsSingle',['buildingid'=>$property->id])}}">{{$property->ecbViolations()->where('ecb_violation_status','ACTIVE')->count()}} <i class="fas fa-search"></i> </a> </td>--}}
                                {{--                                                        <td> <a href="{{route('ECBviolationsSingle',['buildingid'=>$property->id])}}"> {{$property->ecbViolations()->where('ecb_violation_status','ACTIVE')->get()->sum('balance_due')}} </a> </td>--}}
                                {{--                                                        <td><a href="{{route('HPDliveViolationsSingle',['buildingid'=>$property->id])}}">{{$property->hpdViolations()->where('violationstatus','Open')->count()}} <i class="fas fa-search"></i> </a> </td>--}}
                                {{--                                                        <td><a href="{{route('HPDcomplaintsSingle',['buildingid'=>$property->id])}}"> {{$property->hpdComplaints()->where('status','OPEN')->count()}}<i class="fas fa-search"></i> </a> </td>--}}
                                {{--                                                        <td><a href="{{route('HPDrepairsSingle',['buildingid'=>$property->id])}}"> {{$property->hpdEmergencyRepairs()->where('omostatusreason','Access')->count()}}<i class="fas fa-search"></i> </a> </td>--}}
                                {{--                                                        <td><a href="{{route('SERVICErequests311Single',['buildingid'=>$property->id])}}"> {{$property->serviceRequests311()->where('status','!=','Closed')->count()}}<i class="fas fa-search"></i> </a> </td>--}}

                                {{--                                                    </tr>--}}
                                {{--                                                @endforeach--}}
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@stop

@section('js')
    <!-- page script -->
    <script>
        $(function () {
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
            // $('#resultstable2').DataTable({
            //     "paging": true,
            //     "lengthChange": true,
            //     "searching": true,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": true,
            //     "responsive": true,
            //
            //     "footerCallback": function (row, data, start, end, display) {
            //         var api = this.api(), data;
            //
            //         // converting to interger to find total
            //         var intVal = function (i) {
            //             return typeof i === 'string' ?
            //                 i.replace(/[\$,]/g, '') * 1 :
            //                 typeof i === 'number' ?
            //                     i : 0;
            //         };
            //
            //         // computing column Total of the complete result
            //         var total0 = api
            //             .column(1)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //
            //         var total1 = api
            //             .column(2)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //
            //         var total2 = api
            //             .column(3)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //
            //         var total3 = api
            //             .column(4)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //
            //         var total4 = api
            //             .column(5)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //         var total5 = api
            //             .column(6)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //         var total6 = api
            //             .column(7)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //         var total7 = api
            //             .column(8)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //         var total8 = api
            //             .column(9)
            //             .data()
            //             .reduce(function (a, b) {
            //                 return intVal(a) + intVal(b);
            //             }, 0);
            //
            //
            //         // Update footer by showing the total with the reference of the column index
            //         $(api.column(0).footer()).html('Total');
            //         $(api.column(1).footer()).html(total0);
            //         $(api.column(2).footer()).html(total1);
            //         $(api.column(3).footer()).html(total2);
            //         $(api.column(4).footer()).html(total3);
            //         $(api.column(5).footer()).html(total4);
            //         $(api.column(6).footer()).html(total5);
            //         $(api.column(7).footer()).html(total6);
            //         $(api.column(8).footer()).html(total7);
            //         $(api.column(9).footer()).html(total8);
            //     },
            //     "processing": true,
            //     "serverSide": false,
            //     buttons: [
            //         {
            //             extend: 'copyHtml5',
            //             text: '<i class="fas fa-copy" style="font-size: 1.2em;"></i>',
            //             titleAttr: 'Copy'
            //         },
            //         {
            //             extend: 'excelHtml5',
            //             text: '<i class="fas fa-file-excel" style="font-size: 1.2em;"></i>',
            //             titleAttr: 'Excel'
            //         },
            //         {
            //             extend: 'csvHtml5',
            //             text: '<i class="fas fa-file-alt" style="font-size: 1.2em;"></i>',
            //             titleAttr: 'CSV'
            //         },
            //         {
            //             extend: 'pdfHtml5',
            //             text: '<i class="fas fa-file-pdf" style="font-size: 1.2em;"></i>',
            //             titleAttr: 'PDF'
            //         }
            //     ],
            //     dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
            //         "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            //
            // });
        });
    </script>

    <script>
        jQuery(function ($) {
            // Asynchronously Load the map API
            var script = document.createElement('script'); //todo: Apikey must be placed below
            script.src = "//maps.googleapis.com/maps/api/js?key=GOOGLEAPIKEYWILLBEWRITTEN&callback=initialize";
            document.body.appendChild(script);
        });

        function initialize() {
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };

            // Display a map on the page
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            map.setTilt(45);

            // Multiple Markers
            var markers = [];

            // Info Window Content
            var infoWindowContent = [];

            @foreach($user->properties as $property)
            @if($property->lat && $property->lng)
            markers.push(['{{$property->house_number . ", " . $property->stname . ", " . \App\Helpers\Helper::getBoroName($property->boro)}}', {{$property->lat}}, {{$property->lng}}]);
            infoWindowContent.push(['<div class="info_content">' +
            '<h3>{{$property->house_number}} , {{$property->stname}}, {{\App\Helpers\Helper::getBoroName($property->boro)}}</h3>' +
            '<p><img src="{{$property->image()}}" height="100px"></img></p>' + '</div>']);
            @endif
            @endforeach




            // Display multiple markers on a map
            var infoWindow = new google.maps.InfoWindow(), marker, i;

            // Loop through our array of markers & place each one on the map
            for (i = 0; i < markers.length; i++) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });

                // Allow each marker to have an info window
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map, marker);
                        }
                    }
                )(marker, i));

                // Automatically center the map fitting all markers on the screen
                map.fitBounds(bounds);
            }

            // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
                this.setZoom(10);
                google.maps.event.removeListener(boundsListener);
            });

        }
    </script>
@stop
