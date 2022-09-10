<?php
session_start();
$email   = $_SESSION['email'] ;
$name   = $_SESSION['name'] ;
$accompaniment   = $_SESSION['accompaniment'] ;
$cost   = $_SESSION['cost'] ;
$gh   = $_SESSION['gh'] ;
$to = $email;
$subject = "Registration Confirmation for Homecoming 2022 and Payment Procedure";
$header = "From: sac.homecoming.2022@gmail.com";

$body = "Dear KGPian,\n\n
   This mail is to confirm your registration for Homecoming 2022 which is to be held from 17th August 2022 to 20th August 2022 with the following details:\n\n
   Name: '$name'\n
   Number of Accompaniments: '$accompaniment'\n
   Accommodation: '$gh'\n\n
   The amount that is to be paid is: '$cost'\n\n
   You can transfer the payment through NEFT and submit the receipt in the 'https://docs.google.com/forms/d/e/1FAIpQLSczxbYAkZlOpa0izsJZiwBqyo9rCAY27i5o6UKcRHJgowoWhw/viewform' or you can even email us. The account details for the same are as below:\n\n
   ACCOUNT HOLDER NAME: IIT KGP AAIR EVENTS FUND\n
   BANK: HDFC BANK\n
   ACCOUNT NO: 50100217409918\n
   IFSC: HDFC0001065\n
   MICR: 721240102\n
   SWIFT CODE: HDFCINBBCAL\n\n
   Payment can also be made by sending a cheque or demand draft (DD) in favor of “Homecoming” payable at Kharagpur on the address below:\n\n
   Students’ Alumni Cell\n
   Office of Alumni Affairs and Branding\n     
   Indian Institute of Technology Kharagpur\n   
   Kharagpur-721302\n
   West Bengal (India)\n\n
   Our team is looking forward to seeing you during Homecoming 2022 in August at your alma mater.\n\n
   For further queries, contact:\n
   Abhisha Shrivastava | 8827031589\n\n
   Thanks & Best Regards,\n
   Team Students’ Alumni Cell
   ";
 
   if ( mail($to, $subject, $body, $header)) {
      echo("Success");
      header("Location: ../Utility/get_update.php");
   } else {
      echo("Failed");
   }
?>