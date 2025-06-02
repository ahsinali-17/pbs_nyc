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
                        <p>{{$subject}}</p>
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
                            @if ($item->boiler_id)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Boiler#
                                    </td>
                                    <td>
                                        @if(isset($changes['boiler_id']))
                                            <i color="red"><s>{{$changes['boiler_id']}}</s></i> / @endif
                                        {{$item->boiler_id}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->report_type)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Report Type
                                    </td>
                                    <td>
                                        @if(isset($changes['report_type']))
                                            <i color="red"><s>{{$changes['report_type']}}</s></i> / @endif
                                        {{$item->report_type}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->applicantfirst_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Applicant First Name
                                    </td>
                                    <td>
                                        @if(isset($changes['applicantfirst_name']))
                                            <i color="red"><s>{{$changes['applicantfirst_name']}}</s></i> / @endif
                                        {{$item->applicantfirst_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->applicant_last_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Last Name
                                    </td>
                                    <td>
                                        @if(isset($changes['applicant_last_name']))
                                            <i color="red"><s>{{$changes['applicant_last_name']}}</s></i> / @endif
                                        {{$item->applicant_last_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->applicant_license_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Applicant License Number
                                    </td>
                                    <td>
                                        @if(isset($changes['applicant_license_number']))
                                            <i color="red"><s>{{$changes['applicant_license_number']}}</s></i> / @endif
                                        {{$item->applicant_license_number}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->inspection_type)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Inspection Type
                                    </td>
                                    <td>
                                        @if(isset($changes['inspection_type']))
                                            <i color="red"><s>{{$changes['inspection_type']}}</s></i> / @endif
                                        {{$item->inspection_type}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->report_status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        @if(isset($changes['report_status']))
                                            <i color="red"><s>{{$changes['report_status']}}</s></i> / @endif
                                        {{$item->report_status}}
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
