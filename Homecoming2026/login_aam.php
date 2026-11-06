<?php
session_start();
include 'config.php'; // Database connection

$error = '';
$success = '';

/*
|--------------------------------------------------------------------------
| Already Logged In
|--------------------------------------------------------------------------
*/
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    header("Location: profile_aam.php");
    exit;
}

/*
|--------------------------------------------------------------------------
| Login Processing
|--------------------------------------------------------------------------
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email  = trim($_POST['email'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $dob    = trim($_POST['dob'] ?? '');

    /*
    |--------------------------------------------------------------------------
    | Basic Validation
    |--------------------------------------------------------------------------
    */
    if ($email === '' || $mobile === '' || $dob === '') {

        $error = "Please enter Email, Mobile Number and Date of Birth.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Please enter a valid email address.";

    } else {

        /*
        |--------------------------------------------------------------------------
        | Check Alumni Record
        |--------------------------------------------------------------------------
        */
        $stmt = $connection->prepare("
            SELECT id, name, email, mobile, dob
            FROM aam
            WHERE email = ?
              AND mobile = ?
              AND dob = ?
            LIMIT 1
        ");

        if ($stmt) {

            $stmt->bind_param("sss", $email, $mobile, $dob);
            $stmt->execute();

            $result = $stmt->get_result();

            /*
            |--------------------------------------------------------------------------
            | Login Log
            |--------------------------------------------------------------------------
            */
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';

            $ins = $connection->prepare("
                INSERT INTO login_log (ip, email)
                VALUES (?, ?)
            ");

            if ($ins) {
                $ins->bind_param("ss", $ip, $email);
                $ins->execute();
                $ins->close();
            }

            /*
            |--------------------------------------------------------------------------
            | Successful Login
            |--------------------------------------------------------------------------
            */
            if ($result && $result->num_rows === 1) {

                $user = $result->fetch_assoc();

                // Regenerate session ID for security
                session_regenerate_id(true);

                $_SESSION['email'] = $user['email'];
                $_SESSION['name']  = $user['name'];
                $_SESSION['user_id'] = $user['id'];

                header("Location: profile_aam.php");
                exit;

            } else {

                $error = "The details you entered do not match our alumni records.";
            }

            $stmt->close();

        } else {

            $error = "Unable to process login. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="IIT Kharagpur Homecoming Login">

    <title>Alumni Login | IIT Kharagpur</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    <style>
    /* =========================================================
           ROOT VARIABLES
        ========================================================= */

    :root {

        --kgp-navy: #020b16;
        --kgp-navy-2: #061525;
        --kgp-navy-3: #0b1d32;

        --kgp-gold: #d6a63a;
        --kgp-gold-light: #f6d477;
        --kgp-gold-dark: #9d6c12;

        --kgp-white: #ffffff;
        --kgp-muted: #b8c2ce;

        --glass: rgba(7, 24, 42, 0.82);
        --glass-border: rgba(214, 166, 58, 0.45);

        --danger: #ff6b6b;

    }


    /* =========================================================
           RESET
        ========================================================= */

    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        min-height: 100%;
    }


    /* =========================================================
           BODY
        ========================================================= */

    body {

        min-height: 100vh;

        font-family: 'Inter', sans-serif;

        color: var(--kgp-white);

        display: flex;
        align-items: center;
        justify-content: center;

        position: relative;

        overflow-x: hidden;

        background:

            radial-gradient(circle at 50% 20%,
                rgba(214, 166, 58, 0.12),
                transparent 35%),

            radial-gradient(circle at 10% 90%,
                rgba(25, 85, 145, 0.18),
                transparent 35%),

            linear-gradient(135deg,
                #010810,
                #061525 50%,
                #020914);
    }


    /* =========================================================
           BACKGROUND DECORATION
        ========================================================= */

    body::before {

        content: "";

        position: fixed;

        width: 500px;
        height: 500px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(214, 166, 58, 0.12),
                transparent 68%);

        top: -220px;
        left: -180px;

        pointer-events: none;
    }


    body::after {

        content: "";

        position: fixed;

        width: 550px;
        height: 550px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(40, 100, 170, 0.12),
                transparent 68%);

        bottom: -280px;
        right: -200px;

        pointer-events: none;
    }


    /* =========================================================
           GOLD BORDER
        ========================================================= */

    .page-border {

        position: fixed;

        inset: 14px;

        border: 1px solid rgba(214, 166, 58, 0.55);
        min-height: 600px;
        pointer-events: none;

        z-index: 1;
    }


    .page-border::before {

        content: "";

        position: absolute;

        inset: 6px;

        border: 1px solid rgba(214, 166, 58, 0.18);
    }


    /* =========================================================
           MAIN WRAPPER
        ========================================================= */

    .login-wrapper {

        width: 100%;

        max-width: 1050px;

        padding: 35px 20px;

        position: relative;

        z-index: 5;
    }


    /* =========================================================
           LOGIN CARD
        ========================================================= */

    .login-card {

        width: 100%;

        display: grid;

        grid-template-columns: 1fr 1fr;

        background:
            linear-gradient(135deg,
                rgba(7, 25, 43, 0.96),
                rgba(2, 12, 24, 0.94));

        border: 1px solid var(--glass-border);

        border-radius: 26px;

        overflow: hidden;

        box-shadow:

            0 30px 80px rgba(0, 0, 0, 0.55),

            0 0 50px rgba(214, 166, 58, 0.06);

        backdrop-filter: blur(20px);
    }


    /* =========================================================
           LEFT SIDE
        ========================================================= */

    .login-brand {

        padding: 50px 45px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        align-items: center;

        text-align: center;

        position: relative;

        background:

            linear-gradient(145deg,
                rgba(214, 166, 58, 0.08),
                rgba(255, 255, 255, 0.01));

        border-right: 1px solid rgba(214, 166, 58, 0.2);
    }


    .brand-glow {

        position: absolute;

        width: 280px;
        height: 280px;

        border-radius: 50%;

        background:

            radial-gradient(circle,
                rgba(214, 166, 58, 0.14),
                transparent 70%);

        top: 50%;
        left: 50%;

        transform: translate(-50%, -50%);

        pointer-events: none;
    }


    /* =========================================================
           LOGO AREA
        ========================================================= */

    .logo-container {

        position: relative;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 20px;

        padding: 16px 22px;

        border: 1px solid rgba(214, 166, 58, 0.45);

        border-radius: 18px;

        background: rgba(255, 255, 255, 0.96);

        box-shadow:

            0 12px 35px rgba(0, 0, 0, 0.3),

            0 0 20px rgba(214, 166, 58, 0.08);

        margin-bottom: 28px;
    }


    .insti-logo {

        width: 105px;

        height: 90px;

        object-fit: contain;
    }


    .jubilee-logo {

        width: 110px;

        height: 90px;

        object-fit: contain;
    }


    /* =========================================================
           BRAND TITLE
        ========================================================= */

    .brand-small {

        position: relative;

        color: var(--kgp-gold-light);

        font-size: 14px;

        font-weight: 600;

        letter-spacing: 3px;

        text-transform: uppercase;

        margin-bottom: 10px;
    }


    .brand-title {

        position: relative;

        font-family: 'Playfair Display', serif;

        font-size: 35px;

        line-height: 1.2;

        margin: 0;

        color: #fff;

        text-shadow:

            0 3px 15px rgba(0, 0, 0, 0.4);
    }


    .brand-title span {

        color: var(--kgp-gold-light);
    }


    .brand-description {

        position: relative;

        max-width: 400px;

        margin: 18px auto 0;

        color: var(--kgp-muted);

        font-size: 14px;

        line-height: 1.8;
    }


    /* =========================================================
           JUBILEE BADGE
        ========================================================= */

    .jubilee-badge {

        position: relative;

        margin-top: 28px;

        display: inline-flex;

        align-items: center;

        gap: 10px;

        padding: 10px 18px;

        border-radius: 50px;

        border: 1px solid rgba(214, 166, 58, 0.5);

        color: var(--kgp-gold-light);

        font-size: 13px;

        font-weight: 700;

        letter-spacing: 1px;

        background: rgba(214, 166, 58, 0.07);
    }


    .jubilee-badge i {

        font-size: 15px;
    }


    /* =========================================================
           RIGHT LOGIN SECTION
        ========================================================= */

    .login-content {

        padding: 50px 48px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        background:

            linear-gradient(180deg,
                rgba(255, 255, 255, 0.025),
                transparent);
    }


    .login-header {

        margin-bottom: 30px;
    }


    .login-icon {

        width: 58px;
        height: 58px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 16px;

        color: #071525;

        background:
            linear-gradient(135deg,
                var(--kgp-gold-light),
                var(--kgp-gold));

        box-shadow:
            0 10px 25px rgba(214, 166, 58, 0.18);

        font-size: 22px;

        margin-bottom: 18px;
    }


    .login-title {

        font-size: 30px;

        font-weight: 800;

        margin: 0 0 8px;

        color: #fff;
    }


    .login-subtitle {

        color: var(--kgp-muted);

        font-size: 14px;

        line-height: 1.6;

        margin: 0;
    }


    /* =========================================================
           ALERT
        ========================================================= */

    .custom-alert {

        border: 1px solid rgba(255, 107, 107, 0.35);

        background: rgba(255, 70, 70, 0.08);

        color: #ffb3b3;

        border-radius: 13px;

        padding: 12px 15px;

        font-size: 13px;

        margin-bottom: 20px;

        display: flex;

        align-items: flex-start;

        gap: 10px;
    }


    .custom-alert i {

        margin-top: 2px;

        color: #ff7676;
    }


    /* =========================================================
           FORM GROUP
        ========================================================= */

    .form-group {

        margin-bottom: 18px;
    }


    .form-label {

        display: block;

        color: #e5eaf0;

        font-size: 13px;

        font-weight: 600;

        margin-bottom: 8px;
    }


    .form-label i {

        color: var(--kgp-gold-light);

        margin-right: 6px;
    }


    /* =========================================================
           INPUT WRAPPER
        ========================================================= */

    .input-wrapper {

        position: relative;
    }


    .input-icon {

        position: absolute;

        left: 17px;

        top: 50%;

        transform: translateY(-50%);

        color: var(--kgp-gold);

        font-size: 15px;

        z-index: 2;
    }


    .form-control {

        width: 100%;

        min-height: 52px;

        border-radius: 13px;

        border: 1px solid rgba(255, 255, 255, 0.12);

        background: rgba(255, 255, 255, 0.055);

        color: #fff;

        padding: 13px 15px 13px 47px;

        font-size: 14px;

        transition: all 0.25s ease;
    }


    .form-control::placeholder {

        color: #8491a0;
    }


    .form-control:hover {

        border-color: rgba(214, 166, 58, 0.35);
    }


    .form-control:focus {

        background: rgba(255, 255, 255, 0.075);

        border-color: var(--kgp-gold);

        color: #fff;

        box-shadow:

            0 0 0 3px rgba(214, 166, 58, 0.10),

            0 5px 20px rgba(0, 0, 0, 0.15);

        outline: none;
    }


    /* Date input browser icon */
    input[type="date"]::-webkit-calendar-picker-indicator {

        filter: invert(1);

        opacity: 0.7;

        cursor: pointer;
    }


    /* =========================================================
           LOGIN BUTTON
        ========================================================= */

    .btn-login {

        width: 100%;

        min-height: 54px;

        border: none;

        border-radius: 13px;

        margin-top: 5px;

        background:

            linear-gradient(135deg,
                #f3ce6b,
                #c18a20);

        color: #07111e;

        font-size: 15px;

        font-weight: 800;

        letter-spacing: 0.5px;

        cursor: pointer;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 10px;

        box-shadow:

            0 12px 30px rgba(214, 166, 58, 0.16);

        transition: all 0.3s ease;
    }


    .btn-login:hover {

        transform: translateY(-2px);

        box-shadow:

            0 16px 35px rgba(214, 166, 58, 0.28);

        background:

            linear-gradient(135deg,
                #ffe18a,
                #d59b25);
    }


    .btn-login:active {

        transform: translateY(0);
    }


    /* =========================================================
           SECURITY NOTE
        ========================================================= */

    .security-note {

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        color: #7f8c9b;

        font-size: 11px;

        margin-top: 18px;

        text-align: center;
    }


    .security-note i {

        color: #6fcf97;
    }


    /* =========================================================
           FOOTER
        ========================================================= */

    .login-footer {

        text-align: center;

        color: #667484;

        font-size: 11px;

        margin-top: 30px;

        padding-top: 18px;

        border-top: 1px solid rgba(255, 255, 255, 0.07);
    }


    .login-footer strong {

        color: #9ba7b4;
    }


    /* =========================================================
           RESPONSIVE TABLET
        ========================================================= */

    @media (max-width: 850px) {

        .login-card {

            grid-template-columns: 1fr;
        }

        .login-brand {

            padding: 35px 25px;

            border-right: none;

            border-bottom: 1px solid rgba(214, 166, 58, 0.2);
        }

        .brand-title {

            font-size: 30px;
        }

        .brand-description {

            margin-top: 12px;
        }

        .login-content {

            padding: 38px 35px;
        }
    }


    /* =========================================================
           RESPONSIVE MOBILE
        ========================================================= */

    @media (max-width: 576px) {

        .page-border {

            inset: 7px;
        }

        .login-wrapper {

            padding: 20px 12px;
        }

        .login-card {

            border-radius: 20px;
        }

        .login-brand {

            padding: 28px 20px;
        }

        .logo-container {

            gap: 10px;

            padding: 10px 15px;

            border-radius: 14px;
        }

        .insti-logo,
        .jubilee-logo {

            width: 82px;

            height: 70px;
        }

        .brand-small {

            font-size: 11px;

            letter-spacing: 2px;
        }

        .brand-title {

            font-size: 25px;
        }

        .brand-description {

            font-size: 12px;

            line-height: 1.7;
        }

        .jubilee-badge {

            font-size: 10px;

            padding: 8px 13px;
        }

        .login-content {

            padding: 30px 22px;
        }

        .login-icon {

            width: 50px;
            height: 50px;

            border-radius: 13px;
        }

        .login-title {

            font-size: 25px;
        }

        .form-control {

            min-height: 50px;
        }

        .btn-login {

            min-height: 52px;
        }
    }


    /* =========================================================
   PREMIUM HEADER
========================================================= */

    .site-header {

        position: fixed;

        top: 0;
        left: 0;
        right: 0;

        height: 82px;

        z-index: 1000;

        background:
            linear-gradient(90deg,
                rgba(2, 11, 22, 0.98),
                rgba(5, 21, 37, 0.97),
                rgba(2, 11, 22, 0.98));

        border-bottom:
            1px solid rgba(214, 166, 58, 0.45);

        box-shadow:
            0 8px 30px rgba(0, 0, 0, 0.30);

        backdrop-filter: blur(15px);
    }


    /* Header gold line */

    .site-header::after {

        content: "";

        position: absolute;

        left: 0;
        right: 0;
        bottom: -2px;

        height: 2px;

        background:
            linear-gradient(90deg,
                transparent,
                #d6a63a,
                #f6d477,
                #d6a63a,
                transparent);
    }


    /* =========================================================
   HEADER INNER
========================================================= */

    .header-inner {

        height: 100%;

        max-width: 1400px;

        margin: auto;

        padding: 0 35px;

        display: flex;

        align-items: center;

        justify-content: space-between;
    }


    /* =========================================================
   BRAND
========================================================= */

    .brand-link {

        display: flex;

        align-items: center;

        gap: 15px;

        text-decoration: none;

        color: white;
    }


    .header-logo-box {

        width: 58px;

        height: 58px;

        background: rgba(255, 255, 255, 0.97);

        border-radius: 12px;

        display: flex;

        align-items: center;

        justify-content: center;

        border:
            1px solid rgba(214, 166, 58, 0.55);

        box-shadow:
            0 4px 18px rgba(0, 0, 0, 0.25);
    }


    .header-logo {

        width: 50px;

        height: 50px;

        object-fit: contain;
    }


    /* =========================================================
   BRAND TEXT
========================================================= */

    .header-brand-text {

        display: flex;

        flex-direction: column;

        gap: 3px;
    }


    .header-institute {

        color: #fff;

        font-size: 16px;

        font-weight: 700;

        letter-spacing: 0.2px;
    }


    .header-alumni {

        color: var(--kgp-gold-light);

        font-size: 12px;

        font-weight: 600;

        letter-spacing: 2px;

        text-transform: uppercase;
    }


    /* =========================================================
   HEADER RIGHT
========================================================= */

    .header-right {

        display: flex;

        align-items: center;

        gap: 30px;
    }


    /* =========================================================
   JUBILEE
========================================================= */

    .header-jubilee {

        display: flex;

        align-items: center;

        gap: 10px;

        color: var(--kgp-gold-light);

        padding-right: 25px;

        border-right:
            1px solid rgba(214, 166, 58, 0.25);
    }


    .header-jubilee>i {

        font-size: 19px;

        color: var(--kgp-gold);
    }


    .header-jubilee strong {

        display: block;

        font-family: 'Playfair Display', serif;

        font-size: 20px;

        line-height: 18px;
    }


    .header-jubilee span {

        display: block;

        font-size: 9px;

        text-transform: uppercase;

        letter-spacing: 1.2px;

        color: #aeb9c5;
    }


    /* =========================================================
   NAVIGATION
========================================================= */

    .header-nav {

        display: flex;

        align-items: center;

        gap: 7px;
    }


    .header-nav a {

        display: flex;

        align-items: center;

        gap: 7px;

        padding: 10px 14px;

        border-radius: 9px;

        text-decoration: none;

        color: #c4ced8;

        font-size: 13px;

        font-weight: 600;

        transition: all .25s ease;
    }


    .header-nav a i {

        color: var(--kgp-gold);

        font-size: 13px;
    }


    .header-nav a:hover {

        color: #fff;

        background:
            rgba(214, 166, 58, 0.10);

        transform: translateY(-1px);
    }


    /* =========================================================
   LOGIN PAGE
========================================================= */

    .login-page {

        width: 100%;

        min-height: 100vh;

        padding-top: 82px;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    /* =========================================================
   RESPONSIVE HEADER
========================================================= */

    @media (max-width: 900px) {

        .header-inner {

            padding: 0 20px;
        }

        .header-jubilee {

            display: none;
        }

        .header-right {

            gap: 5px;
        }

    }


    @media (max-width: 650px) {

        .site-header {

            height: 72px;
        }

        .header-inner {

            padding: 0 14px;
        }

        .header-logo-box {

            width: 48px;

            height: 48px;
        }

        .header-logo {

            width: 42px;

            height: 42px;
        }

        .header-institute {

            font-size: 12px;

            line-height: 1.2;

            max-width: 210px;
        }

        .header-alumni {

            font-size: 9px;

            letter-spacing: 1.2px;
        }

        .header-nav a {

            padding: 8px;

            font-size: 0;
        }

        .header-nav a i {

            font-size: 15px;

            margin: 0;
        }

        .login-page {

            padding-top: 72px;
        }

    }


    @media (max-width: 430px) {

        .header-institute {

            max-width: 170px;

            font-size: 11px;
        }

        .header-alumni {

            font-size: 8px;
        }

        .header-nav {

            gap: 0;
        }

        .header-nav a {

            padding: 7px;
        }

    }
    </style>

</head>


<body>
    <!-- =========================================================
         PREMIUM HEADER
    ========================================================== -->

    <header class="site-header">

        <div class="header-inner">

            <!-- Logo + Institute Name -->

            <a href="./" class="brand-link">

                <div class="header-logo-box">

                    <img src="./img/kgp_blue.png" alt="IIT Kharagpur Logo" class="header-logo">

                </div>

                <div class="header-brand-text">

                    <div class="header-institute">
                        Indian Institute of Technology Kharagpur
                    </div>

                    <div class="header-alumni">
                        Homecoming 2026
                    </div>

                </div>

            </a>


            <!-- Header Right -->

            <div class="header-right">

                <div class="header-jubilee">

                    <!-- <i class="fa-solid fa-gem"></i>

                    <div>
                        <strong>75</strong>
                        <span>Platinum Jubilee</span>
                    </div> -->

                </div>


                <nav class="header-nav">

                    <a href="./">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>

                    <a href="signup.php">
                        <i class="fa-solid fa-users"></i>
                        Register
                    </a>



                </nav>

            </div>

        </div>

    </header>

    <!-- Decorative border -->
    <div class="page-border"></div>

    <main class="login-wrapper mt-2">

        <div class="login-card mt-5">


            <!-- =====================================================
                 LEFT BRAND SECTION
            ====================================================== -->

            <section class="login-brand">

                <div class="brand-glow"></div>


                <!-- Logos -->

                <div class="logo-container">

                    <img src="./img/kgp_blue.png" class="insti-logo" alt="IIT Kharagpur Logo">

                    <img src="./img/palJubLogo.png" class="jubilee-logo" alt="IIT Kharagpur Platinum Jubilee">

                </div>


                <div class="brand-small">
                    Homecoming 2026
                </div>


                <h1 class="brand-title">

                    Welcome Back to
                    <br>

                    <span>IIT Kharagpur</span>

                </h1>


                <p class="brand-description">

                    Connect with the IIT Kharagpur alumni community
                    and access your Homecoming profile.

                </p>


                <div class="jubilee-badge">

                    <i class="fa-solid fa-gem"></i>

                    Celebrating Platinum Jubilee

                    <i class="fa-solid fa-gem"></i>

                </div>

            </section>


            <!-- =====================================================
                 RIGHT LOGIN SECTION
            ====================================================== -->

            <section class="login-content">


                <!-- Header -->

                <div class="login-header">

                    <div class="login-icon">

                        <i class="fa-solid fa-user-lock"></i>

                    </div>


                    <h2 class="login-title">

                        Alumni Login

                    </h2>


                    <p class="login-subtitle">

                        Please enter your registered details
                        to continue to your alumni profile.

                    </p>

                </div>


                <!-- Error -->

                <?php if (!empty($error)): ?>

                <div class="custom-alert">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <span>
                        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                    </span>

                </div>

                <?php endif; ?>


                <!-- =================================================
                     LOGIN FORM
                ================================================== -->

                <form method="POST" action="" autocomplete="off">


                    <!-- Email -->

                    <div class="form-group">

                        <label class="form-label">

                            <i class="fa-solid fa-envelope"></i>

                            Registered Email

                        </label>


                        <div class="input-wrapper">

                            <i class="fa-solid fa-envelope input-icon"></i>

                            <input type="email" name="email" class="form-control"
                                placeholder="Enter your registered email"
                                value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                autocomplete="email" required>

                        </div>

                    </div>


                    <!-- Mobile -->

                    <div class="form-group">

                        <label class="form-label">

                            <i class="fa-solid fa-mobile-screen-button"></i>

                            Mobile Number

                        </label>


                        <div class="input-wrapper">

                            <i class="fa-solid fa-phone input-icon"></i>

                            <input type="tel" name="mobile" class="form-control"
                                placeholder="Enter your registered mobile number"
                                value="<?= htmlspecialchars($_POST['mobile'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                inputmode="numeric" maxlength="15" autocomplete="tel" required>

                        </div>

                    </div>


                    <!-- Date of Birth -->

                    <div class="form-group">

                        <label class="form-label">

                            <i class="fa-solid fa-calendar-days"></i>

                            Date of Birth

                        </label>


                        <div class="input-wrapper">

                            <i class="fa-solid fa-cake-candles input-icon"></i>

                            <input type="date" name="dob" class="form-control"
                                value="<?= htmlspecialchars($_POST['dob'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

                        </div>

                    </div>


                    <!-- Login -->

                    <button type="submit" class="btn-login">

                        <i class="fa-solid fa-right-to-bracket"></i>

                        Login to Alumni Profile

                    </button>


                </form>


                <!-- Security -->

                <div class="security-note">

                    <i class="fa-solid fa-shield-halved"></i>

                    Your login information is securely processed.

                </div>


                <!-- Footer -->

                <div class="login-footer">

                    <strong>
                        Indian Institute of Technology Kharagpur
                    </strong>

                    <br>

                    Homecoming 2026 • Platinum Jubilee 2026

                </div>


            </section>

        </div>

    </main>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <script>
    /*
        |--------------------------------------------------------------------------
        | Mobile Number - Allow Numbers Only
        |--------------------------------------------------------------------------
        */

    const mobileInput = document.querySelector(
        'input[name="mobile"]'
    );

    if (mobileInput) {

        mobileInput.addEventListener('input', function() {

            this.value = this.value.replace(
                /[^0-9+ -]/g,
                ''
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Prevent Double Submit
    |--------------------------------------------------------------------------
    */

    const loginForm = document.querySelector('form');

    if (loginForm) {

        loginForm.addEventListener('submit', function() {

            const button =
                this.querySelector('.btn-login');

            if (button) {

                button.innerHTML = `
                        <i class="fa-solid fa-spinner fa-spin"></i>
                        Verifying...
                    `;

                button.disabled = true;
            }

        });

    }
    </script>

</body>

</html>