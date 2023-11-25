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
        Schema::create('dataremajas', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('Nama');
            $table->string('TempatLahir');
            $table->string('TanggalLahir');
            $table->string('JenisKelamin');
            $table->string('BB');
            $table->string('TB');
            $table->string('TTD');
            $table->string('LILA');
            $table->string('LP');
            $table->string('Anemia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataremajas');
    }
};