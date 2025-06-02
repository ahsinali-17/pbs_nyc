@extends('frontend.master')

@php($pageTitle ='Maintenance')

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
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="dark row justify-content-start justify-content-sm-center justify-content-md-start">
                    <div class="col-lg-4 col-md-6">
                        <div class="heading-block services-info pr-1">
                            <h2 class="t400 ls0 nott font-primary">Maintenance</h2>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-md-center mt-3">
                    <div class="col-md-4 px-lg-4">
                        <div style="background-color: #1a1d208c !important;"
                             class="dark card p-2 py-lg-5 px-xl-3 px-lg-2">
                            <div class="card-body rounded">
                                <div class="feature-box media-box">
                                    <div class="fbox-icon position-relative mb-4" style="width: 50px;height: 50px">
                                        <i class="icon-warning-sign"></i>
                                    </div>
                                    <div class="text-white fbox-desc">
                                        <h3 class="t400 ls0 nott">24/7 Emergency Response.</h3>
                                        <p class="text-muted text-white">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Eligendi rem, facilis nobis voluptatum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-lg-4 mt-3 mt-md-0">
                        <div style="background-color: #1a1d208c !important;"
                             class="bg-dark dark card border-color-pink p-2 py-lg-5 px-xl-3 px-lg-2">
                            <div class="card-body rounded">
                                <div class="feature-box media-box">
                                    <div class="feature-box media-box">
                                        <div class="fbox-icon position-relative mb-3" style="width: 50px;height: 50px">
                                            <i class="icon-group"></i>
                                        </div>
                                        <div class="fbox-desc">
                                            <h3 class="t400 ls0 nott">Clean and Professional.</h3>
                                            <p class="text-muted text-white">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Eligendi rem, facilis nobis voluptatum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-color: #1a1d208c !important;"
                             class="bg-dark dark card border-color-yellow p-2 py-lg-5 px-xl-3 px-lg-2 mt-3 mt-lg-5">
                            <div class="card-body rounded">
                                <div class="feature-box media-box">
                                    <div class="fbox-icon position-relative mb-4" style="width: auto;height: auto">
                                        <div class="fbox-icon position-relative mb-3" style="width: 52px;height: 52px">
                                            <i class="icon-people-carry"></i>
                                        </div>
                                    </div>
                                    <div class="fbox-desc">
                                        <h3 class="t400 nott ls0">Full Customer Satisfaction.</h3>
                                        <p class="text-muted text-white">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Eligendi rem, facilis nobis voluptatum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-lg-4 mt-3 mt-md-0">
                        <div style="background-color: #1a1d208c !important;"
                             class="bg-dark dark card border-color-info p-2 py-lg-5 px-xl-3 px-lg-2">
                            <div class="card-body rounded">
                                <div class="feature-box media-box">
                                    <div class="fbox-icon position-relative mb-3" style="width: 52px;height: 52px">
                                        <i class="icon-book-open"></i>
                                    </div>
                                    <div class="fbox-desc">
                                        <h3 class="t400 ls0 nott">Trained and Certified</h3>
                                        <p class="text-muted text-white">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Eligendi rem, facilis nobis voluptatum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- #content end -->

    <div class="notopmargin bottommargin">
        <a href="#" class="button button-full center tright footer-stick bottommargin">
            <div class="container clearfix">
                Need help about anything? <strong>Start here</strong> <i class="icon-caret-right" style="top:4px;"></i>
            </div>
        </a>
    </div>
@stop


@section('js')
    {{--javascript bölümü--}}
@stop
