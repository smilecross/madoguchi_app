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
        Schema::create('manual_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name')->nullable(); // task_name カラムの追加
            $table->date('deadline_days')->nullable(); // deadline_days カラムの追加
            $table->timestamps();
            $table->softDeletes(); // deleted_at カラムの追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manual_tasks');
    }
};
