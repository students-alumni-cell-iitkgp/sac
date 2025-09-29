<?php
require 'connection.php';
session_start();

$email         = $_POST['email'];
$password      = $_POST['password'];
$password_hash = hash('sha256', $password);
if (! empty($email) && ! empty($password)) {

    $query = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password_hash . "'";
    //echo "cont..";
    $result = $connection->query($query);
    // $query_num_rows=mysqli_num_rows($result);
    //echo  $query_num_rows;
    /*if ($query_num_rows==10) {
        echo '<script language="javascript">alert("Invalid Email ID/PASSWORD ");</script>';
      }*/
    //echo $result->num_rows;
    if ($result->num_rows > 0) {

        //$user_id=mysql_result($query_run, 0,'email');
        $_SESSION['email'] = $email;
        echo '2';

    } else {
        echo '1';
    }

    //}
} else {
    echo '0';
}
