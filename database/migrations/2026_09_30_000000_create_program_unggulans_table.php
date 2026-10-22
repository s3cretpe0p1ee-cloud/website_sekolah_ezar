<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_unggulans', function (Blueprint $table) {
            $table->id();

            $table->string('kategori');   // PKL / Magang / Kerjasama
            $table->string('judul');
            $table->string('icon')->nullable();
            $table->string('instansi');
            $table->string('lokasi')->nullable();
            $table->string('periode')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('link')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_unggulans');
    }
};
