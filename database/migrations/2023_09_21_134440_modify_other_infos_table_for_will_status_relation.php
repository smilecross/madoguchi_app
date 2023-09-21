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
        Schema::table('other_infos', function (Blueprint $table) {
            // will_status_id カラムを追加
        if (!Schema::hasColumn('other_infos', 'will_status_id')) {
            $table->unsignedBigInteger('will_status_id')->nullable();
            $table->foreign('will_status_id')->references('id')->on('will_statuses');
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('other_infos', function (Blueprint $table) {
            $table->dropForeign(['will_status_id']);
            $table->dropColumn('will_status_id');
            $table->enum('will_status', [/* ここにenumの値を追加 */]);
        });
    }
};
