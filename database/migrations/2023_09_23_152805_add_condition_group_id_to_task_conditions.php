<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConditionGroupIdToTaskConditions extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('task_conditions', function (Blueprint $table) {
        //     $table->unsignedBigInteger('condition_group_id')->nullable()->after('task_id');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('task_conditions', function (Blueprint $table) {
        //     $table->dropColumn('condition_group_id');
        // });
    }
};
