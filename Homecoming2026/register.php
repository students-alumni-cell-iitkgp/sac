<?php
// register.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


die("Homecoming have been closed");
exit;


// DB connection
include 'config.php'; 

// Redirect if accessed directly
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.php');
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'];
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$mobile       = trim($_POST['mobile'] ?? '');

// Limit: max 15 submissions per IP per hour
$limit = 15;

// Check how many times this IP has submitted in the last hour
$sql = "SELECT COUNT(*) FROM submission_log WHERE ip = ? AND created_at >= (NOW() - INTERVAL 1 HOUR)";
$stmt = $connection->prepare($sql);
$stmt->bind_param('s', $ip);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count >= $limit) {
    http_response_code(429);
    echo "Too many submissions. Please try later.";
    exit;
}

// Insert IP and email into submission_log
$ins = $connection->prepare("INSERT INTO submission_log (ip, email,mobile) VALUES (?, ?, ?)");
$ins->bind_param('sss', $ip, $email,$mobile );
$ins->execute();
$ins->close();

// Helper: Normalize date for MySQL
function normalize_date_for_mysql($raw) {
    $raw = trim((string)$raw);
    if ($raw === '') return null;
    $d = DateTime::createFromFormat('Y-m-d', $raw);
    if ($d && $d->format('Y-m-d') === $raw) return $d->format('Y-m-d');
    $d = DateTime::createFromFormat('d-m-Y', $raw);
    if ($d) return $d->format('Y-m-d');
    $d = date_create($raw);
    if ($d) return $d->format('Y-m-d');
    return null;
}

// Helper: Safe exit with client alert
function validation_fail($msg) {
    $escaped = addslashes($msg);
    echo "<script>alert('{$escaped}'); window.history.back();</script>";
    exit;
}

// ==========================================
// 1. COLLECT & SANITIZE POST DATA
// ==========================================
$phase         = trim($_POST['phase'] ?? '');
$name         = trim($_POST['name'] ?? '');
$email        = trim($_POST['email'] ?? '');
$mobile       = trim($_POST['mobile'] ?? '');
$dob_mysql    = normalize_date_for_mysql($_POST['dob'] ?? '');
$idtype       = trim($_POST['idtype'] ?? '');
$idnumber     = trim($_POST['idnumber'] ?? '');
$social_links = trim($_POST['social_links'] ?? '');

$address      = trim($_POST['address'] ?? '');
$city         = trim($_POST['city'] ?? '');
$state        = trim($_POST['state'] ?? '');
$country      = trim($_POST['country'] ?? '');
$zipcode      = trim($_POST['zipcode'] ?? '');

$profession   = trim($_POST['profession'] ?? '');
$organisation = trim($_POST['organisation'] ?? '');
$designation  = trim($_POST['designation'] ?? '');
$waddress     = trim($_POST['waddress'] ?? '');
$wcity        = trim($_POST['wcity'] ?? '');
$wstate       = trim($_POST['wstate'] ?? '');
$wcountry     = trim($_POST['wcountry'] ?? '');
$wzipcode     = trim($_POST['wzipcode'] ?? '');

$course          = trim($_POST['course'] ?? '');
$degree          = trim($_POST['degree'] ?? '');
$dept            = trim($_POST['dept'] ?? '');
$hall            = trim($_POST['hall'] ?? '');
$positionHolding = trim($_POST['positionHolding'] ?? '');
$contribute      = trim($_POST['contribute'] ?? '');
$yoj             = intval($_POST['yoj'] ?? 0);
$yog             = intval($_POST['yog'] ?? 0);

// Capture Alumni Chapter options properly
$nearest_alumni_chapter = strtolower(trim($_POST['nearest_alumni_chapter'] ?? ''));

if ($nearest_alumni_chapter === 'yes') {
    $chapter_name_interested_associating_with = trim($_POST['chapter_name'] ?? '');
} elseif ($nearest_alumni_chapter === 'no') {
    $chapter_name_interested_associating_with = trim($_POST['associate_interest'] ?? '');
} else {
    $chapter_name_interested_associating_with = '';
}

$accRelation = trim($_POST['acc_relation'] ?? '');
$accName     = trim($_POST['acc_name'] ?? '');

$foodPreference = trim($_POST['foodPreference'] ?? '');
$medical        = trim($_POST['medical'] ?? '');

