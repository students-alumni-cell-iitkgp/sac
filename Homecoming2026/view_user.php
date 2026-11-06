<?php

session_start();

include 'config.php'; // DB connection


/* =========================================================
   ADMIN AUTHENTICATION
========================================================= */

if (!isset($_SESSION['admin_logged_in'])) {

    header("Location: admin_login.php");
    exit;

}


/* =========================================================
   GET USER ID
========================================================= */

$id = isset($_GET['id'])
    ? (int) $_GET['id']
    : 0;


if ($id <= 0) {

    header("Location: admin.php");
    exit;

}


/* =========================================================
   FETCH USER
========================================================= */

$stmt = $connection->prepare(
    "SELECT * FROM aam WHERE id = ?"
);

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

$stmt->close();


/* =========================================================
   USER NOT FOUND
========================================================= */

if (!$user) {

    die("User not found.");

}

 $transaction = $connection->prepare(
            "SELECT id,transaction_id,razorpay_payment_id
             FROM transactions
             WHERE user_id = ? 
             LIMIT 1"
        );

        $transaction->bind_param(
            "s",
            $user['id']
        );
       
$transaction->execute();
$transactionCheck = $transaction->get_result();

$getTransaction = $transactionCheck->fetch_assoc();

$transaction->close();



/* =========================================================
   PAYMENT VARIABLES
========================================================= */

$payment_updated = false;

$error_message = '';



/* =========================================================
   PAYMENT UPDATE
========================================================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    /* -----------------------------------------------------
       GET POST VALUES
    ----------------------------------------------------- */

    $new_status =
        trim($_POST['payment_status'] ?? '');

    $txn_id =
        trim($_POST['transaction_id'] ?? '');


    /* -----------------------------------------------------
       VALIDATION
    ----------------------------------------------------- */

    if ($new_status === '') {

        $error_message =
            "Please select a payment status.";

    }

    elseif ($txn_id === '') {

        $error_message =
            "Please enter the transaction ID.";

    }

    else {


        /* =================================================
           CHECK DUPLICATE TRANSACTION ID
        ================================================= */

        $check = $connection->prepare(
            "SELECT id
             FROM transactions
             WHERE transaction_id = ?
             LIMIT 1"
        );

        $check->bind_param(
            "s",
            $txn_id
        );

        $check->execute();

        $check->store_result();


        /* -------------------------------------------------
           DUPLICATE FOUND
        ------------------------------------------------- */

        if ($check->num_rows > 0) {

                      /* =================================================
               UPDATE PAYMENT STATUS IN AAM
               
               IMPORTANT:
               transaction_id IS NOT UPDATED HERE.
               
               Your AAM table does not contain transaction_id.
            ================================================= */

            $update = $connection->prepare(
                "UPDATE aam
                 SET payment = ?
                 WHERE id = ?"
            );


            if (!$update) {

                $error_message =
                    "Unable to prepare payment update.";

            }

            else {


                $update->bind_param(
                    "si",
                    $new_status,
                    $id
                );


                if ($update->execute()) {


                    /* =========================================
                       INSERT TRANSACTION INTO TRANSACTIONS TABLE
                    ========================================= */

                    // $insert = $connection->prepare(
                    //     "INSERT INTO transactions
                    //     (
                    //         user_email,
                    //         user_name,
                    //         mobile,
                    //         payment_status,
                    //         transaction_id
                    //     )
                    //     VALUES (?, ?, ?, ?, ?)"
                    // );
                    
                $updateTransection = $connection->prepare(
                    "UPDATE transactions
                    SET payment_status = ?
                    WHERE transaction_id = ?"
                );

                if (!$updateTransection) {

                    $error_message =
                        "Payment updated, but transaction could not be recorded.";

                }

                    else {


                        // $insert->bind_param(
                        //     "sssss",
                        //     $user['email'],
                        //     $user['name'],
                        //     $user['mobile'],
                        //     $new_status,
                        //     $txn_id
                        // );
                        $updateTransection->bind_param(
                            "ss",
                            $new_status,
                            $txn_id
                        );


                        if ($updateTransection->execute()) {

                            $payment_updated = true;

                            /* Update current UI data */
                            $user['payment'] =
                                $new_status;

                        }

                        else {

                            $error_message =
                                "Payment status updated, but transaction insertion failed.";

                        }


                        $updateTransection->close();

                    }

                }

                else {

                    $error_message =
                        "Unable to update payment.";

                }


                $update->close();

            }

        }


        $check->close();

    }


    /* =====================================================
       REFRESH USER DATA AFTER UPDATE
    ===================================================== */

    if ($payment_updated) {

        $stmt = $connection->prepare(
            "SELECT * FROM aam WHERE id = ?"
        );

        $stmt->bind_param(
            "i",
            $id
        );

        $stmt->execute();

        $result =
            $stmt->get_result();

        $user =
            $result->fetch_assoc();

        $stmt->close();

    }

}


/* =========================================================
   SAFE DISPLAY HELPERS
========================================================= */

function e($value)
{
    return htmlspecialchars(
        $value ?? '',
        ENT_QUOTES,
        'UTF-8'
    );
}


function valueOrDash($value)
{
    return !empty($value)
        ? e($value)
        : '—';
}


/* =========================================================
   PAYMENT STATUS
========================================================= */

$isPaid =
    ($user['payment'] ?? '') === 'PAID(Verified)';


$paymentClass =
    $isPaid
        ? 'status-paid'
        : 'status-pending';


$paymentIcon =
    $isPaid
        ? 'fa-circle-check'
        : 'fa-clock';


/* =========================================================
   PROFILE INITIAL
========================================================= */

$name =
    trim($user['name'] ?? '');

$initial = 'A';


if ($name !== '') {

    $initial =
        strtoupper(
            substr($name, 0, 1)
        );

}

