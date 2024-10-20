<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create(Quiz $quiz)
{
    $questions = Question::all();

    return view('questions.create', compact('quiz', 'questions'));
}

public function store(Request $request, Question $question)
{
    $validatedData = $request->validate([
        'quiz_id' => 'required|exists:quizzes,id',
        'question_text' => 'required|string|max:255',
    ]);

   $question = Question::create([
        'quiz_id' => $validatedData['quiz_id'],
        'question_text' => $validatedData['question_text'],
    ]);

    return redirect()->route('questions.show', $question->id)
                     ->with('success', 'Question added successfully.');
}

public function show($id)
{
    
    $question = Question::findOrFail($id);

   
    return view('questions.show', compact('question'));
}

public function update(Request $request, Question $question)
{
    $validatedData = $request->validate([
        'question_text' => 'required|string|max:255',
    ]);

    $question->update([
        'question_text' => $validatedData['question_text'],
    ]);

    return redirect()->route('quizzes.show', $question->quiz_id)
                     ->with('success', 'Question updated successfully.');
}

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('quizzes.show', $question->quiz_id)
                     ->with('success', 'Question deleted successfully.');
    }


}
