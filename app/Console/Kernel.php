<?php

namespace App\Console;

use App\Console\Commands\OpenDataSync;
use App\Console\Commands\QueueWorkoData;
use App\Console\Commands\SendAlerts;
use App\Console\Commands\Fix;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Queue;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        OpenDataSync::class,
        //SendSummaryReport::class,
        SendAlerts::class,
        Fix::class,
        QueueWorkoData::class

    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (!Queue::size('oDataSync')) {
            $schedule->command('queuework:odata')->everyMinute()->withoutOverlapping(60)->then(function () {
                Artisan::call('queue:work --stop-when-empty --queue=oDataSync --tries=3');
            });
        }else{
            Artisan::call('queue:work --stop-when-empty --queue=oDataSync --tries=3');
        }
//        $schedule->command('queue:work --queue=oDataSync --stop-when-empty')->everyMinute()->withoutOverlapping(60);
//        $schedule->command('mail:sendalerts')->everyMinute()->withoutOverlapping(60)->runInBackground();
//        $schedule->command('mail:summaryreport')->everyMinute()->withoutOverlapping(60);

        $schedule->command('queue:work --queue=default --stop-when-empty --tries=3')->everyMinute()->withoutOverlapping(60)->runInBackground();
        $schedule->command('send:reminders')->dailyAt('12:00')->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
