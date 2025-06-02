@extends('frontend.master')

@php($pageTitle ='Network')

@section('meta')
    {{--meta etiketleri--}}

@stop

@section('css')
    {{--css kodları--}}
    <style>
        .flex-parent {
            display: flex;
            position: relative;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .input-flex-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            width: 100vw;
            max-width: 1000px;
            position: relative;
            z-index: 0;
            margin-left: calc((80vw - 25px) / 20);
        }

        .time-input {
            width: 25px;
            height: 25px;
            background-color: #2C3E50;
            position: relative;
            border-radius: 50%;
            display: block;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            cursor: pointer;
        }

        .time-input:focus {
            outline: none;
        }

        .time-input::before, .time-input::after {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            top: 50%;
            transform: translateY(-50%);
            background-color: #2C3E50;
            width: 4vw;
            height: 5px;
            max-width: 50px;
        }

        .time-input::before {
            left: calc(-4vw + 12.5px);
        }

        .time-input::after {
            right: calc(-4vw + 12.5px);
        }

        .time-input:checked {
            background-color: indianred;
        }

        .time-input:checked::before {
            background-color: #2C3E50;
        }

        .time-input:checked::after {
            background-color: #AEB6BF;
        }

        .time-input:checked ~ .time-input, .time-input:checked ~ .time-input::before, .time-input:checked ~ .time-input::after {
            background-color: #AEB6BF;
        }

        .time-input:checked + .dot-info span {
            font-size: 13px;
            font-weight: bold;
            color: indianred;
        }

        .dot-info {
            width: 25px;
            height: 25px;
            display: block;
            visibility: hidden;
            position: relative;
            z-index: -1;
            left: calc((((80vw - 25px) / 20) * -1) - 1px);
        }

        .dot-info span {
            visibility: visible;
            position: absolute;
            font-size: 12px;
        }

        .dot-info span.year {
            bottom: -30px;
            left: 100%;
            transform: translateX(-50%);
        }

        .dot-info span.label {
            top: -65px;
            left: 0;
            transform: rotateZ(-45deg);
            width: 70px;
            text-indent: -10px;
        }

        #timeline-descriptions-wrapper {
            width: 100%;
            margin-top: 140px;
            font-size: 22px;
            font-weight: 400;
            margin-left: calc((-80vw - 25px) / 20);
        }

        #timeline-descriptions-wrapper p {
            margin-top: 0;
            display: none;
        }


        @media (min-width: 1250px) {
            .input-flex-container {
                margin-left: 62.5px;
            }

            .time-input::before {
                left: -37.5px;
            }

            .time-input::after {
                right: -37.5px;
            }

            .dot-info {
                left: calc((((1000px - 25px) / 20) * -1) - 1px);
            }

            #timeline-descriptions-wrapper {
                margin-left: -37.5px;
            }
        }

        @media (max-width: 630px) {
            .flex-parent {
                justify-content: initial;
            }

            .input-flex-container {
                flex-wrap: wrap;
                justify-content: center;
                width: 400px;
                height: auto;
                margin-top: 15vh;
                margin-left: 0;
            }

            .time-input, .dot-info {
                width: 60px;
                height: 60px;
                margin: 0 10px 50px;
            }

            .time-input {
                background-color: transparent !important;
                z-index: 1;
            }

            .time-input::before, .time-input::after {
                content: none;
            }

            .time-input:checked + .dot-info {
                background-color: indianred;
            }

            .time-input:checked + .dot-info span.year {
                font-size: 14px;
            }

            .time-input:checked + .dot-info span.label {
                font-size: 12px;
            }

            .dot-info {
                visibility: visible;
                border-radius: 50%;
                z-index: 0;
                left: 0;
                margin-left: -70px;
                background-color: #AEB6BF;
            }

            .dot-info span.year {
                top: 0;
                left: 0;
                transform: none;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #ECF0F1;
            }

            .dot-info span.label {
                top: calc(100% + 5px);
                left: 50%;
                transform: translateX(-50%);
                text-indent: 0;
                text-align: center;
            }

            #timeline-descriptions-wrapper {
                margin-top: 30px;
                margin-left: 0;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .input-flex-container {
                width: 340px;
            }
        }

        @media (max-width: 400px) {
            .input-flex-container {
                width: 300px;
            }
        }

        .time-input:last-of-type::after {
            content: none !important;
        }

        .time-input:last-of-type:checked {
            background-color: forestgreen !important;
        }

        .time-input:last-of-type:checked + .dot-info span {
            font-size: 13px;
            font-weight: bold;
            color: forestgreen;
        }

    </style>
@stop

@section('slider')
    {{--slider bölümü--}}

@stop


