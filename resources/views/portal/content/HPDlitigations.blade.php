@extends('portal.master')

@section('title', 'HPD Housing Litigations')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">HPD Housing Litigations</h3>
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
                                <th>Caseopen Date</th>
                                <th>Finding Date</th>
                                <th>Respondent</th>
                                <th>Case Type</th>
                                <th>Judgement</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->hpdHousingLitigations as $item)
                                    <tr>
                                        <td>{{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->caseopenDate()}}</td>
                                        <td>{{$item->findingDate()}}</td>
                                        <td>{{$item->respondent}}</td>
                                        <td>{{$item->casetype}}</td>
                                        <td>{{$item->casejudgement}}</td>
                                        <td>{{$item->casestatus}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Caseopen Date</th>
                                <th>Finding Date</th>
                                <th>Respondent</th>
                                <th>Case Type</th>
                                <th>Judgement</th>
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

            var filterbuttons = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter",
                        text: 'ALL',
                        action: filterfunc,

                    },
                    {
                        name: "filter",
                        text: 'OPEN',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            keyword = '^(?!.*(CLOSED)).*$';
                            table.column(6).search(keyword,true,false).draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'CLOSED',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            keyword3 = '((CLOSED)).*$';
                            table.column(6).search(keyword3,true,false).draw();
                            // dt.columns([6,9]).search("COMPLETED|WRITTEN|ACCEPTED|-",true,false).draw();
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
