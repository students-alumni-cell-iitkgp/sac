<?php
require 'connection.php';
ob_start(); 
session_start();
if ($_SESSION["user_id"] == "") {
  header('Location: aam.php');
  exit();
}
function getfield($field){
  $query=' SELECT  '.$field.' FROM users where email="'.$_SESSION['user_id'].'"';
  if ($query_run=mysql_query($query)) {
    if($query_result= mysql_result($query_run, 0,$field)) {
      return $query_result;
    }
  }
}
include 'navbar.php';
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
   @media only screen and (min-width: 768px){
    .aam-reg{
      height: 320px;
    }
     .aam-reg a{
      margin-top: 60px;
      display: inline-block;
    }
      .ac-aam img{
        margin-left: 80px;
    }
   } 
   #wrapper{
   	padding: 20px;
   }
    @media only screen and (max-width: 468px){
      .ac-aam img{

    margin: 0px auto;
    max-width:100%;

    }
   }
   #button{
    position: absolute;
    top: 80px;
    right: 10px;
   } 
   .card{
    height: 500px;
   }
</style>
    <script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
    </script>
</head>

<body>
	<div id="wrapper">
		
		<div id="header">
		</div><!-- #header -->
		
		<div id="content">
          <div class="container">
        <div class="container-fluid">
          <div align="center">
        <div id="message">
        <?php 
        $name=getfield('name');
              echo '<h3>Welcome  Mr '.$name.'.<h3>';
        ?>
        </div><a class="waves-effect waves-light btn" href="logout.php" id="button">Log Out</a>
          </div>
          <p>
            We will be showing you important information regarding the meet here. Check back in a few days to find out more about the Alumni Meet.
          </p>
          <div class="container" >
            <div class="card-panel teal lighten-5">
              <div class="card-title">
                Payment Details
              </div>
                Every visiting alumnus of the batch of 1966, 1976, 1991 is to pay INR 5000. This includes your accomodation, fooding and conveyance charge at Kharagpur. If there is any other person accompanying you an additional payment of INR 2500 per head will have
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