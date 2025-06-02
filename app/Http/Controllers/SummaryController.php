<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class SummaryController extends Controller
{

    public function summary()
    {
        $user = User::where('id',28)->first();
        $user->load('properties');
//        $user->load(['properties'=>function($query) {
//            $query->withoutAll(['address','ecbViolations','dobComplaints','oathHearings','serviceRequests311']);
//        }]);
        $options = [
            'header-html' => view('pdf.summary-header'),
            'footer-html' => view('pdf.summary-footer'),
            'orientation' => 'portrait',
            'encoding' => 'UTF-8',
            'margin-top' => 45,
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-bottom' => 40,
            'header-spacing' => 5,
            'footer-spacing' => 5,
            'user-style-sheet' => base_path('/public/css/bootstrap.css'),
        ];
//        return view('pdf.NEWnewSummaryPdf', compact("user"));
        $pdf = \PDF::loadView('pdf.NEWnewSummaryPdf', compact("user"));
        $pdf->setOptions($options);
        return $pdf->inline('document.pdf');
    }


}
