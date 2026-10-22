<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramUnggulan extends Model
{
    protected $fillable = [
        'kategori',
        'judul',
        'icon',
        'instansi',
        'lokasi',
        'periode',
        'deskripsi',
        'link',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Pastikan tabel & data awal tersedia.
     * Dipanggil controller sebelum query — berguna saat
     * artisan migrate belum sempat dijalankan.
     */
    public static function pastikanTabel(): void
    {
        if (Schema::hasTable('program_unggulans')) {
            return;
        }

        Schema::create('program_unggulans', function (Blueprint $table) {
            $table->id();

            $table->string('kategori');   // PKL / Magang / Kerjasama
            $table->string('judul');
            $table->string('icon')->nullable(); // emoji
            $table->string('instansi');
            $table->string('lokasi')->nullable();
            $table->string('periode')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('link')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });

        // ===== DATA AWAL =====

        $data = [
            [
                'kategori' => 'PKL',
                'judul' => 'Praktik Kerja Lapangan',
                'icon' => '🏢',
                'instansi' => 'Jaringan Mitra Industri Bogor',
                'lokasi' => 'Bogor & Jabodetabek',
                'periode' => '3 — 6 Bulan',
                'deskripsi' => 'PKL terjadwal di perusahaan mitra: manufaktur, IT, media, dan biro jasa. Didampingi pembimbing sekolah & mentor industri dengan penilaian logbook mingguan.',
                'link' => null,
                'urutan' => 1,
                'aktif' => true,
            ],
            [
                'kategori' => 'PKL',
                'judul' => 'PKL Kampus & Instansi Pemerintah',
                'icon' => '🏛',
                'instansi' => 'Dinas & Kampus Mitra',
                'lokasi' => 'Kota Bogor',
                'periode' => '4 Bulan',
                'deskripsi' => 'Program PKL alternatif di instansi dinas dan laboratorium kampus untuk siswa bidang IT & jaringan dengan proyek digitalisasi arsip dan layanan publik.',
                'link' => null,
                'urutan' => 2,
                'aktif' => true,
            ],
            [
                'kategori' => 'Magang',
                'judul' => 'Magang Bersertifikat BNSP',
                'icon' => '💼',
                'instansi' => 'PT Teknologi Nusantara',
                'lokasi' => 'Sentul, Bogor',
                'periode' => '6 Bulan',
                'deskripsi' => 'Magang terbayar dengan uang saku, mentoring rutin, dan sertifikat kompetensi BNSP. Kesempatan besar diangkat menjadi karyawan tetap setelah lulus.',
                'link' => null,
                'urutan' => 1,
                'aktif' => true,
            ],
            [
                'kategori' => 'Magang',
                'judul' => 'Magang Studio Kreatif',
                'icon' => '🎨',
                'instansi' => 'Studio Sinema & Agensi Kreatif',
                'lokasi' => 'Bogor Tengah',
                'periode' => '3 — 6 Bulan',
                'deskripsi' => 'Kesempatan magang untuk DKV & PSPT: editing video, desain grafis, dan produksi konten dengan portofolio nyata yang dipublikasikan.',
                'link' => null,
                'urutan' => 2,
                'aktif' => true,
            ],
            [
                'kategori' => 'Kerjasama',
                'judul' => 'Rekrutmen Bersama Industri',
                'icon' => '🤝',
                'instansi' => '30+ Perusahaan Mitra',
                'lokasi' => 'SMK INFOKOM Bogor',
                'periode' => '2x Setahun',
                'deskripsi' => 'Job fair internal: siswa lulusan wawancara langsung oleh HRD perusahaan mitra di aula sekolah. Ratusan baru terhubung tiap gelombang.',
                'link' => null,
                'urutan' => 1,
                'aktif' => true,
            ],
            [
                'kategori' => 'Kerjasama',
                'judul' => 'Industri Kelas & Guru Tamu',
                'icon' => '🎓',
                'instansi' => 'Praktisi Industri Nasional',
                'lokasi' => 'Lab & Studio Sekolah',
                'periode' => 'Setiap Semester',
                'deskripsi' => 'Praktisi industri mengajar kurikulum terkini (web, jaringan, desain, siaran) dan sertifikasi kelas eksklusif untuk siswa tingkat akhir.',
                'link' => null,
                'urutan' => 2,
                'aktif' => true,
            ],
        ];

        foreach ($data as $item) {
            static::create($item);
        }
    }
}
