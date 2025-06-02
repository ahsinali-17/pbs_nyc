@extends('mails.master')


@section('css')
    <style>


        table.anatablo > tbody > tr > td {
            padding: 30px;
        }

        .img {
            padding-bottom: 5px;
        }
    </style>
@stop

@section('content')
    <tr>
        <td class="td container"
            style="width:100%; font-size:0pt; line-height:0pt; margin:0; font-weight:normal;">
            <table class="bizimfont anatablo renklendir" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="height: 3px; font-size: 0px; padding: 10px">

                    </td>
                </tr>
                <tr>
                    <td class="h1 pb25" style="font-size:25px; font-weight:700;line-height:30px; text-align:center;">
                        <p>
                            {{$subject}}
                        </p>
                        <br/>
                        <span style="font-size:15px;border:2px dashed black;border-radius:10px;padding:10px;font-weight:700;background-color: lightgrey">
                            {{$property->getAddressWithoutBin()}}
                        </span>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="white" style="height: 3px; font-size: 0px; padding: 10px">

                    </td>
                </tr>

                <tr bgcolor="#f2f2f2">
                    <td style="font-size:18px; line-height:25px; text-align:center;">
                        <span> <br/>
                            Dear {{$user->name}}, <br/><br/>
                            A new status change has been filed in relation to your property. Please see below for further details.<br/><br/>
                        </span>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="white" style="height: 3px; font-size: 0px; padding: 10px">

                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="renklendir"
                               style="font-size:18px; line-height:30px; text-align:left;width: 70%;min-width: 400px;margin: auto;border-color:transparent; border-collapse: collapse; "
                               border="0" cellspacing="0" cellpadding="5">

                            @php($i=1)
                            <tbody>
                            @if ($item->ticket_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Ticket Number
                                    </td>
                                    <td>
                                        @if(isset($changes['ticket_number']))
                                            <i color="red"><s>{{$changes['ticket_number']}}</s></i> / @endif
                                        {{$item->ticket_number}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->issuing_agency)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Agency
                                    </td>
                                    <td>
                                        @if(isset($changes['issuing_agency']))
                                            <i color="red"><s>{{$changes['issuing_agency']}}</s></i> / @endif
                                        {{$item->issuing_agency}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->charge_1_code_description)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Description
                                    </td>
                                    <td>
                                        @if(isset($changes['charge_1_code_description']))
                                            <i color="red"><s>{{$changes['charge_1_code_description']}}</s></i> / @endif
                                        {{$item->charge_1_code_description}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->violation_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Violation number
                                    </td>
                                    <td>
                                        @if(isset($changes['violation_number']))
                                            <i color="red"><s>{{$changes['violation_number']}}</s></i> / @endif
                                        {{$item->violation_number}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->violationDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Violation Date
                                    </td>
                                    <td>
                                        @if(isset($changes['violation_date']))
                                            <i color="red"><s>{{$changes['violation_date']}}</s></i> / @endif
                                        {{$item->violationDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->issuing_agency)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Issuing Agency
                                    </td>
                                    <td>
                                        @if(isset($changes['issuing_agency']))
                                            <i color="red"><s>{{$changes['issuing_agency']}}</s></i> / @endif
                                        {{\App\Helpers\Helper::getOathHearingAgency($item->issuing_agency)}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->respondent_first_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Respondent First Name
                                    </td>
                                    <td>
                                        @if(isset($changes['respondent_first_name']))
                                            <i color="red"><s>{{$changes['respondent_first_name']}}</s></i> / @endif
                                        {{$item->respondent_first_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->respondent_last_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Last Name
                                    </td>
                                    <td>
                                        @if(isset($changes['respondent_last_name']))
                                            <i color="red"><s>{{$changes['respondent_last_name']}}</s></i> / @endif
                                        {{$item->respondent_last_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->hearing_status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Hearing Status
                                    </td>
                                    <td>
                                        @if(isset($changes['hearing_status']))
                                            <i color="red"><s>{{$changes['hearing_status']}}</s></i> / @endif
                                        {{$item->hearing_status}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->hearing_result)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Hearing Result
                                    </td>
                                    <td>
                                        @if(isset($changes['hearing_result']))
                                            <i color="red"><s>{{$changes['hearing_result']}}</s></i> / @endif
                                        {{$item->hearing_result}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->scheduled_hearing_location)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Scheduled Hearing Location
                                    </td>
                                    <td>
                                        @if(isset($changes['scheduled_hearing_location']))
                                            <i color="red"><s>{{$changes['scheduled_hearing_location']}}</s></i> / @endif
                                        {{$item->scheduled_hearing_location}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->penalty_imposed)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Penalty Imposed
                                    </td>
                                    <td>
                                        @if(isset($changes['penalty_imposed']))
                                            <i color="red"><s>{{$changes['penalty_imposed']}}</s></i> / @endif
                                        ${{$item->penalty_imposed}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->hearingDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Hearing Date
                                    </td>
                                    <td>
                                        @if(isset($changes['hearing_date']))
                                            <i color="red"><s>{{$changes['hearing_date']}}</s></i> / @endif
                                        {{$item->hearingDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->violation_description)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Violation Description
                                    </td>
                                    <td>
                                        @if(isset($changes['violation_description']))
                                            <i color="red"><s>{{$changes['violation_description']}}</s></i> / @endif
                                        {{$item->violation_description}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->charge_1_code_description)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Charge 1 Code Description
                                    </td>
                                    <td>
                                        @if(isset($changes['charge_1_code_description']))
                                            <i color="red"><s>{{$changes['charge_1_code_description']}}</s></i> / @endif
                                        {{$item->charge_1_code_description}}
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="white" style="height: 3px; font-size: 0px; padding: 10px">

                    </td>
                </tr>


                <!-- Button -->
                <tr bgcolor="#f2f2f2">
                    <td style="text-align: center;line-height: 50px" class="pink-button text-button bizimfont">
                        <p style="font-size:12px;line-height: 30px;">
                            <br/>
                            Local Law 110 went into effect December 5th, 2019. This Local Law requires you to post a
                            copy of the violation as described below;<br/>
                            <i>
                        <p style="font-size:12px;line-height: 30px; text-align: left">
                            A) If the violation relates to a condition in a common area or affecting all residents, the
                            owner must <b>post:</b><br/>
                            &emsp; &emsp;&emsp; 1) A copy of the summons, and <br/>
                            &emsp; &emsp;&emsp; 2) A copy of the Tenant Information Flyer <a style="color: red"
                                                                                             href="https://www.msnhlaw.com/docs/ll110_flyer.pdf">
                                <u>(for a copy, click here)</u> </a>in
                            a conspicuous manner in the
                            building's lobby until such violation has been closed. <br/>
                            B) If the condition giving rise to the violation exists <b>inside</b> a dwelling unit, the
                            owner
                            must <b>distribute</b> a
                            copy of the Summons and the flyer to the resident of that unit, and to residents of adjacent
                            units. <br/>
                            C) The owner must post and/or distribute the necessary documents within <b>five (5)</b> days
                            of
                            being served with the violation..
                        </p>
                        </i>
                        </p>          <br/>
                        <a href="https://calendly.com/proactivebuildingsolutions"
                           target="_blank"
                           class="link-white"
                           style="height: 42px;background:rgba(35,36,35,0.54); font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:0px 22px 22px 22px; font-weight:bold;color:#ffffff; text-decoration:none;">
                            <span class="link-white" style="color:#ffffff; text-decoration:none;">
                                BOOK A CONSULTATION
                            </span>
                        </a>
                        <p style="font-size:14px;line-height: 30px;">
                            <br/>
                            <i>Simply reply to this email or book a consultation for further assistance.</i>
                        </p>
                    </td>
                </tr>
                <!-- END Button -->
            </table>
        </td>
    </tr>
@stop

@section('js')

@stop
