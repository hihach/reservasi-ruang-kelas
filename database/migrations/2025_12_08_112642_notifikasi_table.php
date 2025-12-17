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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();

            // Kalau user dihapus, notifikasinya ilang gapapa (Cascade)
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');

            $table->text('pesan');
            $table->boolean('is_read')->default(false); // 0 = belum baca, 1 = sudah

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
