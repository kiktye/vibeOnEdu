<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizCollection;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new QuizCollection(Quiz::with('questions.options')->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        return new QuizResource($quiz->load(['questions.options', 'attempts.answers']));
    }


}
