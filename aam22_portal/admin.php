<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'test.php'; // your DB connection

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

$stmt = $connection->prepare("SELECT id, name, email, mobile, yog, payment FROM AAM");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - AAM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            backdrop-filter: blur(5px);

            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #fff;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }

        .logout-btn {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 0 15px;
        }

        .alumni-card {
            background: #BBDEFB;
            border-radius: 20px;
            padding: 15px 10px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .alumni-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }

        .alumni-card h5 {
            color: #1976D2;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .alumni-card p {
            margin-bottom: 6px;
            color: #333;
            font-size: 0.95rem;
        }

        .badge {
            font-size: 0.85rem;
            padding: 5px 8px;
            border-radius: 20px;
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
            .alumni-card {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="logout-btn">
        <a href="logout_admin.php" class="btn btn-danger">Logout</a>
    </div>

    <div class="dashboard-grid">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="alumni-card">
                <h5><?= htmlspecialchars($row['name']) ?></h5>
                <p>Email: <?= htmlspecialchars($row['email']) ?></p>
                <p>Phone: <?= htmlspecialchars($row['mobile']) ?></p>
                <p>Year of Graduation: <?= htmlspecialchars($row['yog']) ?></p>
                <p>Payment: 
                    <span class="badge bg-<?= $row['payment'] === 'PAID(Verified)' ? 'success' : 'warning' ?>">
                        <?= htmlspecialchars($row['payment']) ?>
                    </span>
                </p>
                <a href="view_user.php?id=<?= $row['id'] ?>" class="btn btn-color w-100">View Profile</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php $connection->close(); ?>

</body>
</html>