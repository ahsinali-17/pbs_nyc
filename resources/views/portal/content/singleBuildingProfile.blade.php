@extends('portal.master')

@section('title', 'PBS Member Portal')

@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-fw fa-mail-bulk"></i> Dashboard</h1>
@stop

@section('css')
    <style>
        td:hover {
            color: cadetblue;
            cursor: pointer;
        }

        .bulanik {
            filter: blur(4px);
            -o-filter: blur(4px);
            -ms-filter: blur(4px);
            -moz-filter: blur(4px);
            -webkit-filter: blur(4px);
        }

        .hover:hover {
            color: cadetblue;
            cursor: pointer;
        }

        table.dataTable tbody tr.selected {
            background-color: #EEEEEE;
        }
    </style>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12 ">
                    <div class="card">
                        <div class="card-header p-2 hover" data-card-widget="collapse">
                            <i class="fas fa-fw fa-clipboard-list"></i>
                            <b>Property List</b>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div><!-- /.card-header hover -->
                        <div class="card-body">
                        {{--                        PROPERTY LİST--}}
                        <!-- The timeline -->
                            <div style="display: inline; float:right; width: 100%;" id="propertyList">
                                <table id="resultstable" data-order='[[ 0, "asc" ]]'
                                       class="table table-bordered" autosize="1"
                                       style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                                       width="100%"
                                       border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                    <thead>
                                    <tr>
                                        <th>No#</th>
                                        <th>ADDRESS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($user->properties as $bina)
                                        <tr @if($bina->id == $property->id) class="selected" @endif>
                                            <td>{{$i++}}</td>
                                            <td>
                                                <a href="{{route('singleBuildingProfile',['buildingid'=>$bina->id])}}">{{$bina->getAddress()}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No#</th>
                                        <th>ADDRESS</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 ">
                    <div id="ortakolon" class="card">
                        <div class="card-header hover" data-card-widget="collapse">
                            <i class="fas fa-fw fa-home"></i>
                            <b><span class="m-0 text-dark" id="fotoustadres">Building Photo</span></b>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div><!-- /.card-header hover -->
                        <div class="card-body">
                            <img id="photo"
                                 src="{{$property->image()}}"
                                 width="100%">
                            <div class="row mt-2">
                                <div class="col-2">
                                    {!! Form::open(['route' => ['property.photo.delete',$property->id], 'method' => 'post']) !!}
                                    {!! Form::submit('Recover', ['class' => 'btn btn-outline-secondary bg-gray-dark']) !!}
                                    {!! Form::close() !!}
                                </div>
                                <div class="col-10">
                                    {!! Form::open(['route' => ['property.photo.update',$property->id],'method' => 'post','files'=>true]) !!}
                                    <div class="input-group w-100">
                                        <div class="custom-file">
                                        {!! Form::file('photo', ['class' => 'custom-file-input','aria-describedby'=>'inputGroupFileAddon04']) !!}
                                            {!! Form::label('photo', 'Choose File', ['class' => 'custom-file-label']) !!}
                                        </div>
                                        <div class="input-group-append">
                                            {!! Form::submit('Upload', ['class' => 'btn btn-outline-secondary bg-gray-dark','id'=>'inputGroupFileAddon04']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--                    PROPERTY SUMMARY--}}
                    <div class="card bg-light">
                        <div class="card-header hover text-muted border-bottom-0" data-card-widget="collapse">
                            <b><span class="m-0 text-dark"><i
                                            class="fas fa-paper-plane"></i>&emsp; Property Summary</span></b>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <table id="resultstable2" data-order='[[ 0, "asc" ]]'
                                   class="table table-bordered table-striped" autosize="1"
                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                   width="100%"
                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Value</th>
                                </tr>
                                </thead>

                                @php($propsummary = \DB::table('property_active_summary')->where('user_id',$user->id)->where('id',$property->id)->first())
                                <tbody class="evlistesi">
                                <tr>
                                    <td>ADDRESS</td>
                                    <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                </tr>
                                <tr>
                                    <td>DOB VIOL.</td>
                                    <td>
                                        <a href="{{route('liveViolationSingle',['buildingid'=>$property->id])}}">{{$propsummary->dob_violations_count}}
                                            <i class="fas fa-search"></i> </a></td>
                                    {{--                                    <td> {{$property->dob_violations_count}}</td>--}}
                                </tr>
                                <tr>
                                    <td>DOB COMP.</td>
                                    <td>
                                        <a href="{{route('DOBcomplaintsSingle',['buildingid'=>$property->id])}}">{{$propsummary->dob_complaints_count}}
                                            <i class="fas fa-search"></i> </a></td>
                                    {{--                                    <td> {{$property->dob_complaints_count}}</td>--}}
                                </tr>
                                <tr>
                                    <td>ECB HEAR.</td>
                                    <td>
                                        <a href="{{route('ECBliveHearingsSingle',['buildingid'=>$property->id])}}">{{$propsummary->ecb_hearings_count}}
                                            <i class="fas fa-search"></i> </a></td>
                                    {{--                                    <td> {{$property->oath_hearings_count}}</td>--}}
                                </tr>
                                <tr>
                                    <td>ECB VIOL.</td>
                                    <td>
                                        <a href="{{route('ECBviolationsSingle',['buildingid'=>$property->id])}}">{{$propsummary->ecb_violations_count}}
                                            <i class="fas fa-search"></i> </a></td>
                                    {{--                                    <td> {{$property->ecb_violations_count}}</td>--}}
                                </tr>
                                <tr>
                                    <td>ECB PENA.</td>
                                    <td>
                                        <a href="{{route('ECBviolationsSingle',['buildingid'=>$property->id])}}">
                                            ${{$propsummary->ecb_violations_penality}} </a>
                                    </td>
                                    {{--                                    <td>$ {{$property->ecbViolations->sum('balance_due')}}</td>--}}
                                </tr>
                                <tr>
                                    <td>HPD VIOL.</td>
                                    <td>
                                        <a href="{{route('HPDliveViolationsSingle',['buildingid'=>$property->id])}}">{{$propsummary->hpd_violations_count}}
                                            <i class="fas fa-search"></i> </a></td>
                                    {{--                                    <td> {{$property->hpd_violations_count}}</td>--}}
                                </tr>
                                <tr>
                                    <td>HPD COMP.</td>
                                    <td>
                                        <a href="{{route('HPDcomplaintsSingle',['buildingid'=>$property->id])}}"> {{$propsummary->hpd_complaints_count}}
                                            <i class="fas fa-search"></i> </a></td>
                                    {{--                                    <td> {{$property->hpd_complaints_count}}</td>--}}
                                </tr>
                                <tr>
                                    <td>HPD REPA.</td>
                                    <td>
                                        <a href="{{route('HPDrepairsSingle',['buildingid'=>$property->id])}}"> {{$propsummary->hpd_emergency_repairs_count}}
                                            <i class="fas fa-search"></i> </a></td>

                                    {{--                                    <td> {{$property->hpd_repair_vacate_orders_count}}</td>--}}
                                </tr>
                                <tr>
                                    <td>SER. 311</td>
                                    <td>
                                        <a href="{{route('SERVICErequests311Single',['buildingid'=>$property->id])}}"> {{$propsummary->service_requests311_count}}
                                            <i class="fas fa-search"></i> </a></td>
                                    {{--                                    <td> {{$property->service_requests311_count}}</td>--}}

                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Value</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-md-5 col-lg-5 col-sm-12 ">
                    <div id="sagkolon" class="card">
                        <div class="card-header hover" data-card-widget="collapse">
                            <b><i class="fas fa-info-circle"></i> Property Information</b>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            {{--Property KARTI--}}
                            <div class="card bg-light">
                                <div class="card-header hover border-bottom-0" data-card-widget="collapse">
                                    <b><i class="fas fa-id-card"></i> &emsp;Property Card</b>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b
                                                        id="jspropertyadres">{{$property->getAddressWithoutBin()}}</b>
                                            </h2>
                                            <p class="text-muted text-sm">Borough: <b
                                                        id="jsboro"> {{$features->Borough}}</b> | Block: <b
                                                        id="jsblock"> {{$features->Block}} </b> | Lot: <b
                                                        id="jslot"> {{$features->Lot}} </b><br/>
                                            <h2 class="lead">Zone District: <b
                                                        id="jsZoneDist1"> {{$features->ZoneDist1}} </b></h2> </p>
                                            <div class="small">
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-building mr-1"></i>Address</td>
                                                        <td>
                                                            <b id="jspropertyadres2">{{$property->getAddressWithoutBin()}}</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-barcode mr-1"></i>BBL</td>
                                                        <td><b id="BBL">{{$features->BBL}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-map-marker-alt mr-1"></i>Digital Map:
                                                        </td>
                                                        <td><b id="jsdijitalmap">{{$features->TaxMap}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-map-marker-alt mr-1"></i>Zoning Map
                                                        </td>
                                                        <td><b id="jszoningmap">{{$features->ZoneMap}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-map-marker-alt mr-1"></i>Historical
                                                            Map
                                                        </td>
                                                        <td><b id="jshistoricalmap"></b>{{$features->PLUTOMapID}}</b>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h2 class="lead mt-3 pt-3">Dedicated Contact</h2>
                                            <div class="small">
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-id-card mr-1"></i>Name
                                                        </td>
                                                        <td><b>{{$property->contact_name}}</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-phone-square-alt mr-1"></i>Phone
                                                        </td>
                                                        <td>
                                                            <b>{{$property->contact_number}}</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-lg fa-map-marked-alt mr-1"></i>Address
                                                        </td>
                                                        <td>
                                                            <b>{{$property->contact_address}}</b>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="col-5 text-center">
                                            <img id="photo2" style="height: 200px" src="{{$property->image()}}"
                                                 class="img-circle img-fluid">
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="float-right row">
                                        <form action="{{route('building.ticket.post')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="address"
                                                   value="{{$property->getAddressWithoutBin()}}">
                                            <button type="submit" class="btn bg-gray-dark color-palette">
                                                <i class="fas fa-comments"></i> Send Ticket
                                            </button>
                                        </form>
                                        <button onclick="dedicatedcontact('{{$property->contact_name??''}}','{{$property->contact_number??''}}','{{$property->contact_address??''}}',{{$property->id}});"
                                                class="btn bg-gray-dark color-palette ml-3">
                                            <i class="fas fa-user"></i> Dedicated Contact
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{--Property Information--}}
                            <div class="card bg-light collapsed-card">
                                <div class="card-header hover text-muted border-bottom-0"
                                     data-card-widget="collapse">
                                    <i class="fas fa-list-ol"></i> <b> &emsp;Property Information</b>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <table id="infoo" class="table table-bordered table-striped" autosize="1"
                                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                                           width="100%" border="0" cellspacing="0" cellpadding="0"
                                           bgcolor="#bdc0c2">
                                        <thead>
                                        <tr>
                                            <th>Info</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center" colspan="2"> General Informatioın</td>
                                        </tr>
                                        <tr>
                                            <td>Owner</td>
                                            <td id="jsowner">{{$features->OwnerName}}</td>
                                        </tr>
                                        <tr>
                                            <td>Land Use</td>
                                            <td id="jslanduse">{{$features->LandUse}}</td>
                                        </tr>
                                        <tr>
                                            <td>Lot Area</td>
                                            <td id="jslotarea">{{$features->LotArea}}</td>
                                        </tr>
                                        <tr>
                                            <td>Lot Footage</td>
                                            <td id="jsfootage">{{$features->LotFront}}</td>
                                        </tr>
                                        <tr>
                                            <td>Lot Depth</td>
                                            <td id="jslotdepth">{{$features->LotDepth}}</td>
                                        </tr>
                                        <tr>
                                            <td>Year Built</td>
                                            <td id="jsyearbuilt">{{$features->YearBuilt}}</td>
                                        </tr>
                                        <tr>
                                            <td>Building Class</td>
                                            <td id="jsbuildingclass">{{$features->BldgClass}}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Buildings</td>
                                            <td id="jsnumberofbuildings">{{$features->NumBldgs}}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Floors</td>
                                            <td id="jsnumberoffloors">{{$features->NumFloors}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gross Floor Area</td>
                                            <td id="jsgrossfloorarea">{{$features->BldgArea}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Units</td>
                                            <td id="jstotalunits">{{$features->UnitsTotal}}</td>
                                        </tr>
                                        <tr>
                                            <td>Residental Units</td>
                                            <td id="jsresidentalunits">{{$features->UnitsRes}}</td>
                                        </tr>
                                        <tr>
                                            <td>Building Info</td>
                                            <td><a id="jsbisweb" href="{{$property->bisweb()}}" target="_blank">Click
                                                    Here for
                                                    BISWEB</a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="2"> Neighborhood Informatioın</td>
                                        </tr>
                                        <tr>
                                            <td>Community District</td>
                                            <td id="jscommunitydistrict">{{$features->CD}}</td>
                                        </tr>
                                        <tr>
                                            <td>City Council District</td>
                                            <td id="jscitycouncildistrict">{{$features->Council}}</td>
                                        </tr>
                                        <tr>
                                            <td>School District</td>
                                            <td id="jsschoolditrict">{{$features->SchoolDist}}</td>
                                        </tr>
                                        <tr>
                                            <td>Health Center Disctrict</td>
                                            <td id="jshealthcenterdistrict">{{$features->HealthCenterDistrict}}</td>
                                        </tr>
                                        <tr>
                                            <td>Health Area</td>
                                            <td id="jshealtharea">{{$features->HealthArea}}</td>
                                        </tr>
                                        <tr>
                                            <td>Police Disctrict</td>
                                            <td id="jspolicedistrict">{{$features->PolicePrct}}</td>
                                        </tr>
                                        <tr>
                                            <td>Fire Company</td>
                                            <td id="jsfirecompany">{{$features->FireComp}}</td>
                                        </tr>
                                        <tr>
                                            <td>Sanitation Borough</td>
                                            <td id="jssanitationborough">{{$features->Sanitboro}}</td>
                                        </tr>
                                        <tr>
                                            <td>Sanitation District</td>
                                            <td id="jssanitationdistrict">{{$features->SanitDistrict}}</td>
                                        </tr>
                                        <tr>
                                            <td>Sanitation Subsection</td>
                                            <td id="jssanitationsubsection">{{$features->SanitSub}}</td>
                                        </tr>

                                        </tbody>
                                        <tfoot>
                                        <tr>


                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="card bg-light collapsed-card">
                                <div class="card-header hover text-muted border-bottom-0" data-card-widget="collapse"
                                     aria-expanded="false">
                                    <i class="fas faw fa-plus-circle"></i> <b>&emsp; Add Propety Notes</b>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="card-tabs">
                                        <ul class="nav nav-tabs" id="notlar" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="takenote-tab" data-toggle="pill"
                                                   href="#newnote" role="tab" aria-controls="newnote"
                                                   aria-selected="true">New Note</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="mynotes-tab" data-toggle="pill"
                                                   href="#savednotes" role="tab" aria-controls="savednotes"
                                                   aria-selected="false">Saved Notes</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="notlarContent">
                                        <div class="tab-pane fade active show" id="newnote" role="tabpanel"
                                             aria-labelledby="newnote-tab">
                                            <form role="form" method="POST"
                                                  action="{{route('property.notes.store',['buildingid'=>$property->id])}}">
                                                @csrf
                                                <input type="hidden" name="property_id" value="{{$property->id}}"
                                                       id="property_id">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- text input -->
                                                        <div class="form-group pt-2 pb-0">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="title"
                                                                   id="title"
                                                                   placeholder="Enter the title...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Content</label>
                                                            <textarea class="form-control" rows="3" name="content"
                                                                      id="content"
                                                                      placeholder="Content of the notes ..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn bg-gray-dark color-palette"><i
                                                                class="fas fa-save"></i> Save
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"><i
                                                                class="fas fa-window-close"></i> Cancel
                                                    </button>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="savednotes" role="tabpanel"
                                             aria-labelledby="savednotes-tab">
                                            <div id="accordion">
                                                <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                                                @forelse($property->notes as $note)
                                                    <div class="card bg-light pt-1">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    {{$note->updated_at->format('Y-m-d')}}
                                                                </div>
                                                                <div class="col-9">
                                                                    <h4 class="card-title float-right">
                                                                        <a data-toggle="collapse"
                                                                           data-parent="#accordion"
                                                                           href="#collapseOne" class="collapsed"
                                                                           aria-expanded="false">
                                                                            {{$note->title}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse in collapse"
                                                             style="">
                                                            <div class="card-body">
                                                                {{$note->content}}
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="text-right">
                                                                    <form method="post"
                                                                          action="{{route('property.notes.destroy',['buildingid'=>$property->id])}}">
                                                                        @csrf
                                                                        <input type="hidden" name="note_id"
                                                                               value="{{$note->id}}">
                                                                        <button type="submit" class="btn btn-danger"><i
                                                                                    class="fas fa-window-close"></i>
                                                                            Delete
                                                                            Note
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="card bg-light pt-1">
                                                        No notes.
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{--Upload Property Documents--}}
                            <div class="card bg-light collapsed-card">
                                <div class="card-header hover text-muted border-bottom-0" data-card-widget="collapse"
                                     aria-expanded="false">
                                    <i class="fas fa-file-upload"></i><b> &emsp;Upload Document</b>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body pt-0">
                                    <div class="card-tabs">
                                        <ul class="nav nav-tabs" id="documents" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="uploadfile-tab" data-toggle="pill"
                                                   href="#newfile" role="tab" aria-controls="newfile"
                                                   aria-selected="true">Upload File</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="myuploadedfiles-tab" data-toggle="pill"
                                                   href="#uploadedfiles" role="tab" aria-controls="uploadedfiles"
                                                   aria-selected="false">My Files ({{$property->documents->count()}}
                                                    )</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="filesContent">
                                        <div class="tab-pane fade active show" id="newfile" role="tabpanel"
                                             aria-labelledby="newfile-tab">
                                            <form role="form" method="post"
                                                  action="{{route('property.documents.store',['buildingid'=>$property->id])}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="property_id" value="{{$property->id}}">
                                                <div class="form-group">
                                                    <label for="type">Select Title for document</label>
                                                    <select class="form-control" name="type">
                                                        <option>Survey</option>
                                                        <option>Load</option>
                                                        <option>Letter</option>
                                                        <option>Copy</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="document">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="document"
                                                                   name="document">
                                                            <label class="custom-file-label" for="document">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn bg-gray-dark color-palette"><i
                                                                class="fas fa-file-upload"></i> Upload
                                                    </button>
                                                    <button type="submit" class="btn btn-secondary"><i
                                                                class="fas fa-window-close"></i> Cancel
                                                    </button>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="uploadedfiles" role="tabpanel"
                                             aria-labelledby="uploadedfiles-tab">
                                            <div id="accordion">
                                                @php($i=1)
                                                @forelse($property->documents as $doc)
                                                    <div class="card bg-light pt-1">
                                                        <div class="card-header ">
                                                            <div class="row">
                                                                <div class="col-9 align-content-center">
                                                                    {{$i}}
                                                                    - @php($i++) {!!  \App\Helpers\Helper::dosyaikonu(\GuzzleHttp\Psr7\mimetype_from_filename($doc->path))!!}
                                                                    | {{$doc->updated_at->format('Y-m-d')}}
                                                                    | {{$doc->type}} | <a
                                                                            href="{{Storage::url($doc->path)}}"> <i
                                                                                class="fas fa-download"></i> Download
                                                                        File
                                                                        - {{number_format(Storage::size($doc->path)/1024/1024,2)}}
                                                                        <b>Mb</b> </a>
                                                                </div>
                                                                <div class="col-3">
                                                                    <form method="post"
                                                                          action="{{route('property.documents.destroy',['buildingid'=>$property->id])}}">
                                                                        @csrf
                                                                        <input type="hidden" name="document_id"
                                                                               value="{{$doc->id}}">
                                                                        <button type="submit" id="document-delete"
                                                                                class="float-right btn-sm btn btn-danger">
                                                                            <i
                                                                                    class="fas fa-window-close"></i>
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="card bg-light pt-1">
                                                        No file.
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->


                            </div>


                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('js')

    <script src="{{ asset('js/tagsinput.js') }}"></script>

    <script
            src="{{asset('js/components/typehead.js')}}"></script>
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('js/select2.full.min.js')}}"></script>


    <script>
        async function dedicatedcontact(name, phone, address, propertyid) {
            Swal.fire({
                title: '<strong>Contact Information</strong>',
                icon: 'info',
                html: '<table class="table table-bordered table-striped">' +
                    '<tbody><input type="hidden" name= "property_id" value="' + propertyid + '">' +
                    '<tr><td>Contact Name</td><td><input placeholder="' + name + '" type="text" id="contact_name"></td></tr>' +
                    '<tr><td>Contact Phone</td><td><input placeholder="' + phone + '" type="text" id="contact_number"></td></tr>' +
                    '<tr><td>Contact Address</td><td><input placeholder="' + address + '" type="text" id="contact_address"></td></tr>' +
                    '</tbody>' +
                    '</table>',

                showCloseButton: true,
                showConfirmButton: true,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                focusConfirm: true,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Save!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i> Cancel',
                cancelButtonAriaLabel: 'Thumbs down',
                preConfirm: () => {
                    Swal.showLoading();
                    var formData = new FormData();
                    var property_id = $('#property_id').val();
                    var contact_name = $('#contact_name').val();
                    var contact_number = $('#contact_number').val();
                    var contact_address = $('#contact_address').val();
                    if (property_id) {
                        formData.append("property_id", property_id);
                    }
                    if (contact_name) {
                        formData.append("contact_name", contact_name);
                    }
                    if (contact_number) {
                        formData.append("contact_number", contact_number);
                    }
                    if (contact_address) {
                        formData.append("contact_address", contact_address);
                    }
                    return $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        method: 'post',
                        url: "{{route('property.dedicatedcontact.update')}}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (resp) {
                            return true;
                        },
                        error: function () {
                            return false;
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isDismissed)
                    return;

                if (result.value) {
                    Swal.fire({
                        title: 'Information updated.',
                    }).then()
                    {
                        location.reload();
                    }
                } else {
                    Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})
                }
            });
        }

        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(function () {
            $('#resultstable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "pageLength": 50,


            });
            $('#resultstable2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "pageLength": 50,


            });

        });
    </script>
@stop
