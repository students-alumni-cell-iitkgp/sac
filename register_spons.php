<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="css/login.css"> -->
    <title>Registration</title>
    <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon">
</head>
      <body>
          <nav class="navbar navbar-light "style="background-color: #bbbfca;position: fixed;top: 98px;width: 100%;z-index: 2;">
                    <ul class="navbar-nav header">
                    <li class="nav-item active">
                         <h3 class="navbar-brand" style="margin:0;">Associate With Us </h3>
                    </li>

                    </ul>
                    <button type="button" name="login" id="login" class="btn btn-primary" data-toggle="modal" data-target="#loginModal"style="background-color:#00416d;">Login</button>
          </nav>
      </body>
 </html>
 <div id="loginModal" class="modal" role="dialog" style="padding-left:5%;">
      <div class="modal-dialog modal-dialog-centered" style="min-width:400px;">
           <div class="modal-content">
             <div class="body">
               <div class="modal-header">
                    <h4 class="modal-title">Join with Us</h4>
                    <button  type="button" class="close" data-dismiss="modal">&times;</button>

               </div>
               <div class="modal-body">
                    <form action = "back_spons.php" method = "post">
                    <label for="username" style="margin-bottom:0;">User Name</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="none" placeholder="User Name"style="border:0;background-color:#e8e8e8;font-size:0.9em;"/>
                    <br />
                    <label for="designation"style="margin-bottom:0;">Designation</label>
                    <input type="text" name="designation" id="designation" class="form-control"placeholder="Designation"style="border:0;background-color:#e8e8e8;font-size:0.9em;" />
                    <br />
                    <label for="details"style="margin-bottom:0;">Details</label>
                    <input type="text" name="details" id="details" class="form-control"placeholder="details"style="border:0;background-color:#e8e8e8;font-size:0.9em;" />
                    <br />
                    <label for="email"style="margin-bottom:0;">Email</label>
                    <input type="email" name="email" id="email "class="form-control"placeholder="email"style="border:0;background-color:#e8e8e8;font-size:0.9em;">
                    <br>
                    <label for="phonenumber"style="margin-bottom:0;">Phone Number</label>
                    <input type="number" name="phonenumber" id="number" class="form-control"placeholder="Phone Number"autocomplete="none"style="border:0;background-color:#e8e8e8;font-size:0.9em;" />
                    <br />
                    <label for="Address"style="margin-bottom:0;">Address</label>
                    <input type="text" name="address" id="Address" class="form-control"placeholder="Address"style="border:0;background-color:#e8e8e8;font-size:0.9em;" />
                    <br />
                    <button style="margin-left:45%;" type="submit" value = "submit" name="login_button" id="login_button" class="btn btn-lg btn-primary">Login</button>
                    </form>
               </div>
             </div>
           </div>
      </div>
 </div>
 <script>
 /*$(document).ready(function(){
      $('#login_button').click(function(){
           var username = $('#username').val();
           var designation = $('#designation').val();
           var details = $('#details').val();
           var email = $('#email').val();
           var phonenumber = $('#number').val();
           var address = $('#Address').val();
           if(username != '' && designation != '' && email!='' && phonenumber!=''&&address!=''&&details!='')
           {
                $.ajax({
                     url:"action.php",
                     method:"POST",
                     data: {username:username, designation:designation ,details:details,email:email,phonenumber:phonenumber,address:address},
                     success:function(data)
                     {
                          //alert(data);
                          if(data == 'No')
                          {
                               alert("Wrong Data");
                          }
                          else
                          {
                               $('#loginModal').hide();
                               location.reload();
                          }
                     }
                });
           }
           else
           {
                alert("Every field is required");
           }
      });
      $('#logout').click(function(){
           var action = "logout";
           $.ajax({
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function()
                {
                     location.reload();
                }
           });
      });
 });*/
 // When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
 </script>
