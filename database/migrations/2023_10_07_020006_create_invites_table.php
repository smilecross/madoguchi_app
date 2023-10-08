<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->unsignedBigInteger('invited_by')->nullable(); // 招待を送信したユーザーID
            $table->unsignedBigInteger('accepted_by')->nullable(); // 招待を受け入れたユーザーID
            $table->unsignedBigInteger('family_page_id'); 
            $table->string('token')->unique(); // 招待トークン
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending'); // 招待のステータス
            $table->timestamps();  // created_at と updated_at 
            $table->softDeletes('deleted_at'); // deleted_at 

            // 外部キー制約（必要に応じて）
            $table->foreign('invited_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('accepted_by')->references('id')->on('users')->onDelete('set null');
            // family_pageとのリレーション
            $table->foreign('family_page_id')->references('id')->on('family_pages')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invites');
    }
};
