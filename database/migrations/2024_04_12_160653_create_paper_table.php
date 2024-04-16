<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('paper', function (Blueprint $table) {
            //自增的主鍵id
            $table->increments('id');
            //試卷名稱，唯一 varchar(100)，不為空
            $table->string('paper_name', '100')->unique();
            //試卷總分，整型數字，tinyint，默認為100
            $table->tinyInteger('total_score')->default(100);
            //試卷開始考試時間，時間戳類型(整型int)
            $table->integer('start_time')->nullable();
            //考試時間長度，單位分鐘，整型tinyint
            $table->tinyInteger('duration');
            //試卷是否啟用狀態，1表示啟用，2表示禁用，默認值為1,tinyint類型
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('paper');
    }
};
