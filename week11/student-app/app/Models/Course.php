<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'professor_id',
    ];

    /**
     * The students that belong to the course.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    /**
     * Get the professor that owns the course.
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
