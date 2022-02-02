<?php
    session_start();  
    
    if(!isset($_SESSION['email']))
    {
      header("Location: ../logout.html");
    }
        // CREATING SESSION  
        $name    = $_SESSION['Name']      ;
        $email   = $_SESSION['email']     ;
        $address = $_SESSION['address']   ;
        $city    = $_SESSION['city']      ;
        $state   = $_SESSION['state']     ;
        $country = $_SESSION['country']   ;
        $zipcode = $_SESSION['zipcode']   ;
        $mobile  = $_SESSION['mobile']    ;
        $dob     = $_SESSION['dob']       ;

        $status      = $_SESSION['status']       ;
        $certificate = $_SESSION['certificate']  ;
        $dosedate    = $_SESSION['valid']        ;

          $marital      = $_SESSION['marital']        ;
        $accompaniments = $_SESSION['accompanyingNo'] ;
          $gh           = $_SESSION['room']           ;
          $cost         = $_SESSION['cost']           ;

        $industry     = $_SESSION['industry']     ;
        $profession   = $_SESSION['profession']   ;
        $organisation = $_SESSION['orgName']      ;
        $designation  = $_SESSION['designation']  ;
        $waddress     = $_SESSION['work_address'] ;
        $wcity        = $_SESSION['work_city']    ;
        $wstate       = $_SESSION['work_state']   ;
        $wcountry     = $_SESSION['work_country'] ;
        $wzipcode     = $_SESSION['work_zipcode'] ;

        $rollno      = $_SESSION['rollNum']         ;
        $joinyear    = $_SESSION['joinYear']        ;
        $degree      = $_SESSION['degree']          ;
        $dept        = $_SESSION['department']      ;
        $hall        = $_SESSION['hall']            ;
        $yog         = $_SESSION['graduatingYear']  ;
        $involvement = $_SESSION['involvements']    ;
        $hobbies     = $_SESSION['hobbies']         ;

        $reciept = $_SESSION['reciept'] ;  
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
  <link rel="stylesheet" href="./css/dashboard.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
  <div>
  <?php include('navbar.php') ?>
<!-- partial:index.partial.html -->
<div class="con">
  <h1 class="logo"><span>PAYMENT STATUS: <?php if(empty($reciept)) echo "<span style='color:red;'>PENDING</span>"; else echo "<span style='color:green;'>PAID</span>" ?></span></h1>
  <div class="leftbox">
    <nav>
      <a id="profile" class="active"><i class="fa fa-user"></i> Personal Info</a>
      <a id="payment"><i class="fas fa-briefcase"></i> Work Experience</a>
      <a id="subscription"><i class="fas fa-hand-peace"></i> Nostalgic Section</a>
      <a id="privacy"><i class="fas fa-syringe"></i> Covid Info</a>
      <a id="settings"><i class="fas fa-bed"></i> Accomodation</a>
    </nav>
  </div>
  <div class="rightbox">
    <div class="profile">
      <h1>Personal Info</h1>
      <h2>Full Name</h2>
      <p><?php echo "$name"?></p>

      <h2>Email</h2>
      <p><?php echo "$email"?></p>

      <h2>Address</h2>
      <p><?php echo "$address"?></p>

      <h2>City</h2>
      <p><?php echo "$city"?></p>

      <h2>State</h2>
      <p><?php echo "$state"?></p>

      <h2>Country</h2>
      <p><?php echo "$country"?></p>

      <h2>Zipcode</h2>
      <p><?php echo "$zipcode"?></p>

      <h2>Mobile</h2>
      <p><?php echo "$mobile"?></p>

      <h2>DOB</h2>
      <p><?php echo "$dob"?></p>
    </div>

    <div class="payment noshow">
      <h1>Work Experience</h1>
      <h2>Industry</h2>
      <p><?php echo "$industry"?></p>

      <h2>Profession</h2>
      <p><?php echo "$profession"?></p>

      <h2>Organisation</h2>
      <p><?php echo "$organisation"?></p>

      <h2>Designation</h2>
      <p><?php echo "$designation"?></p>

      <h2>Work Address</h2>
      <p><?php echo "$waddress"?></p>

      <h2>Work City</h2>
      <p><?php echo "$wcity"?></p>

      <h2>Work State</h2>
      <p><?php echo "$wstate"?></p>

      <h2>Work Country</h2>
      <p><?php echo "$wcountry"?></p>

      <h2>Work Zipcode</h2>
      <p><?php echo "$wzipcode"?></p>
    </div>

    <div class="subscription noshow">
      <h1>Nostalgic Section</h1>
      <h2>Roll No</h2>
      <p><?php echo "$rollno"?></p>

      <h2>Join Year</h2>
      <p><?php echo "$joinyear"?></p>

      <h2>Degree</h2>
      <p><?php echo "$degree"?></p>

      <h2>Department</h2>
      <p><?php echo "$dept"?></p>

      <h2>Hall</h2>
      <p><?php echo "$hall"?></p>

      <h2>Year of Graduation</h2>
      <p><?php echo "$yog"?></p>

      <h2>Involvement</h2>
      <p><?php echo "$involvement"?></p>

      <h2>Hobbies</h2>
      <p><?php echo "$hobbies"?></p>
    </div>

    <div class="privacy noshow">
      <h1>Covid Info</h1>
      <h2>Vaccination Status</h2>
      <p><?php echo "$status"?></p>

      <h2>Able to get vaccinated by 10th Jan</h2>
      <p><?php echo "$dosedate"?></p>
    </div>
 <div class="settings noshow">
      <h1>Accomodation</h1>
      <h2>Marital Status</h2>
      <p><?php echo "$marital"?></p>

      <h2>Accompaniments</h2>
      <p><?php echo "$accompaniments"?></p>

      <h2>Guest House</h2>
      <p><?php echo "$gh"?></p>

      <h2>Total Cost</h2>
      <p><?php echo "$cost"?></p>
    </div>

  </div>
</div>
</div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
