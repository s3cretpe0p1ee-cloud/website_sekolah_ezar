<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak - SMK INFOKOM Bogor</title>

    <!-- CSS_GANTI_sample_start -->
    <style>
        :root {
            --ease-halus: cubic-bezier(0.22, 1, 0.36, 1);
            --navy: #123b78;
            --navy-tua: #063d82;
            --kuning: #ffe000;
            --biru: #1264cf;
        }

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
            overflow-x: hidden;
        }

        a { text-decoration: none; color: inherit; }

        .progress-bar { position: fixed; top: 0; left: 0; width: 0%; height: 4px; background: linear-gradient(90deg, #ffd900, #0780df); border-radius: 0 4px 4px 0; z-index: 50; }

        .navbar { position: absolute; top: 10px; left: 3.5%; right: 3.5%; z-index: 10; height: 58px; padding: 0 22px; background: white; border-radius: 35px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 5px 20px rgba(0,0,0,0.15); }
        .logo-area { display: flex; align-items: center; gap: 10px; }
        .logo-area img { width: 38px; height: 38px; object-fit: contain; }
        .school-name { line-height: 1.05; }
        .school-name h3 { font-size: 18px; color: #123c80; }
        .school-name p { font-size: 10px; color: #555; }
        .nav-menu { display: flex; align-items: center; gap: 13px; font-size: 12.5px; font-weight: bold; flex-wrap: nowrap; white-space: nowrap; }
        @media (max-width: 1280px) { .nav-menu { gap: 9px; font-size: 11.5px; } .navbar { left: 2.5%; right: 2.5%; } }
        @media (max-width: 1120px) { .nav-menu { gap: 6px; font-size: 10.5px; } .nav-menu .active { padding: 9px 12px; } .login-btn { padding: 9px 16px; } }
        .nav-menu a { color: #172d52; transition: 0.2s; }
        .nav-menu a:hover { color: #125dcc; }
        .nav-menu .active { background: #1264cf; color: white; padding: 10px 15px; border-radius: 25px; }
        .nav-dropdown { position: relative; }
        .nav-dropdown > a { cursor: pointer; display: inline-flex; align-items: center; gap: 4px; }
        .nav-dropdown > a .panah { font-size: 9px; transition: transform 0.3s var(--ease-halus); }
        .nav-dropdown:hover > a .panah { transform: rotate(180deg); }
        .nav-dropdown::after { content: ""; position: absolute; top: 100%; left: -10px; right: -10px; height: 18px; }
        .dropdown-menu { position: absolute; top: calc(100% + 12px); left: 50%; transform: translateX(-50%) translateY(10px); min-width: 200px; background: white; border-radius: 14px; box-shadow: 0 14px 34px rgba(16,43,92,0.22); padding: 8px; opacity: 0; visibility: hidden; transition: opacity 0.3s var(--ease-halus), transform 0.3s var(--ease-halus), visibility 0.3s; z-index: 30; }
        .nav-dropdown:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0); }
        .dropdown-menu a { display: block; padding: 10px 14px; border-radius: 9px; font-size: 12.5px; font-weight: bold; color: #33445f; white-space: nowrap; transition: 0.22s var(--ease-halus); }
        .dropdown-menu a:hover { background: #e9f3ff; color: var(--biru); transform: translateX(4px); }
        .login-btn { background: #ffd900; color: #111; padding: 10px 20px; border-radius: 25px; font-weight: bold; }

        .hero { position: relative; min-height: 400px; background: linear-gradient(90deg, rgba(0,43,100,0.97) 0%, rgba(0,65,140,0.9) 45%, rgba(0,65,140,0.55) 100%), url("{{ asset('images/gedung sekolah.jpeg') }}"); background-size: cover; background-position: center; color: white; display: flex; align-items: center; padding: 110px 10% 90px; overflow: hidden; }
        .hero-orbs { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
        .orb { position: absolute; border-radius: 50%; opacity: 0.35; filter: blur(2px); animation: apung 9s ease-in-out infinite; }
        .orb-1 { width: 120px; height: 120px; top: 18%; right: 12%; background: radial-gradient(circle at 30% 30%, rgba(255,224,0,0.9), rgba(255,224,0,0.05)); }
        .orb-2 { width: 74px; height: 74px; top: 58%; right: 27%; background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.8), rgba(255,255,255,0.03)); animation-delay: 1.6s; }
        .orb-3 { width: 44px; height: 44px; top: 28%; right: 40%; background: radial-gradient(circle at 30% 30%, rgba(7,128,223,0.9), rgba(7,128,223,0.05)); animation-delay: 3s; }
        @keyframes apung { 0%,100% { transform: translateY(0) translateX(0); } 50% { transform: translateY(-26px) translateX(10px); } }
        .hero-content { position: relative; z-index: 2; max-width: 640px; }
        .breadcrumb { font-size: 12px; letter-spacing: 1px; color: rgba(255,255,255,0.75); margin-bottom: 16px; animation: masuk 0.8s var(--ease-halus) both; }
        .breadcrumb b { color: var(--kuning); }
        .hero-label { display: inline-block; background: var(--kuning); color: #111; padding: 7px 20px; border-radius: 20px; font-size: 13px; font-weight: bold; margin-bottom: 12px; animation: masuk 0.8s var(--ease-halus) 0.1s both; }
        .hero-title { font-size: clamp(38px, 5vw, 62px); font-weight: 900; line-height: 0.98; text-transform: uppercase; letter-spacing: -1.5px; animation: masuk 0.9s var(--ease-halus) 0.2s both; }
        .hero-title span { background: linear-gradient(120deg, #ffe000, #fff9c9, #ffe000); background-size: 200% auto; -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; animation: geser 3.5s linear infinite; }
        @keyframes geser { to { background-position: 200% center; } }
        .hero-subtitle { margin-top: 14px; font-size: 15px; color: rgba(255,255,255,0.88); max-width: 520px; line-height: 1.6; animation: masuk 0.9s var(--ease-halus) 0.35s both; }
        @keyframes masuk { from { opacity: 0; transform: translateY(34px) scale(0.98); } to { opacity: 1; transform: translateY(0) scale(1); } }

        .kontak-wrap { position: relative; z-index: 3; width: 87%; margin: -55px auto 0; }
        .kontak-grid { display: grid; grid-template-columns: 1.05fr 1fr; gap: 22px; align-items: stretch; }
        .kartu-info { background: white; border-radius: 20px; padding: 30px 30px 24px; box-shadow: 0 5px 20px rgba(0,0,0,0.12); }
        .kartu-info h2 { font-size: 20px; color: var(--navy); margin-bottom: 6px; }
        .kartu-info > p { font-size: 12.5px; color: #6b7a95; margin-bottom: 20px; }
        .info-row { display: flex; align-items: flex-start; gap: 14px; padding: 13px 12px; border-radius: 14px; transition: background 0.25s var(--ease-halus), transform 0.25s var(--ease-halus); }
        .info-row:hover { background: #eaf3ff; transform: translateX(5px); }
        .info-icon { width: 46px; height: 46px; border-radius: 13px; background: linear-gradient(135deg, var(--warna, var(--biru)), var(--warna-2, var(--biru))); color: white; display: flex; align-items: center; justify-content: center; font-size: 21px; box-shadow: 0 8px 18px var(--warna-shadow, rgba(18,100,207,0.3)); flex-shrink: 0; transition: transform 0.4s var(--ease-halus); }
        .info-row:hover .info-icon { transform: rotate(-8deg) scale(1.1); }
        .info-row h4 { font-size: 14px; color: var(--navy); }
        .link-hilite { color: inherit; text-decoration: underline; text-decoration-color: rgba(18, 100, 207, 0.35); text-underline-offset: 3px; transition: 0.2s var(--ease-halus); }
        .info-row:hover .link-hilite { text-decoration-color: var(--warna, var(--biru)); }

        .info-row p { font-size: 12.5px; color: #5a6b85; margin-top: 3px; line-height: 1.55; }

        .jam-box { margin-top: 18px; background: #f4f8fd; border: 1px solid #e6edf7; border-radius: 16px; padding: 15px 18px; }
        .jam-box h4 { font-size: 13px; color: var(--navy); margin-bottom: 10px; }
        .jam-item { display: flex; justify-content: space-between; font-size: 12px; padding: 5px 0; border-bottom: 1px dashed #e0e8f5; }
        .jam-item:last-child { border-bottom: none; }
        .jam-item span:last-child { font-weight: bold; color: var(--biru); }

        .kartu-form { background: linear-gradient(150deg, #0752b9, #063d82); border-radius: 20px; padding: 30px; color: white; box-shadow: 0 14px 34px rgba(7,82,185,0.35); position: relative; overflow: hidden; }
        .kartu-form::before { content: ""; position: absolute; width: 190px; height: 190px; border-radius: 50%; background: rgba(255,255,255,0.07); top: -80px; right: -50px; }
        .kartu-form h2 { font-size: 20px; }
        .kartu-form > p { font-size: 12.5px; color: rgba(255,255,255,0.85); margin: 6px 0 18px; }
        .form-group { margin-bottom: 13px; position: relative; z-index: 1; }
        .form-group label { display: block; font-size: 11.5px; font-weight: bold; margin-bottom: 6px; color: rgba(255,255,255,0.92); }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 11px 14px; border: 1.5px solid rgba(255,255,255,0.25); border-radius: 11px; background: rgba(255,255,255,0.12); color: white; font-family: inherit; font-size: 13px; transition: 0.25s var(--ease-halus); outline: none; }
        .form-group textarea { min-height: 92px; resize: vertical; }
        .form-group select option { color: #102b5c; }
        .form-group input::placeholder, .form-group textarea::placeholder { color: rgba(255,255,255,0.55); }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { background: rgba(255,255,255,0.2); border-color: var(--kuning); box-shadow: 0 0 0 4px rgba(255,224,0,0.18); }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .btn-kirim { width: 100%; background: var(--kuning); color: #111; border: none; padding: 13px; border-radius: 13px; font-size: 14px; font-weight: 900; cursor: pointer; box-shadow: 0 8px 20px rgba(255,217,0,0.4); transition: 0.3s var(--ease-halus); position: relative; z-index: 1; }
        .btn-kirim:hover { transform: translateY(-3px) scale(1.02); }

        .toast { position: fixed; bottom: 26px; left: 50%; transform: translateX(-50%) translateY(80px); background: #16a34a; color: white; padding: 14px 26px; border-radius: 30px; font-size: 13.5px; font-weight: bold; box-shadow: 0 12px 30px rgba(0,0,0,0.3); opacity: 0; transition: 0.45s var(--ease-halus); z-index: 70; pointer-events: none; max-width: 88%; text-align: center; }
        .toast.muncul { opacity: 1; transform: translateX(-50%) translateY(0); }

        .maps-section { width: 87%; margin: 55px auto 0; }
        .section-title { margin-bottom: 6px; }
        .section-title .label { display: inline-block; background: var(--kuning); color: #111; padding: 6px 16px; border-radius: 18px; font-size: 12px; font-weight: bold; margin-bottom: 8px; }
        .section-title h2 { font-size: 24px; color: var(--navy); }
        .section-title p { font-size: 12.5px; color: #6b7a95; margin-top: 4px; }
        .maps-card { margin-top: 18px; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 28px rgba(16,43,92,0.14); position: relative; }
        .maps-badge { position: absolute; top: 14px; left: 14px; z-index: 2; background: white; padding: 9px 16px; border-radius: 12px; font-size: 12px; font-weight: bold; color: var(--navy); box-shadow: 0 4px 12px rgba(0,0,0,0.16); }
        .maps-card iframe { display: block; width: 100%; height: 380px; border: none; }

        .sosmed-grid { width: 87%; margin: 50px auto 0; display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
        .sosmed-card { background: white; border-radius: 18px; padding: 22px 20px; text-align: center; box-shadow: 0 4px 18px rgba(16,43,92,0.08); border-top: 4px solid transparent; transition: transform 0.35s var(--ease-halus), box-shadow 0.35s ease, border-color 0.35s; }
        .sosmed-card:hover { transform: translateY(-8px); border-color: var(--warna, var(--biru)); box-shadow: 0 18px 36px rgba(16,43,92,0.16); }
        .sosmed-icon { width: 54px; height: 54px; margin: 0 auto 12px; border-radius: 16px; background: linear-gradient(135deg, var(--warna, var(--biru)), var(--warna-2, var(--biru))); color: white; display: flex; align-items: center; justify-content: center; font-size: 24px; box-shadow: 0 10px 20px var(--warna-shadow, rgba(18,100,207,0.35)); transition: transform 0.4s var(--ease-halus); }
        .sosmed-card:hover .sosmed-icon { transform: rotate(-10deg) scale(1.14); }
        .sosmed-card h4 { font-size: 14px; color: var(--navy); }
        .sosmed-card p { font-size: 11px; color: #6b7a95; margin-top: 4px; word-break: break-all; }

        .faq-section { width: 87%; margin: 55px auto; }
        .faq-grid { margin-top: 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .faq-item { background: white; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 14px rgba(16,43,92,0.07); height: max-content; }
        .faq-q { width: 100%; background: none; border: none; display: flex; align-items: center; gap: 12px; padding: 16px 18px; font-family: inherit; font-size: 13.5px; font-weight: bold; color: var(--navy); text-align: left; cursor: pointer; transition: 0.25s; }
        .faq-q:hover { background: #f4f8fd; }
        .faq-q .tanya { width: 30px; height: 30px; flex-shrink: 0; border-radius: 9px; background: #e9f3ff; color: var(--biru); display: flex; align-items: center; justify-content: center; font-size: 15px; }
        .faq-q .chev { margin-left: auto; font-size: 11px; color: #93a1b8; transition: transform 0.35s var(--ease-halus); }
        .faq-item.open .faq-q .chev { transform: rotate(180deg); }
        .faq-a { max-height: 0; overflow: hidden; transition: max-height 0.45s var(--ease-halus); }
        .faq-a p { padding: 0 18px 16px 60px; font-size: 12.5px; color: #5a6b85; line-height: 1.7; }
        .faq-item.open .faq-a { max-height: 260px; }

        .cta-ppdb { width: 87%; margin: 0 auto 60px; background: linear-gradient(120deg, #0752b9, #0780df); border-radius: 22px; padding: 34px 8%; display: flex; align-items: center; justify-content: space-between; gap: 25px; color: white; position: relative; overflow: hidden; box-shadow: 0 14px 34px rgba(7,82,185,0.35); }
        .cta-ppdb::before, .cta-ppdb::after { content: ""; position: absolute; border-radius: 50%; background: rgba(255,255,255,0.09); }
        .cta-ppdb::before { width: 220px; height: 220px; top: -90px; right: -60px; }
        .cta-ppdb::after { width: 140px; height: 140px; bottom: -70px; right: 130px; }
        .cta-ppdb h3 { font-size: 22px; }
        .cta-ppdb p { margin-top: 6px; font-size: 13px; color: rgba(255,255,255,0.88); }
        .cta-btn { flex-shrink: 0; background: var(--kuning); color: #111; padding: 13px 26px; border-radius: 25px; font-size: 13px; font-weight: 900; box-shadow: 0 8px 20px rgba(255,217,0,0.4); transition: 0.3s var(--ease-halus); position: relative; z-index: 1; }
        .cta-btn:hover { transform: translateY(-4px) scale(1.04); }

        .nilai-strip { background: var(--navy-tua); padding: 13px 0; overflow: hidden; }
        .nilai-track { display: flex; gap: 48px; width: max-content; animation: jalan 22s linear infinite; }
        .nilai-strip:hover .nilai-track { animation-play-state: paused; }
        .nilai-item { display: flex; align-items: center; gap: 48px; color: rgba(255,255,255,0.9); font-size: 13px; font-weight: bold; letter-spacing: 4px; white-space: nowrap; }
        .nilai-item em { color: var(--kuning); font-style: normal; }
        @keyframes jalan { to { transform: translateX(-50%); } }

        .reveal { opacity: 0; transform: translateY(32px); transition: opacity 0.8s var(--ease-halus), transform 0.8s var(--ease-halus); }
        .reveal.in-view { opacity: 1; transform: translateY(0); }
        .pop { opacity: 0; transform: scale(0.55) translateY(46px); }
        .pop.pop-in { animation: popup 0.75s var(--ease-halus) forwards; animation-delay: var(--d, 0s); }
        @keyframes popup { 0% { opacity: 0; transform: scale(0.55) translateY(46px); } 60% { opacity: 1; transform: scale(1.06) translateY(-6px); } 80% { transform: scale(0.97) translateY(2px); } 100% { opacity: 1; transform: scale(1) translateY(0); } }
        .pop-done { opacity: 1; transform: none; }

        .back-top { position: fixed; right: 22px; bottom: 22px; width: 46px; height: 46px; border: none; border-radius: 50%; background: linear-gradient(120deg, #0752b9, #0780df); color: white; font-size: 18px; font-weight: bold; cursor: pointer; box-shadow: 0 8px 20px rgba(7,82,185,0.4); opacity: 0; transform: translateY(16px) scale(0.85); pointer-events: none; transition: opacity 0.4s var(--ease-halus), transform 0.4s var(--ease-halus), box-shadow 0.3s; z-index: 40; }
        .back-top.muncul { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
        .back-top:hover { transform: translateY(-4px) scale(1.08); box-shadow: 0 12px 26px rgba(7,82,185,0.55); }

        footer { background: var(--navy-tua); color: white; padding: 25px 7% 12px; }
        .footer-grid { display: grid; grid-template-columns: 1.3fr 1fr 1fr 1fr; gap: 30px; }
        footer h3 { font-size: 14px; margin-bottom: 10px; }
        footer p, footer li { font-size: 10px; color: #d9e7fa; line-height: 1.7; }
        footer ul { list-style: none; }
        footer ul a:hover { color: var(--kuning); }
        .copyright { border-top: 1px solid rgba(255,255,255,0.2); margin-top: 20px; padding-top: 10px; text-align: center; font-size: 9px; color: #b9d0ec; }

        @media (max-width: 1000px) { .nav-menu { display: none; } .kontak-grid { grid-template-columns: 1fr; } .sosmed-grid { grid-template-columns: repeat(2, 1fr); } .faq-grid { grid-template-columns: 1fr; } .cta-ppdb { flex-direction: column; text-align: center; } }
        @media (max-width: 600px) { .navbar { left: 3%; right: 3%; } .school-name h3 { font-size: 13px; } .school-name p { font-size: 8px; } .hero { padding: 110px 7% 70px; } .kontak-wrap { width: 92%; } .form-row { grid-template-columns: 1fr; } .maps-section, .sosmed-grid, .faq-section, .cta-ppdb { width: 92%; } .sosmed-grid { grid-template-columns: 1fr 1fr; } .footer-grid { grid-template-columns: 1fr 1fr; } }

        @media (prefers-reduced-motion: reduce) { .reveal, .pop, .pop.pop-in { opacity: 1; transform: none; animation: none; transition: none; } .hero-title span, .orb, .nilai-track, .info-icon, .sosmed-icon { animation: none; transition: none; } .back-top { transition: none; } html { scroll-behavior: auto; } }
    
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
<!-- CSS_GANTI_sample_end -->
</head>

<body>

    <!-- PROGRES SCROLL -->

    <div class="progress-bar" id="progressBar"></div>

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="logo-area">

            <img src="{{ asset('images/logo-sekolah.jpg') }}" alt="Logo SMK INFOKOM">

<img class="smk-pk-badge" src="{{ asset('images/logo-smk-pk.jpg') }}" alt="SMK PK - Pusat Keunggulan">


            <div class="school-name">
                <h3>SMK INFOKOM BOGOR</h3>
                <p>SMK Informatika dan Telekomunikasi</p>
            </div>

        </div>

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

                <a href="{{ url('/program-unggulan') }}">Program Unggulan <span class="panah">▾</span></a>

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

            <a href="{{ url('/bkk') }}">BKK</a>


            <a href="{{ url('/ppdb') }}">PPDB</a>

            <a href="{{ url('/kontak') }}" class="active">Kontak</a>

        </div>

        <a href="#" class="login-btn">Login</a>

    </nav>

    <!-- HERO -->

    <section class="hero">

        <div class="hero-orbs">

            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>

        </div>

        <div class="hero-content">

            <div class="breadcrumb">
                Beranda &nbsp;•&nbsp; <b>Kontak</b>
            </div>

            <span class="hero-label">
                Hubungi Kami
            </span>

            <h1 class="hero-title">
                KONTAK <span>KAMI</span>
            </h1>

            <p class="hero-subtitle">
                Ada pertanyaan tentang PPDB, jurusan, atau kerjasama industri?
                Tim kami siap membantu — hubungi lewat formulir, telepon, atau
                kunjungi langsung sekolah kami di Bogor.
            </p>

        </div>

    </section>

    <!-- KONTAK UTAMA: INFO + FORM -->

    <section class="kontak-wrap">

        <div class="kontak-grid">

            <!-- kartu info sekolah -->

            <div class="kartu-info reveal">

                <h2>📍 Sekretariat Sekolah</h2>
                <p>Silakan hubungi kami lewat kanal yang paling nyaman untukmu.</p>

                <div class="info-row" style="--warna: #2563eb; --warna-2: #60a5fa; --warna-shadow: rgba(37, 99, 235, 0.3);">
                    <div class="info-icon">🏫</div>
                    <div>
                        <h4>Alamat Sekolah</h4>
                        <p>Jl. Letjen Ibrahim Adjie No.178, RT.03/RW.03, Sindangbarang, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16117</p>
                    </div>
                </div>

                <div class="info-row" style="--warna: #d97706; --warna-2: #fbbf24; --warna-shadow: rgba(217, 119, 6, 0.3);">
                    <div class="info-icon">📞</div>
                    <div>
                        <h4>Telepon / WhatsApp</h4>
                        <p><a href="tel:02518348108" class="link-hilite">0251-8348-108</a><br><a href="https://wa.me/6287873071400" target="_blank" rel="noopener" class="link-hilite">0878-7307-1400 (Humas)</a></p>
                    </div>
                </div>

                <div class="info-row" style="--warna: #0d9488; --warna-2: #2dd4bf; --warna-shadow: rgba(13, 148, 136, 0.3);">
                    <div class="info-icon">✉️</div>
                    <div>
                        <h4>Email Resmi</h4>
                        <p><a href="mailto:smk.infokom@gmail.com" class="link-hilite">smk.infokom@gmail.com</a></p>
                    </div>
                </div>

                <div class="info-row" style="--warna: #7c3aed; --warna-2: #a78bfa; --warna-shadow: rgba(124, 58, 237, 0.3);">
                    <div class="info-icon">🌐</div>
                    <div>
                        <h4>Situs Web</h4>
                        <p>www.smkinfokom.sch.id</p>
                    </div>
                </div>

                <div class="jam-box">
                    <h4>🕐 Jam Operasional</h4>
                    <div class="jam-item"><span>Senin – Jumat</span><span>07.00 – 17.00</span></div>
                    <div class="jam-item"><span>Sabtu</span><span>07.00 – 12.30</span></div>
                    <div class="jam-item"><span>Minggu & Hari Libur</span><span>Tutup</span></div>
                </div>

            </div>

            <!-- form kontak -->

            <div class="kartu-form pop">

                <h2>✉️ Kirim Pesan</h2>
                <p>Isi formulir di bawah — pesanmu akan langsung ditindaklanjuti.</p>

                <form id="formKontak" novalidate>

                    <div class="form-row">

                        <div class="form-group">
                            <label for="nama">Nama Lengkap *</label>
                            <input type="text" id="nama" name="nama" placeholder="cth: Raka Pratama" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" placeholder="cth: raka@email.com" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="topik">Topik Pesan *</label>
                        <select id="topik" name="topik" required>
                            <option value="">— Pilih topik —</option>
                            <option value="ppdb">Pendaftaran PPDB</option>
                            <option value="jurusan">Informasi Jurusan</option>
                            <option value="kerjasama">Kerjasama Industri</option>
                            <option value="bkk">Lowongan Kerja (BKK)</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan *</label>
                        <textarea id="pesan" name="pesan" placeholder="Tulis pertanyaan atau pesanmu di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn-kirim" id="btnKirim">
                        🚀 Kirim Pesan Sekarang
                    </button>

                </form>

            </div>

        </div>

    </section>

    <!-- PETA -->

    <section class="maps-section">

        <div class="section-title reveal">

            <span class="label">🗺 Lokasi</span>

            <h2>Temukan Sekolah Kami</h2>

            <p>Klik peta untuk membuka Google Maps dan navigasi langsung ke lokasi.</p>

        </div>

        <div class="maps-card reveal">

            <div class="maps-badge">📍 SMK INFOKOM Bogor, Jawa Barat</div>

            <iframe
                src="https://www.google.com/maps?q=SMK%20INFOKOM%20Bogor&output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Lokasi SMK INFOKOM Bogor">
            </iframe>

        </div>

    </section>

    <!-- SOSIAL MEDIA -->

    <section class="sosmed-grid">

        <a href="https://wa.me/6287873071400" target="_blank" rel="noopener" class="sosmed-card pop" style="--warna: #16a34a; --warna-2: #4ade80; --warna-shadow: rgba(22, 163, 74, 0.35); --d: 0s;">
            <div class="sosmed-icon">💬</div>
            <h4>WhatsApp</h4>
            <p>0878-7307-1400 (Humas)</p>
        </a>

        <a href="https://www.instagram.com/smk.infokom_official" target="_blank" rel="noopener" class="sosmed-card pop" style="--warna: #e1306c; --warna-2: #f472b6; --warna-shadow: rgba(225, 48, 108, 0.35); --d: 0.1s;">
            <div class="sosmed-icon">📸</div>
            <h4>Instagram</h4>
            <p>@smk.infokom_official</p>
        </a>

        <a href="https://www.youtube.com/@smkinfokomkotabogor" target="_blank" rel="noopener" class="sosmed-card pop" style="--warna: #dc2626; --warna-2: #f87171; --warna-shadow: rgba(220, 38, 38, 0.35); --d: 0.2s;">
            <div class="sosmed-icon">▶️</div>
            <h4>YouTube</h4>
            <p>@smkinfokomkotabogor</p>
        </a>

        <a href="https://www.tiktok.com/@smk_infokom_kota_bogor" target="_blank" rel="noopener" class="sosmed-card pop" style="--warna: #1f1f1f; --warna-2: #565050; --warna-shadow: rgba(31, 31, 31, 0.25); --d: 0.3s;">
            <div class="sosmed-icon">🎵</div>
            <h4>TikTok</h4>
            <p>@smk_infokom_kota_bogor</p>
        </a>

    </section>

    <!-- FAQ -->

    <section class="faq-section">

        <div class="section-title reveal">

            <span class="label">❓ FAQ</span>

            <h2>Pertanyaan yang Sering Diajukan</h2>

        </div>

        <div class="faq-grid">

            <div class="faq-item reveal">
                <button type="button" class="faq-q">
                    <span class="tanya">🎓</span>
                    Bagaimana cara mendaftar PPDB?
                    <span class="chev">▼</span>
                </button>
                <div class="faq-a">
                    <p>
                        Kunjungi halaman PPDB di website ini, klik tombol
                        "Daftar Sekarang", isi formulir pendaftaran, lalu
                        datang ke sekolah untuk verifikasi berkas. Gelombang
                        pendaftaran dan jadwalnya tertera di halaman PPDB.
                    </p>
                </div>
            </div>

            <div class="faq-item reveal">
                <button type="button" class="faq-q">
                    <span class="tanya">🏢</span>
                    Apakah ada program PKL dan magang?
                    <span class="chev">▼</span>
                </button>
                <div class="faq-a">
                    <p>
                        Ya! Semua jurusan wajib mengikuti Praktik Kerja
                        Lapangan (PKL) di perusahaan mitra, sedangkan siswa
                        terpilih bisa mengikuti program magang
                        bersertifikat dengan peluang diangkat karyawan.
                        Lihat halaman Program Unggulan.
                    </p>
                </div>
            </div>

            <div class="faq-item reveal">
                <button type="button" class="faq-q">
                    <span class="tanya">📅</span>
                    Jam kunjungan ke sekolah kapan saja?
                    <span class="chev">▼</span>
                </button>
                <div class="faq-a">
                    <p>
                        Layanan informasi buka Senin–Jumat pukul 07.00–17.00
                        dan Sabtu 07.00–12.30. Dianjurkan menghubungi kami
                        dulu lewat WhatsApp agar petugas siap menerima.
                    </p>
                </div>
            </div>

            <div class="faq-item reveal">
                <button type="button" class="faq-q">
                    <span class="tanya">🤝</span>
                    Bagaimana perusahaan bisa bekerja sama?
                    <span class="chev">▼</span>
                </button>
                <div class="faq-a">
                    <p>
                        SMK INFOKOM SMK INFOKOM sangat terbuka untuk kerjasama industri,
                        kunjungan industri, magang, dan rekrutmen lulusan.
                        Kirim email ke smk.infokom@gmail.com atau isi
                        formulir di halaman ini dengan topik
                        "Kerjasama Industri".
                    </p>
                </div>
            </div>

        </div>

    </section>

    <!-- CTA PPDB -->

    <section class="cta-ppdb reveal">

        <div>
            <h3>Siap bergabung bersama kami?</h3>
            <p>
                Daftarkan dirimu di SMK INFOKOM Bogor dan mulai
                perjalananmu menuju masa depan digital.
            </p>
        </div>

        <a href="{{ url('/ppdb') }}" class="cta-btn">
            Daftar PPDB 2025/2026 →
        </a>

    </section>

    <!-- MARQUEE NILAI -->

    <div class="nilai-strip">

        <div class="nilai-track">

            <span class="nilai-item">
                DISIPLIN <em>•</em> KREATIF <em>•</em> INOVATIF <em>•</em>
                RELIGIUS <em>•</em> KOMPETEN <em>•</em> BERKARAKTER <em>•</em>
            </span>

            <span class="nilai-item">
                DISIPLIN <em>•</em> KREATIF <em>•</em> INOVATIF <em>•</em>
                RELIGIUS <em>•</em> KOMPETEN <em>•</em> BERKARAKTER <em>•</em>
            </span>

        </div>

    </div>

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
                    <li><a href="{{ url('/program-unggulan') }}">Program Unggulan</a></li>
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

    <!-- TOAST -->

    <div class="toast" id="toast">✅ Pesanmu berhasil dikirim! Kami akan segera merespons.</div>

        <script>
        (function () {

            'use strict';

            /* ---------- REVEAL & POP ON SCROLL ---------- */

            if ('IntersectionObserver' in window) {

                var pengamat = new IntersectionObserver(function (entries) {

                    entries.forEach(function (entry) {

                        if (!entry.isIntersecting) return;

                        var el = entry.target;

                        el.classList.add('in-view');

                        if (el.classList.contains('pop')) {

                            el.classList.add('pop-in');

                            el.addEventListener('animationend', function () {

                                el.classList.remove('pop-in');
                                el.classList.add('pop-done');

                            }, { once: true });

                        }

                        pengamat.unobserve(el);

                    });

                }, { threshold: 0.08 });

                document.querySelectorAll('.reveal, .pop').forEach(function (el) {
                    pengamat.observe(el);
                });

            } else {

                document.querySelectorAll('.reveal').forEach(function (el) {
                    el.classList.add('in-view');
                });

                document.querySelectorAll('.pop').forEach(function (el) {
                    el.classList.add('pop-done');
                });

            }

            /* ---------- FORM KONTAK + TOAST ---------- */

            var form = document.getElementById('formKontak');

            var toast = document.getElementById('toast');

            var btn = document.getElementById('btnKirim');

            function tampilkanToast(pesan) {

                toast.textContent = pesan;

                toast.classList.add('muncul');

                setTimeout(function () {
                    toast.classList.remove('muncul');
                }, 3400);

            }

            if (form) {

                form.addEventListener('submit', function (e) {

                    e.preventDefault();

                    var nama = document.getElementById('nama').value.trim();
                    var email = document.getElementById('email').value.trim();
                    var topik = document.getElementById('topik').value;
                    var pesan = document.getElementById('pesan').value.trim();

                    if (!nama || !email || !topik || !pesan) {
                        tampilkanToast('⚠️ Lengkapi semua kolom bertanda * dulu ya!');
                        return;
                    }

                    var validEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

                    if (!validEmail) {
                        tampilkanToast('⚠️ Format email belum benar!');
                        return;
                    }

                    btn.textContent = '⏳ Mengirim...';

                    btn.disabled = true;

                    setTimeout(function () {

                        tampilkanToast(
                            '✅ Terima kasih, ' + nama.split(' ')[0] +
                            '! Pesanmu sudah kami terima dan akan segera direspons.'
                        );

                        form.reset();

                        btn.textContent = '🚀 Kirim Pesan Sekarang';
                        btn.disabled = false;

                    }, 900);

                });

            }

            /* ---------- FAQ ACCORDION ---------- */

            document.querySelectorAll('.faq-q').forEach(function (btn) {

                btn.addEventListener('click', function () {

                    var item = btn.closest('.faq-item');

                    var buka = item.classList.contains('open');

                    document.querySelectorAll('.faq-item.open').forEach(function (el) {
                        el.classList.remove('open');
                    });

                    if (!buka) {
                        item.classList.add('open');
                    }

                });

            });

            /* ---------- PROGRES SCROLL & BACK TOP ---------- */

            var progressBar = document.getElementById('progressBar');

            var backTop = document.getElementById('backTop');

            function updateScroll() {

                var doc = document.documentElement;

                var penuh = doc.scrollHeight - doc.clientHeight;

                var persen = penuh > 0 ? (doc.scrollTop / penuh) * 100 : 0;

                if (progressBar) {
                    progressBar.style.width = persen + '%';
                }

                backTop.classList.toggle('muncul', (window.scrollY || doc.scrollTop) > 400);

            }

            window.addEventListener('scroll', updateScroll, { passive: true });

            updateScroll();

            backTop.addEventListener('click', function () {

                window.scrollTo({ top: 0, behavior: 'smooth' });

            });

        })();
    </script>

</body>

</html>