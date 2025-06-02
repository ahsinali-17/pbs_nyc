<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i" rel="stylesheet"/>
    <!--<![endif]-->
    <title>Email Template</title>

    <style type="text/css">
        @page {
            header: page-header;
            footer: page-footer;
            margin: 220px 0 150px 0;
            margin-footer: 0;
            margin-header: 0;
            text-align: left !important;
        }

        body {
            margin: 0;
            font-size: 12pt;
            font-family: 'Muli', sans-serif !important;
        }


        table, tr, td {
            padding: 0;
            border-collapse: collapse;
        }

        table {
            width: 100%;
            /*page-break-inside: auto;*/
        }


        /*tr {*/
        /*    page-break-inside: avoid;*/
        /*    page-break-after: auto;*/
        /*    page-break-before: auto;*/
        /*}*/

        .page-break-before {
            page-break-before: always;
        }

        .container {
            padding: 0 35pt;
        }

        main .container {
            margin-top: 2em;
        }

        main h2 {
            margin: 0 0 .8em;
            page-break-after: avoid;
        }

        main p, main .table-wrapper {
            margin: 0 0 1em;
        }

        .clearfix {
            clear: both;
        }


        .vertical-bar {
            display: block;
            width: 100px;
            border-bottom: 1px solid #ccc;
            margin: 0 auto;
        }

        .col1 {
            width: 8.33333%;
        }

        .col2 {
            width: 16.66667%;
        }

        .col3 {
            width: 25%;
        }

        .col4 {
            width: 33.33333%;
        }

        .col5 {
            width: 41.66667%;
        }

        .col6 {
            width: 50%;
        }

        .col7 {
            width: 58.33333%;
        }

        .col8 {
            width: 66.66667%;
        }

        .col9 {
            width: 75%;
        }

        .col10 {
            width: 83.33333%;
        }

        .col11 {
            width: 91.66667%;
        }

        .col12 {
            width: 100%;
        }

        .renklendir tr:nth-child(even) {
            background-color: #f2f2f2 !important;
        }

        .renklendir th {
            padding: 10px 0;
        }

        .renklendir {
            border-bottom: 2px solid #000000 !important;
            line-height: 22px;
        }

        .renklendir th {
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }


    </style>

</head>
<body>

<htmlpageheader name="page-header" id="header">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="background: url({{asset("images/logos/black.jpg")}}) no-repeat center center; background-size: cover;">
                <div style="height: 200px!important;">
                    <span style="color: transparent">
                                                       <br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>
                        </span>
                </div>
            </td>
        </tr>

    </table>
