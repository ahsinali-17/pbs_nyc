<?php

namespace App\Observers;

use App\Models\ODataModel;
use Illuminate\Support\Facades\DB;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class AlertObserver
{
    use ActivityLogger;

    /**
     * Handle the ODataModel "created" event.
     *
     * @param \App\ODataModel $oDataModel
     * @return void
     */
    public function created(ODataModel $oDataModel)
    {
//        Log::debug('create : ' . $oDataModel->toJson());

        DB::insert('insert into alert_collector (bin, bbl,dataset,dirty,original_data,dirty_data) values (?, ?,?,?,?,?)',
            [$oDataModel->bin,
                $oDataModel->bbl,
                $oDataModel->getMorphClass(),
                false,
                json_encode($oDataModel),
                null,
            ]);

        $this->activity("New alert created on " . $oDataModel->getMorphClass(), json_encode($oDataModel));
    }

    /**
     * Handle the ODataModel "updated" event.
     *
     * @param \App\ODataModel $oDataModel
     * @return void
     */
    public function updated(ODataModel $oDataModel)
    {
//        Log::debug('update : ' . $oDataModel->toJson());
//        $bin = $oDataModel->dataColumn == "bin" ? $oDataModel->bin : null;
//        $bbl = $oDataModel->dataColumn == "bbl" ? $oDataModel->bbl : null;

        $dirty = $oDataModel->getDirty();
        if ($oDataModel->shouldNotify($dirty)) {

            foreach ($oDataModel->getDirty() as $attr => $value) {
                $dirty[$attr] = $oDataModel->getOriginal($attr);
            }

            DB::insert('insert into alert_collector (bin, bbl,dataset,dirty,original_data,dirty_data) values (?, ?,?,?,?,?)',
                [$oDataModel->bin,
                    $oDataModel->bbl,
                    $oDataModel->getMorphClass(),
                    $oDataModel->isDirty(),
                    json_encode($oDataModel),
                    json_encode($dirty),
                ]);
            $this->activity("Updated fields on " . $oDataModel->getMorphClass() . " : " . json_encode($dirty), json_encode($oDataModel));
        }

    }

    /**
     * Handle the ODataModel "deleted" event.
     *
     * @param \App\ODataModel $oDataModel
     * @return void
     */
    public function deleted(ODataModel $oDataModel)
    {
        //
    }

    /**
     * Handle the ODataModel "restored" event.
     *
     * @param \App\ODataModel $oDataModel
     * @return void
     */
    public function restored(ODataModel $oDataModel)
    {
        //
    }

    /**
     * Handle the ODataModel "force deleted" event.
     *
     * @param \App\ODataModel $oDataModel
     * @return void
     */
    public function forceDeleted(ODataModel $oDataModel)
    {
        //
    }
}
