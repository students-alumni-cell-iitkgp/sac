<?php
include 'test.php';

$orderId   = $_POST['razorpay_order_id'] ?? 'N/A';
$paymentId = $_POST['razorpay_payment_id'] ?? null;

$status  = 'failed';
$title   = 'PAYMENT FAILED';
$message = 'The payment attempt failed. No amount was charged.';
$amount  = 0;

if ($paymentId) {
    $status  = 'success';
    $title   = 'PAYMENT SUCCESSFUL';
    $message = 'Your payment was successful and is being confirmed.';

    // Optional: fetch amount for display
    $stmt = $connection->prepare("
        SELECT A.cost
        FROM AAM A
        JOIN transactions T ON T.user_email = A.email
        WHERE T.razorpay_order_id = ?
        ORDER BY T.id DESC
        LIMIT 1
    ");
    $stmt->bind_param("s", $orderId);
    
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    $amount = $row ? (float)$row['cost'] : 0;
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
    font-family: Arial;
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
    <h2 class="<?= $status ?>"><?= $title ?></h2>

    <p><b>Order Number:</b><br><?= htmlspecialchars($orderId) ?></p>
    <p><b>Amount:</b><br>₹<?= number_format($amount, 2) ?></p>

    <p><?= $message ?></p>

    <a class="btn" href="profile_aam.php">Go to Profile</a>
</div>

</body>
</html>