<?php
require __DIR__ . '/vendor/autoload.php';
include 'test.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

/* ---------- READ POST DATA ---------- */
$paymentId = $_POST['razorpay_payment_id'] ?? null;
$orderId   = $_POST['razorpay_order_id'] ?? null;
$signature = $_POST['razorpay_signature'] ?? null;

$status  = 'FAILED';
$message = 'Payment failed or cancelled.';
$amount  = 0;

/* ---------- VERIFY IF DATA PRESENT ---------- */
if ($paymentId && $orderId && $signature) {

    try {
        $api = new Api(
            'rzp_test_RvN91s2LLwyZUS',
            'TJ219TzHpNknErC6UzPM72Hv'
        );

        $api->utility->verifyPaymentSignature([
            'razorpay_order_id'   => $orderId,
            'razorpay_payment_id'=> $paymentId,
            'razorpay_signature' => $signature
        ]);

        $status  = 'SUCCESS';
        $message = 'Payment completed successfully.';

        /* Fetch amount ONLY for display */
        $stmt = $connection->prepare("
            SELECT cost FROM AAM
            WHERE email = (
                SELECT user_email FROM transactions WHERE razorpay_order_id = ?
            )
        ");
        $stmt->bind_param("s", $orderId);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if ($row) {
            $amount = (float)$row['cost'];
        }

    } catch (SignatureVerificationError $e) {
        $message = 'Payment verification failed.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
    <style>
        body {
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(15px);
            font-family: Arial, sans-serif;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .box {
            background:#fff;
            padding:30px;
            border-radius:12px;
            width:420px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
        }
        .success { color:#0f5132; }
        .failed { color:#842029; }
        .btn {
            display:inline-block;
            margin-top:20px;
            padding:10px 20px;
            background:#014f86;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2 class="<?= $status === 'SUCCESS' ? 'success' : 'failed'; ?>">
        <?= $status; ?>
    </h2>

    <p><b>Order Number:</b><br><?= htmlspecialchars($orderId ?? 'N/A'); ?></p>
    <p><b>Amount:</b><br>₹<?= number_format($amount, 2); ?></p>

    <p><?= $message; ?></p>

    <a class="btn" href="profile_aam.php">Go to Profile</a>
</div>

</body>
</html>