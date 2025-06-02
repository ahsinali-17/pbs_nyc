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
                        <p>{{$item->getMailSubject($changes?true:false)}}</p>
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
                            @if($item->unique_key)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Unique Key
                                    </td>
                                    <td>
                                        @if(isset($changes['unique_key']))
                                            <i color="red"><s>{{$changes['unique_key']}}</s></i> / @endif
                                        {{$item->unique_key}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->createdDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Created Date
                                    </td>
                                    <td>
                                        @if(isset($changes['created_date']))
                                            <i color="red"><s>{{$changes['created_date']}}</s></i> / @endif
                                        {{$item->createdDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->closedDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Created Date
                                    </td>
                                    <td>
                                        @if(isset($changes['closed_date']))
                                            <i color="red"><s>{{$changes['closed_date']}}</s></i> / @endif
                                        {{$item->closedDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->agency)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Agency
                                    </td>
                                    <td>
                                        @if(isset($changes['agency']))
                                            <i color="red"><s>{{$changes['agency']}}</s></i> / @endif
                                        {{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->complaint_type)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Complaint Type
                                    </td>
                                    <td>
                                        @if(isset($changes['complaint_type']))
                                            <i color="red"><s>{{$changes['complaint_type']}}</s></i> / @endif
                                        {{$item->complaint_type}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->descriptor)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Complaint Description
                                    </td>
                                    <td>
                                        @if(isset($changes['descriptor']))
                                            <i color="red"><s>{{$changes['descriptor']}}</s></i> / @endif
                                        {{$item->descriptor}}
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
                            @if ($item->resolution_description)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Resolution Description
                                    </td>
                                    <td>
                                        @if(isset($changes['resolution_description']))
                                            <i color="red"><s>{{$changes['resolution_description']}}</s></i> / @endif
                                        {{$item->resolution_description}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->resolution_action_updated_date)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Resolution Update Date
                                    </td>
                                    <td>
                                        @if(isset($changes['resolution_action_updated_date']))
                                            <i color="red"><s>{{$changes['resolution_action_updated_date']}}</s></i>
                                            / @endif
                                        {{$item->resolutionActionUpdatedDate()}}
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
