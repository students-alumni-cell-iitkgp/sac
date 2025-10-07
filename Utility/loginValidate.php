<?php
session_start();
include "../config.php";

echo "<h3> Hii</h3>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $dob   = $_POST['dob'];

    $sql = "SELECT * FROM AAM WHERE email = ? AND dob = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $dob);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows === 1) {
        $_SESSION['user'] = $email;
        header("Location: ../sac/dashboard.php");
        exit();
    } else {
        $_SESSION['check'] = 1;
        header("Location: ../login.php");
        exit();
    }
}
?>