?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= e($user['name']); ?> | Alumni Profile
    </title>


    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Google Font -->

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">


    <style>
    /* =========================================================
   ROOT
========================================================= */

    :root {

        --primary: #7b1113;

        --primary-dark: #4d0809;

        --primary-light: #a91d21;

        --gold: #d4a017;

        --gold-light: #f4d77a;

        --navy: #0f172a;

        --text: #172033;

        --muted: #64748b;

        --border: #e2e8f0;

        --white: #ffffff;

        --bg: #f5f7fb;

        --green: #15803d;

        --orange: #d97706;

        --shadow:
            0 20px 50px rgba(15, 23, 42, .10);

        --shadow-hover:
            0 25px 65px rgba(15, 23, 42, .16);

    }


    /* =========================================================
   GLOBAL
========================================================= */

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {

        margin: 0;

        background:
            radial-gradient(circle at 10% 10%,
                rgba(123, 17, 19, .08),
                transparent 30%),
            radial-gradient(circle at 90% 20%,
                rgba(212, 160, 23, .10),
                transparent 30%),
            var(--bg);

        color: var(--text);

        font-family:
            'Inter',
            'Segoe UI',
            sans-serif;

        font-size: 16px;

        line-height: 1.65;

    }


    /* =========================================================
   BACKGROUND DECORATION
========================================================= */

    body::before {

        content: "";

        position: fixed;

        width: 500px;

        height: 500px;

        top: -200px;

        right: -200px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(123, 17, 19, .12),
                transparent 70%);

        pointer-events: none;

        z-index: -1;
    }

    body::after {

        content: "";

        position: fixed;

        width: 400px;

        height: 400px;

        bottom: -180px;

        left: -180px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(212, 160, 23, .10),
                transparent 70%);

        pointer-events: none;

        z-index: -1;
    }


    /* =========================================================
   MAIN WRAPPER
========================================================= */

    .page-wrapper {

        width: 100%;

        max-width: 1450px;

        margin: auto;

        padding:
            35px 25px 70px;

    }


    /* =========================================================
   TOP NAVIGATION
========================================================= */

    .top-navigation {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;

    }

    .page-breadcrumb {

        display: flex;

        align-items: center;

        gap: 10px;

        color: var(--muted);

        font-size: 15px;

        font-weight: 600;

    }

    .page-breadcrumb i {

        color: var(--gold);

    }

    .top-actions {

        display: flex;

        gap: 10px;

        flex-wrap: wrap;

    }

    .action-btn {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 9px;

        min-height: 46px;

        padding:
            10px 18px;

        border-radius: 12px;

        text-decoration: none;

        font-size: 15px;

        font-weight: 700;

        transition: .3s;

        border: 1px solid var(--border);

        background: #fff;

        color: var(--navy);

        box-shadow:
            0 5px 15px rgba(15, 23, 42, .05);

    }

    .action-btn:hover {

        transform: translateY(-3px);

        color: var(--primary);

        box-shadow:
            0 10px 25px rgba(15, 23, 42, .10);

    }

    .action-btn.primary {

        color: #fff;

        border-color: transparent;

        background:
            linear-gradient(135deg,
                var(--primary),
                var(--primary-light));

    }

    .action-btn.primary:hover {

        color: #fff;

    }


    /* =========================================================
   PROFILE HERO
========================================================= */

    .profile-hero {

        position: relative;

        overflow: hidden;

        border-radius: 28px;

        padding: 42px;

        margin-bottom: 30px;

        color: #fff;

        background:
            linear-gradient(120deg,
                #470708 0%,
                #7b1113 45%,
                #9f181b 100%);

        box-shadow:
            0 25px 65px rgba(78, 8, 10, .25);

    }

    .profile-hero::before {

        content: "";

        position: absolute;

        width: 420px;

        height: 420px;

        right: -160px;

        top: -200px;

        border-radius: 50%;

        border:
            70px solid rgba(255, 255, 255, .05);

    }

    .profile-hero::after {

        content: "";

        position: absolute;

        width: 260px;

        height: 260px;

        left: 45%;

        bottom: -180px;

        border-radius: 50%;

        background:
            rgba(212, 160, 23, .12);

    }

    .profile-content {

        position: relative;

        z-index: 2;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 35px;

    }

    .profile-main {

        display: flex;

        align-items: center;

        gap: 25px;

    }

    .profile-avatar {

        width: 115px;

        height: 115px;

        min-width: 115px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 28px;

        background:
            linear-gradient(135deg,
                var(--gold),
                var(--gold-light));

        color: var(--primary-dark);

        font-size: 46px;

        font-weight: 800;

        box-shadow:
            0 15px 35px rgba(0, 0, 0, .22);

        border:
            5px solid rgba(255, 255, 255, .35);

    }

    .profile-info h1 {

        margin: 0 0 6px;

        color: #fff;

        font-family:
            'Playfair Display',
            serif;

        font-size: 38px;

        line-height: 1.2;

        font-weight: 700;

    }

    .profile-info .subtitle {

        font-size: 18px;

        color:
            rgba(255, 255, 255, .90);

        font-weight: 600;

    }

    .profile-meta {

        margin-top: 13px;

        display: flex;

        flex-wrap: wrap;

        gap: 9px;

    }

    .profile-tag {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding:
            7px 12px;

        border-radius: 50px;

        background:
            rgba(255, 255, 255, .12);

        border:
            1px solid rgba(255, 255, 255, .16);

        color: #fff;

        font-size: 14px;

        font-weight: 600;

    }

    .profile-tag i {

        color: var(--gold-light);

    }


    /* =========================================================
   PAYMENT HERO STATUS
========================================================= */

    .hero-payment {

        min-width: 235px;

        padding: 23px;

        border-radius: 20px;

        background:
            rgba(255, 255, 255, .11);

        border:
            1px solid rgba(255, 255, 255, .18);

        backdrop-filter: blur(15px);

        text-align: center;

    }

    .hero-payment-label {

        font-size: 13px;

        text-transform: uppercase;

        letter-spacing: 1.4px;

        color:
            rgba(255, 255, 255, .75);

        font-weight: 700;

        margin-bottom: 8px;

    }

    .hero-payment-status {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        padding:
            10px 17px;

        border-radius: 50px;

        font-size: 16px;

        font-weight: 800;

    }

    .hero-payment-status.paid {

        background:
            rgba(34, 197, 94, .20);

        color:
            #bbf7d0;

    }

    .hero-payment-status.pending {

        background:
            rgba(245, 158, 11, .20);

        color:
            #fde68a;

    }


    /* =========================================================
   QUICK STATS
========================================================= */

    .quick-stats {

        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 18px;

        margin-bottom: 30px;

    }

    .quick-stat {

        position: relative;

        overflow: hidden;

        background: #fff;

        border:
            1px solid rgba(226, 232, 240, .9);

        border-radius: 20px;

        padding: 22px;

        box-shadow: var(--shadow);

        transition: .3s;

    }

    .quick-stat:hover {

        transform: translateY(-5px);

        box-shadow: var(--shadow-hover);

    }

    .quick-stat-icon {

        width: 50px;

        height: 50px;

        border-radius: 14px;

        display: flex;

        align-items: center;

        justify-content: center;

        margin-bottom: 14px;

        font-size: 21px;

        color: #fff;

        background:
            linear-gradient(135deg,
                var(--primary),
                var(--primary-light));

    }

    .quick-stat:nth-child(2) .quick-stat-icon {

        background:
            linear-gradient(135deg,
                #b7791f,
                #d4a017);

    }

    .quick-stat:nth-child(3) .quick-stat-icon {

        background:
            linear-gradient(135deg,
                #2563eb,
                #1d4ed8);

    }

    .quick-stat:nth-child(4) .quick-stat-icon {

        background:
            linear-gradient(135deg,
                #059669,
                #047857);

    }

    .quick-stat-label {

        color: var(--muted);

        font-size: 13px;

        text-transform: uppercase;

        letter-spacing: 1px;

        font-weight: 700;

        margin-bottom: 3px;

    }

    .quick-stat-value {

        color: var(--navy);

        font-size: 22px;

        line-height: 1.3;

        font-weight: 800;

    }


    /* =========================================================
   SECTION CARD
========================================================= */

    .section-card {

        background: #fff;

        border:
            1px solid rgba(226, 232, 240, .95);

        border-radius: 24px;

        padding: 30px;

        margin-bottom: 25px;

        box-shadow: var(--shadow);

        transition: .3s;

    }

    .section-card:hover {

        box-shadow: var(--shadow-hover);

    }

    .section-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;

        padding-bottom: 18px;

        border-bottom:
            1px solid var(--border);

    }

    .section-heading {

        display: flex;

        align-items: center;

        gap: 15px;

    }

    .section-icon {

        width: 53px;

        height: 53px;

        min-width: 53px;

        border-radius: 15px;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #fff;

        font-size: 21px;

        background:
            linear-gradient(135deg,
                var(--primary),
                var(--primary-light));

        box-shadow:
            0 8px 20px rgba(123, 17, 19, .20);

    }

    .section-heading h2 {

        margin: 0;

        color: var(--navy);

        font-size: 23px;

        font-weight: 800;

    }

    .section-heading p {

        margin: 2px 0 0;

        color: var(--muted);

        font-size: 14px;

    }


    /* =========================================================
   INFORMATION ITEM
========================================================= */

    .info-grid {

        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 17px;

    }

    .info-item {

        padding: 18px;

        border:
            1px solid #edf1f5;

        border-radius: 16px;

        background:
            linear-gradient(145deg,
                #ffffff,
                #f8fafc);

        transition: .25s;

    }

    .info-item:hover {

        border-color:
            rgba(123, 17, 19, .25);

        transform: translateY(-2px);

    }

    .info-label {

        display: flex;

        align-items: center;

        gap: 8px;

        margin-bottom: 7px;

        color: var(--muted);

        font-size: 13px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .7px;

    }

    .info-label i {

        color: var(--primary);

        font-size: 14px;

    }

    .info-value {

        color: var(--navy);

        font-size: 17px;

        font-weight: 700;

        word-break: break-word;

    }


    /* =========================================================
   PAYMENT STATUS BADGE
========================================================= */

    .payment-badge {

        display: inline-flex;

        align-items: center;

        gap: 8px;

        padding:
            9px 15px;

        border-radius: 50px;

        font-size: 15px;

        font-weight: 800;

    }

    .payment-badge.paid {

        background: #dcfce7;

        color: #166534;

    }

    .payment-badge.pending {

        background: #fef3c7;

        color: #92400e;

    }


    /* =========================================================
   FORM ELEMENTS
========================================================= */

    .form-label {

        color: var(--navy);

        font-size: 15px;

        font-weight: 800;

        margin-bottom: 8px;

    }

    .form-control,
    .form-select {

        min-height: 52px;

        border:
            1px solid #dbe2ea;

        border-radius: 13px;

        padding:
            11px 15px;

        font-size: 16px;

        color: var(--navy);

        font-weight: 600;

        box-shadow: none;

        transition: .25s;

    }

    .form-control:focus,
    .form-select:focus {

        border-color:
            var(--primary);

        box-shadow:
            0 0 0 4px rgba(123, 17, 19, .10);

    }


    /* =========================================================
   PREMIUM BUTTON
========================================================= */

    .btn-premium {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 9px;

        min-height: 52px;

        padding:
            12px 25px;

        border: none;

        border-radius: 14px;

        background:
            linear-gradient(135deg,
                var(--primary),
                var(--primary-light));

        color: #fff;

        font-size: 16px;

        font-weight: 800;

        text-decoration: none;

        box-shadow:
            0 10px 25px rgba(123, 17, 19, .25);

        transition: .3s;

    }

    .btn-premium:hover {

        color: #fff;

        transform: translateY(-3px);

        box-shadow:
            0 15px 30px rgba(123, 17, 19, .32);

    }

    .btn-gold {

        background:
            linear-gradient(135deg,
                #b7791f,
                #d4a017);

        box-shadow:
            0 10px 25px rgba(180, 120, 20, .22);

    }


    /* =========================================================
   RESPONSIVE
========================================================= */

    @media(max-width:1100px) {

        .profile-content {

            align-items: flex-start;

            flex-direction: column;

        }

        .hero-payment {

            width: 100%;

            text-align: left;

        }

        .quick-stats {

            grid-template-columns:
                repeat(2, 1fr);

        }

    }


    @media(max-width:768px) {

        .page-wrapper {

            padding:
                20px 14px 50px;

        }

        .top-navigation {

            align-items: stretch;

            flex-direction: column;

        }

        .top-actions {

            width: 100%;

        }

        .action-btn {

            flex: 1;

        }

        .profile-hero {

            padding: 27px 22px;

            border-radius: 22px;

        }

        .profile-main {

            align-items: flex-start;

            flex-direction: column;

        }

        .profile-avatar {

            width: 90px;

            height: 90px;

            min-width: 90px;

            font-size: 35px;

        }

        .profile-info h1 {

            font-size: 30px;

        }

        .profile-info .subtitle {

            font-size: 16px;

        }

        .quick-stats {

            grid-template-columns: 1fr;

        }

        .section-card {

            padding: 21px 17px;

            border-radius: 20px;

        }

        .info-grid {

            grid-template-columns: 1fr;

        }

    }


    @media(max-width:480px) {

        body {

            font-size: 15px;

        }

        .profile-info h1 {

            font-size: 26px;

        }

        .profile-meta {

            flex-direction: column;

            align-items: flex-start;

        }

        .profile-tag {

            font-size: 13px;

        }

        .section-heading h2 {

            font-size: 20px;

        }

        .info-value {

            font-size: 16px;

        }

        .top-actions {

            flex-direction: column;

        }

        .action-btn {

            width: 100%;

        }

    }

    /* =========================================================
   PART 3 RESPONSIVE COMPONENTS
========================================================= */

    @media(max-width:768px) {

        .academic-timeline {
            grid-template-columns: 1fr !important;
        }

        .travel-timeline {
            grid-template-columns: 1fr !important;
        }

        .travel-timeline>div:nth-child(2) {
            transform: rotate(90deg);
            margin: auto;
        }

    }

    @media(max-width:480px) {

        .academic-timeline>div,
        .travel-timeline>div {
            width: 100%;
        }

    }

    @media print {

        body::before {

            display: none !important;

        }


        .section-card,
        .payment-status-card,
        .payment-info-card {

            box-shadow: none !important;

        }


        .payment-update-box,
        .final-action-card,
        .payment-submit-area {

            display: none !important;

        }


        .section-card {

            break-inside: avoid;

        }

    }

    /* =========================================================
   ADMIN PAYMENT UPDATE
========================================================= */

    .payment-admin-card {
        position: relative;
        overflow: hidden;
    }


    /* ADMIN BADGE */

    .admin-edit-badge {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 9px 14px;

        border-radius: 50px;

        background: #fef2f2;

        color: #991b1b;

        border: 1px solid #fecaca;

        font-size: 12px;

        font-weight: 900;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    /* FORM */

    .premium-payment-admin-form {

        margin-top: 5px;
    }


    /* STATUS PREVIEW */

    .payment-admin-preview {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-top: 24px;

        padding: 19px 20px;

        border-radius: 17px;

        background:
            linear-gradient(135deg,
                #fafafa,
                #ffffff);

        border: 1px solid #e5e7eb;
    }


    .preview-left {

        display: flex;

        align-items: center;

        gap: 13px;
    }


    .preview-icon {

        width: 45px;

        height: 45px;

        border-radius: 13px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #fef2f2;

        color: #991b1b;

        font-size: 18px;
    }


    .preview-label {

        display: block;

        color: #64748b;

        font-size: 11px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .7px;
    }


    .preview-left strong {

        display: block;

        margin-top: 3px;

        color: #166534;

        font-size: 16px;

        font-weight: 900;
    }


    .preview-transaction {

        text-align: right;
    }


    .preview-transaction span {

        display: block;

        color: #64748b;

        font-size: 11px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .6px;
    }


    .preview-transaction strong {

        display: block;

        margin-top: 4px;

        color: #334155;

        font-size: 14px;

        font-weight: 800;

        word-break: break-all;
    }


    /* NOTICE */

    .admin-payment-notice {

        display: flex;

        align-items: flex-start;

        gap: 13px;

        margin-top: 20px;

        padding: 16px 18px;

        border-radius: 15px;

        background: #fffbeb;

        border: 1px solid #fde68a;
    }


    .notice-icon {

        color: #d97706;

        font-size: 19px;

    }


    .admin-payment-notice strong {

        display: block;

        color: #92400e;

        font-size: 14px;

        font-weight: 900;
    }


    .admin-payment-notice p {

        margin: 3px 0 0;

        color: #78350f;

        font-size: 13px;

        line-height: 1.6;
    }


    /* SUBMIT AREA */

    .payment-admin-submit {

        display: flex;

        justify-content: flex-end;

        margin-top: 22px;
    }


    .premium-admin-payment-btn {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 30px;

        min-width: 240px;

        padding: 14px 17px 14px 20px;

        border: 0;

        border-radius: 14px;

        background:
            linear-gradient(135deg,
                #7a0f10,
                #a6191b);

        color: #fff;

        font-size: 14px;

        font-weight: 900;

        cursor: pointer;

        box-shadow:
            0 10px 25px rgba(122, 15, 16, .22);

        transition: .25s ease;
    }


    .premium-admin-payment-btn span {

        display: flex;

        align-items: center;

        gap: 9px;
    }


    .premium-admin-payment-btn>i {

        width: 32px;

        height: 32px;

        border-radius: 9px;

        display: flex;

        align-items: center;

        justify-content: center;

        background:
            rgba(255, 255, 255, .15);
    }


    .premium-admin-payment-btn:hover {

        transform: translateY(-2px);

        box-shadow:
            0 15px 30px rgba(122, 15, 16, .30);
    }


    .premium-admin-payment-btn:active {

        transform: translateY(0);
    }


    /* MOBILE */

    @media(max-width:700px) {

        .admin-edit-badge {

            display: none;
        }


        .payment-admin-preview {

            flex-direction: column;

            align-items: flex-start;
        }


        .preview-transaction {

            width: 100%;

            text-align: left;

            padding-top: 12px;

            border-top: 1px solid #e5e7eb;
        }


        .payment-admin-submit {

            display: block;
        }


        .premium-admin-payment-btn {

            width: 100%;

            min-width: 0;
        }

    }
    </style>

</head>

<body>


    <div class="page-wrapper">


        <!-- =====================================================
         TOP NAVIGATION
    ====================================================== -->

        <div class="top-navigation">

            <div class="page-breadcrumb">

                <i class="fa-solid fa-house"></i>

                <span>Admin</span>

                <i class="fa-solid fa-chevron-right"></i>

                <span>Alumni Profile</span>

            </div>


            <div class="top-actions">

                <a href="admin.php" class="action-btn">

                    <i class="fa-solid fa-arrow-left"></i>

                    Back to Dashboard

                </a>


                <a href="logout_admin.php" class="action-btn">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    Logout

                </a>

            </div>

        </div>



        <!-- =====================================================
         PREMIUM PROFILE HERO
    ====================================================== -->

        <section class="profile-hero">

            <div class="profile-content">


                <div class="profile-main">

                    <div class="profile-avatar">

                        <?php if ($initial): ?>

                        <?= e($initial); ?>

                        <?php else: ?>

                        <i class="fa-solid fa-user-graduate"></i>

                        <?php endif; ?>

                    </div>


                    <div class="profile-info">

                        <h1>
                            <?= e($user['name']); ?>
                        </h1>


                        <div class="subtitle">

                            Homecoming 2026

                        </div>


                        <div class="profile-meta">

                            <span class="profile-tag">

                                <i class="fa-solid fa-graduation-cap"></i>

                                <?= valueOrDash($user['degree']); ?>

                            </span>


                            <span class="profile-tag">

                                <i class="fa-solid fa-building-columns"></i>

                                <?= valueOrDash($user['dept']); ?>

                            </span>


                            <span class="profile-tag">

                                <i class="fa-solid fa-calendar-days"></i>

                                Batch <?= valueOrDash($user['yog']); ?>

                            </span>

                        </div>

                    </div>

                </div>



                <!-- PAYMENT -->

                <div class="hero-payment">

                    <div class="hero-payment-label">

                        Registration Payment

                    </div>


                    <div class="hero-payment-status
                    <?= $isPaid ? 'paid' : 'pending'; ?>">

                        <i class="fa-solid <?= $paymentIcon; ?>"></i>

                        <?= e($user['payment']); ?>

                    </div>

                </div>


            </div>

        </section>



        <!-- =====================================================
         QUICK STATS
    ====================================================== -->

        <div class="quick-stats">


            <div class="quick-stat">

                <div class="quick-stat-icon">

                    <i class="fa-solid fa-graduation-cap"></i>

                </div>

                <div class="quick-stat-label">

                    Graduation Year

                </div>

                <div class="quick-stat-value">

                    <?= valueOrDash($user['yog']); ?>

                </div>

            </div>


            <div class="quick-stat">

                <div class="quick-stat-icon">

                    <i class="fa-solid fa-building-columns"></i>

                </div>

                <div class="quick-stat-label">

                    Hall

                </div>

                <div class="quick-stat-value">

                    <?= valueOrDash($user['hall']); ?>

                </div>

            </div>


            <div class="quick-stat">

                <div class="quick-stat-icon">

                    <i class="fa-solid fa-building"></i>

                </div>

                <div class="quick-stat-label">

                    Department

                </div>

                <div class="quick-stat-value">

                    <?= valueOrDash($user['dept']); ?>

                </div>

            </div>


            <div class="quick-stat">

                <div class="quick-stat-icon">

                    <i class="fa-solid fa-indian-rupee-sign"></i>

                </div>

                <div class="quick-stat-label">

                    Registration Fee

                </div>

                <div class="quick-stat-value">

                    ₹ <?= number_format((float)($user['cost'] ?? 0), 2); ?>

                </div>

            </div>


        </div>
        <!-- =====================================================
         PERSONAL DETAILS + ACCOMMODATION
    ====================================================== -->

        <div class="row g-4">


            <!-- =================================================
             PERSONAL DETAILS
        ================================================== -->

            <div class="col-xl-7">

                <section class="section-card h-100">

                    <div class="section-header">

                        <div class="section-heading">

                            <div class="section-icon">

                                <i class="fa-solid fa-user"></i>

                            </div>

                            <div>

                                <h2>Personal Details</h2>

                                <p>
                                    Registered personal and contact information
                                </p>

                            </div>

                        </div>

                        <span class="profile-tag" style="
                            background:#fef2f2;
                            color:#7b1113;
                            border-color:#fecaca;
                          ">

                            <i class="fa-solid fa-id-card"></i>

                            Profile

                        </span>

                    </div>


                    <div class="info-grid">


                        <!-- PHASE -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-layer-group"></i>

                                Phase

                            </div>

                            <div class="info-value">

                                <!-- <?= valueOrDash($user['phase']); ?> -->
                                <?= match (valueOrDash($user['phase']) ?? null) {
    'ph1' => 'Phase One',
    'ph2' => 'Phase Two',
    default => $row['phase'] ?? 'Not Available',
} ?>

                            </div>

                        </div>
                        <!-- NAME -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-user"></i>

                                Full Name

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['name']); ?>

                            </div>

                        </div>


                        <!-- EMAIL -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-envelope"></i>

                                Email Address

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['email']); ?>

                            </div>

                        </div>


                        <!-- MOBILE -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-phone"></i>

                                Mobile Number

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['mobile']); ?>

                            </div>

                        </div>


                        <!-- DOB -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-calendar-days"></i>

                                Date of Birth

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['dob']); ?>

                            </div>

                        </div>


                        <!-- ID TYPE -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-address-card"></i>

                                ID Type

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['idtype']); ?>

                            </div>

                        </div>


                        <!-- ID NUMBER -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-fingerprint"></i>

                                ID Number

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['idnumber']); ?>

                            </div>

                        </div>


                        <!-- SOCIAL LINKS -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-share-nodes"></i>

                                Social Links

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['social_links']); ?>

                            </div>

                        </div>


                        <!-- ADDRESS -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-location-dot"></i>

                                Address

                            </div>

                            <div class="info-value">

                                <?php

                            $addressParts = array_filter([

                                $user['address'] ?? '',

                                $user['city'] ?? '',

                                $user['state'] ?? '',

                                $user['country'] ?? '',

                                $user['zipcode'] ?? ''

                            ]);

                            echo !empty($addressParts)
                                ? e(implode(', ', $addressParts))
                                : '—';

                            ?>

                            </div>

                        </div>


                    </div>

                </section>

            </div>



            <!-- =================================================
             ACCOMPANYING + FOOD
        ================================================== -->

            <div class="col-xl-5">

                <section class="section-card h-100">


                    <div class="section-header">

                        <div class="section-heading">

                            <div class="section-icon">

                                <i class="fa-solid fa-utensils"></i>

                            </div>

                            <div>

                                <h2>Accommodation & Food</h2>

                                <p>
                                    Accompanying person and food preferences
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="info-grid">


                        <!-- RELATION -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-people-arrows"></i>

                                Relation

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['acc_relation']); ?>

                            </div>

                        </div>


                        <!-- PERSON -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-user-plus"></i>

                                Accompanying Person

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['acc_name']); ?>

                            </div>

                        </div>


                        <!-- FOOD -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-bowl-food"></i>

                                Food Preference

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['foodPreference']); ?>

                            </div>

                        </div>


                        <!-- HEALTH -->

                        <div class="info-item">

                            <div class="info-label">

                                <i class="fa-solid fa-heart-pulse"></i>

                                Health Restrictions

                            </div>

                            <div class="info-value">

                                <?= valueOrDash($user['medical']); ?>

                            </div>

                        </div>


                    </div>


                    <!-- =================================================
                     REGISTRATION FEE
                ================================================== -->

                    <div style="
                        margin-top:20px;
                        padding:20px;
                        border-radius:18px;
                        background:
                            linear-gradient(
                                135deg,
                                #fff8e7,
                                #fffdf6
                            );
                        border:1px solid #f3df9c;
                    ">

                        <div style="
                            display:flex;
                            justify-content:space-between;
                            align-items:center;
                            gap:15px;
                            flex-wrap:wrap;
                        ">

                            <div>

                                <div style="
                                    color:#92721c;
                                    font-size:13px;
                                    font-weight:800;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                ">

                                    Registration Fee

                                </div>

                                <div style="
                                    color:#4d0809;
                                    font-size:28px;
                                    font-weight:900;
                                    margin-top:2px;
                                ">

                                    ₹ <?= number_format(
                                    (float)($user['cost'] ?? 0),
                                    2
                                ); ?>

                                </div>

                            </div>


                            <div>

                                <?php if ($isPaid): ?>

                                <span class="payment-badge paid">

                                    <i class="fa-solid fa-circle-check"></i>

                                    Payment Verified

                                </span>

                                <?php else: ?>

                                <span class="payment-badge pending">

                                    <i class="fa-solid fa-clock"></i>

                                    Payment Pending

                                </span>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>


                </section>

            </div>


        </div>
        <!-- =====================================================
         WORK DETAILS
    ====================================================== -->

        <section class="section-card mt-4">

            <div class="section-header">

                <div class="section-heading">

                    <div class="section-icon" style="
                        background:
                        linear-gradient(
                            135deg,
                            #2563eb,
                            #1d4ed8
                        );
                    ">

                        <i class="fa-solid fa-briefcase"></i>

                    </div>

                    <div>

                        <h2>Work Details</h2>

                        <p>
                            Professional and current employment information
                        </p>

                    </div>

                </div>

            </div>


            <div class="info-grid">


                <!-- PROFESSION -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-user-tie"></i>

                        Profession

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['profession']); ?>

                    </div>

                </div>


                <!-- ORGANISATION -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-building"></i>

                        Organisation

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['organisation']); ?>

                    </div>

                </div>


                <!-- DESIGNATION -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-id-badge"></i>

                        Designation

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['designation']); ?>

                    </div>

                </div>


                <!-- WORK ADDRESS -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-location-dot"></i>

                        Work Address

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['waddress']); ?>

                    </div>

                </div>


                <!-- CITY -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-city"></i>

                        City

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['wcity']); ?>

                    </div>

                </div>


                <!-- STATE -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-map"></i>

                        State

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['wstate']); ?>

                    </div>

                </div>


                <!-- COUNTRY -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-globe"></i>

                        Country

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['wcountry']); ?>

                    </div>

                </div>


                <!-- ZIPCODE -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-envelopes-bulk"></i>

                        Zipcode

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['wzipcode']); ?>

                    </div>

                </div>


            </div>

        </section>
        <!-- =====================================================
         ACADEMIC DETAILS
    ====================================================== -->

        <section class="section-card">

            <div class="section-header">

                <div class="section-heading">

                    <div class="section-icon" style="
                        background:
                        linear-gradient(
                            135deg,
                            #7c3aed,
                            #5b21b6
                        );
                    ">

                        <i class="fa-solid fa-graduation-cap"></i>

                    </div>

                    <div>

                        <h2>Academic Details</h2>

                        <p>
                            Academic journey and IIT Kharagpur information
                        </p>

                    </div>

                </div>


                <span style="
                    display:inline-flex;
                    align-items:center;
                    gap:7px;
                    padding:8px 13px;
                    border-radius:50px;
                    background:#f5f3ff;
                    color:#6d28d9;
                    border:1px solid #ddd6fe;
                    font-size:13px;
                    font-weight:800;
                ">

                    <i class="fa-solid fa-school"></i>

                    IIT Kharagpur

                </span>

            </div>


            <div class="info-grid">


                <!-- POSITION HELD -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-medal"></i>

                        Position Held in KGP

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['positionHolding']); ?>

                    </div>

                </div>


                <!-- COURSE -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-book-open"></i>

                        Course

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['course']); ?>

                    </div>

                </div>


                <!-- DEGREE -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-graduation-cap"></i>

                        Degree

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['degree']); ?>

                    </div>

                </div>


                <!-- DEPARTMENT -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-building-columns"></i>

                        Department

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['dept']); ?>

                    </div>

                </div>


                <!-- HALL -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-house"></i>

                        Hall of Residence

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['hall']); ?>

                    </div>

                </div>
                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-globe"></i>
                        Nearest alumni chapter

                    </div>

                    <div class="info-value">

                        <?= htmlspecialchars($user['nearest_alumni_chapter']); ?>

                    </div>

                </div>
                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-handshake"></i>

                        Chapter name or interested in associating with one

                    </div>

                    <div class="info-value">

                        <?= htmlspecialchars($user['chapter_name_interested_associating_with']); ?>

                    </div>

                </div>


                <!-- JOINING YEAR -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-calendar-plus"></i>

                        Year of Joining

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['yoj']); ?>

                    </div>

                </div>


                <!-- GRADUATION YEAR -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-calendar-check"></i>

                        Year of Graduation

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['yog']); ?>

                    </div>

                </div>


                <!-- BATCH -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-users"></i>

                        Alumni Batch

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['yog']); ?>

                    </div>

                </div>


            </div>


            <!-- =================================================
             ACADEMIC TIMELINE
        ================================================== -->

            <div style="
                margin-top:25px;
                padding:22px;
                border-radius:18px;
                background:
                    linear-gradient(
                        135deg,
                        #faf5ff,
                        #ffffff
                    );
                border:1px solid #e9d5ff;
            ">

                <div style="
                    display:flex;
                    align-items:center;
                    gap:12px;
                    margin-bottom:18px;
                    color:#581c87;
                    font-size:16px;
                    font-weight:800;
                ">

                    <i class="fa-solid fa-timeline"></i>

                    Academic Journey

                </div>


                <div style="
                    display:grid;
                    grid-template-columns:
                        repeat(3, 1fr);
                    gap:15px;
                " class="academic-timeline">


                    <!-- JOINING -->

                    <div style="
                        padding:17px;
                        background:#fff;
                        border:1px solid #e9d5ff;
                        border-radius:15px;
                    ">

                        <div style="
                            font-size:12px;
                            text-transform:uppercase;
                            letter-spacing:.8px;
                            color:#7e22ce;
                            font-weight:800;
                        ">

                            Started

                        </div>

                        <div style="
                            font-size:24px;
                            color:#3b0764;
                            font-weight:900;
                            margin-top:3px;
                        ">

                            <?= valueOrDash($user['yoj']); ?>

                        </div>

                        <div style="
                            color:#64748b;
                            font-size:13px;
                            margin-top:2px;
                        ">

                            Year of Joining

                        </div>

                    </div>


                    <!-- DURATION -->

                    <div style="
                        padding:17px;
                        background:#fff;
                        border:1px solid #e9d5ff;
                        border-radius:15px;
                    ">

                        <div style="
                            font-size:12px;
                            text-transform:uppercase;
                            letter-spacing:.8px;
                            color:#7e22ce;
                            font-weight:800;
                        ">

                            Academic Period

                        </div>

                        <div style="
                            font-size:24px;
                            color:#3b0764;
                            font-weight:900;
                            margin-top:3px;
                        ">

                            <?php

                        $joinYear = (int)($user['yoj'] ?? 0);
                        $gradYear = (int)($user['yog'] ?? 0);

                        if ($joinYear > 0 && $gradYear > 0) {

                            $duration =
                                $gradYear - $joinYear;

                            echo $duration > 0
                                ? $duration . ' Years'
                                : '—';

                        } else {

                            echo '—';

                        }

                        ?>

                        </div>

                        <div style="
                            color:#64748b;
                            font-size:13px;
                            margin-top:2px;
                        ">

                            Academic Duration

                        </div>

                    </div>


                    <!-- GRADUATION -->

                    <div style="
                        padding:17px;
                        background:#fff;
                        border:1px solid #e9d5ff;
                        border-radius:15px;
                    ">

                        <div style="
                            font-size:12px;
                            text-transform:uppercase;
                            letter-spacing:.8px;
                            color:#7e22ce;
                            font-weight:800;
                        ">

                            Completed

                        </div>

                        <div style="
                            font-size:24px;
                            color:#3b0764;
                            font-weight:900;
                            margin-top:3px;
                        ">

                            <?= valueOrDash($user['yog']); ?>

                        </div>

                        <div style="
                            color:#64748b;
                            font-size:13px;
                            margin-top:2px;
                        ">

                            Year of Graduation

                        </div>

                    </div>


                </div>

            </div>

        </section>



        <!-- =====================================================
         TRAVEL DETAILS
    ====================================================== -->

        <section class="section-card">

            <div class="section-header">

                <div class="section-heading">

                    <div class="section-icon" style="
                        background:
                        linear-gradient(
                            135deg,
                            #0891b2,
                            #0e7490
                        );
                    ">

                        <i class="fa-solid fa-route"></i>

                    </div>

                    <div>

                        <h2>Travel Details</h2>

                        <p>
                            Arrival and departure information for the Alumni Meet
                        </p>

                    </div>

                </div>


                <span style="
                    display:inline-flex;
                    align-items:center;
                    gap:7px;
                    padding:8px 13px;
                    border-radius:50px;
                    background:#ecfeff;
                    color:#0e7490;
                    border:1px solid #a5f3fc;
                    font-size:13px;
                    font-weight:800;
                ">

                    <i class="fa-solid fa-location-dot"></i>

                    Kharagpur

                </span>

            </div>


            <div class="info-grid">


                <!-- ARRIVAL MODE -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-train"></i>

                        Mode of Arrival

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['arrivalMode']); ?>

                    </div>

                </div>

                <?php if ($user['mode_description']): ?>
                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-train"></i>

                        Mode of Arrival

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['mode_description']); ?>

                    </div>

                </div>
                <?php endif; ?>


                <!-- ARRIVAL DATE -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-calendar-day"></i>

                        Arrival Date

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['dateOfArr']); ?>

                    </div>

                </div>


                <!-- ARRIVAL TIME -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-clock"></i>

                        Arrival Time

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['timeOfArr']); ?>

                    </div>

                </div>


                <!-- DEPARTURE DATE -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-calendar-xmark"></i>

                        Departure Date

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['dateOfDep']); ?>

                    </div>

                </div>


                <!-- DEPARTURE TIME -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-clock-rotate-left"></i>

                        Departure Time

                    </div>

                    <div class="info-value">

                        <?= valueOrDash($user['timeOfDep']); ?>

                    </div>

                </div>


                <!-- TRAVEL DURATION -->

                <div class="info-item">

                    <div class="info-label">

                        <i class="fa-solid fa-hourglass-half"></i>

                        Stay / Travel Period

                    </div>

                    <div class="info-value">

                        <?php

                    $arrival =
                        !empty($user['dateOfArr'])
                            ? strtotime($user['dateOfArr'])
                            : false;

                    $departure =
                        !empty($user['dateOfDep'])
                            ? strtotime($user['dateOfDep'])
                            : false;

                    if (
                        $arrival !== false &&
                        $departure !== false &&
                        $departure >= $arrival
                    ) {

                        $days =
                            floor(
                                ($departure - $arrival)
                                / 86400
                            );

                        echo $days . ' Day'
                            . ($days != 1 ? 's' : '');

                    } else {

                        echo '—';

                    }

                    ?>

                    </div>

                </div>


            </div>


            <!-- =================================================
             ARRIVAL / DEPARTURE VISUAL TIMELINE
        ================================================== -->

            <div style="
                margin-top:25px;
                padding:22px;
                border-radius:18px;
                background:
                    linear-gradient(
                        135deg,
                        #ecfeff,
                        #ffffff
                    );
                border:1px solid #a5f3fc;
            ">

                <div style="
                    display:flex;
                    align-items:center;
                    gap:10px;
                    margin-bottom:18px;
                    color:#155e75;
                    font-size:16px;
                    font-weight:800;
                ">

                    <i class="fa-solid fa-map-location-dot"></i>

                    Travel Schedule

                </div>


                <div style="
                    display:grid;
                    grid-template-columns:
                        1fr auto 1fr;
                    align-items:center;
                    gap:15px;
                " class="travel-timeline">


                    <!-- ARRIVAL -->

                    <div style="
                        padding:18px;
                        background:#fff;
                        border-radius:16px;
                        border:1px solid #a5f3fc;
                    ">

                        <div style="
                            display:flex;
                            align-items:center;
                            gap:9px;
                            color:#0e7490;
                            font-size:13px;
                            text-transform:uppercase;
                            letter-spacing:.8px;
                            font-weight:800;
                        ">

                            <i class="fa-solid fa-plane-arrival"></i>

                            Arrival

                        </div>

                        <div style="
                            margin-top:7px;
                            color:#164e63;
                            font-size:19px;
                            font-weight:900;
                        ">

                            <?= valueOrDash($user['dateOfArr']); ?>

                        </div>

                        <div style="
                            color:#64748b;
                            font-size:14px;
                            font-weight:600;
                        ">

                            <?= valueOrDash($user['timeOfArr']); ?>

                        </div>

                    </div>


                    <!-- CONNECTOR -->

                    <div style="
                        width:48px;
                        height:48px;
                        border-radius:50%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        background:#0891b2;
                        color:#fff;
                        box-shadow:
                            0 8px 18px
                            rgba(8,145,178,.25);
                    ">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>


                    <!-- DEPARTURE -->

                    <div style="
                        padding:18px;
                        background:#fff;
                        border-radius:16px;
                        border:1px solid #a5f3fc;
                    ">

                        <div style="
                            display:flex;
                            align-items:center;
                            gap:9px;
                            color:#0e7490;
                            font-size:13px;
                            text-transform:uppercase;
                            letter-spacing:.8px;
                            font-weight:800;
                        ">

                            <i class="fa-solid fa-plane-departure"></i>

                            Departure

                        </div>

                        <div style="
                            margin-top:7px;
                            color:#164e63;
                            font-size:19px;
                            font-weight:900;
                        ">

                            <?= valueOrDash($user['dateOfDep']); ?>

                        </div>

                        <div style="
                            color:#64748b;
                            font-size:14px;
                            font-weight:600;
                        ">

                            <?= valueOrDash($user['timeOfDep']); ?>

                        </div>

                    </div>


                </div>

            </div>

        </section>
        <!-- =====================================================
     PAYMENT DETAILS
