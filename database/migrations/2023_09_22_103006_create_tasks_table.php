<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            // $table->string('related_answer');  // 関連する回答
            $table->integer('deadline_days')->nullable();  // 期限の日数 (整数)
            $table->string('deadline_text')->nullable(); // 期限に関するテキスト説明 (例: "速やかに")
            $table->enum('procedure_location', ['市区町村役場など', '勤務先', '金融機関', 'オンライン', 'その他']);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
