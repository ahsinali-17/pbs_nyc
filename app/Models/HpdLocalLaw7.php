<?php

namespace App\Models;

class HpdLocalLaw7 extends ODataModel
{
    protected $datasetId = "8wi4-bsy4";
    protected $datasetName = "Local Law 7-2018 Qualified Transactions";

    protected $dataColumn = "bin";

    protected $dataSocrataKey = "bin";
    protected $updateFrequency = 'monthly';

    protected $primaryKey = 'crfn';

    protected $table = 'hpd_local_law_7';

    protected $notifiables = [
        'borough',
        'boro',
        'block',
        'lot',
        'bbl',
        'hnum_lo',
        'hnum_hi',
        'str_name',
        'crfn',
        'grantee',
        'deed_date',
        'price',
        'cap_rate',
        'borough_cap_rate',
        'yearqtr',
        'postcode',
        'latitude',
        'longitude',
        'community_board',
        'council_district',
        'census_tract',
        'bin',
        'nta'];

        protected $selectables = [
        'borough',
        'boro',
        'block',
        'lot',
        'bbl',
        'hnum_lo',
        'hnum_hi',
        'str_name',
        'crfn',
        'grantee',
        'deed_date',
        'price',
        'cap_rate',
        'borough_cap_rate',
        'yearqtr',
        'postcode',
        'latitude',
        'longitude',
        'community_board',
        'council_district',
        'census_tract',
        'bin',
        'nta'];

    protected $fillable = [
        'borough',
        'boro',
        'block',
        'lot',
        'bbl',
        'hnum_lo',
        'hnum_hi',
        'str_name',
        'crfn',
        'grantee',
        'deed_date',
        'price',
        'cap_rate',
        'borough_cap_rate',
        'yearqtr',
        'postcode',
        'latitude',
        'longitude',
        'community_board',
        'council_district',
        'census_tract',
        'bin',
        'nta'];

    protected $casts = [
        'crfn' => 'string',
    ];


    public function scopeSummary($query)
    {
        return $query;
    }
}
