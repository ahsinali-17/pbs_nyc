@extends('frontend.master')

@php($pageTitle ='Violation Correction')

@section('meta')
    {{--meta etiketleri--}}

@stop

@section('css')
    {{--css kodları--}}

@stop

@section('slider')
    {{--slider bölümü--}}

@stop


@section('content')
    {{--content bölümü--}}
    <!-- Content
    ============================================= -->
    <section class="bg-transparent" id="content">

        <div class="content-wrap mb-0 pb-0">
            <div class="heading-block center">
                <p>
                    With 24/7 remote access to our enhanced system providing you with real time alerts you will have the
                    ability to monitor yor property every step of the way.
                </p>
            </div>
            <div class="container clearfix">

                <div class="col_one_third">
                    <div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-data i-alt"></i></a>
                        </div>
                        <h3>Data Collection <span class="subtitle">Our system will automatically obtain copies of the violation(s) and any applicable information</span>
                        </h3>
                    </div>
                </div>

                <div class="col_one_third">
                    <div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-list1 i-alt"></i></a>
                        </div>
                        <h3>Preparation <span class="subtitle">A team member will instantly respond to the alert by preparing a comprehensive checklist for every step of remediation.</span>
                        </h3>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-people-carry i-alt"></i></a>
                        </div>
                        <h3>Coordination <span class="subtitle">Get a step ahead with strategic integration. We don't just guide you in the right direction, we take you there. Our team will arrange with all parties involved to obtain corrections.</span>
                        </h3>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="col_one_third">
                    <div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-et-documents i-alt"></i></a>
                        </div>
                        <h3>Documentation <span class="subtitle">All relevant documents will be prepared, distributed and submitted by our team. </span>
                        </h3>
                    </div>
                </div>

                <div class="col_one_third">
                    <div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-ok i-alt"></i></a>
                        </div>
                        <h3>Inspections <span class="subtitle">A team member will attend every inspection involved to ensure efficiency. </span>
                        </h3>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box fbox-center fbox-outline fbox-effect nobottomborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-realestate-court i-alt"></i></a>
                        </div>
                        <h3>Hearing<span class="subtitle"> A qualified team member will attend any applicable ECB hearings to ensure the best possible outcome.</span>
                        </h3>
                    </div>
                </div>

            </div>

            <div class="my-0 notopmargin section" style="background-color: #1a1d208c !important;" >


                <div class="container nobottommargin notopmargin my-5 clearfix">
                    <div
                        class="d-flex flex-column align-items-center justify-content-center center counter-section position-relative"
                        style="background: url('{{ asset('images/world-map.png') }}') no-repeat center center/ contain">

                        <div class="row align-items-stretch m-0 w-100 clearfix">

                            <div class="col-lg-4 col-sm-6 center">
                                <i class="icon-home2 icon-5x"></i>
                                <div class="counter font-secondary"><span data-comma="true" data-from="0"
                                                                          data-refresh-interval="50" data-speed="2200"
                                                                          data-to="{{App\Models\Settings::get('properties_monitored',1379)}}"></span>
                                </div>
                                <h4 class="nott ls0 mt-0">Properties Monitored</h4>
                            </div>

                            <div class="col-lg-4 col-sm-6 center">
                                <i class="icon-newspaper3 icon-5x"></i>
                                <div class="counter font-secondary"><span data-comma="true" data-from="0"
                                                                          data-refresh-interval="25" data-speed="2000"
                                                                          data-to="{{App\Models\Settings::get('corrected_violations',7732)}}"></span>
                                </div>
                                <h4 class="nott ls0 mt-0">Corrected Violations</h4>
                            </div>

                            <div class="col-lg-3 col-sm-6 center">
                                <i class="icon-building2 icon-5x"></i>
                                <div class="counter font-secondary"><span data-comma="true" data-from="0"
                                                                          data-refresh-interval="50" data-speed="2100"
                                                                          data-to="{{App\Models\Settings::get('square_footage_developed',2657018)}}"></span>
                                </div>
                                <h4 class="nott ls0 mt-0">Square Footage Developed</h4>
                            </div>

                        </div>
                    </div>
                </div>

            </div>



        </div>

    </section><!-- #content end -->


@stop


@section('js')
    {{--javascript bölümü--}}
@stop
