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
@$roll = $_POST["roll"];
$pc1 = $_POST["PC1"];
$pc2 = $_POST["PC2"];
$pc3 = $_POST["PC3"];
$pc4=$_POST["PC4"];
//$captcha_s=$_POST["captcha_s"];

//if($_SESSION['captcha_code'] == $captcha_s){


	if($name!='' && $phone != "" && $email != "" && $roll != ""&& $pc1 != ""&& $pc2 != "" && $pc3 != ""){

			$sql = "INSERT INTO students (name,roll,phone,email,pref1,pref2,pref3,prefcompany)
					VALUES ('$name','$roll','$phone','$email','$pc1','$pc2','$pc3','$pc3')";
			echo '2';//returning 2 to server if data is added

			if ($connection->query($sql)) {
				$connection->close();
			 // header('Location: ./registration-complete.php');
				exit;
			} else {
				echo "Error: " . $connection->error;
			}

		}

	else {
		echo '0';//returning 1 to server if data is incomplete

	}
//}
/*else
{
  echo '0';//returning 0 to server if captcha is wrong
}*/
?>