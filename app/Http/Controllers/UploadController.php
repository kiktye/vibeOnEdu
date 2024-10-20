<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image
        ]);
    
        $path = $request->file('image')->store('uploads', 'public'); // Store the image
    
        return response()->json([
            'success' => true,
            'url' => Storage::url($path), // Return the URL of the uploaded image
        ]);
    }
}
