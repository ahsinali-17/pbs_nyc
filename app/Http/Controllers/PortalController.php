<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kordy\Ticketit\Controllers\TicketsController;
use Kordy\Ticketit\Helpers\LaravelVersion;
use Cache;
use Carbon\Carbon;
use Kordy\Ticketit\Models;
use Kordy\Ticketit\Models\Agent;
use Kordy\Ticketit\Models\Category;
use Kordy\Ticketit\Models\Setting;
use Kordy\Ticketit\Models\Setting as Table;
use Kordy\Ticketit\Models\Ticket;

class PortalController extends Controller
{
    //

    public function index()
    {
        return $this->profile();
//        $user = auth()->user();
//        $user->load(['properties'=>function($query) {
//            $query->withoutAll(['address','ecbViolations']);
//        }]);
//        return view('portal.profile',compact('user'));
    }
    public function create()
    {
        $address = request()->address;
        list($priorities, $categories) = $this->PCS();

        return view('ticketit::tickets.create', compact('priorities', 'categories', 'address'));
    }

    protected function PCS()
    {
        // seconds expected for L5.8<=, minutes before that
        $time = LaravelVersion::min('5.8') ? 60*60 : 60;


        $priorities = Cache::remember('ticketit::priorities', $time, function () {
            return Models\Priority::all();
        });

        $categories = Cache::remember('ticketit::categories', $time, function () {
            return Models\Category::all();
        });

        $statuses = Cache::remember('ticketit::statuses', $time, function () {
            return Models\Status::all();
        });

        if (LaravelVersion::min('5.3.0')) {
            return [$priorities->pluck('name', 'id'), $categories->pluck('name', 'id'), $statuses->pluck('name', 'id')];
        } else {
            return [$priorities->lists('name', 'id'), $categories->lists('name', 'id'), $statuses->lists('name', 'id')];
        }
    }


    public function notifications()
    {
        $user = auth()->user();
        $user->load(['properties' => function ($query) {
            $query->withoutAll(['address', 'ecbViolations']);
        }]);
        return view('portal.content.notifications', compact('user'));
    }

    public function recordsQuickview()
    {
        $user = auth()->user();
        $user->load(['properties' => function ($query) {
            $query->withoutAll(['address', 'ecbViolations']);
        }]);
        return view('portal.content.recordsQuickview', compact('user'));
    }

    public function buildingQuickview()
    {
        $user = auth()->user();
        $user->load(['properties' => function ($query) {
            $query->withoutAll(['address', 'ecbViolations']);
        }]);
        return view('portal.content.building-quickview', compact('user'));
    }


    public function properties()
    {
        $properties = Auth::user()->properties()->withoutAll(['address'])->get();
        return view('portal.properties', compact('properties'));
    }

    public function profile()
    {
        $user = auth()->user();
        $user->load(['properties' => function ($query) {
            $query->withoutAll(['address', 'ecbViolations', 'dobComplaints']);
        }]);
        return view('portal.profile', compact('user'));
    }

}
