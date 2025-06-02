@extends('portal.master')

@section('title', 'DOB Violations')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item hasan"><a class="nav-link active" href="#anatablo" data-toggle="tab">DOB
                                    Violations</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contact</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="anatablo" class="active tab-pane">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">DOB Violations</h3>
                                    </div>
                                    <!-- /.card-header -->
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
                                                <th>Issue Date</th>
                                                <th>Violation number</th>
                                                <th>Comments</th>
                                                <th>Description</th>
                                                <th>Number</th>
                                                <th>Violation Category</th>
                                                <th>Violation Type</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($properties as $property)
                                                @foreach($property->dobViolations as $item)
                                                    <tr>
                                                        <td> {{$property->house_number}} {{$property->stname}}</td>
                                                        <td>{{$item->issueDate()}}</td>
                                                        <td>{{$item->violation_number}}</td>
                                                        <td>{{$item->disposition_comments}}</td>
                                                        <td>{{$item->description}}</td>
                                                        <td>{{$item->number}}</td>
                                                        <td>{{$item->violation_category}}</td>
                                                        <td>{{$item->violation_type}}</td>
                                                        <td>{{$item->disposition_date ==null ? "OPEN":"CLOSED"}}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>ADDRESS</th>
                                                <th>Issue Date</th>
                                                <th>Violation number</th>
                                                <th>Comments</th>
                                                <th>Description</th>
                                                <th>Number</th>
                                                <th>Violation Category</th>
                                                <th>Violation Type</th>
                                                <th>Status</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="contact">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName"
                                                   placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2"
                                                   placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience"
                                               class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                          placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills"
                                                   placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="settings">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#notifications"
                                                                data-toggle="tab">Notifications</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#reminders"
                                                                data-toggle="tab">Reminders</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#summary" data-toggle="tab">Summary</a>
                                        </li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="notifications">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Notifications</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <strong><i class="fas fa-book mr-1"></i> Complaints</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobcomplaints"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="dobcomplaints">DOB
                                                            Compl.</label>
                                                    </div>

                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdcomplaints"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="hpdcomplaints">HPD
                                                            Compl.</label>
                                                    </div>

                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="landmarkcomplaints" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="landmarkcomplaints">Landmark
                                                            Compl.</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdvacateorders"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="hpdvacateorders">HPD
                                                            Vacate
                                                            Orders</label>
                                                    </div>


                                                    <hr>

                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>
                                                        Violations</strong>

                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobviolations"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="dobviolations">DOB
                                                            Viol.</label>
                                                    </div>

                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="ecbviolations"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="ecbviolations">ECB
                                                            Viol.</label>
                                                    </div>

                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdviolaitons"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="hpdviolaitons">HPD
                                                            Viol.</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="landmarkviolations" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="landmarkviolations">Landrmak
                                                            Violations</label>
                                                    </div>
                                                    <!-- Default inline 5-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="fdnyactiveviolations" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="fdnyactiveviolations">Landrmak
                                                            Violations</label>
                                                    </div>


                                                    <hr>

                                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Filings</strong>

                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="bsaApplicationstatus" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="bsaApplicationstatus">BSA
                                                            App.
                                                            Stat.</label>
                                                    </div>

                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowjobfilings" checked disabled>
                                                        <label class="custom-control-label" for="dobnowjobfilings">DOB
                                                            NOW
                                                            Job
                                                            Fil.</label>
                                                    </div>

                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowfacadefilings" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowfacadefilings">DOB
                                                            NOW
                                                            Fac. Fil.</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowsafetyboiler" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowsafetyboiler">DOB NOW
                                                            SafetyBoiler</label>
                                                    </div>
                                                    <!-- Default inline 5-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dotsidewalkinspection" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dotsidewalkinspection">DOT
                                                            Sidewalk Insp.</label>
                                                    </div>

                                                    <!-- Default inline 6-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="fdnyinspections"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="fdnyinspections">FDNY
                                                            Inspections</label>
                                                    </div>

                                                    <!-- Default inline 7-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpwdwellingregistrations" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="hpwdwellingregistrations">HPD
                                                            Dwel. Regs.</label>
                                                    </div>

                                                    <!-- Default inline 8 -->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdhousinglitigations" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="hpdhousinglitigations">HPD
                                                            Housing Lit.</label>
                                                    </div>

                                                    <hr>

                                                    <strong><i class="far fa-file-alt mr-1"></i> Permits</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobcertificateofoccupancy" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobcertificateofoccupancy">DOB
                                                            Cert. of Occ.</label>
                                                    </div>

                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="fdnycertificateoffitness" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="fdnycertificateoffitness">FDNY
                                                            Cert. of Fitn.</label>
                                                    </div>

                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobpermits"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="dobpermits">DOB
                                                            Permits</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowapprovedpermits" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowapprovedpermits">DOB
                                                            NOW
                                                            App. Perm.</label>
                                                    </div>
                                                    <!-- Default inline 5-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowelectricalpermits" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowelectricalpermits">DOB
                                                            NOW Elct. Perm.</label>
                                                    </div>

                                                    <!-- Default inline 6-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowelevatorpermits" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowelevatorpermits">DOB
                                                            NOW
                                                            Elvtr Perm.</label>
                                                    </div>

                                                    <!-- Default inline 7-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobcatspermits"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="dobcatspermits">DOB
                                                            Cats
                                                            Permits</label>
                                                    </div>

                                                    <!-- Default inline 8 -->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="landmarkpermits"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="landmarkpermits">Landmark
                                                            Permits</label>
                                                    </div>

                                                    <!-- Default inline 8 -->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dotsidewalkcorrespondences" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dotsidewalkcorrespondences">Dot
                                                            Side. Corr.</label>
                                                    </div>

                                                    <hr>

                                                    <strong><i class="far fa-file-alt mr-1"></i> Hearings</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="oathhearings"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="oathhearings">Oath
                                                            Hearings</label>
                                                    </div>

                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="servicesrequests311" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="servicesrequests311">311
                                                            Services Reqs.</label>
                                                    </div>


                                                </div>
                                                <a href="#" id="editnotifications"
                                                   class="btn btn-secondary btn-block"><b>Edit
                                                        Notifications</b></a>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="reminders">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Reminders</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <strong><i class="fas fa-book mr-1"></i> Reminders</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobcomplaints3"
                                                               unchecked disabled>
                                                        <label class="custom-control-label" for="dobcomplaints3">DOB
                                                            Compl.</label>
                                                    </div>
                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdcomplaints3"
                                                               unchecked disabled>
                                                        <label class="custom-control-label" for="hpdcomplaints3">HPD
                                                            Compl.</label>
                                                    </div>
                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="landmarkcomplaints3" unchecked disabled>
                                                        <label class="custom-control-label"
                                                               for="landmarkcomplaints3">Landmark
                                                            Compl.</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdvacateorders3"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="hpdvacateorders3">HPD
                                                            Vacate
                                                            Orders</label>
                                                    </div>
                                                    <hr>
                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Violations</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobviolations3"
                                                               unchecked disabled>
                                                        <label class="custom-control-label" for="dobviolations3">DOB
                                                            Viol.</label>
                                                    </div>
                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="ecbviolations3"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="ecbviolations3">ECB
                                                            Viol.</label>
                                                    </div>
                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdviolaitons3"
                                                               unchecked disabled>
                                                        <label class="custom-control-label" for="hpdviolaitons3">HPD
                                                            Viol.</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="landmarkviolations3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="landmarkviolations3">Landrmak
                                                            Violations</label>
                                                    </div>
                                                    <!-- Default inline 5-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="fdnyactiveviolations3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="fdnyactiveviolations3">Landrmak
                                                            Violations</label>
                                                    </div>
                                                    <hr>
                                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Filings</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="bsaApplicationstatus3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="bsaApplicationstatus3">BSA
                                                            App.
                                                            Stat.</label>
                                                    </div>
                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowjobfilings3" checked disabled>
                                                        <label class="custom-control-label" for="dobnowjobfilings3">DOB
                                                            NOW
                                                            Job
                                                            Fil.</label>
                                                    </div>
                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowfacadefilings3" unchecked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowfacadefilings3">DOB
                                                            NOW
                                                            Fac. Fil.</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowsafetyboiler3" unchecked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowsafetyboiler3">DOB NOW
                                                            SafetyBoiler</label>
                                                    </div>
                                                    <!-- Default inline 5-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dotsidewalkinspection3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dotsidewalkinspection3">DOT
                                                            Sidewalk Insp.</label>
                                                    </div>
                                                    <!-- Default inline 6-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="fdnyinspections"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="fdnyinspections">FDNY
                                                            Inspections</label>
                                                    </div>
                                                    <!-- Default inline 7-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpwdwellingregistrations3" unchecked disabled>
                                                        <label class="custom-control-label"
                                                               for="hpwdwellingregistrations3">HPD
                                                            Dwel. Regs.</label>
                                                    </div>
                                                    <!-- Default inline 8 -->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="hpdhousinglitigations3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="hpdhousinglitigations3">HPD
                                                            Housing Lit.</label>
                                                    </div>
                                                    <hr>
                                                    <strong><i class="far fa-file-alt mr-1"></i> Permits</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobcertificateofoccupancy3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobcertificateofoccupancy3">DOB
                                                            Cert. of Occ.</label>
                                                    </div>
                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="fdnycertificateoffitness3" unchecked disabled>
                                                        <label class="custom-control-label"
                                                               for="fdnycertificateoffitness3">FDNY
                                                            Cert. of Fitn.</label>
                                                    </div>
                                                    <!-- Default inline 3-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobpermits3"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="dobpermits3">DOB
                                                            Permits</label>
                                                    </div>
                                                    <!-- Default inline 4-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowapprovedpermits3" unchecked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowapprovedpermits3">DOB
                                                            NOW
                                                            App. Perm.</label>
                                                    </div>
                                                    <!-- Default inline 5-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowelectricalpermits3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowelectricalpermits3">DOB
                                                            NOW Elct. Perm.</label>
                                                    </div>
                                                    <!-- Default inline 6-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobnowelevatorpermits3" unchecked disabled>
                                                        <label class="custom-control-label"
                                                               for="dobnowelevatorpermits3">DOB
                                                            NOW
                                                            Elvtr Perm.</label>
                                                    </div>
                                                    <!-- Default inline 7-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dobcatspermits3"
                                                               unchecked disabled>
                                                        <label class="custom-control-label" for="dobcatspermits3">DOB
                                                            Cats
                                                            Permits</label>
                                                    </div>
                                                    <!-- Default inline 8 -->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="landmarkpermits3"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="landmarkpermits3">Landmark
                                                            Permits</label>
                                                    </div>
                                                    <!-- Default inline 8 -->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="dotsidewalkcorrespondences3" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="dotsidewalkcorrespondences3">Dot
                                                            Side. Corr.</label>
                                                    </div>
                                                    <hr>
                                                    <strong><i class="far fa-file-alt mr-1"></i> Hearings</strong>
                                                    <p>You'll get alerts from the checked options:</p>
                                                    <!-- Default inline 1-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="oathhearings3"
                                                               checked disabled>
                                                        <label class="custom-control-label" for="oathhearings3">Oath
                                                            Hearings</label>
                                                    </div>
                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="servicesrequests3113" checked disabled>
                                                        <label class="custom-control-label"
                                                               for="servicesrequests3113">311
                                                            Services Reqs.</label>
                                                    </div>
                                                </div>
                                                <a href="#" id="editreminders"
                                                   class="btn btn-secondary btn-block"><b>Edit Reminders</b></a>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="summary">
                                            Your current choise for getting summary of all your property is <span
                                                    style="size: 19px; color: red">Every 1 Month</span><br/>

                                            You can change this settings by cliciking edit below<br/>
                                            <a href="#" id="editsummarize"
                                               class="btn btn-secondary btn-block"><b>Edit summarize</b></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-primary">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src=""
                                 alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">   </h3>
                        <p class="text-muted text-center">Address </p>
                        <p class="text-muted text-center">Contact</p>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Records for last months inspections</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="resultstable" data-order='[[ 1, "desc" ]]'
                                       class="table table-bordered table-striped" autosize="1"
                                       style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                                       width="100%"
                                       border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                    <thead>
                                    <tr>
                                        <th>ADDRESS</th>
                                        <th>Status</th>
                                        <th>Inspection Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($properties as $property)
                                        @foreach($property->dobViolations as $item)
                                            @if ($item->dispositionDate() )
                                                <tr>
                                                    <td> {{$property->house_number}} {{$property->stname}}</td>
                                                    <td>{{$item->status}}</td>
                                                    <td>{{$item->dispositionDate()}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ADDRESS</th>
                                        <th>Status</th>
                                        <th>Inspection Date</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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



            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

        });

    </script>
@stop
