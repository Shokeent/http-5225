<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use App\Models\Professor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create professors first
        $professors = Professor::factory(15)->create(); // Create 15 professors for 15 courses

        // Create students
        $students = Student::factory(20)->create();

        // Create courses with professors
        $courses = Course::factory(15)->create();

        // Attach students to courses (many-to-many)
        $students->each(function ($student) use ($courses) {
            $student->courses()->attach(
                $courses->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}
