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
        // Schema::table('financial_info_options', function (Blueprint $table) {
        //     $table->unsignedBigInteger('family_id')->after('id');
        //     $table->foreign('family_id')->references('id')->on('family_pages');
        //     $table->softDeletes();  // deleted_at カラムを追加
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('financial_info_options', function (Blueprint $table) {
        //     $table->dropForeign(['family_id']);
        //     $table->dropColumn('family_id');
        //     $table->dropSoftDeletes(); // deleted_at カラムを削除
        // });
    }
};
