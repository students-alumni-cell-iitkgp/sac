<?php
session_start();

if (!isset($_SESSION['rzp_order'])) {
    header("Location: profile_aam.php");
    exit;
}

$data = $_SESSION['rzp_order'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Proceed to Payment</title>
</head>
<body>

<form method="POST" action="https://api.razorpay.com/v1/checkout/embedded">
    <input type="hidden" name="key_id" value="rzp_test_RyWze7Pal9awaf"/>H
    <input type="hidden" name="amount" value="<?= $data['amount']; ?>"/>
    <input type="hidden" name="currency" value="INR"/>
    <input type="hidden" name="order_id" value="<?= $data['order_id']; ?>"/>

    <input type="hidden" name="name" value="22nd Annual Alumni Meet"/>
    <input type="hidden" name="description" value="AAM Registration Fee"/>
    <input type="hidden" name="image" value="https://sac.iitkgp.ac.in/aam22_portal/aam22_logo.png"/>

    <input type="hidden" name="prefill[name]" value="<?= htmlspecialchars($data['name']); ?>"/>
    <input type="hidden" name="prefill[email]" value="<?= htmlspecialchars($data['email']); ?>"/>
    <input type="hidden" name="prefill[contact]" value="<?= htmlspecialchars($data['mobile']); ?>"/>

    <input type="hidden" name="callback_url" value="https://sac.iitkgp.ac.in/aam22_portal/payment_response.php"/>
    <input type="hidden" name="cancel_url" value="https://sac.iitkgp.ac.in/aam22_portal/payment_cancel.php"/>

    <button type="submit">Pay Now</button>
</form>

</body>
</html>