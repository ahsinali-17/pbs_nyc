<?php


namespace App\Models;


use allejo\Socrata\SodaClient;
use allejo\Socrata\SodaDataset;
use allejo\Socrata\SoqlOrderDirection;
use allejo\Socrata\SoqlQuery;
use App\Jobs\UpdateOrCreateODataModel;
use App\Mail\AlertServiceEmail;
use App\Notifications\AlertNotification;
use App\OpenDataSet;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Class ODataModel
 * @package App\Models
 */
abstract class ODataModel extends Model
{

    public $incrementing = false;
    public $subject = "New Alert Received!";
    public $updateSubject = "New Alert Received!";
    public $reminderSubject = "New Reminder Received!";
    public $mailview = 'mails.testmail';
    protected $apiUrl = "data.cityofnewyork.us";
    protected $datasetName = "ODataModel";
    protected $datasetId = "eabe-havv";
    protected $dataColumn = "bin";
    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'daily';
    protected $appToken = "Ed2cCypePkwVskFz8gYYJKRhw";
    protected $selectables = [];
    protected $notifiables = [];
    protected $order = "";

    public function getReminderSubject()
    {
        return $this->reminderSubject;
    }

    public function getMailSubject($isUpdate)
    {
        if ($isUpdate)
            return $this->updateSubject;
        else
            return $this->subject;
    }

    public function sendAlertMail()
    {
        foreach ($this->properties as $property) {
            if ($property->sync_at) {
                $user = $property->user;
                Mail::queue(new AlertServiceEmail($this, $user, $property));
            }
        }
    }


    public function sendAlertNotification($changes = false)
    {
        foreach ($this->properties as $property) {
            if ($property->sync_at && ($property->alerted_at == null || $property->alerted_at->addMinutes(intval(Settings::get($this->datasetId))) <= now())) {
                $property->update(['alerted_at' => now()]);
                $user = $property->user;
                if ($user->level() > 2)
                    $user->notify(new AlertNotification($this, $user, $property, $changes));
            }
        }
    }

    public function properties()
    {
        return $this->hasMany('App\Models\Property', $this->dataColumn, $this->dataSocrataKey)->setEagerLoads([]);
    }

    public function scopeIsNew(Builder $builder, $date)
    {
        return ($builder->where('updated_at', '>', $date)->count() > 0);
    }

    public function scopeNew(Builder $builder, $date)
    {
        return $builder->where('updated_at', '>', $date);
    }

    public function scopeSummary($query)
    {
        return $query;
    }

    public function insertData($result)
    {
        try {
            if (is_array(self::getKeyName()))
                self::updateOrCreate(array_intersect_key($result, array_flip(self::getKeyName())), $result);
            else
                self::updateOrCreate([self::getKeyName() => $result[self::getKeyName()]], $result);
        } catch (Exception $exception) {
            Log::debug(json_encode($result));
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
        }
    }

    public function shouldNotify($changes)
    {
        if ($changes)
            return count(array_intersect($this->notifiables, array_keys($changes))) > 0;
        else
            return false;
    }

    protected function syncData($force = false)
    {
        $this->dataSync($force);
    }

    protected function dataSync($force = false)
    {
        if ($this->isUpToDateAndNoNewProperty() && !$force) {
            echo $this->getMorphClass() . " is UP TO DATE. \n";
            return;
        }

        echo $this->getMorphClass() . " sync STARTED. \n";

        // Create a client with information about the API to handle tokens and authentication
        $sc = new SodaClient($this->apiUrl, $this->appToken);

        // Access a dataset based on the API end point
        $ds = new SodaDataset($sc, $this->datasetId);

        // Create a SoqlQuery that will be used to filter out the results of a dataset
        $soql = new SoqlQuery();

        // Write a SoqlQuery naturally
        $soql->select($this->selectables)
            ->where($this->getWhereString($force))
            ->limit(100000);

//        dd($soql);
        // Log::info(print_r($soql)); //TODO silmeyi unutma

        if ($this->order)
            $soql->order($this->order, SoqlOrderDirection::DESC);


        // Fetch the dataset into an associative array
        $results = 0;
        try {
            $results = $ds->getDataset($soql);
            if ($results != null && sizeof($results) > 0)
                $this->insertSyncData($results);

            echo $this->getMorphClass() . " SYNCED. \n";
            OpenDataSet::updateOrCreate(['api_id' => $this->datasetId], ['api_id' => $this->datasetId, 'name' => $this->datasetName, 'last_sync' => now()]);
            echo $this->getMorphClass() . " is UPDATED. \n";//$results;
        } catch (Exception $e) {
            echo $this->getMorphClass() . " not updated. \n";
            echo $e->getTraceAsString() . "\n";
            Log::error($e->getTraceAsString());
        }
        return;
    }

