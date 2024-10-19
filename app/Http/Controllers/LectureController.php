<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Course;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lectures = Lecture::all();

        $courses = Course::all();

        return view('lectures.index', compact('lectures', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();

        return view('lectures.index', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'audio_path' => 'nullable|string',
            'duration' => 'nullable|integer',
        ]);

        Lecture::create($request->all());

        return redirect()->route('lectures.index')->with('success', 'Lecture created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture)
    {
        return view('lectures.show', compact('lecture'));
    }

    public function edit(Lecture $lecture)
    {
        return view('lectures.edit', compact('lecture'));
    }

    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'audio_path' => 'nullable|string',
            'duration' => 'nullable|integer',
        ]);

        $lecture->update($request->all());

        return redirect()->route('lectures.index')->with('success', 'Lecture updated successfully.');
    }

    public function destroy(Lecture $lecture)
    {
        $lecture->delete();

        return redirect()->route('lectures.index')->with('success', 'Lecture deleted successfully.');
    }
}
