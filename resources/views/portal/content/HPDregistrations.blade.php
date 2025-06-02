@extends('portal.master')

@section('title', 'HPD Dwelling Registrations')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">HPD Dwelling Registrations</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 1, "desc" ]]'
                               class="display table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                            <thead>


                            <tr>
                                <th>ADDRESS</th>
                                <th>Registration #</th>
                                <th>Last Registration Date</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->hpdDwellingRegistrations as $item)
                                    <tr>
                                        <td> {{$property->house_number}} {{$property->stname}}</td>

                                        <td>{{$item->registrationid}}</td>
                                        <td>{{$item->lastregistrationDate()}}</td>
                                        <td class="details-control">
                                            <div class="hasan details d-none">
                                                <table cellpadding="5" cellspacing="0" border="0"
                                                       style="margin: auto">
                                                    <thead>
                                                    <tr>
                                                        <th>TYPE</th>
                                                        <th>COORPORATION</th>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($item->contacts as $contact)
                                                        <tr>
                                                            <td>{{$contact->type}}</td>
                                                            <td>{{$contact->corporationname}}</td>
                                                            <td>{{$contact->firstname}} {{$contact->lastname}}</td>
                                                            <td>{{$contact->businesshousenumber}} {{$contact->businessstreetname}} {{$contact->businessapartment}} {{$contact->businesscity}} {{$contact->businessstate}} {{$contact->businesszip}}</td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Registration #</th>
                                <th>Last Registration Date</th>
                                <th>Details</th>
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
    <style>
        td.details-control {
            background: url("{{asset('/images/icons/details_open.png')}}") no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('{{asset("/images/icons/details_close.png")}}') no-repeat center center;
        }
    </style>
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

            $('#resultstable tbody').on('click', 'td.details-control', function () {
                var td = $(this).children(".details");

                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(td.html()).show();
                    tr.addClass('shown');
                }
            });
        });
    </script>
@stop
