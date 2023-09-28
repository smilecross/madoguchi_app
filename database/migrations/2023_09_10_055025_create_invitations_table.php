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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_page_id');
            $table->unsignedBigInteger('inviter_id');
            $table->string('invitee_email');
            $table->string('token')->unique();
            $table->enum('status', ['unread', 'read', 'joined', 'expired']);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->foreign('family_page_id')->references('id')->on('family_pages')->onDelete('cascade');
            $table->foreign('inviter_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
