@extends('layouts.app')

@section('title', 'Edit Buku')
@section('page-title', 'Edit Buku')

@section('content')

<style>
    .form-card {
        max-width:700px;
        background:rgba(255,255,255,.82);
        border:1px solid rgba(255,255,255,.8);
        border-radius:22px;
        padding:30px;
        box-shadow:0 12px 35px rgba(28,65,66,.06);
        backdrop-filter:blur(15px);
    }

    .form-card h2 {
        font-size:18px;
        margin-bottom:7px;
    }

    .form-card > p {
        color:#829192;
        font-size:12px;
        margin-bottom:28px;
    }

    .form-group {
        margin-bottom:20px;
    }

    label {
        display:block;
        margin-bottom:8px;
        font-size:13px;
        font-weight:600;
    }

    input,
    select {
        width:100%;
        padding:13px 15px;
        border:1px solid #dce7e5;
        border-radius:12px;
        outline:none;
        font-size:13px;
        background:white;
    }

    input:focus,
    select:focus {
        border-color:#4d7e7f;
        box-shadow:0 0 0 4px rgba(77,126,127,.1);
    }

    .error {
        color:#a25454;
        font-size:12px;
        margin-top:7px;
    }

    .buttons {
        display:flex;
        gap:10px;
        margin-top:25px;
    }

    .btn {
        padding:12px 17px;
        border:none;
        border-radius:11px;
        text-decoration:none;
        font-size:13px;
        font-weight:600;
        cursor:pointer;
    }

    .btn-back {
        background:#e7efee;
        color:#285b5c;
    }

    .btn-save {
        background:#17494b;
        color:white;
    }
</style>

<div class="form-card">

    <h2>Edit Buku</h2>

    <p>
        Perbarui informasi buku perpustakaan.
    </p>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="judulBuku">
                Judul Buku
            </label>

            <input
                type="text"
                id="judulBuku"
                name="judulBuku"
                value="{{ old('judulBuku', $buku->judulBuku) }}"
                required
            >

            @error('judulBuku')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label for="author_id">
                Author
            </label>

            <select id="author_id" name="author_id" required>

                <option value="">
                    -- Pilih Author --
                </option>

                @foreach($authors as $author)

                    <option
                        value="{{ $author->id }}"
                        {{ old('author_id', $buku->author_id) == $author->id ? 'selected' : '' }}
                    >

                        {{ $author->namaAuthor }}

                    </option>

                @endforeach

            </select>

            @error('author_id')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label for="kategori_id">
                Kategori
            </label>

            <select id="kategori_id" name="kategori_id" required>

                <option value="">
                    -- Pilih Kategori --
                </option>

                @foreach($kategoris as $kategori)

                    <option
                        value="{{ $kategori->id }}"
                        {{ old('kategori_id', $buku->kategori_id) == $kategori->id ? 'selected' : '' }}
                    >

                        {{ $kategori->namaKategori }}

                    </option>

                @endforeach

            </select>

            @error('kategori_id')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label for="stock">
                Stock
            </label>

            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', $buku->stock) }}"
                min="0"
                required
            >

            @error('stock')
                <div class="error">{{ $message }}</div>
            @enderror

        </div>


        <div class="buttons">

            <a href="{{ route('buku') }}" class="btn btn-back">
                Kembali
            </a>

            <button type="submit" class="btn btn-save">

                <i class="fas fa-save"></i>
                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection