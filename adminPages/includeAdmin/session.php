<?php
//  session_start();

  // At the top of each admin page
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: adminlogin.php');
    exit;
}

?>