@extends('layouts.app')

@section('title', 'Data Kelas')
@section('page-title', 'Data Kelas')

@section('content')

<style>
    .content-card {
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 22px;
        padding: 25px;
        box-shadow: 0 12px 35px rgba(28, 65, 66, 0.06);
        backdrop-filter: blur(15px);
    }

    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .content-header h2 {
        font-size: 18px;
        margin: 0;
    }

    .content-header p {
        margin-top: 5px;
        font-size: 12px;
        color: #829192;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 16px;
        border-radius: 12px;
        background: #17494b;
        color: white;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .btn-add:hover {
        background: #286567;
        color: white;
        transform: translateY(-2px);
    }

    .alert-success {
        padding: 13px 16px;
        margin-bottom: 20px;
        border-radius: 12px;
        background: #e5f3ed;
        color: #28604e;
        font-size: 13px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        padding: 14px;
        text-align: left;
        font-size: 11px;
        color: #849495;
        text-transform: uppercase;
        border-bottom: 1px solid #e4ebea;
    }

    td {
        padding: 16px 14px;
        font-size: 13px;
        border-bottom: 1px solid #edf2f1;
    }

    .number {
        color: #9aa8a9;
        width: 65px;
    }

    .class-name {
        font-weight: 600;
    }

    .level-badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 9px;
        background: #e8f2f1;
        color: #21595b;
        font-size: 11px;
        font-weight: 600;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 35px;
        height: 35px;
        border: none;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .edit-btn {
        background: #e8f2f1;
        color: #21595b;
    }

    .delete-btn {
        background: #f8eaea;
        color: #a25454;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .empty {
        text-align: center;
        padding: 50px;
        color: #8b999a;
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
            <h2>Daftar Kelas</h2>
            <p>Kelola data kelas sekolah.</p>
        </div>

        <a href="{{ route('kelas.create') }}" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Kelas
        </a>

    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Tingkat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($kelas as $item)

                <tr>

                    <td class="number">
                        {{ $loop->iteration }}
                    </td>

                    <td class="class-name">
                        {{ $item->namaKelas }}
                    </td>

                    <td>
                        <span class="level-badge">
                            {{ $item->tingkat }}
                        </span>
                    </td>

                    <td>

                        <div class="actions">

                            <a href="{{ route('kelas.edit', $item->id) }}"
                               class="action-btn edit-btn"
                               title="Edit">

                                <i class="fas fa-pen"></i>

                            </a>

                            <form action="{{ route('kelas.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">

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
                    <td colspan="4" class="empty">

                        <i class="fas fa-school fa-2x"></i>

                        <br><br>

                        Belum ada data kelas.

                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection