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
                            @if ($item->complaintid)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Complaint#
                                    </td>
                                    <td>
                                        @if(isset($changes['complaintid']))
                                            <i color="red"><s>{{$changes['complaintid']}}</s></i> / @endif
                                        {{$item->complaintid}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->buildingid)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Building#
                                    </td>
                                    <td>
                                        @if(isset($changes['buildingid']))
                                            <i color="red"><s>{{$changes['buildingid']}}</s></i> / @endif
                                        {{$item->buildingid}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->apartment)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Apartment
                                    </td>
                                    <td>
                                        @if(isset($changes['apartment']))
                                            <i color="red"><s>{{$changes['apartment']}}</s></i> / @endif
                                        {{$item->apartment}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->receivedDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Received Date
                                    </td>
                                    <td>
                                        @if(isset($changes['receiveddate']))
                                            <i color="red"><s>{{$changes['receiveddate']}}</s></i> / @endif
                                        {{$item->receivedDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        @if(isset($changes['status']))
                                            <i color="red"><s>{{$changes['status']}}</s></i> / @endif
                                        {{$item->status}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->statusDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Status Date
                                    </td>
                                    <td>
                                        @if(isset($changes['statusdate']))
                                            <i color="red"><s>{{$changes['statusdate']}}</s></i> / @endif
                                        {{$item->statusDate()}}
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <br/><br/><br/><br/>
                        <hr style="margin: 30px">

                        <table class="renklendir"
                               style=" font-size:14px; line-height:30px; text-align:left;width: 75%;min-width: 400px;margin: auto;border-color:transparent; border-collapse: collapse; "
                               border="0" cellspacing="0" cellpadding="3">
                            <thead style="background-color: lightgrey;">
                            <tr style="height: 40px; font-size:large; ">
                                <th><b><i>#</i></b></th>
                                <th><b><i>Location</i></b></th>
                                <th><b><i>Condition</i></b></th>
                                <th><b><i>Detail</i></b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=0)
                            @forelse($item->complaintProblems as $problem)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @endif>
                                    <td>
                                        <b>{{$i}}.</b>
                                    </td>
                                    <td>
                                        {{$problem->spacetype}}
                                    </td>
                                    <td>
                                        {{$problem->minorcategory}}
                                    </td>
                                    <td>
                                        {{$problem->code}}
                                    </td>
                                </tr>
                            @empty
                                <tr bgcolor="#f2f2f2">
                                    <td colspan="4" style="text-align: center">
                                        No Details Available
                                    </td>
                                </tr>
                            @endforelse
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
