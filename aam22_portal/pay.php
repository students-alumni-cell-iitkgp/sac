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
    "key": "rzp_test_RvN91s2LLwyZUS", // YOUR TEST KEY ID
    "amount": <?= (int)$_SESSION['rzp_amount']; ?>, // integer (paise)
    "currency": "INR",
    "name": "Annual Alumni Meet",
    "description": "Registration Fee",
    "order_id": "<?= $_SESSION['rzp_order_id']; ?>",

    "prefill": {
        "email": "<?= $_SESSION['email']; ?>"
    },

    "handler": function (response) {
        fetch("verify_payment.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(response)
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert("Payment successful!");
                window.location.href = "profile_aam.php";
            } else {
                alert("Payment verification failed.");
                window.location.href = "profile_aam.php";
            }
        })
        .catch(() => {
            alert("Verification error.");
            window.location.href = "profile_aam.php";
        });
    },

    "theme": {
        "color": "#014f86"
    }
};

var rzp = new Razorpay(options);

/* Handle payment failure */
rzp.on('payment.failed', function (response){
    console.error(response.error);
    alert("Payment failed or cancelled.");
    window.location.href = "profile_aam.php";
});

rzp.open();
</script>

</body>
</html>
