<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['accom_logged_in'])) {
    header("Location: accom_login.php");
    exit();
}

include 'test.php';

/* ---------- VALIDATE ID ---------- */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Request");
}
$id = intval($_GET['id']);

/* ---------- HANDLE ACCOMMODATION UPDATE ---------- */
if (isset($_POST['update_accommodation'])) {
    $guestHouse = trim($_POST['guest_house']);
    $roomNo     = trim($_POST['room_no']);
    $checkIn    = $_POST['check_in'];

    $stmt = $connection->prepare(
        "UPDATE AAM 
         SET guest_house = ?, room_no = ?, check_in = ?
         WHERE id = ?"
    );
    $stmt->bind_param("sssi", $guestHouse, $roomNo, $checkIn, $id);
    $stmt->execute();

    header("Location: accom_view.php?id=".$id);
    exit;
}

/* ---------- FETCH ALUMNI ---------- */
$stmt = $connection->prepare("SELECT * FROM AAM WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    die("Record not found");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Accommodation Desk View</title>

<style>
body {
    background: url(./aa2a.webp) no-repeat center center fixed;
    background-size: cover;
    backdrop-filter: blur(18px);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    color: #fff;
}
.container {
    width: 60%;
    margin: 40px auto;
    padding: 25px;
    border-radius: 14px;
    background: rgba(0,0,0,0.65);
}
.row {
    padding: 10px;
    margin-bottom: 8px;
    background: rgba(255,255,255,0.15);
    border-radius: 6px;
}
.label {
    font-weight: bold;
    width: 200px;
    display: inline-block;
}
.badge {
    padding: 6px 12px;
    border-radius: 14px;
}
.paid { background: #28a745; }
.pending { background: #dc3545; }

.btn {
    margin-top: 15px;
    padding: 10px 20px;
    background: #007bff;
    border: none;
    color: #fff;
    border-radius: 6px;
    cursor: pointer;
}
.btn-success { background: #28a745; }

.back {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #fff;
}

input, select {
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    border: none;
}
</style>
</head>

<body>

<div class="container">

<h2 style="text-align:center">Accommodation Details</h2>

<div class="row">
    <span class="label">Name:</span> <?= htmlspecialchars($data['name']) ?>
</div>

<div class="row">
    <span class="label">Hall:</span> <?= htmlspecialchars($data['hall']) ?>
</div>

<div class="row">
    <span class="label">Department:</span> <?= htmlspecialchars($data['dept']) ?>
</div>

<div class="row">
    <span class="label">Passing Year:</span> <?= htmlspecialchars($data['yog']) ?>
</div>

<div class="row">
    <span class="label">Check-in Status:</span>
    <span class="badge <?= ($data['check_in'] ?? 'NO') === 'YES' ? 'paid' : 'pending' ?>">
        <?= htmlspecialchars($data['check_in'] ?? 'NO') ?>
    </span>
</div>

<!-- ACCOMMODATION UPDATE -->
<form method="post">
    <h3>Update Accommodation</h3>

    <div class="row">
        <input
            name="guest_house"
            placeholder="Guest House"
            value="<?= htmlspecialchars($data['guest_house'] ?? '') ?>"
        >
    </div>

    <div class="row">
        <input
            name="room_no"
            placeholder="Room Number"
            value="<?= htmlspecialchars($data['room_no'] ?? '') ?>"
        >
    </div>

    <div class="row">
        <select name="check_in" required>
            <option value="NO" <?= ($data['check_in'] ?? 'NO') === 'NO' ? 'selected' : '' ?>>
                Not Checked In
            </option>
            <option value="YES" <?= ($data['check_in'] ?? '') === 'YES' ? 'selected' : '' ?>>
                Checked In
            </option>
        </select>
    </div>

    <button class="btn btn-success" name="update_accommodation">
        Save Accommodation
    </button>
</form>

<a class="back" href="accom_desk.php">← Back to Accommodation Desk</a>

</div>

</body>
</html>