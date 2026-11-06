<?php
session_start();
include 'test.php'; // DB connection ($connection)

// ✅ Admin protection (same idea as your other admin pages)
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$results = [];
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bulk_data = trim($_POST['bulk_data'] ?? '');

    if ($bulk_data === '') {
        $error_message = "Please paste at least one email.";
    } else {
        // Each line can be:
        // 1) email
        // 2) email,transaction_id
        // 3) email,transaction_id,payment_status
        //
        // Default payment_status = PAID(Verified) if not provided.
        $lines = preg_split('/\r\n|\r|\n/', $bulk_data);

        foreach ($lines as $index => $line) {
            $line_no = $index + 1;
            $line = trim($line);
            if ($line === '') {
                continue; // skip empty lines
            }

            $parts = array_map('trim', explode(',', $line));

            // Basic validation
            if (count($parts) < 1) {
                $results[] = "Line $line_no: Skipped (no email found).";
                continue;
            }

            $email  = $parts[0] ?? '';
            $txn_id = $parts[1] ?? '';                   // may be empty
            $status = $parts[2] ?? 'PAID(Verified)';     // default

            if ($email === '') {
                $results[] = "Line $line_no: Skipped (empty email).";
                continue;
            }

            // If you want to REQUIRE txn_id, uncomment this:
            // if ($txn_id === '') {
            //     $results[] = "Line $line_no ($email): Skipped (transaction_id is required).";
            //     continue;
            // }

            // Start DB transaction for each line
            $connection->begin_transaction();

            try {
                // 1️⃣ Find user in AAM by email
                $stmt = $connection->prepare("SELECT id, name, mobile, payment FROM AAM WHERE email = ? LIMIT 1");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $user_result = $stmt->get_result();
                $user = $user_result->fetch_assoc();
                $stmt->close();

                if (!$user) {
                    $results[] = "Line $line_no: No user found with email '$email'.";
                    $connection->rollback();
                    continue;
                }

                $user_id    = $user['id'];
                $user_name  = $user['name'];
                $user_mobile= $user['mobile'];
                $old_payment= $user['payment'];

                // 2️⃣ If a transaction ID was provided, check for duplicates & insert
                if ($txn_id !== '') {
                    // Check if transaction ID already exists
                    $check = $connection->prepare("SELECT id FROM transactions WHERE transaction_id = ? LIMIT 1");
                    $check->bind_param("s", $txn_id);
                    $check->execute();
                    $check->store_result();

                    if ($check->num_rows > 0) {
                        $results[] = "Line $line_no ($email): Transaction ID '$txn_id' already exists. Skipped.";
                        $check->close();
                        $connection->rollback();
                        continue;
                    }
                    $check->close();

                    // Insert into transactions table
                    $insert = $connection->prepare("
                        INSERT INTO transactions (user_email, user_name, mobile, payment_status, transaction_id)
                        VALUES (?, ?, ?, ?, ?)
                    ");
                    $insert->bind_param(
                        "sssss",
                        $email,
                        $user_name,
                        $user_mobile,
                        $status,
                        $txn_id
                    );
                    $insert->execute();
                    $insert->close();
                }

                // 3️⃣ Update payment status in AAM
                $update = $connection->prepare("UPDATE AAM SET payment = ? WHERE id = ?");
                $update->bind_param("si", $status, $user_id);
                $update->execute();
                $update->close();

                $connection->commit();
                $results[] = "Line $line_no ($email): Payment '$old_payment' → '$status'"
                           . ($txn_id !== '' ? " | Txn '$txn_id' added." : " (no transaction id).");

            } catch (Exception $e) {
                $connection->rollback();
                $results[] = "Line $line_no ($email): ERROR - " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Payment Update - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(25px);
            font-family: 'Arial', sans-serif;
            padding-top: 40px;
        }
        .container-box {
            max-width: 900px;
            margin: auto;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 20px;
            padding: 25px 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #012A4A;
            font-weight: 700;
            margin-bottom: 25px;
        }
        .btn-main {
            background-color: #1976D2;
            color: white;
            border-radius: 25px;
            font-weight: bold;
            border: none;
        }
        .btn-main:hover {
            background-color: #1565C0;
            color: white;
        }
        pre {
            background: rgba(0,0,0,0.03);
            padding: 8px 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container mb-5">
    <h2>Bulk Payment Status Update</h2>

    <div class="mb-3 text-center">
        <a href="admin.php" class="btn btn-main me-2">Admin Page</a>
        <a href="logout_admin.php" class="btn btn-main">Logout</a>
    </div>

    <div class="container-box">
        <p><b>How to use:</b></p>
        <ul>
            <li>Paste <b>one record per line</b> in the box below.</li>
            <li>Each line can be:
                <ul>
                    <li><code>email</code></li>
                    <li><code>email,transaction_id</code></li>
                    <li><code>email,transaction_id,payment_status</code></li>
                </ul>
            </li>
            <li>If <code>payment_status</code> is missing, it defaults to <code>PAID(Verified)</code>.</li>
            <li>If <code>transaction_id</code> is empty, only the payment status is updated (no entry in transactions table).</li>
        </ul>

        <p><b>Examples:</b></p>
        <pre>
someone1@example.com,TXN12345,PAID(Verified)
someone2@example.com,TXN98765,PENDING
someone3@example.com,TXN55555
someone4@example.com
        </pre>

        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="bulk_data" class="form-label">Paste emails (one per line)</label>
                <textarea name="bulk_data" id="bulk_data" rows="10" class="form-control" required><?= isset($_POST['bulk_data']) ? htmlspecialchars($_POST['bulk_data']) : '' ?></textarea>
            </div>
            <button class="btn btn-main w-100">Process Bulk Update</button>
        </form>

        <?php if (!empty($results)): ?>
            <hr>
            <h5>Results:</h5>
            <ul>
                <?php foreach ($results as $msg): ?>
                    <li><?= htmlspecialchars($msg); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
