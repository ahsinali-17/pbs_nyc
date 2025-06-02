@extends('portal.master')

@section('title', 'ECB Complints')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ECB Complaints</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 2, "desc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">


                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Complaint #</th>
                                <th>Received</th>
                                <th>Agency</th>
                                <th>Type</th>
                                <th>Desc</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->serviceRequests311 as $item)
                                    {{--                                    @if(!Str::contains($item->status, 'Closed'))--}}
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->unique_key}}</td>
                                        <td>{{$item->createdDate()}}</td>
                                        <td>{{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}</td>
                                        <td>{{$item->complaint_type}}</td>
                                        <td>{{$item->descriptor}}</td>
                                        <td>{{$item->status}}</td>
                                    </tr>
                                    {{--                                   @endif--}}
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Complaint #</th>
                                <th>Received</th>
                                <th>Agency</th>
                                <th>Type</th>
                                <th>Desc</th>
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
                dt.columns(6).search(filter).draw();

            }

            var filterbuttons2 = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter2",
                        text: 'ALL',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            dt.columns(6).search("").draw();
                        }

                    },
                    {
                        name: "filter2",
                        text: 'OPEN',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            dt.columns(6).search("");
                            dt.columns(6).search('(Open|In Progress|Started|Draft|Unassigned|Pending)',true,false).draw();
                        }
                    },
                    {
                        name: "filter2",
                        text: 'CLOSED',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            dt.columns(6).search("");
                            dt.columns(6).search('(Closed|Assigned|Unspecified|Cancelled|Email Sent)').draw();
                        }
                    },
                ]
            });

            var filterbuttons = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter",
                        text: 'ALL',
                        action: filterfunc,

                    },
                    {
                        name: "filter",
                        text: 'DEP',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("DEP - ").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'DEP',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("DEP - ").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'DOB',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("BUILDINGS").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'DOH',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("HEALTH").draw();
                        }
                    },

                    {
                        name: "filter",
                        text: 'DOT',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("TRANSPORTATION").draw();
                        }
                    },

                    {
                        name: "filter",
                        text: 'DSNY',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("SANITATION").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'FDNY',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("FIRE").draw();
                        }
                    },

                    {
                        name: "filter",
                        text: 'POLICE',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            dt.columns(3).search("POLICE").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'OTHERS',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(3).search("");
                            keyword = '^(?!.*(DEP|DEPARTMENT|BUILDINGS|DOH|TRANSPORTATION|SANITATION|FIRE|POLICE)).*$';
                            table.column(3).search(keyword, true, false).draw();
                        }
                    },
                ]
            });
            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.buttons('filter2:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('OPEN')").trigger();
            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));
            $('<div class="row mb-3"></div>').append($(filterbuttons2.container().addClass('col-12 col-md-3'))).prependTo($(table.table().container()));

        });

    </script>
@stop

