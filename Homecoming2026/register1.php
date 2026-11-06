<?php
// register.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// DB connection
include 'config.php'; 

// Redirect if accessed directly
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.php');
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'];
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);

// limit: max 15 submissions per IP per hour
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

// Newly added fields collected as text strings for full flexibility
$nearest_alumni_chapter = trim($_POST['nearest_alumni_chapter'] ?? '');
$chapter_name_interested_associating_with = trim($_POST['chapter_name_interested_associating_with'] ?? '');
$contribute = trim($_POST['contribute'] ?? '');
$mode_description = trim($_POST['mode_description'] ?? '');

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
    $cost = 12000.00;
}

// Check duplicate email
$checkStmt = $connection->prepare("SELECT id FROM aam WHERE email=? LIMIT 1");
$checkStmt->bind_param('s', $email);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    echo "<script>alert('Email already registered!'); window.history.back();</script>";
    exit;
}
$checkStmt->close();

// Check duplicate mobile
$checkStmt = $connection->prepare("SELECT id FROM aam WHERE mobile=? LIMIT 1");
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
if (empty($social_links)) $social_links_json = json_encode('N/A');

// Prepare insert - 41 total columns
$insert_sql = "INSERT INTO aam (
    name, email, mobile, dob, idtype, idnumber, address, city, state, country, zipcode, 
    acc_relation, acc_name, foodPreference, medical, cost, profession, organisation, designation,
    waddress, wcity, wstate, wcountry, wzipcode, positionHolding, course, degree, dept, hall, yoj, yog,
    nearest_alumni_chapter, chapter_name_interested_associating_with, contribute, mode_description,
    dateOfArr, dateOfDep, timeOfArr, timeOfDep, arrivalMode, social_links
) VALUES (" . implode(',', array_fill(0, 41, '?')) . ")";

$stmt = $connection->prepare($insert_sql);
if (!$stmt) {
    die("Prepare failed: " . $connection->error);
}

// Bind types: 41 parameters in total
$types = str_repeat('s', 11)   // name to zipcode (11)
       . str_repeat('s', 2)    // acc_relation, acc_name (2)
       . str_repeat('s', 2)    // foodPreference, medical (2)
       . 'd'                   // cost (1)
       . str_repeat('s', 3)    // profession, organisation, designation (3)
       . str_repeat('s', 5)    // waddress to wzipcode (5)
       . str_repeat('s', 5)    // positionHolding, course, degree, dept, hall (5)
       . 'ii'                  // yoj, yog (2)
       . str_repeat('s', 4)    // nearest_alumni_chapter, chapter_name_interested_associating_with, contribute, mode_description (4)
       . str_repeat('s', 5)    // dateOfArr, dateOfDep, timeOfArr, timeOfDep, arrivalMode (5)
       . 's';                  // social_links (1)

// Prepare bind params in exact order matching SQL query
$bind_params = [
    $name, $email, $mobile, $dob_mysql, $idtype, $idnumber, $address, $city, $state, $country, $zipcode,
    $accRelation, $accName,
    $foodPreference, $medical, $cost, $profession, $organisation, $designation,
    $waddress, $wcity, $wstate, $wcountry, $wzipcode, 
    $positionHolding, $course, $degree, $dept, $hall, $yoj, $yog,
    $nearest_alumni_chapter, $chapter_name_interested_associating_with, $contribute, $mode_description,
    $dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $arrivalMode, $social_links_json
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