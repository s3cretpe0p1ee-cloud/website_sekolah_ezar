<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jurusan - SMK INFOKOM Bogor</title>

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

            max-width: 620px;
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

            animation: masuk 0.8s var(--ease-halus) both;
        }

        .hero-title {
            font-size: clamp(36px, 4.6vw, 56px);
            font-weight: 900;
            line-height: 1;

            text-transform: uppercase;
            letter-spacing: -1px;

            animation: masuk 0.9s var(--ease-halus) 0.15s both;
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
            margin-top: 12px;

            font-size: 15px;

            color: rgba(255, 255, 255, 0.88);

            max-width: 480px;
            line-height: 1.55;

            animation: masuk 0.9s var(--ease-halus) 0.3s both;
        }

        .hero-stats {
            display: flex;
            gap: 12px;

            margin-top: 24px;

            animation: masuk 0.9s var(--ease-halus) 0.45s both;
        }

        .hero-chip {
            background: rgba(255, 255, 255, 0.12);

            border: 1px solid rgba(255, 255, 255, 0.25);

            backdrop-filter: blur(6px);

            padding: 10px 18px;
            border-radius: 30px;

            font-size: 12px;
            font-weight: bold;
        }

        .hero-chip em {
            color: var(--kuning);
            font-style: normal;
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
           NAVIGASI TAB STICKY
        ========================= */

        .jurusan-nav {
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

        .jurusan-tab {
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

        .jurusan-tab:hover {
            border-color: var(--biru);
            color: var(--biru);

            transform: translateY(-2px);
        }

        .jurusan-tab.is-active {
            background: var(--biru);

            border-color: var(--biru);
            color: white;

            box-shadow: 0 6px 14px rgba(18, 100, 207, 0.35);
        }

        /* =========================
           LAYOUT SECTION
        ========================= */

        .jurusan-section {
            width: 87%;

            margin: 55px auto 0;

            scroll-margin-top: 90px;
        }

        .jurusan-card {
            background: white;

            border-radius: 20px;

            overflow: hidden;

            box-shadow: 0 4px 18px rgba(16, 43, 92, 0.08);

            display: grid;
            grid-template-columns: 0.9fr 1.1fr;

            position: relative;
        }

        /* garis warna khas jurusan di tepi kiri */

        .jurusan-card::before {
            content: "";

            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;

            width: 5px;

            background: var(--warna, var(--biru));

            z-index: 1;
        }

        /* sisi kiri: identitas jurusan */

        .jurusan-identitas {
            padding: 38px 30px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;

            gap: 16px;

            background:
                radial-gradient(
                    circle at 50% 120%,
                    var(--warna-soft, rgba(18, 100, 207, 0.12)) 0%,
                    transparent 60%
                ),
                linear-gradient(180deg, #f8fbff, #ffffff);
        }

        .jurusan-logo {
            width: 120px;
            height: 120px;

            position: relative;
        }

        /* cincin dashed berputar */

        .jurusan-logo::before {
            content: "";

            position: absolute;
            inset: -10px;

            border-radius: 50%;

            border: 2px dashed var(--warna, var(--biru));

            opacity: 0.55;

            animation: putar 16s linear infinite;
        }

        @keyframes putar {
            to {
                transform: rotate(360deg);
            }
        }

        /* halo glow lembut */

        .jurusan-logo::after {
            content: "";

            position: absolute;
            inset: -4px;

            border-radius: 50%;

            background: radial-gradient(
                circle,
                var(--warna-soft, rgba(18, 100, 207, 0.16)) 0%,
                transparent 70%
            );

            animation: denyut 3.2s ease-in-out infinite;
        }

        @keyframes denyut {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.7;
            }

            50% {
                transform: scale(1.15);
                opacity: 1;
            }
        }

        .jurusan-foto img {
            width: 100%;
            height: 100%;
            object-fit: contain;

            pointer-events: none;
        }

        .jurusan-badge {
            width: 92px;
            height: 92px;

            position: relative;
            z-index: 2;

            border-radius: 26px;

            background: linear-gradient(135deg, var(--warna, var(--biru)), var(--warna-2, var(--biru)));

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 34px;

            cursor: pointer;

            box-shadow: 0 14px 28px var(--warna-shadow, rgba(18, 100, 207, 0.35));

            animation: mengambang 4s ease-in-out infinite;
        }

        @keyframes mengambang {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-9px);
            }

        }

        .jurusan-card:hover .jurusan-badge {
            animation-play-state: paused;

            transform: rotate(-8deg) scale(1.1);
        }

        .jurusan-kode {
            font-size: 26px;
            font-weight: 900;

            color: var(--navy);

            letter-spacing: 1px;
        }

        .jurusan-nama {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5px;

            color: var(--warna, var(--biru));

            line-height: 1.5;
        }

        .jurusan-roster {
            display: flex;
            gap: 8px;

            flex-wrap: wrap;
            justify-content: center;
        }

        .roster-chip {
            background: white;

            border: 1px solid #e4eaf5;

            color: #51617a;

            padding: 5px 12px;
            border-radius: 14px;

            font-size: 10.5px;
            font-weight: bold;
        }

        .info-tags {
            display: flex;
            gap: 7px;

            flex-wrap: wrap;
            justify-content: center;
        }

        /* sisi kanan: detail jurusan */

        .jurusan-detail {
            padding: 38px 34px;
        }

        .jurusan-detail h3 {
            font-size: 17px;

            color: var(--navy);

            display: flex;
            align-items: center;
            gap: 8px;
        }

        .jurusan-detail > p {
            margin-top: 10px;

            font-size: 13.5px;
            line-height: 1.7;

            color: #5a6b85;
        }

        .kompetensi-list {
            margin-top: 18px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 10px;
        }

        .kompetensi-item {
            display: flex;
            align-items: center;
            gap: 10px;

            background: #f6f9fe;

            border: 1px solid #e8eef8;

            border-radius: 12px;

            padding: 11px 14px;

            font-size: 12px;
            font-weight: bold;

            color: #33445f;

            transition: transform 0.3s var(--ease-halus), border-color 0.3s, box-shadow 0.3s;
        }

        .kompetensi-item:hover {
            transform: translateY(-3px) scale(1.02);

            border-color: var(--warna, var(--biru));

            box-shadow: 0 8px 18px var(--warna-shadow, rgba(18, 100, 207, 0.2));
        }

        .kompetensi-item .ki-icon {
            width: 30px;
            height: 30px;

            flex-shrink: 0;

            border-radius: 9px;

            background: var(--warna-soft, rgba(18, 100, 207, 0.12));

            color: var(--warna, var(--biru));

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
        }

        /* karir & prospek */

        .karir-box {
            margin-top: 20px;

            background: linear-gradient(120deg, #f2f7ff, #eef4ff);

            border: 1px dashed var(--warna, var(--biru));

            border-radius: 14px;

            padding: 15px 18px;
        }

        .karir-box h4 {
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;

            color: var(--warna, var(--biru));
        }

        .karir-tags {
            margin-top: 10px;

            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .karir-tag {
            background: white;

            border: 1px solid #dfe7f3;

            padding: 5px 12px;
            border-radius: 15px;

            font-size: 11px;
            font-weight: bold;

            color: #33445f;

            transition: 0.25s var(--ease-halus);
        }

        .karir-tag:hover {
            background: var(--warna, var(--biru));
            border-color: var(--warna, var(--biru));

            color: white;

            transform: translateY(-2px);
        }

        /* =========================
           CTA PPDB
        ========================= */

        .cta-ppdb {
            width: 87%;

            margin: 55px auto 60px;

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

        /* lingkaran dekoratif transparan */

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

        .kompetensi-item.pop {
            transform: scale(0.4) translateY(30px);
        }

        .kompetensi-item.pop.pop-in {
            animation: popupKecil 0.55s var(--ease-halus) forwards;
        }

        @keyframes popupKecil {

            0% {
                opacity: 0;
                transform: scale(0.4) translateY(30px);
            }

            65% {
                opacity: 1;
                transform: scale(1.08) translateY(-3px);
            }

            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }

        }

        /* stagger delay via inline style --d */

        .pop.pop-in,
        .kompetensi-item.pop.pop-in {
            animation-delay: var(--d, 0s);
        }

        .pop-done,
        .kompetensi-item.pop-done {
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

            .jurusan-card {
                grid-template-columns: 1fr;
            }

            .jurusan-identitas {
                padding: 30px 22px 24px;
            }

            .jurusan-detail {
                padding: 26px 22px 30px;
            }

            .kompetensi-list {
                grid-template-columns: 1fr;
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
                padding: 110px 7% 55px;
            }

            .hero-stats {
                flex-wrap: wrap;
            }

            .jurusan-section {
                width: 92%;
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
            .pop.pop-in,
            .kompetensi-item.pop,
            .kompetensi-item.pop.pop-in {
                opacity: 1;
                transform: none;
                animation: none;
                transition: none;
            }

            .hero-title span,
            .orb,
            .nilai-track,
            .jurusan-logo::before,
            .jurusan-logo::after,
            .jurusan-badge {
                animation: none;
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
                <a href="{{ url('/jurusan') }}" class="active">Jurusan <span class="panah">▾</span></a>
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

            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>

        </div>

        <div class="hero-content">

            <span class="hero-label">
                Program Keahlian
            </span>

            <h1 class="hero-title">
                Pilih <span>Masa Depan</span>mu
            </h1>

            <p class="hero-subtitle">
                Empat program keahlian unggulan dengan kurikulum industri
                terkini, guru profesional, dan kemitraan perusahaan —
                semuanya untuk bekal karirmu.
            </p>

            <div class="hero-stats">

                <span class="hero-chip">
                    🎓 <em>4</em> Program Keahlian
                </span>

                <span class="hero-chip">
                    🏢 <em>50+</em> Mitra Industri
                </span>

                <span class="hero-chip">
                    💼 <em>98%</em> Serapan Lulusan
                </span>

            </div>

        </div>

    </section>

    <!-- NAVIGASI TAB STICKY -->

    <nav class="jurusan-nav" id="jurusanNav">

        <a href="#rpl" class="jurusan-tab" data-tab="rpl">⌨ RPL</a>
        <a href="#tkj" class="jurusan-tab" data-tab="tkj">🌐 TKJ</a>
        <a href="#dkv" class="jurusan-tab" data-tab="dkv">🎨 DKV</a>
        <a href="#pspt" class="jurusan-tab" data-tab="pspt">🎬 PSPT</a>

    </nav>

    <!-- RPL -->

    <section class="jurusan-section" id="rpl"
        style="--warna: #2563eb; --warna-2: #60a5fa; --warna-soft: rgba(37, 99, 235, 0.12); --warna-shadow: rgba(37, 99, 235, 0.35);">

        <div class="jurusan-card reveal">

            <div class="jurusan-identitas">

                <div class="jurusan-logo">

                    <div class="jurusan-badge">⌨</div>

                </div>

                <div>
                    <div class="jurusan-kode">RPL</div>
                    <div class="jurusan-nama">
                        Rekayasa<br>Perangkat Lunak
                    </div>
                </div>

                <div class="jurusan-roster">
                    <span class="roster-chip">⭐ Akreditasi A</span>
                    <span class="roster-chip">👥 3 Kelas</span>
                </div>

                <div class="info-tags">
                    <span class="karir-tag">3 Tahun</span>
                    <span class="karir-tag">Double Skill</span>
                </div>

            </div>

            <div class="jurusan-detail">

                <h3>⌨ Rekayasa Perangkat Lunak</h3>

                <p>
                    Jurusan yang mempelajari pemrograman, pengembangan
                    aplikasi web dan mobile, basis data, hingga pengujian
                    perangkat lunak. Siswa dibimbing membangun proyek nyata
                    dengan teknologi industri terkini.
                </p>

                <div class="kompetensi-list">

                    <div class="kompetensi-item pop" style="--d: 0.05s">
                        <span class="ki-icon">🖥</span> Pemrograman Web
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.12s">
                        <span class="ki-icon">📱</span> Aplikasi Mobile
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.19s">
                        <span class="ki-icon">🗄</span> Basis Data
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.26s">
                        <span class="ki-icon">🧪</span> Testing & QA
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.33s">
                        <span class="ki-icon">🧠</span> Algoritma & Pemrograman
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.4s">
                        <span class="ki-icon">🚀</span> Framework Modern
                    </div>

                </div>

                <div class="karir-box">

                    <h4>💼 Prospek Karir</h4>

                    <div class="karir-tags">

                        <span class="karir-tag">Web Developer</span>
                        <span class="karir-tag">Mobile Developer</span>
                        <span class="karir-tag">Software Engineer</span>
                        <span class="karir-tag">Database Admin</span>
                        <span class="karir-tag">IT Support</span>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- TKJ -->

    <section class="jurusan-section" id="tkj"
        style="--warna: #0d9488; --warna-2: #2dd4bf; --warna-soft: rgba(13, 148, 136, 0.12); --warna-shadow: rgba(13, 148, 136, 0.35);">

        <div class="jurusan-card reveal">

            <div class="jurusan-identitas">

                <div class="jurusan-logo">

                    <div class="jurusan-badge">🌐</div>

                </div>

                <div>
                    <div class="jurusan-kode">TKJ</div>
                    <div class="jurusan-nama">
                        Teknik Komputer<br>& Jaringan
                    </div>
                </div>

                <div class="jurusan-roster">
                    <span class="roster-chip">⭐ Akreditasi A</span>
                    <span class="roster-chip">👥 3 Kelas</span>
                </div>

                <div class="info-tags">
                    <span class="karir-tag">3 Tahun</span>
                    <span class="karir-tag">Sertifikasi BNSP</span>
                </div>

            </div>

            <div class="jurusan-detail">

                <h3>🌐 Teknik Komputer & Jaringan</h3>

                <p>
                    Mempelajari instalasi jaringan, administrasi server,
                    keamanan siber dasar, dan troubleshooting perangkat.
                    Siswa praktik langsung dengan perangkat Cisco, Mikrotik,
                    dan server fisik di lab sekolah.
                </p>

                <div class="kompetensi-list">

                    <div class="kompetensi-item pop" style="--d: 0.05s">
                        <span class="ki-icon">🔌</span> Instalasi Jaringan
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.12s">
                        <span class="ki-icon">🖥</span> Administrasi Server
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.19s">
                        <span class="ki-icon">🛡</span> Keamanan Jaringan
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.26s">
                        <span class="ki-icon">🛠</span> Troubleshooting
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.33s">
                        <span class="ki-icon">☁</span> Cloud & Virtualisasi
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.4s">
                        <span class="ki-icon">📡</span> Wireless & Fiber Optic
                    </div>

                </div>

                <div class="karir-box">

                    <h4>💼 Prospek Karir</h4>

                    <div class="karir-tags">

                        <span class="karir-tag">Network Engineer</span>
                        <span class="karir-tag">System Administrator</span>
                        <span class="karir-tag">IT Support</span>
                        <span class="karir-tag">Technician</span>
                        <span class="karir-tag">Cyber Security</span>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- DKV -->

    <section class="jurusan-section" id="dkv"
        style="--warna: #d97706; --warna-2: #fbbf24; --warna-soft: rgba(217, 119, 6, 0.12); --warna-shadow: rgba(217, 119, 6, 0.35);">

        <div class="jurusan-card reveal">

            <div class="jurusan-identitas">

                <div class="jurusan-logo">

                    <div class="jurusan-badge">🎨</div>

                </div>

                <div>
                    <div class="jurusan-kode">DKV</div>
                    <div class="jurusan-nama">
                        Desain Komunikasi<br>Visual
                    </div>
                </div>

                <div class="jurusan-roster">
                    <span class="roster-chip">⭐ Akreditasi A</span>
                    <span class="roster-chip">👥 2 Kelas</span>
                </div>

                <div class="info-tags">
                    <span class="karir-tag">3 Tahun</span>
                    <span class="karir-tag">Studio Kreatif</span>
                </div>

            </div>

            <div class="jurusan-detail">

                <h3>🎨 Desain Komunikasi Visual</h3>

                <p>
                    Mengasah kreativitas dalam desain grafis, ilustrasi,
                    fotografi, videografi, dan multimedia. Siswa terbiasa
                    dengan software industri seperti Photoshop, Illustrator,
                    dan Premiere untuk menghasilkan karya nyata.
                </p>

                <div class="kompetensi-list">

                    <div class="kompetensi-item pop" style="--d: 0.05s">
                        <span class="ki-icon">🖌</span> Desain Grafis
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.12s">
                        <span class="ki-icon">📷</span> Fotografi
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.19s">
                        <span class="ki-icon">🎬</span> Videografi
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.26s">
                        <span class="ki-icon">🎭</span> Ilustrasi Digital
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.33s">
                        <span class="ki-icon">📺</span> Multimedia
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.4s">
                        <span class="ki-icon">✏</span> UI/UX Dasar
                    </div>

                </div>

                <div class="karir-box">

                    <h4>💼 Prospek Karir</h4>

                    <div class="karir-tags">

                        <span class="karir-tag">Graphic Designer</span>
                        <span class="karir-tag">Videographer</span>
                        <span class="karir-tag">Fotografer</span>
                        <span class="karir-tag">Ilustrator</span>
                        <span class="karir-tag">UI Designer</span>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- PSPT -->

    <section class="jurusan-section" id="pspt"
        style="--warna: #c026d3; --warna-2: #e879f9; --warna-soft: rgba(192, 38, 211, 0.12); --warna-shadow: rgba(192, 38, 211, 0.35);">

        <div class="jurusan-card reveal">

            <div class="jurusan-identitas">

                <div class="jurusan-logo">

                    <div class="jurusan-badge">🎬</div>

                </div>

                <div>
                    <div class="jurusan-kode">PSPT</div>
                    <div class="jurusan-nama">
                        Siaran & Perfilman<br>Terapan
                    </div>
                </div>

                <div class="jurusan-roster">
                    <span class="roster-chip">⭐ Program Baru</span>
                    <span class="roster-chip">👥 1 Kelas</span>
                </div>

                <div class="info-tags">
                    <span class="karir-tag">3 Tahun</span>
                    <span class="karir-tag">Studio Broadcast</span>
                </div>

            </div>

            <div class="jurusan-detail">

                <h3>🎬 Siaran & Perfilman Terapan</h3>

                <p>
                    Program keahlian baru yang mempelajari produksi siaran,
                    pembuatan film, penyiaran, editing video, dan motion
                    graphic. Siswa belajar di studio broadcast sekolah
                    dengan peralatan standar industri kreatif.
                </p>

                <div class="kompetensi-list">

                    <div class="kompetensi-item pop" style="--d: 0.05s">
                        <span class="ki-icon">🎙</span> Teknik Penyiaran
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.12s">
                        <span class="ki-icon">🎥</span> Produksi Film
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.19s">
                        <span class="ki-icon">✂</span> Editing Video
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.26s">
                        <span class="ki-icon">🌟</span> Motion Graphic
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.33s">
                        <span class="ki-icon">📻</span> Produksi Podcast
                    </div>

                    <div class="kompetensi-item pop" style="--d: 0.4s">
                        <span class="ki-icon">🔊</span> Audio Engineering
                    </div>

                </div>

                <div class="karir-box">

                    <h4>💼 Prospek Karir</h4>

                    <div class="karir-tags">

                        <span class="karir-tag">Video Editor</span>
                        <span class="karir-tag">Penyiar</span>
                        <span class="karir-tag">Content Creator</span>
                        <span class="karir-tag">Sinematografer</span>
                        <span class="karir-tag">Sound Engineer</span>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA PPDB -->

    <section class="cta-ppdb reveal">

        <div>
            <h3>Tertarik dengan salah satu jurusan?</h3>
            <p>
                Bergabunglah bersama keluarga besar SMK INFOKOM Bogor
                dan raih masa depanmu di dunia teknologi & kreatif.
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

            /* ---------- TAB SCROLLSPY ---------- */

            var tabs = Array.prototype.slice.call(
                document.querySelectorAll('.jurusan-tab')
            );

            var sections = Array.prototype.slice.call(
                document.querySelectorAll('.jurusan-section')
            );

            function aktifkanTab(id) {

                tabs.forEach(function (tab) {

                    tab.classList.toggle('is-active', tab.getAttribute('data-tab') === id);

                });

            }

            if ('IntersectionObserver' in window && sections.length) {

                var pengamatSection = new IntersectionObserver(function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {
                            aktifkanTab(entry.target.id);
                        }

                    });

                }, { rootMargin: '-25% 0px -60% 0px' });

                sections.forEach(function (section) {
                    pengamatSection.observe(section);
                });

            }

            tabs.forEach(function (tab) {

                tab.addEventListener('click', function () {
                    aktifkanTab(tab.getAttribute('data-tab'));
                });

            });

            /* ---------- KLIK LOGO = KONFETI EMOJI ---------- */

            var warnaKonfeti = ['#ffe000', '#0780df', '#0d9488', '#c026d3', '#d97706'];

            var bentukKonfeti = ['✦', '★', '●', '◆', '✧'];

            document.querySelectorAll('.jurusan-badge').forEach(function (badge) {

                badge.addEventListener('click', function () {

                    var rect = badge.getBoundingClientRect();

                    var cx = rect.left + rect.width / 2;
                    var cy = rect.top + rect.height / 2;

                    for (var i = 0; i < 16; i++) {

                        buatPartikel(cx, cy, i);

                    }

                });

            });

            function buatPartikel(x, y, i) {

                var p = document.createElement('span');

                p.textContent = bentukKonfeti[i % bentukKonfeti.length];

                p.style.position = 'fixed';
                p.style.left = x + 'px';
                p.style.top = y + 'px';

                p.style.color = warnaKonfeti[i % warnaKonfeti.length];

                p.style.fontSize = (10 + Math.random() * 12) + 'px';

                p.style.pointerEvents = 'none';
                p.style.zIndex = '999';

                p.style.transition = 'transform 0.9s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.9s';

                document.body.appendChild(p);

                requestAnimationFrame(function () {

                    p.style.transform =
                        'translate(' + ((Math.random() - 0.5) * 280) + 'px, ' +
                        (-(60 + Math.random() * 150)) + 'px) rotate(' +
                        ((Math.random() - 0.5) * 400) + 'deg)';

                    p.style.opacity = '0';

                });

                setTimeout(function () {

                    if (p.parentNode) {
                        p.parentNode.removeChild(p);
                    }

                }, 1000);

            }

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