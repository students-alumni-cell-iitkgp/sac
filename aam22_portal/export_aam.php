<?php
// export_csv.php
session_start();

// require DB connection - change path if needed
include 'test.php'; // or include 'config.php' or whichever file sets $connection

// 1) Require admin login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// 2) Choose what to export.
// Change this SQL to export another table or filtered results.
// Example: export all columns from AAM
$sql = "SELECT id, name, email, mobile, dob, address, city, state, country, zipcode, accompaniment, acc_kid, acc_details, foodPreference, cost, profession, organisation, designation, waddress, wcity, wstate, wcountry, wzipcode, rollno, degree, dept, hall, yoj, yog, dateOfArr, dateOfDep, timeOfArr, timeOfDep, social_links, payment
        FROM AAM";

// Optional: allow GET param to export transactions instead
if (!empty($_GET['table']) && $_GET['table'] === 'transactions') {
    $sql = "SELECT id, user_email, user_name, mobile, payment_status, transaction_id, created_at FROM transactions";
    $filename = "transactions_export_" . date('Ymd_His') . ".csv";
} else {
    $filename = "aam_export_" . date('Ymd_His') . ".csv";
}

// 3) Query DB
if (!$result = $connection->query($sql)) {
    http_response_code(500);
    echo "Database error: " . htmlspecialchars($connection->error);
    exit;
}

// 4) Send headers to force download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// 5) Open output stream and write CSV
$output = fopen('php://output', 'w');
if ($output === false) {
    http_response_code(500);
    echo "Unable to open output stream.";
    exit;
}

// 6) Write UTF-8 BOM so Excel detects UTF-8 properly (helpful for Excel users)
fputs($output, "\xEF\xBB\xBF"); // BOM

// 7) Write header row based on result fields
$fields = $result->fetch_fields();
$headers = [];
foreach ($fields as $f) {
    $headers[] = $f->name;
}
fputcsv($output, $headers);

// 8) Stream rows one by one
while ($row = $result->fetch_assoc()) {
    // Optionally convert arrays/JSON columns to readable strings
    // e.g. acc_details (JSON) -> keep as JSON string or parse to readable form
    if (isset($row['acc_details']) && is_string($row['acc_details'])) {
        // ensure it remains a valid string
        // you could json_decode and reformat if you want
        $row['acc_details'] = $row['acc_details'];
    }

    // fputcsv will handle escaping and quoting
    fputcsv($output, array_values($row));
}

// 9) Close and finish
fclose($output);
$connection->close();
exit;