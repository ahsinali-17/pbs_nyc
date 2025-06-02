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
                            @if ($item->job_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Job Number
                                    </td>
                                    <td>
                                        @if(isset($changes['job_number']))
                                            <i color="red"><s>{{$changes['job_number']}}</s></i> / @endif
                                        {{$item->job_number}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->filingDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Filing Date
                                    </td>
                                    <td>
                                        @if(isset($changes['filing_date']))
                                            <i color="red"><s>{{$changes['filing_date']}}</s></i> / @endif
                                        {{$item->filingDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->filing_status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        @if(isset($changes['filing_status']))
                                            <i color="red"><s>{{$changes['filing_status']}}</s></i> / @endif
                                        {{$item->filing_status}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->permitEntireDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Permit Date
                                    </td>
                                    <td>
                                        @if(isset($changes['permit_entire_date']))
                                            <i color="red"><s>{{$changes['permit_entire_date']}}</s></i> / @endif
                                        {{$item->permitEntireDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->signedOffDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Signed Off Date
                                    </td>
                                    <td>
                                        @if(isset($changes['signedoff_date']))
                                            <i color="red"><s>{{$changes['signedoff_date']}}</s></i> / @endif
                                        {{$item->signedOffDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->applicant_firstname)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Applicant First Name
                                    </td>
                                    <td>
                                        @if(isset($changes['applicant_firstname']))
                                            <i color="red"><s>{{$changes['applicant_firstname']}}</s></i> / @endif
                                        {{$item->applicant_firstname}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->applicant_lastname)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Last Name
                                    </td>
                                    <td>
                                        @if(isset($changes['applicant_lastname']))
                                            <i color="red"><s>{{$changes['applicant_lastname']}}</s></i> / @endif
                                        {{$item->applicant_lastname}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->applicant_businessname)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Business Name
                                    </td>
                                    <td>
                                        @if(isset($changes['applicant_businessname']))
                                            <i color="red"><s>{{$changes['applicant_businessname']}}</s></i> / @endif
                                        {{$item->applicant_businessname}}
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
