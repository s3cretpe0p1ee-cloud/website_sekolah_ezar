<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public const KATEGORI = [
        'upacara' => '🎖 Upacara',
        'industri' => '🏭 Industri',
        'kegiatan' => '🎉 Kegiatan',
        'prestasi' => '🏆 Prestasi',
        'seminar' => '🎤 Seminar',
    ];

    // FRONTEND - HALAMAN GALERI

    public function frontend()
    {
        Galeri::pastikanTabel();

        $galeris = Galeri::orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('galeri', compact('galeris'));
    }

    // ADMIN - DAFTAR

    public function index()
    {
        Galeri::pastikanTabel();

        $galeris = Galeri::orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    // ADMIN - FORM TAMBAH

    public function create()
    {
        $kategoriList = self::KATEGORI;

        return view('admin.galeri.create', compact('kategoriList'));
    }

    // ADMIN - SIMPAN

    public function store(Request $request)
    {
        Galeri::pastikanTabel();

        $validated = $this->validasi($request, true);

        if ($request->hasFile('gambar')) {

            $validated['gambar'] = $request->file('gambar')
                ->store('galeri', 'public');

            $validated['gambar_fallback'] = null;

        }

        Galeri::create($validated);

        return redirect('/admin/galeri')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    // ADMIN - FORM EDIT

    public function edit(Galeri $galeri)
    {
        $kategoriList = self::KATEGORI;

        return view('admin.galeri.edit', compact('galeri', 'kategoriList'));
    }

    // ADMIN - UPDATE

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $this->validasi($request, false);

        if ($request->hasFile('gambar')) {

            // hapus file upload lama (bukan aset bawaan)

            if ($galeri->gambar && str_starts_with($galeri->gambar, 'galeri/')) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('galeri', 'public');

            $validated['gambar_fallback'] = null;

        }

        $galeri->update($validated);

        return redirect('/admin/galeri')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    // ADMIN - HAPUS

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && str_starts_with($galeri->gambar, 'galeri/')) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        // pastikan galeri tidak pernah kosong di halaman publik

        if (Galeri::count() === 0) {
            Galeri::isiAwal();
        }

        return redirect('/admin/galeri')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }

    // ATURAN VALIDASI BERSAMA

    private function validasi(Request $request, bool $wajibFoto): array
    {
        $aturanGambar = $wajibFoto
            ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
            : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048';

        return $request->validate([
            'judul' => 'required|max:150',
            'kategori' => 'required|in:' . implode(',', array_keys(self::KATEGORI)),
            'tanggal' => 'nullable|date',
            'deskripsi' => 'nullable|max:500',
            'gambar' => $aturanGambar,
        ]);
    }
}
