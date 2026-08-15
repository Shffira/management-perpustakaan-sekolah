<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Management Perpustakaan</title>

    <!-- MDBootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: #eef3f2;
            color: #173b3d;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 245px;
            height: 100vh;

            background: #123b3d;
            color: white;

            padding: 25px 18px;

            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 10px 30px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(10px);

            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .brand-text {
            font-weight: 700;
            font-size: 17px;
        }

        .brand-subtitle {
            display: block;
            font-size: 10px;
            color: rgba(255,255,255,.55);
            margin-top: 2px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;

            color: rgba(255,255,255,.45);

            padding: 0 12px;
            margin-bottom: 10px;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            margin-bottom: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;

            padding: 12px 14px;

            border-radius: 11px;

            color: rgba(255,255,255,.72);
            text-decoration: none;

            font-size: 14px;

            transition: .25s ease;
        }

        .menu a i {
            width: 18px;
            text-align: center;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,.12);
            color: white;

            backdrop-filter: blur(10px);
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout-button {
            width: 100%;

            border: 1px solid rgba(255,255,255,.15);

            background: rgba(255,255,255,.08);

            color: rgba(255,255,255,.75);

            border-radius: 11px;

            padding: 11px;

            transition: .25s;
        }

        .logout-button:hover {
            background: rgba(255,255,255,.16);
            color: white;
        }


        /* ================= MAIN ================= */

        .main {
            margin-left: 245px;
            min-height: 100vh;

            padding: 28px 35px;
        }


        /* ================= TOPBAR ================= */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;
        }

        .welcome h1 {
            margin: 0;

            font-size: 27px;
            font-weight: 700;
        }

        .welcome p {
            margin: 6px 0 0;

            color: #718284;
            font-size: 14px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .search {
            width: 230px;

            background: white;

            border: 1px solid #e2e9e8;

            border-radius: 12px;

            padding: 10px 15px;

            color: #718284;
        }

        .search i {
            margin-right: 8px;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #dbe8e6;

            color: #173b3d;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
        }

        .user-role {
            font-size: 11px;
            color: #899899;
        }


        /* ================= STAT CARDS ================= */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 25px;
        }

        .stat-card {
            position: relative;

            background: white;

            border-radius: 17px;

            padding: 20px;

            border: 1px solid #e5eceb;

            transition: .25s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 30px rgba(20, 60, 60, .08);
        }

        .stat-icon {
            width: 43px;
            height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #edf5f4;

            color: #1e5557;
        }

        .stat-number {
            font-size: 27px;
            font-weight: 700;

            margin-top: 15px;
        }

        .stat-label {
            color: #7c8c8d;
            font-size: 13px;
        }


        /* ================= CONTENT GRID ================= */

        .content-grid {
            display: grid;

            grid-template-columns: 2fr 1fr;

            gap: 20px;

            margin-bottom: 20px;
        }

        .card-box {
            background: white;

            border-radius: 18px;

            padding: 22px;

            border: 1px solid #e5eceb;
        }

        .card-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 18px;
        }

        .card-header-custom h3 {
            font-size: 17px;
            font-weight: 700;

            margin: 0;
        }

        .view-all {
            font-size: 12px;

            color: #527c7d;

            text-decoration: none;
        }


        /* ================= BOOKS ================= */

        .books {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 14px;
        }

        .book {
            min-width: 0;
        }

        .book-cover {
            height: 150px;

            border-radius: 10px;

            overflow: hidden;

            background: #dce7e5;
        }

        .book-cover img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .book-title {
            font-size: 12px;
            font-weight: 600;

            margin-top: 9px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .book-author {
            font-size: 10px;

            color: #879697;

            margin-top: 3px;
        }


        /* ================= CATEGORY ================= */

        .categories {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 10px;
        }

        .category {
            padding: 16px;

            border-radius: 12px;

            background: #f1f6f5;

            display: flex;
            align-items: center;
            justify-content: space-between;

            transition: .2s;
        }

        .category:hover {
            background: #e7f0ee;
        }

        .category-name {
            font-size: 12px;
            font-weight: 600;
        }

        .category-count {
            font-size: 12px;
            color: #6d8586;
        }


        /* ================= QUICK ACTION ================= */

        .quick-actions {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 12px;
        }

        .quick-action {
            padding: 18px;

            border-radius: 13px;

            text-decoration: none;

            background: #f4f7f6;

            color: #173b3d;

            transition: .25s;
        }

        .quick-action:hover {
            background: #e5efed;

            transform: translateY(-2px);
        }

        .quick-action i {
            font-size: 19px;

            margin-bottom: 12px;
        }

        .quick-action span {
            display: block;

            font-size: 12px;
            font-weight: 600;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 1100px) {

            .stats {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 768px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand-text,
            .brand-subtitle,
            .menu-title,
            .menu span,
            .sidebar-bottom {
                display: none;
            }

            .brand {
                justify-content: center;
                padding-bottom: 25px;
            }

            .menu a {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .topbar-right .search,
            .user-name,
            .user-role {
                display: none;
            }

            .books {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }

        @media (max-width: 500px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 22px;
            }

        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                <i class="fas fa-book-open"></i>
            </div>

            <div>
                <div class="brand-text">
                    Library
                </div>

                <span class="brand-subtitle">
                    Management System
                </span>
            </div>

        </div>


        <div class="menu-title">
            Menu Utama
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('dashboard') }}" class="active">
                    <i class="fas fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-user-graduate"></i>
                    <span>Siswa</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-school"></i>
                    <span>Kelas</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-pen-nib"></i>
                    <span>Author</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-tags"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-book"></i>
                    <span>Buku</span>
                </a>
            </li>

        </ul>


        <div class="menu-title mt-4">
            Sistem
        </div>

        <ul class="menu">

            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

        </ul>


        <!-- Logout -->

        <div class="sidebar-bottom">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="logout-button" type="submit">
                    <i class="fas fa-right-from-bracket me-2"></i>
                    Keluar
                </button>
            </form>

        </div>

    </aside>


    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">

            <div class="welcome">

                <h1>
                    Selamat datang 👋
                </h1>

                <p>
                    Kelola perpustakaan sekolah dengan mudah.
                </p>

            </div>


            <div class="topbar-right">

                <div class="search">
                    <i class="fas fa-search"></i>
                    Cari sesuatu...
                </div>

                <div class="user">

                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <div class="user-name">
                            {{ Auth::user()->name }}
                        </div>

                        <div class="user-role">
                            Pengelola Perpustakaan
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <!-- ================= STATISTICS ================= -->

        <div class="stats">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fas fa-book"></i>
                </div>

                <div class="stat-number">
                    350
                </div>

                <div class="stat-label">
                    Total Buku
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>

                <div class="stat-number">
                    120
                </div>

                <div class="stat-label">
                    Total Siswa
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fas fa-tags"></i>
                </div>

                <div class="stat-number">
                    18
                </div>

                <div class="stat-label">
                    Kategori Buku
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>

                <div class="stat-number">
                    42
                </div>

                <div class="stat-label">
                    Author
                </div>

            </div>

        </div>


        <!-- ================= BOOK + CATEGORY ================= -->

        <div class="content-grid">


            <!-- Popular Books -->

            <div class="card-box">

                <div class="card-header-custom">

                    <h3>
                        Buku Terbaru
                    </h3>

                    <a href="#" class="view-all">
                        Lihat semua
                    </a>

                </div>


                <div class="books">

                    <div class="book">

                        <div class="book-cover">
                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=500&auto=format&fit=crop">
                        </div>

                        <div class="book-title">
                            The Psychology of Money
                        </div>

                        <div class="book-author">
                            Morgan Housel
                        </div>

                    </div>


                    <div class="book">

                        <div class="book-cover">
                            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=500&auto=format&fit=crop">
                        </div>

                        <div class="book-title">
                            Atomic Habits
                        </div>

                        <div class="book-author">
                            James Clear
                        </div>

                    </div>


                    <div class="book">

                        <div class="book-cover">
                            <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?q=80&w=500&auto=format&fit=crop">
                        </div>

                        <div class="book-title">
                            The Great Gatsby
                        </div>

                        <div class="book-author">
                            F. Scott Fitzgerald
                        </div>

                    </div>


                    <div class="book">

                        <div class="book-cover">
                            <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?q=80&w=500&auto=format&fit=crop">
                        </div>

                        <div class="book-title">
                            The Book of Ideas
                        </div>

                        <div class="book-author">
                            Various Authors
                        </div>

                    </div>

                </div>

            </div>


            <!-- Categories -->

            <div class="card-box">

                <div class="card-header-custom">

                    <h3>
                        Kategori
                    </h3>

                    <a href="#" class="view-all">
                        Lihat semua
                    </a>

                </div>


                <div class="categories">

                    <div class="category">
                        <span class="category-name">
                            Fiksi
                        </span>

                        <span class="category-count">
                            45
                        </span>
                    </div>

                    <div class="category">
                        <span class="category-name">
                            Sains
                        </span>

                        <span class="category-count">
                            32
                        </span>
                    </div>

                    <div class="category">
                        <span class="category-name">
                            Sejarah
                        </span>

                        <span class="category-count">
                            27
                        </span>
                    </div>

                    <div class="category">
                        <span class="category-name">
                            Teknologi
                        </span>

                        <span class="category-count">
                            38
                        </span>
                    </div>

                    <div class="category">
                        <span class="category-name">
                            Pendidikan
                        </span>

                        <span class="category-count">
                            51
                        </span>
                    </div>

                    <div class="category">
                        <span class="category-name">
                            Lainnya
                        </span>

                        <span class="category-count">
                            24
                        </span>
                    </div>

                </div>

            </div>

        </div>


        <!-- ================= QUICK ACTION ================= -->

        <div class="card-box">

            <div class="card-header-custom">

                <h3>
                    Akses Cepat
                </h3>

            </div>


            <div class="quick-actions">

                <a href="#" class="quick-action">

                    <i class="fas fa-plus"></i>

                    <span>
                        Tambah Buku
                    </span>

                </a>


                <a href="#" class="quick-action">

                    <i class="fas fa-user-plus"></i>

                    <span>
                        Tambah Siswa
                    </span>

                </a>


                <a href="#" class="quick-action">

                    <i class="fas fa-tags"></i>

                    <span>
                        Tambah Kategori
                    </span>

                </a>

            </div>

        </div>


    </main>


    <script src="{{ asset('js/mdb.umd.min.js') }}"></script>

</body>

</html>