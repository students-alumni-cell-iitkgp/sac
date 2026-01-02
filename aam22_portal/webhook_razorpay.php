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

file_put_contents(
    __DIR__ . '/logs/razorpay_webhook.log',
    "==== " . date('Y-m-d H:i:s') . " ====\n" .
    $payload . "\n\n",
    FILE_APPEND
);

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
    /* ---------- FETCH USER EMAIL ---------- */
    $stmt = $connection->prepare("
    SELECT user_email 
    FROM transactions 
    WHERE razorpay_order_id = ?
    LIMIT 1
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && !empty($result['user_email'])) {

    $userEmail = $result['user_email'];

    /* ---------- UPDATE AAM TABLE ---------- */
    $stmt = $connection->prepare("
        UPDATE AAM
        SET payment = 'PAID(Verified)'
        WHERE email = ?
    ");
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    }
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