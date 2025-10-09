<?php
session_start();
include 'adminPages/config.php';


$email = $_SESSION['email'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];

    // Validate login credentials
    $stmt = $conn->prepare("SELECT * FROM AAM WHERE email=? AND mobile=? AND dob=?");
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
body{
  background-color: #A9D6E5;
}
.container { max-width: 500px; margin-top: 100px; }

h2 { text-align: center; margin-bottom: 30px; }
</style>
</head>
<body>
<div class="container">
<h2>Welcome to 22nd Annual Alumni Meet</h2>

<h2>Login to Your Profile</h2>

<?php if(isset($error)): ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label>Email</label>
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
    <button class="btn btn-primary w-100">Login</button>
</form>
</div>
</body>
</html>