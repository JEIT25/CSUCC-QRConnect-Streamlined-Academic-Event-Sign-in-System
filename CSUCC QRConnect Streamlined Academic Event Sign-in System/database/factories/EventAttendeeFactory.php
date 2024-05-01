<?php

namespace Database\Factories;

use App\Models\Attendee;
use App\Models\Event_Attendee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event_Attendee>
 */
class EventAttendeeFactory extends Factory
{
    protected $model = Event_Attendee::class;
    /**
     * Define the model's default state.
     *
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'attendee_id' => 10,
            'event_id' => 11, // Set event_id to 1
            'checkin' => fake()->dateTimeThisYear() // Generate random boolean value for checkin
        ];
    }
}
