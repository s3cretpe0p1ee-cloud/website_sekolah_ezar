<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BKK - SMK INFOKOM Bogor</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f7fc;
            color: #102b5c;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            position: absolute;
            top: 10px;
            left: 3.5%;
            right: 3.5%;
            z-index: 10;

            height: 58px;
            padding: 0 22px;

            background: white;
            border-radius: 35px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-area img {
            width: 38px;
            height: 38px;
            object-fit: contain;
        }

        .school-name {
            line-height: 1.05;
        }

        .school-name h3 {
            font-size: 18px;
            color: #123c80;
        }

        .school-name p {
            font-size: 10px;
            color: #555;
        }

        .nav-menu {
            display: flex;
            align-items: center;

            gap: 13px;

            font-size: 12.5px;
            font-weight: bold;

            flex-wrap: nowrap;

            white-space: nowrap;
        }

        /* navbar lebih ringkas di layar sempit */

        @media (max-width: 1280px) {

            .nav-menu {
                gap: 9px;

                font-size: 11.5px;
            }

            .navbar {
                left: 2.5%;
                right: 2.5%;
            }

        }

        @media (max-width: 1120px) {

            .nav-menu {
                gap: 6px;

                font-size: 10.5px;
            }

            .nav-menu .active {
                padding: 9px 12px;
            }

            .login-btn {
                padding: 9px 16px;
            }

        }

        .nav-menu a {
            color: #172d52;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #125dcc;
        }

        .nav-menu .active {
            background: #1264cf;
            color: white;
            padding: 10px 15px;
            border-radius: 25px;
        }

        .login-btn {
            background: #ffd900;
            color: #111;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
        }

        /* dropdown program unggulan */

        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown > a {
            cursor: pointer;

            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .nav-dropdown > a .panah {
            font-size: 9px;

            transition: transform 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .nav-dropdown:hover > a .panah {
            transform: rotate(180deg);
        }

        .nav-dropdown::after {
            content: "";

            position: absolute;
            top: 100%;
            left: -10px;
            right: -10px;

            height: 18px;
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 12px);
            left: 50%;

            transform: translateX(-50%) translateY(10px);

            min-width: 200px;

            background: white;

            border-radius: 14px;

            box-shadow: 0 14px 34px rgba(16, 43, 92, 0.22);

            padding: 8px;

            opacity: 0;
            visibility: hidden;

            transition:
                opacity 0.3s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
                visibility 0.3s;

            z-index: 30;
        }

        .nav-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;

            transform: translateX(-50%) translateY(0);
        }

        .dropdown-menu a {
            display: block;

            padding: 10px 14px;

            border-radius: 9px;

            font-size: 12.5px;
            font-weight: bold;

            color: #33445f;

            white-space: nowrap;

            transition: 0.22s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .dropdown-menu a:hover {
            background: #e9f3ff;

            color: #1264cf;

            transform: translateX(4px);
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            background:
                linear-gradient(
                    90deg,
                    rgba(0, 43, 100, 0.97) 0%,
                    rgba(0, 65, 140, 0.88) 45%,
                    rgba(0, 65, 140, 0.35) 100%
                ),
                url("{{ asset('images/gedung sekolah.jpeg') }}");

            background-size: cover;
            background-position: right center;

            color: white;

            padding: 130px 10% 100px;
        }

        .hero-crumb {
            font-size: 12px;
            letter-spacing: 1px;
            color: #cfe2fb;
            margin-bottom: 14px;
        }

        .hero-crumb b {
            color: #ffe000;
        }

        .welcome-label {
            display: inline-block;
            background: #ffe000;
            color: #111;

            padding: 7px 20px;
            border-radius: 20px;

            font-size: 13px;
            font-weight: bold;

            margin-bottom: 12px;
        }

        .hero-title {
            font-size: clamp(38px, 5vw, 58px);
            font-weight: 900;
            line-height: 1;

            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .hero-title span {
            color: #ffe000;
        }

        .hero-subtitle {
            margin-top: 14px;

            display: inline-block;

            border-top: 3px solid #ffe000;
            border-bottom: 3px solid #ffe000;

            padding: 7px 15px;

            letter-spacing: 4px;
            font-size: 13px;
        }

        .hero-description {
            margin-top: 14px;
            max-width: 520px;

            font-size: 14px;
            line-height: 1.6;
            color: #dbe8fb;
        }

        /* =========================
           STATISTIK
        ========================= */

        .stats {
            position: relative;
            z-index: 3;

            margin: -45px auto 0;

            width: 87%;

            background: white;
            border-radius: 18px;

            padding: 10px 20px;

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 15px;

            padding: 12px 20px;

            border-right: 1px solid #e3eaf5;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-icon {
            width: 52px;
            height: 52px;

            background: #e9f3ff;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 900;
            color: #123b78;
        }

        .stat-label {
            font-size: 12px;
            color: #222;
            font-weight: bold;
        }

        .stat-small {
            font-size: 10px;
            color: #777;
            margin-top: 2px;
        }

        /* =========================
           CONTAINER & SECTION
        ========================= */

        .container {
            width: 87%;
            margin: auto;
        }

        .section {
            margin-top: 55px;

            scroll-margin-top: 120px;
        }

        .section-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 15px;

            margin-bottom: 22px;
        }

        .section-head h2 {
            font-size: 21px;
            color: #123b78;
        }

        .section-head h2::after {
            content: "";

            display: block;

            width: 45px;
            height: 3px;

            background: #ffd900;

            margin-top: 6px;
            border-radius: 3px;
        }

        .section-head .section-desc {
            margin-top: 8px;

            font-size: 12px;
            color: #7b8aa5;
        }

        .count-pill {
            flex-shrink: 0;

            background: #1264cf;
            color: white;

            padding: 6px 15px;
            border-radius: 20px;

            font-size: 12px;
            font-weight: bold;
        }

        /* =========================
           LOWONGAN KERJA
        ========================= */

        .loker-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 18px;
        }

        .loker-card {
            position: relative;
            overflow: hidden;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 16px;

            padding: 20px;

            box-shadow: 0 3px 14px rgba(16, 43, 92, 0.07);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .loker-card::before {
            content: "";

            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;

            background: linear-gradient(90deg, #0752b9, #0780df);

            transform: scaleX(0);
            transform-origin: left;

            transition: transform 0.3s ease;
        }

        .loker-card:hover {
            transform: translateY(-8px);

            box-shadow: 0 16px 32px rgba(16, 43, 92, 0.16);
        }

        .loker-card:hover::before {
            transform: scaleX(1);
        }

        .loker-top {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 14px;
        }

        .loker-logo {
            flex-shrink: 0;

            width: 52px;
            height: 52px;

            background: #e9f3ff;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;
        }

        .loker-posisi {
            font-size: 15px;
            font-weight: 800;
            color: #123b78;

            line-height: 1.3;
        }

        .loker-perusahaan {
            font-size: 11.5px;
            color: #7b8aa5;

            margin-top: 3px;
        }

        .loker-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;

            margin-bottom: 14px;
        }

        .loker-tag {
            background: #eef4fd;
            color: #123b78;

            padding: 5px 11px;
            border-radius: 14px;

            font-size: 10.5px;
            font-weight: bold;
        }

        .loker-tag--gaji {
            background: #fff8d6;
            color: #7a5c00;
        }

        .loker-desc {
            font-size: 12px;
            color: #51617a;

            line-height: 1.6;

            margin-bottom: 16px;
        }

        .loker-btn {
            display: block;

            text-align: center;

            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;

            padding: 10px;

            border-radius: 22px;

            font-size: 12px;
            font-weight: bold;

            transition: 0.2s;
        }

        .loker-btn:hover {
            filter: brightness(1.12);
        }

        /* =========================
           LANGKAH / ALUR
        ========================= */

        .langkah-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
        }

        .langkah-card {
            position: relative;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 16px;

            padding: 24px 18px 20px;

            text-align: center;

            box-shadow: 0 3px 14px rgba(16, 43, 92, 0.07);
        }

        .langkah-num {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);

            width: 32px;
            height: 32px;

            background: #ffd900;
            color: #111;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: 900;

            box-shadow: 0 4px 10px rgba(255, 217, 0, 0.45);
        }

        .langkah-icon {
            font-size: 34px;

            margin-bottom: 10px;
        }

        .langkah-card h3 {
            font-size: 14px;
            color: #123b78;

            margin-bottom: 6px;
        }

        .langkah-card p {
            font-size: 11.5px;
            color: #7b8aa5;

            line-height: 1.55;
        }

        /* =========================
           KONTAK / CTA
        ========================= */

        .cta {
            margin-top: 55px;

            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;

            border-radius: 20px;

            padding: 35px 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;

            box-shadow: 0 14px 30px rgba(7, 82, 185, 0.35);
        }

        .cta h3 {
            font-size: 20px;

            margin-bottom: 8px;
        }

        .cta p {
            font-size: 13px;

            color: #d9e9ff;

            line-height: 1.6;
        }

        .cta-btn {
            flex-shrink: 0;

            background: #ffe000;
            color: #111;

            padding: 13px 26px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;

            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.18);

            transition: 0.2s;
        }

        .cta-btn:hover {
            transform: translateY(-3px);
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            padding: 55px 20px;

            background: white;

            border: 2px dashed #d6e0f0;
            border-radius: 18px;

            text-align: center;
        }

        .empty .emoji {
            font-size: 40px;
        }

        .empty h3 {
            margin-top: 12px;

            color: #123b78;
            font-size: 17px;
        }

        .empty p {
            margin-top: 6px;

            font-size: 13px;
            color: #7b8aa5;
        }

        /* =========================
           TOMBOL KE ATAS
        ========================= */

        .back-top {
            position: fixed;
            bottom: 22px;
            right: 22px;
            z-index: 30;

            width: 46px;
            height: 46px;

            border: none;
            border-radius: 50%;

            background: #1264cf;
            color: white;

            font-size: 18px;

            cursor: pointer;

            box-shadow: 0 8px 20px rgba(18, 100, 207, 0.4);

            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);

            transition: 0.25s ease;
        }

        .back-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-top:hover {
            background: #0a4da3;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #063d82;
            color: white;

            margin-top: 60px;
            padding: 25px 7% 12px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr 1fr 1fr;

            gap: 30px;
        }

        footer h3 {
            font-size: 14px;
            margin-bottom: 10px;
        }

        footer p,
        footer li {
            font-size: 10px;
            color: #d9e7fa;
            line-height: 1.7;
        }

        footer ul {
            list-style: none;
        }

        footer ul a:hover {
            color: #ffe000;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.2);

            margin-top: 20px;
            padding-top: 10px;

            text-align: center;

            font-size: 9px;
            color: #b9d0ec;
        }

        /* =========================
           ANIMASI REVEAL
        ========================= */

        .reveal {
            opacity: 0;
            transform: translateY(24px);

            transition:
                opacity 0.6s ease,
                transform 0.6s ease;
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        .loker-grid > .reveal:nth-child(2),
        .langkah-grid > .reveal:nth-child(2) {
            transition-delay: 0.08s;
        }

        .loker-grid > .reveal:nth-child(3),
        .langkah-grid > .reveal:nth-child(3) {
            transition-delay: 0.16s;
        }

        .loker-grid > .reveal:nth-child(4) {
            transition-delay: 0.24s;
        }

        @media (prefers-reduced-motion: reduce) {

            .reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }

            html {
                scroll-behavior: auto;
            }

        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .nav-menu {
                display: none;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .stat-item {
                border-right: none;
                border-bottom: 1px solid #e3eaf5;
            }

            .stat-item:nth-last-child(-n + 2) {
                border-bottom: none;
            }

        }

        @media (max-width: 600px) {

            .navbar {
                left: 3%;
                right: 3%;
            }

            .school-name h3 {
                font-size: 13px;
            }

            .school-name p {
                font-size: 8px;
            }

            .hero {
                padding: 110px 7% 80px;
            }

            .hero-subtitle {
                font-size: 10px;
                letter-spacing: 2px;
            }

            .stats {
                width: 92%;
                grid-template-columns: 1fr;
            }

            .stat-item {
                border-bottom: 1px solid #e3eaf5;
            }

            .stat-item:last-child {
                border-bottom: none;
            }

            .section-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .cta {
                flex-direction: column;
                text-align: center;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

        }
    
        .smk-pk-badge {
            width: 34px;
            height: 34px;

            object-fit: contain;

            border-radius: 10px;

            background: white;

            padding: 2px;

            box-shadow: 0 3px 10px rgba(16, 43, 92, 0.25);

            transition: transform 0.3s ease;
        }

        .smk-pk-badge:hover {
            transform: scale(1.12) rotate(-5deg);
        }

        .logo-area {
            gap: 8px;
        }

        /* =========================
           MITRA INDUSTRI
        ========================= */

        .mitra-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        @media (max-width: 900px) {
            .mitra-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 560px) {
            .mitra-grid { grid-template-columns: 1fr; }
        }

        .mitra-card {
            background: white;
            border-radius: 18px;
            padding: 28px 22px;

            text-align: center;

            box-shadow: 0 8px 24px rgba(18, 59, 120, 0.08);

            transition: transform 0.35s var(--ease-halus, ease), box-shadow 0.35s var(--ease-halus, ease);
        }

        .mitra-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 16px 40px rgba(18, 59, 120, 0.16);
        }

        .mitra-logo {
            height: 88px;

            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .mitra-logo img {
            max-width: 100%;
            max-height: 88px;
            object-fit: contain;

            filter: saturate(1.05);
        }

        .mitra-card h3 {
            font-size: 15px;
            color: #123b78;
            margin-bottom: 5px;

            letter-spacing: 0.4px;
        }

        .mitra-card p {
            font-size: 11.5px;
            color: #7d8aa3;

            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .mitra-subhead {
            margin: 34px 0 4px;
        }

        .mitra-subhead h3 {
            font-size: 19px;
            color: #123b78;
            margin-bottom: 4px;
        }

        .mitra-subhead p {
            font-size: 13px;
            color: #7d8aa3;
        }

    </style>

</head>

    <!-- NAVBAR -->

    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo-area">

            <img src="{{ asset('images/logo-sekolah.jpg') }}" alt="Logo SMK INFOKOM">

<img class="smk-pk-badge" src="{{ asset('images/logo-smk-pk.jpg') }}" alt="SMK PK - Pusat Keunggulan">


            <div class="school-name">
                <h3>SMK INFOKOM BOGOR</h3>
                <p>SMK Informatika dan Telekomunikasi</p>
            </div>

        </a>

        <div class="nav-menu">

            <a href="{{ url('/') }}">⌂ &nbsp; Beranda</a>

            <a href="{{ url('/profil') }}">Profil⌄</a>

            <div class="nav-dropdown">
                <a href="{{ url('/jurusan') }}">Jurusan <span class="panah">▾</span></a>
                <div class="dropdown-menu">
                    <a href="{{ url('/jurusan#rpl') }}">⌨ Rekayasa Perangkat Lunak</a>
                    <a href="{{ url('/jurusan#tkj') }}">🌐 Teknik Komputer & Jaringan</a>
                    <a href="{{ url('/jurusan#dkv') }}">🎨 Desain Komunikasi Visual</a>
                    <a href="{{ url('/jurusan#pspt') }}">🎬 Siaran & Perfilman Terapan</a>
                </div>
            </div>

    <div class="nav-dropdown">

        <a href="{{ url('/program-unggulan') }}">
            Program Unggulan <span class="panah">▾</span>
        </a>

        <div class="dropdown-menu">

            <a href="{{ url('/program-unggulan') }}">⭐ Semua Program</a>
            <a href="{{ url('/program-unggulan#pkl') }}">🏢 PKL</a>
            <a href="{{ url('/program-unggulan#magang') }}">💼 Magang</a>
            <a href="{{ url('/program-unggulan#kerjasama') }}">🤝 Kerjasama</a>

        </div>

    </div>

            <a href="{{ url('/guru') }}">Guru & Staff</a>

            <a href="{{ url('/fasilitas') }}">Fasilitas</a>

            <a href="{{ url('/prestasi') }}">Prestasi</a>

            <a href="{{ url('/galeri') }}">Galeri</a>

            <a href="{{ url('/bkk') }}" class="active">BKK</a>


            <a href="{{ url('/ppdb') }}">PPDB</a>

            <a href="{{ url('/kontak') }}">Kontak</a>

        </div>

        <a href="{{ url('/login') }}" class="login-btn">Login</a>

    </nav>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-crumb">
            Beranda &nbsp;·&nbsp; <b>BKK</b>
        </div>

        <span class="welcome-label">
            Bursa Kerja Khusus
        </span>

        <h1 class="hero-title">
            BKK <span>SMK INFOKOM</span>
        </h1>

        <div class="hero-subtitle">
            JEMBATAN LULUSAN KE DUNIA KERJA
        </div>

        <p class="hero-description">
            Bursa Kerja Khusus SMK INFOKOM Bogor membantu lulusan
            mendapatkan pekerjaan, magang/PKL, dan informasi karier
            sesuai bidang keahlian — bekerja sama dengan dunia
            industri dan perusahaan mitra.
        </p>

    </section>


    <!-- STATISTIK -->

    @php

        // Data dari database (dikirim BkkLowonganController@frontend).
        // Fallback ke data contoh jika tabel belum dibuat / kosong.

        try {

            $lokerDb = \App\Models\BkkLowongan::where('aktif', true)
                ->orderBy('id', 'desc')
                ->get();

        } catch (\Throwable $e) {

            $lokerDb = collect();

        }

        if ($lokerDb->isNotEmpty()) {

            $lokerList = $lokerDb->map(fn ($l) => [
                'posisi' => $l->posisi,
                'perusahaan' => $l->perusahaan,
                'icon' => $l->logo ?: '🏢',
                'lokasi' => $l->lokasi,
                'tipe' => $l->tipe,
                'gaji' => $l->gaji,
                'desc' => $l->deskripsi,
                'link' => $l->link,
            ])->toArray();

        } else {

            $lokerList = [
                [
                    'posisi' => 'Junior Web Developer',
                    'perusahaan' => 'PT Teknologi Nusantara',
                    'icon' => '💻',
                    'lokasi' => 'Bogor, Jawa Barat',
                    'tipe' => 'Full-time',
                    'gaji' => 'Rp 4,5 - 6 jt',
                    'desc' => 'Mengembangkan aplikasi web perusahaan menggunakan PHP/Laravel dan MySQL. Fresh graduate SMK RPL dipersilakan melamar.',
                ],
                [
                    'posisi' => 'Teknisi Jaringan',
                    'perusahaan' => 'CV Jaringan Mandiri',
                    'icon' => '🔌',
                    'lokasi' => 'Sentul, Bogor',
                    'tipe' => 'Full-time',
                    'gaji' => 'Rp 3,5 - 5 jt',
                    'desc' => 'Instalasi dan maintenance jaringan LAN/WAN, konfigurasi router, serta troubleshooting perangkat klien.',
                ],
                [
                    'posisi' => 'Operator Editing Video',
                    'perusahaan' => 'Studio Sinema Bogor',
                    'icon' => '🎬',
                    'lokasi' => 'Bogor Tengah',
                    'tipe' => 'Kontrak',
                    'gaji' => 'Rp 3 - 4,5 jt',
                    'desc' => 'Editing video konten klien menggunakan Premiere Pro / DaVinci Resolve. Lulusan DKV/PSPT diutamakan.',
                ],
                [
                    'posisi' => 'Magang Graphic Designer',
                    'perusahaan' => 'Agensi Kreatif Kota Hujan',
                    'icon' => '🎨',
                    'lokasi' => 'Bogor Utara',
                    'tipe' => 'Magang / PKL',
                    'gaji' => 'Uang saku',
                    'desc' => 'Mendesain materi promosi digital dan cetak. Kesempatan diangkat karyawan setelah masa magang.',
                ],
            ];

        }

    @endphp

    <section class="stats">

        <div class="stat-item">

            <div class="stat-icon">📢</div>

            <div>
                <div class="stat-number">{{ count($lokerList) }}</div>
                <div class="stat-label">Lowongan Aktif</div>
                <div class="stat-small">Diperbarui Berkala</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">🤝</div>

            <div>
                <div class="stat-number">25+</div>
                <div class="stat-label">Perusahaan Mitra</div>
                <div class="stat-small">Industri & Dunia Usaha</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">💼</div>

            <div>
                <div class="stat-number">85%</div>
                <div class="stat-label">Lulusan Bekerja / Kuliah</div>
                <div class="stat-small">Data Tracer Study</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">🏢</div>

            <div>
                <div class="stat-number">100+</div>
                <div class="stat-label">Mitra PKL</div>
                <div class="stat-small">Tempat Praktik Kerja</div>
            </div>

        </div>

    </section>


    <main class="container">


        <!-- LOWONGAN TERKINI -->

        <section class="section" id="lowongan">

            <div class="section-head">

                <div>
                    <h2>Lowongan Terkini</h2>
                    <p class="section-desc">Info kerja & magang dari perusahaan mitra BKK</p>
                </div>

                <span class="count-pill">{{ count($lokerList) }} Lowongan</span>

            </div>

            <div class="loker-grid">

                @forelse($lokerList as $loker)

                    <article class="loker-card reveal">

                        <div class="loker-top">

                            <div class="loker-logo">{{ $loker['icon'] }}</div>

                            <div>
                                <div class="loker-posisi">{{ $loker['posisi'] }}</div>
                                <div class="loker-perusahaan">{{ $loker['perusahaan'] }}</div>
                            </div>

                        </div>

                        <div class="loker-meta">

                            <span class="loker-tag">📍 {{ $loker['lokasi'] }}</span>
                            <span class="loker-tag">{{ $loker['tipe'] }}</span>
                            <span class="loker-tag loker-tag--gaji">💰 {{ $loker['gaji'] }}</span>

                        </div>

                        <p class="loker-desc">
                            {{ $loker['desc'] }}
                        </p>

                        <a
                            href="{{ $loker['link'] ?? url('/kontak') }}"
                            class="loker-btn"
                            {{ ($loker['link'] ?? null) ? 'target="_blank" rel="noopener"' : '' }}
                        >
                            {{ ($loker['link'] ?? null) ? 'Daftar Sekarang →' : 'Daftar via BKK →' }}
                        </a>

                    </article>

                @endforeach

            </div>

        </section>


        <!-- ALUR PENDAFTARAN -->

        <section class="section" id="cara-daftar">

            <div class="section-head">

                <div>
                    <h2>Alur Pendaftaran</h2>
                    <p class="section-desc">Empat langkah mudah mendaftar melalui BKK</p>
                </div>

            </div>

            <div class="langkah-grid">

                <div class="langkah-card reveal">

                    <div class="langkah-num">1</div>

                    <div class="langkah-icon">📄</div>

                    <h3>Siapkan Berkas</h3>

                    <p>
                        CV, fotokopi ijazah/SKL, transkrip nilai,
                        dan pas foto terbaru.
                    </p>

                </div>

                <div class="langkah-card reveal">

                    <div class="langkah-num">2</div>

                    <div class="langkah-icon">📝</div>

                    <h3>Daftar ke BKK</h3>

                    <p>
                        Datang ke ruang BKK atau daftar online melalui
                        guru pembimbing BKK.
                    </p>

                </div>

                <div class="langkah-card reveal">

                    <div class="langkah-num">3</div>

                    <div class="langkah-icon">🎯</div>

                    <h3>Seleksi Perusahaan</h3>

                    <p>
                        Ikuti tes wawancara dan seleksi sesuai
                        prosedur perusahaan mitra.
                    </p>

                </div>

                <div class="langkah-card reveal">

                    <div class="langkah-num">4</div>

                    <div class="langkah-icon">🎉</div>

                    <h3>Berangkat Kerja</h3>

                    <p>
                        Lulusan yang diterima dikonfirmasi ke sekolah
                        dan siap bekerja.
                    </p>

                </div>

            </div>

        </section>



        <!-- MITRA INDUSTRI -->

        <section class="section" id="mitra">

            <div class="section-head">

                <div>
                    <h2>Mitra Kerja Sama Industri & Universitas</h2>
                    <p class="section-desc">Perusahaan & kampus yang menjadi mitra BKK SMK INFOKOM</p>
                </div>

                <span class="count-pill">13 Mitra</span>

            </div>

            <div class="mitra-grid">

                @foreach([
                    ['img' => 'mitra-byu.jpg',        'nama' => 'by.U',                    'bidang' => 'Telekomunikasi'],
                    ['img' => 'mitra-bonet.jpg',      'nama' => 'Bonet',                   'bidang' => 'IT Solution Partner'],
                    ['img' => 'mitra-bsi.jpg',        'nama' => 'Bank Syariah Indonesia',  'bidang' => 'Perbankan Syariah'],
                    ['img' => 'mitra-bjb.jpg',        'nama' => 'Bank BJB',                'bidang' => 'Perbankan'],
                    ['img' => 'mitra-mandiri.jpg',    'nama' => 'Bank Mandiri',            'bidang' => 'Perbankan'],
                    ['img' => 'mitra-citraweb.jpg',   'nama' => 'Citraweb',                'bidang' => 'Solusi Teknologi'],
                    ['img' => 'mitra-msv-studio.jpg', 'nama' => 'MSV Studio',              'bidang' => 'Kreatif & Produksi'],
                    ['img' => 'mitra-jawa-pos.jpg',   'nama' => 'Jawa Pos',                'bidang' => 'Media & Pers'],
                ] as $mitraItem)
                    <div class="mitra-card reveal">
                        <div class="mitra-logo"><img src="{{ asset('images/' . $mitraItem['img']) }}" alt="{{ $mitraItem['nama'] }}"></div>
                        <h3>{{ $mitraItem['nama'] }}</h3>
                        <p>{{ $mitraItem['bidang'] }}</p>
                    </div>
                @endforeach

            </div>

            <div class="mitra-subhead">
                <h3>🎓 Kerja Sama Universitas</h3>
                <p>Kampus tujuan lanjut studi &amp; kerja sama pendidikan lulusan</p>
            </div>

            <div class="mitra-grid">

                @foreach([
                    ['img' => 'kampus-ipb.png',          'nama' => 'IPB University',              'bidang' => 'Institut Pertanian Bogor'],
                    ['img' => 'kampus-djuanda.png',      'nama' => 'Universitas Djuanda',         'bidang' => 'Bogor'],
                    ['img' => 'kampus-ibn-khaldun.png',  'nama' => 'Universitas Ibn Khaldun',     'bidang' => 'Bogor'],
                    ['img' => 'kampus-pakuan.png',       'nama' => 'Universitas Pakuan',          'bidang' => 'Bogor'],
                    ['img' => 'kampus-pnj.png',          'nama' => 'Politeknik Negeri Jakarta',   'bidang' => 'Politeknik'],
                ] as $kampus)
                    <div class="mitra-card reveal">
                        <div class="mitra-logo"><img src="{{ asset('images/' . $kampus['img']) }}" alt="{{ $kampus['nama'] }}"></div>
                        <h3>{{ $kampus['nama'] }}</h3>
                        <p>{{ $kampus['bidang'] }}</p>
                    </div>
                @endforeach

            </div>

        </section>


        <!-- CTA -->

        <section class="cta">

            <div>

                <h3>Punya Pertanyaan Seputar Kerja atau PKL?</h3>

                <p>
                    Hubungi koordinator BKK SMK INFOKOM Bogor di ruang
                    BKK, atau hubungi kontak sekolah untuk informasi
                    lowongan terbaru.
                </p>

            </div>

            <a href="{{ url('/kontak') }}" class="cta-btn">
                Hubungi BKK →
            </a>

        </section>

    </main>


    <!-- FOOTER -->

    <footer>

        <div class="footer-grid">

            <div>

                <h3>SMK INFOKOM BOGOR</h3>

                <p>
                    SMK Informatika dan Telekomunikasi
                </p>

                <p>
                    Mencetak generasi unggul, berkarakter,
                    kompeten di bidang teknologi dan siap
                    menghadapi dunia kerja.
                </p>

            </div>


            <div>

                <h3>Menu Cepat</h3>

                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{{ url('/jurusan') }}}">Jurusan</a></li>
                    <li><a href="{{ url('/bkk') }}">BKK</a></li>
                </ul>

            </div>


            <div>

                <h3>Kontak</h3>

                <p>
                    Jl. Letjen Ibrahim Adjie No.178, Sindangbarang, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16117
                </p>

                <p>
                    0251-8348-108 · 0878-7307-1400 (Humas)
                </p>

                <p>
                    smk.infokom@gmail.com
                </p>

            </div>


            <div>

                <h3>Ikuti Kami</h3>

                <p>
                    YouTube · Instagram · TikTok · Facebook
                </p>

            </div>

        </div>


        <div class="copyright">

            © {{ date('Y') }} SMK INFOKOM Bogor. All rights reserved.

        </div>

    </footer>


    <!-- TOMBOL KE ATAS -->

    <button type="button" class="back-top" id="backTop" title="Kembali ke atas">↑</button>


    <script>
        (function () {

            // ===== ANIMASI REVEAL SAAT SCROLL =====

            if ('IntersectionObserver' in window) {

                var pengamat = new IntersectionObserver(
                    function (entries) {

                        entries.forEach(function (entry) {

                            if (entry.isIntersecting) {

                                entry.target.classList.add('in-view');
                                pengamat.unobserve(entry.target);

                            }

                        });

                    },
                    { threshold: 0.08 }
                );

                document.querySelectorAll('.reveal').forEach(function (el) {
                    pengamat.observe(el);
                });

            } else {

                document.querySelectorAll('.reveal').forEach(function (el) {
                    el.classList.add('in-view');
                });

            }

            // ===== TOMBOL KEMBALI KE ATAS =====

            var tombolAtas = document.getElementById('backTop');

            window.addEventListener('scroll', function () {
                tombolAtas.classList.toggle('show', window.scrollY > 400);
            });

            tombolAtas.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

        })();
    </script>

</body>

</html>
