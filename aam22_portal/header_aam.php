<?php
session_start();
$isLoggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Alumni Meet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>

    /* Bubble-style hover effect */
    .navbar-nav .nav-item .nav-link {
        padding-left-right: 60px;
        transition: all 0.3s ease;
        position: relative;
    }

    .navbar-nav .nav-item .nav-link:hover {
        transform: scale(1.15); /* slightly grow */
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.4); /* soft glowing shadow */
        border-radius: 50px; /* make pill-shaped if not already */
        background-color: #42A5F5; /* optional subtle color change */
    }
    @media (max-width:426px) {
        .container-fluid { width: 100vw; }
    }
    .navbar-brand img { 
        height: 80px; /* Increased from 50px to 80px */
        width: auto; /* Keeps aspect ratio */
    }
    .ml-2 { margin-left: 0.5rem; }
    .nav-item{
        margin: 10px;
    }

    /* Keep existing styles as is */
</style>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./../index.php"><img src="../img/latestlogo.webp" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <?php if ($isLoggedIn): ?>
                    <li class="nav-item"><a class="nav-link" href="home_aam.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile_aam.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="attending_aam.php">Registered Alumni</a></li>
                    <li class="nav-item"><a class="nav-link text-red" href="logout.php">Logout</a></li>
                <?php else: ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>