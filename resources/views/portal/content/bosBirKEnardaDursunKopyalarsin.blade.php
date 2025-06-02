@extends('portal.master')

@section('title', 'PBS Member Portal')

@section('plugins.Knob', true)

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- row  -->
    <div class="row">
        <div class="col-12">
            <!-- jQuery Knob -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        jQuery Knob
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="{{auth()->user()->properties()->count()}}" data-width="90" data-height="90"
                                   data-fgColor="#3c8dbc">

                            <div class="knob-label">DOB Complaints</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="70" data-width="90" data-height="90"
                                   data-fgColor="#f56954">

                            <div class="knob-label">DOB Violations</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="-80" data-min="-150" data-max="150" data-width="90"
                                   data-height="90" data-fgColor="#00a65a">

                            <div class="knob-label">Server Load</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="40" data-width="90" data-height="90"
                                   data-fgColor="#00c0ef">

                            <div class="knob-label">Disk Space</div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-6 text-center">
                            <input type="text" class="knob" value="90" data-width="90" data-height="90"
                                   data-fgColor="#932ab6">

                            <div class="knob-label">Bandwidth</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-6 text-center">
                            <input type="text" class="knob" value="50" data-width="90" data-height="90"
                                   data-fgColor="#39CCCC">

                            <div class="knob-label">CPU</div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@stop

@section('js')
    <script>
        $(function () {
            /* jQueryKnob */

            $('.knob').knob({
                /*change : function (value) {
                //console.log("change : " + value);
                },
                release : function (value) {
                console.log("release : " + value);
                },
                cancel : function () {
                console.log("cancel : " + this.value);
                },*/
                draw: function () {

                    // "tron" case
                    if (this.$.data('skin') === 'tron') {

                        var a = this.angle(this.cv)  // Angle
                            ,
                            sa = this.startAngle          // Previous start angle
                            ,
                            sat = this.startAngle         // Start angle
                            ,
                            ea                            // Previous end angle
                            ,
                            eat = sat + a                 // End angle
                            ,
                            r = true;

                        this.g.lineWidth = this.lineWidth;

                        this.o.cursor
                        && (sat = eat - 0.3)
                        && (eat = eat + 0.3);

                        if (this.o.displayPrevious) {
                            ea = this.startAngle + this.angle(this.value);
                            this.o.cursor
                            && (sa = ea - 0.3)
                            && (ea = ea + 0.3);
                            this.g.beginPath();
                            this.g.strokeStyle = this.previousColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                            this.g.stroke()
                        }

                        this.g.beginPath();
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                        this.g.stroke();

                        this.g.lineWidth = 2;
                        this.g.beginPath();
                        this.g.strokeStyle = this.o.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                        this.g.stroke();

                        return false
                    }
                }
            });
        });
        /* END JQUERY KNOB */
    </script>
@stop
