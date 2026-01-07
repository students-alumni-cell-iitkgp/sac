<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['reg_desk_logged_in'])) {
    header("Location: reg_desk_login.php");
    exit();
}

include 'test.php';

/* ---------- VALIDATE ID ---------- */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Request");
}
$id = intval($_GET['id']);

/* ---------- FETCH ALUMNI ---------- */
$stmt = $connection->prepare("SELECT * FROM AAM WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    die("Record not found");
}

$isPaid = ($data['payment'] === 'PAID(Verified)');

/* ---------- HANDLE REG KIT UPDATE ---------- */
if (isset($_POST['update_regkit'])) {
    $regKitStatus = $_POST['reg_kit_status'];

    $stmt = $connection->prepare(
        "UPDATE AAM SET reg_kit_status = ? WHERE id = ?"
    );
    $stmt->bind_param("si", $regKitStatus, $id);
    $stmt->execute();
}

/* ---------- HANDLE PAYMENT UPDATE ---------- */
if (isset($_POST['record_payment']) && !$isPaid) {

    $txnRef   = trim($_POST['transaction']);
    $payMode  = trim($_POST['payment_mode']);
    $remarks  = trim($_POST['remarks']);
    $amount   = $data['cost'];

    /* Insert into regTransactions */
    $stmt = $connection->prepare("
        INSERT INTO regTransactions
        (name, email, mobile, transaction, payment_mode, remarks, amount)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "ssssssd",
        $data['name'],
        $data['email'],
        $data['mobile'],
        $txnRef,
        $payMode,
        $remarks,
        $amount
    );
    $stmt->execute();

    /* Update AAM payment */
    $stmt = $connection->prepare(
        "UPDATE AAM SET payment = 'PAID(Verified)' WHERE id = ?"
    );
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: reg_kit_view.php?id=".$id);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Desk View</title>

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
.label { font-weight: bold; width: 200px; display: inline-block; }
.badge { padding: 6px 12px; border-radius: 14px; }
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
.back { display:block; text-align:center; margin-top:20px; color:#fff; }
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

<h2 style="text-align:center">Alumni Registration Details</h2>

<div class="row"><span class="label">Name:</span> <?= htmlspecialchars($data['name']) ?></div>
<div class="row"><span class="label">Hall:</span> <?= htmlspecialchars($data['hall']) ?></div>
<div class="row"><span class="label">Department:</span> <?= htmlspecialchars($data['dept']) ?></div>
<div class="row"><span class="label">Passing Year:</span> <?= htmlspecialchars($data['yog']) ?></div>

<div class="row">
    <span class="label">Payment Status:</span>
    <span class="badge <?= $isPaid ? 'paid' : 'pending' ?>">
        <?= $data['payment'] ?>
    </span>
</div>

<div class="row">
    <span class="label">Reg Kit Status:</span>
    <span class="badge <?= $data['reg_kit_status'] ? 'paid' : 'pending' ?>">
        <?= $data['reg_kit_status'] ?? 'NOT ISSUED' ?>
    </span>
</div>

<!-- REG KIT UPDATE -->
<form method="post">
    <h3>Update Registration Kit</h3>
    <select name="reg_kit_status" required>
        <option value="">-- Select --</option>
        <option value="FULL_REG_KIT_WITH_ID">Full Reg Kit (With ID)</option>
        <option value="REG_KIT_WITHOUT_ID">Reg Kit (Without ID)</option>
        <option value="NOT_ATTENDING">Not Attending AAM</option>
    </select>
    <button class="btn btn-success" name="update_regkit">Update Reg Kit</button>
</form>

<!-- PAYMENT SECTION -->
<?php if (!$isPaid): ?>
<form method="post">
    <h3>Record Payment</h3>
    <div class="row"><input name="transaction" placeholder="Transaction Reference" required></div>
    <div class="row">
        <select name="payment_mode" required>
            <option value="">Payment Mode</option>
            <option>Cash</option>
            <option>UPI</option>
            <option>Card</option>
            <option>Netbanking</option>
        </select>
    </div>
    <div class="row"><input name="remarks" placeholder="Remarks"></div>
    <div class="row"><b>Amount:</b> ₹<?= number_format($data['cost'],2) ?></div>
    <button class="btn btn-success" name="record_payment">Mark Payment as Paid</button>
</form>
<?php endif; ?>

<a class="back" href="reg_desk.php">← Back to Registration Desk</a>

</div>
</body>
</html>