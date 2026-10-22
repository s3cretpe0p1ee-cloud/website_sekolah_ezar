<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdbs = Ppdb::latest()->get();

        return view('admin.ppdb.index', compact('ppdbs'));
    }

    public function create()
    {
        return view('admin.ppdb.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'tahun' => 'required',
            'link' => 'nullable|url',
        ]);

        Ppdb::create($validated);

        return redirect('/admin/ppdb')
            ->with('success', 'Data PPDB berhasil ditambahkan.');
    }

    public function edit(Ppdb $ppdb)
    {
        return view('admin.ppdb.edit', compact('ppdb'));
    }

    public function update(Request $request, Ppdb $ppdb)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'tahun' => 'required',
            'link' => 'nullable|url',
        ]);

        $ppdb->update($validated);

        return redirect('/admin/ppdb')
            ->with('success', 'Data PPDB berhasil diperbarui.');
    }

    public function destroy(Ppdb $ppdb)
    {
        $ppdb->delete();

        return redirect('/admin/ppdb')
            ->with('success', 'Data PPDB berhasil dihapus.');
    }
}