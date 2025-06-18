<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'author' => 1,
                'title' => 'Tips Laravel Terbaik',
                'news_content' => 'Berikut adalah beberapa tips terbaik untuk menggunakan Laravel...',
                'created_at' => Carbon::now(),
            ],
            [
                'author' => 2,
                'title' => 'Belajar PHP Modern',
                'news_content' => 'PHP modern sangat powerful dan mudah dipelajari. Berikut penjelasannya...',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
