<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('article_name', 100)->notNull();
            $table->tinyInteger('author_id')->notNull();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('article');
    }
};