@section('content')
    {{--content bölümü--}}

    <section id="sukismiust" class="bg-transparent">
        <div class="content-wrap notoppadding">
            <div class="row col_full mx-0">
                <div class="bg-siyah section stretched nopadding nomargin"
                     style="background: url('{{asset("images/plumbing/iphone-3d-bg.png")}}') no-repeat left bottom; background-size: 100% auto;"
                     data-height-xl="467" data-height-lg="467" data-height-md="300" data-height-sm="300">
                    <div class="container clearfix">
                        <div class="row clearfix">
                            <div class="col-lg-8 my-5 offset-lg-4" style="z-index: 2">

                                <p class="before-heading ikiyanayasla"><i
                                            class="text-black-50 icon-checkbox-checked"></i> Over the years, PBS has
                                    been listening. Listening to the building owners,
                                    developers and property managers who are going through the nightmare of hiring the
                                    wrong company. Nobody wants their home designed incorrectly,
                                    their development to take double the time, or their property left unsupervised.
                                </p>
                                <p class="my-2 mx-2 center before-heading">Get ahead of it.
                                </p>
                                <p class="before-heading ikiyanayasla">
                                    <i
                                            class="text-black-50 icon-checkbox-checked"></i>PBS has focused on building
                                    its network of highly vetted, reliable associates by forming
                                    longstanding relationships in the industry.
                                    Our in-house team is complemented by a wide variety of quality professionals who are
                                    committed to meeting your needs and prioritizing your
                                    project's
                                    integrity.
                                    Let us handle your problems before they become problems.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="video-wrap" style="position: absolute; height: 100%; z-index: 1;">
                        <div class="video-overlay d-none d-lg-block"
                             style="background: transparent no-repeat left top; background-size: auto 100%;"
                             data-animate="fadeInLeft">
                            <i style="font-size: 20em;color: dimgray"
                               class="icon-world my-auto mx-lg-5 pl-lg-5 w-auto h-100"></i></div>
                    </div>
                </div>
            </div>

            <div class="container-fullwidth">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-block py-5 center">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="flex-parent">
                            <div class="input-flex-container">
                                <input class="time-input" type="radio" name="timeline-dot" data-description="safety">
                                <div class="dot-info" data-description="safety">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Site Safety</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot" data-description="surveying">
                                <div class="dot-info" data-description="surveying">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Surveying</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot" data-description="drafting">
                                <div class="dot-info" data-description="drafting">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Drafting</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot"
                                       data-description="architecture">
                                <div class="dot-info" data-description="architecture">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Architecture</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot"
                                       data-description="engineering">
                                <div class="dot-info" data-description="engineering">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Engineering</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot"
                                       data-description="inspections">
                                <div class="dot-info" data-description="inspections">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Special Inspections</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot" data-description="filing">
                                <div class="dot-info" data-description="filing">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Filing Representation</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot"
                                       data-description="contracting">
                                <div class="dot-info" data-description="contracting">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">General Contracting</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot"
                                       data-description="mechanical">
                                <div class="dot-info" data-description="mechanical">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Mechanical</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot"
                                       data-description="electrical">
                                <div class="dot-info" data-description="electrical">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Electrical</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot" data-description="plumbing">
                                <div class="dot-info" data-description="plumbing">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Plumbing</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot" data-description="sprinkler">
                                <div class="dot-info" data-description="sprinkler">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Sprinkler</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot" data-description="firealarm">
                                <div class="dot-info" data-description="firealarm">
                                    <span class="year"><i class="icon-arrow-right2"></i></span>
                                    <span class="label">Fire Alarm</span>
                                </div>
                                <input class="time-input" type="radio" name="timeline-dot" data-description="finishes">
                                <div class="dot-info" data-description="finishes">
                                    <span class="year"><i class="icon-check"></i></span>
                                    <span class="label">Finishes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--            <div class="row">--}}
            {{--                <div id="azalt" class="container">--}}
            {{--                    <div style="background-color: rgba(0,0,0,0.4); border: 1px solid black; " class="mt-5 mb-5">--}}
            {{--                        <div class="col-md-12">--}}
            {{--                            <div class="main-timeline8">--}}
            {{--                                <div class="timeline">--}}
            {{--                                    <span class="timeline-icon"></span>--}}
            {{--                                    <span class="year"><i class="float-left fas fa-poll"></i>Surveying</span>--}}
            {{--                                    <div class="timeline-content">--}}
            {{--                                        <h3 class="title">PBS somethings</h3>--}}
            {{--                                        <p class="description">--}}
            {{--                                            <i class="text-black-50 icon-checkbox-checked"></i>Test<br/>--}}
            {{--                                            <i class="text-black-50 icon-checkbox-checked"></i>Test<br/>--}}
            {{--                                            <i class="text-black-50 icon-checkbox-checked"></i>--}}
            {{--                                            <i class="text-black-50 icon-checkbox-checked"></i><br/><i--}}
            {{--                                                    style="font-size: 5rem" class="text-gray mr-5 fas fa-car-battery"></i>Some--}}
            {{--                                            words here--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="timeline">--}}
            {{--                                    <span class="timeline-icon"></span>--}}
            {{--                                    <span class="year"><i class="float-right fas fa-drafting-compass"></i>Drafting</span>--}}
            {{--                                    <div class="timeline-content">--}}
            {{--                                        <h3 class="title">PBS somethings</h3>--}}
            {{--                                        <p class="description">--}}
            {{--                                            <i style="font-size: 8rem; margin-right: 30%"--}}
            {{--                                               class=" text-bold text-blue fas fa-business-time"></i>--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="timeline">--}}
            {{--                                    <span class="timeline-icon"></span>--}}
            {{--                                    <span class="year"><i class="float-left fab fa-searchengin"></i>Engineering</span>--}}
            {{--                                    <div class="timeline-content">--}}
            {{--                                        <h3 class="title">PBS somethings</h3>--}}
            {{--                                        <p class="description">--}}
            {{--                                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
            {{--                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis--}}
            {{--                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.--}}
            {{--                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu--}}
            {{--                                            fugiat nulla pariatur.--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="timeline">--}}
            {{--                                    <span class="timeline-icon"></span>--}}
            {{--                                    <span class="year"><i class="float-right fas fa-sitemap"></i>Architecture</span>--}}
            {{--                                    <div class="timeline-content">--}}
            {{--                                        <h3 class="title">PBS somethings</h3>--}}
            {{--                                        <img src="{{asset("images/others/20.jpg")}}">--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--                        <div class="container clearfix">--}}
            {{--                            <div class="row topmargin-lg clearfix">--}}

            {{--                                <div class="col-lg-4 bottommargin">--}}
            {{--                                    <img width="80" src="images/plumbing/bir.png">--}}
            {{--                                    <div class="heading-block nobottomborder" style="margin-bottom: 15px;">--}}
            {{--                                        <h4 class="text-white" style="font-size: 16px;">Emergency Services</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <p class="" style="line-height: 26px;">We offer 24/7 emergency services for leaks, broken--}}
            {{--                                        pipes,--}}
            {{--                                        slab leaks, stoppages, hot water issues and many more..</p>--}}
            {{--                                </div>--}}

            {{--                                <div class="col-lg-4 bottommargin">--}}
            {{--                                    <img width="80" src="images/plumbing/iki.png">--}}
            {{--                                    <div class="heading-block nobottomborder" style="margin-bottom: 15px;">--}}
            {{--                                        <h4 class="text-white" style="font-size: 16px;">Commercial Plumbing</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <p class="" style="line-height: 26px;">We work with locally owned commercial properties--}}
            {{--                                        including restaurants, country clubs and management firms. We offer maintenance--}}
            {{--                                        contracts--}}
            {{--                                        with priority service.</p>--}}
            {{--                                </div>--}}

            {{--                                <div class="col-lg-4 bottommargin">--}}
            {{--                                    <img width="80" src="images/plumbing/uc.png">--}}
            {{--                                    <div class="heading-block nobottomborder" style="margin-bottom: 15px;">--}}
            {{--                                        <h4 class="text-white" style="font-size: 16px;">Repair</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <p class="" style="line-height: 26px;">Our services include inspection and repair, or if--}}
            {{--                                        repair--}}
            {{--                                        is not possible, replacement or re-piping..</p>--}}
            {{--                                </div>--}}

            {{--                                <div class="col-lg-4 bottommargin">--}}
            {{--                                    <img width="80" src="images/plumbing/dort.png">--}}
            {{--                                    <div class="heading-block nobottomborder" style="margin-bottom: 15px;">--}}
            {{--                                        <h4 class="text-white" style="font-size: 16px;">Installation</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <p class="" style="line-height: 26px;">We offer installation of garbage disposals, water--}}
            {{--                                        heaters, water softeners and all other plumbing fixtures.</p>--}}
            {{--                                </div>--}}

            {{--                                <div class="col-lg-4 bottommargin">--}}
            {{--                                    <img width="80" src="images/plumbing/bes.png">--}}
            {{--                                    <div class="heading-block nobottomborder" style="margin-bottom: 15px;">--}}
            {{--                                        <h4 class="text-white" style="font-size: 16px;">Sewer and Drain</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <p class="" style="line-height: 26px;">We offer a full range of sewage services including--}}
            {{--                                        line--}}
            {{--                                        cleaning, repair, and replacement as well as pump repair and replacement.</p>--}}
            {{--                                </div>--}}

            {{--                                <div class="col-lg-4 bottommargin">--}}
            {{--                                    <img src="images/plumbing/alti.png">--}}
            {{--                                    <div class="heading-block nobottomborder" style="margin-bottom: 15px;">--}}
            {{--                                        <h4 class="text-white" style="font-size: 16px;">Bathroom Remodeling</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <p class="" style="line-height: 26px;">Are you looking to renovate your bathroom but you--}}
            {{--                                        don’t--}}
            {{--                                        know where to start? We are a fully licensed home builder that can make the bathroom of--}}
            {{--                                        your--}}
            {{--                                        dreams into reality.</p>--}}
            {{--                                </div>--}}

            {{--                            </div>--}}
            {{--                        </div>--}}
        </div>
    </section>
@stop


@section('js')
    {{--javascript bölümü--}}
    <script>
        $(document).ready(function () {
            var time = 1000;
            setInterval(animateit, time);
        });

        function animateit() {
            var $radios = $('input[type="radio"][name="timeline-dot"]');
            var $checked = $radios.filter(':checked');
            var $next = $radios.eq($radios.index($checked) + 1);
            if (!$next.length) {
                $next = $radios.first();
            }
            $next.prop("checked", true);
        }
    </script>
@stop
