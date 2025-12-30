<?php
session_start();
include 'test.php';
include 'header_aam.php';

if(!isset($_SESSION['email'])){
    header("Location: login_aam.php");
    exit;
}

$email = $_SESSION['email'];

/* ---------- HANDLE UPDATE (POST) ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Only these fields are editable now:
    $medical     = trim($_POST['medical'] ?? '');
    $arrivalMode = trim($_POST['arrivalMode'] ?? '');
    $dateOfArr   = trim($_POST['dateOfArr'] ?? '');
    $timeOfArr   = trim($_POST['timeOfArr'] ?? '');
    $dateOfDep   = trim($_POST['dateOfDep'] ?? '');
    $timeOfDep   = trim($_POST['timeOfDep'] ?? '');

    $update = $connection->prepare("
        UPDATE AAM 
        SET 
            medical = ?,
            arrivalMode = ?, 
            dateOfArr = ?, 
            timeOfArr = ?, 
            dateOfDep = ?, 
            timeOfDep = ?
        WHERE email = ?
    ");
    $update->bind_param(
        "sssssss",
        $medical,
        $arrivalMode,
        $dateOfArr,
        $timeOfArr,
        $dateOfDep,
        $timeOfDep,
        $email
    );
    $update->execute();
    $update->close();
}

/* ---------- FETCH LATEST USER DATA ---------- */
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
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<style>
    body {
        background: url(./aa2a.webp) no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        backdrop-filter: blur(25px);
        font-family: 'Segoe UI', sans-serif;
        color: #012A4A;
    }

    .container {
        margin-top: 40px;
        margin-bottom: 40px;
        max-width: 1000px;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #012A4A;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
    }

    .card {
        margin: 20px auto;
        background: rgba(255, 255, 255, 0.3);
        padding-top: 10px;
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
        width: 90%;
        margin: 1px auto;
        font-weight: bold;
        background: rgba(1, 79, 134, 0.85);
        color: white;
        font-size: 1.2rem;
        padding: 15px;
        border-radius: 200px !important;
        text-align: center;
    }

    .form-control[readonly] {
        background: rgba(255, 255, 255, 0.5);
        border: none;
        font-weight: 500;
        color: #012A4A;
        border-radius: 12px;
        box-shadow: inset 0 0 6px rgba(255,255,255,0.5);
    }

    .form-control {
        border-radius: 12px;
    }

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

    .payment-status {
        font-weight: bold;
        font-size: 1.1rem;
        padding: 5px;
        text-align: center;
        border-radius: 12px;
    }
    .payment-pending {
        background-color: rgba(248, 215, 218, 0.8);
        color: red;
    }
    .payment-complete {
        background-color: rgba(209, 231, 221, 0.8);
        color: #0f5132;
    }

    .btn-danger {
        width: 200px;
        display: block;
        margin: 5px auto;
        border-radius: 25px;
        font-weight: 600;
        background-color: #d62828;
        border: none;
        transition: all 0.3s ease;
        padding: 8px 20px;
        text-align: center;
    }
    .btn-danger:hover {
        background-color: #a4161a;
        transform: scale(1.05);
    }

    .btn-save {
        width: 200px;
        display: block;
        margin: 5px auto;
        border-radius: 25px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
        background-color: #014f86;
        color: #fff;
        padding: 8px 20px;
        text-align: center;
    }
    .btn-save:hover {
        background-color: #013a63;
        transform: scale(1.03);
    }
    .button-row {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

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
        .button-row {
            display: block;
            justify-content: center;
            gap: 0px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    }
</style>
</head>
<body>
<div class="container">

<!-- <h2>Your Profile</h2> -->

<form method="post">

<!-- Personal Details (all read-only) -->
<div class="card">
  <div class="card-header">Personal Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3"><label>Name</label><input class="form-control" value="<?= htmlspecialchars($user['name']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Email</label><input class="form-control" value="<?= htmlspecialchars($user['email']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Mobile</label><input class="form-control" value="<?= htmlspecialchars($user['mobile']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>ID Type</label><input class="form-control" value="<?= htmlspecialchars($user['idtype']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>ID Number</label><input class="form-control" value="<?= htmlspecialchars($user['idnumber']); ?>" readonly></div>
      <div class="col-md-6 mb-3"><label>Date of Birth</label><input class="form-control" value="<?= htmlspecialchars($user['dob']); ?>" readonly></div>
      <div class="col-12 mb-3"><label>Address</label><input class="form-control" value="<?= htmlspecialchars($user['address']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>City</label><input class="form-control" value="<?= htmlspecialchars($user['city']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>State</label><input class="form-control" value="<?= htmlspecialchars($user['state']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>Country</label><input class="form-control" value="<?= htmlspecialchars($user['country']); ?>" readonly></div>
      <div class="col-12 mb-3"><label>Zip Code</label><input class="form-control" value="<?= htmlspecialchars($user['zipcode']); ?>" readonly></div>
    </div>
  </div>
</div>

<!-- Academic Details (all read-only) -->
<div class="card">
  <div class="card-header">Academic Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12 mb-3"><label>Position Held in KGP</label><input class="form-control" value="<?= htmlspecialchars($user['positionHolding']); ?>" readonly></div>
      <div class="col-md-8 mb-3"><label>Course Name</label><input class="form-control" value="<?= htmlspecialchars($user['course']); ?>" readonly></div>
      <div class="col-md-4 mb-3"><label>Degree</label><input class="form-control" value="<?= htmlspecialchars($user['degree']); ?>" readonly></div>
      <div class="col-md-3 mb-3"><label>Department</label><input class="form-control" value="<?= htmlspecialchars($user['dept']); ?>" readonly></div>
      <div class="col-md-3 mb-3"><label>Hall</label><input class="form-control" value="<?= htmlspecialchars($user['hall']); ?>" readonly></div>
      <div class="col-md-3 mb-3"><label>Join Year</label><input class="form-control" value="<?= htmlspecialchars($user['yoj']); ?>" readonly></div>
      <div class="col-md-3 mb-3"><label>Year of Graduation</label><input class="form-control" value="<?= htmlspecialchars($user['yog']); ?>" readonly></div>
    </div>
  </div>
</div>

<!-- Work Details (NOW READ-ONLY) -->
<div class="card">
  <div class="card-header">Work Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Profession</label>
        <input class="form-control" value="<?= htmlspecialchars($user['profession']); ?>" readonly>
      </div>
      <div class="col-md-6 mb-3">
        <label>Designation</label>
        <input class="form-control" value="<?= htmlspecialchars($user['designation']); ?>" readonly>
      </div>
      <div class="col-12 mb-3">
        <label>Organisation</label>
        <input class="form-control" value="<?= htmlspecialchars($user['organisation']); ?>" readonly>
      </div>
      <div class="col-12 mb-3">
        <label>Work Address</label>
        <input class="form-control" value="<?= htmlspecialchars($user['waddress']); ?>" readonly>
      </div>
      <div class="col-md-4 mb-3">
        <label>City</label>
        <input class="form-control" value="<?= htmlspecialchars($user['wcity']); ?>" readonly>
      </div>
      <div class="col-md-4 mb-3">
        <label>State</label>
        <input class="form-control" value="<?= htmlspecialchars($user['wstate']); ?>" readonly>
      </div>
      <div class="col-md-4 mb-3">
        <label>Country</label>
        <input class="form-control" value="<?= htmlspecialchars($user['wcountry']); ?>" readonly>
      </div>
      <div class="col-12 mb-3">
        <label>Zip Code</label>
        <input class="form-control" value="<?= htmlspecialchars($user['wzipcode']); ?>" readonly>
      </div>
    </div>
  </div>
</div>

<!-- Accommodation & Food (only Health Restrictions editable) -->
<div class="card">
  <div class="card-header">Accompanying & Food</div>
  <div class="card-body">
    <div class="row mt-3">
      <div class="col-6 mb-3"><label>Accompanying Person Name</label><input class="form-control" value="<?= htmlspecialchars($user['acc_name']); ?>" readonly></div>
      <div class="col-6 mb-3"><label>Accompanying Person Relation</label><input class="form-control" value="<?= htmlspecialchars($user['acc_relation']); ?>" readonly></div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12 mb-3">
        <label>Health Restrictions</label>
        <input name="medical" class="form-control" value="<?= htmlspecialchars($user['medical']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label>Food Preference</label>
        <input class="form-control" value="<?= htmlspecialchars($user['foodPreference']); ?>" readonly>
      </div>
      <div class="col-6 mt-2">
      <label>Payment Status</label>

        <div class="payment-status <?= ($user['payment'] === 'PENDING') ? 'payment-pending' : 'payment-complete'; ?>">
            <?= htmlspecialchars($user['payment']); ?>
        </div>

        <?php if ($user['payment'] === 'PENDING'): ?>
            <a href="payment_review.php" class="btn-save mt-2 d-inline-block text-center">
                Pay Registration Fee
            </a>
        <?php endif; ?>


      </div>


    </div>
  </div>
</div>

<!-- Travel Details (EDITABLE) -->
<div class="card">
  <div class="card-header">Travel Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12 mb-3">
        <label>Mode of Arrival at Kharagpur</label>
        <input name="arrivalMode" class="form-control" value="<?= htmlspecialchars($user['arrivalMode']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label>Date of Arrival</label>
        <input name="dateOfArr" type="date" class="form-control" value="<?= htmlspecialchars($user['dateOfArr']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label>Time of Arrival</label>
        <input name="timeOfArr" type="time" class="form-control" value="<?= htmlspecialchars($user['timeOfArr']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label>Date of Departure</label>
        <input name="dateOfDep" type="date" class="form-control" value="<?= htmlspecialchars($user['dateOfDep']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label>Time of Departure</label>
        <input name="timeOfDep" type="time" class="form-control" value="<?= htmlspecialchars($user['timeOfDep']); ?>">
      </div>
    </div>
  </div>

  <div class="button-row">
    <button type="submit" class="btn-save">Save Changes</button>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>

</div>

</form>

</div>
</body>
</html>
