


<?php
$connection = new mysqli("localhost", "root", "", "aam");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?> 

