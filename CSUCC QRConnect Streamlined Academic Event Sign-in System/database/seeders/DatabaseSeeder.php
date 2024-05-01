<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Event_Attendee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Attendee::factory(10)->create();
        // Event_Attendee::factory(10)->create();
        // $imageFilepaths = Storage::files('admin_ids');
        User::factory()->create([
            'fname' => 'Test',
            'lname' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('test'),
            'valid_school_id_front' =>fake()->imageUrl(),
             'valid_school_id_back' =>fake()->imageUrl()
        ]);
    }
}
