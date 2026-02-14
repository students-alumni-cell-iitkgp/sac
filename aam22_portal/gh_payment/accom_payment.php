<?php
session_start();
include 'test.php'; // DB connection
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accommodation Payment | Alumni Meet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* === Background === */
        body {
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-color:#90CAF9;
            background-size: cover;
            backdrop-filter: blur(15px);

            min-height: 100vh;
            margin: 0;
            padding: 0;
            height: 100vh;
            /* background: linear-gradient(135deg, #2196F3, #90CAF9); */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        /* === Glassmorphism Login Box === */
        .login-box {
            /* background: #90CAF9; */
            backdrop-filter: blur(100px);
            border-radius: 15px;
            padding: 10px 35px 30px 35px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            width: 520px;
            max-width: 90%;
            text-align: center;
        }

        .login-box h2 {
            font-weight: 600;
            margin-bottom: 25px;
            color: #0D47A1;
        }

        /* === Input Fields === */
        .form-control {
            background: #BBDEFB;
            border: none;
            border-radius: 30px;
            padding: 12px 20px;
            color: black;
            font-size: 15px;
        }

        .form-control::placeholder {
            color: black;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
        }

        /* === Button === */
        .btn-login {
            background: #1976D2;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px;
            font-weight: bold;
            width: 100%;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #0D47A1;
        }

        /* === Extra Links === */
        .links {
            margin-top: 15px;
            font-size: 14px;
        }

        .links a {
            color: #fff;
            text-decoration: underline;
        }

        /* === Error Box === */
        .alert {
            border-radius: 10px;
        }

        .justCenter {
            text-align: center;
        }

        .instiLogo {
            height: 85px;
            margin: 10px;
        }

        .logoContainer {
            /* background: rgba(255, 255, 255, 0.35);
        */
            background-color: white;
            border-radius: 25px;
            border: 2px solid #012A4A;
            padding: 15px;
            margin: 2px auto;
            width: 70%;
        }

        .black {
            color: black;
        }

        @media (max-width: 768px) {
            .logoContainer {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="logoContainer text-center my-4">
            <div class="container">
                <img class="instiLogo" src="./../../img/logo/kgp_blue.png" alt="">
                <img class="instiLogo" src="./../img/palJubLogo.png" alt="">
            </div>
        </div>
        <h2 class="color-black">Accommodation Payment</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger py-2"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="order.php" method="POST">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile" required>
            </div>

            <div class="mb-3 ">
                <select class="form-control" name="dept" required>
                    <option selected disabled value="select">Department<span style="color:red;">*</span></option>
                    <option value="AE">Aerospace Engineering</option>
                    <option value="AG">Agricultural & Food Engineering</option>
                    <option value="AR">Architecture & Regional Planning</option>
                    <option value="BT">Biotechnology</option>
                    <option value="CE">Civil Engineering</option>
                    <option value="CH">Chemical Engineering</option>
                    <option value="CS">Computer Science & Engineering</option>
                    <option value="CY">Chemistry</option>
                    <option value="EE">Electrical Engineering</option>
                    <option value="EC">Electronics & Electrical Communication Engineering</option>
                    <option value="GG">Geology & Geophysics</option>
                    <option value="HS">Humanities & Social Sciences</option>
                    <option value="IM">Industrial & Systems Engineering</option>
                    <option value="MA">Mathematics</option>
                    <option value="ME">Mechanical Engineering</option>
                    <option value="MT">Metallurgical & Materials Engineering</option>
                    <option value="MI">Mining Engineering</option>
                    <option value="NA">Ocean Engineering & Naval Architecture</option>
                    <option value="PH">Physics</option>
                    <option value="ATDC">Advanced Techology Development Center</option>
                    <option value="CET">Center for Educational Technology</option>
                    <option value="CYE">Cryogenic Engineering</option>
                    <option value="MS">Materials Science</option>
                    <option value="ORALS">Oceans, Rivers, Atmosphere and Land Sciences</option>
                    <option value="CBE">P K Sinha Centre for Bio Energy</option>
                    <option value="REC">Reliability Engineering Centre</option>
                    <option value="RTC">Rubber Technology Centre</option>
                    <option value="RDC">Rural Development Centre</option>
                    <option value="GSSST">G S Sanyal School of Telecommunications</option>
                    <option value="IT">Information Technology</option>
                    <option value="RCIM">Ranbir and Chitra Gupta School of Infrastructure Design and Management</option>
                    <option value="RMSEE">Rajendra Mishra School of Engineering Entrepreneurship</option>
                    <option value="RGSIPL">Rajiv Gandhi School of Intellectual Property Law</option>
                    <option value="MST">Medical Science & Technology</option>
                    <option value="SB">School of Bioscience</option>
                    <option value="SEST">School of Environment Science and Technology</option>
                    <option value="SES">School of Energy Science</option>
                    <option value="SNST">School of Nano-Science and Technology</option>
                    <option value="SWS">School of Water Resources</option>
                    <option value="VGSOM">Vinod Gupta School of Management</option>
                </select>
            </div>
            <div class="mb-3 ">
                <select class="form-control" name="hall" required>
                    <option selected disabled value="select">Hall of Residence<span style="color:red;">*</span></option>
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
            <div class="mb-3">
                <input type="number" min="1951" max="2020" name="batch" class="form-control" placeholder="Batch"
                    required>
            </div>

            <div class="mb-3">
                <input type="number" name="amount" class="form-control" placeholder="Amount(INR)" required>
            </div>

            <button class="btn-login" type="submit">Proceed to Pay</button>
        </form>
    </div>
</body>

</html>