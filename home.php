<?php
require 'connection.php';
ob_start(); 
session_start();
if ($_SESSION["email"] == "") {
  header('Location: aam.php');
  exit();
}
?>

<html>
<head>
<title>Home</title>
 <link rel="icon" href="img/meet_14.png">
<link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<?php include 'navbar.php';?>
<style type="text/css">
body {
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 55;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    overflow-y: scroll;
    transition: 0.5s;
    padding-top: 60px;
    text-align:center;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s

}

.sidenav a:hover{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#ajax{
  width: 60%;
  background-color: #fff;
  margin-left: 20%;
  padding: 50px;
  margin-bottom: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  #ajax{
    width: 90%;
    margin:5%;
  }
}
@media screen and (min-height: 992px) {
  #button{
    display: none;
  }

}
</style>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div id="ajax" class="card-panel"></div>
</div>
<div class="container" >
        <div class="container-fluid">
          <div align="center">
        <div id="message">
        <?php 
          $query="SELECT name FROM users WHERE email='".$_SESSION["email"]."'";

          if( $query_run = mysqli_query($connection, $query) ){
            
            $row = mysqli_fetch_assoc($query_run);
            $name = $row['name'];

              echo '<h3>Welcome  Mr '.$name.'.<h3>';
            }
        ?>
        </div>
          </div>
          <p class="text_align">
            We will be showing you important information regarding the meet here. Check back in a few days to find out more about the Alumni Meet.
          </p>
          <div class="container" style="width: 100%">
            <div class="card-panel teal lighten-5">
              <div class="card-title text_align" style="font-weight: bold;font-size: 30px;">
                Payment Details
              </div>
                Every visiting alumnus has to pay INR 5000. This includes your accomodation, fooding and conveyance charge at Kharagpur. If there is any other person accompanying you an additional payment of INR 2500 per head will have
                to be made.
                <br> Payment methods:-
                <ul class="">
                  <li class="">
                    <strong>1. Demand Draft</strong>
                    <br> You can pay by sending a cheque or demand draft (DD) if favour of "Annual Alumni Meet" payable at Kharagpur on the address:
                    <br> Students' Alumni Cell
                    <br> Office of Alumni Affairs and International Relations
                    <br> Indian Institute of Technology Kharagpur
                    <br> Kharagpur - 721302
                    <br> West Bengal (INDIA)
                  </li>
                  <li class="">
                    <strong>2. NEFT</strong>
                    <br> You can also transfer the payment through Internet Banking and email us the receipt.
                    <br> Account Details
                    <br> Bank Name: Syndicate Bank
                    <br> Branch: IIT Kharagpur, SRIC
                    <br> IFSC Code: SYNB0009556
                    <br> A/C No.: 95562200012031
                    <br> Account Name: Annual Alumni Meet
                  </li>
                </ul>
            </div>
            <div class="card-panel teal lighten-5">
              <div class="card-title text_align" style="font-weight: bold;font-size: 30px;">
                Transportation Details
              </div>
              Conveyance from Kharagpur Railway Station to IIT Kharagpur will be provided by us.<br><br>
              If you require transportation from Kolkata to IIT Kharagpur, it can be arranged through us on chargeable basis. Kindly Fill your details in this form.<br> 
          <div style="width: 100%;" class="container center"><span style="font-size:20px;cursor:pointer; " onclick="openNav()" id="button01" class="waves-effect waves-light btn-large "> Travel and Accomodation Registeration</span></div>

            </div>
          </div>
        </div>
      </div>
  <div class="fixed-action-btn" style="bottom: 25px; right: 25px;" id="power">
    <a class="btn-floating btn-large" href="logout.php" title="Logout" >
      <i class="large material-icons" style="font-size: 30px">power_settings_new</i>
    </a>
  </div>


<script>
  $(document).ready(function(){
    $('#button01').click(function(){
      $('#ajax').load('acco-travel-form.php');
    });
  });
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<?php include 'footer.php';?>
 
  </body>
  </html>