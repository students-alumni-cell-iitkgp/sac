<?php
if(isset($_POST['action'])){
  session_start();
if ($_SESSION["email"] != "") {
  header('Location: ./home.php');
  exit();
}
include 'connection.php';
$email = $_POST["email"];
$q="SELECT password FROM users WHERE email=$email";
$password = $connection->query($q);
 $password = hash('sha256', $password);
echo "Email ID $email <br>";
echo "Password after hash: $password <br>";
$sql = "SELECT email, password FROM users";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
  // output num rows
  while ($row = $result->fetch_assoc()) {
    // echo "email: " . $row["email"]. " - password: " . $row["password"]."<br>";
    if ($email == $row["email"]) {
      if ($password == $row["password"]) {
        $_SESSION["email"] = $email;
        $connection->close();
        header('Location: ./home.php');
        exit;
      }
      else {
        header('Location: ./signin.php?err=pass');
      }
    } else {
      header('Location: ./aam.php?err=email');
    }
  }
} else {
  $connection->close();
  header('Location: ./signup.php?alert=Please register before logging in.');
  exit;
}

}
?>



 <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>


<style>
.swal-modal .swal-text {
    text-align: center;
}
</style>



<script type="text/javascript">
$(function () {

        $('#form1').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'aamlogin.php',
            data: $('#form1').serialize(),
            success: function (response) {
               if(response== 0 )
               {
                swal({
  title: "INCOMPLETE DETAILS!",
  text: "Please enter email-id and password!",
  icon: "error",
  buttons: true,
  dangerMode: true,
}).then((value) => {
 
});
}
else if(response== 1 )
               {
                swal({
  title: "INVALID LOGIN!",
  text: "Please re-enter your email and password!",
  icon: "error",
  buttons: true,
  dangerMode: true,
}).then((value) => {
 
});
}
else if(response== 2 )
  {
 window.location="home.php";
//alert(response);
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
<script type="text/javascript">
  $(function () {
      $('#sweetalert').on('click', function () {
          swal({
  title: "SORRY!",
  text: "Registrations have been closed. \nPlease contact +91 8283828675 for further queries",
  icon: "error",
  buttons: true,
  dangerMode: true,
});
      });
  });
</script>


<html>
<head>
<title>Virtual Reunion Meet &middot; IIT Kharagpur</title>
<link rel="stylesheet" href="css/materialize.min.css">
<link rel="icon"  href="img/meet_14.png">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
 <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript">
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        });
    </script>

<style type="text/css">
.hr{

	align-conten
}
   
   #button{

    padding:10px;
   	display:inline;
   }

   @media only screen and (min-width: 768px){
     .ac-head{
       margin-top:-20px;
     }
    .aam-reg{
      height: 380px;
    }
     .aam-reg a{
      margin-top: 60px;
      display: inline-block;
    }
      .ac-aam{
        margin-left: 0px;
        width:100vw;
        
    }
   } 
    @media only screen and (max-width: 468px){
    *{
    margin:0px;
    padding:0px;}
      .ac-aam img{ height: 30%;
    margin: 0px auto;
    max-width:100%;
    }
    .info {
      width: 330px;
      text-align: center;
    }
    .aam-reg{
      height: 150px;
      margin-top: 10px;
    }
    .aam-reg a{

      margin-top: 10px;
    } 
    .view{
    position:absolute;
    left:0px;
}
  #button{
  	display: inherit;
  	width: 300px;
  	padding: 0px

  }
 .hr{

 	margin-left: 13%;
 }


  }
</style>
</head>
<body>
<div class="_wrapper" style="overflow: hidden;background:white">
<?php include 'navbar.php';?>
    
  <div class="row ac-aam">

      <div class="col l12"><img style="width: 101%; margin: -1%;height:68%;" src="img/17th_aam/aam2020.png"></div>
  </div>
  <hr class="hr" style="color:grey;width:90%">
  <div class="reg">
    <div class="row-reg" align="center" height="150px">
     <div class="col l3">
          <div class="heading ac-head" style="border:3px black solid;display:inline-block;padding-top:2px;margin:3px;padding-right:20px;padding-left:20px;margin-bottom:10px;margin-top:10px;">
            <h4 style="margin-bottom: 0px;" ><b>Virtual Reunion</b> </h4> <br>
            <h5  style="margin-top: 0px;">6th February, 2021</h5>
          </div>
          <p style="width:90%;padding:10px;font-size:17px;text-align:justify">
          There is nothing like returning to a place that remains unchanged to find how you yourself have altered. Join us on February 6th as we reminisce together the friendship that no place or lapse of time can lessen- the precious bond you made in your memorable college years. Join us as we celebrate the grand virtual reunion with the six batches of honour -  1971, 1981, 1996, 2000, 2005 and 2010. The virtual reunion gives you a platform to relive, reconnect, and revive with the institute. Come through these gates of nostalgia that have been flung open by your beloved Alma Mater. Save the dates and make sure to stream in to catch the event live. This event is in no way a substitute for the 18th Alumni Meet and we look forward to hosting the honourable batches as soon as the conditions improvise.</p>
           <!-- <p style="width:90%;padding:10px;font-size:17px;text-align:center">
           **Registrations have been closed. Please contact +91 8283828675 for further queries.
           </p> -->
          <div class="row" style=" margin-top:20px; margin-bottom:25px;">
            <a class="waves-effect waves-light btn-large modal-trigger" href="#modal1" style="width: 30%">LOGIN</a>
            <a class="waves-effect waves-light btn-large" style="width: 30%" href = "signup.php">Virtual Reunion Registration</a>
          </div>
     </div>
    </div> 

</div>
<hr class="hr" style="color:grey;width:90%">
    <!---  Modal Structure For login - -->
  
    <div id="modal1" class="modal ">
        <div class="modal-content">

            <div class="row">
                <form class="col s12 center-align" id="form1">
                    <div class="row">
                        <h2>LOGIN</h2>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix" type="email" class="validate" name="email">
                            <label for="icon_prefix">Email ID</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="icon_telephone" type="password" class="validate" name="password">
                            <label for="icon_telephone">Password</label>
                        </div>
                        <button class="btn-large waves-effect waves-light " type="submit" name="action" style="margin-top:15px; width:200px;">Log In
                            <i class="material-icons right">send</i> </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-blue btn-flat">CLOSE</a>
        </div>
    </div>

<?php include"footer.php";  ?>
  </body>
  </html>
