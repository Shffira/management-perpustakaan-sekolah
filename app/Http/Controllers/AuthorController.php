<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->get();

        return view('author.index', compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaAuthor' => 'required',
        ]);

        Author::create([
            'namaAuthor' => $request->namaAuthor,
        ]);

        return redirect()
            ->route('author')
            ->with('success', 'Author berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'namaAuthor' => 'required',
        ]);

        $author->update([
            'namaAuthor' => $request->namaAuthor,
        ]);

        return redirect()
            ->route('author')
            ->with('success', 'Author berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return redirect()
            ->route('author')
            ->with('success', 'Author berhasil dihapus.');
    }
}