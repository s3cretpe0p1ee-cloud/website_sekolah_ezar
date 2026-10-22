<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel') - SMK INFOKOM Bogor</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #222;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #123b70;
            color: white;
            padding: 25px 18px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo-area h2 {
            font-size: 20px;
        }

        .logo-area p {
            font-size: 12px;
            opacity: .8;
            margin-top: 5px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            opacity: .6;
            margin: 20px 10px 10px;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: .3s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,.15);
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .topbar {
            background: white;
            height: 75px;
            padding: 0 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #eee;
        }

        .topbar h2 {
            color: #123b70;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-name {
            font-weight: bold;
        }

        .logout-btn {
            border: none;
            background: #dc3545;
            color: white;
            padding: 9px 15px;
            border-radius: 7px;
            cursor: pointer;
        }

        .content {
            padding: 35px;
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .content {
                padding: 20px;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo-area">
            <h2>SMK INFOKOM</h2>
            <p>Admin Panel</p>
        </div>

        <div class="menu-title">Menu Utama</div>

        <div class="menu">

            <a href="{{ url('/admin') }}"
               class="{{ request()->is('admin') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ url('/admin/siswa') }}"
               class="{{ request()->is('admin/siswa*') ? 'active' : '' }}">
                Data Siswa
            </a>

            <a href="{{ url('/admin/guru') }}"
               class="{{ request()->is('admin/guru*') ? 'active' : '' }}">
                Guru & Staff
            </a>

            <a href="{{ url('/admin/jurusan') }}"
               class="{{ request()->is('admin/jurusan*') ? 'active' : '' }}">
                Jurusan
            </a>

        </div>

        <div class="menu-title">Konten Website</div>

        <div class="menu">

            <a href="{{ url('/admin/berita') }}"
               class="{{ request()->is('admin/berita*') ? 'active' : '' }}">
                Berita
            </a>

            <a href="{{ url('/admin/galeri') }}"
               class="{{ request()->is('admin/galeri*') ? 'active' : '' }}">
                Galeri
            </a>

            <a href="{{ url('/admin/fasilitas') }}"
               class="{{ request()->is('admin/fasilitas*') ? 'active' : '' }}">
                Fasilitas
            </a>

            <a href="{{ url('/admin/prestasi') }}"
               class="{{ request()->is('admin/prestasi*') ? 'active' : '' }}">
                Prestasi
            </a>

            <a href="{{ url('/admin/ppdb') }}"
               class="{{ request()->is('admin/ppdb*') ? 'active' : '' }}">
                PPDB
            </a>

            <a href="{{ url('/admin/bkk') }}"
               class="{{ request()->is('admin/bkk*') ? 'active' : '' }}">
                BKK
            </a>

            <a href="{{ url('/admin/program-unggulan') }}"
               class="{{ request()->is('admin/program-unggulan*') ? 'active' : '' }}">
                Program Unggulan
            </a>

        </div>

        <div class="menu-title">Pengaturan</div>

        <div class="menu">
            <a href="#">
                Pengguna
            </a>
        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <header class="topbar">

            <h2>@yield('page-title', 'Admin Panel')</h2>

            <div class="admin-info">

                <span class="admin-name">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ url('/logout') }}">
                    @csrf

                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>

            </div>

        </header>


        <section class="content">

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>