<?php


namespace App\Helpers;


use App\User;
use Carbon\Carbon;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use MailchimpMarketing\ApiClient;

class Helper
{
    public static function carbonParseYmd($tarih)
    {
     return $tarih == null ? null : Carbon::parse($tarih)->format("Y-m-d");
    }

    public static function carbonParseYmdhsi($tarih)
    {
        return $tarih == null ? null : Carbon::parse($tarih)->format("Y-m-d H:s:i");
    }

    public static function getMailChimpInstance()
    {
        $mailchimp = new ApiClient();
        $mailchimp->setConfig(['apiKey' => config('newsletter.apiKey'),
            'server' => 'us3']);
        return $mailchimp;
    }

    public static function dosyaikonu($request)
    {
        switch ($request) {
            case "image/jpeg":
            case "image/png":
                return "<i style='color: darkblue' class='fas fa-file-image'></i>";

                break;
            case "application/msword":
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
            return "<i style='color: lightblue' class='fas fa-file-word'></i>";
                break;
            case "application/x-rar-compressed":
            case "application/zip":
                return "<i style='color:darkgreen' class='fas fa-file-archive'></i>";
                break;
            case "text/plain":
                return "<i style='color: rgba(0,0,0,0.49)' class='fas fa-file-alt'></i>";
                break;
            case "application/pdf":
                return "<i style='color: #8b0000' class='fas fa-file-pdf'></i>";
                break;

            default:
                return $request;
                break;
        }
    }

    public static function getBoroName($boroid)
    {
        switch ($boroid) {
            case 1:
                return "MANHATTAN";
                break;
            case 2:
                return "BRONX";
                break;
            case 3:
                return "BROOKLYN";
                break;
            case 4:
                return "QUEENS";
                break;
            case 5:
                return "STATEN IS";
                break;
            default:
                return "NULL";
                break;
        }
    }

    public static function getBoroAbbr($boroid)
    {
        switch ($boroid) {
            case 1:
                return "MN";
                break;
            case 2:
                return "BX";
                break;
            case 3:
                return "BK";
                break;
            case 4:
                return "QN";
                break;
            case 5:
                return "SI";
                break;
            default:
                return "";
                break;
        }
    }



    public static function getBoroId($boroname)
    {
        switch ($boroname) {
            case "MANHATTAN":
                return 1;
                break;
            case "BRONX":
                return 2;
                break;
            case "BROOKLYN":
                return 3;
                break;
            case "QUEENS":
                return 4;
                break;
            case "STATEN IS":
                return 5;
                break;
            default:
                return 0;
                break;
        }
    }



