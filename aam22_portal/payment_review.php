<?php
session_start();
include 'test.php';

if (!isset($_SESSION['email'])) {
    header("Location: login_aam.php");
    exit;
}

$email = $_SESSION['email'];

/* Fetch user + amount */
$stmt = $connection->prepare("
    SELECT name, email, mobile, cost, payment
    FROM AAM
    WHERE email = ?
");
$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user || $user['payment'] !== 'PENDING') {
    header("Location: profile_aam.php");
    exit;
}

$amount = (float)$user['cost'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            backdrop-filter: blur(25px);
            font-family: 'Segoe UI', sans-serif;
            color: #012A4A;
        }
        .card {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 500px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .row {
            margin-bottom: 12px;
        }
        .label {
            font-weight: bold;
            color: #444;
        }
        .value {
            color: #000;
        }
        .amount {
            font-size: 22px;
            font-weight: bold;
            color: #014f86;
            text-align: center;
            margin: 15px 0;
        }
        .btn {
            display: block;
            width: 90%;
            margin: 0 auto;
            padding: 12px;
            background: #014f86;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        .note {
            font-size: 12px;
            color: #666;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="card">
<h2>IIT KHARAGPUR ALUMNI EVENT FUND</h2>

    <div class="row">
        <span class="label">Name:</span>
        <span class="value"><?= htmlspecialchars($user['name']) ?></span>
    </div>

    <div class="row">
        <span class="label">Email:</span>
        <span class="value"><?= htmlspecialchars($user['email']) ?></span>
    </div>

    <div class="row">
        <span class="label">Mobile:</span>
        <span class="value"><?= htmlspecialchars($user['mobile']) ?></span>
    </div>

    <div class="row">
        <span class="label">Payment Gateway:</span>
        <span class="value">HDFC Bank (via Razorpay)</span>
    </div>

    <div class="amount">
        Amount Payable: ₹<?= number_format($amount, 2) ?>
    </div>

    <a href="create_payment_link.php" class="btn">Proceed to Pay</a>

    <div class="note">
        You will be redirected to a secure payment page.
    </div>
</div>

</body>
</html>