$arrivalMode      = strtolower(trim($_POST['arrivalMode'] ?? ''));
$mode_description = trim($_POST['mode_description'] ?? '');
$dateOfArr        = normalize_date_for_mysql($_POST['dateOfArr'] ?? '');
$timeOfArr        = trim($_POST['timeOfArr'] ?? '');
$dateOfDep        = normalize_date_for_mysql($_POST['dateOfDep'] ?? '');
$timeOfDep        = trim($_POST['timeOfDep'] ?? '');


// ==========================================
// 1B. PHOTO UPLOAD HANDLING
// ==========================================
$photo_path = null;

if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    validation_fail("Please upload a profile photo.");
}

$photo = $_FILES['photo'];
$maxSize = 1 * 1024 * 1024; // 2 MB
$allowedMime = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
$allowedExt  = ['jpg', 'jpeg', 'png', 'webp'];

if ($photo['size'] > $maxSize) {
    validation_fail("Photo size must be 1 MB or smaller.");
}

// Verify real MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime  = finfo_file($finfo, $photo['tmp_name']);
finfo_close($finfo);

if (!in_array($mime, $allowedMime)) {
    validation_fail("Only JPG, PNG, or WEBP images are allowed.");
}

// Verify extension
$ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
if (!in_array($ext, $allowedExt)) {
    validation_fail("Invalid photo file extension.");
}

// Create upload directory if not exists
$uploadDir = __DIR__ . '/uploads/photos/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Generate a unique, safe filename
$safeName = 'photo_' . date('Ymd_His') . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
$destination = $uploadDir . $safeName;

if (!move_uploaded_file($photo['tmp_name'], $destination)) {
    validation_fail("Failed to save uploaded photo. Please try again.");
}

// Relative path for DB storage
$photo_path = 'uploads/photos/' . $safeName;


// ==========================================
// 2. SERVER-SIDE FIELD VALIDATION
// ==========================================

// Step 1: Personal Details
if ($phase === '') validation_fail("Phase is required.");
if ($name === '') validation_fail("Name is required.");
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) validation_fail("A valid Email address is required.");
if ($mobile === '' || !preg_match('/^[0-9+\-\s]{10,15}$/', $mobile)) validation_fail("A valid Cell Number (10 to 15 digits) is required.");
if (!$dob_mysql) validation_fail("Valid Date of Birth is required.");

$allowed_ids = ['Aadhar Card', 'Passport', 'PAN Card', 'Driving License', 'OCI Card'];
if ($idtype === '' || !in_array($idtype, $allowed_ids)) validation_fail("Please select a valid Identification Type.");
if ($idnumber === '') validation_fail("ID Number is required.");

if ($address === '') validation_fail("Address is required.");
if ($city === '') validation_fail("City is required.");
if ($state === '') validation_fail("State is required.");
if ($country === '') validation_fail("Country is required.");
if ($zipcode === '') validation_fail("Zip code is required.");

// Step 2: Work Details
if ($profession === '') validation_fail("Current Profession / Position is required.");
if ($organisation === '') validation_fail("Organisation Name is required.");

// Step 3: IIT Affiliation
if ($course === '') validation_fail("Academic Course Name is required.");
if ($degree === '') validation_fail("Degree is required.");
if ($dept === '') validation_fail("Department is required.");
if ($hall === '') validation_fail("Hall of Residence is required.");

if ($yoj < 1951 || $yoj > 2035) validation_fail("Please provide a valid Joining Year (1951-2035).");
if ($yog < 1951 || $yog > 2035) validation_fail("Please provide a valid Graduation Year (1951-2035).");
if ($yog < $yoj) validation_fail("Graduation Year cannot be earlier than Joining Year.");

if (!in_array($nearest_alumni_chapter, ['yes', 'no'])) {
    validation_fail("Please indicate whether you are part of your nearest alumni chapter.");
}
if ($nearest_alumni_chapter === 'yes' && $chapter_name_interested_associating_with === '') {
    validation_fail("Please provide your Chapter Name.");
}
if ($nearest_alumni_chapter === 'no' && !in_array(strtolower($chapter_name_interested_associating_with), ['yes', 'no'])) {
    validation_fail("Please specify if you would be interested in associating with an alumni chapter.");
}

