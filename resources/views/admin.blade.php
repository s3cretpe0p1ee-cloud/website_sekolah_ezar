<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel - SMK INFOKOM Bogor</title>

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

            /* sidebar bisa di scroll kalau menunya kepanjangan */
            overflow-y: auto;

            /* sembunyikan scrollbar biar rapi */
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 6px;
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
            opacity: 0.8;
            margin-top: 5px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            opacity: 0.6;
            margin: 20px 10px 10px;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: 0.3s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255, 255, 255, 0.15);
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

        /* CONTENT */
        .content {
            padding: 35px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            color: #123b70;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #777;
        }

        /* STAT CARDS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }

        .stat-card h3 {
            color: #123b70;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #777;
        }

        /* QUICK MENU */
        .section-title {
            margin-bottom: 15px;
            color: #123b70;
        }

        .quick-menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .quick-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-decoration: none;
            color: #222;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
            transition: 0.3s;
            min-height: 190px;
        }

        .quick-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card-icon {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .quick-card h3 {
            color: #123b70;
            margin-bottom: 8px;
        }

        .quick-card p {
            color: #777;
            font-size: 14px;
        }

        .card-number {
            font-size: 30px;
            font-weight: bold;
            color: #123b70;
            margin: 12px 0 3px;
        }

        .card-link {
            display: inline-block;
            margin-top: 18px;
            color: #123b70;
            font-weight: bold;
            font-size: 14px;
        }

        @media (max-width: 1200px) {
            .stats,
            .quick-menu {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .stats,
            .quick-menu {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
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

            <a href="{{ url('/admin') }}" class="active">
                Dashboard
            </a>

            <a href="{{ url('/admin/siswa') }}">
                Data Siswa
            </a>

            <a href="{{ url('/admin/guru') }}">
                Guru & Staff
            </a>

            <a href="{{ url('/admin/jurusan') }}">
                Jurusan
            </a>

        </div>


        <div class="menu-title">Konten Website</div>

        <div class="menu">

            <!-- BERITA SUDAH TERHUBUNG -->
            <a href="{{ url('/admin/berita') }}">
                Berita
            </a>

            <!-- BELUM DIBUAT -->
            <a href="{{ url('/admin/galeri') }}">
                Galeri
            </a>

            <a href="{{ url('/admin/fasilitas') }}">
                Fasilitas
            </a>

            <a href="{{ url('/admin/prestasi') }}">
                Prestasi
            </a>

            <a href="{{ url('/admin/Ppdb') }}">
                PPDB
            </a>

            <a href="{{ url('/admin/bkk') }}">
                BKK
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

            <h2>Dashboard</h2>

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

            <div class="welcome">

                <h1>
                    Selamat Datang, {{ auth()->user()->name }}
                </h1>

                <p>
                    Kelola informasi dan konten website SMK INFOKOM Bogor melalui dashboard ini.
                </p>

            </div>


            <!-- STATISTIK -->

            <div class="stats">

                <div class="stat-card">

                    <h3>
                        {{ \App\Models\Siswa::count() }}
                    </h3>

                    <p>
                        Siswa Terdaftar
                    </p>

                </div>


                <div class="stat-card">

                    <h3>
                        {{ \App\Models\Berita::count() }}
                    </h3>

                    <p>
                        Berita
                    </p>

                </div>


                <div class="stat-card">

                    <h3>
                        25+
                    </h3>

                    <p>
                        Fasilitas
                    </p>

                </div>


                <div class="stat-card">

                    <h3>
                        {{ \App\Models\Jurusan::count() }}
                    </h3>

                    <p>
                        Program Keahlian
                    </p>

                </div>

            </div>


            <!-- MENU CEPAT -->

            <h2 class="section-title">
                Kelola Website
            </h2>


            <div class="quick-menu">


                <!-- SISWA -->

                <a href="{{ url('/admin/siswa') }}" class="quick-card">

                    <div class="card-icon">
                        👨‍🎓
                    </div>

                    <h3>
                        Data Siswa
                    </h3>

                    <div class="card-number">
                        {{ \App\Models\Siswa::count() }}
                    </div>

                    <p>
                        Total siswa terdaftar
                    </p>

                    <span class="card-link">
                        Kelola Data →
                    </span>

                </a>


                <!-- GURU -->

                <a href="{{ url('/admin/guru') }}" class="quick-card">

                    <div class="card-icon">
                        👨‍🏫
                    </div>

                    <h3>
                        Guru & Staff
                    </h3>

                    <div class="card-number">
                        {{ \App\Models\Guru::count() }}
                    </div>

                    <p>
                        Total guru dan staff terdaftar
                    </p>

                    <span class="card-link">
                        Kelola Data →
                    </span>

                </a>


                <!-- JURUSAN -->

                <a href="{{ url('/admin/jurusan') }}" class="quick-card">

                    <div class="card-icon">
                        🎓
                    </div>

                    <h3>
                        Jurusan DKV
                    </h3>

                    <div class="card-number">
                        {{ \App\Models\Jurusan::count() }}
                    </div>

                    <p>
                        Program keahlian
                    </p>

                    <span class="card-link">
                        Kelola Data →
                    </span>

                </a>


                <!-- BERITA -->

                <a href="{{ url('/admin/berita') }}" class="quick-card">

                    <div class="card-icon">
                        📰
                    </div>

                    <h3>
                        Berita
                    </h3>

                    <div class="card-number">
                        {{ \App\Models\Berita::count() }}
                    </div>

                    <p>
                        Berita dan pengumuman sekolah
                    </p>

                    <span class="card-link">
                        Kelola Berita →
                    </span>

                </a>

                <a href="{{ url('/admin/prestasi') }}" class="quick-card">

    <div class="card-icon">
        🏆
    </div>

    <h3>
        Prestasi
    </h3>

    <div class="card-number">
        {{ \App\Models\Prestasi::count() }}
    </div>

    <p>
        Prestasi yang diraih sekolah
    </p>

    <span class="card-link">
        Kelola Prestasi →
    </span>

</a>

<!-- PPDB -->

<a href="{{ url('/admin/ppdb') }}" class="quick-card">

    <div class="card-icon">
        📝
    </div>

    <h3>
        PPDB
    </h3>

    <div class="card-number">
        {{ \App\Models\Ppdb::count() }}
    </div>

    <p>
        Informasi penerimaan siswa baru
    </p>

    <span class="card-link">
        Kelola PPDB →
    </span>

</a>

<!-- BKK -->

<a href="{{ url('/admin/bkk') }}" class="quick-card">

    <div class="card-icon">
        💼
    </div>

    <h3>
        BKK
    </h3>

    <div class="card-number">
        {{ \App\Models\BkkLowongan::count() }}
    </div>

    <p>
        Lowongan kerja & PKL lulusan
    </p>

    <span class="card-link">
        Kelola BKK →
    </span>

</a>

            </div>

        </section>

    </main>

</div>

</body>
</html>