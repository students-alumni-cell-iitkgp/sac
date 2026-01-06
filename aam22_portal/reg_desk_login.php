<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// include 'reg_desk_users.php';

// reg_desk_users.php

$REG_DESK_USERS = [
    [
        'username' => 'RegDesk01',
        'password' => password_hash('RegDesk@01', PASSWORD_DEFAULT)
    ],
    [
        'username' => 'naksh1972',
        'password' => password_hash('N@k$h2512#1972', PASSWORD_DEFAULT)
    ],
    [
        'username' => 'n@ksh#1972',
        'password' => password_hash('N@ksh@aam#sac1972', PASSWORD_DEFAULT)
    ],
    [
        'username' => 'admin4',
        'password' => password_hash('Kit@2024', PASSWORD_DEFAULT)
    ],
    [
        'username' => 'admin5',
        'password' => password_hash('AAM@Login', PASSWORD_DEFAULT)
    ]
];

$error = '';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    foreach ($REG_DESK_USERS as $user) {
        if (
            $user['username'] === $username &&
            password_verify($password, $user['password'])
        ) {
            $_SESSION['reg_desk_logged_in'] = true;
            $_SESSION['reg_desk_user'] = $username;
            header("Location: reg_desk.php");
            exit();
        }
    }

    $error = "Invalid username or password";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Desk Login</title>

    <style>
        body {
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(15px);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-box {
            width: 360px;
            padding: 30px;
            border-radius: 12px;
            background: rgba(142, 224, 239, 0.05);
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        input {
            width: 90%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: none;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .error {
            background: #dc3545;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
        }

        .hint {
            margin-top: 15px;
            font-size: 12px;
            opacity: 0.8;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Registration Desk Login</h2>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <div class="hint">
        Authorized Personnel Only
    </div>
</div>

</body>
</html>