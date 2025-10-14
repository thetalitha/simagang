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
        Schema::create('materi', function (Blueprint $table) {
            $table->id('materi_id'); // auto increment primary key
            $table->unsignedBigInteger('room_id'); // foreign key ke tabel room
            $table->string('judul', 150);
            $table->text('deskripsi')->nullable();
            $table->longText('konten')->nullable(); // isi materi
            $table->string('file_path', 255)->nullable(); // file materi (opsional)
            $table->timestamps(); // created_at & updated_at

            // foreign key
            $table->foreign('room_id')
                  ->references('room_id')
                  ->on('room')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
