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
        Schema::table('job_admin_infos', function (Blueprint $table) {
            // occupation_id カラムが存在しない場合のみ以下の操作を行う 
        if (!Schema::hasColumn('job_admin_infos', 'occupation_id')) {
            if (Schema::hasColumn('job_admin_infos', 'occupation')) {
                $table->dropColumn('occupation');  // 既存のoccupationカラムを削除
            }
            $table->unsignedBigInteger('occupation_id');  // unsignedBigInteger型としてoccupation_idカラムを追加
            $table->foreign('occupation_id')->references('id')->on('occupations');  // 外部キー制約を追加
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_admin_infos', function (Blueprint $table) {
            $table->dropForeign(['occupation_id']);
            $table->dropColumn('occupation_id');
            $table->string('occupation', 255);  // occupationカラムをVARCHAR(255)型で追加
        });
    }
};
