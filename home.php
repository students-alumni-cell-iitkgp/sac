<?php
require 'connection.php';
ob_start(); 
session_start();
if ($_SESSION["email"] == "") {
  header('Location: aam.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/materialize.min.css">
<link rel="icon"  href="img/meet_14.png">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

<style type="text/css">
    #button{
    position: absolute;
    top: 155px;
    right: 10px;
   } 
   .card{
    height: 500px;
   }
</style>
</head>

<body>
  <div id="wrapper">
    
    <div id="header" style="margin: 0;">
    <?php
include 'navbar.php';
?>
    </div><!-- #header -->
    
    <div id="content">
          <div class="container">
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
        </div><a class="waves-effect waves-light btn" href="logout.php" id="button">Log Out</a>
          </div>
          <p class="text_align">
            We will be showing you important information regarding the meet here. Check back in a few days to find out more about the Alumni Meet.
          </p>
          <div class="container" >
            <div class="card-panel teal lighten-5">
              <div class="card-title text_align">
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
          </div>
        </div>
      </div>
          
    </div><!-- #content -->
    
    <div id="footer">
    </div><!-- #footer -->
    
  </div><!-- #wrapper -->
  
</body>

</html>
<?php  
include 'footer.php';
?>
