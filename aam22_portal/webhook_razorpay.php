<?php
// webhook_razorpay.php

require __DIR__ . '/vendor/autoload.php';
include 'test.php';


use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

/* ---------- CONFIG ---------- */
$WEBHOOK_SECRET = "S@C_Razorpay@Webhook@2025"; // SAME as dashboard


/* ---------- READ PAYLOAD ---------- */
$payload = file_get_contents('php://input');
$headers = getallheaders();

$razorpaySignature = $headers['X-Razorpay-Signature'] ?? '';

/* ---------- VERIFY SIGNATURE ---------- */
try {
    $api = new Api('dummy', 'dummy'); // keys not needed for verification

    $api->utility->verifyWebhookSignature(
        $payload,
        $razorpaySignature,
        $WEBHOOK_SECRET
    );
} catch (SignatureVerificationError $e) {
    http_response_code(400);
    exit('Invalid signature');
}

/* ---------- PARSE EVENT ---------- */
$data  = json_decode($payload, true);
$event = $data['event'] ?? '';

/* ---------- HANDLE EVENTS ---------- */

if ($event === 'payment.captured') {

    $payment = $data['payload']['payment']['entity'];

    $paymentId = $payment['id'];
    $orderId   = $payment['order_id'];
    $amount    = $payment['amount']; // in paise

    /* Update transactions */
    $stmt = $connection->prepare("
        UPDATE transactions
        SET razorpay_payment_id = ?, payment_status = 'PAID(Verified)'
        WHERE razorpay_order_id = ?
    ");
    $stmt->bind_param("ss", $paymentId, $orderId);
    $stmt->execute();

    /* Update AAM table */
    $stmt = $connection->prepare("
        UPDATE AAM
        SET payment = 'PAID(Verified)'
        WHERE email = (
            SELECT user_email FROM transactions WHERE razorpay_order_id = ?
        )
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

echo 'OK';
http_response_code(200);