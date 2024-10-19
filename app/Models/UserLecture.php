<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_id',
        'started_at',
        'completed_at'
    ];
}
