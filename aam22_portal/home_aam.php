<?php
session_start();
include 'header_aam.php'; // include your updated header
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | 22nd Annual Alumni Meet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
			.notes-text {
                font-size: 18px; /* increase to desired size */
            }
        body {
					background: url(./aa.webp) no-repeat center center fixed;
    			background-size: cover;
    			min-height: 100vh;
			 }
        .hero {
            background: url('img/home_banner.jpg') center/cover no-repeat;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-size: 2.5rem;
            font-weight: bold;
        }
        .justCenter{
            margin-top: 20px;
            text-align: center;
        }
        .instiLogo{
            margin: 10px;
            width: 80px;
        }
        .event-card img { height: 150px; object-fit: cover; }
        .alumni-photo { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; }
        
        

        
    </style>
</head>
<body>

    <div class="container justCenter">
            <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
            <img class="instiLogo" src="./palJubLogo.png" alt="">
        </div>
<div class="hero">
    Welcome to 22nd Annual Alumni Meet 2026
</div>

<div class="headr text-center my-4">
    <a href="./../aam21.php" class="btn btn-lg mx-4 px-10 mb-6" style="background-color: #1976D2; color: white;">Glimpses of earlier Annual Alumni Meet (AAM)
</a>
<br>
<br>
    <span class="">If you have already registered for 22nd Annual Alumni Meet, then Go for Login else Register first than Login</span>
    <br>
    <br>
    <a href="login_aam.php" class="btn btn-lg mx-4 px-10" style="background-color: #1976D2; color: white;">Login for 22nd AAM 2026</a>
    <a href="signup.php" class="btn btn-lg mx-4 px-10" style="background-color: #1976D2; color: white;">Register for 22nd AAM 2026</a>
</div>


</div>

</body>
</html>