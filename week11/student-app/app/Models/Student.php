<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'student_number',
        'program',
        'date_of_birth',
        'phone',
        'address'
    ];

    protected $casts = [
        'date_of_birth' => 'date'
    ];
}
