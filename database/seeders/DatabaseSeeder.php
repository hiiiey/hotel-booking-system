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
            'name' => 'Jerico',
            'email' => 'admin@gmail.com',
            'password' => '12345678',

            'phone' => '09350457266',
            'usertype' => 'admin',


        ]);
    }
}
