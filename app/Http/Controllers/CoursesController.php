<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('module')->get();
        $modules = Module::all();

        return view('courses.index', ['courses' => $courses, 'modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'module_id' => 'nullable|exists:modules,id',
        ]);

        Course::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'module_id' => $validated['module_id']
        ]);

        return redirect('courses')->with('success', 'Course created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'module_id' => 'nullable|exists:modules,id',
        ]);

        $course = Course::findOrFail($id);

        $course->name = $validated['name'];
        $course->description = $validated['description'];
        $course->module_id = $validated['module_id'];

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully.');
    }
}
