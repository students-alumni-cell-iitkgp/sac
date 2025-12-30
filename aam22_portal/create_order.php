<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;

/* ---------- AUTH CHECK ---------- */
if (!isset($_SESSION['email'])) {
    header("Location: login_aam.php");
    exit;
}

$email = $_SESSION['email'];

/* ---------- FETCH USER DATA ---------- */
$stmt = $connection->prepare("
    SELECT name, mobile, payment, cost
    FROM AAM
    WHERE email = ?
");
$stmt->bind_param("s", $email);
$stmt->execute();
$userRow = $stmt->get_result()->fetch_assoc();

if (!$userRow) {
    die("User not found.");
}

/* ---------- PAYMENT STATUS CHECK ---------- */
if ($userRow['payment'] !== 'PENDING') {
    header("Location: profile_aam.php");
    exit;
}

/* ---------- AMOUNT CALCULATION ---------- */
$cost   = (float) $userRow['cost'];
$amount = (int) round($cost * 100); // INR → paise

if ($amount <= 0) {
    die("Invalid payment amount.");
}

/* ---------- REQUIRED USER FIELDS ---------- */
$userName = trim($userRow['name']);
$mobile   = trim($userRow['mobile']);

if ($mobile === '') {
    die("Mobile number missing. Please update your profile.");
}

/* ---------- GENERATE TRANSACTION ID ---------- */
$transactionId = 'AAM_' . time() . '_' . rand(1000, 9999);

/* ---------- RAZORPAY INIT ---------- */
$api = new Api(
    "rzp_test_RvN91s2LLwyZUS",   // Test Key ID
    "TJ219TzHpNknErC6UzPM72Hv"   // Test Key Secret
);

/* ---------- CREATE RAZORPAY ORDER ---------- */
$order = $api->order->create([
    'amount' => $amount,
    'currency' => 'INR',
    'receipt' => $transactionId,
    'payment_capture' => 1
]);

/* ---------- SAVE TRANSACTION ---------- */
$stmt = $connection->prepare("
    INSERT INTO transactions
        (user_email, user_name, mobile, transaction_id, razorpay_order_id, payment_status)
    VALUES (?, ?, ?, ?, ?, 'PENDING')
");
$stmt->bind_param(
    "sssss",
    $email,
    $userName,
    $mobile,
    $transactionId,
    $order['id']
);
$stmt->execute();

/* ---------- STORE SESSION ---------- */
$_SESSION['rzp_order_id'] = $order['id'];
$_SESSION['rzp_amount']  = $amount;
$_SESSION['txn_id']      = $transactionId;

/* ---------- REDIRECT ---------- */
header("Location: pay.php");
exit;
