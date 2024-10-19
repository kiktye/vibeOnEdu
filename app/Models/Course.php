<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'name',
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses')
            ->withTimestamps()->withPivot('started_at', 'completed_at');
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function evaluations()
    {
        return $this->hasMany(UserEvaluation::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
