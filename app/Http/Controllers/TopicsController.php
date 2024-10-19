<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::all();

        return view('topics.index', ['topics' => $topics]);

        // $events = Event::all();
        // $conferences = AnnualConference::all();
        // return view('agenda.create', compact('events', 'conferences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

    
        Topic::create([
            'name' => $validated['name']
        ]);
        // dd($validatedt);

        return redirect('topics')->with('success', 'Topic created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $topic = Topic::findOrFail($id);

        $topic->name = $validated['name'];

        $topic->save();

        return redirect()->route('topics.index')->with('success', 'Topic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->back()->with('success', 'Topic deleted successfully.');
    }
}
