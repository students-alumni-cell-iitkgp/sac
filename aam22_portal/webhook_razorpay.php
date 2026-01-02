<?php
// webhook_razorpay.php

require __DIR__ . '/vendor/autoload.php';
include 'test.php';


use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

/* ---------- CONFIG ---------- */
$WEBHOOK_SECRET = "S@C_WebHook_Razorpay_AAM22"; // SAME as dashboard

/* ---------- READ PAYLOAD ---------- */
$payload   = file_get_contents('php://input');
$headers   = getallheaders();
$signature = $headers['X-Razorpay-Signature'] ?? '';

/* ---------- VERIFY SIGNATURE ---------- */
try {
    Api::verifyWebhookSignature($payload, $signature, $WEBHOOK_SECRET);
} catch (SignatureVerificationError $e) {
    http_response_code(400);
    exit('Invalid signature');
}

/* ---------- PARSE EVENT ---------- */
$data  = json_decode($payload, true);
$event = $data['event'] ?? '';

/* ---------- PAYMENT CAPTURED ---------- */
if ($event === 'payment.captured') {

    $payment   = $data['payload']['payment']['entity'];
    $paymentId = $payment['id'];
    $orderId   = $payment['order_id'];

    /* Update transactions (idempotent) */
    $stmt = $connection->prepare("
        UPDATE transactions
        SET razorpay_payment_id = ?, payment_status = 'PAID(Verified)'
        WHERE razorpay_order_id = ?
        AND payment_status != 'PAID(Verified)'
    ");
    $stmt->bind_param("ss", $paymentId, $orderId);
    $stmt->execute();

    /* Update AAM table via JOIN */
    $stmt = $connection->prepare("
        UPDATE AAM a
        INNER JOIN transactions t ON t.user_email = a.email
        SET a.payment = 'PAID(Verified)'
        WHERE t.razorpay_order_id = ?
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
}

/* ---------- PAYMENT FAILED ---------- */
if ($event === 'payment.failed') {

    $payment = $data['payload']['payment']['entity'];
    $orderId = $payment['order_id'];

    $stmt = $connection->prepare("
        UPDATE transactions
        SET payment_status = 'PENDING'
        WHERE razorpay_order_id = ?
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
}

http_response_code(200);
echo 'OK';