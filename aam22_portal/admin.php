<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'test.php'; // your DB connection

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// Select only the fields you need
// $result = $connection->query("SELECT id, name, email, mobile, yog, payment FROM AAM");

$stmt = $connection->prepare("SELECT id, name, email, mobile, yog, payment FROM AAM");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - AAM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url(./aa.webp) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }
        .card {
            border: none;
            background-color: #90CAF9;
            padding: 15px;
            font-size: 0.9rem;
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .card:hover {
            background-color: #61A5C2;
            transform: scale(1.03);
        }
        .card h5 {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .card p {
            margin-bottom: 4px;
        }
        .badge {
            font-size: 0.8rem;
        }
        .btn-sm {
            text: white;
            font-size: 0.75rem;
            padding: 4px 8px;
        }
        .btn-color {
            background-color: #1565C0;
        }
        
    </style>
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4 text-black text-bold">Admin Dashboard</h2>
    <a href="logout_admin.php" class="btn btn-danger mb-3">Logout</a>
    <div class="row g-3">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-3 col-sm-6"> <!-- smaller width -->
                <div class="card shadow-sm">
                    <h5><?php echo htmlspecialchars($row['name']); ?></h5>
                    <p>Email: <?php echo htmlspecialchars($row['email']); ?></p>
                    <p>Phone: <?php echo htmlspecialchars($row['mobile']); ?></p>
                    <p>Year of Graduation: <?php echo htmlspecialchars($row['yog']); ?></p>
                    <p>Payment: 
                        <span class="badge bg-<?php echo $row['payment'] === 'Paid' ? 'success' : 'warning'; ?>">
                            <?php echo htmlspecialchars($row['payment']); ?>
                        </span>
                    </p>
                    <!-- View Profile Button -->
                    <a href="view_user.php?id=<?php echo $row['id']; ?>" class="btn btn-color btn-sm mt-2 w-100 text-white">View Profile</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>