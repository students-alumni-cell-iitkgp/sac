<?php
session_start();
require 'connection.php';
$DB_NAME = 'sac_acap';
$connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($connection->connect_error) {
  // die("Connecton failed: ".$connection->connect_error);
  die("It seems that we cannot talk to our DB right now. Please try again in a couple of minutes");
} else {
//  echo "Connection Successful<br>";
}
@$name = $_POST["name"];
@$phone = $_POST["phoneno"];
@$email = $_POST["email"];
@$roll = $_POST["company"];
$pc1 = $_POST["city"];
$pc2 = $_POST["expertise"];
$pc3 = $_POST["designation"];
$year = $_POST["gradyear"];
$captcha_a=$_POST["captcha_a"];


if($_SESSION['captcha_code1'] == $captcha_a)
{

if($name!='' && $phone != "" && $email != "" && $roll != ""&& $pc1 != ""&& $pc2 != "" && $pc3 != ""){

$sql = "INSERT INTO alumni (name,email,phone,current_company,current_designation,current_city,area_expertise,gradyear)
        VALUES ('$name','$roll','$phone','$email','$pc1','$pc2','$pc3','$year')";
echo '2';

if ($connection->query($sql)) {
  $connection->close();
 // header('Location: ./registration-complete.php');
  exit;
} else {
  echo "Error: " . $connection->error;
}

}

else {
  echo '1';//returning 1 if incomplete data

}
}
else
{
  echo '0';//returning  0 to server if wrong captcha
}
?>