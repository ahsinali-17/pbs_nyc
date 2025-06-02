@extends('portal.master')

@section('title', 'DOT Sidewalk Inspections')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DOT Sidewalk Inspections</h3>
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
                                <th>SR#</th>
                                <th>Inspection Date</th>
                                <th>Failure Reason</th>
                                <th>Pass Fail</th>
                                <th>Violation</th>
                                <th>Permit(s)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->dotSidewalkInspections as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>

                                        <td>{{$item->sr}}</td>
                                        <td>{{$item->inspectionDate()}}</td>
                                        <td>{{$item->reason_for_failure}}</td>
                                        <td>{{$item->pass_fail}}</td>
                                        <td>{{$item->violation}}</td>
                                        <td>{{$item->permit}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>SR#</th>
                                <th>Inspection Date</th>
                                <th>Failure Reason</th>
                                <th>Pass Fail</th>
                                <th>Violation</th>
                                <th>Permit(s)</th>
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
        $(function () {
            $('#resultstable').DataTable({
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
        });
    </script>
@stop
