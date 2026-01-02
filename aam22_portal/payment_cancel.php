<?php
session_start();
include 'test.php';

/* Optional: fetch last order info from session */
$orderId = $_SESSION['rzp_order']['order_id'] ?? 'N/A';
$amount  = $_SESSION['rzp_order']['amount'] ?? 0;

/* Convert paise to INR */
$amountInr = $amount > 0 ? number_format($amount / 100, 2) : '0.00';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment Cancelled</title>
<style>
    body {
        background: #f8f9fa;
        font-family: Arial, sans-serif;
        background: url(./aa2a.webp) no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        backdrop-filter: blur(25px);
        font-family: 'Segoe UI', sans-serif;
    }
    .box {
        max-width: 500px;
        margin: 80px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        text-align: center;
    }
    h2 {
        color: #dc3545;
        margin-bottom: 15px;
    }
    p {
        color: #333;
        margin-bottom: 10px;
    }
    .btn {
        display: inline-block;
        margin: 10px;
        padding: 10px 18px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }
    .btn-retry {
        background: #014f86;
    }
    .btn-profile {
        background: #6c757d;
    }
</style>
</head>
<body>

<div class="box">
    <h2>Payment Cancelled</h2>

    <p>Your payment was not completed.</p>

    <p><strong>Order ID:</strong> <?= htmlspecialchars($orderId); ?></p>
    <p><strong>Amount:</strong> ₹<?= $amountInr; ?></p>

    <p>You may retry the payment or return to your profile.</p>

    <a href="create_order.php" class="btn btn-retry">Retry Payment</a>
    <a href="profile_aam.php" class="btn btn-profile">Back to Profile</a>
</div>

</body>
</html>