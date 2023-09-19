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
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign('chat_procedure_page_id_foreign'); // 外部キー制約を削除
            $table->dropColumn('chat_procedure_page_id'); // 列も削除
        });
        // Schema::create('chats', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('chat');
        //     $table->text('description')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
