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
                        <img src="{{asset('images/emailicons/alert/alarm-outline/128x128.png')}}">
                        <p>
                            {{$item->type}} REMINDER
                        </p>
                        <br/>
                        <div>
                        <span style="font-size:15px;border:2px dashed black;border-radius:10px;padding:10px;font-weight:700;background-color: lightgrey">
                            {{$property->getAddressWithoutBin()}}
                        </span></div><br/>

                    </td>
                </tr>

                <tr>
                    <td bgcolor="white" style="height: 3px; font-size: 0px; padding: 5px">

                    </td>
                </tr>

                <tr bgcolor="#f2f2f2">
                    <td style="font-size:18px; line-height:25px; text-align:center;">
                        <span>
                            <h3>REMINDER: Upcoming Due Date</h3>Dear <b> {{$user->name}}</b>, <br/><br/>
                            Following {{$item->type}} info has an upcoming due date in relation to your property. Please see below for further details.
                            <br/><span style="color: darkred; font-size:18px; padding-top: 2px">Remaining:
                                <u>
                                    {{\Carbon\Carbon::parse($item->due_date)->longRelativeToNowDiffForHumans(\Carbon\Carbon::now(),3)}}
                                </u></span><br/><br/>
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
                            @if ($item->type)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        TYPE:
                                    </td>
                                    <td>
                                        {{$item->type}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        {{$item->status}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->content)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Content
                                    </td>
                                    <td>
                                        {{$item->content}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->due_date->format('Y-m-d'))
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Due Date
                                    </td>
                                    <td>
                                        {{($item->due_date->format('Y-m-d'))}}
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

                        <a href="https://pbs.nyc/calender"
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
