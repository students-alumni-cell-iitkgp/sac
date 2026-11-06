<?php
session_start();
// include 'header_aam1.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Homecoming 2026</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./css/home_aam.css">
    <style>
    .hero-section {

        position: relative;

        min-height: 100vh;

        display: flex;

        align-items: center;

        justify-content: center;

        overflow: hidden;

        background:
            linear-gradient(rgba(0, 25, 60, .75), rgba(0, 40, 90, .78)),
            url('./img/home_aampic01.jpg');

        background-size: cover;

        background-position: center;

    }

    .hero-overlay {

        position: absolute;

        top: 0;

        left: 0;

        width: 100%;

        height: 100%;

        background:

            radial-gradient(circle at top right,
                rgba(255, 255, 255, .12),
                transparent 45%),

            radial-gradient(circle at bottom left,
                rgba(0, 180, 255, .15),
                transparent 40%);

    }

    .hero-section .container {

        position: relative;

        z-index: 10;

        text-align: center;

        max-width: 1100px;

        padding: 40px;

    }

    .logo-box {

        display: flex;

        justify-content: center;

        align-items: center;

        gap: 35px;

        margin-bottom: 30px;

    }

    .hero-logo {

        height: 95px;

        background: white;

        padding: 15px;

        border-radius: 25px;

        box-shadow:

            0 20px 50px rgba(0, 0, 0, .25);

        transition: .4s;

    }

    .hero-logo:hover {

        transform: translateY(-8px);

    }

    .event-tag {

        display: inline-block;

        padding: 7px 12px;

        background: rgba(255, 255, 255, .15);

        border: 1px solid rgba(255, 255, 255, .3);

        backdrop-filter: blur(20px);

        border-radius: 40px;

        color: #fff;

        font-weight: 600;

        margin-bottom: 15px;

        letter-spacing: 1px;

    }

    .hero-content h1 {

        font-size: 68px;

        font-weight: 800;

        color: white;

        margin-bottom: 10px;

        text-shadow: 0 5px 20px rgba(0, 0, 0, .4);

    }

    .hero-content h2 {

        font-size: 28px;

        color: #FFD54F;

        font-weight: 600;

        margin-bottom: 25px;

    }

    .hero-batch {

        font-size: 28px;

        color: white;

        margin-bottom: 8px;

    }

    .event-date {

        display: inline-block;

        padding: 14px 30px;

        background: #FFD54F;

        color: #012A4A;

        font-size: 24px;

        font-weight: 700;

        border-radius: 60px;

        margin: 10px 0;

        box-shadow:

            0 10px 30px rgba(255, 213, 79, .35);

    }

    .hero-description {

        max-width: 850px;

        margin: auto;

        font-size: 21px;

        line-height: 1.8;

        color: white;

        margin-top: 10px;

    }

    .hero-buttons {

        margin-top: 25px;

        display: flex;

        justify-content: center;

        gap: 25px;

        flex-wrap: wrap;

    }

    .btn-register {

        background: #FFD54F;

        padding: 18px 45px;

        font-size: 20px;

        font-weight: 700;

        border-radius: 60px;

        color: #012A4A;

        text-decoration: none;

        transition: .35s;

        box-shadow:

            0 15px 35px rgba(255, 213, 79, .4);

    }

    .btn-register:hover {

        transform: translateY(-6px);

        background: #FFC107;

        color: #012A4A;

    }

    .btn-login {

        background: transparent;

        border: 2px solid white;

        padding: 18px 45px;

        font-size: 20px;

        font-weight: 700;

        border-radius: 60px;

        text-decoration: none;

        color: white;

        transition: .35s;

    }

    .btn-login:hover {

        background: white;

        color: #012A4A;

    }

    .scroll-down {

        position: absolute;

        bottom: 4px;

        left: 51%;

        transform: translateX(-50%);

    }

    .scroll-down span {

        display: block;

        width: 35px;

        height: 60px;

        border: 2px solid white;

        border-radius: 30px;

        position: relative;

    }

    .scroll-down span:before {

        content: "";

        position: absolute;

        left: 50%;

        top: 10px;

        width: 7px;

        height: 7px;

        background: white;

        border-radius: 50%;

        transform: translateX(-50%);

        animation: scroll 2s infinite;

    }

    @keyframes scroll {

        0% {

            opacity: 0;

            transform: translate(-50%, 0);

        }

        50% {

            opacity: 1;

        }

        100% {

            opacity: 0;

            transform: translate(-50%, 24px);

        }

    }

    @media(max-width:992px) {

        .hero-content h1 {

            font-size: 48px;

        }

        .hero-content h2 {

            font-size: 22px;

        }

        .hero-batch {

            font-size: 22px;

        }

        .hero-description {

            font-size: 18px;

        }

        .hero-logo {

            height: 75px;

        }

    }

    @media(max-width:576px) {

        .hero-content h1 {

            font-size: 36px;

        }

        .hero-content h2 {

            font-size: 20px;

        }

        .hero-description {

            font-size: 16px;

        }

        .event-date {

            font-size: 18px;

        }

        .btn-register,

        .btn-login {

            width: 100%;

        }

        .logo-box {

            gap: 15px;

        }

        .hero-logo {

            height: 60px;

        }

    }

    /*===================================
      COUNTDOWN
      ===================================*/

    .countdown-section {

        padding: 40px 0;

        background:
            linear-gradient(135deg, #001f3f, #003566);

        position: relative;

        overflow: hidden;

    }

    .countdown-section:before {

        content: "";

        position: absolute;

        top: -150px;

        right: -150px;

        width: 350px;

        height: 350px;

        background: rgba(255, 255, 255, .05);

        border-radius: 50%;

    }

    .countdown-section:after {

        content: "";

        position: absolute;

        bottom: -180px;

        left: -180px;

        width: 400px;

        height: 400px;

        background: rgba(255, 215, 0, .08);

        border-radius: 50%;

    }

    .section-title {

        text-align: center;

        margin-bottom: 30px;

        position: relative;

        z-index: 2;

    }

    .section-title span {

        display: inline-block;

        padding: 8px 20px;

        background: #FFD54F;

        border-radius: 30px;

        font-weight: 700;

        letter-spacing: 1px;

        margin-bottom: 18px;

        color: #012A4A;

    }

    .section-title h2 {

        color: #fff;

        font-size: 42px;

        font-weight: 800;

        margin-bottom: 15px;

    }

    .section-title p {

        font-size: 20px;

        color: #d8e6ff;

    }

    #countdown {

        display: flex;

        justify-content: center;

        gap: 35px;

        flex-wrap: wrap;

        position: relative;

        z-index: 2;

    }

    .count-card {

        width: 180px;

        height: 180px;

        background: rgba(255, 255, 255, .12);

        backdrop-filter: blur(18px);

        border: 1px solid rgba(255, 255, 255, .15);

        border-radius: 25px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        align-items: center;

        transition: .4s;

        box-shadow: 0 20px 45px rgba(0, 0, 0, .25);

    }

    .count-card:hover {

        transform: translateY(-10px);

        background: rgba(255, 255, 255, .18);

    }

    .count-card h1 {

        font-size: 60px;

        font-weight: 800;

        margin: 0;

        color: #FFD54F;

    }

    .count-card span {

        margin-top: 10px;

        font-size: 18px;

        font-weight: 600;

        color: white;

        letter-spacing: 1px;

    }

    @media(max-width:992px) {

        .count-card {

            width: 150px;

            height: 150px;

        }

        .count-card h1 {

            font-size: 48px;

        }

    }

    @media(max-width:576px) {

        #countdown {

            gap: 18px;

        }

        .count-card {

            width: 130px;

            height: 130px;

        }

        .count-card h1 {

            font-size: 38px;

        }

        .section-title h2 {

            font-size: 28px;

        }

    }

    /*===========================
      STATISTICS
      ============================*/

    .stats-section {

        padding: 50px 0;

        background: #f8fbff;

    }

    .section-heading {

        text-align: center;

        margin-bottom: 50px;

    }

    .section-heading span {

        display: inline-block;

        padding: 10px 22px;

        background: #FFD54F;

        border-radius: 30px;

        font-weight: 700;

        letter-spacing: 1px;

        margin-bottom: 18px;

    }

    .section-heading h2 {

        font-size: 46px;

        font-weight: 800;

        color: #012A4A;

        margin-bottom: 20px;

    }

    .section-heading p {

        max-width: 850px;

        margin: auto;

        font-size: 19px;

        line-height: 1.8;

        color: #555;

    }

    .stats-grid {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(252px, 1fr));

        gap: 15px;

    }

    .stat-box {

        background: white;

        padding: 45px;

        border-radius: 25px;

        text-align: center;

        transition: .4s;

        box-shadow:

            0 15px 40px rgba(0, 0, 0, .08);

        position: relative;

        overflow: hidden;

    }

    .stat-box:before {

        content: "";

        position: absolute;

        left: 0;

        top: 0;

        height: 5px;

        width: 100%;

        background: linear-gradient(90deg, #0d6efd, #FFD54F);

    }

    .stat-box:hover {

        transform: translateY(-12px);

        box-shadow:

            0 30px 60px rgba(0, 0, 0, .15);

    }

    .stat-icon {

        width: 90px;

        height: 90px;

        margin: auto;

        margin-bottom: 25px;

        background: linear-gradient(135deg, #0d6efd, #012A4A);

        color: white;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 42px;

        border-radius: 50%;

        box-shadow:

            0 15px 30px rgba(13, 110, 253, .25);

    }

    .stat-box h2 {

        font-size: 60px;

        font-weight: 800;

        color: #0d6efd;

        margin-bottom: 10px;

    }

    .stat-box h5 {

        font-size: 24px;

        font-weight: 700;

        margin-bottom: 15px;

        color: #012A4A;

    }

    .stat-box p {

        color: #666;

        line-height: 1.7;

    }

    @media(max-width:768px) {

        .section-heading h2 {

            font-size: 34px;

        }

        .stat-box {

            padding: 35px;

        }

        .stat-box h2 {

            font-size: 46px;

        }

    }

    /*============================
      EVENT SECTION
      =============================*/

    .event-section {

        padding: 20px 0;

        background: white;

    }

    .event-grid {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));

        gap: 15px;

    }

    .event-card {

        position: relative;

        height: 420px;

        overflow: hidden;

        border-radius: 5px;

        cursor: pointer;

        box-shadow:

            0 20px 50px rgba(0, 0, 0, .12);

        transition: .5s;

    }

    .event-card img {

        width: 100%;

        height: 100%;

        object-fit: fill;

        transition: 1s;

    }

    .event-card:hover img {

        transform: scale(1.15);

    }

    .event-overlay {

        position: absolute;

        left: 0;

        bottom: 0;

        width: 100%;

        padding: 35px;

        background:

            linear-gradient(to top,

                rgba(1, 42, 74, .98),

                rgba(1, 42, 74, .35),

                transparent);

        color: white;

        transition: .5s;

    }

    .event-card:hover .event-overlay {

        padding-bottom: 55px;

    }

    .event-overlay h3 {

        font-size: 30px;

        font-weight: 700;

        margin-bottom: 15px;

    }

    .event-overlay p {

        font-size: 17px;

        line-height: 1.7;

        opacity: .95;

    }

    .event-card:after {

        content: "";

        position: absolute;

        top: 0;

        left: -120%;

        width: 70%;

        height: 100%;

        background:

            linear-gradient(120deg,

                transparent,

                rgba(255, 255, 255, .45),

                transparent);

        transition: 1s;

    }

    .event-card:hover:after {

        left: 150%;

    }

    @media(max-width:768px) {

        .event-grid {

            grid-template-columns: 1fr;

        }

        .event-card {

            height: 340px;

        }

        .event-overlay h3 {

            font-size: 24px;

        }

    }

    .event-btn {

        display: inline-block;

        margin-top: 20px;

        padding: 12px 25px;

        background: white;

        color: #012A4A;

        border-radius: 50px;

        font-weight: 700;

        text-decoration: none;

        transition: .3s;

    }

    .event-btn:hover {

        background: #FFD54F;

        color: #012A4A;

        transform: translateY(-3px);

    }

    /*==================================
      DISTINGUISHED ALUMNI
      ==================================*/

    .speaker-section {

        padding: 120px 0;

        background:

            linear-gradient(135deg, #012A4A, #014F86);

        position: relative;

        overflow: hidden;

    }

    .speaker-section::before {

        content: "";

        position: absolute;

        top: -180px;

        right: -150px;

        width: 450px;

        height: 450px;

        background: rgba(255, 255, 255, .05);

        border-radius: 50%;

    }

    .speaker-grid {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));

        gap: 40px;

        margin-top: 60px;

    }

    .speaker-card {

        background: white;

        border-radius: 25px;

        overflow: hidden;

        transition: .45s;

        box-shadow:

            0 25px 60px rgba(0, 0, 0, .15);

    }

    .speaker-card:hover {

        transform: translateY(-15px);

    }

    .speaker-card img {

        width: 100%;

        height: 340px;

        object-fit: cover;

        transition: .5s;

    }

    .speaker-card:hover img {

        transform: scale(1.08);

    }

    .speaker-content {

        padding: 35px;

        text-align: center;

    }

    .speaker-content h3 {

        font-size: 28px;

        font-weight: 700;

        margin-bottom: 8px;

        color: #012A4A;

    }

    .speaker-content h5 {

        font-size: 18px;

        font-weight: 600;

        color: #0d6efd;

        margin-bottom: 20px;

    }

    .speaker-content p {

        color: #666;

        line-height: 1.7;

        min-height: 70px;

    }

    .speaker-social {

        margin-top: 20px;

        display: flex;

        justify-content: center;

        gap: 18px;

    }

    .speaker-social a {

        width: 50px;

        height: 50px;

        background: #0d6efd;

        border-radius: 50%;

        display: flex;

        align-items: center;

        justify-content: center;

        color: white;

        font-size: 20px;

        transition: .3s;

        text-decoration: none;

    }

    .speaker-social a:hover {

        background: #FFD54F;

        color: #012A4A;

        transform: translateY(-6px);

    }

    .speaker-card {

        opacity: 0;

        transform: translateY(70px);

        animation: fadeSpeaker .8s forwards;

    }

    .speaker-card:nth-child(1) {
        animation-delay: .1s;
    }

    .speaker-card:nth-child(2) {
        animation-delay: .3s;
    }

    .speaker-card:nth-child(3) {
        animation-delay: .5s;
    }

    .speaker-card:nth-child(4) {
        animation-delay: .7s;
    }

    @keyframes fadeSpeaker {

        to {

            opacity: 1;

            transform: translateY(0);

        }

    }

    /* =========================================================
   PREMIUM ALUMNI GALLERY
========================================================= */

    .premium-gallery-section {

        position: relative;

        padding: 50px 0 40px;

        overflow: hidden;

        background:
            linear-gradient(180deg,
                #ffffff 0%,
                #f8fafc 100%);

    }


    /* DECORATIVE BACKGROUND */

    .premium-gallery-section::before {

        content: "";

        position: absolute;

        width: 550px;

        height: 550px;

        top: -280px;

        right: -220px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(122, 15, 16, .10),
                transparent 70%);

        pointer-events: none;

    }


    .premium-gallery-section::after {

        content: "";

        position: absolute;

        width: 450px;

        height: 450px;

        bottom: -250px;

        left: -180px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(212, 160, 23, .09),
                transparent 70%);

        pointer-events: none;

    }


    .gallery-container {

        position: relative;

        z-index: 2;

        width: min(1380px, calc(100% - 40px));

        margin: auto;

    }


    /* =========================================================
   SECTION HEADING
========================================================= */

    .premium-gallery-heading {

        max-width: 850px;

        margin: 0 auto 55px;

        text-align: center;

    }


    .heading-topline {

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 14px;

        margin-bottom: 17px;

    }


    .heading-line {

        width: 45px;

        height: 1px;

        background:
            linear-gradient(90deg,
                transparent,
                #d4a017);

    }


    .heading-line:last-child {

        background:
            linear-gradient(90deg,
                #d4a017,
                transparent);

    }


    .heading-label {

        color: #a6191b;

        font-size: 12px;

        font-weight: 900;

        letter-spacing: 3px;

    }


    .premium-gallery-heading h2 {

        margin: 0;

        color: #111827;

        font-family:
            "Playfair Display",
            Georgia,
            serif;

        font-size: clamp(38px,
                5vw,
                62px);

        line-height: 1.08;

        font-weight: 700;

    }


    .premium-gallery-heading h2 span {

        display: block;

        color: #7a0f10;

    }


    .premium-gallery-heading p {

        max-width: 690px;

        margin: 20px auto 0;

        color: #64748b;

        font-size: 16px;

        line-height: 1.8;

    }


    /* =========================================================
   GALLERY GRID
========================================================= */

    .premium-gallery-grid {

        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        grid-auto-rows:
            285px;

        gap: 18px;

    }


    /* =========================================================
   GALLERY ITEM
========================================================= */

    .premium-gallery-item {

        position: relative;

        overflow: hidden;

        min-height: 285px;

        border-radius: 22px;

        background: #111827;

        cursor: pointer;

        isolation: isolate;

        box-shadow:
            0 15px 40px rgba(15, 23, 42, .10);

        transition:
            transform .45s cubic-bezier(.2, .8, .2, 1),
            box-shadow .45s ease;

    }


    .premium-gallery-item:hover {

        transform: translateY(-7px);

        box-shadow:
            0 25px 55px rgba(15, 23, 42, .18);

    }


    .premium-gallery-item img {

        position: absolute;

        inset: 0;

        width: 100%;

        height: 100%;

        object-fit: cover;

        transition:
            transform 1s cubic-bezier(.2, .8, .2, 1);

    }


    .premium-gallery-item:hover img {

        transform: scale(1.10);

    }


    /* =========================================================
   GRID SPANS
========================================================= */

    .gallery-large {

        grid-column: span 2;

        grid-row: span 2;

    }


    .gallery-tall {

        grid-row: span 2;

    }


    .gallery-wide {

        grid-column: span 2;

    }


    /* =========================================================
   IMAGE GRADIENT
========================================================= */

    .gallery-gradient {

        position: absolute;

        inset: 0;

        z-index: 1;

        background:
            linear-gradient(180deg,
                rgba(15, 23, 42, .05) 20%,
                rgba(15, 23, 42, .10) 40%,
                rgba(15, 23, 42, .88) 100%);

        transition: .4s;

    }


    .premium-gallery-item:hover .gallery-gradient {

        background:
            linear-gradient(180deg,
                rgba(122, 15, 16, .10),
                rgba(15, 23, 42, .90));

    }


    /* =========================================================
   NUMBER
========================================================= */

    .gallery-number {

        position: absolute;

        top: 18px;

        left: 18px;

        z-index: 5;

        width: 42px;

        height: 42px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 12px;

        color: #fff;

        background:
            rgba(15, 23, 42, .45);

        border:
            1px solid rgba(255, 255, 255, .25);

        backdrop-filter: blur(12px);

        font-size: 12px;

        font-weight: 900;

        letter-spacing: 1px;

    }


    /* =========================================================
   CATEGORY
========================================================= */

    .gallery-category {

        position: absolute;

        top: 20px;

        right: 20px;

        z-index: 5;

        padding: 7px 11px;

        border-radius: 50px;

        color: #fff;

        background:
            rgba(122, 15, 16, .72);

        border:
            1px solid rgba(255, 255, 255, .20);

        backdrop-filter: blur(10px);

        font-size: 9px;

        font-weight: 900;

        letter-spacing: 1.5px;

    }


    /* =========================================================
   CONTENT
========================================================= */

    .gallery-content {

        position: absolute;

        left: 24px;

        right: 24px;

        bottom: 23px;

        z-index: 5;

        display: flex;

        align-items: center;

        gap: 13px;

        transform:
            translateY(7px);

        transition:
            transform .4s ease;

    }


    .premium-gallery-item:hover .gallery-content {

        transform:
            translateY(0);

    }


    .gallery-icon {

        width: 43px;

        height: 43px;

        min-width: 43px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 12px;

        color: #fff;

        background:
            rgba(255, 255, 255, .15);

        border:
            1px solid rgba(255, 255, 255, .25);

        backdrop-filter:
            blur(10px);

    }


    .gallery-content h3 {

        margin: 0;

        color: #fff;

        font-family:
            "Playfair Display",
            Georgia,
            serif;

        font-size: 22px;

        line-height: 1.2;

        font-weight: 700;

    }


    .gallery-content p {

        margin: 5px 0 0;

        color:
            rgba(255, 255, 255, .72);

        font-size: 12px;

        font-weight: 600;

    }


    /* =========================================================
   VIEW BUTTON
========================================================= */

    .gallery-view-btn {

        position: absolute;

        right: 22px;

        bottom: 23px;

        z-index: 10;

        width: 43px;

        height: 43px;

        display: flex;

        align-items: center;

        justify-content: center;

        border: 1px solid rgba(255, 255, 255, .25);

        border-radius: 50%;

        color: #fff;

        background:
            rgba(255, 255, 255, .13);

        backdrop-filter:
            blur(12px);

        cursor: pointer;

        opacity: 0;

        transform:
            scale(.75);

        transition:
            .35s ease;

    }


    .premium-gallery-item:hover .gallery-view-btn {

        opacity: 1;

        transform:
            scale(1);

    }


    .gallery-view-btn:hover {

        background: #d4a017;

        color: #4d0809;

        transform:
            scale(1.08) !important;

    }


    /* =========================================================
   BOTTOM INFORMATION
========================================================= */

    .gallery-bottom {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 30px;

        margin-top: 25px;

        padding: 27px 30px;

        border-radius: 20px;

        background: #fff;

        border:
            1px solid #e5e7eb;

        box-shadow:
            0 12px 35px rgba(15, 23, 42, .06);

    }


    .gallery-bottom-text span {

        display: flex;

        align-items: center;

        gap: 8px;

        color: #a6191b;

        font-size: 11px;

        font-weight: 900;

        letter-spacing: 1.5px;

    }


    .gallery-bottom-text h3 {

        margin: 5px 0 0;

        color: #172033;

        font-family:
            "Playfair Display",
            Georgia,
            serif;

        font-size: 24px;

    }


    .gallery-counter {

        display: flex;

        align-items: baseline;

        gap: 8px;

        padding-left: 30px;

        border-left:
            1px solid #e5e7eb;

    }


    .gallery-counter strong {

        color: #7a0f10;

        font-size: 36px;

        font-weight: 900;

    }


    .gallery-counter span {

        color: #64748b;

        font-size: 13px;

        font-weight: 700;

    }


    /* =========================================================
   LIGHTBOX
========================================================= */

    /* =========================================================
   PREMIUM LIGHTBOX - FIXED VERSION
========================================================= */

    .premium-lightbox {
        position: fixed !important;
        inset: 0 !important;
        width: 100vw !important;
        height: 100vh !important;

        display: flex;
        align-items: center;
        justify-content: center;

        background: rgba(3, 8, 18, 0.96);

        opacity: 0;
        visibility: hidden;
        pointer-events: none;

        z-index: 999999 !important;

        padding: 30px;
        box-sizing: border-box;

        transition:
            opacity .3s ease,
            visibility .3s ease;
    }

    .premium-lightbox.active {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }


    /* IMAGE AREA */

    .lightbox-content {
        position: relative;
        width: min(1100px, 90vw);
        max-height: 90vh;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        z-index: 1000001;
    }

    .lightbox-content img {
        display: block;

        max-width: 100%;
        max-height: 75vh;

        width: auto;
        height: auto;

        object-fit: contain;

        border-radius: 18px;

        border: 2px solid rgba(212, 160, 23, .65);

        box-shadow:
            0 25px 80px rgba(0, 0, 0, .65),
            0 0 35px rgba(212, 160, 23, .18);

        background: #111;
    }


    /* CAPTION */

    .lightbox-caption {
        text-align: center;
        margin-top: 18px;
    }

    .lightbox-caption span {
        display: inline-block;

        color: #d4a017;

        font-size: 11px;
        font-weight: 800;

        letter-spacing: 3px;

        margin-bottom: 5px;
    }

    .lightbox-caption h3 {
        margin: 0;

        color: #fff;

        font-family:
            "Playfair Display",
            Georgia,
            serif;

        font-size: clamp(20px, 3vw, 30px);
    }


    /* CLOSE BUTTON */

    .lightbox-close {
        position: fixed;

        top: 25px;
        right: 30px;

        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid rgba(255, 255, 255, .25);

        border-radius: 50%;

        color: #fff;

        background: rgba(255, 255, 255, .10);

        backdrop-filter: blur(10px);

        font-size: 21px;

        cursor: pointer;

        z-index: 1000005;

        transition: all .3s ease;
    }

    .lightbox-close:hover {
        background: #7a0f10;

        border-color: #d4a017;

        color: #fff;

        transform: rotate(90deg) scale(1.05);
    }


    /* ARROWS */

    .lightbox-arrow {
        position: fixed;

        top: 50%;
        transform: translateY(-50%);

        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid rgba(255, 255, 255, .25);

        border-radius: 50%;

        color: #fff;

        background: rgba(255, 255, 255, .10);

        backdrop-filter: blur(10px);

        font-size: 20px;

        cursor: pointer;

        z-index: 1000005;

        transition: all .3s ease;
    }

    .lightbox-arrow:hover {
        background: #d4a017;

        color: #4d0809;

        transform: translateY(-50%) scale(1.08);
    }

    .lightbox-prev {
        left: 25px;
    }

    .lightbox-next {
        right: 25px;
    }


    /* MOBILE */

    @media (max-width: 768px) {

        .premium-lightbox {
            padding: 15px;
        }

        .lightbox-content {
            width: 95vw;
        }

        .lightbox-content img {
            max-width: 95vw;
            max-height: 70vh;

            border-radius: 12px;
        }

        .lightbox-close {
            top: 15px;
            right: 15px;

            width: 45px;
            height: 45px;
        }

        .lightbox-arrow {
            width: 45px;
            height: 45px;
        }

        .lightbox-prev {
            left: 10px;
        }

        .lightbox-next {
            right: 10px;
        }
    }


    /* =========================================================
   RESPONSIVE
========================================================= */

    @media(max-width:1100px) {

        .premium-gallery-grid {

            grid-template-columns:
                repeat(3, 1fr);

        }

    }


    @media(max-width:850px) {

        .premium-gallery-grid {

            grid-template-columns:
                repeat(2, 1fr);

        }

        .gallery-large {

            grid-column: span 2;

            grid-row: span 2;

        }

        .gallery-tall {

            grid-row: span 1;

        }

        .gallery-wide {

            grid-column: span 2;

        }

    }


    @media(max-width:600px) {

        .premium-gallery-section {

            padding: 75px 0 65px;

        }

        .gallery-container {

            width:
                min(100% - 28px,
                    500px);

        }

        .premium-gallery-heading {

            margin-bottom: 35px;

        }

        .premium-gallery-heading h2 {

            font-size: 38px;

        }

        .premium-gallery-heading p {

            font-size: 14px;

        }

        .premium-gallery-grid {

            grid-template-columns: 1fr;

            grid-auto-rows: 260px;

            gap: 14px;

        }

        .gallery-large,
        .gallery-wide {

            grid-column: span 1;

            grid-row: span 1;

        }

        .gallery-tall {

            grid-row: span 1;

        }

        .premium-gallery-item {

            min-height: 260px;

            border-radius: 18px;

        }

        .gallery-content h3 {

            font-size: 19px;

        }

        .gallery-view-btn {

            opacity: 1;

            transform: scale(1);

            right: 18px;

            bottom: 18px;

        }

        .gallery-bottom {

            padding: 20px;

            flex-direction: column;

            align-items: flex-start;

        }

        .gallery-counter {

            padding-left: 0;

            padding-top: 15px;

            width: 100%;

            border-left: 0;

            border-top: 1px solid #e5e7eb;

        }

        .lightbox-arrow {

            width: 43px;

            height: 43px;

        }

        .lightbox-prev {

            left: 12px;

        }

        .lightbox-next {

            right: 12px;

        }

        .lightbox-close {

            top: 15px;

            right: 15px;

        }

    }

    /*====================================
      TESTIMONIALS
      ====================================*/

    .testimonial-section {

        padding: 50px 0;

        background:

            linear-gradient(135deg, #012A4A, #014F86);

        position: relative;

        overflow: hidden;

    }

    .testimonial-card {

        max-width: 900px;

        margin: auto;

        background: rgba(255, 255, 255, .15);

        backdrop-filter: blur(18px);

        border: 1px solid rgba(255, 255, 255, .15);

        border-radius: 30px;

        padding: 30px;

        text-align: center;

        color: white;

        box-shadow:

            0 30px 70px rgba(0, 0, 0, .25);

    }

    .testimonial-img {

        width: 140px;

        height: 140px;

        border-radius: 50%;

        object-fit: cover;

        border: 6px solid white;

        margin-bottom: 30px;

    }

    .stars {

        font-size: 28px;

        color: #FFD54F;

        letter-spacing: 4px;

        margin-bottom: 25px;

    }

    .testimonial-card p {

        font-size: 22px;

        line-height: 2;

        font-style: italic;

        margin-bottom: 35px;

    }

    .testimonial-card h4 {

        font-size: 30px;

        font-weight: 700;

        margin-bottom: 10px;

    }

    .testimonial-card span {

        font-size: 18px;

        opacity: .9;

    }

    .carousel-control-prev,

    .carousel-control-next {

        width: 8%;

    }

    .carousel-control-prev-icon,

    .carousel-control-next-icon {

        background-color: #0d6efd;

        padding: 25px;

        border-radius: 50%;

    }

    @media(max-width:768px) {

        .testimonial-card {

            padding: 35px;

        }

        .testimonial-card p {

            font-size: 18px;

        }

        .testimonial-img {

            width: 100px;

            height: 100px;

        }

    }

    /*=====================================
      PREMIUM FAQ
      ======================================*/

    .faq-section {

        padding: 120px 0;

        background: #f7f9fc;


        position: relative;

    }

    .premium-faq {

        max-width: 1000px;

        margin: auto;


    }

    .premium-faq .accordion-item {

        border: none;

        margin-bottom: 22px;

        border-radius: 18px;

        overflow: hidden;

        box-shadow:

            0 18px 40px rgba(0, 0, 0, .08);

    }

    .premium-faq .accordion-button {

        background: white;

        font-size: 20px;

        font-weight: 700;

        padding: 28px;

        color: #012A4A;

        box-shadow: none;

        transition: .3s;

    }

    .premium-faq .accordion-button:hover {

        background: #f4f8ff;

    }

    .premium-faq .accordion-button:not(.collapsed) {

        background:

            linear-gradient(135deg, #014F86, #012A4A);

        color: white;

    }

    .premium-faq .accordion-body {

        padding: 30px;

        font-size: 18px;

        line-height: 1.9;

        background: white;

        color: #555;

    }

    .premium-faq ul {

        margin-top: 15px;

    }

    .premium-faq li {

        margin-bottom: 10px;

    }

    .accordion-button::after {

        filter: brightness(0);

    }

    .accordion-button:not(.collapsed)::after {

        filter: brightness(10);

    }

    @media(max-width:768px) {

        .premium-faq .accordion-button {

            font-size: 17px;

            padding: 20px;

        }

        .premium-faq .accordion-body {

            font-size: 16px;

        }

    }

    .help-card {

        background: white;

        padding: 20px;

        text-align: center;

        border-radius: 20px;

        margin-top: 30px;

        transition: .4s;

        box-shadow:

            0 20px 45px rgba(0, 0, 0, .08);

        height: 100%;

    }

    .help-card:hover {

        transform: translateY(-12px);

    }

    .help-card .icon {

        font-size: 55px;

        margin-bottom: 20px;

    }

    .help-card h4 {

        font-weight: 700;

        margin-bottom: 15px;

        color: #012A4A;

    }

    .help-card p {

        color: #666;

        line-height: 1.5;

    }

    /*======================================
      FINAL CTA
      ======================================*/

    .cta-section {

        padding: 120px 0;

        background:

            linear-gradient(135deg, #014F86, #012A4A);

        color: white;

        position: relative;

        overflow: hidden;

    }

    .cta-section::before {

        content: "";

        position: absolute;

        width: 500px;

        height: 500px;

        background: rgba(255, 255, 255, .06);

        border-radius: 50%;

        right: -180px;

        top: -180px;

    }

    .cta-badge {

        display: inline-block;

        padding: 10px 24px;

        background: rgba(255, 255, 255, .15);

        border-radius: 50px;

        margin-bottom: 25px;

        font-weight: 600;

    }

    .cta-section h2 {

        font-size: 52px;

        font-weight: 800;

        margin-bottom: 20px;

    }

    .cta-section p {

        font-size: 19px;

        line-height: 1.8;

        opacity: .95;

    }

    .btn-register {

        display: inline-block;

        padding: 18px 55px;

        background: #FFD54F;

        color: #012A4A;

        font-size: 22px;

        font-weight: 700;

        border-radius: 60px;

        text-decoration: none;

        transition: .35s;

        box-shadow:

            0 15px 35px rgba(0, 0, 0, .25);

    }

    .btn-register:hover {

        transform: translateY(-6px);

        color: #012A4A;

    }

    .btn-login {

        display: inline-block;

        padding: 14px 42px;

        border: 2px solid white;

        border-radius: 50px;

        color: white;

        font-weight: 600;

        text-decoration: none;

        transition: .35s;

    }

    .btn-login:hover {

        background: white;

        color: #014F86;

    }

    /*======================================
      FOOTER
      ======================================*/

    .footer-premium {

        background: #061B2E;

        color: #ddd;

        padding: 90px 0 40px;

    }

    .footer-logo {

        width: 90px;

        margin-bottom: 20px;

    }

    .footer-premium h3 {

        color: white;

        font-weight: 700;

        margin-bottom: 15px;

    }

    .footer-premium h5 {

        color: white;

        margin-bottom: 25px;

        font-weight: 700;

    }

    .footer-premium ul {

        list-style: none;

        padding: 0;

    }

    .footer-premium li {

        margin-bottom: 12px;

    }

    .footer-premium a {

        color: #ccc;

        text-decoration: none;

        transition: .3s;

    }

    .footer-premium a:hover {

        color: #FFD54F;

        padding-left: 5px;

    }

    .newsletter-box {

        display: flex;

        margin-top: 15px;

    }

    .newsletter-box input {

        flex: 1;

        border: none;

        padding: 14px;

        border-radius: 50px 0 0 50px;

        outline: none;

    }

    .newsletter-box button {

        background: #FFD54F;

        border: none;

        padding: 0 25px;

        font-weight: 700;

        border-radius: 0 50px 50px 0;

    }

    .social-links {

        margin-top: 30px;

        display: flex;

        gap: 15px;

    }

    .social-links a {

        width: 45px;

        height: 45px;

        border-radius: 50%;

        display: flex;

        justify-content: center;

        align-items: center;

        background: #0f2942;

        font-size: 20px;

        color: white;

        transition: .35s;

    }

    .social-links a:hover {

        background: #FFD54F;

        color: #012A4A;

        transform: translateY(-5px);

    }

    .footer-premium hr {

        margin: 60px 0 30px;

        border-color: rgba(255, 255, 255, .1);

    }

    .copyright {

        text-align: center;

        color: #aaa;

        font-size: 15px;

    }

    @media(max-width:768px) {

        .cta-section {

            text-align: center;

        }

        .cta-section h2 {

            font-size: 36px;

        }

        .newsletter-box {

            flex-direction: column;

        }

        .newsletter-box input {

            border-radius: 50px;

            margin-bottom: 12px;

        }

        .newsletter-box button {

            border-radius: 50px;

            height: 50px;

        }

        .social-links {

            justify-content: center;

        }

        .footer-premium {

            text-align: center;

        }

    }

    .alumni-experiences h2 {
        color: #ffffff;
    }

    .alumni-experiences p {
        color: #ffffff;
    }

    /* ================= BACK TO TOP BUTTON ================= */
    #backToTop {
        position: fixed;
        right: 28px;
        bottom: 28px;
        width: 54px;
        height: 54px;
        border: 1px solid rgba(255, 213, 79, .85);
        border-radius: 50%;
        background: rgba(1, 42, 74, .92);
        color: #FFD54F;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        cursor: pointer;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transform: translateY(15px);
        transition: all .35s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .30);
        backdrop-filter: blur(10px);
    }

    #backToTop.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    #backToTop:hover {
        background: #FFD54F;
        color: #012A4A;
        transform: translateY(-5px);
        box-shadow: 0 14px 35px rgba(255, 213, 79, .35);
    }

    #backToTop .backtop-label {
        position: absolute;
        right: 66px;
        white-space: nowrap;
        background: #012A4A;
        color: #fff;
        padding: 7px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        opacity: 0;
        pointer-events: none;
        transform: translateX(8px);
        transition: .25s ease;
        border: 1px solid rgba(255, 213, 79, .35);
    }

    #backToTop:hover .backtop-label {
        opacity: 1;
        transform: translateX(0);
    }

    @media(max-width:768px) {
        #backToTop {
            right: 18px;
            bottom: 18px;
            width: 48px;
            height: 48px;
            font-size: 18px;
        }

        #backToTop .backtop-label {
            display: none;
        }
    }


    /* =========================================================
   TWO EVENT COUNTDOWNS IN HERO
   ========================================================= */

    .hero-event-row {
        width: 100%;
        max-width: 850px;
        margin: 18px auto;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 10px;

        padding: 15px 18px;

        /* background: rgba(255, 255, 255, 0.08); */

        /* border: 1px solid rgba(255, 255, 255, 0.18); */

        border-radius: 8px;

        backdrop-filter: blur(15px);

        box-shadow:
            0 15px 40px rgba(0, 0, 0, .18);

        transition: .35s ease;
    }


    .hero-event-row:hover {
        background: rgba(26, 22, 22, 0.13);

        transform: translateY(-3px);

        border-color:
            rgba(255, 213, 79, .45);
    }


    /* EVENT INFORMATION */

    .hero-event-info {
        flex: 1;

        text-align: centre;

        min-width: 0;
    }


    .hero-event-info .hero-batch {
        margin: 0 0 10px;

        font-size: 23px;

        color: #fff;
    }


    .hero-event-info .hero-batch strong {
        color: #FFD54F;
    }


    /* DATE */

    .hero-event-info .event-date {
        display: inline-block;

        margin: 0;

        padding: 10px 20px;

        font-size: 18px;

        border-radius: 50px;

        background: #FFD54F;

        color: #012A4A;

        box-shadow:
            0 8px 20px rgba(255, 213, 79, .25);
    }


    .hero-event-info .event-date i {
        margin-right: 7px;
    }


    /* =========================================================
   MINI COUNTDOWN
   ========================================================= */

    .mini-countdown {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        flex-shrink: 0;
    }


    .mini-count-card {
        width: 60px;

        height: 62px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        align-items: center;

        border-radius: 50%;

        background:
            rgba(0, 0, 0, .28);

        border:
            1px solid rgba(255, 255, 255, .18);

        box-shadow:
            0 8px 20px rgba(0, 0, 0, .18);

        transition: .3s ease;
    }


    .mini-count-card:hover {
        transform: translateY(-4px);

        background:
            rgba(255, 213, 79, .15);

        border-color:
            rgba(255, 213, 79, .5);
    }


    .mini-count-card strong {
        font-size: 20px;

        line-height: 1;

        font-weight: 800;

        color: #FFD54F;
    }


    .mini-count-card span {
        margin-top: 6px;

        font-size: 9px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: 1px;

        color: rgba(255, 255, 255, .85);
    }


    /* =========================================================
   COUNTDOWN TITLE
   ========================================================= */

    .mini-countdown::before {
        content: "STARTS IN";

        position: absolute;

        margin-top: -90px;

        font-size: 9px;

        font-weight: 800;

        letter-spacing: 2px;

        color: rgba(255, 255, 255, .7);
    }


    /* =========================================================
   TABLET
   ========================================================= */

    @media(max-width:992px) {

        .hero-event-row {
            max-width: 850px;

            padding: 15px;

            gap: 15px;
        }

        .hero-event-info .hero-batch {
            font-size: 17px;
        }

        .hero-event-info .event-date {
            font-size: 16px;

            padding: 9px 15px;
        }

        .mini-count-card {
            width: 60px;

            height: 64px;
        }

        .mini-count-card strong {
            font-size: 21px;
        }
    }


    /* =========================================================
   MOBILE
   ========================================================= */

    @media(max-width:768px) {

        .hero-event-row {

            flex-direction: column;

            align-items: stretch;

            text-align: center;

            padding: 18px 12px;

            gap: 15px;
        }


        .hero-event-info {

            text-align: center;
        }


        .hero-event-info .hero-batch {

            font-size: 16px;
            /* =========================================================
   TABLET
========================================================= */

            @media (max-width: 1100px) {

                .premium-event-card {

                    gap: 18px;

                    padding: 16px;
                }


                .premium-countdown-container {

                    width: 380px;
                }


                .premium-count-box {

                    min-width: 65px;
                }


                .premium-count-box strong {

                    font-size: 22px;
                }

            }


            /* =========================================================
   MOBILE
========================================================= */

            @media (max-width: 768px) {

                .premium-events-wrapper {

                    margin-top: 20px;

                    padding: 0 5px;

                    gap: 14px;
                }


                .premium-event-card {

                    flex-direction: column;

                    align-items: stretch;

                    gap: 15px;

                    padding: 16px;

                    border-radius: 20px;
                }


                .event-card-left {

                    align-items: flex-start;

                    gap: 13px;
                }


                .event-number {

                    width: 45px;
                    height: 45px;

                    border-radius: 13px;

                    font-size: 14px;
                }


                .event-small-title {

                    font-size: 7px;

                    letter-spacing: 1.2px;
                }


                .event-information h3 {

                    font-size: 19px;
                }


                .event-batches {

                    font-size: 12px;

                    line-height: 1.45;
                }


                .event-date-premium {

                    margin-top: 8px;

                    padding: 6px 10px;
                }


                .event-date-premium strong {

                    font-size: 11px;
                }


                .premium-countdown-container {

                    width: 100%;

                    padding: 12px 8px;

                    border-radius: 16px;
                }


                .premium-count-box {

                    flex: 1;

                    min-width: 0;

                    padding: 8px 3px;
                }


                .premium-count-box strong {

                    font-size: 21px;
                }


                .premium-count-box span {

                    font-size: 6px;

                    letter-spacing: .8px;
                }


                .count-separator {

                    font-size: 16px;
                }

            }


            /* =========================================================
   SMALL MOBILE
========================================================= */

            @media (max-width: 420px) {

                .premium-event-card {

                    padding: 13px;
                }


                .event-number {

                    width: 40px;
                    height: 40px;

                    font-size: 12px;
                }


                .event-information h3 {

                    font-size: 17px;
                }


                .event-batches {

                    font-size: 11px;
                }


                .event-date-premium strong {

                    font-size: 10px;
                }


                .premium-count-box strong {

                    font-size: 18px;
                }


                .premium-count-box span {

                    font-size: 5px;
                }


                .count-separator {

                    font-size: 13px;
                }

            }


            /* =========================================================
   PREMIUM TWO EVENT SECTION
========================================================= */

            .premium-events-wrapper {
                width: 100%;
                max-width: 1180px;

                margin: 28px auto 0;

                display: flex;
                flex-direction: column;

                gap: 18px;

                position: relative;

                z-index: 5;
            }


            /* =========================================================
   EVENT CARD
========================================================= */

            .premium-event-card {

                width: 100%;

                display: flex;
                align-items: center;
                justify-content: space-between;

                gap: 30px;

                padding: 18px 22px;

                position: relative;

                overflow: hidden;

                border-radius: 24px;

                background:
                    linear-gradient(135deg,
                        rgba(255, 255, 255, .14),
                        rgba(255, 255, 255, .055));

                border:
                    1px solid rgba(255, 255, 255, .22);

                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);

                box-shadow:
                    0 18px 50px rgba(0, 0, 0, .20);

                transition:
                    transform .35s ease,
                    box-shadow .35s ease,
                    border-color .35s ease;
            }


            /* LIGHT EFFECT */

            .premium-event-card::before {

                content: "";

                position: absolute;

                width: 260px;
                height: 260px;

                top: -150px;
                right: 15%;

                border-radius: 50%;

                background:
                    rgba(255, 213, 79, .12);

                filter: blur(35px);

                pointer-events: none;
            }


            .premium-event-card:hover {

                transform: translateY(-5px);

                box-shadow:
                    0 25px 60px rgba(0, 0, 0, .28);

                border-color:
                    rgba(255, 213, 79, .45);
            }


            /* =========================================================
   LEFT INFORMATION
========================================================= */

            .event-card-left {

                display: flex;

                align-items: center;

                gap: 18px;

                flex: 1;

                min-width: 0;
            }


            /* EVENT NUMBER */

            .event-number {

                width: 58px;
                height: 58px;

                flex-shrink: 0;

                display: flex;

                align-items: center;
                justify-content: center;

                border-radius: 18px;

                font-size: 17px;

                font-weight: 900;

                color: #012A4A;

                background:
                    linear-gradient(135deg,
                        #FFE082,
                        #FFD54F);

                box-shadow:
                    0 10px 25px rgba(255, 213, 79, .25);
            }


            /* INFORMATION */

            .event-information {

                min-width: 0;
            }


            .event-small-title {

                display: block;

                margin-bottom: 3px;

                font-size: 9px;

                font-weight: 800;

                letter-spacing: 2px;

                color:
                    rgba(255, 255, 255, .62);

                text-transform: uppercase;
            }


            .event-information h3 {

                margin: 0 0 4px;

                font-size: 22px;

                line-height: 1.15;

                font-weight: 800;

                color: #fff;
            }


            .event-batches {

                margin: 0;

                font-size: 14px;

                color:
                    rgba(255, 255, 255, .78);
            }


            .event-batches strong {

                color: #FFD54F;

                font-weight: 800;
            }


            /* =========================================================
   DATE PILL
========================================================= */

            .event-date-premium {

                display: inline-flex;

                align-items: center;

                gap: 10px;

                margin-top: 9px;

                padding: 7px 13px;

                border-radius: 13px;

                background:
                    rgba(255, 255, 255, .08);

                border:
                    1px solid rgba(255, 255, 255, .13);
            }


            .event-date-premium .calendar-icon {

                width: 28px;
                height: 28px;

                display: flex;

                align-items: center;
                justify-content: center;

                border-radius: 8px;

                color: #012A4A;

                background: #FFD54F;

                font-size: 12px;
            }


            .event-date-premium small {

                display: block;

                margin-bottom: 1px;

                font-size: 7px;

                font-weight: 800;

                letter-spacing: 1.3px;

                color:
                    rgba(255, 255, 255, .5);
            }


            .event-date-premium strong {

                display: block;

                font-size: 13px;

                font-weight: 800;

                color: #fff;

                white-space: nowrap;
            }


            /* =========================================================
   COUNTDOWN CONTAINER
========================================================= */

            .premium-countdown-container {

                width: 420px;

                flex-shrink: 0;

                padding: 13px 15px;

                border-radius: 19px;

                background:
                    rgba(0, 0, 0, .20);

                border:
                    1px solid rgba(255, 255, 255, .12);
            }


            /* COUNTDOWN TITLE */

            .countdown-heading {

                display: flex;

                align-items: center;
                justify-content: center;

                gap: 7px;

                margin-bottom: 9px;

                font-size: 8px;

                font-weight: 900;

                letter-spacing: 2px;

                color:
                    rgba(255, 255, 255, .68);
            }


            /* PULSE */

            .pulse-dot {

                width: 6px;
                height: 6px;

                border-radius: 50%;

                background: #FFD54F;

                box-shadow:
                    0 0 0 0 rgba(255, 213, 79, .6);

                animation:
                    countdownPulse 1.8s infinite;
            }


            @keyframes countdownPulse {

                0% {
                    box-shadow:
                        0 0 0 0 rgba(255, 213, 79, .55);
                }

                70% {
                    box-shadow:
                        0 0 0 7px rgba(255, 213, 79, 0);
                }

                100% {
                    box-shadow:
                        0 0 0 0 rgba(255, 213, 79, 0);
                }
            }


            /* =========================================================
   COUNTDOWN
========================================================= */

            .premium-countdown {

                display: flex;

                align-items: center;
                justify-content: center;

                gap: 5px;
            }


            /* COUNT BOX */

            .premium-count-box {

                min-width: 74px;

                padding: 7px 5px 6px;

                border-radius: 11px;

                text-align: center;

                background:
                    linear-gradient(145deg,
                        rgba(255, 255, 255, .11),
                        rgba(255, 255, 255, .045));

                border:
                    1px solid rgba(255, 255, 255, .10);

                box-shadow:
                    inset 0 1px 0 rgba(255, 255, 255, .07);
            }


            .premium-count-box strong {

                display: block;

                font-family:
                    "Inter",
                    "Arial",
                    sans-serif;

                font-size: 25px;

                line-height: 1;

                font-weight: 900;

                letter-spacing: -1px;

                color: #FFD54F;

                font-variant-numeric: tabular-nums;
            }


            .premium-count-box span {

                display: block;

                margin-top: 5px;

                font-size: 6px;

                font-weight: 900;

                letter-spacing: 1.2px;

                color:
                    rgba(255, 255, 255, .52);
            }


            /* SEPARATOR */

            .count-separator {

                font-size: 20px;

                font-weight: 700;

                color:
                    rgba(255, 213, 79, .55);

                margin-top: -9px;
            }


            /* =========================================================
   COUNTDOWN FOOTER
========================================================= */

            .countdown-footer {

                margin-top: 7px;

                text-align: center;

                font-size: 8px;

                color:
                    rgba(255, 255, 255, .43);
            }


            .countdown-footer i {

                margin-right: 4px;

                color: #FFD54F;
            }


            /* =========================================================
   EVENT 2 SLIGHTLY DIFFERENT ACCENT
========================================================= */

            .event-two .event-number {

                background:
                    linear-gradient(135deg,
                        #F4D58D,
                        #D4A017);
            }


            .event-two .premium-count-box strong {

                color: #F4D58D;
            }


            .event-two .pulse-dot {

                background: #F4D58D;
            }

            .marquee-container {
                width: 100%;
                overflow: hidden;
                white-space: nowrap;
                background: #1e293b;
                color: #fff;
                padding: 12px 0;
                box-sizing: border-box;
            }

            .marquee-content {
                display: inline-block;
                padding-left: 100%;
                animation: marquee 12s linear infinite;
            }

            @keyframes marquee {
                0% {
                    transform: translate(0, 0);
                }

                100% {
                    transform: translate(-100%, 0);
                }
            }
    </style>


</head>

<body>
    <?php include 'header_aam.php'; ?>
    <!-- ================= HERO SECTION ================= -->
    <section class="hero-section">

        <div class="hero-overlay"></div>

        <div class="container">

            <div class="logo-box">

                <img src="./img/kgp_blue.png" class="hero-logo">

                <img src="./img/palJubLogo.png" class="hero-logo">

            </div>

            <div class="hero-content">

                <span class="event-tag">
                    ✨ Platinum Jubilee Celebration
                </span>

                <h1>
                    Homecoming 2026
                </h1>

                <h2>Indian Institute of Technology Kharagpur</h2>

                <!-- <p class="hero-batch">
                    Celebrating the Batches of
                    <strong>2003 • 2008 • 2013</strong>

                </p> -->



                <!-- ================= EVENT 1 ================= -->
                <!--<div class="hero-event-row">

                    <div class="hero-event-info">

                        <p class="hero-batch">
                            Celebrating the Batches of
                            <strong>2003 • 2008 • 2013</strong>
                        </p>

                        <div class="event-date">
                            <span>
                                <i class="fa-regular fa-calendar-days"></i>
                                9–11 October 2026
                            </span>
                        </div>

                    </div>

                    <div class="mini-countdown" id="countdownEvent1">

                        <div class="mini-count-card">
                            <strong id="event1Days">00</strong>
                            <span>Days</span>
                        </div>

                        <div class="mini-count-card">
                            <strong id="event1Hours">00</strong>
                            <span>Hours</span>
                        </div>

                        <div class="mini-count-card">
                            <strong id="event1Minutes">00</strong>
                            <span>Min</span>
                        </div>

                        <div class="mini-count-card">
                            <strong id="event1Seconds">00</strong>
                            <span>Sec</span>
                        </div>

                    </div>

                </div>-->


                <!-- ================= EVENT 2 ================= -->
                <div class="hero-event-row">

                    <div class="hero-event-info">

                        <p class="hero-batch">
                            Celebrating the Batches of
                            <strong>2004 • 2009 • 2014</strong>
                        </p>

                        <div class="event-date">
                            <span>
                                <i class="fa-regular fa-calendar-days"></i>
                                30 October – 1 November 2026
                            </span>
                        </div>

                    </div>

                    <div class="mini-countdown" id="countdownEvent2">

                        <div class="mini-count-card">
                            <strong id="event2Days">00</strong>
                            <span>Days</span>
                        </div>

                        <div class="mini-count-card">
                            <strong id="event2Hours">00</strong>
                            <span>Hours</span>
                        </div>

                        <div class="mini-count-card">
                            <strong id="event2Minutes">00</strong>
                            <span>Min</span>
                        </div>

                        <div class="mini-count-card">
                            <strong id="event2Seconds">00</strong>
                            <span>Sec</span>
                        </div>

                    </div>

                </div>



                <p class="hero-description">

                    Reconnect with friends, revisit unforgettable memories,
                    celebrate the Platinum Jubilee,
                    and experience an extraordinary reunion at IIT Kharagpur.

                </p>

                <div class="hero-buttons">

                    <!-- <a href="signup.php" class="btn-register">
                        Register Now
                    </a>-->

                    <a href="login_aam.php" class="btn-login">
                        Login
                    </a>

                </div>

            </div>
            <!-- <marquee direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();"
                class="mt-4 text-white text-lg mrq">
                <h6> Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe provident veniam architecto.
                    Iure eum
                    animi quam eligendi, nostrum, reiciendis sit rerum pariatur ad corrupti voluptas aspernatur debitis
                    deleniti repellat autem!</h6>
            </marquee> -->

        </div>



    </section>
    <!-- ================= COUNTDOWN SECTION ================= -->

    <!-- <section class="countdown-section">

        <div class="container">

            <div class="section-title">

                <span>EVENT STARTS IN</span>

                <h2>Countdown to Homecoming 2026</h2>

                <p>
                    The excitement begins on
                    <strong>9 October 2026</strong>
                </p>

            </div>

            <div id="countdown">

                <div class="count-card">
                    <h1 id="days">00</h1>
                    <span>Days</span>
                </div>

                <div class="count-card">
                    <h1 id="hours">00</h1>
                    <span>Hours</span>
                </div>

                <div class="count-card">
                    <h1 id="minutes">00</h1>
                    <span>Minutes</span>
                </div>

                <div class="count-card">
                    <h1 id="seconds">00</h1>
                    <span>Seconds</span>
                </div>

            </div>

        </div>

    </section> -->
    <!-- =====================================
 PREMIUM EVENT STATISTICS
======================================-->

    <section class="stats-section">

        <div class="container">

            <div class="section-heading">

                <span>WHY ATTEND?</span>

                <h2>Experience the Grand Reunion</h2>

                <p>
                    Join thousands of distinguished alumni for three unforgettable days of
                    celebration, networking, nostalgia and lifelong memories.
                </p>

            </div>

            <div class="stats-grid">

                <div class="stat-box">

                    <div class="stat-icon">
                        🎓
                    </div>

                    <h2 class="counter" data-target="200">0</h2>

                    <h5>Alumni Expected</h5>

                    <p>
                        Reconnect with thousands of IIT KGP alumni from around the globe.
                    </p>

                </div>

                <div class="stat-box">

                    <div class="stat-icon">
                        🌎
                    </div>

                    <h2 class="counter" data-target="10">0</h2>

                    <h5>Countries</h5>

                    <p>
                        Participants travelling from every corner of the world.
                    </p>

                </div>

                <div class="stat-box">

                    <div class="stat-icon">
                        🏆
                    </div>

                    <h2 class="counter" data-target="6">0</h2>

                    <h5>Celebrated Batches</h5>

                    <p>
                        2003 • 2008 • 2013 • 2004 • 2009 • 2014
                    </p>

                </div>

                <div class="stat-box">

                    <div class="stat-icon">
                        🎉
                    </div>

                    <h2 class="counter" data-target="15">0</h2>

                    <h5>Major Events</h5>

                    <p>
                        Entertainment, reunions, campus tours, networking and much more.
                    </p>

                </div>

            </div>

        </div>

    </section>
    <!-- ==========================================
EVENT HIGHLIGHTS
===========================================-->

    <section class="event-section">

        <div class="container">

            <div class="section-heading">

                <span>EVENT HIGHLIGHTS</span>

                <h2>Three Days You'll Never Forget</h2>



            </div>

            <div class="event-grid">

                <!-- Card -->

                <div class="event-card">

                    <img src="img/itenary_1.jpg" alt="">

                    <div class="event-overlay">

                        <!-- <h3>Event</h3> -->


                    </div>

                </div>

                <div class="event-card">

                    <img src="img/itenary_2.jpg" alt="">

                    <div class="event-overlay">

                        <!-- <h3>Event</h3> -->

                    </div>

                </div>

                <div class="event-card">

                    <img src="img/itenary_3.jpg" alt="">

                    <div class="event-overlay">

                        <!-- <h3>Event</h3> -->



                    </div>

                </div>



            </div>

        </div>

    </section>


    <section class="premium-gallery-section">

        <div class="gallery-container">

            <!-- SECTION HEADER -->
            <div class="premium-gallery-heading">

                <div class="heading-topline">
                    <span class="heading-line"></span>
                    <span class="heading-label">MEMORIES</span>
                    <span class="heading-line"></span>
                </div>

                <h2>
                    Moments That
                    <span>Last Forever</span>
                </h2>



            </div>


            <!-- GALLERY -->
            <div class="premium-gallery-grid">


                <!-- ITEM 01 -->
                <div class="premium-gallery-item gallery-large">

                    <img src="img/4.jpg" alt="Campus Reunion" loading="lazy">

                    <div class="gallery-gradient"></div>

                    <div class="gallery-number">
                        01
                    </div>

                    <div class="gallery-category">
                        REUNION
                    </div>

                    <div class="gallery-content">

                        <div class="gallery-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div>
                            <h3>Campus Reunion</h3>

                            <p>
                                Coming together once again
                            </p>
                        </div>

                    </div>

                    <button type="button" class="gallery-view-btn" aria-label="View Campus Reunion">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                </div>


                <!-- ITEM 02 -->
                <div class="premium-gallery-item gallery-tall">

                    <img src="img/a1.webp" alt="Group Photograph" loading="lazy">

                    <div class="gallery-gradient"></div>

                    <div class="gallery-number">
                        02
                    </div>

                    <div class="gallery-category">
                        ALUMNI
                    </div>

                    <div class="gallery-content">

                        <div class="gallery-icon">
                            <i class="fa-solid fa-camera"></i>
                        </div>

                        <div>
                            <h3>Group Photograph</h3>

                            <p>
                                One frame. Countless memories.
                            </p>
                        </div>

                    </div>


                    <button type="button" class="gallery-view-btn" aria-label="View Group Photograph">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                </div>


                <!-- ITEM 03 -->
                <div class="premium-gallery-item">

                    <img src="img/hc6.webp" alt="Cultural Evening" loading="lazy">

                    <div class="gallery-gradient"></div>

                    <div class="gallery-number">
                        03
                    </div>

                    <div class="gallery-category">
                        CULTURE
                    </div>

                    <div class="gallery-content">

                        <div class="gallery-icon">
                            <i class="fa-solid fa-music"></i>
                        </div>

                        <div>
                            <h3>Cultural Evening</h3>

                            <p>
                                Celebrating our shared spirit
                            </p>
                        </div>

                    </div>


                    <button type="button" class="gallery-view-btn" aria-label="View Cultural Evening">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                </div>


                <!-- ITEM 04 -->
                <div class="premium-gallery-item">

                    <img src="img/hall2.webp" alt="Hall Visit" loading="lazy">

                    <div class="gallery-gradient"></div>

                    <div class="gallery-number">
                        04
                    </div>

                    <div class="gallery-category">
                        HALL VISIT
                    </div>

                    <div class="gallery-content">

                        <div class="gallery-icon">
                            <i class="fa-solid fa-handshake"></i>
                        </div>

                        <div>
                            <h3> HALL VISIT</h3>

                            <p>
                                Walk the Halls, Discover the Story.
                            </p>
                        </div>

                    </div>


                    <button type="button" class="gallery-view-btn" aria-label="View Networking">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                </div>


                <!-- ITEM 05 -->
                <div class="premium-gallery-item gallery-wide">

                    <img src="img/musical.jpg" alt="Musical Night" loading="lazy">

                    <div class="gallery-gradient"></div>

                    <div class="gallery-number">
                        05
                    </div>

                    <div class="gallery-category">
                        CELEBRATION
                    </div>

                    <div class="gallery-content">

                        <div class="gallery-icon">
                            <i class="fa-solid fa-star"></i>
                        </div>

                        <div>
                            <h3>Musical Night</h3>

                            <p>
                                An evening filled with joy and nostalgia
                            </p>
                        </div>

                    </div>


                    <button type="button" class="gallery-view-btn" aria-label="View Musical Night">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                </div>


                <!-- ITEM 06 -->
                <div class="premium-gallery-item">

                    <img src="img/illu3.webp" alt="Illumination " loading="lazy">

                    <div class="gallery-gradient"></div>

                    <div class="gallery-number">
                        06
                    </div>

                    <div class="gallery-category">
                        ILLUMINATION
                    </div>

                    <div class="gallery-content">

                        <div class="gallery-icon">
                            <i class="fa-solid fa-user-group"></i>
                        </div>

                        <div>
                            <h3>Illumination</h3>

                            <p>
                                Most iconic, decades-old Diwali tradition
                            </p>
                        </div>

                    </div>


                    <button type="button" class="gallery-view-btn" aria-label="View Illumination">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                </div>


                <!-- ITEM 07 -->
                <div class="premium-gallery-item">

                    <img src="img/arena1.webp" alt="Alumni Memories" loading="lazy">

                    <div class="gallery-gradient"></div>

                    <div class="gallery-number">
                        07
                    </div>

                    <div class="gallery-category">
                        ALUMNI MEET MEMORIES
                    </div>

                    <div class="gallery-content">

                        <div class="gallery-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>

                        <div>
                            <h3>Alumni Meet Memories</h3>

                            <p>
                                Moments close to our hearts
                            </p>
                        </div>

                    </div>


                    <button type="button" class="gallery-view-btn" aria-label="View Memories">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                </div>



            </div>


            <!-- BOTTOM CTA -->
            <div class="gallery-bottom">

                <div class="gallery-bottom-text">

                    <span>
                        <i class="fa-solid fa-camera-retro"></i>
                        MORE MEMORIES
                    </span>

                    <h3>
                        Every picture tells a story.
                    </h3>

                </div>

                <div class="gallery-counter">

                    <strong>07</strong>

                    <span>Moments</span>

                </div>

            </div>

        </div>

    </section>



    <div class="premium-lightbox" id="premiumLightbox" aria-hidden="true">

        <!-- CLOSE -->
        <button type="button" class="lightbox-close" id="lightboxClose" aria-label="Close gallery">
            <i class="fa-solid fa-xmark"></i>
        </button>


        <!-- PREVIOUS -->
        <button type="button" class="lightbox-arrow lightbox-prev" id="lightboxPrev" aria-label="Previous image">
            <i class="fa-solid fa-chevron-left"></i>
        </button>


        <!-- CONTENT -->
        <div class="lightbox-content" id="lightboxContent">

            <img id="lightboxImage" src="" alt="">

            <div class="lightbox-caption">

                <span id="lightboxCategory">
                    MEMORIES
                </span>

                <h3 id="lightboxTitle">
                    Alumni Memories
                </h3>

            </div>

        </div>


        <!-- NEXT -->
        <button type="button" class="lightbox-arrow lightbox-next" id="lightboxNext" aria-label="Next image">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

    </div>


    <section class="testimonial-section">

        <div class="container">

            <div class="section-heading alumni-experiences">

                <span>ALUMNI EXPERIENCES</span>

                <h2>What Our Alumni Say</h2>

                <p>

                    Every reunion creates unforgettable memories.
                    Hear from our alumni about their Annual Alumni Meet experience.

                </p>

            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-inner">



                    <div class="carousel-item active">

                        <div class="testimonial-card">

                            <img src="img/default-person-image.jpg" class="testimonial-img">

                            <div class="stars">

                                ★★★★★

                            </div>

                            <p>

                                "Returning to IIT Kharagpur after decades was truly emotional.
                                Meeting old friends, professors, and walking across the campus
                                brought back countless memories."

                            </p>

                            <!-- <h4>Dr. Amit Sharma</h4> -->

                            <span>Batch of 1976</span>

                        </div>

                    </div>



                    <div class="carousel-item">

                        <div class="testimonial-card">

                            <img src="img/default-person-image.jpg" class="testimonial-img">

                            <div class="stars">

                                ★★★★★

                            </div>

                            <p>

                                "The Annual Alumni Meet is more than an event.
                                It reconnects us with lifelong friendships and
                                creates opportunities to inspire the next generation."

                            </p>

                            <!-- <h4>Neha Gupta</h4> -->

                            <span>Batch of 1986</span>

                        </div>

                    </div>



                    <div class="carousel-item">

                        <div class="testimonial-card">

                            <img src="img/default-person-image.jpg" class="testimonial-img">

                            <div class="stars">

                                ★★★★★

                            </div>

                            <p>

                                "The hospitality, networking opportunities,
                                campus tour and cultural evening made this reunion
                                one of the best experiences of my life."

                            </p>

                            <!-- <h4>Rahul Verma</h4> -->

                            <span>Batch of 2001</span>

                        </div>

                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">

                    <span class="carousel-control-prev-icon"></span>

                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">

                    <span class="carousel-control-next-icon"></span>

                </button>

            </div>

        </div>

    </section>

    <!-- ==========================================
    FAQ SECTION
    ========================================== -->

    <section class="faq-section">

        <div class="container">

            <div class="section-heading">

                <span>HELP CENTER</span>

                <h2>Frequently Asked Questions</h2>

                <p>

                    Everything you need to know before attending the
                    Homecoming 2026.

                </p>

            </div>

            <div class="accordion premium-faq" id="faqAccordion">

                <!-- FAQ 1 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">

                            How do I register for the Annual Alumni Meet?

                        </button>

                    </h2>

                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Simply click the <strong>Register</strong> button on the homepage,
                            complete the registration form and submit your payment details.

                        </div>

                    </div>

                </div>

                <!-- FAQ 2 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                            What is included in the registration fee?

                        </button>

                    </h2>

                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            The registration fee includes:

                            <ul>

                                <li>Registration Kit</li>

                                <li>Meals during the event</li>

                                <li>Campus Transportation</li>

                                <li>Cultural Programs</li>

                                <li>Networking Sessions</li>

                            </ul>

                        </div>

                    </div>

                </div>

                <!-- FAQ 3 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3">

                            Will accommodation be provided?

                        </button>

                    </h2>

                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Please note that campus accommodation is limited, and we are expecting a higher turnout this
                            Platinum Jubilee year. Therefore, most accommodations will be on a shared basis. We seek
                            your kind understanding and cooperation in this regard.

                        </div>

                    </div>

                </div>
                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq6">

                            Is accommodation included in the registration fee?

                        </button>

                    </h2>

                    <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            No. Accommodation is not included in the registration fee. Applicable accommodation charges
                            will be payable separately by participants.

                        </div>

                    </div>

                </div>

                <!-- FAQ 4 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq4">

                            Can I bring my family members?

                        </button>

                    </h2>

                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Yes.

                            Spouse and accompanying adults can register during the
                            registration process.

                        </div>

                    </div>

                </div>

                <!-- FAQ 5 -->

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq5">

                            How do I contact the organizers?

                        </button>

                    </h2>

                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Please visit the Contact section at the bottom of this page
                            or email the Office of Alumni Affairs.

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row mt-2 mx-5">

            <div class="col-lg-4 gap-2">

                <div class="help-card">

                    <div class="icon">📞</div>

                    <h4>Call Us</h4>

                    <p>

                        Our team is available to assist you with registration and event queries.

                    </p>
                    <p>
                    <h6>☎ +91 3222-281859</h6>
                    </p>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="help-card">

                    <div class="icon">📧</div>

                    <h4>Email Support</h4>
                    <p>

                        Reach us anytime via email for accommodation,
                        travel or payment assistance.

                    </p>
                    <p>
                        <!-- <h6>✉ alumni@hijli.iitkgp.ac.in</h6> -->
                    <h6>✉ anamika.das@adm.iitkgp.ac.in</h6>

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="help-card">

                    <div class="icon">💬</div>

                    <h4>Need Help?</h4>

                    <p>

                        Our volunteers will be happy to guide you throughout
                        the registration process.

                    </p>

                </div>

            </div>

        </div>

    </section>
    <!-- ==========================================
FINAL CALL TO ACTION
========================================== -->

    <section class="cta-section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-8">
                    <div class="display: flex; gap: 10px; flex-wrap: wrap;">

                        <!--<span class="cta-badge">
                            Homecoming 2026 • 9–11 October 2026
                        </span>-->
                        <span class="cta-badge">
                            Homecoming 2026 • 30 October – 1 November 2026
                        </span>
                    </div>

                    <h2>
                        Reconnect. Celebrate. Relive the Memories.
                    </h2>

                    <p>

                        Join your batchmates once again at IIT Kharagpur and
                        experience three unforgettable days filled with nostalgia,
                        friendship, celebrations, campus visits, cultural evenings,
                        and lifelong memories.

                    </p>

                </div>

                <div class="col-lg-4 text-center">
                    <!--
                    <a href="signup.php" class="btn-register">

                        Register Now

                    </a> -->

                    <br><br>

                    <!-- <a href="login_aam.php" class="btn-login">

                        Already Registered?

                    </a> -->

                </div>

            </div>

        </div>

    </section>



    <!-- ==========================================
FOOTER
========================================== -->

    <footer class="footer-premium">

        <div class="container">

            <div class="row gy-5">

                <!-- Logo -->

                <div class="col-lg-4">


                    <h3>

                        Office of Alumni Affairs
                    </h3>

                    <p>

                        Indian Institute of Technology Kharagpur

                    </p>

                    <p>

                        Homecoming 2026

                    </p>

                </div>

                <!-- Quick Links -->

                <div class="col-lg-2">

                    <h5>Quick Links</h5>

                    <ul>

                        <li><a href="#">Home</a></li>

                        /* <li><a href="signup.php">Register</a></li> */

                        <li><a href="login_aam.php">Login</a></li>

                        <li><a href="#">Programme</a></li>

                        <li><a href="#">Accommodation</a></li>

                    </ul>

                </div>

                <!-- Contact -->

                <div class="col-lg-3">

                    <h5>Contact</h5>

                    <p>

                        Office of Alumni Affairs

                        <br>

                        IIT Kharagpur

                    </p>

                    <p>

                        ☎ +91 3222-281859

                    </p>

                    <p>

                        ✉ alumni@hijli.iitkgp.ac.in

                    </p>

                </div>

                <!-- Newsletter -->

                <div class="col-lg-3">

                    <h5>Stay Updated</h5>



                    <div class="social-links">

                        <a href="https://www.facebook.com/IITKgp" target="_blank"><i class="fab fa-facebook-f"></i></a>

                        <a href="https://www.linkedin.com/in/office-of-alumni-affairs-iit-kharagpur-789978377/"
                            target="_blank"><i class="fab fa-linkedin-in"></i></a>

                        <!-- <a href="#"><i class="fab fa-instagram"></i></a> -->

                        <!--  <a href="#"><i class="fab fa-youtube"></i></a> -->

                        <!-- <a href="#"><i class="fab fa-x-twitter"></i></a> -->

                    </div>

                </div>

            </div>

            <hr>

            <div class="copyright">

                © 2026 Office of Alumni Affairs, IIT Kharagpur.
                All Rights Reserved.

            </div>

        </div>

    </footer>



    <!-- ================= BACK TO TOP BUTTON ================= -->
    <button id="backToTop" type="button" aria-label="Back to top" title="Back to top"
        onclick="window.scrollTo({top:0,left:0,behavior:'smooth'}); return false;">
        <span class="backtop-label">Back to Top</span>
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
/* =========================================================
   TWO EVENT COUNTDOWNS
   ========================================================= */

(function() {

    /*
     * EVENT 1
     * 9 October 2026
     */
    const event1Date =
        new Date("October 9, 2026 09:00:00").getTime();


    /*
     * EVENT 2
     * 30 October 2026
     */
    const event2Date =
        new Date("October 30, 2026 09:00:00").getTime();


    function updateCountdown(
        targetDate,
        daysId,
        hoursId,
        minutesId,
        secondsId,
        containerId,
        eventName
    ) {

        const now =
            new Date().getTime();

        const distance =
            targetDate - now;


        /* EVENT STARTED */

        if (distance <= 0) {

            const container =
                document.getElementById(containerId);

            if (container) {

                container.innerHTML = `
                    <div class="event-live-message">
                        <i class="fa-solid fa-circle-check"></i>
                        ${eventName} Started
                    </div>
                `;

            }

            return;
        }


        /* CALCULATE TIME */

        const days =
            Math.floor(
                distance /
                (1000 * 60 * 60 * 24)
            );


        const hours =
            Math.floor(
                (distance %
                    (1000 * 60 * 60 * 24)) /
                (1000 * 60 * 60)
            );


        const minutes =
            Math.floor(
                (distance %
                    (1000 * 60 * 60)) /
                (1000 * 60)
            );


        const seconds =
            Math.floor(
                (distance %
                    (1000 * 60)) /
                1000
            );


        /* UPDATE */

        const daysElement =
            document.getElementById(daysId);

        const hoursElement =
            document.getElementById(hoursId);

        const minutesElement =
            document.getElementById(minutesId);

        const secondsElement =
            document.getElementById(secondsId);


        if (daysElement) {

            daysElement.textContent =
                String(days).padStart(2, "0");

        }


        if (hoursElement) {

            hoursElement.textContent =
                String(hours).padStart(2, "0");

        }


        if (minutesElement) {

            minutesElement.textContent =
                String(minutes).padStart(2, "0");

        }


        if (secondsElement) {

            secondsElement.textContent =
                String(seconds).padStart(2, "0");

        }

    }


    function updateAllCountdowns() {

        /* EVENT 1 */

        updateCountdown(
            event1Date,
            "event1Days",
            "event1Hours",
            "event1Minutes",
            "event1Seconds",
            "countdownEvent1",
            "9–11 October 2026"
        );


        /* EVENT 2 */

        updateCountdown(
            event2Date,
            "event2Days",
            "event2Hours",
            "event2Minutes",
            "event2Seconds",
            "countdownEvent2",
            "30 October – 1 November 2026"
        );

    }


    /* FIRST UPDATE */

    updateAllCountdowns();


    /* UPDATE EVERY SECOND */

    setInterval(
        updateAllCountdowns,
        1000
    );

})();
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    /* =====================================================
       GALLERY DATA
    ===================================================== */

    const galleryImages = [

        {
            image: "img/4.jpg",
            title: "Campus Reunion",
            category: "REUNION"
        },

        {
            image: "img/4.jpg",
            title: "Group Photograph",
            category: "ALUMNI"
        },

        {
            image: "img/4.jpg",
            title: "Cultural Evening",
            category: "CULTURE"
        },

        {
            image: "img/4.jpg",
            title: "Networking",
            category: "NETWORKING"
        },

        {
            image: "img/4.jpg",
            title: "Musical Night",
            category: "CELEBRATION"
        },

        {
            image: "img/4.jpg",
            title: "Batch Reunion",
            category: "BATCH"
        },

        {
            image: "img/4.jpg",
            title: "Memories",
            category: "MEMORIES"
        }

    ];


    /* =====================================================
       ELEMENTS
    ===================================================== */

    const lightbox =
        document.getElementById("premiumLightbox");

    const lightboxImage =
        document.getElementById("lightboxImage");

    const lightboxTitle =
        document.getElementById("lightboxTitle");

    const lightboxCategory =
        document.getElementById("lightboxCategory");

    const closeButton =
        document.getElementById("lightboxClose");

    const previousButton =
        document.getElementById("lightboxPrev");

    const nextButton =
        document.getElementById("lightboxNext");

    const lightboxContent =
        document.getElementById("lightboxContent");


    /* =====================================================
       CURRENT IMAGE
    ===================================================== */

    let currentGalleryIndex = 0;


    /* =====================================================
       UPDATE IMAGE
    ===================================================== */

    function updateLightbox() {

        if (!galleryImages.length) {
            return;
        }

        const item =
            galleryImages[currentGalleryIndex];


        lightboxImage.src = item.image;

        lightboxImage.alt = item.title;

        lightboxTitle.textContent =
            item.title;

        lightboxCategory.textContent =
            item.category;

    }


    /* =====================================================
       OPEN LIGHTBOX
    ===================================================== */

    function openLightbox(index) {

        currentGalleryIndex = index;

        updateLightbox();

        lightbox.classList.add("active");

        lightbox.setAttribute(
            "aria-hidden",
            "false"
        );

        document.body.style.overflow =
            "hidden";

    }


    /* =====================================================
       CLOSE LIGHTBOX
    ===================================================== */

    function closeLightbox() {

        lightbox.classList.remove("active");

        lightbox.setAttribute(
            "aria-hidden",
            "true"
        );

        document.body.style.overflow =
            "";

    }


    /* =====================================================
       NEXT IMAGE
    ===================================================== */

    function nextImage() {

        currentGalleryIndex++;

        if (
            currentGalleryIndex >=
            galleryImages.length
        ) {

            currentGalleryIndex = 0;

        }

        updateLightbox();

    }


    /* =====================================================
       PREVIOUS IMAGE
    ===================================================== */

    function previousImage() {

        currentGalleryIndex--;

        if (currentGalleryIndex < 0) {

            currentGalleryIndex =
                galleryImages.length - 1;

        }

        updateLightbox();

    }


    /* =====================================================
       GALLERY VIEW BUTTONS
    ===================================================== */

    const galleryButtons =
        document.querySelectorAll(
            ".gallery-view-btn"
        );


    galleryButtons.forEach(function(button, index) {

        button.addEventListener(
            "click",
            function(event) {

                event.preventDefault();

                event.stopPropagation();

                openLightbox(index);

            }
        );

    });


    /* =====================================================
       CLOSE
    ===================================================== */

    closeButton.addEventListener(
        "click",
        function(event) {

            event.preventDefault();

            event.stopPropagation();

            closeLightbox();

        }
    );


    /* =====================================================
       NEXT
    ===================================================== */

    nextButton.addEventListener(
        "click",
        function(event) {

            event.preventDefault();

            event.stopPropagation();

            nextImage();

        }
    );


    /* =====================================================
       PREVIOUS
    ===================================================== */

    previousButton.addEventListener(
        "click",
        function(event) {

            event.preventDefault();

            event.stopPropagation();

            previousImage();

        }
    );


    /* =====================================================
       CLICK OUTSIDE IMAGE = CLOSE
    ===================================================== */

    lightbox.addEventListener(
        "click",
        function(event) {

            if (
                event.target === lightbox
            ) {

                closeLightbox();

            }

        }
    );


    /* =====================================================
       DON'T CLOSE WHEN CLICKING IMAGE/CAPTION
    ===================================================== */

    lightboxContent.addEventListener(
        "click",
        function(event) {

            event.stopPropagation();

        }
    );


    /* =====================================================
       KEYBOARD CONTROLS
    ===================================================== */

    document.addEventListener(
        "keydown",
        function(event) {

            if (
                !lightbox.classList.contains(
                    "active"
                )
            ) {

                return;

            }


            /* ESC */

            if (
                event.key === "Escape"
            ) {

                closeLightbox();

            }


            /* RIGHT */

            if (
                event.key === "ArrowRight"
            ) {

                nextImage();

            }


            /* LEFT */

            if (
                event.key === "ArrowLeft"
            ) {

                previousImage();

            }

        }
    );


    /* =====================================================
       TOUCH SWIPE
    ===================================================== */

    let touchStartX = 0;

    let touchEndX = 0;


    lightbox.addEventListener(
        "touchstart",
        function(event) {

            touchStartX =
                event.changedTouches[0].screenX;

        }, {
            passive: true
        }
    );


    lightbox.addEventListener(
        "touchend",
        function(event) {

            touchEndX =
                event.changedTouches[0].screenX;

            handleSwipe();

        }, {
            passive: true
        }
    );


    function handleSwipe() {

        const distance =
            touchEndX - touchStartX;


        if (
            Math.abs(distance) < 50
        ) {

            return;

        }


        if (distance < 0) {

            nextImage();

        } else {

            previousImage();

        }

    }

});
</script>
<script>
(function() {
    function initBackToTop() {
        var btn = document.getElementById('backToTop');
        if (!btn) return;

        function toggleBackToTop() {
            var y = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
            if (y > 250) {
                btn.classList.add('show');
            } else {
                btn.classList.remove('show');
            }
        }

        window.addEventListener('scroll', toggleBackToTop, {
            passive: true
        });
        window.addEventListener('load', toggleBackToTop);
        toggleBackToTop();

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initBackToTop);
    } else {
        initBackToTop();
    }
})();
</script>
<script>
const eventDate = new Date("Octoer 9, 2026 09:00:00").getTime();

