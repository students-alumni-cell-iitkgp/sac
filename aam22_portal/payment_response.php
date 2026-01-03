<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'test.php';

/* Fallback-safe values */
$orderId = $_REQUEST['razorpay_order_id'] ?? 'N/A';

/* Default to processing */
$title   = 'PAYMENT PROCESSING';
$message = 'Your payment has been received. Please check your profile for confirmation.';
$amount  = 0;

/* Try to fetch latest PAID transaction */
$stmt = $connection->prepare("
    SELECT A.cost
    FROM AAM A
    JOIN transactions T ON T.user_email = A.email
    WHERE T.payment_status = 'PAID(Verified)'
    ORDER BY T.id DESC
    LIMIT 1
");
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if ($row) {
    $title   = 'PAYMENT SUCCESSFUL';
    $message = 'Your payment was successful.';
    $amount  = (float)$row['cost'];
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
    <h2 class="<?= $row ? 'success' : 'processing' ?>">
        <?= $title ?>
    </h2>

    <p><b>Amount:</b><br>₹<?= number_format($amount, 2) ?></p>
    <p><?= $message ?></p>

    <a class="btn" href="profile_aam.php">Go to Profile</a>
</div>

</body>
</html>