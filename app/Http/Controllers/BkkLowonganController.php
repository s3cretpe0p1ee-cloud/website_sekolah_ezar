<?php

namespace App\Http\Controllers;

use App\Models\BkkLowongan;
use Illuminate\Http\Request;

class BkkLowonganController extends Controller
{
    // ADMIN - DAFTAR LOWONGAN

    public function index()
    {
        $lowongans = BkkLowongan::latest()->get();

        return view('admin.bkk.index', compact('lowongans'));
    }

    // FRONTEND - HALAMAN BKK

    public function frontend()
    {
        // Jika tabel belum dimigrasi, kirim koleksi kosong
        // supaya halaman memakai data contoh bawaan view.

        try {

            $lowongans = BkkLowongan::where('aktif', true)
                ->orderBy('id', 'desc')
                ->get();

        } catch (\Throwable $e) {

            $lowongans = collect();

        }

        return view('bkk', compact('lowongans'));
    }

    // FORM TAMBAH

    public function create()
    {
        return view('admin.bkk.create');
    }

    // SIMPAN

    public function store(Request $request)
    {
        $validated = $request->validate([
            'posisi' => 'required',
            'perusahaan' => 'required',
            'logo' => 'nullable',
            'lokasi' => 'required',
            'tipe' => 'required',
            'gaji' => 'nullable',
            'deskripsi' => 'nullable',
            'link' => 'nullable|url',
            'aktif' => 'nullable|boolean',
        ]);

        $validated['aktif'] = $request->boolean('aktif');

        BkkLowongan::create($validated);

        return redirect('/admin/bkk')
            ->with('success', 'Lowongan BKK berhasil ditambahkan.');
    }

    // FORM EDIT

    public function edit(BkkLowongan $bkk)
    {
        return view('admin.bkk.edit', compact('bkk'));
    }

    // UPDATE

    public function update(Request $request, BkkLowongan $bkk)
    {
        $validated = $request->validate([
            'posisi' => 'required',
            'perusahaan' => 'required',
            'logo' => 'nullable',
            'lokasi' => 'required',
            'tipe' => 'required',
            'gaji' => 'nullable',
            'deskripsi' => 'nullable',
            'link' => 'nullable|url',
            'aktif' => 'nullable|boolean',
        ]);

        $validated['aktif'] = $request->boolean('aktif');

        $bkk->update($validated);

        return redirect('/admin/bkk')
            ->with('success', 'Lowongan BKK berhasil diperbarui.');
    }

    // HAPUS

    public function destroy(BkkLowongan $bkk)
    {
        $bkk->delete();

        return redirect('/admin/bkk')
            ->with('success', 'Lowongan BKK berhasil dihapus.');
    }
}