</htmlpageheader>
<main style="padding: 0 40px; text-align: center;">
    <div>
        <p>
            <b>Dear {{$user->name}}</b>, <br/><br/>
            Below is a summary of your NYC Department records for your subscribed property list.
        </p>
    </div>

    @foreach($user->properties as $property)
        <table class="renklendir" autosize="1"
               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; "
               width="100%"
               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
            <thead style="background-color: lightgrey;">
            <tr align="left" bgcolor="#d3d3d3" style="height: 40px; font-size:16px; font-weight: bold ">
                <th align="left" colspan="3">
                    Address
                </th>
                <th align="left" colspan="1">
                    Borough
                </th>
                <th align="left" colspan="1">
                    Zip
                </th>
            </tr>
            </thead>
            <tbody>

            <tr bgcolor="#bababa">
                <td colspan="3">
                    {{$property->house_number}} {{$property->stname}}
                </td>
                <td colspan="1">
                    {{\App\Helpers\Helper::getBoroName($property->boro)}}
                </td>
                <td colspan="1">
                    {{$property->zipcode}}
                </td>
            </tr>
            <tr>

                <td style="width: 20%">BSA App.<br/><b>{{$property->bsaApplicationStatus->count()}}</b></td>
                <td style="width: 20%">Dep Cats Boil.<br/><b>{{$property->depCatsPermits->count()}}</b></td>
                <td style="width: 20%">DOB Cert. Occu.<br/><b>{{$property->dobCertOccupancy->count()}}</b></td>
                <td style="width: 20%">DOB Comp.<br/><b>{{$property->dobComplaints->count()}}</b></td>
                <td style="width: 20%">DOB Job App.<br/><b>{{$property->dobJobFilings->count()}}</b></td>
            </tr>

            <tr>
                <td style="width: 20%">DOB Apprv. Perm.<br/><b>{{$property->dobNowApprovedPermits->count()}}</b></td>
                <td style="width: 20%">DOB Elect. Perm.<br/><b>{{$property->dobNowElectricalPermits->count()}}</b>
                </td>
                <td style="width: 20%">DOB Elev. Perm.<br/><b>{{$property->dobNowElevatorPermits->count()}}</b>
                </td>
                <td style="width: 20%">DOB Now Job Appl.<br/><b>{{$property->dobNowJobFilings->count()}}</b></td>
                <td style="width: 20%">DOB Safe. Boil.<br/><b>{{$property->dobNowSafetyBoiler->count()}}</b></td>
            </tr>
            <tr>
                <td style="width: 20%">DOB Perm. Issu.<br/><b>{{$property->dobPermits->count()}}</b></td>
                <td style="width: 20%">DOB Viol.<br/><b>{{$property->dobViolations->count()}}</b></td>
                <td style="width: 20%">Sidewalk Corr.<br/><b>{{$property->dotSidewalkCorrespondences->count()}}</b>
                </td>
                <td style="width: 20%">Sidewalk Inspec.<br/><b>{{$property->dotSidewalkInspections->count()}}</b>
                </td>
                <td style="width: 20%">DOB ECB Viol.<br/><b>{{$property->ecbViolations->count()}}</b></td>
            </tr>
            <tr>

                <td style="width: 20%">HPD Compl.<br/><b>{{$property->hpdComplaints->count()}}</b></td>
                <td style="width: 20%">HPD Regist.<br/><b>{{$property->hpdDwellingRegistrations->count()}}</b></td>
                <td style="width: 20%">Hous. Litig.<br/><b>{{$property->hpdHousingLitigations->count()}}</b></td>
                <td style="width: 20%">Rep./Vac. Ord.<br/><b>{{$property->hpdRepairVacateOrders->count()}}</b></td>
                <td style="width: 20%">HPD Viol.<br/><b>{{$property->hpdViolations->count()}}</b></td>
            </tr>
            <tr>
                <td style="width: 20%">LM Compl.<br/><b>{{$property->landmarkComplaints->count()}}</b></td>
                <td style="width: 20%">LM Viol.<br/><b>{{$property->landmarkPermits->count()}}</b></td>
                <td style="width: 20%">311 Serv. Req.<br/><b>{{$property->landmarkViolations->count()}}</b></td>
                <td style="width: 20%">LPC Perm. Appl.<br/><b>{{$property->oathHearings->count()}}</b></td>
                <td style="width: 20%">OATH Hearings<br/><b>{{$property->serviceRequests311->count()}}</b></td>
            </tr>

            </tbody>
        </table>

    @endforeach

    <div style="margin: 0 30%; width:40%;text-align: center;height: 30px;padding:10px 0 0 0; background:rgba(35,36,35,0.54);">
        <a href="https://calendly.com/proactivebuildingsolutions" target="_blank"
           style="display:block;font-size:16px; text-align:center; font-weight:bold;color:#ffffff; text-decoration:underline;">
            BOOK A CONSULTATION
        </a>
    </div>
</main>

<htmlpagefooter name="page-footer" id="footer">
    <!-- Intro -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="border-color: transparent!important; ">
            <td style="background: url({{asset("images/logos/blackfooter.jpg")}}) no-repeat center center; background-size: cover; border-radius: 0px 0px 25px 25px;"
                class="p30-15 bbrr">
                <table style="color: lightgrey; padding: 15px 0px;" width="100%" border="0"
                       cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="text-footer1 pb10 bizimfont"
                            style="font-size:16px; line-height:30px; text-align:center;">
                            PBS.NYC - Proactive Building Solutions
                            <p style="font-size:14px;width: 100%;text-align:center !important;">
                                22 E 41st Street, Third Floor
                                New York NY 10017
                                <br/>
                                212-271-6837
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-footer2 bizimfont"
                            style="font-size:14px; font-weight: bold;padding-right:30px;line-height:26px;text-align: right; ">
                                {PAGENO}/{nbpg}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

</htmlpagefooter>

</body>
</html>

