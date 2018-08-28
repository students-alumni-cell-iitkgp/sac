<html>
<head>
    <meta charset="UTF-8">
    
    <title>Register | Annual Alumni Meet &middot; IIT Kharagpur</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
     
              <!-- Added for modified looks in sign in -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel='stylesheet' href='https://cdn.gitcdn.xyz/cdn/angular/bower-material/v1.0.0-rc3/angular-material.css'>
    <link rel='stylesheet' href='http://localhost:8080/docs.css'>

                    <!-- Added scripts : -->
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-animate.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-route.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-aria.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-messages.min.js'></script>
    <script src='https://cdn.gitcdn.xyz/cdn/angular/bower-material/v1.0.0-rc3/angular-material.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/assets-cache.js'></script>
    <script  src="js/index.js"></script>

              <!-- Adding calender -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
   function myC(){
     
       $( "#1703" ).datepicker({ dateFormat: 'dd/mm/yy' });
    
   }    
</script>



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
  }).then((value) => {
   
  });
  }
  else if(response== 1)
    {
     swal({
    title: "REGISTERED!",
    text: "You can login now!",
    icon: "success",
    buttons: true,
    dangerMode: true,
  }).then((value) => {
    window.location="registration-complete.php";
   
  });
  //alert('success');
  }
  else
  {
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
    <form>
      <div class="heading">
      <center>

          <div><a class="waves-effect waves-light btn-large modal-trigger" href="aam.php#modal1" >LOGIN - If already Registered</a></div>

      <hr><hr><br>

<p style="text-align:center">The registration fee per alumnus/alumna: Rs. 7000 and Rs. 4000 per additional guest. It covers all expenses the moment you step into your campus. It includes food, accommodation and entertainment. The payment can be made via cheque, DD or NEFT. Please fill the registration form below and take note of the password for future login. You will be contacted by Students' Alumni Cell. </p><br><hr><hr><br>
<br>
<br>
<div style="width:800px; height: 100%;" ng-controller="DemoCtrl" ng-cloak="" class="md-inline-form" ng-app="MyApp" layout="column" layout-sm="row" layout-align="center center" layout-align-sm="start start" layout-fill>
    

                                          <!-- New Form Begins here : -->


    <md-content id="SignupContent" class="md-whiteframe-10dp" flex-sm >


                                              <!-- Personal Details -->
        
        <md-toolbar flex id="materialToolbar">
            <div class="md-toolbar-tools"> <span flex=""></span> <span class="md-headline" align="center">Personal Details </span> <span flex=""></span> </div>
        </md-toolbar>
        <div layout-padding="">
            <form name="userForm" method="POST" action="" ng-submit="user.submit(userForm.$valid)" enctype="multipart/form-data">
                <input type="hidden" name="action" value="signup" />
                <div layout="row" layout-sm="column">
                    
                  <div class="input-field col s6">
                        <input ng-model="user.first_name" ng-pattern="/^[a-zA-Z'. -]+$/" type="text"  name="name" id="name" class="validate"  required>
                        <label for="name">Name</label>
                     
                        <div ng-if="userForm.first_name.$dirty" ng-messages="userForm.first_name.$error" role="alert">
                            <div ng-message="required" class="my-message"> Name is Required.</div>
                        </div>
                   </div>                  
                

                  <div class="input-field col s6">

                        <p>Gender</p>
                        <input type="radio" id="male" name="drone" checked />
                        <label for="male">Male</label>

                        <input type="radio" id="female" name="drone" checked />
                        <label for="female">Female</label>
                   </div>
                     
                </div>

<!-- Email Id and Password : -->

                <div layout="row" layout-sm="column">
                    <div class="input-field col s6">        
                      <input  type="email"  name="email" id="email" required>
                      <label for="email">Email ID *</label>
                    </div>
                    <div class="input-field col s6">     
                      <input  type="password" id="password" name="password" required>
                      <label for="password">Password (For future login) *</label>
                     </div>
                </div>
                
                <div layout="row" layout-sm="column">
                     <div class="input-field col s12">       
                        <input  type="text" name="address" id="address"  >
                        <label for="address">Address </label>
                     </div>
                </div>
                <div layout="row" layout-sm="column">
                    <div class="input-field col s12">
                      <input  type="text" id="city" name="city" required>
                      <label for="city">City *</label>
                    </div>
                    <div class="input-field col s12">      
                      <input  type="text" id="state" name="state"  >
                      <label for="state">State </label>
                    </div>
                </div>
                <div layout="row" layout-sm="column">
                     <div class="input-field col s12">       
                        <input  type="text"  name="country" id="country" required>
                        <label for="country">Country *</label>
                      </div>
                      <div class="input-field col s12">       
                        <input  type="text" id="zipcode" name="zipCode" >
                        <label for="zipcode">Zip Code </label>
                      </div>
                </div>
                <div layout="row" layout-sm="column">
                     <div class="input-field col s12">      
                        <input  type="number"  name="mobile" id="mobile" required>
                        <label for="mobile">Mobile *</label>
                      </div>
                </div>
                <div layout="row" layout-sm="column">
                     <div class="col s6" >
                        <div id="1703div" class="form-item field text">
                        <label class="title" for="1703">Date of Birth</label>
                        <input class="datepicker"  type="text" id="1703">
                      </div>        
                      </div>
                      <div class="input-field col s6" name="marital" id="marital">  
                        <p>Marital Status</p>
                        <input type="radio" id="married"  />
                        <label for="married">Married</label>

                        <input type="radio" id="unmarried"  />
                        <label for="unmarried">Un-Married</label> 
                       
                      </div>
                </div>

                
      
          
            </form>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                                                    <!-- Work Experience -->

        <md-toolbar flex id="materialToolbar">
            <div class="md-toolbar-tools"> <span flex=""></span> <span class="md-headline" align="center">Work Experience </span> <span flex=""></span> </div>
        </md-toolbar>
            
            
                <input type="hidden" name="action" value="signup" />
                <div layout="row" layout-sm="column">
                    <md-input-container flex-gt-sm="">
                        <label>First name</label>
                        <input ng-model="user.first_name" name="first_name" required type="text" ng-pattern="/^[a-zA-Z'. -]+$/" placeholder="Your First Name">
                        <div ng-if="userForm.first_name.$dirty" ng-messages="userForm.first_name.$error" role="alert">
                            <div ng-message="required" class="my-message">First Name is Required.</div>
                            <div ng-message="pattern" class="my-message">Enter correct First Name.</div>
                        </div>
                    </md-input-container>
                    <md-input-container flex-gt-sm="">
                        <label>Last Name</label>
                        <input ng-model="user.last_name" name="last_name" required type="text" ng-pattern="/^[a-zA-Z'. -]+$/" placeholder="Your Last Name">
                        <div ng-if="userForm.last_name.$dirty" ng-messages="userForm.last_name.$error" role="alert">
                            <div ng-message="required" class="my-message">Last Name is Required.</div>
                            <div ng-message="pattern" class="my-message">Enter correct Last Name.</div>
                        </div>
                    </md-input-container>
                </div>
                <div layout="row" layout-sm="column">
                    <p style="font-size: 12px; margin-left: 3px; margin-top: 18px;">Gender: </p>
                    <input type="hidden" name="gender" value="{{user.gender}}" />
                    <md-radio-group style="margin: 12px 0 19px;" ng-model="user.gender" required>
                        <md-radio-button value="Male" class="md-primary">Male</md-radio-button>
                        <md-radio-button value="Female">Female</md-radio-button>
                    </md-radio-group>
                    <md-input-container flex-gt-sm="60">
                        <label>Age</label>
                        <input required type="number" step="any" name="age" ng-model="user.age" min="13" max="100" placeholder="20" />
                        <div ng-if="userForm.age.$dirty" ng-messages="userForm.age.$error" role="alert" multiple>
                            <div ng-message="required">Age is Required.</div>
                            <div ng-message="min">Only Above 13 years Old are allowed.</div>
                            <div ng-message="max">Sorry {{userForm.age.$viewValue}} years old are not Allowed.</div>
                        </div>
                    </md-input-container>
                </div>
                <div layout="row" layout-sm="column">
                    <md-input-container flex-gt-sm="">
                        <label>Email</label>
                        <input required type="email" name="email" ng-model="user.email" ng-pattern="/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" placeholder="someone@example.com" />
                        <div ng-if="userForm.email.$dirty" ng-messages="userForm.email.$error" role="alert">
                            <div ng-message="required" class="my-message">Email Address is Required.</div>
                            <div ng-message="pattern" class="my-message">Enter Correct Email Address. </div>
                            <div ng-message="email" class="my-message">Enter Correct Email Address. </div>
                        </div>
                    </md-input-container>
                </div>
                <div layout="row" layout-sm="column">
                    <md-input-container flex-gt-sm="">
                        <label>New Password</label>
                        <input name="password" ng-model="user.password" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required placeholder="********">
                        <div ng-if="userForm.password.$dirty" ng-messages="userForm.password.$error" role="alert" multiple>
                            <div ng-message="required">Password is Required.</div>
                            <div ng-message="pattern">Password should contain at least one number, one lowercase and one uppercase character.</div>
                            <div ng-message="minlength">Password should be greater than 8 letters.</div>
                            <div ng-message="maxlength">Password Can't be more than 100 letters.</div>
                        </div>
                    </md-input-container>
                    <md-input-container flex-gt-sm="">
                        <label>Confirm Password</label>
                        <input name="confmPassword" ng-model="user.confmPassword" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required compare-to="user.password" placeholder="********">
                        <div ng-if="userForm.confmPassword.$dirty" ng-messages="userForm.confmPassword.$error" role="alert">
                            <div ng-message="required">Confirm Password is Required.</div>
                            <div ng-message="compareTo">Password Doesn't Match.</div>
                        </div>
                    </md-input-container>
                </div>                
          
        

                                                          <!-- Nostalgic Section -->
        <md-toolbar flex id="materialToolbar">
            <div class="md-toolbar-tools"> <span flex=""></span> <span class="md-headline" align="center">Nostalgic Section </span> <span flex=""></span> </div>
          </md-toolbar>
            
            


                <input type="hidden" name="action" value="signup" />
                <div layout="row" layout-sm="column">
                    <md-input-container flex-gt-sm="">
                        <label>First name</label>
                        <input ng-model="user.first_name" name="first_name" required type="text" ng-pattern="/^[a-zA-Z'. -]+$/" placeholder="Your First Name">
                        <div ng-if="userForm.first_name.$dirty" ng-messages="userForm.first_name.$error" role="alert">
                            <div ng-message="required" class="my-message">First Name is Required.</div>
                            <div ng-message="pattern" class="my-message">Enter correct First Name.</div>
                        </div>
                    </md-input-container>
                    <md-input-container flex-gt-sm="">
                        <label>Last Name</label>
                        <input ng-model="user.last_name" name="last_name" required type="text" ng-pattern="/^[a-zA-Z'. -]+$/" placeholder="Your Last Name">
                        <div ng-if="userForm.last_name.$dirty" ng-messages="userForm.last_name.$error" role="alert">
                            <div ng-message="required" class="my-message">Last Name is Required.</div>
                            <div ng-message="pattern" class="my-message">Enter correct Last Name.</div>
                        </div>
                    </md-input-container>
                </div>
                <div layout="row" layout-sm="column">
                    <p style="font-size: 12px; margin-left: 3px; margin-top: 18px;">Gender: </p>
                    <input type="hidden" name="gender" value="{{user.gender}}" />
                    <md-radio-group style="margin: 12px 0 19px;" ng-model="user.gender" required>
                        <md-radio-button value="Male" class="md-primary">Male</md-radio-button>
                        <md-radio-button value="Female">Female</md-radio-button>
                    </md-radio-group>
                    <md-input-container flex-gt-sm="60">
                        <label>Age</label>
                        <input required type="number" step="any" name="age" ng-model="user.age" min="13" max="100" placeholder="20" />
                        <div ng-if="userForm.age.$dirty" ng-messages="userForm.age.$error" role="alert" multiple>
                            <div ng-message="required">Age is Required.</div>
                            <div ng-message="min">Only Above 13 years Old are allowed.</div>
                            <div ng-message="max">Sorry {{userForm.age.$viewValue}} years old are not Allowed.</div>
                        </div>
                    </md-input-container>
                </div>
                <div layout="row" layout-sm="column">
                    <md-input-container flex-gt-sm="">
                        <label>Email</label>
                        <input required type="email" name="email" ng-model="user.email" ng-pattern="/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" placeholder="someone@example.com" />
                        <div ng-if="userForm.email.$dirty" ng-messages="userForm.email.$error" role="alert">
                            <div ng-message="required" class="my-message">Email Address is Required.</div>
                            <div ng-message="pattern" class="my-message">Enter Correct Email Address. </div>
                            <div ng-message="email" class="my-message">Enter Correct Email Address. </div>
                        </div>
                    </md-input-container>
                </div>
                <div layout="row" layout-sm="column">
                    <md-input-container flex-gt-sm="">
                        <label>New Password</label>
                        <input name="password" ng-model="user.password" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required placeholder="********">
                        <div ng-if="userForm.password.$dirty" ng-messages="userForm.password.$error" role="alert" multiple>
                            <div ng-message="required">Password is Required.</div>
                            <div ng-message="pattern">Password should contain at least one number, one lowercase and one uppercase character.</div>
                            <div ng-message="minlength">Password should be greater than 8 letters.</div>
                            <div ng-message="maxlength">Password Can't be more than 100 letters.</div>
                        </div>
                    </md-input-container>
                    <md-input-container flex-gt-sm="">
                        <label>Confirm Password</label>
                        <input name="confmPassword" ng-model="user.confmPassword" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required compare-to="user.password" placeholder="********">
                        <div ng-if="userForm.confmPassword.$dirty" ng-messages="userForm.confmPassword.$error" role="alert">
                            <div ng-message="required">Confirm Password is Required.</div>
                            <div ng-message="compareTo">Password Doesn't Match.</div>
                        </div>
                    </md-input-container>
                </div>                
            
                  <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" ng-disabled="userForm.$invalid" name="submit">Submit</md-button>

           </md-content></div></center></div></form>
        
<br>
       
      
     
    
  
 </div>
  
  </div>
  <?php include 'footer.php';?>
 
  </body>
  </html>
