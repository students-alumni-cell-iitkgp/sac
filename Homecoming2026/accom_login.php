<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


$ACCOM_USERS = [
    [
        'username' => 'accomLogin01',
        'password' => password_hash('accomLogin@01', PASSWORD_DEFAULT)
    ],
    [
        'username' => 'naksh1972',
        'password' => password_hash('N@k$h2512#1972', PASSWORD_DEFAULT)
    ],
    [
        'username' => 'accom3',
        'password' => password_hash('Guest@789', PASSWORD_DEFAULT)
    ]
];


$error = '';

if (isset($_POST['login'])) {
    $u = trim($_POST['username']);
    $p = $_POST['password'];

    foreach ($ACCOM_USERS as $user) {
        if ($user['username'] === $u && password_verify($p, $user['password'])) {
            $_SESSION['accom_logged_in'] = true;
            $_SESSION['accom_user'] = $u;
            header("Location: accom_desk.php");
            exit();
        }
    }
    $error = "Invalid credentials";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Accommodation Login</title>
<style>
body {
    background: url(./aa2a.webp) no-repeat center center fixed;
    background-size: cover;
    backdrop-filter: blur(15px);
    display:flex; justify-content:center; align-items:center;
    height:100vh; font-family:Poppins,sans-serif;
}
.box {
    background: rgba(0,0,0,.75);
    padding:30px; border-radius:12px; color:#fff; width:350px;
}
input, button { width:100%; padding:12px; margin-bottom:12px; border-radius:6px; border:none; }
button { background:#007bff; color:#fff; cursor:pointer; }
.error { background:#dc3545; padding:10px; border-radius:6px; margin-bottom:10px; }
</style>
</head>

<body>
<div class="box">
<h2 align="center">Accommodation Desk</h2>
<?php if($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
<form method="post">
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>
</div>
</body>
</html>