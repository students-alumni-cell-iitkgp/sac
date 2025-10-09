<?php
session_start();
include 'header_aam.php'; // include your header
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: login_aam.php");
    exit;
}

$result = $conn->query("SELECT name, hall, dept, yog FROM AAM ORDER BY yog DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Alumni | Alumni Meet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body { background: url(./../img/aa.webp) no-repeat center center fixed;
    			background-size: cover;
    			min-height: 100vh;}
        .table-container { margin-top: 50px; }
        .blueDark{ background-color: #01497C; color: white;}
    </style>
</head>
<body>

<div class="container table-container">
    <h2 class="mb-4">Registered Alumni Attending AAM</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table blueDark">
                <tr>
                    <th>Name</th>
                    <th>Hall</th>
                    <th>Department</th>
                    <th>Batch (Year of Graduation)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $conn->query("SELECT name, hall, dept, yog FROM AAM ORDER BY yog DESC");
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>
                        <td>".htmlspecialchars($row['name'])."</td>
                        <td>".htmlspecialchars($row['hall'])."</td>
                        <td>".htmlspecialchars($row['dept'])."</td>
                        <td>".htmlspecialchars($row['yog'])."</td>
                    </tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>