<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class UploadImage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreImageRequest $request)
    {
        $files = $request->file('images');
        // file storage
        foreach ($files as $file) {
            if ($file->isValid()) {
                $file_uri = $file->store('public/images');
                $image = Image::create([
                    'log_id' => $request->input('log-id'),
                    'uri' => $file_uri,
                    'original_name' => $file->getClientOriginalName()
                ]);
            }
        }
        return redirect()->route('logs.index');
    }
}
