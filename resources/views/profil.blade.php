<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Sekolah - SMK INFOKOM Bogor</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --ease-halus: cubic-bezier(0.22, 1, 0.36, 1);
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

            animation: turun 0.8s var(--ease-halus) both;
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
            position: relative;

            background:
                linear-gradient(
                    100deg,
                    rgba(0, 43, 100, 0.97) 0%,
                    rgba(0, 65, 140, 0.88) 45%,
                    rgba(0, 65, 140, 0.4) 100%
                ),
                url("{{ asset('images/gedung sekolah.jpeg') }}");

            background-size: cover;
            background-position: right center;

            color: white;

            padding: 150px 10% 110px;

            overflow: hidden;
        }

        /* ornamen lingkaran bergerak di hero */

        .hero .orb {
            position: absolute;

            border-radius: 50%;

            animation: melayang 7s ease-in-out infinite;

            transition: translate 0.4s var(--ease-halus);
        }

        .hero .orb-1 {
            width: 220px;
            height: 220px;

            right: 8%;
            top: 12%;

            background: radial-gradient(
                circle,
                rgba(255, 224, 0, 0.18),
                transparent 65%
            );
        }

        .hero .orb-2 {
            width: 140px;
            height: 140px;

            right: 26%;
            bottom: 8%;

            border: 2px solid rgba(255, 255, 255, 0.18);

            animation-delay: 1.6s;
        }

        .hero .orb-3 {
            width: 70px;
            height: 70px;

            right: 16%;
            bottom: 30%;

            background: rgba(255, 255, 255, 0.1);

            animation-delay: 3s;
        }

        @keyframes melayang {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-22px);
            }

        }

        .hero-crumb {
            font-size: 12px;
            letter-spacing: 1px;
            color: #cfe2fb;
            margin-bottom: 14px;

            animation: masuk 0.9s var(--ease-halus) both;
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

            animation: masuk 0.9s var(--ease-halus) 0.1s both;
        }

        .hero-title {
            font-size: clamp(38px, 5vw, 60px);
            font-weight: 900;
            line-height: 1;

            text-transform: uppercase;
            letter-spacing: -1px;

            animation: masuk 0.9s var(--ease-halus) 0.2s both;
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

            animation: masuk 0.9s var(--ease-halus) 0.3s both;
        }

        .hero-description {
            margin-top: 16px;
            max-width: 540px;

            font-size: 14px;
            line-height: 1.65;
            color: #dbe8fb;

            animation: masuk 0.9s var(--ease-halus) 0.4s both;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;

            margin-top: 22px;

            animation: masuk 0.9s var(--ease-halus) 0.5s both;
        }

        .btn-gold {
            background: #ffe000;
            color: #111;

            padding: 12px 24px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;

            box-shadow: 0 8px 18px rgba(255, 217, 0, 0.35);

            transition: 0.25s;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
        }

        .btn-ghost {
            border: 2px solid rgba(255, 255, 255, 0.8);
            color: white;

            padding: 10px 22px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;

            transition: 0.25s;
        }

        .btn-ghost:hover {
            background: white;
            color: #0a3d80;
        }

        @keyframes turun {
            from {
                opacity: 0;
                transform: translateY(-80px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes masuk {
            from {
                opacity: 0;
                transform: translateY(34px) scale(0.985);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* =========================
           STATISTIK (COUNTER)
        ========================= */

        .stats {
            position: relative;
            z-index: 3;

            margin: -55px auto 0;

            width: 87%;

            background: white;
            border-radius: 18px;

            padding: 12px 20px;

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.14);
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 15px;

            padding: 14px 20px;

            border-right: 1px solid #e3eaf5;

            transition: background 0.25s ease;
        }

        .stat-item:hover {
            background: #f5f9ff;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-icon {
            flex-shrink: 0;

            width: 54px;
            height: 54px;

            background: linear-gradient(135deg, #e9f3ff, #f5f9ff);

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;

            transition: transform 0.3s var(--ease-halus);
        }

        .stat-item:hover .stat-icon {
            transform: scale(1.14) rotate(-8deg);
        }

        .stat-number {
            font-size: 26px;
            font-weight: 900;
            color: #123b78;

            line-height: 1;
        }

        .stat-label {
            font-size: 12px;
            color: #222;
            font-weight: bold;

            margin-top: 4px;
        }

        /* =========================
           STRIP NILAI (MARQUEE)
        ========================= */

        .nilai-strip {
            margin-top: 45px;

            background: #063d82;

            padding: 14px 0;

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

            font-size: 14px;
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
           CONTAINER & SECTION
        ========================= */

        .container {
            width: 87%;
            margin: auto;
        }

        .section {
            margin-top: 70px;

            scroll-margin-top: 90px;
        }

        .section-head {
            margin-bottom: 28px;
        }

        .section-head .kicker {
            display: inline-block;

            background: #fff8d6;
            color: #7a5c00;

            padding: 6px 15px;
            border-radius: 20px;

            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .section-head h2 {
            margin-top: 12px;

            font-size: 26px;
            color: #123b78;

            line-height: 1.25;
        }

        .section-head h2::after {
            content: "";

            display: block;

            width: 55px;
            height: 4px;

            background: #ffd900;

            margin-top: 10px;
            border-radius: 3px;

            /* garis kuning menggambar dirinya saat section terlihat */

            transform: scaleX(0);
            transform-origin: left;

            transition: transform 0.9s var(--ease-halus) 0.25s;
        }

        .section-head.in-view h2::after {
            transform: scaleX(1);
        }

        .section-head.center h2::after {
            transform-origin: center;
        }

        /* judul & kicker section muncul berurutan */

        .section-head .kicker {
            opacity: 0;
            transform: translateY(18px);

            transition:
                opacity 0.6s var(--ease-halus),
                transform 0.6s var(--ease-halus);
        }

        .section-head h2 {
            opacity: 0;
            transform: translateY(22px);

            transition:
                opacity 0.7s var(--ease-halus) 0.1s,
                transform 0.7s var(--ease-halus) 0.1s;
        }

        .section-head .section-desc {
            opacity: 0;
            transform: translateY(22px);

            transition:
                opacity 0.7s var(--ease-halus) 0.2s,
                transform 0.7s var(--ease-halus) 0.2s;
        }

        .section-head.in-view .kicker,
        .section-head.in-view h2,
        .section-head.in-view .section-desc {
            opacity: 1;
            transform: translateY(0);
        }

        .section-head .section-desc {
            margin-top: 12px;

            max-width: 640px;

            font-size: 13.5px;
            color: #64748b;

            line-height: 1.7;
        }

        .section-head.center {
            text-align: center;
        }

        .section-head.center h2::after {
            margin-left: auto;
            margin-right: auto;
        }

        .section-head.center .section-desc {
            margin-left: auto;
            margin-right: auto;
        }

        /* =========================
           SAMBUTAN KEPALA SEKOLAH
        ========================= */

        .sambutan {
            display: grid;
            grid-template-columns: 340px 1fr;

            gap: 30px;
            align-items: center;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 22px;

            padding: 30px;

            box-shadow: 0 8px 28px rgba(16, 43, 92, 0.08);
        }

        .sambutan-foto {
            position: relative;

            height: 330px;

            border-radius: 16px;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(18, 100, 207, 0.08) 0%,
                    transparent 60%
                ),
                linear-gradient(180deg, #eaf3ff, #f7fbff);

            border: 1px solid #e2ecf9;

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow: 0 10px 24px rgba(16, 43, 92, 0.14);
        }

        .sambutan-foto img {
            width: 100%;
            height: 100%;

            object-fit: contain;
        }

        .sambutan-foto::after {
            content: "";

            position: absolute;
            right: -16px;
            top: -16px;

            width: 62px;
            height: 62px;

            border-radius: 50%;

            border: 10px solid rgba(255, 217, 0, 0.5);
        }

        .sambutan-body .quote-mark {
            font-size: 52px;
            font-weight: 900;
            color: #ffd900;

            line-height: 0.6;

            display: block;

            margin-bottom: 6px;

            font-family: Georgia, serif;
        }

        .sambutan-body blockquote {
            font-size: 15px;
            font-style: italic;
            color: #33456b;

            line-height: 1.85;
        }

        .sambutan-identitas {
            margin-top: 18px;

            padding-top: 16px;

            border-top: 1px dashed #dbe4f2;
        }

        .sambutan-identitas strong {
            display: block;

            font-size: 15px;
            color: #123b78;
        }

        .sambutan-identitas span {
            font-size: 12px;
            color: #7b8aa5;
        }

        /* =========================
           VISI MISI
        ========================= */

        .visi-misi {
            display: grid;
            grid-template-columns: 1.05fr 1fr;

            gap: 22px;
        }

        .visi-card {
            position: relative;
            overflow: hidden;

            /* gradasi bergerak pelan terus-menerus */

            background: linear-gradient(120deg, #0752b9, #0780df, #0a5fc0, #0752b9);

            background-size: 300% 300%;

            animation: gradasi 8s ease infinite;

            color: white;

            border-radius: 20px;

            padding: 34px 30px;

            box-shadow: 0 16px 34px rgba(7, 82, 185, 0.35);
        }

        @keyframes gradasi {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

        }

        .visi-card::before {
            content: "";

            position: absolute;
            right: -60px;
            top: -60px;

            width: 190px;
            height: 190px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.1);
        }

        .visi-card .label,
        .misi-card .label {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: rgba(255, 255, 255, 0.16);
            color: white;

            padding: 7px 16px;
            border-radius: 20px;

            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .visi-card .label {
            background: #ffe000;
            color: #111;
        }

        .visi-card p {
            margin-top: 18px;

            font-size: 19px;
            font-weight: bold;
            font-style: italic;

            line-height: 1.7;

            position: relative;
            z-index: 1;
        }

        .misi-card {
            background: white;

            border: 1px solid #edf1f8;
            border-radius: 20px;

            padding: 30px;

            box-shadow: 0 8px 28px rgba(16, 43, 92, 0.08);
        }

        .misi-list {
            margin-top: 18px;

            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .misi-item {
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        .misi-num {
            flex-shrink: 0;

            width: 30px;
            height: 30px;

            background: linear-gradient(135deg, #0752b9, #0780df);
            color: white;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 13px;
            font-weight: 900;
        }

        .misi-item p {
            font-size: 13px;
            color: #33456b;

            line-height: 1.65;

            padding-top: 4px;
        }

        /* misi muncul satu per satu saat kartu terlihat */

        .misi-card .misi-item {
            opacity: 0;
            transform: translateX(26px);

            transition:
                opacity 0.6s var(--ease-halus),
                transform 0.6s var(--ease-halus);
        }

        .misi-card.in-view .misi-item {
            opacity: 1;
            transform: translateX(0);
        }

        .misi-card.in-view .misi-item:nth-child(1) {
            transition-delay: 0.2s;
        }

        .misi-card.in-view .misi-item:nth-child(2) {
            transition-delay: 0.32s;
        }

        .misi-card.in-view .misi-item:nth-child(3) {
            transition-delay: 0.44s;
        }

        .misi-card.in-view .misi-item:nth-child(4) {
            transition-delay: 0.56s;
        }

        .misi-card.in-view .misi-item:nth-child(5) {
            transition-delay: 0.68s;
        }

        /* =========================
           TIMELINE SEJARAH
        ========================= */

        .timeline {
            position: relative;

            max-width: 860px;

            margin: 0 auto;

            padding: 10px 0;
        }

        /* garis timeline tumbuh dari atas saat discroll */

        .timeline::before {
            content: "";

            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;

            width: 3px;

            transform: translateX(-50%) scaleY(0);
            transform-origin: top;

            background: linear-gradient(180deg, #0780df, #dbe7f8);

            border-radius: 3px;

            transition: transform 1.6s var(--ease-halus);
        }

        .timeline.in-view::before {
            transform: translateX(-50%) scaleY(1);
        }

        .timeline-item {
            position: relative;

            width: 50%;

            padding: 10px 42px 26px 0;
        }

        .timeline-item:nth-child(even) {
            margin-left: 50%;

            padding: 10px 0 26px 42px;
        }

        .timeline-dot {
            position: absolute;
            top: 18px;
            right: -9px;

            width: 18px;
            height: 18px;

            background: #ffd900;

            border: 4px solid white;

            border-radius: 50%;

            box-shadow: 0 0 0 3px #ffe000, 0 4px 10px rgba(0, 0, 0, 0.15);

            z-index: 1;

            transition: transform 0.35s var(--ease-halus);
        }

        /* titik berdenyut saat kartu terlihat */

        .timeline-item.in-view .timeline-dot {
            animation: denyut 2.4s ease-in-out infinite;
        }

        @keyframes denyut {

            0%,
            100% {
                box-shadow: 0 0 0 3px #ffe000, 0 4px 10px rgba(0, 0, 0, 0.15);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(255, 224, 0, 0.35), 0 4px 10px rgba(0, 0, 0, 0.15);
            }

        }

        .timeline-card:hover .timeline-dot {
            transform: scale(1.4);
        }

        .timeline-item:nth-child(even) .timeline-dot {
            right: auto;
            left: -9px;
        }

        .timeline-card {
            background: white;

            border: 1px solid #edf1f8;
            border-radius: 16px;

            padding: 20px 22px;

            box-shadow: 0 6px 20px rgba(16, 43, 92, 0.08);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .timeline-card:hover {
            transform: translateY(-6px);

            box-shadow: 0 16px 30px rgba(16, 43, 92, 0.15);
        }

        .timeline-year {
            display: inline-block;

            background: #123b78;
            color: #ffe000;

            padding: 5px 14px;
            border-radius: 16px;

            font-size: 12px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .timeline-card h3 {
            margin-top: 12px;

            font-size: 15px;
            color: #123b78;
        }

        .timeline-card p {
            margin-top: 8px;

            font-size: 12.5px;
            color: #64748b;

            line-height: 1.7;
        }

        /* =========================
           IDENTITAS SEKOLAH
        ========================= */

        .identitas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));

            gap: 16px;
        }

        .identitas-card {
            display: flex;
            align-items: center;
            gap: 14px;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 16px;

            padding: 18px;

            box-shadow: 0 4px 16px rgba(16, 43, 92, 0.06);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .identitas-card:hover {
            transform: translateY(-5px);

            box-shadow: 0 12px 26px rgba(16, 43, 92, 0.13);
        }

        .identitas-icon {
            flex-shrink: 0;

            width: 48px;
            height: 48px;

            background: #e9f3ff;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }

        .identitas-card small {
            display: block;

            font-size: 10.5px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;

            color: #8aa0c4;
        }

        .identitas-card strong {
            display: block;

            margin-top: 4px;

            font-size: 13.5px;
            color: #123b78;

            line-height: 1.4;
        }

        /* =========================
           KEUNGGULAN
        ========================= */

        .unggulan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));

            gap: 18px;
        }

        .unggulan-card {
            position: relative;
            overflow: hidden;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 18px;

            padding: 26px 22px;

            box-shadow: 0 4px 16px rgba(16, 43, 92, 0.06);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .unggulan-card::before {
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

        .unggulan-card:hover {
            transform: translateY(-8px);

            box-shadow: 0 16px 32px rgba(16, 43, 92, 0.15);
        }

        .unggulan-card:hover::before {
            transform: scaleX(1);
        }

        .unggulan-icon {
            width: 58px;
            height: 58px;

            margin-bottom: 14px;

            background: linear-gradient(135deg, #e9f3ff, #f5f9ff);

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 26px;

            transition: transform 0.3s ease;
        }

        .unggulan-card:hover .unggulan-icon {
            transform: scale(1.12) rotate(-6deg);
        }

        .unggulan-card h3 {
            font-size: 15px;
            color: #123b78;

            margin-bottom: 8px;
        }

        .unggulan-card p {
            font-size: 12.5px;
            color: #64748b;

            line-height: 1.7;
        }

        /* =========================
           GALERI CAROUSEL
        ========================= */

        .galeri-wrap {
            margin-top: 14px;

            position: relative;
        }

        .galeri-viewport {
            overflow: hidden;

            border-radius: 18px;

            padding: 6px;

            background: rgba(255, 255, 255, 0.6);
        }

        .galeri-track {
            display: flex;
            gap: 14px;

            transition: transform 0.55s var(--ease-halus);

            will-change: transform;
        }

        .galeri-item {
            position: relative;

            flex: 0 0 calc((100% - 28px) / 3);

            height: 200px;

            border-radius: 14px;
            overflow: hidden;

            box-shadow: 0 8px 20px rgba(16, 43, 92, 0.12);

            cursor: pointer;
        }

        .galeri-item img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: transform 0.55s var(--ease-halus);
        }

        .galeri-item:hover img {
            transform: scale(1.07);
        }

        /* tombol navigasi kiri / kanan */

        .galeri-btn {
            position: absolute;
            top: 50%;

            transform: translateY(-50%);

            width: 46px;
            height: 46px;

            border: none;
            border-radius: 50%;

            background: white;
            color: #123b78;

            font-size: 17px;
            font-weight: 900;

            cursor: pointer;

            box-shadow: 0 8px 22px rgba(16, 43, 92, 0.25);

            transition:
                transform 0.25s var(--ease-halus),
                background 0.25s ease,
                color 0.25s ease,
                opacity 0.25s ease;

            z-index: 2;
        }

        .galeri-btn:hover {
            background: #1264cf;
            color: white;

            transform: translateY(-50%) scale(1.1);
        }

        .galeri-btn--kiri {
            left: -14px;
        }

        .galeri-btn--kanan {
            right: -14px;
        }

        .galeri-btn:disabled {
            opacity: 0.45;

            cursor: not-allowed;

            transform: translateY(-50%) scale(0.95);
        }

        /* titik indikator halaman */

        .galeri-dots {
            display: flex;
            justify-content: center;
            gap: 8px;

            margin-top: 18px;
        }

        .galeri-dot {
            width: 9px;
            height: 9px;

            border: none;
            border-radius: 50%;

            background: #c9d8ee;

            cursor: pointer;

            padding: 0;

            transition:
                width 0.3s var(--ease-halus),
                background 0.3s ease;
        }

        .galeri-dot.active {
            width: 26px;

            border-radius: 6px;

            background: #1264cf;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            margin-top: 70px;

            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;

            border-radius: 22px;

            padding: 38px 34px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;

            box-shadow: 0 16px 34px rgba(7, 82, 185, 0.35);

            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: "";

            position: absolute;
            right: -70px;
            bottom: -70px;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.1);
        }

        .cta h3 {
            font-size: 22px;

            margin-bottom: 8px;

            position: relative;
        }

        .cta p {
            font-size: 13px;

            color: #d9e9ff;

            line-height: 1.6;

            position: relative;
        }

        .cta-btn {
            flex-shrink: 0;

            background: #ffe000;
            color: #111;

            padding: 13px 28px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;

            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.18);

            transition: 0.25s;

            position: relative;
        }

        .cta-btn:hover {
            transform: translateY(-3px);
        }

        /* kilau bergerak di kartu CTA */

        .cta::after {
            content: "";

            position: absolute;
            top: 0;
            left: -80%;

            width: 45%;
            height: 100%;

            background: linear-gradient(
                100deg,
                transparent,
                rgba(255, 255, 255, 0.22),
                transparent
            );

            transform: skewX(-20deg);

            animation: kilau 4.5s ease-in-out infinite;
        }

        @keyframes kilau {

            0%,
            55% {
                left: -80%;
            }

            85%,
            100% {
                left: 140%;
            }

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

            margin-top: 70px;
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
           ANIMASI REVEAL SCROLL
        ========================= */

        .reveal {
            opacity: 0;
            transform: translateY(36px);

            filter: blur(6px);

            transition:
                opacity 0.9s var(--ease-halus),
                transform 0.9s var(--ease-halus),
                filter 0.9s var(--ease-halus);
        }

        .reveal.in-view {
            filter: blur(0);
        }

        .reveal.from-left {
            transform: translate(-44px, 0);
        }

        .reveal.from-right {
            transform: translate(44px, 0);
        }

        .reveal.in-view {
            opacity: 1;
            transform: translate(0, 0);
        }

        .visi-misi > .reveal:nth-child(2) {
            transition-delay: 0.12s;
        }

        .unggulan-grid > .reveal:nth-child(2),
        .identitas-grid > .reveal:nth-child(2) {
            transition-delay: 0.08s;
        }

        .unggulan-grid > .reveal:nth-child(3),
        .identitas-grid > .reveal:nth-child(3) {
            transition-delay: 0.16s;
        }

        .unggulan-grid > .reveal:nth-child(4),
        .identitas-grid > .reveal:nth-child(4) {
            transition-delay: 0.24s;
        }

        .unggulan-grid > .reveal:nth-child(5) {
            transition-delay: 0.32s;
        }

        .unggulan-grid > .reveal:nth-child(6) {
            transition-delay: 0.4s;
        }

        /* timeline: kartu muncul menyusul saat scroll */

        .timeline-item .timeline-card {
            opacity: 0;
            transform: translateY(32px) scale(0.96);

            transition:
                opacity 0.75s var(--ease-halus),
                transform 0.75s var(--ease-halus);
        }

        .timeline-item.in-view .timeline-card {
            opacity: 1;
            transform: translateY(0);
        }

        /* kartu kanan masuk dari kanan, kiri dari kiri */

        .timeline-item:nth-child(even) .timeline-card {
            transform: translate(36px, 20px) scale(0.96);
        }

        .timeline-item:nth-child(even).in-view .timeline-card {
            transform: translate(0, 0) scale(1);
        }

        @media (prefers-reduced-motion: reduce) {

            .reveal,
            .timeline-item .timeline-card {
                opacity: 1;
                transform: none;
                transition: none;
            }

            .hero .orb,
            .nilai-track,
            .visi-card,
            .timeline-item.in-view .timeline-dot,
            .cta::after {
                animation: none;
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

            .visi-misi {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 760px) {

            .sambutan {
                grid-template-columns: 1fr;
            }

            .sambutan-foto {
                height: 300px;
                max-width: 320px;

                margin: auto;
            }

            .timeline::before {
                left: 10px;
            }

            .timeline-item,
            .timeline-item:nth-child(even) {
                width: 100%;

                margin-left: 0;

                padding: 6px 0 22px 36px;
            }

            .timeline-dot,
            .timeline-item:nth-child(even) .timeline-dot {
                left: 2px;
                right: auto;
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
                padding: 120px 7% 90px;
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

            .section-head h2 {
                font-size: 22px;
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

    </style>
</head>

<body>

    <!-- PROGRES SCROLL -->

    <div class="progress-bar" id="progressBar"></div>

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

            <a href="{{ url('/profil') }}" class="active">Profil⌄</a>

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

        <a href="{{ url('/login') }}" class="login-btn">Login</a>

    </nav>


    <!-- HERO -->

    <section class="hero">

        <span class="orb orb-1"></span>
        <span class="orb orb-2"></span>
        <span class="orb orb-3"></span>

        <div class="hero-crumb">
            Beranda &nbsp;·&nbsp; <b>Profil Sekolah</b>
        </div>

        <span class="welcome-label">
            Mengenal Kami Lebih Dekat
        </span>

        <h1 class="hero-title">
            Profil <span>Sekolah</span>
        </h1>

        <div class="hero-subtitle">
            SMK INFOKOM BOGOR
        </div>

        <p class="hero-description">
            SMK Informatika dan Telekomunikasi — sekolah menengah kejuruan
            yang mencetak generasi unggul, berkarakter, dan kompeten di
            bidang teknologi, siap menghadapi dunia kerja dan era digital.
        </p>

        <div class="hero-actions">

            <a href="#visi-misi" class="btn-gold">
                Visi & Misi →
            </a>

            <a href="#sejarah" class="btn-ghost">
                Sejarah Sekolah
            </a>

        </div>

    </section>


    <!-- STATISTIK COUNTER -->

    <section class="stats">

        <div class="stat-item">

            <div class="stat-icon">👨‍🎓</div>

            <div>
                <div class="stat-number" data-count="1200" data-suffix="+">0</div>
                <div class="stat-label">Siswa Aktif</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">👨‍🏫</div>

            <div>
                <div class="stat-number" data-count="50" data-suffix="+">0</div>
                <div class="stat-label">Guru & Tenaga Pendidik</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">🏆</div>

            <div>
                <div class="stat-number" data-count="50" data-suffix="+">0</div>
                <div class="stat-label">Prestasi Diraih</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">🎓</div>

            <div>
                <div class="stat-number" data-count="4" data-suffix="">0</div>
                <div class="stat-label">Program Keahlian</div>
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


    <main class="container">


        <!-- SAMBUTAN KEPALA SEKOLAH -->

        <section class="section" id="tentang">

            <div class="section-head">

                <span class="kicker">Sambutan</span>

                <h2>Salam Hangat dari Kepala Sekolah</h2>

            </div>

            <div class="sambutan reveal">

                <div class="sambutan-foto">

                    <img
                        src="{{ asset('images/Kepala-Sekolah.jpeg') }}"
                        alt="Kepala Sekolah SMK INFOKOM Bogor"
                    >

                </div>

                <div class="sambutan-body">

                    <span class="quote-mark">&ldquo;</span>

                    <blockquote>
                        Mari bersama-sama menciptakan lingkungan belajar yang
                        kondusif, inovatif, dan penuh semangat untuk mewujudkan
                        generasi yang unggul di era digital, dengan mengedepankan
                        adab dan akhlak yang baik — menjadi generasi emas yang
                        bisa memajukan bangsa.
                    </blockquote>

                    <div class="sambutan-identitas">

                        <strong>Ir. Hj. Liliek Rahmaningsih, M.Pd</strong>

                        <span>Kepala SMK INFOKOM Bogor</span>

                    </div>

                </div>

            </div>

        </section>


        <!-- VISI MISI -->

        <section class="section" id="visi-misi">

            <div class="section-head">

                <span class="kicker">Arah & Tujuan</span>

                <h2>Visi & Misi Sekolah</h2>

            </div>

            <div class="visi-misi">

                <div class="visi-card reveal from-left">

                    <span class="label">🌟 Visi</span>

                    <p>
                        &ldquo;Mewujudkan generasi yang unggul, berkarakter,
                        kompeten di bidang teknologi, dan siap menghadapi
                        dunia kerja.&rdquo;
                    </p>

                </div>

                <div class="misi-card reveal from-right">

                    <span class="label">🎯 Misi</span>

                    <div class="misi-list">

                        <div class="misi-item">

                            <span class="misi-num">1</span>

                            <p>
                                Menyelenggarakan pembelajaran aktif,
                                kreatif, dan berbasis teknologi informasi.
                            </p>

                        </div>

                        <div class="misi-item">

                            <span class="misi-num">2</span>

                            <p>
                                Menanamkan nilai-nilai karakter, adab, dan
                                keimanan pada seluruh warga sekolah.
                            </p>

                        </div>

                        <div class="misi-item">

                            <span class="misi-num">3</span>

                            <p>
                                Membangun kemitraan dengan dunia industri
                                dan dunia kerja.
                            </p>

                        </div>

                        <div class="misi-item">

                            <span class="misi-num">4</span>

                            <p>
                                Mengembangkan potensi siswa melalui
                                kegiatan ekstrakurikuler dan prestasi.
                            </p>

                        </div>

                        <div class="misi-item">

                            <span class="misi-num">5</span>

                            <p>
                                Mempersiapkan lulusan yang siap bekerja,
                                kuliah, atau berwirausaha.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- SEJARAH -->

        <section class="section" id="sejarah">

            <div class="section-head center">

                <span class="kicker">Perjalanan Kami</span>

                <h2>Sejarah Singkat Sekolah</h2>

                <p class="section-desc">
                    Perjalanan panjang SMK INFOKOM Bogor dalam mencetak
                    generasi teknologi yang unggul dan berkarakter.
                </p>

            </div>

            <div class="timeline">

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-year">2008</span>

                        <h3>Sekolah Berdiri</h3>

                        <p>
                            SMK INFOKOM Bogor resmi berdiri dengan fokus
                            pada pendidikan vokasi bidang informatika dan
                            telekomunikasi.
                        </p>

                    </div>

                </div>

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-year">2012</span>

                        <h3>Program Keahlian Berkembang</h3>

                        <p>
                            Membuka kompetensi keahlian TKJ dan DKV
                            sebagai jawaban atas kebutuhan industri
                            kreatif dan jaringan.
                        </p>

                    </div>

                </div>

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-year">2017</span>

                        <h3>Kemitraan Industri Luas</h3>

                        <p>
                            Menjalin kerja sama dengan puluhan perusahaan
                            mitra untuk program PKL, rekrutmen lulusan,
                            dan kurikulum berbasis industri.
                        </p>

                    </div>

                </div>

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-year">Sekarang</span>

                        <h3>SMK Pusat Keunggulan</h3>

                        <p>
                            Empat program keahlian aktif — RPL, TKJ, DKV,
                            dan PSPT — dengan ribuan alumni yang bekerja,
                            kuliah, dan berwirausaha di berbagai kota.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- IDENTITAS SEKOLAH -->

        <section class="section" id="identitas">

            <div class="section-head">

                <span class="kicker">Data Sekolah</span>

                <h2>Identitas Sekolah</h2>

            </div>

            <div class="identitas-grid">

                <div class="identitas-card reveal">

                    <div class="identitas-icon">🏫</div>

                    <div>
                        <small>Nama Sekolah</small>
                        <strong>SMK INFOKOM Bogor</strong>
                    </div>

                </div>

                <div class="identitas-card reveal">

                    <div class="identitas-icon">📋</div>

                    <div>
                        <small>NPSN</small>
                        <strong>20219876</strong>
                    </div>

                </div>

                <div class="identitas-card reveal">

                    <div class="identitas-icon">⭐</div>

                    <div>
                        <small>Akreditasi</small>
                        <strong>A (Unggul)</strong>
                    </div>

                </div>

                <div class="identitas-card reveal">

                    <div class="identitas-icon">🏛</div>

                    <div>
                        <small>Status</small>
                        <strong>Swasta — Terakreditasi</strong>
                    </div>

                </div>

                <div class="identitas-card reveal">

                    <div class="identitas-icon">📍</div>

                    <div>
                        <small>Alamat</small>
                        <strong>Jl. Letjen Ibrahim Adjie No.178, Sindangbarang, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16117</strong>
                    </div>

                </div>

                <div class="identitas-card reveal">

                    <div class="identitas-icon">☎</div>

                    <div>
                        <small>Kontak</small>
                        <strong>0251-8348-108 · 0878-7307-1400 (Humas)</strong>
                    </div>

                </div>

                <div class="identitas-card reveal">

                    <div class="identitas-icon">✉</div>

                    <div>
                        <small>Email</small>
                        <strong>smk.infokom@gmail.com</strong>
                    </div>

                </div>

                <div class="identitas-card reveal">

                    <div class="identitas-icon">🕐</div>

                    <div>
                        <small>Jam Operasional</small>
                        <strong>Senin–Jumat 07.00–17.00 · Sabtu 07.00–12.30</strong>
                    </div>

                </div>

            </div>

        </section>


        <!-- KEUNGGULAN -->

        <section class="section" id="keunggulan">

            <div class="section-head center">

                <span class="kicker">Kenapa Kami</span>

                <h2>Keunggulan SMK INFOKOM</h2>

            </div>

            <div class="unggulan-grid">

                <div class="unggulan-card reveal">

                    <div class="unggulan-icon">🏭</div>

                    <h3>Kurikulum Berbasis Industri</h3>

                    <p>
                        Pembelajaran mengikuti standar kebutuhan dunia
                        kerja dan tren teknologi terbaru.
                    </p>

                </div>

                <div class="unggulan-card reveal">

                    <div class="unggulan-icon">👩‍🏫</div>

                    <h3>Guru Kompeten & Bersertifikat</h3>

                    <p>
                        Tenaga pendidik profesional di bidangnya dengan
                        pengalaman industri.
                    </p>

                </div>

                <div class="unggulan-card reveal">

                    <div class="unggulan-icon">🖥</div>

                    <h3>Fasilitas Modern</h3>

                    <p>
                        Lab komputer, lab jaringan, studio DKV, dan
                        ruang praktik yang lengkap.
                    </p>

                </div>

                <div class="unggulan-card reveal">

                    <div class="unggulan-icon">🤝</div>

                    <h3>Mitra Industri & PKL</h3>

                    <p>
                        100+ perusahaan mitra untuk praktik kerja lapangan
                        dan penyaluran lulusan.
                    </p>

                </div>

                <div class="unggulan-card reveal">

                    <div class="unggulan-icon">💼</div>

                    <h3>BKK Aktif</h3>

                    <p>
                        Bursa Kerja Khusus membantu lulusan mendapatkan
                        pekerjaan sesuai bidangnya.
                    </p>

                </div>

                <div class="unggulan-card reveal">

                    <div class="unggulan-icon">🏅</div>

                    <h3>Budaya Prestasi</h3>

                    <p>
                        Siswa rutin meraih juara di tingkat kota,
                        provinsi, hingga nasional.
                    </p>

                </div>

            </div>

        </section>


        <!-- GALERI BERJALAN -->

        <section class="section" id="galeri-singkat">

            <div class="section-head">

                <span class="kicker">Kegiatan</span>

                <h2>Sekilas Kegiatan Sekolah</h2>

            </div>

            @php

                $galeriProfil = [
                    'Upacara.jpeg' => 'Upacara Bendera',
                    'Kunjungan-Industri.jpeg' => 'Kunjungan Industri',
                    'Prestasi.jpeg' => 'Tim Prestasi',
                    'Galeri-1.jpeg' => 'Kegiatan Siswa',
                    'Galeri-2.jpeg' => 'Kegiatan Siswa',
                    'Galeri-3.jpeg' => 'Kegiatan Siswa',
                    'Galeri-4.jpeg' => 'Kegiatan Siswa',
                    'Galeri-5.jpeg' => 'Kegiatan Siswa',
                    'Galeri-6.jpeg' => 'Kegiatan Siswa',
                ];

            @endphp

            <div class="galeri-wrap">

                <button
                    type="button"
                    class="galeri-btn galeri-btn--kiri"
                    id="galeriKiri"
                    title="Sebelumnya"
                >
                    ‹
                </button>

                <div class="galeri-viewport">

                    <div class="galeri-track" id="galeriTrack">

                        @foreach($galeriProfil as $gambar => $judul)

                            <div class="galeri-item">

                                <img
                                    src="{{ asset('images/' . $gambar) }}"
                                    alt="{{ $judul }}"
                                    loading="lazy"
                                >

                            </div>

                        @endforeach

                    </div>

                </div>

                <button
                    type="button"
                    class="galeri-btn galeri-btn--kanan"
                    id="galeriKanan"
                    title="Berikutnya"
                >
                    ›
                </button>

                <div class="galeri-dots" id="galeriDots"></div>

            </div>

        </section>


        <!-- CTA -->

        <section class="cta">

            <div>

                <h3>Ingin Menjadi Bagian dari Kami?</h3>

                <p>
                    Bergabunglah bersama keluarga besar SMK INFOKOM Bogor.
                    Pendaftaran peserta didik baru telah dibuka!
                </p>

            </div>

            <a href="{{ url('/ppdb') }}" class="cta-btn">
                Daftar PPDB Sekarang →
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
                    { threshold: 0.12 }
                );

                document.querySelectorAll('.reveal, .timeline-item, .section-head, .timeline')
                    .forEach(function (el) {
                        pengamat.observe(el);
                    });

            } else {

                document.querySelectorAll('.reveal, .timeline-item')
                    .forEach(function (el) {
                        el.classList.add('in-view');
                    });

            }

            // ===== COUNTER ANGKA STATISTIK =====

            function jalankanCounter(el) {

                var target = parseInt(el.getAttribute('data-count'), 10) || 0;

                var suffix = el.getAttribute('data-suffix') || '';

                var durasi = 1600;

                var mulai = null;

                function langkah(timestamp) {

                    if (!mulai) {
                        mulai = timestamp;
                    }

                    var progres = Math.min((timestamp - mulai) / durasi, 1);

                    // easing agar berhenti dengan halus
                    var mudah = 1 - Math.pow(1 - progres, 3);

                    var nilai = Math.round(mudah * target);

                    el.textContent = nilai.toLocaleString('id-ID') + suffix;

                    if (progres < 1) {
                        requestAnimationFrame(langkah);
                    }

                }

                requestAnimationFrame(langkah);

            }

            var angkaStatistik = document.querySelectorAll('.stat-number');

            if ('IntersectionObserver' in window) {

                var pengamatAngka = new IntersectionObserver(
                    function (entries, pengamat) {

                        entries.forEach(function (entry) {

                            if (entry.isIntersecting) {

                                jalankanCounter(entry.target);

                                pengamat.unobserve(entry.target);

                            }

                        });

                    },
                    { threshold: 0.4 }
                );

                angkaStatistik.forEach(function (el) {
                    pengamatAngka.observe(el);
                });

            } else {

                angkaStatistik.forEach(jalankanCounter);

            }

            // ===== GALERI CAROUSEL =====

            var track = document.getElementById('galeriTrack');

            var tombolKiri = document.getElementById('galeriKiri');

            var tombolKanan = document.getElementById('galeriKanan');

            var wadahDots = document.getElementById('galeriDots');

            if (track && tombolKiri && tombolKanan) {

                var indeks = 0;

                // jumlah item per halaman mengikuti lebar layar

                function itemPerTampilan() {

                    if (window.innerWidth <= 640) {
                        return 1;
                    }

                    if (window.innerWidth <= 900) {
                        return 2;
                    }

                    return 3;

                }

                function jumlahHalaman() {

                    var total = track.children.length;

                    var per = itemPerTampilan();

                    return Math.max(1, Math.ceil(total / per));

                }

                // bangun ulang dots saat ukuran layar berubah

                function bangunDots() {

                    wadahDots.innerHTML = '';

                    for (var i = 0; i < jumlahHalaman(); i++) {

                        var titik = document.createElement('button');

                        titik.type = 'button';

                        titik.className = 'galeri-dot';

                        titik.title = 'Halaman ' + (i + 1);

                        titik.addEventListener('click', function (e) {

                            indeks = Array.prototype.indexOf.call(
                                wadahDots.children,
                                e.currentTarget
                            );

                            geser();

                        });

                        wadahDots.appendChild(titik);

                    }

                }

                function geser() {

                    var total = track.children.length;

                    var per = itemPerTampilan();

                    var maks = Math.max(0, total - per);

                    // jaga indeks dalam batas

                    indeks = Math.min(indeks, Math.ceil(maks / per));

                    var item = track.children[0];

                    var lebarItem = item
                        ? item.getBoundingClientRect().width + 14
                        : 0;

                    var geserPx = indeks * per * lebarItem;

                    var maksGeser = track.scrollWidth
                        - track.parentElement.clientWidth
                        + 12;

                    geserPx = Math.min(geserPx, Math.max(0, maksGeser));

                    track.style.transform = 'translateX(-' + geserPx + 'px)';

                    // status tombol

                    tombolKiri.disabled = indeks === 0;

                    var diUjung = geserPx >= maksGeser - 4;

                    tombolKanan.disabled = diUjung;

                    // status dots

                    var per = itemPerTampilan();

                    [...wadahDots.children].forEach(function (d, i) {
                        d.classList.toggle('active', i === indeks);
                    });

                }

                tombolKiri.addEventListener('click', function () {

                    indeks = Math.max(0, indeks - 1);

                    geser();

                });

                tombolKanan.addEventListener('click', function () {

                    indeks = Math.min(jumlahHalaman() - 1, indeks + 1);

                    geser();

                });

                var timerUkur;

                window.addEventListener('resize', function () {

                    clearTimeout(timerUkur);

                    timerUkur = setTimeout(function () {

                        indeks = 0;

                        bangunDots();

                        geser();

                    }, 150);

                });

                bangunDots();

                geser();

            }

            // ===== TOMBOL KEMBALI KE ATAS + PROGRES SCROLL =====

            var tombolAtas = document.getElementById('backTop');

            var progressBar = document.getElementById('progressBar');

            window.addEventListener('scroll', function () {

                tombolAtas.classList.toggle('show', window.scrollY > 400);

                var tinggiDokumen = document.documentElement.scrollHeight
                    - window.innerHeight;

                var persen = tinggiDokumen > 0
                    ? (window.scrollY / tinggiDokumen) * 100
                    : 0;

                progressBar.style.width = persen + '%';

                // parallax halus: orbu hero bergeser mengikuti scroll

                document.querySelectorAll('.hero .orb').forEach(function (orb, i) {

                    var kecepatan = (i + 1) * 0.12;

                    orb.style.translate =
                        '0 ' + (window.scrollY * kecepatan * -1) + 'px';

                });

            });

            tombolAtas.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

        })();
    </script>

</body>

</html>
