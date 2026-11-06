<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php'; 


// ---------- GET FILTERS ----------
$filter_hall  = isset($_GET['hall'])  ? trim($_GET['hall'])  : '';
$filter_batch = isset($_GET['batch']) ? trim($_GET['batch']) : '';
$filter_year  = isset($_GET['year'])  ? trim($_GET['year'])  : '';

// ---------- BUILD QUERY ----------
$sql = "SELECT id, phase, name, email, mobile, yog, payment, hall,dept FROM aam WHERE 1=1";
$params = [];
$types = '';

if ($filter_hall !== '') {
    $sql .= " AND hall = ?";
    $params[] = $filter_hall;
    $types .= 's';
}
if ($filter_batch !== '') {
    $sql .= " AND yog = ?";
    $params[] = $filter_batch;
    $types .= 's';
}
if ($filter_year !== '') {
    $sql .= " AND phase = ?";
    $params[] = $filter_year;
    $types .= 's';
}

$sql .= " ORDER BY name ASC";

$stmt = $connection->prepare($sql);
if ($types !== '') {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
$count = $result->num_rows;

// ---------- GET UNIQUE VALUES FOR DROPDOWNS ----------
$halls = [];
$batches = [];
$years = [];

$res = $connection->query("SELECT DISTINCT hall FROM aam WHERE hall IS NOT NULL AND hall != '' ORDER BY hall");
while ($row = $res->fetch_assoc()) $halls[] = $row['hall'];

$res = $connection->query("SELECT DISTINCT yog FROM aam WHERE yog IS NOT NULL AND yog != '' ORDER BY yog DESC");
while ($row = $res->fetch_assoc()) $batches[] = $row['yog'];

$res = $connection->query("SELECT DISTINCT phase FROM aam WHERE phase IS NOT NULL AND phase != '' ORDER BY phase");
while ($row = $res->fetch_assoc()) $years[] = $row['phase'];

$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Directory – Homecoming 2026</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
    /* ---------- BLUE THEME ---------- */
    :root {
        --primary-blue: #0d47a1;
        --secondary-blue: #1976d2;
        --light-blue: #e3f2fd;
        --accent-blue: #42a5f5;
        --deep-blue: #0a2e5c;
    }

    body {
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        color: #0a2e5c;
        position: relative;
        overflow-x: hidden;
        background: #f0f7ff;
    }

    /* subtle blue blurred background */
    body::before {
        content: "";
        position: fixed;
        inset: 0;
        background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop') no-repeat center center fixed;
        background-size: cover;
        filter: blur(18px) brightness(0.9) saturate(1.2);
        transform: scale(1.08);
        z-index: -2;
        pointer-events: none;
    }

    body::after {
        content: "";
        position: fixed;
        inset: 0;
        background: rgba(13, 71, 161, 0.25);
        z-index: -1;
        pointer-events: none;
    }

    /* ---------- TYPOGRAPHY ---------- */
    h2,
    h3 {
        text-align: center;
        font-weight: 800;
        color: #0d47a1;
        text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8);
    }

    h2 {
        font-size: 2.4rem;
    }

    h3 {
        font-size: 1.7rem;
    }

    /* ---------- HERO ---------- */
    .hero-dashboard {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);
        border-radius: 30px;
        padding: 45px;
        margin: 30px 0;
        color: #fff;
        box-shadow: 0 20px 60px rgba(13, 71, 161, 0.4);
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.15), transparent 35%),
            radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.08), transparent 40%);
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
        background: rgba(255, 255, 255, 0.18);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 40px;
        backdrop-filter: blur(15px);
    }

    .hero-badge {
        display: inline-block;
        padding: 8px 18px;
        background: rgba(255, 255, 255, 0.18);
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
        opacity: 0.95;
        margin: 0;
    }

    /* ---------- CLOCK / COUNT ---------- */
    .info-box {
        background: rgba(255, 255, 255, 0.18);
        padding: 18px 28px;
        border-radius: 20px;
        backdrop-filter: blur(15px);
        text-align: center;
        font-weight: 600;
        min-width: 220px;
    }

    .info-box i {
        font-size: 22px;
        margin-bottom: 10px;
        display: block;
    }

    /* ---------- FILTER PANEL ---------- */
    .filter-panel {
        background: rgba(255, 255, 255, 0.82);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        padding: 30px;
        margin-bottom: 35px;
        margin-top: 45px;
        box-shadow: 0 15px 45px rgba(13, 71, 161, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.6);
    }

    .filter-panel .premium-label {
        font-weight: 700;
        color: #0d47a1;
        margin-bottom: 6px;
        display: block;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
    }

    .filter-panel .premium-label i {
        margin-right: 6px;
        color: #1976d2;
    }

    .form-control,
    .form-select {
        border-radius: 14px;
        border: 1px solid #bbdefb;
        height: 60px;
        background: #fbfdff;
        transition: 0.3s;
        font-weight: 500;
        color: #0a2e5c;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d47a1;
        box-shadow: 0 0 0 4px rgba(13, 71, 161, 0.12);
        background: #fff;
    }

    .result-box {
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: 700;
        border-radius: 15px;
        background: linear-gradient(135deg, #0d47a1, #1976d2);
        color: #fff;
        box-shadow: 0 8px 20px rgba(13, 71, 161, 0.25);
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
        align-items: center;
    }

    .chip {
        padding: 10px 22px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        background: #fff;
        color: #0d47a1;
        box-shadow: 0 8px 18px rgba(13, 71, 161, 0.1);
        transition: 0.3s;
        border: 1px solid transparent;
    }

    .chip:hover,
    .chip.active {
        background: #0d47a1;
        color: #fff;
        border-color: #0d47a1;
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(13, 71, 161, 0.35);
    }

    .reset-btn {
        margin-left: auto;
        padding: 10px 25px;
        border-radius: 50px;
        text-decoration: none;
        background: #e53935;
        color: #fff;
        font-weight: 600;
        transition: 0.3s;
        border: none;
    }

    .reset-btn:hover {
        background: #c62828;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(229, 57, 53, 0.3);
    }

    /* ---------- ALUMNI CARDS ---------- */
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 30px;
    }

    .alumni-card {
        position: relative;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(18px);
        border-radius: 25px;
        padding: 28px;
        overflow: hidden;
        transition: 0.35s;
        box-shadow: 0 18px 45px rgba(13, 71, 161, 0.15);
        opacity: 0;
        transform: translateY(45px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .alumni-card.show {
        opacity: 1;
        transform: translateY(0);
    }

    .alumni-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 70px rgba(13, 71, 161, 0.25);
        background: rgba(255, 255, 255, 0.95);
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
        letter-spacing: 0.5px;
    }

    .card-ribbon.paid {
        background: #0d47a1;
    }

    .card-ribbon.pending {
        background: #e53935;
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
        background: linear-gradient(135deg, #0d47a1, #42a5f5);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        box-shadow: 0 10px 25px rgba(13, 71, 161, 0.3);
        flex-shrink: 0;
    }

    .user-info h4 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #0d47a1;
    }

    .user-info small {
        color: #546e7a;
        font-weight: 500;
    }

    .card-divider {
        height: 1px;
        background: #e3f2fd;
        margin: 18px 0;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 16px;
        font-size: 15px;
        font-weight: 500;
    }

    .info-item i {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e3f2fd;
        border-radius: 12px;
        color: #0d47a1;
        flex-shrink: 0;
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
        font-size: 0.9rem;
    }

    .status.success {
        background: #d1fae5;
        color: #047857;
    }

    .status.pending {
        background: #fee2e2;
        color: #b91c1c;
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
        background: linear-gradient(135deg, #0d47a1, #1976d2);
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
    }

    .profile-btn:hover {
        transform: translateY(-3px);
        color: #fff;
        box-shadow: 0 12px 25px rgba(13, 71, 161, 0.4);
    }

    /* ---------- FOOTER ---------- */
    .public-footer {
        margin-top: 70px;
        padding: 30px;
        /* background: linear-gradient(135deg, #0d47a1, #1976d2); */
        background: rgba(1, 42, 74, .92);
        color: white;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        font-weight: 600;
        /* border-radius: 25px 25px 0 0; */
    }

    /* ---------- LOADER ---------- */
    #loader {
        position: fixed;
        inset: 0;
        background: #0a2e5c;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999999;
        transition: 0.6s;
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
        background: linear-gradient(135deg, #0d47a1, #42a5f5);
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
        background: linear-gradient(90deg, #42a5f5, #fff, #42a5f5);
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
        background: linear-gradient(90deg, #0d47a1, #42a5f5);
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
        background: rgba(66, 165, 245, 0.25);
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
        background: linear-gradient(135deg, #0d47a1, #1976d2);
        color: #fff;
        font-size: 22px;
        display: none;
        cursor: pointer;
        box-shadow: 0 15px 35px rgba(13, 71, 161, 0.4);
        transition: 0.3s;
        z-index: 999;
    }

    #topBtn:hover {
        transform: translateY(-8px);
    }

    /* small adjustments */
    @media (max-width: 768px) {
        .hero-dashboard {
            padding: 25px;
        }

        .hero-dashboard h1 {
            font-size: 26px;
        }

        .hero-left {
            flex-direction: column;
            align-items: flex-start;
        }

        .filter-panel {
            padding: 20px;
        }

        .result-box {
            font-size: 16px;
            height: 50px;
        }

        .result-box span {
            font-size: 22px;
        }
    }
    </style>
</head>

<body>
    <!-- LOADER -->
    <div id="loader">
        <div class="loader-box">
            <div class="loader-logo">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <h3>IIT Kharagpur</h3>
            <p>Loading Alumni Directory...</p>
            <div class="loader-bar">
                <span></span>
            </div>
        </div>
    </div>
    <div id="progressBar"></div>
    <div class="particles">
        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div>

    <div class="container">
        <!-- HERO -->
        <!-- <div class="hero-dashboard">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-left">
                    <div class="hero-logo">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <span class="hero-badge">
                            <i class="fa-solid fa-graduation-cap"></i> Homecoming 2026
                        </span>
                        <h1>Alumni Directory</h1>
                        <p>Browse all registered alumni — filter by hall, batch, or year.</p>
                    </div>
                </div>
                <div class="hero-right">
                    <div class="info-box">
                        <i class="fa-solid fa-user-graduate"></i>
                        <div style="font-size:28px; font-weight:800;" id="totalAlumni"><?= $count ?></div>
                        <div style="font-size:14px; opacity:0.9;">Registered Alumni</div>
                    </div>
                </div>
            </div>
        </div> -->
        <?php include 'header_aam.php'; ?>

        <!-- FILTER PANEL -->
        <div class="filter-panel">
            <form method="GET" id="filterForm">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-3">
                        <label class="premium-label"><i class="fa-solid fa-building"></i> Hall</label>
                        <select name="hall" class="form-select" onchange="this.form.submit()">
                            <option value="">All Halls</option>
                            <?php foreach ($halls as $h): ?>
                            <option value="<?= htmlspecialchars($h) ?>" <?= ($filter_hall == $h) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($h) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label class="premium-label"><i class="fa-solid fa-calendar-alt"></i> Batch (YOG)</label>
                        <select name="batch" class="form-select" onchange="this.form.submit()">
                            <option value="">All Batches</option>
                            <?php foreach ($batches as $b): ?>
                            <option value="<?= htmlspecialchars($b) ?>" <?= ($filter_batch == $b) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($b) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label class="premium-label"><i class="fa-solid fa-layer-group"></i> Year / Phase</label>
                        <select name="year" class="form-select" onchange="this.form.submit()">
                            <option value="">All Years</option>
                            <?php foreach ($years as $y): ?>
                            <?php
                                $y_label = $y === 'ph1' ? 'Phase One' : ($y === 'ph2' ? 'Phase Two' : $y);
                                ?>
                            <option value="<?= htmlspecialchars($y) ?>" <?= ($filter_year == $y) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($y_label) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label class="premium-label"><i class="fa-solid fa-users"></i> Showing</label>
                        <div class="result-box">
                            <span id="resultCounter"><?= $count ?></span> Alumni
                        </div>
                    </div>
                </div>

                <div class="quick-filter">
                    <a href="<?= basename($_SERVER['PHP_SELF']) ?>"
                        class="chip <?= (empty($filter_hall) && empty($filter_batch) && empty($filter_year)) ? 'active' : '' ?>">All</a>
                    <a href="?hall=<?= urlencode($filter_hall) ?>"
                        class="chip <?= (!empty($filter_hall)) ? 'active' : '' ?>">Hall</a>
                    <a href="?batch=<?= urlencode($filter_batch) ?>"
                        class="chip <?= (!empty($filter_batch)) ? 'active' : '' ?>">Batch</a>
                    <a href="?year=<?= urlencode($filter_year) ?>"
                        class="chip <?= (!empty($filter_year)) ? 'active' : '' ?>">Year</a>
                    <a href="<?= basename($_SERVER['PHP_SELF']) ?>" class="reset-btn"><i
                            class="fa-solid fa-rotate-left"></i> Reset</a>
                </div>
            </form>
        </div>

        <!-- ALUMNI CARDS -->
        <div class="dashboard-grid" id="alumniGrid">
            <?php if ($count > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <?php
                    $initials = "";
                    $parts = explode(" ", trim($row['name']));
                    foreach ($parts as $p) {
                        if ($p != "") {
                            $initials .= strtoupper(substr($p, 0, 1));
                            if (strlen($initials) >= 2) break;
                        }
                    }
                    $payment_status = $row['payment'] ?? 'PENDING';
                    $is_verified = ($payment_status == "PAID(Verified)" || $payment_status == "SUCCESS");
                    ?>
            <div class="alumni-card">
                <!-- <div class="card-ribbon <?= $is_verified ? 'paid' : 'pending' ?>">
                    <?= $is_verified ? 'VERIFIED' : 'PENDING' ?>
                </div> -->

                <div class="card-header-custom">
                    <div class="avatar"><?= $initials ?></div>
                    <div class="user-info">
                        <h4><?= htmlspecialchars($row['name']) ?></h4>
                        <small>Registered Alumni</small>
                    </div>
                </div>

                <div class="card-divider"></div>

                <div class="info-item">
                    <i class="fa-solid fa-building"></i>
                    <span><?= htmlspecialchars($row['hall'] ?? 'Hall not specified') ?></span>
                </div>
                <!-- <div class="info-item">
                    <i class="fa-solid fa-envelope"></i>
                    <span><?= htmlspecialchars($row['email']) ?></span>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-phone"></i>
                    <span><?= htmlspecialchars($row['mobile']) ?></span>
                </div> -->
                <div class="info-item">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>Batch <?= htmlspecialchars($row['yog']) ?></span>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-layer-group"></i>
                    <?php
                        // $phase_map = [
                        //     'ph1' => 'Phase One',
                        //     'ph2' => 'Phase Two',
                        // ];
                        // $phase_raw = $row['phase'] ?? '';
                        // $phase_display = $phase_map[$phase_raw] ?? ($phase_raw !== '' ? $phase_raw : 'Phase N/A');
                        ?>
                    <span><?= htmlspecialchars($row['dept']) ?></span>
                </div>

                <!-- <div class="payment-box">
                    <?php if ($payment_status == "PAID(Verified)"): ?>
                    <span class="status success"><i class="fa-solid fa-circle-check"></i> Payment Verified</span>
                    <?php elseif ($payment_status == "SUCCESS"): ?>
                    <span class="status success"><i class="fa-solid fa-circle-check"></i> Payment Success</span>
                    <?php elseif ($payment_status == "FAILED"): ?>
                    <span class="status pending"><i class="fa-solid fa-triangle-exclamation"></i> Payment Failed</span>
                    <?php else: ?>
                    <span class="status pending"><i class="fa-solid fa-clock"></i> Payment Pending</span>
                    <?php endif; ?>
                </div> -->

                <!-- <div class="card-buttons">
                    <a href="view_user.php?id=<?= $row['id'] ?>" class="profile-btn">
                        <i class="fa-solid fa-eye"></i> View Profile
                    </a>
                </div> -->
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <div class="col-12 text-center py-5">
                <h3>No alumni found matching your filters.</h3>
                <p class="text-muted">Try adjusting the hall, batch, or year.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="public-footer">
        <div>© 2026 IIT Kharagpur Office of Alumni Affairs</div>
        <div>Alumni Directory</div>
    </footer>

    <button id="topBtn"><i class="fa-solid fa-arrow-up"></i></button>

    <script>
    // Clock removed – replaced with total count, but we keep a live search anyway
    const searchInput = document.createElement('input');

    window.addEventListener('DOMContentLoaded', function() {
        const grid = document.getElementById('alumniGrid');
        const searchDiv = document.createElement('div');
        searchDiv.className = 'mb-4';
        searchDiv.innerHTML = `
                <div class="input-group" style="max-width:500px; margin:0 auto 20px auto;">
                    <span class="input-group-text" style="border-radius:14px 0 0 14px; background:#e3f2fd; border:1px solid #bbdefb;">
                        <i class="fa-solid fa-magnifying-glass" style="color:#0d47a1;"></i>
                    </span>
                    <input type="text" id="liveSearch" class="form-control" placeholder="Search by name, email, hall..." 
                           style="border-radius:0 14px 14px 0; height:60px; border-left:none;">
                </div>
            `;
        grid.parentNode.insertBefore(searchDiv, grid);

        const search = document.getElementById('liveSearch');
        const cards = document.querySelectorAll('.alumni-card');
        const counter = document.getElementById('resultCounter');
        const totalEl = document.getElementById('totalAlumni');

        search.addEventListener('keyup', function() {
            let value = this.value.toLowerCase();
            let total = 0;
            cards.forEach(card => {
                if (card.innerText.toLowerCase().includes(value)) {
                    card.style.display = 'block';
                    total++;
                } else {
                    card.style.display = 'none';
                }
            });
            counter.innerHTML = total;
            if (totalEl) totalEl.innerHTML = total;
        });
    });

    // Loader
    window.onload = function() {
        setTimeout(() => {
            const loader = document.getElementById('loader');
            if (loader) {
                loader.style.opacity = '0';
                loader.style.visibility = 'hidden';
            }
        }, 1200);
    };

    // Progress Bar & Scroll Top Button
    window.addEventListener('scroll', () => {
        let h = document.documentElement;
        let sc = (h.scrollTop / (h.scrollHeight - h.clientHeight)) * 100;
        document.getElementById('progressBar').style.width = sc + '%';
        const topBtn = document.getElementById('topBtn');
        if (topBtn) topBtn.style.display = window.scrollY > 350 ? 'block' : 'none';
    });

    document.getElementById('topBtn').onclick = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };

    // Card animation
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    });

    document.querySelectorAll('.alumni-card').forEach(card => {
        observer.observe(card);
    });
    </script>
</body>

</html>