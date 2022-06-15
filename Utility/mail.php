<?php
session_start();
$email   = $_SESSION['email']     ;

   $to = $email;
   $subject = "Registration Conformation of Homecoming 2022";
   $body = "Hi test person, This is test email.";
   $header = "From: kajolsahu238@gmail.com";
 
   if ( mail($to, $subject, $body, $header)) {
      echo("Success");
      header("Location: ../utility/get_update.php");
   } else {
      echo("Failed");
   }
?>