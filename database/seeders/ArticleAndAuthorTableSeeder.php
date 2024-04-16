<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleAndAuthorTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('article')->insert([
            [
                'article_name' => '我有很多小花',
                'author_id'    => rand(1, 3),
            ],
            [
                'article_name' => '不要',
                'author_id'    => rand(1, 3),
            ],
            [
                'article_name' => '想太多',
                'author_id'    => rand(1, 3),
            ],
        ]);
        DB::table('author')->insert([
            [
                'author_name' => '我是第一個',
            ],
            [
                'author_name' => '我是第二個',
            ],
            [
                'author_name' => '我是第三個',
            ],
        ]);
    }
}
