<?php

namespace App\Support;

use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Jurusan;
use App\Models\Ppdb;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Schema;

/**
 * Mengisi tabel-tabel yang masih KOSONG dengan data awal.
 *
 * Data hanya dimasukkan kalau tabelnya kosong, jadi edit dan hapus
 * dari panel admin tidak akan ditimpa lagi.
 *
 * Dipanggil otomatis dari routes/web.php karena artisan
 * tidak selalu tersedia di environment ini.
 */
class IsiAwal
{
    public static function jalankan(): void
    {
        // agar tanggal tampil berbahasa Indonesia

        app()->setLocale('id');

        static::ppdb();
        static::jurusan();
        static::berita();
        static::fasilitas();
        static::prestasi();
    }

    private static function ppdb(): void
    {
        if (! Schema::hasTable('ppdbs')) {
            return;
        }

        if (Ppdb::count() > 0) {
            return;
        }

        Ppdb::create([
            'judul' => 'PPDB Tahun 2025/2026',
            'deskripsi' => 'Penerimaan Peserta Didik Baru TELAH DIBUKA! Daftar sekarang dan jangan lewatkan kesempatan bergabung bersama keluarga besar SMK INFOKOM. Tersedia 4 program keahlian: RPL, TKJ, DKV, dan PSPT.',
            'tahun' => '2025/2026',
            'link' => url('/ppdb'),
        ]);
    }

    private static function jurusan(): void
    {
        if (! Schema::hasTable('jurusans')) {
            return;
        }

        if (Jurusan::count() > 0) {
            return;
        }

        $data = [
            [
                'kode' => 'RPL',
                'nama' => 'Rekayasa Perangkat Lunak',
                'deskripsi' => 'Mempelajari pemrograman, pengembangan aplikasi web & mobile, basis data, dan pengujian perangkat lunak.',
            ],
            [
                'kode' => 'TKJ',
                'nama' => 'Teknik Komputer & Jaringan',
                'deskripsi' => 'Fokus pada jaringan komputer, administrasi server, keamanan jaringan, dan troubleshooting.',
            ],
            [
                'kode' => 'DKV',
                'nama' => 'Desain Komunikasi Visual',
                'deskripsi' => 'Mengembangkan kreativitas dalam desain grafis, ilustrasi, fotografi, dan multimedia.',
            ],
            [
                'kode' => 'PSPT',
                'nama' => 'Siaran & Perfilman Terapan',
                'deskripsi' => 'Produksi siaran, pembuatan film, editing video, dan motion graphic di studio broadcast sekolah.',
            ],
        ];

        foreach ($data as $item) {
            Jurusan::create($item);
        }
    }

    private static function berita(): void
    {
        if (! Schema::hasTable('beritas')) {
            return;
        }

        // konversi baris legacy judul 'Upacara' ke konten web
        // (aman dijalankan berulang, hanya kena baris berjudul persis 'Upacara')

        Berita::where('judul', 'Upacara')->update([
            'judul' => 'Upacara Bendera Rutin',
            'isi' => 'Kegiatan upacara bendera rutin hari Senin di halaman sekolah. Seluruh siswa mengikuti apel pagi dengan penuh disiplin.',
            'gambar' => 'images/Upacara.jpeg',
            'tanggal' => '2025-08-12',
        ]);

        if (Berita::count() > 0) {
            return;
        }

        $data = [
            [
                'judul' => 'Upacara Bendera Rutin',
                'isi' => 'Kegiatan upacara bendera rutin hari Senin di halaman sekolah. Seluruh siswa mengikuti apel pagi dengan penuh disiplin.',
                'gambar' => 'images/Upacara.jpeg',
                'tanggal' => '2025-08-12',
            ],
            [
                'judul' => 'Kunjungan Industri',
                'isi' => 'Siswa-siswi RPL melakukan kunjungan industri ke perusahaan mitra untuk belajar langsung dunia kerja.',
                'gambar' => 'images/Kunjungan-Industri.jpeg',
                'tanggal' => '2025-08-08',
            ],
            [
                'judul' => 'Prestasi Baru!',
                'isi' => 'Tim DKV meraih juara 1 lomba desain grafis tingkat kota. Selamat kepada para pemenang!',
                'gambar' => 'images/Prestasi.jpeg',
                'tanggal' => '2025-08-03',
            ],
        ];

        foreach ($data as $item) {
            Berita::create($item);
        }
    }

