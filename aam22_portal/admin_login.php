<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


// include 'config.php'; // your DB connection

include 'test.php'; //db connection on my pc

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid login credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
					background: url(./aa.webp) no-repeat center center fixed;
    			background-size: cover;
    			min-height: 100vh;
			 }
             .btn-color {
                
            background-color: #1976D2;
        }
        .card {
            border: none;
                
            background-color: #42A5F5;
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
<div class="card p-4 " style="width: 350px;">
    <h4 class="text-center mb-3 text-bold">Admin Login</h4>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button class="btn btn-color text-white w-100">Login</button>
    </form>
</div>
</body>
</html>