@extends('portal.master')

@section('title', 'View Mailing')
@section('plugins.Datatables', true)

@section('content_header')
	@if (Session::has('success'))
		<div class="alert alert-success" role="alert">
			<strong>Success:</strong> {!! Session::get('success') !!}
		</div>
	@endif
@stop
@section('css')
	<style type="text/css">

        hr.half-width {
            width: 50%;
            margin: 0 auto;
            color: white;
            background-color: white;
            border-color: white;
        }

        h2.hasan {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        .s1 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9.5pt;
        }

        h4.hasan {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 9.5pt;
        }

        .s2 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 11pt;
        }

        .s3 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 9.5pt;
        }

        .s4 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9.5pt;
        }

        .s5 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 11pt;
        }

        .s6 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            font-size: 11pt;
        }

        .s7 {
            color: black;
            font-family: Wingdings;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        .s8 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        .s9 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        .s10 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        .s12 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9.5pt;
        }

        .s31 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            font-size: 9.5pt;
        }

        p.hasan {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: underline;
            font-size: 9.5pt;
            margin: 0pt;
        }

        .s13 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }


        li.hasan {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
        }

        #l1 > li:before {
            content: " ";
            color: black;
            font-family: Wingdings;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9.5pt;
        }
	</style>

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<li class="nav-item">
							<a class="nav-link active" href="#firesafety"
							   data-toggle="tab">
								<i class="fas fa-fw fa-clipboard-list"></i>
								Fire Safety
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#windowguard" data-toggle="tab">
								<i
										class="fas fa-fw fa-folder-plus"></i>
								Window Guards
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#lead" data-toggle="tab">
								<i
										class="fas fa-fw fa-file-contract"></i>
								Lead Poisining
							</a>
						</li>
					</ul>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<div class="active tab-pane" id="firesafety">
							<div class="card bg-light">
								<div class="card-header hover text-muted border-bottom-0" aria-expanded="false">
									<i class="fas fa-plus-circle"></i>
									<b>FIRE SAFETY PLAN</b>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<div id="firesafetyprint" class="card-body pt-0">
									<h1 style="color: black;font-family:'Times New Roman', serif; font-style: normal; font-weight: bold;
                                text-decoration: none; font-size: 14pt;padding-top: 3pt;text-indent: 0pt;text-align: center;">
										FIRE SAFETY PLAN</h1>
									<h2 class="hasan" style="text-indent: 0pt;text-align: center;">PART I -- BUILDING
									                                                               INFORMATION SECTION</h2>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<table width="100%">
										<tr>
											<td width="15%"><p class="s1"
											                   style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													BUILDING<br/>ADDRESS</p></td>
											<td><p class="s1"
											       style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													<u>: {{ $hpdAnnualMailing->property->full_address }}</u></p></td>
										</tr>
									</table>
									<h4 class="hasan" style="padding-top: 4pt;text-indent: 0pt;text-align: left;">
										BUILDING
										OWNER/REPRESENTATIVE<span class="s1">:</span></h4>
									<table width="100%">
										<tr>
											<td width="15%"><p class="s1"
											                   style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													Name</p></td>
											<td><p class="s1"
											       style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													<u>: {{ $hpdAnnualMailing->owner_name }}</u></p></td>
										</tr>
										<tr>
											<td width="15%"><p class="s1"
											                   style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													Address</p></td>
											<td><p class="s1"
											       style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													<u>: {{ $hpdAnnualMailing->owner_address }}</u></p></td>
										</tr>
										<tr>
											<td width="15%"><p class="s1"
											                   style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													Telephone</p></td>
											<td><p class="s1"
											       style="text-indent: 0pt;line-height: 11pt;text-align: left;">
													<u>: {{ $hpdAnnualMailing->owner_phone }}</u></p></td>
										</tr>
									</table>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<p class="s3"
									   style="padding-left: 2pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
										BUILDING INFORMATION<span class="s4">:</span></p>
									<table cellspacing="0" style="border-collapse:collapse;margin-left:5.5pt">
										<tr style="height:37pt">
											<td style="width:142pt">
												<p class="s5"
												   style="padding-top: 8pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">
													Year of Construction:</p></td>
											<td style="width:126pt"><p class="s6"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">
													<span class="s9">{{ $hpdAnnualMailing->construction_year }} </span>
													<br/></p>
												<p class="s6"
												   style="padding-left: 4pt;text-indent: 0pt;text-align: left;"></p>
											</td>
											<td style="width:183pt"/>
										</tr>
										<tr style="height:23pt">
											<td style="width:142pt"><p class="s5"
											                           style="padding-top: 5pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">
													Type of Construction:</p></td>
											<td style="width:126pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->construction_type=="Combustible")
														&#9745;@else@endif<span class="s8"> </span><span class="s9">Combustible</span>
												</p></td>
											<td style="width:183pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->construction_type=="Non-Combustible")
														&#9745;@else@endif<span class="s8"> </span><span class="s9">Non-Combustible</span>
												</p>
											</td>
										</tr>
										<tr style="height:22pt">
											<td style="width:142pt"><p class="s5"
											                           style="padding-top: 4pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">
													Number of Floors:</p></td>
											<td style="width:126pt"><p class="s6"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">
													<span class="s9">{{ $hpdAnnualMailing->floor_number_above_ground }} Above ground</span>
												</p></td>
											<td style="width:183pt"><p class="s10"
											                           style="padding-top: 4pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">
													<span class="s9">{{ $hpdAnnualMailing->floor_number_below_ground }} Below ground</span>
												</p></td>
										</tr>
										<tr style="height:23pt">
											<td style="width:142pt"><p class="s5"
											                           style="padding-top: 5pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">
													Sprinkler System:</p></td>
											<td style="width:126pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->sprinkler_system=="Yes")
														&#9745;@else@endif<span class="s8"> </span><span
															class="s9">Yes</span></p></td>
											<td style="width:183pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->sprinkler_system=="No")
														&#9745;@else@endif<span class="s8"> </span><span
															class="s9">No</span></p></td>
										</tr>
										<tr style="height:18pt">
											<td style="width:142pt"><p class="s5"
											                           style="padding-top: 5pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">
													Sprinkler System Coverage:</p></td>
											<td style="width:126pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->sprinkler_coverage==="Entire Building")
														&#9745;@else@endif<span class="s8"> </span><span class="s9">Entire Building</span>
												</p>
											</td>
											<td style="width:183pt">
												<p class="s9"
												   style="padding-top: 4pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">
                                                <span class="s7">@if($hpdAnnualMailing->sprinkler_coverage=="Entire Building")
		                                                @else&#9745;@endif</span><span class="s8"> </span>Partial
													<i>(complete
													   all
													   that apply
													</i>
                                                                                                           )<b>:</b></p>
											</td>
										</tr>
									</table>
									<table width="100%" style="margin-left: 5em">
										<tr>
											<td width="5%"><p class="s12"
											                  style="display: inline;">@if($hpdAnnualMailing->sc_dwelling_units)
														&#9745;@else@endif</p></td>
											<td width="15%"><p class="s12" style="display: inline;">Dwelling Units:</p>
											</td>
											<td><p class="s12"
											       style="display: inline;">{{$hpdAnnualMailing->sc_dwelling_units}}</p>
											</td>
										</tr>
										<tr>
											<td><p class="s12"
											       style="display: inline;">@if($hpdAnnualMailing->sc_hallways)
														&#9745;@else@endif</p></td>
											<td><p class="s12" style="display: inline;">Hallways:</p></td>
											<td><p class="s12"
											       style="display: inline;">{{$hpdAnnualMailing->sc_hallways}}</p>
											</td>
										</tr>
										<tr>
											<td><p class="s12"
											       style="display: inline;">@if($hpdAnnualMailing->sc_stairwells)
														&#9745;@else@endif</p></td>
											<td><p class="s12" style="display: inline;">Stairwells:</p></td>
											<td><p class="s12"
											       style="display: inline;">{{$hpdAnnualMailing->sc_stairwells}}</p>
											</td>
										</tr>
										<tr>
											<td><p class="s12"
											       style="display: inline;">@if($hpdAnnualMailing->sc_chute)
														&#9745;@else@endif</p></td>
											<td><p class="s12" style="display: inline;">Compactor Chute:</p></td>
											<td><p class="s12"
											       style="display: inline;">{{$hpdAnnualMailing->sc_chute}}</p>
											</td>
										</tr>
										<tr>
											<td><p class="s12"
											       style="display: inline;">@if($hpdAnnualMailing->sc_other)
														&#9745;@else@endif</p></td>
											<td><p class="s12" style="display: inline;">Other:</p></td>
											<td><p class="s12"
											       style="display: inline;">{{$hpdAnnualMailing->sc_other}}</p>
											</td>
										</tr>

									</table>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<table width="100%">
										<tr>
											<td width="20%">
												<span class="s2">Fire Alarm</span>
											</td>
											<td width="15%">
												<p class="s12"
												   style="display: inline;">
													@if($hpdAnnualMailing->alarm_status=="Yes")
														&#9745;@else@endif <span class="s13">Yes </span>
												</p>
											</td>
											<td width="40%">
												<p class="s12"
												   style="display: inline;">
													@if($hpdAnnualMailing->alarm_status=="Transmits Alarm to Fire Dept/Fire Alarm Co")
														&#9745;@else@endif <span class="s13">Transmits Alarm to Fire Dept/Fire Alarm Co  </span>
												</p>
											</td>
											<td>
												<p class="s12"
												   style="display: inline;">
													@if($hpdAnnualMailing->alarm_status=="No")
														&#9745;@else@endif <span class="s13">No </span>
												</p>
											</td>
										</tr>
									</table>
									<table width="100%" style="margin-left: 6em; margin-top: 1em">
										<tr>
											<td width="30%"><span class="s13">Location of Manual Pull Stations: </span>
											</td>
											<td><span class="s13">{{ $hpdAnnualMailing->manual_pull_station }} </span>
											</td>
										</tr>
									</table>
									<table class="mt-5" width="100%">
										<tr>
											<td width="20%">
												<span class="s2">Public Address System: </span>
											</td>
											<td>
												<p class="s12"
												   style="display: inline;">
													@if($hpdAnnualMailing->pa_status=="Yes")
														&#9745;@else@endif <span class="s13">Yes </span>
												</p>
											</td>
											<td>
												<p class="s12"
												   style="display: inline;">
													@if($hpdAnnualMailing->pa_status=="No")
														&#9745;@else@endif <span class="s13">No </span>
												</p>
											</td>
										</tr>
									</table>
									<table width="100%" style="margin-left: 6em; margin-top: 1em">
										<tr style="height:23pt">
											<td style="width:142pt"><p class="s5"
											                           style="padding-top: 5pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">
													Location of Speakers:</p></td>
											<td style="width:126pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->speaker_location=="Stairwell")
														&#9745;@else@endif<span class="s8"> </span><span
															class="s9">Stairwell</span></p></td>
											<td style="width:126pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->speaker_location=="Hallway")
														&#9745;@else@endif<span class="s8"> </span><span
															class="s9">Hallway</span></p></td>
											<td style="width:126pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->speaker_location=="Dwelling Unit")
														&#9745;@else@endif<span class="s8"> </span><span
															class="s9">Dwelling Unit</span></p></td>
											<td style="width:183pt"><p class="s7"
											                           style="padding-top: 4pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">@if($hpdAnnualMailing->speaker_location=="Other")
														&#9745;@else@endif<span class="s8"> </span><span
															class="s9">Other:</span></p></td>
										</tr>
									</table>

									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<p class="s2"
									   style="padding-top: 9pt;padding-left: 8pt;text-indent: 0pt;text-align: left;">
										Means
										of Egress <span class="s12">(e.g., Unenclosed/Enclosed Interior Stairs, Exterior Stairs, Fire Tower Stairs, Fire Escapes, Exits)</span><span
												class="s13">:</span></p>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<table id="example" class="display text-center" border="solid 1px !important;"
									       cellspacing="0"
									       width="100%">
										<thead>
										<tr>
											<th><p class="s4"
											       style="padding-left: 20pt;text-indent: 0pt;text-align: left;">#</p>
											</th>
											<th><p class="s4"
											       style="padding-left: 20pt;text-indent: 0pt;text-align: left;">Type of
											                                                                     Egress</p></th>
											<th><p class="s4"
											       style="padding-left: 20pt;text-indent: 0pt;text-align: left;">
													Identification</p></th>
											<th><p class="s4"
											       style="padding-left: 20pt;text-indent: 0pt;text-align: left;">
													Location</p></th>
											<th><p class="s4"
											       style="padding-left: 20pt;text-indent: 0pt;text-align: left;">Leads
											                                                                     to</p></th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<p class="s2" style="padding-left: 8pt;text-indent: 0pt;text-align: left;">Other
									                                                                           Information: <u> {{ $hpdAnnualMailing->other_information }} </u></p>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<p style="text-indent: 0pt;text-align: left;"><br/></p>
									<p class="s1" style="padding-left: 8pt;text-indent: 0pt;text-align: left;">DATE
									                                                                           PREPARED: <span
												class="s12"><u>{{ $hpdAnnualMailing->date_prepared }}</u></span>
									</p>
								</div>
								<div class="card-footer">
									<button id="print" onclick="printContent('firesafetyprint');">Print</button>
								</div>
							</div>

						</div>
						<input value="{{$hpdAnnualMailing->egress}}" type="hidden" id="egress"
						       name="egress">

						<div class="tab-pane" id="windowguard">
							<div class="card-header p-2">
								<ul class="nav nav-pills">
									<li class="nav-item">
										<a class="nav-link active" href="#apendixa"
										   data-toggle="tab">
											<i class="fas fa-plus-circle"></i>
											Window Guards Appendix A
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#apendixb"
										   data-toggle="tab">
											<i class="fas fa-plus-circle"></i>
											Window Guard sAppendix B
										</a>
									</li>
								</ul>
							</div>
							<div class="card-body">
								<div class="tab-content">
									<div class="active tab-pane" id="apendixa">
										<div class="card card-secondary">
											<div class="card-header">
												<h3 class="card-title">Appendix A</h3>
											</div>
											<!-- /.card-header -->
											<div id="apendixaprint" class="card-body">
												<div class="tab-container px-3">
													<div style="border: solid 1px black" class="row">
														<div class="col-2">
															<img class="mt-1 pt-1"
															     src="{{asset('images/hpdmailings/nychealth.png')}}">
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p class="s1"
															   style="padding-top: 7pt;padding-left: 0pt;text-indent: 0pt;text-align: left;">
																New York City <br>Department of Health <br/>and
																Mental
																Hygiene</p>
														</div>
														<div class="col-10">

															<p class="s2"
															   style="padding-top: 3pt;text-indent: 0pt;text-align: right;">
																Appendix A</p>
															<h1 style="padding-top: 1pt;text-indent: 0pt;line-height: 33pt;text-align: center;  color: #0054A4; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold;  text-decoration: none; font-size: 30pt;">
																WINDOW GUARDS REQUIRED</h1>
															<h3 style="text-indent: 0pt;line-height: 15pt;text-align: center; color: #0054A4; font-family: Tahoma, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 14pt;">
																Lease Notice to Tenant</h3>
															<p class="s5"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																You are required by law to have window guards
																installed in all windows if a child
																10 years of age or younger lives in your
																apartment.</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																Your landlord is required by law to install window
																guards in your apartment:
																if a child 10 years of age or younger lives in your
																apartment,</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																OR</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																if you ask him to install window guards at any time
																(you need not give a reason).</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																It is a violation of law to refuse, interfere with
																installation, or remove window guards where
																required.</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															{{--                                                                {!! Form::open(['route' => 'hpdmailing.store','files'=>'true']) !!}--}}
															<h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
																CHECK ONE:</h2>
															<div style="padding-top: 14pt;padding-left: 37pt;text-indent: 0pt;text-align: left;"
															     class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_a_check=="CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT") checked @endif>
																<label style="color: black"
																       class="custom-control-label s5"
																       for="defaultUnchecked">CHILDREN 10 YEARS OF
																                              AGE OR
																	<br/>YOUNGER LIVE IN MY APARTMENT
																</label>
															</div>
															<div style="padding-top: 14pt;padding-left: 37pt;text-indent: 0pt;text-align: left;"
															     class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_a_check=="NO CHILDREN 10 YEARS OF AGE OR YOUNGER LIVE IN MY APARTMENT") checked @endif>
																<label style="color: black"
																       class="custom-control-label s5"
																       for="defaultUnchecked">NO CHILDREN 10 YEARS
																                              OF AGE OR
																	<br/>YOUNGER LIVE IN MY APARTMENT
																</label>
															</div>
															<div style="padding-top: 14pt;padding-left: 37pt;text-indent: 0pt;text-align: left;"
															     class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_a_check=="I WANT WINDOW GUARDS EVEN THOUGH I HAVE NO CHILDREN 10 YEARS OF AGE OR YOUNGER") checked @endif>
																<label style="color: black"
																       class="custom-control-label s5"
																       for="defaultUnchecked">I WANT WINDOW GUARDS
																                              EVEN THOUGH
																	<br/>I HAVE NO CHILDREN 10 YEARS OF AGE
																	<br/>OR YOUNGER
																</label>
															</div>
															<p style="text-indent: 0pt;text-align: left;">
																<br/></p>
															<p class="s4"
															   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
															<p class="s4">
																<b>@if($hpdAnnualMailing->tenant_name) {{$hpdAnnualMailing->tenant_name}} @else
																		N/A @endif</b></p>
															<div style="border-top: 1px solid">Tenant (Print)</div>
															</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p class="s4"
															   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
															<div class="row">
																<div class="col-9 text-left"></div>
																<div class="col-3"> {{now()}}</div>
															</div>
															<div class="row" style="border-top: 1px solid">
																<div class="col-9 text-left"> Tenant’s Signature
																</div>
																<div class="col-3">
																	Date
																</div>
															</div>
															</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p class="s4"
															   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
															<div class="row">
																<div class="col-9 text-left">
																	<b> @if($hpdAnnualMailing->tenant_address) {{$hpdAnnualMailing->tenant_address}} @else
																			N/A @endif</b></div>
																<div class="col-3">
																	<b> @if($hpdAnnualMailing->apartment_number) {{$hpdAnnualMailing->apartment_number}} @else
																			N/A @endif  </b>
																</div>
															</div>
															<div class="row" style="border-top: 1px solid">
																<div class="col-9 text-left"> Tenant’s Address</div>
																<div class="col-3">
																	Apt No.
																</div>
															</div>
															</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
														</div>
														<div class="col-12">
															<h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif;
                                                                    font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
																RETURN THIS FORM TO:</h2>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p>
																		<b> @if($hpdAnnualMailing->owner_name) {{$hpdAnnualMailing->owner_name}} @else
																				N/A @endif</b></p>
																</div>
																<div class="col-3">
																</div>
															</div>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p style="border-top: 1px solid black">
																		Owner/Manager</p>
																</div>
																<div class="col-3">
																</div>
															</div>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p><b>
																			@if($hpdAnnualMailing->owner_address) {{$hpdAnnualMailing->owner_address}} @else
																				N/A @endif
																		</b></p>
																</div>
																<div class="col-3">
																</div>
															</div>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p style="border-top: 1px solid black">
																		Owner/Manager’s Address
																	</p>
																</div>
																<div class="col-3">
																</div>
															</div>
															{{--                                                                <p class="s4"--}}
															{{--                                                                   style="padding-left: 16pt;text-indent: 0pt;text-align: left;">--}}
															{{--                                                                    Owner/Manager’s Address</p>--}}
															<p style="padding-top: 0pt;padding-left: 158pt;text-indent: 0pt;text-align: center;">
																<i><b>For Further Information call 311 for <BR/>Window
																      Falls
																      Prevention</b></i>
															</p>
														</div>
													</div>
													<p class="s1"
													   style="padding-top: 5pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
														<i>WF-013 (Rev. 11/2018)</i>
													</p>
												</div>

											</div>
											<div class="card-footer">
												<button id="print" onclick="printContent('apendixaprint');">Print
												</button>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="apendixb">
										<div class="card card-secondary">
											<div class="card-header">
												<h3 class="card-title">Appendix B</h3>
											</div>
											<!-- /.card-header -->
											<div id="apendixbprint" class="card-body">
												<div class="tab-container px-3">
													<div style="border: solid 1px black" class="row">
														<div class="col-2">
															<img class="mt-1 pt-1"
															     src="{{asset('images/hpdmailings/nychealth.png')}}">
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p class="s1"
															   style="padding-top: 7pt;padding-left: 0pt;text-indent: 0pt;text-align: left;">
																New York City <br>Department of Health <br/>and
																Mental
																Hygiene</p>
														</div>
														<div class="col-10">

															<p class="s2"
															   style="padding-top: 3pt;text-indent: 0pt;text-align: right;">
																Appendix B</p>
															<h1 style="padding-top: 1pt;text-indent: 0pt;line-height: 33pt;text-align: center;  color: #0054A4; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-style: normal; font-weight: bold;  text-decoration: none; font-size: 30pt;">
																WINDOW GUARDS REQUIRED</h1>
															<h3 style="text-indent: 0pt;line-height: 15pt;text-align: center; color: #0054A4; font-family: Tahoma, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 14pt;">
																Lease Notice to Tenant</h3>
															<p class="s5"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																You are required by law to have window guards
																installed in all windows if a child
																10 years of age or younger lives in your
																apartment.</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																Your landlord is required by law to install window
																guards in your apartment:
																if a child 10 years of age or younger lives in your
																apartment,</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																OR</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																if you ask him to install window guards at any time
																(you need not give a reason).</p>
															<p class="s3"
															   style="padding-top: 9pt;padding-left: 16pt;text-indent: 0pt;text-align: left;">
																It is a violation of law to refuse, interfere with
																installation, or remove window guards
																where required, or to fail to complete and return
																this form to your landlord. If this
																form is not returned promptly an inspection by the
																landlord will follow.</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															{{--                                                                {!! Form::open(['route' => 'hpdmailing.store','files'=>'true']) !!}--}}
															<h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
																CHECK WHICHEVER APPLY:</h2>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_b_under_ten) checked @endif>
																<label class="custom-control-label"
																       for="defaultUnchecked">CHILDREN 10 YEARS OF AGE
																                              OR YOUNGER LIVE IN MY APARTMENT
																</label>
															</div>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_b_not_under_ten) checked @endif>
																<label class="custom-control-label"
																       for="defaultUnchecked">NO CHILDREN 10 YEARS OF
																                              AGE OR YOUNGER LIVE IN MY APARTMENT
																</label>
															</div>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_b_installed) checked @endif>
																<label class="custom-control-label"
																       for="defaultUnchecked">WINDOW GUARDS ARE
																                              INSTALLED IN ALL WINDOWS*
																</label>
															</div>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_b_not_installed) checked @endif>
																<label class="custom-control-label"
																       for="defaultUnchecked">WINDOW GUARDS ARE NOT
																                              INSTALLED IN ALL WINDOWS*
																</label>
															</div>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_b_i_want_guard) checked @endif>
																<label class="custom-control-label"
																       for="defaultUnchecked">I WANT WINDOW GUARDS EVEN
																                              THOUGH I HAVE NO CHILDREN 10 YEARS OF AGE OR
																                              YOUNGER
																</label>
															</div>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_b_need_repair) checked @endif>
																<label class="custom-control-label"
																       for="defaultUnchecked">WINDOW GUARDS NEED
																                              MAINTENANCE OR REPAIR
																</label>
															</div>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input"
																       id="defaultUnchecked" disabled=""
																       @if($hpdAnnualMailing->wg_ap_b_not_need_repair) checked @endif>
																<label class="custom-control-label"
																       for="defaultUnchecked">WINDOW GUARDS DO NOT NEED
																                              MAINTENANCE OR REPAIR
																</label>
															</div>
															<p style="text-indent: 0pt;text-align: left;">
																<br/></p>
															<p class="s4"
															   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
															<p class="s4">
																<b>@if($hpdAnnualMailing->tenant_name) {{$hpdAnnualMailing->tenant_name}} @else
																		N/A @endif</b></p>
															<div style="border-top: 1px solid">Tenant (Print)</div>
															</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p class="s4"
															   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
															<div class="row">
																<div class="col-9 text-left"></div>
																<div class="col-3"> {{now()}}</div>
															</div>
															<div class="row" style="border-top: 1px solid">
																<div class="col-9 text-left"> Tenant’s Signature
																</div>
																<div class="col-3">
																	Date
																</div>
															</div>
															</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p class="s4"
															   style="padding-left: 137pt;text-indent: 0pt;text-align: left;">
															<div class="row">
																<div class="col-9 text-left">
																	<b> @if($hpdAnnualMailing->tenant_address) {{$hpdAnnualMailing->tenant_address}} @else
																			N/A @endif</b></div>
																<div class="col-3">
																	<b> @if($hpdAnnualMailing->apartment_number) {{$hpdAnnualMailing->apartment_number}} @else
																			N/A @endif  </b>
																</div>
															</div>
															<div class="row" style="border-top: 1px solid">
																<div class="col-9 text-left"> Tenant’s Address</div>
																<div class="col-3">
																	Apt No.
																</div>
															</div>
															</p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
														</div>
														<div class="col-12">
															<h2 style="padding-left: 16pt;text-indent: 0pt;text-align: left; color: #0054A4; font-family: Arial, sans-serif;
                                                                    font-style: normal; font-weight: bold; text-decoration: none; font-size: 18pt;">
																RETURN THIS FORM TO:</h2>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p>
																		<b> @if($hpdAnnualMailing->owner_name) {{$hpdAnnualMailing->owner_name}} @else
																				N/A @endif</b></p>
																</div>
																<div class="col-3">
																</div>
															</div>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p style="border-top: 1px solid black">
																		Owner/Manager</p>
																</div>
																<div class="col-3">
																</div>
															</div>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<p style="text-indent: 0pt;text-align: left;"><br/></p>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p><b>
																			@if($hpdAnnualMailing->owner_address) {{$hpdAnnualMailing->owner_address}} @else
																				N/A @endif
																		</b></p>
																</div>
																<div class="col-3">
																</div>
															</div>
															<div class="row">
																<div class="col-9" style="padding-left: 16pt;">
																	<p style="border-top: 1px solid black">
																		Owner/Manager’s Address
																	</p>
																</div>
																<div class="col-3">
																</div>
															</div>
															{{--                                                                <p class="s4"--}}
															{{--                                                                   style="padding-left: 16pt;text-indent: 0pt;text-align: left;">--}}
															{{--                                                                    Owner/Manager’s Address</p>--}}
															<p class="s5"
															   style="padding-top: 5pt;padding-left: 158pt;text-indent: 0pt;text-align: center; color: #0054A4;">
																<i>Deadline for return: February 15, 2020</i>
															</p>
															<p style="padding-top: 0pt;padding-left: 158pt;text-indent: 0pt;text-align: center;">
																<i><b>For Further Information call 311 for Window
																      Falls
																      Prevention</b></i>
															</p>
															<p>*Except windows giving access to fire escapes or
															   windows
															   on
															   the first floor that are required means of egress
															   from
															   the
															   dwelling unit.</p>
														</div>
													</div>
													<p class="s1"
													   style="padding-top: 2pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
														<i>(Rev. 11/2018)</i>
													</p>
													{{--                                                        <div class="col-12">--}}
													{{--                                                            <div class="form-group">--}}
													{{--                                                                <div class="row">--}}
													{{--                                                                    <div class="col-2">--}}
													{{--                                                                        {!! Form::submit('Create New Mailing', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}--}}
													{{--                                                                    </div>--}}
													{{--                                                                    <div class="col-2">--}}
													{{--                                                                        {{ Form::reset('Reset',['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) }}--}}
													{{--                                                                    </div>--}}
													{{--                                                                </div>--}}
													{{--                                                            </div>--}}
													{{--                                                        </div>--}}
													{{--                                                        {!! Form::close() !!}--}}
												</div>

											</div>
											<div class="card-footer">
												<button id="print" onclick="printContent('apendixbprint');">Print
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>

						<div class="tab-pane" id="lead">
							<div class="card card-secondary">
								<div class="card-header">
									<h3 class="card-title">PROTECT YOUR CHILD FROM LEAD POISONING AND WINDOW
									                       FALLS</h3>
								</div>
								<!-- /.card-header -->
								<div id="leadprint" class="card-body">
									<div class="tab-container px-3">
										<table width="100%" class="col-12">
											<tbody style="width: 100%">
											<tr>
												<td>
													<img alt="image" height="59"
													     src="{{asset('images/hpdmailings/nychealth.png')}}"
													     width="125"/>
												</td>
												<td><p class="s1 pt-0"
												       style="padding-top: 4pt;padding-left: 207pt;text-indent: 0pt;text-align: left;">
														FOR USE AS OF JANUARY 1, 2020</p></td>
												<td><p class="s2"
												       style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
														To: <span class="s1">Tenant</span></p>
													<p class="s2"
													   style="padding-top: 2pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
														From: <span class="s1">Landlord/Building Owner</span></p>
													<p class="s2"
													   style="padding-top: 2pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
														Date: <span class="s1"> {{now()}}   </span></p></td>
											</tr>
											</tbody>
										</table>

										<h1 style="padding-top: 4pt;text-indent: 0pt;text-align: center; color: #002a80;
                                            font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px; ">
											PROTECT
											YOUR CHILD FROM LEAD POISONING AND WINDOW FALLS</h1>
										<p style="padding-left: 2pt;text-indent: 0pt;text-align: center;"><span
													class="s3"
													style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;display: table;margin: 0px auto 0px auto;padding: 5px; "> Annual Notice </span>
										</p>
										<p class="s4"
										   style="padding-top: 8pt;padding-left: 14pt;text-indent: 0pt;text-align: center;">
											New York City law requires that tenants living in buildings with three
											or more apartments complete this
											form and return it to their landlord before <b>February 15</b>, each
											year. <b>If you do not return this form, your landlord is required to
											         visit your apartment to determine if a child resides in
											         your apartment.</b></p>
										{{--                                            Mavi Alan--}}
										<div class="row"
										     style="background-color: #b6d0ed!important; border-radius: 12px">
											<div class="col-6 p-0">
												<div class="col-12 mt-2 mb-1">

													<p style="padding-left: 2pt;text-indent: 0pt;text-align: center;">
                                                        <span class="s3"
                                                              style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                                                                 font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;
                                                                 display: table;margin: 0px auto 0px -5px; padding:5px; text-decoration-line: none!important; ">Peeling Lead Paint
                                                        </span>
													</p>
													<p class="s6"
													   style="padding-top: 6pt;padding-left: 18pt;text-indent: 0pt;text-align: left; color: darkblue">
														<b>By law</b><span
																class="p">, your landlord is required to inspect your apartment for peeling paint and other lead paint hazards at least once a year if a child 5 years or younger lives with you or routinely spends 10 or more hours each week in your apartment.</span>
													</p>
													<ul class="l1">
														<li style="padding-top: 9pt;padding-left: 5pt;text-align: justify;">
															<p class="s6"
															   style="display: contents!important;; color: darkblue">You
															                                                         must notify your
															                                                         landlord in
															                                                         writing
															                                                         if a child 5 years or younger comes to
															                                                         live with you during the year or routinely spends 10 or
															                                                         more
															                                                         hours each week in your apartment.</p></li>
														<li style="padding-top: 4pt;padding-left: 5pt;text-align: left;">
															<p class="s6"
															   style="display: contents!important; color: darkblue">If a
															                                                        child 5 years or
															                                                        younger
															                                                        lives with
															                                                        you or routinely spends 10 or more hours
															                                                        each week in your apartment, your landlord must inspect
															                                                        your
															                                                        apartment and provide you with the results of these
															                                                        paint
															                                                        inspections.</p></li>
														<li class="s6"
														    style="padding-top: 4pt;padding-left: 5pt;text-align: left;">
															<p style="display: contents!important;; color: darkblue">
																Your landlord must use safe work
																practices to repair all peeling paint and other
																lead paint hazards.</p></li>
														<li class="s6"
														    style="padding-top: 4pt;padding-left: 5pt;text-align: left;">
															<b style="display: contents!important; color: darkblue">Always
															                                                        report
															                                                        peeling
															                                                        paint
															                                                        to your landlord. Call 311 if your landlord
															                                                        does not respond.</b></li>

													</ul>
												</div>
											</div>
											<div class="col-6 p-0">
												<div class="col-12 mt-2 mb-1" style="border-left: solid 5px white">

													<p style="padding-left: 2pt;text-indent: 0pt;text-align: center;">
                                                        <span class="s3"
                                                              style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                                                                 font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;
                                                                 display: table;margin: 0px -5px 0px auto;padding: 5px; text-decoration-line: none!important; ">Window Guards
                                                        </span>
													</p>
													<p class="s6"
													   style="padding-top: 6pt;padding-left: 18pt;text-indent: 0pt;text-align: left; color: darkblue">
														<b>By law</b><span
																class="p">, your landlord is required to install window guards in all of your windows if a child 10 years or younger lives with you, OR if you request window guards (even if no children live with you).</span>
													</p>
													<ul id="l2">
														<li style="padding-top: 9pt;padding-left: 5pt;text-align: left;">
															<p class="s6" style="display: inline; color: darkblue"><b>It
															                                                          is against the law</b>
																<span
																		class="p">for you to interfere with installation, or remove window guards where they are required. Air conditioners in windows must be permanently installed.</span>
															</p></li>

														<li style="padding-top: 4pt;padding-left: 5pt;text-align: left;">
															<p class="s6" style="display: inline; color: darkblue">
																Window guards must be
																installed
																so there
																is no space greater than 4½ inches above
																or below the guard, on the side of the guard, or between
																the
																bars.</p></li>
														<li style="padding-top: 4pt;padding-left: 5pt;text-align: left;">
															<p class="s6" style="display: inline; color: darkblue">ONLY
															                                                       windows that
															                                                       open to fire
															                                                       escapes,
															                                                       and one window in each first floor
															                                                       apartment when there is a fire escape on the outside of
															                                                       the
															                                                       building, are legally exempt from this requirement.</p>
														</li>
													</ul>

												</div>
											</div>
											<div class="col-6 p-0">
												<hr class="half-width">
												<p class="s3"
												   style="text-decoration-line:none!important;padding-top: 6pt; padding-left: 19pt;text-indent: 1pt;line-height: 9pt;text-align: center; ">
													These notice and inspection requirements apply to buildings
													with
													three or more
													apartments built before 1960. They also apply to such
													buildings
													built between 1960 and 1978 if the landlord knows that lead
													paint is present.</p>
											</div>
											<div class="col-6 p-0">
												<hr class="half-width">
												<p class="s3"
												   style="text-decoration-line:none!important;padding-top: 6pt; padding-left: 56pt;text-indent: -20pt;line-height: 9pt;text-align: center;">
													These requirements apply to all buildings with three or more
													apartments,
													regardless of when they were
													built.</p>
											</div>
										</div>
										{{--                                            Mavi alan bitti--}}
										<h3 style="padding-top: 9pt;padding-bottom: 0pt;text-indent: 0pt;text-align: center;">
											<b>
												<i>Fill out and detach the bottom part of this form and return it to your
												   landlord.
												</i>
											</b></h3>
										<hr style="border-top: 2px dashed black">
										<div style="border: solid 2px black">
											<p class="s1"
											   style="padding-top: 11pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
												Please check all boxes that apply:</p>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled=""
												       @if($hpdAnnualMailing->lead_five_to_ten) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">A child 5
												                                                           years or younger lives in my apartment or routinely spends
												                                                           10 or more hours each week in my apartment.
												</label>
											</div>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled
												       @if($hpdAnnualMailing->wg_ap_b_under_ten) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">A child
												                                                           10 years or younger lives in my apartment and:
												</label>
											</div>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled
												       @if($hpdAnnualMailing->wg_ap_b_installed) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">Window
												                                                           guards are installed in all windows as required.
												</label>
											</div>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled
												       @if($hpdAnnualMailing->wg_ap_b_need_repair) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">Window
												                                                           guards need repair
												</label>
											</div>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled
												       @if($hpdAnnualMailing->wg_ap_b_not_installed) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">Window
												                                                           guards are NOT installed in all windows as required.
												</label>
											</div>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled
												       @if($hpdAnnualMailing->wg_ap_b_not_under_ten) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">No child
												                                                           10 years or younger lives in my apartment:
												</label>
											</div>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled
												       @if($hpdAnnualMailing->wg_ap_b_i_want_guard) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">I want
												                                                           window guards installed anyway.
												</label>
											</div>

											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
												       id="defaultUnchecked" disabled
												       @if($hpdAnnualMailing->wg_ap_b_need_repair) checked @endif>
												<label class="custom-control-label" for="defaultUnchecked">I have
												                                                           window guards, but they need repair.
												</label>
											</div>

											<p style="text-indent: 0pt;text-align: left;"><br/></p>
											<div>
												<table class="m-1" cellspacing="0" width="100%"
												       style="border-collapse:collapse;">
													<tr style="height:12pt!important;">
														<td style="width:139pt;">
															<p class="s31 mb-0"
															   style="text-indent: 0pt;text-align: left;">
																@if($hpdAnnualMailing->tenant_last_name) {{$hpdAnnualMailing->tenant_last_name}} @else
																	N/A @endif</p>
														</td>
														<td style="width:136pt;">
															<p class="s31 mb-0"
															   style="padding-left: 79pt;text-indent: 0pt;text-align: left;">
																@if($hpdAnnualMailing->tenant_first_name) {{$hpdAnnualMailing->tenant_first_name}} @else
																	N/A @endif</p>
														</td>
														<td style="width:49pt;"/>
														<td style="width:57pt;"/>
														<td>
															<p class="s31 mb-0"
															   style="padding-left: 23pt;text-indent: 0pt;text-align: left;">
																@if($hpdAnnualMailing->tenant_middle_name) {{$hpdAnnualMailing->tenant_middle_name}} @else
																	N/A @endif</p>
														</td>
													</tr>
													<tr style="height:35pt; border-bottom: solid transparent">
														<td style="width:139pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="text-indent: 0pt;text-align: left;">
																Last
																Name</p>
														</td>
														<td style="width:136pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="padding-left: 79pt;text-indent: 0pt;text-align: left;">
																First
																Name</p></td>
														<td style="width:49pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt"/>
														<td style="width:57pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt"/>
														<td style="width:140pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="padding-left: 23pt;text-indent: 0pt;text-align: left;">
																Middle
																Initial</p></td>
													</tr>
													<tr style="height:12pt; ">
														<td style="width:139pt;">
															<p class="s31 mb-0"
															   style="text-indent: 0pt;text-align: left;">
																@if($hpdAnnualMailing->property->stname) {{$hpdAnnualMailing->property->stname}} @else
																	N/A @endif
															</p></td>
														<td style="width:136pt;">
															<p class="s31 mb-0"
															   style="padding-left: 78pt;text-indent: 0pt;text-align: left;">
																@if($hpdAnnualMailing->apartment_number) {{$hpdAnnualMailing->apartment_number}} @else
																	N/A @endif
															</p>
														</td>
														<td style="width:49pt;">
															<p class="s31 mb-0"
															   style="padding-left: 12pt;text-indent: 0pt;text-align: left;">
																New York
															</p>
														</td>
														<td style="width:57pt;">
															<p class="s31 mb-0"
															   style="padding-left: 14pt;text-indent: 0pt;text-align: left;">
																@if($hpdAnnualMailing->property->boro) {{\App\Helpers\Helper::getBoroName($hpdAnnualMailing->property->boro)}} @else
																	N/A @endif
															</p>
														</td>
														<td style="width:140pt;">
															<p class="s31 mb-0"
															   style="padding-left: 21pt;text-indent: 0pt;text-align: left;">
																@if($hpdAnnualMailing->property->zipcode) {{$hpdAnnualMailing->property->zipcode}} @else
																	N/A @endif
															</p></td>
													</tr>
													<tr style="height:34pt; border-bottom: solid transparent">
														<td style="width:139pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="text-indent: 0pt;text-align: left;">
																Street
																Address</p></td>
														<td style="width:136pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="padding-left: 78pt;text-indent: 0pt;text-align: left;">
																Apt.#</p>
														</td>
														<td style="width:49pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="padding-left: 12pt;text-indent: 0pt;text-align: left;">
																City</p>
														</td>
														<td style="width:57pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="padding-left: 14pt;text-indent: 0pt;text-align: left;">
																State</p>
														</td>
														<td style="width:140pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
															<p class="s10"
															   style="padding-left: 21pt;text-indent: 0pt;text-align: left;">
																ZIP
																Code</p></td>
													</tr>
													<tr style="height:13pt; ">
														<td style="width:139pt;">
															<p class="s31"
															   style="text-indent: 0pt;line-height: 12pt;text-align: left;">
															</p></td>
														<td style="width:136pt;"/>
														<td style="width:49pt;">
															<p class="s31 mb-0"
															   style="padding-left: 15pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
																@if($hpdAnnualMailing->mail_send_date) {{$hpdAnnualMailing->mail_send_date->format('Y/m/d')}} @else
																	N/A @endif
															</p></td>
														<td style="width:57pt;"/>
														<td style="width:140pt;">
															<p class="s31 mb-0"
															   style="padding-left: 25pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
																@if($hpdAnnualMailing->tenant_phone) {{$hpdAnnualMailing->tenant_phone}} @else
																	N/A @endif
															</p></td>
													</tr>
													<tr style="height:13pt">
														<td style="width:139pt;border-top-style:solid;border-top-width:1pt">
															<p class="s10"
															   style="text-indent: 0pt;line-height: 12pt;text-align: left;">
																Signature</p></td>
														<td style="width:136pt;border-top-style:solid;border-top-width:1pt"/>
														<td style="width:49pt;border-top-style:solid;border-top-width:1pt">
															<p class="s10"
															   style="padding-left: 15pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
																Date</p></td>
														<td style="width:57pt;border-top-style:solid;border-top-width:1pt"/>
														<td style="width:140pt;border-top-style:solid;border-top-width:1pt">
															<p class="s10"
															   style="padding-left: 25pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
																Telephone Number</p></td>
													</tr>
												</table>
											</div>
										</div>
										<p style="text-indent: 0pt;text-align: left;"><br/></p>
										<p style="padding-left: 2pt;text-indent: 0pt;text-align: center;"><span
													class="s3"
													style="color: white; background-color: #00AEEF; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;display: table;margin: 0px auto 0px auto;padding: 5px; ">
                                                    Deadline for return: February 15, 2020</span>
										</p>
										<p class="s11" style="text-indent: 0pt;text-align: right;">Return form to:
										                                                           name and address of landlord or managing agent. Call 311 for more
										                                                           information about preventing lead poisoning and window
										                                                           falls.</p>
										<p class="s12" style="padding-top: 3pt;text-indent: 0pt;text-align: right;">
											Approved 10/1/2019</p>
										{{--                                            <div class="col-12">--}}
										{{--                                                <div class="form-group">--}}
										{{--                                                    <div class="row">--}}
										{{--                                                        <div class="col-2">--}}
										{{--                                                            {!! Form::submit('Create New Mailing', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}--}}
										{{--                                                        </div>--}}
										{{--                                                        <div class="col-2">--}}
										{{--                                                            {{ Form::reset('Reset',['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) }}--}}
										{{--                                                        </div>--}}
										{{--                                                    </div>--}}
										{{--                                                </div>--}}
										{{--                                            </div>--}}
									</div>

								</div>
								<div class="card-footer">

									<button id="print" onclick="printContent('leadprint');">Print</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="card col-12">
					<div class="card-header p-2">
						Options
					</div><!-- /.card-header -->
					<div class="card-body">
						<div>
							<div class="well">
								<dl class="dl-horizontal">
									<label>Status:</label>
									<i class="fas fa-fw @if($hpdAnnualMailing->status) fa-check-circle @else fa-times-circle @endif"></i>
								</dl>
								<dl class="dl-horizontal">
									<label>Created At:</label>
									<p>{{ $hpdAnnualMailing->created_at}}</p>
								</dl>
								<dl class="dl-horizontal">
									<label>Last Updated:</label>
									<p>{{ $hpdAnnualMailing->updated_at}}</p>
								</dl>
								<dl class="dl-horizontal">
									<label>Mailing Prepared and Sent:</label>
									<p>{{ $hpdAnnualMailing->mail_send_date}}</p>
								</dl>
								<hr>
								<div class="row">
									<div class="col-sm-6">
										{!! Html::linkRoute('hpdmailing.edit', 'Edit', array($hpdAnnualMailing->id), array('class' => 'btn btn-primary btn-block')) !!}
									</div>
									<div class="col-sm-6">
										{!! Form::open(['route' => ['hpdmailing.destroy', $hpdAnnualMailing->id], 'method' => 'DELETE']) !!}

										{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

										{!! Form::close() !!}
									</div>
								</div>

								<div class="row">
									<div class="col-md-12 mt-2">
										{{ Html::linkRoute('hpdmailing.index', '<< See All Mailings', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card col-12">
					<div class="card-header p-2">
						<i class="fas fa-file-upload"></i>
						<b> &emsp;Upload Document</b>
					</div>
					<div class="card-body ">
						<div class="card-tabs">
							<ul class="nav nav-tabs" id="documents" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="uploadfile-tab" data-toggle="pill"
									   href="#newfile" role="tab" aria-controls="newfile"
									   aria-selected="true">Upload File
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="myuploadedfiles-tab" data-toggle="pill"
									   href="#uploadedfiles" role="tab" aria-controls="uploadedfiles"
									   aria-selected="false">My Files ({{$hpdAnnualMailing->files->count()}}
									                         )
									</a>
								</li>
							</ul>
						</div>
						<div class="tab-content" id="filesContent">
							<div class="tab-pane fade active show" id="newfile" role="tabpanel"
							     aria-labelledby="newfile-tab">
								{!! Form::open(['route' => 'hpdmailingfile.store', 'method' => 'post', 'files' => true]) !!}
								{!! Form::hidden('mailing_id', $hpdAnnualMailing->id, ['id' => 'mailing_id']) !!}
								<div class="form-group">
									{!! Form::label('file_type', 'File Type', ['class' => 'control-label']) !!}
									{!! Form::select('file_type', ['firesafety1'=>'Fire Safety Part 1 Form','firesafety2'=>'Fire Safety Part 2 Form',
									 'firesafety3'=>'Fire Safety Combustible Form','firesafety4'=>'Fire Safety Non-Combustible Form',
									   'wg_apendixa'=>'Window Guards Appendix A',
									'wg_apendixb'=>'Window Guards Appendix B','lead_poising'=>'Lead Poising Annual Notice',
									'lead_hazard'=>'Lead Based Paint Hazard Form','lead_inspection'=>'Visual Inspection for Lead',
									'lead_compliance'=>'Lead Paint Compliance Form', ] , null , ['class' => 'form-control']) !!}
								</div>
								<div class="form-group">
									{!! Form::label('description', 'File Description', ['class' => 'control-label']) !!}
									{!! Form::textarea('description', null , ['class' => 'form-control', 'rows'=>3]) !!}
								</div>
								<div class="form-group">
									{!! Form::label('file', 'File', ['class' => 'control-label']) !!}
									<div class="custom-file">
										{!! Form::file('file', ['id'=>'file','class' => 'custom-file-input']) !!}
										{!! Form::label('file', 'Choose File', ['class' => 'custom-file-label']) !!}
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											{!! Form::submit('Submit', ['class' => 'form-control btn-success']) !!}
										</div>
										<div class="col-sm-6">
											{!! Form::reset('Reset', ['class' => 'form-control btn-danger']) !!}
										</div>
									</div>
								</div>

								{!! Form::close() !!}
							</div>
							<div class="tab-pane fade" id="uploadedfiles" role="tabpanel"
							     aria-labelledby="uploadedfiles-tab">
								<div id="accordion">
									@forelse($hpdAnnualMailing->files as $doc)
										@if(Storage::exists($doc->file_url))
											<div class="card bg-light pt-1">
												<div class="card-header ">
													<div class="row">
														<div class="col-9 align-content-center">
															{{$loop->iteration}}
															- {!!  \App\Helpers\Helper::dosyaikonu(\GuzzleHttp\Psr7\MimeType::fromFilename($doc->file_url))!!}
															| {{$doc->updated_at->format('Y-m-d')}}
															| {{$doc->file_type}} |
															<a href="{{Storage::url($doc->file_url)}}">
																<i class="fas fa-download"></i>
																Download File - {{number_format(Storage::size($doc->file_url)/1024/1024,2)}}
																<b>Mb</b>
															</a>
															<br/>
															<b>Description</b> : {{$doc->description}}</b>
														</div>
														<div class="col-3">
															{!! Form::open(['route' => ['hpdmailingfile.destroy', $doc->id], 'method' => 'DELETE']) !!}

															{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

															{!! Form::close() !!}
														</div>
													</div>

												</div>
											</div>
										@endif
									@empty
										<div class="card bg-light pt-1">
											No file.
										</div>
									@endforelse
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop

@section('js')
	<!-- page script -->
	<script>
        function printContent(el) {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }

        $(function () {
            var table;
            $('#egress').value = null;

            table = $('#example').DataTable({
                paging: false,
                stateSave: false,
                lengthChange: true,
                searching: false,
                ordering: true,
                info: false,
                autoWidth: false,
                fixedHeader: true,
                scrollX: false,
                responsive: true,
                columnDefs: [{
                    className: 'dt-body-center',
                    targets: '_all',
                    createdCell: function (cell) {
                        let original;
                        cell.setAttribute('contenteditable', false)
                        cell.setAttribute('spellcheck', false)
                        cell.addEventListener("focus", function (e) {
                            original = e.target.textContent
                        })
                        cell.addEventListener("blur", function (e) {
                            if (original !== e.target.textContent) {
                                const row = table.row(e.target.parentElement)
                                row.invalidate()
                                // console.log('Row changed: ', table.data())
                                var tabledata = table.data();
                                var dbdata = document.getElementsByName('egress')[0].value;
                                // document.getElementsByName('egress')[0].value=JSON.parse(lastdata);
                                // $('#egress').val(table.data());
                            }
                        })
                    },
                }]
            })
            table.rows.add(JSON.parse(document.getElementsByName('egress')[0].value)).draw();


            $(function () {
                $("textarea.summernote-editor").summernote({
                    tabsize: 2,
                    height: 400,
                });
            });

            $('.custom-file input').change(function (e) {
                if (e.target.files.length) {
                    $(this).next('.custom-file-label').html(e.target.files[0].name);
                }
            });
        });
	</script>
@append
