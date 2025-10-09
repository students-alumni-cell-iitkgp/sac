<?php
session_start();
include 'adminPages/config.php';

if(!isset($_SESSION['email'])){
    header("Location: login_aam.php");
    exit;
}

$email = $_SESSION['email'];

// Fetch user data
$stmt = $conn->prepare("SELECT * FROM AAM WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch guest house availability for display
$gh_stmt = $conn->query("SELECT * FROM acco");
$guestHouses = [];
while($row = $gh_stmt->fetch_assoc()) {
    $guestHouses[$row['name']] = $row['av'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profile | Alumni Meet</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<style>
  body{
    background-color: #A9D6E5; 
  }
.container { max-width: 900px; margin-top: 30px; }
h2 { text-align: center; margin-bottom: 30px; }
section { margin-bottom: 25px; }
label { font-weight: bold; }
input[readonly], textarea[readonly] {
    background-color: #e9ecef;
}
.payment-status {
    font-weight: bold;
    font-size: 1.2em;
    padding: 8px;
    text-align: center;
    border-radius: 5px;
}
.payment-pending { background-color: #f8d7da; color: #842029; }
.payment-complete { background-color: #d1e7dd; color: #0f5132; }
</style>
</head>
<body>
<div class="container">
<h2>Profile of <?= htmlspecialchars($user['name']); ?></h2>

<!-- Personal Details -->
<section>
<h4>Personal Details</h4>
<div class="row">
  <div class="col-md-6 mb-3"><label>Name</label><input class="form-control" value="<?= htmlspecialchars($user['name']); ?>" readonly></div>
  <div class="col-md-6 mb-3"><label>Email</label><input class="form-control" value="<?= htmlspecialchars($user['email']); ?>" readonly></div>
</div>
<div class="row">
  <div class="col-md-6 mb-3"><label>Mobile</label><input class="form-control" value="<?= htmlspecialchars($user['mobile']); ?>" readonly></div>
  <div class="col-md-6 mb-3"><label>Date of Birth</label><input class="form-control" value="<?= htmlspecialchars($user['dob']); ?>" readonly></div>
</div>
<div class="mb-3"><label>Address</label><input class="form-control" value="<?= htmlspecialchars($user['address']); ?>" readonly></div>
<div class="row">
  <div class="col-md-4 mb-3"><label>City</label><input class="form-control" value="<?= htmlspecialchars($user['city']); ?>" readonly></div>
  <div class="col-md-4 mb-3"><label>State</label><input class="form-control" value="<?= htmlspecialchars($user['state']); ?>" readonly></div>
  <div class="col-md-4 mb-3"><label>Country</label><input class="form-control" value="<?= htmlspecialchars($user['country']); ?>" readonly></div>
</div>
<div class="mb-3"><label>Zip Code</label><input class="form-control" value="<?= htmlspecialchars($user['zipcode']); ?>" readonly></div>
</section>

<!-- Accommodation -->
<section>
<h4>Accommodation & Food</h4>
<div class="row">
  <div class="col-md-6 mb-3"><label>Guest House</label>
      <input class="form-control" value="<?= htmlspecialchars($user['gh']); ?> (<?= $guestHouses[$user['gh']] ?? 'N/A'; ?> rooms available)" readonly>
  </div>
  <div class="col-md-3 mb-3"><label>Accompanying Person(s)</label>
      <input class="form-control" value="<?= htmlspecialchars($user['accompaniment']); ?>" readonly>
  </div>
  <div class="col-md-3 mb-3"><label>Accompanying Kid(s)</label>
      <input class="form-control" value="<?= htmlspecialchars($user['acc_kid']); ?>" readonly>
  </div>
</div>
<div class="mb-3"><label>Food Preference</label><input class="form-control" value="<?= htmlspecialchars($user['foodPreference']); ?>" readonly></div>
<div class="mb-3">
    <label>Payment Status</label>
    <div class="payment-status <?= ($user['payment'] === 'Pending') ? 'payment-pending' : 'payment-complete'; ?>">
        <?= htmlspecialchars($user['payment']); ?>
    </div>
</div>
<div class="mb-3"><label>Total Registration Cost</label><input class="form-control" value="<?= htmlspecialchars($user['cost']); ?>" readonly></div>
</section>

<!-- Work Details -->
<section>
<h4>Work Details</h4>
<div class="row">
  <div class="col-md-6 mb-3"><label>Industry</label><input class="form-control" value="<?= htmlspecialchars($user['industry']); ?>" readonly></div>
  <div class="col-md-6 mb-3"><label>Profession</label><input class="form-control" value="<?= htmlspecialchars($user['profession']); ?>" readonly></div>
</div>
<div class="row">
  <div class="col-md-6 mb-3"><label>Organisation</label><input class="form-control" value="<?= htmlspecialchars($user['organisation']); ?>" readonly></div>
  <div class="col-md-6 mb-3"><label>Designation</label><input class="form-control" value="<?= htmlspecialchars($user['designation']); ?>" readonly></div>
</div>
<div class="mb-3"><label>Work Address</label><input class="form-control" value="<?= htmlspecialchars($user['waddress']); ?>" readonly></div>
<div class="row">
  <div class="col-md-4 mb-3"><label>City</label><input class="form-control" value="<?= htmlspecialchars($user['wcity']); ?>" readonly></div>
  <div class="col-md-4 mb-3"><label>State</label><input class="form-control" value="<?= htmlspecialchars($user['wstate']); ?>" readonly></div>
  <div class="col-md-4 mb-3"><label>Country</label><input class="form-control" value="<?= htmlspecialchars($user['wcountry']); ?>" readonly></div>
</div>
<div class="mb-3"><label>Zip Code</label><input class="form-control" value="<?= htmlspecialchars($user['wzipcode']); ?>" readonly></div>
</section>

<!-- Academic Details -->
<section>
<h4>Academic Details</h4>
<div class="row">
  <div class="col-md-4 mb-3"><label>Roll No</label><input class="form-control" value="<?= htmlspecialchars($user['rollno']); ?>" readonly></div>
  <div class="col-md-4 mb-3"><label>Degree</label><input class="form-control" value="<?= htmlspecialchars($user['degree']); ?>" readonly></div>
  <div class="col-md-4 mb-3"><label>Department</label><input class="form-control" value="<?= htmlspecialchars($user['dept']); ?>" readonly></div>
</div>
<div class="row">
  <div class="col-md-6 mb-3"><label>Hall</label><input class="form-control" value="<?= htmlspecialchars($user['hall']); ?>" readonly></div>
  <div class="col-md-3 mb-3"><label>Join Year</label><input class="form-control" value="<?= htmlspecialchars($user['yoj']); ?>" readonly></div>
  <div class="col-md-3 mb-3"><label>Year of Graduation</label><input class="form-control" value="<?= htmlspecialchars($user['yog']); ?>" readonly></div>
</div>
</section>

<!-- Travel Details -->
<section>
<h4>Travel Details</h4>
<div class="row">
  <div class="col-md-6 mb-3"><label>Date of Arrival</label><input class="form-control" value="<?= htmlspecialchars($user['dateOfArr']); ?>" readonly></div>
  <div class="col-md-6 mb-3"><label>Time of Arrival</label><input class="form-control" value="<?= htmlspecialchars($user['timeOfArr']); ?>" readonly></div>
</div>
<div class="row">
  <div class="col-md-6 mb-3"><label>Date of Departure</label><input class="form-control" value="<?= htmlspecialchars($user['dateOfDep']); ?>" readonly></div>
  <div class="col-md-6 mb-3"><label>Time of Departure</label><input class="form-control" value="<?= htmlspecialchars($user['timeOfDep']); ?>" readonly></div>
</div>
</section>

<a href="logout.php" class="btn btn-danger mb-3">Logout</a>
</div>
</body>
</html>