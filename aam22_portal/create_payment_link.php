<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;

$email = $_SESSION['email'];

$stmt = $connection->prepare("
    SELECT name, email, mobile, cost 
    FROM AAM WHERE email=?
");
$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$amount = (int)($user['cost'] * 100);

$api = new Api(
    "rzp_test_RyWze7Pal9awaf",
    "cLFBBarWVqZ0dBjoPaIbxGqy"
);

/* CREATE PAYMENT LINK (HOSTED CHECKOUT) */
$link = $api->paymentLink->create([
    'amount' => $amount,
    'currency' => 'INR',
    'description' => 'AAM Registration Fee',
    'customer' => [
        'name' => $user['name'],
        'email' => $user['email'],
        'contact' => $user['mobile']
    ],
    'notify' => [
        'email' => true,
        'sms' => true
    ],
    'callback_url' => 'https://localhost/sac/aam22_portal/payment_response.php',
    'callback_method' => 'get'
]);

/* STORE TRANSACTION */
$stmt = $connection->prepare("
    INSERT INTO transactions
    (user_email, user_name, mobile, transaction_id, payment_status)
    VALUES (?, ?, ?, ?, 'PENDING')
");
$stmt->bind_param(
    "ssss",
    $user['email'],
    $user['name'],
    $user['mobile'],
    $link['id']
);
$stmt->execute();

/* REDIRECT TO HOSTED CHECKOUT */
header("Location: " . $link['short_url']);
exit;