<?php

if(isset($_POST['action'])){
  


  require 'connection.php';
  ob_start(); 
  session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
@$http_referer=$_SERVER['HTTP_REFERER'];
function loggedin() {
  if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
  return true;
     } else {
  return false;
    }
}
function getfield($field){
  $query=' SELECT  '.$field.' FROM users where email="'.$_SESSION['user_id'].'"';
  if ($query_run=mysql_query($query)) {
    if($query_result= mysql_result($query_run, 0,$field)) {
      return $query_result;
    }
  }
}

if (!loggedin()) {

} else{
        header('location:home.php');
}
  
}
?>
<?php 

if (isset($_POST['email'])&&isset($_POST['password'])) {

  
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password_hash=md5($password);
  if (!empty($email)&&!empty($password)) {
    
    $query="SELECT email FROM users WHERE email='$email' AND password='$password_hash'";

    if($query_run=mysql_query($query)) {
      $query_num_rows=mysql_num_rows($query_run);

      if ($query_num_rows==0) {
        echo '<script language="javascript">alert("Invalid Email ID/PASSWORD ");</script>';
      }elseif ($query_num_rows==1) {
      
        $user_id=mysql_result($query_run, 0,'email');
        $_SESSION['user_id']=$user_id;
        header('location:home.php');


      }
    } 

  }else {
    echo '<script language="javascript">alert("You must supply Email ID and PASSWORD");</script>';
  }
}

?>


<html>
<head>
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
  <p>We live our day to day lives oblivious to the beauty that surrounds us. And by the time we do realise what exactly it is that we’ve been blessed with, it’s generally too late. But when the good ol’ days call yet again, nostalgia surrounds us as we walk the hallowed boulevards of our youth.
 The Annual Alumni Meet brings to the esteemed alumni a chance to reconnect with their Alma Mater. It lets them relive the carefree days of their college lives as they get a chance to visit all the locations they once frequented. With department and hall visits, and events like Illumination and Musical Night, the Meet rekindles the romance between the alumni and their institute. Apart from these, informal fun events like bonfire and kite flying bring out the child in all those present.
 From what used to be a simple dinner till its 7th year, the Annual Annual Meet has now evolved into a three day event that stirs up quite a buzz days before it takes place. The alumni enthusiastically look forward to getting back together with their batch mates and chatting up on what was and what has been. Each year now the Golden, Ruby and Silver Jubilee batches are invited to the meet as special guests of honor. The 13th Annual Alumni Meet celebrates 60 years of the graduation of the batch of 1955 – the first graduating batch of IIT Khara­gpur – by bringing them back to their roots. The Meet is now a major event anticipated by both the alumni and the students.
 As the years pass by and winds of change keep blowing, the Alumni Meet too shall keep evolving with the changing times, hoping to bring to the alumni an experience that they may cherish all their lives. </p>
  </div>
  </div>
  <div class="col l4 s12 m4">
  <div class="info z-depth-2 aam-reg" class="valign-wrapper">

<a href="signup.php" target="_blank"><input type="submit" value="Register" class="waves-effect waves-light btn-large" style="width:250px;margin-left:100px; padding: 18px; "></a>
<!-- **************************************************************************************************************************************** -->
 
<div class="row section">
  <div class="col">
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn-large modal-trigger" href="#modal1" style="width:250px;margin-left:100px; ">LOGIN</a>
  </div>
</div>
<!-- Modal Structure -->
<div id="modal1" class="modal ">
  <div class="modal-content">

  <div class="row">
    <form class="col s12 center-align" action="<?php echo $current_file; ?>" method="POST">
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

<!-- ***************************************************************************************************************************************  -->
  
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
