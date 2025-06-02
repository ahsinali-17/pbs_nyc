<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\PropertyNotes;
use Illuminate\Http\Request;

class PropertyNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = $request->user();

        $request->validate([
            'property_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $property = Property::where('id', $request->property_id)->firstOrFail();

        if ($user->id == $property->user_id) {
            $property->notes()->create(['title' => $request->title, 'content' => $request->input('content')]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyNotes  $userPropertyNotes
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyNotes $userPropertyNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyNotes  $userPropertyNotes
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyNotes $userPropertyNotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyNotes  $userPropertyNotes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyNotes $userPropertyNotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyNotes  $userPropertyNotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $user = $request->user();

        $request->validate([
            'note_id' => 'required',
        ]);

        $note = PropertyNotes::where('id', $request->note_id)->firstOrFail();

        if ($note) {
            if($user->id == $note->property->user->id)
                $note->delete();
        }
        return redirect()->back();
    }
}
