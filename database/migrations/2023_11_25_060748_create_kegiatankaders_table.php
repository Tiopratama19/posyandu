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
        Schema::create('kegiatankaders', function (Blueprint $table) {
            $table->id();
            $table->date('Tanggal');
            $table->string('Nama');
            $table->string('Jabatan');
            $table->string('UraianKegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatankaders');
    }
};