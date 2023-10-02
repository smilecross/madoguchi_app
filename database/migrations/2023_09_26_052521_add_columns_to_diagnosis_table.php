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
        // Schema::table('diagnosis', function (Blueprint $table) {
            // $table->integer('age');  // 年齢を保存するカラム
            // $table->unsignedBigInteger('family_page_id');
            // $table->unsignedBigInteger('profile_info_id')->nullable();
            // $table->unsignedBigInteger('job_admin_info_id')->nullable();
            // $table->unsignedBigInteger('estate_info_id')->nullable();
            // $table->unsignedBigInteger('financial_info_id')->nullable();
            // $table->unsignedBigInteger('other_info_id')->nullable();

            // $table->foreign('family_page_id')->references('id')->on('family_pages');
            // $table->foreign('profile_info_id')->references('id')->on('profile_infos');
            // $table->foreign('job_admin_info_id')->references('id')->on('job_admin_infos');
            // $table->foreign('estate_info_id')->references('id')->on('estate_infos');
            // $table->foreign('financial_info_id')->references('id')->on('financial_info_options');
            // $table->foreign('other_info_id')->references('id')->on('other_infos');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('diagnosis', function (Blueprint $table) {
        //     $table->dropForeign(['family_page_id']);
        //     $table->dropForeign(['profile_info_id']);
        //     $table->dropForeign(['job_admin_info_id']);
        //     $table->dropForeign(['estate_info_id']);
        //     $table->dropForeign(['financial_info_id']);
        //     $table->dropForeign(['other_info_id']);
            
        //     $table->dropColumn([
        //         'age', 'family_page_id', 'profile_info_id', 'job_admin_info_id',
        //         'estate_info_id', 'financial_info_id', 'other_info_id'
        //     ]);
        // });
    }
};
