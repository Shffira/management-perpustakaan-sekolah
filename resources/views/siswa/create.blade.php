@extends('layouts.app')

@section('title', 'Tambah Siswa')
@section('page-title', 'Tambah Siswa')

@section('content')

<style>
    .form-card {
        max-width: 700px;
        background: rgba(255, 255, 255, .82);
        border: 1px solid rgba(255, 255, 255, .8);
        border-radius: 22px;
        padding: 30px;
        box-shadow: 0 12px 35px rgba(28, 65, 66, .06);
        backdrop-filter: blur(15px);
    }

    .form-card h2 {
        font-size: 18px;
        margin-bottom: 7px;
    }

    .form-card > p {
        color: #829192;
        font-size: 12px;
        margin-bottom: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
    }

    input,
    select {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #dce7e5;
        border-radius: 12px;
        outline: none;
        font-family: inherit;
        font-size: 13px;
        background: white;
        transition: .2s;
    }

    input:focus,
    select:focus {
        border-color: #4d7e7f;
        box-shadow: 0 0 0 4px rgba(77, 126, 127, .1);
    }

    .error {
        color: #a25454;
        font-size: 12px;
        margin-top: 7px;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn {
        padding: 12px 17px;
        border: none;
        border-radius: 11px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-back {
        background: #e7efee;
        color: #285b5c;
    }

    .btn-save {
        background: #17494b;
        color: white;
    }

    .btn:hover {
        transform: translateY(-2px);
    }
</style>


<div class="form-card">

    <h2>Tambah Siswa</h2>

    <p>
        Tambahkan data siswa baru ke dalam sistem perpustakaan.
    </p>


    <form action="{{ route('siswa.store') }}" method="POST">

        @csrf


        <div class="form-group">

            <label for="nama">
                Nama Siswa
            </label>

            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama') }}"
                placeholder="Masukkan nama siswa"
                required
            >

            @error('nama')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="form-group">

            <label for="nis">
                NIS
            </label>

            <input
                type="number"
                id="nis"
                name="nis"
                value="{{ old('nis') }}"
                placeholder="Masukkan NIS"
                required
            >

            @error('nis')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="form-group">

            <label for="kelas_id">
                Kelas
            </label>

            <select id="kelas_id" name="kelas_id" required>

                <option value="">
                    -- Pilih Kelas --
                </option>

                @foreach($kelas as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ old('kelas_id') == $item->id ? 'selected' : '' }}
                    >

                        {{ $item->namaKelas }} - {{ $item->tingkat }}

                    </option>

                @endforeach

            </select>

            @error('kelas_id')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="buttons">

            <a href="{{ route('siswa') }}" class="btn btn-back">
                Kembali
            </a>

            <button type="submit" class="btn btn-save">

                <i class="fas fa-save"></i>
                Simpan Siswa

            </button>

        </div>

    </form>

</div>

@endsection