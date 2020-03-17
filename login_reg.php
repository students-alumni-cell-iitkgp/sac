<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM accounts WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         echo("<script>console.log('PHP: ".$count."');</script>");
         header("location: index_reg.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:500px; height: 500px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:130px">
               
               <form action = "" method = "post">
                  <label style="font-size: 25px;">UserName  :</label><input style="width: 300px; height: 40px; font-size: 16px"  type = "text" name = "username" class = "box"/><br /><br />
                  <label style="font-size: 25px;">Password  :</label><input style="width: 300px; height: 40px;font-size: 16px" type = "password" name = "password" class = "box" /><br/><br />
                  <input style="width: 100px; height: 40px; font-size: 20px;" type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $conn->error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>