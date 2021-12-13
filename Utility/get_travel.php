<?php
session_start();  
require '../config.php';
    
//if ($_SERVER["REQUEST_METHOD"]== "POST") {
    //$database = 'aam';
    $email = $_SESSION['email'];
    //$dob = $_SESSION['password']; 

    //$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    //$stmt = $conn->prepare("SELECT * FROM travel WHERE `email` = '$email'");
    //$stmt->execute();
    //$resultSet = $stmt->get_result();
    //$users = $resultSet->fetch_all(MYSQLI_ASSOC);

    $stmt = $conn->prepare("SELECT * FROM travel WHERE `email` = '$email'");
    $stmt->execute();
    $users = $stmt->fetchAll();

    foreach($users as $user) {
        $kgpdoa        = $user['kgpdoa']      ;
        $kgptimetocome = $user['kgptimetocome']   ;
        $kgpmodeofT    = $user['kgpmodeofT']   ;
        $kgppickup     = $user['kgppickup']      ; 
        $kgppcount     = $user['kgppcount']   ;
        $kgpcarseater  = $user['kgpcarseater']      ; 

        $airdoa        = $user['airdoa']      ;
        $airtimetocome = $user['airtimetocome']   ;
        $airmodeofT    = $user['airmodeofT']   ;
        $airpickup     = $user['airpickup']      ; 
        $airpcount     = $user['airpcount']   ;
        $aircarseater  = $user['aircarseater']      ; 


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

        header("Location: ../dashboard.php");

    } 


//}
?>
