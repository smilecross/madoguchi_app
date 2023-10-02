<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // if (!Schema::hasTable('diagnosis')) {
        //     Schema::create('diagnosis', function (Blueprint $table) {
        //         $table->id();
        //         $table->unsignedBigInteger('family_id');  // family_pagesとの関連付けのための外部キー
        //         $table->integer('age');  // 年齢を保存するカラム
        //         $table->timestamps();
        //         $table->softDeletes();

                // ここで外部キー制約を追加することも考慮
                // 例: $table->foreign('family_id')->references('id')->on('family_pages');
                // 上記の外部キー制約はサンプル、適宜調整。
            // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('diagnosis');
    }
};
