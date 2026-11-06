<?php
session_start();
include 'config.php';
// include 'header_aam1.php';

if(!isset($_SESSION['email'])){
    header("Location: login_aam.php");
    exit;
}

$email = $_SESSION['email'];

/* ---------- HANDLE UPDATE (POST) ---------- */
/* ---------- HANDLE UPDATE (POST) ---------- */

$updateSuccess = false;
$updateError   = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $medical     = trim($_POST['medical'] ?? '');
    $arrivalMode = trim($_POST['arrivalMode'] ?? '');
    $dateOfArr   = trim($_POST['dateOfArr'] ?? '');
    $timeOfArr   = trim($_POST['timeOfArr'] ?? '');
    $dateOfDep   = trim($_POST['dateOfDep'] ?? '');
    $timeOfDep   = trim($_POST['timeOfDep'] ?? '');

    // Validation

    if(empty($dateOfArr) || empty($dateOfDep)){

        $updateError="Arrival and Departure dates are required.";

    }elseif(strtotime($dateOfDep) < strtotime($dateOfArr)){

        $updateError="Departure Date cannot be earlier than Arrival Date.";

    }else{

        $update = $connection->prepare("
            UPDATE aam
            SET
                medical=?,
                arrivalMode=?,
                dateOfArr=?,
                timeOfArr=?,
                dateOfDep=?,
                timeOfDep=?
            WHERE email=?
        ");

        $update->bind_param(
            "sssssss",
            $medical,
            $arrivalMode,
            $dateOfArr,
            $timeOfArr,
            $dateOfDep,
            $timeOfDep,
            $email
        );

        if($update->execute()){

            $updateSuccess=true;

        }else{

            $updateError="Unable to update your information.";

        }

        $update->close();

    }

}

