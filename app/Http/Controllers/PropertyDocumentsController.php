<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\PropertyDocuments;
use App\PropertyNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyDocumentsController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = $request->user();

        $request->validate([
            'property_id' => 'required',
            'type' => 'required',
            'document' => 'required|file|mimetypes:image/png,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,application/x-rar-compressed,application/x-zip-compressed,application/zip,text/plain,application/pdf|max:10240',
        ]);


        $property = Property::where('id', $request->property_id)->firstOrFail();

        if ($user->id == $property->user_id) {
            $path = $request->file('document')->storeAs('property-documents', $property->id . '-' . $request->type . '-' . now()->timestamp . '.' . $request->document->extension());
            $property->documents()->create(['type' => $request->type, 'path' => $path]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\PropertyDocuments $userPropertyDocuments
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyDocuments $userPropertyDocuments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\PropertyDocuments $userPropertyDocuments
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyDocuments $userPropertyDocuments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\PropertyDocuments $userPropertyDocuments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyDocuments $userPropertyDocuments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\PropertyDocuments $userPropertyDocuments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'document_id' => 'required',
        ]);

        $document = PropertyDocuments::where('id', $request->document_id)->firstOrFail();

        if ($document) {
            if($user->id == $document->property->user->id)
            {
                Storage::delete($document->path);
                $document->delete();
            }
        }
        return redirect()->back();
    }
}
