<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitass = Fasilitas::latest()->get();

        return view('admin.fasilitas.index', compact('fasilitass'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('fasilitas', 'public');
        }

        Fasilitas::create($validated);

        return redirect('/admin/fasilitas')
            ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

    
        if ($request->hasFile('gambar')) {

            if ($fasilitas->gambar) {
                Storage::disk('public')->delete($fasilitas->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('fasilitas', 'public');
        }

        $fasilitas->update($validated);

        return redirect('/admin/fasilitas')
            ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        if ($fasilitas->gambar) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }

        $fasilitas->delete();

        return redirect('/admin/fasilitas')
            ->with('success', 'Fasilitas berhasil dihapus.');
    }
}