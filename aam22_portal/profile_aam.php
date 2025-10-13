<?php
session_start();
include 'test.php';
include 'header_aam.php';

if(!isset($_SESSION['email'])){
    header("Location: login_aam.php");
    exit;
}

$email = $_SESSION['email'];
$stmt = $connection->prepare("SELECT * FROM AAM WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$acc_details = [];
if (!empty($user['acc_details'])) {
    $acc_details = json_decode($user['acc_details'], true);
    if ($acc_details === null) $acc_details = [];
}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profile | Alumni Meet</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: url(./aa.webp) no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}
.container { margin-top: 40px; margin-bottom: 40px; }
h2 { text-align: center; margin-bottom: 30px; color: #012A4A; font-weight: bold; }

/* Card Styling */
.card {
    margin-left: 100px;
    margin-right: 100px;
    margin-top: 20px;
    background-color: #90CAF9;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    transition: transform 0.2s;
}
.card:hover { transform: translateY(-3px); }
.card-header {
    font-weight: bold;
    background-color: #1976D2;
    color: white;
    font-size: 1.2rem;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

/* Input styling */
.form-control[readonly] {
    background-color: #E1F7FA;
    border: none;
    font-weight: 500;
    color: #012A4A;
}

/* Accompanying cards */
.acc-card {
    background-color: #61A5C2;
    color: white;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
    margin-bottom: 10px;
    transition: transform 0.2s;
}
.acc-card:hover { transform: scale(1.05); }
.badge { font-size: 0.85rem; }

/* Payment status */
.payment-status {
    font-weight: bold;
    font-size: 1.1rem;
    padding: 8px;
    text-align: center;
    border-radius: 8px;
}
.payment-pending { background-color: #f8d7da; color: #842029; }
.payment-complete { background-color: #d1e7dd; color: #0f5132; }

/* Mobile single-column override */
@media (max-width: 767px) {
    .card {
        width: 100% !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
    .row > [class*="col-md-6"], 
    .row > [class*="col-md-4"] {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        margin-bottom: 15px;
    }
}
</style>
</head>
<body>
<div class="container">

<h2>Profile of <?= htmlspecialchars($user['name']); ?></h2>

<!-- Personal Details -->
<div class="card">
  <div class="card-header">Personal Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3"><label>Name</label><input class="form-control" value="<?= htmlspecialchars($user['name']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Email</label><input class="form-control" value="<?= htmlspecialchars($user['email']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Mobile</label><input class="form-control" value="<?= htmlspecialchars($user['mobile']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Date of Birth</label><input class="form-control" value="<?= htmlspecialchars($user['dob']); ?>" readonly></div>
      <div class="col-12 mb-3"><label>Address</label><input class="form-control" value="<?= htmlspecialchars($user['address']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>City</label><input class="form-control" value="<?= htmlspecialchars($user['city']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>State</label><input class="form-control" value="<?= htmlspecialchars($user['state']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>Country</label><input class="form-control" value="<?= htmlspecialchars($user['country']); ?>" readonly></div>
      <div class="col-12 mb-3"><label>Zip Code</label><input class="form-control" value="<?= htmlspecialchars($user['zipcode']); ?>" readonly></div>
    </div>
  </div>
</div>

<!-- Accommodation & Food -->
<div class="card">
  <div class="card-header">Accommodation & Food</div>
  <div class="card-body">
    <label>Accompanying Person(s)</label>
    <?php if (!empty($acc_details)): ?>
      <div class="row g-2">
        <?php foreach ($acc_details as $acc): ?>
          <div class="col-12">
            <div class="acc-card">
              <h6><?= htmlspecialchars($acc['name'] ?? ''); ?></h6>
              <?php if (!empty($acc['relation'])): ?>
                <span class="badge bg-light text-dark"><?= htmlspecialchars($acc['relation']); ?></span>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <input class="form-control" value="No accompanying persons" readonly>
    <?php endif; ?>

    <div class="row mt-3">
      <div class="col-md-6 mb-3"><label>Accompanying Kid(s)</label><input class="form-control" value="<?= htmlspecialchars($user['acc_kid']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Food Preference</label><input class="form-control" value="<?= htmlspecialchars($user['foodPreference']); ?>" readonly></div>
      <div class="col-12 mt-2">
        <label>Payment Status</label>
        <div class="payment-status <?= ($user['payment'] === 'Pending') ? 'payment-pending' : 'payment-complete'; ?>">
            <?= htmlspecialchars($user['payment']); ?>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!-- Work Details -->
<div class="card">
  <div class="card-header">Work Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3"><label>Profession</label><input class="form-control" value="<?= htmlspecialchars($user['profession']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Designation</label><input class="form-control" value="<?= htmlspecialchars($user['designation']); ?>" readonly></div>
      <div class="col-12 mb-3"><label>Organisation</label><input class="form-control" value="<?= htmlspecialchars($user['organisation']); ?>" readonly></div>
      <div class="col-12 mb-3"><label>Work Address</label><input class="form-control" value="<?= htmlspecialchars($user['waddress']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>City</label><input class="form-control" value="<?= htmlspecialchars($user['wcity']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>State</label><input class="form-control" value="<?= htmlspecialchars($user['wstate']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>Country</label><input class="form-control" value="<?= htmlspecialchars($user['wcountry']); ?>" readonly></div>
      <div class="col-12 mb-3"><label>Zip Code</label><input class="form-control" value="<?= htmlspecialchars($user['wzipcode']); ?>" readonly></div>
    </div>
  </div>
</div>

<!-- Academic Details -->
<div class="card">
  <div class="card-header">Academic Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 mb-3"><label>Roll No</label><input class="form-control" value="<?= htmlspecialchars($user['rollno']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>Degree</label><input class="form-control" value="<?= htmlspecialchars($user['degree']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>Department</label><input class="form-control" value="<?= htmlspecialchars($user['dept']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Hall</label><input class="form-control" value="<?= htmlspecialchars($user['hall']); ?>" readonly></div>
      <div class="col-md-3 mb-3"><label>Join Year</label><input class="form-control" value="<?= htmlspecialchars($user['yoj']); ?>" readonly></div>
      <div class="col-md-3 mb-3"><label>Year of Graduation</label><input class="form-control" value="<?= htmlspecialchars($user['yog']); ?>" readonly></div>
    </div>
  </div>
</div>

<!-- Travel Details -->
<div class="card">
  <div class="card-header">Travel Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3"><label>Date of Arrival</label><input class="form-control" value="<?= htmlspecialchars($user['dateOfArr']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Time of Arrival</label><input class="form-control" value="<?= htmlspecialchars($user['timeOfArr']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Date of Departure</label><input class="form-control" value="<?= htmlspecialchars($user['dateOfDep']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Time of Departure</label><input class="form-control" value="<?= htmlspecialchars($user['timeOfDep']); ?>" readonly></div>
    </div>
  </div>
  <a href="logout.php" class="btn btn-danger mt-3 w-20">Logout</a>
</div>

</div>
</body>
</html>