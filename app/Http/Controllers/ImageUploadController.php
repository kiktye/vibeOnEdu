<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public'); // Store the file in 'public/uploads' directory

            return response()->json([
                'success' => 1,
                'file' => [
                    'url' => asset('storage/' . $path) // Return the URL of the uploaded file
                ]
            ]);
        }

        return response()->json([
            'success' => 0,
            'message' => 'Image upload failed!'
        ], 400);
    }
}
