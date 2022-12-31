<?php
    session_start();  
    include_once('./config.php');
    
    if(!isset($_SESSION['email']))
    {
      header("Location: ./loginpage.php");
    }else{
      $email = $_SESSION['email'];
      $dob =   $_SESSION['password']; 
  
      $stmt = $conn->prepare("SELECT * FROM hc WHERE `email` = '$email'");
      $stmt->execute();
  
      $users = $stmt->fetchAll();
      foreach($users as $user) {
        $pay_status = $user['pay_status'] ;  
        //adding seession
        $_SESSION['pay_status']=$pay_status; 
    
      } 
    

    }
        $name    = $_SESSION['name']      ;
        $email   = $_SESSION['email']     ;
        $dob     = $_SESSION['dob']       ;

      $pro_pic   = $_SESSION['pro_pic'] ;
      $thumbnail = $_SESSION['thumbnail'];
        $address = $_SESSION['address']   ;
        $city    = $_SESSION['city']      ;
        $state   = $_SESSION['state']     ;
        $country = $_SESSION['country']   ;
        $zipcode = $_SESSION['zipcode']   ;
        $mobile  = $_SESSION['mobile']    ;

        $covi_status      = $_SESSION['covi_status']       ;
        $covi_certi       = $_SESSION['covi_certi']  ;
        $covi_dose        = $_SESSION['covi_dose']        ;
          $marital        = $_SESSION['marital']        ;
        $accompaniment    = $_SESSION['accompaniment'] ;
        $acc_kid    = $_SESSION['acc_kid'] ;
        $acc_tot    = $accompaniment + $acc_kid + 1 ;
          $gh             = $_SESSION['gh']           ;
          $cost           = $_SESSION['cost']           ;
          $serial         = $_SESSION['serial'];
          $employee       = $_SESSION['employee'];

        $industry     = $_SESSION['industry']     ;
        $profession   = $_SESSION['profession']   ;
        $organisation = $_SESSION['organisation']      ;
        $designation  = $_SESSION['designation']  ;
        $waddress     = $_SESSION['waddress'] ;
        $wcity        = $_SESSION['wcity']    ;
        $wstate       = $_SESSION['wstate']   ;
        $wcountry     = $_SESSION['wcountry'] ;
        $wzipcode     = $_SESSION['wzipcode'] ;

        $rollno      = $_SESSION['rollno']         ;
        $yoj         = $_SESSION['yoj']        ;
        $degree      = $_SESSION['degree']          ;
        $dept        = $_SESSION['dept']      ;
        $hall        = $_SESSION['hall']            ;
        $yog         = $_SESSION['yog']  ;
        $involvement = $_SESSION['involvement']    ;
        $hobbies     = $_SESSION['hobbies']         ;

        $reciept = $_SESSION['reciept'] ;  
        $pay_status = $_SESSION['pay_status'] ;  
       
        $travel_form   = $_SESSION['travel_form']      ;
        $mode          = $_SESSION['mode']      ;
        $reach_in      = $_SESSION['reach_in']      ;
        $date_reach_in = $_SESSION['date_reach_in']      ;
        $time_reach_in = $_SESSION['time_reach_in']      ;
        $flight_no     = $_SESSION['flight_no']      ; 
        $train_no      = $_SESSION['train_no']      ;
        $cab           = $_SESSION['cab']      ;
        $cab_type      = $_SESSION['cab_type']      ;
        $no_acc        = $_SESSION['no_acc']      ;
        $reach_out     = $_SESSION['reach_out']      ;
        $date_reach_out= $_SESSION['date_reach_out']      ;
        $time_reach_out= $_SESSION['time_reach_out']      ;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
<title>
  
Students' Alumni Cell | Dashboard
  
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Files -->

<link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

<style>
   .prof8,
   .prof9,
   .prof10,
   .prof11,
   .prof12,
   .prof13{
      display: none;
   }

   li{
    cursor: pointer;
   }

