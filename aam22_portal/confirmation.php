<?php
session_start();

include 'config.php';


if (!isset($_SESSION["email"])) {
    echo "No registration found!";
    exit;
}

$email = $_SESSION["email"];
$sql = "SELECT * FROM AAM WHERE email='$email' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No registration found!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration Successful</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/signup_aam.css"> -->
<style>
body {
     background-color: #A9D6E5; 
     position: relative;
    min-height: 100vh;
    background: url(./../img/aa.webp);
    background-size: cover;
    background-repeat: no-repeat;
  background-attachment: fixed;
  z-index: -88;
    }
.container { margin-top: 50px; max-width: 1000px; background: #f1f2f6; padding: 30px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
h2 { color: #198754; }
.table td, .table th { vertical-align: middle; }
</style>
</head>
<body>

<div class="container">
    <h2>Registration Successful!</h2>
    <p>Thank you, <strong><?php echo htmlspecialchars($user['name']); ?></strong>for registering for the 22nd Annual Alumni Meet at IIT Kharagpur.
We are delighted to have you join us for this special occasion celebrating the KGP spirit and lifelong connections.
Your registration has been successfully received.
For further details regarding the program schedule, accommodation, registration fee payment, and logistics, please log in to the <a href="login_aam.php" class="btn btn-primary">
Annual Alumni Meet Portal.</a>
For any queries, you may also write to us at alumni@iitkgp.ac.in</p>

    <table class="table table-bordered">
        <tr><th>Email</th><td><?php echo htmlspecialchars($user['email']); ?></td></tr>
        <tr><th>Name</th><td><?php echo htmlspecialchars($user['name']); ?></td></tr>
        <tr><th>Mobile</th><td><?php echo htmlspecialchars($user['mobile']); ?></td></tr>
        <tr><th>Date of Birth</th><td><?php echo htmlspecialchars($user['dob']); ?></td></tr>

        <tr><th>Profession</th><td><?php echo htmlspecialchars($user['profession']); ?></td></tr>
        <tr><th>Organisation</th><td><?php echo htmlspecialchars($user['organisation']); ?></td></tr>
        <tr><th>Designation</th><td><?php echo htmlspecialchars($user['designation']); ?></td></tr>

        <tr><th>Department</th><td><?php echo htmlspecialchars($user['dept']); ?></td></tr>
        <tr><th>Hall</th><td><?php echo htmlspecialchars($user['hall']); ?></td></tr>
        <tr><th>Join Year</th><td><?php echo htmlspecialchars($user['yoj']); ?></td></tr>
        <tr><th>Graduation Year</th><td><?php echo htmlspecialchars($user['yog']); ?></td></tr>
        <tr><th>Accompanying Persons</th><td><?php echo htmlspecialchars($user['accompaniment']); ?></td></tr>


        <tr><th>Food Preference</th><td><?php echo htmlspecialchars($user['foodPreference']); ?></td></tr>
        <tr><th>Date of Arrival</th><td><?php echo htmlspecialchars($user['dateOfArr']); ?></td></tr>
        <tr><th>Time of Arrival</th><td><?php echo htmlspecialchars($user['timeOfArr']); ?></td></tr>
        <tr><th>Date of Departure</th><td><?php echo htmlspecialchars($user['dateOfDep']); ?></td></tr>
        <tr><th>Time of Departure</th><td><?php echo htmlspecialchars($user['timeOfDep']); ?></td></tr>

        <!-- Add this wherever you want the button on the registration page -->
        
    </table>
    <div class="text-center mt-3 button">
        <a href="profile_aam.php" class="btn btn-primary">
            Go to Your Profile
        </a>
    </div>
<!-- 
    <div class="text-center mt-4">
        <button class="btn btn-success" onclick="window.print()">Print Registration</button>
        <a href="signup.php" class="btn btn-primary">Register Another</a>
    </div> -->
</div>

</body>
</html>
