<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// kelas

Route::get('/kelas', [KelasController::class, 'index'])
    ->name('kelas')
    ->middleware('auth');

Route::get('/kelas/create', [KelasController::class, 'create'])
    ->name('kelas.create')
    ->middleware('auth');

Route::post('/kelas', [KelasController::class, 'store'])
    ->name('kelas.store')
    ->middleware('auth');

Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])
    ->name('kelas.edit')
    ->middleware('auth');

Route::put('/kelas/{id}', [KelasController::class, 'update'])
    ->name('kelas.update')
    ->middleware('auth');

Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])
    ->name('kelas.destroy')
    ->middleware('auth');

// siswa
Route::get('/siswa', [SiswaController::class, 'index'])
    ->name('siswa')
    ->middleware('auth');

Route::get('/siswa/create', [SiswaController::class, 'create'])
    ->name('siswa.create')
    ->middleware('auth');

Route::post('/siswa', [SiswaController::class, 'store'])
    ->name('siswa.store')
    ->middleware('auth');

Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])
    ->name('siswa.edit')
    ->middleware('auth');

Route::put('/siswa/{id}', [SiswaController::class, 'update'])
    ->name('siswa.update')
    ->middleware('auth');

Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])
    ->name('siswa.destroy')
    ->middleware('auth');

// author

Route::get('/author', [AuthorController::class, 'index'])
    ->name('author')
    ->middleware('auth');

Route::get('/author/create', [AuthorController::class, 'create'])
    ->name('author.create')
    ->middleware('auth');

Route::post('/author', [AuthorController::class, 'store'])
    ->name('author.store')
    ->middleware('auth');

Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])
    ->name('author.edit')
    ->middleware('auth');

Route::put('/author/{id}', [AuthorController::class, 'update'])
    ->name('author.update')
    ->middleware('auth');

Route::delete('/author/{id}', [AuthorController::class, 'destroy'])
    ->name('author.destroy')
    ->middleware('auth');

    // kategori
    Route::get('/kategori', [KategoriController::class, 'index'])
    ->name('kategori')
    ->middleware('auth');

Route::get('/kategori/create', [KategoriController::class, 'create'])
    ->name('kategori.create')
    ->middleware('auth');

Route::post('/kategori', [KategoriController::class, 'store'])
    ->name('kategori.store')
    ->middleware('auth');

Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])
    ->name('kategori.edit')
    ->middleware('auth');

Route::put('/kategori/{id}', [KategoriController::class, 'update'])
    ->name('kategori.update')
    ->middleware('auth');

Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])
    ->name('kategori.destroy')
    ->middleware('auth');

    // buku
    
    Route::get('/buku', [BukuController::class, 'index'])
    ->name('buku')
    ->middleware('auth');

Route::get('/buku/create', [BukuController::class, 'create'])
    ->name('buku.create')
    ->middleware('auth');

Route::post('/buku', [BukuController::class, 'store'])
    ->name('buku.store')
    ->middleware('auth');

Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])
    ->name('buku.edit')
    ->middleware('auth');

Route::put('/buku/{id}', [BukuController::class, 'update'])
    ->name('buku.update')
    ->middleware('auth');

Route::delete('/buku/{id}', [BukuController::class, 'destroy'])
    ->name('buku.destroy')
    ->middleware('auth');
require __DIR__.'/auth.php';