const timer = setInterval(function() {

    const now = new Date().getTime();

    const distance = eventDate - now;

    if (distance <= 0) {

        clearInterval(timer);

        document.getElementById("countdown").innerHTML =

            "<h2 style='color:white;'>🎉 Welcome to the Homecoming 2026!</h2>";

        return;

    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));

    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = String(days).padStart(2, '0');

    document.getElementById("hours").innerHTML = String(hours).padStart(2, '0');

    document.getElementById("minutes").innerHTML = String(minutes).padStart(2, '0');

    document.getElementById("seconds").innerHTML = String(seconds).padStart(2, '0');

}, 1000);

const counters = document.querySelectorAll(".counter");

const speed = 120;

const observer = new IntersectionObserver(entries => {

    entries.forEach(entry => {

        if (entry.isIntersecting) {

            const counter = entry.target;

            const update = () => {

                const target = +counter.getAttribute("data-target");

                const count = +counter.innerText;

                const increment = Math.ceil(target / speed);

                if (count < target) {

                    counter.innerText = count + increment;

                    setTimeout(update, 15);

                } else {

                    counter.innerText = target.toLocaleString();

                }

            };

            update();

            observer.unobserve(counter);

        }

    });

});

counters.forEach(counter => {

    observer.observe(counter);

});
const galleryItems = document.querySelectorAll(".gallery-item img");

