<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }


        body {
            margin-top: 0cm;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 0cm;
            font-size: 12pt;
            font-family: 'Muli', sans-serif !important;
        }
    </style>
    <script type="text/javascript">
        Function.prototype.bind = Function.prototype.bind || function (thisp) {
            var fn = this;
            return function () {
                return fn.apply(thisp, arguments);
            };
        };

        var pdfInfo = {};
        var x = document.location.search.substring(1).split('&');
        for (var i in x) {
            var z = x[i].split('=', 2);
            pdfInfo[z[0]] = unescape(z[1]);
        }

        function getPdfInfo() {
            var page = pdfInfo.page || 1;
            var pageCount = pdfInfo.topage || 1;
            document.getElementById('page').textContent = page;
            document.getElementById('topage').textContent = pageCount;
        }
    </script>
</head>
<body  onload="getPdfInfo()">
<div style="position:relative;width:100%!important;height: 200px!important; background-color: black; background-size: cover;">
    <!-- Intro -->
    <table height="200px" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr style="border-color: transparent!important; ">
            <td class="p30-15 bbrr">
                <table style="color: lightgrey; padding: 15px 0px;" width="100%" border="0"
                       cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="text-footer1 pb10 bizimfont"
                            style="font-size:16px; line-height:30px; text-align:center;">
                            PBS.NYC - Proactive Building Solutions
                            <p style="font-size:14px;width: 100%;text-align:center !important;">
                                22 E 41st Street, Third Floor New York NY 10017
                                <br/>
                                212-271-6837
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-footer2 bizimfont"
                            style="font-size:14px; font-weight: bold;padding-right:30px;line-height:26px;text-align: right; ">
                            Page <span id="page"></span> of <span id="topage"></span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>