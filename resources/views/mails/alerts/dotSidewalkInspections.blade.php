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
                            @if ($item->sr)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        SR#
                                    </td>
                                    <td>
                                        @if(isset($changes['sr']))
                                            <i color="red"><s>{{$changes['sr']}}</s></i> / @endif
                                        {{$item->sr}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->inspectionDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Inspection Date
                                    </td>
                                    <td>
                                        @if(isset($changes['inspection_date']))
                                            <i color="red"><s>{{$changes['inspection_date']}}</s></i> / @endif
                                        {{$item->inspectionDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->reason_for_failure)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Failure Reason
                                    </td>
                                    <td>
                                        @if(isset($changes['reason_for_failure']))
                                            <i color="red"><s>{{$changes['reason_for_failure']}}</s></i> / @endif
                                        {{$item->reason_for_failure}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->pass_fail)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Pass Fail
                                    </td>
                                    <td>
                                        @if(isset($changes['pass_fail']))
                                            <i color="red"><s>{{$changes['pass_fail']}}</s></i> / @endif
                                        {{$item->pass_fail}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->violation)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Violation
                                    </td>
                                    <td>
                                        @if(isset($changes['violation']))
                                            <i color="red"><s>{{$changes['violation']}}</s></i> / @endif
                                        {{$item->violation}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->permit)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Permit(s)
                                    </td>
                                    <td>
                                        @if(isset($changes['permit']))
                                            <i color="red"><s>{{$changes['permit']}}</s></i> / @endif
                                        {{$item->permit}}
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
