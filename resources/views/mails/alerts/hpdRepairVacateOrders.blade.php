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
                            @if ($item->number_of_vacated_units)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Vacated Units Numbers
                                    </td>
                                    <td>
                                        @if(isset($changes['number_of_vacated_units']))
                                            <i color="red"><s>{{$changes['number_of_vacated_units']}}</s></i> / @endif
                                        {{$item->number_of_vacated_units}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->actualRescindDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Actual Rescind Date
                                    </td>
                                    <td>
                                        @if(isset($changes['actual_rescind_date']))
                                            <i color="red"><s>{{$changes['actual_rescind_date']}}</s></i> / @endif
                                        {{$item->actualRescindDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->vacateEffectiveDate())
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Vacate Effective Date
                                    </td>
                                    <td>
                                        @if(isset($changes['vacate_effective_date']))
                                            <i color="red"><s>{{$changes['vacate_effective_date']}}</s></i> / @endif
                                        {{$item->vacateEffectiveDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->primary_vacate_reason)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Primary Vacate Reason
                                    </td>
                                    <td>
                                        @if(isset($changes['primary_vacate_reason']))
                                            <i color="red"><s>{{$changes['primary_vacate_reason']}}</s></i> / @endif
                                        {{$item->primary_vacate_reason}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->description)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Registration #id
                                    </td>
                                    <td>
                                        @if(isset($changes['description']))
                                            <i color="red"><s>{{$changes['description']}}</s></i> / @endif
                                        {{$item->description}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->ecb_number)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Vacate Order Number
                                    </td>
                                    <td>
                                        @if(isset($changes['ecb_number']))
                                            <i color="red"><s>{{$changes['ecb_number']}}</s></i> / @endif
                                        {{$item->ecb_number}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->vacate_type)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Vacate Type
                                    </td>
                                    <td>
                                        @if(isset($changes['vacate_type']))
                                            <i color="red"><s>{{$changes['vacate_type']}}</s></i> / @endif
                                        {{$item->vacate_type}}
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
