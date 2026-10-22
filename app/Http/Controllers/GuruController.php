<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    // ADMIN - DAFTAR GURU
    public function index()
    {
        $gurus = Guru::with('peran')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.guru.index', compact('gurus'));
    }

    // FRONTEND - HALAMAN GURU
    public function frontend()
    {
        $gurus = Guru::with('peran')
            ->orderBy('id', 'asc')
            ->get();

        return view('guru', compact('gurus'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.guru.create');
    }

    // SIMPAN GURU + PERAN
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'nullable',
            'nama' => 'required',
            'email' => 'nullable|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'peran' => 'required|array|min:1',
            'peran.*.jenis' => 'required',
            'peran.*.jabatan' => 'required',
            'peran.*.kelas' => 'nullable',
        ]);

        DB::transaction(function () use ($request, $validated) {

            if ($request->hasFile('foto')) {
                $validated['foto'] = $request->file('foto')
                    ->store('guru', 'public');
            }

            $guru = Guru::create([
                'nip' => $validated['nip'] ?? null,
                'nama' => $validated['nama'],
                'email' => $validated['email'] ?? null,
                'foto' => $validated['foto'] ?? null,
                'jabatan' => $validated['peran'][0]['jabatan'],
            ]);

            foreach ($validated['peran'] as $peran) {
                $guru->peran()->create([
                    'jenis' => $peran['jenis'],
                    'jabatan' => $peran['jabatan'],
                    'kelas' => $peran['kelas'] ?? null,
                ]);
            }
        });

        return redirect('/admin/guru')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit(Guru $guru)
    {
        $guru->load('peran');

        return view('admin.guru.edit', compact('guru'));
    }

    // UPDATE GURU + PERAN
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nip' => 'nullable',
            'nama' => 'required',
            'email' => 'nullable|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'peran' => 'required|array|min:1',
            'peran.*.jenis' => 'required',
            'peran.*.jabatan' => 'required',
            'peran.*.kelas' => 'nullable',
        ]);

        DB::transaction(function () use ($request, $validated, $guru) {

            if ($request->hasFile('foto')) {

                if ($guru->foto) {
                    Storage::disk('public')->delete($guru->foto);
                }

                $validated['foto'] = $request->file('foto')
                    ->store('guru', 'public');
            }

            $guru->update([
                'nip' => $validated['nip'] ?? null,
                'nama' => $validated['nama'],
                'email' => $validated['email'] ?? null,
                'foto' => $validated['foto'] ?? $guru->foto,
                'jabatan' => $validated['peran'][0]['jabatan'],
            ]);

            // Hapus peran lama
            $guru->peran()->delete();

            // Simpan peran baru sesuai urutan input
            foreach ($validated['peran'] as $peran) {

                $guru->peran()->create([
                    'jenis' => $peran['jenis'],
                    'jabatan' => $peran['jabatan'],
                    'kelas' => $peran['kelas'] ?? null,
                ]);
            }
        });

        return redirect('/admin/guru')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    // HAPUS
    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect('/admin/guru')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}