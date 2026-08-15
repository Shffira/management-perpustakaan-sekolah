<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();

        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required',
        ]);

        Kategori::create([
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()
            ->route('kategori')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()
            ->route('kategori')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()
            ->route('kategori')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}