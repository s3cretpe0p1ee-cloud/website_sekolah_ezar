<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri Kegiatan - SMK INFOKOM Bogor</title>

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

        a {
            text-decoration: none;
            color: inherit;
        }

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

            transition: transform 0.3s var(--ease-halus);
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
                opacity 0.3s var(--ease-halus),
                transform 0.3s var(--ease-halus),
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

            transition: 0.22s var(--ease-halus);
        }

        .dropdown-menu a:hover {
            background: #e9f3ff;

            color: var(--biru);

            transform: translateX(4px);
        }

        .login-btn {
            background: #ffd900;
            color: #111;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;

            min-height: 400px;

            background:
                linear-gradient(
                    90deg,
                    rgba(0, 43, 100, 0.97) 0%,
                    rgba(0, 65, 140, 0.9) 45%,
                    rgba(0, 65, 140, 0.55) 100%
                ),
                url("{{ asset('images/gedung sekolah.jpeg') }}");

            background-size: cover;
            background-position: center;

            color: white;

            display: flex;
            align-items: center;

            padding: 100px 10% 70px;

            overflow: hidden;
        }

        .hero-orbs {
            position: absolute;
            inset: 0;

            overflow: hidden;

            pointer-events: none;
        }

        .orb {
            position: absolute;

            border-radius: 50%;

            opacity: 0.35;

            filter: blur(2px);

            animation: apung 9s ease-in-out infinite;
        }

        .orb-1 {
            width: 120px;
            height: 120px;

            top: 20%;
            right: 12%;

            background: radial-gradient(circle at 30% 30%, rgba(255, 224, 0, 0.9), rgba(255, 224, 0, 0.05));

            animation-delay: 0s;
        }

        .orb-2 {
            width: 74px;
            height: 74px;

            top: 58%;
            right: 28%;

            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.03));

            animation-delay: 1.6s;
        }

        .orb-3 {
            width: 44px;
            height: 44px;

            top: 28%;
            right: 40%;

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

        .hero-content {
            position: relative;
            z-index: 2;

            max-width: 640px;
        }

        .breadcrumb {
            font-size: 12px;

            letter-spacing: 1px;

            color: rgba(255, 255, 255, 0.75);

            margin-bottom: 16px;

            animation: masuk 0.8s var(--ease-halus) both;
        }

        .breadcrumb b {
            color: var(--kuning);
        }

        .hero-label {
            display: inline-block;

            background: var(--kuning);
            color: #111;

            padding: 7px 20px;
            border-radius: 20px;

            font-size: 13px;
            font-weight: bold;

            margin-bottom: 12px;

            animation: masuk 0.8s var(--ease-halus) 0.1s both;
        }

        .hero-title {
            font-size: clamp(38px, 5vw, 62px);
            font-weight: 900;
            line-height: 0.98;

            text-transform: uppercase;
            letter-spacing: -1.5px;

            animation: masuk 0.9s var(--ease-halus) 0.2s both;
        }

        .hero-title span {
            background: linear-gradient(120deg, #ffe000, #fff9c9, #ffe000);

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

        .hero-subtitle {
            margin-top: 14px;

            font-size: 15px;

            color: rgba(255, 255, 255, 0.88);

            max-width: 520px;
            line-height: 1.6;

            animation: masuk 0.9s var(--ease-halus) 0.35s both;
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

        /* =========================
           STATISTIK
        ========================= */

        .stats {
            position: relative;
            z-index: 3;

            margin: -45px auto 25px;

            width: 87%;

            background: white;
            border-radius: 18px;

            padding: 16px 20px;

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 15px;

            padding: 10px 22px;

            border-right: 1px solid #e3e9f2;
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
            font-size: 24px;
            font-weight: 900;
            color: var(--navy);

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
           NAVIGASI TAB STICKY
        ========================= */

        .galeri-nav {
            position: sticky;
            top: 0;
            z-index: 20;

            background: rgba(255, 255, 255, 0.92);

            backdrop-filter: blur(10px);

            border-bottom: 1px solid #e4eaf5;

            padding: 12px 6%;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            flex-wrap: wrap;
        }

        .galeri-tab {
            background: white;

            border: 1.5px solid #e0e8f5;

            color: #40506b;

            padding: 9px 20px;
            border-radius: 25px;

            font-size: 12.5px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.25s var(--ease-halus);
        }

        .galeri-tab:hover {
            border-color: var(--biru);
            color: var(--biru);

            transform: translateY(-2px);
        }

        .galeri-tab.is-active {
            background: var(--biru);

            border-color: var(--biru);
            color: white;

            box-shadow: 0 6px 14px rgba(18, 100, 207, 0.35);
        }

        /* =========================
           GRID GALERI (MOSAIC)
        ========================= */

        .galeri-wrap {
            width: 87%;

            margin: 40px auto 20px;
        }

        .galeri-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            grid-auto-rows: 210px;

            gap: 14px;
        }

        /* variasi ukuran mosaic */

        .galeri-item:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
        }

        .galeri-item:nth-child(6) {
            grid-column: span 2;
        }

        .galeri-item:nth-child(10) {
            grid-column: span 2;
        }

        .galeri-item {
            position: relative;

            border-radius: 18px;

            overflow: hidden;

            cursor: pointer;

            box-shadow: 0 4px 16px rgba(16, 43, 92, 0.1);
        }

        .galeri-item img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: transform 0.6s var(--ease-halus);
        }

        .galeri-item:hover img {
            transform: scale(1.08) rotate(0.5deg);
        }

        /* garis warna kategori di bawah kartu */

        .galeri-item::after {
            content: "";

            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;

            height: 4px;

            background: linear-gradient(90deg, var(--warna, var(--biru)), var(--warna-2, var(--biru)));

            z-index: 2;
        }

        /* badge zoom melayang */

        .zoom-badge {
            position: absolute;
            top: 12px;
            right: 12px;

            width: 34px;
            height: 34px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.92);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;

            opacity: 0;
            transform: scale(0.5) rotate(-30deg);

            transition: 0.35s var(--ease-halus);

            z-index: 3;
        }

        .galeri-item:hover .zoom-badge {
            opacity: 1;
            transform: scale(1) rotate(0);
        }

        /* overlay info kegiatan */

        .galeri-overlay {
            position: absolute;
            inset: 0;

            display: flex;
            flex-direction: column;
            justify-content: flex-end;

            padding: 16px;

            background: linear-gradient(
                180deg,
                transparent 30%,
                rgba(6, 30, 66, 0.55) 65%,
                rgba(6, 30, 66, 0.92) 100%
            );

            color: white;

            opacity: 0;

            transition: opacity 0.4s var(--ease-halus);

            z-index: 2;
        }

        .galeri-item:hover .galeri-overlay,
        .galeri-item:focus-within .galeri-overlay {
            opacity: 1;
        }

        .badge-kat {
            align-self: flex-start;

            background: var(--warna, var(--biru));

            padding: 4px 12px;
            border-radius: 14px;

            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.5px;

            margin-bottom: 8px;

            transform: translateY(14px);

            transition: transform 0.4s var(--ease-halus) 0.05s;
        }

        .galeri-overlay h4 {
            font-size: 15px;

            line-height: 1.3;

            transform: translateY(14px);

            transition: transform 0.4s var(--ease-halus) 0.1s;
        }

        .tanggal-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            margin-top: 8px;

            background: rgba(255, 255, 255, 0.16);

            border: 1px solid rgba(255, 255, 255, 0.3);

            backdrop-filter: blur(4px);

            align-self: flex-start;

            padding: 5px 12px;
            border-radius: 14px;

            font-size: 11px;
            font-weight: bold;

            transform: translateY(14px);

            transition: transform 0.4s var(--ease-halus) 0.15s;
        }

        .galeri-item:hover .badge-kat,
        .galeri-item:hover .galeri-overlay h4,
        .galeri-item:hover .tanggal-chip {
            transform: translateY(0);
        }

        /* kartu yang disembunyikan filter */

        .galeri-item.is-hidden {
            display: none;
        }

        /* pesan kosong */

        .galeri-kosong {
            grid-column: 1 / -1;

            text-align: center;

            padding: 60px 20px;

            background: white;

            border: 2px dashed #d6e0f0;
            border-radius: 18px;
        }

        .galeri-kosong .kosong-icon {
            font-size: 44px;
        }

        .galeri-kosong h3 {
            margin-top: 12px;

            color: var(--navy);
        }

        .galeri-kosong p {
            margin-top: 6px;

            font-size: 13px;
            color: #7b8aa5;
        }

        /* =========================
           LIGHTBOX
        ========================= */

        .lightbox {
            position: fixed;
            inset: 0;

            background: rgba(4, 16, 38, 0.94);

            display: flex;
            align-items: center;
            justify-content: center;

            opacity: 0;
            visibility: hidden;

            transition: 0.35s var(--ease-halus);

            z-index: 100;
        }

        .lightbox.terbuka {
            opacity: 1;
            visibility: visible;
        }

        .lightbox-stage {
            max-width: min(920px, 86vw);

            display: flex;
            flex-direction: column;
            align-items: center;

            transform: scale(0.86) translateY(24px);

            transition: 0.4s var(--ease-halus);
        }

        .lightbox.terbuka .lightbox-stage {
            transform: scale(1) translateY(0);
        }

        .lightbox-img {
            max-width: 100%;

            max-height: 68vh;

            border-radius: 16px;

            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.5);
        }

        .lightbox-caption {
            text-align: center;

            color: white;

            margin-top: 18px;
        }

        .lightbox-caption h4 {
            font-size: 20px;
        }

        .lightbox-caption p {
            margin-top: 6px;

            font-size: 13px;

            color: #ffe000;

            font-weight: bold;
        }

        .lb-kat {
            display: inline-block;

            margin-top: 10px;

            background: rgba(255, 255, 255, 0.14);

            padding: 5px 14px;
            border-radius: 14px;

            font-size: 11px;
            font-weight: bold;
        }

        .lb-btn {
            position: fixed;

            width: 46px;
            height: 46px;

            border: none;
            border-radius: 50%;

            background: rgba(255, 255, 255, 0.14);

            color: white;

            font-size: 20px;

            cursor: pointer;

            transition: 0.25s var(--ease-halus);

            z-index: 101;
        }

        .lb-btn:hover {
            background: var(--biru);

            transform: scale(1.1);
        }

        .lb-close {
            top: 22px;
            right: 26px;
        }

        .lb-prev {
            left: 26px;
            top: 50%;

            margin-top: -23px;
        }

        .lb-next {
            right: 26px;
            top: 50%;

            margin-top: -23px;
        }

        .lb-count {
            position: fixed;
            bottom: 22px;
            left: 50%;

            transform: translateX(-50%);

            color: rgba(255, 255, 255, 0.85);

            font-size: 13px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        /* =========================
           CTA PPDB
        ========================= */

        .cta-ppdb {
            width: 87%;

            margin: 50px auto 60px;

            background: linear-gradient(120deg, #0752b9, #0780df);

            border-radius: 22px;

            padding: 34px 8%;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;

            color: white;

            position: relative;

            overflow: hidden;

            box-shadow: 0 14px 34px rgba(7, 82, 185, 0.35);
        }

        .cta-ppdb::before,
        .cta-ppdb::after {
            content: "";

            position: absolute;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.09);
        }

        .cta-ppdb::before {
            width: 220px;
            height: 220px;

            top: -90px;
            right: -60px;
        }

        .cta-ppdb::after {
            width: 140px;
            height: 140px;

            bottom: -70px;
            right: 130px;
        }

        .cta-ppdb h3 {
            font-size: 22px;
        }

        .cta-ppdb p {
            margin-top: 6px;

            font-size: 13px;

            color: rgba(255, 255, 255, 0.88);
        }

        .cta-btn {
            flex-shrink: 0;

            background: var(--kuning);
            color: #111;

            padding: 13px 26px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: 900;

            box-shadow: 0 8px 20px rgba(255, 217, 0, 0.4);

            transition: 0.3s var(--ease-halus);

            position: relative;
            z-index: 1;
        }

        .cta-btn:hover {
            transform: translateY(-4px) scale(1.04);
        }

        /* =========================
           MARQUEE NILAI
        ========================= */

        .nilai-strip {
            background: var(--navy-tua);

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
            color: var(--kuning);
            font-style: normal;
        }

        @keyframes jalan {
            to {
                transform: translateX(-50%);
            }
        }

        /* =========================
           ANIMASI REVEAL & POP
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

        .pop {
            opacity: 0;
            transform: scale(0.55) translateY(46px);
        }

        .pop.pop-in {
            animation: popup 0.75s var(--ease-halus) forwards;

            animation-delay: var(--d, 0s);
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

        .pop-done {
            opacity: 1;
            transform: none;
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
           FOOTER
        ========================= */

        footer {
            background: var(--navy-tua);
            color: white;

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
            color: var(--kuning);
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

            .galeri-grid {
                grid-template-columns: repeat(2, 1fr);

                grid-auto-rows: 190px;
            }

            .cta-ppdb {
                flex-direction: column;
                text-align: center;
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
                padding: 110px 7% 70px;
            }

            .stats {
                width: 92%;
                grid-template-columns: 1fr;
            }

            .galeri-wrap {
                width: 92%;
            }

            .galeri-grid {
                grid-template-columns: 1fr;

                grid-auto-rows: 230px;
            }

            .galeri-item:nth-child(n) {
                grid-column: span 1;
                grid-row: span 1;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

        }

        /* =========================
           REDUCED MOTION
        ========================= */

        @media (prefers-reduced-motion: reduce) {

            .reveal,
            .pop,
            .pop.pop-in {
                opacity: 1;
                transform: none;
                animation: none;
                transition: none;
            }

            .hero-title span,
            .orb,
            .nilai-track {
                animation: none;
            }

            .galeri-item img,
            .zoom-badge,
            .galeri-overlay,
            .badge-kat,
            .galeri-overlay h4,
            .tanggal-chip {
                transition: none;
                transform: none;
            }

            .back-top {
                transition: none;
            }

            html {
                scroll-behavior: auto;
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

            <a href="{{ url('/galeri') }}" class="active">Galeri</a>

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

            <div class="breadcrumb">
                Beranda &nbsp;•&nbsp; <b>Galeri</b>
            </div>

            <span class="hero-label">
                Dokumentasi Kegiatan
            </span>

            <h1 class="hero-title">
                GALERI <span>KEGIATAN</span>
            </h1>

            <p class="hero-subtitle">
                Momen berharga perjalanan siswa SMK INFOKOM Bogor:
                upacara, kunjungan industri, prestasi, hingga kegiatan
                seru lainnya. Klik foto untuk melihat lebih dekat!
            </p>

        </div>

    </section>

    <!-- STATISTIK -->

    <section class="stats">

        <div class="stat-item">

            <div class="stat-icon">📸</div>

            <div>
                <div class="stat-number" data-count="{{ $galeris->count() }}" data-suffix="+">0</div>
                <div class="stat-label">Kegiatan</div>
                <div class="stat-small">Terdokumentasi</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">🗂</div>

            <div>
                <div class="stat-number" data-count="6" data-suffix="">0</div>
                <div class="stat-label">Kategori</div>
                <div class="stat-small">Upacara · Industri · Prestasi</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">📅</div>

            <div>
                <div class="stat-number" data-count="2025" data-suffix="" data-plain="1">0</div>
                <div class="stat-label">Tahun Dokumentasi</div>
                <div class="stat-small">Terbaru & Terkini</div>
            </div>

        </div>

        <div class="stat-item">

            <div class="stat-icon">🖼</div>

            <div>
                <div class="stat-number" data-count="1000" data-suffix="+">0</div>
                <div class="stat-label">Foto Diarsipkan</div>
                <div class="stat-small">Sepanjang Tahun</div>
            </div>

        </div>

    </section>

    <!-- NAVIGASI TAB STICKY -->

    <nav class="galeri-nav" id="galeriNav">

        <button type="button" class="galeri-tab is-active" data-filter="semua">
            ⭐ Semua
        </button>

        <button type="button" class="galeri-tab" data-filter="upacara">
            🎖 Upacara
        </button>

        <button type="button" class="galeri-tab" data-filter="industri">
            🏭 Industri
        </button>

        <button type="button" class="galeri-tab" data-filter="kegiatan">
            🎉 Kegiatan
        </button>

        <button type="button" class="galeri-tab" data-filter="prestasi">
            🏆 Prestasi
        </button>

        <button type="button" class="galeri-tab" data-filter="seminar">
            🎤 Seminar
        </button>

    </nav>

    <!-- GRID GALERI -->

    <section class="galeri-wrap">

        <div class="galeri-grid">

            @forelse($galeris as $i => $galeri)

            <figure class="galeri-item pop"
                style="--d: {{ $i * 0.1 }}s; --warna: {{ $galeri->warna_kategori['utama'] }}; --warna-2: {{ $galeri->warna_kategori['muda'] }};"
                data-kategori="{{ $galeri->kategori }}"
                data-nama="{{ $galeri->judul }}"
                data-tanggal="{{ $galeri->tanggal_indo }}">

                <img src="{{ $galeri->url_foto }}" alt="{{ $galeri->judul }}">

                <span class="zoom-badge">🔍</span>

                <figcaption class="galeri-overlay">

                    <span class="badge-kat">{{ $galeri->label_kategori }}</span>

                    <h4>{{ $galeri->judul }}</h4>

                    <span class="tanggal-chip">📅 {{ $galeri->tanggal_indo }}</span>

                </figcaption>

            </figure>

            @empty

            <div class="galeri-kosong">

                <span class="kosong-icon">📭</span>

                <h3>Belum ada foto</h3>

                <p>
                    Dokumentasi kegiatan akan segera hadir.
                </p>

            </div>

            @endforelse

        </div>

    </section>

    <!-- CTA PPDB -->

    <section class="cta-ppdb reveal">

        <div>
            <h3>Mau jadi bagian dari momen seru ini?</h3>
            <p>
                Bergabunglah bersama keluarga besar SMK INFOKOM Bogor
                dan ciptakan kenangan tak terlupakan bersama kami.
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

    <!-- LIGHTBOX -->

    <div class="lightbox" id="lightbox">

        <button type="button" class="lb-btn lb-close" id="lbClose" title="Tutup">✕</button>

        <button type="button" class="lb-btn lb-prev" id="lbPrev" title="Sebelumnya">‹</button>

        <button type="button" class="lb-btn lb-next" id="lbNext" title="Berikutnya">›</button>

        <div class="lightbox-stage">

            <img class="lightbox-img" id="lbImg" src="" alt="">

            <div class="lightbox-caption" id="lbCaption">

                <h4 id="lbNama"></h4>

                <p id="lbTanggal"></p>

                <span class="lb-kat" id="lbKategori"></span>

            </div>

        </div>

        <div class="lb-count" id="lbCount">1 / 10</div>

    </div>

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

            /* ---------- COUNTER STATISTIK ---------- */

            var counters = document.querySelectorAll('.stat-number');

            if ('IntersectionObserver' in window && counters.length) {

                var pengamatCounter = new IntersectionObserver(function (entries) {

                    entries.forEach(function (entry) {

                        if (!entry.isIntersecting) return;

                        var el = entry.target;

                        var target = parseInt(el.dataset.count, 10) || 0;

                        var suffix = el.dataset.suffix || '';

                        var durasi = 1400;

                        var mulai = performance.now();

                        function tick(now) {

                            var p = Math.min((now - mulai) / durasi, 1);

                        var nilai = Math.floor(target * (1 - Math.pow(1 - p, 3)));

                        var teks = el.dataset.plain === '1'
                            ? String(nilai)
                            : nilai.toLocaleString('id-ID');

                        el.textContent = teks + suffix;

                        if (p < 1) requestAnimationFrame(tick);

                        }

                        requestAnimationFrame(tick);

                        pengamatCounter.unobserve(el);

                    });

                }, { threshold: 0.4 });

                counters.forEach(function (el) {
                    pengamatCounter.observe(el);
                });

            }

            /* ---------- FILTER TAB KATEGORI ---------- */

            var tabs = document.querySelectorAll('.galeri-tab');

            var items = document.querySelectorAll('.galeri-item');

            var teksKategori = {
                'upacara': '🎖 Upacara',
                'industri': '🏭 Industri',
                'kegiatan': '🎉 Kegiatan',
                'prestasi': '🏆 Prestasi',
                'seminar': '🎤 Seminar'
            };

            tabs.forEach(function (tab) {

                tab.addEventListener('click', function () {

                    tabs.forEach(function (t) {
                        t.classList.remove('is-active');
                    });

                    tab.classList.add('is-active');

                    var pilih = tab.getAttribute('data-filter');

                    var indeksDelay = 0;

                    items.forEach(function (item) {

                        var cocok =
                            pilih === 'semua' ||
                            item.getAttribute('data-kategori') === pilih;

                        item.classList.toggle('is-hidden', !cocok);

                        if (cocok) {

                            /* mainkan ulang pop dengan stagger ulang */

                            item.classList.remove('pop-in', 'pop-done');

                            item.style.setProperty('--d', (indeksDelay * 0.08) + 's');

                            void item.offsetWidth;

                            item.classList.add('pop-in');

                            item.addEventListener('animationend', function handler() {

                                item.classList.remove('pop-in');
                                item.classList.add('pop-done');

                                item.removeEventListener('animationend', handler);

                            }, { once: true });

                            indeksDelay++;

                        }

                    });

                });

            });

            /* ---------- LIGHTBOX ---------- */

            var lightbox = document.getElementById('lightbox');

            var lbImg = document.getElementById('lbImg');

            var lbNama = document.getElementById('lbNama');

            var lbTanggal = document.getElementById('lbTanggal');

            var lbKategori = document.getElementById('lbKategori');

            var lbCount = document.getElementById('lbCount');

            var daftarAktif = [];

            var posisi = 0;

            function isiLightbox() {

                var item = daftarAktif[posisi];

                var img = item.querySelector('img');

                lbImg.src = img.src;

                lbImg.alt = item.dataset.nama;

                lbNama.textContent = item.dataset.nama;

                lbTanggal.textContent = '📅 ' + item.dataset.tanggal;

                var kat = item.dataset.kategori;

                lbKategori.textContent = teksKategori[kat] || kat;

                lbCount.textContent = (posisi + 1) + ' / ' + daftarAktif.length;

            }

            function bukaLightbox(item) {

                daftarAktif = Array.prototype.slice.call(
                    document.querySelectorAll('.galeri-item:not(.is-hidden)')
                );

                posisi = daftarAktif.indexOf(item);

                isiLightbox();

                lightbox.classList.add('terbuka');

                document.body.style.overflow = 'hidden';

            }

            function tutupLightbox() {

                lightbox.classList.remove('terbuka');

                document.body.style.overflow = '';

            }

            function navigasi(langkah) {

                posisi = (posisi + langkah + daftarAktif.length) % daftarAktif.length;

                var img = lbImg;

                /* animasi kecil saat berganti foto */

                img.style.opacity = '0';

                img.style.transform = 'scale(0.96)';

                setTimeout(function () {

                    isiLightbox();

                    img.style.transition = 'opacity 0.3s, transform 0.3s';

                    img.style.opacity = '1';

                    img.style.transform = 'scale(1)';

                }, 150);

            }

            items.forEach(function (item) {

                item.addEventListener('click', function () {

                    bukaLightbox(item);

                });

            });

            document.getElementById('lbClose').addEventListener('click', tutupLightbox);

            document.getElementById('lbPrev').addEventListener('click', function () {
                navigasi(-1);
            });

            document.getElementById('lbNext').addEventListener('click', function () {
                navigasi(1);
            });

            /* klik area gelap = tutup */

            lightbox.addEventListener('click', function (e) {

                if (e.target === lightbox) {
                    tutupLightbox();
                }

            });

            /* keyboard: ESC, panah kiri/kanan */

            document.addEventListener('keydown', function (e) {

                if (!lightbox.classList.contains('terbuka')) return;

                if (e.key === 'Escape') {
                    tutupLightbox();
                }

                if (e.key === 'ArrowLeft') {
                    navigasi(-1);
                }

                if (e.key === 'ArrowRight') {
                    navigasi(1);
                }

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