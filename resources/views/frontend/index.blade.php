@extends('frontend.master')

@php($pageTitle ='Home Page')

@section('meta')
    {{--meta etiketleri--}}
@stop


@section('css')
    {{--css kodları--}}
@stop

@section('slider')
    @include('frontend.partials.slider')
@stop


@section('content')
    <!-- Content ============================================= -->
    <section class="bg-transparent" id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <div class="row justify-content-between">
                    <!--Free Alert System *****************************************-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        @include('frontend.partials.alertsubscribe')
                    </div>
                    <!-- Free Alert System bitti *****************************************-->

                    <!-- Flip Burda başladı-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-sm-6 mb-5">

                                <!-- Flip Card 1 ========================= -->
                                <div class="flip-card">
                                    <div class="front no-after"
                                         style="background: #ffffff url({{asset('images/flips/alerts.png')}}); background-size: cover;">
                                        ,
                                        <img width="13%" alt="" class="noradius nobg tleft"
                                             src="{{ asset('images/icons/1.png') }}">
                                        <div class="inner">
                                            <div class="feature-box media-box">

                                                <div class="fbox-desc">
                                                    <h3 style="color: black; font-size: medium"
                                                        class="t700 center nott pricing-box">
                                                        ALERTS</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <img width="10%" alt="" class="mb-1 mr-1 noradius sagAltOk nobg"
                                             src="{{ asset('images/icons/sagok.svg') }}">

                                    </div>
                                    <div class="back dark"
                                         style="background-image: url('{{ asset('images/others/10.jpg') }}')">
                                        <div class="inner mt-3">
                                            <a href="{{route('alerts')}}">
                                                <h5 class="mb-4 t300">Stay alert and never miss a critical step
                                                    again.
                                                    Our system is online 24/7 collecting data in real time. We don't
                                                    just cover the main departments--we cover it all. From 311
                                                    complaints to ECB hearings, we have you covered. Want to avoid
                                                    the headache? Get ahead of it and sign up today.</h5>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <!-- Flip Card 2 ========================= -->
                                <div class="flip-card">
                                    <div class="front no-after"
                                         style="background: #ffffff url({{asset('images/flips/membership.png')}}); background-size: cover;">
                                        <img width="13%" alt="" class="noradius ml-2 nobg tleft"
                                             src="{{ asset('images/icons/3.png') }}">
                                        <div class="inner">
                                            <div class="feature-box media-box">
                                                <div class="fbox-desc">
                                                    <h3 style="color: black; font-size: medium"
                                                        class="t700 center nott pricing-box">
                                                        MEMBERSHIP</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <img width="10%" alt="" class="mb-1 mr-1 noradius sagAltOk nobg"
                                             src="{{ asset('images/icons/sagok.svg') }}">
                                    </div>
                                    <div class="back dark"
                                         style="background-image: url('{{ asset('images/others/20.jpg') }}')">
                                        <div class="inner mt-3">
                                            <h5 class="mb-4 t300">Getting alerts is half the battle. Membership is
                                                the
                                                other half--when you join, you allow us to monitor your property for
                                                you. Preventative measures and a free survey of your property will
                                                eliminate most obstacles before they arise, and our instant response
                                                time will resolve issues before they escalate.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6  mb-5 mb-lg-0">
                                <!-- Flip Card 3 =========================== -->
                                <div class="flip-card">
                                    <div class="front no-after"
                                         style="background: #ffffff url({{asset('images/flips/planning.png')}}); background-size: cover;">
                                        <img width="13%" alt="" class="noradius ml-2 nobg tleft"
                                             src="{{ asset('images/icons/2.png') }}">
                                        <div class="inner">
                                            <div class="feature-box media-box">
                                                <div class="fbox-desc">
                                                    <h3 style="color: black; font-size: medium"
                                                        class="t700 center nott pricing-box">PLANNING</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <img width="10%" alt="" class="mb-1 mr-1 noradius sagAltOk nobg"
                                             src="{{ asset('images/icons/sagok.svg') }}">
                                    </div>
                                    <div class="back dark"
                                         style="background-image: url('{{ asset('images/others/30.jpg') }}')">
                                        <div class="inner mt-3">
                                            <h5 class="mb-4 t300">Our planning tool provides you with precise and up
                                                to
                                                the minute soft costs for every type of project from architecture to
                                                engineering to special inspections. With just a few simple details,
                                                our advanced algorithm will provide accurate results to get you
                                                ahead before your project begins.
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <!-- Flip Card 4 ========================== -->
                                <div class="flip-card">
                                    <div class="front no-after"
                                         style="background: #ffffff url({{asset('images/flips/construction.png')}}); background-size: cover;">
                                        <img width="13%" alt="" class="noradius ml-2 nobg tleft"
                                             src="{{ asset('images/icons/4.png') }}">
                                        <div class="inner">
                                            <div class="feature-box media-box">
                                                <div class="fbox-desc">
                                                    <h3 style="color: black; font-size: medium"
                                                        class="t700 center nott pricing-box">
                                                        DEVELOPMENT</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <img width="10%" alt="" class="mb-1 mr-1 noradius sagAltOk nobg"
                                             src="{{ asset('images/icons/sagok.svg') }}">
                                    </div>
                                    <div class="back dark"
                                         style="background-image: url('{{ asset('images/others/40.jpg') }}')">
                                        <div class="inner mt-3">
                                            <h6 class="mb-4 t300">Development code has never been as strict or
                                                fast-changing as it is today. Missing one item could derail a
                                                project and its budget. That's why our development tool is always on
                                                track, automatically scanning department codes corresponding to the
                                                details you provided in our planning calculator. Stay current with
                                                project specific requirements so that it gets done right the
                                                first time every time. </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Flip Burada bitti *************************-->

                </div>

                <div class="divider divider-center"><img src="{{ asset('images/others/dividerlogo50.png') }}"
                                                         width="30px"/></div>

                <div class="col_one_third">
                    <div class="feature-box p-0">
                        <h3 class="t500">Preventative</h3>
                        <p>Be proactive, not reactive. Let us solve it before it becomes a problem--one team handling
                            all your needs from A to Z.</p>
                    </div>
                </div>

                <div class="col_one_third">
                    <div class="feature-box p-0">
                        <h3 class="t500">Transparency</h3>
                        <p>Never wonder about the status of your project again. 24/7 access to your client portal
                            provides you with the clarity you have always wanted.</p>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box p-0">
                        <h3 class="t500">Dependability</h3>
                        <p>Count on us to handle everything you know needs to be done, and a few things you didn't.
                            Proactive offers intensive, comprehensive attention to members, so you know you always have
                            a trusted eye on your project.</p>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="col_one_third">
                    <div class="feature-box p-0">
                        <h3 class="t500">Accountability</h3>
                        <p>Excuses don't get a budget line. Facts speak for themselves. We stand by our products and our
                            work, so rest assured that you will never get the runaround.</p>
                    </div>
                </div>

                <div class="col_one_third">
                    <div class="feature-box p-0">
                        <h3 class="t500">Connection</h3>
                        <p> Communication is a key factor in a successful project. Customize your settings so that you
                            receive exactly the information you want exactly when you need it most.</p>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box p-0">
                        <h3 class="t400">Precision</h3>
                        <p>Cut to the chase. You want the most accurate information applied correctly and efficiently
                            every step of the way. Let proactive streamline your project and your experience by focusing
                            on your priorities.</p>
                    </div>
                </div>

                <div class="divider divider-center"><img src="{{ asset('images/others/dividerlogo50.png') }}"
                                                         width="30px"/></div>

                <div class="container-fluid clearfix">
                    <div
                            class="d-flex flex-column align-items-center justify-content-center center counter-section position-relative"
                            style="background: url('{{ asset('images/world-map.png') }}') no-repeat center center/ contain">

                        <div class="row align-items-stretch m-0 w-100 clearfix">

                            <div class="col-lg-4 col-sm-6 center mt-5">
                                <i class="icon-home2 icon-5x"></i>
                                <div class="counter font-secondary"><span data-comma="true" data-from="0"
                                                                          data-refresh-interval="50" data-speed="2200"
                                                                          data-to="{{App\Models\Settings::get('properties_monitored',1900)}}"></span>
                                </div>
                                <h4 class="nott ls0 mt-0">Properties Monitored</h4>
                            </div>

                            <div class="col-lg-4 col-sm-6 center mt-5">
                                <i class="icon-newspaper3 icon-5x"></i>
                                <div class="counter font-secondary"><span data-comma="true" data-from="0"
                                                                          data-refresh-interval="25" data-speed="2000"
                                                                          data-to="{{App\Models\Settings::get('corrected_violations',9232)}}"></span>
                                </div>
                                <h4 class="nott ls0 mt-0">Corrected Violations</h4>
                            </div>

                            <div class="col-lg-3 col-sm-6 center mt-5">
                                <i class="icon-building2 icon-5x"></i>
                                <div class="counter font-secondary"><span data-comma="true" data-from="0"
                                                                          data-refresh-interval="50" data-speed="2100"
                                                                          data-to="{{App\Models\Settings::get('square_footage_developed',4629119)}}"></span>
                                </div>
                                <h4 class="nott ls0 mt-0">Square Footage Developed</h4>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="divider divider-center" id="iletisim"><img
                            src="{{ asset('images/others/dividerlogo50.png') }}"
                            width="30px"/>
                </div>

                <div class="row justify-content-around">

                    {{--Headquarter--}}
                    <div class="dark col-lg-5 mb-5 mb-lg-0"
                         style="background-image: url('{{ asset('images/others/headquarter-bg-low.jpg') }}'); background-position: center center;
                                 background-size: cover;">
                        <div class="row">
                            <div class="testimonial w-85 my-5 mx-auto text-center"
                                 style="background-color: rgba(0,0,0,0.6) !important;">

                                <address>
                                    <h2 class="text-center">Our Headquarters</h2>
                                    <strong>
                                        22 E 41st Street, Third Floor
                                        New York NY 10017</strong><br/><br/>
                                    <strong>Phone: </strong><a class="text-white"
                                                               href="tel:+12122716837">212-271-6837</a>
                                    <br/>
                                    <br/>
                                    <strong>E-mail: </strong><a class="text-white" href="mailto:info@pbs.nyc">info@pbs.nyc</a>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="dark col-lg-5 mb-5 mb-lg-0" style="background-color: transparent;">
                        <iframe frameborder="0" height="100%" width="100%" id="gmap_canvas" marginheight="0"
                                marginwidth="0"
                                scrolling="no"
                                src="https://maps.google.com/maps?q=22%20E%2041st%20Street,%20New%20York,%20NY%2010017&z=15&ie=UTF8&iwloc=&output=embed">
                        </iframe>
                    </div>

                </div>

            </div>
        </div>

    </section>
    <!-- #content end -->
@stop


@section('js')

@stop
