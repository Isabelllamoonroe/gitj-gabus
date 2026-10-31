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
    Schema::create('profil_gereja', function (Blueprint $table) {
        $table->id();
        $table->string('nama_gereja')->default('GITJ Gabus');
        $table->longText('sejarah')->nullable();
        $table->text('visi')->nullable();
        $table->longText('misi')->nullable();
        $table->text('alamat')->nullable();
        $table->string('telepon')->nullable();
        $table->string('email')->nullable();
        $table->text('maps_embed_url')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_gereja');
    }
};
