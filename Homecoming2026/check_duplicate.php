<?php
header('Content-Type: application/json');

include 'config.php'; // Your database connection

$email  = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');


if ($email === '' || $mobile === '') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Email and mobile number are required.'
    ]);
    exit;
}

try {
// echo $mobile; die();
    // Check Email
    $stmt = $connection->prepare("
        SELECT id 
        FROM aam 
        WHERE email = ?
        LIMIT 1
    ");

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $emailResult = $stmt->get_result();

    if ($emailResult->num_rows > 0) {

        echo json_encode([
            'status' => 'exists',
            'field' => 'email',
            'message' => 'This email address is already registered.'
        ]);

        exit;
    }

    // Check Mobile
    $stmt = $connection->prepare("
        SELECT id 
        FROM aam 
        WHERE mobile = ?
        LIMIT 1
    ");

    $stmt->bind_param("s", $mobile);
    $stmt->execute();
    $mobileResult = $stmt->get_result();

    if ($mobileResult->num_rows > 0) {

        echo json_encode([
            'status' => 'exists',
            'field' => 'mobile',
            'message' => 'This mobile number is already registered.'
        ]);

        exit;
    }

    // Both available
    echo json_encode([
        'status' => 'available',
        'message' => 'Email and mobile number are available.'
    ]);

} catch (Exception $e) {

    echo json_encode([
        'status' => 'error',
        'message' => 'Unable to check registration details. Please try again.'
    ]);
}
?>