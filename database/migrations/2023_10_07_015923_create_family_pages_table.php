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
        Schema::create('family_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deceased_person_id')->constrained()->onDelete('cascade');
            $table->timestamps();   
            $table->softDeletes('deleted_at'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_pages');
    }
};
