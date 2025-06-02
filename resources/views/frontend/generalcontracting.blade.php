@extends('frontend.master')

@php($pageTitle ='General Contracting')

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

			<div class="section karbonopak">
				<div class="container clearfix">
					<div class="row">
						<div class="col-lg-2 my-sm-5 mt-0 mb-5">
							<div class="container center">
								<img class="my-sm-5 mt-0 mb-5" src="{{asset("images/logos/JCCM.png")}}">
							</div>
						</div>
						<div class="col-lg-8 center">
							<blockquote class="quote p-1 nomargin">
								<br/><br/>
								<span>In addition to its vast network, PBS is proud to be partnered with JC Consulting & Management<a target="_blank"
								                                                                                                      href="https://jccmanagement.com/">
                                        JC Consulting&Management</a>.
                                </span>
								<br/>
								<br/>
								<span>
                                JCCM is a New York City-based General Contractor, Construction and Development Management
                                    firm specializing in complex and diverse projects. JCCM has been involved in over 2.5MM
                                    square feet of ground-up development projects that consistently exceed industry standards.
                                    With extensive knowledge and dedication to the highest quality outcomes, JCCM is able to deliver
                                    projects on schedule and on budget, an essential function of the PBS brand.

                                </span>

							</blockquote>
							<blockquote class="quote blockquote-reverse nobottommargin">

							</blockquote>
						</div>
						<div class="col-lg-2 my-sm-5 mt-0 mb-5">
							<div class="container center">
								<img class="my-sm-5 mt-0 mb-5" src="{{asset('images/logo@2x.png')}}">
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="section karbonopak">
				<div class="container clearfix">
					<div class="row">
						<div class="col-lg-2 my-sm-5 mt-0 mb-0">
							<div class="container center">
								<img class="my-sm-5 mt-0 mb-0" src="{{asset("images/logos/titanlogokucuk.png")}}">
							</div>
						</div>
						<div class="col-lg-8 center">
							<div class="my-sm-5 mt-0 mb-0">
								<blockquote class="quote p-1 nomargin">
									<br/><br/>

									TITAN is a premium design + build contractor based in New York City. Established in 2011,
									TITAN has quickly distinguished themselves as a contractor of choice among clients and architects who expect perfection.
									TITAN has a well-earned reputation for integrity and transparency at every stage of the building process,
									and they work hard to create lasting and productive relationships with clients and design professionals.
									TITAN specializes in building unique, innovative, and high-impact design projects and their team is passionate about
									creating and enduring a sustainable impact.

									</span>

								</blockquote>
								<blockquote class="quote blockquote-reverse nobottommargin"></blockquote>
							</div>
						</div>
						<div class="col-lg-2 my-sm-5 mt-0 mb-5">
							<div class="container center">
								<img class="my-sm-5 mt-0 mb-5" src="{{asset('images/logo@2x.png')}}">
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
