<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class Galeri extends Model
{
    protected $fillable = [
        'judul',
        'gambar',
        'gambar_fallback',
        'kategori',
        'tanggal',
        'deskripsi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Pastikan tabel & kolom baru tersedia (tanpa artisan).
     * Sekalian mengisi data awal bila tabel masih kosong.
     */
    public static function pastikanTabel(): void
    {
        if (! Schema::hasTable('galeris')) {

            Schema::create('galeris', function (Blueprint $table) {
                $table->id();

                $table->string('judul');
                $table->string('gambar');
                $table->string('gambar_fallback')->nullable();
                $table->string('kategori')->default('kegiatan');
                $table->date('tanggal')->nullable();
                $table->text('deskripsi')->nullable();

                $table->timestamps();
            });

            static::isiAwal();

            return;
        }

        // upgrade struktur lama bila kolom belum ada

        if (! Schema::hasColumn('galeris', 'kategori')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->string('kategori')->default('kegiatan')->after('gambar');
            });
        }

        if (! Schema::hasColumn('galeris', 'tanggal')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->date('tanggal')->nullable()->after('kategori');
            });
        }

        if (! Schema::hasColumn('galeris', 'gambar_fallback')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->string('gambar_fallback')->nullable()->after('gambar');
            });
        }

        if (static::count() === 0) {
            static::isiAwal();
        }
    }

    /**
     * Data awal 10 kegiatan — sama dengan yang tampil di halaman web.
     * gambar_fallback dipakai bila file upload belum tersedia.
     */
    public static function isiAwal(): void
    {
        $data = [
            [
                'judul' => 'Upacara Bendera Rutin',
                'gambar' => 'images/Upacara.jpeg',
                'kategori' => 'upacara',
                'tanggal' => '2025-08-12',
                'deskripsi' => 'Kegiatan upacara bendera rutin setiap hari Senin di halaman sekolah.',
            ],
            [
                'judul' => 'Kunjungan Industri RPL',
                'gambar' => 'images/Kunjungan-Industri.jpeg',
                'kategori' => 'industri',
                'tanggal' => '2025-08-08',
                'deskripsi' => 'Siswa-siswi RPL berkunjung ke perusahaan mitra untuk belajar langsung dunia kerja.',
            ],
            [
                'judul' => 'Juara 1 Lomba Desain Grafis',
                'gambar' => 'images/Prestasi.jpeg',
                'kategori' => 'prestasi',
                'tanggal' => '2025-08-03',
                'deskripsi' => 'Tim DKV meraih juara 1 lomba desain grafis tingkat kota.',
            ],
            [
                'judul' => 'Pelantikan Pengurus OSIS',
                'gambar' => 'images/Galeri-1.jpeg',
                'kategori' => 'kegiatan',
                'tanggal' => '2025-07-19',
                'deskripsi' => 'Pelantikan pengurus OSIS periode baru di aula sekolah.',
            ],
            [
                'judul' => 'Class Meeting & Lomba 17-an',
                'gambar' => 'images/Galeri-2.jpeg',
                'kategori' => 'kegiatan',
                'tanggal' => '2025-08-14',
                'deskripsi' => 'Rangkaian lomba menyambut kemerdekaan RI antar kelas.',
            ],
            [
                'judul' => 'Study Tour & Wisata Edukasi',
                'gambar' => 'images/Galeri-3.jpeg',
                'kategori' => 'kegiatan',
                'tanggal' => '2025-06-10',
                'deskripsi' => 'Kunjungan edukasi dan rekreasi siswa ke destinasi wisata.',
            ],
            [
                'judul' => 'Seminar Karier Digital',
                'gambar' => 'images/Galeri-4.jpeg',
                'kategori' => 'seminar',
                'tanggal' => '2025-05-28',
                'deskripsi' => 'Seminar motivasi dan persiapan karier di era digital bersama praktisi industri.',
            ],
            [
                'judul' => 'Ekskul Fotografi DKV',
                'gambar' => 'images/Galeri-5.jpeg',
                'kategori' => 'kegiatan',
                'tanggal' => '2025-05-16',
                'deskripsi' => 'Latihan teknik fotografi lapangan oleh ekskul DKV.',
            ],
            [
                'judul' => 'Job Fair BKK 2025',
                'gambar' => 'images/Galeri-6.jpeg',
                'kategori' => 'industri',
                'tanggal' => '2025-05-03',
                'deskripsi' => 'Rekrutmen bersama perusahaan mitra di aula sekolah.',
            ],
            [
                'judul' => 'Sambutan Kepala Sekolah Baru',
                'gambar' => 'images/sensei restu2.jpeg',
                'kategori' => 'kegiatan',
                'tanggal' => '2025-07-21',
                'deskripsi' => 'Acara sambutan dan silaturahmi bersama kepala sekolah baru.',
            ],
        ];

        foreach ($data as $item) {
            static::create($item);
        }
    }

    /**
     * URL foto: pakai file upload (storage) bila ada,
     * kalau tidak pakai aset bawaan public/images.
     */
    public function getUrlFotoAttribute(): string
    {
        $g = $this->gambar;

        // file upload admin: storage/galeri/xxx.jpg

        if ($g && str_starts_with($g, 'galeri/')) {
            return asset('storage/' . $g);
        }

        // data awal sudah memuat prefix images/

        if ($g && str_starts_with($g, 'images/')) {
            return asset($g);
        }

        if ($g && $this->gambar_fallback) {
            return asset('images/' . $this->gambar_fallback);
        }

        if ($g) {
            return asset('images/' . $g);
        }

        return asset('images/logo infokom.jpeg');
    }

    /**
     * Warna khas tiap kategori untuk kartu galeri.
     */

    public function getWarnaKategoriAttribute(): array
    {
        $warna = [
            'upacara' => ['utama' => '#2563eb', 'muda' => '#60a5fa'],
            'industri' => ['utama' => '#0d9488', 'muda' => '#2dd4bf'],
            'kegiatan' => ['utama' => '#e11d48', 'muda' => '#fb7185'],
            'prestasi' => ['utama' => '#d97706', 'muda' => '#fbbf24'],
            'seminar' => ['utama' => '#7c3aed', 'muda' => '#a78bfa'],
        ];

        return $warna[$this->kategori] ?? ['utama' => '#2563eb', 'muda' => '#60a5fa'];
    }

    /**
     * Nama kategori lengkap dengan emoji.
     */
    public function getLabelKategoriAttribute(): string
    {
        $labels = [
            'upacara' => '🎖 Upacara',
            'industri' => '🏭 Industri',
            'kegiatan' => '🎉 Kegiatan',
            'prestasi' => '🏆 Prestasi',
            'seminar' => '🎤 Seminar',
        ];

        return $labels[$this->kategori] ?? '🎉 Kegiatan';
    }

    /**
     * Format tanggal berbahasa Indonesia: "Senin, 12 Agustus 2025".
     */
    public function getTanggalIndoAttribute(): string
    {
        if (! $this->tanggal) {
            return '';
        }

        $hari = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];

        $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $t = $this->tanggal;

        return $hari[$t->format('l')] . ', ' . $t->day . ' ' . $bulan[(int) $t->format('n')] . ' ' . $t->year;
    }
}
