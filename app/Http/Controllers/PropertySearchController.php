<?php

namespace App\Http\Controllers;

use App\Models\PropertyAdress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertySearchController extends Controller
{
    public function index()
    {
        return view('portal.property-search');
    }

    public function search(Request $request)
    {
        $borough = $request->get('borough');
        $house = $request->get('house');


        $search = Str::upper($request->get('term'));


        if (Str::contains($house, '-')) {
            $housenum = explode('-', $house);
            $outdoor = intval($housenum[0]);
            $indoor = intval($housenum[1]);

            $parity = $outdoor % 2;

            if ($indoor > 0)
                $parity = $indoor % 2;

            if ($parity == 0)
                $parity = 2;

            $result = PropertyAdress::with('pluto')->where([
                ['stname', 'LIKE', '%' . str_replace(' ', '%', $search) . '%'],
                ['parity', '=', $parity],
                ['boro', '=', $borough]])
                ->where('lhn_first', '<=', $outdoor)
                ->where('hhn_first', '>=', $outdoor)
                ->where('lhn_second', '<=', $indoor)
                ->where('hhn_second', '>=', $indoor)
//                ->whereRaw('CAST(SUBSTRING(lhns,2,5) AS INTEGER) <= ' . $outdoor)
//                ->whereRaw('CAST(SUBSTRING(hhns,2,5) AS INTEGER) >= ' . $outdoor)
//                ->whereRaw('CAST(SUBSTRING(lhns,7,3) AS INTEGER) <= ' . $indoor)
//                ->whereRaw('CAST(SUBSTRING(hhns,7,3) AS INTEGER) >= ' . $indoor)
                ->whereRaw('addrtype = \'\'')
                ->get(['stname', 'boro', 'bbl', 'bin', 'zipcode', 'lhnd', 'hhnd']);

            return response()->json($result);

        }
        $house = intval($house);
        $parity = $house % 2;
        if ($parity == 0)
            $parity = 2;


        $result = PropertyAdress::with('pluto')->where([
            ['stname', 'LIKE', '%' . str_replace(' ', '%', $search) . '%'],
            ['parity', '=', $parity],
            ['boro', '=', $borough]])
            ->where('lhn_first', '<=', $house)
            ->where('hhn_first', '>=', $house)
//            ->whereRaw('CAST(SUBSTRING(lhns,2,5) AS INTEGER) <= ' . $house)
//            ->whereRaw('CAST(SUBSTRING(hhns,2,5) AS INTEGER) >= ' . $house)
            ->whereRaw('addrtype = \'\'')
            ->get(['stname', 'boro', 'bbl', 'bin', 'zipcode', 'lhnd', 'hhnd']);

        return response()->json($result);

    }

    public function searchByBin(Request $request)
    {
        $result = PropertyAdress::with('pluto')->where('bin', $request->input('bin'))->whereRaw('addrtype = \'\' and (parity=\'1\' or parity=\'2\')')->get(['stname', 'boro', 'bbl', 'bin', 'zipcode','lhnd','hhnd', 'lhn_first', 'lhn_second', 'hhn_first', 'hhn_second']);

        return response()->json($result);
    }

}
