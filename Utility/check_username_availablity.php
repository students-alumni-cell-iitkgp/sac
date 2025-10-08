<?php 
include_once('../config.php');

if(!empty($_POST["email"])) {
  $email= $_POST["email"];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
    
    echo "error :you did not enter a valid email.";
  }
  else {
    $sql ="SELECT COUNT(*) FROM `hc` WHERE `email` = '$email' ";
    $stmt=$GLOBALS["conn"]->prepare($sql);
    $results = $stmt->execute();
    $num_rows =  $stmt->fetchColumn();

    if($num_rows > 0 )
    {
      echo "<div style='color:red; display: block;'> Email already exists .</div>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{
      
      echo "<div style='color:green'> Email available for Registration .</div>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
}

?>