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
  <link rel="stylesheet" href="./signupa.css">
  <style>
    .palLogo{
      test-align: right;
    }
  </style>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body{
      background: url(./aa.webp) no-repeat center center fixed;
    	background-size: cover;
    	min-height: 100vh;
    }
    .card-header{background-color: #1E88E5};
    
    #alert-msg {
        text-align: center;
        margin-top: 10px;
        margin-bottom: 15px;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        color: #8a0000;
        border: 1px solid #8a0000;
        background-color: #64B5F6;
      }

      .heading-main{
        display: flex;
        justify-items: center;
        align-items: center;
        text-align: center;
        background-color: #42A5F5;
        padding: 30px;
      }

      .instiLogo{
        margin-right: 30px;
          width: 50px;
      }

      
  </style>
<?php
// DB config
// include 'adminPages/config.php';
include 'test.php'; //db connection on my pc

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'] ?? null;
    $social_links = $_POST['social_links'] ?? '';

    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $country = $_POST['country'] ?? '';
    $zipcode = $_POST['zipcode'] ?? '';

    $accompaniment = $_POST['accompaniment'] ?? 0;
    $acc_kid = $_POST['acc_kid'] ?? 0;

    $foodPreference = $_POST['foodPreference'] ?? '';
    $cost = $_POST['cost'] ?? 0;
    $profession = $_POST['profession'] ?? '';
    $designation = $_POST['designation'] ?? '';
    $organisation = $_POST['organisation'] ?? '';

    $waddress = $_POST['waddress'] ?? '';
    $wcity = $_POST['wcity'] ?? '';
    $wstate = $_POST['wstate'] ?? '';
    $wcountry = $_POST['wcountry'] ?? '';
    $wzipcode = $_POST['wzipcode'] ?? '';

    $rollno = $_POST['rollno'] ?? '';
    $degree = $_POST['degree'] ?? '';
    $dept = $_POST['dept'] ?? '';
    $hall = $_POST['hall'] ?? '';
    $yoj = $_POST['yoj'] ?? 0;
    $yog = $_POST['yog'] ?? 0;

    $dateOfArr = $_POST['dateOfArr'] ?? null;
    $dateOfDep = $_POST['dateOfDep'] ?? null;
    $timeOfArr = $_POST['timeOfArr'] ?? null;
    $timeOfDep = $_POST['timeOfDep'] ?? null;

    $payment = $_POST['payment'] ?? 0;

    $conn = $connection;

    // Collect all accompanying person names/relations into array
    $accomp = [];
    for ($i = 1; $i <= $accompaniment; $i++) {
        $nameAcc = $_POST["acc_person_$i"] ?? '';
        $relationAcc = $_POST["acc_relation_$i"] ?? '';
        if($nameAcc) $accomp[] = ['name'=>$nameAcc,'relation'=>$relationAcc];
    }
    $acc_details_json = json_encode($accomp, JSON_UNESCAPED_UNICODE);
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

    // Insert using prepared statement
    $sql = "INSERT INTO AAM 
    (`name`, `email`, `mobile`, `dob`, `address`, `city`, `state`, `country`, `zipcode`,
    `accompaniment`, `acc_kid`, `acc_details`, `foodPreference`, `cost`, `profession`, `organisation`, `designation`,
    `waddress`, `wcity`, `wstate`, `wcountry`, `wzipcode`, `rollno`, `degree`, `dept`, `hall`, `yoj`, `yog`,
    `dateOfArr`, `dateOfDep`, `timeOfArr`, `timeOfDep`, `social_links`, `payment`)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssiissdsssssssssssiisssssi",
        $name, $email, $mobile, $dob, $address, $city, $state, $country, $zipcode,
        $accompaniment, $acc_kid, $acc_details_json, $foodPreference, $cost, $profession, $organisation, $designation,
        $waddress, $wcity, $wstate, $wcountry, $wzipcode, $rollno, $degree, $dept, $hall, $yoj, $yog,
        $dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $social_links_json, $payment
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
<body class="bodyBG">
<!-- <div class="heading-main">
    <h2 class="accordion-header" id="headingOne" >
        Registration for <br> 22nd Annual Alumni Meet
    </h2>
