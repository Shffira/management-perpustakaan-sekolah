@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('content')

<style>
    .form-card {
        max-width: 650px;
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

    .form-card p {
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

    input {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #dce7e5;
        border-radius: 12px;
        outline: none;
        font-family: inherit;
        font-size: 13px;
    }

    input:focus {
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
</style>


<div class="form-card">

    <h2>Edit Kategori</h2>

    <p>
        Perbarui informasi kategori buku.
    </p>


    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

        @csrf

        @method('PUT')


        <div class="form-group">

            <label for="namaKategori">
                Nama Kategori
            </label>

            <input
                type="text"
                id="namaKategori"
                name="namaKategori"
                value="{{ old('namaKategori', $kategori->namaKategori) }}"
                required
            >

            @error('namaKategori')

                <div class="error">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <div class="buttons">

            <a href="{{ route('kategori') }}" class="btn btn-back">
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