<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Management Perpustakaan')</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        /* =========================================
           WARNA UTAMA WEBSITE
        ========================================= */
        :root {
            --primary: #2f3a5f;
            --primary-light: #5967a8;
            --primary-soft: #eef0f8;

            --background: #f5f6fa;
            --white: #ffffff;

            --text: #2d334a;
            --text-muted: #7d8397;
            --border: #e7e9f0;
        }


        /* =========================================
           RESET
        ========================================= */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
        }


        /* =========================================
           LAYOUT
        ========================================= */
        .app {
            display: flex;
            min-height: 100vh;
        }


        /* =========================================
           SIDEBAR
        ========================================= */
        .sidebar {
            width: 250px;
            min-height: calc(100vh - 36px);

            position: fixed;
            left: 18px;
            top: 18px;
            bottom: 18px;

            padding: 20px 16px;

            background: rgba(255, 255, 255, 0.92);
            border: 1px solid var(--border);

            border-radius: 24px;

            box-shadow: 0 10px 35px rgba(47, 58, 95, 0.08);

            z-index: 100;

            overflow-y: auto;
        }


        /* =========================================
           LOGO
        ========================================= */
        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 18px 12px 25px;
        }


        .sidebar-logo img {
            width: 58px;
            height: 58px;

            object-fit: contain;
        }


        .sidebar-logo h3 {
            font-size: 17px;
            font-weight: 700;

            margin: 0;

            color: var(--primary);
            line-height: 1.2;
        }


        .sidebar-logo p {
            margin: 5px 0 0;

            font-size: 10px;
            line-height: 1.4;

            color: var(--text-muted);
        }


        /* =========================================
           MENU
        ========================================= */
        .menu-title {
            font-size: 10px;
            font-weight: 700;

            color: #9aa0b2;

            padding: 0 12px;
            margin: 12px 0 8px;

            letter-spacing: 1px;
        }


        .menu {
            list-style: none;
        }


        .menu li {
            margin-bottom: 5px;
        }


        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;

            padding: 12px 14px;

            color: var(--text-muted);
            text-decoration: none;

            font-size: 14px;
            font-weight: 500;

            border-radius: 13px;

            transition: all 0.2s ease;
        }


        .menu a i {
            width: 20px;

            text-align: center;

            font-size: 15px;
        }


        .menu a:hover {
            background: var(--primary-soft);
            color: var(--primary);

            transform: translateX(3px);
        }


        .menu a.active {
            background: var(--primary);
            color: var(--white);

            box-shadow:
                0 8px 18px rgba(47, 58, 95, 0.20);
        }


        /* =========================================
           LOGOUT
        ========================================= */
        .logout-btn {
            width: 100%;

            border: none;
            background: transparent;

            display: flex;
            align-items: center;
            gap: 13px;

            padding: 12px 14px;

            color: var(--text-muted);

            font-family: inherit;
            font-size: 14px;
            font-weight: 500;

            cursor: pointer;
            border-radius: 13px;

            text-align: left;

            transition: all 0.2s ease;
        }


        .logout-btn i {
            width: 20px;

            text-align: center;

            font-size: 15px;
        }


        .logout-btn:hover {
            background: #fdf0f1;
            color: #c54d5d;

            transform: translateX(3px);
        }


        /* =========================================
           MAIN CONTENT
        ========================================= */
        .main-content {
            width: calc(100% - 286px);

            margin-left: 286px;

            padding: 18px 35px 35px;
        }


        /* =========================================
           TOPBAR
        ========================================= */
        .topbar {
            min-height: 70px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 18px;
        }


        .page-title h1 {
            font-size: 26px;
            font-weight: 700;

            color: var(--text);
        }


        .page-title p {
            margin-top: 5px;

            color: var(--text-muted);

            font-size: 13px;
        }


        /* =========================================
           PROFILE
        ========================================= */
        .profile {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 8px 14px;

            background: var(--white);

            border: 1px solid var(--border);

            border-radius: 15px;

            box-shadow: 0 5px 15px rgba(47, 58, 95, 0.04);
        }


        .profile-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--primary-soft);
            color: var(--primary);

            border-radius: 50%;
        }


        .profile span {
            font-size: 13px;
            font-weight: 600;

            color: var(--text);
        }


        /* =========================================
           SCROLLBAR
        ========================================= */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }


        .sidebar::-webkit-scrollbar-thumb {
            background: #d8dbe6;
            border-radius: 10px;
        }


        /* =========================================
           TABLET
        ========================================= */
        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }


            .main-content {
                width: calc(100% - 228px);

                margin-left: 228px;

                padding: 18px 20px 30px;
            }


            .sidebar-logo {
                padding-left: 5px;
            }


            .sidebar-logo img {
                width: 48px;
                height: 48px;
            }


            .sidebar-logo h3 {
                font-size: 14px;
            }

        }


        /* =========================================
           MOBILE
        ========================================= */
        @media (max-width: 700px) {

            .app {
                display: block;
            }


            .sidebar {
                width: 100%;
                min-height: auto;

                position: relative;

                left: 0;
                top: 0;
                bottom: auto;

                margin: 0;

                border-radius: 0;

                padding: 15px;

                box-shadow: none;
            }


            .main-content {
                width: 100%;

                margin-left: 0;

                padding: 20px;
            }


            .topbar {
                align-items: flex-start;
            }


            .page-title h1 {
                font-size: 22px;
            }


            .profile {
                padding: 7px 10px;
            }

        }

    </style>

    @stack('styles')

