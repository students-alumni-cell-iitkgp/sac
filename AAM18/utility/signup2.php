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
    
    $sql = "SELECT `email`,`dob` FROM aam" ;
    $stmt=$GLOBALS["conn"]->prepare($sql);
    //$stmt = $conn->prepare("SELECT `email`,`dob` FROM aam");
    $stmt->execute();
    //$users = $stmt->fetchAll();

    //$resultSet = $stmt->fetchAll();
    //print_r($resultSet);
    //$users = $resultSet->fetch(PDO::FETCH_ASSOC);

    $users = $stmt->fetchAll();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    $check = 1;
      
    foreach($users as $user) {
          
        if(($user['email'] === $email) && 
            ($user['dob'] === $password)) {

                $check = 0;
                $stmt2 = $conn->prepare("SELECT `reciept` FROM aam WHERE `email` = '$email'");
                $stmt->execute();
               // $recpt = $stmt->fetchAll();

                if(!$user['reciept'])  {       //($rpt['reciept'] === NULL) is_null($rpt['reciept']) empty($user['reciept'] )
                    header("Location: get_update.php");
                   // header("Location: adminpage.php");
                    /*echo "<script language='javascript'>";
                    echo "alert('WRONG INFORMATION')";
                    echo "</script>";*/
                }
                /*else{
                    echo "<script language='javascript'>";
                    echo "alert('Successfully Resigter')";
                    echo "</script>";
                    header("Location: registered.html");
                }*/
                /* code reciept empty hogi adminpage me jaye 
                ek page you are done set time 5 sec home page me bej dege */
                //header("Location: adminpage.php");
        }
        /*else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION'+'$email'+'$password')";
            echo "</script>";
            die();
        }*/
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