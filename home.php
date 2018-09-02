<?php
require 'connection.php';
ob_start();
session_start();
if ($_SESSION["email"] == "") {
  header('Location: aam.php');
  exit();
}
$email=$_SESSION['email'];
$query1=" SELECT * FROM travel WHERE email= '$email' ";
$query3=" SELECT * FROM  accommodation WHERE email= '$email' ";
/* query to get graduating year */
/*till here*/
$query_run1=$connection->query($query1);
$query_run2=$connection->query($query3);
if (($query_run1)&&($query_run2)) {
  if(($query_run1->num_rows > 0)&&($query_run2->num_rows > 0)){
    $query2 = mysqli_fetch_assoc($query_run1);
    $query4 = mysqli_fetch_assoc($query_run2);
  }
}
?>
<?php
$query="SELECT * FROM users WHERE email='".$_SESSION["email"]."'";
if( $query_run = mysqli_query($connection, $query) ){
  $row = mysqli_fetch_assoc($query_run);
  $name = $row['name'];
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
  <?php include 'navbar.php';?>
  <style type="text/css">
    body {
    }
    #intro{
      line-height: 40px;
    }
    .card-panel{
      width: 100% !important;
    }
    .headl{
      background-color: #666;
      color: white;
      border-radius: 5px;
      border-color: black;
    }
    .input{
      background-color: silver;
      text-align: center;
      border-radius: 5px;
      border-color: black;
      display: inline-block;
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
      width: 60% !important;
      background-color: #fff;
      margin-left: 20%;
      padding: 50px;
      margin-bottom: 50px;
      z-index: 50000;
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
    <div class="container-fluid" style="padding-left: 50px;padding-right: 50px;">
      <p class="center">
        We will be showing you important information regarding the meet here. Check back in a few days to find out more about the Alumni Meet.
      </p>
      <div class="row">
        <div class="col l7">
          <div class="container-fluid">
            <div class="container" style="width: 100%">
              <div class="card-panel teal lighten-5">
                <div class="card-title text_align" style="font-weight: bold;font-size: 30px;">
                  Payment Details
                </div>
                Every visiting alumnus has to pay INR 7000. This includes your accomodation, fooding and conveyance charge at Kharagpur. If there is any other person accompanying you an additional payment of INR 4000 per head will have
                to be made.
                <br>
                <br>
                REMARK- After making the Payment Kindly revert back with your transaction id and payment mode on aao@hijli.iitkgp.ernet.in<br>
                <br> Payment methods:-
                <ul class="">
                   <li class="">
                    <strong>1. Online Payment</strong>
                    <br> You can make online payment: For online payment click <a href="https://www.eduqfix.com/OnlineAdmissionPortal/#/iitkR/add" target="_blank" style="font-weight:bold">here</a>

                  </li>
                  <li class="">
                    <strong>2. Demand Draft</strong>
                    <br> You can pay by sending a cheque or demand draft (DD) if favour of "Annual Alumni Meet" payable at Kharagpur on the address:
                    <br> Students&rsquo; Alumni Cell
                    <br> Office of Alumni Affairs and International Relations
                    <br> Indian Institute of Technology Kharagpur
                    <br> Kharagpur - 721302
                    <br> West Bengal (INDIA)
                  </li>
                  <li class="">
                    <strong>3. NEFT</strong>
                    <br> You can also transfer the payment through Internet Banking and email us the receipt.
                    <br> Account Details
                    <br> Bank Name: Syndicate Bank
                    <br> Branch: IIT Kharagpur, SRIC
                    <br> IFSC Code: SYNB0009556
                    <br> A/C No.: 95562200012031
                    <br> Account Name: Annual Alumni Meet<br>
                    <br><b style="font-size: 200%;">&nbsp &nbsp &nbsp OR</b><br>
                     <br> Bank Name: HDFC Bank Ltd
                    <br> Branch: Kharagpur
                    <br> IFSC Code: HDFC0001065
                    <br> A/C No.: 50100217409918
                    <br> Account Name: IIT KGP AAIR EVENTS FUND
                  </li>
                </ul>
              </div>
              <div class="card-panel teal lighten-5">
                <div class="card-title text_align" style="font-weight: bold;font-size: 30px;">
                  Transportation Details
                </div>
                Conveyance from Kharagpur Railway Station to IIT Kharagpur will be provided by us.<br><br>
                If you require transportation from Kolkata to IIT Kharagpur, it can be arranged through us on chargeable basis. Kindly Fill your details in this form.<br><br><br>
                <?php if ($query_run2->num_rows > 0) {
              echo '<div class="row">
              <div style="width: 100%;" class="container center l12"><span style="font-size:20px;cursor:pointer;background-color: #666;height:auto; " onclick="openNav()" id="button02" class="waves-effect waves-light btn-large "> Edit Transportation and Accomodation details</span></div>
            </div>';
          } else {
            echo '<div class="row">
            <div style="width: 100%;" class="container center l12"><span style="font-size:20px;cursor:pointer;height: auto;background-color: #666; " onclick="openNav()" id="button01" class="waves-effect waves-light btn-large ">Provide Your Travel Details and Accomodation Preferences</span></div>
          </div>';
        }
        ?>
              </div>
<!--
              <div class="card-panel teal lighten-5 " style="text-align: 40px;">
                <div class="container-fluid">
                  <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSef24kChTbQuYZzLVFlfvedqlhtvudBd1IOJ5MTqc-O7wov2Q/viewform?embedded=true" width="100%" height="60%" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
                </div>
              </div>
            -->

            </div>
          </div>
        </div>
        <div class="col l5 m12 s12" id="intro">
          <div class="card-panel teal lighten-5 " style="width: 100%;text-align: 40px;">
            <div class="row">
              <div style="width: 100%;" class="container center l12"><a style="font-size:20px;cursor:pointer;background-color: #666;height:auto; "  class="waves-effect waves-light btn modal-trigger " href="#modal1">View Registered Alumni </a></div>
            </div>
            <h3 style="width: 100%; text-align: center;" >Welcome</h3>

            <div class="row">
              <div class="col l6 m12 s12 center headl"></div>
              <div class="col l6 m12 s12 center headl">Name</div>
              <div class="col l6 m12 s12 input center"><?php  echo $name;  ?></div>
            </div>
            <div class="row">
              <div class="col l6 m12 s12 center headl">Travel Details</div>
              <div class="col l6 m12 s12 input center"><?php if ($query_run1->num_rows > 0) {
                echo "Provided";
              } else {
                echo "Pending";
              }
              ?></div>
            </div>
            <div class="row">
              <div class="col l6 m12 s12 center headl">Accomodation Preference</div>
              <div class="col l6 m12 s12 input center"><?php if ($query_run2->num_rows > 0) {
                echo "Provided";
              } else {
                echo "Pending";
              }
              ?></div>
            </div>

        <!--added  -->




        <!--till here-->
        <div class="row">
          <div style="width: 100%;" class="container center l12"><a style="font-size:20px;cursor:pointer;height: auto;background-color: #666; width: 100% " class="waves-effect waves-light btn-large" href="edit.php">Edit Registration form</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col l5 m12 s12" id="profilepic">
      <div class="card-panel teal lighten-5 " style="width: 100%;text-align: 40px;">
        <h3 style="width: 100%; text-align: center; font-size:250%; " >Picture for Alumni Card</h3>
        <div class="container">

          <p style="text-align: justify;">
            Alumni Card is officially distributed to all alumni during the Annual Alumni Meet.
            Kindly upload your picture below to be printed in your Alumni Card (preferably a passport size photograph, image size should be less than 500 Kb and of jpg,jpeg and png format)
          </p>
          <?php
          include 'profile_pic.php';
          ?>
        </div>
      </div>
    </div>
    <div class="col l5 m12 s12" id="profilepic">
      <div class="card-panel teal lighten-5 " style="width: 100%;text-align: 40px;">
      <p style="text-align: justify;">
        For any queries, Email us at <b>aao@hijli.iitkgp.ernet.in</b>
      </p>
    </div>
  </div>

</div>
<div class="fixed-action-btn" style="bottom: 25px; right: 25px;" id="power">
  <a class="btn-floating btn-large" href="logout.php" title="Logout" >
    <i class="large material-icons" style="font-size: 30px">power_settings_new</i>
  </a>
</div>

<!-- Modal structure-->

<div id="modal1" class="modal">
  <br>
  <h4 style="margin-left: 35px"> Registered Alumni : </h4>
  <div class="modal-content">


   <?php
   include('aam_registeredalum.php');
   ?>
 </div>
 <div class="modal-footer">
  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
</div>
</div>
<!--Till here-->

<script>
  $(document).ready(function(){
    $('#button01').click(function(){
      $('#ajax').load('acco-travel-form.php');
    });
    $('#button02').click(function(){
      $('#ajax').load('acco-travel-form.php');
    });
  });
  function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
  }
  function closeNav() {
    document.getElementById("backlobby").style.display="none";
    document.getElementById("mySidenav").style.width = "0";
  }
</script>
<!--added -->
<script type="text/javascript">
  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
</script>
<!--till here-->
<?php include 'footer.php';?>

</body>
</html>
