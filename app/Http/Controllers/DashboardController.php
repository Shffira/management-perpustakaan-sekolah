<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Author;
use App\Models\Kategori;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalSiswa = Siswa::count();
        $totalAuthor = Author::count();
        $totalKategori = Kategori::count();
        $totalKelas = Kelas::count();

        $bukus = Buku::with(['author', 'kategori'])
            ->latest()
            ->take(5)
            ->get();

        $authors = Author::withCount('bukus')
            ->orderByDesc('bukus_count')
            ->take(6)
            ->get();

        return view('dashboard', compact(
            'totalBuku',
            'totalSiswa',
            'totalAuthor',
            'totalKategori',
            'totalKelas',
            'bukus',
            'authors'
        ));
    }
}