<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Thamoddya Rashmitha',
             'email' => 'thamoddyarashmithadissanayake@gmail.com',
             'username' => 'thamoddya',
             'mobile' => '0769458554',
             'password' => Hash::make(1234),
             'role_id' => 1,
         ]);
    }
}