    protected function isUpToDateAndNoNewProperty()
    {
        try {
            $last_sync = OpenDataSet::where(['api_id' => $this->datasetId])->firstOrFail()->last_sync;
            return $this->getLastUpdateTime() < $last_sync && DB::table('bin_bbl_unique')->where('sync_at', null)->count() < 1;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            return false;
        }
    }

    protected function getLastUpdateTime()
    {
        $client = new Client();
        $url = "http://data.cityofnewyork.us/api/catalog/v1?ids=" . $this->datasetId;
        try {
            $res = $client->request('GET', $url);
        } catch (GuzzleException $e) {
            Log::info($e->getMessage());
            return false;
        }

        $result = json_decode($res->getBody());

        try {
            $lastUpdateTime = Carbon::parse($result->results[0]->resource->data_updated_at, 'UTC')->tz('America/New_york');
        }catch (Exception $exception){
            Log::info("Error on dataset: " .$this->datasetId  . "-" . $exception->getMessage() );
            $lastUpdateTime = OpenDataSet::where(['api_id' => $this->datasetId])->firstOrFail()->last_sync;
        }
        return $lastUpdateTime;
    }

    protected function getWhereString($force=false)
    {
        if ($force) {
            $all = DB::table('bin_bbl_unique')->get();
            $array = $all->pluck($this->dataColumn)->flatten()->toArray();
            $sql = $this->dataSocrataKey . ' in(' . $this->arrayToQuotedString($array) . ')';
            return $sql;
        } else {

            $notsynced = DB::table('bin_bbl_unique')->whereNull('sync_at')->get();
            $synced = DB::table('bin_bbl_unique')->whereNotNull('sync_at')->get();
            $lastsync = $synced->pluck('sync_at')->min();

            //$array = Property::withoutAll()->get()->pluck($this->dataColumn)->unique()->flatten()->toArray();
            //$array = ["1046919", "1046920", "1046921", "1046922", "1046923", "1046924", "1046925", "1046926"];
            $syncedarray = $synced->pluck($this->dataColumn)->flatten()->toArray();
            $notsyncedarray = $notsynced->pluck($this->dataColumn)->flatten()->toArray();

            $syncedsql = $this->dataSocrataKey . ' in(' . $this->arrayToQuotedString($syncedarray) . ') and :updated_at > \'' . \Carbon\Carbon::parse($lastsync)->addDays(-14)->toDateString() . '\'';
            $notsyncedsql = $this->dataSocrataKey . ' in(' . $this->arrayToQuotedString($notsyncedarray) . ')';

            if ($notsynced->count() && $synced->count())
                return "(" . $syncedsql . ") or (" . $notsyncedsql . ")";
            elseif ($synced->count())
                return $syncedsql;
            else
                return $notsyncedsql;
        }
    }

    protected function arrayToQuotedString($array)
    {
        return implode(', ', array_map(function ($val) {
            return sprintf("'%s'", $val);
        }, $array));
    }

    protected function insertSyncData($results)
    {
        foreach ($results as $result) {
            dispatch(new UpdateOrCreateODataModel($this::getMorphClass(), $result))->onQueue('oDataSync');
//            $this->insertData($result);
        }

    }

    protected function getLocalUpdateTime()
    {
        $last_sync = OpenDataSet::where(['api_id' => $this->datasetId])->firstOrFail()->last_sync;
        return Carbon::parse($last_sync);
    }

    protected function isUpToDate()
    {
        try {
            return $this->getLastUpdateTime() < OpenDataSet::where(['api_id' => $this->datasetId])->firstOrFail()->last_sync;
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return false;
        }
    }

}
