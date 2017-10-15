


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
  <script type="text/javascript">
//  if(window.location.href!='http://www.sac.iitkgp.ac.in/signup.php'){
  //  window.location.assign("http://www.sac.iitkgp.ac.in/signup.php");
 // }

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
 $( function() {
  $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' ,maxDate: '0'});
} );
</script>
</head>
<body>
  <div class="_wrapper">
    <?php include 'navbar.php';?>
    <div class="row signup">
     <form action="register.php" method="post">
      <div class="heading">
        <center><hr><hr><br>

          <p style="text-align:center">The registration fee per alumnus/alumna: Rs. 7000 and Rs. 4000 per additional guest. It covers all expenses the moment you step into your campus. It includes food, accommodation and entertainment. The payment can be made via cheque, DD or NEFT. Please fill the registration form below and take note of the password for future login. You will be contacted by Students' Alumni Cell. </p><br><hr><hr><br>
          <br>
          <h class="subheading"><b>Personal Details</b> </h>
        </center>
      </div>

      <div class="input-field col s12">

        <input  type="text"  name="name" id="name" class="validate"  required>
        <label for="name">Name *</label>
      </div>

      <div class="input-field col s12">

        <input  type="email"  name="email" id="email" required>
        <label for="email">Email ID *</label>
      </div>
      <div class="input-field col s12">


        <input  type="password" id="password" name="password" required>
        <label for="password">Password (For future login) *</label>
      </div>
      <div class="input-field col s12">

        <input  type="text" name="address" id="address"  required>
        <label for="address">Address *</label>
      </div>
      <div class="input-field col s12">
        <input  type="text" id="city" name="city" required>
        <label for="city">City *</label>
      </div>
      <div class="input-field col s12">


        <input  type="text" id="state" name="state"  required>
        <label for="state">State *</label>
      </div>
      <div class="input-field col s12">

        <input  type="text"  name="country" id="country" required>
        <label for="country">Country *</label>
      </div>
      <div class="input-field col s12">

        <input  type="text" id="zipcode" name="zipCode" required>
        <label for="zipcode">Zip Code *</label>
      </div>
      <div class="input-field col s12">

        <input  type="text"  name="mobile" id="mobile" required>
        <label for="mobile">Mobile *</label>
      </div>
      <div class="col s12" style="margin-top:15px;">
       <label for="dob">DOB *</label>
       <input  type="date" name="dob" required id="dob">

     </div>
     <div class="input-field col s12" style="margin-bottom:30px;">

      <input  type="text"  name="marital" id="marital">
      <label for="marital">Marital Status</label>
    </div>

    <div class="heading">
      <center>
        <h class="subheading" >Work Experience</h>

      </center><br><center style="color:#9e9e9e">
      Current or past work experiences as per relevance
    </center> </div>
    <div class="input-field col s12">

      <input  type="text" id="ind" name="industry"  required>
      <label for="ind">Industry *</label>
    </div>
    <div class="input-field col s12">

      <input  type="text" id="prof" name="profession" required>
      <label for="prof">Profession *</label>
    </div>
    <div class="input-field col s12">

      <input  type="text" id="org" name="orgName" required>
      <label for="org">Organisation Name *</label>
    </div>
    <div class="input-field col s12">

      <input  type="text" id="desig" name="designation" required>
      <label for="desig">Designation *</label>
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
    <div class="input-field col s12" style="margin-bottom:30px;">

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
      <input  type="number" min="1951" max="2006" id="join" name="joinYear" required>
      <label for="join">Join Year *</label>
    </div>
    <div class="input-field col s12">

      <input  type="text" id="degree" name="degree" required>
      <label for="degree">Degree *</label>
    </div>
    <div class="input-field col s12">

      <input  type="text" id="dept" name="department" required>
      <label for="dept">Department *</label>
    </div>
    <div class="input-field col s12">

      <input  type="text" id="hall" name="hall" required>
      <label for="hall">Hall *</label>
    </div>
    <div class="input-field col s12">
      <input  type="number" min="1955" max="2010" id="yog" name="graduatingYear" required>
      <label for="yog">Year of Graduating *</label>
    </div>
    <div class="input-field col s12">
      <input  type="text" id="involvements" name="involvements">
      <label for="yog">Involvements within the campus(societies,hall events,etc)?</label>
    </div>
    <div class="input-field col s12">
      <input  type="text" id="hobbies" name="hobbies">
      <label for="yog">Hobbies.</label>
    </div>

    <br>
    <div class="input-field col s12"  style="margin-bottom:20px;margin-top:3%">      
      <input  type="number" min="0" id="accompanyingNo" name="accompanyingNo">
      <label for="accompanyingNo">Accompaniments(Number of guests)</label>
    </div>
     <div class="input-field col s12"  style="margin-bottom:20px;margin-top:3%">      
      <input  type="text" min="0" id="captcha" name="captcha">
      <label for="captcha">Enter Captcha</label>
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
