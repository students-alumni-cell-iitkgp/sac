<html>
<head>
  <meta charset="UTF-8">

  <title>Register | Annual Alumni Meet &middot; IIT Kharagpur</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="..\img\favicon_io\Logo2.2.ico">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> -->
  <!-- <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
  <script>
  $(function () {
    $('form').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'register.php',
        data: $('form').serialize(),
        success: function (response) {
          if(response== 0 )
          {
            swal({
              title: "WRONG CAPTCHA!",
              text: "Please re-enter the captcha!",
              icon: "error",
              buttons: true,
              dangerMode: true,
            }).then((value) => {});
          }
          else if(response== 1)
          {
            swal({
              title: "REGISTERED!",
              text: "You can login now!",
              icon: "success",
              buttons: false,
              timer: 2000,
            }).then((value) => {
              window.location="aam.php";
            });
            //alert('success');
          }
          else{
            alert(response);
          }
        }
      });
    });
  });
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
  .heading{
    padding-top: 10px;
    margin-top: 0px;
    margin-bottom: 30px;
  }
  </style>
</head>

<body>

  <div class="_wrapper">

    <?php include 'navbar.php';?>

    <div class="row signup">

      <form>
        <center>
          <div class="heading">

            <hr><hr><br>
            <div>
              <p style="text-align: center">The registration fee per alumnus/alumna: Rs. 7000 and Rs. 4000 per additional guest.<br>

                It covers all expenses the moment you step into your campus.<br>
                It includes food, accommodation and travel within the campus. <br>
                The payment can be made via cheque, DD or NEFT. <br>
                Please fill the registration form below and take note of the password for future login. <br>
                You will be contacted by Students' Alumni Cell.</p>
              </div>
              <br><hr><hr><br><br>
              <div><a class="waves-effect waves-light btn-large modal-trigger" href="aam.php#modal1" >LOGIN - If already Registered</a></div>
              <br><br>
            </div>

            <h class="subheading"><b>Personal Details</b> </h>

            <br><br><br>

            <div class="row1">
              <div class="input-field col s12">
                <input  type="text"  name="name" id="name" class="validate"  required>
                <label for="name">Name <span style="color:red;">*</span></label>
              </div>


            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="email"  name="email" id="email" required>
                <label for="email">Email ID <span style="color:red;">*</span></label>
              </div>
              <div class="input-field col s6">
                <input  type="password" id="password" name="password" required>
                <label for="password">Password (For future login) <span style="color:red;">*</span></label>
              </div>
            </div>



            <div class="input-field col s12">
              <input  type="text" name="address" id="personal_address">
              <label for="address">Address </label>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="personal_city" name="city" required>
                <label for="city">City <span style="color:red;">*</span></label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="personal_state" name="state"  >
                <label for="state">State </label>
              </div>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text"  name="country" id="country" required>
                <label for="country">Country <span style="color:red;">*</span></label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="zipcode" name="zipCode" >
                <label for="zipcode">Zip Code </label>
              </div>
            </div>

            <div class="row1">
              <div class="input-field col s6" style="margin-top:30.5px;">
                <input  type="text"  name="mobile" id="mobile" required>
                <label for="mobile">Mobile <span style="color:red;">*</span></label>
              </div>
              <div class="col s6" style="margin-top:15px;">
                <label for="dob">DOB <span style="color:red;">*</span></label>
                <input  type="date"  name="dob" required id="dob">
              </div>
            </div>





            <div class="input-field col s12" style="margin-bottom:30px;">
              <input  type="text"  name="marital" id="marital">
              <label for="marital">Marital Status</label>
            </div>



            <div class="heading">
              <center>
                <h class="subheading"><b>Work Experience</b></h>
              </center><br>
              <center style="color:#9e9e9e">Current or past work experiences as per relevance
              </center>
            </div>


            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="ind" name="industry"  >
                <label for="ind">Industry </label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="prof" name="profession" >
                <label for="prof">Profession </label>
              </div>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="org" name="orgName" required>
                <label for="org">Organisation Name <span style="color:red;">*</span></label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="desig" name="designation" required>
                <label for="desig">Designation <span style="color:red;">*</span></label>
              </div>
            </div>

            <div class="input-field col s12" style="margin-bottom:30px;">

              <input  type="text" id="address" name="work_address">
              <label for="address">Address</label>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="city" name="work_city">
                <label for="city">City</label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="state" name="work_state">
                <label for="state">State</label>
              </div>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="Country" name="work_country">
                <label for="Country">Country</label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="zip" name="work_zipCode">
                <label for="zip">Zip Code</label>
              </div>
            </div>
            <div class="row"></div>

            <p></p>

            <div class="heading" >
              <center><br><br>
                <h class="subheading"><b>Nostalgic Section</b> </h>
              </center>
            </div>


            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="roll" name="rollNum">
                <label for="roll">Roll Number</label>
              </div>
              <div class="input-field col s6">
                <input  type="number" min="1951" max="2006" id="join" name="joinYear" required>
                <label for="join">Join Year <span style="color:red;">*</span></label>
              </div>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="degree" name="degree" required>
                <label for="degree">Degree <span style="color:red;">*</span></label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="dept" name="department" required>
                <label for="dept">Department <span style="color:red;">*</span></label>
              </div>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="hall" name="hall" required>
                <label for="hall">Hall <span style="color:red;">*</span></label>
              </div>
              <div class="input-field col s6">
                <input  type="number" min="1955" max="2010" id="yog" name="graduatingYear"  required>
                <label for="yog">Year of Graduating <span style="color:red;">*</span></label>
              </div>
            </div>

            <div class="row1">
              <div class="input-field col s6">
                <input  type="text" id="involvements" name="involvements">
                <label for="yog">Involvements (Societies, Hall Events, etc) </label>
              </div>
              <div class="input-field col s6">
                <input  type="text" id="hobbies" name="hobbies">
                <label for="yog">Hobbies</label>
              </div>
            </div>

            <div class="input-field col s12"  style="margin-bottom:20px;margin-top:3%">
              <input  type="number" min="0" id="accompanyingNo" name="accompanyingNo" required>
              <label for="accompanyingNo">Accompanying Person(s)(Number of guests)<span style="color:red;">*</span></label>
            </div>

            <div class="col s12">
              <center>
                <button type="submit" class="btn btn-success btn-lg btn-block" name="button" style="width:25%" >SUBMIT</button>
              </center>
            </div>

          </center>

        </form>
      </div>
    </div>


    <?php include 'footer.php';?>

  </body>
  </html>
