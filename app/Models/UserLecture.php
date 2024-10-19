<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lecture_id',
        'started_at',
        'completed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }
}
