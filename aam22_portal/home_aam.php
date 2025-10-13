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
            body {
                background: url(./aa2.webp) no-repeat center center fixed;
                background-size: cover;
                min-height: 100vh;
                backdrop-filter: blur(6px);
                font-family: 'Segoe UI', sans-serif;
            }

            /* ===== HERO SECTION ===== */
            .hero {
                display: flex;
                flex-direction: column;
                background: rgba(255, 255, 255, 0.3);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                height: 120px;
                margin: 30px auto;
                width: 80%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #012a4a;
                font-size: 2rem;
                font-weight: 700;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7);
            }

            /* ===== LOGO SECTION ===== */
            .justCenter {
                margin-top: 30px;
                text-align: center;
            }

            .instiLogo {
                margin: 10px;
                height: 90px;
                transition: transform 0.3s ease;
            }

            .instiLogo:hover {
                transform: scale(1.1);
            }

            /* ===== DATE & HEADER ===== */
            .dateDiv {
                font-size: 1.4rem;
                color: #014f86;
                font-weight: 600;
                text-align: center;
                margin-top: 10px;
            }

            /* ===== BUTTONS ===== */
            .btn {
                border-radius: 30px;
                font-weight: 600;
                padding: 10px 25px;
                transition: all 0.3s ease;
                background-color: #014f86 !important;
                border: none;
            }

            .btn:hover {
                background-color: #012a4a !important;
                transform: scale(1.05);
                color: #fff;
            }

            /* ===== MAIN IMAGE CARD ===== */
            .mainImg {
                min-width: 50vw;
                width: 100%;
                max-width: 90vw;
                border-radius: 30px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                border: 3px solid rgba(255, 255, 255, 0.5);
            }

            /* ===== CONTENT BLOCK (CENTER) ===== */
            .headr {
                background: rgba(255, 255, 255, 0.35);
                backdrop-filter: blur(12px);
                border-radius: 25px;
                padding: 30px;
                margin: 20px auto;
                width: 85%;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }

            /* ===== NOTES TEXT ===== */
            .notes-text {
                font-size: 18px;
                color: #012a4a;
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 768px) {
                .hero {
                    width: 90%;
                    font-size: 1.5rem;
                    height: auto;
                    padding: 20px;
                }

                .headr {
                    width: 90%;
                    padding: 20px;
                }

                .instiLogo {
                    height: 60px;
                }

                .btn {
                    width: 90%;
                    margin-bottom: 15px;
                }

                .mainImg {
                    border-radius: 20px;
                }
            }
        

        
    </style>
</head>
<body>

    <div class="container justCenter">
            <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
            <img class="instiLogo" src="./img/palJubLogo.png" alt="">
        </div>
<div class='hero'>
    <div class="">
        Welcome to 22nd Annual Alumni Meet 2026
    </div>
    <div class="text-center dateDiv">
        <span> 9<sup>th</sup> to 11<sup>th</sup> Jan 2026</span>
    </div>
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

<div class="headr text-center my-4">
    <img class="mainImg" src="./img/home_aampic01.png" alt="">
</div>




</div>

</body>
</html>