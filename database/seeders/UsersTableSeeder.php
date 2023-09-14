<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' => 'Bibek Lama',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('malaiktha1290'),
                'role' => 'admin',
                'status' => 'active',
            ],

            //Agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@mauveine.tech',
                'password' => Hash::make('malaiktha1290'),
                'role' => 'agent',
                'status' => 'active',
            ],

            //User
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
