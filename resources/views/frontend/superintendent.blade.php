@extends('frontend.master')

@php($pageTitle ='Superintendent')

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
    <!-- 2 : #section-services -->
    <section id="section-services" class="bg-transparent">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="heading-block center nobottomborder">
                    <span class="before-heading color">Best of the Best</span>
                    <h3>Superintendent Services</h3>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et possimus iste eius eos repellendus id officiis itaque ipsum, fuga aut.</span>
                </div>

                <div class="row topmargin-lg clearfix">

                    <div class="col-md-4">
                        <div class="feature-box center media-box">
                            <div class="fbox-media">
                                <img src="images/services/superintender.png" class="divcenter" alt="Image 1"
                                     style="height:4vw; width: auto;">
                            </div>
                            <div class="fbox-desc clearfix">
                                <h3 class="text-white body-font">OUR SUPERINTENDENTS.<span class="subtitle body-font">Experinenced lorem ipsum.</span>
                                </h3>
                                <p>We offer free installation for 24 hours surveillance cameras to ensure that the work
                                    is
                                    performed safe and according to the DOB approved drawings. Our superintendents have
                                    less
                                    then 5 projects on their licence to maximize the safety support to each project and
                                    to
                                    be present at the job site anytime there is an inspection..</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-box center media-box">
                            <div class="fbox-media">
                                <img src="images/services/management.png" class="divcenter" alt="Image 2"
                                     style="height:4vw; width: auto;">
                            </div>
                            <div class="fbox-desc clearfix">
                                <h3 class="text-white body-font">MANAGEMENT.<span class="subtitle body-font">Lorem ipsum Quos non.</span>
                                </h3>
                                <p>Quos, non, esse eligendi ab accusantium voluptatem. Maxime eligendi beatae, atque
                                    tempora
                                    ullam. Vitae delectus quia, consequuntur rerum molestias quo.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-box center media-box">
                            <div class="fbox-media">
                                <img src="images/services/certificate.png" class="divcenter" alt="Image 3"
                                     style="height:4vw; width: auto;">
                            </div>
                            <div class="fbox-desc clearfix">
                                <h3 class="text-white body-font">CERTIFICATION<span class="subtitle body-font">Make our Customers Happy.</span>
                                </h3>
                                <ul>
                                    <li>NYC DOB LICENSE</li>
                                    <li> OSHA 30</li>
                                    <li> OSHA 10</li>
                                    <li> 40 SITE SAFETY MANAGER</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nobottommargin">
                <a href="#" class="button button-full center tright topmargin footer-stick">
                    <div class="container clearfix">
                        Need help about anything? <strong>Contact Us Now!</strong> <i class="icon-caret-right"
                                                                                      style="top:4px;"></i>
                    </div>
                </a>
            </div>
        </div>
    </section> <!-- .section end -->
@stop


@section('js')
    {{--javascript bölümü--}}
@stop
