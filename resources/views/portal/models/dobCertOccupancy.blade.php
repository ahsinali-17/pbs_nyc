@extends('portal.master')

@section('title', 'DOB Certificate of Occupancy')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DOB Certificates of Occupancy</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 3, "desc" ]]' class="table table-bordered table-striped" autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Job Number</th>
                                <th>Job Type</th>
                                <th>Issue Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--TODO: All other issue dates only show for up to 3 months from issuance than it can be removed from the list.--}}
                            {{--TODO: Always show latest issue date.--}}
                            @foreach($properties as $property)
                                @foreach($property->dobCertOccupancy as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                        <td>{{$item->job_number}}</td>
                                        <td>{{$item->job_type}}</td>
                                        <td>{{$item->issuedDate()}}</td>
                                        <td>{{$item->application_status_raw}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Job Number</th>
                                <th>Job Type</th>
                                <th>Issue Date</th>
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
