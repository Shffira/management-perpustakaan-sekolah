<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();

        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKelas' => 'required',
            'tingkat' => 'required|unique:kelas,tingkat',
        ]);

        Kelas::create([
            'namaKelas' => $request->namaKelas,
            'tingkat' => $request->tingkat,
        ]);

        return redirect()
            ->route('kelas')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'namaKelas' => 'required',
            'tingkat' => 'required|unique:kelas,tingkat,' . $id,
        ]);

        $kelas->update([
            'namaKelas' => $request->namaKelas,
            'tingkat' => $request->tingkat,
        ]);

        return redirect()
            ->route('kelas')
            ->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()
            ->route('kelas')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}