====================================================== -->

        <!-- =====================================================
     PAYMENT UPDATE FORM — ADMIN
====================================================== -->

        <div class="section-card payment-admin-card">

            <div class="section-header">

                <div class="section-heading">

                    <div class="section-icon" style="
                    background:
                    linear-gradient(
                        135deg,
                        #7a0f10,
                        #a6191b
                    );
                ">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>

                    <div>

                        <h2>Update Payment</h2>

                        <p>
                            Update payment status and transaction
                            information for this alumni registration.
                        </p>

                    </div>

                </div>

                <div class="admin-edit-badge">

                    <i class="fa-solid fa-user-shield"></i>

                    Admin Control

                </div>

            </div>


            <!-- FORM -->

            <form method="POST" id="adminPaymentForm" class="premium-payment-admin-form">

                <div class="row g-4">


                    <!-- PAYMENT STATUS -->

                    <div class="col-md-6">

                        <label for="payment_status" class="premium-label">

                            <i class="fa-solid fa-circle-check"></i>

                            Payment Status

                            <span>*</span>

                        </label>


                        <div class="premium-input-wrapper">

                            <i class="fa-solid fa-credit-card"></i>

                            <select name="payment_status" id="payment_status" class="premium-input" required>

                                <option value="PENDING" <?= $user['payment'] === 'PENDING'
                                ? 'selected'
                                : ''; ?>>
                                    Pending
                                </option>

                                <option value="PAID(Verified)" <?= $user['payment'] === 'PAID(Verified)'
                                ? 'selected'
                                : ''; ?>>
                                    Paid (Verified)
                                </option>

                            </select>

                        </div>

                        <small class="premium-help">

                            Select the current payment verification status.

                        </small>

                    </div>



                    <!-- TRANSACTION ID -->

                    <div class="col-md-6">

                        <label for="admin_transaction_id" class="premium-label">

                            <i class="fa-solid fa-receipt"></i>

                            Transaction ID

                            <span>*</span>

                        </label>


                        <div class="premium-input-wrapper">

                            <i class="fa-solid fa-hashtag"></i>

                            <input type="text" name="transaction_id" id="admin_transaction_id" class="premium-input"
                                placeholder="Enter transaction ID" value="<?= htmlspecialchars(
                            $getTransaction['transaction_id'] ?? ''
                        ); ?>" required>

                        </div>

                        <small class="premium-help">

                            Enter the transaction/reference number.

                        </small>

                    </div>

                </div>



                <!-- CURRENT STATUS PREVIEW -->

                <div class="payment-admin-preview">

                    <div class="preview-left">

                        <div class="preview-icon">

                            <i class="fa-solid fa-shield-halved"></i>

                        </div>

                        <div>

                            <span class="preview-label">
                                Current Payment Status
                            </span>

                            <strong id="paymentStatusPreview">

                                <?= match($user['payment']) {
                            'PAID(Verified)' => 'PAID (Verified)',
                            'SUCCESS'        => 'SUCCESS',
                            'FAILED'         => 'FAILED',
                            default          => 'PENDING'
                        }; ?>

                            </strong>

                        </div>

                    </div>


                    <div class="preview-transaction">

                        <span>
                            Payment ID
                        </span>

                        <strong>

                            <?= !empty($getTransaction['razorpay_payment_id'])
                        ? htmlspecialchars(
                            $getTransaction['razorpay_payment_id']
                        )
                        : 'Not Available'; ?>

                        </strong>

                    </div>

                </div>



                <!-- NOTICE -->

                <div class="admin-payment-notice">

                    <div class="notice-icon">

                        <i class="fa-solid fa-circle-info"></i>

                    </div>

                    <div>

                        <strong>
                            Payment Verification
                        </strong>

                        <p>
                            Please verify the transaction ID before
                            marking the registration as
                            <b>Paid (Verified)</b>.
                        </p>

                    </div>

                </div>



                <!-- BUTTON -->

                <div class="payment-admin-submit">

                    <button type="submit" class="premium-admin-payment-btn" id="adminPaymentSubmit">

                        <span>

                            <i class="fa-solid fa-floppy-disk"></i>

                            Update Payment

                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </div>

            </form>

        </div>



        <!-- =====================================================
     FINAL ACTION PANEL
