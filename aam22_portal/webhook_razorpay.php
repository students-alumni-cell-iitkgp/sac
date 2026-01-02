<?php
// webhook_razorpay.php

require __DIR__ . '/vendor/autoload.php';
include 'test.php';


use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

/* ---------- CONFIG ---------- */
$WEBHOOK_SECRET = "S@C_Razorpay@Webhook@2025"; // SAME as dashboard
/* ===============================
   DEBUG LOG (DO NOT REMOVE)
   =============================== */
file_put_contents(
    __DIR__ . '/logs/webhook.log',
    date('Y-m-d H:i:s') . " WEBHOOK HIT\n",
    FILE_APPEND
);

/* ===============================
   READ PAYLOAD
   =============================== */
$payload   = file_get_contents('php://input');
$headers   = getallheaders();
$signature = $headers['X-Razorpay-Signature'] ?? '';

/* ===============================
   VERIFY SIGNATURE
   =============================== */
try {
    Api::verifyWebhookSignature($payload, $signature, $WEBHOOK_SECRET);
} catch (SignatureVerificationError $e) {

    file_put_contents(
        __DIR__ . '/logs/webhook.log',
        date('Y-m-d H:i:s') . " SIGNATURE FAILED\n",
        FILE_APPEND
    );

    http_response_code(400);
    exit('Invalid signature');
}

/* ===============================
   PARSE EVENT
   =============================== */
$data  = json_decode($payload, true);
$event = $data['event'] ?? '';

file_put_contents(
    __DIR__ . '/logs/webhook.log',
    date('Y-m-d H:i:s') . " EVENT: $event\n",
    FILE_APPEND
);

/* ===============================
   PAYMENT CAPTURED
   =============================== */
if ($event === 'payment.captured') {

    $payment   = $data['payload']['payment']['entity'];
    $paymentId = $payment['id'];
    $orderId   = $payment['order_id'];

    // 1️⃣ Update TRANSACTIONS (idempotent)
    $stmt = $connection->prepare("
        UPDATE transactions
        SET razorpay_payment_id = ?, payment_status = 'PAID(Verified)'
        WHERE razorpay_order_id = ?
        AND payment_status != 'PAID(Verified)'
    ");
    $stmt->bind_param("ss", $paymentId, $orderId);
    $stmt->execute();

    // 2️⃣ Update AAM USING JOIN (CRITICAL FIX)
    $stmt = $connection->prepare("
        UPDATE AAM a
        INNER JOIN transactions t ON t.user_email = a.email
        SET a.payment = 'PAID(Verified)'
        WHERE t.razorpay_order_id = ?
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();

    file_put_contents(
        __DIR__ . '/logs/webhook.log',
        date('Y-m-d H:i:s') . " UPDATED ORDER: $orderId\n",
        FILE_APPEND
    );
}

/* ===============================
   PAYMENT FAILED (OPTIONAL)
   =============================== */
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

    file_put_contents(
        __DIR__ . '/logs/webhook.log',
        date('Y-m-d H:i:s') . " PAYMENT FAILED: $orderId\n",
        FILE_APPEND
    );
}

http_response_code(200);
echo "OK";