<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'test.php'; // must contain $connection

/* ===============================
   ALWAYS DEFINE VARIABLES
================================ */
$orderId   = $_POST['razorpay_order_id'] ?? 'N/A';
$paymentId = $_POST['razorpay_payment_id'] ?? null;

/* ===============================
   DECIDE SUCCESS (LIGHTWEIGHT)
   — same behavior as your working page
================================ */
$isSuccess = $paymentId ? true : false;
$status    = $isSuccess ? 'SUCCESS' : 'FAILED';

/* ===============================
   UPDATE accommodation_payments
================================ */
if ($orderId !== 'N/A') {

    if ($isSuccess) {
        $stmt = $connection->prepare("
            UPDATE accommodation_payments
            SET payment_status='SUCCESS',
                transaction_id=?
            WHERE razorpay_order_id=?
        ");
        $stmt->bind_param("ss", $paymentId, $orderId);
    } else {
        $stmt = $connection->prepare("
            UPDATE accommodation_payments
            SET payment_status='FAILED'
            WHERE razorpay_order_id=?
        ");
        $stmt->bind_param("s", $orderId);
    }

    $stmt->execute();
}

/* ===============================
   FETCH AMOUNT FROM SAME TABLE
================================ */
$amount = 0;

if ($orderId !== 'N/A') {
    $stmt = $connection->prepare("
        SELECT amount
        FROM accommodation_payments
        WHERE razorpay_order_id = ?
        LIMIT 1
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    if ($row) {
        $amount = (float)$row['amount'];
    }
}

/* ===============================
   UI TEXT
================================ */
$title   = $isSuccess ? 'PAYMENT SUCCESSFUL' : 'PAYMENT FAILED';
$message = $isSuccess
    ? 'Your payment was successful and is being confirmed.'
    : 'The payment attempt failed or was cancelled.';
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
    <h2 class="<?= $isSuccess ? 'success' : 'failed' ?>">
        <?= htmlspecialchars($title) ?>
    </h2>

    <p><b>Order Number:</b><br><?= htmlspecialchars($orderId) ?></p>
    <p><b>Amount:</b><br>₹<?= number_format($amount, 2) ?></p>

    <p><?= htmlspecialchars($message) ?></p>

    <!-- optional -->
    <!-- <a class="btn" href="profile_aam.php">Go to Profile</a> -->
</div>

</body>
</html>
