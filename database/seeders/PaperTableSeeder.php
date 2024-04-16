<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        // $data = [
        //     [
        //         "paper_name" => "五年",
        //         "start_time" => strtotime('+7 days'),
        //         "duration"   => "120",
        //     ],
        //     [
        //         "paper_name" => "黃衣哈",
        //         "start_time" => strtotime('+5 days'),
        //         "duration"   => "120",
        //     ],
        //     [
        //         "paper_name" => "ㄌㄌ",
        //         "start_time" => strtotime('+3 days'),
        //         "duration"   => "120",
        //     ],
        // ];
        // //

        // DB::table('paper')->insert($data);
        // 確保這裡的路徑與您的 PaperFactory 類別的路徑相符
        $factory = \Database\Factories\PaperFactory::new ();

        // 使用工廠來創建資料
        $factory->count(50)->create();

    }
}
