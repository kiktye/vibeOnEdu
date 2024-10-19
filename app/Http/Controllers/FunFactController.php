<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FunFact;

class FunFactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $funFacts = FunFact::all();

        return view('funFacts.index', compact('funFacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funFacts.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        funFact::create($request->all());

        return redirect()->route('funFacts.index')->with('success', 'funFact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(funFact $funFact)
    {
        return view('funFacts.show', compact('funFact'));
    }

    public function edit(funFact $funFact)
    {
        return view('funFacts.edit', compact('funFact'));
    }

    public function update(Request $request, funFact $funFact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $funFact->update($request->all());

        return redirect()->route('funFacts.index')->with('success', 'funFact updated successfully.');
    }

    public function destroy(funFact $funFact)
    {
        $funFact->delete();

        return redirect()->route('funFacts.index')->with('success', 'funFact deleted successfully.');
    }
}
