<html>
<head>
<link rel="stylesheet" href="css/materialize.min.css">
	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script src="js/materialize.min.js"></script>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
  if(window.location.href!='http://www.sac.iitkgp.ac.in/signup.php'){
    window.location.assign("http://www.sac.iitkgp.ac.in/signup.php");
  }

</script> 
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
	  </script>
</head>
<body>
<div class="_wrapper">
<?php include 'navbar.php';?>
<div class="row signup">
 <form action="register.php" method="post">
      <div class="heading">
      <center>
        <h class="subheading"><b>Personal Details</b> </h>
      </center>
    </div>
    
      <div class="input-field col s12">
       
        <input  type="text"  name="name" id="name" class="validate"  required>
         <label for="name">Name</label>
      </div>
   
      <div class="input-field col s12">
        
        <input  type="email"  name="email" id="email" required>
        <label for="email">Email ID</label>
      </div>
      <div class="input-field col s12">
      
      
        <input  type="password" id="password" name="password" required>
        <label for="password">Password</label>
      </div>
      <div class="input-field col s12">
       
        <input  type="text" name="address" id="address"  required>
         <label for="address">Address</label>
      </div>
      <div class="input-field col s12">
        <input  type="text" id="city" name="city" required>
        <label for="city">City</label>
      </div>
      <div class="input-field col s12">
       
       
        <input  type="text" id="state" name="state"  required>
       <label for="state">State</label>
      </div>
      <div class="input-field col s12">
       
        <input  type="text"  name="country" id="country" required>
         <label for="country">Country</label>
      </div>
      <div class="input-field col s12">
       
        <input  type="text" id="zipcode" name="zipCode" required>
       <label for="zipcode">Zip Code</label>
      </div>
      <div class="input-field col s12">
      
        <input  type="text"  name="mobile" id="mobile" required>
          <label for="mobile">Mobile</label>
      </div>
      <div class="input-field col s12">
     
        <input  type="date" class="datepicker" name="dob" required>
        <input  type="text" id="dob" name="dob">
         <label for="dob">DOB</label>
      </div>
      <div class="input-field col s12">
   
        <input  type="text"  name="marital" id="marital">
             <label for="marital">Marital Status</label>
      </div>
     
     <div class="heading">
      <center><br>
        <h class="subheading" ><b>Where do you work ?</b> </h>
      </center>
    </div>
      <div class="input-field col s12">
      
        <input  type="text" id="ind" name="industry"  required>
          <label for="ind">Industry</label>
      </div>
      <div class="input-field col s12">
        
        <input  type="text" id="prof" name="profession" required>
        <label for="prof">Profession</label>
      </div>
      <div class="input-field col s12">
    
        <input  type="text" id="org" name="orgName" required>
        <label for="org">Organisation Name</label>
      </div>
      <div class="input-field col s12">
     
        <input  type="text" id="desig" name="designation" required>
        <label for="desig">Designation</label>
      </div>
      <div class="input-field col s12">
      
        <input  type="text" id="city" name="work_city">
        <label for="city">City</label>
      </div>
      <div class="input-field col s12">
        
        <input  type="text" id="state" name="work_state">
     <label for="state">State</label>
      </div>
      <div class="input-field col s12">
    
        <input  type="text" id="Country" name="work_country">
            <label for="Country">Country</label>
      </div>
      <div class="input-field col s12">
      
        <input  type="text" id="zip" name="work_zipCode">
        <label for="zip">Zip Code</label>
      </div>
      <div class="input-field col s12">
       
        <input  type="text" id="address" name="work_address">
       <label for="address">Address</label>
      </div>
       <div class="heading">
      <center><br>
        <h class="subheading"><b>Nostalgic Section</b> </h>
      </center>
    </div>
      <div class="input-field col s12">
       
        <input  type="text" id="roll" name="rollNum">
      <label for="roll">Roll Number</label>
      </div>
      <div class="input-field col s12">
        <input  type="number" min="1951" max="2006" id="join" name="joinYear">
     <label for="join">Join Year</label>
      </div>
      <div class="input-field col s12">
      
        <input  type="text" id="degree" name="degree" required>
        <label for="degree">Degree</label>
      </div>
      <div class="input-field col s12">
     
        <input  type="text" id="dept" name="department" required>
         <label for="dept">Department</label>
      </div>
      <div class="input-field col s12">
        
        <input  type="text" id="hall" name="hall" required>
      <label for="hall">Hall</label>
      </div>
      <div class="input-field col s12">
        <input  type="number" min="1955" max="2010" id="yog" name="graduatingYear">
       <label for="yog">Year of Graduating</label>
      </div>
      <div class="input-field col s12">
      
        <input  type="number" min="1" id="accompanyingNo" name="accompanyingNo">
        <label for="accompanyingNo">Accompaniments</label>
      </div>
      <div class="col s12">
      <center>
        <button type="submit" class="btn btn-success btn-lg btn-block" name="button" style="width:25%">SUBMIT</button>
      </center>
      </div>
    </form>
 </div>
  
  </div>
  <?php include 'footer.php';?>
 
  </body>
  </html>
