<?php
session_start();
include 'config.php';
include 'header_aam.php';

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

$acc_details = [];
if (!empty($user['acc_details'])) {
    $acc_details = json_decode($user['acc_details'], true);
    if ($acc_details === null) $acc_details = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profile | Alumni Meet</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background: url(./../img/aa.webp) no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
  }
  .container { margin-top: 40px; margin-bottom: 40px; }
  h2 { text-align: center; margin-bottom: 30px; color: #012A4A; }
  .card { 
    margin-bottom: 20px;
    background-color: #A9D6E5;
    border-radius: 5px; }
  .card-header { font-weight: bold; background-color: #61A5C2; text: white; font-size: 1.1rem;}
  .payment-status { font-weight: bold; font-size: 1.1rem; padding: 6px; text-align: center; border-radius: 5px; }
  .payment-pending { background-color: #f8d7da; color: #842029; }
  .payment-complete { background-color: #d1e7dd; color: #0f5132; }
  .badge { font-size: 0.85rem; }
</style>
</head>
<body>
<div class="container">

<h2>Profile of <?= htmlspecialchars($user['name']); ?></h2>

<!-- Personal Details -->
<div class="card shadow-sm">
  <div class="card-header">Personal Details</div>
  <div class="card-body">
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
  </div>
</div>

<!-- Accommodation & Food -->
<div class="card shadow-sm">
  <div class="card-header">Accommodation & Food</div>
  <div class="card-body">
    <div class="mb-3">
      <label>Accompanying Person(s)</label>
      <?php if (!empty($acc_details)): ?>
        <div class="row g-2">
          <?php foreach ($acc_details as $acc): ?>
            <div class="col-md-4">
              <div class="card shadow-sm p-2 text-center">
                <h6 class="mb-1"><?= htmlspecialchars($acc['name'] ?? ''); ?></h6>
                <?php if (!empty($acc['relation'])): ?>
                  <span class="badge bg-primary"><?= htmlspecialchars($acc['relation']); ?></span>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <input class="form-control" value="No accompanying persons" readonly>
      <?php endif; ?>
    </div>
    <div class="row mb-3">
      <div class="col-md-3"><label>Accompanying Kid(s)</label><input class="form-control" value="<?= htmlspecialchars($user['acc_kid']); ?>" readonly></div>
      <div class="col-md-9"><label>Food Preference</label><input class="form-control" value="<?= htmlspecialchars($user['foodPreference']); ?>" readonly></div>
    </div>
    <div class="mb-3">
      <label>Payment Status</label>
      <div class="payment-status <?= ($user['payment'] === 'Pending') ? 'payment-pending' : 'payment-complete'; ?>">
        <?= htmlspecialchars($user['payment']); ?>
      </div>
    </div>
    <div class="mb-3"><label>Total Registration Cost</label><input class="form-control" value="<?= htmlspecialchars($user['cost']); ?>" readonly></div>
  </div>
</div>

<!-- Work Details -->
<div class="card shadow-sm">
  <div class="card-header">Work Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3"><label>Profession</label><input class="form-control" value="<?= htmlspecialchars($user['profession']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Designation</label><input class="form-control" value="<?= htmlspecialchars($user['designation']); ?>" readonly></div>
    </div>
    <div class="mb-3"><label>Organisation</label><input class="form-control" value="<?= htmlspecialchars($user['organisation']); ?>" readonly></div>
    <div class="mb-3"><label>Work Address</label><input class="form-control" value="<?= htmlspecialchars($user['waddress']); ?>" readonly></div>
    <div class="row">
      <div class="col-md-4 mb-3"><label>City</label><input class="form-control" value="<?= htmlspecialchars($user['wcity']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>State</label><input class="form-control" value="<?= htmlspecialchars($user['wstate']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>Country</label><input class="form-control" value="<?= htmlspecialchars($user['wcountry']); ?>" readonly></div>
    </div>
    <div class="mb-3"><label>Zip Code</label><input class="form-control" value="<?= htmlspecialchars($user['wzipcode']); ?>" readonly></div>
  </div>
</div>

<!-- Academic Details -->
<div class="card shadow-sm">
  <div class="card-header">Academic Details</div>
  <div class="card-body">
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
  </div>
</div>

<!-- Travel Details -->
<div class="card shadow-sm">
  <div class="card-header">Travel Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3"><label>Date of Arrival</label><input class="form-control" value="<?= htmlspecialchars($user['dateOfArr']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Time of Arrival</label><input class="form-control" value="<?= htmlspecialchars($user['timeOfArr']); ?>" readonly></div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3"><label>Date of Departure</label><input class="form-control" value="<?= htmlspecialchars($user['dateOfDep']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Time of Departure</label><input class="form-control" value="<?= htmlspecialchars($user['timeOfDep']); ?>" readonly></div>
    </div>
  </div>
</div>

<a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</div>
</body>
</html>