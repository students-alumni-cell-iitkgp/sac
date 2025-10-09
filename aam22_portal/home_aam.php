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
					background: url(./../img/aa.webp) no-repeat center center fixed;
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
        .event-card img { height: 150px; object-fit: cover; }
        .alumni-photo { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; }
        .card-header{background-color: #01497C};
    </style>
</head>
<body>

<div class="hero">
    Welcome to 22nd Annual Alumni Meet 2025
</div>

<div class="text-center my-4">
    <span class="">If you have already registered of 22md Annual Alumni Meet then Go for Login, else Register First</span>
    <br>
    <br>
    <a href="login_aam.php" class="btn btn-lg mx-4 px-10" style="background-color: #014F86; color: white;">Login for AAM</a>
    <a href="register.php" class="btn btn-lg mx-4 px-10" style="background-color: #014F86; color: white;">Register for AAM</a>
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

        <div class="container my-4 text-center">
    <h4 class="mb-3" style="font-size: 1.6rem;">Bank Details for Depositing Registration Fees (FCRA Approved)</h4>
    <div class="card p-3 mx-auto" style="display: inline-block; font-size: 1.2rem; background-color: rgba(255,255,255,0.1); border: none;">
        <ul class="list-unstyled mb-0">
            <li><strong>Bank Name:</strong> SBI</li>
            <li><strong>Account Name:</strong> IIT Kharagpur Alumni Fund</li>
            <li><strong>Account Number:</strong> 37711582715</li>
            <li><strong>IFSC:</strong> SBIN0000202</li>
            <li><strong>MICR:</strong> 721002103</li>
            <li><strong>SWIFT Code:</strong> SBININBB339</li>
        </ul>
    </div>
</section>


</div>

</body>
</html>