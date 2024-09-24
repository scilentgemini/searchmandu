<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'Dilu Lama',
                'username' => 'admin',
                'email' => 'admin@mauveine.tech',
                'password' => Hash::make('malaiktha1290'),
                'role' => 'admin',
                'status' => 'active',
            ],

            // Agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@mauveine.tech',
                'password' => Hash::make('malaiktha1290'),
                'role' => 'agent',
                'status' => 'active',
            ],

            // User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@mauveine.tech',
                'password' => Hash::make('malaiktha1290'),
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
}
