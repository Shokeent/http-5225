<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = [
            'Introduction to Computer Science',
            'Web Development Fundamentals',
            'Database Design and Management',
            'Object-Oriented Programming',
            'Data Structures and Algorithms',
            'Software Engineering Principles',
            'Network Security',
            'Mobile App Development',
            'Artificial Intelligence',
            'Machine Learning Basics',
            'Digital Marketing',
            'Business Analytics',
            'Project Management',
            'User Experience Design',
            'Cloud Computing'
        ];

        $descriptions = [
            'This course provides a comprehensive introduction to the fundamental concepts of computer science.',
            'Learn the essential skills needed for modern web development including HTML, CSS, and JavaScript.',
            'Explore database design principles and learn to manage data effectively using SQL.',
            'Master object-oriented programming concepts and design patterns.',
            'Study fundamental data structures and algorithms essential for programming.',
            'Learn software development methodologies and best practices.',
            'Understand network security principles and cybersecurity best practices.',
            'Develop mobile applications for iOS and Android platforms.',
            'Introduction to artificial intelligence concepts and applications.',
            'Learn machine learning algorithms and their practical applications.',
            'Explore digital marketing strategies and online advertising.',
            'Learn to analyze business data and make data-driven decisions.',
            'Master project management methodologies and tools.',
            'Design user-centered interfaces and improve user experience.',
            'Understand cloud computing platforms and services.'
        ];

        $courseIndex = array_rand($courses);
        
        return [
            'name' => $courses[$courseIndex],
            'description' => $descriptions[$courseIndex] . ' ' . fake()->sentence(10),
            'professor_id' => \App\Models\Professor::factory(),
        ];
    }
}
