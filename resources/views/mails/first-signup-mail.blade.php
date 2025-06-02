@extends('mails.master')


@section('css')
    <style>
        .renklendir > tbody > tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table.anatablo > tbody > tr > td {
            padding: 30px;
        }

        table.anatablo > tbody > tr:nth-child(even) {
            background-color: #f2f2f2 !important;
        }

        .renklendir > tbody > tr:last-child {
            border-bottom: 2px solid black;
        }

        .renklendir > thead > tr:first-child {
            border-bottom: 2px solid black;
            border-top: 2px solid black;
        }

        .img {
            padding-bottom: 5px;
        }
    </style>

@stop

@section('content')

    <tr>
        <td class="td container"
            style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal;">
            <!-- Intro -->
            <table class="bizimfont anatablo renklendir" width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>
                    <td class="h1 pb25 bizimfont"
                        style="font-size:20px; line-height:23px; text-align:center;">

                        <table class="bizimfont"
                               style="font-size:16px; line-height:23px; text-align:left; border-collapse: collapse;  border-radius: 0.3em; overflow: hidden;"
                               width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-bottom: 10px" colspan="3">
                                <span>
                                    <b>Welcome,  {{$content["name"]}} ;</b><br/>
                                    Your login information is below:</span>
                                </td>
                            </tr>
                            <tr>
                                <td style=" width:10%"><img class="siyaharka" width="30px"
                                                            src="{{asset("images/emailicons/email.png")}}">
                                </td>
                                <td style="width:20%; text-align: left"><b>Email</b></td>
                                <td style="text-align: left">{{$content["email"]}}</td>
                            </tr>
                            <tr>

                                <td style="width:10%"><img class="siyaharka" style=" width:30px"
                                                           src="{{asset("images/emailicons/pass.png")}}">
                                </td>
                                <td style=" width:20%; text-align:left;"><b>Password</b></td>
                                <td style="text-align: left">{{$content["password"]}}</td>
                            </tr>
                            <tr>

                                <td width="10%"><img class="siyaharka" width="30px"
                                                     src="{{asset("images/emailicons/phone.png")}}">
                                </td>
                                <td style=" width:20%; text-align: left;"><b>Phone Number</b>
                                </td>
                                <td style="text-align: left">{{$content["phone"]}}</td>
                            </tr>

                            <tr>
                                <td style="text-align: left; color: black" colspan="3">
                                    <br/><b>Your Property List</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table class="renklendir" border="1" cellspacing="0" cellpadding="5"
                                           style="border-color:transparent; text-align: left; width: 100%; border-collapse: collapse; ">
                                        <thead style="background-color: lightgrey;">
                                        <tr style="height: 40px; font-size:large; ">
                                            <th width="50%">
                                                Address
                                            </th>
                                            <th width="25%">
                                                Borough
                                            </th>
                                            <th width="25%">
                                                Zip
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($content["properties"] as $property)
                                            <tr>
                                                <td>
                                                    {{$property->house_number}} {{$property->stname}}
                                                </td>
                                                <td>
                                                    {{\App\Helpers\Helper::getBoroName($property->boro)}}
                                                </td>
                                                <td>
                                                    {{$property->zipcode}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td colspan="3" class="text-center pb25 bizimfont"--}}
{{--                                    style="font-size:16px; line-height:30px; text-align:left; padding-bottom:25px;">--}}
{{--                                    Thank you for registering with PBS.--}}
{{--                                    Please use the information above to access your account.--}}
{{--                                    If you require assistance, book a consultation with us by clicking the link below. <span class="m-hide"><br/></span>--}}
{{--                                </td>--}}

