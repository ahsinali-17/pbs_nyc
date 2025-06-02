<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsEmail;
use App\Models\Blog\Article;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    //

    public function getProperties(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $user->properties()->withoutAll()->with(['documents','notes','summary'])->get(),
        ]);
    }

    public function getCurrentUser(Request $request)
    {
        if (!User::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required'
            ], 422);
        }

        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();

        return $user;
    }

    public function getDobViolations($buildingid = null)
    {
        $user = Auth::user();
        $properties = null;
        if ($buildingid)
            $properties = $user->properties()->where('id', $buildingid)->withoutAll(['address', 'dobViolations'])->get();
        else
            $properties = $user->properties()->withoutAll(['address', 'dobViolations'])->get();

        $data = [];
        foreach ($properties as $property) {

            foreach ($property->dobViolations as $item) {
                $obj = new \stdClass();
                $obj->address = $property->house_number . " " . $property->stname;
                $obj->issueDate = $item->issueDate();
                $obj->device_number = $item->device_number;
                $obj->description = $item->description;
                $obj->number = $item->number;
                $obj->violation_category = $item->violation_category;
                $obj->violation_type = $item->violation_type;
                $obj->status = $item->disposition_date == null ? "OPEN" : "CLOSED";
                array_push($data, $obj);
            }
        }
        return response()->json(['data' => $data]);
    }

    public function getDOBviols(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        //address,issue_date,device#,description,number,violation_category,violation_type,status
        $property = $user->properties()->where('id', $request->property_id)->withoutAll([])->with(['dobViolations' => function ($query) {
            $query->where('disposition_date', null)->orderBy('issue_date', 'desc');
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobViolations : [],
        ]);

    }

    public function getDOBswo(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobComplaints' => function ($query) {
            $query->whereHas('complaintCode', function ($subque) {
                $subque->swo();
            });
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobComplaints : [],
        ]);
    }

    public function getDOBcomplaints(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobComplaints'])->first();
        $complaints = array_values($property->dobComplaints->filter(function ($item) {
            return $item->status != 'CLOSED' && (($item->complaintCode != null && !Str::contains($item->complaintCode->description, 'ORDER')) || $item->complaintCode == null);
        })->toArray());
        $property->unsetRelation('dobComplaints');
        $property->dob_complaints = $complaints;


        return response()->json([
            'success' => true,
            'data' => $complaints
        ]);
    }

    public function getECBhearings(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getECBpenalties(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->where('compliance_status', 'LIKE', '%due%')->orWhere('compliance_status', 'LIKE', '%DUE%')->orWhere('compliance_status', 'LIKE', '%Due%');
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getECBdefaulted(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->where('hearing_result', 'LIKE', '%DEFAULTED%')->orWhere('hearing_result', 'LIKE', '%Defaulted%')->orWhere('hearing_result', 'LIKE', '%defaulted%');
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getECBimposed(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->imposed();
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getECBoverpaid(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->whereRaw('balance_due::int < 0');
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getECBcorrections(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->where('hearing_result', '<>', 'DISMISSED');
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getECBcomplaints(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['serviceRequests311' => function ($query) {
            $query->closed();
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->serviceRequests311 : [],
        ]);
    }

    public function getECBviolations(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['ecbViolations'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->ecbViolations : [],
        ]);
    }

    public function getFDNYhearings(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->where('issuing_agency', 'like', '%FIRE%')->orWhere('issuing_agency', 'like', '%fire%')->orWhere('issuing_agency', 'like', '%Fire%');
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getFDNYcorrections(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->where('hearing_result', '<>', 'DISMISSED')->whereRaw("issuing_agency like '%FIRE%' or issuing_agency like '%fire%' or issuing_agency like '%Fire%'");
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getFDNYpenalties(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['oathHearings' => function ($query) {
            $query->where(function ($subque) {
                $subque->where('compliance_status', 'like', '%Due%')->orWhere('compliance_status', 'like', '%DUE%')->orWhere('compliance_status', 'like', '%due%');
            })->whereRaw("issuing_agency like '%FIRE%' or issuing_agency like '%fire%' or issuing_agency like '%Fire%'");
        }])->first();

        return response()->json([
            'success' => true,
            'data' => $property ? $property->oathHearings : [],
        ]);
    }

    public function getFDNYviolationorders(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['fdnyActiveViolOrders'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->fdnyActiveViolOrders : [],
        ]);
    }

    public function getFDNYcomplaints(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['serviceRequests311' => function ($query) {
            $query->where('agency', 'FDNY')->closed();
        }])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->serviceRequests311 : [],
        ]);
    }

    public function getHPDviolations(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['hpdViolations'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->hpdViolations : [],
        ]);
    }

    public function getHPDcomplaints(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['hpdComplaints'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->hpdComplaints : [],
        ]);
    }

    public function getHPDrepairs(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['hpdEmergencyRepairs'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->hpdEmergencyRepairs : [],
        ]);
    }

    public function getHPDlitigations(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['hpdHousingLitigations'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->hpdHousingLitigations : [],
        ]);
    }

    public function getHPDregistrations(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['hpdDwellingRegistrations'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->hpdDwellingRegistrations : [],
        ]);
    }

    public function getInspectionsDOBboiler(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobNowSafetyBoiler'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobNowSafetyBoiler : []
        ]);
    }

    public function getInspectionsDEPboiler(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['depCatsPermits'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->depCatsPermits : [],
        ]);
    }

    public function getInspectionsFacade(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobNowFacadeFilings'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobNowFacadeFilings : [],
        ]);
    }

    public function getInspectionsOthers(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['otherInspections'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->otherInspections : [],
        ]);
    }

    public function getPermitsDOBpermits(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobPermits'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobPermits : [],
        ]);
    }

    public function getPermitsDOBNOWpermits(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobNowApprovedPermits'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobNowApprovedPermits : [],
        ]);
    }

    public function getPermitsDOBElevatorpermits(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobNowElevatorPermits'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobNowElevatorPermits : [],
        ]);
    }

    public function getPermitsDOBahv(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobPermits'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobPermits : [],
        ]);
    }

    public function getPermitsFDNYAccount(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['FdnyCertOfFitness'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->FdnyCertOfFitness : [],
        ]);
    }

    public function getPermitsElevator(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobNowElevatorPermits'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobNowElevatorPermits : [],
        ]);
    }

    public function getDobJobFilings(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }
        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobJobFilings'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobJobFilings : [],
        ]);
    }

    public function getDobNowJobFilings(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['dobNowJobFilings'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->dobNowJobFilings : [],
        ]);
    }

    public function getBsaApplicationStatus(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $property = $user->properties()->where('id', $request->property_id)->withoutAll()->with(['bsaApplicationStatus'])->first();
        return response()->json([
            'success' => true,
            'data' => $property ? $property->bsaApplicationStatus : [],
        ]);
    }

    public function getLastArticles(Request $request)
    {
        $articles = Article::latest()->where('isActive', true)->limit(5)->get(['id', 'title', 'featured', 'updated_at']);
        return response()->json([
            'success' => true,
            'data' => $articles ? $articles : [],
        ]);
    }

    public function getArticleContent(Request $request)
    {
        $article = Article::where('id', $request->article_id)->get()->first();
        return response()->json([
            'success' => true,
            'data' => $article ? $article->content : "",
        ]);
    }

    public function contactUs(Request $request)
    {
        Mail::to('info@pbs.nyc')->send(new ContactUsEmail($request->name, $request->email, $request->phone, $request->subject, $request->details));
        return response()->json([
            'success' => true,
            'data' => true,
        ]);
    }

    public function getNotifications(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $notifications = $user->notifications()->where('created_at', '>', now()->addDays(-8))->whereNull('read_at')->get();

        $daily = $notifications->groupby(function ($val) {
            return Carbon::parse($val->created_at)->format('y-m-d');
        })->map->count();

        return response()->json([
            'success' => true,
            'data' => ['notifications' => $notifications ? $notifications : [], 'daily' => $daily],
        ]);
    }

    public function readNotification(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user instanceof User) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication error.',
            ]);
        }

        $notification = $user->notifications()->where('id', $request->notification_id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json([
            'success' => true,
        ]);
    }


}
