<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$data = json_decode(file_get_contents("php://input"), true);

if (!isset(
    $data['razorpay_payment_id'],
    $data['razorpay_order_id'],
    $data['razorpay_signature']
)) {
    echo json_encode(["status" => "error"]);
    exit;
}

$api = new Api(
    "rzp_test_RvN91s2LLwyZUS",
    "TJ219TzHpNknErC6UzPM72Hv"
);

try {
    $api->utility->verifyPaymentSignature([
        'razorpay_order_id'   => $data['razorpay_order_id'],
        'razorpay_payment_id'=> $data['razorpay_payment_id'],
        'razorpay_signature' => $data['razorpay_signature']
    ]);

    // Update transactions
    $stmt = $connection->prepare("
        UPDATE transactions
        SET razorpay_payment_id = ?, payment_status = 'PAID(Verified)'
        WHERE razorpay_order_id = ?
    ");
    $stmt->bind_param("ss", $data['razorpay_payment_id'], $data['razorpay_order_id']);
    $stmt->execute();

    // Update AAM table
    $stmt = $connection->prepare("
        UPDATE AAM
        SET payment = 'PAID(Verified)'
        WHERE email = ?
    ");
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();

    echo json_encode(["status" => "success"]);

} catch (SignatureVerificationError $e) {
    echo json_encode(["status" => "error"]);
}

?>