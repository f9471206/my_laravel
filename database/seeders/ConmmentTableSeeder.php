<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConmmentTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        DB::table('comment')->insert([
            [
                'comment'    => '我是評論111',
                'article_id' => rand(1, 3),
            ],
            [
                'comment'    => '我是評論222',
                'article_id' => rand(1, 3),
            ],
            [
                'comment'    => '我是評論333',
                'article_id' => rand(1, 3),
            ],
            [
                'comment'    => '我是評論444',
                'article_id' => rand(1, 3),
            ],
        ]);
    }
}
