<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'surname',
        'email',
        'password',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges');
    }


    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_courses')
            ->withTimestamps()->withPivot('started_at', 'completed_at');
    }

    public function evaluations()
    {
        return $this->hasMany(UserEvaluation::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'user_topics');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'user_lectures')
            ->withTimestamps()->withPivot('started_at', 'completed_at');
    }

    public function completedCourses()
    {
        return $this->courses()->with('lectures')->whereNotNull('completed_at');
    }

    public function coursesInProgress()
    {
        return $this->courses()->with('lectures')->whereNotNull('started_at')->whereNull('completed_at');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
