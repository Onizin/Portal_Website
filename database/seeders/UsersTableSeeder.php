<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'john.doe@example.com',
                'username' => 'johndoe',
                'password' => Hash::make('password123'),
                'firstname' => 'John',
                'lastname' => 'Doe',
                'created_at' => Carbon::now(),
            ],
            [
                'email' => 'jane.smith@example.com',
                'username' => 'janesmith',
                'password' => Hash::make('securepass'),
                'firstname' => 'Jane',
                'lastname' => 'Smith',
                'created_at' => Carbon::now(),
            ],
            [
                'email' => 'michael.brown@example.com',
                'username' => 'michaelbrown',
                'password' => Hash::make('michael2024'),
                'firstname' => 'Michael',
                'lastname' => 'Brown',
                'created_at' => Carbon::now(),
            ],
            [
                'email' => 'lisa.wilson@example.com',
                'username' => 'lisawilson',
                'password' => Hash::make('wilsonlisa'),
                'firstname' => 'Lisa',
                'lastname' => 'Wilson',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
