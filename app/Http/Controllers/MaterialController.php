<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {

        $lectures = Lecture::all();

        $materials = Material::all();

        return view('materials.index', compact('materials', 'lectures'));
    }


    public function create()
    {
        $material = Material::all();

        $lectures = Lecture::all();

        return view('materials.index', compact('lectures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materialAttributes = $request->validate([
            'lecture_id' => 'required|exists:lectures,id',
            'type ' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Material::create($request->all());

        return redirect()->route('materials.index')->with('success', 'Lecture created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $materials)
    {
        return view('materials.show', compact('materials'));
    }

    public function edit(Material $materials)
    {
        return view('material.edit', compact('materials'));
    }

    public function update(Request $request, Material $materials)
    {
        $request->validate([
            'lecture_id' => 'required|exists:lectures,id',
            'type' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $materials->update($request->all());

        return redirect()->route('materials.index')->with('success', 'Lecture updated successfully.');
    }

    public function destroy(Material $materials)
    {
        $materials->delete();

        return redirect()->route('materials.index')->with('success', 'Lecture deleted successfully.');
    }

}
