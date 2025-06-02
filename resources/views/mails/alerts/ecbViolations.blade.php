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
                            @if ($item->ecb_violation_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        ECB Violation Number
                                    </td>
                                    <td>
                                        @if(isset($changes['ecb_violation_number']))
                                            <i color="red"><s>{{$changes['ecb_violation_number']}}</s></i> / @endif
                                        {{$item->ecb_violation_number}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->ecb_violation_status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        ECB Violation Status
                                    </td>
                                    <td>
                                        @if(isset($changes['ecb_violation_status']))
                                            <i color="red"><s>{{$changes['ecb_violation_status']}}</s></i> / @endif
                                        {{$item->ecb_violation_status}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->dob_violation_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        DOB Violation Number
                                    </td>
                                    <td>
                                        @if(isset($changes['dob_violation_number']))
                                            <i color="red"><s>{{$changes['dob_violation_number']}}</s></i> / @endif
                                        {{$item->dob_violation_number}}
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
                            @if ($item->hearing_time)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Hearing Time
                                    </td>
                                    <td>
                                        @if(isset($changes['hearing_time']))
                                            <i color="red"><s>{{$changes['hearing_time']}}</s></i> / @endif
                                        {{number_format((($item->hearing_time)/100),2)}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->issueDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Issue Date
                                    </td>
                                    <td>
                                        @if(isset($changes['issue_date']))
                                            <i color="red"><s>{{$changes['issue_date']}}</s></i> / @endif
                                        {{$item->issueDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->severity)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Severity
                                    </td>
                                    <td>
                                        @if(isset($changes['severity']))
                                            <i color="red"><s>{{$changes['severity']}}</s></i> / @endif
                                        {{$item->severity}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->respondent_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Respondent Name
                                    </td>
                                    <td>
                                        @if(isset($changes['respondent_name']))
                                            <i color="red"><s>{{$changes['respondent_name']}}</s></i> / @endif
                                        {{$item->respondent_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->violation_type)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Violation Type
                                    </td>
                                    <td>
                                        @if(isset($changes['violation_type']))
                                            <i color="red"><s>{{$changes['violation_type']}}</s></i> / @endif
                                        {{$item->violation_type}}
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
                            @if ($item->penality_imposed)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Penality Imposed
                                    </td>
                                    <td>
                                        @if(isset($changes['penality_imposed']))
                                            <i color="red"><s>{{$changes['penality_imposed']}}</s></i> / @endif
                                        ${{$item->penality_imposed}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->section_law_description1)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Law Description
                                    </td>
                                    <td>
                                        @if(isset($changes['section_law_description1']))
                                            <i color="red"><s>{{$changes['section_law_description1']}}</s></i> / @endif
                                        {{$item->section_law_description1}}
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
                            @if ($item->certification_status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Certification Status
                                    </td>
                                    <td>
                                        @if(isset($changes['certification_status']))
                                            <i color="red"><s>{{$changes['certification_status']}}</s></i> / @endif
                                        {{$item->certification_status}}
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
                        </p>
                        <br/>
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
