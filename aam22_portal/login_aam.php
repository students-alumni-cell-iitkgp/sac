

<?php
session_start();

include 'test.php'; //db connection on my pc
// include 'config.php';


$email = $_SESSION['email'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];

    // Validate login credentials
    $stmt = $connection->prepare("SELECT * FROM AAM WHERE email=? AND mobile=? AND dob=?");
    $stmt->bind_param("sss", $email, $mobile, $dob);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $_SESSION['email'] = $email; // set session
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<style>
body {
    position: relative;
    min-height: 100vh;
    background: url(./aa.webp);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.container {
    max-width: 500px; /* desktop width */
    width: 100%;
    margin-top: 100px;
    jutify-item: left;
}
.justCenter{
    text-align: center;
}
.instiLogo{
    width: 120px;
}
.blueHead{
    color: #012A4A;
}
.btn-color{
    background-color: #014F86;

}

/* Mobile specific adjustments */
@media (max-width: 576px) {
    .container {
        max-width: 100%;  /* full width on mobile */
        margin-top: 50px; /* optional: adjust spacing */
        padding: 10px;    /* optional: small padding on sides */
    }
}
</style>
</head>
<body>
<div class="container">
    <div class="justCenter">    
        <div class="justCenter container">
            <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
        </div>

        <h2 class=" blueHead text-bold">Welcome to 22nd Annual Alumni Meet 2026</h2>
        <h2 class="blueHead">Login to Your Profile</h2>
        
    </div>
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="justLeft">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <button class="btn text-white btn-color w-100">Login</button>
    </form>
</div>
</body>
</html>
