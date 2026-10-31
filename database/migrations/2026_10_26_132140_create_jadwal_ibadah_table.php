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
    Schema::create('jadwal_ibadah', function (Blueprint $table) {
        $table->id();
        $table->string('nama_ibadah');
        $table->string('hari');
        $table->time('waktu_mulai');
        $table->time('waktu_selesai')->nullable();
        $table->string('lokasi')->nullable();
        $table->text('keterangan')->nullable();
        $table->boolean('aktif')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ibadah');
    }
};
