<?php
session_start();
include 'test.php'; // DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];

    $stmt = $connection->prepare("SELECT * FROM AAM WHERE email=? AND mobile=? AND dob=?");
    $stmt->bind_param("sss", $email, $mobile, $dob);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['email'] = $email;
        header("Location: profile_aam.php");
        exit;
    } else {
        $error = "Invalid credentials! Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Alumni Meet</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* === Background === */
body {
    background: url(./aa2.webp) no-repeat center center fixed;
    background-size: cover;
    backdrop-filter: blur(5px);

	min-height: 100vh;
    margin: 0;
    padding: 0;
    height: 100vh;
    /* background: linear-gradient(135deg, #2196F3, #90CAF9); */
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    color: white;
}

/* === Glassmorphism Login Box === */
.login-box {
    /* background: #90CAF9; */
    backdrop-filter: blur(12px);
    border-radius: 15px;
    padding: 40px 35px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    width: 380px;
    max-width: 90%;
    text-align: center;
}

.login-box h2 {
    font-weight: 600;
    margin-bottom: 25px;
    color: #0D47A1;
}

/* === Input Fields === */
.form-control {
    background: #BBDEFB;
    border: none;
    border-radius: 30px;
    padding: 12px 20px;
    color: black;
    font-size: 15px;
}

.form-control::placeholder {
    color: black;
}

.form-control:focus {
    outline: none;
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
}

/* === Button === */
.btn-login {
    background: #1976D2;
    color: white;
    border: none;
    border-radius: 30px;
    padding: 12px;
    font-weight: bold;
    width: 100%;
    transition: 0.3s;
}

.btn-login:hover {
    background: #0D47A1;
}

/* === Extra Links === */
.links {
    margin-top: 15px;
    font-size: 14px;
}

.links a {
    color: #fff;
    text-decoration: underline;
}

/* === Error Box === */
.alert {
    border-radius: 10px;
}

.justCenter{
    text-align: center;
}
.instiLogo{
    height: 85px;
    margin: 10px;
}
</style>
</head>
<body>
    <div class="login-box">
        <div class="justCenter container">
                <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
                <img class="instiLogo" src="./img/palJubLogo.png" alt="">
        </div>
        <h2 class="color-black">Login to Your Profile</h2>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger py-2"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile" required>
            </div>
            <div class="mb-3">
                <input type="date" name="dob" class="form-control" required>
            </div>

            <button class="btn-login" type="submit">Login</button>
        </form>
    </div>
</body>
</html>