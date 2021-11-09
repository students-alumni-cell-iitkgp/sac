<?php 
include 'includeAdmin/session.php';
$_SESSION['userid']=null;
// session_destroy();
header('Location: adminlogin.php');
?>