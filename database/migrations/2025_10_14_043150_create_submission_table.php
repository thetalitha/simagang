<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submission', function (Blueprint $table) {
            $table->id('submission_id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id'); // peserta yang submit
            $table->string('file_path', 255); // file yang dikumpulkan
            $table->text('catatan')->nullable(); // catatan dari peserta
            $table->enum('status', ['pending', 'graded'])->default('pending');
            $table->integer('nilai')->nullable(); // nilai dari mentor
            $table->text('feedback')->nullable(); // feedback dari mentor
            $table->timestamps();

            // foreign keys
            $table->foreign('task_id')
                  ->references('task_id')
                  ->on('task')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            // unique constraint: satu user hanya bisa submit 1x per task
            $table->unique(['task_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submission');
    }
};