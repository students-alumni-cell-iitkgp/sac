<?php
session_start();
require '../config.php';
$database = 'AAM';
   
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
if ($_SERVER["REQUEST_METHOD"]== "POST") {
      
    $email = test_input($_POST["name"]);
    $password = test_input($_POST["dob"]);
    
    $sql = "SELECT `email`,`dob` FROM AAM WHERE `email` = '$email' AND `dob` = '$password'"; ;
    $stmt=$GLOBALS["conn"]->prepare($sql);
    $stmt->execute();

    $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    //setcookie('email', $email, time() + (86400), "/");
    //setcookie('password', $password, time() + (86400), "/");
    $_SESSION['check'] = $check = 1;
      
    // foreach($users as $user) {
          
    //     if(($user['email'] === $email) && 
    //         ($user['dob'] === $password)) {

    //             $check = 0;
    //             $stmt2 = $conn->prepare("SELECT `reciept` FROM AAM WHERE `email` = '$email'");
    //             $stmt->execute();
               

    //             //$id=session_id();
    //             //echo "<script>console.log('id1: ". $_SESSION['email']."' );</script>";
    //            // header("Location: get_update.php?id=$id");
    //             //if(!$user['reciept'])  {       
    //                header("Location: get_update.php");
    //             //}   
    //     }
    // }

    // if($check == 1){

    //     /*echo "<script language='javascript'>";
    //     echo "document.getElementById('login-error-msg').style.opacity = 1";
    //     echo "</script>";*/
        
    //     echo "<script language='javascript'>";
    //     echo "setTimeout(function() {";
    //     echo "    window.location.href = '../loginpage.php';";
    //     echo "}, 1000);";
    //     echo "</script>";
    // }
    
}
  
?>