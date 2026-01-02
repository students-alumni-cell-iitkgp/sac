<?php
session_start();

if (!isset($_SESSION['rzp_order'])) {
    header("Location: profile_aam.php");
    exit;
}

$data = $_SESSION['rzp_order'];

$amountInr = number_format($data['amount'] / 100, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Secure Payment | Annual Alumni Meet</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body {
        margin: 0;
        min-height: 100vh;
        font-family: "Segoe UI", Arial, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url(./aa2a.webp) no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        backdrop-filter: blur(25px);
        font-family: 'Segoe UI', sans-serif;
    }

    .payment-card {
        background: #fff;
        width: 100%;
        max-width: 520px;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.25);
        overflow: hidden;
    }

    .header {
        background: #014f86;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .header h2 {
        margin: 0;
        font-size: 1.6rem;
    }

    .header p {
        margin-top: 6px;
        font-size: 0.95rem;
        opacity: 0.9;
    }

    .content {
        padding: 25px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 0.95rem;
    }

    .row strong {
        color: #012a4a;
    }

    .divider {
        height: 1px;
        background: #e0e0e0;
        margin: 15px 0;
    }

    .amount-box {
        background: #f1f8ff;
        border: 1px solid #cfe2ff;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        margin: 20px 0;
    }

    .amount-box span {
        display: block;
        color: #014f86;
        font-size: 0.9rem;
    }

    .amount-box strong {
        font-size: 2rem;
        color: #012a4a;
    }

    .pay-btn {
        width: 100%;
        background: #014f86;
        color: #fff;
        border: none;
        padding: 14px;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
    }

    .pay-btn:hover {
        background: #013a63;
        transform: translateY(-1px);
    }

    .secure-note {
        margin-top: 15px;
        text-align: center;
        font-size: 0.85rem;
        color: #555;
    }

    .secure-note span {
        color: #28a745;
        font-weight: bold;
    }

    @media (max-width: 480px) {
        .payment-card {
            margin: 15px;
        }
    }
</style>
</head>
<body>

<div class="payment-card">

    <div class="header">
        <h2>Secure Payment</h2>
        <p>Annual Alumni Meet Registration</p>
    </div>

    <div class="content">

        <div class="row">
            <strong>Name</strong>
            <span><?= htmlspecialchars($data['name']); ?></span>
        </div>

        <div class="row">
            <strong>Email</strong>
            <span><?= htmlspecialchars($data['email']); ?></span>
        </div>

        <div class="row">
            <strong>Mobile</strong>
            <span><?= htmlspecialchars($data['mobile']); ?></span>
        </div>

        <div class="divider"></div>

        <div class="amount-box">
            <span>Amount Payable</span>
            <strong>₹<?= $amountInr; ?></strong>
        </div>

        <!-- HOSTED CHECKOUT FORM -->
        <form method="POST" action="https://api.razorpay.com/v1/checkout/embedded">

            <input type="hidden" name="key_id" value="rzp_test_RyWze7Pal9awaf">
            <input type="hidden" name="amount" value="<?= $data['amount']; ?>">
            <input type="hidden" name="currency" value="INR">
            <input type="hidden" name="order_id" value="<?= $data['order_id']; ?>">

            <input type="hidden" name="name" value="Annual Alumni Meet">
            <input type="hidden" name="description" value="AAM Registration Fee">

            <input type="hidden" name="prefill[name]" value="<?= htmlspecialchars($data['name']); ?>">
            <input type="hidden" name="prefill[email]" value="<?= htmlspecialchars($data['email']); ?>">
            <input type="hidden" name="prefill[contact]" value="<?= htmlspecialchars($data['mobile']); ?>">

            <input type="hidden" name="callback_url" value="https://sac.iitkgp.ac.in/aam22_portal/payment_response.php">
            <input type="hidden" name="cancel_url" value="https://sac.iitkgp.ac.in/aam22_portal/payment_cancel.php">

            <button type="submit" class="pay-btn">
                Pay Securely with Razorpay
            </button>
        </form>

        <div class="secure-note">
            <span>🔒 Secure</span> payment powered by Razorpay
        </div>

    </div>
</div>

</body>
</html>