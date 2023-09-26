<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('family_pages', function (Blueprint $table) {
            $table->softDeletes();  // Adds deleted_at column
        });

        Schema::table('job_admin_infos', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('financial_infos', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_pages', function (Blueprint $table) {
            $table->dropSoftDeletes();  // Removes deleted_at column
        });

        Schema::table('job_admin_infos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('financial_infos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
