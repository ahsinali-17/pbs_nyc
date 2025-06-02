@extends('portal.master')

@section('title', 'Notification')

@section('plugins.Knob', true)

@section('css')
    <style>
        .color-palette {
            height: 35px;
            line-height: 35px;
            text-align: right;
            padding-right: .75rem;
        }

        .color-palette.disabled {
            text-align: center;
            padding-right: 0;
            display: block;
        }

        .color-palette-set {
            margin-bottom: 15px;
        }

        .color-palette span {
            display: none;
            font-size: 12px;
        }

        .color-palette:hover span {
            display: block;
        }

        .color-palette.disabled span {
            display: block;
            text-align: left;
            padding-left: .75rem;
        }

        .color-palette-box h4 {
            position: absolute;
            left: 1.25rem;
            margin-top: .75rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            display: block;
            z-index: 7;
        }
        .bulanik {
            filter: blur(4px);
            -o-filter: blur(4px);
            -ms-filter: blur(4px);
            -moz-filter: blur(4px);
            -webkit-filter: blur(4px);
        }
    </style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-puzzle-piece"></i> Notifications</h1>
@stop


@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tag"></i>
                Client Information
            </h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="user-block col-2">
                    <img  src="{{$user->adminlte_image()}}" width="300"
                         class="user-image img-circle elevation-2" alt="admin">
                    <span class="username"><a href="#">{{$user->name}}</a></span>
                    <span class="description">Registered - {{$user->created_at->isoformat('LL')}}</span>
                </div>
                <div class="col-4">
                    <p>
                        <b>{{$user->company_name ?? 'No Company Name Registered'}}  </b><br/>
                        {{$user->main_address ?? 'Address is blank: Default 350 5th Ave, Suite 5114 New York, NY 10118'}}
                    </p>
                </div>
                <div class="col-6">
                    <div class="margin">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-hover dropdown-icon"
                                    data-toggle="dropdown" alt="Notifications"><i alt="Notifications"
                                                                                  class="fas fa-bell"></i> Notifications
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#">Alerts</a>
                                    <a class="dropdown-item" href="#">Reminders</a>
                                </div>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon"
                                    data-toggle="dropdown"><i class="fas fa-building"></i> Properties
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#">Property Search</a>
                                    <a class="dropdown-item" href="#">Property List</a>
                                    <a class="dropdown-item" href="#">Add Property</a>
                                </div>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon"
                                    data-toggle="dropdown"><i class="fas fa-mail-bulk"></i> Mailings
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#">Dashboard</a>
                                    <a class="dropdown-item" href="#">Overview</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Reporting</a>
                                </div>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-hover dropdown-icon"
                                    data-toggle="dropdown"><i class="fas fa-list"></i> Reports
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#">Yearly Report</a>
                                    <a class="dropdown-item" href="#">Summarize</a>
                                    <a class="dropdown-item" href="#">Annual Mailing</a>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <div class="row">
        <div class="col-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent" data-card-widget="collapse">
                    <h3 class="card-title"><i class="fas fa-file"></i> REQUIREMENTS FOR PROPERTIES</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 bulanik">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Contact</th>
                                <th>Details</th>
                                <th>Content</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">1 ECB Settlement in process</a></td>
                            </tr>
                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html"> 2 ECB-DOB open work without a permit violations</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">13 Class-1 violations that require a cert. of correction</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">2 ECB correction affidavits were sent to you</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">$69,907.71 ECB defaulted penalties</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">$53,640.15 ECB imposed penalties</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">$3,212.95 ECB refund to claim</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">2 Façade Reports that were not filed as SAFE</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">2 Open HPD Litigations</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">0.43 HPD violations exist per unit</a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Most Violated Properties</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 bulanik">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th class="text-center">Building</th>
                                <th class="text-center">Unit</th>
                                <th class="text-center">Viols</th>
                                <th class="text-center">View</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="70%" class="text-center"><a href="#"> 32 West ASD Street NY</a> </td>
                                <td width="10%" class="text-center"><a href="#">3C </a></td>
                                <td width="10%" class="text-center"><a href="#">21 </a></td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                            </tr>
                            <tr>
                                <td width="70%" class="text-center"><a href="#"> 123 West Amsterdam, MN</a> </td>
                                <td width="10%" class="text-center"><a href="#">- </a></td>
                                <td width="10%" class="text-center"><a href="#">18 </a></td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                            </tr>

                            <tr>
                                <td width="70%" class="text-center"><a href="#"> 65 Amsterdam Avenume, BR, NY</a> </td>
                                <td width="10%" class="text-center"><a href="#">2A </a></td>
                                <td width="10%" class="text-center"><a href="#">11 </a></td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                            </tr>

                            <tr>
                                <td width="70%" class="text-center"><a href="#"> 663 ABC Street,MN</a> </td>
                                <td width="10%" class="text-center"><a href="#">1C </a></td>
                                <td width="10%" class="text-center"><a href="#">9 </a></td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                            </tr>

                            <tr>
                                <td width="70%" class="text-center"><a href="#"> 123 AXX Street 54 MN </a> </td>
                                <td width="10%" class="text-center"><a href="#">3C </a></td>
                                <td width="10%" class="text-center"><a href="#">9 </a></td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                            </tr>

                            <tr>
                                <td width="70%" class="text-center"><a href="#"> 32 West ASD Street NY</a> </td>
                                <td width="10%" class="text-center"><a href="#">- </a></td>
                                <td width="10%" class="text-center"><a href="#">2 </a></td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                            </tr>



                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title"><i class="fas fa-file-archive"></i> RECENT 5 REPORTS</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 bulanik">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Period</th>
                                <th class="text-center">Download&Print</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="25%" class="text-center"><b>05.04.2020</b> 08:50 <b>PM</b> </td>
                                <td width="50%" class="text-center"><u> Monthy Report</u></td>
                                <td width="25%"><a href="pages/examples/invoice.html"><i class="fas fa-file-pdf"></i></a></td>
                            </tr>
                            <tr>
                                <td width="25%" class="text-center"><b>11.11.2010</b> 12:53 <b>AM</b> </td>
                                <td width="50%" class="text-center"><u> Annual  Report</u></td>
                                <td width="25%"><a href="pages/examples/invoice.html"><i class="fas fa-file-pdf"></i></a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title" style="color: darkred"><i class="fas fa-calendar"></i> EVENTS WITHIN THE NEXT MONTH</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 bulanik">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Contact</th>
                                <th>Details</th>
                                <th>Content</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">4 Permits expiring</a></td>
                            </tr>
                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html"> 3 ECB hearings that JJ&A is not handling</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">2 DOB waiting for payment</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">1 Correction for ECB</a></td>
                            </tr>



                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title" style="color: green"><i class="fas fa-history"></i> UPDATES WITHIN THE PAST MONTH</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 bulanik">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Contact</th>
                                <th>Details</th>
                                <th>Content</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">1 HPD violation issued</a></td>
                            </tr>
                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html"> 3 ECB hearings dealed</a></td>
                            </tr>

                            <tr>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-envelope-open-text"></i></a> </td>
                                <td width="10%" class="text-center"><a href="#"><i class="fas fa-info-circle"></i> </a></td>
                                <td width="80%"><a href="pages/examples/invoice.html">2 DOB complaints removed</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
    <!-- /.card -->

