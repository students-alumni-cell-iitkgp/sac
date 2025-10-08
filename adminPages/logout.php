<?php 
// include 'includeAdmin/session.php';
// $_SESSION['userid']=null;
// session_destroy();
// header('Location: adminlogin.php');

//nirmal
// logout.php
session_start();
session_unset();
session_destroy();
header('Location: adminlogin.php');
exit;


?>
