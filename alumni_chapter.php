<?php 
//connection
/*
$server="localhost";
$user="root";
$password="";
$db="connect";

$conn=@mysqli_connect($server,$user,$password,$db) or die("error");

if(isset($_POST["name"])&& !empty($_POST["name"]))
{
  $name=$_POST["name"];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $city=$_POST['city'];
  $query="INSERT INTO abc VALUES ('','".$name."','".$email."','".$contact."','".$city."')";
  $query_run =mysqli_query($conn,$query);
  if($query_run){
    header('Location: alumni_chapter.php');
  }
}

*/
?>



<html>
<head>

<link rel="stylesheet" href="css/materialize.min.css">
	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script src="js/materialize.min.js"></script>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
#box{
 
  width:100%;
text-align: center;
  border-color: none;
  background-color: #00ccff;
    


}

input[type="text"]{
  width: 70%;
  height: 50px;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-color: #80e5ff;
  background-color: #fff;
  color: yellow;
}

input[type="submit"],#city{
  width: 150px;
  height: 40px;
}
span{
  font-weight: bold;
}
  
   @media only screen and (min-width: 768px){
   
    .chapter-top {
      margin-top: 20px;
      margin-left: 60px;
      width: 860px;
      height: 60px;
      border-radius: 6px;
      margin-bottom: 20px;
    }
      .ac-chapter img{
        margin-left: 80px;
    }
    }
    
    @media only screen and (max-width: 468px){
      .ac-chapter img{
        margin: 0px auto;
        max-width:100%;

    }
    .chapter-top {
      max-width: 100%;
      height: 60px;
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
<div class="_wrapper">
<?php include 'navbar.php';?>

 <div class="row ac-chapter">
        <img src="img/mentorship.jpg"  >
 </div>
 
  <div class="col l12 s12 m12">
  <div class="info z-depth-2">
    <p style="text-align:justify;padding:6px;"> The time spent at IIT Kharagpur is cited by its students to have been the most memorable and cherishable time of their lives. The friends they made here, the things they learned and the experiences they shared are what make them the success that they are. So it is indeed heartbreaking to let go of all these times and part from the institute reminiscing over the golden days spent here. To treasure these moments we have Alvida - the annual farewell dinner held for the passing out batch to get together and share their memorable stories of the moments they spent in the institute.</p><br>
</div>
  </div>
  <!--div class="col l4 s12 m4">
  <div class="info z-depth-2">
  </div>
  </div-->
  <div id="box">
  <h3> Register YourSelf </h3></hr>
<form  action="" method="POST">
    <span>Name:</span>
  <div id="form"><input type="text" name="name" placeholder="Enter Your Name Please"/></div>

  <span>Email:</span>
    <div id="form"><input type="text" name="email" placeholder="Enter Your Email Please"/></div>
    <span>Contact No:</span>
    <div id="form"><input type="text" name="contact" placeholder="Enter the Contact No. Please"/></div>
  <div id="city">
  <select  class="form-control" required >
        <option name="city" value="Atlanta & Southeast">Atlanta & Southeast</option>
        <option name="city" value="Boston & New England">Boston & New England</option>
        <option name="city" value="Chicago & Midwest">Chicago & Midwest</option>
        <option name="city" value="Houstan">Houstan </option>
        <option name="city" value="Mineapolis">Mineapolis</option>
        <option name="city" value="New York">New York</option>
        <option name="city" value="Ohio">Ohio</option>
        <option name="city" value="San Francisco Bay Area">San Francisco Bay Area </option>
        <option name="city" value="Seattle">Seattle</option>
        <option name="city" value="Southern California">Southern California</option>
        <option name="city" value="Washington DC">Washington DC</option>
        <option name="city" value="Houstan">Houstan </option>
        <option name="city" value="Bangalore">Bangalore</option>
        <option name="city" value="Chennai">Chennai</option>
        <option name="city" value="Dehradun">Dehradun</option>
        <option name="city" value="Jamshedpur">Jamshedpur</option>
        <option name="city" value="Kolkata">Kolkata</option>
        <option name="city" value="Mumbai">Mumbai</option>
        <option name="city" value="New Delhi">New Delhi</option>
        <option name="city" value="Melbourne">Melbourne</option>
        <option name="city" value="Kuwait">Kuwait</option>
        <option name="city" value="Sydney">Sydney</option>
        <option name="city" value="Vadodara">Vadodara</option>
        <option name="city" value="Pune">Pune</option>
        <option name="city" value="Toronto">Toronto</option>
        <option name="city" value="Singapore">Singapore</option>
        <option name="city" value="Dubai">Dubai</option>
        <option name="city" value="London">London</option>
         </select></div>
  <input type="submit" value="submit" />
</form>
</div>
  </div>
  
  </div>
  <?php include 'footer.php';?>
 
  </body>
  </html>