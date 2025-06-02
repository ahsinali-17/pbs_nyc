<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateOrCreateODataModel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $model;
    public $result;
    public $keyname;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model, $result)
    {
        $this->model = $model;
        $this->result = $result;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $model = new $this->model();
        $model->insertData($this->result);
    }
}
