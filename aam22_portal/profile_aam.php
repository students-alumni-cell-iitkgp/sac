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
<title>Profile | Annual Alumni Meet</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: url(./aa2a.webp) no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        backdrop-filter: blur(6px);
        font-family: 'Segoe UI', sans-serif;
        color: #012A4A;
    }

    /* === PAGE CONTAINER === */
    .container {
        margin-top: 40px;
        margin-bottom: 40px;
        max-width: 1000px;
    }

    /* === PAGE HEADING === */
    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #012A4A;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
    }

    /* === CARD / BUBBLE DESIGN === */
    .card {
        margin: 20px auto;
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.4);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        font-weight: bold;
        background: rgba(1, 79, 134, 0.85);
        color: white;
        font-size: 1.2rem;
        padding: 15px;
        border-top-left-radius: 23px;
        border-top-right-radius: 23px;
        text-align: center;
    }

    /* === INPUT FIELDS === */
    .form-control[readonly] {
        background: rgba(255, 255, 255, 0.5);
        border: none;
        font-weight: 500;
        color: #012A4A;
        border-radius: 12px;
        box-shadow: inset 0 0 6px rgba(255,255,255,0.5);
    }

    /* === ACCOMPANYING PERSON CARDS === */
    .acc-card {
        background: rgba(1, 79, 134, 0.8);
        color: white;
        border-radius: 15px;
        padding: 10px;
        text-align: center;
        margin-bottom: 10px;
        transition: transform 0.2s, background 0.3s;
    }
    .acc-card:hover {
        transform: scale(1.05);
        background: rgba(1, 79, 134, 1);
    }
    .badge {
        background: rgba(255, 255, 255, 0.85);
        color: #012A4A;
        font-size: 0.8rem;
    }

    /* === PAYMENT STATUS BOX === */
    .payment-status {
        font-weight: bold;
        font-size: 1.1rem;
        padding: 10px;
        text-align: center;
        border-radius: 12px;
        margin-top: 5px;
    }
    .payment-pending {
        background-color: rgba(248, 215, 218, 0.8);
        color: #842029;
    }
    .payment-complete {
        background-color: rgba(209, 231, 221, 0.8);
        color: #0f5132;
    }

    /* === LOGOUT BUTTON === */
    .btn-danger {
        display: block;
        margin: 20px auto;
        border-radius: 25px;
        font-weight: 600;
        background-color: #d62828;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-danger:hover {
        background-color: #a4161a;
        transform: scale(1.05);
    }

    /* === MOBILE RESPONSIVE === */
    @media (max-width: 767px) {
        .card {
          
            width: 100% !important;
            margin: 15px 0;
            border-radius: 20px;
            padding: 10px;
        }
        .card-header {
            font-size: 1rem;
            padding: 12px;
        }
        .form-control[readonly] {
            font-size: 0.95rem;
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