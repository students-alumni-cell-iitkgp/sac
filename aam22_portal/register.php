<?php
// register.php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


// DB connection
// include 'test.php'; //db connection on my pc
// include 'config.php';

// Redirect if accessed directly
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.php');
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// limit: max 5 submissions per IP per hour
$limit = 15;

// check how many times this IP has submitted in the last hour
$sql = "SELECT COUNT(*) FROM submission_log WHERE ip = ? AND created_at >= (NOW() - INTERVAL 1 HOUR)";
$stmt = $connection->prepare($sql);
$stmt->bind_param('s', $ip);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count >= $limit) {
    // Too many attempts
    http_response_code(429);
    echo "Too many submissions. Please try later.";
    exit;
}

// insert IP and email into submission_log
$ins = $connection->prepare("INSERT INTO submission_log (ip, email) VALUES (?, ?)");
$ins->bind_param('ss', $ip, $email);
$ins->execute();
$ins->close();



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
$idtype = trim($_POST['idtype'] ?? '');
$idnumber = trim($_POST['idnumber'] ?? '');
$social_links = trim($_POST['social_links'] ?? '');

$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$state = trim($_POST['state'] ?? '');
$country = trim($_POST['country'] ?? '');
$zipcode = trim($_POST['zipcode'] ?? '');


$accRelation = trim($_POST['acc_relation'] ?? '');
$accName = trim($_POST['acc_name'] ?? '');

$positionHolding = trim($_POST['positionHolding'] ?? '');
$course = trim($_POST['course'] ?? '');
$degree = trim($_POST['degree'] ?? '');
$dept = trim($_POST['dept'] ?? '');
$hall = trim($_POST['hall'] ?? '');
$yoj = intval($_POST['yoj'] ?? 0);
$yog = intval($_POST['yog'] ?? 0);


$foodPreference = trim($_POST['foodPreference'] ?? '');
$medical = trim($_POST['medical'] ?? '');
$cost = floatval($_POST['acp'] ?? 0);
$profession = trim($_POST['profession'] ?? '');
$organisation = trim($_POST['organisation'] ?? '');
$designation = trim($_POST['designation'] ?? '');

$waddress = trim($_POST['waddress'] ?? '');
$wcity = trim($_POST['wcity'] ?? '');
$wstate = trim($_POST['wstate'] ?? '');
$wcountry = trim($_POST['wcountry'] ?? '');
$wzipcode = trim($_POST['wzipcode'] ?? '');



$dateOfArr = normalize_date_for_mysql($_POST['dateOfArr'] ?? '');
$dateOfDep = normalize_date_for_mysql($_POST['dateOfDep'] ?? '');
$timeOfArr = trim($_POST['timeOfArr'] ?? '');
$timeOfDep = trim($_POST['timeOfDep'] ?? '');
$arrivalMode = trim($_POST['arrivalMode'] ?? '');


if ($cost == 0.00 || $cost == "0.00" || $cost == 0) {
    $cost = 15000.00;
}

// Check duplicate email
$checkStmt = $connection->prepare("SELECT id FROM AAM WHERE email=? LIMIT 1");
$checkStmt->bind_param('s', $email);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    echo "<script>alert('Email already registered!'); window.history.back();</script>";
    exit;
}

$checkStmt = $connection->prepare("SELECT id FROM AAM WHERE mobile=? LIMIT 1");
$checkStmt->bind_param('s', $mobile);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    echo "<script>alert('Mobile number already registered!'); window.history.back();</script>";
    exit;
}
$checkStmt->close();

// Encode JSON
$social_links_json = json_encode($social_links, JSON_UNESCAPED_UNICODE);

$social_links = trim($_POST['social_links'] ?? '');
if (empty($social_links)) $social_links = 'N/A';

// Prepare insert - match columns in DB exactly
$insert_sql = "INSERT INTO AAM (
    name, email, mobile, dob, idtype, idnumber, address, city, state, country, zipcode, acc_relation, acc_name, foodPreference, medical, cost, profession, organisation, designation,
    waddress, wcity, wstate, wcountry, wzipcode, positionHolding, course, degree, dept, hall, yoj, yog,
    dateOfArr, dateOfDep, timeOfArr, timeOfDep, arrivalMode, social_links
) VALUES (" . implode(',', array_fill(0, 37, '?')) . ")";

$stmt = $connection->prepare($insert_sql);
if (!$stmt) {
    die("Prepare failed: " . $connection->error);
}

// Bind types: s = string, i = integer, d = double
$types = str_repeat('s', 11)   // name to zipcode
       . str_repeat('s', 2)     // acc_relation, acc_name
       . str_repeat('s', 2)      // foodPreference
       . 'd'                     // cost
       . str_repeat('s', 3)     // profession, organisation, designation
       . str_repeat('s', 5)     // waddress to wzipcode
       . str_repeat('s', 5)     // positionHolding, course, degree, dept, hall
       . 'ii'                   // yoj, yog
       . str_repeat('s', 5)     // dateOfArr, dateOfDep, timeOfArr, timeOfDep
       . 's';                   // social_links

// Prepare bind params in order
$bind_params = [
    $name, $email, $mobile, $dob_mysql, $idtype, $idnumber, $address, $city, $state, $country, $zipcode,
    $accRelation, $accName,
    $foodPreference, $medical, $cost, $profession, $organisation, $designation,
    $waddress, $wcity, $wstate, $wcountry, $wzipcode, $positionHolding, $course, $degree, $dept, $hall, $yoj, $yog,
$dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $arrivalMode, $social_links_json,
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