<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMK INFOKOM BOGOR</title>

    <style>
        :root {
            --ease-halus: cubic-bezier(0.22, 1, 0.36, 1);
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

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           PROGRES SCROLL
        ========================= */

        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;

            width: 0%;
            height: 4px;

            background: linear-gradient(90deg, #ffd900, #0780df);

            border-radius: 0 4px 4px 0;

            z-index: 50;
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
            min-height: 430px;

            background:
                linear-gradient(
                    90deg,
                    rgba(0, 43, 100, 0.97) 0%,
                    rgba(0, 65, 140, 0.88) 42%,
                    rgba(0, 65, 140, 0.25) 100%
                ),
                url("{{ asset('images/gedung sekolah.jpeg') }}");

            background-size: cover;
            background-position: right center;

            color: white;

            display: flex;
            align-items: center;

            padding: 90px 10% 50px;
        }

        .hero-content {
            max-width: 560px;
        }

        .welcome-label {
            display: inline-block;
            background: #ffe000;
            color: #111;

            padding: 7px 20px;
            border-radius: 20px;

            font-size: 14px;
            font-weight: bold;

            margin-bottom: 10px;

            animation: masuk 0.8s var(--ease-halus) both;
        }

        /* kursor kedip untuk teks sambutan */

        .hero-title,
        .bogor,
        .hero-subtitle,
        .hero-description,
        .hero-buttons {
            animation: masuk 0.9s var(--ease-halus) both;
        }

        .bogor {
            animation-delay: 0.25s;
        }

        .hero-subtitle {
            animation-delay: 0.35s;
        }

        .hero-description {
            animation-delay: 0.45s;
        }

        .hero-buttons {
            animation-delay: 0.55s;
        }

        @keyframes masuk {
            from {
                opacity: 0;
                transform: translateY(34px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hero-title {
            font-size: clamp(42px, 5vw, 68px);
            font-weight: 900;
            line-height: 0.95;

            text-transform: uppercase;
            letter-spacing: -2px;

            animation: masuk 0.9s var(--ease-halus) 0.15s both;
        }

        /* kata INFOKOM dengan gradasi bergerak */

        .hero-title span {
            background: linear-gradient(
                120deg,
                #ffe000,
                #fff9c9,
                #ffe000
            );

            background-size: 200% auto;

            -webkit-background-clip: text;
            background-clip: text;

            -webkit-text-fill-color: transparent;
            color: transparent;

            animation: geser 3.5s linear infinite;
        }

        @keyframes geser {

            to {
                background-position: 200% center;
            }

        }

        .bogor {
            font-size: 35px;
            letter-spacing: 12px;
            margin-left: 115px;
            margin-top: 8px;
        }

        .hero-subtitle {
            margin-top: 12px;

            display: inline-block;

            border-top: 3px solid #ffe000;
            border-bottom: 3px solid #ffe000;

            padding: 7px 15px;

            letter-spacing: 5px;
            font-size: 14px;
        }

        .hero-description {
            margin-top: 15px;
            font-size: 15px;
            line-height: 1.5;
            font-style: italic;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-primary {
            background: #ffe000;
            color: #111;

            padding: 12px 22px;
            border-radius: 25px;

            font-weight: bold;

            box-shadow: 0 8px 22px rgba(255, 217, 0, 0.35);

            transition: 0.3s var(--ease-halus);

            position: relative;
            overflow: hidden;
        }

        /* kilau berjalan pada tombol utama */

        .btn-primary::after {
            content: "";

            position: absolute;
            top: 0;
            left: -80%;

            width: 45%;
            height: 100%;

            background: linear-gradient(
                100deg,
                transparent,
                rgba(255, 255, 255, 0.6),
                transparent
            );

            transform: skewX(-20deg);

            animation: btnKilau 3.2s ease-in-out infinite;
        }

        @keyframes btnKilau {

            0%,
            60% {
                left: -80%;
            }

            90%,
            100% {
                left: 140%;
            }

        }

        .btn-primary:hover {
            transform: translateY(-4px) scale(1.03);
        }

        .btn-secondary {
            border: 2px solid white;
            color: white;

            padding: 10px 22px;
            border-radius: 25px;

            font-weight: bold;

            transition: 0.3s var(--ease-halus);
        }

        .btn-secondary:hover {
            background: white;
            color: #0a3d80;

            transform: translateY(-4px);
        }

        /* =========================
           STATISTICS
        ========================= */

        .stats {
            position: relative;
            z-index: 3;

            margin: -35px auto 25px;

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

            padding: 10px 25px;

            border-right: 1px solid #ddd;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-icon {
            width: 55px;
            height: 55px;

            background: #e9f3ff;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;

            transition: transform 0.35s var(--ease-halus);
        }

        .stat-item:hover .stat-icon {
            transform: scale(1.14) rotate(-8deg);
        }

        .stat-number {
            font-size: 22px;
            font-weight: 900;
            color: #123b78;

            font-variant-numeric: tabular-nums;
        }

        .stat-label {
            font-size: 13px;
            color: #222;
            font-weight: bold;
        }

        .stat-small {
            font-size: 10px;
            color: #777;
            margin-top: 3px;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .container {
            width: 87%;
            margin: auto;
        }

        .section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 15px;
        }

        .section-title h2 {
            font-size: 20px;
            color: #123b78;
        }

        .section-title h2::after {
            content: "";
            display: block;

            width: 45px;
            height: 3px;

            background: #ffd900;

            margin-top: 5px;
        }

        .see-all {
            background: #1264cf;
            color: white;

            padding: 9px 17px;
            border-radius: 20px;

            font-size: 11px;
            font-weight: bold;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 3fr 1.2fr;
            gap: 25px;
        }

        /* =========================
           JURUSAN
        ========================= */

        .jurusan-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .jurusan-card {
            position: relative;

            background: white;
            border-radius: 14px;
            overflow: hidden;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);

            transition:
                transform 0.35s var(--ease-halus),
                box-shadow 0.35s ease;
        }

        /* garis gradasi warna khas tiap jurusan di atas kartu */

        .jurusan-card::before {
            content: "";

            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;

            background: var(--warna, #1264cf);

            z-index: 1;
        }

        .jurusan-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.14);
        }

        /* area logo jurusan */

        .jurusan-logo {
            height: 110px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                radial-gradient(
                    circle at 50% 115%,
                    var(--warna-soft, rgba(18, 100, 207, 0.14)) 0%,
                    transparent 60%
                ),
                linear-gradient(180deg, #f6faff, #ffffff);
        }

        .jurusan-badge {
            width: 64px;
            height: 64px;

            border-radius: 18px;

            background: var(--warna, #1264cf);
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;
            font-weight: 900;
            letter-spacing: 0.5px;

            box-shadow: 0 10px 20px var(--warna-shadow, rgba(18, 100, 207, 0.35));

            transition: transform 0.4s var(--ease-halus);
        }

        .jurusan-card:hover .jurusan-badge {
            transform: scale(1.14) rotate(-7deg);
        }

        .jurusan-content {
            padding: 12px 12px 14px;
        }

        .jurusan-content h3 {
            font-size: 14px;
            color: #143a72;
            margin-bottom: 5px;
        }

        .jurusan-content span {
            display: block;

            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.5px;
            text-transform: uppercase;

            color: var(--warna, #1264cf);

            margin-bottom: 6px;
        }

        .jurusan-content p {
            font-size: 11px;
            color: #777;
            line-height: 1.4;
            min-height: 45px;
        }

        .detail-btn {
            display: block;

            text-align: center;

            border: 1px solid var(--warna, #1264cf);
            color: var(--warna, #1264cf);

            border-radius: 15px;

            padding: 5px;

            font-size: 10px;
            font-weight: bold;

            margin-top: 8px;

            transition: 0.25s var(--ease-halus);
        }

        .jurusan-card:hover .detail-btn {
            background: var(--warna, #1264cf);
            color: white;
        }

        /* =========================
           BERITA
        ========================= */

        .news-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .news-card {
            background: white;
            border-radius: 10px;

            padding: 8px;

            display: flex;
            gap: 10px;

            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .news-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

        .news-card img {
            width: 105px;
            height: 65px;

            border-radius: 7px;
            object-fit: cover;
        }

        .news-card h4 {
            font-size: 12px;
            color: #123b78;
        }

        .news-card small {
            display: block;
            margin: 4px 0;

            font-size: 9px;
            color: #888;
        }

        .news-card p {
            font-size: 9px;
            color: #777;
        }

        /* =========================
           BOTTOM SECTION
        ========================= */

        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 0.75fr;

            gap: 15px;
            margin-top: 18px;
        }

        .info-card {
            background: white;
            border-radius: 13px;
            padding: 15px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }

        .info-card h3 {
            font-size: 15px;
            margin-bottom: 10px;
            color: #123b78;
        }

        .headmaster {
            display: flex;
            gap: 12px;
        }

        .headmaster img {
            width: 110px;
            height: 120px;

            object-fit: cover;
            border-radius: 8px;
        }

        .headmaster p {
            font-size: 11px;
            line-height: 1.5;
            color: #666;
        }

        .ppdb-card {
            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;
        }

        .ppdb-card h3 {
            color: white;
            font-size: 20px;
        }

        .ppdb-card p {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .ppdb-btn {
            display: inline-block;

            background: #ffe000;
            color: #111;

            padding: 8px 15px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: bold;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 5px;
        }

        /* =========================
           MARQUEE NILAI SEKOLAH
        ========================= */

        .nilai-strip {
            margin-top: 25px;

            background: #063d82;

            padding: 13px 0;

            overflow: hidden;
        }

        .nilai-track {
            display: flex;
            gap: 48px;

            width: max-content;

            animation: jalan 22s linear infinite;
        }

        .nilai-strip:hover .nilai-track {
            animation-play-state: paused;
        }

        .nilai-item {
            display: flex;
            align-items: center;
            gap: 48px;

            color: rgba(255, 255, 255, 0.9);

            font-size: 13px;
            font-weight: bold;
            letter-spacing: 4px;

            white-space: nowrap;
        }

        .nilai-item em {
            color: #ffe000;
            font-style: normal;
        }

        @keyframes jalan {

            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }

        }

        /* =========================
           ANIMASI REVEAL & COUNTER
        ========================= */

        .reveal {
            opacity: 0;
            transform: translateY(32px);

            transition:
                opacity 0.8s var(--ease-halus),
                transform 0.8s var(--ease-halus);
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        .jurusan-grid > .reveal:nth-child(2),
        .bottom-grid > .reveal:nth-child(2) {
            transition-delay: 0.1s;
        }

        .jurusan-grid > .reveal:nth-child(3),
        .bottom-grid > .reveal:nth-child(3) {
            transition-delay: 0.2s;
        }

        .jurusan-grid > .reveal:nth-child(4) {
            transition-delay: 0.3s;
        }

        /* varian lembut untuk judul section */

        .pop-soft {
            opacity: 0;
            transform: scale(0.86) translateY(24px);
        }

        .pop-soft.pop-in {
            animation: popupSoft 0.6s var(--ease-halus) forwards;
        }

        @keyframes popupSoft {

            0% {
                opacity: 0;
                transform: scale(0.86) translateY(24px);
            }

            70% {
                opacity: 1;
                transform: scale(1.02) translateY(-2px);
            }

            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }

        }

        /* keadaan akhir setelah animasi (agar hover tetap responsif) */

        .pop-done,
        .pop-soft.pop-done {
            opacity: 1;
            transform: none;
        }

        /* =========================
           ANIMASI POP UP (KARTU MELONCAT KELUAR)
        ========================= */

        .pop {
            opacity: 0;
            transform: scale(0.55) translateY(46px);
        }

        .pop.pop-in {
            animation: popup 0.75s var(--ease-halus) forwards;
        }

        @keyframes popup {

            0% {
                opacity: 0;
                transform: scale(0.55) translateY(46px);
            }

            60% {
                opacity: 1;
                transform: scale(1.06) translateY(-6px);
            }

            80% {
                transform: scale(0.97) translateY(2px);

            }

            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }

        }

        /* stagger antar kartu (bergelombang, bergantian) */

        .news-list .pop.pop-in:nth-child(2) {
            animation-delay: 0.12s;
        }

        .news-list .pop.pop-in:nth-child(3) {
            animation-delay: 0.24s;
        }

        .bottom-grid > .pop.pop-in:nth-child(2) {
        animation-delay: 0.15s;
        }

        .bottom-grid > .pop.pop-in:nth-child(3) {
            animation-delay: 0.3s;
        }

        /* galeri: tiap foto pop bergantian */

        .gallery .pop.pop-in {
            animation-duration: 0.65s;

            transform-origin: center bottom;
        }

        .gallery .pop.pop-in:nth-child(2) { animation-delay: 0.1s; }
        .gallery .pop.pop-in:nth-child(3) { animation-delay: 0.2s; }
        .gallery .pop.pop-in:nth-child(4) { animation-delay: 0.3s; }
        .gallery .pop.pop-in:nth-child(5) { animation-delay: 0.4s; }
        .gallery .pop.pop-in:nth-child(6) { animation-delay: 0.5s; }

        /* galeri: hover zoom + bayangan kuning */

        .gallery img:hover {
            transform: scale(1.12);

            box-shadow: 0 8px 20px rgba(255, 217, 0, 0.5);

            z-index: 2;
        }

        .gallery img {
            transition: transform 0.35s var(--ease-halus), box-shadow 0.35s ease;
        }

        @media (prefers-reduced-motion: reduce) {

            .reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }

            .hero-title span,
            .btn-primary::after,
            .nilai-track,
            .orb {
                animation: none;
            }

            .hero-canvas {
                display: none;
            }

            .stat-item::after {
                display: none;
            }

            .back-top {
                transition: none;
            }

            .pop,
            .pop.pop-in,
            .pop-soft.pop-in,
            .pop-done,
            .pop-soft.pop-done {
                opacity: 1;
                transform: none;
                animation: none;
            }

            html {
                scroll-behavior: auto;
            }

        }

        .gallery img {
            width: 100%;
            height: 65px;

            object-fit: cover;
            border-radius: 6px;
        }

        /* =========================
           TOMBOL KEMBALI KE ATAS
        ========================= */

        .back-top {
            position: fixed;
            right: 22px;
            bottom: 22px;

            width: 46px;
            height: 46px;

            border: none;
            border-radius: 50%;

            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;

            font-size: 18px;
            font-weight: bold;

            cursor: pointer;

            box-shadow: 0 8px 20px rgba(7, 82, 185, 0.4);

            opacity: 0;
            transform: translateY(16px) scale(0.85);
            pointer-events: none;

            transition:
                opacity 0.4s var(--ease-halus),
                transform 0.4s var(--ease-halus),
                box-shadow 0.3s;

            z-index: 40;
        }

        .back-top.muncul {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .back-top:hover {
            transform: translateY(-4px) scale(1.08);

            box-shadow: 0 12px 26px rgba(7, 82, 185, 0.55);
        }

        /* =========================
           ORB MELAYANG HERO
        ========================= */

        .hero-orbs {
            position: absolute;
            inset: 0;

            overflow: hidden;

            pointer-events: none;
        }

        /* =========================
           PARTICLE CANVAS HERO
        ========================= */

        .hero-canvas {
            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            pointer-events: none;

            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.25; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.35); }
        }

        .stat-item {
            position: relative;

            overflow: hidden;
        }

        .stat-item::after {
            content: "";

            position: absolute;
            top: 0;
            left: -70%;

            width: 45%;
            height: 100%;

            background: linear-gradient(100deg, transparent, rgba(255, 224, 0, 0.28), transparent);

            transform: skewX(-20deg);

            transition: left 0.7s var(--ease-halus);
        }

        .stat-item:hover::after {
            left: 130%;
        }

        /* kartu jurusan 3D tilt */

        .jurusan-card {
            transform-style: preserve-3d;

            will-change: transform;
        }

        .jurusan-badge::after {
            content: "";

            position: absolute;
            inset: -6px;

            border-radius: inherit;

            border: 2px dashed rgba(255, 255, 255, 0.55);

            opacity: 0;

            transition: opacity 0.35s var(--ease-halus), transform 0.6s var(--ease-halus);
        }

        .jurusan-card:hover .jurusan-badge::after {
            opacity: 1;

            transform: rotate(18deg);
        }

        .orb {
            position: absolute;

            border-radius: 50%;

            opacity: 0.35;

            filter: blur(2px);

            animation: apung 9s ease-in-out infinite;
        }

        .orb-1 {
            width: 130px;
            height: 130px;

            top: 18%;
            right: 14%;

            background: radial-gradient(circle at 30% 30%, rgba(255, 224, 0, 0.9), rgba(255, 224, 0, 0.05));

            animation-delay: 0s;
        }

        .orb-2 {
            width: 80px;
            height: 80px;

            top: 60%;
            right: 30%;

            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.03));

            animation-delay: 1.6s;
        }

        .orb-3 {
            width: 46px;
            height: 46px;

            top: 30%;
            right: 42%;

            background: radial-gradient(circle at 30% 30%, rgba(7, 128, 223, 0.9), rgba(7, 128, 223, 0.05));

            animation-delay: 3s;
        }

        @keyframes apung {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-26px) translateX(10px);
            }

        }

        /* =========================
           LOKASI / MAPS
        ========================= */

        .maps-section {
            margin-top: 18px;
        }

        .maps-card {
            display: grid;
            grid-template-columns: 2fr 1fr;

            background: white;
            border-radius: 13px;
            overflow: hidden;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }

        .maps-embed {
            height: 340px;
        }

        .maps-embed iframe {
            display: block;
            width: 100%;
            height: 100%;
        }

        .maps-info {
            padding: 24px 22px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .maps-info h3 {
            font-size: 16px;
            color: #123b78;

            margin-bottom: 12px;
        }

        .maps-info p {
            font-size: 12px;
            color: #555;

            line-height: 1.6;

            margin-bottom: 8px;
        }

        .maps-btn {
            display: inline-block;

            margin-top: 10px;

            background: #1264cf;
            color: white;

            padding: 10px 18px;
            border-radius: 20px;

            font-size: 11px;
            font-weight: bold;

            align-self: flex-start;

            transition: 0.2s;
        }

        .maps-btn:hover {
            background: #0a4da3;

            transform: translateY(-2px);
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #063d82;
            color: white;

            margin-top: 25px;
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

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.2);

            margin-top: 20px;
            padding-top: 10px;

            text-align: center;

            font-size: 9px;
            color: #b9d0ec;
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
            }

            .jurusan-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid,
            .bottom-grid {
                grid-template-columns: 1fr;
            }

            .maps-card {
                grid-template-columns: 1fr;
            }

            .maps-embed {
                height: 260px;
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
                padding: 110px 7% 60px;
            }

            .hero-title {
                font-size: 42px;
            }

            .bogor {
                margin-left: 0;
                font-size: 25px;
            }

            .hero-subtitle {
                font-size: 9px;
                letter-spacing: 2px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: flex-start;
            }

            .stats {
                width: 92%;
                grid-template-columns: 1fr;
            }

            .stat-item {
                border-bottom: 1px solid #ddd;
            }

            .jurusan-grid {
                grid-template-columns: 1fr;
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

        <div class="logo-area">

            <img src="{{ asset('images/logo-sekolah.jpg') }}" alt="Logo SMK INFOKOM">

<img class="smk-pk-badge" src="{{ asset('images/logo-smk-pk.jpg') }}" alt="SMK PK - Pusat Keunggulan">


            <div class="school-name">
                <h3>SMK INFOKOM BOGOR</h3>
                <p>SMK Informatika dan Telekomunikasi</p>
            </div>

        </div>

        <div class="nav-menu">


    <a href="{{ url('/') }}" class="active">⌂ &nbsp; Beranda</a>

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

   <a href="{{ url('/bkk') }}">BKK</a>


   <a href="{{ url('/ppdb') }}">PPDB</a>
   
   <a href="{{ url('/kontak') }}">Kontak</a>

</div>

        <a href="#" class="login-btn">Login</a>

    </nav>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-orbs">

            <canvas class="hero-canvas" id="heroParticles"></canvas>

            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>

        </div>

        <div class="hero-content">

            <span class="welcome-label">
                Selamat Datang di
            </span>

            <h1 class="hero-title">
                SMK <span>INFOKOM</span>
            </h1>

            <div class="bogor">
                BOGOR
            </div>

            <div class="hero-subtitle">
                SMK Informatika dan Telekomunikasi
            </div>

            <p class="hero-description">
                "Mewujudkan generasi yang unggul, berkarakter,
                kompeten di bidang teknologi, dan siap menghadapi dunia kerja."
            </p>

            <div class="hero-buttons">

                <a href="#" class="btn-primary">
                    Profil Sekolah →
                </a>

                <a href="{{ url('/ppdb') }}" class="btn-secondary">
                    PPDB 2025/2026
                </a>

            </div>

        </div>

    </section>


    <!-- STATISTICS -->

    <section class="stats">

        <div class="stat-item">

            <div class="stat-icon">👥</div>                <div>
                    <div class="stat-number" data-count="1200" data-suffix="+">0</div>
                    <div class="stat-label">Siswa Aktif</div>
                    <div class="stat-small">Generasi Penerus Bangsa</div>
                </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">▦</div>                <div>
                    <div class="stat-number" data-count="25" data-suffix="+">0</div>
                    <div class="stat-label">Fasilitas</div>
                    <div class="stat-small">Sarana & Prasarana — {{ $jumlahFasilitas }} terdata</div>
                </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">★</div>                <div>
                    <div class="stat-number" data-count="50" data-suffix="+">0</div>
                    <div class="stat-label">Prestasi</div>
                    <div class="stat-small">{{ $jumlahPrestasi }} prestasi terdata · Kota → Nasional</div>
                </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">▤</div>                <div>
                    <div class="stat-number" data-count="4" data-suffix="">0</div>
                    <div class="stat-label">Program Keahlian</div>
                    <div class="stat-small">Jurusan Unggulan</div>
                </div>

        </div>

    </section>


    <!-- STRIP NILAI SEKOLAH -->

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


    <!-- MAIN CONTENT -->

    <main class="container">

        <div class="content-grid">

            <!-- PROGRAM KEAHLIAN -->

            <section>

                <div class="section-title pop-soft">

                    <div>
                        <h2>Program Keahlian</h2>
                    </div>

                    <a href="#" class="see-all">
                        Lihat Semua →
                    </a>

                </div>

                <div class="jurusan-grid">

                    <div class="jurusan-card reveal" style="--warna: #2563eb; --warna-soft: rgba(37, 99, 235, 0.12); --warna-shadow: rgba(37, 99, 235, 0.35);">

                        <div class="jurusan-logo">

                            <div class="jurusan-badge">⌨</div>

                        </div>

                        <div class="jurusan-content">
                            <h3>RPL</h3>

                            <span>Rekayasa Perangkat Lunak</span>

                            <p>
                                Mempelajari pemrograman, web, mobile,
                                dan pengembangan aplikasi.
                            </p>

                            <a href="{{{ url('/jurusan') }}}" class="detail-btn">
                                Selengkapnya →
                            </a>
                        </div>

                    </div>


                    <div class="jurusan-card reveal" style="--warna: #0d9488; --warna-soft: rgba(13, 148, 136, 0.12); --warna-shadow: rgba(13, 148, 136, 0.35);">

                        <div class="jurusan-logo">

                            <div class="jurusan-badge">🌐</div>

                        </div>

                        <div class="jurusan-content">
                            <h3>TKJ</h3>

                            <span>Teknik Komputer & Jaringan</span>

                            <p>
                                Fokus pada jaringan komputer, server,
                                keamanan jaringan, dan troubleshooting.
                            </p>

                            <a href="{{{ url('/jurusan') }}}" class="detail-btn">
                                Selengkapnya →
                            </a>
                        </div>

                    </div>


                    <div class="jurusan-card reveal" style="--warna: #d97706; --warna-soft: rgba(217, 119, 6, 0.12); --warna-shadow: rgba(217, 119, 6, 0.35);">

                        <div class="jurusan-logo">

                            <div class="jurusan-badge">🎨</div>

                        </div>

                        <div class="jurusan-content">
                            <h3>DKV</h3>

                            <span>Desain Komunikasi Visual</span>

                            <p>
                                Mengembangkan kreativitas dalam desain
                                grafis, multimedia, dan fotografi.
                            </p>

                            <a href="{{{ url('/jurusan') }}}" class="detail-btn">
                                Selengkapnya →
                            </a>
                        </div>

                    </div>


                    <div class="jurusan-card reveal" style="--warna: #c026d3; --warna-soft: rgba(192, 38, 211, 0.12); --warna-shadow: rgba(192, 38, 211, 0.35);">

                        <div class="jurusan-logo">

                            <div class="jurusan-badge">🎬</div>

                        </div>

                        <div class="jurusan-content">
                            <h3>PSPT</h3>

                            <span>Siaran & Perfilman Terapan</span>

                            <p>
                                Pengembangan siaran, produksi video,
                                dan perfilman terapan.
                            </p>

                            <a href="{{{ url('/jurusan') }}}" class="detail-btn">
                                Selengkapnya →
                            </a>
                        </div>

                    </div>

                </div>
            </section>


            <!-- BERITA -->

            <section>

                <div class="section-title pop-soft">

                    <h2>Berita & Pengumuman</h2>

                    <a href="#" class="see-all">
                        Lihat Semua →
                    </a>

                </div>

                <div class="news-list">

                    @forelse($beritas as $berita)

                    <article class="news-card pop">

                        @if($berita->gambar && str_starts_with($berita->gambar, 'images/'))

                            <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">

                        @elseif($berita->gambar)

                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">

                        @else

                            <img src="{{ asset('images/logo-sekolah.jpg') }}" alt="{{ $berita->judul }}">

                        @endif

                        <div>

                            <h4>{{ $berita->judul }}</h4>

                            <small>{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('j F Y') }}</small>

                            <p>
                                {{ \Illuminate\Support\Str::limit($berita->isi, 80) }}
                            </p>

                        </div>

                    </article>

                    @empty

                    <article class="news-card pop">

                        <img src="{{ asset('images/logo-sekolah.jpg') }}" alt="Berita">

                        <div>

                            <h4>Belum ada berita</h4>

                            <small>—</small>

                            <p>Berita & pengumuman akan segera hadir.</p>

                        </div>

                    </article>

                    @endforelse

                </div>

            </section>

        </div>


        <!-- BOTTOM -->

        <div class="bottom-grid">

            <!-- KEPALA SEKOLAH -->

            <div class="info-card pop">

                <h3>Sambutan Kepala Sekolah</h3>

                <div class="headmaster">

                    <img
                        src="{{ asset('images/Kepala-Sekolah.jpeg') }}"
                        alt="Kepala Sekolah"
                    >

                    <p>
                        "Mari bersama-sama menciptakan lingkungan
                        belajar yang kondusif, inovatif, dan penuh
                        semangat untuk mewujudkan generasi yang
                        unggul di era digital dengan mengedepankan adab dan akhlak yang baik. menjadikan generasi emas yang bisa memajukan bangsa."
                        <br><br>

                        <strong>
                            ir.Hj.Liliek Rahmaningsih M.MPd
                        </strong>
                        <br>
                        Kepala SMK INFOKOM Bogor
                    </p>

                </div>

            </div>


            <!-- PPDB -->

            <div class="info-card ppdb-card pop">

                <h3>PPDB Tahun 2025/2026</h3>

                <p>
                    Penerimaan Peserta Didik Baru
                </p>

                <p>
                    <strong>TELAH DIBUKA!</strong>
                </p>

                <p>
                    Daftar sekarang dan jangan lewatkan
                    kesempatan bergabung bersama keluarga
                    besar SMK INFOKOM.
                </p>

                <a href="{{ url('/ppdb') }}" class="ppdb-btn">
                    Daftar Sekarang →
                </a>

            </div>


            <!-- GALERI -->

            <div class="info-card pop">

                <div class="section-title pop-soft">

                    <h3>Galeri Kegiatan</h3>

                    <a href="#" class="see-all">
                        Galeri →
                    </a>

                </div>

                <div class="gallery">

                    <img class="pop" src="{{ asset('images/Galeri-1.jpeg') }}" alt="">
                    <img class="pop" src="{{ asset('images/Galeri-2.jpeg') }}" alt="">
                    <img class="pop" src="{{ asset('images/Galeri-3.jpeg') }}" alt="">
                    <img class="pop" src="{{ asset('images/Galeri-4.jpeg') }}" alt="">
                    <img class="pop" src="{{ asset('images/Galeri-5.jpeg') }}" alt="">
                    <img class="pop" src="{{ asset('images/Galeri-6.jpeg') }}" alt="">

                </div>

            </div>

        </div>


        <!-- LOKASI / MAPS SEKOLAH -->

        <section class="maps-section">

            <div class="section-title pop-soft">

                <h2>Lokasi Sekolah</h2>

            </div>

            <div class="maps-card pop">

                <div class="maps-embed">

                    <iframe
                        src="https://www.google.com/maps?q=SMK%20Infokom%20Bogor&output=embed"
                        width="100%"
                        height="100%"
                        style="border: 0;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Peta Lokasi SMK INFOKOM Bogor"
                    ></iframe>

                </div>

                <div class="maps-info">

                    <h3>SMK INFOKOM Bogor</h3>

                    <p class="maps-alamat">
                        📍 Jl. Letjen Ibrahim Adjie No.178, Sindangbarang, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16117
                    </p>

                    <p class="maps-jam">
                        🕐 Senin–Jumat 07.00–17.00 · Sabtu 07.00–12.30
                    </p>

                    <p class="maps-telp">
                        ☎ 0251-8348-108 · 0878-7307-1400 (Humas)
                    </p>

                    <a
                        href="https://www.google.com/maps/search/?api=1&query=SMK+Infokom+Bogor"
                        target="_blank"
                        rel="noopener"
                        class="maps-btn"
                    >
                        Buka di Google Maps →
                    </a>

                </div>

            </div>

        </section>

    </main>


    <!-- PROGRES SCROLL & TOMBOL KE ATAS -->

    <div class="progress-bar" id="progressBar"></div>

    <button type="button" class="back-top" id="backTop" title="Kembali ke atas">↑</button>


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
                    <li>Beranda</li>
                    <li>Profil</li>
                    <li>Jurusan</li>
                    <li>PPDB</li>
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

            © 2025 SMK INFOKOM Bogor. All rights reserved.

        </div>

    </footer>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* ---------- REVEAL ON SCROLL ---------- */

            const revealEls = document.querySelectorAll('.reveal');

            const revealObserver = new IntersectionObserver(function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('in-view');

                        revealObserver.unobserve(entry.target);

                    }

                });

            }, { threshold: 0.12 });

            revealEls.forEach(function (el) {
                revealObserver.observe(el);
            });

            /* ---------- POP UP KARTU & FOTO ---------- */

            const popEls = document.querySelectorAll('.pop, .pop-soft');

            const popObserver = new IntersectionObserver(function (entries) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) return;

                    const target = entry.target;

                    target.classList.add('pop-in');

                    /* setelah animasi selesai, lepas class animasi
                       supaya hover transform tetap bisa jalan */

                    target.addEventListener('animationend', function () {

                        target.classList.remove('pop-in');
                        target.classList.add('pop-done');

                    }, { once: true });

                    popObserver.unobserve(target);

                });

            }, { threshold: 0.15 });

            popEls.forEach(function (el) {
                popObserver.observe(el);
            });

            /* ---------- COUNTER STATISTIK ---------- */

            const counters = document.querySelectorAll('.stat-number');

            const counterObserver = new IntersectionObserver(function (entries) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) return;

                    const el = entry.target;

                    const target = parseInt(el.dataset.count, 10) || 0;

                    const suffix = el.dataset.suffix || '';

                    const durasi = 1400;

                    const mulai = performance.now();

                    function tick(now) {

                        const p = Math.min((now - mulai) / durasi, 1);

                        const nilai = Math.floor(target * (1 - Math.pow(1 - p, 3)));

                        el.textContent = nilai.toLocaleString('id-ID') + suffix;

                        if (p < 1) requestAnimationFrame(tick);

                    }

                    requestAnimationFrame(tick);

                    counterObserver.unobserve(el);

                });

            }, { threshold: 0.4 });

            counters.forEach(function (el) {
                counterObserver.observe(el);
            });

            /* ---------- PARTICLE CANVAS HERO ---------- */

            const heroCanvas = document.getElementById('heroParticles');

            if (heroCanvas && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {

                const ctx = heroCanvas.getContext('2d');

                let partikel = [];

                function ukurCanvas() {
                    heroCanvas.width = heroCanvas.offsetWidth;
                    heroCanvas.height = heroCanvas.offsetHeight;
                }

                ukurCanvas();
                window.addEventListener('resize', ukurCanvas);

                const WARNA = ['255,224,0', '255,255,255', '135,206,255'];

                for (let i = 0; i < 55; i++) {
                    partikel.push({
                        x: Math.random() * heroCanvas.width,
                        y: Math.random() * heroCanvas.height,
                        r: Math.random() * 2.4 + 1,
                        vx: (Math.random() - 0.5) * 0.25,
                        vy: -(Math.random() * 0.3 + 0.08),
                        warna: WARNA[Math.floor(Math.random() * WARNA.length)],
                        alfa: Math.random() * 0.5 + 0.25,
                    });
                }

                function mengapung() {
                    ctx.clearRect(0, 0, heroCanvas.width, heroCanvas.height);

                    partikel.forEach(function (p) {
                        p.x += p.vx;
                        p.y += p.vy;

                        if (p.y < -10) { p.y = heroCanvas.height + 10; p.x = Math.random() * heroCanvas.width; }
                        if (p.x < -10) p.x = heroCanvas.width + 10;
                        if (p.x > heroCanvas.width + 10) p.x = -10;

                        ctx.beginPath();
                        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                        ctx.fillStyle = 'rgba(' + p.warna + ',' + p.alfa + ')';
                        ctx.fill();
                    });

                    requestAnimationFrame(mengapung);
                }

                mengapung();

            }

            /* ---------- PARALLAX HERO BACKGROUND ---------- */

            const heroPar = document.querySelector('.hero');

            if (heroPar && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {

                window.addEventListener('scroll', function () {

                    var y = window.scrollY || document.documentElement.scrollTop;

                    if (y < 900) {
                        heroPar.style.backgroundPosition = 'right calc(center + ' + (y * 0.25) + 'px)';
                    }

                }, { passive: true });

            }

            /* ---------- TILT 3D KARTU JURUSAN ---------- */

            document.querySelectorAll('.jurusan-card').forEach(function (card) {

                card.addEventListener('mousemove', function (e) {

                    var rect = card.getBoundingClientRect();

                    var x = (e.clientX - rect.left) / rect.width - 0.5;
                    var y = (e.clientY - rect.top) / rect.height - 0.5;

                    card.style.transform =
                        'translateY(-8px) perspective(700px) rotateX(' + (-y * 9) + 'deg) rotateY(' + (x * 11) + 'deg) scale(1.02)';

                });

                card.addEventListener('mouseleave', function () {
                    card.style.transform = '';
                });

            });

            /* ---------- PROGRES SCROLL ---------- */

            const progressBar = document.getElementById('progressBar');

            function updateProgress() {

                const doc = document.documentElement;

                const penuh = doc.scrollHeight - doc.clientHeight;

                const persen = penuh > 0 ? (doc.scrollTop / penuh) * 100 : 0;

                progressBar.style.width = persen + '%';

            }

            updateProgress();

            /* ---------- TOMBOL KEMBALI KE ATAS ---------- */

            const backTop = document.getElementById('backTop');

            function updateBackTop() {

                backTop.classList.toggle('muncul', docScrollY() > 400);

            }

            function docScrollY() {

                return window.scrollY || document.documentElement.scrollTop;

            }

            window.addEventListener('scroll', function () {

                updateProgress();
                updateBackTop();

            }, { passive: true });

            updateBackTop();

            backTop.addEventListener('click', function () {

                window.scrollTo({ top: 0, behavior: 'smooth' });

            });

        });

    </script>

</body>
</html>