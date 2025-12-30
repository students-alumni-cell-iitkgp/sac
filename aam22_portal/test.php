
<?php
// $servername = "localhost";
// $dbname = 'sac_aam22';
// $username = 'sac_aam';
// $password = 'sac@aam22';
$connection = new mysqli("localhost", "root", "", "aam");
// $connection = new mysqli("localhost", "sac_aam", "sac@aam22", "sac_aam22");
// $connection = new mysqli("localhost", "sac_aam", "sac@aam22", "sac_aam_test");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>