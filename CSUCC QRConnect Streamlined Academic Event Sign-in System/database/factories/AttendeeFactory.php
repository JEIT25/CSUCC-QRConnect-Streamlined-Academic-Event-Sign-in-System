<?php

namespace Database\Factories;

use App\Models\Attendee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendee>
 */
class AttendeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['guest', 'csucc member']),
            'fname' => fake()->firstName,
            'lname' => fake()->lastName,
            'birth_date' => fake()->date(),
            'country' => fake()->country,
            'occupational_status' => fake()->randomElement(['student', 'employed']),
            'school_name' => fake()->company,
            'employer' => fake()->company,
            'work_specialization' => fake()->randomElement(['teacher', 'office-admin', 'others']),
            'email' => fake()->unique()->safeEmail,
            'valid_id' => fake()->imageUrl(), // Replace with appropriate method to generate fake image URL
            'unique_code' => fake()->uuid // Generate unique identifier
        ];
    }
}
