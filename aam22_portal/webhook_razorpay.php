<?php
// webhook_razorpay.php

require __DIR__ . '/vendor/autoload.php';
include 'test.php';


use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

/* ---------- CONFIG ---------- */
$webhookSecret = "S@C_WebHook_Razorpay_AAM22"; // SAME as dashboard


$payload = file_get_contents("php://input");
$signature = $_SERVER['HTTP_X_RAZORPAY_SIGNATURE'] ?? '';

try {
    Api::verifyWebhookSignature($payload, $signature, $webhookSecret);
} catch (SignatureVerificationError $e) {
    http_response_code(400);
    exit("Invalid signature");
}

$data = json_decode($payload, true);
$event = $data['event'] ?? '';

if ($event === 'payment.captured') {

    $payment = $data['payload']['payment']['entity'];

    $orderId   = $payment['order_id'];
    $paymentId = $payment['id'];
    $email     = $payment['notes']['email'] ?? null;

    // Update transactions table
    $stmt = $connection->prepare("
        UPDATE transactions
        SET razorpay_payment_id = ?, payment_status = 'PAID(Verified)'
        WHERE razorpay_order_id = ?
    ");
    $stmt->bind_param("ss", $paymentId, $orderId);
    $stmt->execute();

    // Update AAM table
    if ($email) {
        $stmt = $connection->prepare("
            UPDATE AAM
            SET payment = 'PAID(Verified)'
            WHERE email = ?
        ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    }
}

http_response_code(200);
echo "OK";