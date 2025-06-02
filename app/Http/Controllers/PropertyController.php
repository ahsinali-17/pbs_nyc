<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{

    public function photoUpdate($id)
    {
        $user = request()->user();

        $property = $user->properties()->where('id', $id)->firstOrFail();

        request()->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        if (request()->file('photo')) {
            Storage::delete(Str::replaceFirst('/storage/', 'public/', $property->photo));
            $property->photo = Storage::url(request()->file('photo')->store('public/propertyPhotos'));
            $property->save();
        }

        return redirect()->back();
    }

    public function photoDelete($id)
    {
        $user = request()->user();

        $property = $user->properties()->where('id', $id)->firstOrFail();

        Storage::delete(Str::replaceFirst('/storage/', 'public/', $property->photo));
        $property->photo = null;
        $property->save();
        return redirect()->back();
    }

    public function dedicatedcontact()
    {
        $user = request()->user();

        request()->validate([
            'property_id' => 'required',
        ]);


        $property = Property::where('id', request()->property_id)->firstOrFail();

        if ($user->id == $property->user_id) {
            $data = request()->only(['contact_name', 'contact_number', 'contact_address']);
            $property->update($data);
            return redirect()->back();
        }
        return redirect()->back();
    }

}
