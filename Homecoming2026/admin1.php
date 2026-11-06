<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php'; // your DB connection

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

if ($filter == 'PENDING' || $filter == 'PAID(Verified)' || $filter == 'SUCCESS' || $filter == 'FAILED' ) {
    $stmt = $connection->prepare("SELECT id, name, email, mobile, yog, payment FROM aam WHERE payment = ?");
    $stmt->bind_param("s", $filter);
} else {
    $stmt = $connection->prepare("SELECT id, name, email, mobile, yog, payment FROM aam");
}

$stmt->execute();
$result = $stmt->get_result();
$count = $result->num_rows;


?>

<!DOCTYPE html>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Homecoming 2026</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
    body {
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        color: #012A4A;
        position: relative;
        overflow-x: hidden;
    }

    /* Blurred background layer */
    body::before {
        content: "";
        position: fixed;
        /* sticks to viewport */
        inset: 0;
        /* top:0; right:0; bottom:0; left:0; */
        background: url(./aa2a.webp) no-repeat center center fixed;
        background-size: cover;
        filter: blur(20px);
        /* real blur here */
        transform: scale(1.05);
        /* avoid edges when blurred */
        z-index: -1;
        /* sits behind all content */
        pointer-events: none;
        /* don't block clicks */
    }

    h2 {
        text-align: center;
        font-size: 2.5rem;
        font-weight: bold;
        color: black;
        text-shadow: 1px 1px 5px rgba(255, 255, 255, 0.5);
        margin-bottom: 30px;
    }

    h3 {
        text-align: center;
        font-size: 1.7rem;
        font-weight: bold;
        color: black;
    }

    .btn {
        background-color: #1976D2;
        color: white;
        border-radius: 25px;
        font-weight: bold;
        transition: background 0.3s;
    }

    .btn:hover {
        background-color: blue;
        color: white;
    }

    .logout-btn {
        display: flex;
        justify-content: center;
        margin-bottom: 25px;
        gap: 20px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        gap: 20px;
        padding: 0px;
    }

    .alumni-card {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 15px 10px;
        text-align: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .alumni-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .alumni-card h5 {
        color: #1976D2;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .alumni-card p {
        margin-bottom: 6px;
        color: #333;
        font-size: 0.95rem;
    }

    .badge {
        font-size: 0.85rem;
        padding: 5px 8px;
        border-radius: 20px;
    }

    .btn-color {
        background-color: #1976D2;
        color: white;
        border-radius: 25px;
        font-weight: bold;
        margin-top: 10px;
        transition: background 0.3s;
    }

    .btn-color:hover {
        background-color: #1565C0;
    }

    @media (max-width: 576px) {
        .alumni-card {
            padding: 20px 15px;
        }

        .logout-btn {
            display: flex;
            flex-direction: column;
            width: 70%;
            margin: auto;
            gap: 10px;
        }
    }




    /* ADD Modify CSS */
    /* ================= HERO ================= */

    .hero-dashboard {

        position: relative;

        overflow: hidden;

        background: linear-gradient(135deg, #6d0019, #8b001f, #c79a19);

        border-radius: 30px;

        padding: 45px;

        margin: 30px 0;

        color: #fff;

        box-shadow: 0 20px 60px rgba(0, 0, 0, .25);

    }

    .hero-overlay {

        position: absolute;

        inset: 0;

        background:

            radial-gradient(circle at top right,
                rgba(255, 255, 255, .15), transparent 35%),

            radial-gradient(circle at bottom left,
                rgba(255, 255, 255, .08), transparent 40%);

    }

    .hero-content {

        position: relative;

        display: flex;

        justify-content: space-between;

        align-items: center;

        flex-wrap: wrap;

        gap: 25px;

        z-index: 2;

    }

    .hero-left {

        display: flex;

        align-items: center;

        gap: 25px;

    }

    .hero-logo {

        width: 90px;

        height: 90px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .15);

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 40px;

        backdrop-filter: blur(15px);

    }

    .hero-badge {

        display: inline-block;

        padding: 8px 18px;

        background: rgba(255, 255, 255, .15);

        border-radius: 30px;

        font-size: 14px;

        margin-bottom: 15px;

    }

    .hero-dashboard h1 {

        font-size: 40px;

        font-weight: 800;

        margin-bottom: 10px;

    }

    .hero-dashboard p {

        font-size: 17px;

        opacity: .95;

        margin: 0;

    }

    .clock-box {

        background: rgba(255, 255, 255, .15);

        padding: 18px 28px;

        border-radius: 20px;

        backdrop-filter: blur(15px);

        text-align: center;

        font-weight: 600;

        min-width: 250px;

    }

    .clock-box i {

        font-size: 22px;

        margin-bottom: 10px;

        display: block;

    }

    /* ================= STATS ================= */

    .stats-grid {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));

        gap: 20px;

        margin: 35px 0;

    }

    .stat-card {

        background: rgba(255, 255, 255, .75);

        backdrop-filter: blur(20px);

        border-radius: 20px;

        padding: 25px;

        display: flex;

        align-items: center;

        gap: 18px;

        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);

        transition: .3s;

    }

    .stat-card:hover {

        transform: translateY(-8px);

    }

    .stat-icon {

        width: 70px;

        height: 70px;

        border-radius: 18px;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 28px;

        color: #fff;

    }

    .counter {

        font-size: 34px;

        font-weight: 800;

        color: #7A0019;

    }

    /* ================= ACTIONS ================= */

    .action-toolbar {

        display: flex;

        flex-wrap: wrap;

        gap: 18px;

        margin-bottom: 40px;

    }

    .action-btn {

        flex: 1;

        min-width: 180px;

        padding: 18px;

        border-radius: 18px;

        background: #fff;

        text-decoration: none;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 12px;

        font-weight: 700;

        color: #7A0019;

        box-shadow: 0 8px 25px rgba(0, 0, 0, .12);

        transition: .3s;

    }

    .action-btn:hover {

        transform: translateY(-6px);

        background: #7A0019;

        color: #fff;

    }

    .action-btn.logout {

        background: #dc3545;

        color: #fff;

    }

    .action-btn.logout:hover {

        background: #bb2d3b;

    }

    /*==========================
   FILTER PANEL
===========================*/

    .filter-panel {

        background: rgba(255, 255, 255, .72);

        backdrop-filter: blur(20px);

        border-radius: 25px;

        padding: 30px;

        margin-bottom: 35px;

        box-shadow: 0 15px 45px rgba(0, 0, 0, .12);

        border: 1px solid rgba(255, 255, 255, .45);

    }

    .result-box {

        height: 58px;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 20px;

        font-weight: 700;

        border-radius: 15px;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        color: #fff;

    }

    .result-box span {

        font-size: 28px;

        margin-right: 8px;

    }

    .quick-filter {

        display: flex;

        flex-wrap: wrap;

        gap: 12px;

        margin-top: 25px;

    }

    .chip {

        padding: 10px 22px;

        border-radius: 50px;

        text-decoration: none;

        font-weight: 600;

        background: #fff;

        color: #7A0019;

        box-shadow: 0 8px 18px rgba(0, 0, 0, .08);

        transition: .3s;

    }

    .chip:hover {

        background: #7A0019;

        color: #fff;

    }

    .chip.active {

        background: #7A0019;

        color: #fff;

    }

    .reset-btn {

        margin-left: auto;

        padding: 10px 25px;

        border-radius: 50px;

        text-decoration: none;

        background: #dc3545;

        color: #fff;

        font-weight: 600;

        transition: .3s;

    }

    .reset-btn:hover {

        background: #bb2d3b;

        color: #fff;

    }

    @media(max-width:768px) {

        .quick-filter {

            justify-content: center;

        }

        .reset-btn {

            margin-left: 0;

            width: 100%;

            text-align: center;

        }

    }

    .dashboard-grid {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));

        gap: 30px;

    }

    .alumni-card {

        position: relative;

        background: rgba(255, 255, 255, .78);

        backdrop-filter: blur(18px);

        border-radius: 25px;

        padding: 28px;

        overflow: hidden;

        transition: .35s;

        box-shadow: 0 18px 45px rgba(0, 0, 0, .12);

    }

    .alumni-card:hover {

        transform: translateY(-10px);

        box-shadow: 0 30px 70px rgba(0, 0, 0, .22);

    }

    .card-ribbon {

        position: absolute;

        top: 18px;

        right: -35px;

        width: 150px;

        text-align: center;

        padding: 6px;

        font-size: 11px;

        font-weight: 700;

        color: #fff;

        transform: rotate(45deg);

    }

    .card-ribbon.paid {

        background: #198754;

    }

    .card-ribbon.pending {

        background: #dc3545;

    }

    .card-header-custom {

        display: flex;

        align-items: center;

        gap: 18px;

        margin-bottom: 18px;

    }

    .avatar {

        width: 75px;

        height: 75px;

        border-radius: 50%;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 28px;

        font-weight: bold;

        color: #fff;

        box-shadow: 0 10px 25px rgba(0, 0, 0, .18);

    }

    .user-info h4 {

        margin: 0;

        font-size: 22px;

        font-weight: 700;

        color: #7A0019;

    }

    .user-info small {

        color: #777;

    }

    .card-divider {

        height: 1px;

        background: #ececec;

        margin: 18px 0;

    }

    .info-item {

        display: flex;

        align-items: center;

        gap: 15px;

        margin-bottom: 16px;

        font-size: 15px;

    }

    .info-item i {

        width: 38px;

        height: 38px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #F4F5F7;

        border-radius: 12px;

        color: #7A0019;

    }

    .payment-box {

        margin-top: 20px;

    }

    .status {

        display: inline-flex;

        align-items: center;

        gap: 8px;

        padding: 10px 18px;

        border-radius: 40px;

        font-weight: 600;

    }

    .status.success {

        background: #D1FAE5;

        color: #047857;

    }

    .status.pending {

        background: #FEE2E2;

        color: #B91C1C;

    }

    .card-buttons {

        margin-top: 28px;

    }

    .profile-btn {

        display: block;

        width: 100%;

        text-align: center;

        padding: 14px;

        border-radius: 15px;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        color: #fff;

        font-weight: 700;

        text-decoration: none;

        transition: .3s;

    }

    .profile-btn:hover {

        transform: translateY(-3px);

        color: #fff;

        box-shadow: 0 12px 25px rgba(122, 0, 25, .30);

    }

    /*==============================
LOADER
==============================*/

    #loader {

        position: fixed;

        inset: 0;

        background: #081420;

        display: flex;

        justify-content: center;

        align-items: center;

        z-index: 999999;

        transition: .6s;

    }

    .loader-box {

        text-align: center;

        color: #fff;

    }

    .loader-box h3 {
        color: #fff;
    }

    .loader-logo {

        width: 100px;

        height: 100px;

        margin: auto;

        border-radius: 50%;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 42px;

        margin-bottom: 20px;

        animation: pulse 1.4s infinite;

    }

    .loader-bar {

        width: 260px;

        height: 8px;

        background: #ffffff22;

        border-radius: 20px;

        overflow: hidden;

        margin-top: 25px;

    }

    .loader-bar span {

        display: block;

        height: 100%;

        width: 0;

        background: linear-gradient(90deg, #C9A227, #fff, #C9A227);

        animation: loading 2s linear forwards;

    }

    @keyframes loading {

        100% {
            width: 100%;
        }

    }

    @keyframes pulse {

        50% {

            transform: scale(1.1);

        }

    }

    #progressBar {

        position: fixed;

        top: 0;

        left: 0;

        height: 5px;

        width: 0;

        background: linear-gradient(90deg, #7A0019, #C9A227);

        z-index: 99999;

    }

    .particles {

        position: fixed;

        inset: 0;

        pointer-events: none;

        z-index: -1;

        overflow: hidden;

    }

    .particles span {

        position: absolute;

        width: 12px;

        height: 12px;

        background: rgba(201, 162, 39, .22);

        border-radius: 50%;

        animation: floatParticle 16s linear infinite;

    }

    .particles span:nth-child(1) {
        left: 8%;
        animation-delay: 0s;
    }

    .particles span:nth-child(2) {
        left: 18%;
        animation-delay: 3s;
    }

    .particles span:nth-child(3) {
        left: 30%;
        animation-delay: 6s;
    }

    .particles span:nth-child(4) {
        left: 45%;
        animation-delay: 2s;
    }

    .particles span:nth-child(5) {
        left: 60%;
        animation-delay: 8s;
    }

    .particles span:nth-child(6) {
        left: 75%;
        animation-delay: 5s;
    }

    .particles span:nth-child(7) {
        left: 90%;
        animation-delay: 1s;
    }

    .particles span:nth-child(8) {
        left: 96%;
        animation-delay: 10s;
    }

    @keyframes floatParticle {

        0% {

            transform: translateY(100vh);

            opacity: 0;

        }

        30% {

            opacity: 1;

        }

        100% {

            transform: translateY(-150px);

            opacity: 0;

        }

    }

    #topBtn {

        position: fixed;

        right: 30px;

        bottom: 30px;

        width: 58px;

        height: 58px;

        border: none;

        border-radius: 50%;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        color: #fff;

        font-size: 22px;

        display: none;

        cursor: pointer;

        box-shadow: 0 15px 35px rgba(0, 0, 0, .3);

        transition: .3s;

        z-index: 999;

    }

    #topBtn:hover {

        transform: translateY(-8px);

    }

    .alumni-card {

        opacity: 0;

        transform: translateY(45px);

        transition: 1s;

    }

    .alumni-card.show {

        opacity: 1;

        transform: translateY(0);

    }

    .admin-footer {

        margin-top: 70px;

        padding: 30px;

        /* v */

        background: linear-gradient(135deg, #7A0019, #C9A227);

        color: white;

        display: flex;

        justify-content: space-between;

        flex-wrap: wrap;

        font-weight: 600;

    }

    .form-control,
    .form-select {
        border-radius: 14px;
        border: 1px solid #dfe7f3;
        height: 60px;
        background: #fbfdff;
        transition: .3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, .10);
        background: #fff;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <!-- ================= LOADER ================= -->

    <div id="loader">

        <div class="loader-box">

            <div class="loader-logo">

                <i class="fa-solid fa-graduation-cap"></i>

            </div>

            <h3>IIT Kharagpur</h3>

            <p>Loading Admin Dashboard...</p>

            <div class="loader-bar">

                <span></span>

            </div>

        </div>

    </div>
    <div id="progressBar"></div>
    <div class="particles">

        <span></span>

        <span></span>

        <span></span>

        <span></span>

        <span></span>

        <span></span>

        <span></span>

        <span></span>

    </div>
    <div class="container">
        <!-- ================= HERO ================= -->

        <div class="hero-dashboard">

            <div class="hero-overlay"></div>

            <div class="hero-content">

                <div class="hero-left">

                    <div class="hero-logo">

                        <i class="fa-solid fa-user-shield"></i>

                    </div>

                    <div>

                        <span class="hero-badge">

                            <i class="fa-solid fa-graduation-cap"></i>

                            Homecoming 2026

                        </span>

                        <h1>Administrator Dashboard</h1>

                        <p>

                            Welcome back, Administrator.
                            Manage registrations, payments and alumni records from one place.

                        </p>

                    </div>

                </div>

                <div class="hero-right">

                    <div class="clock-box">

                        <i class="fa-solid fa-clock"></i>

                        <div id="clock"></div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ================= STATISTICS ================= -->

        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-icon bg-primary">

                    <i class="fa-solid fa-users"></i>

                </div>

                <div>

                    <div class="counter" data-count="<?= $count ?>">0</div>

                    <span>Total Registrations</span>

                </div>

            </div>

            <?php

$paid = $connection->query("SELECT COUNT(*) total FROM aam WHERE payment='PAID(Verified)'")->fetch_assoc()['total'];

$pending = $connection->query("SELECT COUNT(*) total FROM aam WHERE payment='PENDING'")->fetch_assoc()['total'];

?>

            <div class="stat-card">

                <div class="stat-icon bg-success">

                    <i class="fa-solid fa-circle-check"></i>

                </div>

                <div>

                    <div class="counter" data-count="<?= $paid ?>">0</div>

                    <span>Verified Payments</span>

                </div>

            </div>

            <div class="stat-card">

                <div class="stat-icon bg-warning">

                    <i class="fa-solid fa-hourglass-half"></i>

                </div>

                <div>

                    <div class="counter" data-count="<?= $pending ?>">0</div>

                    <span>Pending Payments</span>

                </div>

            </div>

            <div class="stat-card">

                <div class="stat-icon bg-danger">

                    <i class="fa-solid fa-calendar-days"></i>

                </div>

                <div>

                    <div class="counter" data-count="2026">0</div>

                    <span>Homecoming</span>

                </div>

            </div>

        </div>


        <!-- ================= ACTION BUTTONS ================= -->

        <div class="action-toolbar">

            <a href="./" class="action-btn">

                <i class="fa-solid fa-house"></i>

                <span>Home</span>

            </a>

            <a href="export_csv.php" class="action-btn">

                <i class="fa-solid fa-file-csv"></i>

                <span>Export Alumni</span>

            </a>

            <a href="export_transactions.php" class="action-btn">

                <i class="fa-solid fa-credit-card"></i>

                <span>Transactions</span>

            </a>

            <a href="logout_admin.php" class="action-btn logout">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Logout</span>

            </a>

        </div>
        <!-- ================= FILTER PANEL ================= -->

        <div class="filter-panel">

            <form method="GET" id="filterForm">

                <div class="row g-3 align-items-end">

                    <div class="col-lg-4">

                        <label class="premium-label">

                            <i class="fa-solid fa-credit-card"></i>

                            Payment Status

                        </label>

                        <select name="filter" class="form-select premium-input" onchange="this.form.submit()">

                            <option value="">All Payments</option>

                            <option value="PAID(Verified)" <?= ($filter=="PAID(Verified)")?'selected':''; ?>>

                                Verified Payments

                            </option>

                            <option value="PENDING" <?= ($filter=="PENDING")?'selected':''; ?>>

                                Pending Payments

                            </option>
                            <option value="SUCCESS" <?= ($filter=="SUCCESS")?'selected':''; ?>>

                                Success Payments

                            </option>
                            <option value="FAILED" <?= ($filter=="FAILED")?'selected':''; ?>>

                                Failed Payments

                            </option>

                        </select>

                    </div>

                    <div class="col-lg-5">

                        <label class="premium-label">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            Search Alumni

                        </label>

                        <input type="text" id="liveSearch" class="form-control premium-input"
                            placeholder="Search by Name, Email or Mobile...">

                    </div>

                    <div class="col-lg-3">

                        <label class="premium-label">

                            <i class="fa-solid fa-users"></i>

                            Showing Results

                        </label>

                        <div class="result-box">

                            <span id="resultCounter">

                                <?= $count ?>

                            </span>

                            Alumni

                        </div>

                    </div>

                </div>

                <div class="quick-filter">

                    <a href="<?= basename($_SERVER['PHP_SELF']) ?>" class="chip <?= empty($filter)?'active':'' ?>">

                        All

                    </a>

                    <a href="?filter=PAID(Verified)" class="chip <?= $filter=="PAID(Verified)"?'active':'' ?>">

                        Verified

                    </a>

                    <a href="?filter=PENDING" class="chip <?= $filter=="PENDING"?'active':'' ?>">

                        Pending

                    </a>

                    <a href="<?= basename($_SERVER['PHP_SELF']) ?>" class="reset-btn">

                        <i class="fa-solid fa-rotate-left"></i>

                        Reset

                    </a>

                </div>

            </form>

        </div>

        <div class="dashboard-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
            <?php
$initials = "";
$parts = explode(" ", trim($row['name']));
foreach($parts as $p){
    if($p!=""){
        $initials .= strtoupper(substr($p,0,1));
        if(strlen($initials)>=2) break;
    }
}
?>

            <div class="alumni-card">

                <div class="card-ribbon <?= ($row['payment']=="PAID(Verified)") ? 'paid' : 'pending' ?>">
                    <?= ($row['payment']=="PAID(Verified)") ? 'VERIFIED' : 'PENDING' ?>
                </div>

                <div class="card-header-custom">

                    <div class="avatar">

                        <?= $initials ?>

                    </div>

                    <div class="user-info">

                        <h4><?= htmlspecialchars($row['name']) ?></h4>

                        <small>Registered Alumni</small>

                    </div>

                </div>

                <div class="card-divider"></div>

                <div class="info-item">

                    <i class="fa-solid fa-envelope"></i>

                    <span><?= htmlspecialchars($row['email']) ?></span>

                </div>

                <div class="info-item">

                    <i class="fa-solid fa-phone"></i>

                    <span><?= htmlspecialchars($row['mobile']) ?></span>

                </div>

                <div class="info-item">

                    <i class="fa-solid fa-graduation-cap"></i>

                    <span>Batch <?= htmlspecialchars($row['yog']) ?></span>

                </div>

                <div class="payment-box">

                    <?php if($row['payment']=="PAID(Verified)"){ ?>

                    <span class="status success">

                        <i class="fa-solid fa-circle-check"></i>

                        Payment Verified

                    </span>

                    <?php } elseif($row['payment']=="SUCCESS") { ?>

                    <span class="status pending">

                        <i class="fa-solid fa-clock"></i>

                        Payment Success

                    </span>
                    <?php } elseif($row['payment']=="FAILED") { ?>

                    <span class="status pending">

                        <i class="fa-solid fa-clock"></i>

                        Payment Failed

                    </span>

                    <?php }  else { ?>

                    <span class="status pending">

                        <i class="fa-solid fa-clock"></i>

                        Payment Pending

                    </span>
                    <?php } ?>

                </div>

                <div class="card-buttons">

                    <a href="view_user.php?id=<?= $row['id'] ?>" class="profile-btn">

                        <i class="fa-solid fa-eye"></i>

                        View Profile

                    </a>

                </div>

            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <footer class="admin-footer">

        <div>

            © 2026 IIT Kharagpur

            Office of Alumni Affairs

        </div>

        <div>

            Administrator Dashboard


        </div>

    </footer>

    <button id="topBtn">

        <i class="fa-solid fa-arrow-up"></i>

    </button>

    <?php $connection->close(); ?>
    <script>
    function updateClock() {

        const now = new Date();

        const date = now.toLocaleDateString('en-IN', {

            weekday: 'long',

            day: '2-digit',

            month: 'long',

            year: 'numeric'

        });

        const time = now.toLocaleTimeString('en-IN', {

            hour: '2-digit',

            minute: '2-digit',

            second: '2-digit',

            hour12: true

        });

        document.getElementById("clock").innerHTML = date + "<br>" + time;

    }

    updateClock();

    setInterval(updateClock, 1000);



    const search = document.getElementById("liveSearch");

    const cards = document.querySelectorAll(".alumni-card");

    const counter = document.getElementById("resultCounter");

    search.addEventListener("keyup", function() {

        let value = this.value.toLowerCase();

        let total = 0;

        cards.forEach(card => {

            if (card.innerText.toLowerCase().includes(value)) {

                card.style.display = "block";

                total++;

            } else {

                card.style.display = "none";

            }

        });

        counter.innerHTML = total;

    });



    window.onload = function() {

        setTimeout(() => {

            loader.style.opacity = "0";

            loader.style.visibility = "hidden";

        }, 1200);

    };

    // Progress Bar

    window.addEventListener("scroll", () => {

        let h = document.documentElement;

        let sc = (h.scrollTop / (h.scrollHeight - h.clientHeight)) * 100;

        document.getElementById("progressBar").style.width = sc + "%";

        topBtn.style.display = window.scrollY > 350 ? "block" : "none";

    });

    topBtn.onclick = () => {

        window.scrollTo({

            top: 0,

            behavior: 'smooth'

        });

    };

    // Counter

    document.querySelectorAll(".counter").forEach(counter => {

        let target = parseInt(counter.dataset.count);

        let c = 0;

        let speed = Math.ceil(target / 70);

        let timer = setInterval(() => {

            c += speed;

            if (c >= target) {

                c = target;

                clearInterval(timer);

            }

            counter.innerHTML = c;

        }, 20);

    });

    // Card Animation

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add("show");

            }

        });

    });

    document.querySelectorAll(".alumni-card").forEach(card => {

        observer.observe(card);

    });
    </script>

</body>

</html>