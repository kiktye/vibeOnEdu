<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        "lecture_id",
        "type",
        "content",
    ];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
