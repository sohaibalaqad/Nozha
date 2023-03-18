<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\User::factory()->create([
             'name' => 'User',
             'username' => 'user_11',
             'email' => 'user@gmail.com',
             'password' => Hash::make('password'),
         ]);

        DB::table('admins')->insert([
            'name' => 'Admin',
            'username' => 'admin_1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('coordinators')->insert([
            'name' => 'Coordinator',
            'username' => 'Coordinator_2',
            'email' => 'coordinator@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
