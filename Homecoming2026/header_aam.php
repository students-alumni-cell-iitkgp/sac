<?php
error_reporting(0);
session_start();
$isLoggedIn = isset($_SESSION['email']);
?>


<style>
body {

    padding-top: 90px;
    overflow-x: hidden;

}

.navbar {

    background: rgba(1, 42, 74, .92);

    backdrop-filter: blur(15px);

    -webkit-backdrop-filter: blur(15px);

    box-shadow: 0 10px 25px rgba(0, 0, 0, .15);

    transition: .4s;

    padding: 10px 0;

}

.navbar.scrolled {

    background: #012A4A;

    padding: 6px 0;

}

.navbar-brand {

    display: flex;

    align-items: center;

    gap: 15px;

}

.navbar-brand img {

    height: 70px;

    transition: .4s;

}

.nav-title {

    display: flex;

    flex-direction: column;

    line-height: 1.2;

}

.nav-title span:first-child {

    color: #fff;

    font-weight: 700;

    font-size: 20px;

}

.nav-title span:last-child {

    color: #FFD54F;

    font-size: 13px;

    letter-spacing: 2px;

    text-transform: uppercase;

}

.navbar-nav {

    align-items: center;

}

.nav-item {

    margin: 0 8px;

    position: relative;

}

.nav-link {

    color: white !important;

    font-weight: 600;

    font-size: 16px;

    padding: 10px 18px !important;

    transition: .35s;

    border-radius: 40px;

}

.nav-link:hover {

    background: rgba(255, 255, 255, .08);

    color: #FFD54F !important;

}

.nav-link::after {

    content: "";

    position: absolute;

    left: 50%;

    bottom: 0;

    width: 0;

    height: 3px;

    background: #FFD54F;

    transition: .35s;

    transform: translateX(-50%);

}

.nav-link:hover::after {

    width: 60%;

}

.btn-register {

    background: #FFD54F;

    color: #012A4A !important;

    padding: 10px 28px !important;

    border-radius: 50px;

    font-weight: 700;

    box-shadow: 0 10px 30px rgba(255, 213, 79, .35);

}

.btn-register:hover {

    background: white;

    transform: translateY(-3px);

}

.logout-btn {

    background: #dc3545;

    border-radius: 40px;

    padding: 10px 22px !important;

}

.logout-btn:hover {

    background: #bb2d3b !important;

    color: white !important;

}

.user-pill {

    background: rgba(255, 255, 255, .1);

    padding: 8px 18px;

    border-radius: 50px;

    color: #FFD54F;

    font-weight: 600;

    margin-right: 15px;

}

.navbar-toggler {

    border: none;

    box-shadow: none !important;

}

.navbar-toggler i {

    font-size: 28px;

    color: white;

}

@media(max-width:991px) {

    .navbar-collapse {

        margin-top: 20px;

        background: #012A4A;

        padding: 20px;

        border-radius: 20px;

    }

    .nav-item {

        margin: 10px 0;

    }

    .nav-title {

        display: none;

    }

}
</style>



<nav class="navbar navbar-expand-lg fixed-top">

    <div class="container">

        <a class="navbar-brand" href="#">

            <img src="./img/latestlogo.webp" style="width: 145px; margin-left: 10px; border-radius: 4px;">

            <div class="nav-title">

                <!-- <span>Office Alumni Affairs</span> -->

                <span>
                    <h4>Homecoming 2026</h4>
                </span>

            </div>
            <!-- <img src="./img/alumniLogo.jpg" style="width: 170px; margin-left: 10px;"> -->

        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">

            <i class="fas fa-bars"></i>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <?php if($isLoggedIn): ?>

                <li class="me-3">

                    <div class="user-pill">

                        <i class="fa fa-user-circle"></i>

                        <?= htmlspecialchars($_SESSION['email']) ?>

                    </div>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="./">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="profile_aam.php">

                        Profile

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="attending_aam.php">

                        Registered Alumni

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link logout-btn" href="logout.php">

                        Logout

                    </a>

                </li>

                <?php else: ?>

                <li class="nav-item">

                    <a class="nav-link" href="./">

                        Home

                    </a>

                </li>

                <!-- <li class="nav-item">

                    <a class="nav-link" href="signup.php">

                        Register

                    </a>

                </li> -->
                <li class="nav-item">

                    <a class="nav-link" href="registered_alumni.php">

                        Registered Alumni

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link btn-register" href="login_aam.php">

                        Login

                    </a>

                </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
window.addEventListener("scroll", function() {

    document.querySelector(".navbar")

        .classList.toggle("scrolled", window.scrollY > 40);

});
</script>