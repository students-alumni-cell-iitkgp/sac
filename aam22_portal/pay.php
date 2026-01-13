<?php
session_start();

if (!isset($_SESSION['rzp_order_id'], $_SESSION['rzp_amount'], $_SESSION['email'])) {
    header("Location: profile_aam.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pay Now</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<script>
var options = {
    key: "rzp_test_RvN91s2LLwyZUS", // TEST KEY ID
    amount: <?= (int)$_SESSION['rzp_amount']; ?>, // paise (integer)
    currency: "INR",
    name: "Annual Alumni Meet",
    description: "Registration Fee",
    order_id: "<?= $_SESSION['rzp_order_id']; ?>",

    prefill: {
        email: "<?= $_SESSION['email']; ?>"
    },

    handler: function (response) {
        fetch("verify_payment.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(response)
        })
        .then(res => res.json())
        .then(data => {
            if (data.redirect) {
                window.location.href = data.redirect;
            }
        });
    },

    theme: {
        color: "#014f86"
    }
};

var rzp = new Razorpay(options);

rzp.on('payment.failed', function () {
    fetch("verify_payment.php", { method: "POST" })
    .then(res => res.json())
    .then(data => {
        if (data.redirect) {
            window.location.href = data.redirect;
        }
    });
});

rzp.open();
</script>

</body>
</html>
