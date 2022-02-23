<?php
    session_start();   
        // CREATING SESSION  

        if(!isset($_SESSION['email']))
    {
      header("Location: ./Utility/logout.html");
    }
        $kgpdoa        = $_SESSION['kgpdoa']      ;
        $kgptimetocome = $_SESSION['kgptimetocome']   ;
        $kgpmodeofT    = $_SESSION['kgpmodeofT']   ;
        $kgppickup     = $_SESSION['kgppickup']      ; 
        $kgppcount     = $_SESSION['kgppcount']   ;
        $kgpcarseater  = $_SESSION['kgpcarseater']      ; 

        $airdoa        = $_SESSION['airdoa']      ;
        $airtimetocome = $_SESSION['airtimetocome']   ;
        $airmodeofT    = $_SESSION['airmodeofT']   ;
        $airpickup     = $_SESSION['airpickup']      ; 
        $airpcount     = $_SESSION['airpcount']   ;
        $aircarseater  = $_SESSION['aircarseater']      ; 
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
   
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
    <link rel="stylesheet" href="../dashboard.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/loginpage.css"> -->

    <!-- <style>
        body{
                background-image: url("img/form-bg.jpeg");
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
            .station {
                font-family: 'Raleway', sans-serif;
                font-size:20;
            }
            .section2{
               display: none;
            }
    
    #btn1:hover{
        background-color: lightgrey !important;
    }

    #btn2:hover{
        background-color: lightgrey !important;
    }
              
    </style> -->

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
        crossorigin="anonymous"></script>-->

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>

<body>

<div class="container">
<div class="leftbox">
    <nav>
      <a id="train" class="active"><i class="fas fa-train"></i></i></a>
      <a id="plane"><i class="fas fa-plane"></i></a>
      <!-- <a id="subscription"><i class="fas fa-graduation-cap"></i></a>
      <a id="privacy"><i class="fas fa-syringe"></i></a>
      <a id="settings"><i class="fas fa-bed"></i></a> -->
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

  <h2 style="font-size: 180%; color: black; font-family: 'Raleway', sans-serif;">
                    Travelling Details
                </h2>
