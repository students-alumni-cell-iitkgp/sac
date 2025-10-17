<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'test.php'; // your DB connection

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

if ($filter == 'PENDING' || $filter == 'PAID(Verified)') {
    $stmt = $connection->prepare("SELECT id, name, email, mobile, yog, payment FROM AAM WHERE payment = ?");
    $stmt->bind_param("s", $filter);
} else {
    $stmt = $connection->prepare("SELECT id, name, email, mobile, yog, payment FROM AAM");
}

$stmt->execute();
$result = $stmt->get_result();
$count = $result->num_rows;


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
            backdrop-filter: blur(25px);

            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: black;
            text-shadow: 1px 1px 5px rgba(255, 255, 255, 0.5);
            margin-bottom: 30px;
        }
        h3 {
            text-align: center;
            font-size: 1.7rem;
            font-weight: bold;
            color: black;
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

        .logout-btn {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
            gap: 20px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 0 15px;
        }

        .alumni-card {
            background: rgba(255, 255, 255, 0.3);
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

<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="logout-btn">
        <a href="home_aam.php" class="btn">Home</a>
        <a href="logout_admin.php" class="btn">Logout</a>
        <a href="export_csv.php" class="btn">Download AAM csv</a>
        <a href="export_transactions.php" class="btn">Download Transactions csv</a>
    </div>
    <h3>Total Registrations: <?php echo $count; ?></h3>
    
<div class="logout-btn">
    <form method="GET" action="">
    <label for="filter" style="font-weight:bold;">Filter by Payment:</label>
    <select name="filter" id="filter" onchange="this.form.submit()">
        <option value="">-- All Payments --</option>
        <option value="Paid" <?php if(isset($_GET['filter']) && $_GET['filter']=='Paid') echo 'selected'; ?>>Paid</option>
        <option value="Unpaid" <?php if(isset($_GET['filter']) && $_GET['filter']=='Unpaid') echo 'selected'; ?>>Unpaid</option>
    </select>
    </form>
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