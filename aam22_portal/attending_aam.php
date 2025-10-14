<?php
session_start();
include 'header_aam.php';
include 'test.php'; // DB connection

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login_aam.php");
    exit;
}

// Fetch alumni
$result = $connection->query("SELECT name, hall, dept, yog FROM AAM ORDER BY yog DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Alumni | Alumni Meet</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <style>
        body { 
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            backdrop-filter: blur(15px);
            font-family: 'Arial', sans-serif;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #012A4A;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
        }

        .alumni-grid-1 {
            display: grid;
            /* grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); */
            gap: 20px;
            padding: 0 15px;
        }

        .alumni-card {
            background: rgba(255, 255, 255, 0.5);
            border: none;
            font-weight: 500;
            color: #012A4A;
            border-radius: 12px;
            box-shadow: inset 0 0 6px rgba(255,255,255,0.5);
            /* background-color:  #BBDEFB; */
            backdrop-filter: blur(20px);

            border-radius: 20px;
            padding: 15px 15px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s; 
        }

        .alumni-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }

        .alumni-name {
            font-size: 1.2rem;
            font-weight: bold;
            color: #1565C0;
            margin-bottom: 10px;
        }

        .alumni-info {
            font-size: 0.95rem;
            color: #333;
            margin-bottom: 5px;
        }
        @media (min-width: 766px) {

            .alumni-grid-1 {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            }
        }

        @media (max-width: 766px) {
            h2 {
                font-size: 1.5rem;
            }


            .alumni-grid-1 {
                display: grid;
                /* grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); */
                grid-template-columns: 1fr; /* single column */
                gap: 20px;
                padding: 0 15px;
            }

            .alumni-card {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registered Alumni Attending 22nd AAM 2026</h2>

    <div class="alumni-grid-1">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="alumni-card">
                <div class="alumni-name"><?= htmlspecialchars($row['name']) ?></div>
                <div class="alumni-info"><strong>Hall:</strong> <?= htmlspecialchars($row['hall']) ?></div>
                <div class="alumni-info"><strong>Dept:</strong> <?= htmlspecialchars($row['dept']) ?></div>
                <div class="alumni-info"><strong>Batch:</strong> <?= htmlspecialchars($row['yog']) ?></div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php $connection->close(); ?>

</body>
</html>