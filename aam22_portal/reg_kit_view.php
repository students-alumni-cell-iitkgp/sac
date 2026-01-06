<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['reg_desk_logged_in'])) {
    header("Location: reg_desk_login.php");
    exit();
}

include 'test.php'; // must define $conn

/* Validate ID */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Request");
}

$id = intval($_GET['id']);

/* Update Reg Kit Status */
if (isset($_POST['provide_kit'])) {
    $update = $connection->prepare("UPDATE AAM SET regkit='PROVIDED' WHERE id=?");
    $update->bind_param("i", $id);
    $update->execute();
}

/* Fetch Single Alumni */
$stmt = $connection->prepare("SELECT * FROM AAM WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Record not found");
}

$data = $result->fetch_assoc();

$isProvided = ($data['regkit'] === 'PROVIDED');
$isPaid = ($data['payment'] === 'PAID(Verifed)');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reg Kit View</title>

    <style>
        body {
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(15px);

            min-height: 100vh;
            margin: 0;
            padding: 0;
            height: 100vh;
            /* background: linear-gradient(135deg, #2196F3, #90CAF9); */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        .container {
            width: 55%;
            margin: 40px auto;
            padding: 25px;
            border-radius: 10px;
            color: #fff;
            background: <?= $isProvided ? '#28a745' : '#dc3545' ?>;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .row {
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 6px;
            background: rgba(255,255,255,0.2);
        }

        .label {
            font-weight: bold;
            display: inline-block;
            width: 180px;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: bold;
        }

        .paid {
            background: #155724;
            color: #fff;
        }

        .pending {
            background: #721c24;
            color: #fff;
        }

        .btn {
            display: block;
            margin: 25px auto 0;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            background: <?= $isProvided ? '#155724' : '#0069d9' ?>;
        }

        .btn:disabled {
            background: #333;
            cursor: not-allowed;
        }

        .back {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Alumni Registration Details</h2>

    <div class="row"><span class="label">Name:</span> <?= htmlspecialchars($data['name'] ?? '') ?></div>
    <div class="row"><span class="label">Email:</span> <?= htmlspecialchars($data['email'] ?? '') ?></div>
    <div class="row"><span class="label">Phone:</span> <?= htmlspecialchars($data['mobile'] ?? '') ?></div>
    <div class="row"><span class="label">Hall:</span> <?= htmlspecialchars($data['hall'] ?? '') ?></div>
    <div class="row"><span class="label">Department:</span> <?= htmlspecialchars($data['dept'] ?? '') ?></div>
    <div class="row"><span class="label">Passing Year:</span> <?= htmlspecialchars($data['yog'] ?? '') ?></div>

    <div class="row">
        <span class="label">Payment Status:</span>
        <span class="badge <?= $isPaid ? 'paid' : 'pending' ?>">
            <?= htmlspecialchars($data['payment'] ?? 'PENDING') ?>
        </span>
    </div>

    <div class="row">
        <span class="label">Reg Kit Status:</span>
        <span class="badge <?= $isProvided ? 'paid' : 'pending' ?>">
            <?= htmlspecialchars($data['regkit'] ?? 'NOT_PROVIDED') ?>
        </span>
    </div>

    <form method="post">
        <button class="btn" name="provide_kit" <?= $isProvided ? 'disabled' : '' ?>>
            <?= $isProvided ? 'Reg Kit Already Provided' : 'Mark Reg Kit as Provided' ?>
        </button>
    </form>

    <a class="back" href="reg_desk.php">← Back to Registration Desk</a>
</div>

</body>
</html>