    private static function fasilitas(): void
    {
        if (! Schema::hasTable('fasilitas')) {
            return;
        }

        

        if (Fasilitas::count() > 0) {
            return;
        }

        $data = [
            [
                'nama' => 'Lab Komputer RPL',
                'deskripsi' => 'Laboratorium dengan 40 unit PC spesifikasi tinggi untuk praktik pemrograman dan pengembangan aplikasi.',
                'gambar' => null,
            ],
            [
                'nama' => 'Lab Jaringan & Server',
                'deskripsi' => 'Perangkat Cisco, Mikrotik, dan server fisik untuk praktik instalasi jaringan dan administrasi server.',
                'gambar' => null,
            ],
            [
                'nama' => 'Studio Kreatif DKV',
                'deskripsi' => 'Ruang desain dengan PC grafis, tablet gambar, dan peralatan fotografi untuk karya siswa DKV.',
                'gambar' => null,
            ],
            [
                'nama' => 'Studio Broadcast PSPT',
                'deskripsi' => 'Studio siaran dengan kamera profesional, lighting, perangkat audio, dan green screen.',
                'gambar' => null,
            ],
            [
                'nama' => 'Perpustakaan Digital',
                'deskripsi' => 'Koleksi buku fisik dan e-library yang dapat diakses siswa untuk menunjang pembelajaran.',
                'gambar' => null,
            ],
            [
                'nama' => 'Lapangan Olahraga',
                'deskripsi' => 'Lapangan basket dan futsal untuk ekstrakurikuler dan kegiatan jasmani siswa.',
                'gambar' => null,
            ],
            [
                'nama' => 'Masjid Sekolah',
                'deskripsi' => 'Tempat ibadah dan kegiatan keagamaan seperti Yasinan dan bimbingan rohani.',
                'gambar' => null,
            ],
            [
                'nama' => 'Kantin Sehat',
                'deskripsi' => 'Kantin dengan makanan bergizi dan higienis untuk mendukung kesehatan siswa.',
                'gambar' => null,
            ],
        ];

        foreach ($data as $item) {
            Fasilitas::create($item);
        }
    }

    private static function prestasi(): void
    {
        if (! Schema::hasTable('prestasis')) {
            return;
        }

        if (Prestasi::count() > 0) {
            return;
        }

        $data = [
            [
                'judul' => 'Juara 1 Lomba Desain Grafis Tingkat Kota',
                'deskripsi' => 'Tim DKV meraih juara 1 lomba desain grafis antar-SMK se-Kota Bogor.',
                'tahun' => '2025',
            ],
            [
                'judul' => 'Juara 2 LKS Web Technologies Provinsi',
                'deskripsi' => 'Siswa RPL meraih juara 2 Lomba Kompetensi Siswa bidang Web Technologies tingkat Jawa Barat.',
                'tahun' => '2025',
            ],
            [
                'judul' => 'Juara 3 Network Competition Nasional',
                'deskripsi' => 'Tim TKJ meraih juara 3 kompetensi jaringan komputer tingkat nasional.',
                'tahun' => '2024',
            ],
            [
                'judul' => 'Finalis Film Pelajar Indonesia',
                'deskripsi' => 'Karya siswa PSPT lolos menjadi finalis festival film pelajar tingkat nasional.',
                'tahun' => '2024',
            ],
            [
                'judul' => 'Juara 1 Futsal Antar SMK Bogor',
                'deskripsi' => 'Tim futsal SMK INFOKOM juara 1 turnamen antar-SMK se-Kota Bogor.',
                'tahun' => '2024',
            ],
            [
                'judul' => 'Juara 1 O2SN Bulu Tangkis',
                'deskripsi' => 'Siswa meraih medali emas bulu tangkis Olimpiade Olahraga Siswa Nasional tingkat kota.',
                'tahun' => '2023',
            ],
        ];

        foreach ($data as $item) {
            Prestasi::create($item);
        }
    }
}