input{
  z-index: 10;
}
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
</style>
  </head>

  <body class="g-sidenav-show  bg-gray-100">
      
      <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-white" id="sidenav-main">

  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="https://sac.iitkgp.ac.in/" target="_blank">
      <img src="./img/logo/sac_logo.png" class="navbar-brand-img " style = "width:160px" alt="main_logo">
      <span class="ms-1 font-weight-bold text-dark"></span>
    </a>
  </div>


  <hr class="horizontal light mt-0 mb-2">

  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-8">Dashboard</h6>
    </li>
          
  
<li class="nav-item">
  <a class="nav-link text-dark " onclick="personal()">
    
      <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">manage_accounts</i>
      </div>
    
    <span class="nav-link-text ms-1">Personal Information</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-dark " onclick="travel()">
    
      <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">flight_takeoff</i>
      </div>
    
    <span class="nav-link-text ms-1">Travel Details</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-dark " onclick="accomod()">
    
      <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">local_hotel</i>
      </div>
    
    <span class="nav-link-text ms-1">Accomodation</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-dark " onclick="work()">
    
      <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">work</i>
      </div>
    
    <span class="nav-link-text ms-1">Work Experience</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-dark " onclick="nostalg()">
    
      <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">local_fire_department</i>
      </div>
    
    <span class="nav-link-text ms-1">Nostalgic Section</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-dark " onclick="yoy()">
    
      <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">style</i>
      </div>
    
    <span class="nav-link-text ms-1">Yearnings of Yore</span>
  </a>
</li>

 
<li class="nav-item">
  <a class="nav-link text-dark " href="http://alumni.iitkgp.ac.in/giving_back" target="_blank">
    
      <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">apartment</i>
      </div>
    
    <span class="nav-link-text ms-1">Institutional Development <br>Program</span>
  </a>
</li>
           
    </ul>
  </div>
  
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.facebook.com/iitkgp.alumnicell" target = "_blank" type="button">Facebook</a>
    </div>
    
  </div>
  
</aside>

      <main class="main-content border-radius-lg ">
        <!-- Navbar -->

<nav class="navbar navbar-main navbar-expand-lg fixed-top px-0 shadow-none border-radius-xl" id="navbarBlur" style = "background-color:#DDDDDD"data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <a class="navbar-brand m-0" href="https://sac.iitkgp.ac.in/" target="_blank">
      <img src="./img/logo19.webp" class="navbar-brand-img " style = "width:80px; height: 80px" alt="main_logo">
      <span class="ms-1" style = "font-weight: bold; color: #D81B60">19th Annual Alumni Meet</span>
    </a>
      
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          
         <!-- <div class="input-group input-group-outline">
            <label class="form-label">Search...</label>
            <input type="text" class="form-control">
          </div>-->
          
      </div>
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item d-flex align-items-center">
          <a href="" class="nav-link text-body font-weight-bold px-0">
          <img src="<?php echo $pro_pic ?>" alt="dp" width="30px" height="30px" style="border-radius:100%" />       
            <span class="d-sm-inline d-none"><?php echo "$name"?></span>
          </a>
        </li>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
          <a onclick="attendee()" class="nav-link text-body p-0" data-toggle="tooltip" data-placement="bottom" title="Attendee">
            <i class="fa fa-users fixed-plugin-button-nav cursor-pointer"></i> Attendee
          </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
          <a onclick="payment()" class="nav-link text-body p-0" data-toggle="tooltip" data-placement="bottom" title="Payment">
            <i class="fa fa-inr fixed-plugin-button-nav cursor-pointer"></i> Payment
          </a>
        </li>
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="Utility/logout2.php" class="nav-link text-body p-0" data-toggle="tooltip" data-placement="bottom" title="Logout">
            <i class="fa fa-sign-out cursor-pointer"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- End Navbar -->

