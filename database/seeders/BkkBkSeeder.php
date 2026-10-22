<?php

namespace Database\Seeders;

use App\Models\BkkLowongan;
use App\Models\BkLayanan;
use Illuminate\Database\Seeder;

class BkkBkSeeder extends Seeder
{
    public function run(): void
    {
        // ===== LOWONGAN BKK =====

        $lowongan = [
            [
                'posisi' => 'Junior Web Developer',
                'perusahaan' => 'PT Teknologi Nusantara',
                'logo' => '💻',
                'lokasi' => 'Bogor, Jawa Barat',
                'tipe' => 'Full-time',
                'gaji' => 'Rp 4,5 - 6 jt',
                'deskripsi' => 'Mengembangkan aplikasi web perusahaan menggunakan PHP/Laravel dan MySQL. Fresh graduate SMK RPL dipersilakan melamar.',
                'link' => null,
                'aktif' => true,
            ],
            [
                'posisi' => 'Teknisi Jaringan',
                'perusahaan' => 'CV Jaringan Mandiri',
                'logo' => '🔌',
                'lokasi' => 'Sentul, Bogor',
                'tipe' => 'Full-time',
                'gaji' => 'Rp 3,5 - 5 jt',
                'deskripsi' => 'Instalasi dan maintenance jaringan LAN/WAN, konfigurasi router, serta troubleshooting perangkat klien.',
                'link' => null,
                'aktif' => true,
            ],
            [
                'posisi' => 'Operator Editing Video',
                'perusahaan' => 'Studio Sinema Bogor',
                'logo' => '🎬',
                'lokasi' => 'Bogor Tengah',
                'tipe' => 'Kontrak',
                'gaji' => 'Rp 3 - 4,5 jt',
                'deskripsi' => 'Editing video konten klien menggunakan Premiere Pro / DaVinci Resolve. Lulusan DKV/PSPT diutamakan.',
                'link' => null,
                'aktif' => true,
            ],
            [
                'posisi' => 'Magang Graphic Designer',
                'perusahaan' => 'Agensi Kreatif Kota Hujan',
                'logo' => '🎨',
                'lokasi' => 'Bogor Utara',
                'tipe' => 'Magang / PKL',
                'gaji' => 'Uang saku',
                'deskripsi' => 'Mendesain materi promosi digital dan cetak. Kesempatan diangkat karyawan setelah masa magang.',
                'link' => null,
                'aktif' => true,
            ],
        ];

        foreach ($lowongan as $item) {

            BkkLowongan::updateOrCreate(
                ['posisi' => $item['posisi'], 'perusahaan' => $item['perusahaan']],
                $item
            );

        }


        // ===== LAYANAN BK =====

        $layanan = [
            [
                'nama' => 'Konseling Individual',
                'icon' => '💬',
                'deskripsi' => 'Sesi bicara satu lawan satu dengan guru BK untuk cerita masalah pribadi, belajar, atau rencana masa depan.',
                'aktif' => true,
            ],
            [
                'nama' => 'Konseling Kelompok',
                'icon' => '👥',
                'deskripsi' => 'Diskusi kelompok kecil untuk mengasah kemampuan sosial, komunikasi, dan pemecahan masalah bersama.',
                'aktif' => true,
            ],
            [
                'nama' => 'Klasikal',
                'icon' => '🗣',
                'deskripsi' => 'Penyuluhan tema di kelas: bahaya narkoba, bullying, media sosial sehat, dan persiapan dunia kerja.',
                'aktif' => true,
            ],
            [
                'nama' => 'Bimbingan Karier',
                'icon' => '🧭',
                'deskripsi' => 'Minat bakat, informatif kuliah & pekerjaan, hingga persiapan melamar kerja melalui jalur BKK sekolah.',
                'aktif' => true,
            ],
        ];

        foreach ($layanan as $item) {

            BkLayanan::updateOrCreate(
                ['nama' => $item['nama']],
                $item
            );

        }
    }
}
