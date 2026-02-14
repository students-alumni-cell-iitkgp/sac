<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;

/* Collect Form Data */
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$dept = $_POST['dept'];
$hall = $_POST['hall'];
$batch = $_POST['batch'];
$amount = floatval($_POST['amount']);

/* Convert to paise */
$amountPaise = (int) round($amount * 100);

$api = new Api("rzp_live_S3KzqCgIMzDQeX", "3us0N7AxZOiL5VlaK5XXaKDy");
// $api = new Api($keyId, $keySecret);  

/* Create Order */
$order = $api->order->create([
    'amount' => $amountPaise,
    'currency' => 'INR',
    'receipt' => uniqid('Accom_'),
    'payment_capture' => 1
]);
// $orderId = $order['id'];

/* Store in DB */
$stmt = $connection->prepare("
    INSERT INTO accommodation_payments
    (name, email, mobile, dept, hall, batch, amount, transaction_id, razorpay_order_id, payment_status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'PENDING')
");

$stmt->bind_param(
    "sssssddss",
    $name, 
    $email, 
    $mobile,
    $dept,
    $hall,
    $batch, 
    $amount,
    $order['receipt'], 
    $order['id']
);
$stmt->execute();

/* Store Session */
$_SESSION['accom_rzp_order'] = [
    'order_id' => $order['id'],
    'name' => $name,
    'email' => $email,
    'mobile' => $mobile,
    'amount' => $amountPaise,
];

/* Redirect to Checkout Page */
header("Location: accom_checkout.php");
exit;
