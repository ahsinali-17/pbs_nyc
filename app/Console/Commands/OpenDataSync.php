<?php

namespace App\Console\Commands;

use App\Models\BSAApplicationStatus;
use App\Models\DepCatsPermits;
use App\Models\DobCertOccupancy;
use App\Models\DobComplaints;
use App\Models\DobJobFilings;
use App\Models\DobNowApprovedPermits;
use App\Models\DobNowElectricalPermits;
use App\Models\DobNowElevatorDeviceDetails;
use App\Models\DobNowElevatorPermits;
use App\Models\DobNowFacadeFilings;
use App\Models\DobNowJobFilings;
use App\Models\DobNowSafetyBoiler;
use App\Models\DobPermits;
use App\Models\DobViolations;
use App\Models\DotSidewalkCorrespondences;
use App\Models\DotSidewalkInspections;
use App\Models\EcbViolations;
use App\Models\FdnyActiveViolOrders;
use App\Models\FdnyCertOfFitness;
use App\Models\FdnyInspections;
use App\Models\HpdComplaintProblems;
use App\Models\HpdComplaints;
use App\Models\HpdDwellingRegistrations;
use App\Models\HpdEmergencyRepairs;
use App\Models\HpdEmergencyRepairsCharges;
use App\Models\HpdHousingLitigations;
use App\Models\HpdRegistrationsContacts;
use App\Models\HpdRepairVacateOrders;
use App\Models\HpdViolations;
use App\Models\LandmarkComplaints;
use App\Models\LandmarkPermits;
use App\Models\LandmarkViolations;
use App\Models\OathHearings;
use App\Models\ServiceRequests311;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class OpenDataSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:data {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'OpenData Sync';

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
        $force = (bool)$this->option('force');
        Log::debug("Open Data Sync Started : " . now());

        ini_set('memory_limit', '4096M');
//        $propertyList=User::with(['properties'=>function($query){$query->withoutAll()->select(['bin','bbl']);}])->get()->pluck('properties')->flatten();
//        $bins = $propertyList->pluck('bin')->flatten();
//        $bbls = $propertyList->pluck('bbl')->flatten();
//        $needToDelete = Property::withoutAll()->WhereNotIn('bin', $bins)->WhereNotIn('bbl', $bbls)->get();
////        $needToDelete = Property::doesntHave('users')->get();
//        foreach ($needToDelete as $propToDelete) {
////            if ((Property::where('bin', $propToDelete->bin)->count() < 2 && Property::where('bbl', $propToDelete->bbl)->count()) < 2) {
//            $propToDelete->delete();
////            }
//        }
//        $users = User::whereIn('id', Property::with('user')->where('sync_at', null)->get()->pluck('user')->flatten()->pluck('id')->unique()->flatten())->get();
//        $syncstart = now();

        BSAApplicationStatus::dataSync($force);
        DepCatsPermits::dataSync($force);
        DobCertOccupancy::dataSync($force);
        DobComplaints::dataSync($force);
        DobJobFilings::dataSync($force);
        DobNowApprovedPermits::dataSync($force);
        DobNowElectricalPermits::dataSync($force);
        DobNowElevatorPermits::dataSync($force);
        DobNowFacadeFilings::dataSync($force);
        DobNowJobFilings::dataSync($force);
        DobNowSafetyBoiler::dataSync($force);
        DobPermits::dataSync($force);
        DobViolations::dataSync($force);
        DotSidewalkCorrespondences::dataSync($force);
        DotSidewalkInspections::dataSync($force);
        EcbViolations::dataSync($force);
        FdnyActiveViolOrders::dataSync($force);
        FdnyCertOfFitness::dataSync($force);
        FdnyInspections::dataSync($force);
//        HpdComplaints::dataSync($force); // datasetler silinmiş https://data.cityofnewyork.us/Housing-Development/Housing-Maintenance-Code-Complaints-and-Problems/ygpa-z7cr/data_preview burada birleşmiş olabilir.
//        HpdComplaintProblems::dataSync($force); // datasetler silinmiş https://data.cityofnewyork.us/Housing-Development/Housing-Maintenance-Code-Complaints-and-Problems/ygpa-z7cr/data_preview burada birleşmiş olabilir.
        HpdDwellingRegistrations::dataSync($force);
        HpdEmergencyRepairs::dataSync($force);
        HpdEmergencyRepairsCharges::dataSync($force);
        HpdHousingLitigations::dataSync($force);
//        HpdJurisdiction::dataSync();
//        HpdLocalLaw7::dataSync();
        HpdRepairVacateOrders::dataSync($force);
        HpdViolations::dataSync($force);
        LandmarkComplaints::dataSync($force);
        LandmarkViolations::dataSync($force);
        OathHearings::dataSync($force);
        ServiceRequests311::dataSync($force);
        LandmarkPermits::dataSync($force);
        HpdRegistrationsContacts::dataSync($force);
        DobNowElevatorDeviceDetails::dataSync($force);
//        dispatch(new SendSummary($users,$syncstart))->onQueue('oDataSync');
        Log::info('Open Data Sync Bitti : ' . now());
    }
}
