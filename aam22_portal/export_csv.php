<?php
// export_aam.php
session_start();
include 'test.php'; // your DB connection

// 1️⃣ Require admin login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// 2️⃣ SQL to select all rows from AAM
$sql = "SELECT * FROM AAM";

// 3️⃣ Execute query
if (!$result = $connection->query($sql)) {
    http_response_code(500);
    echo "Database error: " . htmlspecialchars($connection->error);
    exit;
}

// 4️⃣ CSV headers
$filename = "AAM_export_" . date('Ymd_His') . ".csv";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// 5️⃣ Open output stream
$output = fopen('php://output', 'w');
fputs($output, "\xEF\xBB\xBF"); // UTF-8 BOM for Excel

// 6️⃣ Write column headers
$fields = $result->fetch_fields();
$headers = [];
foreach ($fields as $f) {
    $headers[] = $f->name;
}
fputcsv($output, $headers);

// 7️⃣ Write all rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, array_values($row));
}

// 8️⃣ Close and finish
fclose($output);
$connection->close();
exit;