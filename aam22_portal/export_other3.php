<?php
// export_tables.php
session_start();
include 'test.php'; // your DB connection

// 1️⃣ Require admin login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// 2️⃣ Whitelisted tables
$allowedTables = ['login_log', 'submission_log', 'transactions'];

// 3️⃣ Get table from GET parameter
$table = isset($_GET['table']) ? preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['table']) : '';

if (!in_array($table, $allowedTables)) {
    http_response_code(400);
    echo "Invalid table selected. Allowed tables: " . implode(', ', $allowedTables);
    exit;
}

// 4️⃣ SQL query to select all rows
$sql = "SELECT * FROM `$table`";
if (!$result = $connection->query($sql)) {
    http_response_code(500);
    echo "Database error: " . htmlspecialchars($connection->error);
    exit;
}

// 5️⃣ Send CSV headers
$filename = $table . "_export_" . date('Ymd_His') . ".csv";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// 6️⃣ Open output stream
$output = fopen('php://output', 'w');
fputs($output, "\xEF\xBB\xBF"); // UTF-8 BOM for Excel

// 7️⃣ Write column headers
$fields = $result->fetch_fields();
$headers = [];
foreach ($fields as $f) {
    $headers[] = $f->name;
}
fputcsv($output, $headers);

// 8️⃣ Write all rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, array_values($row));
}

// 9️⃣ Optional: log which admin exported which table
$admin_email = $_SESSION['admin_email'] ?? 'unknown';
$ip = $_SERVER['REMOTE_ADDR'];
$logSql = $connection->prepare("INSERT INTO export_log (admin_email, table_name, ip) VALUES (?, ?, ?)");
$logSql->bind_param('sss', $admin_email, $table, $ip);
$logSql->execute();
$logSql->close();

// 10️⃣ Close and exit
fclose($output);
$connection->close();
exit;