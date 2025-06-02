@extends('portal.master')

@section('title', 'FDNY Due')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FDNY Due</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 1, "desc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">


                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Balance</th>
                                <th>Client</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>ECB #</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
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
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Client</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>Charge 1 Code Description</th>
                                <th>ECB #</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- page script -->
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

            // function filterfunc(e, dt, node, config) {
            //     window.ae = e;
            //     var filter = e.toElement.innerText;
            //     if (filter === "ALL") filter = "";
            //     dt.columns(4).search("");
            //     dt.columns(2).search(filter).draw();
            //
            // }
            //
            // var filterbuttons = new $.fn.dataTable.Buttons(table, {
            //     "buttons": [
            //         {
            //             className: 'amk',        //bunun dışında birşey bulamadım işe yarayacak
            //             text: 'ALL',
            //             action: filterfunc,
            //
            //         },
            //         {
            //             text: 'DEP',
            //             action: function (e, dt, node, config) {
            //                 dt.columns(2).search("");
            //                 dt.columns(4).search("DEP - ").draw();
            //             }
            //         },
            //         {
            //             text: 'DOB',
            //             action: function (e, dt, node, config) {
            //                 dt.columns(2).search("");
            //                 dt.columns(4).search("BUILDINGS").draw();
            //             }
            //         },
            //         {
            //             text: 'DOH',
            //             action: function (e, dt, node, config) {
            //                 dt.columns(2).search("");
            //                 dt.columns(4).search("DOH").draw();
            //             }
            //         },
            //
            //         {
            //             text: 'DOT',
            //             action: function (e, dt, node, config) {
            //                 dt.columns(2).search("");
            //                 dt.columns(4).search("TRANSPORTATION").draw();
            //             }
            //         },
            //
            //         {
            //             text: 'DSNY',
            //             action: function (e, dt, node, config) {
            //                 dt.columns(2).search("");
            //                 dt.columns(4).search("SANITATION").draw();
            //             }
            //         },
            //         {
            //             text: 'FDNY',
            //             action: function (e, dt, node, config) {
            //                 this.active(true);
            //                 dt.columns(2).search("");
            //                 dt.columns(4).search("FIRE").draw();
            //             }
            //         },
            //
            //         {
            //             text: 'POLICE',
            //             action: function (e, dt, node, config) {
            //                 dt.columns(2).search("");
            //                 dt.columns(4).search("POLICE").draw();
            //             }
            //         },
            //         {
            //             text: 'OTHERS',
            //             action: function (e, dt, node, config) {
            //                 dt.columns(2).search("");
            //                 keyword = '^(?!.*(DEP|DEPARTMENT|BUILDINGS|DOH|TRANSPORTATION|SANITATION|FIRE|POLICE)).*$';
            //                 table.column(4).search(keyword, true, false).draw();
            //             }
            //         },
            //     ]
            // });

            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

        });

    </script>
@stop

