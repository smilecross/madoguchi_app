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
        // Schema::table('financial_options', function (Blueprint $table) {
        //     $table->timestamps(); // created_at と updated_at カラムを追加
        //     $table->softDeletes(); // deleted_at カラムを追加
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('financial_options', function (Blueprint $table) {
        //     $table->dropTimestamps(); // created_at と updated_at カラムを削除
        //     $table->dropSoftDeletes(); // deleted_at カラムを削除
        // });
    }
};
