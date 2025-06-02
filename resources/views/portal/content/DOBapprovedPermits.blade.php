@extends('portal.master')

@section('title', 'DOB Now Approved Permits')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DOB Now Approved Permits</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 6, "desc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                            <thead>


                            <tr>
                                <th>ADDRESS</th>
                                <th>Filing Number</th>
                                <th>Work Type</th>
                                <th>Issued Date</th>
                                <th>Work Floor</th>
                                <th>Permit License</th>
                                <th>Applicant License</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->dobNowApprovedPermits as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->job_filing_number}}</td>
                                        <td>{{$item->work_type}}</td>
                                        <td>{{$item->issuedDate()}}</td>
                                        <td>{{$item->work_on_floor}}</td>
                                        <td>{{$item->permittee_s_license_type}}</td>
                                        <td>{{$item->applicant_license}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Filing Number</th>
                                <th>Work Type</th>
                                <th>Issued Date</th>
                                <th>Work Floor</th>
                                <th>Permit License</th>
                                <th>Applicant License</th>
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
            table =    $('#resultstable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive":true,
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
                dt.columns(2).search(filter).draw();

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
                            dt.columns(2).search("").draw();
                        },


                    },
                    {
                        name: "filter",
                        text: '<b>Antenna</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Antenna").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Boiler Equipment</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Equipment").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Construction Fence</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Construction").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Curb Cut</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Curb").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Mechanical Systems</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Mechanical").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Plumbing</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Plumbing").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Construction Fence</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Construction").draw();
                        }
                    },

                ]
            });
            var filterbuttons2 = new $.fn.dataTable.Buttons(table, {
                buttons: [

                    {
                        name: "filter",
                        text: '<b>Sidewalk Shed</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Shed").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Construction</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Construction").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Sign</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Sign").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Sprinklers</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Sprinklers").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Standpipe</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Standpipe").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Structural</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Structural").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: '<b>Supported Scaffold</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(2).search("Scaffold").draw();
                        }
                    },
                ]
            });
            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('ALL')").trigger();
            $('<div class="row mb-3"></div>').append($(filterbuttons2.container().addClass('col-12'))).prependTo($(table.table().container()));
            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));
        });
    </script>
@stop
