<?php
error_reporting(0);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homecoming 2026 | Platinum Jubilee • IIT Kharagpur</title>

    <!-- Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Frameworks & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <style>
    :root {
        --bg-deep: #030712;
        --bg-surface: #070e20;
        --bg-card: rgba(11, 23, 48, 0.65);
        --bg-glass-card: rgba(255, 255, 255, 0.03);
        --border-subtle: rgba(255, 255, 255, 0.08);
        --border-glow: rgba(234, 179, 8, 0.45);

        --gold-primary: #f59e0b;
        --gold-light: #fef08a;
        --gold-bright: #fbbf24;
        --gold-gradient: linear-gradient(135deg, #fde047 0%, #d97706 100%);
        --gold-border-gradient: linear-gradient(135deg, rgba(253, 224, 71, 0.4), rgba(217, 119, 6, 0.05));

        --accent-cyan: #38bdf8;
        --text-lead: #f8fafc;
        --text-body: #94a3b8;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: var(--bg-deep);
        color: var(--text-lead);
        overflow-x: hidden;
        letter-spacing: -0.01em;
    }

    ::selection {
        background: var(--gold-primary);
        color: #030712;
    }

    .serif-title {
        font-family: 'Cinzel', Georgia, serif;
        letter-spacing: 0.03em;
    }

    .mono-num {
        font-family: 'Space Grotesk', sans-serif;
        font-variant-numeric: tabular-nums;
    }

    /* Luxury Noise Background */
    .noise-overlay {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        opacity: 0.03;
        pointer-events: none;
        z-index: 99999;
        background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
    }

    /* Ambient Aurora Canvas */
    .ambient-canvas {
        position: fixed;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        overflow: hidden;
    }

    .ambient-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(140px);
        opacity: 0.22;
        animation: floatGlow 22s infinite alternate ease-in-out;
    }

    .blob-1 {
        width: 650px;
        height: 650px;
        background: radial-gradient(circle, #2563eb, transparent 70%);
        top: -15%;
        right: -5%;
    }

    .blob-2 {
        width: 580px;
        height: 580px;
        background: radial-gradient(circle, #d97706, transparent 70%);
        bottom: 15%;
        left: -10%;
        animation-duration: 28s;
    }

    .ambient-grid {
        position: fixed;
        inset: 0;
        background-size: 50px 50px;
        background-image:
            linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
        mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
        -webkit-mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
        z-index: 0;
        pointer-events: none;
    }

    @keyframes floatGlow {
        0% {
            transform: translate(0, 0) scale(1);
        }

        50% {
            transform: translate(60px, 80px) scale(1.1);
        }

        100% {
            transform: translate(-40px, 40px) scale(0.95);
        }
    }

    /* Navbar */
    .navbar-custom {
        background: rgba(3, 7, 18, 0.75);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border-bottom: 1px solid var(--border-subtle);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        padding: 16px 0;
        z-index: 1030;
    }

    .navbar-custom.scrolled {
        background: rgba(3, 7, 18, 0.95);
        border-bottom-color: rgba(234, 179, 8, 0.25);
        padding: 10px 0;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.7);
    }

    .navbar-brand-custom {
        display: flex;
        align-items: center;
        gap: 14px;
        text-decoration: none;
    }

    .navbar-brand-custom img {
        height: 48px;
        width: auto;
        object-fit: contain;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.5));
    }

    .nav-brand-text {
        display: flex;
        flex-direction: column;
        line-height: 1.15;
    }

    .nav-brand-text .title {
        font-family: 'Cinzel', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #ffffff;
    }

    .nav-brand-text .subtitle {
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--gold-bright);
    }

    .nav-link-custom {
        color: var(--text-body) !important;
        font-weight: 600;
        font-size: 0.92rem;
        padding: 8px 18px !important;
        border-radius: 9999px;
        transition: all 0.25s ease;
    }

    .nav-link-custom:hover {
        color: #ffffff !important;
        background: rgba(255, 255, 255, 0.05);
    }

    .nav-link-custom.active {
        color: var(--gold-bright) !important;
    }

    .btn-nav-primary {
        background: var(--gold-gradient);
        color: #030712 !important;
        font-size: 0.88rem;
        font-weight: 700;
        padding: 9px 24px !important;
        border-radius: 9999px;
        text-decoration: none;
        box-shadow: 0 4px 18px rgba(217, 119, 6, 0.35);
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-nav-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(217, 119, 6, 0.55);
        filter: brightness(1.08);
    }

    .btn-nav-logout {
        background: rgba(239, 68, 68, 0.12);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #f87171 !important;
        font-size: 0.88rem;
        font-weight: 600;
        padding: 8px 20px !important;
        border-radius: 9999px;
        transition: all 0.25s ease;
    }

    .btn-nav-logout:hover {
        background: #dc2626;
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    .user-identity-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid var(--border-subtle);
        padding: 6px 14px;
        border-radius: 9999px;
        color: var(--gold-bright);
        font-size: 0.82rem;
        font-weight: 600;
    }

    /* Hero Section */
    .hero-viewport {
        position: relative;
        z-index: 2;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 140px 20px 90px;
        background: radial-gradient(circle at center, rgba(7, 14, 32, 0.5) 0%, rgba(3, 7, 18, 0.95) 100%);
    }

    .hero-container {
        max-width: 1200px;
        width: 100%;
        margin: auto;
        text-align: center;
    }

    .brand-pill {
        display: inline-flex;
        align-items: center;
        gap: 18px;
        padding: 8px 28px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--border-subtle);
        border-radius: 9999px;
        backdrop-filter: blur(16px);
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.4);
        margin-bottom: 28px;
    }

    .brand-pill img {
        height: 44px;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.6));
    }

    .pill-divider {
        width: 1px;
        height: 28px;
        background: var(--border-subtle);
    }

    .jubilee-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(90deg, rgba(245, 158, 11, 0.15), rgba(245, 158, 11, 0.04));
        border: 1px solid rgba(245, 158, 11, 0.35);
        padding: 8px 22px;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.18em;
        color: var(--gold-light);
        margin-bottom: 24px;
    }

    .hero-headline {
        font-size: clamp(3.2rem, 7.5vw, 6.2rem);
        font-weight: 800;
        line-height: 1;
        background: linear-gradient(180deg, #ffffff 40%, #94a3b8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 16px;
    }

    .hero-subheadline {
        font-size: clamp(1.15rem, 2vw, 1.6rem);
        color: var(--gold-bright);
        font-weight: 600;
        margin-bottom: 54px;
        letter-spacing: 0.05em;
    }

    /* Phase Reunion Cards */
    .phase-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
        gap: 32px;
        margin-bottom: 50px;
        text-align: left;
    }

    .phase-card {
        background: var(--bg-card);
        border: 1px solid var(--border-subtle);
        border-radius: 28px;
        padding: 36px;
        backdrop-filter: blur(24px);
        position: relative;
        overflow: hidden;
        transition: all 0.45s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5);
    }

    .phase-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 90% 10%, rgba(245, 158, 11, 0.1), transparent 65%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .phase-card:hover {
        transform: translateY(-8px);
        border-color: var(--border-glow);
        box-shadow: 0 24px 50px rgba(0, 0, 0, 0.7), 0 0 30px rgba(245, 158, 11, 0.15);
    }

    .phase-card:hover::before {
        opacity: 1;
    }

    .phase-tag {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.18em;
        color: var(--gold-bright);
        text-transform: uppercase;
    }

    .phase-batches {
        font-size: 1.55rem;
        font-weight: 700;
        color: #ffffff;
        margin: 8px 0 16px;
    }

    .phase-date {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 8px 18px;
        border-radius: 14px;
        font-size: 0.95rem;
        color: #e2e8f0;
        margin-bottom: 26px;
    }

    .countdown-cluster {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    .countdown-cell {
        background: rgba(3, 7, 18, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 16px;
        padding: 12px 6px;
        text-align: center;
    }

    .countdown-cell .digit {
        display: block;
        font-size: 1.85rem;
        font-weight: 700;
        color: var(--gold-light);
        line-height: 1;
        margin-bottom: 4px;
    }

    .countdown-cell .unit {
        font-size: 0.65rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.12em;
        color: var(--text-body);
    }

    /* Action Buttons */
    .btn-gold {
        background: var(--gold-gradient);
        color: #030712 !important;
        padding: 18px 46px;
        font-weight: 700;
        font-size: 1.05rem;
        border-radius: 9999px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 10px 30px rgba(217, 119, 6, 0.35);
        transition: all 0.3s ease;
        border: none;
    }

    .btn-gold:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 16px 45px rgba(217, 119, 6, 0.55);
        filter: brightness(1.08);
    }

    .btn-glass {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid var(--border-subtle);
        color: #fff !important;
        padding: 18px 42px;
        font-weight: 600;
        font-size: 1.05rem;
        border-radius: 9999px;
        text-decoration: none;
        backdrop-filter: blur(14px);
        transition: all 0.3s ease;
    }

    .btn-glass:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateY(-3px);
        border-color: rgba(255, 255, 255, 0.25);
    }

    /* Sections */
    .content-section {
        position: relative;
        z-index: 2;
        padding: 120px 0;
    }

    .section-header-wrap {
        text-align: center;
        max-width: 780px;
        margin: 0 auto 70px;
    }

    .section-badge {
        color: var(--gold-bright);
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.2em;
        text-transform: uppercase;
    }

    .section-headline {
        font-size: clamp(2.4rem, 4.5vw, 3.6rem);
        font-weight: 700;
        margin: 12px 0 16px;
        color: #ffffff;
        line-height: 1.1;
    }

    /* Metrics Grid */
    .metric-card {
        background: var(--bg-card);
        border: 1px solid var(--border-subtle);
        border-radius: 28px;
        padding: 44px 28px;
        text-align: center;
        backdrop-filter: blur(18px);
        transition: all 0.4s ease;
    }

    .metric-card:hover {
        transform: translateY(-8px);
        border-color: var(--border-glow);
        background: rgba(14, 30, 62, 0.7);
    }

    .metric-icon {
        font-size: 2.2rem;
        color: var(--gold-bright);
        margin-bottom: 18px;
    }

    .metric-val {
        font-size: 3.6rem;
        font-weight: 700;
        color: #ffffff;
        line-height: 1;
        margin-bottom: 8px;
    }

    /* Itinerary Cards */
    .schedule-card {
        position: relative;
        height: 440px;
        border-radius: 28px;
        overflow: hidden;
        border: 1px solid var(--border-subtle);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.45);
    }

    .schedule-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .schedule-card:hover img {
        transform: scale(1.08);
    }

    .schedule-scrim {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 35%, rgba(3, 7, 18, 0.96) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 34px;
    }

    /* Gallery Bento */
    .bento-vault {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-rows: 270px;
        gap: 22px;
    }

    .vault-item {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        cursor: pointer;
        border: 1px solid var(--border-subtle);
    }

    .vault-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .vault-item:hover img {
        transform: scale(1.08);
    }

    .vault-span-2x2 {
        grid-column: span 2;
        grid-row: span 2;
    }

    .vault-span-tall {
        grid-row: span 2;
    }

    .vault-span-wide {
        grid-column: span 2;
    }

    .vault-meta {
        position: absolute;
        inset: 0;
        background: linear-gradient(0deg, rgba(3, 7, 18, 0.92) 0%, transparent 60%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 24px;
        transition: all 0.35s ease;
    }

    .vault-item:hover .vault-meta {
        background: linear-gradient(0deg, rgba(3, 7, 18, 0.96) 0%, rgba(37, 99, 235, 0.25) 100%);
    }

    /* Testimonials */
    .testimonial-deck {
        background: var(--bg-card);
        border: 1px solid var(--border-subtle);
        border-radius: 36px;
        padding: 64px 44px;
        max-width: 920px;
        margin: auto;
        backdrop-filter: blur(24px);
        text-align: center;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
    }

    .quote-lead {
        font-size: 1.55rem;
        line-height: 1.6;
        color: #f1f5f9;
        margin: 24px 0;
        font-weight: 600;
    }

    /* FAQ */
    .enterprise-accordion .accordion-item {
        background: var(--bg-card);
        border: 1px solid var(--border-subtle);
        border-radius: 20px !important;
        margin-bottom: 16px;
        overflow: hidden;
        backdrop-filter: blur(16px);
    }

    .enterprise-accordion .accordion-button {
        background: transparent;
        color: #fff;
        font-weight: 600;
        font-size: 1.15rem;
        padding: 24px 30px;
        box-shadow: none;
    }

    .enterprise-accordion .accordion-button:not(.collapsed) {
        background: rgba(255, 255, 255, 0.03);
        color: var(--gold-bright);
    }

    .enterprise-accordion .accordion-button::after {
        filter: invert(1);
    }

    .enterprise-accordion .accordion-body {
        background: transparent;
        color: var(--text-body);
        padding: 10px 30px 30px;
        font-size: 1.05rem;
        line-height: 1.8;
    }

    /* Lightbox Modal */
    .prime-lightbox {
        position: fixed;
        inset: 0;
        background: rgba(3, 7, 18, 0.98);
        backdrop-filter: blur(20px);
        z-index: 100000;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: all 0.3s ease;
        padding: 24px;
    }

    .prime-lightbox.active {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .lightbox-panel {
        max-width: 960px;
        width: 100%;
        text-align: center;
    }

    .lightbox-panel img {
        max-height: 78vh;
        border-radius: 18px;
        border: 1px solid var(--border-subtle);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.9);
    }

    .lightbox-exit {
        position: absolute;
        top: 30px;
        right: 35px;
        font-size: 2.2rem;
        color: #fff;
        background: transparent;
        border: none;
        cursor: pointer;
    }

    /* Footer */
    .prime-footer {
        background: #02040a;
        border-top: 1px solid var(--border-subtle);
        padding: 90px 0 35px;
        position: relative;
        z-index: 2;
    }

    .footer-social-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid var(--border-subtle);
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-social-btn:hover {
        background: var(--gold-bright);
        color: #030712;
        transform: translateY(-4px);
    }

    #backToTop {
        position: fixed;
        bottom: 35px;
        right: 35px;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--gold-gradient);
        color: #030712;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(217, 119, 6, 0.35);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
    }

    #backToTop.show {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 992px) {
        .bento-vault {
            grid-template-columns: repeat(2, 1fr);
        }

        .vault-span-2x2,
        .vault-span-tall,
        .vault-span-wide {
            grid-column: span 1;
            grid-row: span 1;
        }

        .navbar-collapse {
            margin-top: 16px;
            background: rgba(7, 14, 32, 0.98);
            border: 1px solid var(--border-subtle);
            padding: 22px;
            border-radius: 20px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.8);
        }
    }

    @media (max-width: 576px) {
        .bento-vault {
            grid-template-columns: 1fr;
        }

        .phase-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>

<body>
    <div class="noise-overlay"></div>
    <div class="ambient-grid"></div>
    <div class="ambient-canvas">
        <div class="ambient-blob blob-1"></div>
        <div class="ambient-blob blob-2"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom" id="mainHeaderNav">
        <div class="container">
            <a class="navbar-brand-custom" href="./">
                <img src="./img/latestlogo.webp" alt="Homecoming Logo">
                <div class="nav-brand-text">
                    <span class="title">Homecoming 2026</span>
                    <span class="subtitle">IIT Kharagpur</span>
                </div>
            </a>

            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars-staggered fa-lg"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <?php if($isLoggedIn): ?>
                    <li class="nav-item">
                        <div class="user-identity-badge">
                            <i class="fa-regular fa-circle-user"></i>
                            <span><?= htmlspecialchars($_SESSION['email']) ?></span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="profile_aam.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="attending_aam.php">Attendees</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn-nav-logout" href="logout.php">
                            <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="signup.php">Register</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn-nav-primary" href="login_aam.php">
                            <span>Login</span>
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Viewport -->
    <section class="hero-viewport">
        <div class="hero-container">

            <div data-aos="fade-down" data-aos-duration="1000">
                <div class="brand-pill">
                    <img src="./img/kgp_blue.png" alt="IIT Kharagpur">
                    <div class="pill-divider"></div>
                    <img src="./img/palJubLogo.png" alt="Platinum Jubilee">
                </div>
            </div>

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <span class="jubilee-badge">
                    <i class="fa-solid fa-crown text-warning"></i> Platinum Jubilee Celebration (1951–2026)
                </span>
                <h1 class="hero-headline serif-title">Homecoming 2026</h1>
                <p class="hero-subheadline">Indian Institute of Technology Kharagpur</p>
            </div>

            <!-- Dual Reunion Deck -->
            <div class="phase-grid" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">

                <!-- Phase 1 -->
                <div class="phase-card">
                    <span class="phase-tag">Phase 01 • Reunion</span>
                    <h3 class="phase-batches">Batches 2003 • 2008 • 2013</h3>
                    <div class="phase-date">
                        <i class="fa-regular fa-calendar-days text-warning"></i>
                        <span>9 – 11 October 2026</span>
                    </div>

                    <div class="countdown-cluster" id="phaseTimer1">
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p1Days">00</span>
                            <span class="unit">Days</span>
                        </div>
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p1Hours">00</span>
                            <span class="unit">Hours</span>
                        </div>
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p1Mins">00</span>
                            <span class="unit">Mins</span>
                        </div>
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p1Secs">00</span>
                            <span class="unit">Secs</span>
                        </div>
                    </div>
                </div>

                <!-- Phase 2 -->
                <div class="phase-card">
                    <span class="phase-tag">Phase 02 • Reunion</span>
                    <h3 class="phase-batches">Batches 2004 • 2009 • 2014</h3>
                    <div class="phase-date">
                        <i class="fa-regular fa-calendar-days text-warning"></i>
                        <span>30 Oct – 1 Nov 2026</span>
                    </div>

                    <div class="countdown-cluster" id="phaseTimer2">
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p2Days">00</span>
                            <span class="unit">Days</span>
                        </div>
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p2Hours">00</span>
                            <span class="unit">Hours</span>
                        </div>
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p2Mins">00</span>
                            <span class="unit">Mins</span>
                        </div>
                        <div class="countdown-cell">
                            <span class="digit mono-num" id="p2Secs">00</span>
                            <span class="unit">Secs</span>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-body mx-auto mb-5" style="max-width: 740px; font-size: 1.15rem; line-height: 1.8;"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                Return to the corridors of Hijli, reignite lifelong bonds, and mark 75 glorious years of excellence,
                innovation, and
                legacy at our flagship global reunion.
            </p>

            <div class="d-flex justify-content-center gap-4 flex-wrap" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="400">
                <a href="signup.php" class="btn-gold">
                    <span>Register for Meet</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="login_aam.php" class="btn-glass">
                    <span>Alumni Access</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Metrics -->
    <section class="content-section">
        <div class="container">
            <div class="section-header-wrap" data-aos="fade-up">
                <span class="section-badge">Global Footprint</span>
                <h2 class="section-headline serif-title">The Grand Gathering</h2>
                <p class="text-body">Uniting pioneering innovators, industry titans, and lifelong friends under one sky.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="metric-val mono-num counter" data-target="2500">0</div>
                        <h5 class="text-white">Alumni Expected</h5>
                        <p class="text-body small mb-0">From across the continents</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fa-solid fa-earth-americas"></i></div>
                        <div class="metric-val mono-num counter" data-target="32">0</div>
                        <h5 class="text-white">Countries</h5>
                        <p class="text-body small mb-0">Worldwide alumni delegations</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fa-solid fa-crown"></i></div>
                        <div class="metric-val mono-num counter" data-target="6">0</div>
                        <h5 class="text-white">Milestone Batches</h5>
                        <p class="text-body small mb-0">Decennial & jubilee reunions</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fa-solid fa-champagne-glasses"></i></div>
                        <div class="metric-val mono-num counter" data-target="18">0</div>
                        <h5 class="text-white">Curated Events</h5>
                        <p class="text-body small mb-0">Illumination, gala & sports</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule -->
    <section class="content-section" style="background: var(--bg-surface);">
        <div class="container">
            <div class="section-header-wrap" data-aos="fade-up">
                <span class="section-badge">Curated Itinerary</span>
                <h2 class="section-headline serif-title">Three Days of Heritage</h2>
                <p class="text-body">Experience an unmatchable itinerary honoring both memory and momentum.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="schedule-card">
                        <img src="img/itenary_11.jpg" alt="Day 1" loading="lazy">
                        <div class="schedule-scrim">
                            <span class="badge bg-warning text-dark align-self-start mb-2">Day 01</span>
                            <h4 class="text-white mb-1">Arrival & Alumni Reception</h4>
                            <p class="text-body small mb-0">Campus check-ins, department visits, and the opening gala
                                banquet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="schedule-card">
                        <img src="img/itenary_22.jpg" alt="Day 2" loading="lazy">
                        <div class="schedule-scrim">
                            <span class="badge bg-primary align-self-start mb-2">Day 02</span>
                            <h4 class="text-white mb-1">Hall Visits & Illumination</h4>
                            <p class="text-body small mb-0">Relive wing memories and witness the legendary Diwali
                                Illumination display.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="schedule-card">
                        <img src="img/itenary_33.jpg" alt="Day 3" loading="lazy">
                        <div class="schedule-scrim">
                            <span class="badge bg-danger align-self-start mb-2">Day 03</span>
                            <h4 class="text-white mb-1">Musical Gala & Finale</h4>
                            <p class="text-body small mb-0">Star-studded cultural evening, batch felicitations, and
                                farewell dinners.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bento Gallery -->
    <section class="content-section">
        <div class="container">
            <div class="section-header-wrap" data-aos="fade-up">
                <span class="section-badge">Memories Archive</span>
                <h2 class="section-headline serif-title">Moments Frozen in Time</h2>
                <p class="text-body">Glimpses of legacy, friendships, and celebrations across generations.</p>
            </div>

            <div class="bento-vault" data-aos="fade-up">
                <div class="vault-item vault-span-2x2" onclick="openLightbox('img/4.jpg', 'Campus Reunion')">
                    <img src="img/4.jpg" alt="Campus Reunion" loading="lazy">
                    <div class="vault-meta">
                        <span class="badge bg-primary mb-2 align-self-start">Reunion</span>
                        <h4 class="text-white mb-0 serif-title">Campus Reunion</h4>
                    </div>
                </div>
                <div class="vault-item vault-span-tall" onclick="openLightbox('img/a1.webp', 'Batch Portrait')">
                    <img src="img/a1.webp" alt="Batch Portrait" loading="lazy">
                    <div class="vault-meta">
                        <span class="badge bg-warning text-dark mb-2 align-self-start">Milestones</span>
                        <h5 class="text-white mb-0 serif-title">Batch Portrait</h5>
                    </div>
                </div>
                <div class="vault-item" onclick="openLightbox('img/hc6.webp', 'Cultural Evening')">
                    <img src="img/hc6.webp" alt="Cultural Evening" loading="lazy">
                    <div class="vault-meta">
                        <h6 class="text-white mb-0">Cultural Evening</h6>
                    </div>
                </div>
                <div class="vault-item" onclick="openLightbox('img/hall2.webp', 'Hall Visits')">
                    <img src="img/hall2.webp" alt="Hall Visits" loading="lazy">
                    <div class="vault-meta">
                        <h6 class="text-white mb-0">Hall Visits</h6>
                    </div>
                </div>
                <div class="vault-item vault-span-wide" onclick="openLightbox('img/musical.jpg', 'Musical Night')">
                    <img src="img/musical.jpg" alt="Musical Night" loading="lazy">
                    <div class="vault-meta">
                        <span class="badge bg-danger mb-2 align-self-start">Celebration</span>
                        <h5 class="text-white mb-0 serif-title">Musical Extravaganza</h5>
                    </div>
                </div>
                <div class="vault-item" onclick="openLightbox('img/illu3.webp', 'Illumination Tradition')">
                    <img src="img/illu3.webp" alt="Illumination Tradition" loading="lazy">
                    <div class="vault-meta">
                        <h6 class="text-white mb-0">Iconic Illumination</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="content-section" style="background: var(--bg-surface);">
        <div class="container">
            <div class="section-header-wrap" data-aos="fade-up">
                <span class="section-badge">Voices of KGP</span>
                <h2 class="section-headline serif-title">What Our Alumni Say</h2>
            </div>

            <div class="testimonial-deck" data-aos="zoom-in">
                <div class="text-warning mb-3" style="font-size: 1.3rem;">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="quote-lead serif-title">
                    "Stepping back onto the campus after decades was an overwhelming wave of nostalgia. Meeting my old
                    wingmates, professors, and watching the Illumination brought back the happiest years of my youth."
                </p>
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <div
                        style="width: 48px; height: 48px; border-radius: 50%; background: var(--gold-gradient); display: flex; align-items: center; justify-content: center; font-weight: 700; color: #000;">
                        KG
                    </div>
                    <div class="text-start">
                        <h6 class="text-white mb-0">Distinguished Alumnus</h6>
                        <span class="text-body small">Class of 1986</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="content-section">
        <div class="container" style="max-width: 920px;">
            <div class="section-header-wrap" data-aos="fade-up">
                <span class="section-badge">Clarifications</span>
                <h2 class="section-headline serif-title">Frequently Asked Questions</h2>
            </div>

            <div class="accordion enterprise-accordion" id="faqAccordion" data-aos="fade-up">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqQ1">
                            How do I complete registration for Homecoming 2026?
                        </button>
                    </h2>
                    <div id="faqQ1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Click on any <strong>Register</strong> button across the page to enter the registration
                            portal. Select your degree, passing batch, and preferred phase to complete registration.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqQ2">
                            What privileges does the registration pass include?
                        </button>
                    </h2>
                    <div id="faqQ2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            The pass grants full entry to all Jubilee ceremonies, departmental seminars, lunch & dinner
                            banquets, exclusive commemorative Platinum Jubilee memorabilia, and cultural event seating.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqQ3">
                            How is on-campus accommodation arranged?
                        </button>
                    </h2>
                    <div id="faqQ3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Given the milestone nature of the 75th year, guest houses and student residences are
                            allotted on a shared, first-come-first-served basis and billed separately from event
                            registration.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqQ4">
                            Can spouses and family members attend?
                        </button>
                    </h2>
                    <div id="faqQ4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes. Spouses and children can be included during your online sign-up flow, with dedicated
                            accompanying family kits and itinerary events provided.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="prime-lightbox" id="primeLightbox" onclick="closeLightbox()">
        <button class="lightbox-exit" onclick="closeLightbox()">&times;</button>
        <div class="lightbox-panel" onclick="event.stopPropagation()">
            <img id="lightboxImg" src="" alt="Preview">
            <h4 class="text-white mt-3 serif-title" id="lightboxTitle"></h4>
        </div>
    </div>

    <!-- Footer -->
    <footer class="prime-footer">
        <div class="container">
            <div class="row g-5 justify-content-between mb-5">
                <div class="col-lg-5">
                    <h4 class="serif-title text-white mb-3" style="font-size: 1.75rem;">IIT Kharagpur</h4>
                    <p class="text-body small mb-4" style="max-width: 420px; line-height: 1.8;">
                        Office of Alumni Affairs & International Relations<br>
                        Indian Institute of Technology Kharagpur<br>
                        Kharagpur, West Bengal, India - 721302
                    </p>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/IITKgp" target="_blank" class="footer-social-btn"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/in/office-of-alumni-affairs-iit-kharagpur-789978377/"
                            target="_blank" class="footer-social-btn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white mb-3 text-uppercase font-monospace small">Direct Navigation</h6>
                    <ul class="list-unstyled text-body small d-flex flex-column gap-2">
                        <li><a href="signup.php" class="text-decoration-none text-body">Alumni Registration</a></li>
                        <li><a href="login_aam.php" class="text-decoration-none text-body">Sign In Portal</a></li>
                        <li><a href="#" class="text-decoration-none text-body">Event Itinerary</a></li>
                        <li><a href="#" class="text-decoration-none text-body">Accommodation Guide</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white mb-3 text-uppercase font-monospace small">Helpdesk & Contact</h6>
                    <p class="text-body small mb-1"><i class="fa-solid fa-phone me-2 text-warning"></i> +91 3222-282236
                    </p>
                    <p class="text-body small"><i class="fa-solid fa-envelope me-2 text-warning"></i>
                        alumni@hijli.iitkgp.ac.in</p>
                </div>
            </div>
            <div class="text-center pt-4 border-top border-secondary border-opacity-25 text-body small">
                © 2026 Office of Alumni Affairs, Indian Institute of Technology Kharagpur. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button id="backToTop" onclick="window.scrollTo({top:0, behavior:'smooth'})" aria-label="Scroll back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 80
    });

    const phase1Target = new Date("October 9, 2026 09:00:00").getTime();
    const phase2Target = new Date("October 30, 2026 09:00:00").getTime();

    function syncCountdown(targetTime, dId, hId, mId, sId) {
        const now = new Date().getTime();
        const diff = targetTime - now;

        if (diff <= 0) {
            document.getElementById(dId).innerText = "00";
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const secs = Math.floor((diff % (1000 * 60)) / 1000);

        document.getElementById(dId).innerText = String(days).padStart(2, '0');
        document.getElementById(hId).innerText = String(hours).padStart(2, '0');
        document.getElementById(mId).innerText = String(mins).padStart(2, '0');
        document.getElementById(sId).innerText = String(secs).padStart(2, '0');
    }

    setInterval(() => {
        syncCountdown(phase1Target, 'p1Days', 'p1Hours', 'p1Mins', 'p1Secs');
        syncCountdown(phase2Target, 'p2Days', 'p2Hours', 'p2Mins', 'p2Secs');
    }, 1000);

    const counters = document.querySelectorAll('.counter');
    const countObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');
                let count = 0;
                const step = Math.ceil(target / 60);

                const run = () => {
                    count += step;
                    if (count < target) {
                        counter.innerText = count.toLocaleString();
                        requestAnimationFrame(run);
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                };
                run();
                countObserver.unobserve(counter);
            }
        });
    }, {
        threshold: 0.6
    });

    counters.forEach(c => countObserver.observe(c));

    function openLightbox(src, title) {
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightboxTitle').innerText = title;
        document.getElementById('primeLightbox').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('primeLightbox').classList.remove('active');
        document.body.style.overflow = '';
    }

    window.addEventListener('scroll', () => {
        const btn = document.getElementById('backToTop');
        if (window.scrollY > 400) {
            btn.classList.add('show');
        } else {
            btn.classList.remove('show');
        }

        const nav = document.getElementById("mainHeaderNav");
        if (nav) {
            nav.classList.toggle("scrolled", window.scrollY > 30);
        }
    });
    </script>
</body>

</html>