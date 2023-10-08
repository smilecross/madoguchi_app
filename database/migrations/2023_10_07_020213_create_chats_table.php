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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('family_page_id'); 
            $table->text('message'); 
            $table->timestamps();  // created_at と updated_at 
            $table->softDeletes('deleted_at'); // deleted_at 

            // 外部キー制約（必要に応じて）
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // family_pageとのリレーション
            $table->foreign('family_page_id')->references('id')->on('family_pages')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
