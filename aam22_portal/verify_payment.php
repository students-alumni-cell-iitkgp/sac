<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

header('Content-Type: application/json');

/* ---------- READ INPUT ---------- */
$data = json_decode(file_get_contents("php://input"), true);

/* ---------- BASIC VALIDATION ---------- */
if (
    !isset($data['razorpay_payment_id']) ||
    !isset($data['razorpay_order_id']) ||
    !isset($data['razorpay_signature'])
) {
    $_SESSION['payment_response'] = [
        'status'   => 'failed',
        'order_id' => $_SESSION['rzp_order_id'] ?? 'N/A',
        'amount'   => $_SESSION['rzp_amount'] ?? 0
    ];

    echo json_encode([
        "status"   => "error",
        "redirect" => "payment_response.php"
    ]);
    exit;
}

/* ---------- RAZORPAY INIT ---------- */
$api = new Api(
    "rzp_test_RvN91s2LLwyZUS",
    "TJ219TzHpNknErC6UzPM72Hv"
);

try {
    /* ---------- VERIFY SIGNATURE ---------- */
    $api->utility->verifyPaymentSignature([
        'razorpay_order_id'   => $data['razorpay_order_id'],
        'razorpay_payment_id'=> $data['razorpay_payment_id'],
        'razorpay_signature' => $data['razorpay_signature']
    ]);

    /* ---------- UPDATE TRANSACTIONS ---------- */
    $stmt = $connection->prepare("
        UPDATE transactions
        SET razorpay_payment_id = ?, payment_status = 'PAID(Verified)'
        WHERE razorpay_order_id = ?
    ");
    $stmt->bind_param(
        "ss",
        $data['razorpay_payment_id'],
        $data['razorpay_order_id']
    );
    $stmt->execute();

    /* ---------- UPDATE AAM TABLE ---------- */
    $stmt = $connection->prepare("
        UPDATE AAM
        SET payment = 'PAID(Verified)'
        WHERE email = ?
    ");
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();

    /* ---------- STORE RESPONSE FOR UI ---------- */
    $_SESSION['payment_response'] = [
        'status'   => 'success',
        'order_id' => $data['razorpay_order_id'],
        'amount'   => $_SESSION['rzp_amount']
    ];

    echo json_encode([
        "status"   => "success",
        "redirect" => "payment_response.php"
    ]);
    exit;

} catch (SignatureVerificationError $e) {

    /* ---------- FAILURE RESPONSE ---------- */
    $_SESSION['payment_response'] = [
        'status'   => 'failed',
        'order_id' => $data['razorpay_order_id'],
        'amount'   => $_SESSION['rzp_amount']
    ];

    echo json_encode([
        "status"   => "error",
        "redirect" => "payment_response.php"
    ]);
    exit;
}
