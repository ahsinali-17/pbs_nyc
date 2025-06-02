@extends('portal.master')

@section('title', 'OATH Hearings')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">OATH Hearings</h3>
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
                                <th>Ticket Number</th>
                                <th>Violation number</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>Respondent First Name</th>
                                <th>Last Name</th>
                                <th>Hearing Status</th>
                                <th>hearing Result</th>
                                <th>Scheduled Hearing Location</th>
                                <th>Hearing Date</th>
                                <th>Violation Description</th>
                                <th>Charge 1 Code Description</th>
                                <th>Penalty Imposed</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->oathHearings as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->ticket_number}}</td>
                                        <td>{{$item->violation_number}}</td>
                                        <td>{{$item->violationDate()}}</td>
                                        <td>{{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}</td>
                                        <td>{{$item->respondent_first_name}}</td>
                                        <td>{{$item->respondent_last_name}}</td>
                                        <td>{{$item->hearing_status}}</td>
                                        <td>{{$item->hearing_result}}</td>
                                        <td>{{$item->scheduled_hearing_location}}</td>
                                        <td>{{$item->hearingDate()}}</td>
                                        <td>{{$item->violation_description}}</td>
                                        <td>{{$item->charge_1_code_description}}</td>
                                        <td>${{$item->penalty_imposed}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Ticket Number</th>
                                <th>Violation number</th>
                                <th>Violation Date</th>
                                <th>Issuing Agency</th>
                                <th>Respondent First Name</th>
                                <th>Last Name</th>
                                <th>Hearing Status</th>
                                <th>hearing Result</th>
                                <th>Scheduled Hearing Location</th>
                                <th>Hearing Date</th>
                                <th>Violation Description</th>
                                <th>Charge 1 Code Description</th>
                                <th>Penalty Imposed</th>
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
            var table = $('#resultstable').DataTable({
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


        });
    </script>
@stop
