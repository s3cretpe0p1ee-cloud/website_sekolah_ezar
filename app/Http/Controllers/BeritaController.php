<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita.index', compact('beritas'));
    }


    public function create()
    {
        return view('admin.berita.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
        ]);


        // Kalau ada foto yang dipilih
        if ($request->hasFile('gambar')) {

            $validated['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }


        Berita::create($validated);


        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil ditambahkan.');
    }


    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }


    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
        ]);


        // Kalau user memilih foto baru
        if ($request->hasFile('gambar')) {

            // Hapus foto lama kalau ada
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan foto baru
            $validated['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }


        $berita->update($validated);


        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil diperbarui.');
    }


    public function destroy(Berita $berita)
    {
        // Hapus foto dari storage sebelum data dihapus
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }


        $berita->delete();


        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil dihapus.');
    }
}