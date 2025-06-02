<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;

class Fix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'view config route clear';

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
// Create your own custom command
    public function handle(){
        $this->call('cache:clear');
        $this->call('view:clear');
        $this->call('optimize:clear');
        $this->call('config:cache');
        Log::debug('cache cleared at :'.now());


//        exec('php artisan route:clear');
//        exec('php artisan cache:clear');
//        exec('php artisan view:clear');
//        exec('php artisan config:cache');
        $this->info('Temizlik yapildi ve optimize edildi');
    }
}
