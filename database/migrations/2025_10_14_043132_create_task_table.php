<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id('task_id');
            $table->unsignedBigInteger('room_id');
            $table->string('judul', 255);
            $table->text('deskripsi');
            $table->string('file_path', 255)->nullable(); // file soal/materi task (opsional)
            $table->dateTime('deadline');
            $table->timestamps();

            // foreign key
            $table->foreign('room_id')
                  ->references('room_id')
                  ->on('room')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};