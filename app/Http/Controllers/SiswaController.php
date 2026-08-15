<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    // Menampilkan semua siswa
    public function index()
{
    $siswas = Siswa::with('kelas')->latest()->get();

    return view('siswa.index', compact('siswas'));
}

    // Form tambah siswa
    public function create()
    {
        $kelas = Kelas::orderBy('namaKelas')->get();

        return view('siswa.create', compact('kelas'));
    }

    // Menyimpan siswa
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()
            ->route('siswa')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::orderBy('namaKelas')->get();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    // Update siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()
            ->route('siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Hapus siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('siswa')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
    public function kelas()
{
    return $this->belongsTo(Kelas::class);
}
}