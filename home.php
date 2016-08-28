<?php
require 'core.inc.php';
require 'connect.inc.php';

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
		<h1>Home Page</h1>
		</div><!-- #header -->
		
		<div id="content">
				<div id="message">
				<?php 
				$name=getfield('name');
	            echo 'WELCOME , '.$name.'.<br><br> <a class="waves-effect waves-light btn" href="logout.php">Log Out</a>';
				?>
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