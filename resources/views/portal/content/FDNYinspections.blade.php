@extends('portal.master')

@section('title', 'FDNY Inspections')

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
    <h1 class="m-0 text-dark"><i class="fas fa-calendar"></i> Calendar</h1>
@stop


@section('content')
     <div class="row">
        Coming Soon..
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
