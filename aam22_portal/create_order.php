<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;

if (!isset($_SESSION['email'])) {
    header("Location: login_aam.php");
    exit;
}

$email = $_SESSION['email'];

/* Fetch user */
$stmt = $connection->prepare("
    SELECT name, email, mobile, cost 
    FROM AAM WHERE email=?
");
$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    die("User not found");
}

/* Amount in paise */
$amount = (int) round($user['cost'] * 100);

/* Razorpay init */
// $api = new Api("rzp_test_XXXXXXXX", "XXXXXXXXXXXX");
// $api = new Api("rzp_test_RyWze7Pal9awaf", "cLFBBarWVqZ0dBjoPaIbxGqy");
$api = new Api("rzp_live_S3KzqCgIMzDQeX", "3us0N7AxZOiL5VlaK5XXaKDy");

/* Create order */
$order = $api->order->create([
    'amount' => $amount,
    'currency' => 'INR',
    'receipt' => uniqid('AAM_'),
    'payment_capture' => 1
]);

/* Store order in DB */
$stmt = $connection->prepare("
    INSERT INTO transactions
    (user_email, user_name, mobile, transaction_id, razorpay_order_id, payment_status)
    VALUES (?, ?, ?, ?, ?, 'PENDING')
");
$stmt->bind_param(
    "sssss",
    $user['email'],
    $user['name'],
    $user['mobile'],
    $order['receipt'],
    $order['id']
);
$stmt->execute();

/* Store for checkout page */
$_SESSION['rzp_order'] = [
    'order_id' => $order['id'],
    'amount'   => $amount,
    'name'     => $user['name'],
    'email'    => $user['email'],
    'mobile'   => $user['mobile']
];

header("Location: hosted_checkout.php");
exit;
