@extends('portal.master')

@section('title', 'DOB Stop Work/Vacate Orders')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stop Work/Vacate Orders</h3>
                    </div>
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 1, "desc" ]]'
                               class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Complaint Number</th>
                                <th>Status</th>
                                <th>Date Entered</th>
                                <th>Complaint Code</th>
                                <th>Unit</th>
                                <th>Disposition Code</th>
                                <th>Inspection Date</th>
                                <th class="d-none">Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->dobComplaints as $item)
                                    @if($item->complaintCode!=null && Str::contains($item->complaintCode->description, 'ORDER'))
                                        <tr>
                                            <td> {{$property->house_number}} {{$property->stname}}</td>
                                            <td>{{$item->complaint_number}}</td>
                                            <td style="color:#000000; background-color: #778f16">{{$item->status}}</td>
                                            <td>{{$item->dateEntered()}}</td>
                                            <td>{{$item->complaintCode == null ? $item->complaint_code :$item->complaintCode->description}}
                                                <br/>(Priority:<b> {{$item->complaintCode == null ? 'N/A': $item->complaintCode->priority}}</b>)
                                            </td>
                                            <td>{{\App\Helpers\Helper::getFullComplaintUnit($item->unit)}}</td>
                                            <td>{{$item->dispositionCode == null ? $item->disposition_code :$item->dispositionCode->description}}</td>
                                            <td>{{$item->inspectionDate()}}</td>
                                            <td class="d-none">{{$item->dispositionCode == null ? "OTHER" :$item->dispositionCode->category}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Complaint Number</th>
                                <th>Status</th>
                                <th>Date Entered</th>
                                <th>Complaint Code</th>
                                <th>Unit</th>
                                <th>Disposition Code</th>
                                <th>Inspection Date</th>
                                <th class="d-none">Category</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
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

            // var filterbuttons = new $.fn.dataTable.Buttons(table, {
            //     "buttons": [
            //         {
            //             name: "filter",
            //             text: '<b>ALL</b>',
            //             action: function (e, dt, node, config) {
            //                 table.buttons('filter:name').active(false);
            //                 this.active(true);
            //                 dt.columns().search("").draw();
            //             }
            //         },
            //         {
            //             name: "filter",
            //             text: 'Work Orders',
            //             action: function (e, dt, node, config) {
            //                 table.buttons('filter:name').active(false);
            //                 this.active(true);
            //                 dt.columns().search("");
            //                 dt.columns(8).search("SWO").draw();
            //             }
            //         },
            //         {
            //             name: "filter",
            //             text: 'Vacate Orders',
            //             action: function (e, dt, node, config) {
            //                 table.buttons('filter:name').active(false);
            //                 this.active(true);
            //                 dt.columns().search("");
            //                 dt.columns(8).search("VACATE").draw();
            //             }
            //         },
            //     ]
            // });
            var filterbuttons = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter",
                        text: 'ALL',
                        action: filterfunc,

                    },
                    {
                        name: "filter",
                        text: 'Work Orders',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(8).search("SWO").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'Vacate Orders',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(8).search("VACATE").draw();
                        }
                    },

                    {
                        name: "filter",
                        text: 'OTHERS',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns(8).search("OTHER").draw();
                        }
                    },
                ]
            });
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
                                    var status = data[2];
                                    if  (status !== null  && status !== '' && status!== 'CLOSED' )
                                    {
                                        return true;
                                    }
                                    return false;
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
                                    var status = data[2];
                                    if  (status !== null && status !== '' && status!== 'CLOSED' )
                                    {
                                        return false;
                                    }
                                    return true;
                                }
                            );
                            table.draw();
                        }
                    },
                ]
            });
            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.buttons('filter2:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('OPEN')").trigger();
            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));
            $('<div class="row mb-3"></div>').append($(filterbuttons2.container().addClass('col-12'))).prependTo($(table.table().container()));


        });

    </script>
@stop
