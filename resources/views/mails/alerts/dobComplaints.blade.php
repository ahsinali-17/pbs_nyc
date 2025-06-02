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
                            @if($item->complaint_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Complaint Number
                                    </td>
                                    <td>
                                        @if(isset($changes['complaint_number']))
                                            <i color="red"><s>{{$changes['complaint_number']}}</s></i> / @endif
                                        {{$item->complaint_number}}
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
                            @if($item->dateEntered())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Data Entered Date
                                    </td>
                                    <td>
                                        @if(isset($changes['date_entered']))
                                            <i color="red"><s>{{$changes['date_entered']}}</s></i> / @endif
                                        {{$item->dateEntered()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->complaintCode)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Complaint Code
                                    </td>
                                    <td>
                                        @if(isset($changes['complaintCode']))
                                            <i color="red"><s>{{$changes['complaintCode']}}</s></i> / @endif
                                        {{$item->complaintCode->description}}
                                        <br/>(Priority:<b> {{$item->complaintCode->priority}}</b>)
                                    </td>
                                </tr>
                            @endif
                            @if($item->unit)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Unit
                                    </td>
                                    <td>
                                        @if(isset($changes['unit']))
                                            <i color="red"><s>{{$changes['unit']}}</s></i> / @endif
                                        {{\App\Helpers\Helper::getFullComplaintUnit($item->unit)}}
                                    </td>
                                </tr>
                            @endif
                            @if($item->getDispositionDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Disposition Date
                                    </td>
                                    <td>
                                        @if(isset($changes['disposition_date']))
                                            <i color="red"><s>{{$changes['disposition_date']}}</s></i> / @endif
                                        {{$item->getDispositionDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if($item->dispositionCode)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Disposition Code
                                    </td>
                                    <td>
                                        @if(isset($changes['dispositionCode']))
                                            <i color="red"><s>{{$changes['dispositionCode']}}</s></i> / @endif
                                        {{$item->dispositionCode == null ? $item->disposition_code :$item->dispositionCode->description}}
                                    </td>
                                </tr>
                            @endif
                            @if($item->inspectionDate())
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

                        <p style="font-size:12px;line-height: 30px; text-align: left">
                            <b style="color: black">Priority Codes:</b>
                            An inspector will be visiting your property within the approximate timetable below: <br/>
                            <b>A:</b> 1-24 hours <br/>
                            <b>B:</b> 1-2 days <br/>
                            <b>C:</b> 1-3 days <br/>
                            <b> D:</b> 3-5 days <br/>
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