</head>

<body>

<div class="app">


    {{-- =========================================
       SIDEBAR
    ========================================= --}}
    <aside class="sidebar">


        {{-- LOGO --}}
        <div class="sidebar-logo">

            <img
                src="{{ asset('images/logo/logo-perpus.png') }}"
                alt="Logo Perpustakaan"
            >

            <div>
                <h3>PERPUS SEKOLAH</h3>
                <p>Cerdas Membaca,<br>Hebat Berkarya</p>
            </div>

        </div>


        {{-- MENU UTAMA --}}
        <div class="menu-title">
            MENU UTAMA
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <i class="fas fa-house"></i>
                    <span>Dashboard</span>

                </a>
            </li>

        </ul>


        {{-- DATA MASTER --}}
        <div class="menu-title">
            DATA MASTER
        </div>

        <ul class="menu">


            {{-- SISWA --}}
            <li>
                <a href="{{ route('siswa') }}"
                   class="{{ request()->routeIs('siswa*') ? 'active' : '' }}">

                    <i class="fas fa-user-graduate"></i>
                    <span>Siswa</span>

                </a>
            </li>


            {{-- KELAS --}}
            <li>
                <a href="{{ route('kelas') }}"
                   class="{{ request()->routeIs('kelas*') ? 'active' : '' }}">

                    <i class="fas fa-school"></i>
                    <span>Kelas</span>

                </a>
            </li>


            {{-- AUTHOR --}}
            <li>
                <a href="{{ route('author') }}"
                   class="{{ request()->routeIs('author*') ? 'active' : '' }}">

                    <i class="fas fa-pen-nib"></i>
                    <span>Author</span>

                </a>
            </li>


            {{-- KATEGORI --}}
            <li>
                <a href="{{ route('kategori') }}"
                   class="{{ request()->routeIs('kategori*') ? 'active' : '' }}">

                    <i class="fas fa-tags"></i>
                    <span>Kategori</span>

                </a>
            </li>


            {{-- BUKU --}}
            <li>
                <a href="{{ route('buku') }}"
                   class="{{ request()->routeIs('buku*') ? 'active' : '' }}">

                    <i class="fas fa-book"></i>
                    <span>Buku</span>

                </a>
            </li>

        </ul>


        {{-- AKUN --}}
        <div class="menu-title">
            AKUN
        </div>

        <ul class="menu">

            <li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-btn">

                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>

                    </button>

                </form>

            </li>

        </ul>


    </aside>


    {{-- =========================================
       MAIN CONTENT
    ========================================= --}}
    <main class="main-content">


        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="page-title">

                <h1>
                    @yield('page-title', 'Dashboard')
                </h1>

                <p>
                    Sistem Management Perpustakaan Sekolah
                </p>

            </div>


            {{-- PROFILE --}}
            <div class="profile">

                <div class="profile-icon">
                    <i class="fas fa-user"></i>
                </div>

                <span>
                    {{ Auth::user()->name ?? 'Admin' }}
                </span>

            </div>

        </div>


        {{-- ISI HALAMAN --}}
        @yield('content')


    </main>


</div>


@stack('scripts')

</body>
</html>