@extends('frontend.master')

@php($pageTitle ='Member Portal')

@section('meta')
    {{--meta etiketleri--}}

@stop

@section('css')


@stop

@section('slider')
    {{--slider bölümü--}}

@stop


@section('content')
    {{--content bölümü--}}


    <!-- Content
		============================================= -->
    <section id="slider" class="slider-element slider-parallax full-screen dark"
             style="background: url({{asset('images/others/newyork-arkaplan.jpg')}}) center center no-repeat; background-size: cover">

        <div class="slider-parallax-inner">

            <div class="container-fluid vertical-middle clearfix karbonopak">

                <div class="heading-block title-center nobottomborder">
                    <h1>PBS MEMBER PORTAL</h1>


                </div>

                <div class="center bottommargin">
                        <a href="#" class=" col-lg-3 button button-3d button-teal button-xlarge nobottommargin">Start your FREE Trial</a>
                </div>

            </div>

        </div>

    </section>

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div id="section-features" class="heading-block title-center page-section">
                    <h2>Features Overview</h2>
                </div>

                <div class="col_one_third">
                    <div class="feature-box fbox-plain">
                        <div class="fbox-icon" data-animate="bounceIn">
                            <a href="#"><i class="fas fa fa-bell"></i> </a>
                        </div>
                        <h3>Instant Alert</h3>
                        <p>Revolutionizing the industry by providing access to every demographic of data in real time.
                            Our enhanced alert system covers all relevant departments in New York City to ensure you
                            never miss a critical step again.</p>
                    </div>
                </div>

                <div class="col_one_third">
                    <div class="feature-box fbox-plain">
                        <div class="fbox-icon" data-animate="bounceIn" data-delay="100">
                            <a href="#"><i class="fas fa fa-toolbox"></i> </a>
                        </div>
                        <h3>Add/Remove Property</h3>
                        <p>Easily add properties by using our user-friendly portal platform. You can add
                            by address, BIN or requesting one of our agents to add for you.</p>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box fbox-plain">
                        <div class="fbox-icon" data-animate="bounceIn" data-delay="200">
                            <a href="#"><i class="fas fa fa-credit-card"></i> </a>
                        </div>
                        <h3>Property Card</h3>
                        <p>All relevant property information is automatically synced to our property card.
                            From zoning to notes, keep everything for your property in one place.</p>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="col_one_third">
                    <div class="feature-box fbox-plain">
                        <div class="fbox-icon" data-animate="bounceIn" data-delay="400">
                            <a href="#"><i class="fas fa fa-file-alt"></i> </a>
                        </div>
                        <h3>Reports</h3>
                        <p>You will instantly receive a summary report when signing up,
                            thereafter you will receive them weekly or monthly depending on your customizable settings.</p>
                    </div>
                </div>

                <div class="col_one_third">
                    <div class="feature-box fbox-plain">
                        <div class="fbox-icon" data-animate="bounceIn" data-delay="700">
                            <a href="#"><i class="fas fa fa-laptop-house"></i> </a>
                        </div>
                        <h3>Custom Property Inspection</h3>
                        <p>Adding unlimited custom inspections allows you to track all deadlines. Setting alerts at your discretion provides multiple reminders to ensure you never miss a vital step again.</p>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box fbox-plain">
                        <div class="fbox-icon" data-animate="bounceIn" data-delay="500">
                            <a href="#"><i class="fas fa fa-chalkboard-teacher"></i> </a>
                        </div>
                        <h3>Portal Access</h3>
                        <p> 24/7 access to your member portal allows you to track and manage every detail of your property in one location.</p>
                    </div>
                </div>

                <div class="clear"></div>



                <div class="clear"></div>

                <div class="divider divider-short divider-center"><i class="icon-circle"></i></div>

