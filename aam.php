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
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
 <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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

  }
</style>
</head>
<body>
<div class="_wrapper" style="overflow: hidden;background:white">
<?php include 'navbar.php';?>
    
  <div class="row ac-aam">
  	<center>                                 
      <img style="width: 100%;padding: 10px 30px 10px 10px" src="img/14th_aam/aam_cover.jpg">
    </center>
  </div>
  <div class="row">
  <div class="col l12 s12 m12">
    <center>
	  <div class="heading ac-head" style="border:3px black solid;display:inline-block;padding-top:2px;margin:3px;padding-right:20px;padding-left:20px;">
        <h4 style="margin-bottom: 0px;" ><b>14th Annual Alumni Meet</b> </h4> <br>
      	<h5  style="margin-top: 0px;">13th to 15th January, 2017</h5> 
      </div>
    </center>
    <center>
  	<p style="width:90%;padding:10px;font-size:17px;text-align:justify">
  		We live our day to day lives oblivious to the beauty that surrounds us and by the time we do realise what exactly it is that we've been blessed with, it's generally too late. However when the good ol' days call yet again, nostalgia surrounds us as we walk the hallowed boulevards of our youth. The Annual Alumni Meet brings to our alumni a chance to reconnect with their Alma Mater. It lets them relive the carefree days of their college lives as they get a chance to visit all the locations they once frequented.<br><br>The <b>14th Annual Alumni Meet</b> was organised from <b>13th to 15th January, 2017</b> at our Institute campus. This year the <b>Golden Jubilee batch of 1967</b>, the <b>Ruby Jubilee batch of 1977</b> and the <b>Silver Jubilee batch of 1992</b> were the special guests of honor. The Meet is now a major event anticipated by both the alumni and the students. As the years pass by and winds of change keep blowing, the Alumni Meet too shall keep evolving with the pace of time, hoping to bring to the alumni an experience that they may cherish all their lives.
  	</p>
  </center>
  </div>
</div>
<hr style="color:grey;width:70%">
<div class="images" style="background:white;">
  <div class="row">
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/reunion.jpg" style="width:90%;">
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="padding-top:20px">Grand Reunion</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			Students' Alumni Cell recently organised 14th Annual Alumni Meet which was a fun and fascinating trip down the memory lane that gave our alumni an opportunity to see old friends again and catch up with them. They came across places and stories that were almost forgotten. Some things changed, some stayed the same. After some great conversation, all those years wherein they had not seen each other seem to just fade away. You would never want to miss the excitement and renewed camaraderie during the reunion.
  		</p>
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="padding-top:20px">Arena</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			The Arena unveiled itself in all its glory on Day 1 of the 14th Annual Alumni Meet. What took months of planning and diligent execution was finally ready to welcome the alumni. For the first time, Chai-Cheddis-Charcha was introduced wherein the alumni shared their old memories with us. During the time of illumination, the arena had a spectacular view. Without any doubt, Arena has always been the charm of the Alumni Meet.
  		</p>
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/arena.jpg" style="width:90%;">
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/dept_visit.jpg" style="width:90%;">
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="font-style:;padding-top:20px">Department Visit</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			Sweet and salty memories of slogging in labs, fighting sleep and attempting to learn is something that all our departments gave us. If IIT Kharagpur was a temple of knowledge then our department is where the main shrine of this temple resides. A visit back to this shrine is sure to bring back the blended feelings of hard work, procrastination, learning and excitement.
  		</p>
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="font-style:;padding-top:20px">Musical Night</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			Music has been the one thing common in our lives. It has always helped us connect with people. So, taking a trip back to memory lane, Students' alumni cell presented Eastern Technology Music Society that took our alumni back, straight to their KGP days. The Alumni exercised their vocal chords and sang, just like they used to do in their college days. 
  		</p>
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/musical_night.jpg" style="width:90%;">
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/hall_visit.jpg" style="width:90%;">
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="font-style:;padding-top:20px">Hall Visit</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			Every KGPian shares a strong bond with their Hall. Visiting a place where we spent the 4 most important years of our life is a stimulus enough to send shivers down our body. The place where we learnt and lived is sure to have latched a fragment of our soul inside it. To come back to our hall of residence is nothing less than a reunion of the parts of our soul. The alumni got the chance to walk through the corridors and reminisce the impressions that they left. 
  		</p>
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="padding-top:20px">Campus Tour</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			In the progressive world we live in, there are a lot of changes and yet a lot of constants remain too. The pleasure pulses kick in when we get to see the same old buildings and roads lying in harmony with the new developments all around. Campus Tour is our way of showing the 2200 acre campus in a nutshell and highlighting all the major developments around.
  		</p>
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/campus_tour.jpg" style="width:90%;">
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/kite_flying.jpg" style="width:90%;">
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="font-style:;padding-top:20px">Games & Kite Flying</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			There can never be a better day to fill the sky with beautiful colours of kites than 14th of January which is celebrated as Makar Sankranti all over the country. The fun filled games added up to the excitement and everyone had a wonderful time. It was indeed a walk back in time to the children hidden somewhere in us.
  		</p>
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	   <h4 style="font-style:;padding-top:20px">Entertainia</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			Smiles can cast the most powerful spell of love and happiness. With Kenny Sebastian taking the tough task to fill the open air theatre with a burst of laughter, the event became one of the most talked about event of the meet. The alumni as well as the students had a great time laughing their heart out.
  		</p>
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/entertania.jpg" style="width:90%;">
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/illu.jpg" style="width:90%;">
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  	<h4 style="font-style:;padding-top:20px">Illumination</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			An evening of Euphoria as the name suggests fills the hearts of all the people present with a sense of serenity and calm. The Illumination with diyas followed by the release of sky lanterns creates an aura of happiness all around. With all this we move to the DJ night around the bonfire that beautifully escalates the emotions all around and the alumni do "shake a leg". 
  		</p>
  	  </center>
  	</div>
  </div>
  <hr style="color:grey;width:70%">
  <div class="row">
  	<div class="col l6 s6 m6">
  	  <br>
  	  <center>
  	  <h4 style="font-style:;padding-top:20px">2.2 Marathon</h4>
  		<p style="width:90%;padding:20px;font-size:17px">
  			The iconic marathon track that our campus possesses is inviting enough for everyone to run their problems off. With the alumni coming back after such a long time the Institute fails not to teach them a thing or two again with the run for health in the 2.2 marathon organized early in the morning. Students and alumni run together to foster the spirit of good health and harmony. 
  		</p>
  	  </center>
  	</div>
  	<div class="col l6 s6 m6">
      <center>
      	<br>
  		<img src="img/14th_aam/marathon.jpg" style="width:90%;">
  	  </center>
  	</div>
  </div>
</div>
<hr style="color:grey;width:70%">
</div>
<div class="photos" style="padding-bottom:10px">
  <center>
  	<p style="width:90%;padding:5px;display: inline;font-size:17px">For more photos, kindly click on:</p>
  	<a class="waves-effect waves-light btn" href=" https://goo.gl/photos/iDMk6fwtfjKMyVAw8" style="display:inline;padding:10px">14th Annual Alumni Meet Memories</a>
  </center>
</div>
<?php include"footer.php";  ?>
  </body>
  </html>
