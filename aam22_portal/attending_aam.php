<?php
session_start();
include 'header_aam.php';
include 'test.php'; // DB connection

if (!isset($_SESSION['email'])) {
    header("Location: login_aam.php");
    exit;
}

// Fetch distinct filter options from DB
$yearsQuery = $connection->query("SELECT DISTINCT yog FROM AAM ORDER BY yog DESC");

$deptsQuery = $connection->query("SELECT DISTINCT dept FROM AAM ORDER BY dept ASC");
$hallsQuery = $connection->query("SELECT DISTINCT hall FROM AAM ORDER BY hall ASC");

$years = [];
$depts = [];
$halls = [];

while ($r = $yearsQuery->fetch_assoc()) $years[] = $r['yog'];
while ($r = $deptsQuery->fetch_assoc()) if (!empty($r['dept'])) $depts[] = $r['dept'];
while ($r = $hallsQuery->fetch_assoc()) if (!empty($r['hall'])) $halls[] = $r['hall'];

// Get filters from GET parameters
$selectedYear = $_GET['yog'] ?? '';
$selectedDept = $_GET['dept'] ?? '';
$selectedHall = $_GET['hall'] ?? '';

// Build dynamic SQL with filters
$query = "SELECT name, hall, dept, yog FROM AAM WHERE 1=1";
$params = [];
$types = '';

if (!empty($selectedYear)) {
    $query .= " AND yog = ?";
    $params[] = $selectedYear;
    $types .= 's';
}

if (!empty($selectedDept)) {
    $query .= " AND dept = ?";
    $params[] = $selectedDept;
    $types .= 's';
}

if (!empty($selectedHall)) {
    $query .= " AND hall = ?";
    $params[] = $selectedHall;
    $types .= 's';
}

$query .= " ORDER BY yog DESC, name ASC";

$stmt = $connection->prepare($query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registered Alumni | Alumni Meet</title>
<style>
body { 
    background: url(./aa2a.webp) no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    backdrop-filter: blur(15px);
    
    font-family: 'Arial', sans-serif;
}

.container {
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #012A4A;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
}

/* Filter section */
.filter-form {
    text-align: center;
    margin-bottom: 25px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
}

.filter-form select {
    padding: 8px 14px;
    border-radius: 8px;
    border: 1px solid #90CAF9;
    background-color: rgba(227, 242, 253, 0.8);
    color: #012A4A;
    font-weight: 500;
    font-size: 1rem;
    outline: none;
    transition: 0.3s;
}

.filter-form select:hover {
    background-color: #BBDEFB;
    cursor: pointer;
}

.filter-form button {
    background-color: #1565C0;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 8px 18px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.filter-form button:hover {
    background-color: #0D47A1;
}

/* Cards */
.alumni-grid-1 {
    display: grid;
    gap: 20px;
    padding: 0 15px;
}

.alumni-card {
    
    background: rgba(255, 255, 255, 0.4);
    border: none;
    font-weight: 500;
    color: #012A4A;
    border-radius: 20px;
    backdrop-filter: blur(20px);
    padding: 15px 15px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    transition: transform 0.3s, box-shadow 0.3s; 
}

.alumni-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.3);
}

.alumni-name {
    font-size: 1.2rem;
    font-weight: bold;
    color: #1565C0;
    margin-bottom: 10px;
}

.alumni-info {
    font-size: 0.95rem;
    color: #333;
    margin-bottom: 5px;
}

@media (min-width: 766px) {
    .alumni-grid-1 {
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    }
}

@media (max-width: 766px) {
    h2 {
        font-size: 1.5rem;
    }

    .alumni-grid-1 {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .alumni-card {
        padding: 20px 15px;
    }
}
</style>
</head>
<body>

<div class="container">
    <h2>Registered Alumni Attending 22nd AAM 2026</h2>

    <form action="" method="get" class="filter-form">
        <select name="yog" onchange="this.form.submit()">
            <option value="">All Years</option>
            <?php foreach ($years as $year): ?>
                <option value="<?= htmlspecialchars($year) ?>" <?= ($selectedYear == $year) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($year) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="dept" onchange="this.form.submit()">
            <option value="">All Departments</option>
            <?php foreach ($depts as $dept): ?>
                <option value="<?= htmlspecialchars($dept) ?>" <?= ($selectedDept == $dept) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($dept) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="hall" onchange="this.form.submit()">
            <option value="">All Halls</option>
            <?php foreach ($halls as $hall): ?>
                <option value="<?= htmlspecialchars($hall) ?>" <?= ($selectedHall == $hall) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($hall) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if ($selectedYear || $selectedDept || $selectedHall): ?>
            <button type="button" onclick="window.location='<?= basename($_SERVER['PHP_SELF']); ?>'">Reset</button>
        <?php endif; ?>
    </form>

    <div class="alumni-grid-1">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="alumni-card">
                    <div class="alumni-name"><?= htmlspecialchars($row['name']) ?></div>
                    <div class="alumni-info"><strong>Hall:</strong> <?= htmlspecialchars($row['hall']) ?></div>
                    <div class="alumni-info"><strong>Dept:</strong> <?= htmlspecialchars($row['dept']) ?></div>
                    <div class="alumni-info"><strong>Batch:</strong> <?= htmlspecialchars($row['yog']) ?></div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align:center; font-weight:500; color:#012A4A;">No alumni found for the selected filters.</p>
        <?php endif; ?>
    </div>
</div>

<?php $connection->close(); ?>

</body>
</html>