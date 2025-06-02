<?php

namespace App\Http\Controllers;

use App\Models\Property;
use GuzzleHttp\Client;

class BuildingProfileController extends Controller
{


    public function buildingProfiles()
    {
        $user = auth()->user();
        $user->load(['properties'=>function($query) {
            $query->withoutAll(['address']);
        }]);
        return view('portal.content.buildingProfiles', compact('user'));
    }
    public function singleBuildingProfile($buildingid)
    {
        $user = auth()->user();
        $user->load(['properties'=>function($query) use ($buildingid){
            $query->withoutAll(['address']);
        }]);
        $property = $user->properties->where('id',$buildingid)->first();
        if ($property)
        {
            $client = new Client();
            $url='https://services5.arcgis.com/GfwWNkhOj9bNBqoJ/arcgis/rest/services/MAPPLUTO/FeatureServer/0/query?where=bbl=' . $property->bbl . '&outFields=*&f=pgeojson';

            $res = $client->request('GET', $url);

            $result = json_decode($res->getBody());
            if(sizeof($result->features) > 0)
                $features= $result->features[0]->properties;
            else
                $features = new Property();


         return view('portal.content.singleBuildingProfile', compact('user', 'property', 'features'));
        }
        else
            return redirect()->route('buildingProfiles');


    }



}
