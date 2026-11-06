<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include 'test.php'; // DB connection

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = "Please enter both username and password.";
    } else {

        $stmt = $connection->prepare(
            "SELECT password FROM admin WHERE username = ?"
        );

        if ($stmt) {

            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 1) {

                $stmt->bind_result($hash);
                $stmt->fetch();

                if (password_verify($password, $hash)) {

                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_user'] = $username;

                    header("Location: admin.php");
                    exit;

                } else {
                    $error = "Invalid username or password.";
                }

            } else {
                $error = "Invalid username or password.";
            }

            $stmt->close();

        } else {
            $error = "Unable to process login request.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | IIT Kharagpur</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
    * {
        box-sizing: border-box;
    }

    html,
    body {
        width: 100%;
        min-height: 100%;
        margin: 0;
    }

    body {

        font-family: 'Inter', sans-serif;

        background:
            linear-gradient(135deg,
                rgba(2, 13, 27, 0.96),
                rgba(7, 28, 50, 0.92)),
            url('./aa2a.webp') center center / cover no-repeat fixed;

        color: #ffffff;

        min-height: 100vh;

        display: flex;
        flex-direction: column;

        overflow-x: hidden;
    }


    /* =========================================================
           BACKGROUND EFFECTS
        ========================================================= */

    .background-glow {

        position: fixed;

        width: 500px;
        height: 500px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(218, 165, 32, 0.18),
                transparent 68%);

        top: -220px;
        left: -180px;

        pointer-events: none;

        filter: blur(10px);
    }


    .background-glow-two {

        position: fixed;

        width: 550px;
        height: 550px;

        border-radius: 50%;

        background:
            radial-gradient(circle,
                rgba(30, 94, 145, 0.20),
                transparent 70%);

        right: -250px;
        bottom: -250px;

        pointer-events: none;

        filter: blur(10px);
    }


    /* =========================================================
           TOP HEADER
        ========================================================= */

    .top-header {

        width: 100%;

        min-height: 92px;

        padding: 14px 5%;

        display: flex;

        align-items: center;

        justify-content: space-between;

        position: relative;

        z-index: 10;

        background:
            rgba(2, 15, 29, 0.82);

        border-bottom:
            1px solid rgba(218, 165, 32, 0.35);

        backdrop-filter: blur(15px);

        box-shadow:
            0 5px 30px rgba(0, 0, 0, 0.25);
    }


    /* LEFT BRAND */

    .brand-left {

        display: flex;

        align-items: center;

        gap: 15px;
    }

    .brand-logo-wrapper {
        background: rgba(233, 214, 214, 0.93);
        padding: 5px;
        border-radius: 5%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
    }

    .brand-logo-wrapper1 {
        background: rgba(233, 214, 214, 0.93);
        padding: 10px;
        width: 85px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        margin-left: 150px;
    }


    .brand-logo {

        width: 65px;

        height: 65px;

        object-fit: contain;

        filter: drop-shadow(0 3px 10px rgba(0, 0, 0, 0.35));

    }


    .brand-title {

        line-height: 1.15;
    }


    .brand-title h1 {

        margin: 0;

        font-family: 'Playfair Display',
            serif;

        font-size: 22px;

        font-weight: 700;

        letter-spacing: 0.5px;

        color: #ffffff;
    }


    .brand-title span {

        display: block;

        margin-top: 5px;

        font-size: 12px;

        color: #d9b35a;

        font-weight: 600;

        letter-spacing: 1.5px;

        text-transform: uppercase;
    }


    /* RIGHT JUBILEE */

    .jubilee-box {

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 7px 16px;

        border: 1px solid rgba(218, 165, 32, 0.45);

        border-radius: 50px;

        background: rgba(255, 255, 255, 0.04);
    }


    .jubilee-number {

        font-size: 27px;

        font-weight: 800;

        color: #e3b33d;

        line-height: 1;
    }


    .jubilee-text {

        font-size: 10px;

        line-height: 1.2;

        color: #ffffff;

        letter-spacing: 1px;

        text-transform: uppercase;
    }


    /* =========================================================
           MAIN AREA
        ========================================================= */

    .main-wrapper {

        flex: 1;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 45px 20px 35px;

        position: relative;

        z-index: 2;
    }


    /* =========================================================
           LOGIN CONTAINER
        ========================================================= */

    .login-container {

        width: 100%;

        max-width: 980px;

        min-height: 555px;

        display: grid;

        grid-template-columns: 1fr 1fr;

        border-radius: 28px;

        overflow: hidden;

        border: 1px solid rgba(255, 255, 255, 0.12);

        background: rgba(255, 255, 255, 0.055);

        backdrop-filter: blur(25px);

        -webkit-backdrop-filter: blur(25px);

        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.45);

        animation: containerAppear 0.8s ease;
    }


    @keyframes containerAppear {

        from {

            opacity: 0;

            transform: translateY(30px) scale(.98);
        }

        to {

            opacity: 1;

            transform: translateY(0) scale(1);
        }
    }


    /* =========================================================
           LEFT PANEL
        ========================================================= */

    .welcome-panel {

        position: relative;

        padding: 50px 45px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        background: linear-gradient(145deg,
                rgba(7, 31, 55, 0.92),
                rgba(3, 17, 31, 0.96));

        border-right: 1px solid rgba(218, 165, 32, 0.18);
    }


    .welcome-panel::before {

        content: "";

        position: absolute;

        width: 260px;
        height: 260px;

        border-radius: 50%;

        right: -130px;
        top: -100px;

        background: radial-gradient(circle,
                rgba(218, 165, 32, 0.18),
                transparent 68%);
    }


    .small-label {

        display: inline-flex;

        width: fit-content;

        align-items: center;

        gap: 8px;

        padding: 7px 14px;

        border-radius: 50px;

        background: rgba(218, 165, 32, 0.10);

        border: 1px solid rgba(218, 165, 32, 0.30);

        color: #e4b84d;

        font-size: 11px;

        font-weight: 700;

        letter-spacing: 1.4px;

        text-transform: uppercase;

        margin-bottom: 25px;
    }


    .small-label i {

        font-size: 13px;
    }


    .welcome-panel h2 {

        font-family: 'Playfair Display',
            serif;

        font-size: 39px;

        line-height: 1.15;

        font-weight: 700;

        margin: 0 0 18px;

        color: #ffffff;
    }


    .gold-text {

        color: #e4b84d;
    }


    .welcome-panel p {

        color: rgba(255, 255, 255, 0.70);

        font-size: 14px;

        line-height: 1.8;

        max-width: 420px;

        margin-bottom: 30px;
    }


    .feature-list {

        padding: 0;

        margin: 0;

        list-style: none;
    }


    .feature-list li {

        display: flex;

        align-items: center;

        gap: 12px;

        margin-bottom: 16px;

        font-size: 13px;

        color: rgba(255, 255, 255, 0.78);
    }


    .feature-icon {

        width: 34px;
        height: 34px;

        min-width: 34px;

        border-radius: 10px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: rgba(218, 165, 32, 0.10);

        color: #e4b84d;

        border: 1px solid rgba(218, 165, 32, 0.22);
    }


    /* =========================================================
           LOGIN PANEL
        ========================================================= */

    .login-panel {

        padding: 48px 50px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        background: rgba(255, 255, 255, 0.045);
    }


    .login-logo {

        width: 82px;

        height: 82px;

        object-fit: contain;

        margin: 0 auto 18px;

        display: block;

        filter: drop-shadow(0 8px 15px rgba(0, 0, 0, 0.30));
    }


    .login-heading {

        text-align: center;

        margin-bottom: 30px;
    }


    .login-heading h3 {

        font-size: 25px;

        font-weight: 800;

        margin-bottom: 7px;

        color: #ffffff;
    }


    .login-heading p {

        margin: 0;

        font-size: 12px;

        color: rgba(255, 255, 255, 0.55);
    }


    /* =========================================================
           ERROR
        ========================================================= */

    .error-box {

        display: flex;

        align-items: center;

        gap: 10px;

        padding: 12px 14px;

        margin-bottom: 20px;

        border-radius: 12px;

        background: rgba(220, 53, 69, 0.12);

        border: 1px solid rgba(220, 53, 69, 0.30);

        color: #ff9ca5;

        font-size: 12px;

        text-align: left;
    }


    /* =========================================================
           FORM
        ========================================================= */

    .form-group {

        margin-bottom: 20px;
    }


    .form-label {

        color: rgba(255, 255, 255, 0.80);

        font-size: 12px;

        font-weight: 600;

        margin-bottom: 8px;

        letter-spacing: .3px;
    }


    .input-wrapper {

        position: relative;
    }


    .input-icon {

        position: absolute;

        left: 16px;

        top: 50%;

        transform: translateY(-50%);

        color: #c49a38;

        font-size: 16px;

        z-index: 2;
    }


    .login-input {

        width: 100%;

        height: 52px;

        border-radius: 13px;

        border: 1px solid rgba(255, 255, 255, 0.13);

        background: rgba(0, 0, 0, 0.20);

        color: #ffffff;

        padding: 0 45px 0 45px;

        font-size: 13px;

        outline: none;

        transition: all .25s ease;
    }


    .login-input::placeholder {

        color: rgba(255, 255, 255, 0.35);
    }


    .login-input:focus {

        border-color: rgba(218, 165, 32, 0.75);

        background: rgba(0, 0, 0, 0.28);

        box-shadow: 0 0 0 4px rgba(218, 165, 32, 0.08);
    }


    .password-toggle {

        position: absolute;

        right: 15px;

        top: 50%;

        transform: translateY(-50%);

        color: rgba(255, 255, 255, 0.45);

        cursor: pointer;

        font-size: 16px;

        transition: .2s;
    }


    .password-toggle:hover {

        color: #e4b84d;
    }


    /* =========================================================
           LOGIN BUTTON
        ========================================================= */

    .login-button {

        width: 100%;

        height: 53px;

        border: none;

        border-radius: 13px;

        margin-top: 5px;

        background: linear-gradient(135deg,
                #c28b20,
                #f0c55a,
                #c28b20);

        background-size: 200% 100%;

        color: #071522;

        font-size: 13px;

        font-weight: 800;

        letter-spacing: .8px;

        cursor: pointer;

        box-shadow: 0 10px 25px rgba(194, 139, 32, 0.22);

        transition: all .3s ease;
    }


    .login-button:hover {

        background-position: 100% 0;

        transform: translateY(-2px);

        box-shadow: 0 14px 30px rgba(194, 139, 32, 0.32);
    }


    .login-button:active {

        transform: translateY(0);
    }


    .login-button i {

        margin-right: 7px;
    }


    /* =========================================================
           SECURITY NOTE
        ========================================================= */

    .security-note {

        display: flex;

        justify-content: center;

        align-items: center;

        gap: 7px;

        margin-top: 20px;

        color: rgba(255, 255, 255, 0.40);

        font-size: 10px;
    }


    .security-note i {

        color: #d3aa47;
    }


    /* =========================================================
           FOOTER
        ========================================================= */

    .page-footer {

        padding: 14px 20px;

        text-align: center;

        position: relative;

        z-index: 3;

        background: rgba(1, 10, 20, 0.65);

        border-top: 1px solid rgba(218, 165, 32, 0.20);

        color: rgba(255, 255, 255, 0.45);

        font-size: 10px;

        letter-spacing: .5px;
    }


    .page-footer strong {

        color: #d8ae48;
    }


    /* =========================================================
           RESPONSIVE
        ========================================================= */

    @media (max-width: 850px) {

        .login-container {

            max-width: 560px;

            grid-template-columns: 1fr;
        }


        .welcome-panel {

            display: none;
        }


        .login-panel {

            padding: 45px 40px;
        }
    }


    @media (max-width: 576px) {

        .top-header {

            min-height: 75px;

            padding: 10px 18px;
        }


        .brand-logo {

            width: 48px;
            height: 48px;
        }


        .brand-title h1 {

            font-size: 16px;
        }


        .brand-title span {

            font-size: 8px;

            letter-spacing: 1px;
        }


        .jubilee-box {

            padding: 6px 10px;
        }


        .jubilee-number {

            font-size: 20px;
        }


        .jubilee-text {

            font-size: 7px;
        }


        .main-wrapper {

            padding: 25px 15px;
        }


        .login-container {

            border-radius: 22px;
        }


        .login-panel {

            padding: 35px 25px;
        }


        .login-heading h3 {

            font-size: 22px;
        }
    }
    </style>

</head>


<body>

    <!-- Background decorations -->
    <div class="background-glow"></div>
    <div class="background-glow-two"></div>


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="top-header">
        <a href="/Homecoming2026" style="text-decoration: none; color: inherit;">
            <div class="brand-left">
                <div class="brand-logo-wrapper">
                    <img src="./img/kgp_blue.png" class="brand-logo" alt="IIT Kharagpur Logo">
                </div>

                <div class="brand-title">

                    <h1>
                        IIT Kharagpur
                    </h1>

                    <span>
                        Indian Institute of Technology
                    </span>

                </div>

            </div>
        </a>


        <div class="jubilee-box">

            <div class="jubilee-number">
                75
            </div>

            <div class="jubilee-text">
                Years of<br>
                Excellence
            </div>

        </div>

    </header>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main-wrapper">

        <div class="login-container">


            <!-- =================================================
                 LEFT WELCOME PANEL
            ================================================== -->

            <section class="welcome-panel">

                <div class="small-label">

                    <i class="bi bi-shield-lock-fill"></i>

                    Secure Administration

                </div>


                <h2>

                    Welcome to the

                    <span class="gold-text">
                        Admin Portal
                    </span>

                </h2>


                <p>

                    Manage alumni information, events,
                    awards, announcements and institutional
                    activities through the secure
                    IIT Kharagpur administration portal.

                </p>


                <ul class="feature-list">

                    <li>

                        <span class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </span>

                        Secure administrator authentication

                    </li>


                    <li>

                        <span class="feature-icon">
                            <i class="bi bi-speedometer2"></i>
                        </span>

                        Centralized administration dashboard

                    </li>


                    <li>

                        <span class="feature-icon">
                            <i class="bi bi-database-check"></i>
                        </span>

                        Manage Alumni information

                    </li>


                    <li>

                        <span class="feature-icon">
                            <i class="bi bi-award"></i>
                        </span>

                        Manage Accomodation Details

                    </li>

                </ul>

            </section>


            <!-- =================================================
                 LOGIN PANEL
            ================================================== -->

            <section class="login-panel">


                <div class="brand-logo-wrapper1">
                    <img src=" ./img/kgp_blue.png" class="brand-logo" alt="IIT Kharagpur Logo">
                </div>


                <div class="login-heading">

                    <h3>
                        Administrator Login
                    </h3>

                    <p>
                        Sign in to access the administration panel
                    </p>

                </div>


                <?php if (!empty($error)): ?>

                <div class="error-box">

                    <i class="bi bi-exclamation-triangle-fill"></i>

                    <span>
                        <?= htmlspecialchars($error) ?>
                    </span>

                </div>

                <?php endif; ?>


                <form method="POST" id="adminLoginForm">


                    <!-- USERNAME -->

                    <div class="form-group">

                        <label class="form-label" for="username">
                            Username
                        </label>


                        <div class="input-wrapper">

                            <i class="bi bi-person input-icon"></i>


                            <input type="text" name="username" id="username" class="login-input"
                                placeholder="Enter your username" autocomplete="username" required value="<?= isset($_POST['username'])
                                    ? htmlspecialchars($_POST['username'])
                                    : '' ?>">

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label class="form-label" for="password">
                            Password
                        </label>


                        <div class="input-wrapper">

                            <i class="bi bi-lock input-icon"></i>


                            <input type="password" name="password" id="password" class="login-input"
                                placeholder="Enter your password" autocomplete="current-password" required>


                            <i class="bi bi-eye-slash password-toggle" id="passwordToggle" title="Show password"></i>

                        </div>

                    </div>


                    <!-- LOGIN -->

                    <button type="submit" class="login-button" id="loginButton">

                        <i class="bi bi-box-arrow-in-right"></i>

                        SIGN IN TO ADMIN PANEL

                    </button>


                </form>


                <div class="security-note">

                    <i class="bi bi-shield-lock-fill"></i>

                    Protected administrative access

                </div>


            </section>

        </div>

    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="page-footer">

        <strong>
            IIT Kharagpur
        </strong>

        &nbsp;•&nbsp;

        Platinum Jubilee Celebration

        &nbsp;•&nbsp;

        1951 – 2026

    </footer>



    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>
    /* ==========================================
           PASSWORD SHOW / HIDE
        ========================================== */

    const password =
        document.getElementById('password');

    const passwordToggle =
        document.getElementById('passwordToggle');


    passwordToggle.addEventListener(
        'click',
        function() {

            if (password.type === 'password') {

                password.type = 'text';

                passwordToggle.classList.remove(
                    'bi-eye-slash'
                );

                passwordToggle.classList.add(
                    'bi-eye'
                );

                passwordToggle.title =
                    'Hide password';

            } else {

                password.type = 'password';

                passwordToggle.classList.remove(
                    'bi-eye'
                );

                passwordToggle.classList.add(
                    'bi-eye-slash'
                );

                passwordToggle.title =
                    'Show password';
            }

        }
    );


    /* ==========================================
       LOGIN BUTTON LOADING
    ========================================== */

    const loginForm =
        document.getElementById('adminLoginForm');

    const loginButton =
        document.getElementById('loginButton');


    loginForm.addEventListener(
        'submit',
        function() {

            if (loginForm.checkValidity()) {

                loginButton.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span> AUTHENTICATING...';

                loginButton.style.pointerEvents =
                    'none';

            }

        }
    );


    /* ==========================================
       AUTO FOCUS
    ========================================== */

    window.addEventListener(
        'load',
        function() {

            const username =
                document.getElementById('username');

            if (username) {
                username.focus();
            }

        }
    );
    </script>


</body>

</html>

<?php

if (isset($connection)) {
    $connection->close();
}

?>