</div> -->
<div class="section1">
  <div class="heading-main">
      <div class="instiLogo">
            <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
        </div>
        <div class="instiLogo">
                <img class="instiLogo palLogo" src="./palJubLogo.png" alt="">
            </div>
    <h2 class="accordion-header" id="headingOne" >
        Registration for 22nd Annual Alumni Meet
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
            <label>Name<span style="color:red;">*</span></label>
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
            <label>Mobile<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="date" class="form-control" name="dob" placeholder="dd-mm-yyyy" required>
             <label>Date of Birth<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-12">
            <input type="text" class="form-control" name="social_links" placeholder="www.facebook/xyz.com" maxlength="150">
            <label>Social Media Link(Facebook, LinkedIn, etc..)<span style="color:red;"></span></label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-12">
            <input type="text" class="form-control" name="address" placeholder="XYZ....." maxlength="200">
            <label>Address</label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="city" placeholder="Kharagpur" maxlength="50">
            <label>City</label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="state" placeholder="West Bengal" maxlength="50">
             <label>State</label>
           </div>
        </div>
        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="country" placeholder="India" maxlength="50">
            <label>Country</label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="zipcode" placeholder="38....." maxlength="20">
             <label>Zip Code</label>
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
        Nostalgic Section
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="rollno" placeholder="17XY...." maxlength="20">
            <label>Roll Number</label>
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
            <label for="degree">Degree<span style="color:red;">*</span></label>
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
           <div class="form-floating mb-3 col-sm-6">
            <input type="number" min="1951" max="2020" class="form-control" name="yoj" placeholder="2010" required>
            <label>Join Year<span style="color:red;">*</span></label>
           </div class="form-floating mb-3 col-sm-6"> 
             <label>Year of Graduating<span style="color:red;">*</span></label>
             <select class="form-floating mb-3 col-sm-6 form-control" name="yog" required>
               <option selected value="1976">1976</option>
               <option value="1986">1986</option>
               <option value="2001">2001</option>
              </select>
        </div>

      </div>
    </div>
  </div>







  <!-- Accompany And Food -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accompanying and Food
      </button>
    </h2>

    
    
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
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
                 <td>Per Accompanying Person(s)</td>
                 <td>7000</td>
               </tr>
             </tbody>
           </table>
           <small class="text-muted">Registration Fee includes Food, Transportation and Registration Kit</small>

           <div class="row" style="margin-top: 15px">
          <div class="form-floating mb-3 col-sm-6">
                <input type="number" class="form-control" id="accompaniment" name="accompaniment" value="0" min="0" max="20" oninput="calc_cost()">
                <label>Accompanying Person(s)</label>
             </div>

             <div class="form-floating mb-3 col-sm-6">
                <input type="number" class="form-control" id="acc_kid" name="acc_kid" value="0" min="0" max="20">
                <label>Accompanying Kid(s)</label>
                <small class="text-muted">Kids below 10 years of age won't be charged</small>
             </div>
           </div>

           <div class="row" style="justify-content:center">
           <div class="mb-3 col-sm-4">
           <input class="form-control" id="acp" name="acp" type="text" placeholder="Total Reg Fee = 15000 INR" readonly>
           </div>
           </div>


           
           <!-- Dynamic accompanying persons name fields -->
           <div id="accompNamesContainer" class="mt-3"></div>
           <div class="row" style="justify-content:center; margin-top: 15px;">
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
        </div>

        

      </div>
    </div>
  </div>


  <!-- Accommodation -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingSeven">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
        Accommodation
      </button>
    </h2>


    
    
    
    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">


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

      <div class="accordion-body">
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
    </div>
  </div>


  <!-- Travel Section -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        Traveling Details
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
      <div class="accordion-body">
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

function calc_cost(){
    let nguest = parseInt(document.getElementById("accompaniment").value,10)||0;
    let c = 15000 + 7000*nguest;
    document.getElementById("acp").value ="Total Reg Fee = "+c;
    generateAccompanimentFields(nguest);
}

function generateAccompanimentFields(count) {
    let container = document.getElementById('accompNamesContainer');
    container.innerHTML = ''; // Clear previous fields

    if (count > 0) {
        let title = document.createElement('h5');
        title.textContent = "Accompanying Person(s) Details:";
        title.classList.add("mb-3", "text-primary");
        container.appendChild(title);
    }

    for (let i = 1; i <= count; i++) {
        let row = document.createElement('div');
        row.classList.add('row', 'mb-3');

        row.innerHTML = `
            <div class="form-floating mb-3 col-md-6">
                <input type="text" class="form-control" name="acc_person_${i}" placeholder="Name of Accompanying Person ${i}" required>
                <label>Name of Accompanying Person ${i}</label>
            </div>

            <div class="form-floating mb-3 col-md-6">
                <input type="text" class="form-control" name="acc_relation_${i}" placeholder="Relationship (e.g. Wife, Son, Friend)" required>
                <label>Relationship</label>
            </div>
        `;

        container.appendChild(row);
    }
}


</script>

</body>
</html>