const lightbox = document.getElementById("lightbox");

const lightboxImage = document.getElementById("lightboxImage");

galleryItems.forEach(item => {

    item.onclick = function() {

        lightbox.style.display = "flex";

        lightboxImage.src = this.src;

    }

});

document.getElementById("closeLightbox").onclick = function() {

    lightbox.style.display = "none";

};

lightbox.onclick = function(e) {

    if (e.target === lightbox) {

        lightbox.style.display = "none";

    }

};

const shareUrl = window.location.href;
const shareText = "Join me at the Homecoming 2026 at IIT Kharagpur! Don't miss the fun!";

// Show share options
document.getElementById("invite-btn").onclick = () => {
    const socialButtons = document.getElementById("social-buttons");
    socialButtons.style.display = "flex";
    socialButtons.classList.add("fadeIn");
    document.getElementById("invite-btn").style.display = "none";
};

// Facebook
document.getElementById("share-facebook").onclick = (e) => {
    e.preventDefault();
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`, "_blank");
};

// WhatsApp
document.getElementById("share-whatsapp").onclick = (e) => {
    e.preventDefault();
    window.open(`https://wa.me/?text=${encodeURIComponent(shareText + " " + shareUrl)}`, "_blank");
};

// Instagram
document.getElementById("share-instagram").onclick = (e) => {
    e.preventDefault();
    alert("Instagram doesn’t support direct link sharing — copy the link and share it in your story or bio!");
};

// Copy link
document.getElementById("copy-link").onclick = () => {
    navigator.clipboard.writeText(shareText + " " + shareUrl)
        .then(() => {
            const msg = document.getElementById("copy-msg");
            msg.style.display = "block";
            setTimeout(() => msg.style.display = "none", 2000);
        });
};
</script>

</html>

<?php
// include 'footer_aam.php'; 
?>