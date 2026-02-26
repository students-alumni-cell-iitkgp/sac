<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'test.php';

use Razorpay\Api\Errors\SignatureVerificationError;

$orderId   = $_POST['razorpay_order_id'];
$paymentId = $_POST['razorpay_payment_id'];
$signature = $_POST['razorpay_signature'];

try {
    $api->utility->verifyPaymentSignature([
        'razorpay_order_id' => $orderId,
        'razorpay_payment_id' => $paymentId,
        'razorpay_signature' => $signature
    ]);

    /* Update SUCCESS */
    $stmt = $connection->prepare("
        UPDATE accommodation_payments
        SET payment_status='SUCCESS',
            transaction_id=?
        WHERE razorpay_order_id=?
    ");
    $stmt->bind_param("ss", $paymentId, $orderId);
    $stmt->execute();

    $status = "SUCCESS";

} catch (SignatureVerificationError $e) {

    $stmt = $connection->prepare("
        UPDATE accommodation_payments
        SET payment_status='FAILED'
        WHERE razorpay_order_id=?
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();

    $status = "FAILED";
}
?>

<h2>Payment <?= $status ?></h2>
<p>Order ID: <?= htmlspecialchars($orderId) ?></p>
<p>Payment ID: <?= htmlspecialchars($paymentId) ?></p>
