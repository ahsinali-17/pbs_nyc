<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyAdress;
use Illuminate\Http\Request;

class PropertyListController extends Controller
{
    public function index()
    {
        $properties = auth()->user()->properties()->withoutAll()->get();
        return view('portal.content.property-list',compact('properties'));
    }

    public function add(Request $request)
    {
        $bin = $request->get('bin');
        $bbl = $request->get('bbl');

        $result = PropertyAdress::where([
            ['bin', '=', $bin],
            ['bbl', '=', $bbl]])->firstOrFail();
        if ($result) {

            $property = Property::firstOrCreate(['bin' => $result->bin], ['boro' => $result->boro, 'block' => $result->block, 'lot' => $result->lot, 'bbl' => $result->bbl]);

            try {
                auth()->user()->properties()->save($property);
            }catch (\Exception $exception){}

            return response()->json(auth()->user()->properties);
        }
        return response()->noContent();
    }
}
