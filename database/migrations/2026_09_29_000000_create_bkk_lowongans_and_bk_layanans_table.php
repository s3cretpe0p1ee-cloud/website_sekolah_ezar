<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // LOWONGAN KERJA BKK

        Schema::create('bkk_lowongans', function (Blueprint $table) {
            $table->id();

            $table->string('posisi');
            $table->string('perusahaan');
            $table->string('logo')->nullable(); // emoji/icon, bukan file
            $table->string('lokasi');
            $table->string('tipe');             // Full-time / Kontrak / Magang / PKL
            $table->string('gaji')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('link')->nullable(); // link pendaftaran (opsional)
            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });

        // LAYANAN BK

        Schema::create('bk_layanans', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('icon')->nullable(); // emoji, default di view jika kosong
            $table->text('deskripsi')->nullable();
            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bkk_lowongans');
        Schema::dropIfExists('bk_layanans');
    }
};
