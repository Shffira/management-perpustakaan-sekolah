@extends('layouts.app')

@section('title', 'Tambah Buku')
@section('page-title', 'Tambah Buku')

@section('content')

<style>
    .form-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 22px;
        padding: 25px;
        box-shadow: 0 8px 24px rgba(0,0,0,.04);
        max-width: 640px;
    }

    .form-header h2 {
        font-size: 18px;
        margin: 0 0 5px;
        color: #1f2937;
    }

    .form-header p {
        font-size: 12px;
        color: #9ca3af;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #4b5563;
        margin-bottom: 6px;
    }

    .form-control {
        width: 100%;
        padding: 11px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 13px;
        color: #1f2937;
        background: #fff;
    }

    .form-control:focus {
        outline: none;
        border-color: #9ca3af;
    }

    select.form-control {
        appearance: none;
        background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%236b7280' stroke-width='1.5' fill='none'/%3E%3C/svg%3E") no-repeat right 14px center;
    }

    .error-text {
        color: #b91c1c;
        font-size: 11px;
        margin-top: 5px;
    }

    .cover-tabs {
        display: flex;
        gap: 8px;
        margin-bottom: 12px;
    }

    .cover-tab {
        padding: 8px 14px;
        border-radius: 9px;
        background: #f3f4f6;
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        border: 1px solid transparent;
    }

    .cover-tab.active {
        background: #eff6ff;
        color: #2563eb;
        border-color: #bfdbfe;
    }

    .cover-preview {
        width: 90px;
        height: 120px;
        border-radius: 10px;
        border: 1px dashed #d1d5db;
        background: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #d1d5db;
        font-size: 22px;
        overflow: hidden;
        margin-bottom: 12px;
    }

    .cover-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn-submit {
        padding: 11px 20px;
        border-radius: 12px;
        background: #2563eb;
        color: white;
        border: none;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-submit:hover {
        background: #1d4ed8;
    }

    .btn-cancel {
        padding: 11px 20px;
        border-radius: 12px;
        background: #f3f4f6;
        color: #4b5563;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
        color: #4b5563;
    }
</style>

<div class="form-card">

    <div class="form-header">
        <h2>Tambah Buku</h2>
        <p>Isi detail buku yang akan ditambahkan ke koleksi perpustakaan.</p>
    </div>

    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judulBuku" class="form-control"
                   value="{{ old('judulBuku') }}" placeholder="Masukkan judul buku">
            @error('judulBuku') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Author</label>
            <select name="author_id" class="form-control">
                <option value="">Pilih Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->namaAuthor }}
                    </option>
                @endforeach
            </select>
            @error('author_id') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->namaKategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control"
                   value="{{ old('stock') }}" placeholder="0" min="0">
            @error('stock') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Cover Buku</label>

            <div class="cover-preview" id="coverPreview">
                <i class="fas fa-book"></i>
            </div>

            <div class="cover-tabs">
                <div class="cover-tab active" id="tabUpload" onclick="switchTab('upload')">Upload File</div>
                <div class="cover-tab" id="tabUrl" onclick="switchTab('url')">Link URL</div>
            </div>

            <div id="uploadSection">
                <input type="file" name="cover_file" accept="image/*" class="form-control" onchange="previewFile(this)">
            </div>

            <div id="urlSection" style="display:none;">
                <input type="text" name="cover_url" class="form-control"
                       placeholder="https://contoh.com/gambar-buku.jpg" oninput="previewUrl(this.value)">
            </div>

            @error('cover_file') <div class="error-text">{{ $message }}</div> @enderror
            @error('cover_url') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Simpan Buku</button>
            <a href="{{ route('buku.index') }}" class="btn-cancel">Batal</a>
        </div>

    </form>

</div>

<script>
    function switchTab(type) {
        const tabUpload = document.getElementById('tabUpload');
        const tabUrl = document.getElementById('tabUrl');
        const uploadSection = document.getElementById('uploadSection');
        const urlSection = document.getElementById('urlSection');

        if (type === 'upload') {
            tabUpload.classList.add('active');
            tabUrl.classList.remove('active');
            uploadSection.style.display = 'block';
            urlSection.style.display = 'none';
        } else {
            tabUrl.classList.add('active');
            tabUpload.classList.remove('active');
            urlSection.style.display = 'block';
            uploadSection.style.display = 'none';
        }
    }

    function previewFile(input) {
        const preview = document.getElementById('coverPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.innerHTML = `<img src="${e.target.result}">`;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewUrl(url) {
        const preview = document.getElementById('coverPreview');
        if (url) {
            preview.innerHTML = `<img src="${url}" onerror="this.parentElement.innerHTML='<i class=\\'fas fa-image\\'></i>'">`;
        } else {
            preview.innerHTML = `<i class="fas fa-book"></i>`;
        }
    }
</script>

@endsection