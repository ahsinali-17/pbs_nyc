<?php

namespace App\Console\Commands;

use App\Notifications\DailyReport;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendDailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:dailyreport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Daily Report';

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
        $users = User::all();

        $users->map(function ($user) {
            $notification = $user->notifications()->orderby('id', 'desc')->first();
            if ($notification) {
                $date = $notification->created_at;
            }else{
                $date = Carbon::now();
            }
            $properties = $user->properties()->get();
            $alerts = array();
            foreach ($properties as $property) {
                $count = 0;
                $count += $property->dobViolations()->new($date)->count();
                $count += $property->dobComplaints()->new($date)->count();
                $count += $property->ecbViolations()->new($date)->count();
                $count += $property->hpdComplaints()->new($date)->count();
                $count += $property->hpdViolations()->new($date)->count();
                $count += $property->oathHearings()->new($date)->count();
                if ($count > 0) {
                    array_push($alerts, $property);
                }
            }

            if (sizeof($alerts) > 0) {
                $user->notify((new DailyReport($alerts, $user, $date))->delay(now()->addMinutes(mt_rand(0,5))));
            }

        });
    }
}
