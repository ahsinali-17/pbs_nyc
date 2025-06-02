@extends('portal.master')

@section('title', 'AdminLTE')

@section('plugins.Knob', true)

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Sync Status</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Local Update Time</th>
                                <th>OpenData Update Time</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>BSA Application Status</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\BSAApplicationStatus::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\BSAApplicationStatus::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DepCatsPermits</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DepCatsPermits::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DepCatsPermits::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobCertOccupancy</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobCertOccupancy::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobCertOccupancy::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobComplaints</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobComplaints::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobComplaints::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobJobFilings</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobJobFilings::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobJobFilings::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobNowApprovedPermits</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobNowApprovedPermits::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobNowApprovedPermits::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobNowElectricalPermits</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobNowElectricalPermits::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobNowElectricalPermits::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobNowElevatorPermits</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobNowElevatorPermits::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobNowElevatorPermits::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobNowFacadeFilings</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobNowFacadeFilings::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobNowFacadeFilings::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobNowJobFilings</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobNowJobFilings::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobNowJobFilings::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobNowSafetyBoiler</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobNowSafetyBoiler::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobNowSafetyBoiler::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobPermits</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobPermits::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobPermits::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DobViolations</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DobViolations::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DobViolations::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DotSidewalkCorrespondences</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DotSidewalkCorrespondences::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DotSidewalkCorrespondences::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>DotSidewalkInspections</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\DotSidewalkInspections::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\DotSidewalkInspections::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>EcbViolations</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\EcbViolations::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\EcbViolations::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>HpdComplaints<i>(Dataset Removed by NYC OpenData)</i></td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\HpdComplaints::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\HpdComplaints::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>HpdDwellingRegistrations</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\HpdDwellingRegistrations::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\HpdDwellingRegistrations::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>HpdHousingLitigations</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\HpdHousingLitigations::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\HpdHousingLitigations::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            {{--                            <tr>--}}
                            {{--                                <td>{{$i++}}.</td>--}}
                            {{--                                <td>HpdJurisdiction</td>--}}
                            {{--                                <td><span class="badge bg-blue">{{$localtime=\App\Models\HpdJurisdiction::getLocalUpdateTime()}}</span></td>--}}
                            {{--                                <td><span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\HpdJurisdiction::getLastUpdateTime()}}</span></td>--}}
                            {{--                                <td><i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} /></td>--}}
                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <td>{{$i++}}.</td>--}}
                            {{--                                <td>HpdLocalLaw7</td>--}}
                            {{--                                <td><span class="badge bg-blue">{{$localtime=\App\Models\HpdLocalLaw7::getLocalUpdateTime()}}</span></td>--}}
                            {{--                                <td><span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\HpdLocalLaw7::getLastUpdateTime()}}</span></td>--}}
                            {{--                                <td><i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} /></td>--}}
                            {{--                            </tr>--}}

                            <tr>
                                <td>{{$i++}}.</td>
                                <td>HpdRepairVacateOrders</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\HpdRepairVacateOrders::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\HpdRepairVacateOrders::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>HpdViolations</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\HpdViolations::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\HpdViolations::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>LandmarkComplaints</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\LandmarkComplaints::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\LandmarkComplaints::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>LandmarkPermits</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\LandmarkPermits::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\LandmarkPermits::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>LandmarkViolations</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\LandmarkViolations::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\LandmarkViolations::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>OathHearings</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\OathHearings::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\OathHearings::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>ServiceRequests311</td>
                                <td>
                                    <span class="badge bg-blue">{{$localtime=\App\Models\ServiceRequests311::getLocalUpdateTime()}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-orange">{{$sunucutime=\App\Models\ServiceRequests311::getLastUpdateTime()}}</span>
                                </td>
                                <td>
                                    <i {!! $localtime > $sunucutime ? 'class="fas fa-fw fa-check-circle" style="color: green;"' : 'class="fas fa-fw fa-times-circle" style="color: red;"' !!} />
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('js')

@stop
