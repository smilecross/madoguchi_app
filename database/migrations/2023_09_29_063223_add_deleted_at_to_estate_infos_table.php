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
        // if (!Schema::hasColumn('estate_infos', 'deleted_at')) {
        //     Schema::table('estate_infos', function (Blueprint $table) {
        //         $table->softDeletes();
        //     });
        // }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('estate_infos', function (Blueprint $table) {
        //     $table->dropSoftDeletes();
        // });
    }
};
