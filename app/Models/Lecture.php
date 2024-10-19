<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'name',
        'description',
        'audio_path',
        'duration'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lectures')
                    ->withTimestamps()->withPivot('started_at', 'completed_at');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
