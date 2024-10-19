<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $badges = Badge::all();

        return view('badges.index', ['badges' => $badges]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $badgeAttributes = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_path' => ['required', 'image', File::types(['jpg', 'jpeg', 'png', 'webp'])],
        ]);

        $imagePath = $request->image_path->store('badges', 'public');

        $badge = Badge::create([
            'name' => $badgeAttributes['name'],
            'description' => $badgeAttributes['description'],
            'image_path' => $imagePath
        ]);

        return redirect()->back()->with('success', 'Успешно напишан блог.');
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
    public function update(Request $request, Badge $badge)
    {

        // dd($request->all());
        $badgeAttributes = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_path' => ['required', 'image', File::types(['jpg', 'jpeg', 'png', 'webp'])],
        ]);

        $imagePath = $request->image_path->store('badges', 'public');

        if ($badge->image_path) {
            Storage::disk('public')->delete($badge->image_path);
        };

        $badge->update([
            'name' => $badgeAttributes['name'],
            'description' => $badgeAttributes['description'],
            'image_path' => $imagePath
        ]);

        return redirect()->back()->with('success', 'Беџот е успешно ажуриран!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Badge $badge)
    {
        $badge->delete();

        return redirect()->route('badges.index')->with('success', 'Успешно избришан блог.');
    }
}
