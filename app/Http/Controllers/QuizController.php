<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', ['quizzes' => $quizzes]);
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $quiz = Quiz::create($validatedData);

        return redirect()->route('quizzes.show', $quiz->id);
    }

    public function show($id)
{
    
    $quiz = Quiz::findOrFail($id);

   
    return view('quizzes.show', compact('quiz'));
}


    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quizzes.index');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index');
    }
}
