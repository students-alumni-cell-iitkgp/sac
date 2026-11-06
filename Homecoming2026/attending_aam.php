<?php
session_start();
// include 'header_aam1.php';
include 'config.php'; // DB connection

if (!isset($_SESSION['email'])) {
    header("Location: login_aam.php");
    exit;
}

// Fetch distinct filter options from DB
$yearsQuery = $connection->query("SELECT DISTINCT yog FROM aam ORDER BY yog DESC");

$deptsQuery = $connection->query("SELECT DISTINCT dept FROM aam ORDER BY dept ASC");
$hallsQuery = $connection->query("SELECT DISTINCT hall FROM aam ORDER BY hall ASC");

$years = [];
$depts = [];
$halls = [];

while ($r = $yearsQuery->fetch_assoc()) $years[] = $r['yog'];
while ($r = $deptsQuery->fetch_assoc()) if (!empty($r['dept'])) $depts[] = $r['dept'];
while ($r = $hallsQuery->fetch_assoc()) if (!empty($r['hall'])) $halls[] = $r['hall'];

// Get filters from GET parameters
$selectedYear = $_GET['yog'] ?? '';
$selectedDept = $_GET['dept'] ?? '';
$selectedHall = $_GET['hall'] ?? '';

// Build dynamic SQL with filters
$query = "SELECT name, hall, dept, yog FROM aam WHERE 1=1";
$params = [];
$types = '';

if (!empty($selectedYear)) {
    $query .= " AND yog = ?";
    $params[] = $selectedYear;
    $types .= 's';
}

if (!empty($selectedDept)) {
    $query .= " AND dept = ?";
    $params[] = $selectedDept;
    $types .= 's';
}

if (!empty($selectedHall)) {
    $query .= " AND hall = ?";
    $params[] = $selectedHall;
    $types .= 's';
}

$query .= " ORDER BY yog DESC, name ASC";

