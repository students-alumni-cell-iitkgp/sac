<?php
    session_start();   

    if(!isset($_SESSION['email']))
    {
      header("Location: logout.html");
    }
        // CREATING SESSION  
        $name    = $_SESSION['name']      ;
        $email   = $_SESSION['email']     ;
        $address = $_SESSION['address']   ;
        $city    = $_SESSION['city']      ;
        $state   = $_SESSION['state']     ;
        $country = $_SESSION['country']   ;
        $zipcode = $_SESSION['zipcode']   ;
        $mobile  = $_SESSION['mobile']    ;
        $dob     = $_SESSION['dob']       ;

        $status      = $_SESSION['status']       ;
        //$certificate = $_SESSION['certificate']  ;
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

        //$reciept = $_SESSION['reciept'] ;  

        $kgpdoa        = $_SESSION['kgpdoa']       ;
        $kgptimetocome = $_SESSION['kgptimetocome']   ;
        $kgpmodeofT    = $_SESSION['kgpmodeofT']    ;
        $kgppickup     = $_SESSION['kgppickup']       ; 
        $kgppcount     = $_SESSION['kgppcount']    ;
        $kgpcarseater  = $_SESSION['kgpcarseater']       ; 

        $airdoa        = $_SESSION['airdoa']        ;
        $airtimetocome = $_SESSION['airtimetocome']  ;
        $airmodeofT    = $_SESSION['airmodeofT']     ;
        $airpickup     = $_SESSION['airpickup']     ; 
        $airpcount     = $_SESSION['airpcount']      ;
        $aircarseater  = $_SESSION['aircarseater']     ; 

        //echo "<script language='javascript'>";
        //echo "alert('WRONG INFORMATION'+'$email'+'$kgpdoa')";
        //echo "</script>";
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginpage.css">
    <!-- JS, Popper.js, and jQuery -->

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
<style>
    body{
    background-image: url("./css/bkt.png");
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
  .wrappers nav ul{
    margin:0;
    padding:0;
    width:100%;
    display:flex;
    flex-flow:row nowrap;
        justify-content :space-around;
  }
  .wrappers  nav li{
      margin:0;
    padding:0;
      
        list-style:none;
    }
    span{
        padding-left:20%;
    }
    .header{
        display:flex;
        justify-content :space-between;
        /*margin-left:3vw;
        margin-right:3vw;*/
    }
    .row .f{
        font-weight:350;
    }
    .wrappers{
    max-width: 800px;
    margin-bottom:4%;   
    }
    .prof6 p{
      color: black;
      font-family: 'Raleway', sans-serif;
      font-weight:500;
    }
    
</style>
<body>
    <?php include 'navbar.php' ?>
    <section>
        <div class="wrappers">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item" >
        <a class="btn btn-outline-dark mx-1" href="update_show.php" role="button">UPDATE</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-outline-dark mx-1 " href="adminpage.php" role="button">PAYMENT</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-outline-dark mx-1 " href="TravellingDetails.php" role="button">TRAVEL DETAILS</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-outline-dark mx-1 " href="displayRegisteredUsers.php" role="button">ATTENDEES</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-outline-danger mx-1 " href="logout2.php" role="button">LOG OUT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
            <center>
                <h2 style="font-size: 300%; font-family: 'Raleway', sans-serif;">
                    DASHBOARD
                </h2>
            </center>
            <hr />
            <div class="section1">
                    <div class="container">
                        <div class = "row">
                            <div class="col-md-3 bord">
                           <div class="bttons"> <button class=" my-1" onclick="personal()" > Personal Info</button> </div>
                           <div class="bttons"><button class=" my-1" onclick="work()"> Work Experience</button> </div>
                           <div class="bttons"> <button class=" my-1" onclick="nostalg()"> Nostalgic Section</button> </div>
                           <div class="bttons"> <button class=" my-1" onclick="covid()"> Covid Info</button> </div>
                           <div class="bttons"> <button class=" my-1" onclick="accomod()"> Accomodation</button> </div>
                           <div class="bttons"><button class=" my-1" onclick="travel()">Travelling Detail</button> </div>
                            </div>
                           <div class="col-md-9">
                       
                            <div class="prof1">
                                
<table class="table table-striped">

<tbody>
                            
    <tr>
      <th scope="row">NAME</th>
      <td><?php echo "$name"?></td>
      
    </tr>
    <tr>
      <th scope="row">EMAIL</th>
      <td><?php echo "$email"?></td>

    </tr>
    <tr>
      <th scope="row">ADDRESS </th>
      <td><?php echo "$address"?></td>

    </tr>
    <tr>
      <th scope="row">CITY </th>
      <td><?php echo "$city"?></td>

    </tr>
    <tr>
      <th scope="row">STATE </th>
      <td><?php echo "$state"?></td>

    </tr>
    <tr>
      <th scope="row">COUNTRY </th>
      <td><?php echo "$country"?></td>

    </tr>
    <tr>
      <th scope="row">ZIPCODE</th>
      <td><?php echo "$zipcode"?></td>
    </tr>
    <tr>
      <th scope="row">MOBILE</th>
      <td><?php echo "$mobile"?></td>
    </tr>
    <tr>
      <th scope="row">DOB</th>
      <td><?php echo "$dob"?></td>
    </tr>
    </tbody>
</table>

                         
                            </div>
                           
                            
                           <div class="prof2">
                           <table class="table table-striped">

<tbody>
                           <tr>
      <th scope="row">INDUSTRY</th>
      <td><?php echo "$industry"?></td>
    </tr>
    <tr>
      <th scope="row">PROFESSION</th>
      <td><?php echo "$profession"?></td>
    </tr>
    <tr>
      <th scope="row">ORGANISATION</th>
      <td><?php echo "$organisation"?></td>
    </tr>
    <tr>
      <th scope="row">DESIGNATION</th>
      <td><?php echo "$designation"?></td>
    </tr>
    <tr>
      <th scope="row">WORK ADDRESS</th>
      <td><?php echo "$waddress"?></td>
    </tr>
    <tr>
      <th scope="row">WORK CITY </th>
      <td><?php echo "$wcity"?></td>
    </tr>
    <tr>
      <th scope="row">WORK STATE</th>
      <td><?php echo "$wstate"?></td>
    </tr>
    <tr>
      <th scope="row">WORK COUNTRY </th>
      <td><?php echo "$wcountry"?></td>
    </tr>
    <tr>
      <th scope="row">WORK ZIPCODE</th>
      <td><?php echo "$wzipcode"?></td>
    </tr>
</tbody>
</table>

                           </div>
                           
                            
                           <div class="prof3 ">
                           <table class="table table-striped">

<tbody>
                           <tr>
      <th scope="row">ROLL NO</th>
      <td><?php echo "$rollno"?></td>
    </tr>
    <tr>
      <th scope="row">JOIN YEAR</th>
      <td><?php echo "$joinyear"?></td>
    </tr>
    <tr>
      <th scope="row">DEGREE </th>
      <td><?php echo "$degree"?></td>
    </tr>
    <tr>
      <th scope="row">DEPARTMENT</th>
      <td><?php echo "$dept"?></td>
    </tr>
    <tr>
      <th scope="row">HALL</th>
      <td><?php echo "$hall"?></td>
    </tr>
    <tr>
      <th scope="row">YEAR OF GRADUATION</th>
      <td><?php echo "$yog"?></td>
    </tr>
    <tr>
      <th scope="row">INVOLVMENT</th>
      <td><?php echo "$involvement"?></td>
    </tr>
    <tr>
      <th scope="row">HOBBIES</th>
      <td><?php echo "$hobbies"?></td>
    </tr>
</tbody>
</table>
   
                           </div>
                           <div class="prof4 col">
                           <table class="table table-striped">

<tbody>
                           <tr>
      <th scope="row">VACCINATION STATUS </th>
      <td><?php echo "$status"?></td>
    </tr>
    <tr>
      <th scope="row">ABLE TO GET VACCINATED BY 10 JAN </th>
      <td><?php echo "$dosedate"?></td>
    </tr>
    <tr>
</tbody>
</table>
                            </div>
                           
                           <div class="prof5 col">
                           <table class="table table-striped">

<tbody>
                           <tr>
      <th scope="row">MARITAL STATUS  </th>
      <td><?php echo "$marital"?></td>
    </tr>
    <tr>
      <th scope="row">ACCOMPANIMENTS</th>
      <td><?php echo "$accompaniments"?></td>
    </tr>
    <tr>
    <tr>
      <th scope="row">GUEST HOUSE   </th>
      <td><?php echo "$gh"?></td>
    </tr>
    <tr>
      <th scope="row">TOTAL COST</th>
      <td><?php echo "$cost"?></td>
    </tr>
    <tr>
</tbody>
</table>
                </div>        
                    <div class="prof6 col">
                        <p align = "center">Kharagpur Station<p>
                        <hr />
                        <table class="table table-striped">
                             <tbody>
                                    <tr>
                                    <th scope="row">Date of Arrival (KGP)</th>
                                    <td><?php echo "$kgpdoa"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Time to reach Kharagpur Station</th>
                                    <td><?php echo "$kgptimetocome"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Mode of Transportation </th>
                                    <td><?php echo "$kgpmodeofT"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Do you want us to pick up you from station</th>
                                    <td><?php echo "$kgppickup"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">How many people are coming together</th>
                                    <td><?php echo "$kgppcount"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">*Cab info</th>
                                    <td><?php echo "$kgpcarseater"?></td>
                                  </tr>
                              </tbody>
                        </table>

                        <br>
                        <p align = "center">Kolkata Airport<p>
                        <hr />
                        <table class="table table-striped">
                             <tbody>
                                  <tr>
                                    <th scope="row">Date of Arrival (KOLKATA)</th>
                                    <td><?php echo "$airdoa"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Time to reach Kolkata</th>
                                    <td><?php echo "$airtimetocome"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Mode of Transportation </th>
                                    <td><?php echo "$airmodeofT"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Do you want us to pick up you from station</th>
                                    <td><?php echo "$airpickup"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">How many people are coming together</th>
                                    <td><?php echo "$airpcount"?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">*Cab info</th>
                                    <td><?php echo "$aircarseater"?></td>
                                  </tr>
                              </tbody>
                        </table>
                    </div>       
                  </div>
                            
             </div>
                    <!-- <div class = "header">
                        <div class="text-center">
                            <a class="btn btn-dark" href="update_show.php" role="button">UPDATE</a>
                        </div>
                        <div class="text-center">      
                            <a class="btn btn-outline-dark " href="adminpage.php" role="button">PAYMENT</a>
                        </div>
                        <div class="text-center">      
                            <a class="btn btn-outline-dark " href="TravellingDetails.php" role="button">TRAVEL DETAILS</a>
                        </div>
                        <div class="text-center">      
                            <a class="btn btn-outline-dark " href="aam.php" role="button">SKIP</a>
                        </div>
                    </div>                 -->
            </div>
            
        </div>
    </section>
    <?php include 'footer.php' ?>
    <script>
        const prof1 = document.getElementsByClassName('prof1')[0];
        const prof2 = document.getElementsByClassName('prof2')[0];
        const prof3 = document.getElementsByClassName('prof3')[0];
        const prof4 = document.getElementsByClassName('prof4')[0];
        const prof5 = document.getElementsByClassName('prof5')[0];
        const prof6 = document.getElementsByClassName('prof6')[0];
        function personal(){
            document.getElementsByClassName('prof1')[0].style.display = "block";
            document.getElementsByClassName('prof2')[0].style.display = "none";
            document.getElementsByClassName('prof3')[0].style.display = "none";
            document.getElementsByClassName('prof4')[0].style.display = "none";
            document.getElementsByClassName('prof5')[0].style.display = "none";
            document.getElementsByClassName('prof6')[0].style.display = "none";
        }
        function work(){
            document.getElementsByClassName('prof1')[0].style.display = "none";
            document.getElementsByClassName('prof2')[0].style.display = "block";
            document.getElementsByClassName('prof3')[0].style.display = "none";
            document.getElementsByClassName('prof4')[0].style.display = "none";
            document.getElementsByClassName('prof5')[0].style.display = "none";
            document.getElementsByClassName('prof6')[0].style.display = "none";
        }
        function nostalg(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "block";
            prof4.style.display = "none";
            prof5.style.display = "none";
            prof6.style.display = "none";
        }
        function covid(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "none";
            prof4.style.display = "block";
            prof5.style.display = "none";
            prof6.style.display = "none";
        }
        function accomod(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "none";
            prof4.style.display = "none";
            prof5.style.display = "block";
            prof6.style.display = "none";
        }
        function travel(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "none";
            prof4.style.display = "none";
            prof5.style.display = "none";
            prof6.style.display = "block";
        }
       
    </script>
</body>
