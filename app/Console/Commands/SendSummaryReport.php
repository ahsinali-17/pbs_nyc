<?php

namespace App\Console\Commands;

use App\Notifications\SummaryReport;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class SendSummaryReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:summaryreport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Summary Report';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (Queue::size('oDataSync') < 2) {
            ini_set('memory_limit', '4096M');
            ini_set('max_execution_time', '600');
            Log::debug("Send Summary Started : " . now());

//            $users = User::whereIn('id', Property::with('user')->whereNotNull('sync_at')->whereNull('summary_sent_at')->get()->pluck('user')->flatten()->pluck('id')->unique()->flatten())->get();
            $users = User::whereHas('properties', function ($query) {
                $query->whereNotNull('sync_at')->whereNull('summary_sent_at');
            })->get();
//            $options = [
//                'header-html' => view('pdf.summary-header'),
//                'footer-html' => view('pdf.summary-footer'),
//                'orientation' => 'portrait',
//                'encoding' => 'UTF-8',
//                'margin-top' => 45,
//                'margin-left' => 0,
//                'margin-right' => 0,
//                'margin-bottom' => 40,
//                'header-spacing' => 5,
//                'footer-spacing' => 5,
//                'user-style-sheet' => base_path('/public/css/bootstrap.css'),
//            ];
//        $testuser = User::whereId(62)->first();
            $users->map(function ($user) {
//                Log::debug("User->load started:->" . now());
//                $user->load('properties');
//                Log::debug("User->load finished/ summary started:->" . now());
//                $pdf = \PDF::loadView('pdf.NEWnewSummaryPdf', compact("user"));
//                Log::debug("newsummary finished:->" . now());
//                $pdf->setOptions($options);
//            $testuser->notify(new SummaryReport($user, $pdf));
                Log::debug("notify started" . now());
                $user->notify(new SummaryReport($user));
                Log::debug("notify finished" . now());
                $user->properties()->update(['summary_sent_at' => now()]);
            });

            Log::debug("Send Summary finished : " . now());
            return true;
        }

    }
}
