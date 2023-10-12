<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyPageUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_page_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_page_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('family_page_id')->references('id')->on('family_pages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_page_user');
    }
}