    public static function getServicesRequestsAgency($agency)
    {
        switch ($agency) {
            case "3-1-1":
                return "311";
                break;
            case "ACS":
                return "ADMINISTRATION FOR CHILDREN SERVICES";
                break;
            case "CEO":
                return "CENTER OF EMPLOYMENT OPPORTUNITIES";
                break;
            case "COIB":
                return "CONFLICTS OF INTEREST BOARD";
                break;
            case "DCA":
                return "DEPARTMENT OF CONSUMER AFFAIRS";
                break;
            case "DCAS":
                return "DEPARTMENT OF CITY WIDE ADMINISTRATIVE SERVICES";
                break;
            case "DCP":
                return "DEFERRED COMPENSATION PLANNING";
                break;
            case "DEP":
                return "DEPARTMENT OF ENVIRONMENTAL PROTECTION";
                break;
            case "DFTA":
                return "DEPARTMENT FOR THE AGING";
                break;
            case "DHS":
                return "DEPARTMENT OF HOMELESS SERVICES";
                break;
            case "DOB":
                return "DEPARTMENT OF BUILDINGS";
                break;
            case "DOE":
                return "DEPARTMENT OF EDUCATION";
                break;
            case "DOF":
                return "DEPARTMENT OF FINANCE";
                break;
            case "DOHMH":
                return "DEPARTMENT OF HEALTH";
                break;
            case "DOITT":
                return "DEPARTMENT OF INFORMATION TECHNOLOGY & TELECOMMUNICATIONS";
                break;
            case "DORIS":
                return "DEPARTMENT OF RECORDS AND INFORMATION SERVICES";
                break;
            case "DOT":
                return "DEPARTMENT OF TRANSPORTATION";
                break;
            case "DPR":
                return "DEPARTMENT OF PARKS & RECREATION";
                break;
            case "DSNY":
                return "DEPARTMENT OF SANITATION";
                break;
            case "DVS":
                return "DEPARTMENT OF VETERAN SERVICES";
                break;
            case "EDC":
                return "ECONOMIC DEVELOPMENT CORPORATION";
                break;
            case "FDNY":
                return "FDNY";
                break;
            case "HPD":
                return "HOUSING PRESERVATION DEPARTMENT";
                break;
            case "MAYORâS OFFICE OF SPECIAL ENFORCEMENT":
                return "MAYOR'S OFFICE OF SPECIAL ENFORCEMENT";
                break;
            case "HRA":
                return "HUMAN RESOURCES ADMINISTRATION";
                break;
            case "MOC":
                return "MANHATTAN OUTREACH CONSORTIUM";
                break;
            case "NYCEM":
                return "NYC EMERGENCY MANAGEMENT DEPARTMENT";
                break;
            case "NYPD":
                return "NEW YORK POLICE DEPARTMENT";
                break;
            case "OMB":
                return "OFFICE OF MANAGEMENT AND BUDGET";
                break;
            case "TAT":
                return "TAXES APPEALS TRIBUNAL";
                break;
            case "TAX":
                return "DEPARTMENT OF TAXATION AND FINANCE";
                break;
            case "TLC":
                return "TAXI & LIMOUSINE COMMISSION";
                break;
            default:
                return $agency;
                break;
        }
    }

    public static function getFullComplaintUnit($abbr)
    {
        switch ($abbr) {
            case "ELEVR":
                return "ELEVATOR";
                break;
            case "SEP":
                return "SPECIAL ENFORCEMENT PROGRAM";
                break;
            case "ST.IS":
                return "STATEN ISLAND CONSTRUCTION";
                break;
            case "QNS.":
                return "QUEENS CONSTRUCTION";
                break;
            case "BKLYN":
                return "BROOKLYN CONSTRUCTION";
                break;
            case "MAN.":
                return "MANHATTAN CONSTRUCTION";
                break;
            case "C & D":
                return "CRANES & DERRICKS";
                break;
            case "ELCTR":
                return "ELECTRICAL DIVISION";
                break;
            case "ERT":
                return "EMERGENCY RESPONSE TEAM";
                break;
            case "BRONX":
                return "BRONX CONSTRUCTION";
                break;
            case "BOILR":
                return "BOILER DIVISION";
                break;
            case "SCFLD":
                return "SCAFFOLDING DIVISION";
                break;
            case "EXEC":
                return "EXECUTIVE ORDER";
                break;
            case "EXCAV":
                return "EXCAVATION";
                break;
            case "BEST":
                return "CONSTRUCTION ENFORCEMENT";
                break;
            case "PLUMB":
                return "PLUMBING DIVISION";
                break;
            case "FEU":
                return "FORENSIC ENGINEERING UNIT";
                break;
            case "OBM":
                return "OFFICE BUILDING MARSHAL";
                break;
            case "FISP":
                return "FAÇADE UNIT";
                break;
            case "SCB":
                return "STRUCTURALLY COMPROMISED BUILDING UNIT";
                break;
            case "RWALL":
                return "RETAINING WALL UNIT";
                break;
            case "PADLK":
                return "PADLOCK ENFORCEMENT UNIT";
                break;
            case "CSC":
                return "CONSTRUCTION SAFETY COMPLIANCE";
                break;
            case "CEU":
                return "CONCRETE ENFORCEMENT UNIT";
                break;
            case "Q-L":
                return "QUALITY OF LIFE UNIT";
                break;
            default:
                return $abbr;
                break;
        }

    }