$stmt = $connection->prepare($query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registered Alumni | Alumni Meet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
        filter: blur(24px);
        /* real blur here */
        transform: scale(1.05);
        /* avoid edges when blurred */
        z-index: -1;
        /* sits behind all content */
        pointer-events: none;
        /* don't block clicks */
    }


    .container {
        padding: 0px;
        max-width: 1280px;
        margin: auto;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #012A4A;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
    }

    /* Filter section */
    .filter-form {
        text-align: center;
        margin-bottom: 25px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .filter-form select {
        padding: 8px 14px;
        border-radius: 8px;
        border: 1px solid #90CAF9;
        background-color: rgba(227, 242, 253, 0.8);
        color: #012A4A;
        font-weight: 500;
        font-size: 1rem;
        outline: none;
        transition: 0.3s;
    }

    .filter-form select:hover {
        background-color: #BBDEFB;
        cursor: pointer;
    }

    .filter-form button {
        background-color: #1565C0;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 18px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }

    .filter-form button:hover {
        background-color: #0D47A1;
    }

    /* Cards */
    .alumni-grid-1 {
        display: grid;
        gap: 20px;
        padding: 0 15px;
    }

    .alumni-card {

        background: rgba(255, 255, 255, 0.4);
        border: none;
        font-weight: 500;
        color: #012A4A;
        border-radius: 20px;
        backdrop-filter: blur(20px);
        padding: 10px 10px;
        text-align: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
        max-width: 1280px;
    }

    .alumni-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .alumni-name {
        font-size: 1.2rem;
        font-weight: bold;
        color: #1565C0;
        margin-bottom: 10px;
    }

    .alumni-info {
        font-size: 0.95rem;
        color: #333;
        margin-bottom: 5px;
    }

    @media (min-width: 766px) {
        .alumni-grid-1 {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }
    }

    @media (max-width: 766px) {
        h2 {
            font-size: 1.5rem;
        }

        .alumni-grid-1 {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .alumni-card {
            padding: 20px 15px;
        }
    }


    /* ADD THIS  */
    /*==============================
      HERO SECTION
===============================*/

    .hero-section {

        position: relative;

        overflow: hidden;

        border-radius: 30px;

        padding: 10px 5px;
        margin-top: 40px;

        margin-bottom: 20px;

        background: linear-gradient(135deg, #6d0019, #8b001f, #b8860b);

        color: #fff;

        box-shadow: 0 25px 60px rgba(0, 0, 0, .25);

    }

    .hero-overlay {

        position: absolute;

        inset: 0;

        background:

            radial-gradient(circle at top right,

                rgba(255, 255, 255, .18),

                transparent 40%),

            radial-gradient(circle at bottom left,

                rgba(255, 255, 255, .10),

                transparent 35%);

    }

    .hero-content {

        position: relative;

        z-index: 2;

        text-align: center;

        max-width: 1000px;

        margin: auto;

    }

    .hero-badge {

        display: inline-flex;

        align-items: center;

        gap: 10px;

        background: rgba(255, 255, 255, .15);

        padding: 12px 24px;

        border-radius: 50px;

        backdrop-filter: blur(12px);

        margin-bottom: 25px;

        font-weight: 600;

    }

    .hero-badge i {

        color: #FFD54F;

    }

    .hero-content h1 {

        font-size: 52px;

        font-weight: 800;

        margin-bottom: 18px;

    }

    .hero-content h3 {

        font-size: 32px;

        font-weight: 800;

        margin-bottom: 18px;

    }

    .hero-content h1 span {

        display: block;

        color: #FFD54F;

    }

    .hero-content p {

        font-size: 18px;

        line-height: 1.9;

        opacity: .95;

    }


    /*==============================
      STATISTICS
===============================*/

    .stats-row {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));

        gap: 25px;

        margin-bottom: 45px;

    }

    .stat-card {

        background: rgba(255, 255, 255, .65);

        backdrop-filter: blur(20px);

        border-radius: 22px;

        padding: 30px;

        text-align: center;

        box-shadow: 0 15px 40px rgba(0, 0, 0, .12);

        transition: .35s;

    }

    .stat-card:hover {

        transform: translateY(-8px);

    }

    .stat-icon {

        width: 70px;

        height: 70px;

        margin: auto;

        margin-bottom: 20px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 20px;

        background: linear-gradient(135deg, #7A0019, #B8860B);

        color: #fff;

        font-size: 28px;

    }

    .stat-number {

        font-size: 36px;

        font-weight: 800;

        color: #7A0019;

    }

    .stat-text {

        margin-top: 8px;

        color: #555;

        font-weight: 600;

    }

    /*==============================
        FILTER PANEL
==============================*/

    .filter-panel {

        background: rgba(255, 255, 255, .72);

        backdrop-filter: blur(22px);

        border-radius: 28px;

        padding: 35px;

        margin-bottom: 40px;

        box-shadow: 0 20px 50px rgba(0, 0, 0, .10);

        border: 1px solid rgba(255, 255, 255, .45);
        min-width: 1280px;

    }

    .filter-label {

        font-weight: 700;

        color: #7A0019;

        margin-bottom: 10px;

        display: block;

        font-size: 14px;

    }

    .filter-label i {

        margin-right: 8px;

        color: #B8860B;

    }

    .premium-select,
    .premium-input {

        height: 55px;

        border-radius: 14px;

        border: 2px solid #E5E7EB;

        font-weight: 500;

        transition: .3s;

    }

    .premium-select:focus {

        border-color: #7A0019;

        box-shadow: 0 0 0 5px rgba(122, 0, 25, .10);

    }

    .filter-footer {

        margin-top: 30px;

        display: flex;

        justify-content: space-between;

        align-items: center;

        flex-wrap: wrap;

        gap: 15px;

    }

    .result-count {

        background: #7A0019;

        color: #fff;

        padding: 12px 22px;

        border-radius: 40px;

        font-weight: 600;

    }

    .result-count strong {

        font-size: 20px;

        margin: 0 4px;

    }

    @media(max-width:768px) {

        .filter-footer {

            flex-direction: column;

            align-items: flex-start;

        }

    }

    .alumni-grid-1 {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));

        gap: 30px;

    }



    .alumni-card {

        background: rgba(255, 255, 255, .75);

        backdrop-filter: blur(18px);

        border-radius: 28px;

        padding: 28px;

        transition: .4s;

        position: relative;

        overflow: hidden;

        box-shadow: 0 18px 45px rgba(0, 0, 0, .12);

    }



    .alumni-card::before {

        content: "";

        position: absolute;

        top: 0;

        left: 0;

        width: 100%;

        height: 6px;

        background: linear-gradient(90deg, #7A0019, #C9A227, #7A0019);

    }



    .alumni-card:hover {

        transform: translateY(-12px);

        box-shadow: 0 30px 70px rgba(0, 0, 0, .20);

    }



    .card-top {

        display: flex;

        align-items: center;

        gap: 18px;

    }



    .avatar {

        width: 75px;

        height: 75px;

        border-radius: 50%;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 28px;

        font-weight: bold;

        color: #fff;

        box-shadow: 0 10px 25px rgba(0, 0, 0, .20);

    }



    .card-title h4 {

        margin: 0;

        font-size: 22px;

        font-weight: 700;

        color: #7A0019;

    }



    .card-title p {

        margin-top: 5px;

        color: #666;

        font-size: 14px;

    }



    .divider {

        height: 1px;

        background: #eee;

        margin: 22px 0;

    }



    .info-row {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 18px;

        font-size: 15px;

    }



    .info-row i {

        width: 28px;

        color: #7A0019;

    }



    .badge {

        padding: 8px 18px;

        border-radius: 50px;

        font-weight: 600;

    }



    .badge-blue {

        background: #E8F2FF;

        color: #0D6EFD;

    }



    .badge-green {

        background: #E8F8EE;

        color: #198754;

    }



    .badge-gold {

        background: #FFF7E0;

        color: #C69200;

    }



    .card-footer {

        margin-top: 25px;

        text-align: center;

    }



    .profile-btn {

        border: none;

        padding: 12px 35px;

        border-radius: 40px;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        color: white;

        font-weight: 600;

        cursor: pointer;

        transition: .3s;

    }



    .profile-btn:hover {

        transform: scale(1.05);

    }



    .empty-state {

        grid-column: 1/-1;

        text-align: center;

        padding: 90px;

        background: white;

        border-radius: 25px;

    }



    .empty-state i {

        font-size: 70px;

        color: #999;

        margin-bottom: 20px;

    }



    .empty-state h3 {

        margin-bottom: 15px;

        color: #7A0019;

    }

    #scrollProgress {

        position: fixed;

        top: 0;

        left: 0;

        height: 5px;

        width: 0;

        background: linear-gradient(90deg, #7A0019, #C9A227);

        z-index: 99999;

        transition: .1s;

    }

    #backTop {

        position: fixed;

        right: 30px;

        bottom: 30px;

        width: 55px;

        height: 55px;

        border: none;

        border-radius: 50%;

        background: linear-gradient(135deg, #7A0019, #C9A227);

        color: #fff;

        font-size: 20px;

        cursor: pointer;

        display: none;

        box-shadow: 0 15px 35px rgba(0, 0, 0, .3);

        transition: .3s;

        z-index: 999;

    }

    #backTop:hover {

        transform: translateY(-6px) scale(1.08);

    }

    .live-clock {

        margin: 20px auto 40px;

        width: max-content;

        background: rgba(255, 255, 255, .7);

        backdrop-filter: blur(15px);

        padding: 14px 28px;

        border-radius: 40px;

        font-weight: 600;

        box-shadow: 0 15px 30px rgba(0, 0, 0, .12);

    }

    .live-clock i {

        color: #C9A227;

        margin-right: 10px;

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

        border-radius: 50%;

        background: rgba(201, 162, 39, .25);

        animation: float 18s linear infinite;

    }

    .particles span:nth-child(1) {
        left: 8%;
        animation-delay: 0s;
    }

    .particles span:nth-child(2) {
        left: 22%;
        animation-delay: 3s;
    }

    .particles span:nth-child(3) {
        left: 42%;
        animation-delay: 5s;
    }

    .particles span:nth-child(4) {
        left: 63%;
        animation-delay: 7s;
    }

    .particles span:nth-child(5) {
        left: 82%;
        animation-delay: 10s;
    }

    .particles span:nth-child(6) {
        left: 94%;
        animation-delay: 12s;
    }

    @keyframes float {

        0% {

            transform: translateY(100vh) scale(.4);

            opacity: 0;

        }

        50% {

            opacity: 1;

        }

        100% {

            transform: translateY(-150px) scale(1.4);

            opacity: 0;

        }

    }

    .alumni-card {

        opacity: 0;

        transform: translateY(40px);

        transition: 1s;

    }

    .alumni-card.show {

        opacity: 1;

        transform: translateY(0);

    }
    </style>
</head>

<body>
    <?php include 'header_aam.php'; ?>
    <div id="scrollProgress"></div>
    <div class="particles">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="container">
        <div class="hero-section">

            <div class="hero-overlay"></div>

            <div class="hero-content">

                <div class="hero-badge">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Homecoming 2026
                </div>

                <h3>
                    Welcoming Our Enthusiastic Alumni to the Homecoming 2026
                </h3>

                <p>



                </p>

            </div>

        </div>
        <div class="live-clock">
            <i class="fa-solid fa-clock"></i>
            <span id="clock"></span>
        </div>
        <div class="stats-row">

            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-users"></i>

                </div>

                <div class="stat-number">

                    <span class="counter">

                        <?= $result->num_rows ?>

                    </span>
                </div>

                <div class="stat-text">

                    Registered Alumni

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-building-columns"></i>

                </div>

                <div class="stat-number">
                    <span class="counter">
                        <?= count($depts) ?>
                    </span>

                </div>

                <div class="stat-text">

                    Departments

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-house"></i>

                </div>

                <div class="stat-number">
                    <span class="counter">
                        <?= count($halls) ?>
                    </span>

                </div>

                <div class="stat-text">

                    Halls

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-calendar-days"></i>

                </div>

                <div class="stat-number">
                    <span class="counter">
                        <?= count($years) ?>
                    </span>

                </div>

                <div class="stat-text">

                    Graduation Batches

                </div>

            </div>

        </div>

        <form action="" method="get" class="filter-form">
            <div class="filter-panel">

                <!-- <form action="" method="GET" id="filterForm"> -->

                <div class="row g-3 align-items-end">

                    <div class="col-lg-3 col-md-6">

                        <label class="filter-label">

                            <i class="fa-solid fa-calendar-days"></i>

                            Graduation Year

                        </label>

                        <select name="yog" class="form-select premium-select" onchange="this.form.submit()">

                            <option value="">All Years</option>

                            <?php foreach($years as $year): ?>

                            <option value="<?= htmlspecialchars($year) ?>" <?= ($selectedYear==$year)?'selected':'' ?>>

                                <?= htmlspecialchars($year) ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>



                    <div class="col-lg-3 col-md-6">

                        <label class="filter-label">

                            <i class="fa-solid fa-building-columns"></i>

                            Department

                        </label>

                        <select name="dept" class="form-select premium-select" onchange="this.form.submit()">

                            <option value="">All Departments</option>

                            <?php foreach($depts as $dept): ?>

                            <option value="<?= htmlspecialchars($dept) ?>" <?= ($selectedDept==$dept)?'selected':'' ?>>

                                <?= htmlspecialchars($dept) ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>



                    <div class="col-lg-3 col-md-6">

                        <label class="filter-label">

                            <i class="fa-solid fa-house"></i>

                            Hall

                        </label>

                        <select name="hall" class="form-select premium-select" onchange="this.form.submit()">

                            <option value="">All Halls</option>

                            <?php foreach($halls as $hall): ?>

                            <option value="<?= htmlspecialchars($hall) ?>" <?= ($selectedHall==$hall)?'selected':'' ?>>

                                <?= htmlspecialchars($hall) ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>



                    <div class="col-lg-3 col-md-6">

                        <label class="filter-label">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            Search Alumni

                        </label>

                        <input type="text" id="liveSearch" class="form-control premium-input"
                            placeholder="Type alumni name...">

                    </div>

                </div>



                <div class="filter-footer">

                    <div class="result-count">

                        <i class="fa-solid fa-users"></i>

                        Showing

                        <strong id="resultCounter">

                            <span class="counter">

                                <?= $result->num_rows ?>

                            </span>

                        </strong>

                        Alumni

                    </div>



                    <div>

                        <?php if($selectedYear || $selectedDept || $selectedHall){ ?>

                        <a href="<?= basename($_SERVER['PHP_SELF']); ?>"
                            class="btn btn-outline-danger rounded-pill px-4">

                            <i class="fa-solid fa-rotate-left me-2"></i>

                            Reset Filters

                        </a>

                        <?php } ?>

                    </div>

                </div>

        </form>

    </div>
    </form>

    <div class="alumni-grid-1">

        <?php if($result->num_rows>0): ?>

        <?php while($row=$result->fetch_assoc()): ?>

        <?php

$name=strtoupper(htmlspecialchars($row['name']));

$initials="";

$parts=explode(" ",$row['name']);

foreach($parts as $p){

$initials.=strtoupper(substr($p,0,1));

if(strlen($initials)>=2) break;

}

?>

        <div class="alumni-card">

            <div class="card-top">

                <div class="avatar">

                    <?= $initials ?>

                </div>

                <div class="card-title">

                    <h4><?= $name ?></h4>

                    <p>IIT Kharagpur Alumni</p>

                </div>

            </div>



            <div class="divider"></div>



            <div class="info-row">

                <div>

                    <i class="fa-solid fa-building-columns"></i>

                    Department

                </div>

                <span class="badge badge-blue">

                    <?= htmlspecialchars($row['dept']) ?>

                </span>

            </div>



            <div class="info-row">

                <div>

                    <i class="fa-solid fa-house"></i>

                    Hall

                </div>

                <span class="badge badge-green">

                    <?= htmlspecialchars($row['hall']) ?>

                </span>

            </div>



            <div class="info-row">

                <div>

                    <i class="fa-solid fa-graduation-cap"></i>

                    Batch

                </div>

                <span class="badge badge-gold">

                    <?= htmlspecialchars($row['yog']) ?>

                </span>

            </div>



            <div class="card-footer">

                <button class="profile-btn">

                    <i class="fa-solid fa-user"></i>

                    Alumni

                </button>

            </div>

        </div>

        <?php endwhile; ?>

        <?php else: ?>

        <div class="empty-state">

            <i class="fa-solid fa-face-frown-open"></i>

            <h3>No Alumni Found</h3>

            <p>Try changing your search filters.</p>

        </div>

        <?php endif; ?>

    </div>
    </div>
    <button id="backTop">

        <i class="fa-solid fa-arrow-up"></i>

    </button>

    <?php $connection->close(); ?>

    <script>
    const search = document.getElementById("liveSearch");

    const cards = document.querySelectorAll(".alumni-card");

    const counter = document.getElementById("resultCounter");

    search.addEventListener("keyup", function() {

        let value = this.value.toLowerCase();

        let total = 0;

        cards.forEach(card => {

            let txt = card.innerText.toLowerCase();

            if (txt.indexOf(value) > -1) {

                card.style.display = "block";

                total++;

            } else {

                card.style.display = "none";

            }

        });

        counter.innerHTML = total;

    });


    window.addEventListener("scroll", () => {

        let h = document.documentElement;

        let sc = (h.scrollTop / (h.scrollHeight - h.clientHeight)) * 100;

        document.getElementById("scrollProgress").style.width = sc + "%";

        let btn = document.getElementById("backTop");

        btn.style.display = window.scrollY > 350 ? "block" : "none";

    });

    document.getElementById("backTop").onclick = () => {

        window.scrollTo({

            top: 0,

            behavior: 'smooth'

        });

    };

    // Live Clock

    function updateClock() {

        const now = new Date();

        const date = now.toLocaleDateString('en-GB', {

            day: '2-digit',
            month: 'short',
            year: 'numeric'

        });

        const time = now.toLocaleTimeString('en-IN', {

            hour: '2-digit',
            minute: '2-digit',
            hour12: true

        });

        document.getElementById("clock").innerHTML =
            `${date} &bull; ${time}`;

    }

    updateClock();
    setInterval(updateClock, 1000);

    // Counter Animation

    document.querySelectorAll(".counter").forEach(counter => {

        let target = parseInt(counter.innerHTML);

        let count = 0;

        let speed = Math.max(1, Math.ceil(target / 80));

        let timer = setInterval(() => {

            count += speed;

            if (count >= target) {

                count = target;

                clearInterval(timer);

            }

            counter.innerHTML = count;

        }, 20);

    });

    // Fade Animation

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