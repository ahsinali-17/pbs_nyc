@extends('portal.master')

@section('title', 'HPD Repairs')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">HPD Repairs</h3>
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
                                <th>OMO #</th>
                                <th>Issued Date</th>
                                <th>Description</th>
                                <th>Award</th>
                                <th>Charged</th>
                                <th>DOF</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->hpdEmergencyRepairs as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->omoid}}</td>
                                        <td>{{$item->omoCreateDate()}}</td>
                                        <td>{{$item->omodescription}}</td>
                                        <td>$ {{$item->omoawardamount}}</td>
                                        <td>$ {{$item->charges == null ? "-":$item->charges->chargeamount}}</td>
                                        <td>{{$item->charges == null ? "-": $item->charges->dateTransferDof()}}</td>
                                        <td>{{$item->omostatusreason}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>OMO #</th>
                                <th>Issued Date</th>
                                <th>Description</th>
                                <th>Award</th>
                                <th>Charged</th>
                                <th>DOF</th>
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

            function filterfunc(e, dt, node, config) {
                dt.buttons('filter:name').active(false);
                this.active(true);
                var filter = node[0].innerText;
                if (filter === "ALL") filter = "";
                dt.columns().search("");
                dt.columns(7).search(filter).draw();

            }

            var filterbuttons = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter",
                        text: '<b>ALL</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("").draw();
                        }

                    },
                    {
                        name: "filter",
                        text: 'Complied',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("Complied").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'Refused',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("Refused").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'No Access',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("No Access").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'Completed',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("Completed").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'ESB',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("ESB").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'Work Done',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(7).search("Work").draw();
                        }
                    },
                ]
            });

            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('Refused')").trigger();

            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

        });

    </script>
@stop

