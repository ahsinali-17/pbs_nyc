@extends('frontend.master')

@php($pageTitle ='Alerts')

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

                <!-- Flip Burda başladı-->
                <div class="row">
                    <div class="align-self-center justify-content-between col-lg-12">
                        <div class="col-12 my-auto heading-block center">
                            <blockquote class="quote"><br/><br/><span>Revolutionizing the industry by providing access to every demographic of data in real-time.
                                    Our enhanced alert system covers all relevant departments in New York City to ensure you never miss a critical step again.  </span>
                            </blockquote>
                            <blockquote class="quote blockquote-reverse mt-0">

                            </blockquote>
                        </div>
                    </div>
                    <div class="align-self-center mt-1 justify-content-between col-lg-12">
                        <div class="col-lg-10 mx-auto">
                            <div class="row">
                                <div class="col-sm-4 mb-5">
                                    <!-- Flip Card 1
                                    ============================================= -->
                                    <div class="flip-card">
                                        <div class="front no-after" style="background-color: #F9F9F9">
                                            <div class="inner text-muted t500">
                                                <i style="color:forestgreen" class="icon-tree"></i><span
                                                        class="pl-1 h5 text-dark">DEP, DOH, DSNY</span><br/>
                                                <p class="text-muted ">Department of Environmental
                                                    Protection, Department of Health and Department of
                                                    Sanitation all send out violations, complaints, and notices
                                                    sometimes requiring immediate action. DEP Cats
                                                    registration
                                                    tracking for boilers to ensure your device never
                                                    expires.</p>

                                            </div>
                                        </div>
                                        <div class="back dark"
                                             style="background-image: url({{asset("images/others/10.jpg")}})">
                                            <div class="inner mt-3">
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="contact-us">
                                                    <span>Contact US</span>
                                                </a>
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="portal/register">
                                                    <span>Sign Up</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <!-- Flip Card 2
                                    ============================================= -->
                                    <div class="flip-card">
                                        <div class="front no-after" style="background-color: #F9F9F9">
                                            <div class="inner text-muted t500">
                                                <i style="color:darkblue" class="icon-building"></i><span
                                                        class="pl-1 h5 text-dark">DOB</span><br/>
                                                <p class="text-muted ">Department of Buildings complaints, violations,
                                                    corrections, permits, Certficates of Occupancy, and job filing status
                                                    updates provided live for enhanced property and construction
                                                    management. Periodic inspections for boilers, elevators, facades,
                                                    benchmarking and gas piping are all tracked to ensure compliance
                                                    while avoiding violations and fines.</p>

                                            </div>
                                        </div>
                                        <div class="back dark"
                                             style="background-image: url({{asset("images/others/20.jpg")}})">
                                            <div class="inner mt-3">
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="contact-us">
                                                    <span>Contact US</span>
                                                </a>
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="portal/register">
                                                    <span>Sign Up</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <!-- Flip Card 3
                                    ============================================= -->
                                    <div class="flip-card">
                                        <div class="front no-after" style="background-color: #F9F9F9">
                                            <div class="inner text-muted t500">
                                                <i style="color:black" class="icon-wrench1"></i><span
                                                        class="pl-1 h5 text-dark">ECB</span><br/>
                                                <p class="text-muted ">Environmental Control Board, otherwise known as
                                                    OATH, holds hearings for many department violations. Tracking their
                                                    system ensures you never miss a court date again, instantly updating
                                                    you on correction submissions, court appearances and
                                                    determinations.</p>

                                            </div>
                                        </div>
                                        <div class="back dark"
                                             style="background-image: url({{asset("images/others/20.jpg")}})">
                                            <div class="inner mt-3">
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="contact-us">
                                                    <span>Contact US</span>
                                                </a>
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="portal/register">
                                                    <span>Sign Up</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <!-- Flip Card 4
                                    ============================================= -->
                                    <div class="flip-card">
                                        <div class="front no-after" style="background-color: #F9F9F9">
                                            <div class="inner text-muted t500">
                                                <i style="color:darkred" class="icon-gripfire"></i><span
                                                        class="pl-1 h5 text-dark">FDNY</span><br/>
                                                <p class="text-muted ">The Fire Department has many certificates, permits,
                                                    and periodic inspection requirements that we track for you to ensure
                                                    compliance. The department's major requirements include, but are not
                                                    limited to, a five-year sprinkler flow test, annual backflow
                                                    inspections, fire alarm approvals, Certificates of Fitness, letters of
                                                    approval, and Certificates of Corrections.</p>

                                            </div>
                                        </div>
                                        <div class="back dark"
                                             style="background-image: url({{asset("images/others/30.jpg")}})">
                                            <div class="inner mt-3">
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="contact-us">
                                                    <span>Contact US</span>
                                                </a>
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="portal/register">
                                                    <span>Sign Up</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <!-- Flip Card 5
                                    ============================================= -->
                                    <div class="flip-card">
                                        <div class="front no-after" style="background-color: #F9F9F9">
                                            <div class="inner text-muted t500">
                                                <i style="color:darkslateblue" class="icon-city"></i><span
                                                        class="pl-1 h5 text-dark">HPD</span><br/>
                                                <p class="text-muted ">The Housing Preservation & Development requires
                                                    annual registration with many codes to abide by.  We track your
                                                    building-specific requirements, complaints, corrections and
                                                    emergency repairs.</p>

                                            </div>
                                        </div>
                                        <div class="back dark"
                                             style="background-image: url({{asset("images/others/40.jpg")}})">
                                            <div class="inner mt-3">
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="contact-us">
                                                    <span>Contact US</span>
                                                </a>
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="portal/register">
                                                    <span>Sign Up</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <!-- Flip Card 6
                                    ============================================= -->
                                    <div class="flip-card">
                                        <div class="front no-after" style="background-color: #F9F9F9">
                                            <div class="inner text-muted t500">
                                                <i style="color:slategrey" class="icon-road"></i><span
                                                        class="pl-1 h5 text-dark">DOT</span><br/>
                                                <p class="text-muted ">Department of Transportation covers all sidewalks
                                                    and roadways. Complaints, violations, inspections and emergency
                                                    repairs are all tracked to ensure compliance.</p>

                                            </div>
                                        </div>
                                        <div class="back dark"
                                             style="background-image: url({{asset("images/others/40.jpg")}})">
                                            <div class="inner mt-3">
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="contact-us">
                                                    <span>Contact US</span>
                                                </a>
                                                <a class="button button-change ohidden rounded nott t300 m-0"
                                                   href="portal/register">
                                                    <span>Sign Up</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Flip Burada bitti *************************-->

                    </div>

                </div>

                <div class="row pricing-box text-left">

                    <div class="col-12 mb-5">
                        <div class="heading-block center">
                            <a name="alert"> <h2>Alert System</h2></a>
                        </div>
                        @include('frontend.partials.alertsubscribe')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="heading-block">
                            <h3 class="text-white">How it works?</h3>
                        </div>

                        <p class="text-white ikiyanayasla">Once you sign up for our alert service, you will receive
                            a welcome email confirming that you've been
                            subscribed. From that moment on, your property will be monitored 24/7, and you will be
                            notified of every department's
                            activity via both email and by downloading our free, user-friendly mobile app (IOS and
                            Android compatible).</p>

                        <p class="text-white ikiyanayasla">For a limited time our alert service is free for the first 3
                            months, thereafter it is only $9 per
                            building per month.</p>

                        <p class="text-white ikiyanayasla">Membership is the next step, allowing total access to
                            the client portal.
                            The portal holds all property information, department data, and related
                            specifications. Any time an alert
                            arrives in your client portal, PBS remediation automatically begins by generating a
                            comprehensive checklist of all items
                            necessary for correction, and a team member immediately gets to work on completing each
                            task.
                            See <a href="{{route('aboutus')}}"> Membership </a> for more information.</p>


                    </div>

                </div>
            </div>
        </div>
    </section><!-- #content end -->
@stop


@section('js')

@stop
