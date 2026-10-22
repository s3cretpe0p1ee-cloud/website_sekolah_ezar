<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fasilitas - SMK INFOKOM Bogor</title>

    <style>
        :root {
            --ease-halus: cubic-bezier(0.22, 1, 0.36, 1);
            --navy: #123b78;
            --navy-tua: #063d82;
            --kuning: #ffe000;
            --biru: #1264cf;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

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

        .stats-strip { position: relative; z-index: 3; width: 87%; margin: -55px auto 0; display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
        .stat-card { background: white; border-radius: 18px; padding: 22px 20px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.12); transition: transform 0.35s var(--ease-halus), box-shadow 0.35s; }
        .stat-card:hover { transform: translateY(-6px); box-shadow: 0 18px 36px rgba(16,43,92,0.16); }
        .stat-card .angka { font-size: 30px; font-weight: 900; color: var(--biru); }
        .stat-card .ket { margin-top: 4px; font-size: 11.5px; color: #6b7a95; font-weight: bold; }

        .fasilitas-section { width: 87%; margin: 70px auto 40px; }
        .section-title { text-align: center; margin-bottom: 6px; }
        .section-title .label { display: inline-block; background: var(--kuning); color: #111; padding: 6px 16px; border-radius: 18px; font-size: 12px; font-weight: bold; margin-bottom: 10px; }
        .section-title h2 { font-size: 26px; color: var(--navy); }
        .section-title p { font-size: 12.5px; color: #6b7a95; margin-top: 6px; }

        .fasilitas-grid { margin-top: 34px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
        .f-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 6px 22px rgba(16,43,92,0.1); display: flex; flex-direction: column; transition: transform 0.4s var(--ease-halus), box-shadow 0.4s var(--ease-halus); }
        .f-card:hover { transform: translateY(-10px); box-shadow: 0 22px 44px rgba(16,43,92,0.2); }
        .f-foto { position: relative; height: 190px; overflow: hidden; background: #e5edf8; }
        .f-foto img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s var(--ease-halus), filter 0.4s; }
        .f-card:hover .f-foto img { transform: scale(1.09); filter: brightness(0.92); }
        .f-tag { position: absolute; top: 12px; left: 12px; background: rgba(255,255,255,0.95); color: var(--navy); padding: 6px 13px; border-radius: 20px; font-size: 10.5px; font-weight: bold; box-shadow: 0 4px 12px rgba(0,0,0,0.18); }
        .f-ikon { position: absolute; bottom: -24px; right: 16px; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, var(--warna, var(--biru)), var(--warna-2, #0780df)); color: white; display: flex; align-items: center; justify-content: center; font-size: 25px; box-shadow: 0 10px 22px rgba(16,43,92,0.35); border: 3px solid white; transition: transform 0.4s var(--ease-halus); z-index: 2; }
        .f-card:hover .f-ikon { transform: rotate(-9deg) scale(1.13); }
        .f-body { padding: 26px 22px 22px; flex: 1; display: flex; flex-direction: column; }
        .f-body h3 { font-size: 16.5px; color: var(--navy); margin-bottom: 8px; }
        .f-body p { font-size: 12.5px; color: #5a6b85; line-height: 1.65; flex: 1; }
        .f-strip { margin-top: 16px; height: 4px; border-radius: 4px; background: #edf2fa; overflow: hidden; }
        .f-strip i { display: block; height: 100%; width: 0%; border-radius: 4px; background: linear-gradient(90deg, var(--warna, var(--biru)), var(--warna-2, #0780df)); transition: width 1.2s var(--ease-halus) 0.2s; }
        .f-card.in-view .f-strip i { width: var(--persen, 80%); }

        .cta-ppdb { width: 87%; margin: 30px auto 60px; background: linear-gradient(120deg, #0752b9, #0780df); border-radius: 22px; padding: 34px 8%; display: flex; align-items: center; justify-content: space-between; gap: 25px; color: white; position: relative; overflow: hidden; box-shadow: 0 14px 34px rgba(7,82,185,0.35); }
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

        @media (max-width: 1000px) { .nav-menu { display: none; } .fasilitas-grid { grid-template-columns: 1fr 1fr; } .stats-strip { grid-template-columns: repeat(2, 1fr); } .cta-ppdb { flex-direction: column; text-align: center; } }
        @media (max-width: 600px) { .navbar { left: 3%; right: 3%; } .school-name h3 { font-size: 13px; } .school-name p { font-size: 8px; } .hero { padding: 110px 7% 70px; } .fasilitas-section, .stats-strip, .cta-ppdb { width: 92%; } .fasilitas-grid { grid-template-columns: 1fr; } .footer-grid { grid-template-columns: 1fr 1fr; } }

        @media (prefers-reduced-motion: reduce) { .reveal, .pop, .pop.pop-in { opacity: 1; transform: none; animation: none; transition: none; } .hero-title span, .orb, .nilai-track, .f-foto img, .f-ikon { animation: none; transition: none; } .back-top { transition: none; } html { scroll-behavior: auto; } }

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

            <a href="{{ url('/fasilitas') }}" class="active">Fasilitas</a>

            <a href="{{ url('/prestasi') }}">Prestasi</a>

            <a href="{{ url('/galeri') }}">Galeri</a>

            <a href="{{ url('/bkk') }}">BKK</a>

            <a href="{{ url('/ppdb') }}">PPDB</a>

            <a href="{{ url('/kontak') }}">Kontak</a>

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

            <div class="breadcrumb">Beranda &nbsp;·&nbsp; <b>Fasilitas</b></div>

            <div class="hero-label">🏫 Sarana & Prasarana</div>

            <h1 class="hero-title">
                FASILITAS <span>SEKOLAH</span>
            </h1>

            <p class="hero-subtitle">
                Sarana prasarana modern untuk mendukung pembelajaran kejuruan yang nyaman,
                aman, dan berkualitas.
            </p>

        </div>

    </section>

    <!-- STATISTIK -->

    <section class="stats-strip">

        <div class="stat-card pop">
            <div class="angka" data-count="{{ $fasilitas->count() }}">0</div>
            <div class="ket">Total Fasilitas</div>
        </div>

        <div class="stat-card pop">
            <div class="angka" data-count="4">0</div>
            <div class="ket">Lab Kejuruan</div>
        </div>

        <div class="stat-card pop">
            <div class="angka" data-count="100">0</div>
            <div class="ket">Koneksi WiFi (%)</div>
        </div>

        <div class="stat-card pop">
            <div class="angka" data-count="8">0</div>
            <div class="ket">Jam Buka / Hari</div>
        </div>

    </section>

    <!-- GRID FASILITAS -->

    <section class="fasilitas-section">

        <div class="section-title">

            <div class="label">✨ Fasilitas Kami</div>

            <h2 class="reveal">Belajar Nyaman, Masa Depan Terbuka</h2>

            <p class="reveal">Setiap fasilitas dirancang agar siswa bisa belajar, berkarya, dan tumbuh secara optimal.</p>

        </div>

        <div class="fasilitas-grid">

            @php
                $palet = [
                    ['ikon' => '⌨', 'warna' => '#2563eb', 'warna2' => '#60a5fa'],
                    ['ikon' => '🌐', 'warna' => '#0891b2', 'warna2' => '#22d3ee'],
                    ['ikon' => '🎨', 'warna' => '#a855f7', 'warna2' => '#d8b4fe'],
                    ['ikon' => '🎬', 'warna' => '#c026d3', 'warna2' => '#f0abfc'],
                    ['ikon' => '📚', 'warna' => '#16a34a', 'warna2' => '#86efac'],
                    ['ikon' => '⚽', 'warna' => '#ea580c', 'warna2' => '#fdba74'],
                    ['ikon' => '🕌', 'warna' => '#059669', 'warna2' => '#6ee7b7'],
                    ['ikon' => '🍱', 'warna' => '#f59e0b', 'warna2' => '#fde68a'],
                    ['ikon' => '⚕️', 'warna' => '#dc2626', 'warna2' => '#fca5a5'],
                ];
            @endphp

            @foreach ($fasilitas as $i => $item)
                @php $p = $palet[$i % count($palet)]; @endphp

                <div class="f-card pop" style="--warna: {{ $p['warna'] }}; --warna-2: {{ $p['warna2'] }}; --persen: 90%;">

                    <div class="f-foto">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                        @else
                            <img src="{{ asset('images/' . $item->nama . '.jpeg') }}" alt="{{ $item->nama }}"
                                onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, {{ $p['warna'] }}, {{ $p['warna2'] }})';">
                        @endif
                        <span class="f-tag">FASILITAS</span>
                        <div class="f-ikon">{{ $p['ikon'] }}</div>
                    </div>

                    <div class="f-body">
                        <h3>{{ $item->nama }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                        <div class="f-strip"><i></i></div>
                    </div>

                </div>
            @endforeach

        </div>

    </section>

    <!-- CTA PPDB -->

    <section class="cta-ppdb">

        <div>
            <h3>Yuk, Daftar ke SMK INFOKOM Bogor!</h3>
            <p>Jadilah bagian dari generasi digital & kreatif bersama kami — PPDB kini dibuka.</p>
        </div>

        <a href="{{ url('/ppdb') }}" class="cta-btn">Daftar Sekarang →</a>

    </section>

    <!-- MARQUEE -->

    <div class="nilai-strip">

        <div class="nilai-track">
            <div class="nilai-item">DISIPLIN <em>✦</em> KREATIF <em>✦</em> PROFESIONAL <em>✦</em> RELIGIUS <em>✦</em> INOVATIF <em>✦</em></div>
            <div class="nilai-item">DISIPLIN <em>✦</em> KREATIF <em>✦</em> PROFESIONAL <em>✦</em> RELIGIUS <em>✦</em> INOVATIF <em>✦</em></div>
        </div>

    </div>

    <!-- FOOTER -->

    <footer>

        <div class="footer-grid">

            <div>
                <h3>SMK INFOKOM BOGOR</h3>
                <p>SMK Informatika dan Telekomunikasi — sekolah kejuruan modern yang membentuk generasi digital & kreatif.</p>
            </div>

            <div>
                <h3>Menu Cepat</h3>
                <ul>
                    <li><a href="{{ url('/profil') }}">Profil</a></li>
                    <li><a href="{{ url('/jurusan') }}">Jurusan</a></li>
                    <li><a href="{{ url('/ppdb') }}">PPDB</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3>Kontak</h3>
                <p>
                    Jl. Letjen Ibrahim Adjie No.178, Sindangbarang, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16117
                </p>
                <p>
                    Telp: 0251-8348-108 · Email: smk.infokom@gmail.com
                </p>
            </div>

            <div>
                <h3>Ikuti Kami</h3>
                <ul>
                    <li><a href="https://instagram.com/smk.infokom_official" target="_blank">Instagram</a></li>
                    <li><a href="https://youtube.com/@smkinfokomkotabogor" target="_blank">YouTube</a></li>
                    <li><a href="https://tiktok.com/@smk_infokom_kota_bogor" target="_blank">TikTok</a></li>
                </ul>
            </div>

        </div>

        <div class="copyright">
            © 2026 SMK INFOKOM Bogor. Semua Hak Dilindungi.
        </div>

    </footer>

    <!-- BACK TOP -->

    <button class="back-top" id="backTop">↑</button>

    <script>
        // ===== PROGRES SCROLL =====

        const progressBar = document.getElementById('progressBar');
        const backTop = document.getElementById('backTop');

        window.addEventListener('scroll', () => {
            const total = document.documentElement.scrollHeight - innerHeight;
            progressBar.style.width = (scrollY / total * 100) + '%';

            backTop.classList.toggle('muncul', scrollY > 400);
        });

        backTop.addEventListener('click', () => scrollTo({ top: 0, behavior: 'smooth' }));

        // ===== POP ANIMATION =====

        const popObs = new IntersectionObserver(entries => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    e.target.style.setProperty('--d', (i * 0.08) + 's');
                    e.target.classList.add('pop-in');
                    popObs.unobserve(e.target);
                    e.target.addEventListener('animationend', () => e.target.classList.add('pop-done'), { once: true });
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.pop').forEach(el => popObs.observe(el));

        // ===== REVEAL =====

        const revObs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('in-view');
                    revObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal').forEach(el => revObs.observe(el));

        // ===== COUNTER =====

        const countObs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (!e.isIntersecting) return;
                const el = e.target;
                const target = +el.dataset.count;
                let cur = 0;
                const step = Math.max(1, Math.ceil(target / 40));

                const tick = () => {
                    cur = Math.min(target, cur + step);
                    el.textContent = cur;
                    if (cur < target) requestAnimationFrame(tick);
                };
                tick();

                countObs.unobserve(el);
            });
        }, { threshold: 0.4 });

        document.querySelectorAll('.angka[data-count]').forEach(el => countObs.observe(el));

        // ===== STRIP PROGRESS =====

        const stripObs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('in-view');
                    stripObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.3 });

        document.querySelectorAll('.f-card').forEach(el => stripObs.observe(el));
    </script>

</body>

</html>