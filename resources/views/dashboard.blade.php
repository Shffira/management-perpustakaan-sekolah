@extends('layouts.app')

@section('content')

<style>
    /* ================================
       DASHBOARD
    ================================= */
    .dashboard-page {
        min-height: 100vh;
        width: 100%;
        padding: 28px 30px;
        box-sizing: border-box;
        background: #f5f6fb;
    }

    /* ================================
       HEADER
    ================================= */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .dashboard-title h1 {
        margin: 0;
        font-size: 34px;
        font-weight: 700;
        color: #2d2d4a;
    }

    .dashboard-title p {
        margin: 6px 0 0;
        color: #7b7b8f;
        font-size: 15px;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .search-box {
        width: 420px;
        height: 52px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0 18px;
        background: #ffffff;
        border: 1px solid #ececf3;
        border-radius: 15px;
    }

    .search-box i {
        color: #464D73;
    }

    .search-box input {
        width: 100%;
        border: none;
        outline: none;
        background: transparent;
        color: #333;
        font-size: 14px;
    }

    .notification-btn {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        border-radius: 50%;
        background: #ffffff;
        color: #464D73;
        cursor: pointer;
        font-size: 17px;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 125px;
        padding: 8px 15px;
        background: #ffffff;
        border-radius: 16px;
    }

    .profile-avatar {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 50%;
        background: #464D73;
        color: #ffffff;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
    }

    .profile-info strong {
        color: #2d2d4a;
        font-size: 15px;
    }

    .profile-info small {
        margin-top: 2px;
        color: #88889a;
    }

    /* ================================
       STATISTIK
    ================================= */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        min-height: 190px;
        padding: 26px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: #ffffff;
        border-radius: 22px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
    }

    .stat-icon {
    width: 58px;
    height: 58px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    background: linear-gradient(135deg, #464D73, #464D73);
    color: #ffffff;
    font-size: 22px;
}

    .stat-label {
        margin-top: 20px;
        color: #777789;
        font-size: 15px;
    }

    .stat-number {
        margin: 8px 0 0;
        color: #2e2e4c;
        font-size: 36px;
        font-weight: 700;
    }

    /* ================================
       KONTEN UTAMA
    ================================= */
    .dashboard-content {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 375px;
        gap: 22px;
    }

    .books-section,
    .top-author-card,
    .quick-menu {
        background: #ffffff;
        border-radius: 22px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
    }

    .books-section {
        padding: 30px;
    }

    .right-section {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    /* ================================
       SECTION HEADER
    ================================= */
    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .section-header h2,
    .top-author-card h2,
    .quick-menu h2 {
        margin: 0;
        color: #2e2e4c;
        font-size: 23px;
    }

    .section-header a {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #464D73;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    .section-subtitle {
        margin: 30px 0 18px;
        color: #41415b;
        font-size: 17px;
    }

    /* ================================
       BUKU
    ================================= */
    .books-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 18px;
    }

    .book-card {
        min-width: 0;
    }

    .book-cover {
        height: 190px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 18px;
        overflow: hidden;
        border-radius: 14px;
        color: #ffffff;
        box-sizing: border-box;
    }

    .book-cover i {
        align-self: flex-end;
        font-size: 28px;
        opacity: 0.9;
    }

    .book-cover span {
        max-width: 100%;
        font-size: 18px;
        font-weight: 700;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Variasi warna cover */
    .book-card:nth-child(5n + 1) .book-cover {
        background: linear-gradient(135deg, #464D73, #464D73);
    }

    .book-card:nth-child(5n + 2) .book-cover {
        background: linear-gradient(135deg, #464D73, #464D73);
    }

    .book-card:nth-child(5n + 3) .book-cover {
        background: linear-gradient(135deg, #464D73, #464D73);
    }

    .book-card:nth-child(5n + 4) .book-cover {
        background: linear-gradient(135deg, #464D73, #464D73);
    }

    .book-card:nth-child(5n + 5) .book-cover {
        background: linear-gradient(135deg, #464D73, #464D73);
    }

    .book-title {
        margin: 12px 0 5px;
        color: #30304c;
        font-size: 15px;
        font-weight: 700;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .book-author {
        margin: 0;
        color: #858595;
        font-size: 13px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .book-stock {
        margin-top: 8px;
        color: #464D73;
        font-size: 13px;
    }

    /* ================================
       EMPTY STATE
    ================================= */
    .empty-state {
        grid-column: 1 / -1;
        padding: 50px 20px;
        text-align: center;
        color: #8a8a9b;
    }

    .empty-state i {
        display: block;
        margin-bottom: 12px;
        color: #674fc2;
        font-size: 35px;
    }

    .empty-state p {
        margin: 0;
    }

    /* ================================
       TRENDING
    ================================= */
    .trending-title {
        margin-top: 35px;
    }

    .trending-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 18px;
    }

    .trending-book {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #EEF0F8;
        color: #464D73;
        font-size: 32px;
    }

    /* ================================
       TOP AUTHOR
    ================================= */
    .top-author-card {
        padding: 30px;
    }

    .author-list {
        margin-top: 20px;
    }

    .author-item {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 10px 0;
    }

    .author-avatar {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 50%;
        background: #EEF0F8;
        color: #464D73;
    }

    .author-name {
        color: #4c4c60;
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .all-author {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
        padding: 12px;
        box-sizing: border-box;
        border-radius: 13px;
        background: #EEF0F8;
        color: #464D73;
        text-decoration: none;
        font-size: 14px;
    }

    /* ================================
       MENU CEPAT
    ================================= */
    .quick-menu {
        padding: 30px;
    }

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
        margin-top: 20px;
    }

    .quick-grid a {
        min-height: 65px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px;
        box-sizing: border-box;
        border-radius: 14px;
        background: #f7f7fb;
        color: #47475d;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.25s;
    }

    .quick-grid a i {
        color: #464D73;
    }

    .quick-grid a:hover {
        transform: translateY(-2px);
        background: #464D73;
        color: #ffffff;
    }

    .quick-grid a:hover i {
        color: #ffffff;
    }

    /* ================================
       RESPONSIVE
    ================================= */
    @media (max-width: 1300px) {
        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .books-grid,
        .trending-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 1050px) {
        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-actions {
            width: 100%;
        }

        .search-box {
            flex: 1;
            width: auto;
        }

        .dashboard-content {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .dashboard-page {
            padding: 20px;
        }

        .header-actions {
            flex-wrap: wrap;
        }

        .search-box {
            width: 100%;
            flex-basis: 100%;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .books-grid,
        .trending-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .dashboard-title h1 {
            font-size: 28px;
        }

        .stats-grid,
        .books-grid,
        .trending-grid,
        .quick-grid {
            grid-template-columns: 1fr;
        }

        .notification-btn {
            width: 45px;
            height: 45px;
        }

        .profile {
            flex: 1;
        }
    }
</style>


<div class="dashboard-page">

  


    {{-- ================= STATISTIK ================= --}}
    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div>
                <div class="stat-label">Total Buku</div>
                <div class="stat-number">{{ $totalBuku }}</div>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-users"></i>
            </div>

            <div>
                <div class="stat-label">Total Siswa</div>
                <div class="stat-number">{{ $totalSiswa }}</div>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-feather-pointed"></i>
            </div>

            <div>
                <div class="stat-label">Total Author</div>
                <div class="stat-number">{{ $totalAuthor }}</div>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-tag"></i>
            </div>

            <div>
                <div class="stat-label">Total Kategori</div>
                <div class="stat-number">{{ $totalKategori }}</div>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <div>
                <div class="stat-label">Total Kelas</div>
                <div class="stat-number">{{ $totalKelas }}</div>
            </div>
        </div>

    </div>


    {{-- ================= KONTEN ================= --}}
    <div class="dashboard-content">

        {{-- BUKU TERBARU --}}
        <section class="books-section">

            <div class="section-header">
                <h2>Buku Terbaru</h2>

                <a href="{{ route('buku') }}">
                    Lihat Semua
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>


            <h3 class="section-subtitle">Rekomendasi</h3>

            <div class="books-grid">

                @forelse($bukus as $buku)

                    <article class="book-card">

                        {{-- Cover visual tanpa file gambar --}}
                        <div class="book-cover">
                            <i class="fa-solid fa-book"></i>

                            <span>
                                {{ $buku->judulBuku }}
                            </span>
                        </div>

                        <h4 class="book-title">
                            {{ $buku->judulBuku }}
                        </h4>

                        <p class="book-author">
                            {{ $buku->author->namaAuthor ?? 'Author belum tersedia' }}
                        </p>

                        <div class="book-stock">
                            <i class="fa-solid fa-book"></i>
                            Stock {{ $buku->stock }}
                        </div>

                    </article>

                @empty

                    <div class="empty-state">
                        <i class="fa-solid fa-book-open"></i>
                        <p>Belum ada data buku.</p>
                    </div>

                @endforelse

            </div>


            {{-- TRENDING --}}
            <h3 class="section-subtitle trending-title">
                Trending
            </h3>

            <div class="trending-grid">

                @forelse($bukus->take(5) as $buku)

                    <div class="trending-book"
                         title="{{ $buku->judulBuku }}">
                        <i class="fa-solid fa-book"></i>
                    </div>

                @empty

                    <div class="empty-state">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Belum ada buku trending.</p>
                    </div>

                @endforelse

            </div>

        </section>


        {{-- BAGIAN KANAN --}}
        <aside class="right-section">

            {{-- TOP AUTHOR --}}
            <section class="top-author-card">

                <h2>Top Author</h2>

                <div class="author-list">

                    @forelse($authors as $author)

                        <div class="author-item">

                            <div class="author-avatar">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <span class="author-name">
                                {{ $author->namaAuthor }}
                            </span>

                        </div>

                    @empty

                        <div class="empty-state">
                            <i class="fa-solid fa-user"></i>
                            <p>Belum ada author.</p>
                        </div>

                    @endforelse

                </div>

                <a href="{{ route('author') }}" class="all-author">
                    Lihat Semua Author
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </section>


            {{-- MENU CEPAT --}}
            <section class="quick-menu">

                <h2>Menu Cepat</h2>

                <div class="quick-grid">

                    <a href="{{ route('buku.create') }}">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah Buku</span>
                    </a>

                    <a href="{{ route('siswa.create') }}">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Tambah Siswa</span>
                    </a>

                    <a href="{{ route('author.create') }}">
                        <i class="fa-solid fa-feather-pointed"></i>
                        <span>Tambah Author</span>
                    </a>

                    <a href="{{ route('kategori.create') }}">
                        <i class="fa-solid fa-tag"></i>
                        <span>Tambah Kategori</span>
                    </a>

                    <a href="{{ route('kelas.create') }}">
                        <i class="fa-solid fa-school"></i>
                        <span>Tambah Kelas</span>
                    </a>

                </div>

            </section>

        </aside>

    </div>

</div>

@endsection