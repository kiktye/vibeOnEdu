<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MaterialController extends Controller
{
    // Display a listing of the materials and lectures
    public function index()
    {
        // Fetch all lectures
        $lectures = Lecture::all();

        // Fetch all materials
        $materials = Material::all();

        // Pass lectures and materials to the view
        return view('materials.index', compact('materials', 'lectures'));
    }

    // Retrieve the material for editing
    public function editor($id)
    {
        // Fetch the material by ID
        $material = Material::findOrFail($id);

        // Return the editor view with the material content
        return view('materials.editor', compact('material'));
    }

    // Store a newly created material
    // Store a newly created material
public function store(Request $request)
{
    Log::info('Incoming request data:', $request->all());

    // Validate the request
    $request->validate([
        'content' => 'required|array',
        'lecture_id' => 'required|integer',
        'type' => 'required|string|in:text,image,audio,blog',
    ]);

    // Prepare content in the expected format
    $content = [
        'time' => time(),
        'blocks' => $request->input('content.blocks'), // Ensure 'blocks' is pulled correctly from the request
        'version' => '2.22.2',
    ];

    // Store the material
    Material::create([
        'lecture_id' => $request->lecture_id,
        'type' => $request->type,
        'content' => json_encode($content), // Store as JSON string
    ]);

    return response()->json(['success' => true]);
}


    

    // Display the specified material
    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }

    // Show the form for editing the specified material
    public function edit(Material $material)
    {
        // Fetch all lectures to display in the edit view
        $lectures = Lecture::all();

        // Return the view for editing materials
        return view('materials.edit', compact('material', 'lectures'));
    }

    // Update the specified material in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'content' => 'required',
            'type' => 'required',
        ]);

        // Update the material
        $material = Material::findOrFail($id);
        $material->content = $request->input('content');
        $material->type = $request->input('type');
        $material->save();

        return response()->json(['success' => true]);
    }

    // Remove the specified material from storage
    public function destroy(Material $material)
    {
        $material->delete();

        // Redirect to the materials index with a success message
        return redirect()->route('materials.index')->with('success', 'Material deleted successfully.');
    }
}
