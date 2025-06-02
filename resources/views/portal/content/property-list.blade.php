@extends('portal.master')

@section('title', 'Property List')


@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Property List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                                <table  id="resultstable"  class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>BIN</th>
                                        <th>Address</th>
                                        <th style="width: 2%">BSA Appl.</th>
                                        <th style="width: 2%">DEP Cats</th>
                                        <th style="width: 2%">DOB Cert.</th>
                                        <th style="width: 2%">DOB Comp.</th>
                                        <th style="width: 2%">DOB Job</th>
                                        <th style="width: 2%">DOB App.</th>
                                        <th style="width: 2%">DOB Elec.</th>
                                        <th style="width: 2%">DOB Elev.</th>
                                        <th style="width: 2%">DOB NowJo</th>
                                        <th style="width: 2%">DOB Safet</th>
                                        <th style="width: 2%">DOB Perm.</th>
                                        <th style="width: 2%">DOB Viol.</th>
                                        <th style="width: 2%">DOT S.Cor</th>
                                        <th style="width: 2%">DOT S.Ins</th>
                                        <th style="width: 2%">ECB Viol.</th>
                                        <th style="width: 2%">HPD Comp.</th>
                                        <th style="width: 2%">HPD Dwel.</th>
                                        <th style="width: 2%">HPD H.Lit</th>
                                        <th style="width: 2%">HPD Juri.</th>
                                        {{--                                        <th style="width: 2%">HPD LL7.</th>--}}
                                        <th style="width: 2%">HPD RepV.</th>
                                        <th style="width: 2%">HPD Viol.</th>
                                        <th style="width: 2%">LM Comp.</th>
                                        <th style="width: 2%">LM Perm.</th>
                                        <th style="width: 2%">LM Viol.</th>
                                        <th style="width: 2%">OATH Hear.</th>
                                        <th style="width: 2%">S.R. 311</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($properties as $property)
                                        <tr>
                                            <td>{{$property->bin}}</td>
                                            <td>{{$property->house_number}} {{$property->stname}}
                                                , {{\App\Helpers\Helper::getBoroName($property->boro)}}, NY
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->bsa_application_status_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dep_cats_permits_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_cert_occupancy_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_complaints_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_job_filings_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_now_approved_permits_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_now_electrical_permits_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_now_elevator_permits_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_now_job_filings_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_now_safety_boiler_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_permits_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dob_violations_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dot_sidewalk_correspondences_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->dot_sidewalk_inspections_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->ecb_violations_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->hpd_complaints_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->hpd_dwelling_registrations_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->hpd_housing_litigations_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->hpd_jurisdiction_count}}</span>
                                            </td>
                                            {{--                                            <td><span--}}
                                            {{--                                                        class="badge bg-dark">{{$property->hpdLocalLaw7_count}}</span>--}}
                                            {{--                                            </td>--}}
                                            <td><span
                                                        class="badge bg-dark">{{$property->hpd_repair_vacate_orders_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->hpd_violations_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->landmark_complaints_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->landmark_permits_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->landmark_violations_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->oath_hearings_count}}</span>
                                            </td>
                                            <td><span
                                                        class="badge bg-dark">{{$property->service_requests311_count}}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
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
