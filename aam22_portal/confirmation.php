<?php
session_start();
include 'test.php';

if (!isset($_SESSION["email"])) {
    echo "No registration found!";
    exit;
}

$email = $_SESSION["email"];
$sql = "SELECT * FROM AAM WHERE email='$email' LIMIT 1";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No registration found!";
    exit;
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Successful | AAM 2026</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: url(./aa2a.webp) no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        backdrop-filter: blur(20px);

        font-family: "Segoe UI", sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #012a4a;
    }

    .success-card {
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(12px);
        border-radius: 25px;
        padding: 40px 30px;
        max-width: 600px;
        width: 90%;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        text-align: center;
        animation: fadeIn 0.6s ease;
    }

    .success-card h2 {
        color: #014f86;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .success-message {
        font-size: 1.05rem;
        background: rgba(255,255,255,0.5);
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .details {
        background: rgba(255,255,255,0.35);
        padding: 15px;
        border-radius: 15px;
        margin-bottom: 25px;
    }

    .details table {
        width: 100%;
        border-collapse: collapse;
        color: #012a4a;
    }

    .details th {
        text-align: left;
        width: 40%;
        font-weight: 600;
        padding: 8px;
    }

    .details td {
        text-align: right;
        padding: 8px;
        color: #014f86;
        font-weight: 500;
    }

    .btn-bubble {
        border: none;
        background-color: #014f86;
        color: white;
        font-weight: 600;
        padding: 10px 25px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-bubble:hover {
        background-color: #012a4a;
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(1, 79, 134, 0.4);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .success-card { padding: 30px 20px; }
        .success-message { font-size: 0.95rem; }
        .details th, .details td { font-size: 0.9rem; }
    }
</style>
</head>
<body>

<div class="success-card">
    <h2>Registration Successful!</h2>
    <div class="success-message">
        Thank you, <strong><?php echo htmlspecialchars($user['name']); ?></strong>!  
        Your registration for the <strong>22<sup>nd</sup> Annual Alumni Meet 2026</strong> has been successfully completed.  
        We’re thrilled to have you join us to relive the KGP spirit and reconnect with your batchmates.  
        <br><br>
        For schedule, accommodation, and updates please log in to your profile anytime.
    </div>

    <div class="details">
        <table>
            <tr><th>Email</th><td><?php echo htmlspecialchars($user['email']); ?></td></tr>
            <tr><th>Mobile</th><td><?php echo htmlspecialchars($user['mobile']); ?></td></tr>
            <tr><th>Date of Birth</th><td><?php echo htmlspecialchars($user['dob']); ?></td></tr>
        </table>
    </div>

    <a href="profile_aam.php" class="btn-bubble">Go to Your Profile</a>
</div>

</body>
</html>