@extends('portal.master')

@section('title', 'PBS Member Portal')

@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">ALL Records</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#all" data-toggle="tab">ALL</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#dobcert" data-toggle="tab">DOB CERT</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#deed" data-toggle="tab">DEED</a></li>
                                <li class="nav-item"><a class="nav-link" href="#dofvalue" data-toggle="tab">DOF
                                        VALUE</a></li>
                                <li class="nav-item"><a class="nav-link" href="#doftax" data-toggle="tab">DOF TAX</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#fdnyletter" data-toggle="tab">FDNY
                                        LETTER</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="all">
                                    <!-- The timeline -->
                                    <div style="width: 100%;display: inline;">
                                        <div style="display: inline; float:right; width: 100%;">
                                            <table id="resultstable3" data-order='[[ 1, "desc" ]]'
                                                   class="table table-bordered table-striped" autosize="1"
                                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                                   width="100%"
                                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                <thead>
                                                <tr>

                                                    <th>ADDRESS</th>
                                                    <th>DOB CERT.</th>
                                                    <th>DEED</th>
                                                    <th>DOF VALUE</th>
                                                    <th>DOF TAX</th>
                                                    <th>FDNY LETTER</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->properties as $property)
                                                    <tr>
                                                        <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                                        <td><a href="#"><i class="fas fa-search"></i> View</a></td>
                                                        <td><a href="#"><i class="fas fa-search"></i> View</a></td>
                                                        <td><a href="#"><i class="fas fa-search"></i> View</a></td>
                                                        <td><a href="#"><i class="fas fa-search"></i> View</a></td>
                                                        <td><a href="#"><i class="fas fa-search"></i> View</a></td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>DOB CERT.</th>
                                                    <th>DEED</th>
                                                    <th>DOF VALUE</th>
                                                    <th>DOF TAX</th>
                                                    <th>FDNY LETTER</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dobcert">
                                    <!-- The timeline -->
                                    <div style="width: 100%;display: inline;">
                                        <div style="display: inline; float:right; width: 100%;">
                                            <table id="resultstable5" data-order='[[ 1, "desc" ]]'
                                                   class="table table-bordered table-striped" autosize="1"
                                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                                   width="100%"
                                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                <thead>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->properties as $property)
                                                    @foreach($property->dobCertOccupancy as $complaint)
                                                        <tr>
                                                            <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                                            <td style="color: darkblue"><i class="fas fa-building"></i>
                                                                DOB
                                                            </td>
                                                            <td> {{$complaint->job_type}}</td>
                                                            <td> {{$complaint->issuedDate()}}</td>
                                                            <td> {{$complaint->application_status_raw}}</td>
                                                            <td style="color: darkred"><i class="fas fa-search"></i>        </td>

                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="deed">
                                    <!-- The timeline -->
                                    <div style="width: 100%;display: inline;">
                                        <div style="display: inline; float:right; width: 100%;">
                                            <table id="resultstable5" data-order='[[ 1, "desc" ]]'
                                                   class="table table-bordered table-striped" autosize="1"
                                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                                   width="100%"
                                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                <thead>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->properties as $property)
                                                    @foreach($property->dobCertOccupancy as $complaint)
                                                        <tr>
                                                            <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                                            <td style="color: darkblue"><i class="fas fa-building"></i> DOB </td>
                                                            <td> {{$complaint->job_type}}</td>
                                                            <td> {{$complaint->issuedDate()}}</td>
                                                            <td> {{$complaint->application_status_raw}}</td>
                                                            <td style="color: darkred"><i class="fas fa-search"></i>        </td>

                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dofvalue">
                                    <!-- The timeline -->
                                    <div style="width: 100%;display: inline;">
                                        <div style="display: inline; float:right; width: 100%;">
                                            <table id="resultstable5" data-order='[[ 1, "desc" ]]'
                                                   class="table table-bordered table-striped" autosize="1"
                                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                                   width="100%"
                                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                <thead>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->properties as $property)
                                                    @foreach($property->dobCertOccupancy as $complaint)
                                                        <tr>
                                                            <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                                            <td style="color: darkblue"><i class="fas fa-building"></i> DOB </td>
                                                            <td> {{$complaint->job_type}}</td>
                                                            <td> {{$complaint->issuedDate()}}</td>
                                                            <td> {{$complaint->application_status_raw}}</td>
                                                            <td style="color: darkred"><i class="fas fa-search"></i>        </td>

                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="doftax">
                                    <!-- The timeline -->
                                    <div style="width: 100%;display: inline;">
                                        <div style="display: inline; float:right; width: 100%;">
                                            <table id="resultstable5" data-order='[[ 1, "desc" ]]'
                                                   class="table table-bordered table-striped" autosize="1"
                                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                                   width="100%"
                                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                <thead>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->properties as $property)
                                                    @foreach($property->dobCertOccupancy as $complaint)
                                                        <tr>
                                                            <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                                            <td style="color: darkblue"><i class="fas fa-building"></i>
                                                                DOB
                                                            </td>
                                                            <td> {{$complaint->job_type}}</td>
                                                            <td> {{$complaint->issuedDate()}}</td>
                                                            <td> {{$complaint->application_status_raw}}</td>
                                                            <td style="color: darkred"><i class="fas fa-search"></i>        </td>

                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="fdnyletter">
                                    <!-- The timeline -->
                                    <div style="width: 100%;display: inline;">
                                        <div style="display: inline; float:right; width: 100%;">
                                            <table id="resultstable5" data-order='[[ 1, "desc" ]]'
                                                   class="table table-bordered table-striped" autosize="1"
                                                   style="page-break-inside: avoid;border-collapse: collapse; width: 100%;"
                                                   width="100%"
                                                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                                <thead>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->properties as $property)
                                                    @foreach($property->dobCertOccupancy as $complaint)
                                                        <tr>
                                                            <td> {{$property->house_number}} {{$property->stname}} {{\App\Helpers\Helper::getBoroAbbr($property->boro)}}</td>
                                                            <td style="color: darkblue"><i class="fas fa-building"></i> DOB </td>
                                                            <td> {{$complaint->job_type}}</td>
                                                            <td> {{$complaint->issuedDate()}}</td>
                                                            <td> {{$complaint->application_status_raw}}</td>
                                                            <td style="color: darkred"><i class="fas fa-search"></i>        </td>

                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>ADDRESS</th>
                                                    <th>Agency</th>
                                                    <th>File</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('js')
    <!-- page script -->
    <script>
        var profilephoto = document.getElementById("profilephoto");
        var editsummarize = document.getElementById("editsummarize");
        var editprofile = document.getElementById("editprofile");
        var editnotifications = document.getElementById("editnotifications");
        profilephoto.onclick = async function () {
            const {value: file} = await Swal.fire({
                title: 'Select image',
                input: 'file',
                inputAttributes: {
                    'accept': 'image/*',
                    'aria-label': 'Upload your profile picture'
                }
            })

            if (file) {
                const reader = new FileReader()
                reader.onload = (e) => {
                    Swal.fire({
                        title: 'Your uploaded picture',
                        imageUrl: e.target.result,
                        imageAlt: 'The uploaded picture'
                    })
                }
                reader.readAsDataURL(file)
            }
        }
        editsummarize.onclick = function () {
            (async () => {

                /* inputOptions can be an object or Promise */
                const inputOptions = new Promise((resolve) => {
                    setTimeout(() => {
                        resolve({
                            '7 days': '1 Week',
                            '30 days': '1 Month',
                            '90 days': '3 Months'
                        })
                    }, 100)
                })

                const {value: month} = await Swal.fire({
                    title: 'Select Summarize Send Period',
                    input: 'radio',
                    inputOptions: inputOptions,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'You need to choose something!'
                        }
                    }
                })

                if (month) {
                    Swal.fire({html: `You selected: ${month}`})
                }

            })()
        }


        editprofile.onclick = function () {
            Swal.fire({
                title: '<strong>Profile update</strong>',
                icon: 'info',
                html: '<table class="table table-bordered table-striped"><thead><tr>' +
                    '<th>Value Option</th><th>Old Value</th><th>New Value</th></tr></thead><tbody>' +
                    '<tr><td>User Name</td><td>{{$user->name}}</td><td>{{$user->name}}</td></tr>' +
                    '<tr><td>Email</td><td>{{$user->email}}</td><td><input type="text"></td></tr>' +
                    '<tr><td>Phone Number</td><td>{{$user->contact_number}}</td><td><input type="text"></td></tr></tbody></table>',

                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Save!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i> Cancel',
                cancelButtonAriaLabel: 'Thumbs down'
            });
        };
        editnotifications.onclick = function () {
            Swal.fire({
                title: '<strong>Notifications Update</strong>',
                icon: 'info',
                html: '<div class="card-body">' +
                    '   <strong><i class="fas fa-book mr-1">' +
                    '</i> Complaints</strong>' +
                    '<p>You ll get alerts from the checked options:</p>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobcomplaints2" checked >' +
                    '<label class="custom-control-label" for="dobcomplaints2" >DOB Compl.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="hpdcomplaints2" checked >' +
                    '<label class="custom-control-label" for="hpdcomplaints2">HPD Compl.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="landmarkcomplaints2" checked >' +
                    '<label class="custom-control-label" for="landmarkcomplaints2">Landmark Compl.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="hpdvacateorders2" checked >' +
                    '<label class="custom-control-label" for="hpdvacateorders2">HPD Vacate Orders</label></div><hr>' +
                    '<strong><i class="fas fa-map-marker-alt mr-1"></i> Violations</strong><p>You will get alerts from the checked options:</p>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobviolations2" checked >' +
                    '<label class="custom-control-label" for="dobviolations2" >DOB Viol.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="ecbviolations2" checked >' +
                    '<label class="custom-control-label" for="ecbviolations2">ECB Viol.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="hpdviolaitons2" checked >' +
                    '<label class="custom-control-label" for="hpdviolaitons2">HPD Viol.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="landmarkviolations2" checked >' +
                    '<label class="custom-control-label" for="landmarkviolations2">Landrmak Violations</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="fdnyactiveviolations2" checked >' +
                    '<label class="custom-control-label" for="fdnyactiveviolations2">Landrmak Violations</label>' +
                    '</div><hr><strong><i class="fas fa-pencil-alt mr-1"></i> Filings</strong><p>You will get alerts from the checked options:</p>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="bsaapplicationstatus2" checked >' +
                    '<label class="custom-control-label" for="bsaapplicationstatus2" >BSA App. Stat.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobnowjobfilings2" checked >' +
                    '<label class="custom-control-label" for="dobnowjobfilings2">DOB NOW Job Fil.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobnowfacadefilings2" checked >' +
                    '<label class="custom-control-label" for="dobnowfacadefilings2">DOB NOW Fac. Fil.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobnowsafetyboiler2" checked >' +
                    '<label class="custom-control-label" for="dobnowsafetyboiler2">DOB NOW SafetyBoiler</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dotsidewalkinspection2" checked >' +
                    '<label class="custom-control-label" for="dotsidewalkinspection2">DOT Sidewalk Insp.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="fdnyinspections2" checked >' +
                    '<label class="custom-control-label" for="fdnyinspections2">FDNY Inspections</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="hpwdwellingregistrations2" checked >' +
                    '<label class="custom-control-label" for="hpwdwellingregistrations2">HPD Dwel. Regs.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="hpdhousinglitigations2" checked >' +
                    '<label class="custom-control-label" for="hpdhousinglitigations2">HPD Housing Lit.</label></div><hr>' +
                    '<strong><i class="far fa-file-alt mr-1"></i> Permits</strong><p>You will get alerts from the checked options:</p>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobcertificateofoccupancy2" checked >' +
                    '<label class="custom-control-label" for="dobcertificateofoccupancy2" >DOB Cert. of Occ.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="fdnycertificateoffitness2" checked >' +
                    '<label class="custom-control-label" for="fdnycertificateoffitness2">FDNY Cert. of Fitn.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobpermits2" checked >' +
                    '<label class="custom-control-label" for="dobpermits2">DOB Permits</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobnowapprovedpermits2" checked >' +
                    '<label class="custom-control-label" for="dobnowapprovedpermits2">DOB NOW App. Perm.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobnowelectricalpermits2" checked >' +
                    '<label class="custom-control-label" for="dobnowelectricalpermits2">DOB NOW Elct. Perm.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobnowelevatorpermits2" checked >' +
                    '<label class="custom-control-label" for="dobnowelevatorpermits2">DOB NOW Elvtr Perm.</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dobcatspermits2" checked >' +
                    '<label class="custom-control-label" for="dobcatspermits2">DOB Cats Permits</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="landmarkpermits2" checked >' +
                    '<label class="custom-control-label" for="landmarkpermits2">Landmark Permits</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="dotsidewalkcorrespondences2" checked >' +
                    '<label class="custom-control-label" for="dotsidewalkcorrespondences2">Dot Side. Corr.</label></div><hr>' +
                    '<strong><i class="far fa-file-alt mr-1"></i> Hearings</strong><p>You will get alerts from the checked options:</p>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="oathhearings2" checked >' +
                    '<label class="custom-control-label" for="oathhearings2" >Oath Hearings</label></div>' +
                    '<div class="custom-control custom-checkbox custom-control-inline">' +
                    '<input type="checkbox" class="custom-control-input" id="servicesrequests3112" checked >' +
                    '<label class="custom-control-label" for="servicesrequests3112">311 Services Reqs.</label></div></div>',
                width: '800px',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Save!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i> Cancel',
                cancelButtonAriaLabel: 'Thumbs down',

            });
        };

        $(function () {
            $('#resultstable').DataTable({
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
            $('#resultstable2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,

                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;

                    // converting to interger to find total
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // computing column Total of the complete result
                    var total0 = api
                        .column(1)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var total1 = api
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var total2 = api
                        .column(3)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var total3 = api
                        .column(4)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var total4 = api
                        .column(5)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    var total5 = api
                        .column(6)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    var total6 = api
                        .column(7)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    var total7 = api
                        .column(8)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    var total8 = api
                        .column(9)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);


                    // Update footer by showing the total with the reference of the column index
                    $(api.column(0).footer()).html('Total');
                    $(api.column(1).footer()).html(total0);
                    $(api.column(2).footer()).html(total1);
                    $(api.column(3).footer()).html(total2);
                    $(api.column(4).footer()).html(total3);
                    $(api.column(5).footer()).html(total4);
                    $(api.column(6).footer()).html(total5);
                    $(api.column(7).footer()).html(total6);
                    $(api.column(8).footer()).html(total7);
                    $(api.column(9).footer()).html(total8);
                },
                "processing": true,
                "serverSide": false,
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
