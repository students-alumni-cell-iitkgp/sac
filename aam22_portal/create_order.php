<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;

$email = $_SESSION['email'];

/* Fetch amount */
$stmt = $connection->prepare("SELECT cost FROM AAM WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

$amount = (int)($row['cost'] * 100);

$api = new Api("rzp_test_RyWze7Pal9awaf", "cLFBBarWVqZ0dBjoPaIbxGqy");

$order = $api->order->create([
    'amount' => $amount,
    'currency' => 'INR',
    'payment_capture' => 1
]);

$_SESSION['rzp_order_id'] = $order['id'];
$_SESSION['rzp_amount']  = $amount;

/* REDIRECT TO HOSTED CHECKOUT */
header("Location: https://api.razorpay.com/v1/checkout/embedded?order_id=" . $order['id']);
exit;