/* ---------- FETCH LATEST USER DATA ---------- */
$stmt = $connection->prepare("SELECT * FROM aam WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$acc_details = [];
if (!empty($user['acc_details'])) {
    $acc_details = json_decode($user['acc_details'], true);
    if ($acc_details === null) $acc_details = [];
}
$connection->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile | Homecoming 2026</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
    :root {

        --primary: #003566;
        --primary2: #01497C;
        --gold: #F4B400;
        --light: #F8FAFC;
        --border: #E5E7EB;
        --text: #334155;
        --success: #16A34A;
        --danger: #DC2626;

    }

    body {

        margin: 0;
        background:
            linear-gradient(rgba(0, 40, 85, .82), rgba(0, 40, 85, .82)),
            url(aa2a.webp) center center/cover fixed;

        font-family: 'Segoe UI', sans-serif;

        color: var(--text);

    }


    .profile-cover {

        position: relative;

        overflow: hidden;

        border-radius: 28px;

        background: linear-gradient(135deg, #003566, #01497C, #00509D);

        color: #fff;

        padding: 50px;
        margin-top: 30px;

        margin-bottom: 35px;

        box-shadow: 0 20px 50px rgba(0, 0, 0, .18);

    }

    .profile-cover::before {

        content: '';

        position: absolute;

        width: 350px;

        height: 350px;

        border-radius: 50%;

        right: -100px;

        top: -120px;

        background: rgba(255, 255, 255, .08);

    }

    .profile-cover::after {

        content: '';

        position: absolute;

        width: 220px;

        height: 220px;

        border-radius: 50%;

        left: -80px;

        bottom: -80px;

        background: rgba(255, 255, 255, .05);

    }

    .profile-wrapper {

        display: flex;

        justify-content: space-between;

        align-items: center;

        flex-wrap: wrap;

        position: relative;

        z-index: 10;

    }

    .profile-left {

        display: flex;

        align-items: center;

        gap: 25px;

    }

    .avatar {

        width: 110px;

        height: 110px;

        border-radius: 50%;

        background: #fff;

        color: #003566;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 48px;

        box-shadow: 0 15px 40px rgba(0, 0, 0, .20);

    }

    .profile-title h2 {

        margin: 0;

        font-size: 32px;

        font-weight: 700;

    }

    .profile-title h5 {

        margin-top: 10px;

        font-weight: 400;

        opacity: .9;

    }

    .profile-title p {

        margin-top: 8px;

        opacity: .85;

    }

    .profile-status {

        display: flex;

        gap: 15px;

        flex-wrap: wrap;

    }

    .status-box {

        background: rgba(255, 255, 255, .12);

        backdrop-filter: blur(10px);

        border: 1px solid rgba(255, 255, 255, .18);

        border-radius: 18px;

        min-width: 170px;

        padding: 18px;

        text-align: center;

    }

    .status-box h3 {

        margin: 0;

        font-size: 30px;

        font-weight: 700;

    }

    .status-box span {

        opacity: .9;

    }

    .profile-progress {

        margin-top: 30px;

    }

    .progress {

        height: 14px;

        border-radius: 30px;

        overflow: hidden;

        background: rgba(255, 255, 255, .20);

    }

    .progress-bar {

        background: linear-gradient(90deg, #FFD43B, #F4B400);

    }

    .progress-text {

        display: flex;

        justify-content: space-between;

        margin-bottom: 10px;

        font-weight: 600;

    }

    /*==============================
    Premium Information Card
===============================*/

    .info-card {

        background: #fff;

        border-radius: 24px;

        padding: 35px;

        margin-bottom: 35px;

        box-shadow: 0 15px 45px rgba(0, 0, 0, .08);

        border: 1px solid #edf2f7;

    }

    .card-heading {

        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 30px;

        padding-bottom: 18px;

        border-bottom: 1px solid #eef2f7;

    }

    .heading-left {

        display: flex;

        align-items: center;

        gap: 18px;

    }

    .heading-icon {

        width: 62px;

        height: 62px;

        border-radius: 18px;

        background: linear-gradient(135deg, #003566, #00509D);

        color: #fff;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 26px;

        box-shadow: 0 8px 20px rgba(0, 53, 102, .25);

    }

    .heading-title h3 {

        margin: 0;

        color: #003566;

        font-weight: 700;

    }

    .heading-title p {

        margin: 4px 0 0;

        color: #6b7280;

        font-size: 14px;

    }

    .profile-badge {

        background: #eaf7ef;

        color: #16A34A;

        padding: 10px 18px;

        border-radius: 30px;

        font-size: 13px;

        font-weight: 600;

    }

    .info-box {

        background: #f8fafc;

        border: 1px solid #edf2f7;

        border-radius: 16px;

        padding: 18px;

        height: 100%;

        transition: .3s;
        margin-bottom: 10px;

    }

    .info-box:hover {

        background: #fff;

        transform: translateY(-4px);

        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);

    }

    .info-label {

        font-size: 12px;

        color: #100f11;

        text-transform: uppercase;

        letter-spacing: .8px;

        margin-bottom: 8px;

    }

    .info-value {

        color: #0f172a;

        font-weight: 600;

        font-size: 16px;

    }

    .info-value i {

        color: #003566;

        width: 22px;

    }

    .section-gap {

        margin-top: 22px;

    }

    /*=========================================
        Work Information
==========================================*/

    .work-card {

        background: #ffffff;

        border-radius: 25px;

        padding: 35px;

        margin-bottom: 35px;

        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);

        border: 1px solid #edf2f7;

    }

    .work-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 30px;

        padding-bottom: 18px;

        border-bottom: 1px solid #edf2f7;

    }

    .work-left {

        display: flex;

        align-items: center;

        gap: 18px;

    }

    .work-icon {

        width: 65px;

        height: 65px;

        border-radius: 18px;

        background: linear-gradient(135deg, #0F4C81, #0066CC);

        display: flex;

        align-items: center;

        justify-content: center;

        color: #fff;

        font-size: 28px;

        box-shadow: 0 10px 25px rgba(0, 102, 204, .30);

    }

    .work-title h3 {

        margin: 0;

        color: #003566;

        font-weight: 700;

    }

    .work-title p {

        margin: 5px 0 0;

        color: #6c757d;

    }

    .company-badge {

        padding: 10px 22px;

        border-radius: 30px;

        background: #EEF7FF;

        color: #00509D;

        font-weight: 600;

        font-size: 14px;

    }

    .work-box {

        background: #f8fafc;

        border: 1px solid #edf2f7;

        border-radius: 18px;

        padding: 18px;

        transition: .35s;

        height: 100%;

    }

    .work-box:hover {

        transform: translateY(-5px);

        background: #fff;

        box-shadow: 0 15px 30px rgba(0, 0, 0, .08);

    }

    .work-label {

        color: #100f11;

        text-transform: uppercase;

        font-size: 12px;

        letter-spacing: .7px;

        margin-bottom: 8px;

    }

    .work-value {

        color: #0F172A;

        font-size: 17px;

        font-weight: 600;

    }

    .work-value i {

        color: #00509D;

        width: 24px;

    }

    /*==================================================
            IIT KGP Academic Card
==================================================*/

    .academic-card {

        background: #fff;

        border-radius: 25px;

        padding: 35px;

        margin-bottom: 35px;

        border: 1px solid #edf2f7;

        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);

    }

    .academic-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 30px;

        padding-bottom: 18px;

        border-bottom: 1px solid #edf2f7;

    }

    .academic-left {

        display: flex;

        align-items: center;

        gap: 18px;

    }

    .academic-icon {

        width: 65px;

        height: 65px;

        border-radius: 18px;

        background: linear-gradient(135deg, #7A0019, #B8860B);

        color: #fff;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 30px;

        box-shadow: 0 12px 30px rgba(122, 0, 25, .25);

    }

    .academic-title h3 {

        margin: 0;

        color: #7A0019;

        font-weight: 700;

    }

    .academic-title p {

        margin: 5px 0 0;

        color: #64748b;

    }

    .batch-badge {

        background: #FFF8E6;

        color: #B8860B;

        border-radius: 30px;

        padding: 10px 22px;

        font-weight: 600;

    }

    .academic-box {

        background: #F8FAFC;

        border-radius: 18px;

        padding: 20px;

        border: 1px solid #EDF2F7;

        transition: .35s;

        height: 100%;

    }

    .academic-box:hover {

        transform: translateY(-6px);

        box-shadow: 0 15px 30px rgba(0, 0, 0, .08);

        background: #fff;

    }

    .academic-label {

        font-size: 12px;

        text-transform: uppercase;

        letter-spacing: .8px;

        color: #100f11;

        margin-bottom: 8px;

    }

    .academic-value {

        font-size: 17px;

        font-weight: 600;

        color: #0F172A;

    }

    .academic-value i {

        color: #7A0019;

        width: 24px;

    }

    .position-card {

        background: linear-gradient(135deg, #7A0019, #A3002A);

        color: #fff;

        border-radius: 20px;

        padding: 25px;

        margin-top: 20px;

    }

    .position-card h5 {

        margin-bottom: 10px;

    }

    /*==================================================
                PAYMENT CARD
==================================================*/

    .payment-card {

        background: #fff;

        border-radius: 25px;

        padding: 35px;

        margin-bottom: 35px;

        border: 1px solid #edf2f7;

        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);

    }

    .payment-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 30px;

        padding-bottom: 20px;

        border-bottom: 1px solid #edf2f7;

    }

    .payment-left {

        display: flex;

        align-items: center;

        gap: 18px;

    }

    .payment-icon {

        width: 65px;

        height: 65px;

        border-radius: 18px;

        background: linear-gradient(135deg, #0F766E, #10B981);

        color: #fff;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 28px;

        box-shadow: 0 10px 25px rgba(16, 185, 129, .30);

    }

    .payment-title h3 {

        margin: 0;

        color: #065F46;

        font-weight: 700;

    }

    .payment-title p {

        margin: 5px 0 0;

        color: #64748b;

    }

    .payment-status {

        padding: 10px 24px;

        border-radius: 30px;

        background: #DCFCE7;

        color: #15803D;

        font-weight: 700;

        font-size: 14px;

    }

    .payment-box {

        background: #F8FAFC;

        border: 1px solid #EDF2F7;

        border-radius: 20px;

        padding: 25px;

        transition: .35s;

        height: 100%;

    }

    .payment-box:hover {

        transform: translateY(-5px);

        background: #fff;

        box-shadow: 0 15px 30px rgba(0, 0, 0, .08);

    }

    .payment-label {

        color: #100f11;

        font-size: 12px;

        text-transform: uppercase;

        letter-spacing: .8px;

        margin-bottom: 10px;

    }

    .payment-value {

        font-size: 20px;

        font-weight: 700;

        color: #0F172A;

    }

    .payment-value i {

        color: #10B981;

        width: 28px;

    }

    .receipt-btn {

        margin-top: 30px;

        display: inline-block;

        background: linear-gradient(135deg, #10B981, #059669);

        color: #fff;

        text-decoration: none;

        padding: 14px 28px;

        border-radius: 50px;

        font-weight: 600;

        transition: .35s;

    }

    .receipt-btn:hover {

        color: #fff;

        transform: translateY(-3px);

        box-shadow: 0 12px 25px rgba(16, 185, 129, .35);

    }

    .payment-note {

        margin-top: 25px;

        background: #ECFDF5;

        border-left: 5px solid #10B981;

        padding: 18px;

        border-radius: 12px;

        color: #065F46;

    }

    .col-lg-6 {

        margin-bottom: 10px !important;
    }

    .pay-now-btn {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 10px;

        padding: 16px 40px;

        border-radius: 50px;

        font-size: 17px;

        font-weight: 700;

        color: #fff;

        text-decoration: none;

        background: linear-gradient(135deg, #0d6efd, #0056d6);

        box-shadow: 0 12px 30px rgba(13, 110, 253, .30);

        transition: .35s;

        animation: pulsePayment 2s infinite;

    }

    .pay-now-btn:hover {

        color: #fff;

        transform: translateY(-4px);

        box-shadow: 0 18px 35px rgba(13, 110, 253, .45);

    }

    @keyframes pulsePayment {

        0% {

            box-shadow: 0 0 0 0 rgba(13, 110, 253, .45);

        }

        70% {

            box-shadow: 0 0 0 18px rgba(13, 110, 253, 0);

        }

        100% {

            box-shadow: 0 0 0 0 rgba(13, 110, 253, 0);

        }

    }

    /*=====================================================
            ACCOMMODATION & TRAVEL
======================================================*/

    .travel-card,
    .stay-card {

        background: #fff;

        border-radius: 25px;

        padding: 35px;

        margin-bottom: 35px;

        border: 1px solid #edf2f7;

        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);

    }

    .travel-header,
    .stay-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 30px;

        padding-bottom: 18px;

        border-bottom: 1px solid #edf2f7;

    }

    .travel-left,
    .stay-left {

        display: flex;

        align-items: center;

        gap: 18px;

    }

    .travel-icon {

        width: 65px;

        height: 65px;

        border-radius: 18px;

        background: linear-gradient(135deg, #2563EB, #1D4ED8);

        color: #fff;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 28px;

    }

    .stay-icon {

        width: 65px;

        height: 65px;

        border-radius: 18px;

        background: linear-gradient(135deg, #D97706, #F59E0B);

        color: #fff;

        display: flex;

        justify-content: center;

        align-items: center;

        font-size: 28px;

    }

    .travel-title h3,
    .stay-title h3 {

        margin: 0;

        font-weight: 700;

    }

    .travel-title p,
    .stay-title p {

        color: #64748b;

        margin-top: 5px;

    }

    .travel-box,
    .stay-box {

        background: #F8FAFC;

        border: 1px solid #EDF2F7;

        border-radius: 18px;

        padding: 20px;

        height: 100%;

        transition: .35s;

    }

    .travel-box:hover,
    .stay-box:hover {

        transform: translateY(-5px);

        background: #fff;

        box-shadow: 0 15px 30px rgba(0, 0, 0, .08);

    }

    .info-title {

        font-size: 12px;

        color: #64748B;

        text-transform: uppercase;

        letter-spacing: 1px;

        margin-bottom: 8px;

    }

    .info-text {

        font-size: 17px;

        font-weight: 600;

        color: #0F172A;

    }

    .info-text i {

        color: #0d6efd;

        width: 24px;

    }

    .timeline {

        margin-top: 25px;

        border-left: 4px solid #0d6efd;

        padding-left: 25px;

    }

    .timeline-item {

        margin-bottom: 25px;

        position: relative;

    }

    .timeline-item:before {

        content: '';

        width: 16px;

        height: 16px;

        border-radius: 50%;

        background: #0d6efd;

        position: absolute;

        left: -34px;

        top: 6px;

    }

    .premium-input {

        border: 2px solid #E5E7EB;

        border-radius: 15px;

        padding: 14px 18px;

        font-size: 15px;

        transition: .3s;

        background: #fff;

    }

    textarea.premium-input {

        min-height: 140px;

        resize: vertical;

    }

    .premium-input:focus {

        border-color: #0d6efd;

        box-shadow: 0 0 0 4px rgba(13, 110, 253, .12);

    }

    .profile-photo-inline {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 16px;
        border: 3px solid #eef4ff;
        box-shadow: 0 8px 20px rgba(0, 53, 102, .12);
        transition: .3s;
        cursor: pointer;
    }

    .profile-photo-inline:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 28px rgba(0, 53, 102, .22);
    }
    </style>
</head>

<body>

    <div class="container">
        <?php include 'header_aam.php'; ?>
        <!-- <h2>Your Profile</h2> -->
        <form method="post">
            <div class="profile-cover mt-6">

                <div class="profile-wrapper">

                    <div class="profile-left">

                        <div class="avatar">

                            <i class="fa-solid fa-user-graduate"></i>

                        </div>

                        <div class="profile-title">

                            <h2><?= htmlspecialchars($user['name']); ?></h2>

                            <h5>Homecoming 2026</h5>

                            <p>

                                <?= htmlspecialchars($user['degree']); ?>

                                •

                                <?= htmlspecialchars($user['dept']); ?>

                                •

                                Batch <?= htmlspecialchars($user['yoj']); ?>

                            </p>

                        </div>

                    </div>

                    <div class="profile-status">

                        <div class="status-box">

                            <h3><?= htmlspecialchars($user['payment']); ?></h3>

                            <span>Payment Status</span>

                        </div>

                        <div class="status-box">

                            <h3><?= htmlspecialchars($user['hall']); ?></h3>

                            <span>Hall</span>

                        </div>

                        <div class="status-box">

                            <h3><?= htmlspecialchars($user['yog']); ?></h3>

                            <span>Graduation</span>

                        </div>

                    </div>

                </div>

                <div class="profile-progress">

                    <div class="progress-text">

                        <span>Profile Completion</span>

                        <span>100%</span>

                    </div>

                    <div class="progress">

                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%">

                        </div>

                    </div>

                </div>

            </div>

            <div class="info-card">

                <div class="card-heading">

                    <div class="heading-left">

                        <div class="heading-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div class="heading-title">

                            <h3>Personal Information</h3>

                            <p>
                                Your registered alumni profile information.
                            </p>

                        </div>

                    </div>

                    <div class="profile-badge">

                        <i class="fa-solid fa-circle-check"></i>

                        Verified

                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="info-box">
                        <div class="info-label">Profile Photo</div>
                        <div class="info-value">
                            <?php if (!empty($user['photo']) && file_exists($user['photo'])): ?>
                            <img src="<?= htmlspecialchars($user['photo']); ?>" alt="Profile Photo"
                                class="profile-photo-inline">
                            <?php else: ?>
                            <i class="fa-solid fa-image"></i>
                            <span class="text-muted">No photo uploaded</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>



                <div class="row g-4">

                    <div class="col-lg-6">

                        <div class="info-box">

                            <div class="info-label">Full Name</div>

                            <div class="info-value">

                                <i class="fa-solid fa-user"></i>

                                <?= htmlspecialchars($user['name']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="info-box">

                            <div class="info-label">Email Address</div>

                            <div class="info-value">

                                <i class="fa-solid fa-envelope"></i>

                                <?= htmlspecialchars($user['email']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="info-box">

                            <div class="info-label">Mobile Number</div>

                            <div class="info-value">

                                <i class="fa-solid fa-phone"></i>

                                <?= htmlspecialchars($user['mobile']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="info-box">

                            <div class="info-label">Date of Birth</div>

                            <div class="info-value">

                                <i class="fa-solid fa-calendar-days"></i>

                                <?= htmlspecialchars($user['dob']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="info-box">

                            <div class="info-label">ID Type</div>

                            <div class="info-value">

                                <i class="fa-solid fa-id-card"></i>

                                <?= htmlspecialchars($user['idtype']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="info-box">

                            <div class="info-label">ID Number</div>

                            <div class="info-value">

                                <i class="fa-solid fa-address-card"></i>

                                <?= htmlspecialchars($user['idnumber']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-12">

                        <div class="info-box">

                            <div class="info-label">Residential Address</div>

                            <div class="info-value">

                                <i class="fa-solid fa-location-dot"></i>

                                <?= htmlspecialchars($user['address']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-4">

                        <div class="info-box">

                            <div class="info-label">City</div>

                            <div class="info-value">

                                <i class="fa-solid fa-city"></i>

                                <?= htmlspecialchars($user['city']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-4">

                        <div class="info-box">

                            <div class="info-label">State</div>

                            <div class="info-value">

                                <i class="fa-solid fa-map-location-dot"></i>

                                <?= htmlspecialchars($user['state']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-4">

                        <div class="info-box">

                            <div class="info-label">Country</div>

                            <div class="info-value">

                                <i class="fa-solid fa-earth-asia"></i>

                                <?= htmlspecialchars($user['country']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-12">

                        <div class="info-box">

                            <div class="info-label">Social Media</div>

                            <div class="info-value">

                                <i class="fa-solid fa-globe"></i>

                                <?= htmlspecialchars($user['social_links']); ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="work-card">

                <div class="work-header">

                    <div class="work-left">

                        <div class="work-icon">

                            <i class="fa-solid fa-briefcase"></i>

                        </div>

                        <div class="work-title">

                            <h3>Professional Information</h3>

                            <p>
                                Current employment and organization details.
                            </p>

                        </div>

                    </div>

                    <div class="company-badge">

                        <i class="fa-solid fa-building"></i>

                        Corporate Profile

                    </div>

                </div>



                <div class="row g-4">

                    <div class="col-lg-6">

                        <div class="work-box">

                            <div class="work-label">

                                Current Position

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-user-tie"></i>

                                <?= htmlspecialchars($user['profession']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="work-box">

                            <div class="work-label">

                                Designation

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-id-badge"></i>

                                <?= htmlspecialchars($user['designation']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-12">

                        <div class="work-box">

                            <div class="work-label">

                                Organisation

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-building"></i>

                                <?= htmlspecialchars($user['organisation']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-12">

                        <div class="work-box">

                            <div class="work-label">

                                Office Address

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-location-dot"></i>

                                <?= htmlspecialchars($user['waddress']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-3">

                        <div class="work-box">

                            <div class="work-label">

                                City

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-city"></i>

                                <?= htmlspecialchars($user['wcity']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-3">

                        <div class="work-box">

                            <div class="work-label">

                                State

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-map-location-dot"></i>

                                <?= htmlspecialchars($user['wstate']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-3">

                        <div class="work-box">

                            <div class="work-label">

                                Country

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-earth-asia"></i>

                                <?= htmlspecialchars($user['wcountry']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-3">

                        <div class="work-box">

                            <div class="work-label">

                                Zip Code

                            </div>

                            <div class="work-value">

                                <i class="fa-solid fa-map-pin"></i>

                                <?= htmlspecialchars($user['wzipcode']); ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="academic-card">

                <div class="academic-header">

                    <div class="academic-left">

                        <div class="academic-icon">

                            <i class="fa-solid fa-graduation-cap"></i>

                        </div>

                        <div class="academic-title">

                            <h3>Affiliation</h3>

                            <p>Academic profile and institute information.</p>

                        </div>

                    </div>

                    <div class="batch-badge">

                        <i class="fa-solid fa-medal"></i>

                        Alumni

                    </div>

                </div>



                <div class="row g-4">

                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Academic Course

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-book-open"></i>

                                <?= htmlspecialchars($user['course']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Degree

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-scroll"></i>

                                <?= htmlspecialchars($user['degree']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Department

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-building-columns"></i>

                                <?= htmlspecialchars($user['dept']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Hall of Residence

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-house"></i>

                                <?= htmlspecialchars($user['hall']); ?>

                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Nearest alumni chapter

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-globe"></i>

                                <?= htmlspecialchars($user['nearest_alumni_chapter']); ?>

                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Chapter name or interested in associating with one

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-handshake"></i>

                                <?= htmlspecialchars($user['chapter_name_interested_associating_with']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Joining Year

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-calendar-plus"></i>

                                <?= htmlspecialchars($user['yoj']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-6">

                        <div class="academic-box">

                            <div class="academic-label">

                                Graduation Year

                            </div>

                            <div class="academic-value">

                                <i class="fa-solid fa-award"></i>

                                <?= htmlspecialchars($user['yog']); ?>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="position-card">

                    <h5>

                        <i class="fa-solid fa-star"></i>

                        Leadership & Campus Position

                    </h5>

                    <p class="mb-0">

                        <?= !empty($user['positionHolding']) ? htmlspecialchars($user['positionHolding']) : 'No campus leadership position provided.'; ?>

                    </p>

                </div>

            </div>


            <div class="payment-card">

                <div class="payment-header">

                    <div class="payment-left">

                        <div class="payment-icon">

                            <i class="fa-solid fa-credit-card"></i>

                        </div>

                        <div class="payment-title">

                            <h3>Payment Information</h3>

                            <p>Registration fee and payment status.</p>

                        </div>

                    </div>

                    <div class="payment-status">

                        <i class="fa-solid fa-circle-check"></i>

                        <?= strtoupper($user['payment']); ?>

                    </div>

                </div>



                <div class="row g-4">

                    <div class="col-lg-4">

                        <div class="payment-box">

                            <div class="payment-label">

                                Registration Fee

                            </div>

                            <div class="payment-value">

                                <i class="fa-solid fa-indian-rupee-sign"></i>

                                <?= strtoupper($user['cost']); ?>

                            </div>

                        </div>


                    </div>



                    <div class="col-lg-4">

                        <div class="payment-box">

                            <div class="payment-label">

                                Payment Status

                            </div>

                            <div class="payment-value">

                                <i class="fa-solid fa-wallet"></i>

                                <?= htmlspecialchars($user['payment']); ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-4">

                        <div class="payment-box">

                            <div class="payment-label">

                                Transaction ID

                            </div>

                            <div class="payment-value">

                                <i class="fa-solid fa-hashtag"></i>

                                <?= !empty($user['transaction_id']) ? htmlspecialchars($user['transaction_id']) : 'Not Available'; ?>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Payment Information -->
                <div class="payment-note">

                    <i class="fa-solid fa-circle-info"></i>

                    <?php if ($user['payment'] === 'PENDING') { ?>

                    Your registration is currently <strong>Pending</strong>. Please complete the registration fee
                    payment to confirm your participation in the Annual Alumni Meet 2026.

                    <?php } else { ?>

                    Your registration fee has been successfully received and verified by the Office of Alumni Affairs,
                    IIT Kharagpur.

                    <?php } ?>

                </div>


                <?php if ($user['payment'] === 'PENDING'): ?>

                <div class="text-center mt-4">

                    <a href="create_order.php" class="pay-now-btn">

                        <i class="fa-solid fa-credit-card me-2"></i>

                        Pay Registration Fee

                    </a>

                </div>

                <?php endif; ?>


                <?php if(!empty($user['receipt'])){ ?>

                <a href="<?= htmlspecialchars($user['receipt']); ?>" class="receipt-btn" target="_blank">

                    <i class="fa-solid fa-download"></i>

                    Download Payment Receipt

                </a>

                <?php } ?>

            </div>

            <!-- ================= Accommodation & Food ================= -->

            <div class="stay-card">

                <div class="stay-header">

                    <div class="stay-left">

                        <div class="stay-icon">
                            <i class="fa-solid fa-bed"></i>
                        </div>

                        <div class="stay-title">
                            <h3>Accommodation & Food</h3>
                            <p>
                                Accommodation preference and accompanying guest details.
                            </p>
                        </div>

                    </div>

                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                        <i class="fa-solid fa-hotel me-1"></i>
                        Stay Details
                    </span>

                </div>


                <div class="row g-4">

                    <!-- Accompanying Person -->

                    <div class="col-lg-6">

                        <div class="stay-box">

                            <div class="info-title">

                                Accompanying Person

                            </div>

                            <div class="info-text">

                                <i class="fa-solid fa-user-group"></i>

                                <?= !empty($user['acc_name']) ? htmlspecialchars($user['acc_name']) : 'None'; ?>

                            </div>

                        </div>

                    </div>


                    <!-- Relation -->

                    <div class="col-lg-6">

                        <div class="stay-box">

                            <div class="info-title">

                                Relationship

                            </div>

                            <div class="info-text">

                                <i class="fa-solid fa-people-arrows"></i>

                                <?= htmlspecialchars($user['acc_relation']); ?>

                            </div>

                        </div>

                    </div>


                    <!-- Food -->

                    <div class="col-lg-6">

                        <div class="stay-box">

                            <div class="info-title">

                                Food Preference

                            </div>

                            <div class="info-text">

                                <i class="fa-solid fa-utensils"></i>

                                <?= htmlspecialchars($user['foodPreference']); ?>

                            </div>

                        </div>

                    </div>


                    <!-- Editable Health Restriction -->

                    <div class="col-lg-6">

                        <div class="stay-box">

                            <div class="info-title">

                                Health Restrictions

                            </div>

                            <textarea class="form-control premium-input mt-3" name="medical" rows="5"
                                placeholder="Mention allergies, dietary restrictions or medical assistance required..."><?= htmlspecialchars($user['medical']); ?></textarea>

                            <small class="text-muted d-block mt-2">

                                <i class="fa-solid fa-circle-info me-1"></i>

                                This information will help us arrange suitable accommodation and meals.

                            </small>

                        </div>

                    </div>

                </div>


                <div class="alert alert-warning rounded-4 border-0 shadow-sm mt-4">

                    <i class="fa-solid fa-circle-info me-2"></i>

                    Accommodation will be allotted by the
                    <strong>Office of Alumni Affairs, IIT Kharagpur</strong>
                    based on availability. Food arrangements will follow your selected preference.

                </div>

            </div>

            <!-- =============== End Accommodation ================= -->

            <!-- <div class="travel-card">

<div class="travel-header">

<div class="travel-left">

<div class="travel-icon">

<i class="fa-solid fa-plane-departure"></i>

</div>

<div class="travel-title">

<h3>Travel Details</h3>

<p>Your expected arrival and departure schedule.</p>

</div>

</div>

</div>



<div class="row g-4">

<div class="col-lg-4">

<div class="travel-box">

<div class="info-title">

Arrival Mode

</div>

<div class="info-text">

<i class="fa-solid fa-train"></i>

<?= htmlspecialchars($user['arrivalMode']); ?>

</div>

</div>

</div>



<div class="col-lg-4">

<div class="travel-box">

<div class="info-title">

Arrival Date

</div>

<div class="info-text">

<i class="fa-solid fa-calendar-days"></i>

<?= htmlspecialchars($user['dateOfArr']); ?>

</div>

</div>

</div>



<div class="col-lg-4">

<div class="travel-box">

<div class="info-title">

Arrival Time

</div>

<div class="info-text">

<i class="fa-solid fa-clock"></i>

<?= htmlspecialchars($user['timeOfArr']); ?>

</div>

</div>

</div>

</div>



<div class="timeline">

<div class="timeline-item">

<h6>

<i class="fa-solid fa-location-dot"></i>

Arrival

</h6>

<p>

<?= htmlspecialchars($user['dateOfArr']); ?>

at

<?= htmlspecialchars($user['timeOfArr']); ?>

</p>

</div>



<div class="timeline-item">

<h6>

<i class="fa-solid fa-plane"></i>

Departure

</h6>

<p>

<?= htmlspecialchars($user['dateOfDep']); ?>

at

<?= htmlspecialchars($user['timeOfDep']); ?>

</p>

</div>

</div> -->

            <!-- ===================== Travel Details ===================== -->

            <div class="travel-card">

                <div class="travel-header">

                    <div class="travel-left">

                        <div class="travel-icon">
                            <i class="fa-solid fa-plane-departure"></i>
                        </div>

                        <div class="travel-title">

                            <h3>Travel Details</h3>

                            <p>
                                You can update your arrival and departure schedule before the event.
                            </p>

                        </div>

                    </div>

                    <span class="badge bg-primary px-3 py-2 rounded-pill">

                        <i class="fa-solid fa-pen me-1"></i>

                        Editable

                    </span>

                </div>



                <div class="row g-4">

                    <!-- Mode -->

                    <div class="col-lg-12">

                        <div class="travel-box">

                            <div class="info-title">

                                Mode of Arrival

                            </div>

                            <input type="text" name="arrivalMode" class="form-control premium-input mt-3"
                                placeholder="Flight / Train / Car / Bus"
                                value="<?= htmlspecialchars($user['arrivalMode']); ?>">

                        </div>

                    </div>
                    <?php if ($user['mode_description']): ?>
                    <div class="col-lg-12">

                        <div class="travel-box">


                            <input type="text" name="departureMode" class="form-control premium-input mt-3"
                                placeholder="" value="<?= htmlspecialchars($user['mode_description']); ?>">

                        </div>

                    </div>
                    <?php endif; ?>



                    <!-- Arrival Date -->

                    <div class="col-md-6">

                        <div class="travel-box">

                            <div class="info-title">

                                Arrival Date

                            </div>

                            <input type="date" name="dateOfArr" class="form-control premium-input mt-3"
                                value="<?= htmlspecialchars($user['dateOfArr']); ?>">

                        </div>

                    </div>



                    <!-- Arrival Time -->

                    <div class="col-md-6">

                        <div class="travel-box">

                            <div class="info-title">

                                Arrival Time

                            </div>

                            <input type="time" name="timeOfArr" class="form-control premium-input mt-3"
                                value="<?= htmlspecialchars($user['timeOfArr']); ?>">

                        </div>

                    </div>



                    <!-- Departure Date -->

                    <div class="col-md-6">

                        <div class="travel-box">

                            <div class="info-title">

                                Departure Date

                            </div>

                            <input type="date" name="dateOfDep" class="form-control premium-input mt-3"
                                value="<?= htmlspecialchars($user['dateOfDep']); ?>">

                        </div>

                    </div>



                    <!-- Departure Time -->

                    <div class="col-md-6">

                        <div class="travel-box">

                            <div class="info-title">

                                Departure Time

                            </div>

                            <input type="time" name="timeOfDep" class="form-control premium-input mt-3"
                                value="<?= htmlspecialchars($user['timeOfDep']); ?>">

                        </div>

                    </div>

                </div>



                <!-- Journey Summary -->

                <div class="row mt-4">

                    <div class="col-md-6">

                        <div class="alert alert-success rounded-4 border-0 shadow-sm h-100">

                            <h6>

                                <i class="fa-solid fa-plane-arrival me-2"></i>

                                Arrival

                            </h6>

                            <hr>

                            <p class="mb-1">

                                <strong>Date :</strong>

                                <?= htmlspecialchars($user['dateOfArr']); ?>

                            </p>

                            <p class="mb-0">

                                <strong>Time :</strong>

                                <?= htmlspecialchars($user['timeOfArr']); ?>

                            </p>

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="alert alert-danger rounded-4 border-0 shadow-sm h-100">

                            <h6>

                                <i class="fa-solid fa-plane-departure me-2"></i>

                                Departure

                            </h6>

                            <hr>

                            <p class="mb-1">

                                <strong>Date :</strong>

                                <?= htmlspecialchars($user['dateOfDep']); ?>

                            </p>

                            <p class="mb-0">

                                <strong>Time :</strong>

                                <?= htmlspecialchars($user['timeOfDep']); ?>

                            </p>

                        </div>

                    </div>

                </div>

                <div class="text-center mt-5">

                    <button type="submit" name="updateTravel" class="btn btn-success btn-lg px-5">

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Save Changes

                    </button>

                </div>


            </div>


    </div>
    </form>

    </div>

    <?php if($updateSuccess){ ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    Swal.fire({

        icon: 'success',

        title: 'Profile Details Updated',

        text: 'Your information has been updated successfully.',

        confirmButtonColor: '#198754'

    }).then(() => {

        window.location.href = window.location.pathname;

    });
    </script>

    <?php } ?>


    <?php if($updateError!=""){ ?>

    <script>
    Swal.fire({

        icon: 'error',

        title: 'Update Failed',

        text: '<?= addslashes($updateError); ?>',

        confirmButtonColor: '#dc3545'

    });
    </script>

    <?php } ?>
</body>

</html>