<?php
session_start();
require 'connection.php';
$DB_NAME = 'acap';
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
@$c_comp = $_POST["company"];
@$pc1 = $_POST["city"];
@$pc2 = $_POST["expertise"];
@$pc3 = $_POST["designation"];
@$year = $_POST["gradyear"];
@$cdc = $_POST["cdc"];
//$captcha_a=$_POST["captcha_a"];




if($name!='' && $phone != "" && $email != "" && $c_comp != "" && $pc1 != "" && $pc2 != "" && $pc3 != "" && $year != "" && $cdc != ""){

	$sql = "INSERT INTO alumni (name,email,phone,current_company,current_designation,current_city,area_expertise,gradyear,cdc)
	VALUES ('$name','$email','$phone','$c_comp','$pc3','$pc1','$pc2','$year','$cdc')";
	echo '2';

	if ($connection->query($sql)) {
		$connection->close();
 // header('Location: ./registration-complete.php');
		exit;
	} else {
		echo "Error: " . $connection->error;
	}

}


  ?>