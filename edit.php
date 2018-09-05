<?php
session_start();
include 'connection.php';
          if($_SESSION["email"]=="")
          {
            die('Un-Authorized Access detected !! <br> Click here to go to back :<html><head><link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script></head><body><a href="home.php" class="btn btn-success btn-lg btn-block col l4 m5 s12" style=" position: fixed;width:8%; left: 30%; top: 12  %;">Cancel</a></body></html>');
          }
          $query="SELECT * FROM users WHERE email='".$_SESSION["email"]."'";
          if( $query_run = mysqli_query($connection, $query) ){
            $row = mysqli_fetch_assoc($query_run);
            $name = $row['name'];
            }
?>

<html>
<head>
  <title>Register | Annual Alumni Meet &middot; IIT Kharagpur</title>
    <link rel="stylesheet" href="css/materialize.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<style type="text/css">
   @media only screen and (min-width: 768px){
    .signup{
      padding: 5px 100px;
    }
    .mentor-reg a{
      margin-top: 30px;
      display: inline-block;
    }
    .mentor-text {
      margin-left: 60px !important;
    }
    .mentor-top {
      margin-top: 20px;
      margin-left: 60px;
      width: 860px;
      height: 60px;
      border-radius: 6px;
      margin-bottom: 20px;
    }
      .ac-mentor img{
        margin-left: 80px;
    }
    }
    @media only screen and (max-width: 468px){
      .ac-mentor img{
        margin: 0px auto;
        max-width:100%;
    }
    .mentor-top {
      max-width: 100%;
      height: 60px;
    }
   }
</style>
    <script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' ,maxDate: '0'});
  } );
    </script>
</head>
<body>
<div class="_wrapper">
<?php include 'navbar.php';?>

