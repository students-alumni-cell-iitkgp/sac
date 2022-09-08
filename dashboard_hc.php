<?php
    session_start();  
    
    if(!isset($_SESSION['email']))
    {
      header("Location: ./loginpage.php");
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
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="./script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
  <link rel="stylesheet" href="./css/dash.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>

<div class="grid">

<header class="header">
    <i class="fas fa-bars header__menu"></i>
    <div class="header__search">
    </div>
    <div class="header__avatar"  style="background-image:url(<?php echo $pro_pic ?>)">
      <div class="dropdown">
        <ul class="dropdown__list">
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="far fa-user"></i></span>
            <a class="dropdown__title" onclick="attendee()">Attendee </a>
          </li>
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="fas fa-clipboard-list"></i></span>
            <a class="dropdown__title" onclick="payment()"> Payment </a>
          </li>
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="fas fa-sign-out-alt"></i></span>
            <a class="dropdown__title" href="utility/logout2.php" data-bs-toggle="dropdown"> Logout </a>	
          </li>
        </ul>
      </div>
    </div>
  </header>

<!--<nav class="navbar navbar-brand sticky-top navbar-expand-lg navbar-light bg-light">

<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item "> 
        <a class="nav-link" onclick="attendee()">Attendee </a> 
      </li>
      <li class="nav-item ">
        <a class="nav-link" onclick="payment()"> Payment </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="utility/logout2.php" data-bs-toggle="dropdown"> Logout </a>	
      </li>
    </ul>
  </div>
</div>
</nav>-->

  <aside class="sidenav">
    <div class="sidenav__brand">
      <a class="sidenav__brand-link" href="homecoming.php">Home<span class="text-light">coming</span></a>
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <div class="sidenav__profile">
    <div class="sidenav__profile-avatar"><img src=<?php echo $pro_pic ?> alt="dp" width="100%" height="100%" style="border-radius:100%" /></div>
    <div class="sidenav__profile-title text-light"><?php echo "$name"?></div>
    </div>
    <div class = "row" style = "margin-top: 10px; margin-bottom: 10px;padding:20px;background-color:rgba(255, 255, 255, 0.1)">
     <form action="./backend/photo.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()">
     <label for="username">Update Photo</label>
           <input type="file" id="pro_pic" name="pro_pic" accept=".jpg, .jpeg, .png">
            <div class = "row" style="justify-content:center">
        <button id="submit" class="btn btn-sm btn-primary" type = "submit">Save</button>
        </div>
     </form>
     </div>
    <div class="row row--align-v-center row--align-h-center">
      <ul class="navList">
      <br>
      <li>
          <div class="navList__subheading row row--align-v-center button" id="personal" onclick="personal()">
            <span class="navList__subheading-icon"><i class="fa fa-user"></i></span>
            <span class="navList__subheading-title">Personal Info</span>
          </div>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center button" id="travel" onclick="travel()">
            <span class="navList__subheading-icon"><i class="fas fa-plane"></i></span>
            <span class="navList__subheading-title">Travel Details</span>
          </div> 
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center button"id="accomod" onclick="accomod()"  >
            <span class="navList__subheading-icon"><i class="fas fa-bed"></i></span>
            <span class="navList__subheading-title">Accomodation</span>
          </div>
        </li>  

        <!--<li>
          <div class="navList__subheading row row--align-v-center button" id="covid" onclick="covid()">
            <span class="navList__subheading-icon"><i class="fas fa-syringe"></i></span>
            <span class="navList__subheading-title">Covid Info</span>
          </div>
        </li>-->
        <li>
          <div class="navList__subheading row row--align-v-center button" id="work" onclick="work()" >
            <span class="navList__subheading-icon"><i class="fas fa-briefcase"></i></span>
            <span class="navList__subheading-title">Work Experience</span>
          </div> 
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center button" id="nostalg" onclick="nostalg()">
            <span class="navList__subheading-icon"><i class="fas fa-hand-peace"></i></span>
            <span class="navList__subheading-title">Nostalgic Section</span>
          </div>
        </li> 
        <!--<li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="far fa-angry"></i></span>
            <span class="navList__subheading-title">YOY</span>
          </div>
        </li> -->  
      </ul>
    </div>
  </aside>

  <main class="main">

    <div class="row" style= "justify-content:right; margin-top:20px; margin-right:40px">
      <div class="overviewCard col-4">
        <div class="overviewCard-icon overviewCard-icon--photo">
           <i class="fas fa-rupee-sign"></i>
        </div>
        <div class="overviewCard-description">
        <h6><span>Payment Status: <?php echo "$cost"?></h6><h6> <?php if(empty($reciept)) echo "<span style='color:red;'>PENDING</span>"; else echo "<span style='color:green;'>PAID</span>" ?></span></h6>
        <a class = "btn btn-success" style = "color:white" onclick="payment()">Make Payment</a>  
      </div>
      </div>
    </div> <!-- /.main__overview -->

      <?php include './edit/personal.php' ?>
      <?php include './edit/travel.php' ?>
      <?php include './edit/covid.php' ?>
      <?php include './edit/accomodation.php' ?>
      <?php include './edit/work.php' ?>
      <?php include './edit/nostalgia.php' ?>
      <?php include './edit/payment.php' ?>    
      <?php include './edit/attendee.php' ?> 
  </main>

  <footer class="footer">
    <p><span class="footer__copyright">&copy;</span> 2022 Students' Alumni Cell</p>
  </footer>
</div>
<script>
/* Scripts for css grid dashboard */

$(document).ready(() => {
  addResizeListeners();
  setSidenavListeners();
  setUserDropdownListener();
  setMenuClickListener();
  setSidenavCloseListener();
});

// Set constants and grab needed elements
const sidenavEl = $('.sidenav');
const gridEl = $('.grid');
const SIDENAV_ACTIVE_CLASS = 'sidenav--active';
const GRID_NO_SCROLL_CLASS = 'grid--noscroll';

function toggleClass(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}

// User avatar dropdown functionality
function setUserDropdownListener() {
  const userAvatar = $('.header__avatar');

  userAvatar.on('click', function(e) {
    const dropdown = $(this).children('.dropdown');
    toggleClass(dropdown, 'dropdown--active');
  });
}

// Sidenav list sliding functionality
function setSidenavListeners() {
  const subHeadings = $('.navList__subheading'); console.log('subHeadings: ', subHeadings);
  const SUBHEADING_OPEN_CLASS = 'navList__subheading--open';
  const SUBLIST_HIDDEN_CLASS = 'subList--hidden';

  subHeadings.each((i, subHeadingEl) => {
    $(subHeadingEl).on('click', (e) => {
      const subListEl = $(subHeadingEl).siblings();

      // Add/remove selected styles to list category heading
      if (subHeadingEl) {
        toggleClass($(subHeadingEl), SUBHEADING_OPEN_CLASS);
      }

      // Reveal/hide the sublist
      if (subListEl && subListEl.length === 1) {
        toggleClass($(subListEl), SUBLIST_HIDDEN_CLASS);
      }
    });
  });
}

function toggleClass(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}

// If user opens the menu and then expands the viewport from mobile size without closing the menu,
// make sure scrolling is enabled again and that sidenav active class is removed
function addResizeListeners() {
  $(window).resize(function(e) {
    const width = window.innerWidth;

    if (width > 750) {
      sidenavEl.removeClass(SIDENAV_ACTIVE_CLASS);
      gridEl.removeClass(GRID_NO_SCROLL_CLASS);
    }
  });
}

// Menu open sidenav icon, shown only on mobile
function setMenuClickListener() {
  $('.header__menu').on('click', function(e) { console.log('clicked menu icon');
    toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
    toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
  });
}

// Sidenav close icon
function setSidenavCloseListener() {
  $('.sidenav__brand-close').on('click', function(e) {
    toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
    toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
  });
}

    const prof1 = document.getElementsByClassName('prof1')[0];
    const prof2 = document.getElementsByClassName('prof2')[0];
    const prof3 = document.getElementsByClassName('prof3')[0];
    const prof4 = document.getElementsByClassName('prof4')[0];
    const prof5 = document.getElementsByClassName('prof5')[0];
    const prof6 = document.getElementsByClassName('prof6')[0];
    const prof7 = document.getElementsByClassName('prof7')[0];
    const prof8 = document.getElementsByClassName('prof8')[0];


    function personal() {
        document.getElementsByClassName('prof1')[0].style.display = "block";
        document.getElementsByClassName('prof2')[0].style.display = "none";
        document.getElementsByClassName('prof3')[0].style.display = "none";
        document.getElementsByClassName('prof4')[0].style.display = "none";
        document.getElementsByClassName('prof5')[0].style.display = "none";
        document.getElementsByClassName('prof6')[0].style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";

        document.getElementById("personal").style.color = "#4169e1";
        document.getElementById("work").style.color    = "white";
        document.getElementById("nostalg").style.color = "white";
       // document.getElementById("covid").style.color   = "white";
        document.getElementById("accomod").style.color = "white";
        document.getElementById("travel").style.color  = "white";
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

        document.getElementById("personal").style.color = "white";
        document.getElementById("work").style.color     = "white";
        document.getElementById("nostalg").style.color  = "white";
       // document.getElementById("covid").style.color    = "white";
        document.getElementById("accomod").style.color  = "white";
        document.getElementById("travel").style.color   = "#4169e1";
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

        document.getElementById("personal").style.color = "white";
        document.getElementById("work").style.color     = "white";
        document.getElementById("nostalg").style.color  = "white";
        //document.getElementById("covid").style.color    = "white";
        document.getElementById("accomod").style.color = "#4169e1";
        document.getElementById("travel").style.color  = "white";
    }

    function covid() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "block";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";

        document.getElementById("personal").style.color = "white";
        document.getElementById("work").style.color     = "white";
        document.getElementById("nostalg").style.color  = "white";
        document.getElementById("covid").style.color = "#4169e1";
        document.getElementById("accomod").style.color = "white";
        document.getElementById("travel").style.color  = "white";
    }

    function work() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "block";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "none";

        document.getElementById("personal").style.color = "white";
        document.getElementById("work").style.color = "#4169e1";
        document.getElementById("nostalg").style.color = "white";
       // document.getElementById("covid").style.color   = "white";
        document.getElementById("accomod").style.color = "white";
        document.getElementById("travel").style.color  = "white";
    }

    function nostalg() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "block";
        prof7.style.display = "none";
        prof8.style.display = "none";

        document.getElementById("personal").style.color = "white";
        document.getElementById("work").style.color     = "white";
        document.getElementById("nostalg").style.color = "#4169e1";
       // document.getElementById("covid").style.color   = "white";
        document.getElementById("accomod").style.color = "white";
        document.getElementById("travel").style.color  = "white";
    }

    function payment() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "block";
        prof8.style.display = "none";

        document.getElementById("personal").style.color = "white";
        document.getElementById("work").style.color     = "white";
        document.getElementById("nostalg").style.color  = "white";
        //document.getElementById("covid").style.color    = "white";
        document.getElementById("accomod").style.color  = "white";
        document.getElementById("travel").style.color   = "white";
    }

    function attendee() {
        prof1.style.display = "none";
        prof2.style.display = "none";
        prof3.style.display = "none";
        prof4.style.display = "none";
        prof5.style.display = "none";
        prof6.style.display = "none";
        prof7.style.display = "none";
        prof8.style.display = "block";

        document.getElementById("personal").style.color = "white";
        document.getElementById("work").style.color     = "white";
        document.getElementById("nostalg").style.color  = "white";
       // document.getElementById("covid").style.color    = "white";
        document.getElementById("accomod").style.color  = "white";
        document.getElementById("travel").style.color   = "white";
    }

    personal();

    function calc_cost(){
           let nguest = document.getElementById("accompaniment").value;
           //let choice = document.getElementById("g").value;

           let e = document.getElementById("employee").value;
           var cost = 0;
           if(e == 0)
           { 
                   cost = 2250 + 8000 + 5000*nguest + 2250*nguest;
           }
           else if(e==1){
               cost =8000 + 5000*nguest;
          }
           //console.log(nguest,choice,e);
          
           document.getElementById("cost").value ="Total Cost = (₹) "+cost;
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

</script>
</body>
</html>
