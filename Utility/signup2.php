<?php
session_start();  
require '../config.php';
$database = 'aam';
   
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
if ($_SERVER["REQUEST_METHOD"]== "POST") {
      
    $email = test_input($_POST["name"]);
    $password = test_input($_POST["dob"]);
    
    $sql = "SELECT `email`,`dob` FROM hc" ;
    $stmt=$GLOBALS["conn"]->prepare($sql);
    $stmt->execute();

    $users = $stmt->fetchAll();
   // $_SESSION['email'] = $email;
    //$_SESSION['password'] = $password;
    setcookie('email', $email, time() + (86400), "/");
    setcookie('password', $password, time() + (86400), "/");
    $check = 1;
      
    foreach($users as $user) {
          
        if(($user['email'] === $email) && 
            ($user['dob'] === $password)) {

                $check = 0;
                $stmt2 = $conn->prepare("SELECT `reciept` FROM hc WHERE `email` = '$email'");
                $stmt->execute();
               
                //if(!$user['reciept'])  {       
                   header("Location: get_update.php");
                //}   
        }
    }

    if($check == 1){
        echo "<script language='javascript'>";
        echo "alert('WRONG INFORMATION')";
        echo "</script>";

        echo "<script language='javascript'>";
        echo "setTimeout(function() {";
        echo "    window.location.href = '../loginpage.php';";
        echo "}, 1000);";
        echo "</script>";
    }
    
}
  
?>