<div class="row signup">
 <form action="registerupdate.php" method="post">
      <div class="heading">
      <center>
        <h class="subheading"><b>Personal Details</b> </h>
      </center>
    </div>

     <div class="row1">
      <div class="input-field col s12">       
         <input  value="<?php echo $row['name']; ?>" type="text"  name="name" id="name" class="validate"  required>
         <label for="name">Name <span style="color:red;">*</span></label>
      </div>   
      

    </div>

    <div class="row1">
      <div class="input-field col s12">        
        <input value="<?php echo $row['email']; ?>" type="email"  name="email" id="email" required>
        <label for="email">Email ID <span style="color:red;">*</span></label>
      </div>        
    </div>


     
      <div class="input-field col s12">       
        <input value="<?php echo $row['address']; ?>" type="text" name="address" id="address">
        <label for="address">Address </label>
      </div>

    <div class="row1">
      <div class="input-field col s6">        
        <input value="<?php echo $row['city']; ?>" type="text" id="city" name="city" required>
        <label for="city">City <span style="color:red;">*</span></label>
      </div>
      <div class="input-field col s6">        
        <input value="<?php echo $row['state']; ?>" type="text" id="state" name="state"  >
        <label for="state">State </label>
      </div>      
    </div>

    <div class="row1">
      <div class="input-field col s6">        
        <input value="<?php echo $row['country']; ?>" type="text"  name="country" id="country" required>
        <label for="country">Country <span style="color:red;">*</span></label>
      </div>
      <div class="input-field col s6">        
        <input value="<?php echo $row['zipCode']; ?>" type="text" id="zipcode" name="zipCode" >
        <label for="zipcode">Zip Code </label>
      </div>      
    </div>

    <div class="row1">
      <div class="input-field col s6" style="margin-top:30.5px;">      
        <input value="<?php echo $row['mobile']; ?>" type="text"  name="mobile" id="mobile" required>
          <label for="mobile">Mobile <span style="color:red;">*</span></label>
      </div>
      <div class="col s6" style="margin-top:15px;">
         <label for="dob">DOB <span style="color:red;">*</span></label>
        <input value="<?php echo $row['dob']; ?>" type="date" name="dob" required id="dob">        
      </div>          
    </div>

      <div class="input-field col s12" style="margin-bottom:30px;">   
        <input value="<?php echo $row['marital']; ?>" type="text"  name="marital" id="marital">
        <label for="marital">Marital Status</label>
      </div>

     <div class="heading">
      <center>
        <h class="subheading" ><b>Where do you work?</b> </h>
      </center>
    </div>

    <div class="row1">
      <div class="input-field col s6">      
        <input value="<?php echo $row['industry']; ?>" type="text" id="ind" name="industry"  >
          <label for="ind">Industry </label>
      </div>
      <div class="input-field col s6">        
        <input value="<?php echo $row['profession']; ?>" type="text" id="prof" name="profession" >
        <label for="prof">Profession </label>
      </div>         
    </div>

   <div class="row1">
     <div class="input-field col s6">    
        <input value="<?php echo $row['orgName']; ?>" type="text" id="org" name="orgName" required>
        <label for="org">Organisation Name <span style="color:red;">*</span></label>
      </div>
      <div class="input-field col s6">     
        <input value="<?php echo $row['designation']; ?>" type="text" id="desig" name="designation" required>
        <label for="desig">Designation <span style="color:red;">*</span></label>
      </div>         
   </div>

      <div class="input-field col s12" style="margin-bottom:30px;">
        <input value="<?php echo $row['work_address']; ?>" type="text" id="address" name="work_address">
        <label for="address">Address</label>
      </div>

    <div class="row1">
     <div class="input-field col s6">      
        <input value="<?php echo $row['work_city']; ?>" type="text" id="city" name="work_city">
        <label for="city">City</label>
      </div>
      <div class="input-field col s6">        
        <input value="<?php echo $row['work_state']; ?>" type="text" id="state" name="work_state">
        <label for="state">State</label>
      </div>        
    </div>

    <div class="row1">
     <div class="input-field col s6">    
        <input value="<?php echo $row['work_country']; ?>" type="text" id="Country" name="work_country">
        <label for="Country">Country</label>
      </div>
      <div class="input-field col s6">      
        <input value="<?php echo $row['work_zipCode']; ?>" type="text" id="zip" name="work_zipCode">
        <label for="zip">Zip Code</label>
      </div>       
    </div>
    
    <div class="row"></div>
    
    <div class="heading">
      <center><br>
        <h class="subheading"><b>Nostalgic Section</b> </h>
      </center>
    </div>
    <div class="row1">
     <div class="input-field col s6">       
        <input value="<?php echo $row['rollNum']; ?>" type="text" id="roll" name="rollNum">
        <label for="roll">Roll Number</label>
      </div>
      <div class="input-field col s6">
        <input value="<?php echo $row['joinYear']; ?>" type="number" min="1951" max="2006" id="join" name="joinYear" required>
        <label for="join">Join Year <span style="color:red;">*</span></label>
      </div>      
    </div>

    <div class="row1">
     <div class="input-field col s6">      
        <input value="<?php echo $row['degree']; ?>" type="text" id="degree" name="degree" required>
        <label for="degree">Degree <span style="color:red;">*</span></label>
      </div>
      <div class="input-field col s6">     
        <input value="<?php echo $row['department']; ?>" type="text" id="dept" name="department" required>
        <label for="dept">Department <span style="color:red;">*</span></label>
      </div>     
    </div>

    <div class="row1">
     <div class="input-field col s6">        
        <input value="<?php echo $row['hall']; ?>" type="text" id="hall" name="hall" required>
        <label for="hall">Hall <span style="color:red;">*</span></label>
     </div>
     <div class="input-field col s6">
        <input value="<?php echo $row['graduatingYear']; ?>" type="number" min="1955" max="2010" id="yog" name="graduatingYear"  required>
        <label for="yog">Year of Graduating <span style="color:red;">*</span></label>
      </div>     
    </div>

    <div class="row1">
      <div class="input-field col s6">
        <input value="<?php echo $row['involvements']; ?>" type="text" id="involvements" name="involvements">
        <label for="yog">Involvements within the campus (Societies, Hall Events, etc) </label>
      </div>
      <div class="input-field col s6">
        <input value="<?php echo $row['hobbies']; ?>" type="text" id="hobbies" name="hobbies">
        <label for="yog">Hobbies</label>
      </div>    
    </div> 

    <div class="input-field col s12"  style="margin-bottom:20px;margin-top:3%">      
        <input value="<?php echo $row['accompanyingNo']; ?>" type="number" min="0" id="accompanyingNo" name="accompanyingNo" required>
        <label for="accompanyingNo">Accompaniments(Number of guests)<span style="color:red;">*</span></label>
    </div>

    <div class="row1">
      <div class="col l6 m6 s6" align="center">
        <button class="btn waves-effect waves-light" type="submit" style="background-color:#449d44;" name="action">Submit<i class="material-icons right">send</i>
        </button>        
    </div>
     <div class="col l6 m6 s6" align="center">
        <button class="btn waves-effect waves-light" type="submit" style="background-color: #d9534f;" name="action">Cancel<i class="material-icons right">cancel</i>
        </button>
    </div>
    </div>

  </form>
 </div>

  </div>
  <?php include 'footer.php';?>

  </body>
  </html>