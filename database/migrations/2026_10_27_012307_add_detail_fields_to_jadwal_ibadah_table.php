
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwal_ibadah', function (Blueprint $table) {
            $table->string('pengkhotbah')->nullable();
            $table->string('nats_alkitab')->nullable();
            $table->string('tema')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('jadwal_ibadah', function (Blueprint $table) {
            $table->dropColumn([
                'pengkhotbah',
                'nats_alkitab',
                'tema',
            ]);
        });
    }
};
