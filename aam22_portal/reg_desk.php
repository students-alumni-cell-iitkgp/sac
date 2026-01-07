<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['reg_desk_logged_in'])) {
    header("Location: reg_desk_login.php");
    exit();
}
include 'test.php'; // must define $connection

$search = '';
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

if ($search !== '') {
    // 🔍 SEARCH MODE → show BOTH PROVIDED & NOT_PROVIDED
    $like = "%" . $search . "%";
    $stmt = $connection->prepare(
        "SELECT * FROM AAM
         WHERE name LIKE ?
            OR email LIKE ?
            OR mobile LIKE ?
         ORDER BY name DESC"
    );
    $stmt->bind_param("sss", $like, $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();

} else {
    // 🚫 DEFAULT MODE → ONLY NOT_PROVIDED
    $stmt = $connection->prepare(
        "SELECT * FROM AAM
         WHERE regkit = 'NOT_PROVIDED'
         ORDER BY name DESC"
    );
    $stmt->execute();
    $result = $stmt->get_result();
}

if (!$result) {
    die("DB Error: " . $connection->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Desk</title>

    <style>
        body {
            background: url(./aa2a.webp) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            backdrop-filter: blur(25px);
            font-family: 'Segoe UI', sans-serif;
            color: #012A4A;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #012A4A;
        }

        /* Search box */
        .search-box {
            width: 100%;
            text-align: center;
            margin: 20px 0;
        }

        .search-box input {
            width: 300px;
            padding: 10px;
            border-radius: 6px;
            border: none;
            outline: none;
        }

        .search-box button {
            padding: 10px 16px;
            border-radius: 6px;
            border: none;
            background: #007bff;
            color: #fff;
            cursor: pointer;
            margin-left: 5px;
        }

        /* Glass table */
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            text-align: center;
        }

        th {
            background: rgba(0, 0, 0, 0.75);
            color: #fff;
        }

        tr:hover {
            background: rgba(0, 123, 255, 0.1);
        }

        .paid {
            color: #1b7e2a;
            font-weight: bold;
        }

        .pending {
            color: #c0392b;
            font-weight: bold;
        }

        .btn {
            padding: 6px 12px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<h2>Alumni Registration Desk</h2>

<!-- 🔍 Search Form -->
<div class="search-box">
    <form method="get">
        <input 
            type="text" 
            name="search" 
            placeholder="Search by name, email or mobile"
            value="<?= htmlspecialchars($search) ?>"
        >
        <button type="submit">Search</button>
    </form>
</div>

<table>
    <tr>
        <th>Name</th>
        <th>Hall</th>
        <th>Dept</th>
        <th>Year</th>
        <th>Payment</th>
        <th>Reg Kit</th>
        <th>Action</th>
    </tr>

<?php
if ($result->num_rows === 0) {
    echo "<tr><td colspan='9'>No records found</td></tr>";
} else {
    while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?= htmlspecialchars($row['name'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['hall'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['dept'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['yog'] ?? '') ?></td>

        <td class="<?= ($row['payment'] ?? '') === 'PAID(Verified)' ? 'paid' : 'pending' ?>">
            <?= htmlspecialchars($row['payment'] ?? 'PENDING') ?>
        </td>

        <td class="<?= ($row['reg_kit_status'] ?? '') === 'FULL_REG_KIT_WITH_ID' ? 'paid' : 'pending' ?>">
            <?= htmlspecialchars($row['reg_kit_status'] ?? 'NOT_PROVIDED') ?>
        </td>

        <td>
            <a class="btn" href="reg_kit_view.php?id=<?= $row['id'] ?>">View</a>
        </td>
    </tr>
<?php
    }
}
?>

</table>

</body>
</html>