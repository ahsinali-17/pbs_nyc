<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
>
<head>
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="format-detection" content="date=no"/>
    <meta name="format-detection" content="address=no"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="x-apple-disable-message-reformatting"/>
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i" rel="stylesheet"/>
    <!--<![endif]-->
    <title>Email Template</title>

    <style type="text/css">
        .button {
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
        }


        .metalarkaplan {
            background: rgba(35, 36, 35, 0.28);
        }

        .siyaharka {
            background: rgba(0, 0, 0, 0.64);
            border-radius: 25%;
            width: 20px !important;
            margin: 5px 5px 5px 0px;
            padding: 5px;
        }

    </style>
    <!--[if gte mso 9]>
    <style type="text/css" media="all">
        sup {
            font-size: 100% !important;
        }

    </style>
    <![endif]-->

    <style type="text/css" media="screen">
        /* Linked Styles */
        body {
            padding: 0 !important;
            margin: 0 !important;
            display: block !important;
            min-width: 100% !important;
            width: 100% !important;
            -webkit-text-size-adjust: none;
            font-family: 'Muli', sans-serif !important;
        }

        a {
            color: #66c7ff;
            text-decoration: none
        }

        p {
            padding: 0 !important;
            margin: 0 !important
        }

        img {
            -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */
        }

        .mcnPreviewText {
            display: none !important;
        }


        /* Mobile styles */
        @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
            .mobile-shell {
                width: 100% !important;
                min-width: 100% !important;
            }

            .bg {
                background-size: 100% auto !important;
                -webkit-background-size: 100% auto !important;
            }

            .text-header,
            .m-center {
                text-align: center !important;
            }

            .center {
                margin: 0 auto !important;
            }

            .container {
                padding: 20px 10px !important
            }

            .td {
                width: 100% !important;
                min-width: 100% !important;
            }

            .m-br-15 {
                height: 15px !important;
            }

            .p30-15 {
                padding: 30px 15px !important;
            }

            .m-td,
            .m-hide {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
                font-size: 0 !important;
                line-height: 0 !important;
                min-height: 0 !important;
            }

            .m-block {
                display: block !important;
            }

            .fluid-img img {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
            }

            .column,
            .column-top,
            .column-empty,
            .column-empty2,
            .column-dir-top {
                float: left !important;
                width: 100% !important;
                display: block !important;
            }

            .column-empty {
                padding-bottom: 10px !important;
            }

            .column-empty2 {
                padding-bottom: 30px !important;
            }

            .content-spacing {
                width: 15px !important;
            }


        }
    </style>
</head>
<body class="body"
      style="background: #bdc0c2;padding:0 !important; margin:0 !important; display:block !important;  width:100% !important; -webkit-text-size-adjust:none;"
      bgcolor="#bdc0c2">

<table style="background: #bdc0c2" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
    <tr>
        <td align="center" valign="top">
            <table style="margin: 10px 0px; border:3px solid #bdc0c2;border-radius:29px; background: white;"
                   width="60%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                <tr>
                    <td class="td container"
                        style="width:100%; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; border-color: transparent">
                        <!-- Intro -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                            <tr style="height: 200px; border-radius: 26px 26px 0px 0px">
                                <td style="
                                        background: url({{asset("images/logos/black.jpg")}}) no-repeat center center; background-size: cover; border-radius: 25px 25px 0px 0px;">
                                </td>
                            </tr>

                            <!-- END Intro -->

                            <tr>
                                <td class="td container"
                                    style="width:100%; font-size:0pt; line-height:0pt; margin:0; font-weight:normal;">
                                    <table class="bizimfont anatablo renklendir" width="100%" border="0" cellspacing="0"
                                           cellpadding="0" style="font-size:14px; line-height:25px; padding: 30px;">
                                        <tr style="background: white;">
                                            <td style="font-size:18px; line-height:25px; text-align:center;">
                                                <span>

                                                    Dear {{$user->name}}, <br/><br/>
                                                    Below is a summary of your NYC Department records for your subscribed property list.
	                                                <br/>

                                                    <a class="button button1" href="{{route('downloadSummary')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                                                                       fill="currentColor" class="bi bi-download"
                                                                                                                       viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg>Download Full Summary</a>
                                                </span>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <!-- END Intro -->

                            <!-- Footer -->
                            <tr style="border-color: transparent!important; ">
                                <td style="background: url({{asset("images/logos/blackfooter.jpg")}}) no-repeat center center; background-size: cover; border-radius: 0px 0px 25px 25px;"
                                    class="p30-15 bbrr">
                                    <table style="color: lightgrey; padding: 15px 0px;" width="100%" border="0"
                                           cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="text-footer1 pb10 bizimfont"
                                                style="font-size:16px; line-height:20px; text-align:center; padding-bottom:10px;">
                                                PBS - Proactive Building Solutions
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-footer2 bizimfont"
                                                style="font-size:12px; line-height:26px; text-align:center;">
                                                22 E 41st Street, Third Floor
                                                <br/>New York NY 10017 <br/>
                                                212-271-6837
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-footer3 p30-15 bizimfont"
                                                style="padding-top:10px; font-size:9px; line-height:18px; text-align:center;">
                                            </td>
                                        </tr>
                                    </table>
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

</body>
</html>
