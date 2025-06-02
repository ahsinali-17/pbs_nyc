<?php

namespace App\Jobs;

use App\Models\Property;
use App\Notifications\SummaryReport;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSummary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $users;
    protected $syncdate;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users,$syncdate)
    {
        //
        $this->syncdate = $syncdate;
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $users = User::whereIn('id', Property::with('user')->where('sync_at', null)->get()->pluck('user')->flatten()->pluck('id')->unique()->flatten())->get();

//        $options = [
//            'header-html' => view('pdf.summary-header'),
//            'footer-html' => view('pdf.summary-footer'),
//            'orientation' => 'portrait',
//            'encoding' => 'UTF-8',
//            'margin-top' => 45,
//            'margin-left' => 0,
//            'margin-right' => 0,
//            'margin-bottom' => 40,
//            'header-spacing' => 5,
//            'footer-spacing' => 5,
//            'user-style-sheet' => base_path('/public/css/bootstrap.css'),
//        ];

        $this->users->map(function ($user) {
            if ($user->level() > 2){
//            $user->load('properties');
//            $pdf = \PDF::loadView('pdf.NEWnewSummaryPdf', compact("user"));
//            $pdf->setOptions($options);
            $user->notify(new SummaryReport($user));
            $user->properties()->where('created_at','<',$this->syncdate)->update(['sync_at' => $this->syncdate]);
            }
        });
    }
}
