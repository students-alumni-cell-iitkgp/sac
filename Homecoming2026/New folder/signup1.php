<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>22nd Annual Alumni Meet 2026 Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

:root{

--primary:#012A4A;
--secondary:#014F86;
--gold:#FFD54F;
--white:#ffffff;
--light:#f7f9fc;
--shadow:0 20px 60px rgba(0,0,0,.12);

}

*{

margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;

}

html{

scroll-behavior:smooth;

}

body{

background:#eef3fb;
overflow-x:hidden;
padding-top:90px;

}

/***********************
Animated Background
************************/

.bg-shape{

position:fixed;
border-radius:50%;
filter:blur(100px);
opacity:.35;
z-index:-1;

animation:float 8s infinite alternate;

}

.bg1{

width:350px;
height:350px;
background:#4dabff;
top:-120px;
left:-100px;

}

.bg2{

width:300px;
height:300px;
background:#ffd54f;
bottom:-80px;
right:-80px;

animation-delay:2s;

}

.bg3{

width:220px;
height:220px;
background:#7b61ff;
top:40%;
left:50%;
animation-delay:4s;

}

@keyframes float{

100%{

transform:translateY(50px)
translateX(40px)
scale(1.15);

}

}

/***********************
Navbar
************************/

.navbar{

background:rgba(1,42,74,.92);
backdrop-filter:blur(18px);
box-shadow:0 15px 40px rgba(0,0,0,.12);
padding:14px 0;
transition:.4s;

}

.navbar-brand{

display:flex;
align-items:center;
gap:15px;

}

.navbar-brand img{

height:70px;

}

.brand-text{

display:flex;
flex-direction:column;

}

.brand-text h5{

color:white;
margin:0;
font-weight:700;

}

.brand-text small{

color:#FFD54F;
letter-spacing:2px;

}

.nav-link{

color:white!important;
margin:0 10px;
font-weight:600;
transition:.35s;
position:relative;

}

.nav-link:hover{

color:#FFD54F!important;

}

.btn-login{

background:#FFD54F;
border-radius:40px;
padding:10px 28px;
font-weight:700;

}

/***********************
Hero
************************/

.hero{

padding:100px 20px 70px;
text-align:center;

}

.hero-badge{

display:inline-block;
background:#FFD54F;
padding:8px 25px;
border-radius:50px;
font-weight:700;
margin-bottom:25px;

}

.hero h1{

font-size:58px;
font-weight:800;
color:#012A4A;
margin-bottom:20px;

}

.hero h1 span{

color:#014F86;

}

