<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// session_start();

// $email = $_POST["email"];
// $password = $_POST["password"];
// $password = hash('sha256', $password);
// $name = $_POST["Name"];
// $address = $_POST["address"];
// $city = $_POST["city"];
// $state = $_POST["state"];
// $country = $_POST["country"];
// $zipCode = $_POST["zipCode"];
// $mobile = $_POST["mobile"];
// $dob = $_POST["dob"];
// $marital = $_POST["marital"];
// $industry = $_POST["industry"];
// $profession = $_POST["profession"];
// $orgName = $_POST["orgName"];
// $designation = $_POST["designation"];
// $work_city = $_POST["work_city"];
// $work_state = $_POST["work_state"];
// $work_country = $_POST["work_country"];
// $work_zipCode = $_POST["work_zipCode"];
// $work_address = $_POST["work_address"];
// $rollNum = $_POST["rollNum"];
// $joinYear = $_POST["joinYear"];
// $degree = $_POST["degree"];
// $department = $_POST["department"];
// $hall = $_POST["hall"];
// $graduatingYear = $_POST["graduatingYear"];
// $accompanyingNo = $_POST["accompanyingNo"];
// $hobbies=$_POST["hobbies"];
// $involvements=$_POST["involvements"];
// date_default_timezone_set('Asia/Kolkata');
// $time=date("Y-m-d H:i:s"); 
// /*
// echo "$email : email<br>";
// echo "$password : password<br>";
// echo "$name : name<br>";
// echo "$address : address<br>";
// echo "$city : city<br>";
// echo "$state : state<br>";
// echo "$country : country<br>";
// echo "$zipCode : zipCode<br>";
// echo "$mobile : mobile<br>";
// echo "$dob : dob<br>";
// echo "$marital : marital<br>";
// echo "$industry : industry<br>";
// echo "$profession : profession<br>";
// echo "$orgName : orgName<br>";
// echo "$designation : designation<br>";
// echo "$work_city : work_city<br>";
// echo "$work_state : work_state<br>";
// echo "$work_country : work_country<br>";
// echo "$work_zipCode : work_zipCode<br>";
// echo "$work_address : work_address<br>";
// echo "$rollNum : rollNum<br>";
// echo "$joinYear : joinYear<br>";
// echo "$degree : degree<br>";
// echo "$department : department<br>";
// echo "$hall : hall<br>";
// echo "$graduatingYear : graduatingYear<br>";
// */


// include 'connection.php';
// $sql = "INSERT INTO users (email,Time, Name, password, address, city, state, country, zipCode, mobile, dob, marital, industry, profession, orgName, designation, work_city, work_state, work_country, work_zipCode, work_address, rollNum, joinYear, degree, department, hall, graduatingYear, accompanyingNo,hobbies,involvements)
//         VALUES ('$email','$time', '$name', '$password', '$address', '$city', '$state', '$country', '$zipCode', '$mobile', '$dob', '$marital', '$industry', '$profession', '$orgName', '$designation', '$work_city', '$work_state', '$work_country', '$work_zipCode', '$work_address', '$rollNum', '$joinYear', '$degree', '$department', '$hall', '$graduatingYear', '$accompanyingNo','$hobbies', '$involvements')";
// $_SESSION["email"] = $email;
// if ($connection->query($sql)) {
//   $connection->close();
//  echo '1';
//   exit;
// } else {
//   echo "Error: " . $connection->error;
// }



include 'connection.php';


$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$dob = $_POST['dob'] ?? null;
if ($dob) {
    $dobObj = DateTime::createFromFormat('d-m-Y', $dob);
    $dob_mysql = $dobObj ? $dobObj->format('Y-m-d') : '1900-01-01';
} else {
    $dob_mysql = '1900-01-01';
}



$address = $_POST['address'] ?? '';
$city = $_POST['city'] ?? '';
$state = $_POST['state'] ?? '';
$country = $_POST['country'] ?? '';
$zipcode = $_POST['zipcode'] ?? '';
$accompaniment = $_POST['accompaniment'] ?? 0;
$acc_kid = $_POST['acc_kid'] ?? 0;
$cost = $_POST['cost'] ?? '';
$industry = $_POST['industry'] ?? '';
$profession = $_POST['profession'] ?? '';
$organisation = $_POST['organisation'] ?? '';
$designation = $_POST['designation'] ?? '';
$waddress = $_POST['waddress'] ?? '';
$wcity = $_POST['wcity'] ?? '';
$wstate = $_POST['wstate'] ?? '';
$wcountry = $_POST['wcountry'] ?? '';
$wzipcode = $_POST['wzipcode'] ?? '';
$rollno = $_POST['rollno'] ?? '';
$degree = $_POST['degree'] ?? '';
$dept = $_POST['dept'] ?? '';
$hall = $_POST['hall'] ?? '';
$yoj = $_POST['yoj'] ?? 0;
$yog = $_POST['yog'] ?? 0;

// $dob_sql = is_null($dob) ? "NULL" : "'$dob'";


$sql = "INSERT INTO AAM (
    name, email, mobile, dob, address, city, state, country, zipcode,
    accompaniment, acc_kid, cost, industry, profession, organisation, designation,
    waddress, wcity, wstate, wcountry, wzipcode, rollno, degree, dept, hall, yoj, yog
) VALUES (
    '$name', '$email', '$mobile', '$dob_mysql', '$address', '$city', '$state', '$country', '$zipcode',
    '$accompaniment', '$acc_kid', '$cost', '$industry', '$profession', '$organisation', '$designation',
    '$waddress', '$wcity', '$wstate', '$wcountry', '$wzipcode', '$rollno', '$degree', '$dept', '$hall', '$yoj', '$yog'
)";


if ($connection->query($sql)) {
    $_SESSION["email"] = $email;
    $connection->close();
    header("Location: confirmation.php"); // redirect to confirmation page
    exit;
} else {
    echo "Error: " . $connection->error;
}



?>