<div class="row" style="padding-left:1px ;margin-top:100px">
        <div class="col-md-7 mt-4">
        <?php include './show/personal.php' ?>
        <?php include './show/travel.php' ?>
        <?php include './show/accomodation.php' ?>
        <?php include './show/work.php' ?>
        <?php include './show/nostalgia.php' ?>
        <?php include './show/payment.php' ?>
        <?php include './edit/attendee.php' ?>
        <?php include './edit/yoy.php' ?>
        <?php include './edit/personal.php' ?>
        <?php include './edit/travel.php' ?>
        <?php include './edit/accomodation.php' ?>
        <?php include './edit/work.php' ?>
        <?php include './edit/nostalgia.php' ?>
        
        </div>
        <div class="col-md-5 mt-4">
        <div class="card h-100">
        <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h5 class="mb-0">Itinerary(Provisional)</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small>6th - 8th January 2023</small>
                </div>
              </div>
            </div>
            <h6 class="mb-0" style="padding: 1.5rem;">Day 1, 06 January, Friday</h6>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">restaurant</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Breakfast</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 08:00 AM to 10:00 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">how_to_reg</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Registration</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 09:00 AM to 12:00 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">restaurant</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Lunch</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 12:00 PM to 01:30 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">school</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Institute Function</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 01:30 PM to 03:30 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">history_edu</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Department Visit</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 03:30 PM to 05:30 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-dark text-gradient">lyrics</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Interactive Session</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 05:30 PM to 08:00 PM</p>
                  </div>
                </div>

                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">restaurant</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Dinner</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 08:00 PM to 10:00 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">grass</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Hall Visit</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">06 JAN, 10:00 PM to 11:30 PM</p>
                  </div>
                </div>
                <h6 class="mb-0" style="padding: 1.5rem;">Day 2, 07 January, Saturday</h6>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">restaurant</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Breakfast</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 08:00 AM to 09:30 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">location_on</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Campus Tour</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 09:30 AM to 12:00 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">key</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Classroom Unveiling and Interactive Session</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 12:00 PM to 01:30 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-dark text-gradient">restaurant</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Lunch</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 01:30 PM to 03:00 PM</p>
                  </div>
                </div>

                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">coffee</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Free Time/Networking Snacks</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 03:00 PM to 4:30 PM</p>
                  </div>
                </div>

                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">music_note</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Entertainia</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 4:30 PM to 7:00 PM</p>
                  </div>
                </div>
                </hr>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">fireplace</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Illumination</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 07:00 PM to 08:00 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">dinner_dining</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Gala Dinner with Dj, Bonfire</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07 JAN, 08:00 PM to 10:00 PM</p>
                  </div>
                </div>
                <h6 class="mb-0" style="padding: 1.5rem;">Day 3, 08 January, Sunday</h6>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">directions_run</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">2.2 Marathon</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">08 JAN, 07:00 AM to 08:15 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-dark text-gradient">restaurant</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Breakfast</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">08 JAN, 08:00 AM to 09:30 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">volunteer_activism</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Closing Ceremony</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">08 JAN, 10:00 AM to 12:00 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-dark text-gradient">restaurant</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Lunch</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">08 JAN, 12:00 PM to 02:00 PM</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>


  <footer class="footer py-4  ">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          © <!-- <script>
            document.write(new Date().getFullYear())
          </script>--> 2020,
          <a href="" class="font-weight-bold" target="_blank">Students' Alumni Cell</a>
        </div>
      </div>
      
    </div>
  </div>
</footer>

            </div>

         
       </main>
    

      
       <!--   <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
       <!-- End Toggle Button
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>

        <!-- Sidenav Type
        
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>

        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>

        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        

        <!-- Navbar Fixed
        
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        

        
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
          
        </div>
      </div>
    </div>
</div>-->