</div>
    <section>
        <div class="wrapper" style="margin-bottom: 2vw;">
            <center>
                <h2 style="font-size: 180%; color: black; font-family: 'Raleway', sans-serif;">
                    Travelling Details
                </h2>
            </center>
            <div class = "row station p-2">
                 <div class = "col-6 bttons text-center" id = "btn1"><button class="btn my-1" onclick="kgpin()" >KHARAGPUR STATION</button></div>
                 <div class = "col-6 bttons text-center" id = "btn2"><button class="btn my-1" onclick="kolin()" > KOLKATA AIRPORT</button></div>
            </div>
            <div class="progress" style="height:0.2rem;">
                <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <form id="login" action = "backend\travel.php" method = "post">
                <div class="section1">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="kgpdoa">Date of Arrival (KGP)<span style="color:red;"></span></label>
                                <input class="form-control" type="date" name="kgpdoa" id="kgpdoa" value = "<?php echo "$kgpdoa"?>">
                            </div>
                            <div class="col-sm-12 ">
                                <label for="kgptimetocome" class="form-label">
                                    Time to reach Kharagpur Station
                                    <span style="color:red;">**expected time</span>
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class='far fa-clock'></i></span>
                                    <input class="form-control" type="text" name="kgptimetocome" id="kgptimetocome" class="validate" value = "<?php echo "$kgptimetocome"?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="kgpmodeofT">Mode of Transportation <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="kgpmodeofT" id="kgpmodeofT" name="kgpmodeofT" value = "<?php echo "$kgpmodeofT"?>">
                                     <option value=""></option>
                                     <option value="Train">Train</option> 
                                     <option value="Plane">Plane</option>
                                     <option value="Car">Car</option>
                                    </select>
                                </div >
                            </div >
                            <div class="col-sm-12">
                                <label for="kgppickup">Do you want us to pick up you from station <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="kgppickup" id="kgppickup" name="kgppickup" value = "<?php echo "$kgppickup"?>">
                                        <option value=""></option> 
                                        <option value="Yes">Yes</option> 
                                        <option value="No">No</option>
                                    </select>
                                </div >
                            </div >
                            <div class="col-sm-12">
                                <label for="kgppcount">How many people are coming together<span style="color:red;"></span></label>
                                <input class="form-control" type="text" name="kgppcount" id="kgppcount" value = "<?php echo "$kgppcount"?>">   
                            </div >
                            <div class="col-sm-12">
                                <label for="kgpcarseater">Do you want Cab service <span style="color:red;">**paid</span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="kgpcarseater" id="kgpcarseater" name="kgpcarseater" value = "<?php echo "$kgpcarseater"?>">
                                        <option value=""></option> 
                                        <option value="4">04 Seater</option> 
                                        <option value="6">06 Seater</option>
                                        <!--<option value="4">04 <span align = "right"> (₹)1000 </span></option> 
                                        <option value="6">06 <span align = "right"> (₹)2000 </span></option>-->
                                    </select>
                                </div >
                            </div >


                        </div>
                       
                    </div>

                    <div class="row justify-content-between" style = " margin-right:3%;"> 
                        <div class="col-4 text-center">
                            <a class="btn btn-outline-primary " href="Utility/get_update.php" role="button">Skip for Now</a>
                        </div>
                        <div class="col-2 text-center">      
                             <div class=" col-md-1 col-3"> <button class="btn btn-primary" type = "button" onclick="next()">Next</button></div>
                        </div>
                   </div>
                </div>

                <div class="section2">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="airdoa">Date of Arrival(KolKata)<span style="color:red;"></span></label>
                                <input class="form-control" type="date" name="airdoa" id="airdoa" value = "<?php echo "$airdoa"?>">
                            </div>
                            <div class="col-sm-12 ">
                                <label for="airtimetocome" class="form-label">
                                    Time to reach Kolkata Airport/Station
                                    <span style="color:red;">*expected time</span>
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class='far fa-clock'></i></span>
                                    <input class="form-control" type="text" name="airtimetocome" id="airtimetocome" class="validate" value = "<?php echo "$airtimetocome"?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="airmodeofT">Mode of Transportation <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="airmodeofT" id="airmodeofT" name="airmodeofT" value = "<?php echo "$airmodeofT"?>">
                                     <option value=""></option>
                                     <option value="Train">Train</option> 
                                     <option value="Plane">Plane</option>
                                     <option value="Car">Car</option>
                                    </select>
                                </div >
                            </div >
                            <div class="col-sm-12">
                                <label for="airpickup">Do you want us to pick up you from station <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="airpickup" id="airpickup" name="airpickup" value = "<?php echo "$airpickup"?>">
                                        <option value=""></option> 
                                        <option value="Yes">Yes</option> 
                                        <option value="No">No</option>
                                    </select>
                                </div >
                            </div >
                            <div class="col-sm-12">
                                <label for="airpcount">How many people are coming together<span style="color:red;"></span></label>
                                <input class="form-control" type="text" name="airpcount" id="airpcount" value = "<?php echo "$airpcount"?>">   
                            </div >
                            <div class="col-sm-12">
                                <label for="aircarseater">Do you want Cab service <span style="color:red;">**paid</span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="aircarseater" id="aircarseater" name="aircarseater" value = "<?php echo "$aircarseater"?>">
                                        <option value=""></option> 
                                        <option value="4">04 </option> 
                                        <option value="6">06 </option>
                                        <!--<option value="4">04 <span align = "right"> (₹)1000 </span></option> 
                                        <option value="6">06 <span align = "right"> (₹)2000 </span></option>-->
                                    </select>
                                </div >
                            </div >


                        </div>
                       
                    </div>

                    <div class="row justify-content-between" style = " margin-right:3%;"> 
                        <div class="col-4 text-center">
                           <div class=" col-md-1 col-3">  <button class="btn btn-primary" type = "button" onclick="back()">Back</button> </div>
                        </div>
                        <div class="col-2 text-center">      
                           <button class="btn btn-primary" type="submit" value = "submit">Submit</button>
                        </div>
                   </div>
                </div>
            </form>
            <hr />
            <center >
                        <h6>You Can also inform us by mail </h6>
                        <h6><i class="contact-icon fas fa-envelope"></i> Mail: aao@hijli.iitkgp.ernet.in</h6>        
              </center>
        </div>
    </section>
    <?php include 'footer.php' ?>
    <script>
        function back(){
          document.getElementsByClassName("section1")[0].style.display = 'block';
          document.getElementsByClassName("section2")[0].style.display = 'none';

          document.getElementById("btn1").style.backgroundColor = "lightgrey";
            document.getElementById("btn2").style.backgroundColor = "white";
        } 

        function next(){
           document.getElementsByClassName("section1")[0].style.display = 'none';
           document.getElementsByClassName("section2")[0].style.display = 'block';

           document.getElementById("btn1").style.backgroundColor = "white";
           document.getElementById("btn2").style.backgroundColor = "lightgrey";
        }
        function kgpin(){
            document.getElementsByClassName('section1')[0].style.display = "block";
            document.getElementsByClassName('section2')[0].style.display = "none";

            document.getElementById("btn1").style.backgroundColor = "lightgrey";
            document.getElementById("btn2").style.backgroundColor = "white";
        }
        function kolin(){
            document.getElementsByClassName('section1')[0].style.display = "none";
            document.getElementsByClassName('section2')[0].style.display = "block";

            document.getElementById("btn1").style.backgroundColor = "white";
            document.getElementById("btn2").style.backgroundColor = "lightgrey";
        }
    </script>
</body>