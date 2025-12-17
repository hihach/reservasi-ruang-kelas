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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();

            // Foreign Key ke tabel 'lantai'
            // Kita pakai nama kolom 'id_lantai' sesuai request lo
            $table->foreignId('id_lantai')->constrained('lantai')->onDelete('cascade');

            $table->string('nama_kelas'); // Contoh: 'Lab Komputer A'
            $table->integer('kapasitas');
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
