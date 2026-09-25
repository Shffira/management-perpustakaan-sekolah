@extends('layouts.app')

@section('title', 'Data Buku')
@section('page-title', 'Data Buku')

@section('content')

<style>
    .content-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 22px;
        padding: 25px;
        box-shadow: 0 8px 24px rgba(0,0,0,.04);
    }

    .content-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    }

    .content-header h2 {
        font-size:18px;
        margin:0;
        color:#1f2937;
    }

    .content-header p {
        margin-top:5px;
        font-size:12px;
        color:#9ca3af;
    }

    .btn-add {
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:11px 16px;
        border-radius:12px;
        background:#2563eb;
        color:white;
        text-decoration:none;
        font-size:13px;
        font-weight:600;
        transition: background .15s;
    }

    .btn-add:hover {
        background:#1d4ed8;
        color:white;
    }

    .alert-success {
        padding:13px 16px;
        margin-bottom:20px;
        border-radius:12px;
        background:#f3f4f6;
        color:#374151;
        font-size:13px;
        border-left:3px solid #2563eb;
    }

    table {
        width:100%;
        border-collapse:collapse;
    }

    th {
        padding:14px;
        text-align:left;
        font-size:11px;
        color:#9ca3af;
        text-transform:uppercase;
        border-bottom:1px solid #e5e7eb;
    }

    td {
        padding:14px;
        font-size:13px;
        border-bottom:1px solid #f3f4f6;
        vertical-align:middle;
    }

    .book-cell {
        display:flex;
        align-items:center;
        gap:12px;
    }

    .book-thumb {
        width:42px;
        height:56px;
        border-radius:6px;
        object-fit:cover;
        background:#f3f4f6;
        border:1px solid #e5e7eb;
        flex-shrink:0;
    }

    .book-thumb-placeholder {
        width:42px;
        height:56px;
        border-radius:6px;
        background:#f3f4f6;
        border:1px solid #e5e7eb;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#d1d5db;
        font-size:14px;
        flex-shrink:0;
    }

    .book-title {
        font-weight:600;
        color:#1f2937;
    }

    .author {
        color:#6b7280;
    }

    .category-badge {
        display:inline-block;
        padding:6px 10px;
        border-radius:9px;
        background:#f3f4f6;
        color:#4b5563;
        font-size:11px;
        font-weight:600;
    }

    .stock-badge {
        display:inline-block;
        min-width:35px;
        text-align:center;
        padding:6px 9px;
        border-radius:9px;
        background:#f3f4f6;
        color:#4b5563;
        font-size:11px;
        font-weight:600;
    }

    .actions {
        display:flex;
        gap:8px;
    }

    .action-btn {
        width:35px;
        height:35px;
        border:none;
        border-radius:10px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        text-decoration:none;
        cursor:pointer;
        transition: opacity .15s;
    }

    .action-btn:hover {
        opacity:.85;
    }

    .edit-btn {
        background:#fef3c7;
        color:#b45309;
    }

    .delete-btn {
        background:#fee2e2;
        color:#b91c1c;
    }

    .empty {
        text-align:center;
        padding:50px;
        color:#9ca3af;
    }
</style>

@if(session('success'))
    <div class="alert-success">
        <i class="fas fa-circle-check"></i>
        &nbsp; {{ session('success') }}
    </div>
@endif

<div class="content-card">

    <div class="content-header">
    
        <div>
            <h2>Daftar Buku</h2>
            <p>Kelola koleksi buku perpustakaan sekolah.</p>
        </div>

        <a href="{{ route('buku.create') }}" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Buku
        </a>

    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Buku</th>
                <th>Author</th>
                <th>Kategori</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($bukus as $buku)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        <div class="book-cell">

                            @if($buku->cover)
                                <img src="{{ Str::startsWith($buku->cover, 'http') ? $buku->cover : asset('storage/' . $buku->cover) }}"
                                     alt="{{ $buku->judulBuku }}"
                                     class="book-thumb">
                            @else
                                <div class="book-thumb-placeholder">
                                    <i class="fas fa-book"></i>
                                </div>
                            @endif

                            <span class="book-title">
                                {{ $buku->judulBuku }}
                            </span>

                        </div>
                    </td>

                    <td class="author">
                        {{ $buku->author->namaAuthor ?? '-' }}
                    </td>

                    <td>
                        <span class="category-badge">
                            {{ $buku->kategori->namaKategori ?? '-' }}
                        </span>
                    </td>

                    <td>
                        <span class="stock-badge">
                            {{ $buku->stock }}
                        </span>
                    </td>

                    <td>

                        <div class="actions">

                            <a href="{{ route('buku.edit', $buku->id) }}"
                               class="action-btn edit-btn"
                               title="Edit">

                                <i class="fas fa-pen"></i>

                            </a>

                            <form action="{{ route('buku.destroy', $buku->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="action-btn delete-btn"
                                        title="Hapus">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty">

                        <i class="fas fa-book fa-2x"></i>

                        <br><br>

                        Belum ada data buku.

                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection