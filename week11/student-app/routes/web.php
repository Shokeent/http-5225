<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
    $students = Student::all();
    return view('students', compact('students'));
});
