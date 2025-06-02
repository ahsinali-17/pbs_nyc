@extends('portal.master')

@section('title', 'DOB Violations')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DOB Violations</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 1, "desc" ]]'
                               class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                            <thead>
                            <tr>
                                <th>Address</th>
                                <th>Issue Date</th>
                                <th>Device #</th>
                                <th>Description</th>
                                <th>Number</th>
                                <th>Violation Category</th>
                                <th>Violation Type</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            {{--                                            <tbody>--}}
                            {{--                                            @foreach($properties as $property)--}}
                            {{--                                                @foreach($property->dobViolations as $item)--}}
                            {{--                                                    <tr>--}}
                            {{--                                                        <td> {{$property->house_number}} {{$property->stname}}</td>--}}
                            {{--                                                        <td>{{$item->issueDate()}}</td>--}}
                            {{--                                                        <td>{{$item->device_number}}</td>--}}
                            {{--                                                        <td>{{$item->description}}</td>--}}
                            {{--                                                        <td>{{$item->number}}</td>--}}
                            {{--                                                        <td>{{$item->violation_category}}</td>--}}
                            {{--                                                        <td>{{$item->violation_type}}</td>--}}
                            {{--                                                        <td>{{$item->disposition_date ==null ? "OPEN":"CLOSED"}}</td>--}}
                            {{--                                                    </tr>--}}
                            {{--                                                @endforeach--}}
                            {{--                                            @endforeach--}}
                            {{--                                            </tbody>--}}
                            <tfoot>
                            <tr>
                                <th>Address</th>
                                <th>Issue Date</th>
                                <th>Device #</th>
                                <th>Description</th>
                                <th>Number</th>
                                <th>Violation Category</th>
                                <th>Violation Type</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@stop


@section('js')
    <!-- page script -->
    <script>
        var table;
        $(function () {
            table = $('#resultstable').DataTable({
                "ajax": "@if($buildingid ?? ''){{route('user.dobViolationsSingle',['buildingid'=> $buildingid ?? ''])}}@else{{route('user.dobViolations')}}@endif",
                "columns": [
                    {"data": "address"},
                    {"data": "issueDate"},
                    {"data": "device_number"},
                    {"data": "description"},
                    {"data": "number"},
                    {"data": "violation_category"},
                    {"data": "violation_type"},
                    {"data": "status"},
                ],
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "processing": true,
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

            function filterfunc(e, dt, node, config) {
                dt.buttons('filter:name').active(false);
                this.active(true);
                var filter = node[0].innerText;
                if (filter === "ALL") filter = "";
                dt.columns().search("");
                dt.columns(7).search(filter).draw();

            }

            var filterbuttons = new $.fn.dataTable.Buttons(table, {
                buttons: [
                    {
                        name: "filter",
                        text: '<b>ALL</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("").draw();
                        },


                    },
                    {
                        name: "filter",
                        text: '<b>OPEN</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("OPEN").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>CLOSED</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("CLOSE").draw();
                        }
                    },
                ]
            });
            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('OPEN')").trigger();
            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

        });

    </script>
@stop
