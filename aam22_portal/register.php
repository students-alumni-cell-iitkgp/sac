<?php
// register.php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();

// DB connection
include 'test.php'; //db connection on my pc
// include 'config.php';

// Redirect if accessed directly
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.php');
    exit;
}

// Normalize date helper
function normalize_date_for_mysql($raw) {
    $raw = trim((string)$raw);
    if ($raw === '') return null;
    $d = DateTime::createFromFormat('Y-m-d', $raw);
    if ($d && $d->format('Y-m-d') === $raw) return $d->format('Y-m-d');
    $d = DateTime::createFromFormat('d-m-Y', $raw);
    if ($d) return $d->format('Y-m-d');
    $d = date_create($raw);
    if ($d) return $d->format('Y-m-d');
    return '1900-01-01';
}

// Collect POST data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$dob_mysql = normalize_date_for_mysql($_POST['dob'] ?? '');
$social_links = trim($_POST['social_links'] ?? '');

$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$state = trim($_POST['state'] ?? '');
$country = trim($_POST['country'] ?? '');
$zipcode = trim($_POST['zipcode'] ?? '');
$accompaniment = intval($_POST['accompaniment'] ?? 0);
$acc_kid = intval($_POST['acc_kid'] ?? 0);
$foodPreference = trim($_POST['foodPreference'] ?? '');
$cost = floatval($_POST['cost'] ?? 0);
$profession = trim($_POST['profession'] ?? '');
$organisation = trim($_POST['organisation'] ?? '');
$designation = trim($_POST['designation'] ?? '');

$waddress = trim($_POST['waddress'] ?? '');
$wcity = trim($_POST['wcity'] ?? '');
$wstate = trim($_POST['wstate'] ?? '');
$wcountry = trim($_POST['wcountry'] ?? '');
$wzipcode = trim($_POST['wzipcode'] ?? '');

$rollno = trim($_POST['rollno'] ?? '');
$degree = trim($_POST['degree'] ?? '');
$dept = trim($_POST['dept'] ?? '');
$hall = trim($_POST['hall'] ?? '');
$yoj = intval($_POST['yoj'] ?? 0);
$yog = intval($_POST['yog'] ?? 0);

$dateOfArr = normalize_date_for_mysql($_POST['dateOfArr'] ?? '');
$dateOfDep = normalize_date_for_mysql($_POST['dateOfDep'] ?? '');
$timeOfArr = trim($_POST['timeOfArr'] ?? '');
$timeOfDep = trim($_POST['timeOfDep'] ?? '');

// Check duplicate email
$checkStmt = $connection->prepare("SELECT id FROM AAM WHERE email=? LIMIT 1");
$checkStmt->bind_param('s', $email);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    echo "<script>alert('Email already registered!'); window.history.back();</script>";
    exit;
}
$checkStmt->close();

// Collect accompanying persons
$acc_details = [];
for ($i = 1; $i <= $accompaniment; $i++) {
    $p_name = trim($_POST["acc_person_$i"] ?? '');
    $p_relation = trim($_POST["acc_relation_$i"] ?? '');
    if ($p_name) $acc_details[] = ['name'=>$p_name,'relation'=>$p_relation];
}
$acc_details_json = json_encode($acc_details, JSON_UNESCAPED_UNICODE);
$social_links_json = json_encode($social_links, JSON_UNESCAPED_UNICODE);

$social_links = trim($_POST['social_links'] ?? '');
if (empty($social_links)) $social_links = 'N/A';

// Prepare insert - match columns in DB exactly
$insert_sql = "INSERT INTO AAM (
    name, email, mobile, dob, address, city, state, country, zipcode,
    accompaniment, acc_kid, acc_details, foodPreference, cost, profession, organisation, designation,
    waddress, wcity, wstate, wcountry, wzipcode, rollno, degree, dept, hall, yoj, yog,
    dateOfArr, dateOfDep, timeOfArr, timeOfDep, social_links
) VALUES (" . implode(',', array_fill(0, 33, '?')) . ")";

$stmt = $connection->prepare($insert_sql);
if (!$stmt) {
    die("Prepare failed: " . $connection->error);
}

// Bind types: s = string, i = integer, d = double
$types = 'sssssssssii' . 'ssd' . 'ssssssssssss' . 'ii' . 'sssss';

// Prepare bind params in order
$bind_params = [
    $name, $email, $mobile, $dob_mysql, $address, $city, $state, $country, $zipcode,
    $accompaniment, $acc_kid, $acc_details_json,
    $foodPreference, $cost, $profession, $organisation, $designation,
    $waddress, $wcity, $wstate, $wcountry, $wzipcode, $rollno, $degree, $dept, $hall, $yoj, $yog,
$dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $social_links_json,
];

// mysqli::bind_param requires references
$refs = [];
foreach ($bind_params as $key => $value) {
    $refs[$key] = &$bind_params[$key];
}

// Bind all params
array_unshift($refs, $types);
call_user_func_array([$stmt, 'bind_param'], $refs);




// Execute
if ($stmt->execute()) {

    $_SESSION['email'] = $email;


    $mail = new PHPMailer(true);
try {
    $mail = new PHPMailer(true);

    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'n.patidar.2512@gmail.com'; // your email
    $mail->Password   = 'xblyfjidragnvvlm';    // app password, not Gmail login
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Recipient
    $mail->setFrom('n.patidar.2512@gmail.com', 'Annual Alumni Meet');
    $mail->addAddress($email, $name); // user's email and name

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Registration Successful | Annual Alumni Meet 2026';
    $mail->Body    = "Hi <b>$name</b>,<br>Your registration is successful for 22nd Annual Alumni Meet 2026. The Office of Alumni Affair, IIT Kharagpur will soon contact you about the futhure process.<br><br>Thank you for registering!<br> <br>Students' Alumni Cell, IIT Kharagpur";
    $mail->AltBody = "Hi $name, Your registration is successful. Thank you!";

    $mail->send();
    // Optional: You can set a flag for "mail sent successfully" if needed
} catch (Exception $e) {
    // Optional: log error
    // error_log("Mailer Error: " . $mail->ErrorInfo);
    echo "Mailer Error: {$mail->ErrorInfo}";
}

    $stmt->close();
    $connection->close();
    header("Location: confirmation.php");
    exit;
} else {
    echo "Database error: " . $stmt->error;
    $stmt->close();
    $connection->close();
    exit;
}


//     $_SESSION['email'] = $email;
//     exec("node nodemailer.js " . escapeshellarg($email) . " " . escapeshellarg($name));
//     $stmt->close();
//     $connection->close();
//     header("Location: confirmation.php");
//     exit;
// } else {
//     die("Database error: " . $stmt->error);
// }