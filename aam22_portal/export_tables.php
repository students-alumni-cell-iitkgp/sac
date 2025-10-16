<?php
session_start();
include 'test.php'; // your DB connection

// Require admin login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

$tables = ['login_log', 'submission_log', 'transactions'];

// Create a temporary directory for CSV files
$tmpDir = sys_get_temp_dir() . '/csv_export_' . time();
mkdir($tmpDir);

// Generate CSV for each table
foreach ($tables as $table) {
    $result = $connection->query("SELECT * FROM `$table`");
    if (!$result) continue;

    $filename = "$tmpDir/{$table}.csv";
    $fp = fopen($filename, 'w');
    fputs($fp, "\xEF\xBB\xBF"); // UTF-8 BOM

    // Column headers
    $fields = $result->fetch_fields();
    $headers = [];
    foreach ($fields as $f) $headers[] = $f->name;
    fputcsv($fp, $headers);

    // Rows
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, array_values($row));
    }
    fclose($fp);
}

// Create ZIP archive
$zipname = "all_tables_export_" . date('Ymd_His') . ".zip";
$zip = new ZipArchive();
$zipPath = sys_get_temp_dir() . '/' . $zipname;

if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
    foreach ($tables as $table) {
        $zip->addFile("$tmpDir/{$table}.csv", "{$table}.csv");
    }
    $zip->close();
} else {
    die("Could not create ZIP file.");
}

// Download ZIP
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $zipname . '"');
readfile($zipPath);

// Cleanup temp files
foreach ($tables as $table) {
    @unlink("$tmpDir/{$table}.csv");
}
@rmdir($tmpDir);
@unlink($zipPath);

$connection->close();
exit;