    public static function getOathHearingAgency($agency)
    {
        switch ($agency) {
            case "DEPT OF HEALTH":
            case "812 - DOHMH":
                return "DEPARTMENT OF HEALTH";
                break;

            case "BIC":
                return "BUSINESS INTEGRITY COMMISSION";
                break;

            case "DEPT OF BLDGS":
            case "DEPT. OF BUILDINGS":
            case "BUILDINGS DEPARTMENT":
                return "DEPARTMENT OF BUILDINGS";
                break;

            case "CONSUMER AFF":
                return "DEPARTMENT OF CONSUMER AFFAIRS";
                break;

            case "D.A. NEW YORK":
                return "NYC DISTRICT ATTORNEY'S OFFICE";
                break;

            case "DEPT OF CONSUMER AFFAIRS":
                return "DEPARTMENT CONSUMER BUILDINGS";
                break;

            case "DEPT OF TRANSPORTATION":
            case "DEPT OF TRAN":
                return "DEPT OF TRANSPORTATION";
                break;

            case "DOF-TOBACCO":
                return "DEPARTMENT OF FINANCE - TOBACCO";
                break;

            case "DOH/MENTAL HEALTH":
                return "DOH MENTAL HEALTH";
                break;

            case "DOITT":
                return "DEPARTMENT OF INFORMATION TECHNOLOGY & TELECOMMUNICATIONS";
                break;

            case "DSNY - SANITATION ENFORCEMENT AGENTS":
            case "SANITATION RECYCLING":
            case "SANITATION POLICE":
            case "SANITATION PIU":
            case "SANITATION OTHERS":
            case "SANITATION ENVIRON. POLICE":
            case "SANITATION DEPT":
            case "DSNY - SANITATION OTHERS":
            case "DOS - ENFORCEMENT AGENTS":
                return "DEPARTMENT OF SANITATION";
                break;

            case "ENV PROTECT":
                return "DEPARTMENT OF ENVIRONMENTAL PROTECTION";
                break;

            case "FIRE DEPARTMENT OF NYC":
            case "FIRE DEPARTMENT":
                return "FIRE DEPARTMENT";
                break;

            case "HAZ. MATERIALS":
                return "HAZARDOUS MATERIALS";
                break;

            case "HPD":
                return "HOUSING PRESERVATION & DEVELOPMENT";
                break;

            case "MAYOR'S OFFICE OF MIDTOWN ENFO":
                return "MAYOR'S OFFICE OF MIDTOWN ENFORCEMENT";
                break;

            case "NYC DDC":
                return "DEPARTMENT OF DESIGN & CONSTRUCTION";
                break;

            case "NYPD TRANSPORT INTELLIGENCE DI":
                return "NYC POLICE DEPARTMENT";
                break;

            case "PARKS - CAPITAL":
            case "PARKS DEPARTMENT":
            case "PARKS AND RECR":
                return "PARKS & RECREATION";
                break;

            case "PCS - DOHMH":
                return "DOHMH - PEST CONTROL";
                break;

            case "POLICE DEPT":
                return "POLICE DEPARTMENT";
                break;

            case "PORTS AND TRADE":
                return "DEPARTMENT OF PORTS AND TRADE";
                break;

            case "TAXI_NYPD":
                return "TAXI - NYPD";
                break;

            case "TAXI_Port Authority":
                return "TAXI - PORT AUTHORITY";
                break;

            case "TAXI_TLC":
                return "TAXI - TLC";
                break;

            case "VECTOR - DOHMH":
                return "DOHMH - VECTOR";
                break;

            case "VETERINARY-DOHMH":
                return "DOHMH - VETERINARY";
                break;

            case "WATER TANK - DOHMH":
                return "DOHMH - WATER TANK";
                break;
            default:
                return $agency;
                break;
        }

    }

    public static function sendNotification()
    {
        $token = User::find(1)->fcm_token;
        $notificationBuilder = new PayloadNotificationBuilder();
        $notificationBuilder->setTitle('Başlık')
            ->setBody('İçerik');

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $dataBuilder = new PayloadDataBuilder();


        $option = $optionBuilder->build();
        $data = $dataBuilder->build();
        $notification = $notificationBuilder->build();
        $downstreamResponse = FCM::sendTo($token, null, $notification, null);

        return $downstreamResponse;
//        return ['succes' => $downstreamResponse->numberSuccess(), 'fails' => $downstreamResponse->numberFailure(),
//            'modifies' => $downstreamResponse->numberModification()];
    }

}
