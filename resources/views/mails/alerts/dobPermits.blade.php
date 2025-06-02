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
                            @if ($item->job__)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Job #
                                    </td>
                                    <td>
                                        @if(isset($changes['job__']))
                                            <i color="red"><s>{{$changes['job__']}}</s></i> / @endif
                                        {{$item->job__}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->work_type)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Work Type
                                    </td>
                                    <td>
                                        @if(isset($changes['work_type']))
                                            <i color="red"><s>{{$changes['work_type']}}</s></i> / @endif
                                        {{$item->work_type}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->issuance_date)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Issue Date
                                    </td>
                                    <td>
                                        @if(isset($changes['issuance_date']))
                                            <i color="red"><s>{{$changes['issuance_date']}}</s></i> / @endif
                                        {{$item->issuanceDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->expiration_date)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Expire Date
                                    </td>
                                    <td>
                                        @if(isset($changes['expiration_date']))
                                            <i color="red"><s>{{$changes['expiration_date']}}</s></i> / @endif
                                        {{$item->expirationDate()}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->permit_status)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        @if(isset($changes['permit_status']))
                                            <i color="red"><s>{{$changes['permit_status']}}</s></i> / @endif
                                        {{$item->permit_status}}
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
                            @if ($item->permittee_s_first_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        First Name
                                    </td>
                                    <td>
                                        @if(isset($changes['permittee_s_first_name']))
                                            <i color="red"><s>{{$changes['permittee_s_first_name']}}</s></i> / @endif
                                        {{$item->permittee_s_first_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->permittee_s_last_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Last Name
                                    </td>
                                    <td>
                                        @if(isset($changes['permittee_s_last_name']))
                                            <i color="red"><s>{{$changes['permittee_s_last_name']}}</s></i> / @endif
                                        {{$item->permittee_s_last_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->permittee_s_business_name)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        Company
                                    </td>
                                    <td>
                                        @if(isset($changes['permittee_s_business_name']))
                                            <i color="red"><s>{{$changes['permittee_s_business_name']}}</s></i> / @endif
                                        {{$item->permittee_s_business_name}}
                                    </td>
                                </tr>
                            @endif
                            @if ($item->permittee_s_license__)
                                <tr @if($i++%2) bgcolor="#f2f2f2" @else bgcolor="#fcfcfc" @endif>
                                    <td>
                                        License
                                    </td>
                                    <td>
                                        @if(isset($changes['permittee_s_license__']))
                                            <i color="red"><s>{{$changes['permittee_s_license__']}}</s></i> / @endif
                                        {{$item->permittee_s_license__}}
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
