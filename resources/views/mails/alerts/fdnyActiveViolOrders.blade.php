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
                            @if ($item->acct_num)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        ACCT#
                                    </td>
                                    <td>
                                        @if(isset($changes['acct_num']))
                                            <i color="red"><s>{{$changes['acct_num']}}</s></i> / @endif
                                        {{$item->acct_num}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->acct_owner)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        OWNER
                                    </td>
                                    <td>
                                        @if(isset($changes['acct_owner']))
                                            <i color="red"><s>{{$changes['acct_owner']}}</s></i> / @endif
                                        {{$item->acct_owner}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->violation_num)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Violation#
                                    </td>
                                    <td>
                                        @if(isset($changes['violation_num']))
                                            <i color="red"><s>{{$changes['violation_num']}}</s></i> / @endif
                                        {{$item->violation_num}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->vio_law_desc)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Description
                                    </td>
                                    <td>
                                        @if(isset($changes['vio_law_desc']))
                                            <i color="red"><s>{{$changes['vio_law_desc']}}</s></i> / @endif
                                        {{$item->vio_law_desc}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->violationDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Violation Date
                                    </td>
                                    <td>
                                        @if(isset($changes['vio_date']))
                                            <i color="red"><s>{{$changes['vio_date']}}</s></i> / @endif
                                        {{$item->violationDate()}}
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
