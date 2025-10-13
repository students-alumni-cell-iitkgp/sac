<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include 'test.php'; // or your DB config

// Only allow admin
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// Clear any output before headers
ob_clean();

// Fetch transactions
$query = "SELECT id, user_name, user_email, mobile, payment_status, transaction_id, created_at FROM transactions ORDER BY id DESC";
$result = $connection->query($query);

if (!$result) {
    die("Error fetching transactions: " . $connection->error);
}

// CSV file name
$filename = "transactions_export_" . date('Y-m-d_H-i-s') . ".csv";

// Set headers to force download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);
header('Pragma: no-cache');
header('Expires: 0');

// Open the output stream
$output = fopen('php://output', 'w');

// Add column headers
fputcsv($output, ['ID', 'User Name', 'Email', 'Mobile', 'Payment Status', 'Transaction ID', 'Created At']);

// Add rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

// Close output stream
fclose($output);
$connection->close();

// Stop PHP from sending anything else
exit();
?>