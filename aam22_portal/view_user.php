<?php
session_start();
include 'test.php'; // DB connection

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'] ?? 0;
$stmt = $connection->prepare("SELECT * FROM AAM WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$payment_updated = false; 
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $new_status = $_POST['payment_status'];
    $txn_id = trim($_POST['transaction_id']);

    $check = $connection->prepare("SELECT id FROM transactions WHERE transaction_id = ? LIMIT 1");
    $check->bind_param("s", $txn_id);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error_message = "Transaction ID already exists! Please use a unique ID.";
    } else {
        $update = $connection->prepare("UPDATE AAM SET payment = ? WHERE id = ?");
        $update->bind_param("si", $new_status, $id);
        $update->execute();

        $insert = $connection->prepare("INSERT INTO transactions (user_email, user_name, mobile, payment_status, transaction_id)
                                        VALUES (?, ?, ?, ?, ?)");
        $insert->bind_param("sssss", $user['email'], $user['name'], $user['mobile'], $new_status, $txn_id);
        $insert->execute();

        $payment_updated = true; 
        $user['payment'] = $new_status;
    }
    $check->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            color: #012A4A;
            position: relative;
            overflow-x: hidden;
        }

        /* Blurred background layer */
        body::before {
            content: "";
            position: fixed;      /* sticks to viewport */
            inset: 0;             /* top:0; right:0; bottom:0; left:0; */
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            filter: blur(20px);   /* real blur here */
            transform: scale(1.05); /* avoid edges when blurred */
            z-index: -1;          /* sits behind all content */
            pointer-events: none; /* don't block clicks */
        }
        h2 {
            font-size: 40px;
            text-align: center;
            color: black;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns for desktop */
            gap: 20px;
            padding: 0 15px;
        }
        .logout-btn {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
            gap: 20px;
        }
        .btn{
            background-color: #1976D2;
            color: white;
            border-radius: 25px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn:hover{
            background-color: blue;
            color: white;
        }

        /* For mobile screens: single column */
        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr; /* 1 column for mobile */
            }
        }

        .section-card {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 25px 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .section-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .section-card h5 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
            margin-bottom: 15px;
            color: #1976D2;
            font-weight: bold;
        }

        .section-card p {
            margin-bottom: 6px;
            color: #333;
            font-size: 0.95rem;
        }

        .badge-paid {
            background-color: #28a745;
            color: #fff;
            border-radius: 20px;
            padding: 5px 10px;
        }

        .badge-pending {
            background-color: #ffc107;
            color: #212529;
            border-radius: 20px;
            padding: 5px 10px;
        }

        .btn-color {
            background-color: #1976D2;
            color: white;
            border-radius: 25px;
            font-weight: bold;
            margin-top: 10px;
            transition: background 0.3s;
        }

        .btn-color:hover {
            background-color: #1565C0;
        }

        @media (max-width: 576px) {
            .section-card {
                padding: 20px 15px;
            }
        }

        @media (max-width: 576px) {
            .alumni-card {
                padding: 20px 15px;
            }
            .logout-btn{
                display: flex;
                flex-direction: column;
                width: 70%;
                margin: auto;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<div class="container mb-5">
    <h2>User Profile</h2>

    <div class="logout-btn">
        <a href="admin.php" class="btn">Admin Page</a>
        <a href="logout_admin.php" class="btn">Logout</a>
    </div>

    <div class="profile-grid">
        <!-- Personal Details -->
        <div class="section-card">
            <h5>Personal Details</h5>
            <p><b>Name:</b> <?= htmlspecialchars($user['name']); ?></p>
            <p><b>Email:</b> <?= htmlspecialchars($user['email']); ?></p>
            <p><b>Mobile:</b> <?= htmlspecialchars($user['mobile']); ?></p>
            <p><b>DOB:</b> <?= htmlspecialchars($user['dob']); ?></p>
            <p><b>ID Type:</b> <?= htmlspecialchars($user['idtype']); ?></p>
            <p><b>ID Number:</b> <?= htmlspecialchars($user['idnumber']); ?></p>
            <p><b>Social Links:</b> <?= htmlspecialchars($user['social_links']); ?></p>
            <p><b>Address:</b> <?= htmlspecialchars($user['address']); ?>, <?= htmlspecialchars($user['city']); ?>, <?= htmlspecialchars($user['state']); ?>, <?= htmlspecialchars($user['country']); ?> - <?= htmlspecialchars($user['zipcode']); ?></p>
        </div>

        <!-- Accompaniment & Food Preferences -->
        <div class="section-card">
            <h5>Accompaniment & Food Preferences</h5>
            <p><b>Accompaniment Person Relation:</b> <?= htmlspecialchars($user['acc_relation']); ?></p>
            <p><b>Accompaniment Person Name:</b> <?= htmlspecialchars($user['acc_name']); ?></p>
            <p><b>Food Preference:</b> <?= htmlspecialchars($user['foodPreference']); ?></p>
            <p><b>Health Restrictions:</b> <?= htmlspecialchars($user['medical']); ?></p>
            <p><b>Total Fee:</b> <?= htmlspecialchars($user['cost']); ?></p>
            <p><b>Payment Status:</b> 
                <span class="<?= $user['payment'] === 'PAID(Verified)' ? 'badge-paid' : 'badge-pending'; ?>">
                    <?= htmlspecialchars($user['payment']); ?>
                </span>
            </p>
            
        </div>

        <!-- Work Details -->
        <div class="section-card">
            <h5>Work Details</h5>
            <p><b>Profession:</b> <?= htmlspecialchars($user['profession']); ?></p>
            <p><b>Organisation:</b> <?= htmlspecialchars($user['organisation']); ?></p>
            <p><b>Designation:</b> <?= htmlspecialchars($user['designation']); ?></p>
            <p><b>Address:</b> <?= htmlspecialchars($user['waddress']); ?></p>
            <p><b>City:</b> <?= htmlspecialchars($user['wcity']); ?></p>
            <p><b>State:</b> <?= htmlspecialchars($user['wstate']); ?></p>
            <p><b>Country:</b> <?= htmlspecialchars($user['wcountry']); ?></p>
            <p><b>Zipcode:</b> <?= htmlspecialchars($user['wzipcode']); ?></p>
        </div>

        <!-- Academic Details -->
        <div class="section-card">
            <h5>Academic Details</h5>
            <p><b>Position Held in KGP:</b> <?= htmlspecialchars($user['positionHolding']); ?></p>
            <p><b>Course:</b> <?= htmlspecialchars($user['course']); ?></p>
            <p><b>Degree:</b> <?= htmlspecialchars($user['degree']); ?></p>
            <p><b>Department:</b> <?= htmlspecialchars($user['dept']); ?></p>
            <p><b>Hall:</b> <?= htmlspecialchars($user['hall']); ?></p>
            <p><b>Year of Joining:</b> <?= htmlspecialchars($user['yoj']); ?></p>
            <p><b>Year of Graduation:</b> <?= htmlspecialchars($user['yog']); ?></p>
        </div>

        <!-- Travel & Social -->
        <div class="section-card">
            <h5>Travel Details</h5>
            <p><b>Mode of Arrival at Kharagpur:</b> <?= htmlspecialchars($user['arrivalMode']); ?></p>
            <p><b>Arrival Date:</b> <?= htmlspecialchars($user['dateOfArr']); ?></p>
            <p><b>Departure Date:</b> <?= htmlspecialchars($user['dateOfDep']); ?></p>
            <p><b>Arrival Time:</b> <?= htmlspecialchars($user['timeOfArr']); ?></p>
            <p><b>Departure Time:</b> <?= htmlspecialchars($user['timeOfDep']); ?></p>

            
        </div>

        <!-- Payment Update Form -->
        <div class="section-card">
            <h5>Update Payment</h5>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Payment Status</label>
                    <select name="payment_status" class="form-select" required>
                        <option value="PENDING" <?= $user['payment'] === 'PENDING' ? 'selected' : ''; ?>>Pending</option>
                        <option value="PAID(Verified)" <?= $user['payment'] === 'PAID(Verified)' ? 'selected' : ''; ?>>Paid(Verified)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Transaction ID</label>
                    <input type="text" name="transaction_id" class="form-control" required>
                </div>
                <button class="btn btn-color w-100">Update Payment</button>
            </form>
        </div>
    </div>
</div>

<?php if($payment_updated): ?>
<script>
    alert("Payment status updated successfully!\nEntry added to transactions table.");
</script>
<?php elseif($error_message): ?>
<script>
    alert("<?= addslashes($error_message); ?>");
</script>
<?php endif; ?>

</body>
</html>