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
  <link rel="stylesheet" href="css/signup.css">
  <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    
    #alert-msg {
        text-align: center;
        margin-top: 10px;
        margin-bottom: 15px;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        color: #8a0000;
        border: 1px solid #8a0000;
        background-color: #e58f8f;
      }

      .heading-main{
        display: flex;
        justify-items: center;
        align-items: center;
        text-align: center;
        background-color: #61A5C2;
        padding: 30px;
      }

      
  </style>

<?php
// Show errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = $_POST;
    header("Location: register.php");
    exit;
}

// DB config
include 'adminPages/config.php';



function normalize_date_for_mysql($raw) {
    $raw = trim((string)$raw);
    if ($raw === '') return null;
    // try Y-m-d first
    $d = DateTime::createFromFormat('Y-m-d', $raw);
    if ($d && $d->format('Y-m-d') === $raw) return $d->format('Y-m-d');
    // try d-m-Y
    $d = DateTime::createFromFormat('d-m-Y', $raw);
    if ($d) return $d->format('Y-m-d');
    // try other parse
    $d = date_create($raw);
    if ($d) return $d->format('Y-m-d');
    // fallback default for dob requirement per your earlier request:
    return '1900-01-01';
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $country = $_POST['country'] ?? '';
    $zipcode = $_POST['zipcode'] ?? '';
    $accompaniment = $_POST['accompaniment'] ?? 0;
    $acc_kid = $_POST['acc_kid'] ?? 0;
    $cost = $_POST['cost'] ?? '';
    $industry = $_POST['industry'] ?? '';
    $profession = $_POST['profession'] ?? '';
    $organisation = $_POST['organisation'] ?? '';
    $designation = $_POST['designation'] ?? '';
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



    $dateOfArr_raw = $_POST['dateOfArr'] ?? '';
    $dateOfDep_raw = $_POST['dateOfDep'] ?? '';
    $timeOfArr_raw = $_POST['timeOfArr'] ?? '';
    $timeOfDep_raw = $_POST['timeOfDep'] ?? '';
    $stayDays = trim($_POST['stayDays'] ?? '');

    $dateOfArr = null;
    $dateOfDep = null;
    $timeOfArr = null;
    $timeOfDep = null;

    if (!empty($dateOfArr_raw)) {
        $tmp = normalize_date_for_mysql($dateOfArr_raw);
        $dateOfArr = $tmp === null ? null : $tmp;
    }
    if (!empty($dateOfDep_raw)) {
        $tmp = normalize_date_for_mysql($dateOfDep_raw);
        $dateOfDep = $tmp === null ? null : $tmp;
    }

    // time inputs should be in HH:MM or HH:MM:SS; accept as-is or null
    $timeOfArr = trim($timeOfArr_raw) ?: null;
    $timeOfDep = trim($timeOfDep_raw) ?: null;

    if (empty($email)) {
        echo "Email is required.";
        exit;
    }



    // Check for duplicate email
    $check = "SELECT * FROM AAM WHERE email = '$email'";
    $res = $conn->query($check);
    if ($res->num_rows > 0) {
        echo "Email already registered!";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO AAM (
        name, email, mobile, dob, gh address, city, state, country, zipcode,
        accompaniment, acc_kid, foodPreference, cost, industry, profession, organisation, designation,
        waddress, wcity, wstate, wcountry, wzipcode, serial, rollno, degree, dept, hall, yoj, yog,
        dateOfArr, dateOfDep, timeOfArr, timeOfDep, stayDays, payment
    ) VALUES (
        $name, $email, $mobile, $dob_mysql, $gh, $address, $city, $state, $country, $zipcode,
        $accompaniment, $acc_kid,
        $foodPreference, $cost, $industry, $profession, $organisation, $designation,
        $waddress, $wcity, $wstate, $wcountry, $wzipcode, $serial, $rollno, $degree, $dept, $hall, $yoj, $yog,
        $dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $stayDays, $payment
    )";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location = 'register.php';</script>";
    } else {
        echo "Database error: " . $conn->error;
    }
}

$gh_stmt = $conn->query("SELECT * FROM acco");
$guestHouses = [];
while($row = $gh_stmt->fetch_assoc()) {
    $guestHouses[] = $row;
}

