<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Guru & Staff - SMK INFOKOM Bogor</title>

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
           CONTAINER
        ========================= */

        .container {
            width: 87%;
            margin: auto;
        }

        /* =========================
           TOOLBAR PENCARIAN
        ========================= */

        .toolbar {
            position: sticky;
            top: 14px;
            z-index: 20;

            background: white;
            border-radius: 18px;

            padding: 14px 16px;

            box-shadow: 0 6px 22px rgba(16, 43, 92, 0.1);

            margin-top: 35px;
        }

        .search-box {
            position: relative;
        }

        .search-box .icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);

            font-size: 14px;
            color: #8aa0c4;
        }

        .search-box input {
            width: 100%;

            border: 2px solid #e4eaf5;
            border-radius: 25px;

            padding: 12px 42px 12px 40px;

            font-size: 13px;
            font-family: inherit;
            color: #102b5c;

            outline: none;

            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-box input::placeholder {
            color: #9aabc7;
        }

        .search-box input:focus {
            border-color: #1264cf;
            box-shadow: 0 0 0 4px rgba(18, 100, 207, 0.12);
        }

        .search-clear {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);

            width: 30px;
            height: 30px;

            border: none;
            border-radius: 50%;

            background: #eef2f9;
            color: #51617a;

            font-size: 13px;

            cursor: pointer;

            display: none;
        }

        .search-clear.show {
            display: block;
        }

        .chips {
            display: flex;
            gap: 8px;

            margin-top: 12px;

            overflow-x: auto;
            padding-bottom: 2px;

            scrollbar-width: none;
        }

        .chips::-webkit-scrollbar {
            display: none;
        }

        .chip {
            flex-shrink: 0;

            background: #eef4fd;
            color: #123b78;

            padding: 8px 16px;
            border-radius: 20px;

            font-size: 12px;
            font-weight: bold;

            transition: 0.2s;
        }

        .chip:hover {
            background: #1264cf;
            color: white;
        }

        /* =========================
           SECTION
        ========================= */

        .section {
            margin-top: 50px;

            scroll-margin-top: 150px;
        }

        .section.is-hidden,
        .guru-card.is-hidden {
            display: none;
        }

        .section-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 15px;

            margin-bottom: 20px;
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
           GRID
        ========================= */

        .guru-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            gap: 20px;
        }

        .kepala-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 370px));
            justify-content: center;
            gap: 20px;
        }

        /* =========================
           CARD
        ========================= */

        .guru-card {
            position: relative;
            overflow: hidden;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 16px;

            padding: 20px 16px;

            text-align: center;

            box-shadow: 0 3px 14px rgba(16, 43, 92, 0.07);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .guru-card::before {
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

        .guru-card:hover {
            transform: translateY(-8px);

            box-shadow: 0 16px 32px rgba(16, 43, 92, 0.16);
        }

        .guru-card:hover::before {
            transform: scaleX(1);
        }

        /* efek kilau saat hover */

        .guru-card::after {
            content: "";

            position: absolute;
            top: 0;
            left: -80%;

            width: 50%;
            height: 100%;

            background: linear-gradient(
                100deg,
                transparent,
                rgba(255, 255, 255, 0.35),
                transparent
            );

            transform: skewX(-20deg);

            transition: left 0.6s ease;

            pointer-events: none;
        }

        .guru-card:hover::after {
            left: 130%;
        }

        /* FOTO — bingkai potret, foto tampil utuh tanpa terpotong */

        .guru-photo {
            position: relative;

            width: 100%;
            height: 185px;

            border-radius: 14px;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(18, 100, 207, 0.08) 0%,
                    transparent 60%
                ),
                linear-gradient(180deg, #eaf3ff 0%, #f7fbff 100%);

            border: 1px solid #e2ecf9;

            /* bayangan halus di bawah bingkai */
            box-shadow: 0 6px 16px rgba(16, 43, 92, 0.12);

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 15px;

            transition:
                box-shadow 0.25s ease,
                border-color 0.25s ease,
                transform 0.25s ease;
        }

        /* dekorasi lingkaran di sudut bingkai */

        .guru-photo::before {
            content: "";

            position: absolute;
            left: -22px;
            bottom: -22px;

            width: 92px;
            height: 92px;

            border-radius: 50%;

            background: rgba(18, 100, 207, 0.07);
        }

        .guru-photo::after {
            content: "";

            position: absolute;
            right: -14px;
            top: -14px;

            width: 58px;
            height: 58px;

            border-radius: 50%;

            border: 9px solid rgba(18, 100, 207, 0.14);
        }

        .guru-photo img {
            position: relative;
            z-index: 1;

            width: 100%;
            height: 100%;

            /* foto utuh, tidak dipotong */
            object-fit: contain;
            object-position: center;
        }

        /* bingkai foto terangkat saat kartu di-hover atau dipilih */

        .guru-card:hover .guru-photo {
            transform: translateY(-5px) scale(1.02);

            border-color: #bcd7f7;

            box-shadow:
                inset 0 0 0 2px rgba(18, 100, 207, 0.12),
                0 16px 30px rgba(16, 43, 92, 0.24);
        }

        /* kondisi terpilih (klik kartu) — bingkai tetap pop up dengan cincin emas */

        .guru-card.is-selected .guru-photo {
            transform: translateY(-5px) scale(1.02);

            border-color: #ffd900;

            box-shadow:
                inset 0 0 0 2px rgba(255, 200, 0, 0.55),
                0 16px 30px rgba(16, 43, 92, 0.24);
        }

        .guru-card {
            cursor: pointer;
        }

        .avatar-fallback {
            width: 100%;
            height: 100%;

            background:
                radial-gradient(
                    circle at 75% 20%,
                    rgba(255, 255, 255, 0.16) 0%,
                    transparent 45%
                ),
                linear-gradient(135deg, #0a4da3, #1264cf);

            display: flex;
            align-items: center;
            justify-content: center;

            color: rgba(255, 255, 255, 0.92);
            font-size: 46px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .avatar-fallback small {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;

            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.55);
        }

        /* NAMA */

        .guru-name {
            font-size: 16px;
            font-weight: 800;
            color: #123b78;

            min-height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* PERAN */

        .guru-peran {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;

            margin-top: 10px;
        }

        .peran-badge {
            display: inline-block;
            max-width: 100%;

            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;

            padding: 7px 15px;
            border-radius: 20px;

            font-size: 11.5px;
            font-weight: bold;
            line-height: 1.35;
        }

        .peran-badge--gold {
            background: #ffe000;
            color: #111;
        }

        .peran-mini {
            display: inline-block;

            background: #f1f5fb;
            border: 1px solid #e4eaf5;
            color: #51617a;

            padding: 5px 11px;
            border-radius: 14px;

            font-size: 10.5px;
        }

        /* CARD KEPALA SEKOLAH */

        .guru-card--featured {
            padding: 26px 22px;
        }

        .guru-card--featured .guru-photo {
            height: 235px;

            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(255, 224, 0, 0.2) 0%,
                    transparent 55%
                ),
                linear-gradient(180deg, #fff8d6 0%, #f7fbff 60%);
        }

        .guru-card--featured .guru-photo::after {
            border-color: rgba(255, 200, 0, 0.45);
        }

        .guru-card--featured .guru-name {
            font-size: 21px;
            min-height: 0;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            display: none;

            margin-top: 45px;
            padding: 55px 20px;

            background: white;

            border: 2px dashed #d6e0f0;
            border-radius: 18px;

            text-align: center;
        }

        .empty.show {
            display: block;
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

        .guru-grid > .reveal:nth-child(2),
        .kepala-grid > .reveal:nth-child(2) {
            transition-delay: 0.08s;
        }

        .guru-grid > .reveal:nth-child(3),
        .kepala-grid > .reveal:nth-child(3) {
            transition-delay: 0.16s;
        }

        .guru-grid > .reveal:nth-child(4) {
            transition-delay: 0.24s;
        }

        .guru-grid > .reveal:nth-child(5) {
            transition-delay: 0.32s;
        }

        .guru-grid > .reveal:nth-child(6) {
            transition-delay: 0.4s;
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

            .guru-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 12px;
            }

            .guru-photo {
                height: 150px;
            }

            .guru-card--featured .guru-photo {
                height: 200px;
            }

            .guru-name {
                font-size: 14px;
                min-height: 36px;
            }

            .kepala-grid {
                grid-template-columns: 1fr;
            }

            .section-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .toolbar {
                top: 10px;
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

    </style>
</head>

<body>

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

            <a href="{{ url('/guru') }}" class="active">Guru & Staff</a>

            <a href="{{ url('/fasilitas') }}">Fasilitas</a>

            <a href="{{ url('/prestasi') }}">Prestasi</a>

            <a href="{{ url('/galeri') }}">Galeri</a>

            <a href="{{ url('/bkk') }}">BKK</a>


            <a href="{{ url('/ppdb') }}">PPDB</a>

            <a href="{{ url('/kontak') }}">Kontak</a>

        </div>

        <a href="{{ url('/login') }}" class="login-btn">Login</a>

    </nav>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-crumb">
            Beranda &nbsp;·&nbsp; <b>Guru & Staff</b>
        </div>

        <span class="welcome-label">
            Tenaga Pendidik & Tenaga Kependidikan
        </span>

        <h1 class="hero-title">
            Guru & <span>Staff</span>
        </h1>

        <div class="hero-subtitle">
            SMK INFOKOM BOGOR
        </div>

        <p class="hero-description">
            Mengenal lebih dekat para pendidik dan tenaga kependidikan
            yang berdedikasi mencetak generasi unggul, berkarakter,
            dan siap menghadapi era digital.
        </p>

    </section>


    <!-- STATISTIK -->

    @php

        $kepalaSekolah = $gurus->filter(
            fn ($guru) => $guru->peran->contains('jenis', 'Kepala Sekolah')
        );

        $wakasek = $gurus->filter(
            fn ($guru) => $guru->peran->contains('jenis', 'Wakil Kepala Sekolah')
        );

        $koordinator = $gurus->filter(
            fn ($guru) => $guru->peran->contains(
                fn ($peran) => in_array($peran->jenis, ['Koordinator', 'Pembina / Koordinator'])
            )
        );

        $waliKelas = $gurus->filter(
            fn ($guru) => $guru->peran->contains('jenis', 'Wali Kelas')
        );

        $staff = $gurus->filter(
            fn ($guru) => $guru->peran->contains(
                fn ($peran) => in_array($peran->jenis, ['Staff', 'Staff Tata Usaha'])
            )
        );

        $guruMapel = $gurus->filter(
            fn ($guru) => $guru->peran->contains('jenis', 'Guru Mata Pelajaran')
        );

        $belumDikategorikan = $gurus->filter(fn ($guru) => $guru->peran->count() === 0);

    @endphp

    @if($gurus->count())

        <section class="stats">

            <div class="stat-item">

                <div class="stat-icon">👨‍🏫</div>

                <div>
                    <div class="stat-number">{{ $gurus->count() }}</div>
                    <div class="stat-label">Total Guru & Staff</div>
                    <div class="stat-small">Pendidik & Kependidikan</div>
                </div>

            </div>

            <div class="stat-item">

                <div class="stat-icon">🎖</div>

                <div>
                    <div class="stat-number">{{ $wakasek->count() }}</div>
                    <div class="stat-label">Wakil Kepala Sekolah</div>
                    <div class="stat-small">Jajaran Pimpinan</div>
                </div>

            </div>

            <div class="stat-item">

                <div class="stat-icon">🏫</div>

                <div>
                    <div class="stat-number">{{ $waliKelas->count() }}</div>
                    <div class="stat-label">Wali Kelas</div>
                    <div class="stat-small">Pendamping Tiap Kelas</div>
                </div>

            </div>

            <div class="stat-item">

                <div class="stat-icon">🗂</div>

                <div>
                    <div class="stat-number">{{ $staff->count() }}</div>
                    <div class="stat-label">Staff & TU</div>
                    <div class="stat-small">Administrasi Sekolah</div>
                </div>

            </div>

        </section>

    @endif


    <main class="container">


        <!-- TOOLBAR PENCARIAN -->

        @if($gurus->count())

            <div class="toolbar">

                <div class="search-box">

                    <span class="icon">🔍</span>

                    <input
                        type="text"
                        id="cariGuru"
                        placeholder="Cari nama guru atau staff..."
                        autocomplete="off"
                    >

                    <button type="button" class="search-clear" id="clearCari" title="Hapus pencarian">✕</button>

                </div>

                <div class="chips">

                    <a class="chip" href="#kepala-sekolah">Kepala Sekolah</a>
                    <a class="chip" href="#wakasek">Wakil Kepala Sekolah</a>
                    <a class="chip" href="#koordinator">Koordinator</a>
                    <a class="chip" href="#wali-kelas">Wali Kelas</a>
                    <a class="chip" href="#staff">Staff</a>
                    <a class="chip" href="#guru-mapel">Guru Mapel</a>

                </div>

            </div>

        @endif


        @if($gurus->count())


            {{-- =====================================================
                 1. KEPALA SEKOLAH
            ====================================================== --}}

            @if($kepalaSekolah->count())

                <section class="section" id="kepala-sekolah">

                    <div class="section-head">

                        <div>
                            <h2>Kepala Sekolah</h2>
                            <p class="section-desc">Pimpinan SMK INFOKOM Bogor</p>
                        </div>

                        <span class="count-pill">{{ $kepalaSekolah->count() }} Orang</span>

                    </div>

                    <div class="kepala-grid">

                        @foreach($kepalaSekolah as $guru)

                            @include('guru-card', [
                                'guru' => $guru,
                                'featured' => true,
                            ])

                        @endforeach

                    </div>

                </section>

            @endif


            {{-- =====================================================
                 2. WAKIL KEPALA SEKOLAH
            ====================================================== --}}

            @if($wakasek->count())

                <section class="section" id="wakasek">

                    <div class="section-head">

                        <div>
                            <h2>Wakil Kepala Sekolah</h2>
                            <p class="section-desc">Jajaran wakil kepala sekolah</p>
                        </div>

                        <span class="count-pill">{{ $wakasek->count() }} Orang</span>

                    </div>

                    <div class="guru-grid">

                        @foreach($wakasek as $guru)

                            @include('guru-card', ['guru' => $guru])

                        @endforeach

                    </div>

                </section>

            @endif


            {{-- =====================================================
                 3. KOORDINATOR
            ====================================================== --}}

            @if($koordinator->count())

                <section class="section" id="koordinator">

                    <div class="section-head">

                        <div>
                            <h2>Koordinator</h2>
                            <p class="section-desc">Koordinator kegiatan dan program sekolah</p>
                        </div>

                        <span class="count-pill">{{ $koordinator->count() }} Orang</span>

                    </div>

                    <div class="guru-grid">

                        @foreach($koordinator as $guru)

                            @include('guru-card', ['guru' => $guru])

                        @endforeach

                    </div>

                </section>

            @endif


            {{-- =====================================================
                 4. WALI KELAS
            ====================================================== --}}

            @if($waliKelas->count())

                <section class="section" id="wali-kelas">

                    <div class="section-head">

                        <div>
                            <h2>Wali Kelas</h2>
                            <p class="section-desc">Wali kelas setiap tingkat</p>
                        </div>

                        <span class="count-pill">{{ $waliKelas->count() }} Orang</span>

                    </div>

                    <div class="guru-grid">

                        @foreach($waliKelas as $guru)

                            @include('guru-card', ['guru' => $guru])

                        @endforeach

                    </div>

                </section>

            @endif


            {{-- =====================================================
                 5. STAFF
            ====================================================== --}}

            @if($staff->count())

                <section class="section" id="staff">

                    <div class="section-head">

                        <div>
                            <h2>Staff</h2>
                            <p class="section-desc">Tenaga kependidikan dan administrasi sekolah</p>
                        </div>

                        <span class="count-pill">{{ $staff->count() }} Orang</span>

                    </div>

                    <div class="guru-grid">

                        @foreach($staff as $guru)

                            @include('guru-card', ['guru' => $guru])

                        @endforeach

                    </div>

                </section>

            @endif


            {{-- =====================================================
                 6. GURU MATA PELAJARAN
            ====================================================== --}}

            @if($guruMapel->count())

                <section class="section" id="guru-mapel">

                    <div class="section-head">

                        <div>
                            <h2>Guru Mata Pelajaran</h2>
                            <p class="section-desc">Tenaga pendidik SMK INFOKOM Bogor</p>
                        </div>

                        <span class="count-pill">{{ $guruMapel->count() }} Orang</span>

                    </div>

                    <div class="guru-grid">

                        @foreach($guruMapel as $guru)

                            @include('guru-card', ['guru' => $guru])

                        @endforeach

                    </div>

                </section>

            @endif


            {{-- =====================================================
                 DATA YANG BELUM MEMILIKI PERAN
            ====================================================== --}}

            @if($belumDikategorikan->count())

                <section class="section" id="lainnya">

                    <div class="section-head">

                        <div>
                            <h2>Data Lainnya</h2>
                            <p class="section-desc">Data guru atau staff yang belum memiliki kategori</p>
                        </div>

                        <span class="count-pill">{{ $belumDikategorikan->count() }} Orang</span>

                    </div>

                    <div class="guru-grid">

                        @foreach($belumDikategorikan as $guru)

                            @include('guru-card', ['guru' => $guru])

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- HASIL PENCARIAN TIDAK DITEMUKAN -->

            <div class="empty" id="kosong">

                <div class="emoji">🔍</div>

                <h3>Tidak Ditemukan</h3>

                <p>
                    Data guru atau staff dengan nama tersebut tidak ada.
                    Coba kata kunci lain.
                </p>

            </div>


        @else

            <!-- BELUM ADA DATA GURU -->

            <div class="empty show" style="margin-top: 60px;">

                <div class="emoji">👤</div>

                <h3>Data Belum Tersedia</h3>

                <p>
                    Data guru dan staff belum tersedia saat ini.
                </p>

            </div>

        @endif

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
                    <li><a href="{{ url('/profil') }}">Profil</a></li>
                    <li><a href="{{{ url('/jurusan') }}}">Jurusan</a></li>
                    <li><a href="{{ url('/ppdb') }}">PPDB</a></li>
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

            var inputCari = document.getElementById('cariGuru');
            var tombolClear = document.getElementById('clearCari');
            var kotakKosong = document.getElementById('kosong');

            var semuaKartu = Array.prototype.slice.call(
                document.querySelectorAll('.guru-card')
            );

            var semuaSection = Array.prototype.slice.call(
                document.querySelectorAll('.section')
            );

            // ===== PENCARIAN =====

            function cari() {

                var kataKunci = (inputCari.value || '').trim().toLowerCase();
                var ditemukan = 0;

                tombolClear.classList.toggle('show', kataKunci.length > 0);

                semuaKartu.forEach(function (kartu) {

                    var cocok =
                        kataKunci === '' ||
                        (kartu.getAttribute('data-search') || '').indexOf(kataKunci) !== -1;

                    kartu.classList.toggle('is-hidden', !cocok);

                    if (cocok) {
                        ditemukan++;
                    }

                });

                semuaSection.forEach(function (section) {

                    var adaIsi = section.querySelectorAll('.guru-card:not(.is-hidden)').length > 0;

                    section.classList.toggle('is-hidden', !adaIsi);

                });

                if (kotakKosong) {
                    kotakKosong.classList.toggle('show', ditemukan === 0);
                }

            }

            if (inputCari) {

                inputCari.addEventListener('input', cari);

                tombolClear.addEventListener('click', function () {

                    inputCari.value = '';
                    cari();
                    inputCari.focus();

                });

            }

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

            // ===== PILIH KARTU (BINGKAI POP UP) =====

            document.querySelectorAll('.guru-card').forEach(function (kartu) {

                kartu.addEventListener('click', function () {

                    var sudahTerpilih = kartu.classList.contains('is-selected');

                    document.querySelectorAll('.guru-card.is-selected')
                        .forEach(function (lain) {
                            lain.classList.remove('is-selected');
                        });

                    if (!sudahTerpilih) {
                        kartu.classList.add('is-selected');
                    }

                });

            });

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
