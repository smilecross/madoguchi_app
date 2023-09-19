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
        Schema::rename('financial_info','financial_infos' ) ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('financial_infos', 'financial_info') ;
    }
};
