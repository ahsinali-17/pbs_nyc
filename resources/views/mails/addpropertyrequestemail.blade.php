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
<div>

    <tr>
        <td class="td container"
            style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal;">
            <!-- Intro -->
            <table class="bizimfont anatablo renklendir" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="fluid-img"
                        style="font-size:0pt; line-height:0pt; text-align:left;"><img
                                width="100%" src="{{asset("images/others/mail-top-3.jpg")}}"
                                border="0"
                                alt=""/></td>
                </tr>

                <tr>
                    <td class="h1 pb25 bizimfont"
                        style="font-size:20px; line-height:23px; text-align:center;">

                        <table class="bizimfont"
                               style="font-size:16px; line-height:23px; text-align:left; border-collapse: collapse;  border-radius: 0.3em; overflow: hidden;"
                               width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-bottom: 10px" colspan="2">
                                <span>
                                    <b>{{$content["name"]}}</b> has sent a property add request.<br/> <br/>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%; text-align: left"><b>Name</b></td>
                                <td style="text-align: left">{{$content["name"]}}</td>
                            </tr>
                            <tr>
                                <td style="width:20%; text-align: left"><b>Email</b></td>
                                <td style="text-align: left">{{$content["email"]}}</td>
                            </tr>
                            <tr>

                                <td style=" width:20%; text-align: left;"><b>Phone Number</b>
                                </td>
                                <td style="text-align: left">{{$content["phone"]}}</td>
                            </tr>

                            <tr>
                                <td style="text-align: left; color: black" colspan="3">
                                    <br/><b>Addresses List</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: left; white-space: pre-line">{{$content["addresses"]}}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; color: black" colspan="3">
                                    <br/><b>Message</b>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align: left; white-space: pre-line">{{$content["details"]}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- Article / Full Width Image + Title + Copy + Button -->

{{--                <tr>--}}
{{--                    <td class="fluid-img"--}}
{{--                        style="font-size:0pt; line-height:0pt; text-align:left;"><img--}}
{{--                                width="100%" src="{{asset("images/others/mail-top-3.jpg")}}"--}}
{{--                                border="0"--}}
{{--                                alt=""/></td>--}}
{{--                </tr>--}}

                <!-- Article Secondary / Image On The Left - Copy On The Right -->



                <!-- Two Columns / Articles -->
            </table>
            <!-- END Two Columns / Articles -->


        </td>
    </tr>




</div>