// Fetch total availability from all guesthouses
$query = "SELECT av FROM acco";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$av = $row['av']; // total rooms available

$conn->close();
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

  <!-- Accommodation -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accommodation and Food
      </button>
    </h2>

    
    
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="row" style="justify-content:center; margin-top: 15px;">
          <div class="form-floating mb-3 col-sm-6">
              <select class="form-select" name="foodPreference" required>
                <option selected value="select">---Select---</option>
                <option value="VEG">Vegetarian</option>
                <option value="NONVEG">Non-Vegetarian</option>
                <option value="JAINS">Jains</option>
              </select>
              <label>Food Preference</label>
            </div>
        </div>
        <!-- Guest House Selection -->
      <div class="mb-3">
          <label for="gh">Select Guest House</label>
          <select class="form-select" name="gh" id="gh" required>
              <option value="">-- Select Guest House --</option>
              <?php foreach($guestHouses as $ghouse): ?>
                  <option value="<?= htmlspecialchars($ghouse['name']); ?>">
                      <?= htmlspecialchars($ghouse['name']); ?> (<?= $ghouse['av']; ?> rooms available)
                  </option>
              <?php endforeach; ?>
          </select>
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
                 <td>8000</td>
               </tr>
               <tr>
                 <th>2</th>
                 <td>Per Accompanying Person(s)</td>
                 <td>5000</td>
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
                <small class="text-muted">Kids below 13 years of age won't be charged</small>
             </div>
           </div>

           <div class="row" style="justify-content:center">
           <div class="mb-3 col-sm-4">
           <input class="form-control" id="acp" name="acp" type="text" readonly>
           </div>
           </div>

           <?php if ($av == 0): ?>
            <p id="alert-msg">
            All the rooms in the Institute Guest Houses have been filled. <br>
            Please contact us to get help in booking rooms outside the campus.
            <br>
            <span style="color:darkgreen">
                Rupesh Sahoo +91 9078260658
                <br>
                Nirmal Patidar +91 9368271624
            </span>
            </p>
           <?php endif; ?>

           <div class="row" style="justify-content:center">
             <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" name="serial" placeholder="20.." maxlength="50">
                <label>Employee ID</label>
             </div>
           </div>

           <!-- Total cost -->
           <div class="row" style="justify-content:center">
           <div class="mb-3 col-sm-4">
           <input class="form-control" id="cost" name="cost" type="text" readonly>
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
            <input type="text" class="form-control" name="industry" placeholder="Google" maxlength="100" required>
            <label>Industry<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="profession" placeholder="Manager" maxlength="100" required>
             <label>Profession<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name="organisation" placeholder="Google" maxlength="100" required>
            <label>Organisation Name<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="designation" placeholder="USA" maxlength="100">
             <label>Designation</label>
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
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name="degree" placeholder="B. Tech" maxlength="30">
             <label>Degree</label>
           </div>
        </div>

        <div class="row">
        <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" name="dept">
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
             <label>Department</label>
          </div>

           <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" name="hall">
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
             <label>Hall</label>
          </div>
        </div>

        <div class="row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="number" min="1951" max="2020" class="form-control" name="yoj" placeholder="2010" required>
            <label>Join Year<span style="color:red;">*</span></label>
           </div>
           <div class="form-floating mb-3 col-sm-6">
             <input type="number" min="1951" max="2020" class="form-control" name="yog" placeholder="2010" required>
             <label>Year of Graduating<span style="color:red;">*</span></label>
           </div>
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

        <div class="row">
      

           <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" name="stayDays" required>
            <option selected value="select">---Select---</option>
            <option value="firstDay">First Night only @ 15000 INR</option>
            <option value="TwoDays">Two Nights @ 20000 INR</option>
            <option value="SecondDay">Second Night only @ 15000 INR</option>
            </select>
             <label>Which Day(s) do you plan to stay</label>
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
    let c = 8000 + 5000*nguest;
    let cost = c + (2500*(nguest+1));
    document.getElementById("acp").value ="Total Reg Fee = "+c;
    document.getElementById("cost").value ="Total Cost = "+cost;
}
</script>

</body>
</html>