<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" ></script>
<script src="./assets/js/core/bootstrap.min.js" ></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js" ></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js" ></script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }

  const prof1 = document.getElementsByClassName('prof1')[0];
    const prof2 = document.getElementsByClassName('prof2')[0];
    const prof3 = document.getElementsByClassName('prof3')[0];
    const prof4 = document.getElementsByClassName('prof4')[0];
    const prof5 = document.getElementsByClassName('prof5')[0];
    const prof6 = document.getElementsByClassName('prof6')[0];
    const prof7 = document.getElementsByClassName('prof7')[0];
    const prof8 = document.getElementsByClassName('prof8')[0];
    const prof9 = document.getElementsByClassName('prof9')[0];
    const prof10 = document.getElementsByClassName('prof10')[0];
    const prof11 = document.getElementsByClassName('prof11')[0];
    const prof12 = document.getElementsByClassName('prof12')[0];
    const prof13 = document.getElementsByClassName('prof13')[0];


    function personal() {
        document.getElementsByClassName('prof1')[0].style.display = "block";
        document.getElementsByClassName('prof2')[0].style.display = "none";
        document.getElementsByClassName('prof3')[0].style.display = "none";
        document.getElementsByClassName('prof4')[0].style.display = "none";
        document.getElementsByClassName('prof5')[0].style.display = "none";
        document.getElementsByClassName('prof6')[0].style.display = "none";
        document.getElementsByClassName('prof7')[0].style.display = "none";
        document.getElementsByClassName('prof8')[0].style.display = "none";
        document.getElementsByClassName('prof9')[0].style.display = "none";
        document.getElementsByClassName('prof10')[0].style.display = "none";
        document.getElementsByClassName('prof11')[0].style.display = "none";
        document.getElementsByClassName('prof12')[0].style.display = "none";
        document.getElementsByClassName('prof13')[0].style.display = "none";

    }

    function travel() {
        document.getElementsByClassName('prof1')[0].style.display = "none";
        document.getElementsByClassName('prof2')[0].style.display = "block";
        document.getElementsByClassName('prof3')[0].style.display = "none";
        document.getElementsByClassName('prof4')[0].style.display = "none";
        document.getElementsByClassName('prof5')[0].style.display = "none";
        document.getElementsByClassName('prof6')[0].style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }

    function accomod() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "block";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";

    }

    /*function covid() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "block";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
    }*/

    function work() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "block";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }

    function nostalg() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "block";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }

    function payment() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "block";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }

    function attendee() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "block";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";

    }

    function edit_personal() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "block";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }
    function edit_travel() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "block";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }

    function edit_accomod() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "block";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }

    function edit_work() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "block";
        prof12.style.display = "none";
        prof13.style.display = "none";
    }

    function edit_nostalg() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "block";
        prof13.style.display = "none";
    }

    function yoy() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";
        prof9.style.display = "none";
        prof10.style.display = "none";
        prof11.style.display = "none";
        prof12.style.display = "none";
        prof13.style.display = "block";
    }

    personal();

    function calc_cost(){
           let nguest = document.getElementById("accompaniment").value;
           let choice = document.getElementById("g").value;

           let e = document.getElementById("employee").value;
           var cost = 0;
           var c = 0;
           c = 8000 + 5000*nguest;

           if(e == 0)
           { 
               if(choice === "TGH"){
                   cost = 2550 + 8000 + 5000*nguest + 2550*nguest;
               }
               else if(choice === "SAM"){
                   cost = 900 + 8000 + 5000*nguest + 900*nguest;
               }
               else{
                cost =8000 + 5000*nguest;
               }
           }
           else if(e==1){
               cost =8000 + 5000*nguest;
          }
           //console.log(nguest,choice,e);
           document.getElementById("acp").value ="Total Reg Fee = "+c;
           document.getElementById("cost").value ="Total Cost = "+cost;
           //console.log(cost);
       }

function emp()
{

  document.getElementById("serial").style.display = "none";
  document.getElementById("gh").style.display = "none";

  let e = document.getElementById("employee").value;
  if(e == 0)
  {
    document.getElementById("gh").style.display = "block";
    document.getElementById("serial").style.display = "none";
  }
  else if(e==1){
    document.getElementById("serial").style.display = "block";
    document.getElementById("gh").style.display = "none";
  }
  else{
    document.getElementById("serial").style.display = "none";
    document.getElementById("gh").style.display = "none";
  }

  calc_cost();
}
emp();

setTimeout(function() {
  document.getElementById("succ").style.display = "none"
          }, 5000);
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
  </body>

</html>
