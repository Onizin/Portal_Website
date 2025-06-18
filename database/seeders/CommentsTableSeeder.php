<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'user_id' => 1,
                'comment_content' => 'Artikel yang sangat bermanfaat, terima kasih!',
                'created_at' => Carbon::now(),
            ],
            [
                'post_id' => 2,
                'user_id' => 2,
                'comment_content' => 'Penjelasan yang sangat jelas dan mudah dipahami.',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