@stop

@section('js')

{{--    <script>--}}
{{--        $(function () {--}}
{{--            /* jQueryKnob */--}}

{{--            $('.knob').knob({--}}
{{--                /*change : function (value) {--}}
{{--                //console.log("change : " + value);--}}
{{--                },--}}
{{--                release : function (value) {--}}
{{--                console.log("release : " + value);--}}
{{--                },--}}
{{--                cancel : function () {--}}
{{--                console.log("cancel : " + this.value);--}}
{{--                },*/--}}
{{--                draw: function () {--}}

{{--                    // "tron" case--}}
{{--                    if (this.$.data('skin') === 'tron') {--}}

{{--                        var a = this.angle(this.cv)  // Angle--}}
{{--                            ,--}}
{{--                            sa = this.startAngle          // Previous start angle--}}
{{--                            ,--}}
{{--                            sat = this.startAngle         // Start angle--}}
{{--                            ,--}}
{{--                            ea                            // Previous end angle--}}
{{--                            ,--}}
{{--                            eat = sat + a                 // End angle--}}
{{--                            ,--}}
{{--                            r = true;--}}

{{--                        this.g.lineWidth = this.lineWidth;--}}

{{--                        this.o.cursor--}}
{{--                        && (sat = eat - 0.3)--}}
{{--                        && (eat = eat + 0.3);--}}

{{--                        if (this.o.displayPrevious) {--}}
{{--                            ea = this.startAngle + this.angle(this.value);--}}
{{--                            this.o.cursor--}}
{{--                            && (sa = ea - 0.3)--}}
{{--                            && (ea = ea + 0.3);--}}
{{--                            this.g.beginPath();--}}
{{--                            this.g.strokeStyle = this.previousColor;--}}
{{--                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);--}}
{{--                            this.g.stroke()--}}
{{--                        }--}}

{{--                        this.g.beginPath();--}}
{{--                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;--}}
{{--                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);--}}
{{--                        this.g.stroke();--}}

{{--                        this.g.lineWidth = 2;--}}
{{--                        this.g.beginPath();--}}
{{--                        this.g.strokeStyle = this.o.fgColor;--}}
{{--                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);--}}
{{--                        this.g.stroke();--}}

{{--                        return false--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        /* END JQUERY KNOB */--}}
{{--    </script>--}}
@stop
