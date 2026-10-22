<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {

            if (! Schema::hasColumn('galeris', 'kategori')) {
                $table->string('kategori')->default('kegiatan')->after('gambar');
            }

            if (! Schema::hasColumn('galeris', 'tanggal')) {
                $table->date('tanggal')->nullable()->after('kategori');
            }

            if (! Schema::hasColumn('galeris', 'gambar_fallback')) {
                $table->string('gambar_fallback')->nullable()->after('gambar');
            }

        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {

            $table->dropColumn(['kategori', 'tanggal', 'gambar_fallback']);

        });
    }
};
