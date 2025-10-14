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
        Schema::create('room', function (Blueprint $table) {
            $table->id('room_id'); // PK auto increment
            $table->string('nama_room', 100);
            $table->string('code')->unique();
            $table->text('deskripsi')->nullable();

            $table->unsignedBigInteger('mentor_id'); // FK ke mentor

            // created_at -> default CURRENT_TIMESTAMP
            $table->timestamp('created_at')->useCurrent();

            // Kalau kamu mau ada updated_at juga:
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // foreign key
            $table->foreign('mentor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