{{--                <div id="section-pricing" class="heading-block title-center nobottomborder page-section">--}}
{{--                    <h2>Pricing Details</h2>--}}
{{--                    <span>Our All inclusive Pricing Plan that covers you well</span>--}}
{{--                </div>--}}

{{--                <div class="pricing-box pricing-extended bottommargin clearfix">--}}

{{--                    <div class="pricing-desc">--}}
{{--                        <div class="pricing-title">--}}
{{--                            <h3>LET'S GET IN MEMBER PORTAL!</h3>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-features">--}}
{{--                            <ul class="iconlist-color clearfix">--}}
{{--                                <li><i class="icon-asterisk1"></i> Manage Everyhthing</li>--}}
{{--                                <li><i class="icon-indent-right"></i> See all property details</li>--}}
{{--                                <li><i class="icon-laptop1"></i> Advanced Panel</li>--}}
{{--                                <li><i class="icon-magic"></i> Custom Inspections</li>--}}
{{--                                <li><i class="icon-line2-support"></i> Support for everything</li>--}}
{{--                                <li><i class="icon-vcard"></i> Property Info Included</li>--}}
{{--                                <li><i class="icon-building"></i> Manage Properties</li>--}}
{{--                                <li><i class="icon-email"></i> 24x7 Priority Email Support</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="pricing-action-area">--}}
{{--                        <div class="pricing-meta">--}}
{{--                            As Low as--}}
{{--                        </div>--}}
{{--                        <div class="pricing-price">--}}
{{--                            <span class="price-unit">$</span>15<span class="price-tenure">monthly</span>--}}
{{--                        </div>--}}
{{--                        <div class="pricing-action">--}}
{{--                            <a href="#" class="button button-3d button-large btn-block nomargin">Get Started</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

                <div class="clear"></div>

            </div>

{{--            <div class="section">--}}

{{--                <div class="container clearfix">--}}

{{--                    <div id="section-testimonials" class="heading-block title-center page-section">--}}
{{--                        <h2>Testimonials</h2>--}}
{{--                        <span>Our All inclusive Pricing Plan that covers you well</span>--}}
{{--                    </div>--}}

{{--                    <ul class="testimonials-grid grid-3 clearfix">--}}
{{--                        <li>--}}
{{--                            <div class="testimonial">--}}
{{--                                <div class="testi-image">--}}
{{--                                    <a href="#"><img src="{{asset('images/testimonials/5.jpg')}}"--}}
{{--                                                     alt="Customer Testimonails"></a>--}}
{{--                                </div>--}}
{{--                                <div class="testi-content">--}}
{{--                                    <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam--}}
{{--                                        cum libero illo rerum repellendus!</p>--}}
{{--                                    <div class="testi-meta">--}}
{{--                                        John Doe--}}
{{--                                        <span>XYZ Inc.</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="testimonial">--}}
{{--                                <div class="testi-image">--}}
{{--                                    <a href="#"><img src="{{asset('images/testimonials/6.jpg')}}"--}}
{{--                                                     alt="Customer Testimonails"></a>--}}
{{--                                </div>--}}
{{--                                <div class="testi-content">--}}
{{--                                    <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos--}}
{{--                                        obcaecati id culpa corporis molestias.</p>--}}
{{--                                    <div class="testi-meta">--}}
{{--                                        Collis Ta'eed--}}
{{--                                        <span>Envato Inc.</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="testimonial">--}}
{{--                                <div class="testi-image">--}}
{{--                                    <a href="#"><img src="{{asset('images/testimonials/5.jpg')}}"--}}
{{--                                                     alt="Customer Testimonails"></a>--}}
{{--                                </div>--}}
{{--                                <div class="testi-content">--}}
{{--                                    <p>Fugit officia dolor sed harum excepturi ex iusto magnam asperiores molestiae qui--}}
{{--                                        natus obcaecati facere sint amet.</p>--}}
{{--                                    <div class="testi-meta">--}}
{{--                                        Mary Jane--}}
{{--                                        <span>Google Inc.</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="testimonial">--}}
{{--                                <div class="testi-image">--}}
{{--                                    <a href="#"><img src="{{asset('images/testimonials/6.jpg')}}"--}}
{{--                                                     alt="Customer Testimonails"></a>--}}
{{--                                </div>--}}
{{--                                <div class="testi-content">--}}
{{--                                    <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia--}}
{{--                                        eaque. Repellendus, vero numquam?</p>--}}
{{--                                    <div class="testi-meta">--}}
{{--                                        Steve Jobs--}}
{{--                                        <span>Apple Inc.</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="testimonial">--}}
{{--                                <div class="testi-image">--}}
{{--                                    <a href="#"><img src="{{asset('images/testimonials/5.jpg')}}"--}}
{{--                                                     alt="Customer Testimonails"></a>--}}
{{--                                </div>--}}
{{--                                <div class="testi-content">--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, perspiciatis--}}
{{--                                        illum totam dolore deleniti labore.</p>--}}
{{--                                    <div class="testi-meta">--}}
{{--                                        Jamie Morrison--}}
{{--                                        <span>Adobe Inc.</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="testimonial">--}}
{{--                                <div class="testi-image">--}}
{{--                                    <a href="#"><img src="{{asset('images/testimonials/6.jpg')}}"--}}
{{--                                                     alt="Customer Testimonails"></a>--}}
{{--                                </div>--}}
{{--                                <div class="testi-content">--}}
{{--                                    <p>Porro dolorem saepe reiciendis nihil minus neque. Ducimus rem necessitatibus--}}
{{--                                        repellat laborum nemo quod.</p>--}}
{{--                                    <div class="testi-meta">--}}
{{--                                        Cyan Ta'eed--}}
{{--                                        <span>Tutsplus</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

{{--                </div>--}}

{{--            </div>--}}

            <div class="container clearfix">

                <div id="section-specs" class="heading-block title-center page-section">
                    <h2>Member Portal Specifications</h2>
                </div>

                <div id="side-navigation" class="ui-tabs ui-corner-all ui-widget ui-widget-content">

                    <div class="col_one_third">

                        <ul class="sidenav ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                            role="tablist">
                            <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active"
                                role="tab" tabindex="0" aria-controls="snav-content1" aria-labelledby="ui-id-1"
                                aria-selected="true" aria-expanded="true"><a href="#snav-content1" role="presentation"
                                                                             tabindex="-1" class="ui-tabs-anchor"
                                                                             id="ui-id-1"><i class="icon-screen"></i>
                                    Property Management <i class="icon-chevron-right"></i></a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                aria-controls="snav-content2" aria-labelledby="ui-id-2" aria-selected="false"
                                aria-expanded="false"><a href="#snav-content2" role="presentation" tabindex="-1"
                                                         class="ui-tabs-anchor" id="ui-id-2"><i class="icon-magic"></i>Custom
                                    Inspections<i class="icon-chevron-right"></i></a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                aria-controls="snav-content3" aria-labelledby="ui-id-3" aria-selected="false"
                                aria-expanded="false"><a href="#snav-content3" role="presentation" tabindex="-1"
                                                         class="ui-tabs-anchor" id="ui-id-3"><i
                                            class="icon-building1"></i> Property Info<i class="icon-chevron-right"></i></a>
                            </li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                aria-controls="snav-content4" aria-labelledby="ui-id-4" aria-selected="false"
                                aria-expanded="false"><a href="#snav-content4" role="presentation" tabindex="-1"
                                                         class="ui-tabs-anchor" id="ui-id-4"><i
                                            class="icon-comment2"></i> 24/7 Ticket and Email Support<i
                                            class="icon-chevron-right"></i></a></li>
{{--                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"--}}
{{--                                aria-controls="snav-content5" aria-labelledby="ui-id-5" aria-selected="false"--}}
{{--                                aria-expanded="false"><a href="#snav-content5" role="presentation" tabindex="-1"--}}
{{--                                                         class="ui-tabs-anchor" id="ui-id-5"><i class="icon-email3"></i>24x7--}}
{{--                                    Priority Email Support<i class="icon-chevron-right"></i></a></li>--}}
                        </ul>

                    </div>

                    <div class="col_two_third col_last">

                        <div id="snav-content1" aria-labelledby="ui-id-1" role="tabpanel"
                             class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="false" style="">
                            <h3>Adding Properties</h3>
                            <img class="alignright img-responsive" src="{{asset('images/others/captured.gif')}}" alt="">

                            Our user-friendly tool allows you to add or remove properties within seconds.
                            You can add by address, BIN or <a href="{{route('addpropertyrequest')}}">sending us your list of properties</a>.
                        </div>

                        <div id="snav-content2" aria-labelledby="ui-id-2" role="tabpanel"
                             class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true"
                             style="display: none;">
                            <h3>Unlimited Custom Inspections</h3>
                            <img class="alignright img-responsive" src="{{asset('images/others/custominspection.gif')}}"
                                 alt="">
                            With customized inspections and alerts you will never miss a deadline again.
                            From DOB annual boiler to FDNY five year hydrostatic tests, we have you covered.
                            Add unlimited inspections by filling out our user-friendly inspection tool.
                        </div>

                        <div id="snav-content3" aria-labelledby="ui-id-3" role="tabpanel"
                             class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true"
                             style="display: none;">
                            <iframe width="1280" height="720" src="https://www.youtube.com/embed/fIltlXonmUc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
{{--                            <img class="alignleft img-responsive" width="35%"--}}
{{--                                 src="{{asset('images/others/propertyinfo.png')}}" alt="">--}}
                            <h3>Property Profile</h3>Instantly syncing with your property, a profile and card will automatically be created.
                            From Zonning information to notes and attachments, everything you need in one place.
                        </div>

                        <div id="snav-content4" aria-labelledby="ui-id-4" role="tabpanel"
                             class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true"
                             style="display: none;">
{{--                            <img class="alignleft img-responsive" width="35%"--}}
{{--                                 src="{{asset('images/flips/membership.png')}}" alt="">--}}
                            <iframe width="1280" height="720" src="https://www.youtube.com/embed/uzvkv4oYjlQ"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            <br/>
                            <h3>24/7 Ticket and Email Support</h3>
                            Filling out a support ticket in seconds providing you with instant feedback to ensure satisfaction at every turn.
                        </div>

{{--                        <div id="snav-content5" aria-labelledby="ui-id-5" role="tabpanel"--}}
{{--                             class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true"--}}
{{--                             style="display: none;">--}}
{{--                            <h3>E-mail support</h3>--}}
{{--                            <img class="alignright img-responsive" width="35%"--}}
{{--                                 src="{{asset('images/email-send/envelope.png')}}" alt="">--}}
{{--                           Filling out a support ticket in seconds providing you with instant feedback to ensure satis.--}}
{{--                        </div>--}}

                    </div>

                </div>

            </div>

            <div class="section footer-stick">

                <div class="container clearfix">


                </div>
                <div class="center">

                    <a href="#" data-animate="tada"
                       class="col-lg-5 button button-3d button-teal button-xlarge nobottommargin">Start
                        your FREE Trial</a>
{{--                    - OR - <a href="#" data-scrollto="#section-pricing"--}}
{{--                                                      class="col-lg-5 button button-3d button-red button-xlarge nobottommargin">--}}
{{--                        <i class="icon-user2"></i>Sign Up for a Subscription</a>--}}
{{--test--}}
                </div>

            </div>

        </div>

    </section><!-- #content end -->


    <!-- #content end -->
@stop


@section('js')
    <script>
        $(function () {
            $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
        });
    </script>
    {{--javascript bölümü--}}
@stop