.hero p{

font-size:20px;
color:#555;
max-width:850px;
margin:auto;
line-height:1.8;

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

/***********************
Registration Card
************************/

.registration-wrapper{

max-width:1200px;
margin:auto;
padding:20px;

}

.registration-card{

background:rgba(255,255,255,.82);
backdrop-filter:blur(25px);
border-radius:30px;
box-shadow:var(--shadow);
padding:50px;
margin-top:40px;

}

.registration-title{

text-align:center;
margin-bottom:50px;

}

.registration-title h2{

font-weight:800;
color:#012A4A;

}

.registration-title p{

color:#777;

}

/***********************
Progress
************************/

.progress{

height:14px;
border-radius:30px;
overflow:hidden;
background:#dde5ef;

}

.progress-bar{

background:linear-gradient(90deg,#014F86,#2a9df4);

}

/***********************
Responsive
************************/

@media(max-width:992px){

.hero h1{

font-size:42px;

}

.registration-card{

padding:30px;

}

}

@media(max-width:768px){

.hero{

padding-top:70px;

}

.hero h1{

font-size:34px;

}

.navbar-brand img{

height:55px;

}

.brand-text{

display:none;

}

}
/* ==========================================
   DECLARATION
========================================== */

.form-check-label{

    line-height:1.9;

    font-size:15px;

    color:#555;

}

/* ==========================================
   SUBMIT BUTTON
========================================== */

.btn-submit-premium{

    border:none;

    background:linear-gradient(135deg,#012A4A,#014F86);

    color:white;

    font-size:20px;

    font-weight:700;

    padding:18px 60px;

    border-radius:60px;

    transition:.35s;

    box-shadow:0 20px 50px rgba(1,42,74,.25);

}

.btn-submit-premium:hover{

    transform:translateY(-6px);

    box-shadow:0 30px 60px rgba(1,42,74,.35);

}

/* ==========================================
   HELP CARD
========================================== */

.premium-help{

    background:linear-gradient(135deg,#012A4A,#014F86);

    color:white;

    border-radius:25px;

    padding:45px;

    margin-bottom:70px;

    box-shadow:0 25px 70px rgba(0,0,0,.18);

}

.premium-help h3{

    font-weight:700;

    margin-bottom:12px;

}

.premium-help p{

    opacity:.9;

}

.premium-help .btn{

    padding:14px 30px;

    border-radius:50px;

    font-weight:700;

}
/*========================================*/

.wizard{

display:flex;

justify-content:center;

align-items:center;

margin-bottom:60px;

flex-wrap:wrap;

}

.step{

text-align:center;

width:90px;

position:relative;

}

.circle{

width:70px;

height:70px;

margin:auto;

border-radius:50%;

background:#e9ecef;

display:flex;

justify-content:center;

align-items:center;

font-size:28px;

color:#999;

transition:.4s;

box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.step.active .circle{

background:linear-gradient(135deg,#012A4A,#014F86);

color:white;

transform:scale(1.08);

box-shadow:0 20px 40px rgba(1,42,74,.35);

}

.step p{

margin-top:15px;

font-weight:600;

font-size:15px;

color:#555;

}

.step.active p{

color:#012A4A;

}

.line{

width:90px;

height:5px;

background:#ddd;

margin-top:-34px;

border-radius:20px;

}

@media(max-width:992px){

.line{

display:none;

}

.step{

width:33%;

margin-bottom:30px;

}

}

.payment-box{

background:linear-gradient(135deg,#012A4A,#014F86);

color:#fff;

padding:35px;

border-radius:25px;

text-align:center;

box-shadow:0 20px 50px rgba(1,42,74,.25);

}

.payment-box h1{

font-size:52px;

font-weight:800;

margin:20px 0;

color:#FFD54F;

}

.payment-info h4{

font-weight:700;

color:#012A4A;

}

.payment-list{

padding-left:20px;

margin-top:20px;

}

.payment-list li{

margin-bottom:12px;

font-size:16px;

}

.alert-primary{

background:#edf6ff;

border:none;

}

.review-box{

background:#fff;

padding:30px;

border-radius:20px;

height:100%;

text-align:center;

transition:.35s;

box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.review-box:hover{

transform:translateY(-10px);

}

.review-box i{

font-size:45px;

color:#014F86;

margin-bottom:20px;

}

.review-box h5{

font-weight:700;

margin-bottom:15px;

color:#012A4A;

}

.footer-premium{

margin-top:80px;

padding:50px;

background:#012A4A;

color:white;

}

.footer-premium h5{

font-weight:700;

margin-bottom:15px;

}

.footer-premium p{

opacity:.85;

}

</style>

</head>

<body>

<div class="bg-shape bg1"></div>
<div class="bg-shape bg2"></div>
<div class="bg-shape bg3"></div>

<!-- Navbar -->

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
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse"
id="menu">

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

<a class="btn btn-login ms-lg-3"
href="login_aam.php">

Login

</a>

</li>

</ul>

</div>

</div>

</nav>

<!-- Hero -->

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

Reconnect with your batchmates, revisit your alma mater,
and celebrate unforgettable memories at the Platinum Jubilee
Annual Alumni Meet.

</p>

<div class="hero-buttons">

<a href="#registration"
class="btn btn-register">

Register Now

</a>

<a href="login_aam.php"
class="btn btn-outline-custom">

Already Registered?

</a>

</div>

</section>

<!-- Registration Card -->

<section id="registration"
class="registration-wrapper">

<div class="registration-card">

<div class="registration-title">

<h2>

Alumni Registration Form

</h2>

<p>

Complete your registration in a few simple steps.

</p>

</div>

<div class="progress mb-5">

<div class="progress-bar"
style="width:14%;">

</div>

</div>

<!-- STEP 1 STARTS HERE -->
<body>

<!-- Background Shapes -->
<div class="bg-shape shape1"></div>
<div class="bg-shape shape2"></div>
<div class="bg-shape shape3"></div>

<div class="container py-2">

    <!-- Logo -->
    <div class="text-center mb-4">

        <div class="logo-box">

            <img src="./img/kgp_blue.png" class="logo" width="50">

            <img src="./img/palJubLogo.png" class="logo" width="50">

        </div>

    </div>

    <!-- Hero Card -->

    <div class="hero-card">

        <div class="hero-overlay"></div>

        <div class="hero-content">

            <span class="badge badge-premium">

                <i class="fas fa-star"></i>

                IIT KHARAGPUR

            </span>

            <h1>

                22<sup>nd</sup> Annual Alumni Meet

            </h1>

            <h2>2026</h2>

            <p>

                Welcome Home.

                Relive memories, reconnect with friends,

                celebrate your lifelong bond with IIT Kharagpur.

            </p>

            <div class="hero-info">

                <div>

                    <i class="fas fa-calendar-alt"></i>

                    9 - 11 January 2026

                </div>

                <div>

                    <i class="fas fa-map-marker-alt"></i>

                    IIT Kharagpur

                </div>

                <div>

                    <i class="fas fa-users"></i>

                    Batches 1976 • 1986 • 2001

                </div>

            </div>

        </div>

    </div>


    <!-- Registration Form -->

    <div class="form-card mt-5">

        <div class="form-header">

            <h2>

                <i class="fas fa-user-plus"></i>

                Alumni Registration Form

            </h2>

            <p>

                Please fill in all required information carefully.

            </p>

        </div>

        <!-- Progress -->

        <div class="progress-wrapper mb-4">

            <div class="progress">

                <div class="progress-bar progress-bar-striped progress-bar-animated"

                     style="width:10%">

                    10%

                </div>

            </div>

        </div>
        <div class="wizard">

<div class="step active">

<div class="circle">

<i class="fas fa-user"></i>

</div>

<p>Personal</p>

</div>

<div class="line"></div>

<div class="step">

<div class="circle">

<i class="fas fa-briefcase"></i>

</div>

<p>Professional</p>

</div>

<div class="line"></div>

<div class="step">

<div class="circle">

<i class="fas fa-university"></i>

</div>

<p>IIT KGP</p>

</div>

<div class="line"></div>

<div class="step">

<div class="circle">

<i class="fas fa-bed"></i>

</div>

<p>Stay</p>

</div>

<div class="line"></div>

<div class="step">

<div class="circle">

<i class="fas fa-plane"></i>

</div>

<p>Travel</p>

</div>

<div class="line"></div>

<div class="step">

<div class="circle">

<i class="fas fa-credit-card"></i>

</div>

<p>Payment</p>

</div>

</div>

        <form action="register.php"

              method="POST"

              enctype="multipart/form-data">

            <!-- ============================= -->

            <!-- PERSONAL DETAILS START HERE -->

            <!-- ============================= -->

            <div class="section-title">

                <span>01</span>

                Personal Information

            </div>

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="form-floating">

                        <input

                        type="text"

                        name="name"

                        class="form-control"

                        placeholder="Name"

                        required>

                        <label>

                            Full Name *

                        </label>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-floating">

                        <input

                        type="email"

                        name="email"

                        class="form-control"

                        placeholder="Email"

                        required>

                        <label>

                            Email Address *

                        </label>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-floating">

                        <input

                        type="text"

                        name="mobile"

                        class="form-control"

                        placeholder="Phone"

                        required>

                        <label>

                            Mobile Number *

                        </label>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-floating">

                        <input

                        type="date"

                        name="dob"

                        class="form-control"

                        required>

                        <label>

                            Date of Birth *

                        </label>

                    </div>

                </div>
                                <!-- ID Type -->

                <div class="col-md-6">

                    <div class="form-floating">

                        <select
                            name="idtype"
                            class="form-select"
                            required>

                            <option value="">Choose ID Type</option>

                            <option value="Aadhar Number">Aadhar Card</option>

                            <option value="Passport Number">Passport</option>

                            <option value="PAN Card">PAN Card</option>

                            <option value="Driving License">Driving License</option>

                            <option value="OCI Card">OCI Card</option>

                        </select>

                        <label>ID Proof *</label>

                    </div>

                </div>



                <!-- ID Number -->

                <div class="col-md-6">

                    <div class="form-floating">

                        <input
                            type="text"
                            class="form-control"
                            name="idnumber"
                            placeholder="ID Number"
                            required>

                        <label>ID Number *</label>

                    </div>

                </div>



                <!-- Social -->

                <div class="col-md-12">

                    <div class="form-floating">

                        <input
                            type="text"
                            class="form-control"
                            name="social_links"
                            placeholder="LinkedIn / Facebook">

                        <label>

                            LinkedIn / Facebook / X Profile

                        </label>

                    </div>

                </div>



                <!-- Address -->

                <div class="col-md-12">

                    <div class="form-floating">

                        <textarea
                            class="form-control"
                            name="address"
                            placeholder="Address"
                            style="height:120px"
                            required></textarea>

                        <label>Residential Address *</label>

                    </div>

                </div>



                <!-- City -->

                <div class="col-md-4">

                    <div class="form-floating">

                        <input
                            type="text"
                            class="form-control"
                            name="city"
                            placeholder="City"
                            required>

                        <label>City *</label>

                    </div>

                </div>



                <!-- State -->

                <div class="col-md-4">

                    <div class="form-floating">

                        <input
                            type="text"
                            class="form-control"
                            name="state"
                            placeholder="State"
                            required>

                        <label>State *</label>

                    </div>

                </div>



                <!-- Country -->

                <div class="col-md-4">

                    <div class="form-floating">

                        <input
                            type="text"
                            class="form-control"
                            name="country"
                            placeholder="Country"
                            value="India"
                            required>

                        <label>Country *</label>

                    </div>

                </div>



                <!-- Zip -->

                <div class="col-md-4">

                    <div class="form-floating">

                        <input
                            type="text"
                            class="form-control"
                            name="zipcode"
                            placeholder="Zip Code"
                            required>

                        <label>Zip Code *</label>

                    </div>

                </div>

            </div>

            <!-- END PERSONAL DETAILS -->


            <hr class="section-divider">


            <!-- NEXT SECTION HEADER -->

            <div class="section-title mt-5">

                <span>02</span>

                Professional Information

            </div>
            <!-- ================================================= -->
<!-- PROFESSIONAL INFORMATION STARTS HERE -->
<!-- ================================================= -->

<div class="premium-card mt-5">

    <div class="card-header-premium">
        <i class="fas fa-briefcase"></i>
        Professional Information
    </div>

    <div class="card-body">

        <div class="row g-4">

            <!-- Profession -->

            <div class="col-md-6">

                <div class="form-floating">

                    <input
                        type="text"
                        class="form-control"
                        name="profession"
                        placeholder="Profession">

                    <label>

                        Profession

                    </label>

                </div>

            </div>

            <!-- Organisation -->

            <div class="col-md-6">

                <div class="form-floating">

                    <input
                        type="text"
                        class="form-control"
                        name="organisation"
                        placeholder="Organisation">

                    <label>

                        Organisation

                    </label>

                </div>

            </div>

            <!-- Designation -->

            <div class="col-md-6">

                <div class="form-floating">

                    <input
                        type="text"
                        class="form-control"
                        name="designation"
                        placeholder="Designation">

                    <label>

                        Designation

                    </label>

                </div>

            </div>

            <!-- Position Holding -->

            <div class="col-md-6">

                <div class="form-floating">

                    <input
                        type="text"
                        class="form-control"
                        name="positionHolding"
                        placeholder="Position Holding">

                    <label>

                        Position Holding

                    </label>

                </div>

            </div>

            <!-- Office Address -->

            <div class="col-12">

                <div class="form-floating">

                    <textarea
                        class="form-control"
                        name="waddress"
                        style="height:120px"
                        placeholder="Office Address"></textarea>

                    <label>

                        Office Address

                    </label>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-floating">

                    <input
                        class="form-control"
                        name="wcity"
                        placeholder="City">

                    <label>

                        City

                    </label>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-floating">

                    <input
                        class="form-control"
                        name="wstate"
                        placeholder="State">

                    <label>

                        State

                    </label>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-floating">

                    <input
                        class="form-control"
                        name="wcountry"
                        value="India"
                        placeholder="Country">

                    <label>

                        Country

                    </label>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-floating">

                    <input
                        class="form-control"
                        name="wzipcode"
                        placeholder="Zip">

                    <label>

                        Zip Code

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================================================= -->
<!-- IIT KGP DETAILS WILL START HERE  -->
<!-- ================================================= -->

<!-- ========================================================= -->
<!-- IIT KHARAGPUR DETAILS -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

    <div class="card-header-premium">
        <i class="fas fa-university"></i>
        IIT Kharagpur Details
    </div>

    <div class="card-body">

        <div class="row g-4">

            <!-- Course -->

            <div class="col-lg-6">

                <div class="form-floating">

                    <select
                        class="form-select"
                        name="course"
                        required>

                        <option value="">Choose Course</option>

                        <option>B.Tech</option>
                        <option>M.Tech</option>
                        <option>M.Sc</option>
                        <option>MBA</option>
                        <option>LLB</option>
                        <option>LLM</option>
                        <option>MCP</option>
                        <option>Executive MBA</option>
                        <option>PhD</option>
                        <option>Dual Degree</option>
                        <option>Others</option>

                    </select>

                    <label>

                        Course *

                    </label>

                </div>

            </div>

            <!-- Degree -->

            <div class="col-lg-6">

                <div class="form-floating">

                    <input
                        type="text"
                        class="form-control"
                        name="degree"
                        placeholder="Degree"
                        required>

                    <label>

                        Degree *

                    </label>

                </div>

            </div>

            <!-- Department -->

            <div class="col-lg-6">

                <div class="form-floating">

                    <input
                        type="text"
                        class="form-control"
                        name="dept"
                        placeholder="Department"
                        required>

                    <label>

                        Department *

                    </label>

                </div>

            </div>

            <!-- Hall -->

            <div class="col-lg-6">

                <div class="form-floating">

                    <input
                        type="text"
                        class="form-control"
                        name="hall"
                        placeholder="Hall">

                    <label>

                        Hall of Residence

                    </label>

                </div>

            </div>

            <!-- Year of Joining -->

            <div class="col-md-6">

                <div class="form-floating">

                    <select
                        class="form-select"
                        name="yoj"
                        required>

                        <option value="">Select Year</option>

                        <?php
                        for($i=1951;$i<=2026;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>

                    </select>

                    <label>

                        Year of Joining *

                    </label>

                </div>

            </div>

            <!-- Year of Graduation -->

            <div class="col-md-6">

                <div class="form-floating">

                    <select
                        class="form-select"
                        name="yog"
                        required>

                        <option value="">Select Year</option>

                        <?php
                        for($i=1951;$i<=2035;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>

                    </select>

                    <label>

                        Year of Graduation *

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ========================================================= -->
<!-- ACCOMMODATION DETAILS -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

    <div class="card-header-premium">

        <i class="fas fa-bed"></i>

        Accommodation Preference

    </div>

    <div class="card-body">

        <div class="row g-4">

            <!-- Accommodation -->

            <div class="col-md-6">

                <div class="form-floating">

                    <select
                        class="form-select"
                        name="acc_relation">

                        <option value="">Choose Option</option>

                        <option value="Single Occupancy">

                            Single Occupancy

                        </option>

                        <option value="Double Occupancy">

                            Double Occupancy

                        </option>

                        <option value="Family">

                            Family Accommodation

                        </option>

                        <option value="Self Arrangement">

                            Self Arrangement

                        </option>

                    </select>

                    <label>

                        Accommodation Type

                    </label>

                </div>

            </div>

            <!-- Sharing With -->

            <div class="col-md-6">

                <div class="form-floating">

                    <input
                        class="form-control"
                        name="acc_name"
                        placeholder="Sharing With">

                    <label>

                        Sharing With / Guest Name

                    </label>

                </div>

            </div>

            <!-- Food -->

            <div class="col-md-6">

                <div class="form-floating">

                    <select
                        class="form-select"
                        name="foodPreference">

                        <option value="Veg">

                            Vegetarian

                        </option>

                        <option value="Non-Veg">

                            Non Vegetarian

                        </option>

                        <option value="Vegan">

                            Vegan

                        </option>

                    </select>

                    <label>

                        Food Preference

                    </label>

                </div>

            </div>

            <!-- Medical -->

            <div class="col-md-6">

                <div class="form-floating">

                    <input
                        class="form-control"
                        name="medical"
                        placeholder="Medical">

                    <label>

                        Medical Conditions (if any)

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ========================================================= -->

<!-- Travel Details -->
<!-- ========================================================= -->
 <!-- ========================================================= -->
<!-- TRAVEL DETAILS -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

    <div class="card-header-premium">

        <i class="fas fa-plane-arrival"></i>

        Travel Information

    </div>

    <div class="card-body">

        <div class="row g-4">

            <!-- Arrival Date -->

            <div class="col-lg-4">

                <div class="form-floating">

                    <input
                        type="date"
                        class="form-control"
                        name="dateOfArr"
                        required>

                    <label>

                        Arrival Date *

                    </label>

                </div>

            </div>

            <!-- Arrival Time -->

            <div class="col-lg-4">

                <div class="form-floating">

                    <input
                        type="time"
                        class="form-control"
                        name="timeOfArr">

                    <label>

                        Arrival Time

                    </label>

                </div>

            </div>

            <!-- Arrival Mode -->

            <div class="col-lg-4">

                <div class="form-floating">

                    <select
                        class="form-select"
                        name="arrivalMode">

                        <option value="">Choose</option>

                        <option>Flight</option>
                        <option>Train</option>
                        <option>Bus</option>
                        <option>Car</option>
                        <option>Cab</option>
                        <option>Other</option>

                    </select>

                    <label>

                        Mode of Arrival

                    </label>

                </div>

            </div>

            <!-- Departure Date -->

            <div class="col-lg-4">

                <div class="form-floating">

                    <input
                        type="date"
                        class="form-control"
                        name="dateOfDep"
                        required>

                    <label>

                        Departure Date *

                    </label>

                </div>

            </div>

            <!-- Departure Time -->

            <div class="col-lg-4">

                <div class="form-floating">

                    <input
                        type="time"
                        class="form-control"
                        name="timeOfDep">

                    <label>

                        Departure Time

                    </label>

                </div>

            </div>

            <!-- Pickup -->

            <div class="col-lg-4">

                <div class="form-floating">

                    <select
                        class="form-select"
                        name="pickup">

                        <option value="No">

                            No Pickup Required

                        </option>

                        <option value="Yes">

                            Pickup Required

                        </option>

                    </select>

                    <label>

                        Pickup Facility

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ========================================================= -->
<!-- PAYMENT SUMMARY -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

    <div class="card-header-premium">

        <i class="fas fa-credit-card"></i>

        Registration Fee

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-8">

                <div class="payment-info">

                    <h4>

                        Alumni Registration

                    </h4>

                    <p>

                        Registration fee includes:

                    </p>

                    <ul class="payment-list">

                        <li>

                            ✔ Alumni Meet Entry Pass

                        </li>

                        <li>

                            ✔ Accommodation

                        </li>

                        <li>

                            ✔ Meals

                        </li>

                        <li>

                            ✔ Reunion Kit

                        </li>

                        <li>

                            ✔ Cultural Program

                        </li>

                        <li>

                            ✔ Campus Events

                        </li>

                    </ul>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="payment-box">

                    <h6>

                        Registration Fee

                    </h6>

                    <h1>

                        ₹15,000

                    </h1>

                    <small>

                        Per Alumni

                    </small>

                    <input
                        type="hidden"
                        name="acp"
                        value="15000">

                </div>

            </div>

        </div>

    </div>

</div>
<!-- ========================================================= -->
<!-- REVIEW CARD -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

    <div class="card-header-premium">

        <i class="fas fa-clipboard-check"></i>

        Before You Submit

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-6">

                <div class="review-box">

                    <i class="fas fa-user-check"></i>

                    <h5>Verify Personal Details</h5>

                    <p>

                        Ensure your Name, Email,
                        Mobile Number and Address
                        are correct.

                    </p>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="review-box">

                    <i class="fas fa-university"></i>

                    <h5>Verify IIT Information</h5>

                    <p>

                        Please confirm your
                        Department,
                        Course,
                        Year of Joining,
                        Year of Graduation.

                    </p>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="review-box">

                    <i class="fas fa-bed"></i>

                    <h5>Accommodation</h5>

                    <p>

                        Verify accommodation
                        preferences before submission.

                    </p>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="review-box">

                    <i class="fas fa-plane"></i>

                    <h5>Travel Details</h5>

                    <p>

                        Arrival & Departure details
                        will be used for planning.

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ========================================================= -->
<!-- DECLARATION -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

<div class="card-header-premium">

<i class="fas fa-file-signature"></i>

Declaration

</div>

<div class="card-body">

<div class="form-check">

<input

class="form-check-input"

type="checkbox"

id="agree"

required>

<label class="form-check-label"

for="agree">

I hereby declare that all the information furnished by me is true
and correct to the best of my knowledge.

I understand that IIT Kharagpur Alumni Affairs may use these
details only for Alumni Meet related communication.

</label>

</div>

<div class="alert alert-warning mt-4">

<strong>Note:</strong>

Once submitted, information may not be editable online.
Please verify carefully before submission.

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- SUBMIT BUTTON -->
<!-- ========================================================= -->

<div class="text-center mt-5 mb-5">

<button

type="submit"

class="btn-submit-premium"

id="submitBtn">

<i class="fas fa-paper-plane me-2"></i>

Complete Registration

</button>

</div>

</form>

<!-- ========================================================= -->
<!-- HELP CARD -->
<!-- ========================================================= -->

<div class="premium-help">

<div class="row align-items-center">

<div class="col-lg-8">

<h3>

Need Assistance?

</h3>

<p>

For registration related queries please contact
Students' Alumni Cell.

</p>

</div>

<div class="col-lg-4 text-lg-end">

<a

href="mailto:alumni@hijli.iitkgp.ac.in"

class="btn btn-outline-light">

<i class="fas fa-envelope"></i>

Email Us

</a>

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- CONTACT CARD -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

<div class="card-header-premium">

<i class="fas fa-phone"></i>

Contact Information

</div>

<div class="card-body">

<div class="row">

<div class="col-lg-4">

<h5>

Office of Alumni Affairs

</h5>

<p>

Indian Institute of Technology Kharagpur

Kharagpur - 721302

West Bengal

</p>

</div>

<div class="col-lg-4">

<h5>

Email

</h5>

<p>

alumni@hijli.iitkgp.ac.in

</p>

</div>

<div class="col-lg-4">

<h5>

Website

</h5>

<p>

www.iitkgp.ac.in

</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->

<footer class="footer-premium">

<div class="container text-center">

<h5>

22nd Annual Alumni Meet 2026

</h5>

<p>

Students' Alumni Cell

Indian Institute of Technology Kharagpur

</p>

<p>

© 2026 IIT Kharagpur

All Rights Reserved

</p>

</div>

</footer>

<!-- ========================================================= -->
<!-- PREMIUM NOTICE -->
<!-- ========================================================= -->

<div class="alert alert-primary mt-5 shadow-lg p-4 rounded-4">

    <div class="d-flex align-items-center">

        <i class="fas fa-circle-info fs-2 me-3"></i>

        <div>

            <h5 class="mb-2">

                Important Information

            </h5>

            <p class="mb-0">

                Kindly ensure that your travel dates match your
                accommodation requirements.
                Pickup service will be arranged only if selected.

            </p>

        </div>

    </div>

</div>
            <!-- ========================================================= -->
<!-- PREMIUM DECLARATION -->
<!-- ========================================================= -->

<div class="premium-card mt-5">

    <div class="card-header-premium">
        <i class="fas fa-check-circle"></i>
        Declaration
    </div>

    <div class="card-body p-4">

        <div class="form-check mb-4">

            <input
                class="form-check-input"
                type="checkbox"
                id="agree"
                required>

            <label class="form-check-label" for="agree">

                I hereby declare that all information furnished by me is
                true and correct to the best of my knowledge.

                I understand that IIT Kharagpur Alumni Affairs may use
                these details only for Alumni Meet related communication.

            </label>

        </div>

        <div class="alert alert-warning">

            <i class="fas fa-exclamation-triangle me-2"></i>

            Kindly verify every detail before submitting.
            After submission, modification may require approval from the
            Alumni Affairs Office.

        </div>

    </div>

</div>

<!-- ========================================================= -->
<!-- SUBMIT AREA -->
<!-- ========================================================= -->

<div class="text-center my-5">

    <button class="btn-submit-premium" type="submit">

        <i class="fas fa-paper-plane me-2"></i>

        Complete Registration

    </button>

</div>

<!-- ========================================================= -->
<!-- HELP CARD -->
<!-- ========================================================= -->

<div class="premium-help mt-5">

    <div class="row align-items-center">

        <div class="col-lg-8">

            <h3>Need Assistance?</h3>

            <p>

                If you face any difficulty during registration,
                please contact the Office of Alumni Affairs.

            </p>

        </div>

        <div class="col-lg-4 text-lg-end">

            <a href="mailto:alumni@hijli.iitkgp.ac.in"
               class="btn btn-outline-light">

                <i class="fas fa-envelope"></i>

                Email Us

            </a>

        </div>

    </div>

</div>
</body>

<script>

document.querySelector("form").addEventListener("submit",function(e){

const btn=document.getElementById("submitBtn");

btn.disabled=true;

btn.innerHTML='

<span class="spinner-border spinner-border-sm me-2"></span>

Submitting...';

});

const inputs=document.querySelectorAll("input,select,textarea");

inputs.forEach((input,index)=>{

input.addEventListener("change",()=>{

let percent=((index+1)/inputs.length)*100;

document.querySelector(".progress-bar").style.width=percent+"%";

document.querySelector(".progress-bar").innerHTML=Math.round(percent)+"%";

});

});

window.addEventListener("scroll",()=>{

document.querySelectorAll(".premium-card").forEach(card=>{

const top=card.getBoundingClientRect().top;

if(top<window.innerHeight-80){

card.style.opacity="1";

card.style.transform="translateY(0)";

}

});

});

</script>