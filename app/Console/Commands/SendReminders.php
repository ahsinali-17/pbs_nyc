<?php

namespace App\Console\Commands;

use App\Models\DepCatsPermits;
use App\Models\DobNowFacadeFilings;
use App\Models\DobNowSafetyBoiler;
use App\Models\OtherInspections;
use App\Models\Property;
use App\Notifications\ReminderNotification;
use App\Notifications\SummaryReport;
use App\User;
use Illuminate\Console\Command;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Reminders';

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
        //DOB BOİLER
        $dobBoilerReminder = DobNowSafetyBoiler::distinctOn('boiler_id,inspection_type')->orderBy('boiler_id')->orderBy('inspection_type')->orderByRaw("TO_DATE(inspection_date::text,'MM/DD/YYYY HH24:MI:SS') DESC")->whereRaw("EXTRACT(year from TO_DATE(inspection_date::text,'MM/DD/YYYY HH24:MI:SS')) < " . now()->format('Y'))->get();
        $today = now()->format('m-d');
        if ($today == '06-30' || $today == '09-30' || $today == '11-30' || $today == '12-15') {
//            sendalert
            foreach ($dobBoilerReminder as $boiler) {
                foreach ($boiler->properties as $property) {
                    $property->user->notify(new ReminderNotification($property, $boiler, false));
                }
            }
        }

        //DEP BOİLER
        $depBoilerReminder = DepCatsPermits::where('status', 'LIKE', '%CURRENT%')->get();
        $today = now();
//            sendalert
        foreach ($depBoilerReminder as $boiler) {
            if ($today->addMonths(12)->format('Y-m-d') == $boiler->expirationDate() ||
                $today->addMonths(6)->format('Y-m-d') == $boiler->expirationDate() ||
                $today->addMonths(3)->format('Y-m-d') == $boiler->expirationDate() ||
                $today->addMonths(1)->format('Y-m-d') == $boiler->expirationDate() ||
                $today->addWeeks(2)->format('Y-m-d') == $boiler->expirationDate() ||
                $today->addWeeks(1)->format('Y-m-d') == $boiler->expirationDate()) {

                foreach ($boiler->properties as $property) {
                    $property->user->notify(new ReminderNotification($property, $boiler, false));
                }

            }
        }

        //DEP BOİLER EXPİREDS
        $depBoilerExpireds = DepCatsPermits::where('status', 'LIKE', '%EXPIRED%')->get();
        $today = now();
        foreach ($depBoilerExpireds as $boiler) {
            if ($today->format('d') == '15') {
                foreach ($boiler->properties as $property) {
                    $property->user->notify(new ReminderNotification($property, $boiler, true));
                }
            }
        }


        //FAÇADE
        $facadeExpiredReminder = DobNowFacadeFilings::whereRaw("TO_DATE(submitted_on::text,'YYYY-MM-DD HH24:MI:SS') < TO_DATE('" . now()->addYears(-5)->format('Y-m-d') . "'::text,'YYYY-MM-DD')")->get();
        $today = now();
        foreach ($facadeExpiredReminder as $facade) {
            if ($today->format('d') == '15') {
                foreach ($facade->properties as $property) {
                    $property->user->notify(new ReminderNotification($property, $facade, true));
                }
            }
        }

        $facadeReminder = DobNowFacadeFilings::whereRaw("TO_DATE(submitted_on::text,'YYYY-MM-DD HH24:MI:SS') > TO_DATE('" . now()->addYears(-5)->format('Y-m-d') . "'::text,'YYYY-MM-DD')")->get();
        $today = now();
        foreach ($facadeReminder as $facade) {
            if ($today->addYears(-3)->format('Y-m-d') == $facade->submittedOn() ||
                $today->addYears(-2)->format('Y-m-d') == $facade->submittedOn() ||
                $today->addYears(-1)->format('Y-m-d') == $facade->submittedOn() ||
                $today->addMonths(-6)->format('Y-m-d') == $facade->submittedOn() ||
                $today->addMonths(-3)->format('Y-m-d') == $facade->submittedOn() ||
                $today->addMonths(-1)->format('Y-m-d') == $facade->submittedOn() ||
                $today->addWeeks(-2)->format('Y-m-d') == $facade->submittedOn()) {

                foreach ($facade->properties as $property) {
                    $property->user->notify(new ReminderNotification($property, $facade, false));
                }

            }
        }
        //OTHERS
        $others = OtherInspections::where('alert_date', now()->format('Y-m-d'))->get();
        foreach ($others as $other) {
            $property = $other->property;
            $property->user->notify(new ReminderNotification($property, $other, false));
        }
    }
}