// Step 4: Accompanying Relation & Cost Validation
$valid_relations = ['None', 'Spouse', 'Other'];
if ($accRelation === '' || !in_array($accRelation, $valid_relations)) {
    validation_fail("Please select an Accompanying Adult Relation option.");
}

$cost = 12000.00;
if ($accRelation === 'Spouse' || $accRelation === 'Other') {
    if ($accName === '') {
        validation_fail("Please provide the Accompanying Adult Name.");
    }
    $cost = 20000.00;
} else {
    // If attending individually, clear any accidental name entry
    $accName = '';
}

// Step 5: Food Preference
$valid_food = ['VEG', 'NONVEG', 'VEGAN', 'OTHER'];
if ($foodPreference === '' || !in_array($foodPreference, $valid_food)) {
    validation_fail("Please choose a valid Food Preference.");
}

// Step 6: Travel Details
$valid_arrival_modes = ['flight', 'train', 'car', 'cab', 'bus', 'others'];
if ($arrivalMode === '' || !in_array($arrivalMode, $valid_arrival_modes)) {
    validation_fail("Please select your Mode of Arrival.");
}
if ($arrivalMode === 'others' && $mode_description === '') {
    validation_fail("Please provide details for 'Others' mode of arrival.");
}
if (!$dateOfArr) validation_fail("Valid Arrival Date is required.");
if ($timeOfArr === '') validation_fail("Arrival Time is required.");
if (!$dateOfDep) validation_fail("Valid Departure Date is required.");
if ($timeOfDep === '') validation_fail("Departure Time is required.");

if (strtotime($dateOfDep) < strtotime($dateOfArr)) {
    validation_fail("Departure Date cannot be earlier than Arrival Date.");
}


// ==========================================
// 3. DUPLICATE DATABASE CHECKS
// ==========================================
$checkStmt = $connection->prepare("SELECT id FROM aam WHERE email=? LIMIT 1");
$checkStmt->bind_param('s', $email);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    validation_fail("Email is already registered!");
}
$checkStmt->close();

$checkStmt = $connection->prepare("SELECT id FROM aam WHERE mobile=? LIMIT 1");
$checkStmt->bind_param('s', $mobile);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    validation_fail("Mobile number is already registered!");
}
$checkStmt->close();


// ==========================================
// 4. DATABASE INSERTION
// ==========================================
$social_links_json = json_encode($social_links, JSON_UNESCAPED_UNICODE);
if (empty($social_links)) $social_links_json = json_encode('N/A');

$insert_sql = "INSERT INTO aam (
    phase,name, email, mobile, dob, idtype, idnumber, address, city, state, country, zipcode,photo, 
    acc_relation, acc_name, foodPreference, medical, cost, profession, organisation, designation,
    waddress, wcity, wstate, wcountry, wzipcode, positionHolding, course, degree, dept, hall, yoj, yog,
    nearest_alumni_chapter, chapter_name_interested_associating_with, contribute, mode_description,
    dateOfArr, dateOfDep, timeOfArr, timeOfDep, arrivalMode, social_links
) VALUES (" . implode(',', array_fill(0, 43, '?')) . ")";

$stmt = $connection->prepare($insert_sql);
if (!$stmt) {
    die("Prepare failed: " . $connection->error);
}

// Parameter Types: 41 total
$types = str_repeat('s', 13)   // phase to zipcode (11)
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

$bind_params = [
    $phase, $name, $email, $mobile, $dob_mysql, $idtype, $idnumber, $address, $city, $state, $country, $zipcode,$photo_path,
    $accRelation, $accName,
    $foodPreference, $medical, $cost, $profession, $organisation, $designation,
    $waddress, $wcity, $wstate, $wcountry, $wzipcode, 
    $positionHolding, $course, $degree, $dept, $hall, $yoj, $yog,
    $nearest_alumni_chapter, $chapter_name_interested_associating_with, $contribute, $mode_description,
    $dateOfArr, $dateOfDep, $timeOfArr, $timeOfDep, $arrivalMode, $social_links_json
];

// Reference binding for mysqli
$refs = [];
foreach ($bind_params as $key => $value) {
    $refs[$key] = &$bind_params[$key];
}

array_unshift($refs, $types);
call_user_func_array([$stmt, 'bind_param'], $refs);

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