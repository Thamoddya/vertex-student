<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
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
             'name' => 'Vertex Co Admin',
             'email' => 'admin@vertexcooperation.com',
             'username' => 'admin',
             'mobile' => '0769458554',
             'password' => Hash::make(1234),
             'role_id' => 1,
         ]);
    }
}
