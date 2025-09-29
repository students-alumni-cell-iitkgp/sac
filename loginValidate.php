<?php
session_start();
ob_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input data
    $email = trim($_POST['email']);
    $dob = trim($_POST['dob']);
    
    // Basic validation
    if (empty($email) || empty($dob)) {
        $_SESSION['check'] = 1;
        header("Location: login.php");
        exit();
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['check'] = 1;
        header("Location: login.php");
        exit();
    }

    try {
        $sql = "SELECT * FROM AAM WHERE email = ? AND dob = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("ss", $email, $dob);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Login successful
            $user_data = $result->fetch_assoc();
            $_SESSION['user'] = $email;
            $_SESSION['user_id'] = $user_data['id'] ?? null; // Store user ID if available
            
            // Clear any previous error sessions
            unset($_SESSION['check']);
            
            header("Location: dashboard.php"); // Fixed path - removed ../sac/
            exit();
        } else {
            // Login failed
            $_SESSION['check'] = 1;
            header("Location: login.php"); // Fixed path - removed ../sac/
            exit();
        }
        
    } catch (Exception $e) {
        error_log("Login error: " . $e->getMessage());
        $_SESSION['check'] = 1;
        header("Location: login.php");
        exit();
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
    }
} else {
    // If not POST request, redirect to login
    header("Location: login.php");
    exit();
}
?>