@extends('mails.master')


@section('css')
    <style>
        input {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }

        .row {
            display: -webkit-box;
            display: flex;
        }

        .row .col {
            -webkit-box-flex: 1;
            flex: 1;
        }

        .row .col:last-child {
            margin-left: 1em;
        }

        /* Accordion styles */
        .tabs {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
        }

        .tab {
            width: 100%;
            color: white;
            overflow: hidden;
        }

        .tab-label {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            padding: 1em;
            background: #2c3e50;
            font-weight: bold;
            cursor: pointer;
            /* Icon */
        }

        .tab-label:hover {
            background: #1a252f;
        }

        .tab-label::after {
            content: "\276F";
            width: 1em;
            height: 1em;
            text-align: center;
            -webkit-transition: all .35s;
            transition: all .35s;
        }

        .tab-content {
            max-height: 0;
            padding: 0 1em;
            color: #2c3e50;
            background: white;
            -webkit-transition: all .35s;
            transition: all .35s;
        }

        .tab-close {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: end;
            justify-content: flex-end;
            padding: 1em;
            font-size: 0.75em;
            background: #2c3e50;
            cursor: pointer;
        }

        .tab-close:hover {
            background: #1a252f;
        }

        input:checked + .tab-label {
            background: #1a252f;
        }

        input:checked + .tab-label::after {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        input:checked ~ .tab-content {
            max-height: 100vh;
            padding: 1em;
        }

    </style>
@stop

@section('content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" valign="top">
                <table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                    <tr>
                        <td class="td container"
                            style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:55px 0px;">

                            <!-- Intro -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="padding-bottom: 10px;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="tbrr p30-15"
                                                    style="padding: 30px 30px; border-radius:26px 26px 0px 0px;"
                                                >
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td class="h1 pb25"
                                                                style="color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:20px; line-height:23px; text-align:center; padding-bottom:25px; background-color: rgba(171,177,175,0.36); padding: 30px 30px; border-radius:26px 26px 0px 0px;">
                                                                <img src="{{asset("images/logos/logo@2x.png")}}"
                                                                     height="50%" border="0" alt=""/><br/><br/>
                                                                NEW ALERT(s) ISSUED at <br/>
                                                                <br/>
                                                                {{$property->getAddress()}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table style="margin-top: 10px" width="100%" border="0"
                                                           cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td
                                                                    style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;
                                                                color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">

                                                                Dear {{$user->name}}
                                                                , <br/><br/>
                                                                As of {{now()}}, the following alert(s) have been filed
                                                                in relation to your
                                                                property(ies).


                                                                <br/> We're ready to work with you. Please check
                                                                available time for our free agency support to get
                                                                consultation <span class="m-hide"><br/></span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <table style="margin-top: 10px" width="100%" border="0"
                                                                   cellspacing="0" cellpadding="0">
                                                                @if($item instanceof \App\Models\DobViolations)
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            isn_dob_bis_viol
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->isn_dob_bis_viol}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            issue_date
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->issue_date}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            violation_number
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->violation_number}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            disposition_date
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->disposition_date}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            disposition_comments
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->disposition_comments}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            description
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->description}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            ecb_number
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->ecb_number}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            number
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->number}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            violation_category
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->violation_category}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            violation_type
                                                                        </td>
                                                                        <td style="background-color: rgba(171,177,175,0.58); padding: 30px 30px;color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;">
                                                                            {{$item->violation_type}}
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            </table>
                                                        </tr>
                                                    </table>
                                                    <table style="margin-top: 10px" width="100%" border="0"
                                                           cellspacing="0" cellpadding="0">

                                                        <!-- Button -->
                                                        <tr>
                                                            <td align="center">
                                                                <table class="center" border="0" cellspacing="0"
                                                                       cellpadding="0" style="text-align:center;">
                                                                    <tr>
                                                                        <td class="pink-button text-button"
                                                                            style="background:rgba(35,36,35,0.54); color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:0px 22px 22px 22px; font-weight:bold;">
                                                                            <a href="https://calendly.com/proactivebuildingsolutions"
                                                                               target="_blank"
                                                                               class="link-white"
                                                                               style="color:#ffffff; text-decoration:none;"><span
                                                                                        class="link-white"
                                                                                        style="color:#ffffff; text-decoration:none;">GET RESERVATION</span></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!-- END Button -->
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- END Intro -->

                            <!-- Footer -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="p30-15 bbrr" style="padding: 50px 30px; border-radius:0px 0px 26px 26px;"
                                    >
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="text-footer1 pb10"
                                                    style="color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:20px; text-align:center; padding-bottom:10px;">
                                                    PBS - Proactive Building Systems
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-footer2"
                                                    style="color:#8297b3; font-family:'Muli', Arial,sans-serif; font-size:12px; line-height:26px; text-align:center;">
                                                    22 E 41st Street, Third Floor
                                                    <br/>New York NY 10017 <br/>
                                                    212-271-6837
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-footer3 p30-15"
                                        style="padding: 40px 30px 0px 30px; color:#475c77; font-family:'Muli', Arial,sans-serif; font-size:12px; line-height:18px; text-align:center;">
                                        <a href="#" target="_blank" class="link2-u"
                                           style="color:#475c77; text-decoration:underline;"><span class="link2-u"
                                                                                                   style="color:#475c77; text-decoration:underline;">Unsubscribe</span></a>
                                        from this mailing list.
                                    </td>
                                </tr>
                            </table>
                            <!-- END Footer -->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

@stop

@section('js')

@stop
