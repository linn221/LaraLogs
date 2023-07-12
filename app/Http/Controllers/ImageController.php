<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $files = $request->file('images');
        // file storage
        foreach ($files as $file) {
            if ($file->isValid()) {
                $file_uri = $file->store('public/images');
                $image = Image::create([
                    'log_id' => $request->input('log-id'),
                    'uri' => $file_uri,
                ]);
            }
        }
        return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $image->caption = $request->input('caption');
        $image->save();
        return redirect()->back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        // return $image;
        $image->delete();
        return redirect()->back();
        //
    }
}
