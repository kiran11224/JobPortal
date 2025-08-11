<?php

namespace Database\Seeders;

use App\Models\User;
// use App\Models\JobType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Catagory::factory(5)->create();
        // \App\Models\JobType::factory(5)->create();

        // Catagory::factory(5)->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         \App\Models\job::factory(25)->create();
    }
}
