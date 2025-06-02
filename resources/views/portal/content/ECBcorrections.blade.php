@extends('portal.master')

@section('title', 'ECB Corrections')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ECB Corrections</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 3, "desc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">


                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Balance</th>
                                <th>Respondent</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>ECB #</th>
                                <th>HEARING Stat.</th>
                                <th>HEARING Res.</th>
                                <th>ECB Status</th>
                                <th>Cert. status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->oathHearings as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>$ {{$item->balance_due}}</td>
                                        <td>{{$item->respondent_last_name}}</td>
                                        <td>{{$item->violationDate()}}</td>
                                        <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                        <td>{{$item->ticket_number}}</td>
                                        <td>{{$item->hearing_status}}</td>
                                        <td>{{$item->hearing_result}}</td>
                                        <td>{{$item->ecbViolation != null ? $item->ecbViolation->ecb_violation_status : "-" }}</td>
                                        <td>{{$item->ecbViolation != null ? $item->ecbViolation->certification_status : "-" }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Balance</th>
                                <th>Respondent</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>ECB #</th>
                                <th>HEARING Stat.</th>
                                <th>HEARING Res.</th>
                                <th>ECB Status</th>
                                <th>Cert. status</th>
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
                $.fn.dataTable.ext.search.pop();
                dt.columns().search("");
                dt.columns(6).search(filter).draw();

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
                        text: 'UNCORRECTED',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            $.fn.dataTable.ext.search.push(
                                function (settings, data, dataIndex) {
                                    var status = data[6];
                                    var certstatus = data[9];
                                    var agency = data[4];
                                    var result = data[7];

                                    if (
                                        status === 'HEARING COMPLETED'
                                        || status === 'WRITTEN OFF'
                                        || status ==='STAYED'
                                        || certstatus.includes('ACCEPTED')
                                        || (agency === 'DEPARTMENT OF SANITATION' && status === 'PAID IN FULL')
                                        || ((agency === '' || agency === null) && status === 'PAID IN FULL')
                                        || (agency === 'ASBESTOS CONTROL PROGRAM' && status === 'PAID IN FULL' && result === 'STIPULATED')
                                        || (agency === 'FIRE DEPARTMENT' && status === 'PAID IN FULL' && result === 'STIPULATED')
                                    )
                                    {

                                        return false;
                                    }
                                    return true;
                                }
                            );
                            table.draw();

                            // dt.columns().search("");
                            // keyword = '^(?!.*(COMPLETED|WRITTEN OFF)).*$';
                            // keyword2 = '^(?!.*(ACCEPTED)).*$';
                            // table.column(6).search(keyword,true,false).column(9).search(keyword2,true,false).draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'CORRECTED',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            $.fn.dataTable.ext.search.push(
                                function (settings, data, dataIndex) {
                                    var status = data[6];
                                    var certstatus = data[9];
                                    var agency = data[4];
                                    var result = data[7];

                                    if (
                                        status === 'HEARING COMPLETED'
                                            || status === 'WRITTEN OFF'
                                            || status ==='STAYED'
                                            || certstatus.includes('ACCEPTED')
                                            || (agency === 'DEPARTMENT OF SANITATION' && status === 'PAID IN FULL')
                                        || ((agency === '' || agency === null) && status === 'PAID IN FULL')
                                        || (agency === 'ASBESTOS CONTROL PROGRAM' && status === 'PAID IN FULL' && result === 'STIPULATED')
                                        || (agency === 'FIRE DEPARTMENT' && status === 'PAID IN FULL' && result === 'STIPULATED')
                                    )
                                    {

                                        return true;
                                    }
                                    return false;
                                }
                            );
                            table.draw();
                            // dt.columns().search("");
                            // keyword3 = '((COMPLETED|WRITTEN OFF)).*$';
                            // keyword4 = '((ACCEPTED|-)).*$';
                            // table.column(6).search(keyword3,true,false).column(9).search(keyword4,true,false).draw();
                            // dt.columns([6,9]).search("COMPLETED|WRITTEN|ACCEPTED|-",true,false).draw();
                        }
                    },

                ]
            });
            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('UNCORRECTED')").trigger();
            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

        });

    </script>
@stop

