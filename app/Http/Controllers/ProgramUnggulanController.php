<?php

namespace App\Http\Controllers;

use App\Models\ProgramUnggulan;
use Illuminate\Http\Request;

class ProgramUnggulanController extends Controller
{
    public const KATEGORI = ['PKL', 'Magang', 'Kerjasama'];

    // FRONTEND - HALAMAN PROGRAM UNGGULAN

    public function frontend()
    {
        ProgramUnggulan::pastikanTabel();

        $programs = ProgramUnggulan::where('aktif', true)
            ->orderBy('kategori')
            ->orderBy('urutan')
            ->orderBy('id')
            ->get()
            ->groupBy('kategori');

        return view('program-unggulan', compact('programs'));
    }

    // ADMIN - DAFTAR

    public function index()
    {
        ProgramUnggulan::pastikanTabel();

        $programs = ProgramUnggulan::orderBy('kategori')
            ->orderBy('urutan')
            ->orderBy('id')
            ->get();

        return view('admin.program-unggulan.index', compact('programs'));
    }

    // ADMIN - FORM TAMBAH

    public function create()
    {
        $kategoriList = self::KATEGORI;

        return view('admin.program-unggulan.create', compact('kategoriList'));
    }

    // ADMIN - SIMPAN

    public function store(Request $request)
    {
        ProgramUnggulan::pastikanTabel();

        $validated = $this->validasi($request);

        ProgramUnggulan::create($validated);

        return redirect('/admin/program-unggulan')
            ->with('success', 'Program unggulan berhasil ditambahkan.');
    }

    // ADMIN - FORM EDIT

    public function edit(ProgramUnggulan $programUnggulan)
    {
        $kategoriList = self::KATEGORI;

        return view('admin.program-unggulan.edit', compact('programUnggulan', 'kategoriList'));
    }

    // ADMIN - UPDATE

    public function update(Request $request, ProgramUnggulan $programUnggulan)
    {
        $validated = $this->validasi($request);

        $programUnggulan->update($validated);

        return redirect('/admin/program-unggulan')
            ->with('success', 'Program unggulan berhasil diperbarui.');
    }

    // ADMIN - HAPUS

    public function destroy(ProgramUnggulan $programUnggulan)
    {
        $programUnggulan->delete();

        return redirect('/admin/program-unggulan')
            ->with('success', 'Program unggulan berhasil dihapus.');
    }

    // ATURAN VALIDASI BERSAMA

    private function validasi(Request $request): array
    {
        return $request->validate([
            'kategori' => 'required|in:' . implode(',', self::KATEGORI),
            'judul' => 'required|max:150',
            'icon' => 'nullable|max:10',
            'instansi' => 'required|max:150',
            'lokasi' => 'nullable|max:150',
            'periode' => 'nullable|max:100',
            'deskripsi' => 'nullable',
            'link' => 'nullable|url',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'nullable|boolean',
        ]) + ['aktif' => $request->boolean('aktif')];
    }
}
