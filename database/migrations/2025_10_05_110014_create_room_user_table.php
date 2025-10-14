<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');

            // foreign keys
            $table->foreign('room_id')
                ->references('room_id') // <— ini penting! harus sama kayak di tabel room
                ->on('room')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_user');
    }
};
