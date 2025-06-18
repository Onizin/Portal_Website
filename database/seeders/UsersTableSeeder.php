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
                'email' => 'alice.rand@example.com',
                'username' => 'alicerand',
                'password' => Hash::make('123456'),
                'firstname' => 'Alice',
                'lastname' => 'Rand',
                'created_at' => Carbon::now(),
            ],
            [
                'email' => 'bob.smith@example.com',
                'username' => 'bobsmith',
                'password' => Hash::make('123456'),
                'firstname' => 'Bob',
                'lastname' => 'Smith',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
