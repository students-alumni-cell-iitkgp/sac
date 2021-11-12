<?php
session_start();  
require 'connection.php';
    
//if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $database = 'aam';
    $email = $_SESSION['email'];
    $dob = $_SESSION['password']; 

    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $database);
    $stmt = $conn->prepare("SELECT * FROM travel WHERE `email` = '$email'");
    $stmt->execute();
    
    $resultSet = $stmt->get_result();
    $users = $resultSet->fetch_all(MYSQLI_ASSOC);
    foreach($users as $user) {

        //fecting travelling details
        
        $kgpdoa        = $_user['kgpdoa']      ;
        $kgptimetocome = $_user['kgptimetocome']   ;
        $kgpmodeofT    = $_user['kgpmodeofT']   ;
        $kgppickup     = $_user['kgppickup']      ; 
        $kgppcount     = $_user['kgppcount']   ;
        $kgpcarseater  = $_user['kgpcarseater']      ; 

        $airdoa        = $_user['airdoa']      ;
        $airtimetocome = $_user['airtimetocome']   ;
        $airmodeofT    = $_user['airmodeofT']   ;
        $airpickup     = $_user['airpickup']      ; 
        $airpcount     = $_user['airpcount']   ;
        $aircarseater  = $_user['aircarseater']      ; 

        //adding seession 

        $_SESSION['kgpdoa']      = $kgpdoa       ;
        $_SESSION['kgptimetocome']= $kgptimetocome   ;
        $_SESSION['kgpmodeofT']  = $kgpmodeofT    ;
        $_SESSION['kgppickup']   = $kgppickup       ; 
        $_SESSION['kgppcount']   = $kgppcount    ;
        $_SESSION['kgpcarseater']= $kgpcarseater       ; 

        $_SESSION['airdoa']        = $airdoa        ;
        $_SESSION['airtimetocome'] = $airtimetocome  ;
        $_SESSION['airmodeofT']    = $airmodeofT     ;
        $_SESSION['airpickup']     = $airpickup     ; 
        $_SESSION['airpcount']     = $airpcount      ;
        $_SESSION['aircarseater']  = $aircarseater     ; 


        echo "<script language='javascript'>";
        echo "alert('WRONG INFORMATION'+'$email'+'$kgpdoa')";
        echo "</script>";

        header("Location: update.php");

    } 

//}
?>
