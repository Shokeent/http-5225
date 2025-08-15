<?php

use App\Models\Student;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('professors', ProfessorController::class);
