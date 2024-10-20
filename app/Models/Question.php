<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'question_text'];

    // Relationship: A question belongs to a quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Relationship: A question has many options
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    // Relationship: A question has many answers from users
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