====================================================== -->

        <section class="final-action-card">

            <div class="final-action-content">

                <div class="final-action-icon">

                    <i class="fa-solid fa-user-check"></i>

                </div>

                <div>

                    <h3>
                        Alumni Registration Profile
                    </h3>

                    <p>
                        Review the information above and use the available
                        actions to manage this registration.
                    </p>

                </div>

            </div>


            <div class="final-action-buttons">

                <a href="javascript:history.back()" class="action-btn secondary">

                    <i class="fa-solid fa-arrow-left"></i>

                    Back

                </a>


                <button type="button" class="action-btn print" onclick="window.print();">

                    <i class="fa-solid fa-print"></i>

                    Print Profile

                </button>

            </div>

        </section>



        <!-- =====================================================
     PREMIUM PAYMENT CSS
====================================================== -->

        <style>
        .payment-section {
            overflow: hidden;
        }


        /* PAYMENT STATUS */

        .payment-status-card {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 25px;

            padding: 25px;

            border-radius: 22px;

            margin-bottom: 22px;

            border: 1px solid;

        }

        .payment-success {

            background:
                linear-gradient(135deg,
                    #ecfdf5,
                    #f0fdf4);

            border-color: #a7f3d0;

        }

        .payment-pending {

            background:
                linear-gradient(135deg,
                    #fff7ed,
                    #fffbeb);

            border-color: #fed7aa;

        }


        .payment-status-left {

            display: flex;

            align-items: center;

            gap: 18px;

        }


        .payment-status-icon {

            width: 62px;

            height: 62px;

            min-width: 62px;

            border-radius: 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 28px;

        }


        .payment-success .payment-status-icon {

            background: #d1fae5;

            color: #047857;

        }


        .payment-pending .payment-status-icon {

            background: #ffedd5;

            color: #c2410c;

        }


        .payment-status-title {

            font-size: 20px;

            font-weight: 900;

            color: #172033;

        }


        .payment-status-description {

            margin-top: 5px;

            color: #64748b;

            font-size: 14px;

            line-height: 1.6;

        }


        .payment-amount-box {

            min-width: 190px;

            padding: 15px 20px;

            border-radius: 16px;

            background: #fff;

            border: 1px solid rgba(0, 0, 0, .06);

            text-align: right;

        }


        .payment-amount-box span {

            display: block;

            font-size: 12px;

            color: #64748b;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .7px;

        }


        .payment-amount-box strong {

            display: block;

            margin-top: 3px;

            font-size: 27px;

            font-weight: 900;

            color: #166534;

        }



        /* PAYMENT GRID */

        .payment-details-grid {

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 16px;

            margin-bottom: 25px;

        }


        .payment-info-card {

            display: flex;

            align-items: center;

            gap: 15px;

            padding: 20px;

            border-radius: 18px;

            background: #fff;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, .05);

            transition:
                transform .25s ease,
                box-shadow .25s ease;

        }


        .payment-info-card:hover {

            transform: translateY(-3px);

            box-shadow:
                0 14px 32px rgba(15, 23, 42, .09);

        }


        .payment-info-icon {

            width: 48px;

            height: 48px;

            min-width: 48px;

            border-radius: 14px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 19px;

        }


        .status-icon {

            background: #ecfdf5;

            color: #047857;

        }


        .amount-icon {

            background: #eff6ff;

            color: #1d4ed8;

        }


        .transaction-icon {

            background: #faf5ff;

            color: #7e22ce;

        }


        .date-icon {

            background: #fff7ed;

            color: #c2410c;

        }


        .payment-info-label {

            display: block;

            color: #64748b;

            font-size: 12px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .7px;

        }


        .payment-info-value {

            margin-top: 4px;

            color: #111827;

            font-size: 17px;

            font-weight: 900;

        }


        .transaction-value {

            word-break: break-all;

        }


        .status-text {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            font-size: 14px;

            font-weight: 900;

        }


        .status-text.success {

            color: #047857;

        }


        .status-text.warning {

            color: #c2410c;

        }



        /* PAYMENT UPDATE */

        .payment-update-box {

            padding: 25px;

            border-radius: 22px;

            background:
                linear-gradient(145deg,
                    #f8fafc,
                    #ffffff);

            border: 1px solid #e2e8f0;

        }


        .payment-update-heading {

            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 25px;

        }


        .payment-update-icon {

            width: 52px;

            height: 52px;

            border-radius: 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                linear-gradient(135deg,
                    #7a0f10,
                    #a6191b);

            color: #fff;

            font-size: 21px;

            box-shadow:
                0 8px 20px rgba(122, 15, 16, .2);

        }


        .payment-update-heading h3 {

            margin: 0;

            font-size: 20px;

            font-weight: 900;

            color: #172033;

        }


        .payment-update-heading p {

            margin: 4px 0 0;

            color: #64748b;

            font-size: 14px;

        }



        /* PREMIUM INPUT */

        .premium-label {

            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 9px;

            color: #334155;

            font-size: 14px;

            font-weight: 850;

        }


        .premium-label i {

            color: #7a0f10;

        }


        .premium-label span {

            color: #dc2626;

        }


        .premium-input-wrapper {

            position: relative;

        }


        .premium-input-wrapper>i {

            position: absolute;

            left: 17px;

            top: 50%;

            transform: translateY(-50%);

            color: #94a3b8;

            pointer-events: none;

            z-index: 2;

        }


        .premium-input {

            width: 100%;

            min-height: 52px;

            padding: 12px 16px 12px 47px;

            border-radius: 14px;

            border: 1px solid #cbd5e1;

            background: #fff;

            color: #172033;

            font-size: 15px;

            font-weight: 650;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;

        }


        select.premium-input {

            appearance: auto;

        }


        .premium-input::placeholder {

            color: #94a3b8;

            font-weight: 500;

        }


        .premium-input:hover {

            border-color: #94a3b8;

        }


        .premium-input:focus {

            border-color: #7a0f10;

            background: #fff;

            box-shadow:
                0 0 0 4px rgba(122, 15, 16, .10);

        }


        .premium-help {

            display: block;

            margin-top: 7px;

            color: #64748b;

            font-size: 12px;

            font-weight: 600;

        }



        /* NOTICE */

        .payment-notice {

            display: flex;

            gap: 13px;

            align-items: flex-start;

            margin-top: 22px;

            padding: 16px 18px;

            border-radius: 15px;

            background: #eff6ff;

            border: 1px solid #bfdbfe;

        }


        .payment-notice-icon {

            color: #2563eb;

            font-size: 19px;

        }


        .payment-notice strong {

            color: #1e3a8a;

            font-size: 14px;

        }


        .payment-notice p {

            margin: 3px 0 0;

            color: #475569;

            font-size: 13px;

            line-height: 1.6;

        }



        /* SUBMIT */

        .payment-submit-area {

            display: flex;

            justify-content: flex-end;

            margin-top: 22px;

        }


        .premium-payment-btn {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 30px;

            min-width: 270px;

            padding: 14px 18px 14px 21px;

            border: 0;

            border-radius: 15px;

            background:
                linear-gradient(135deg,
                    #7a0f10,
                    #a6191b);

            color: #fff;

            font-size: 14px;

            font-weight: 850;

            cursor: pointer;

            box-shadow:
                0 10px 25px rgba(122, 15, 16, .22);

            transition:
                transform .2s ease,
                box-shadow .2s ease;

        }


        .premium-payment-btn span {

            display: flex;

            align-items: center;

            gap: 9px;

        }


        .premium-payment-btn>i {

            width: 32px;

            height: 32px;

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: rgba(255, 255, 255, .15);

        }


        .premium-payment-btn:hover {

            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(122, 15, 16, .30);

        }


        .premium-payment-btn:active {

            transform: translateY(0);

        }



        /* FINAL ACTION */

        .final-action-card {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            margin-top: 25px;

            padding: 23px;

            border-radius: 22px;

            background:
                linear-gradient(135deg,
                    #4d0809,
                    #7a0f10);

            box-shadow:
                0 15px 35px rgba(77, 8, 9, .20);

        }


        .final-action-content {

            display: flex;

            align-items: center;

            gap: 15px;

        }


        .final-action-icon {

            width: 52px;

            height: 52px;

            min-width: 52px;

            border-radius: 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: rgba(255, 255, 255, .12);

            border: 1px solid rgba(255, 255, 255, .15);

            color: #f5d98b;

            font-size: 21px;

        }


        .final-action-content h3 {

            margin: 0;

            color: #fff;

            font-size: 18px;

            font-weight: 900;

        }


        .final-action-content p {

            margin: 4px 0 0;

            color: #e5caca;

            font-size: 13px;

        }


        .final-action-buttons {

            display: flex;

            gap: 10px;

        }


        .action-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 11px 17px;

            border-radius: 12px;

            text-decoration: none;

            border: 1px solid transparent;

            font-size: 13px;

            font-weight: 800;

            cursor: pointer;

            transition: .2s ease;

        }


        .action-btn.secondary {

            background: #fff;

            color: #7a0f10;

        }


        .action-btn.print {

            background:
                rgba(255, 255, 255, .10);

            color: #fff;

            border-color:
                rgba(255, 255, 255, .20);

        }


        .action-btn:hover {

            transform: translateY(-2px);

        }



        /* PAYMENT BADGES */

        .payment-badge {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 9px 14px;

            border-radius: 50px;

            font-size: 12px;

            font-weight: 900;

            letter-spacing: .4px;

        }


        .payment-badge.paid {

            color: #047857;

            background: #ecfdf5;

            border: 1px solid #a7f3d0;

        }


        .payment-badge.pending {

            color: #c2410c;

            background: #fff7ed;

            border: 1px solid #fed7aa;

        }



        /* RESPONSIVE */

        @media(max-width:900px) {

            .payment-status-card {

                flex-direction: column;

                align-items: stretch;

            }


            .payment-amount-box {

                text-align: left;

            }


            .payment-details-grid {

                grid-template-columns: 1fr;

            }


            .final-action-card {

                flex-direction: column;

                align-items: stretch;

            }


            .final-action-buttons {

                width: 100%;

            }


            .action-btn {

                flex: 1;

            }

        }


        @media(max-width:600px) {

            .payment-status-left {

                align-items: flex-start;

            }


            .payment-status-title {

                font-size: 17px;

            }


            .payment-status-description {

                font-size: 13px;

            }


            .payment-update-box {

                padding: 18px;

            }


            .payment-submit-area {

                display: block;

            }


            .premium-payment-btn {

                width: 100%;

                min-width: 0;

            }


            .final-action-content {

                align-items: flex-start;

            }


            .final-action-buttons {

                flex-direction: column;

            }


            .action-btn {

                width: 100%;

            }

        }
        </style>



        <!-- =====================================================
     SWEETALERT + FORM VALIDATION
====================================================== -->

        <!-- =====================================================
     SWEETALERT + PAYMENT FORM VALIDATION
====================================================== -->

        <script>
        document.addEventListener('DOMContentLoaded', function() {

            const paymentForm =
                document.getElementById('adminPaymentForm');

            const paymentStatus =
                document.getElementById('payment_status');

            const transactionInput =
                document.getElementById('admin_transaction_id');

            const submitBtn =
                document.getElementById('adminPaymentSubmit');


            /* =====================================================
               PHP SUCCESS / ERROR MESSAGES
            ===================================================== */

            <?php if ($payment_updated): ?>

            Swal.fire({

                icon: 'success',

                title: 'Payment Updated Successfully!',

                html: `
                <div style="text-align:center">

                    <p style="margin-bottom:12px;">
                        Payment information has been successfully updated.
                    </p>

                    <div style="
                        padding:12px;
                        background:#ecfdf5;
                        border:1px solid #a7f3d0;
                        border-radius:10px;
                        color:#166534;
                        font-weight:700;
                    ">
                        <i class="fa-solid fa-circle-check"></i>
                        Payment Status:
                        <?= $user['payment'] === 'PAID(Verified)'
                            ? 'PAID (Verified)'
                            : 'PENDING'; ?>
                    </div>

                </div>
            `,

                confirmButtonText: '<i class="fa-solid fa-check"></i> OK',

                confirmButtonColor: '#7a0f10',

                allowOutsideClick: false,

                allowEscapeKey: false,

                backdrop: `
                rgba(77,8,9,.45)
            `

            });

            <?php endif; ?>


            <?php if (!empty($error_message)): ?>

            Swal.fire({

                icon: 'error',

                title: 'Payment Update Failed',

                html: `
                <div style="
                    color:#475569;
                    font-size:15px;
                    line-height:1.6;
                ">
                    <?= e($error_message); ?>
                </div>
            `,

                confirmButtonText: '<i class="fa-solid fa-xmark"></i> Close',

                confirmButtonColor: '#7a0f10',

                allowOutsideClick: false

            });

            <?php endif; ?>


            /* =====================================================
               FORM DOES NOT EXIST
            ===================================================== */

            if (!paymentForm) {
                return;
            }


            /* =====================================================
               LIVE PAYMENT STATUS PREVIEW
            ===================================================== */

            if (paymentStatus) {

                paymentStatus.addEventListener('change', function() {

                    const preview =
                        document.getElementById(
                            'paymentStatusPreview'
                        );

                    if (!preview) {
                        return;
                    }


                    if (this.value === 'PAID(Verified)') {

                        preview.textContent =
                            'PAID (Verified)';

                        preview.style.color =
                            '#166534';

                    } else {

                        preview.textContent =
                            'PENDING';

                        preview.style.color =
                            '#92400e';

                    }

                });

            }


            /* =====================================================
               FORM SUBMIT
            ===================================================== */

            paymentForm.addEventListener(
                'submit',
                function(event) {

                    event.preventDefault();


                    /* ---------------------------------------------
                       GET VALUES
                    --------------------------------------------- */

                    const statusValue =
                        paymentStatus ?
                        paymentStatus.value.trim() :
                        '';

                    const transactionValue =
                        transactionInput ?
                        transactionInput.value.trim() :
                        '';


                    /* ---------------------------------------------
                       VALIDATE PAYMENT STATUS
                    --------------------------------------------- */

                    if (statusValue === '') {

                        Swal.fire({

                            icon: 'warning',

                            title: 'Payment Status Required',

                            html: `
                        Please select a
                        <b>Payment Status</b>.
                    `,

                            confirmButtonText: '<i class="fa-solid fa-check"></i> OK',

                            confirmButtonColor: '#7a0f10',

                            allowOutsideClick: false

                        }).then(function() {

                            if (paymentStatus) {
                                paymentStatus.focus();
                            }

                        });

                        return;
                    }


                    /* ---------------------------------------------
                       VALIDATE TRANSACTION ID
                    --------------------------------------------- */

                    if (transactionValue === '') {

                        Swal.fire({

                            icon: 'warning',

                            title: 'Transaction ID Required',

                            html: `
                        Please enter the
                        <b>Transaction ID</b>
                        before updating the payment.
                    `,

                            confirmButtonText: '<i class="fa-solid fa-check"></i> OK',

                            confirmButtonColor: '#7a0f10',

                            allowOutsideClick: false

                        }).then(function() {

                            if (transactionInput) {
                                transactionInput.focus();
                            }

                        });

                        return;
                    }


                    /* ---------------------------------------------
                       TRANSACTION ID LENGTH
                    --------------------------------------------- */

                    if (transactionValue.length < 3) {

                        Swal.fire({

                            icon: 'warning',

                            title: 'Invalid Transaction ID',

                            html: `
                        Transaction ID should contain
                        at least <b>3 characters</b>.
                    `,

                            confirmButtonText: 'OK',

                            confirmButtonColor: '#7a0f10'

                        }).then(function() {

                            transactionInput.focus();

                        });

                        return;
                    }


                    /* ---------------------------------------------
                       CONFIRMATION
                    --------------------------------------------- */

                    let statusText =
                        statusValue === 'PAID(Verified)' ?
                        'PAID (Verified)' :
                        'PENDING';


                    let statusIcon =
                        statusValue === 'PAID(Verified)' ?
                        'fa-circle-check' :
                        'fa-clock';


                    let statusColor =
                        statusValue === 'PAID(Verified)' ?
                        '#166534' :
                        '#92400e';


                    Swal.fire({

                        icon: 'question',

                        title: 'Update Payment?',

                        html: `

                    <div style="
                        text-align:left;
                        margin-top:10px;
                    ">

                        <div style="
                            padding:14px;
                            background:#f8fafc;
                            border:1px solid #e2e8f0;
                            border-radius:12px;
                            margin-bottom:10px;
                        ">

                            <div style="
                                font-size:11px;
                                color:#64748b;
                                font-weight:800;
                                text-transform:uppercase;
                                letter-spacing:.6px;
                                margin-bottom:4px;
                            ">
                                Payment Status
                            </div>

                            <div style="
                                color:${statusColor};
                                font-size:16px;
                                font-weight:900;
                            ">

                                <i class="fa-solid ${statusIcon}"></i>

                                ${statusText}

                            </div>

                        </div>


                        <div style="
                            padding:14px;
                            background:#f8fafc;
                            border:1px solid #e2e8f0;
                            border-radius:12px;
                        ">

                            <div style="
                                font-size:11px;
                                color:#64748b;
                                font-weight:800;
                                text-transform:uppercase;
                                letter-spacing:.6px;
                                margin-bottom:4px;
                            ">
                                Transaction ID
                            </div>

                            <div style="
                                color:#172033;
                                font-size:15px;
                                font-weight:800;
                                word-break:break-all;
                            ">
                                ${transactionValue}
                            </div>

                        </div>

                    </div>

                    <p style="
                        margin-top:18px;
                        margin-bottom:0;
                        color:#64748b;
                        font-size:13px;
                    ">

                        Please verify the transaction information
                        before continuing.

                    </p>
                `,

                        showCancelButton: true,

                        confirmButtonText: '<i class="fa-solid fa-check"></i> Yes, Update',

                        cancelButtonText: '<i class="fa-solid fa-xmark"></i> Cancel',

                        confirmButtonColor: '#7a0f10',

                        cancelButtonColor: '#64748b',

                        reverseButtons: true,

                        allowOutsideClick: false,

                        allowEscapeKey: false

                    }).then(function(result) {


                        /* =========================================
                           CONFIRMED
                        ========================================= */

                        if (result.isConfirmed) {


                            /* Disable button */

                            if (submitBtn) {

                                submitBtn.disabled = true;

                                submitBtn.style.opacity = '0.7';

                                submitBtn.style.cursor =
                                    'not-allowed';


                                submitBtn.innerHTML = `

                            <span>

                                <i class="fa-solid fa-spinner fa-spin"></i>

                                Updating Payment...

                            </span>

                            <i class="fa-solid fa-hourglass-half"></i>

                        `;

                            }


                            /* -------------------------------------
                               LOADING ALERT
                            ------------------------------------- */

                            Swal.fire({

                                title: 'Updating Payment...',

                                html: `
                            <div style="
                                color:#64748b;
                                font-size:14px;
                            ">
                                Please wait while we update
                                the payment information.
                            </div>
                        `,

                                allowOutsideClick: false,

                                allowEscapeKey: false,

                                showConfirmButton: false,

                                didOpen: function() {

                                    Swal.showLoading();

                                }

                            });


                            /* -------------------------------------
                               SUBMIT FORM
                            ------------------------------------- */

                            setTimeout(function() {

                                paymentForm.submit();

                            }, 500);

                        }

                    });

                }
            );

        });
        </script>




    </div>

</body>

</html>