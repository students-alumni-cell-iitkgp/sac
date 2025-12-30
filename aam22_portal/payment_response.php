<?php
session_start();

if (!isset($_SESSION['payment_response'])) {
    header("Location: profile_aam.php");
    exit;
}

$data = $_SESSION['payment_response'];

// optional: unset after reading
unset($_SESSION['payment_response']);
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
            /* min-height: 100vh; */

            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 420px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .success { color: green; }
        .failed { color: red; }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #014f86;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2 class="<?= $data['status'] === 'success' ? 'success' : 'failed'; ?>">
        <?= strtoupper($data['status']); ?>
    </h2>

    <p><b>Order Number:</b><br><?= htmlspecialchars($data['order_id']); ?></p>
    <p><b>Amount:</b><br>₹<?= number_format($data['amount'] / 100, 2); ?></p>

    <p>
        <?= $data['status'] === 'success'
            ? 'Payment completed successfully.'
            : 'Payment failed or cancelled.'; ?>
    </p>

    <a class="btn" href="profile_aam.php">Go to Profile</a>
</div>

</body>
</html>
