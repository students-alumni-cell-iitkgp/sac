<?php
$connection = new mysqli("localhost", "root", "s@cell#2026", "homecoming");
// $connection = new mysqli("localhost", "sac_aam", "sac@aam22", "sac_aam22");
// $connection = new mysqli("localhost", "sac_aam", "sac@aam22", "sac_aam_test");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>