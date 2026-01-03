<?php
include 'test.php';

/* Razorpay sends at least order_id */
$orderId = $_POST['razorpay_order_id'] ?? null;

$status  = 'PROCESSING';
$message = 'Payment received. Confirmation in progress.';
$amount  = 0;

if ($orderId) {
    /* Fetch amount from transactions */
    $stmt = $connection->prepare("
        SELECT amount FROM transactions
        WHERE razorpay_order_id = ?
        ORDER BY created_at DESC
        LIMIT 1
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    if ($row) {
        $amount = $row['amount'] / 100;
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
        .processing { color:#856404; }
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
    <h2 class="processing">PAYMENT RECEIVED</h2>

    <p><b>Order Number:</b><br><?= htmlspecialchars($orderId ?? 'N/A'); ?></p>
    <p><b>Amount:</b><br>₹<?= number_format($amount, 2); ?></p>

    <p><?= $message; ?></p>

    <a class="btn" href="profile_aam.php">Go to Profile</a>
</div>

</body>
</html>