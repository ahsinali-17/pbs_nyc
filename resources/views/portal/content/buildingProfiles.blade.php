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
    </style>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 ">
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
                                       class="table table-bordered table-striped" autosize="1"
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
                                    @foreach($user->properties as $property)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td> <a href="{{route('singleBuildingProfile',['buildingid'=>$property->id])}}">{{$property->getAddress()}}</a></td>
{{--                                            onclick="addressclick(this,  '{{$property->bbl}}', '{{$property->image()}}');"> {{$property->getAddress()}}</td>--}}
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
{{--                <!-- /.col -->--}}
{{--                <div class="col-md-4 col-lg-4 col-sm-12 d-none">--}}
{{--                    <div id="ortakolon" class="card ">--}}
{{--                        <div class="card-header hover p-2" data-card-widget="collapse">--}}
{{--                            <i class="fas fa-fw fa-home"></i>--}}
{{--                            <b><span class="m-0 text-dark" id="fotoustadres">Building Photo</span></b>--}}
{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                    <i class="fas fa-minus"></i>--}}
{{--                                </button>--}}

{{--                            </div>--}}
{{--                        </div><!-- /.card-header hover -->--}}
{{--                        <div class="card-body">--}}
{{--                            <img id="photo"--}}
{{--                                 src="{{asset('images/logos/blackfooter.jpg')}}"--}}
{{--                                 width="100%">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-5 col-lg-5 col-sm-12 d-none">--}}
{{--                    <div id="sagkolon" class="card bulanik">--}}
{{--                        <div class="card-header hover" data-card-widget="collapse">--}}
{{--                            <b><i class="fas fa-info-circle"></i> Property Information</b>--}}
{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                    <i class="fas fa-minus"></i>--}}
{{--                                </button>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            --}}{{--Property KARTI--}}
{{--                            <div class="card bg-light collapsed-card">--}}
{{--                                <div class="card-header hover border-bottom-0" data-card-widget="collapse">--}}
{{--                                    <b><i class="fas fa-id-card"></i> &emsp;Property Card</b>--}}
{{--                                    <div class="card-tools">--}}
{{--                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                            <i class="fas fa-plus"></i>--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body pt-0">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-7">--}}
{{--                                            <h2 class="lead"><b id="jspropertyadres">ADDRESS</b></h2>--}}
{{--                                            <p class="text-muted text-sm">Borough: <b id="jsboro"> </b> | Block: <b--}}
{{--                                                        id="jsblock"></b> | Lot: <b id="jslot"></b><br/>--}}
{{--                                            <h2 class="lead">Zone District: <b id="jsZoneDist1"></b></h2> </p>--}}
{{--                                            <div class="small">--}}
{{--                                                <table>--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr>--}}
{{--                                                        <td><i class="fas fa-lg fa-building mr-1"></i>Address</td>--}}
{{--                                                        <td><b id="jspropertyadres2"></b>, <b id="jsboro2"> </b></td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td><i class="fas fa-lg fa-barcode mr-1"></i>BBL</td>--}}
{{--                                                        <td><b id="BBL"></b></td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td><i class="fas fa-lg fa-map-marker-alt mr-1"></i>Digital Map:--}}
{{--                                                        </td>--}}
{{--                                                        <td><b id="jsdijitalmap"></b></td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td><i class="fas fa-lg fa-map-marker-alt mr-1"></i>Zoning Map--}}
{{--                                                        </td>--}}
{{--                                                        <td><b id="jszoningmap"></b></td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td><i class="fas fa-lg fa-map-marker-alt mr-1"></i>Historical--}}
{{--                                                            Map--}}
{{--                                                        </td>--}}
{{--                                                        <td><b id="jshistoricalmap"></b></b></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                        <div class="col-5 text-center">--}}
{{--                                            <img id="photo2" style="height: 200px"--}}
{{--                                                 src="https://www.ubm-development.com/magazin/wp-content/uploads/2019/11/Zaha-Hadids-letzter-Wurf-5_6WEB-640x1024.jpg"--}}
{{--                                                 alt=""--}}
{{--                                                 class="img-circle img-fluid">--}}
{{--                                        </div>--}}


{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="card-footer">--}}
{{--                                    <div class="text-right">--}}
{{--                                        <a href="#" class="btn bg-gray-dark color-palette">--}}
{{--                                            <i class="fas fa-comments"></i> Send Ticket--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="btn bg-gray-dark color-palette">--}}
{{--                                            <i class="fas fa-user"></i> Dedicated Contact Name--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            --}}{{--Property Information--}}
{{--                            <div class="card bg-light collapsed-card">--}}
{{--                                <div class="card-header hover text-muted border-bottom-0"--}}
{{--                                     data-card-widget="collapse">--}}
{{--                                    <i class="fas fa-list-ol"></i> <b> &emsp;Property Information</b>--}}
{{--                                    <div class="card-tools">--}}
{{--                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                            <i class="fas fa-plus"></i>--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body pt-0">--}}
{{--                                    <table id="infoo" class="table table-bordered table-striped" autosize="1"--}}
{{--                                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"--}}
{{--                                           width="100%" border="0" cellspacing="0" cellpadding="0"--}}
{{--                                           bgcolor="#bdc0c2">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Info</th>--}}
{{--                                            <th>Value</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td class="text-center" colspan="2"> General Informatioın</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Owner</td>--}}
{{--                                            <td id="jsowner"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Land Use</td>--}}
{{--                                            <td id="jslanduse"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Lot Area</td>--}}
{{--                                            <td id="jslotarea"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Lot Footage</td>--}}
{{--                                            <td id="jsfootage"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Lot Depth</td>--}}
{{--                                            <td id="jslotdepth"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Year Built</td>--}}
{{--                                            <td id="jsyearbuilt"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Building Class</td>--}}
{{--                                            <td id="jsbuildingclass"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Number of Buildings</td>--}}
{{--                                            <td id="jsnumberofbuildings"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Number of Floors</td>--}}
{{--                                            <td id="jsnumberoffloors"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Gross Floor Area</td>--}}
{{--                                            <td id="jsgrossfloorarea"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Total Units</td>--}}
{{--                                            <td id="jstotalunits"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Residental Units</td>--}}
{{--                                            <td id="jsresidentalunits"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Building Info</td>--}}
{{--                                            <td><a id="jsbisweb" href="#">BISWEB</a></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td class="text-center" colspan="2"> Neighborhood Informatioın</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Community District</td>--}}
{{--                                            <td id="jscommunitydistrict"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>City Council District</td>--}}
{{--                                            <td id="jscitycouncildistrict"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>School District</td>--}}
{{--                                            <td id="jsschoolditrict"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Health Center Disctrict</td>--}}
{{--                                            <td id="jshealthcenterdistrict"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Health Area</td>--}}
{{--                                            <td id="jshealtharea"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Police Disctrict</td>--}}
{{--                                            <td id="jspolicedistrict"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Fire Company</td>--}}
{{--                                            <td id="jsfirecompany"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Sanitation Borough</td>--}}
{{--                                            <td id="jssanitationborough"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Sanitation District</td>--}}
{{--                                            <td id="jssanitationdistrict"></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Sanitation Subsection</td>--}}
{{--                                            <td id="jssanitationsubsection"></td>--}}
{{--                                        </tr>--}}

{{--                                        </tbody>--}}
{{--                                        <tfoot>--}}
{{--                                        <tr>--}}


{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="card bg-light collapsed-card">--}}
{{--                                <div class="card-header hover text-muted border-bottom-0" data-card-widget="collapse" aria-expanded="false">--}}
{{--                                    <i class="fas faw fa-plus-circle"></i> <b>&emsp; Add Propety Notes</b>--}}
{{--                                    <div class="card-tools">--}}
{{--                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                            <i class="fas fa-plus"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body pt-0">--}}
{{--                                    <div class="card-tabs">--}}
{{--                                        <ul class="nav nav-tabs" id="notlar" role="tablist">--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link active" id="takenote-tab" data-toggle="pill"--}}
{{--                                                   href="#newnote" role="tab" aria-controls="newnote"--}}
{{--                                                   aria-selected="true">New Note</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link" id="mynotes-tab" data-toggle="pill"--}}
{{--                                                   href="#savednotes" role="tab" aria-controls="savednotes"--}}
{{--                                                   aria-selected="false">Saved Notes</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-content" id="notlarContent">--}}
{{--                                        <div class="tab-pane fade active show" id="newnote" role="tabpanel"--}}
{{--                                             aria-labelledby="newnote-tab">--}}
{{--                                            <form role="form">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-sm-12">--}}
{{--                                                        <!-- text input -->--}}
{{--                                                        <div class="form-group pt-2 pb-0">--}}
{{--                                                            <label>Title</label>--}}
{{--                                                            <input type="text" class="form-control"--}}
{{--                                                                   placeholder="Enter the title...">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-sm-12">--}}
{{--                                                        <!-- textarea -->--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label>Content</label>--}}
{{--                                                            <textarea class="form-control" rows="3"--}}
{{--                                                                      placeholder="Content of the notes ..."></textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                        <div class="tab-pane fade" id="savednotes" role="tabpanel"--}}
{{--                                             aria-labelledby="savednotes-tab">--}}
{{--                                            <div id="accordion">--}}
{{--                                                <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->--}}
{{--                                                @forelse($property->notes as $note)--}}
{{--                                                <div class="card bg-light pt-1">--}}
{{--                                                    <div class="card-header">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-3">--}}
{{--                                                                {{$note->updated_at->format('Y-m-d')}}--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-9">--}}
{{--                                                                <h4 class="card-title float-right">--}}
{{--                                                                    <a data-toggle="collapse" data-parent="#accordion"--}}
{{--                                                                       href="#collapseOne" class="collapsed"--}}
{{--                                                                       aria-expanded="false">--}}
{{--                                                                        {{$note->title}}--}}
{{--                                                                    </a>--}}
{{--                                                                </h4>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="collapseOne" class="panel-collapse in collapse" style="">--}}
{{--                                                        <div class="card-body">--}}
{{--                                                            {{$note->content}}--}}
{{--                                                        </div>--}}
{{--                                                        <div class="card-footer">--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <button type="submit" class="btn btn-danger"><i--}}
{{--                                                                            class="fas fa-window-close"></i> Delete Note--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                @empty--}}
{{--                                                        <div class="card bg-light pt-1">--}}
{{--                                                            There is not any note for this property.--}}
{{--                                                        </div>--}}
{{--                                                @endforelse--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="card-footer">--}}
{{--                                    <div class="text-right">--}}
{{--                                        <button type="submit" class="btn bg-gray-dark color-palette"><i--}}
{{--                                                    class="fas fa-save"></i> Save--}}
{{--                                        </button>--}}
{{--                                        <button type="submit" class="btn btn-secondary"><i--}}
{{--                                                    class="fas fa-window-close"></i> Cancel--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{--Upload Property Documents--}}
{{--                            <div class="card bg-light collapsed-card">--}}
{{--                                <div class="card-header hover text-muted border-bottom-0" data-card-widget="collapse">--}}
{{--                                    <i class="fas fa-file-upload"></i><b> &emsp;Upload Document</b>--}}
{{--                                    <div class="card-tools">--}}
{{--                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                            <i class="fas fa-plus"></i>--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.card-header -->--}}
{{--                                <!-- form start -->--}}
{{--                                <div class="card-body pt-0">--}}
{{--                                    <form role="form" method="post" action="{{route('property.documents.store',['buildingid'=>$property->id])}}">--}}
{{--                                        @csrf--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Select Title for document</label>--}}
{{--                                            <select class="form-control" name="doctype">--}}
{{--                                                <option>Survey</option>--}}
{{--                                                <option>Load</option>--}}
{{--                                                <option>Letter</option>--}}
{{--                                                <option>Copy</option>--}}
{{--                                                <option>Other</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="document">File input</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <div class="custom-file">--}}
{{--                                                    <input type="file" class="custom-file-input" id="document" name="document">--}}
{{--                                                    <label class="custom-file-label" for="document">Choose--}}
{{--                                                        file</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="input-group-append">--}}
{{--                                                    <span class="input-group-text" id="">Upload</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-right">--}}
{{--                                            <button type="submit" class="btn bg-gray-dark color-palette"><i--}}
{{--                                                        class="fas fa-file-upload"></i> Upload--}}
{{--                                            </button>--}}
{{--                                            <button type="submit" class="btn btn-secondary"><i--}}
{{--                                                        class="fas fa-window-close"></i> Cancel--}}
{{--                                            </button>--}}

{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <!-- /.card-body -->--}}


{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--                <!-- /.col -->--}}
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('js')

    <script>

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

        });
    </script>
@stop
