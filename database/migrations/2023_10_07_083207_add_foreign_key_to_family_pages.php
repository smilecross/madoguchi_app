<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
         Schema::table('family_pages', function (Blueprint $table) {
            $table->unsignedBigInteger('deceased_person_id')->after('id');  
            $table->foreign('deceased_person_id')->references('id')->on('deceased_persons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_pages', function (Blueprint $table) {
            $table->dropForeign(['deceased_person_id']);
            $table->dropColumn('deceased_person_id');  // この行を追加
        });
    }
};
