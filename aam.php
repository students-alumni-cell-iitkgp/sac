<?php
/*
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
      /*
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
}
*/
?>
<?php 

if (isset($_POST['action'])) {
require 'connection.php';

  session_start();
  
 $email=$_POST['email'];
  $password=$_POST['password'];
  $password_hash=hash('sha256', $password);
  if (!empty($email)&&!empty($password)) {
    
    $query="SELECT * FROM users WHERE email='".$email."' AND password='".$password_hash."'";
    //echo "cont..";
$result = $connection->query($query);
     // $query_num_rows=mysqli_num_rows($result);
      //echo  $query_num_rows;
      /*if ($query_num_rows==10) {
        echo '<script language="javascript">alert("Invalid Email ID/PASSWORD ");</script>';
      }*/
      //echo $result->num_rows;
      if ($result->num_rows > 0)  {
      
        //$user_id=mysql_result($query_run, 0,'email');
        $_SESSION['email']=$email;
         echo '<script language="javascript">alert("Logging you in");</script>';
        header('location:home.php');


      }else
        echo '<script language="javascript">alert("Invalid Email ID/ Password");</script>';
    //} 

  }else {
    echo '<script language="javascript">alert("You must supply Email ID and PASSWORD");</script>';
  }
}

?>


<html>
<head>
<title>Annual Alumni Meet &middot; IIT Kharagpur</title>
<link rel="stylesheet" href="css/materialize.min.css">
<link rel="icon"  href="img/meet_14.png">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript">
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        });
    </script>

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
<div class="_wrapper">
<?php include 'navbar.php';?>
 <div class="row ac-aam">
        <img src="img/indexslider/annualalumnimeet1.jpg" >
    </div>
  <div class="row">
  <div class="col l8 s8 m8">
  <div class="info z-depth-2">
  <p>We live our day to day lives oblivious to the beauty that surrounds us. And by the time we do realise what exactly it is that we&#39;ve been blessed with, it&#39;s generally too late. But when the good ol&#39; days call yet again, nostalgia surrounds us as we walk the hallowed boulevards of our youth.
 The Annual Alumni Meet brings to the esteemed alumni a chance to reconnect with their Alma Mater. It lets them relive the carefree days of their college lives as they get a chance to visit all the locations they once frequented. With department and hall visits, and events like Illumination and Musical Night, the Meet rekindles the romance between the alumni and their institute. Apart from these, informal fun events like bonfire and kite flying bring out the child in all those present.
 From what used to be a simple dinner till its 7th year, the Annual Annual Meet has now evolved into a three day event that stirs up quite a buzz days before it takes place. The alumni enthusiastically look forward to getting back together with their batch mates and chatting up on what was and what has been. Each year now the Golden, Ruby and Silver Jubilee batches are invited to the meet as special guests of honor. The 14th Annual Alumni Meet celebrates 60 years of the graduation of the batch of 1955, &#34;the first graduating batch of IIT Kharagpur&#34; by bringing them back to their roots. The Meet is now a major event anticipated by both the alumni and the students.
 As the years pass by and winds of change keep blowing, the Alumni Meet too shall keep evolving with the changing times, hoping to bring to the alumni an experience that they may cherish all their lives. </p>
  </div>
  </div>
  <div class="col l4 s12 m4">
  <div class="info z-depth-2 aam-reg" class="valign-wrapper" style="height:380px;">
<center>
  <a href="signup.php" target="_blank"><input type="submit" value="Register" class="waves-effect waves-light btn-large" style="width:250px;padding-top: 1em; "></a>
</center>  
 
<!-- Modal Trigger -->
  <center>
    <a class="waves-effect waves-light btn-large modal-trigger" href="#modal1" style="width:250px;">LOGIN</a>
  </center>
  
<!-- Modal Structure -->
<div id="modal1" class="modal ">
  <div class="modal-content">

  <div class="row">
    <form class="col s12 center-align" action="aam.php" method="POST">
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
            <i class="material-icons right">send</i>
      </div>
    </form>
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-blue btn-flat">CLOSE</a>
  </div>
</div>

  </div>
  </div>
  </div>
  <div class="info row">
  <?php include 'gallery.php';?>
  </div>
  </div>
  <?php include 'footer.php';?>
 
  </body>
  </html>
