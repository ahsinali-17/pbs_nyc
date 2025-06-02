@extends('frontend.master')

@php($pageTitle ='Property Alert Request')

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
    <section class="bg-transparent" id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                @if(Auth::user() && Auth::user()->level() > 2)

                    <div class="not-dark row bottommargin">
                        <!-- Contact Form
                        ============================================= -->
                        {{--                    <div class="col-lg-6">--}}

                        {{--                        <img src="{{asset('images/others/property.jpg')}}">--}}

                        {{--                    </div>--}}
                        <div class="col-lg-12">

                            <div class="title-dotted-border">
                                <h3 class="text-white">Property Alert Request</h3>
                            </div>

                            <div class="form-widget" data-alert-type="inline">

                                <div class="form-result"></div>

                                {{--TODO formphp düzeltilecek.--}}
                                <form class="nobottommargin" id="template-contactform" name="template-contactform"
                                      action="{{route('propertywithemail')}}" method="post">

                                    <div class="form-process"></div>

                                    <div class="col_one_third">
                                        <label class="text-white" for="template-contactform-name">Name
                                            <small>*</small></label>
                                        <input type="text" id="template-contactform-name"
                                               name="template-contactform-name"
                                               value="" class="form-control  not-dark required"/>
                                    </div>

                                    <div class="col_one_third">
                                        <label class="text-white" for="template-contactform-email">Email
                                            <small>*</small></label>
                                        <input type="email" id="template-contactform-email"
                                               name="template-contactform-email"
                                               value="" class="required email  form-control not-dark"/>
                                    </div>

                                    <div class="col_one_third col_last">
                                        <label class="text-white" for="template-contactform-phone">Phone</label>
                                        <input type="tel" id="template-contactform-phone"
                                               name="template-contactform-phone"
                                               value="" class="form-control  not-dark"/>
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col_full">
                                        <label class="text-white" for="template-contactform-addresses">Addresses to add
                                            <small>*</small></label>
                                        <textarea class="required  form-control not-dark"
                                                  id="template-contactform-addresses"
                                                  name="template-contactform-addresses" rows="4" cols="30"></textarea>
                                        {{--                                    <input type="text" id="template-contactform-subject"--}}
                                        {{--                                           name="template-contactform-subject" value=""--}}
                                        {{--                                           class="required  form-control not-dark"/>--}}
                                    </div>


                                    <div class="clear"></div>

                                    <div class="col_full">
                                        <label class="text-white" for="template-contactform-message">Additional Message
                                            <small>*</small></label>
                                        <textarea class="required  form-control not-dark"
                                                  id="template-contactform-message"
                                                  name="template-contactform-message" rows="4" cols="30"></textarea>
                                    </div>

                                    <div class="col_full">
                                        <button name="submit" type="submit" id="submit-button" tabindex="5"
                                                value="Submit"
                                                class="button button-3d button-rounded btn-block nomargin">Submit
                                        </button>
                                    </div>

                                    <input type="hidden" name="prefix" value="template-contactform-">

                                </form>
                            </div>

                        </div>
                        <!-- Contact Form End -->

                        <!-- Google Map
                        ============================================= -->

                        <!-- Google Map End -->

                    </div>
                @else
                    <div class="not-dark row bottommargin">
                        <div class="col-lg-12">

                            <div class="title-dotted-border text-center">
                                <h3 class="text-white">Access Problem</h3>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    Dear Visitor,<br/>
                                    Our Property Alert Request has only access for members.<br/>
                                    Please visit our <a href="{{route('home')}}"> home page </a> or simply watch
                                    the 50 seconds signup video below or contact us with the information <a
                                            href="#contactbottom"> below</a> <br/> <br/>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <iframe width="600" height="334"
                                                    src="https://www.youtube.com/embed/gUV1ImM2vwM"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
            <!-- Contact Info
                ============================================= -->
                <div id="contactbottom" class="dark row">

                    <div class="col-lg-4 col-md-6 bottommargin clearfix">
                        <div class="min-vh-20 feature-box fbox-center fbox-bg ">
                            <div class="fbox-icon">
                                <a href="#"><i class="bg-section icon-map-marker2"></i></a>
                            </div>
                            <h3>Our Headquarters<span
                                        class="subtitle">22 E 41st Street, Third Floor
                                    </br>New York NY 10017</span></h3>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 bottommargin clearfix">
                        <a href="tel:+12122716837">
                            <div class="min-vh-20 feature-box fbox-center fbox-bg">
                                <div class="fbox-icon">
                                    <i class="bg-section icon-phone3"></i>
                                </div>
                                <h3>Call Us<span class="subtitle">212-271-6837</span><br/></h3>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6 bottommargin clearfix">
                        <a href="{{route('calender')}}" target="_blank">
                            <div class="min-vh-20 feature-box fbox-center fbox-bg">
                                <div class="fbox-icon">
                                    <i class="bg-section icon-calendar-1"></i>
                                </div>
                                <h3>Book a Consultation<span
                                            class="subtitle">Check available date&time</span><br/></h3>
                            </div>
                        </a>
                    </div>

                </div>
                <!-- Contact Info End -->

            </div>

        </div>

    </section><!-- #content end -->
@stop


@section('js')
    {{--javascript bölümü--}}

@stop
