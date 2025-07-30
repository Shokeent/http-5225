<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'student_number' => 'STU' . $this->faker->unique()->numberBetween(100000, 999999),
            'program' => $this->faker->randomElement([
                'Computer Programming',
                'Web Development',
                'Information Technology',
                'Business Administration',
                'Graphic Design',
                'Digital Marketing',
                'Data Analytics',
                'Cybersecurity'
            ]),
            'date_of_birth' => $this->faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
