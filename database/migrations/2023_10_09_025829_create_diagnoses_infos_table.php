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
    //     Schema::create('diagnoses_infos', function (Blueprint $table) {
    //     $table->id();
    //     $table->unsignedBigInteger('family_pages_id');
    //     $table->date('birthday');
    //     $table->string('address', 280);
    //     $table->string('prefecture');
    //     $table->string('is_household_head')->default('わからない');
    //     $table->string('spouse_status')->default('わからない');
    //     $table->string('has_dependent_children')->default('わからない');
    //     $table->string('lived_with_others')->default('わからない');

    //     $table->timestamps();
    //     $table->softDeletes();

    //     $table->foreign('family_pages_id')->references('id')->on('family_pages')->onDelete('cascade');
    // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('diagnoses_infos');
    }
};
