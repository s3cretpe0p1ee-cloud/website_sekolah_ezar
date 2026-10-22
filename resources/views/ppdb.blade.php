<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PPDB - SMK INFOKOM Bogor</title>

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

            animation: turun 0.8s var(--ease-halus) both;
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

            padding: 150px 10% 120px;

            overflow: hidden;
        }

        .hero .orb {
            position: absolute;

            border-radius: 50%;

            animation: melayang 7s ease-in-out infinite;

            transition: translate 0.4s var(--ease-halus);
        }

        .hero .orb-1 {
            width: 240px;
            height: 240px;

            right: 7%;
            top: 10%;

            background: radial-gradient(
                circle,
                rgba(255, 224, 0, 0.2),
                transparent 65%
            );
        }

        .hero .orb-2 {
            width: 150px;
            height: 150px;

            right: 27%;
            bottom: 6%;

            border: 2px solid rgba(255, 255, 255, 0.18);

            animation-delay: 1.6s;
        }

        .hero .orb-3 {
            width: 74px;
            height: 74px;

            right: 15%;
            bottom: 32%;

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
            font-size: clamp(40px, 5.4vw, 66px);
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

            margin-top: 24px;

            animation: masuk 0.9s var(--ease-halus) 0.5s both;
        }

        .btn-gold {
            background: #ffe000;
            color: #111;

            padding: 13px 26px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;

            box-shadow: 0 8px 18px rgba(255, 217, 0, 0.35);

            transition: 0.25s var(--ease-halus);

            position: relative;
            overflow: hidden;
        }

        .btn-gold::after {
            content: "";

            position: absolute;
            top: 0;
            left: -80%;

            width: 50%;
            height: 100%;

            background: linear-gradient(
                100deg,
                transparent,
                rgba(255, 255, 255, 0.55),
                transparent
            );

            transform: skewX(-20deg);

            transition: left 0.6s ease;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
        }

        .btn-gold:hover::after {
            left: 130%;
        }

        .btn-ghost {
            border: 2px solid rgba(255, 255, 255, 0.8);
            color: white;

            padding: 11px 22px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;

            transition: 0.25s var(--ease-halus);
        }

        .btn-ghost:hover {
            background: white;
            color: #0a3d80;
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
           COUNTDOWN
        ========================= */

        .countdown-band {
            position: relative;
            z-index: 3;

            margin: -55px auto 0;

            width: min(860px, 87%);

            background: white;
            border-radius: 20px;

            padding: 24px 28px;

            box-shadow: 0 12px 34px rgba(0, 0, 0, 0.16);

            text-align: center;

            animation: masuk 0.9s var(--ease-halus) 0.65s both;
        }

        .countdown-band .judul {
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;

            color: #7b8aa5;
        }

        .countdown-band h3 {
            margin-top: 6px;

            font-size: 19px;
            color: #123b78;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 12px;

            margin-top: 18px;
        }

        .count-box {
            min-width: 78px;

            background: linear-gradient(160deg, #0a4da3, #1264cf);
            color: white;

            border-radius: 14px;

            padding: 12px 8px 10px;

            box-shadow: 0 8px 18px rgba(18, 100, 207, 0.3);

            transition: transform 0.25s var(--ease-halus);
        }

        .count-box:hover {
            transform: translateY(-4px);
        }

        .count-num {
            font-size: 26px;
            font-weight: 900;

            line-height: 1;

            font-variant-numeric: tabular-nums;
        }

        .count-label {
            margin-top: 6px;

            font-size: 9.5px;
            letter-spacing: 1.5px;
            text-transform: uppercase;

            opacity: 0.85;
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

            transform: scaleX(0);
            transform-origin: left;

            transition: transform 0.9s var(--ease-halus) 0.25s;
        }

        .section-head.in-view h2::after {
            transform: scaleX(1);
        }

        .section-head.center h2::after {
            transform-origin: center;

            margin-left: auto;
            margin-right: auto;
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

        .section-head.center .section-desc {
            margin-left: auto;
            margin-right: auto;
        }

        .section-head .kicker,
        .section-head h2,
        .section-head .section-desc {
            opacity: 0;
            transform: translateY(22px);

            transition:
                opacity 0.7s var(--ease-halus),
                transform 0.7s var(--ease-halus);
        }

        .section-head h2 {
            transition-delay: 0.1s;
        }

        .section-head .section-desc {
            transition-delay: 0.2s;
        }

        .section-head.in-view .kicker,
        .section-head.in-view h2,
        .section-head.in-view .section-desc {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================
           ALUR / TIMELINE
        ========================= */

        .timeline {
            position: relative;

            max-width: 860px;

            margin: 0 auto;

            padding: 10px 0;
        }

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

        .timeline-item:nth-child(even) .timeline-dot {
            right: auto;
            left: -9px;
        }

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

        .timeline-item .timeline-card {
            opacity: 0;
            transform: translateY(32px) scale(0.96);

            transition:
                opacity 0.75s var(--ease-halus),
                transform 0.75s var(--ease-halus);
        }

        .timeline-item:nth-child(even) .timeline-card {
            transform: translate(36px, 20px) scale(0.96);
        }

        .timeline-item.in-view .timeline-card {
            opacity: 1;
            transform: translate(0, 0) scale(1);
        }

        .timeline-card:hover .timeline-dot {
            transform: scale(1.4);
        }

        .timeline-step {
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
           JALUR & SYARAT
        ========================= */

        .jalur-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));

            gap: 18px;
        }

        .jalur-card {
            position: relative;
            overflow: hidden;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 18px;

            padding: 26px 22px;

            box-shadow: 0 4px 16px rgba(16, 43, 92, 0.06);

            transition:
                transform 0.3s var(--ease-halus),
                box-shadow 0.3s ease;
        }

        .jalur-card::before {
            content: "";

            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;

            background: linear-gradient(90deg, #0752b9, #0780df);

            transform: scaleX(0);
            transform-origin: left;

            transition: transform 0.35s var(--ease-halus);
        }

        .jalur-card:hover {
            transform: translateY(-8px);

            box-shadow: 0 16px 32px rgba(16, 43, 92, 0.15);
        }

        .jalur-card:hover::before {
            transform: scaleX(1);
        }

        .jalur-icon {
            width: 58px;
            height: 58px;

            margin-bottom: 14px;

            background: linear-gradient(135deg, #e9f3ff, #f5f9ff);

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 26px;

            transition: transform 0.3s var(--ease-halus);
        }

        .jalur-card:hover .jalur-icon {
            transform: scale(1.12) rotate(-6deg);
        }

        .jalur-card h3 {
            font-size: 15px;
            color: #123b78;

            margin-bottom: 8px;
        }

        .jalur-card p {
            font-size: 12.5px;
            color: #64748b;

            line-height: 1.7;
        }

        /* =========================
           PERSYARATAN (CHECKLIST)
        ========================= */

        .syarat-box {
            background: white;

            border: 1px solid #edf1f8;
            border-radius: 20px;

            padding: 32px;

            box-shadow: 0 8px 28px rgba(16, 43, 92, 0.08);

            max-width: 760px;

            margin: auto;
        }

        .syarat-list {
            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 12px 26px;

            margin-top: 20px;
        }

        .syarat-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;

            opacity: 0;
            transform: translateX(-18px);

            transition:
                opacity 0.55s var(--ease-halus),
                transform 0.55s var(--ease-halus);
        }

        .syarat-box.in-view .syarat-item {
            opacity: 1;
            transform: translateX(0);
        }

        .syarat-box.in-view .syarat-item:nth-child(1) {
            transition-delay: 0.15s;
        }

        .syarat-box.in-view .syarat-item:nth-child(2) {
            transition-delay: 0.23s;
        }

        .syarat-box.in-view .syarat-item:nth-child(3) {
            transition-delay: 0.31s;
        }

        .syarat-box.in-view .syarat-item:nth-child(4) {
            transition-delay: 0.39s;
        }

        .syarat-box.in-view .syarat-item:nth-child(5) {
            transition-delay: 0.47s;
        }

        .syarat-box.in-view .syarat-item:nth-child(6) {
            transition-delay: 0.55s;
        }

        .syarat-box.in-view .syarat-item:nth-child(7) {
            transition-delay: 0.63s;
        }

        .syarat-box.in-view .syarat-item:nth-child(8) {
            transition-delay: 0.71s;
        }

        .cek {
            flex-shrink: 0;

            width: 24px;
            height: 24px;

            background: linear-gradient(135deg, #0a8f4d, #16b364);

            color: white;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 12px;
            font-weight: 900;

            box-shadow: 0 4px 10px rgba(22, 179, 100, 0.35);
        }

        .syarat-item p {
            font-size: 13px;
            color: #33456b;

            line-height: 1.6;

            padding-top: 2px;
        }

        /* =========================
           BIAYA / PAKET
        ========================= */

        .biaya-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));

            gap: 20px;

            max-width: 900px;

            margin: auto;
        }

        .biaya-card {
            position: relative;

            background: white;

            border: 2px solid #edf1f8;
            border-radius: 20px;

            padding: 30px 24px;

            text-align: center;

            box-shadow: 0 6px 22px rgba(16, 43, 92, 0.07);

            transition:
                transform 0.3s var(--ease-halus),
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .biaya-card:hover {
            transform: translateY(-8px);

            border-color: #bcd7f7;

            box-shadow: 0 18px 36px rgba(16, 43, 92, 0.15);
        }

        .biaya-card.unggul {
            border-color: #ffd900;

            box-shadow: 0 14px 34px rgba(255, 217, 0, 0.22);
        }

        .biaya-badge {
            position: absolute;
            top: -13px;
            left: 50%;

            transform: translateX(-50%);

            background: #ffd900;
            color: #111;

            padding: 5px 16px;
            border-radius: 20px;

            font-size: 10.5px;
            font-weight: 900;
            letter-spacing: 1px;

            box-shadow: 0 4px 10px rgba(255, 217, 0, 0.45);
        }

        .biaya-nama {
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;

            color: #8aa0c4;
        }

        .biaya-nominal {
            margin-top: 10px;

            font-size: 26px;
            font-weight: 900;
            color: #123b78;
        }

        .biaya-desc {
            margin-top: 8px;

            font-size: 12px;
            color: #64748b;

            line-height: 1.6;
        }

        .biaya-note {
            margin-top: 16px;

            padding-top: 14px;

            border-top: 1px dashed #dbe4f2;

            font-size: 10.5px;
            color: #8aa0c4;

            line-height: 1.6;
        }

        /* =========================
           FAQ
        ========================= */

        .faq-list {
            max-width: 760px;

            margin: auto;

            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .faq-item {
            background: white;

            border: 1px solid #edf1f8;
            border-radius: 14px;

            overflow: hidden;

            box-shadow: 0 3px 12px rgba(16, 43, 92, 0.06);

            transition: box-shadow 0.25s ease;
        }

        .faq-item:hover {
            box-shadow: 0 10px 24px rgba(16, 43, 92, 0.12);
        }

        .faq-q {
            width: 100%;

            background: none;
            border: none;

            padding: 17px 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;

            cursor: pointer;

            font-family: inherit;
            font-size: 13.5px;
            font-weight: bold;
            color: #123b78;

            text-align: left;
        }

        .faq-plus {
            flex-shrink: 0;

            width: 26px;
            height: 26px;

            background: #e9f3ff;
            color: #1264cf;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 15px;
            font-weight: 900;

            transition:
                transform 0.35s var(--ease-halus),
                background 0.25s ease,
                color 0.25s ease;
        }

        .faq-item.open .faq-plus {
            background: #ffd900;
            color: #111;

            transform: rotate(135deg);
        }

        .faq-a {
            max-height: 0;

            overflow: hidden;

            transition: max-height 0.45s var(--ease-halus);
        }

        .faq-a p {
            padding: 0 20px 17px;

            font-size: 12.5px;
            color: #64748b;

            line-height: 1.7;
        }

        /* =========================
           FORM PENDAFTARAN
        ========================= */

        .daftar-box {
            max-width: 860px;

            margin: auto;

            background: white;

            border: 1px solid #edf1f8;
            border-radius: 22px;

            padding: 36px 34px;

            box-shadow: 0 12px 34px rgba(16, 43, 92, 0.1);
        }

        /* stepper */

        .stepper {
            display: flex;
            justify-content: center;
            gap: 6px;

            margin-bottom: 30px;
        }

        .step-dot {
            display: flex;
            align-items: center;
            gap: 8px;

            font-size: 11px;
            font-weight: bold;
            color: #8aa0c4;

            padding: 8px 16px;
            border-radius: 20px;

            background: #f1f5fb;

            transition:
                background 0.35s var(--ease-halus),
                color 0.35s var(--ease-halus),
                transform 0.35s var(--ease-halus);
        }

        .step-num {
            width: 22px;
            height: 22px;

            background: #d7e2f2;
            color: #51617a;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 11px;
            font-weight: 900;

            transition: background 0.35s ease, color 0.35s ease;
        }

        .step-dot.aktif {
            background: #123b78;
            color: white;

            transform: scale(1.06);
        }

        .step-dot.aktif .step-num {
            background: #ffd900;
            color: #111;
        }

        .step-dot.selesai {
            background: #d9f5e7;
            color: #0a6b3d;
        }

        .step-dot.selesai .step-num {
            background: #16b364;
            color: white;
        }

        /* panel langkah */

        .form-step {
            display: none;

            animation: stepMasuk 0.5s var(--ease-halus) both;
        }

        .form-step.aktif {
            display: block;
        }

        @keyframes stepMasuk {
            from {
                opacity: 0;
                transform: translateX(34px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 16px 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 12px;
            font-weight: bold;
            color: #33456b;
        }

        .form-group label span {
            color: #e11d48;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;

            border: 2px solid #e4eaf5;
            border-radius: 12px;

            padding: 12px 14px;

            font-size: 13px;
            font-family: inherit;
            color: #102b5c;

            outline: none;

            background: #fbfdff;

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #1264cf;
            box-shadow: 0 0 0 4px rgba(18, 100, 207, 0.1);

            background: white;
        }

        .form-group input.salah {
            border-color: #e11d48;
            box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.1);
        }

        .pesan-salah {
            display: none;

            font-size: 11px;
            color: #e11d48;
        }

        .pesan-salah.tampil {
            display: block;
        }

        /* ringkasan */

        .ringkasan-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 22px;
        }

        .ringkasan-item {
            background: #f7faff;

            border: 1px solid #e9f0fa;
            border-radius: 12px;

            padding: 12px 14px;
        }

        .ringkasan-item small {
            display: block;

            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;

            color: #8aa0c4;
        }

        .ringkasan-item strong {
            display: block;

            margin-top: 4px;

            font-size: 13px;
            color: #123b78;

            word-break: break-word;
        }

        .peringatan-dummy {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-top: 20px;

            background: #fff8d6;
            border: 1px dashed #e8c93e;
            border-radius: 12px;

            padding: 12px 16px;

            font-size: 11.5px;
            color: #7a5c00;

            line-height: 1.5;
        }

        /* navigasi form */

        .form-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;

            margin-top: 28px;

            padding-top: 22px;

            border-top: 1px solid #edf1f8;
        }

        .btn-form {
            border: none;
            cursor: pointer;

            padding: 12px 26px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;
            font-family: inherit;

            transition: 0.25s var(--ease-halus);
        }

        .btn-form--kembali {
            background: #eef2f9;
            color: #51617a;
        }

        .btn-form--kembali:hover {
            background: #dfe7f3;
        }

        .btn-form--lanjut {
            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;

            box-shadow: 0 8px 18px rgba(18, 100, 207, 0.3);
        }

        .btn-form--lanjut:hover {
            transform: translateY(-2px);
        }

        .btn-form--kirim {
            background: #ffd900;
            color: #111;

            box-shadow: 0 8px 18px rgba(255, 217, 0, 0.4);
        }

        .btn-form--kirim:hover {
            transform: translateY(-2px);
        }

        /* layar sukses */

        .sukses-layar {
            display: none;

            text-align: center;

            padding: 30px 10px;
        }

        .sukses-layar.tampil {
            display: block;

            animation: stepMasuk 0.6s var(--ease-halus) both;
        }

        .sukses-icon {
            width: 86px;
            height: 86px;

            margin: 0 auto 18px;

            background: linear-gradient(135deg, #0a8f4d, #16b364);
            color: white;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 40px;

            box-shadow: 0 14px 30px rgba(22, 179, 100, 0.4);

            animation: pop 0.6s var(--ease-halus) both;
        }

        @keyframes pop {
            0% {
                transform: scale(0);
            }

            70% {
                transform: scale(1.15);
            }

            100% {
                transform: scale(1);
            }
        }

        .sukses-layar h3 {
            font-size: 21px;
            color: #123b78;
        }

        .no-pendaftaran {
            display: inline-block;

            margin-top: 14px;

            background: #f0f6ff;
            border: 2px dashed #9ec2f0;

            padding: 12px 26px;
            border-radius: 14px;

            font-size: 18px;
            font-weight: 900;
            letter-spacing: 2px;
            color: #123b78;
        }

        .sukses-layar p {
            margin-top: 12px;

            font-size: 12.5px;
            color: #64748b;

            line-height: 1.7;
        }

        /* =========================
           CTA AKHIR
        ========================= */

        .cta {
            margin-top: 70px;

            background: linear-gradient(120deg, #0752b9, #0780df);
            color: white;

            border-radius: 22px;

            padding: 40px 34px;

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

            padding: 14px 30px;
            border-radius: 25px;

            font-size: 13px;
            font-weight: bold;

            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.18);

            transition: 0.25s var(--ease-halus);

            position: relative;
        }

        .cta-btn:hover {
            transform: translateY(-3px);
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
           ANIMASI REVEAL
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
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        .jalur-grid > .reveal:nth-child(2),
        .biaya-grid > .reveal:nth-child(2) {
            transition-delay: 0.1s;
        }

        .jalur-grid > .reveal:nth-child(3),
        .biaya-grid > .reveal:nth-child(3) {
            transition-delay: 0.2s;
        }

        @media (prefers-reduced-motion: reduce) {

            .reveal,
            .timeline-item .timeline-card,
            .syarat-item {
                opacity: 1;
                transform: none;
                filter: none;
                transition: none;
            }

            .hero .orb,
            .timeline-item.in-view .timeline-dot,
            .cta::after,
            .btn-gold::after {
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

            .syarat-list {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 760px) {

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

            .countdown {
                flex-wrap: wrap;
            }

            .form-grid,
            .ringkasan-list {
                grid-template-columns: 1fr;
            }

            .stepper {
                flex-wrap: wrap;
            }

            .daftar-box {
                padding: 26px 18px;
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


            <a href="{{ url('/ppdb') }}" class="active">PPDB</a>

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
            Beranda &nbsp;·&nbsp; <b>PPDB</b>
        </div>

        <span class="welcome-label">
            Penerimaan Peserta Didik Baru
        </span>

        <h1 class="hero-title">
            PPDB <span>2026/2027</span>
        </h1>

        <div class="hero-subtitle">
            TELAH DIBUKA — GABUNG SEKARANG!
        </div>

        <p class="hero-description">
            Raih masa depanmu di SMK INFOKOM Bogor. Empat program keahlian
            unggulan bidang teknologi, guru kompeten, dan kemitraan industri
            menantimu. Kuota terbatas!
        </p>

        <div class="hero-actions">

            <a href="#daftar" class="btn-gold">
                Daftar Sekarang →
            </a>

            <a href="{{ url('/pdf/formulir-ppdb.pdf') }}" class="btn-ghost" download="Formulir-Pendaftaran-PPDB-SMK-INFOKOM.pdf" title="Unduh formulir pendaftaran (PDF)">
                ⬇ Download Formulir PDF
            </a>

            <a href="#alur" class="btn-ghost">
                Cara Mendaftar
            </a>

        </div>

    </section>


    <!-- COUNTDOWN -->

    <section class="countdown-band">

        <div class="judul">Menuju Penutupan Gelombang 1</div>

        <h3>Segera Daftar Sebelum Kuota Penuh</h3>

        <div class="countdown" id="countdown">

            <div class="count-box">
                <div class="count-num" id="cdHari">00</div>
                <div class="count-label">Hari</div>
            </div>

            <div class="count-box">
                <div class="count-num" id="cdJam">00</div>
                <div class="count-label">Jam</div>
            </div>

            <div class="count-box">
                <div class="count-num" id="cdMenit">00</div>
                <div class="count-label">Menit</div>
            </div>

            <div class="count-box">
                <div class="count-num" id="cdDetik">00</div>
                <div class="count-label">Detik</div>
            </div>

        </div>

    </section>


    <main class="container">


        <!-- ALUR PENDAFTARAN -->

        <section class="section" id="alur">

            <div class="section-head center">

                <span class="kicker">Alur Pendaftaran</span>

                <h2>4 Langkah Mudah Bergabung</h2>

                <p class="section-desc">
                    Proses pendaftaran cepat dan mudah — baik datang langsung
                    ke sekolah maupun secara online.
                </p>

            </div>

            <div class="timeline">

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-step">LANGKAH 1</span>

                        <h3>Isi Formulir Pendaftaran</h3>

                        <p>
                            Datang langsung ke ruang PPDB SMK INFOKOM Bogor
                            atau daftar online melalui link resmi sekolah.
                        </p>

                    </div>

                </div>

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-step">LANGKAH 2</span>

                        <h3>Serahkan Berkas</h3>

                        <p>
                            Lengkapi dan serahkan seluruh persyaratan
                            dokumen ke panitia PPDB untuk diverifikasi.
                        </p>

                    </div>

                </div>

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-step">LANGKAH 3</span>

                        <h3>Verifikasi & Tes</h3>

                        <p>
                            Ikuti wawancara ringan dan tes minat bakat
                            untuk penempatan program keahlian terbaik.
                        </p>

                    </div>

                </div>

                <div class="timeline-item">

                    <span class="timeline-dot"></span>

                    <div class="timeline-card">

                        <span class="timeline-step">LANGKAH 4</span>

                        <h3>Pengumuman & Daftar Ulang</h3>

                        <p>
                            Hasil seleksi diumumkan via WhatsApp dan
                            website. Lakukan daftar ulang untuk resmi
                            menjadi siswa!
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- JALUR PENDAFTARAN -->

        <section class="section" id="jalur">

            <div class="section-head center">

                <span class="kicker">Pilihan Jalur</span>

                <h2>Jalur Pendaftaran</h2>

            </div>

            <div class="jalur-grid">

                <div class="jalur-card reveal">

                    <div class="jalur-icon">🏅</div>

                    <h3>Jalur Prestasi</h3>

                    <p>
                        Untuk calon siswa dengan prestasi akademik maupun
                        non-akademik (lomba, sertifikat). Bawa bukti
                        prestasi saat mendaftar.
                    </p>

                </div>

                <div class="jalur-card reveal">

                    <div class="jalur-icon">📝</div>

                    <h3>Jalur Reguler</h3>

                    <p>
                        Jalur umum untuk semua lulusan SMP/MTs. Cukup
                        mengisi formulir, menyerahkan berkas, dan mengikuti
                        verifikasi.
                    </p>

                </div>

                <div class="jalur-card reveal">

                    <div class="jalur-icon">💻</div>

                    <h3>Jalur Online</h3>

                    <p>
                        Daftar dari rumah melalui link pendaftaran online
                        resmi, lalu lengkapi berkas secara langsung di
                        sekolah.
                    </p>

                </div>

            </div>

        </section>


        <!-- PERSYARATAN -->

        <section class="section" id="syarat">

            <div class="section-head center">

                <span class="kicker">Dokumen</span>

                <h2>Persyaratan Pendaftaran</h2>

            </div>

            <div class="syarat-box reveal">

                <div class="syarat-list">

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Fotokopi ijazah / SKL SMP atau sederajat (2 lembar)</p>

                    </div>

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Fotokopi rapor semester 1–5 yang dilegalisir</p>

                    </div>

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Fotokopi Kartu Keluarga & Akta Kelahiran</p>

                    </div>

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Pas foto berwarna 3×4 (4 lembar)</p>

                    </div>

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Fotokopi KTP orang tua / wali</p>

                    </div>

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Surat keterangan lulus bagi yang menunggu SKL</p>

                    </div>

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Usia maksimal 21 tahun pada tahun pendaftaran</p>

                    </div>

                    <div class="syarat-item">

                        <span class="cek">✓</span>

                        <p>Mengisi formulir pendaftaran resmi sekolah</p>

                    </div>

                </div>

            </div>

        </section>


        <!-- BIAYA -->

        <section class="section" id="biaya">

            <div class="section-head center">

                <span class="kicker">Transparan</span>

                <h2>Informasi Biaya</h2>

            </div>

            <div class="biaya-grid">

                <div class="biaya-card reveal">

                    <div class="biaya-nama">Gelombang 1</div>

                    <div class="biaya-nominal">Rp 1,5 jt</div>

                    <p class="biaya-desc">
                        Dana pengembangan sekolah gelombang pertama —
                        paling hemat.
                    </p>

                    <div class="biaya-note">
                        Bisa dicicil 2× • Sampai kuota habis
                    </div>

                </div>

                <div class="biaya-card unggul reveal">

                    <span class="biaya-badge">PALING DIPILIH</span>

                    <div class="biaya-nama">Gelombang 2</div>

                    <div class="biaya-nominal">Rp 1,75 jt</div>

                    <p class="biaya-desc">
                        Dana pengembangan sekolah gelombang kedua untuk
                        kuota yang tersisa.
                    </p>

                    <div class="biaya-note">
                        Bisa dicicil 2× • Terbatas
                    </div>

                </div>

                <div class="biaya-card reveal">

                    <div class="biaya-nama">SPP Bulanan</div>

                    <div class="biaya-nominal">Rp 250 rb</div>

                    <p class="biaya-desc">
                        Sumbangan pendidikan per bulan, sudah termasuk
                        kegiatan praktik & bahan.
                    </p>

                    <div class="biaya-note">
                        Bebas biaya pendaftaran
                    </div>

                </div>

            </div>

        </section>


        <!-- FAQ -->

        <section class="section" id="faq">

            <div class="section-head center">

                <span class="kicker">Tanya Jawab</span>

                <h2>Pertanyaan yang Sering Diajukan</h2>

            </div>

            <div class="faq-list">

                <div class="faq-item">

                    <button type="button" class="faq-q">

                        Apakah bisa daftar sebelum lulus SMP?

                        <span class="faq-plus">+</span>

                    </button>

                    <div class="faq-a">
                        <p>
                            Bisa! Kamu cukup membawa surat keterangan lulus
                            (SKL) dari sekolah asal. Ijazah bisa menyusul
                            setelah diterbitkan.
                        </p>
                    </div>

                </div>

                <div class="faq-item">

                    <button type="button" class="faq-q">

                        Ada pilihan program keahlian apa saja?

                        <span class="faq-plus">+</span>

                    </button>

                    <div class="faq-a">
                        <p>
                            Ada 4 program keahlian: RPL (Rekayasa Perangkat
                            Lunak), TKJ (Teknik Komputer & Jaringan),
                            DKV (Desain Komunikasi Visual), dan PSPT
                            (Pengembangan Siaran & Perfilman Terapan).
                        </p>
                    </div>

                </div>

                <div class="faq-item">

                    <button type="button" class="faq-q">

                        Bagaimana cara daftar online?

                        <span class="faq-plus">+</span>

                    </button>

                    <div class="faq-a">
                        <p>
                            Klik tombol "Daftar Sekarang" di halaman ini,
                            isi formulir online, lalu panitia akan
                            menghubungimu via WhatsApp untuk langkah
                            selanjutnya.
                        </p>
                    </div>

                </div>

                <div class="faq-item">

                    <button type="button" class="faq-q">

                        Apakah ada asrama / pondokan?

                        <span class="faq-plus">+</span>

                    </button>

                    <div class="faq-a">
                        <p>
                            Sekolah membantu informasi kos/pondokan di
                            sekitar sekolah bagi siswa dari luar kota.
                            Hubungi panitia untuk detailnya.
                        </p>
                    </div>

                </div>

                <div class="faq-item">

                    <button type="button" class="faq-q">

                        Kapan orientasi siswa baru dilaksanakan?

                        <span class="faq-plus">+</span>

                    </button>

                    <div class="faq-a">
                        <p>
                            Masa pengenalan lingkungan sekolah (MPLS)
                            dilaksanakan pada minggu pertama masuk tahun
                            ajaran baru, biasanya pertengahan Juli.
                        </p>
                    </div>

                </div>

            </div>

        </section>


        <!-- FORM PENDAFTARAN -->

        <section class="section" id="daftar">

            <div class="section-head center">

                <span class="kicker">Formulir Online</span>

                <h2>Isi Formulir Pendaftaran</h2>

                <p class="section-desc">
                    Isi data di bawah ini — proses cepat, kurang dari 5 menit.
                </p>

            </div>

            <div class="daftar-box reveal">

                <div class="stepper" id="stepper">

                    <div class="step-dot aktif">
                        <span class="step-num">1</span> Data Diri
                    </div>

                    <div class="step-dot">
                        <span class="step-num">2</span> Data Sekolah
                    </div>

                    <div class="step-dot">
                        <span class="step-num">3</span> Konfirmasi
                    </div>

                </div>

                <form id="formPpdb" novalidate>

                    <!-- LANGKAH 1: DATA DIRI -->

                    <div class="form-step aktif" data-step="1">

                        <div class="form-grid">

                            <div class="form-group">

                                <label>Nama Lengkap <span>*</span></label>

                                <input
                                    type="text"
                                    name="nama"
                                    placeholder="Sesuai ijazah"
                                    required
                                >

                                <small class="pesan-salah">Nama wajib diisi.</small>

                            </div>

                            <div class="form-group">

                                <label>NISN <span>*</span></label>

                                <input
                                    type="text"
                                    name="nisn"
                                    inputmode="numeric"
                                    maxlength="10"
                                    placeholder="10 digit angka"
                                    required
                                >

                                <small class="pesan-salah">NISN harus 10 digit angka.</small>

                            </div>

                            <div class="form-group">

                                <label>Tempat Lahir <span>*</span></label>

                                <input
                                    type="text"
                                    name="tempat_lahir"
                                    placeholder="Contoh: Bogor"
                                    required
                                >

                                <small class="pesan-salah">Tempat lahir wajib diisi.</small>

                            </div>

                            <div class="form-group">

                                <label>Tanggal Lahir <span>*</span></label>

                                <input
                                    type="date"
                                    name="tanggal_lahir"
                                    required
                                >

                                <small class="pesan-salah">Tanggal lahir wajib diisi.</small>

                            </div>

                            <div class="form-group">

                                <label>Jenis Kelamin <span>*</span></label>

                                <select name="jenis_kelamin" required>

                                    <option value="">— Pilih —</option>

                                    <option value="Laki-laki">Laki-laki</option>

                                    <option value="Perempuan">Perempuan</option>

                                </select>

                                <small class="pesan-salah">Pilih jenis kelamin.</small>

                            </div>

                            <div class="form-group">

                                <label>Agama <span>*</span></label>

                                <select name="agama" required>

                                    <option value="">— Pilih —</option>

                                    <option>Islam</option>

                                    <option>Kristen</option>

                                    <option>Katolik</option>

                                    <option>Hindu</option>

                                    <option>Buddha</option>

                                    <option>Konghucu</option>

                                </select>

                                <small class="pesan-salah">Pilih agama.</small>

                            </div>

                            <div class="form-group">

                                <label>No. WhatsApp <span>*</span></label>

                                <input
                                    type="tel"
                                    name="whatsapp"
                                    inputmode="numeric"
                                    placeholder="08xxxxxxxxxx"
                                    required
                                >

                                <small class="pesan-salah">Masukkan nomor WhatsApp yang valid.</small>

                            </div>

                            <div class="form-group">

                                <label>Email</label>

                                <input
                                    type="email"
                                    name="email"
                                    placeholder="opsional"
                                >

                            </div>

                            <div class="form-group full">

                                <label>Alamat Lengkap <span>*</span></label>

                                <textarea
                                    name="alamat"
                                    rows="2"
                                    placeholder="Jalan, RT/RW, kelurahan, kecamatan, kota"
                                    required
                                ></textarea>

                                <small class="pesan-salah">Alamat wajib diisi.</small>

                            </div>

                        </div>

                    </div>

                    <!-- LANGKAH 2: DATA SEKOLAH -->

                    <div class="form-step" data-step="2">

                        <div class="form-grid">

                            <div class="form-group">

                                <label>Asal Sekolah <span>*</span></label>

                                <input
                                    type="text"
                                    name="asal_sekolah"
                                    placeholder="Contoh: SMPN 1 Bogor"
                                    required
                                >

                                <small class="pesan-salah">Asal sekolah wajib diisi.</small>

                            </div>

                            <div class="form-group">

                                <label>Tahun Lulus <span>*</span></label>

                                <select name="tahun_lulus" required>

                                    <option value="">— Pilih —</option>

                                    <option>2026</option>

                                    <option>2025</option>

                                    <option>2024</option>

                                    <option>Sebelum 2024</option>

                                </select>

                                <small class="pesan-salah">Pilih tahun lulus.</small>

                            </div>

                            <div class="form-group">

                                <label>Pilihan Program Keahlian ke-1 <span>*</span></label>

                                <select name="pilihan_1" required>

                                    <option value="">— Pilih —</option>

                                    <option value="RPL">RPL — Rekayasa Perangkat Lunak</option>

                                    <option value="TKJ">TKJ — Teknik Komputer & Jaringan</option>

                                    <option value="DKV">DKV — Desain Komunikasi Visual</option>

                                    <option value="PSPT">PSPT — Siaran & Perfilman Terapan</option>

                                </select>

                                <small class="pesan-salah">Pilih program keahlian.</small>

                            </div>

                            <div class="form-group">

                                <label>Pilihan Program Keahlian ke-2</label>

                                <select name="pilihan_2">

                                    <option value="">— Pilih (opsional) —</option>

                                    <option value="RPL">RPL — Rekayasa Perangkat Lunak</option>

                                    <option value="TKJ">TKJ — Teknik Komputer & Jaringan</option>

                                    <option value="DKV">DKV — Desain Komunikasi Visual</option>

                                    <option value="PSPT">PSPT — Siaran & Perfilman Terapan</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label>Jalur Pendaftaran <span>*</span></label>

                                <select name="jalur" required>

                                    <option value="">— Pilih —</option>

                                    <option value="Reguler">Jalur Reguler</option>

                                    <option value="Prestasi">Jalur Prestasi</option>

                                    <option value="Online">Jalur Online</option>

                                </select>

                                <small class="pesan-salah">Pilih jalur pendaftaran.</small>

                            </div>

                            <div class="form-group">

                                <label>Nama Orang Tua / Wali <span>*</span></label>

                                <input
                                    type="text"
                                    name="orang_tua"
                                    placeholder="Nama lengkap orang tua/wali"
                                    required
                                >

                                <small class="pesan-salah">Nama orang tua wajib diisi.</small>

                            </div>

                        </div>

                    </div>

                    <!-- LANGKAH 3: KONFIRMASI -->

                    <div class="form-step" data-step="3">

                        <div class="ringkasan-list" id="ringkasan"></div>

                        <div class="peringatan-dummy">

                            ⚠️ Mode demo — data yang diisi <b>tidak disimpan</b>
                            ke database sekolah. Untuk pendaftaran resmi,
                            silakan hubungi panitia PPDB.

                        </div>

                    </div>

                    <div class="form-nav">

                        <button
                            type="button"
                            class="btn-form btn-form--kembali"
                            id="btnKembali"
                            style="visibility: hidden;"
                        >
                            ← Kembali
                        </button>

                        <button
                            type="button"
                            class="btn-form btn-form--lanjut"
                            id="btnLanjut"
                        >
                            Lanjut →
                        </button>

                        <button
                            type="submit"
                            class="btn-form btn-form--kirim"
                            id="btnKirim"
                            style="display: none;"
                        >
                            ✓ Kirim Pendaftaran
                        </button>

                    </div>

                </form>

                <!-- LAYAR SUKSES -->

                <div class="sukses-layar" id="suksesLayar">

                    <div class="sukses-icon">✓</div>

                    <h3>Pendaftaran Berhasil Dikirim!</h3>

                    <div class="no-pendaftaran" id="noPendaftaran">—</div>

                    <p>
                        Simpan nomor pendaftaran di atas sebagai bukti.
                        <br>
                        Panitia PPDB akan menghubungimu melalui WhatsApp
                        untuk langkah selanjutnya.
                    </p>

                    <button
                        type="button"
                        class="btn-form btn-form--lanjut"
                        id="btnDaftarLagi"
                        style="margin-top: 18px;"
                    >
                        Daftarkan Siswa Lain
                    </button>

                </div>

            </div>

        </section>


        <!-- CTA -->

        <section class="cta">

            <div>

                <h3>Siap Bergabung dengan Kami?</h3>

                <p>
                    Jangan tunda lagi — kuota setiap program keahlian
                    terbatas. Klik tombol dan mulai perjalananmu di
                    SMK INFOKOM Bogor!
                </p>

            </div>

            <a
                href="{{ $ppdb->link ?? url('/kontak') }}"
                class="cta-btn"
                {{ ($ppdb->link ?? null) ? 'target="_blank" rel="noopener"' : '' }}
            >
                Daftar Sekarang →
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

            // ===== COUNTDOWN PPDB =====

            var targetWaktu = new Date('2027-03-31T23:59:59+07:00').getTime();

            function perbaruiCountdown() {

                var selisih = targetWaktu - Date.now();

                if (selisih < 0) {
                    selisih = 0;
                }

                var hari = Math.floor(selisih / 86400000);

                var jam = Math.floor((selisih % 86400000) / 3600000);

                var menit = Math.floor((selisih % 3600000) / 60000);

                var detik = Math.floor((selisih % 60000) / 1000);

                function dua(x) {
                    return String(x).padStart(2, '0');
                }

                var elHari = document.getElementById('cdHari');

                if (!elHari) {
                    return;
                }

                elHari.textContent = dua(hari);

                document.getElementById('cdJam').textContent = dua(jam);

                document.getElementById('cdMenit').textContent = dua(menit);

                document.getElementById('cdDetik').textContent = dua(detik);

            }

            perbaruiCountdown();

            setInterval(perbaruiCountdown, 1000);

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

                document.querySelectorAll(
                    '.reveal, .timeline-item, .section-head, .timeline, .syarat-box'
                ).forEach(function (el) {
                    pengamat.observe(el);
                });

            } else {

                document.querySelectorAll(
                    '.reveal, .timeline-item, .section-head, .timeline, .syarat-box'
                ).forEach(function (el) {
                    el.classList.add('in-view');
                });

            }

            // ===== FORM PENDAFTARAN MULTI-STEP (DEMO) =====

            var formPpdb = document.getElementById('formPpdb');

            if (formPpdb) {

                var langkahSekarang = 1;

                var totalLangkah = 3;

                var semuaStep = formPpdb.querySelectorAll('.form-step');

                var semuaDot = document.querySelectorAll('#stepper .step-dot');

                var btnKembali = document.getElementById('btnKembali');

                var btnLanjut = document.getElementById('btnLanjut');

                var btnKirim = document.getElementById('btnKirim');

                function tampilkanLangkah(nomor) {

                    langkahSekarang = nomor;

                    semuaStep.forEach(function (step) {

                        step.classList.toggle(
                            'aktif',
                            parseInt(step.dataset.step, 10) === nomor
                        );

                    });

                    semuaDot.forEach(function (dot, i) {

                        dot.classList.toggle('aktif', i === nomor - 1);

                        dot.classList.toggle('selesai', i < nomor - 1);

                    });

                    btnKembali.style.visibility = nomor === 1
                        ? 'hidden'
                        : 'visible';

                    btnLanjut.style.display = nomor === totalLangkah
                        ? 'none'
                        : 'inline-block';

                    btnKirim.style.display = nomor === totalLangkah
                        ? 'inline-block'
                        : 'none';

                    if (nomor === totalLangkah) {
                        isiRingkasan();
                    }

                }

                function validasiLangkah(nomor) {

                    var step = formPpdb.querySelector(
                        '.form-step[data-step="' + nomor + '"]'
                    );

                    var valid = true;

                    step.querySelectorAll('input[required], select[required], textarea[required]')
                        .forEach(function (input) {

                            var isi = input.value.trim();

                            var lolos = isi !== '';

                            // validasi khusus NISN

                            if (lolos && input.name === 'nisn') {
                                lolos = /^\d{10}$/.test(isi);
                            }

                            // validasi khusus WhatsApp

                            if (lolos && input.name === 'whatsapp') {
                                lolos = /^08\d{8,11}$/.test(isi.replace(/[-\s]/g, ''));
                            }

                            input.classList.toggle('salah', !lolos);

                            var pesan = input.parentElement.querySelector('.pesan-salah');

                            if (pesan) {
                                pesan.classList.toggle('tampil', !lolos);
                            }

                            if (!lolos) {
                                valid = false;
                            }

                        });

                    return valid;

                }

                function isiRingkasan() {

                    var wadah = document.getElementById('ringkasan');

                    var label = {
                        nama: 'Nama Lengkap',
                        nisn: 'NISN',
                        tempat_lahir: 'Tempat Lahir',
                        tanggal_lahir: 'Tanggal Lahir',
                        jenis_kelamin: 'Jenis Kelamin',
                        agama: 'Agama',
                        whatsapp: 'No. WhatsApp',
                        email: 'Email',
                        alamat: 'Alamat',
                        asal_sekolah: 'Asal Sekolah',
                        tahun_lulus: 'Tahun Lulus',
                        pilihan_1: 'Pilihan ke-1',
                        pilihan_2: 'Pilihan ke-2',
                        jalur: 'Jalur',
                        orang_tua: 'Orang Tua / Wali',
                    };

                    wadah.innerHTML = '';

                    Object.keys(label).forEach(function (kunci) {

                        var nilai = formPpdb.elements[kunci]
                            ? formPpdb.elements[kunci].value.trim()
                            : '';

                        if (nilai === '') {
                            nilai = '—';
                        }

                        var kartu = document.createElement('div');

                        kartu.className = 'ringkasan-item';

                        kartu.innerHTML =
                            '<small>' + label[kunci] + '</small>' +
                            '<strong></strong>';

                        kartu.querySelector('strong').textContent = nilai;

                        wadah.appendChild(kartu);

                    });

                }

                btnLanjut.addEventListener('click', function () {

                    if (!validasiLangkah(langkahSekarang)) {
                        return;
                    }

                    tampilkanLangkah(langkahSekarang + 1);

                });

                btnKembali.addEventListener('click', function () {
                    tampilkanLangkah(langkahSekarang - 1);
                });

                // hapus tanda error saat pengguna mengetik

                formPpdb.addEventListener('input', function (e) {

                    if (e.target.classList.contains('salah')) {

                        e.target.classList.remove('salah');

                        var pesan = e.target.parentElement.querySelector('.pesan-salah');

                        if (pesan) {
                            pesan.classList.remove('tampil');
                        }

                    }

                });

                formPpdb.addEventListener('submit', function (e) {

                    e.preventDefault();

                    if (!validasiLangkah(3)) {
                        return;
                    }

                    // buat nomor pendaftaran acak (demo)

                    var nomor = 'PPDB26-' +
                        String(Math.floor(1000 + Math.random() * 9000)) +
                        String(Math.floor(10 + Math.random() * 90));

                    document.getElementById('noPendaftaran').textContent = nomor;

                    formPpdb.style.display = 'none';

                    document.getElementById('stepper').style.display = 'none';

                    document.getElementById('suksesLayar').classList.add('tampil');

                });

                document.getElementById('btnDaftarLagi')
                    .addEventListener('click', function () {

                        formPpdb.reset();

                        formPpdb.style.display = '';

                        document.getElementById('stepper').style.display = '';

                        document.getElementById('suksesLayar')
                            .classList.remove('tampil');

                        tampilkanLangkah(1);

                    });

            }

            // ===== FAQ ACCORDION =====

            document.querySelectorAll('.faq-q').forEach(function (tombol) {

                tombol.addEventListener('click', function () {

                    var item = tombol.parentElement;

                    var jawaban = item.querySelector('.faq-a');

                    var terbuka = item.classList.contains('open');

                    // tutup semua dulu
                    document.querySelectorAll('.faq-item.open').forEach(function (lain) {

                        lain.classList.remove('open');

                        lain.querySelector('.faq-a').style.maxHeight = null;

                    });

                    if (!terbuka) {

                        item.classList.add('open');

                        jawaban.style.maxHeight = jawaban.scrollHeight + 'px';

                    }

                });

            });

            // ===== TOMBOL KE ATAS + PROGRES SCROLL =====

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

                // parallax orb mengikuti scroll

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
