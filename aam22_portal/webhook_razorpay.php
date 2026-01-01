<?php
require __DIR__ . '/vendor/autoload.php';
include 'test.php';

$webhookSecret = "AAM22_Webhook_S@C";

/* ---------- READ RAW PAYLOAD ---------- */
$payload = file_get_contents('php://input');
$headers = getallheaders();
$signature = $headers['X-Razorpay-Signature'] ?? '';

/* ---------- VERIFY SIGNATURE ---------- */
$expectedSignature = hash_hmac('sha256', $payload, $webhookSecret);

if (!hash_equals($expectedSignature, $signature)) {
    http_response_code(400);
    exit('Invalid signature');
}

/* ---------- DECODE PAYLOAD ---------- */
$data = json_decode($payload, true);

$event = $data['event'] ?? '';

if ($event !== 'payment.captured') {
    http_response_code(200);
    exit('Event ignored');
}

/* ---------- EXTRACT PAYMENT DETAILS ---------- */
$payment = $data['payload']['payment']['entity'];

$razorpayPaymentId = $payment['id'];
$razorpayOrderId   = $payment['order_id'];
$amount            = $payment['amount'] / 100;
$email             = $payment['email'] ?? '';

/* ---------- UPDATE TRANSACTIONS ---------- */
$stmt = $connection->prepare("
    UPDATE transactions
    SET 
        razorpay_payment_id = ?, 
        payment_status = 'PAID(Verified)'
    WHERE razorpay_order_id = ?
");
$stmt->bind_param("ss", $razorpayPaymentId, $razorpayOrderId);
$stmt->execute();

/* ---------- UPDATE AAM TABLE ---------- */
$stmt = $connection->prepare("
    UPDATE AAM
    SET payment = 'PAID(Verified)'
    WHERE email = ?
");
$stmt->bind_param("s", $email);
$stmt->execute();

/* ---------- LOG FOR AUDIT ---------- */
$log = [
    "time" => date("Y-m-d H:i:s"),
    "event" => $event,
    "order_id" => $razorpayOrderId,
    "payment_id" => $razorpayPaymentId,
    "amount" => $amount,
    "status" => "PAID"
];

file_put_contents(
    __DIR__ . "/logs/webhook.log",
    json_encode($log, JSON_PRETTY_PRINT) . PHP_EOL,
    FILE_APPEND
);

http_response_code(200);
echo "Webhook processed";