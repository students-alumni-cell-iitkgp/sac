<?php
ob_start(); 
session_start();
session_destroy();
header('location:../index.php');
?>