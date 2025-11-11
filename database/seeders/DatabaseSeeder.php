<?php

namespace Database\Seeders;

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
            'first_name' => 'James',
            'last_name' => 'Blunt',
            'email' => 'test@example.com',
        ]);

        // php artisan db:seed --class=JobSeeder would let us run this itself
        $this->call(JobSeeder::class);

    }
}
