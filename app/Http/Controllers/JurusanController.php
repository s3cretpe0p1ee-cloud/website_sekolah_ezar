<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::latest()->get();

        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jurusans,kode',
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Jurusan::create($validated);

        return redirect('/admin/jurusan')
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jurusans,kode,' . $jurusan->id,
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $jurusan->update($validated);

        return redirect('/admin/jurusan')
            ->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect('/admin/jurusan')
            ->with('success', 'Jurusan berhasil dihapus.');
    }
}