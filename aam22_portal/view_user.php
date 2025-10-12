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
$error_message = ''; // For duplicate transaction ID

// Handle payment update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $new_status = $_POST['payment_status'];
    $txn_id = trim($_POST['transaction_id']);

    // Check for duplicate transaction ID
    $check = $connection->prepare("SELECT id FROM transactions WHERE transaction_id = ? LIMIT 1");
    $check->bind_param("s", $txn_id);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error_message = "Transaction ID already exists! Please use a unique ID.";
    } else {
        // Update payment in AAM table
        $update = $connection->prepare("UPDATE AAM SET payment = ? WHERE id = ?");
        $update->bind_param("si", $new_status, $id);
        $update->execute();

        // Insert into transactions table
        $insert = $connection->prepare("INSERT INTO transactions (user_email, user_name, mobile, payment_status, transaction_id)
                                        VALUES (?, ?, ?, ?, ?)");
        $insert->bind_param("sssss", $user['email'], $user['name'], $user['mobile'], $new_status, $txn_id);
        $insert->execute();

        $payment_updated = true; 
        $user['payment'] = $new_status; // Update current display
    }
    $check->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            background: url(./aa.webp);
    background-size: cover;
    background-repeat: no-repeat;
  background-attachment: fixed;
  z-index: -88;
        }
        .section-box {
            background-color: #A9D6E5;

            /* background: #ffffff; */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .section-box h5 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }
        .badge-paid {
            background-color: #28a745;
        }
        .badge-pending {
            background-color: #ffc107;
            color: #212529;
        }
    </style>
</head>
<body>
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4 text-bold">User Profile</h2>

    <!-- Personal Details -->
    <div class="section-box">
        <h5>Personal Details</h5>
        <div class="row">
            <div class="col-md-4"><b>Name:</b> <?= htmlspecialchars($user['name']); ?></div>
            <div class="col-md-4"><b>Email:</b> <?= htmlspecialchars($user['email']); ?></div>
            <div class="col-md-4"><b>Mobile:</b> <?= htmlspecialchars($user['mobile']); ?></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"><b>DOB:</b> <?= htmlspecialchars($user['dob']); ?></div>
            <div class="col-md-4"><b>Address:</b> <?= htmlspecialchars($user['address']); ?></div>
            <div class="col-md-4"><b>City:</b> <?= htmlspecialchars($user['city']); ?></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"><b>State:</b> <?= htmlspecialchars($user['state']); ?></div>
            <div class="col-md-4"><b>Country:</b> <?= htmlspecialchars($user['country']); ?></div>
            <div class="col-md-4"><b>Zipcode:</b> <?= htmlspecialchars($user['zipcode']); ?></div>
        </div>
    </div>

    <!-- Accompaniment & Preferences -->
    <div class="section-box">
        <h5>Accompaniment & Preferences</h5>
        <div class="row">
            <div class="col-md-4"><b>Accompaniment:</b> <?= htmlspecialchars($user['accompaniment']); ?></div>
            <div class="col-md-4"><b>Kids:</b> <?= htmlspecialchars($user['acc_kid']); ?></div>
            <div class="col-md-4"><b>Accompaniment Details:</b> <?= htmlspecialchars($user['acc_details']); ?></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"><b>Food Preference:</b> <?= htmlspecialchars($user['foodPreference']); ?></div>
            <div class="col-md-4"><b>Cost:</b> <?= htmlspecialchars($user['cost']); ?></div>
            <div class="col-md-4"><b>Profession:</b> <?= htmlspecialchars($user['profession']); ?></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"><b>Organisation:</b> <?= htmlspecialchars($user['organisation']); ?></div>
            <div class="col-md-4"><b>Designation:</b> <?= htmlspecialchars($user['designation']); ?></div>
        </div>
    </div>

    <!-- Work Details -->
    <div class="section-box">
        <h5>Work Details</h5>
        <div class="row">
            <div class="col-md-4"><b>Address:</b> <?= htmlspecialchars($user['waddress']); ?></div>
            <div class="col-md-4"><b>City:</b> <?= htmlspecialchars($user['wcity']); ?></div>
            <div class="col-md-4"><b>State:</b> <?= htmlspecialchars($user['wstate']); ?></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"><b>Country:</b> <?= htmlspecialchars($user['wcountry']); ?></div>
            <div class="col-md-4"><b>Zipcode:</b> <?= htmlspecialchars($user['wzipcode']); ?></div>
        </div>
    </div>

    <!-- Academic Details -->
    <div class="section-box">
        <h5>Academic Details</h5>
        <div class="row">
            <div class="col-md-4"><b>Roll No:</b> <?= htmlspecialchars($user['rollno']); ?></div>
            <div class="col-md-4"><b>Degree:</b> <?= htmlspecialchars($user['degree']); ?></div>
            <div class="col-md-4"><b>Department:</b> <?= htmlspecialchars($user['dept']); ?></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"><b>Hall:</b> <?= htmlspecialchars($user['hall']); ?></div>
            <div class="col-md-4"><b>Year of Joining:</b> <?= htmlspecialchars($user['yoj']); ?></div>
            <div class="col-md-4"><b>Year of Graduation:</b> <?= htmlspecialchars($user['yog']); ?></div>
        </div>
    </div>

    <!-- Travel & Social -->
    <div class="section-box">
        <h5>Travel & Social</h5>
        <div class="row">
            <div class="col-md-4"><b>Arrival Date:</b> <?= htmlspecialchars($user['dateOfArr']); ?></div>
            <div class="col-md-4"><b>Departure Date:</b> <?= htmlspecialchars($user['dateOfDep']); ?></div>
            <div class="col-md-4"><b>Arrival Time:</b> <?= htmlspecialchars($user['timeOfArr']); ?></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"><b>Departure Time:</b> <?= htmlspecialchars($user['timeOfDep']); ?></div>
            <div class="col-md-4"><b>Social Links:</b> <?= htmlspecialchars($user['social_links']); ?></div>
            <div class="col-md-4"><b>Payment Status:</b> 
                <span class="badge <?= $user['payment'] === 'Paid' ? 'badge-paid' : 'badge-pending'; ?>">
                    <?= htmlspecialchars($user['payment']); ?>
                </span>
            </div>
        </div>
    </div>

    <!-- Payment Update Form -->
    <div class="section-box">
        <h5>Update Payment</h5>
        <form method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Payment Status</label>
                    <select name="payment_status" class="form-select" required>
                        <option value="Pending" <?= $user['payment'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="Paid" <?= $user['payment'] === 'Paid' ? 'selected' : ''; ?>>Paid</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Transaction ID</label>
                    <input type="text" name="transaction_id" class="form-control" required>
                </div>
            </div>
            <button class="btn btn-success">Update Payment</button>
        </form>
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