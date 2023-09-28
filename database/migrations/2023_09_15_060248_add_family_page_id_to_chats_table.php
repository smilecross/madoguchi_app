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
        if (!Schema::hasColumn('chats', 'family_page_id')) {
            $table->unsignedBigInteger('family_page_id')->nullable()->after('user_id');
            $table->foreign('family_page_id')->references('id')->on('family_pages')->onDelete('cascade');
        }
    });
 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign(['family_page_id']);
            $table->dropColumn('family_page_id');
        });
    }
};
