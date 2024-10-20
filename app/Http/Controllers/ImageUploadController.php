<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
{
    try {
        // Validate the incoming request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the request has a file
        if ($request->hasFile('image')) {
            // Debugging: Check if the file exists in the request
            Log::info('File uploaded:', ['file' => $request->file('image')->getClientOriginalName()]);

            // Store the image in the public/images directory
            $imagePath = $request->file('image')->store('images', 'public');

            // Return the URL of the uploaded image
            return response()->json([
                'success' => true,
                'file' => [
                    'url' => Storage::url($imagePath)
                ]
            ]);
        }

        // Return an error response if the upload failed
        return response()->json(['success' => false, 'message' => 'Image upload failed']);
    } catch (\Exception $e) {
        Log::error('Image upload error: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Image upload failed']);
    }
}
}
