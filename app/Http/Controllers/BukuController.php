<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Buku;
use App\Models\Author;
use App\Models\Kategori;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with(['author', 'kategori'])
            ->latest()
            ->get();

        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        $authors = Author::orderBy('namaAuthor')->get();
        $kategoris = Kategori::orderBy('namaKategori')->get();

        return view('buku.create', compact('authors', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judulBuku' => 'required',
            'author_id' => 'required|exists:authors,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'stock' => 'required|integer|min:0',
        ]);

        Buku::create([
            'judulBuku' => $request->judulBuku,
            'author_id' => $request->author_id,
            'kategori_id' => $request->kategori_id,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('buku')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        $authors = Author::orderBy('namaAuthor')->get();
        $kategoris = Kategori::orderBy('namaKategori')->get();

        return view('buku.edit', compact(
            'buku',
            'authors',
            'kategoris'
        ));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'judulBuku' => 'required',
            'author_id' => 'required|exists:authors,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'stock' => 'required|integer|min:0',
        ]);

        $buku->update([
            'judulBuku' => $request->judulBuku,
            'author_id' => $request->author_id,
            'kategori_id' => $request->kategori_id,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('buku')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()
            ->route('buku')
            ->with('success', 'Buku berhasil dihapus.');
    }
}