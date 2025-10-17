<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Students' Alumni Cell | Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon">
  <link rel="stylesheet" href="./signups.css">
  <style>
    .palLogo{
      test-align: right;
    }
  </style>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* ===== GLOBAL ===== */
body {
  background: url('./aa2a.webp') no-repeat center center fixed;
  background-size: cover;
  /* min-height: 100vh; */
  color: #012a4a;
  font-family: 'Segoe UI', sans-serif;
}

.section1 {
  /* background: rgba(255, 255, 255, 0.9); */
  margin: 40px auto;
  padding: 30px;
  border-radius: 12px;
  max-width: 900px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

/* ===== HEADING ===== */
.heading-main {
  text-align: center;
  margin-bottom: 25px;
}

.heading-main h2 {
  color: #014f86;
  font-weight: 700;
  font-size: 1.6rem;
}

.instiLogo {
  display: inline-block;
  margin: 0 10px;
  height: 85px;
}
/* ===== ACCORDION ===== */
.accordion-button {
  background-color: #014f86;
  color: #fff;
  font-weight: 600;
  font-size: 1rem;
  transition: 0.3s ease;
}

.accordion-button:hover {
  background-color: #013a63;
  color: #fff;
}

.accordion-button:not(.collapsed) {
  background-color: #012a4a;
  color: #fff;
  box-shadow: none;
}

.accordion-item {
  border: none;
  margin-bottom: 10px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.accordion-body {
  background: #f8f9fa;
  border-radius: 0 0 10px 10px;
}

/* ===== FORM ===== */
.form-control, .form-select {
  border: 1px solid #ced4da;
  border-radius: 8px;
}

.form-floating > label {
  color: #495057;
}

.form-control:focus, .form-select:focus {
  border-color: #014f86;
  box-shadow: 0 0 0 0.2rem rgba(1, 79, 134, 0.25);
}

/* ===== TABLES ===== */
.table {
  border-collapse: collapse;
  background-color: #ffffff;
  border-radius: 10px;
  overflow: hidden;
  font-size: 0.95rem;
}

.table thead {
  background-color: #014f86;
  color: #fff;
  text-transform: uppercase;
}

.table th, .table td {
  padding: 12px 15px;
  text-align: left;
  vertical-align: middle;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f2f6fa;
}

.table-bordered th, .table-bordered td {
  border: 1px solid #dee2e6;
}

.table-responsive {
  border-radius: 8px;
  overflow-x: auto;
}

/* ===== CARDS ===== */
.card {
  border: none;
  border-radius: 12px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
  background-color: #014f86 !important;
  color: #ffffff;
  font-weight: 400;
  font-size: 1.1rem;
}

/* ===== NOTES / LISTS ===== */
.notes-text li {
  margin-bottom: 10px;
  line-height: 1.6;
}



/* ===== BUTTONS ===== */
.btn {
  border-radius: 8px;
  font-weight: 600;
  transition: all 0.2s ease-in-out;
}

.btn-light {
  background-color: #014f86;
  color: white;
  border: none;
}

.btn-light:hover {
  background-color: #012a4a;
  color: white;
  transform: scale(1.02);
}
.logoContainer{
    /* background: rgba(255, 255, 255, 0.35);
      */
    background-color: white;
    border-radius: 25px;
    border: 2px solid #012A4A;
    padding: 15px;
    margin: 20px auto;
    width: 300px;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
  .section1 {
    margin: 20px;
    padding: 20px;
  }
    .logoContainer{
      width: 60%;
  }
  .heading-main h2 {
    font-size: 1.3rem;
  }
  .accordion-button {
    font-size: 0.95rem;
  }
  .logoContainer{
    width: 80%;
}
}

@media (max-width: 576px) {
  .table th, .table td {
    padding: 8px;
    font-size: 0.85rem;
  }

  .form-floating {
    margin-bottom: 15px !important;
  }
}
  </style>
<?php
// DB config
// include 'adminPages/config.php';
include 'test.php'; //db connection on my pc


session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'] ?? null;
    $idtype = $_POST['idtype'] ?? '';
    $idnumber = $_POST['idnumber'] ?? null;
    $social_links = $_POST['social_links'] ?? '';

    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $country = $_POST['country'] ?? '';
    $zipcode = $_POST['zipcode'] ?? '';
    
    $postionHolding = $_POST['positionHolding'] ?? '';
    $course = $_POST['course'] ?? '';
    $degree = $_POST['degree'] ?? '';
    $dept = $_POST['dept'] ?? '';
    $hall = $_POST['hall'] ?? '';
    $yoj = $_POST['yoj'] ?? 0;
    $yog = $_POST['yog'] ?? 0;


    $accName = $_POST['acc_name'] ?? '';
    $accRelation = $_POST['acc_relation'] ?? '';

    $foodPreference = $_POST['foodPreference'] ?? '';
    $medical = $_POST['medical'] ?? '';
    $cost = $_POST['acp'] ?? 0;
    $profession = $_POST['profession'] ?? '';
    $designation = $_POST['designation'] ?? '';
    $organisation = $_POST['organisation'] ?? '';

    $waddress = $_POST['waddress'] ?? '';
    $wcity = $_POST['wcity'] ?? '';
    $wstate = $_POST['wstate'] ?? '';
    $wcountry = $_POST['wcountry'] ?? '';
    $wzipcode = $_POST['wzipcode'] ?? '';

    $dateOfArr = $_POST['dateOfArr'] ?? null;
    $dateOfDep = $_POST['dateOfDep'] ?? null;
    $timeOfArr = $_POST['timeOfArr'] ?? null;
    $timeOfDep = $_POST['timeOfDep'] ?? null;
    $arrivalMode = $_POST['arrivalMode'] ?? '';



    $payment = $_POST['payment'] ?? 0;

    $conn = $connection;


    $social_links_json = json_encode($social_links, JSON_UNESCAPED_UNICODE);

    // Check for duplicate email
    $stmtCheck = $conn->prepare("SELECT id FROM AAM WHERE email=?");
    $stmtCheck->bind_param("s",$email);
    $stmtCheck->execute();
    $stmtCheck->store_result();
    if ($stmtCheck->num_rows > 0) {
      echo "<script>alert('Email already registered!'); window.history.back();</script>";
      exit;
    }
    $stmtCheck = $conn->prepare("SELECT id FROM AAM WHERE mobile=?");
    $stmtCheck->bind_param("s",$mobile);
    $stmtCheck->execute();
    $stmtCheck->store_result();
    if ($stmtCheck->num_rows > 0) {
      echo "<script>alert('Mobile Number already registered!'); window.history.back();</script>";
      exit;
    }

    // Insert using prepared statement
    $sql = "INSERT INTO AAM 
    (`name`, `email`, `mobile`, `dob`, `idtype`, `idnumber` `address`, `city`, `state`, `country`, `zipcode`,
    `acc_relation`, `acc_name`, `foodPreference`, `medical`, `cost`, `profession`, `organisation`, `designation`,
    `waddress`, `wcity`, `wstate`, `wcountry`, `wzipcode`,`positionHolding`, `course`, `degree`, `dept`, `hall`, `yoj`, `yog`,
    `dateOfArr`, `dateOfDep`, `timeOfArr`, `timeOfDep`, `arrivalMode`, `social_links`, `payment`)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssiissdsssssssssssiisssssi",
        $name, $email, $mobile, $dob, $idtype, $idnumber, $address, $city, $state, $country, $zipcode,
        $accRelation, $accName, $foodPreference, $medical, $cost, $profession, $organisation, $designation,
        $waddress, $wcity, $wstate, $wcountry, $wzipcode, $positionHolding , $course, $degree, $dept, $hall, $yoj, $yog,
        $dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $arrivalMode, $social_links_json, $payment
    );

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location='signup.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

</head>
<body>
<!-- <div class="heading-main">
    <h2 class="accordion-header" id="headingOne" >
        Registration for <br> 22nd Annual Alumni Meet
    </h2>
</div> -->

<div class="section1">
  <div class="heading-main">
      <div class="logoContainer text-center my-4">
          <div class="container">
                  <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
                  <img class="instiLogo" src="./img/palJubLogo.png" alt="">
          </div>
      </div> 
    <h2 class="accordion-header" id="headingOne" >
        Registration for the 22<sup>nd</sup> Annual Alumni Meet 2026
    </h2>
</div>
<form action="register.php" method="POST" enctype="multipart/form-data">

<div class="accordion" id="accordionExample">
  

  <!-- Personal Details -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Personal Details
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="name" placeholder="Name" maxlength="150" required>
            <label>Name (as per records)<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="email" class="form-control" name="email" placeholder="name@example.com" onBlur="checkemailAvailability()" maxlength="100" required>
             <label>Email address<span style="color:red;">*</span></label>
             <span id="user-email-availability-status" style="font-size:15px;"></span>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="mobile" placeholder="99XX......" maxlength="50" required>
            <label>Cell Number<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="date" class="form-control" name="dob" placeholder="dd-mm-yyyy" required>
             <label>Date of Birth<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class="row">
          <div class="form-floating mb-3 col-sm-6">
                <select name="idtype"  class="form-select" type='text' required>
                <option selected value="select">---Select---</option>
                <option value="Aadhar Number">Aadhar Card</option>
                <option value="Passport Number">Passport</option>
                <option value="PANcard">PAN Card</option>
                <option value="Driving license">Driving License</option>
                <option value="OCI Card">OCI Card</option>
                </select>
                <label>ID Type (Aadhar, Passport, etc.. )<span style="color:red;">*</span></label>
          </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="idnumber" placeholder="1111222233334444" maxlength="100" required>
             <label>ID Number<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-12">
            <input type="text" class="form-control" name="social_links" placeholder="www.facebook/xyz.com" maxlength="150">
            <label>Social Media Link (Facebook, LinkedIn, etc.. )</label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-12">
            <input type="text" class="form-control" name="address" placeholder="XYZ....." maxlength="200" required>
            <label>Address<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="city" placeholder="Kharagpur" maxlength="50" required>
            <label>City<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="state" placeholder="West Bengal" maxlength="50" required>
             <label>State<span style="color:red;">*</span></label>
           </div>
        </div>
        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="country" placeholder="India" maxlength="50" required>
            <label>Country<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="zipcode" placeholder="38....." maxlength="20" required>
             <label>Zip Code<span style="color:red;">*</span></label>
            </div>
          </div>
        </div>
      </div>
    </div>



    
      <!-- Work Details -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Work Details
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          <div class="row">
               <div class="form-floating mb-3 col-sm-6">
                 <input type="text" class="form-control" name="profession" placeholder="Manager" maxlength="100" required>
                 <label>Current Position<span style="color:red;">*</span></label>
               </div>
               <div class="form-floating mb-3 col-sm-6">
                 <input type="text" class="form-control" name="designation" placeholder="USA" maxlength="100">
                 <label>Current Designation</label>
               </div>
              </div>
              
              <div class="row">
              <div class="form-floating mb-3 col-sm-6">
               <input type="text" class="form-control" name="organisation" placeholder="Google" maxlength="100" required>
               <label>Organisation Name<span style="color:red;">*</span></label>
              </div>
               
            </div>
    
            <div class="row">
               <div class="form-floating mb-3 col-12">
                <input type="text" class="form-control" name="waddress" placeholder="1035,HN ..." maxlength="200">
                <label>Address</label>
               </div>
            </div>
    
            <div class="row">
               <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" name="wcity" placeholder="Kolkata" maxlength="50">
                <label>City</label>
               </div>
               <div class="form-floating mb-3 col-sm-6">
                 <input type="text" class="form-control" name="wstate" placeholder="West..." maxlength="50">
                 <label>State</label>
               </div>
            </div>
    
            <div class="row">
               <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" name="wcountry" placeholder="India" maxlength="50">
                <label>Country</label>
               </div>
               <div class="form-floating mb-3 col-sm-6">
                 <input type="text" class="form-control" name="wzipcode" placeholder="$7...." maxlength="20">
                 <label>Zip Code</label>
               </div>
            </div>
        </div>
        </div>
      </div>



      
  <!-- Nostalgic Section -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        IIT Affilliation 
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input name="course" type="text" class="form-control" placeholder="Academic Course Name" maxlength="20" required>
            <label>Academic Course Name <span style="color:red;">*</span></label>
           </div>

           <!-- <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="degree" placeholder="B. Tech" maxlength="30">
             <label>Degree</label>
           </div> 
            -->
           <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" name="degree" id="degree" required>
              <option value="" selected disabled>Select Degree</option>
              <option value="BTech">BTech</option>
              <option value="DualDegree">Dual Tech</option>
              <option value="BArch">BArch</option>
              <option value="BSc">BSc</option>
              <option value="MTech">MTech</option>
              <option value="MSc(Integrated)">MSc (Integrated)</option>
              <option value="MSc(Two years)">MSc (Two years)</option>
              <option value="MCP">MCP</option>
              <option value="MRP">MRP</option>
              <option value="MBA">MBA</option>
              <option value="LLB">LLB</option>
              <option value="MMST">MMST</option>
              <option value="DIIT">DIIT</option>
              <option value="PGDST">PGDST</option>
              <option value="PGDBA">PGDBA</option>
              <option value="EMBA">EMBA</option>
              <option value="LLM">LLM</option>
              <option value="MS">MS</option>
              <option value="MS">MS</option>
              <option value="Other">Other</option>
            </select>
            <label for="degree">Degree (Mention the first Degree)<span style="color:red;">*</span></label>
          </div>
        </div>

        <div class="row">
        <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" name="dept" required>
            <option selected value="select">---Select---</option>
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
             <label>Department<span style="color:red;">*</span></label>
          </div>

           <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" name="hall" required>
            <option selected value="select">---Select---</option>
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
             <label>Hall<span style="color:red;">*</span></label>
          </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-12">
            <input name="positionHolding"  type="text" class="form-control" placeholder="Captain of football team GC" maxlength=100">
            <label>Any Position Held in KGP (Eg. HP, Captain, VP, GSec, Secy, etc)</label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="number" min="1951" max="2025" class="form-control" name="yoj" placeholder="1971" required>
            <label>Join Year<span style="color:red;">*</span></label>
           </div class="form-floating mb-3 col-sm-6"> 
            <div class="form-floating mb-3 col-sm-6">
              <input type="number" min="1951" max="2020" class="form-control" name="yog" placeholder="1976" required>
              <label>Year of Graduation<span style="color:red;">*</span></label>
           </div class="form-floating mb-3 col-sm-6"> 
        </div>

      </div>
    </div>
  </div>







  <!-- Accompany And Food -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Payment Details
      </button>
    </h2>

    
    
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      
        
      <div class="accordion-body">
           <table class="table table-striped" style="margin-bottom: 0 !important">
            <thead>
              <tr>
                <th>#</th>
                <th>Registration Fee<span style="color:red">*</span></th>
                <th>Amount(INR)</th>
              </tr>
            </thead>
             <tbody>
               <tr>
                 <th>1</th>
                 <td>Per Alumnus/Alumna</td>
                 <td>15000</td>
               </tr>
               <tr>
                 <th>2</th>
                 <td>Per Accompanying Person</td>
                 <td>7000</td>
               </tr>
             </tbody>
           </table>
           <small class="text-muted">Registration Fee includes Food, Transportation and Registration Kit</small>
           <br>
           <small class="text-muted">Kids below the age of 10 years, accompanying a participant, have no registration fee.</small>

          <div class="row" style="margin-top: 15px">
            <div class="form-floating mb-3 col-sm-6">
                <select class="form-select" name="acc_relation" id="acc_relation" oninput="calc_cost()" required>
                <option selected value="Non">Non</option>
                <option value="Spouse">Spouse</option>
                <option value="Other">Other</option>
                </select>
                <label>Accompanying Adult Relation<span style="color:red;">*</span></label>
            </div>

            <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" id="acc_name" name="acc_name" oninput="calc_cost()" placeholder="Name">
                <label>Accompanying Adult Name </label>
            </div>
           </div>

           <div class="row" style="justify-content:center">
           <div class="mb-3 col-sm-4">
           Total Reg Fee : <input class="form-control" id="acp" name="acp" type="text" placeholder="15000" readonly>
           </div>
           </div>


        <div class="card shadow-sm mt-5 mb-5">
        <div class="card mb-4 shadow-lg border-0" style="border-radius: 20px;">
  <div class="card-header text-white" style="background-color:#014F86; border-radius: 20px 20px 0 0;">
    <h4 class="mb-0">Bank Details for Depositing Registration Fees</h4>
  </div>

  <div class="card-body">
    <div class="row align-items-center">
      
      <!-- Left: Bank details -->
      <div class="col-md-8">
        <ul class="notes-text" style="font-size: 1rem;">
          <li><strong>Bank Name:</strong> SBI</li>
          <li><strong>Account Name:</strong> IIT Kharagpur Alumni Fund</li>
          <li><strong>Account Number:</strong> 37711582715</li>
          <li><strong>IFSC:</strong> SBIN0000202</li>
          <li><strong>MICR:</strong> 721002103</li>
          <li><strong>SWIFT Code:</strong> SBININBB339</li>
        </ul>
      </div>

      <!-- Right: QR code -->
      <div class="col-md-4 text-center">
        <img src="./img/qrBank.jpg" alt="QR Code" class="img-fluid rounded" 
             style="max-width: 180px; border: 2px solid #014F86; padding: 5px; background: white;">
        <p class="mt-2 text-muted" style="font-size: 0.9rem;">Scan to Pay</p>
      </div>
    </div>
  </div>
</div>
    </div>

        

      </div>
    </div>
  </div>


  <!-- Accommodation -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingSeven">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
        Accommodation and Food
      </button>
    </h2>




    
    
    
<div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">


    <div class="container my-3">

        <div class="row">
          <div class="form-floating mb-3 col-sm-6">
              <select class="form-select" name="foodPreference" required>
                <option selected value="select">---Select---</option>
                <option value="VEG">Vegetarian</option>
                <option value="NONVEG">Non-Vegetarian</option>
                <option value="VEGAN">Vegan</option>
                <option value="OTHER">Other</option>
              </select>
              <label>Food Preference<span style="color:red;">*</span></label>
            </div>
            <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" id="medical" name="medical" placeholder="Health Restrictions">
                <label>Health Restrictions</label>
            </div>
        </div>


      <div class="mt-3" style="font-size: 0.95rem; color:#012A4A;">
        <strong>Accomodation Policy:</strong>
        <ul>
          <li>
            <p style="text-align: justify; line-height: 1.6; margin-bottom:10px;">
              Like every year, the highest preference for on-campus accommodation will be given to the 50th-year senior participants. Additionally, preference will be given to senior-most alumni, persons with disabilities (PWD), those with medical conditions requiring special facilities, and alumni accompanied by their families. The remaining rooms will be allotted on a first-come, first-served basis.
            </p>
          </li>
          <li>
            <p style="text-align: justify; line-height: 1.6; margin-bottom:10px;">
              In view of the increased number of participants, we will have to offer accommodation inside the campus on a sharing basis, except for families.
            </p>
          </li>
          <li>
            <p style="text-align: justify; line-height: 1.6; margin-bottom:10px;">
              The Registration fee(s) will include the musical night/entertainment/events, registration kit, three days’ food in the arena, and local transport. Accommodation and other charges are to be borne by individuals and must be paid directly to the facility providers.
            </p>
          </li>
          <li>
            <p style="text-align: justify; line-height: 1.6; margin-bottom:10px;">
              The details of room allocation will be shared a week prior to the event.
            </p>
          </li>
          <li>
            <p style="text-align: justify; line-height: 1.6; margin-bottom:10px;" class="bold">
              <b>Participants are requested to complete registration and payment at the earliest to avail better accommodation options. Please share the transaction details with the Office of Alumni Affairs (<a href="mailto:alumni@hijli.iitkgp.ac.in">alumni@hijli.iitkgp.ac.in</a>)) for confirmation.</b>
            </p>
          </li>
        
        </ul>
      </div>
    </div>
    </div>
  </div>


  <!-- Travel Section -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        Travel
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="row">
          <div class="form-floating mb-3 col-sm-12">
              <input type="text" class="form-control" id="arrivalMode" name="arrivalMode" placeholder="by Road, by Train, etc">
              <label>Mode of Arrival at Kharagpur</label>
          </div>
        </div>
        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
             <input type="date" class="form-control" name="dateOfArr" placeholder="dd-mm-yyyy" required>
             <label>Date of Arrival at KGP<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="date" class="form-control" name="dateOfDep" placeholder="dd-mm-yyyy" required>
             <label>Date of Departure from KGP<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
             <input type="time" class="form-control" name="timeOfArr" placeholder="dd-mm-yyyy" required>
             <label>Time of Arrival at KGP<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="time" class="form-control" name="timeOfDep" placeholder="dd-mm-yyyy" required>
             <label>Time of Departure from KGP<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class="mt-3" style="font-size: 0.95rem; color:#012A4A;">
        <strong>Note:</strong>
        <ul>
          <li><b>Local transportation will be arranged for all participants on a group-wise basis during the Annual Alumni Meet.</b></li>
        </ul>
      </div>


      </div>
    </div>
  </div>

  <!-- Submit -->
  <div class="row" style="justify-content:center; color:white; margin: 11px">
        <div class="col-1"><button class="btn btn-light" type="submit">Submit</button></div>
  </div>

</div>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function checkemailAvailability() {
    jQuery.ajax({
    url: "Utility/check_username_availablity.php",
    data:'email='+$("input[name=email]").val(),
    type: "POST",
    success:function(data){
    $("#user-email-availability-status").html(data);
    },
    error:function (){}
    });
}

function calc_cost() {
  let totalCost = 15000;
  let relation = document.getElementById("acc_relation").value;
  let name = document.getElementById("acc_name").value;

  if (relation === "Non" || relation === "") {
    totalCost = 15000;
    if(name == ""){
      
    }else{
      totalCost += 7000;
    }
  } else {
    totalCost += 7000;
  }


  document.getElementById("acp").value = totalCost;
}

</script>

</body>
</html>