{{--                            </tr>--}}
                            <!-- Button -->
                            <tr>
                                <td colspan="3">
                                    <table border="1" cellspacing="0" cellpadding="5"
                                           style="border-color:transparent;text-align:left;width:100%;border-collapse:collapse">

                                        <tr>
                                            <td style="height: 42px" width="50%"
                                                class="pink-button text-button bizimfont">
                                                <a href="https://pbs.nyc/calender"
                                                   target="_blank"
                                                   class="link-white"
                                                   style="background:rgba(35,36,35,0.54); font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:1px 22px 22px 22px; font-weight:bold;color:#ffffff; text-decoration:none;"><span
                                                            class="link-white"
                                                            style="color:#ffffff; text-decoration:none;">BOOK A CONSULTATION </span></a>
                                            </td>


                                            <td style="height: 42px; text-align: end" width="50%"
                                                class="pink-button text-button bizimfont">
                                                <a href="https://pbs.nyc/portal"
                                                   target="_blank"
                                                   class="link-white"
                                                   style="background:rgba(0,0,121,0.54); font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:22px 1px 22px 22px; font-weight:bold;color:#ffffff; text-decoration:none;"><span
                                                            class="link-white"
                                                            style="color:#ffffff; text-decoration:none;">LOGIN PORTAL </span></a>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <!-- END Button -->
                            <!-- END Intro -->
                        </table>
                    </td>
                </tr>
                <!-- Article / Full Width Image + Title + Copy + Button -->

                <tr>
                    <td class="fluid-img"
                        style="font-size:0pt; line-height:0pt; text-align:left;"><img
                                width="100%" src="{{asset("images/others/mail-top-3.jpg")}}"
                                border="0"
                                alt=""/></td>
                </tr>
                <tr>
                    <td class="p30-15">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="h3 pb20 bizimfont"
                                    style="font-size:25px; line-height:32px; text-align:left; padding-bottom:20px;">
                                    <b>VIOLATION CORRECTION</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="text pb20"
                                    style=" font-size:14px; line-height:26px; text-align:left; padding-bottom:20px;">
                                    With 24/7 remote access to our enhanced system providing
                                    you with real time alerts you will have the ability to
                                    monitor yor property every step of the way..
                                </td>
                            </tr>
                            <!-- Button -->
                            <tr>

                                <td class="blue-button text-button bizimfont">
                                    <a href="{{route('violationcorrection')}}"
                                       target="_blank"
                                       style="background:rgba(35,36,35,0.54); font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:0px 22px 22px 22px; font-weight:bold;color:#ffffff; text-decoration:none;"><span
                                                style="color:#ffffff; text-decoration:none;">CLICK HERE</span></a>
                                </td>
                            </tr>
                            <!-- END Button -->
                        </table>
                    </td>
                </tr>
                <!-- END Article / Full Width Image + Title + Copy + Button -->

                <!-- Article Secondary / Image On The Left - Copy On The Right -->


                <tr>
                    <td class="p30-15">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="column-top"
                                    style="width:50%; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; border-color: transparent">

                                    <img src="{{asset("images/image5.jpg")}}" width="100%"
                                         border="0" alt=""/>
                                </td>

                                <td class="column"
                                    style="font-size:0pt; line-height:0pt; padding-left:15px; margin:0; font-weight:normal; border-color: transparent">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="h4 pb20 bizimfont"
                                                style="font-size:20px; line-height:28px; text-align:left; padding-bottom:20px;">
                                                Membership
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text pb20"
                                                style=" font-size:14px; line-height:26px; text-align:left; padding-bottom:20px;">
                                                Getting alerts is half the battle. Membership is
                                                the
                                                other half--when you join, you allow us to monitor your
                                                property for
                                                you. Preventative measures and a free survey of your
                                                property will
                                                eliminate most obstacles before they arise, and our
                                                instant response
                                                time will resolve issues before they escalate.
                                            </td>
                                        </tr>
                                        <!-- Button -->
                                        <tr>

                                            <td class="dark-blue-button3 text-button bizimfont">
                                                <a href="{{route('membership')}}"
                                                   target="_blank"
                                                   class="link-white"
                                                   style="color:#ffffff; text-decoration:none;"><span
                                                            class="link-white"
                                                            style="background:rgba(35,36,35,0.54); color:#c1cddc; font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:0px 22px 22px 22px; font-weight:bold; color:#ffffff; text-decoration:none;">More Info</span></a>
                                            </td>
                                        </tr>
                                        <!-- END Button -->
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- END Article Secondary / Image On The Left - Copy On The Right -->

                <!-- Two Columns / Articles -->
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                               style="border-width: thick;              background-color: white;       border-color: darkblue;">
                            <tr>

                                {{--                                                            liste başladı--}}
                                <td class="column-top"
                                    style="    vertical-align: top; width:50%; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                    <table width="100%" border="0" cellspacing="0"
                                           cellpadding="0">

                                        <tr>
                                            <td class="h4 pb20 bizimfont" colspan="2"
                                                style="font-size:20px; line-height:28px; text-align:left; padding-bottom:20px;">
                                                Our Services
                                            </td>
                                        </tr>
                                        <tr>

                                            <td valign="top"
                                                class="img"
                                                width="35"
                                                style="font-size:0pt; line-height:0pt; text-align:left;">
                                                <img style="background-color: black; border-radius: 10%; padding: 2px;"
                                                     src="{{asset("images/emailicons/contract/handshake-solid/32x32.png")}}"
                                                     width="25"
                                                     border="0"
                                                     alt=""/>
                                            </td>
                                            <td valign="top"
                                                class="text"
                                                style="color:#ffffff;  font-size:14px; line-height:26px; text-align:left;">
                                                <a href="{{route('aboutus')}}"
                                                   target="_blank"
                                                   class="link"
                                                   style="color:#66c7ff; text-decoration:none;"><span
                                                            class="link"
                                                            style="color:#000000; text-decoration:none;"><b>About Us</b></span></a>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td valign="top"
                                                class="img"
                                                width="35"
                                                style="font-size:0pt; line-height:0pt; text-align:left;">
                                                <img style="background-color: black; border-radius: 10%; padding: 2px;"
                                                     src="{{asset("images/emailicons/alert/alarm-outline/32x32.png")}}"
                                                     width="25"
                                                     border="0"
                                                     alt=""/>
                                            </td>
                                            <td valign="top"
                                                class="text"
                                                style="color:#ffffff;  font-size:14px; line-height:26px; text-align:left;">
                                                <a href="{{route('alerts')}}"
                                                   target="_blank"
                                                   class="link"
                                                   style="color:#66c7ff; text-decoration:none;"><span
                                                            class="link"
                                                            style="color:#000000; text-decoration:none;"><b>Alerts</b></span></a>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td valign="top"
                                                class="img"
                                                width="35"
                                                style="font-size:0pt; line-height:0pt; text-align:left;">
                                                <img style="background-color: black; border-radius: 10%; padding: 2px;"
                                                     src="{{asset("images/emailicons/network/globe-glyph/32x32.png")}}"
                                                     width="25"
                                                     border="0"
                                                     alt=""/>
                                            </td>
                                            <td valign="top"
                                                class="text"
                                                style="color:#ffffff;  font-size:14px; line-height:26px; text-align:left;">
                                                <a href="{{route('membership')}}"
                                                   target="_blank"
                                                   class="link"
                                                   style="color:#66c7ff; text-decoration:none;"><span
                                                            class="link"
                                                            style="color:#000000; text-decoration:none;"><b>Membership</b></span></a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td valign="top"
                                                class="img"
                                                width="35"
                                                style="font-size:0pt; line-height:0pt; text-align:left;">
                                                <img style="background-color: black; border-radius: 10%; padding: 2px;"
                                                     src="{{asset("images/emailicons/dobcode/documents-solid/32x32.png")}}"
                                                     width="25"
                                                     border="0"
                                                     alt=""/>
                                            </td>
                                            <td valign="top"
                                                class="text"
                                                style="color:#ffffff;  font-size:14px; line-height:26px; text-align:left;">
                                                <a href="{{route('nycdobcode')}}"
                                                   target="_blank"
                                                   class="link"
                                                   style="color:#66c7ff; text-decoration:none;"><span
                                                            class="link"
                                                            style="color:#000000; text-decoration:none;"><b>NYC DOB Code</b></span></a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td valign="top"
                                                class="img"
                                                width="35"
                                                style="font-size:0pt; line-height:0pt; text-align:left;">
                                                <img style="background-color: black; border-radius: 10%; padding: 2px;"
                                                     src="{{asset("images/emailicons/fdny/document-search-solid/32x32.png")}}"
                                                     width="25"
                                                     border="0"
                                                     alt=""/>
                                            </td>
                                            <td valign="top"
                                                class="text"
                                                style="color:#ffffff;  font-size:14px; line-height:26px; text-align:left;">
                                                <a href="{{route('nycfdnycode')}}"
                                                   target="_blank"
                                                   class="link"
                                                   style="color:#66c7ff; text-decoration:none;"><span
                                                            class="link"
                                                            style="color:#000000; text-decoration:none;"><b>NYC FDNY Code</b></span></a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td valign="top"
                                                class="img"
                                                width="35"
                                                style="font-size:0pt; line-height:0pt; text-align:left;">
                                                <img style="background-color: black; border-radius: 10%; padding: 2px;"
                                                     src="{{asset("images/emailicons/filing/many-people-solid/32x32.png")}}"
                                                     width="25"
                                                     border="0"
                                                     alt=""/>
                                            </td>
                                            <td valign="top"
                                                class="text"
                                                style="color:#ffffff;  font-size:14px; line-height:26px; text-align:left;">
                                                <a href="{{route('filingrepresentation')}}"
                                                   target="_blank"
                                                   class="link"
                                                   style="color:#66c7ff; text-decoration:none;"><span
                                                            class="link"
                                                            style="color:#000000; text-decoration:none;"><b>Filing Representation</b></span></a>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                                {{--                                                            listebitti--}}
                                <td class="column-top"
                                    style="width:50%; font-size:0pt; line-height:0pt; padding-left:15px; margin:0; font-weight:normal; vertical-align:top; background-color: white">
                                    <table width="100%" border="0" cellspacing="0"
                                           cellpadding="0">

                                        <tr>
                                            <td class="h4 pb20 bizimfont"
                                                style="font-size:20px; line-height:28px; text-align:left; padding-bottom:20px;">
                                                Network
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text pb20"
                                                style="  font-size:14px; line-height:26px; text-align:left; padding-bottom:20px;">
                                                PBS has focused on building its
                                                network of highly vetted,
                                                reliable associates by forming
                                                longstanding relationships in
                                                the industry. Our in-house team
                                                is complemented by a wide
                                                variety of quality professionals
                                                who are committed to meeting
                                                your needs and prioritizing your
                                                project's integrity. Let us
                                                handle your problems before they
                                                become problems.
                                            </td>
                                        </tr>
                                        <!-- Button -->
                                        <tr>
                                            <td align="left">
                                                <table border="0"
                                                       cellspacing="0"
                                                       cellpadding="0">
                                                    <tr>
                                                        <td class="dark-blue-button2 text-button bizimfont"
                                                            style="background:rgba(35,36,35,0.54);; color:#c1cddc; font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:0px 22px 22px 22px; font-weight:bold;">
                                                            <a href="{{route('network')}}"
                                                               target="_blank"
                                                               class="link"
                                                               style="color:#66c7ff; text-decoration:none;"><span
                                                                        class="link"
                                                                        style="color:#ffffff; text-decoration:none;">Read More</span></a>
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
            <!-- END Two Columns / Articles -->


        </td>
    </tr>
@stop

@section('js')

@stop
