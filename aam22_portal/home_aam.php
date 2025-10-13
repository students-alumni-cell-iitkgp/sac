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
            width: 120px;
        }
        .event-card img { height: 150px; object-fit: cover; }
        .alumni-photo { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; }
        .card-header{background-color: #1E88E5};
        

        
    </style>
</head>
<body>

    <div class="container justCenter">
            <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
        </div>
<div class="hero">
    Welcome to 22nd Annual Alumni Meet 2026
</div>

<div class="headr text-center my-4">
    <a href="./../aam21.php" class="btn btn-lg mx-4 px-10 mb-6" style="background-color: #1976D2; color: white;">Glimpses of earlier Annual Alumni Meet (AAM)
</a>
<br>
<br>
    <span class="">If you have already registered of 22md Annual Alumni Meet then Go for Login, else first Register than Login</span>
    <br>
    <br>
    <a href="login_aam.php" class="btn btn-lg mx-4 px-10" style="background-color: #1976D2; color: white;">Login for 22nd AAM 2026</a>
    <a href="signup.php" class="btn btn-lg mx-4 px-10" style="background-color: #1976D2; color: white;">Register for 22nd AAM 2026</a>
</div>

<div class="container mr-10 ml-10">

	<section class="container my-1">
	<div class="container my-1">
    <h4 class="mb-3">Guest House Tariff Details (Without GST)</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table card-header text-white">
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Accommodation Type</th>
                        <th scope="col">INR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>TGH</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>SAM</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Alumni Guest House</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Atal Bihari Vajpayee Hall of Residence</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Savitribai Phule Hall of Residence</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>  


    </div>

    <div class="card shadow-sm">
        <div class="card-header text-white">
            <h4 class="mb-0">Important Notes</h4>
        </div>

        <div class="card-body">
            <ul class="notes-text">
                <li>Like every year, the highest preference for on-campus accommodation will be given to the 50th-year senior participants. Due to the limited availability of rooms in TGH, preference will also be given to senior-most alumni, persons with disabilities (PWD), those with medical conditions requiring special facilities, and alumni accompanied by their families.</li>
                <br>
				<li>In view of the increased number of participants, we shall have to offer you accommodation in campus TGH on sharing basis.</li>
                <br>
				<li>Registration fee(s) will include the musical night/entertainment/events, registration kit, three days food in the arena, and local transport. Accommodation and other incidental charges to be borne by the individuals directly to the facility providers.</li>
                <br>
				<li>The details of the room allocation will be shared a week before the Event.</li>
            </ul>
        </div>
    </div>

    
    <div class="card shadow-sm mt-5 mb-5">
        <div class="card-header text-white">
            <h4 class="mb-0">Bank Details for Depositing Registration Fees (FCRA Approved)</h4>
        </div>

        <div class="card-body">
            <ul class="notes-text">
                    <li><strong>Bank Name:</strong> SBI</li>
                    <li><strong>Account Name:</strong> IIT Kharagpur Alumni Fund</li>
                    <li><strong>Account Number:</strong> 37711582715</li>
                    <li><strong>IFSC:</strong> SBIN0000202</li>
                    <li><strong>MICR:</strong> 721002103</li>
                    <li><strong>SWIFT Code:</strong> SBININBB339</li>
            </ul>
        </div>
    </div>


</div>

</body>
</html>