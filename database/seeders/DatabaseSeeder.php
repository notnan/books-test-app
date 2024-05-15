<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'last_name' => 'Test Last Name',
             'email' => 'test@example.com',
             'role' => \App\Models\User::ROLE_ADMIN
         ]);

        $this->call([
            BookSeeder::class,
        ]);
    }
}
