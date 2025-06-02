<?php

namespace App\Console\Commands;

use App\Models\Property;
use App\Notifications\NewAlertNotification;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class SendAlerts extends Command
{

    use ActivityLogger;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sendalerts {currentprops}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Instant Alerts';


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
        $currentprops = $this->argument('currentprops');
        $totalCount = DB::table('alert_collector')->count();
        Log::debug("Send Alerts Started : " . now() . " Total Alert : " . $totalCount);
        if ($totalCount > 0) {
            $users = User::all();
            foreach ($users as $user) {
                if ($user->level() > 2) {
                    $bins = collect($user->properties()->whereNotNull('summary_sent_at')->pluck('bin'));
                    $bbls = collect($user->properties()->whereNotNull('summary_sent_at')->pluck('bbl'));
                    $result = DB::table('alert_collector')->whereIn('bin', $bins)->orWhereIn('bbl', $bbls)->get();
                    $this->activity("New " . $result->count() . " alert found for " . $user->name);
                    if ($result->count()) {
                        foreach ($result->pluck('dataset')->unique() as $dataset) {
                            $updates = "";
                            $newalerts = "";
                            foreach ($result->where('dataset', $dataset) as $alert) {
                                $property = Property::where('bbl', $alert->bbl)->orWhere('bin', $alert->bin)->first();
                                $item = new $dataset(json_decode($alert->original_data, true));
                                $changes = json_decode($alert->dirty_data, true);
                                if ($changes) {

                                    try {
                                        $updates .= view($item->mailview, ['item' => $item, 'user' => $user, 'property' => $property, 'changes' => $changes, 'subject' => $item->getMailSubject($changes ? true : false)])->render();
                                    } catch (\Exception $exception) {
                                        $this->activity($exception->getMessage(), $exception->getTraceAsString());
                                    }
                                } else {
                                    try {
                                        $newalerts .= view($item->mailview, ['item' => $item, 'user' => $user, 'property' => $property, 'changes' => $changes, 'subject' => $item->getMailSubject($changes ? true : false)])->render();
                                    } catch (\Exception $exception) {
                                        $this->activity($exception->getMessage(), $exception->getTraceAsString());
                                    }
                                }
                            }
                            $item = new $dataset([]);
                            if ($updates) {
//                                $testuser = User::whereId(62)->first();
//                                $testuser->notify(new NewAlertNotification($testuser, $updates, $item->getMailSubject(true), false));
                                try {
                                    $user->notify(new NewAlertNotification($user, $updates, $item->getMailSubject(true), false));
                                } catch (\Exception $exception) {
                                    $this->activity($exception->getMessage(), $exception->getTraceAsString());
                                }
                            }
                            if ($newalerts) {
//                                $testuser = User::whereId(62)->first();
//                                $testuser->notify(new NewAlertNotification($testuser, $newalerts, $item->getMailSubject(false), true));
                                try {
                                    $user->notify(new NewAlertNotification($user, $newalerts, $item->getMailSubject(false), true));
                                } catch (\Exception $exception) {
                                    $this->activity($exception->getMessage(), $exception->getTraceAsString());
                                }
                            }
                        }

                    }
                }
            }
            try {
                DB::table('alert_collector')->truncate();
            } catch (\Exception $exception) {
                $this->activity($exception->getMessage(), $exception->getTraceAsString());
            }
        }
        Log::debug("Send Alerts Bitti : " . now());
        Property::whereIn('bin', $currentprops['bins']
        )->orWhereIn('bbl', $currentprops['bbls'])
            ->update(['sync_at' => now()]);
        return true;
    }
}
