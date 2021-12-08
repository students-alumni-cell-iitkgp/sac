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
  $name = $row['Name'];
  $hall = $row['hall'];
  $dept = $row['department'];
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <?php include 'navbar.php';?>
  <style type="text/css">
    body {
      background-color: #666s
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
    @media screen and (min-width: 376px) and (max-width: 450px){
      .swal-button {
        transform: translateX(-80%);
      }
    }
    @media screen and (max-width: 376px){
      .swal-button {
        transform: translateX(-55%);
      }
    }
    @media only screen and (min-width: 768px){
      .swal-button {
        transform: translateX(-130%);
      }
    }
    .swal-button {
      padding: 10px 30px;
      font-size: 16px;
    }
    .swal-button--confirm {
      margin-left: 40px !important;
    }

    #profile {
      background-color: #E0F2F1;
      height : 500px;
      padding : 10px;
    }
   
  </style>
  <body>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div id="ajax" class="card-panel"></div>
    </div>
    <div class="container-fluid" style="padding-left: 50px;padding-right: 50px;">
      <p class="center">
        We will be showing you important information regarding the meet here. Check back in a few days to find out more about the Virtual Reunion.
      </p>
      <table>
        <tr>
          <th style="height: 400px"><img src="img/vr_dashboard.jpg" style="height:750px"></th>
          <th id="profile" style="background-color:white;width 40%; height : 230px; margin-top:300px">
          <div class="col l5 m12 s12" id="intro">
          <div class="card-panel teal lighten-5 " style="width: 50%;text-align: 60px;">
            <div class="row">
              <div style="width: 100%;" class="container center l12"><a style="font-size:20px;cursor:pointer;background-color: #666;height:auto; "  class="waves-effect waves-light btn modal-trigger " href="#modal1">View Registered Alumni </a></div>
            </div>
            <h3 style="width: 100%; text-align: center;" >Welcome</h3>
            <?php include 'profile_pic.php'; ?>

            <div class="row">
              <div class="col l6 m12 s12 center headl"></div>
              <div>Name</div>
              <div class="col l6 m12 s12 input center"><?php  echo $name;  ?></div><br>
              <div>Hall</div>
              <div class="col l6 m12 s12 input center"><?php  echo $hall;  ?></div><br>
              <div>Department</div>
              <div class="col l6 m12 s12 input center"><?php  echo $dept;  ?></div>
            </div>
          </div>
          <div class="row">
            <div style="width: 100%;" class="container center l12"><a style="font-size:20px;cursor:pointer;height: auto;background-color: #666; width: 100% " class="waves-effect waves-light btn-large" href="edit.php">Edit Registration form</a>
            </div>
          </div>
          </th>
        </tr>
      </table>
      <!-- <div class="top">
        <div class="profile" style="background-color:white;width 40%; height : 200px; margin-top:300px">
          <h3>Welcome</h3>
          <h3>/<?/*php  echo $name; */ ?></h3>
        </div>
      </div> -->
      <!-- <div class="row">
        <div class="col l6 m12 s12">
          <div class="container-fluid">
            <div class="container" style="width: 100%">
                <img src="img/vr_dashboard.jpg" />
            </div>
            <div class="container">
              <div style="width: 50%;" class="container center l4"></div><a style="font-size:20px;cursor:pointer;background-color: #666;height:auto; "  class="waves-effect waves-light btn modal-trigger " href="#modal1">View Registered Alumni </a></div>
            </div>
            <h3 style="width:50%; text-align: center;" >Welcome</h3>

            <div class="row">
              <div class="col l6 m12 s12 center headl"></div>
              <div class="col l6 m12 s12 center headl">Name</div>
              <div class="col l6 m12 s12 input center"></*?php  echo $name;  */ ?></div>
            </div>
    
            </div>
            </div>
          </div>
          <div class="col l4 m12 s12">
            
             
        </div>
        <div class="col l5 m12 s12" id="intro">
          <div class="card-panel teal lighten-5 " style="width: 50%;text-align: 40px;">
            <div class="row">
              <div style="width: 100%;" class="container center l12"><a style="font-size:20px;cursor:pointer;background-color: #666;height:auto; "  class="waves-effect waves-light btn modal-trigger " href="#modal1">View Registered Alumni </a></div>
            </div>
            <h3 style="width: 100%; text-align: center;" >Welcome</h3>

            <div class="row">
              <div class="col l6 m12 s12 center headl"></div>
              <div class="col l6 m12 s12 center headl">Name</div>
              <div class="col l6 m12 s12 input center"></*?php  echo $name;  */?></div>
            </div>
          </div>
          <div class="row">
            <div style="width: 100%;" class="container center l12"><a style="font-size:20px;cursor:pointer;height: auto;background-color: #666; width: 100% " class="waves-effect waves-light btn-large" href="edit.php">Edit Registration form</a>
            </div>
          </div>
      </div> -->
    <!-- </div> -->
    <!-- <div class="col l5 m12 s12" id="profilepic">
      <div class="card-panel teal lighten-5 " style="width: 100%;text-align: 40px;">
        <h3 style="width: 100%; text-align: center; font-size:250%; " >Picture for Alumni Card</h3>
        <div class="container">

          <p style="text-align: justify;">
            Alumni Card is officially distributed to all alumni during the Virtual Reunion 2021.
            Kindly upload your picture below to be printed in your Alumni Card (preferably a passport size photograph, image size should be less than 500 Kb and of 
            jpg, jpeg and png format)
          </p>
          <? /* php include 'profile_pic.php'; */ ?>
        </div>
      </div>
    </div> -->
    <div class="col l5 m12 s12" id="profilepic">
      <div class="card-panel teal lighten-5 " style="width: 100%;text-align: 40px;">
      <p style="text-align: justify;">
        For any queries, Email us at<b> aao@hijli.iitkgp.ernet.in </b>
      </p>
    </div>
  </div>

</div>
<div class="fixed-action-btn" style="bottom: 25px; right: 25px;" id="power">
  <a class="btn-floating btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Logout" id="logout" >
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
<script >
  $("#logout").click(function(){
    swal ({ 
      title: "Are you sure, want to logout?",
      icon: "warning",
      buttons: {
        cancel: "No",
        confirm: "Yes",
      },
      dangerMode: true,
    }).then((value) => {
      if(value){
        window.location = "logout.php";
      }
    });
  });
</script>
<?php
  if($_SESSION['edit_submit'] == 1){
    echo " 
    <script>
      swal({ 
        title: 'Successfully Edited!',
        text: ' ',
        icon: 'success',
        buttons: false,
        timer: 1500,
        });
        </script>";

        unset($_SESSION['edit_submit']);
  }
?>
<?php 
  if($_SESSION['form_submit'] == true){
    echo "
    <script>
      swal({
        title: 'Successfully Submitted!',
        text: ' ',
        icon: 'success',
        buttons: false,
        timer: 1500,
        });
        </script>";
        unset($_SESSION['form_submit']);
  }
?>
<?php 
  if($_SESSION['form_submit'] == 'fail'){
    echo "
    <script>
      swal({
        title: 'Error',
        text: 'Please try again later!',
        icon: 'success',
        buttons: false,
        timer: 1500,
        });
        </script>";
        unset($_SESSION['form_submit']);
  }
?>
<?php include 'footer.php';?>

</body>
</html>