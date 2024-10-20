<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class OptionController extends Controller
{
    public function create(Option $option)
{
    $options = Option::all();

    return view('options.create', compact('option', 'options'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'question_id' => 'required|exists:questions,id',
        'option_text' => 'required|string|max:255',
        'is_correct' => 'boolean'
    ]);


    $option = Option::create([
        'question_id' => $validatedData['question_id'],
        'option_text' => $validatedData['option_text'],
        'is_correct' => $request->has('is_correct') ? true : false, 
    ]);


    return redirect()->route('questions.show', $option->question_id)
                     ->with('success', 'Option added successfully.');
}


public function show($id)
{
    
    $option = Option::findOrFail($id);

   
    return view('options.show', compact('option'));
}

public function update(Request $request, Option $option)
{
    $validatedData = $request->validate([
        'option_text' => 'required|string|max:255',
        'is_correct' => 'boolean'
    ]);

    $option->update([
        'option_text' => $validatedData['option_text'],
        //'is_correct' => $validatedData['is_correct'],
    ]);

    return redirect()->route('questions.show', $option->question_id)
                     ->with('success', 'Option updated successfully.');
}

    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('questions.show', $option->question_id)
                     ->with('success', 'Option deleted successfully.');
    }


}
