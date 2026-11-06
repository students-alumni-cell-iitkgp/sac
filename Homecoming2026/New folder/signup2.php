<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>22nd Annual Alumni Meet 2026 Registration</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

    :root{

    --primary:#012A4A;
    --secondary:#014F86;
    --gold:#FFD54F;
    --light:#F7F9FC;
    --dark:#001B2E;
    --success:#28a745;
    --danger:#dc3545;
    --shadow:0 20px 60px rgba(0,0,0,.12);

    }

    *{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;

    }

    body{

    background:#eef3fb;
    overflow-x:hidden;
    padding-top:90px;

    }



    .bg-shape{

    position:fixed;
    border-radius:50%;
    filter:blur(120px);
    opacity:.30;
    z-index:-2;
    animation:float 10s infinite alternate;

    }

    .bg1{

    width:350px;
    height:350px;
    background:#0d6efd;
    top:-120px;
    left:-120px;

    }

    .bg2{

    width:300px;
    height:300px;
    background:#FFD54F;
    bottom:-120px;
    right:-100px;
    animation-delay:2s;

    }

    .bg3{

    width:260px;
    height:260px;
    background:#6f42c1;
    left:45%;
    top:35%;
    animation-delay:4s;

    }

            @keyframes float{

            100%{

            transform:translate(40px,50px) scale(1.15);

            }

            }

            /*******************************************
            Premium Navbar
            ********************************************/

            .navbar{

            background:rgba(1,42,74,.92);
            backdrop-filter:blur(18px);
            box-shadow:0 15px 40px rgba(0,0,0,.12);
            padding:15px 0;
            transition:.4s;

            }

            .navbar-brand{

            display:flex;
            align-items:center;
            gap:15px;

            }

            .navbar-brand img{

            height:68px;

            }

            .brand-text{

            display:flex;
            flex-direction:column;

            }

            .brand-text h5{

            color:#fff;
            font-weight:700;
            margin:0;

            }

            .brand-text small{

            color:#FFD54F;
            letter-spacing:2px;

            }

            .nav-link{

            color:#fff!important;
            font-weight:600;
            margin:0 8px;
            position:relative;

            }

            .nav-link:hover{

            color:#FFD54F!important;

            }

            .btn-login{

            background:#FFD54F;
            border-radius:40px;
            padding:12px 30px;
            font-weight:700;

            }

            .btn-login:hover{

            background:white;

            }

            /*******************************************
            Hero
            ********************************************/

            .hero{

            padding:90px 20px 70px;
            text-align:center;
            position:relative;

            }

            .hero-badge{

            display:inline-block;
            padding:10px 30px;
            background:#FFD54F;
            border-radius:50px;
            font-weight:700;
            margin-bottom:25px;

            }

            .hero h1{

            font-size:60px;
            font-weight:800;
            color:#012A4A;

            }

            .hero h1 span{

            color:#014F86;

            }

            .hero p{

            font-size:20px;
            max-width:900px;
            margin:25px auto;
            line-height:1.8;
            color:#555;

            }

            .hero-buttons{

            margin-top:40px;

            }

            .hero-buttons .btn{

            padding:16px 45px;
            border-radius:50px;
            font-weight:700;
            margin:10px;

            }

            .btn-register{

            background:#014F86;
            color:white;

            }

            .btn-register:hover{

            background:#012A4A;
            color:white;

            }

            .btn-outline-custom{

            border:2px solid #014F86;
            color:#014F86;

            }

            .btn-outline-custom:hover{

            background:#014F86;
            color:white;

            }

            /*******************************************
            Registration Card
            ********************************************/

            .registration-wrapper{

            max-width:1300px;
            margin:auto;
            padding:20px;

            }

            .registration-card{

            background:rgba(255,255,255,.85);
            backdrop-filter:blur(25px);
            border-radius:30px;
            padding:60px;
            box-shadow:var(--shadow);
            margin-bottom:60px;

            }

            .registration-title{

            text-align:center;
            margin-bottom:45px;

            }

            .registration-title h2{

            font-weight:800;
            color:#012A4A;

            }

            .registration-title p{

            color:#666;

            }

            @media(max-width:992px){

            .hero h1{

            font-size:42px;

            }

            .registration-card{

            padding:30px;

            }

            }

            @media(max-width:768px){

            .brand-text{

            display:none;

            }

            .hero{

            padding-top:70px;

            }

            .hero h1{

            font-size:34px;

            }

            }

            /* =========================================
            Wizard
            =========================================*/

            .wizard{

            display:flex;
            justify-content:center;
            align-items:center;
            flex-wrap:wrap;
            margin-bottom:70px;

            }

            .step{

            text-align:center;
            width:140px;
            position:relative;

            }

            .circle{

            width:78px;
            height:78px;
            border-radius:50%;
            background:#e8edf3;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:auto;
            font-size:30px;
            color:#8c98a4;
            transition:.4s;
            box-shadow:0 12px 30px rgba(0,0,0,.08);

            }

            .step.active .circle{

            background:linear-gradient(135deg,#012A4A,#014F86);
            color:white;
            transform:scale(1.08);
            box-shadow:0 20px 45px rgba(1,42,74,.35);

            }

            .step h6{

            margin-top:18px;
            font-weight:700;
            color:#012A4A;

            }

            .step small{

            color:#888;

            }

            .wizard-line{

            height:4px;
            width:70px;
            background:#d7dce3;
            margin-top:-60px;
            border-radius:30px;

            }

            /* =========================================
            Section
            =========================================*/

            .premium-section{

            background:white;
            border-radius:25px;
            padding:45px;
            box-shadow:0 20px 50px rgba(0,0,0,.08);

            }

            .section-header{

            display:flex;
            align-items:center;
            margin-bottom:30px;

            }

            .section-icon{

            width:75px;
            height:75px;
            border-radius:20px;
            background:linear-gradient(135deg,#012A4A,#014F86);
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:30px;
            color:white;
            margin-right:20px;

            }

            .section-header h3{

            font-weight:700;
            margin-bottom:5px;
            color:#012A4A;

            }

            .section-header p{

            margin:0;
            color:#777;

            }

            .section-divider{

            margin:35px 0;
            opacity:.12;

            }

            @media(max-width:992px){

            .wizard-line{

            display:none;

            }

            .step{

            width:33%;
            margin-bottom:35px;

            }

            .section-header{

            flex-direction:column;
            text-align:center;

            }

            .section-icon{

            margin-right:0;
            margin-bottom:20px;

            }

            }
            /*==================================================
            Progress
            ==================================================*/

            .premium-progress{

            height:16px;

            border-radius:50px;

            background:#e7edf5;

            overflow:hidden;

            }

            .premium-progress .progress-bar{

            background:linear-gradient(90deg,#012A4A,#0d6efd);

            font-weight:600;

            }

            /*==================================================
            Registration Status
            ==================================================*/

            .registration-status{

            background:linear-gradient(135deg,#012A4A,#014F86);

            color:white;

            padding:12px 25px;

            border-radius:50px;

            font-weight:600;

            display:inline-block;

            box-shadow:0 15px 35px rgba(0,0,0,.15);

            }



            .step{

            text-align:center;

            width:130px;

            }

            .step-circle{

            width:75px;

            height:75px;

            margin:auto;

            border-radius:50%;

            background:#edf2f7;

            display:flex;

            justify-content:center;

            align-items:center;

            font-size:30px;

            color:#999;

            transition:.4s;

            box-shadow:0 12px 30px rgba(0,0,0,.08);

            }

            .step.active .step-circle{

            background:linear-gradient(135deg,#012A4A,#014F86);

            color:white;

            transform:scale(1.08);

            }

            .step h6{

            margin-top:18px;

            font-weight:700;

            color:#012A4A;

            }

            .step small{

            color:#777;

            }

            .wizard-line{

            width:70px;

            height:4px;

            background:#d8dee8;

            margin-top:36px;

            border-radius:20px;

            }

            /*==================================================
            Premium Card
            ==================================================*/

            .premium-card{

            background:white;

            border-radius:30px;

            padding:45px;

            box-shadow:0 20px 50px rgba(0,0,0,.08);

            margin-bottom:50px;

            }

            .premium-card-header{

            display:flex;

            align-items:center;

            margin-bottom:25px;

            }

            .icon-box{

            width:75px;

            height:75px;

            border-radius:20px;

            background:linear-gradient(135deg,#012A4A,#014F86);

            display:flex;

            justify-content:center;

            align-items:center;

            font-size:30px;

            color:white;

            margin-right:20px;

            }

            .premium-card-header h3{

            font-weight:700;

            color:#012A4A;

            margin-bottom:5px;

            }

            .premium-card-header p{

            margin:0;

            color:#666;

            }

            .section-divider{

            opacity:.12;

            margin:30px 0;

            }

            @media(max-width:991px){

            .wizard-line{

            display:none;

            }

            .step{

            width:33%;

            margin-bottom:30px;

            }

            .premium-card-header{

            flex-direction:column;

            text-align:center;

            }

            .icon-box{

            margin-right:0;

            margin-bottom:20px;

            }

            }

            /*==========================================
            Premium Inputs
            ==========================================*/

            .premium-input{

            margin-bottom:30px;

            }

            .premium-label{

            display:block;

            font-weight:700;

            color:#012A4A;

            margin-bottom:10px;

            font-size:15px;

            }

            .premium-control{

            height:60px;

            border-radius:18px;

            border:2px solid #e6edf6;

            padding-left:20px;

            font-size:15px;

            transition:.35s;

            background:white;

            box-shadow:0 10px 30px rgba(0,0,0,.03);

            }

            .premium-control:focus{

            border-color:#014F86;

            box-shadow:0 0 0 .25rem rgba(1,79,134,.12);

            }

            .form-hint{

            display:block;

            margin-top:8px;

            font-size:13px;

            color:#8a8a8a;

            }

            .email-status{

            display:block;

            margin-top:8px;

            font-weight:600;

            font-size:14px;

            }
            /*=========================================
            Social Card
            =========================================*/

            .premium-social-card{

            background:linear-gradient(135deg,#ffffff,#f7fbff);

            border-radius:22px;

            padding:30px;

            border:1px solid #e8eef5;

            box-shadow:0 20px 45px rgba(0,0,0,.05);

            margin-top:10px;

            }

            .social-header{

            display:flex;

            align-items:center;

            }

            .social-icon{

            width:65px;

            height:65px;

            border-radius:18px;

            background:linear-gradient(135deg,#012A4A,#014F86);

            display:flex;

            justify-content:center;

            align-items:center;

            font-size:28px;

            color:white;

            margin-right:20px;

            }

            .social-header h5{

            font-weight:700;

            margin-bottom:5px;

            color:#012A4A;

            }

            .social-header p{

            margin:0;

            color:#777;

            }

            @media(max-width:768px){

            .social-header{

            flex-direction:column;

            text-align:center;

            }

            .social-icon{

            margin-right:0;

            margin-bottom:20px;

            }

            }
            /*=========================================
            ADDRESS CARD
            =========================================*/

            .premium-address-card{

            background:linear-gradient(135deg,#ffffff,#f7fbff);

            border-radius:24px;

            padding:35px;

            border:1px solid #e8eef5;

            box-shadow:0 20px 50px rgba(0,0,0,.05);

            margin-bottom:25px;

            }

            .address-header{

            display:flex;

            align-items:center;

            }

            .address-icon{

            width:70px;

            height:70px;

            border-radius:18px;

            background:linear-gradient(135deg,#012A4A,#014F86);

            display:flex;

            justify-content:center;

            align-items:center;

            color:#fff;

            font-size:30px;

            margin-right:20px;

            }

            .address-header h5{

            font-weight:700;

            color:#012A4A;

            margin-bottom:6px;

            }

            .address-header p{

            margin:0;

            color:#777;

            }

            .premium-textarea{

            border-radius:18px;

            border:2px solid #e7edf5;

            padding:18px;

            font-size:15px;

            resize:none;

            transition:.35s;

            box-shadow:0 10px 30px rgba(0,0,0,.03);

            }

            .premium-textarea:focus{

            border-color:#014F86;

            box-shadow:0 0 0 .25rem rgba(1,79,134,.12);

            }

            @media(max-width:768px){

            .address-header{

            flex-direction:column;

            text-align:center;

            }

            .address-icon{

            margin-right:0;

            margin-bottom:20px;

            }

            }
            /* ================================
            WORKING WIZARD
            ================================ */


            .wizard-content{

            display:none;

            animation:fadeIn .5s ease;

            }


            .wizard-content.active-step{

            display:block;

            }



            @keyframes fadeIn{

            from{

            opacity:0;

            transform:translateX(50px);

            }

            to{

            opacity:1;

            transform:translateX(0);

            }

            }



            .step.completed .circle,
            .step.completed .step-circle{

            background:linear-gradient(
            135deg,
            #198754,
            #28a745
            );

            color:white;

            }



            .step.active .circle,
            .step.active .step-circle{

            background:linear-gradient(
            135deg,
            #012A4A,
            #014F86
            );

            color:white;

            }


            .wizard-line.active-line{

            background:#014F86;

            }

            .wizard-section{

            display:none;

            }


            .wizard-section.active{

            display:block;

            animation:slideWizard .5s ease;

            }



            @keyframes slideWizard{

            from{

            opacity:0;
            transform:translateX(50px);

            }

            to{

            opacity:1;
            transform:translateX(0);

            }

            }



            .step.completed .step-circle{

            background:#198754;
            color:white;

            }


            .wizard-line.active{

            background:#014F86;

            }
</style>

</head>

<body>

<div class="bg-shape bg1"></div>
<div class="bg-shape bg2"></div>
<div class="bg-shape bg3"></div>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg fixed-top">

<div class="container">

<a class="navbar-brand" href="#">

<img src="./img/latestlogo.webp">

<div class="brand-text">

<h5>Students' Alumni Cell</h5>

<small>22nd Annual Alumni Meet 2026</small>

</div>

</a>

<button class="navbar-toggler bg-light"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="#">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Schedule</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Accommodation</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Contact</a>
</li>

<li class="nav-item">
<a href="login_aam.php" class="btn btn-login ms-lg-3">
Login
</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- ================= HERO ================= -->

<section class="hero">

<div class="hero-badge">

🎉 9–11 January 2026

</div>

<h1>

22<sup>nd</sup> Annual Alumni Meet

<br>

<span>IIT Kharagpur</span>

</h1>

<p>

Reconnect with your classmates, relive unforgettable memories,
explore the transformed campus, and celebrate your lifelong
bond with IIT Kharagpur.

</p>

<div class="hero-buttons">

<a href="#registration" class="btn btn-register">

Register Now

</a>

<a href="login_aam.php" class="btn btn-outline-custom">

Already Registered?

</a>

</div>

</section>

<!-- ================= REGISTRATION ================= -->

<section id="registration" class="registration-wrapper">

<div class="registration-card">

        <div class="registration-title">

        <h2>Alumni Registration Form</h2>

        <p>Complete your registration in a few simple steps.</p>

</div>
<!-- =======================================
Registration Status
======================================= -->

<div class="row mb-5">

<div class="col-lg-8">

<div class="progress shadow-sm" style="height:16px;border-radius:50px;">

<div class="progress-bar progress-bar-striped progress-bar-animated"

style="width:12%;
background:linear-gradient(90deg,#014F86,#1d9bf0);">

12%

</div>

</div>

</div>

<div class="col-lg-4 text-lg-end mt-3 mt-lg-0">

<span class="badge rounded-pill bg-primary px-4 py-3 fs-6">

<i class="fas fa-edit me-2"></i>

Registration Started

</span>

</div>

</div>

<!-- =======================================
Premium Wizard
======================================= -->



<!-- =======================================
FORM START
======================================= -->

<form

action="register.php"

method="POST"

enctype="multipart/form-data"

id="registrationForm"

>

<!-- =======================================
PERSONAL INFORMATION CARD
======================================= -->

<div class="premium-section">

<div class="section-header">

<div class="section-icon">

<i class="fas fa-user-circle"></i>

</div>

<div>

<h3>Personal Information</h3>

<p>

Please provide your official personal information exactly as per your records.

</p>

</div>

</div>

<hr class="section-divider">

<div class="alert alert-primary border-0 shadow-sm rounded-4">

<i class="fas fa-circle-info me-2"></i>

Fields marked with

<strong style="color:red;">*</strong>

are mandatory.

</div>

<div class="row g-4">



<!-- ==========================================
SECTION : PERSONAL DETAILS
========================================== -->

<div class="premium-card wizard-section active" id="section1">

<div class="premium-card-header">

<div class="icon-box">

<i class="fas fa-user-circle"></i>

</div>

<div>

<h3>Personal Information</h3>

<p>

Please provide your official information exactly as per your records.

</p>

</div>

</div>

<hr class="section-divider">



<div class="row g-4">
    <!-- =======================================================
FULL NAME
======================================================= -->

<div class="col-lg-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-user me-2 text-primary"></i>

            Full Name
            <span class="text-danger">*</span>

        </label>

        <input
            type="text"
            name="name"
            class="form-control premium-control"
            maxlength="150"
            placeholder="Enter your full name as per institute records"
            required>

        <small class="form-hint">

            Please enter your name exactly as it appears in IIT records.

        </small>

    </div>

</div>

<!-- =======================================================
EMAIL
======================================================= -->

<div class="col-lg-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-envelope me-2 text-primary"></i>

            Email Address
            <span class="text-danger">*</span>

        </label>

        <input
            type="email"
            name="email"
            class="form-control premium-control"
            maxlength="100"
            placeholder="example@email.com"
            required>

        <span id="user-email-availability-status"
              class="email-status"></span>

        <small class="form-hint">

            This email will be used for all Alumni Meet communication.

        </small>

    </div>

</div>

<!-- =======================================================
MOBILE
======================================================= -->

<div class="col-lg-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-mobile-screen-button me-2 text-primary"></i>

            Cell Number
            <span class="text-danger">*</span>

        </label>

        <input
            type="text"
            name="mobile"
            class="form-control premium-control"
            maxlength="50"
            placeholder="+91 9876543210"
            required>

        <small class="form-hint">

            WhatsApp number preferred.

        </small>

    </div>

</div>

<!-- =======================================================
DOB
======================================================= -->

<div class="col-lg-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-calendar-days me-2 text-primary"></i>

            Date of Birth
            <span class="text-danger">*</span>

        </label>

        <input
            type="date"
            name="dob"
            class="form-control premium-control"
            required>

        <small class="form-hint">

            Required for verification.

        </small>

    </div>

</div>
<!-- =======================================================
ID TYPE
======================================================= -->

<div class="col-lg-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-id-card me-2 text-primary"></i>

            Government ID Type
            <span class="text-danger">*</span>

        </label>

        <select
            name="idtype"
            class="form-select premium-control"
            required>

            <option value="">Choose ID Type</option>

            <option value="Aadhar Number">
                Aadhaar Card
            </option>

            <option value="Passport Number">
                Passport
            </option>

            <option value="PANcard">
                PAN Card
            </option>

            <option value="Driving license">
                Driving Licence
            </option>

            <option value="OCI Card">
                OCI Card
            </option>

        </select>

        <small class="form-hint">

            Select the ID proof that you will carry during the Alumni Meet.

        </small>

    </div>

</div>

<!-- =======================================================
ID NUMBER
======================================================= -->

<div class="col-lg-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-fingerprint me-2 text-primary"></i>

            ID Number
            <span class="text-danger">*</span>

        </label>

        <input
            type="text"
            name="idnumber"
            maxlength="100"
            class="form-control premium-control"
            placeholder="Enter your ID Number"
            required>

        <small class="form-hint">

            This information is used only for identity verification.

        </small>

    </div>

</div>

<!-- =======================================================
SOCIAL MEDIA
======================================================= -->

<div class="col-12">

    <div class="premium-social-card">

        <div class="social-header">

            <div class="social-icon">

                <i class="fas fa-share-nodes"></i>

            </div>

            <div>

                <h5>

                    Social Media Profile

                </h5>

                <p>

                    Optional — Help your batchmates reconnect with you.

                </p>

            </div>

        </div>

        <div class="premium-input mt-4">

            <label class="premium-label">

                LinkedIn / Facebook / X / Instagram

            </label>

            <input

                type="text"

                name="social_links"

                maxlength="150"

                class="form-control premium-control"

                placeholder="https://linkedin.com/in/yourprofile">

            <small class="form-hint">

                You may enter one or multiple profile links.

            </small>

        </div>

    </div>

</div>
<!-- =======================================================
RESIDENTIAL ADDRESS
======================================================= -->

<div class="col-12">

    <div class="premium-address-card">

        <div class="address-header">

            <div class="address-icon">

                <i class="fas fa-location-dot"></i>

            </div>

            <div>

                <h5>Residential Address</h5>

                <p>

                    Please enter your current mailing address.

                </p>

            </div>

        </div>

        <div class="premium-input mt-4">

            <label class="premium-label">

                Complete Address

                <span class="text-danger">*</span>

            </label>

            <textarea

                class="form-control premium-textarea"

                name="address"

                rows="4"

                maxlength="200"

                placeholder="House No, Street, Area, Landmark"

                required></textarea>

            <small class="form-hint">

                This address may be used for official Alumni correspondence.

            </small>

        </div>

    </div>

</div>

<!-- =======================================================
CITY
======================================================= -->

<div class="col-md-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-city me-2 text-primary"></i>

            City

            <span class="text-danger">*</span>

        </label>

        <input

            type="text"

            name="city"

            maxlength="50"

            class="form-control premium-control"

            placeholder="Kharagpur"

            required>

    </div>

</div>

<!-- =======================================================
STATE
======================================================= -->

<div class="col-md-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-map me-2 text-primary"></i>

            State

            <span class="text-danger">*</span>

        </label>

        <input

            type="text"

            name="state"

            maxlength="50"

            class="form-control premium-control"

            placeholder="West Bengal"

            required>

    </div>

</div>

<!-- =======================================================
COUNTRY
======================================================= -->

<div class="col-md-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-earth-asia me-2 text-primary"></i>

            Country

            <span class="text-danger">*</span>

        </label>

        <input

            type="text"

            name="country"

            maxlength="50"

            value="India"

            class="form-control premium-control"

            placeholder="Country"

            required>

    </div>

</div>

<!-- =======================================================
ZIP CODE
======================================================= -->

<div class="col-md-6">

    <div class="premium-input">

        <label class="premium-label">

            <i class="fas fa-mail-bulk me-2 text-primary"></i>

            Zip Code

            <span class="text-danger">*</span>

        </label>

        <input

            type="text"

            name="zipcode"

            maxlength="20"

            class="form-control premium-control"

            placeholder="721302"

            required>

    </div>

</div>

</div>

</div>

<!-- ===========================
END PERSONAL INFORMATION
=========================== -->
<!-- =======================================================
PART 2
WORK DETAILS
======================================================= -->
<div class="premium-card mt-5 wizard-section" id="section2">

    <div class="premium-card-header">

        <div class="icon-box">
            <i class="fas fa-briefcase"></i>
        </div>

        <div>
            <h3>Professional Information</h3>
            <p>
                Tell us about your current professional career.
            </p>
        </div>

    </div>

    <hr class="section-divider">

    <div class="alert alert-warning border-0 rounded-4">

        <i class="fas fa-building me-2"></i>

        This information helps us build the Alumni Professional Network.

    </div>

    <div class="row g-4">

        <!-- Current Position -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-user-tie me-2 text-primary"></i>

                    Current Position

                    <span class="text-danger">*</span>

                </label>

                <input

                    type="text"

                    name="profession"

                    maxlength="100"

                    class="form-control premium-control"

                    placeholder="Software Engineer"

                    required>

                <small class="form-hint">

                    Mention your present role.

                </small>

            </div>

        </div>

        <!-- Designation -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-id-badge me-2 text-primary"></i>

                    Current Designation

                </label>

                <input

                    type="text"

                    name="designation"

                    maxlength="100"

                    class="form-control premium-control"

                    placeholder="Senior Software Engineer">

                <small class="form-hint">

                    Optional.

                </small>

            </div>

        </div>

        <!-- Organisation -->

        <div class="col-12">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-building me-2 text-primary"></i>

                    Organisation Name

                    <span class="text-danger">*</span>

                </label>

                <input

                    type="text"

                    name="organisation"

                    maxlength="100"

                    class="form-control premium-control"

                    placeholder="Google, Microsoft, TCS..."

                    required>

            </div>

        </div>

    </div>

</div>

<!-- =======================================================
OFFICE ADDRESS
======================================================= -->

<div class="premium-address-card mt-4">

    <div class="address-header">

        <div class="address-icon">

            <i class="fas fa-building-columns"></i>

        </div>

        <div>

            <h5>Office Address</h5>

            <p>

                Current office or organization address.

            </p>

        </div>

    </div>

    <div class="premium-input mt-4">

        <label class="premium-label">

            Office Address

        </label>

        <textarea

            class="form-control premium-textarea"

            rows="4"

            maxlength="200"

            name="waddress"

            placeholder="Company Address"></textarea>

    </div>

</div>

<div class="row g-4 mt-2">

    <!-- Office City -->

    <div class="col-md-6">

        <div class="premium-input">

            <label class="premium-label">

                <i class="fas fa-city me-2 text-primary"></i>

                City

            </label>

            <input

                type="text"

                name="wcity"

                maxlength="50"

                class="form-control premium-control"

                placeholder="Bangalore">

        </div>

    </div>

    <!-- Office State -->

    <div class="col-md-6">

        <div class="premium-input">

            <label class="premium-label">

                <i class="fas fa-map me-2 text-primary"></i>

                State

            </label>

            <input

                type="text"

                name="wstate"

                maxlength="50"

                class="form-control premium-control"

                placeholder="Karnataka">

        </div>

    </div>

    <!-- Office Country -->

    <div class="col-md-6">

        <div class="premium-input">

            <label class="premium-label">

                <i class="fas fa-earth-asia me-2 text-primary"></i>

                Country

            </label>

            <input

                type="text"

                name="wcountry"

                maxlength="50"

                class="form-control premium-control"

                placeholder="India">

        </div>

    </div>

    <!-- Zip -->

    <div class="col-md-6">

        <div class="premium-input">

            <label class="premium-label">

                <i class="fas fa-envelope-open-text me-2 text-primary"></i>

                Zip Code

            </label>

            <input

                type="text"

                name="wzipcode"

                maxlength="20"

                class="form-control premium-control"

                placeholder="560001">

        </div>

    </div>

</div>

<!-- NEXT BUTTON -->

<div class="text-end mt-5">

   <button 
type="button"
class="btn btn-register px-5 py-3 next-step"
data-next="3">
        Continue to IIT Affiliation

        <i class="fas fa-arrow-right ms-2"></i>

    </button>

</div>
<!-- =======================================================
PART 3
IIT KHARAGPUR AFFILIATION
======================================================= -->
<div class="premium-card mt-5 wizard-section" id="section3">

    <div class="premium-card-header">

        <div class="icon-box">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div>
            <h3>IIT Kharagpur Affiliation</h3>
            <p>
                Help us reconnect you with your batchmates and department.
            </p>
        </div>

    </div>

    <hr class="section-divider">

    <div class="alert alert-info border-0 rounded-4">

        <i class="fas fa-circle-info me-2"></i>

        Please provide your academic details exactly as they were during your stay at IIT Kharagpur.

    </div>

    <div class="row g-4">

        <!-- Academic Course -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-book me-2 text-primary"></i>

                    Academic Course Name

                    <span class="text-danger">*</span>

                </label>

                <input
                    type="text"
                    name="course"
                    maxlength="20"
                    class="form-control premium-control"
                    placeholder="Computer Science"
                    required>

                <small class="form-hint">

                    Example: Computer Science, Mechanical Engineering etc.

                </small>

            </div>

        </div>

        <!-- Degree -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-user-graduate me-2 text-primary"></i>

                    Degree

                    <span class="text-danger">*</span>

                </label>

                <select
                    class="form-select premium-control"
                    name="degree"
                    required>

                    <option value="" selected disabled>
                        Select Degree
                    </option>

                    <option value="BTech">BTech</option>
                    <option value="DualDegree">Dual Degree</option>
                    <option value="BArch">BArch</option>
                    <option value="BSc">BSc</option>
                    <option value="MTech">MTech</option>
                    <option value="MSc(Integrated)">MSc (Integrated)</option>
                    <option value="MSc(Two years)">MSc (Two Years)</option>
                    <option value="MBA">MBA</option>
                    <option value="LLB">LLB</option>
                    <option value="LLM">LLM</option>
                    <option value="MMST">MMST</option>
                    <option value="EMBA">EMBA</option>
                    <option value="MS">MS</option>
                    <option value="MRP">MRP</option>
                    <option value="PGDST">PGDST</option>
                    <option value="PGDBA">PGDBA</option>
                    <option value="DIIT">DIIT</option>
                    <option value="Other">Other</option>

                </select>

            </div>

        </div>

        <!-- Department -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-building-columns me-2 text-primary"></i>

                    Department

                    <span class="text-danger">*</span>

                </label>

                <select
                    class="form-select premium-control"
                    name="dept"
                    required>

                    <option selected value="">
                        Select Department
                    </option>

                    <option value="AE">
                        Aerospace Engineering
                    </option>

                    <option value="AG">
                        Agricultural & Food Engineering
                    </option>

                    <option value="AR">
                        Architecture & Regional Planning
                    </option>

                    <option value="BT">
                        Biotechnology
                    </option>

                    <option value="CE">
                        Civil Engineering
                    </option>

                    <option value="CH">
                        Chemical Engineering
                    </option>

                    <option value="CS">
                        Computer Science & Engineering
                    </option>

                    <option value="CY">
                        Chemistry
                    </option>

                    <option value="EE">
                        Electrical Engineering
                    </option>

                    <option value="EC">
                        Electronics & Electrical Communication Engineering
                    </option>

                    <option value="GG">
                        Geology & Geophysics
                    </option>

                    <option value="HS">
                        Humanities & Social Sciences
                    </option>

                    <option value="IM">
                        Industrial & Systems Engineering
                    </option>

                    <option value="MA">
                        Mathematics
                    </option>

                    <option value="ME">
                        Mechanical Engineering
                    </option>

                    <option value="MT">
                        Metallurgical & Materials Engineering
                    </option>

                    <option value="MI">
                        Mining Engineering
                    </option>

                    <option value="NA">
                        Ocean Engineering & Naval Architecture
                    </option>

                    <option value="PH">
                        Physics
                    </option>

                    <!-- Continue all remaining department options
                         from your original code here -->

                </select>

            </div>

        </div>
                <!-- =======================================================
        HALL OF RESIDENCE
        ======================================================= -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-building me-2 text-primary"></i>

                    Hall of Residence

                    <span class="text-danger">*</span>

                </label>

                <select
                    class="form-select premium-control"
                    name="hall"
                    required>

                    <option selected value="">
                        Select Hall
                    </option>

                    <option value="SAM">Sir Ashutosh Mukherjee Hall</option>
                    <option value="AZ">Azad Hall</option>
                    <option value="BCR">B C Roy Hall</option>
                    <option value="BRAH">B R Ambedkar Hall</option>
                    <option value="GH">Gokhale Hall</option>
                    <option value="HJB">Homi J Bhabha Hall</option>
                    <option value="JCB">J C Bose Hall</option>
                    <option value="LLR">Lala Lajpat Rai Hall</option>
                    <option value="LBS">Lal Bahadur Shastri Hall</option>
                    <option value="MMM">Madan Mohan Malviya Hall</option>
                    <option value="MS">Megnad Saha Hall</option>
                    <option value="MT">Mother Teresa Hall</option>
                    <option value="NH">Nehru Hall</option>
                    <option value="PT">Patel Hall</option>
                    <option value="RK">Radha Krishnan Hall</option>
                    <option value="RP">Rajendra Prasad Hall</option>
                    <option value="RLB">Rani Laxmibai Hall</option>
                    <option value="SN">Sarojini Naidu / Indira Gandhi Hall</option>
                    <option value="SNVH">Sister Nivedita Hall</option>
                    <option value="VS">Vidyasagar Hall</option>
                    <option value="VSRC">Vikram Sarabhai Residential Complex</option>
                    <option value="ZH">Zakir Hussain Hall</option>

                </select>

            </div>

        </div>

        <!-- =======================================================
        POSITION HELD
        ======================================================= -->

        <div class="col-12">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-award me-2 text-primary"></i>

                    Position Held in IIT KGP

                </label>

                <input
                    type="text"
                    name="positionHolding"
                    maxlength="100"
                    class="form-control premium-control"
                    placeholder="Example: Hall President, GSec, Captain, Secretary">

                <small class="form-hint">

                    Optional. Mention any leadership or student position held during your stay.

                </small>

            </div>

        </div>

        <!-- =======================================================
        JOIN YEAR
        ======================================================= -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-calendar-plus me-2 text-primary"></i>

                    Join Year

                    <span class="text-danger">*</span>

                </label>

                <input
                    type="number"
                    min="1951"
                    max="2025"
                    name="yoj"
                    class="form-control premium-control"
                    placeholder="1971"
                    required>

            </div>

        </div>

        <!-- =======================================================
        YEAR OF GRADUATION
        ======================================================= -->

        <div class="col-lg-6">

            <div class="premium-input">

                <label class="premium-label">

                    <i class="fas fa-calendar-check me-2 text-primary"></i>

                    Year of Graduation

                    <span class="text-danger">*</span>

                </label>

                <input
                    type="number"
                    min="1951"
                    max="2030"
                    name="yog"
                    class="form-control premium-control"
                    placeholder="1976"
                    required>

            </div>

        </div>

    </div>

</div>

<!-- =======================================================
NEXT SECTION
PAYMENT DETAILS
======================================================= -->

<!-- =======================================================
PART 4
PAYMENT DETAILS
======================================================= -->

<div class="premium-card mt-5 wizard-section" id="section4">


<div class="premium-card-header">

<div class="icon-box">

<i class="fas fa-credit-card"></i>

</div>


<div>

<h3>
Registration Payment
</h3>

<p>
Complete your Alumni Meet registration payment details.
</p>

</div>

</div>


<hr class="section-divider">



<div class="alert alert-success border-0 rounded-4">

<i class="fas fa-circle-check me-2"></i>

Your registration will be confirmed after successful payment verification.

</div>



<div class="row g-4">


<!-- Registration Category -->

<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">

<i class="fas fa-users me-2 text-primary"></i>

Registration Category

<span class="text-danger">*</span>

</label>



<select

name="registration_category"

class="form-select premium-control"

required>


<option value="">

Select Category

</option>


<option value="Alumni">

Alumni

</option>


<option value="Alumni Couple">

Alumni + Spouse

</option>


<option value="Alumni Family">

Alumni + Family

</option>


<option value="Student">

Student

</option>



</select>


</div>


</div>




<!-- Number of Participants -->


<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">

<i class="fas fa-user-group me-2 text-primary"></i>

Number of Participants

<span class="text-danger">*</span>

</label>



<input

type="number"

name="participants"

min="1"

max="10"

class="form-control premium-control"

placeholder="Example: 2"

required>


</div>


</div>





<!-- Fee Amount -->


<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">

<i class="fas fa-indian-rupee-sign me-2 text-primary"></i>

Registration Fee Amount

</label>


<input

type="text"

name="payment_amount"

class="form-control premium-control"

value="₹ 5000"

readonly>


<small class="form-hint">

Final amount will be calculated according to your category.

</small>


</div>


</div>





<!-- Payment Date -->


<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">

<i class="fas fa-calendar-check me-2 text-primary"></i>

Payment Date

<span class="text-danger">*</span>

</label>



<input

type="date"

name="payment_date"

class="form-control premium-control"

required>


</div>


</div>





<!-- Payment Mode -->


<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">


<i class="fas fa-wallet me-2 text-primary"></i>

Payment Mode

<span class="text-danger">*</span>


</label>



<select

name="payment_mode"

class="form-select premium-control"

required>


<option value="">

Select Payment Mode

</option>


<option value="UPI">

UPI

</option>


<option value="Net Banking">

Net Banking

</option>


<option value="Credit Card">

Credit Card

</option>


<option value="Debit Card">

Debit Card

</option>


<option value="NEFT">

NEFT / RTGS

</option>



</select>


</div>


</div>





<!-- Transaction ID -->


<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">


<i class="fas fa-receipt me-2 text-primary"></i>

Transaction ID

<span class="text-danger">*</span>


</label>



<input


type="text"


name="transaction_id"


maxlength="100"


class="form-control premium-control"


placeholder="Enter payment transaction number"


required>


<small class="form-hint">

Example: UPI reference number / Bank transaction ID.

</small>


</div>


</div>





<!-- Payment Screenshot -->


<div class="col-12">


<div class="premium-address-card">


<div class="address-header">


<div class="address-icon">

<i class="fas fa-file-image"></i>

</div>


<div>

<h5>

Upload Payment Proof

</h5>

<p>

Upload screenshot or payment receipt.

</p>


</div>


</div>



<div class="premium-input mt-4">


<label class="premium-label">


Payment Receipt

<span class="text-danger">*</span>


</label>



<input


type="file"


name="payment_receipt"


class="form-control premium-control"


accept="image/*,.pdf"


required>



<small class="form-hint">

Allowed formats: JPG, PNG, PDF (Maximum 5 MB)

</small>



</div>



</div>


</div>




</div>


</div>
<!-- =======================================================
PART 5
ACCOMMODATION DETAILS
======================================================= -->

<div class="premium-card mt-5 wizard-section" id="section5">


    <div class="premium-card-header">

        <div class="icon-box">

            <i class="fas fa-hotel"></i>

        </div>


        <div>

            <h3>
                Accommodation Details
            </h3>

            <p>
                Provide your stay requirements during the Alumni Meet.
            </p>

        </div>


    </div>


    <hr class="section-divider">



    <div class="alert alert-info border-0 rounded-4">

        <i class="fas fa-bed me-2"></i>

        Accommodation facility will be arranged inside IIT Kharagpur campus based on availability.

    </div>



    <div class="row g-4">



        <!-- Accommodation Required -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">

                    <i class="fas fa-hotel me-2 text-primary"></i>

                    Accommodation Required

                    <span class="text-danger">*</span>

                </label>



                <select

                    name="accommodation_required"

                    id="accommodation_required"

                    class="form-select premium-control"

                    required>


                    <option value="">

                        Select Option

                    </option>


                    <option value="Yes">

                        Yes, I need accommodation

                    </option>


                    <option value="No">

                        No, I will arrange my own stay

                    </option>



                </select>


            </div>


        </div>





        <!-- Room Type -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">

                    <i class="fas fa-door-open me-2 text-primary"></i>

                    Preferred Room Type

                </label>



                <select

                    name="room_type"

                    class="form-select premium-control">


                    <option value="">

                        Select Room Type

                    </option>


                    <option value="Single">

                        Single Occupancy

                    </option>


                    <option value="Double">

                        Double Occupancy

                    </option>


                    <option value="Family">

                        Family Room

                    </option>


                    <option value="Guest House">

                        Guest House

                    </option>



                </select>



            </div>


        </div>







        <!-- Number of Rooms -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">

                    <i class="fas fa-bed me-2 text-primary"></i>

                    Number of Rooms Required

                </label>



                <input

                    type="number"

                    name="number_of_rooms"

                    min="1"

                    max="5"

                    class="form-control premium-control"

                    placeholder="Example: 1">


            </div>


        </div>







        <!-- Number of Guests -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">

                    <i class="fas fa-user-group me-2 text-primary"></i>

                    Total Guests

                </label>



                <input

                    type="number"

                    name="total_guest"

                    min="1"

                    max="10"

                    class="form-control premium-control"

                    placeholder="Example: 2">


            </div>


        </div>








        <!-- Arrival Date -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">

                    <i class="fas fa-calendar-plus me-2 text-primary"></i>

                    Arrival Date

                    <span class="text-danger">*</span>

                </label>



                <input

                    type="date"

                    name="arrival_date"

                    class="form-control premium-control"

                    required>



            </div>


        </div>








        <!-- Arrival Time -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">

                    <i class="fas fa-clock me-2 text-primary"></i>

                    Arrival Time

                </label>



                <input

                    type="time"

                    name="arrival_time"

                    class="form-control premium-control">



            </div>


        </div>








        <!-- Departure Date -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">


                    <i class="fas fa-calendar-minus me-2 text-primary"></i>

                    Departure Date

                    <span class="text-danger">*</span>


                </label>



                <input

                    type="date"

                    name="departure_date"

                    class="form-control premium-control"

                    required>



            </div>


        </div>








        <!-- Departure Time -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">

                    <i class="fas fa-clock me-2 text-primary"></i>

                    Departure Time

                </label>



                <input

                    type="time"

                    name="departure_time"

                    class="form-control premium-control">



            </div>


        </div>







        <!-- Guest Details -->


        <div class="col-12">


            <div class="premium-address-card">



                <div class="address-header">


                    <div class="address-icon">

                        <i class="fas fa-users"></i>

                    </div>



                    <div>

                        <h5>
                            Accompanying Guest Details
                        </h5>

                        <p>
                            Provide details of spouse/family members accompanying you.
                        </p>


                    </div>


                </div>





                <div class="premium-input mt-4">


                    <label class="premium-label">

                        Guest Name & Relationship

                    </label>



                    <textarea

                        name="guest_details"

                        rows="4"

                        maxlength="500"

                        class="form-control premium-textarea"

                        placeholder="Example: 1. Ananya Singh - Spouse 2. Rahul Singh - Son">


                    </textarea>



                    <small class="form-hint">

                        Leave blank if you are attending alone.

                    </small>



                </div>




            </div>


        </div>







        <!-- Special Requirement -->


        <div class="col-12">


            <div class="premium-address-card">


                <div class="address-header">


                    <div class="address-icon">

                        <i class="fas fa-notes-medical"></i>

                    </div>



                    <div>

                        <h5>
                            Special Requirements
                        </h5>

                        <p>
                            Mention any special assistance required.
                        </p>


                    </div>


                </div>





                <div class="premium-input mt-4">



                    <textarea

                        name="special_requirement"

                        rows="4"

                        maxlength="500"

                        class="form-control premium-textarea"

                        placeholder="Medical assistance, elderly support, wheelchair requirement etc.">


                    </textarea>



                </div>




            </div>


        </div>




    </div>


</div>





<!-- NEXT BUTTON -->


<div class="text-end mt-5">

<button 
type="button"
class="btn btn-register px-5 py-3 next-step"
data-next="4">


Continue to Travel Details


<i class="fas fa-arrow-right ms-2"></i>


</button>


</div>
<!-- =======================================================
PART 6
TRAVEL DETAILS
======================================================= -->

<div class="premium-card mt-5 wizard-section" id="section6">


    <div class="premium-card-header">


        <div class="icon-box">

            <i class="fas fa-plane"></i>

        </div>



        <div>

            <h3>
                Travel Details
            </h3>

            <p>
                Provide your arrival and departure journey details.
            </p>

        </div>



    </div>



    <hr class="section-divider">



    <div class="alert alert-warning border-0 rounded-4">


        <i class="fas fa-route me-2"></i>


        Travel information helps us arrange pickup and transportation support.


    </div>





    <div class="row g-4">



        <!-- Arrival Mode -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">


                    <i class="fas fa-route me-2 text-primary"></i>


                    Arrival Mode


                    <span class="text-danger">*</span>


                </label>




                <select

                    name="arrival_mode"

                    id="arrival_mode"

                    class="form-select premium-control"

                    required>



                    <option value="">

                        Select Travel Mode

                    </option>



                    <option value="Flight">

                        Flight

                    </option>



                    <option value="Train">

                        Train

                    </option>



                    <option value="Road">

                        Road / Car

                    </option>



                    <option value="Other">

                        Other

                    </option>



                </select>



            </div>


        </div>


        <!-- Departure Mode -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">


                    <i class="fas fa-plane-departure me-2 text-primary"></i>


                    Departure Mode


                    <span class="text-danger">*</span>


                </label>




                <select


                    name="departure_mode"


                    class="form-select premium-control"


                    required>




                    <option value="">


                        Select Travel Mode


                    </option>




                    <option value="Flight">

                        Flight

                    </option>




                    <option value="Train">

                        Train

                    </option>




                    <option value="Road">

                        Road / Car

                    </option>




                    <option value="Other">

                        Other

                    </option>



                </select>



            </div>


        </div>


        <!-- Arrival Date -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">


                    <i class="fas fa-calendar-day me-2 text-primary"></i>


                    Arrival Journey Date



                </label>




                <input


                    type="date"


                    name="travel_arrival_date"


                    class="form-control premium-control">



            </div>


        </div>






        <!-- Arrival Time -->


        <div class="col-lg-6">


            <div class="premium-input">


                <label class="premium-label">


                    <i class="fas fa-clock me-2 text-primary"></i>


                    Arrival Time



                </label>




                <input


                    type="time"


                    name="travel_arrival_time"


                    class="form-control premium-control">



            </div>


        </div>






            <div class="col-12">


                <div class="premium-address-card">


                    <div class="address-header">


                    <div class="address-icon">


                            <i class="fas fa-plane"></i>


                        </div>



                    <div>


                            <h5>

                            Flight Information

                            </h5>


                            <p>

                            Provide details if you are travelling by air.

                            </p>


                    </div>



            </div>



<div class="row g-4 mt-2">



     <div class="col-lg-6">


            <div class="premium-input">


            <label class="premium-label">


            <i class="fas fa-ticket me-2 text-primary"></i>


            Flight Number


            </label>



            <input


            type="text"


            name="flight_number"


            maxlength="50"


            class="form-control premium-control"


            placeholder="Example: AI-302">


            </div>


     </div>





        <div class="col-lg-6">


                    <div class="premium-input">


                    <label class="premium-label">


                    <i class="fas fa-plane-arrival me-2 text-primary"></i>


                    Arrival Airport


                    </label>



                    <input


                    type="text"


                    name="arrival_airport"


                    maxlength="100"


                    class="form-control premium-control"


                    placeholder="Example: Kolkata Airport">


                    </div>


        </div>




        </div>



      </div>


</div>



<div class="col-12">


    <div class="premium-address-card">


            <div class="address-header">


            <div class="address-icon">


            <i class="fas fa-train"></i>


            </div>




            <div>


            <h5>

            Railway Information

            </h5>


                <p>

                Provide train details if applicable.

                </p>


    </div>



    </div>





    <div class="row g-4 mt-2">





        <div class="col-lg-6">


                <div class="premium-input">


                <label class="premium-label">


                <i class="fas fa-train-subway me-2 text-primary"></i>


                Train Number


                </label>



                <input


                type="text"


                name="train_number"


                maxlength="50"


                class="form-control premium-control"


                placeholder="Example: 12810">


                </div>


        </div>



        <div class="col-lg-6">


            <div class="premium-input">


            <label class="premium-label">


            <i class="fas fa-location-dot me-2 text-primary"></i>


            Arrival Railway Station


            </label>



            <input


            type="text"


            name="railway_station"


            maxlength="100"


            class="form-control premium-control"


            placeholder="Kharagpur Junction">


            </div>


        </div>






    </div>


    </div>


</div>








<!-- =======================================================
PICKUP DETAILS
======================================================= -->


<div class="col-12">


<div class="premium-address-card">



<div class="address-header">


        <div class="address-icon">


        <i class="fas fa-car"></i>


        </div>




<div>


<h5>

Transportation Support

</h5>


<p>

Campus pickup and local transportation assistance.

</p>


</div>


</div>





<div class="row g-4 mt-2">





<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">


<i class="fas fa-car-side me-2 text-primary"></i>


Need Pickup Facility?


<span class="text-danger">*</span>


</label>



<select


name="pickup_required"


class="form-select premium-control"


required>



<option value="">


Select Option


</option>



<option value="Yes">

Yes, required

</option>




<option value="No">

No, not required

</option>



</select>



</div>


</div>







<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">


<i class="fas fa-location-arrow me-2 text-primary"></i>


Pickup Location


</label>




<input


type="text"


name="pickup_location"


maxlength="150"


class="form-control premium-control"


placeholder="Airport / Railway Station / Other">


</div>


</div>




</div>


</div>


</div>









<!-- =======================================================
EMERGENCY CONTACT
======================================================= -->


<div class="col-12">


<div class="premium-address-card">



<div class="address-header">


<div class="address-icon">


<i class="fas fa-phone-volume"></i>


</div>




<div>


<h5>

Emergency Contact Details

</h5>


<p>

Person to contact during emergency.

</p>


</div>


</div>






<div class="row g-4 mt-2">



<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">


<i class="fas fa-user me-2 text-primary"></i>


Contact Person Name


</label>



<input


type="text"


name="emergency_name"


maxlength="100"


class="form-control premium-control"


placeholder="Name">


</div>


</div>







<div class="col-lg-6">


<div class="premium-input">


<label class="premium-label">


<i class="fas fa-mobile-screen me-2 text-primary"></i>


Emergency Mobile Number


</label>



<input


type="text"


name="emergency_mobile"


maxlength="20"


class="form-control premium-control"


placeholder="+91 9876543210">


</div>


</div>



</div>


</div>


</div>





</div>


</div>





<!-- NEXT BUTTON -->


<div class="text-end mt-5">


<button 
type="button"
class="btn btn-register px-5 py-3 next-step"
data-next="5">



Continue to Final Declaration


<i class="fas fa-arrow-right ms-2"></i>


</button>


</div>
<!-- =======================================================
PART 7
FINAL DECLARATION & SUBMISSION
======================================================= -->


<div class="premium-card mt-5 wizard-section" id="section7">


    <div class="premium-card-header">


        <div class="icon-box">

            <i class="fas fa-file-signature"></i>

        </div>



        <div>

            <h3>
                Declaration & Confirmation
            </h3>

            <p>
                Please review and confirm your registration details.
            </p>

        </div>


    </div>



    <hr class="section-divider">





    <div class="alert alert-primary border-0 rounded-4">


        <i class="fas fa-shield-halved me-2"></i>


        Your information will be used only for Alumni Meet 2026 registration,
        communication and event management purposes.


    </div>







<!-- Declaration Box -->


<div class="premium-address-card">



<div class="address-header">


<div class="address-icon">


<i class="fas fa-user-check"></i>


</div>



<div>


<h5>

Alumni Declaration

</h5>


<p>

Please confirm the following declaration.

</p>


</div>


</div>


<div class="mt-4">


<div class="form-check mb-3">


<input

class="form-check-input"

type="checkbox"

name="declaration"

id="declaration"

value="Yes"

required>



<label

class="form-check-label"

for="declaration">


I hereby declare that all information provided by me is true and correct
to the best of my knowledge.


<span class="text-danger">*</span>


</label>



</div>


<div class="form-check mb-3">


<input

class="form-check-input"

type="checkbox"

name="terms"

id="terms"

value="Accepted"

required>



<label

class="form-check-label"

for="terms">


I agree to the Alumni Meet 2026 terms and conditions,
event guidelines and registration policy.


<span class="text-danger">*</span>


</label>



</div>

<div class="form-check mb-3">


<input

class="form-check-input"

type="checkbox"

name="communication"

id="communication"

value="Yes">



<label

class="form-check-label"

for="communication">


I would like to receive future Alumni communication,
newsletters and event updates.


</label>



</div>





</div>



</div>









<!-- Registration Summary -->


<div class="premium-address-card mt-4">



<div class="address-header">


<div class="address-icon">


<i class="fas fa-circle-check"></i>


</div>




<div>


<h5>

Registration Confirmation

</h5>


<p>

Final verification before submission.

</p>


</div>



</div>


<div class="row mt-4 g-4">



<div class="col-lg-4">


<div class="card border-0 shadow-sm rounded-4 text-center p-4">


<i class="fas fa-lock fa-2x text-primary mb-3"></i>


<h6 class="fw-bold">

Secure

</h6>


<p class="small text-muted mb-0">

Your data is protected.

</p>


</div>


</div>


<div class="col-lg-4">


<div class="card border-0 shadow-sm rounded-4 text-center p-4">


<i class="fas fa-envelope-circle-check fa-2x text-primary mb-3"></i>


<h6 class="fw-bold">

Email Confirmation

</h6>


<p class="small text-muted mb-0">

Registration confirmation will be sent.

</p>


</div>


</div>


<div class="col-lg-4">


<div class="card border-0 shadow-sm rounded-4 text-center p-4">


<i class="fas fa-calendar-check fa-2x text-primary mb-3"></i>


<h6 class="fw-bold">

Meet 2026

</h6>


<p class="small text-muted mb-0">

See you at IIT Kharagpur.

</p>


</div>


</div>


</div>


</div>


<!-- Final Submit -->


<div class="text-center mt-5 mb-3">


<button


type="submit"


class="btn btn-register px-5 py-3 btn-lg"



id="submitBtn">


<i class="fas fa-paper-plane me-2"></i>


Submit Registration



</button>


</div>


<div class="text-center">


<p class="text-muted small">


<i class="fas fa-info-circle me-2"></i>


After submission, you will receive registration confirmation email/SMS.


</p>


</div>






</div>
<!-- PART 7 END -->


</form>

</div>

</section>
</body>
<!-- =======================================================
JAVASCRIPT
======================================================= -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<script>

   let currentWizard = 1;


function showWizard(step){


document.querySelectorAll(".wizard-section")
.forEach(function(item){

item.classList.remove("active");

});



let current =
document.getElementById(
"section"+step
);



if(current){

current.classList.add("active");

}




let wizardSteps =
document.querySelectorAll(".step");



wizardSteps.forEach(function(stepItem,index){


stepItem.classList.remove(
"active",
"completed"
);



if(index+1 < step){

stepItem.classList.add("completed");

}



if(index+1 == step){

stepItem.classList.add("active");

}



});



window.scrollTo({

top:300,

behavior:"smooth"

});


}





document.querySelectorAll(".next-step")
.forEach(function(button){


button.addEventListener(
"click",
function(){


let next =
this.dataset.next;


showWizard(next);


});


});



showWizard(1);



/*========================================================
 EMAIL AVAILABILITY CHECK
========================================================*/


const emailInput = document.querySelector('input[name="email"]');

const emailStatus = document.getElementById(
'user-email-availability-status'
);



if(emailInput){


emailInput.addEventListener('keyup',function(){


let email=this.value;



if(email.length < 5){

emailStatus.innerHTML="";

return;

}



// AJAX EMAIL CHECK


fetch(
"check_email.php",
{

method:"POST",

headers:{

"Content-Type":"application/x-www-form-urlencoded"

},

body:"email="+email

}

)


.then(response=>response.text())


.then(data=>{


emailStatus.innerHTML=data;



});



});



}






/*========================================================
 PAYMENT RECEIPT FILE VALIDATION
========================================================*/


const receiptInput =
document.querySelector('input[name="payment_receipt"]');



if(receiptInput){


receiptInput.addEventListener(
"change",
function(){


let file=this.files[0];



if(!file){

return;

}


let allowed=[

"image/jpeg",

"image/png",

"application/pdf"

];




if(!allowed.includes(file.type)){



alert(
"Only JPG, PNG or PDF files are allowed."
);



this.value="";


return;


}

// 5 MB


if(file.size > 5 * 1024 * 1024){


alert(
"File size must be less than 5 MB."
);



this.value="";


return;


}



});


}


/*========================================================
 SUBMIT BUTTON LOADING
========================================================*/


const form =
document.getElementById("registrationForm");

const submitBtn =
document.getElementById("submitBtn");



if(form){



form.addEventListener(
"submit",
function(){



submitBtn.disabled=true;



submitBtn.innerHTML=`

<i class="fas fa-spinner fa-spin me-2"></i>

Submitting Registration...

`;



});



}








/*========================================================
 SMOOTH SCROLL
========================================================*/


document.querySelectorAll(
'a[href^="#"]'
)

.forEach(anchor=>{


anchor.addEventListener(
"click",
function(e){



let target =
document.querySelector(
this.getAttribute("href")
);



if(target){


e.preventDefault();



target.scrollIntoView({

behavior:"smooth"

});


}



});


});









/*========================================================
 NAVBAR SHADOW ON SCROLL
========================================================*/


window.addEventListener(
"scroll",
function(){



let navbar =
document.querySelector(".navbar");



if(window.scrollY > 50){


navbar.style.boxShadow =
"0 20px 50px rgba(0,0,0,.25)";



}

else{


navbar.style.boxShadow =
"0 15px 40px rgba(0,0,0,.12)";


}



});



/*========================================================
 DYNAMIC REGISTRATION PROGRESS
========================================================*/


let inputs =
document.querySelectorAll(
"#registrationForm input, #registrationForm select, #registrationForm textarea"
);



function updateProgress(){



let completed=0;



inputs.forEach(
function(input){


if(
input.value.trim() !== ""
)

{

completed++;

}


});




let percentage =
Math.round(
(completed / inputs.length)*100
);



let bars =
document.querySelectorAll(
".progress-bar"
);



bars.forEach(
bar=>{


bar.style.width =
percentage+"%";


bar.innerHTML =
percentage+"%";



});


}



inputs.forEach(
input=>{


input.addEventListener(
"change",
updateProgress
);


input.addEventListener(
"keyup",
updateProgress
);



});



/*========================================================
 ACCOMMODATION ENABLE/DISABLE
========================================================*/


let accommodation =
document.getElementById(
"accommodation_required"
);



if(accommodation){



accommodation.addEventListener(
"change",
function(){



let fields=[

"room_type",

"number_of_rooms",

"total_guest"

];



fields.forEach(
function(name){



let field =
document.querySelector(
'[name="'+name+'"]'
);



if(this.value==="No"){



field.disabled=true;

field.value="";



}

else{



field.disabled=false;



}



}.bind(this)

);



});



}








/*========================================================
 DATE VALIDATION
========================================================*/


let arrival =
document.querySelector(
'[name="arrival_date"]'
);


let departure =
document.querySelector(
'[name="departure_date"]'
);



if(arrival && departure){



departure.addEventListener(
"change",
function(){



if(
arrival.value &&
departure.value < arrival.value
){



alert(
"Departure date cannot be before arrival date."
);



departure.value="";


}



});



}








/*========================================================
 STEP ANIMATION
========================================================*/


let cards =
document.querySelectorAll(
".premium-card"
);



cards.forEach(
card=>{


card.style.opacity="0";


card.style.transform=
"translateY(40px)";



});





window.addEventListener(
"scroll",
()=>{



cards.forEach(
card=>{


let position =
card.getBoundingClientRect().top;



if(position <
window.innerHeight - 100){



card.style.transition=
"all .7s ease";


card.style.opacity="1";


card.style.transform=
"translateY(0)";


}



});



});



</script>
