@extends('portal.master')

@section('title', 'ECB Violations')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ECB Violations</h3>
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
                                <th>ECB #</th>
                                <th>DOB#</th>
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
                            @foreach($properties as $property)
                                @foreach($property->ecbViolations as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->ecb_violation_number}}</td>
                                        <td>{{$item->dob_violation_number}}</td>
                                        <td>{{$item->hearingDate()}}</td>
                                        <td>{{$item->respondent_name}}</td>
                                        <td>{{$item->violation_type}}</td>
                                        <td>${{$item->penality_imposed}}</td>
                                        <td>${{$item->balance_due}}</td>
                                        <td>{{$item->hearing_status}}</td>
                                        <td>{{$item->ecb_violation_status}}</td>
                                        <td>{{$item->certification_status}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>ECB #</th>
                                <th>DOB#</th>
                                <th>Hearing Date</th>
                                <th>Respondent</th>
                                <th>Viol Type</th>
                                <th>Penality Imposed</th>
                                <th>Balance</th>
                                <th>Hearing</th>
                                <th>ECB Viol. Status</th>
                                <th>Certification Status</th>
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

            function filterfunc(e, dt, node, config) {
                dt.buttons('filter:name').active(false);
                this.active(true);
                var filter = node[0].innerText;
                if (filter === "ALL") filter = "";
                dt.columns().search("");
                dt.columns(9).search(filter).draw();

            }

            var filterbuttons = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter",
                        text: 'ALL',
                        action: filterfunc,

                    },
                    {
                        name: "filter",
                        text: 'ACTIVE',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(9).search("ACTIVE").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'RESOLVED',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(9).search("RESOLVE").draw();
                        }
                    },

                ]
            });
            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('ACTIVE')").trigger();
            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

        });

    </script>
@stop
    <!-- page script -->
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#resultstable').DataTable({--}}
{{--                "paging": true,--}}
{{--                "lengthChange": true,--}}
{{--                "searching": true,--}}
{{--                "ordering": true,--}}
{{--                "info": true,--}}
{{--                "autoWidth": true,--}}
{{--                "responsive":true,--}}
{{--                buttons: [--}}
{{--                    {--}}
{{--                        extend: 'copyHtml5',--}}
{{--                        text: '<i class="fas fa-copy" style="font-size: 1.2em;"></i>',--}}
{{--                        titleAttr: 'Copy'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        extend: 'excelHtml5',--}}
{{--                        text: '<i class="fas fa-file-excel" style="font-size: 1.2em;"></i>',--}}
{{--                        titleAttr: 'Excel'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        extend: 'csvHtml5',--}}
{{--                        text: '<i class="fas fa-file-alt" style="font-size: 1.2em;"></i>',--}}
{{--                        titleAttr: 'CSV'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        extend: 'pdfHtml5',--}}
{{--                        text: '<i class="fas fa-file-pdf" style="font-size: 1.2em;"></i>',--}}
{{--                        titleAttr: 'PDF'--}}
{{--                    }--}}
{{--                ],--}}
{{--                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +--}}
{{--                    "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",--}}

{{--            });--}}
{{--            function filterfunc(e, dt, node, config) {--}}
{{--                dt.buttons('filter:name').active(false);--}}
{{--                this.active(true);--}}
{{--                var filter = node[0].innerText;--}}
{{--                if (filter === "ALL") filter = "";--}}
{{--                dt.columns().search("");--}}
{{--                dt.columns(6).search(filter).draw();--}}

{{--            }--}}

{{--            var filterbuttons = new $.fn.dataTable.Buttons(table, {--}}
{{--                "buttons": [--}}
{{--                    {--}}
{{--                        name: "filter",--}}
{{--                        text: 'ALL',--}}
{{--                        action: filterfunc,--}}

{{--                    },--}}
{{--                    {--}}
{{--                        name: "filter",--}}
{{--                        text: 'UNCORRECTED',--}}
{{--                        action: function (e, dt, node, config) {--}}
{{--                            table.buttons('filter:name').active(false);--}}
{{--                            this.active(true);--}}
{{--                            dt.columns().search("");--}}
{{--                            keyword = '^(?!.*(COMPLETED)).*$';--}}
{{--                            table.column(6).search(keyword,true,false).draw();--}}
{{--                        }--}}
{{--                    },--}}
{{--                    {--}}
{{--                        name: "filter",--}}
{{--                        text: 'CORRECTED',--}}
{{--                        action: function (e, dt, node, config) {--}}
{{--                            table.buttons('filter:name').active(false);--}}
{{--                            this.active(true);--}}
{{--                            dt.columns().search("");--}}
{{--                            dt.columns(6).search("COMPLETED").draw();--}}
{{--                        }--}}
{{--                    },--}}

{{--                ]--}}
{{--            });--}}
{{--            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');--}}
{{--            table.button("button:contains('ALL')").trigger();--}}
{{--            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));--}}
{{--        });--}}
{{--    </script>--}}
