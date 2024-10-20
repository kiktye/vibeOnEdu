<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use App\Models\Course;

class LectureController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        $lectures = Lecture::all();

        return view('lectures.create', compact('courses', 'lectures'));
    }
    public function create()
    {
        $courses = Course::all(); // Get all courses
        return view('lectures.create', compact('courses'));
    }

    public function store(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|json', // Ensure it's valid JSON
        'audio_path' => 'nullable|file|mimes:mp3,wav',
        'duration' => 'nullable|integer',
    ]);

    $lecture = new Lecture();
    $lecture->course_id = $request->course_id;
    $lecture->name = $request->name;
    $lecture->description = $request->description;
    $lecture->content = $request->content; // Store JSON content

    if ($request->hasFile('audio_path')) {
        $audioPath = $request->file('audio_path')->store('audios', 'public');
        $lecture->audio_path = $audioPath;
    }

    $lecture->duration = $request->duration;
    $lecture->save();

    return redirect()->route('create.lecture')->with('success', 'Lecture created successfully!');
}

    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id); // Find the lecture by ID
        $courses = Course::all(); // Get all courses for dropdown
        return view('lectures.edit', compact('lecture', 'courses'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|json', // Ensure valid JSON
        'audio_path' => 'nullable|file|mimes:mp3,wav',
        'duration' => 'nullable|integer',
    ]);

    $lecture = Lecture::findOrFail($id); // Find the lecture by ID
    $lecture->course_id = $request->course_id;
    $lecture->name = $request->name;
    $lecture->description = $request->description;
    $lecture->content = $request->content; // Store JSON content

    if ($request->hasFile('audio_path')) {
        $audioPath = $request->file('audio_path')->store('audios', 'public');
        $lecture->audio_path = $audioPath;
    }

    $lecture->duration = $request->duration;
    $lecture->save();

    return redirect()->route('edit.lecture', $lecture->id)->with('success', 'Lecture updated successfully!');
}
}
