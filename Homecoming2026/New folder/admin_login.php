<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include 'test.php'; // DB connection

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
<html lang="en">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            backdrop-filter: blur(25px);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            /* background: rgba(255, 255, 255, 0.9) */
            border-radius: 40px;
            padding: 30px 25px;
            width: 320px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .login-card h4 {
            color: #1976D2;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .login-card input {
            border-radius: 25px;
        }

        .login-card button {
            border-radius: 25px;
            background-color: #1976D2;
            color: white;
            font-weight: bold;
        }

        .alert {
            border-radius: 25px;
            font-size: 0.9rem;
        }

        @media (max-width: 576px) {
            .login-card {
                width: 90%;
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-card">
    <h4>Admin Login</h4>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
        <button class="btn w-100">Login</button>
    </form>
</div>

<?php $connection->close(); ?>

</body>
</html>