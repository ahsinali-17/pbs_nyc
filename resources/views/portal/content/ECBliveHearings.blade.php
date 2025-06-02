@extends('portal.master')

@section('title', 'ECB Hearings')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hearings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 2, "asc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">


                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Respondent</th>
                                <th>Hearing Date</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>Description</th>
                                <th>Hearing Status</th>
                                <th>Hearing Result</th>
                                <th>ECB #</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->oathHearings as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->respondent_last_name}}</td>
                                        <td>{{$item->hearingDate()}}</td>
                                        <td>{{$item->violationDate()}}</td>
                                        <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                        <td>{{$item->charge_1_code_description}}</td>
                                        <td>{{$item->hearing_status}}</td>
                                        <td>{{$item->hearing_result}}</td>
                                        <td>{{$item->ticket_number}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Respondent</th>
                                <th>Hearing Date</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>Description</th>
                                <th>Hearing Status</th>
                                <th>Hearing Result</th>
                                <th>ECB #</th>
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
                dt.columns(4).search(filter).draw();

            }

            var filterbuttons2 = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter2",
                        text: 'ALL',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            table.draw();
                            //dt.columns(6).search("").draw();
                        }

                    },
                    {
                        name: "filter2",
                        text: 'OPEN',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            $.fn.dataTable.ext.search.push(
                                function (settings, data, dataIndex) {
                                    var doksanday = new Date()
                                    doksanday.setDate(doksanday.getDate() - 90);
                                    var datadate = new Date(data[2]);
                                    var status = data[6];
                                    var result = data[7];


                                    if (
                                        (result != null && (result === 'HEARING COMPLETED' ||
                                            result === 'WRITTEN OFF'))
                                        ||
                                        (status != null && status === 'WRITTEN OFF')
                                        || ((status === 'HEARING COMPLETED' || status === 'STAYED' || status === 'DEFAULTED' || status === 'DOCKETED' || status === 'PAID IN FULL' || status === 'APPEAL DECIS RENDERD' || result === 'STIPULATD' || result.includes("DEFAULT") || (result === 'IN VIOLATION' && status === 'PAID IN FULL')) && datadate < doksanday)
                                    ) {

                                        return false;
                                    }
                                    return true;
                                }
                            );
                            table.draw();
                        }
                    },
                    {
                        name: "filter2",
                        text: 'CLOSED',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            $.fn.dataTable.ext.search.push(
                                function (settings, data, dataIndex) {
                                    var doksanday = new Date();
                                    doksanday.setDate(doksanday.getDate() - 90);
                                    var datadate = new Date(data[2]);
                                    var status = data[6];
                                    var result = data[7];
                                    if (
                                        (result != null && (result === 'HEARING COMPLETED' ||
                                            result === 'WRITTEN OFF'))
                                        ||
                                        (status != null && status === 'WRITTEN OFF')
                                        || ((status === 'HEARING COMPLETED' || status === 'STAYED' || status === 'DEFAULTED' || status === 'DOCKETED' || status === 'PAID IN FULL' || status === 'APPEAL DECIS RENDERD' || result === 'STIPULATD' || result.includes("DEFAULT") || (result === 'IN VIOLATION' && status === 'PAID IN FULL')) && datadate < doksanday)
                                    ) {
                                        return true;
                                    }
                                    return false;
                                }
                            );
                            table.draw();
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
                        text: 'DOB',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(4).search("BUILDINGS").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'FDNY',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(4).search("FIRE").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'DEP',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(4).search("DEP - ").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'DOH',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(4).search("DOH").draw();
                        }
                    },

                    {
                        name: "filter",
                        text: 'DOT',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(4).search("TRANSPORTATION").draw();
                        }
                    },

                    {
                        name: "filter",
                        text: 'DSNY',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(4).search("SANITATION").draw();
                        }
                    },

                    {
                        name: "filter",
                        text: 'NYPD',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(4).search("POLICE").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'OTHERS',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            keyword = '^(?!.*(DEP|DEPARTMENT|BUILDINGS|DOH|TRANSPORTATION|SANITATION|FIRE|POLICE)).*$';
                            table.column(4).search(keyword, true, false).draw();
                        }
                    },
                ]
            });
            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.buttons('filter2:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('OPEN')").trigger();
            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));
            $('<div class="row mb-3"></div>').append($(filterbuttons2.container().addClass('col-12 col-md-3'))).prependTo($(table.table().container()));

            // table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            // table.button("button:contains('ALL')").trigger();
            // $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

        });

    </script>
@stop

