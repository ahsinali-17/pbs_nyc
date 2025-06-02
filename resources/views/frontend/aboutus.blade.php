@extends('frontend.master')

@php($pageTitle ='About Us')

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
    <section class="bg-transparent" id="content">

        <div class="content-wrap">

            <div class="section pb-0 my-0 karbonopak header-stick">
                <div class="container clearfix">
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="heading-block bottommargin-sm">
                            </div>

                            <p class="ikiyanayasla bottommargin">Proactive Building Solutions is a collaboration of its
                                core team
                                members and fellow New Yorkers, each representing a crucial subdivision that together
                                form the foundation for the PBS network.
                                Their more than 100 years combined experience in the industry provides them with nuanced
                                insight into the planning and process behind every type of building project and property
                                imaginable. By maintaining open communication, accurate records and to-the-minute
                                updates, the PBS team is able to utilize its carefully selected resources and trusted
                                professional ties to the greatest advantage of each and every client.
                                All PBS associates are highly qualified and well reputed, and
                                hold each other to the company standard of excellence. Beyond their in-house
                                coordination, the PBS core team members are friends and neighbors
                                who've partnered on hundreds of projects and endeavors. Proactive Building Solutions has
                                honed the skills and built the relationships necessary to revolutionize the
                                industry.</p>
                        </div>
                        <div class="col-lg-3">
                            <div class="container center">
                                <img class="my-sm-5 mt-0 mb-5" src="{{asset('images/logo@2x.png')}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

{{--            <div class="section karbonopak my-0 parallax"--}}
{{--                 style="background-size: cover; background-image: url({{asset('images/services/management1.jpg')}}); padding: 100px 0;"--}}
{{--                 data-bottom-top="background-position:0px 300px;"--}}
{{--                 data-top-bottom="background-position:0px -300px;">--}}
{{--                <div class="heading-block center nobottomborder nobottommargin">--}}
{{--                    <h2>"Everything gets resolved."</h2>--}}
{{--                </div>--}}
{{--            </div>--}}


            {{--Team--}}
            <div class="content-wrap my-0 pb-0">

                <div class="container clearfix">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading-block center">
                                <h3>Our Team</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-4 bottommargin">

                            <div class="team opak-arkaplan text-center row">
                                <div class="team-image d-none pr-0 align-self-center col-4">
                                    <img class="rounded-circle  " src="{{asset('images/team/male.png')}}" alt="Jon">
                                </div>
                                <div class="team-desc pl-0 col-12">
                                    <div class="team-title"><h4>Jon Credendino</h4><span>Executive Director</span><br/></div>

                                    <a href="mailto:Jon@pbs.nyc"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-info"></i>
                                        <i class="icon-info"></i>
                                    </a>
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-body">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Jon Credendino</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Jon is a licensed General Contractor, Superintendent and Filing Representative specializing in real estate development and problem solving.</p>
                                                        <p>Using his experience in developing and relationships within the departments he ensures efficiency and promptness,</p>
                                                        <p class="nobottommargin">and he is with you every step of the way.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 bottommargin">

                            <div class="team opak-arkaplan text-center row">
                                <div class="d-none team-image pr-0 align-self-center col-4">
                                    <img class="rounded-circle" src="{{asset('images/team/male.png')}}" alt="Abdallah">
                                </div>
                                <div class="team-desc pl-0 col-12">
                                    <div class="team-title"><h4>Abdallah Elcherbini</h4><span>Registered Architect</span><br/></div>
                                    <a href="mailto:abdallah@pbs.nyc"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target=".Abdallah"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-info"></i>
                                        <i class="icon-info"></i>
                                    </a>
                                    <div class="modal fade Abdallah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-body">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Abdallah Elcherbini</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Abdallah has designed many projects in the industry.</p>
                                                        <p>He maximizes square inches for every property while going head to head with the departments on your behalf.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <div class="col-lg-4 bottommargin">

                            <div class="team opak-arkaplan text-center row">
                                <div class="team-image d-none pr-0 align-self-center col-4">
                                    <img class="rounded-circle" src="{{asset('images/team/male.png')}}" alt="Arthur">
                                </div>
                                <div class="team-desc pl-0 col-12">
                                    <div class="team-title"><h4>Arthur Estupinian</h4><span>Licensed Master Plumber</span><br/></div>

                                    <a href="mailto:arthur@pbs.nyc"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email"></i>
                                    </a>

                                    <a href="#" data-toggle="modal" data-target=".arthur"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-info"></i>
                                        <i class="icon-info"></i>
                                    </a>
                                    <div class="modal fade arthur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-body">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Arthur Estupinian</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Arthur is the owner of a third generation plumbing company with a remarkable 90 years in business.</p>
                                                        <p> His family helped create the plumbing industry while he has continued their legacy of quality workmanship and service.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row nobottommargin">
                        <div class="col-lg-4 bottommargin">

                            <div class="team opak-arkaplan text-center row">
                                <div class="team-image d-none pr-0 align-self-center col-4">
                                    <img class="rounded-circle" src="{{asset('images/team/male.png')}}" alt="Hal">
                                </div>
                                <div class="team-desc pl-0 col-12">
                                    <div class="team-title"><h4>Hal Ozkurt</h4><span>Licensed Master Electrician</span><br/>
                                    </div>
                                    <a href="mailto:Hal@pbs.nyc"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target=".hal"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-info"></i>
                                        <i class="icon-info"></i>
                                    </a>
                                    <div class="modal fade hal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-body">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Hal Ozkurt</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Hal has been known for his personal attention on every project.</p>
                                                        <p>He is a perfectionist at heart ensuring safety, complıance and excellence.</p>
                                                        <p>With Hal on the job no wires are crossed.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-lg-4 bottommargin">

                            <div class="team opak-arkaplan text-center row">
                                <div class="team-image d-none pr-0 align-self-center col-4">
                                    <img class="rounded-circle" src="{{asset('images/team/male.png')}}" alt="Alex">
                                </div>
                                <div class="team-desc pl-0 col-12">
                                    <div class="team-title"><h4>James Powers</h4><span>MEP Engineer</span><br/></div>
                                    <a href="mailto:james@pbs.nyc"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target=".james"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-info"></i>
                                        <i class="icon-info"></i>
                                    </a>
                                    <div class="modal fade james" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-body">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">James Powers</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>James takes pride in every design ensuring code compliance and energy efficiency.</p>
                                                        <p>He is known for travelling the world to investigate new technologies bringing your building to the next level.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 bottommargin">

                            <div class="team opak-arkaplan text-center row">
                                <div class="team-image pr-0 d-none align-self-center col-4">
                                    <img class="rounded-circle" src="{{asset('images/team/male.png')}}" alt="Glen">
                                </div>
                                <div class="team-desc pl-0 col-12">
                                    <div class="team-title"><h4>Glen Langer</h4><span>Structural Engineer</span><br/></div>
                                    <a href="mailto:Glen@pbs.nyc"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target=".glen"
                                       class="social-icon inline-block si-small si-light si-email3">
                                        <i class="icon-info"></i>
                                        <i class="icon-info"></i>
                                    </a>
                                    <div class="modal fade glen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-body">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Glen Langer</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Glen has been involved with over 1,200 filings in NYC making sure your building is structurally sound, code compliant and built to specifications</p>
                                                        <p>Glen maintains client satisfaction with personal attention and consistent work ethic.</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
