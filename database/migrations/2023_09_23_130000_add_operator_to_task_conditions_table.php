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
        Schema::table('task_conditions', function (Blueprint $table) {
            $table->string('operator')->nullable()->after('value');  // operatorカラムの追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_conditions', function (Blueprint $table) {
            $table->dropColumn('operator');  // operatorカラムの削除
        });
    }
};
