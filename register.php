<?php
// register.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// include your mysqli connection (should set $connection = new mysqli(...))
include 'connection.php'; // ensure this path is correct on server



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // If someone opens register.php directly, redirect back to signup
    header('Location: signup.php');
    exit;
}

// Helper to normalize date inputs: accept Y-m-d (HTML date) or d-m-Y (if user typed)
function normalize_date_for_mysql($raw) {
    $raw = trim((string)$raw);
    if ($raw === '') return null;
    // try Y-m-d first
    $d = DateTime::createFromFormat('Y-m-d', $raw);
    if ($d && $d->format('Y-m-d') === $raw) return $d->format('Y-m-d');
    // try d-m-Y
    $d = DateTime::createFromFormat('d-m-Y', $raw);
    if ($d) return $d->format('Y-m-d');
    // try other parse
    $d = date_create($raw);
    if ($d) return $d->format('Y-m-d');
    // fallback default for dob requirement per your earlier request:
    return '1900-01-01';
}

// get and sanitize POSTs (use null coalescing)
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$dob_raw = $_POST['dob'] ?? '';
$dob_mysql = normalize_date_for_mysql($dob_raw); // will default '1900-01-01' if empty/invalid

$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$state = trim($_POST['state'] ?? '');
$country = trim($_POST['country'] ?? '');
$zipcode = trim($_POST['zipcode'] ?? '');
$accompaniment = intval($_POST['accompaniment'] ?? 0);
$acc_kid = intval($_POST['acc_kid'] ?? 0);
$foodPreference = trim($_POST['foodPreference'] ?? '');
$cost = trim($_POST['cost'] ?? '');
$industry = trim($_POST['industry'] ?? '');
$profession = trim($_POST['profession'] ?? '');
$organisation = trim($_POST['organisation'] ?? '');
$designation = trim($_POST['designation'] ?? '');
$waddress = trim($_POST['waddress'] ?? '');
$wcity = trim($_POST['wcity'] ?? '');
$wstate = trim($_POST['wstate'] ?? '');
$wcountry = trim($_POST['wcountry'] ?? '');
$wzipcode = trim($_POST['wzipcode'] ?? '');
$serial = trim($_POST['serial'] ?? '');
$rollno = trim($_POST['rollno'] ?? '');
$degree = trim($_POST['degree'] ?? '');
$dept = trim($_POST['dept'] ?? '');
$hall = trim($_POST['hall'] ?? '');
$yoj = intval($_POST['yoj'] ?? 0);
$yog = intval($_POST['yog'] ?? 0);

// Travel section
$dateOfArr_raw = $_POST['dateOfArr'] ?? '';
$dateOfDep_raw = $_POST['dateOfDep'] ?? '';
$timeOfArr_raw = $_POST['timeOfArr'] ?? '';
$timeOfDep_raw = $_POST['timeOfDep'] ?? '';
$stayDays = trim($_POST['stayDays'] ?? '');

$dateOfArr = null;
$dateOfDep = null;
$timeOfArr = null;
$timeOfDep = null;

if (!empty($dateOfArr_raw)) {
    $tmp = normalize_date_for_mysql($dateOfArr_raw);
    $dateOfArr = $tmp === null ? null : $tmp;
}
if (!empty($dateOfDep_raw)) {
    $tmp = normalize_date_for_mysql($dateOfDep_raw);
    $dateOfDep = $tmp === null ? null : $tmp;
}

// time inputs should be in HH:MM or HH:MM:SS; accept as-is or null
$timeOfArr = trim($timeOfArr_raw) ?: null;
$timeOfDep = trim($timeOfDep_raw) ?: null;

// Basic validation
if (empty($email)) {
    echo "Email is required.";
    exit;
}

// Check duplicate email using prepared statement
$checkStmt = $connection->prepare("SELECT email FROM AAM WHERE email = ? LIMIT 1");
$checkStmt->bind_param('s', $email);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    echo "Email already registered!";
    $checkStmt->close();
    exit;
}
$checkStmt->close();

// Prepare insert - match columns added in DB
$insert_sql = "INSERT INTO AAM (
    name, email, mobile, dob, address, city, state, country, zipcode,
    accompaniment, acc_kid, foodPreference, cost, industry, profession, organisation, designation,
    waddress, wcity, wstate, wcountry, wzipcode, serial, rollno, degree, dept, hall, yoj, yog,
    dateOfArr, dateOfDep, timeOfArr, timeOfDep, stayDays
) VALUES (" . implode(',', array_fill(0, 34, '?')) . ")";

$stmt = $connection->prepare($insert_sql);
if (!$stmt) {
    echo "Prepare failed: " . $connection->error;
    exit;
}

// type string: 9s, 2i, 16s, 2i, 5s  (total 34)
$types = str_repeat('s',9) . 'ii' . str_repeat('s',16) . 'ii' . str_repeat('s',5);

// Bind params in the same order as the columns above
$bind_params = [
    $name, $email, $mobile, $dob_mysql, $address, $city, $state, $country, $zipcode,
    $accompaniment, $acc_kid,
    $foodPreference, $cost, $industry, $profession, $organisation, $designation,
    $waddress, $wcity, $wstate, $wcountry, $wzipcode, $serial, $rollno, $degree, $dept, $hall, $yoj, $yog,
    $dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $stayDays
];

// mysqli::bind_param requires variables passed by reference
$refs = [];
foreach ($bind_params as $key => $value) {
    $refs[$key] = &$bind_params[$key];
}

// call bind_param dynamically
array_unshift($refs, $types); // prepend types
call_user_func_array([$stmt, 'bind_param'], $refs);

$executed = $stmt->execute();

if ($executed) {
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
