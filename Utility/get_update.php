<?php
session_start();  
include_once('../config.php');
    
    if(!isset($_SESSION['email']))
    { 
        header("Location: ../logout.html");
    }
    
    $email = $_SESSION['email'];
    $dob = $_SESSION['password']; 

    $stmt = $conn->prepare("SELECT * FROM hc WHERE `email` = '$email'");
    $stmt->execute();

    $users = $stmt->fetchAll();
    foreach($users as $user) {

        $name    = $user['name']      ;
        $email   = $user['email']     ;
        $dob     = $user['dob']       ;

        $pro_pic = $user['pro_pic'] ;
        $thumbnail = $user['thumbnail'];

        $address = $user['address']   ;
        $city    = $user['city']      ;
        $state   = $user['state']     ;
        $country = $user['country']   ;
        $zipcode = $user['zipcode']   ;
        $mobile  = $user['mobile']    ;

        $covi_status      = $user['covi_status']       ;
        $covi_certi = $user['covi_certi']  ;
        $covi_dose    = $user['covi_dose']        ;

          $marital      = $user['marital']        ;
        $accompaniment = $user['accompaniment'] ;
          $gh           = $user['gh']           ;
          $cost         = $user['cost']           ;
          $serial = $user['serial'];
          $employee = $user['employee'];

        $industry     = $user['industry']     ;
        $profession   = $user['profession']   ;
        $organisation = $user['organisation']      ;
        $designation  = $user['designation']  ;
        $waddress     = $user['waddress'] ;
        $wcity        = $user['wcity']    ;
        $wstate       = $user['wstate']   ;
        $wcountry     = $user['wcountry'] ;
        $wzipcode     = $user['wzipcode'] ;

        $rollno      = $user['rollno']         ;
        $yoj    = $user['yoj']        ;
        $degree      = $user['degree']          ;
        $dept        = $user['dept']      ;
        $hall        = $user['hall']            ;
        $yog         = $user['yog']  ;
        $involvement = $user['involvement']    ;
        $hobbies     = $user['hobbies']         ;

        $reciept = $user['reciept'] ;  
       
        $travel_form   = $user['travel_form']      ;
        $mode          = $user['mode']      ;
        $reach_in      = $user['reach_in']      ;
        $date_reach_in = $user['date_reach_in']      ;
        $time_reach_in = $user['time_reach_in']      ;
        $flight_no     = $user['flight_no']      ; 
        $train_no      = $user['train_no']      ;
        $cab           = $user['cab']      ;
        $cab_type      = $user['cab_type']      ;
        $no_acc        = $user['no_acc']      ;
        $reach_out     = $user['reach_out']      ;
        $date_reach_out= $user['date_reach_out']      ;
        $time_reach_out= $user['time_reach_out']      ;

        //adding seession 
        $_SESSION['name']     = $name     ;
       $_SESSION['email']    = $email    ;
       $_SESSION['address']  = $address  ;
       $_SESSION['city']     = $city     ;
       $_SESSION['state']    = $state    ;
       $_SESSION['country']  = $country  ;
       $_SESSION['zipcode']  = $zipcode  ;
       $_SESSION['mobile']   = $mobile   ;
       $_SESSION['dob']      = $dob      ;

       $_SESSION['pro_pic']   = $pro_pic;
       $_SESSION['thumbnail'] = $thumbnail;

       $_SESSION['covi_status']      = $covi_status      ;
       $_SESSION['covi_certi']       = $covi_certi ;
       $_SESSION['covi_dose']        = $covi_dose    ;

       $_SESSION['marital']        =   $marital      ;
       $_SESSION['accompaniment'] = $accompaniment ;
       $_SESSION['gh']           =   $gh           ;
       $_SESSION['cost']           =   $cost         ;

       $_SESSION['industry']     = $industry     ;
       $_SESSION['profession']   = $profession   ;
       $_SESSION['organisation']      = $organisation ;
       $_SESSION['designation']  = $designation  ;
       $_SESSION['waddress'] = $waddress     ;
       $_SESSION['wcity']    = $wcity        ;
       $_SESSION['wstate']   = $wstate       ;
       $_SESSION['wcountry'] = $wcountry     ;
       $_SESSION['wzipcode'] = $wzipcode     ;

       $_SESSION['rollno']        = $rollno       ;
       $_SESSION['yoj']       = $yoj     ;
       $_SESSION['degree']         = $degree       ;
       $_SESSION['dept']     = $dept         ;
       $_SESSION['hall']           = $hall         ;
       $_SESSION['yog'] = $yog          ;
       $_SESSION['involvement']   = $involvement  ;
       $_SESSION['hobbies']        = $hobbies      ;

       $_SESSION['reciept'] = $reciept ;
       $_SESSION['serial'] = $serial ;
       $_SESSION['employee'] = $employee ;

       $_SESSION['travel_form']    = $travel_form     ;
       $_SESSION['mode']           = $mode            ;
       $_SESSION['reach_in']       = $reach_in         ;
       $_SESSION['date_reach_in']  = $date_reach_in     ;
       $_SESSION['time_reach_in']  = $time_reach_in     ;
       $_SESSION['flight_no']      = $flight_no        ; 
       $_SESSION['train_no']       = $train_no         ;
       $_SESSION['cab']            = $cab              ;
       $_SESSION['cab_type']       = $cab_type        ;
       $_SESSION['no_acc']         = $no_acc         ;
       $_SESSION['reach_out']      = $reach_out        ;
       $_SESSION['date_reach_out'] = $date_reach_out     ;
       $_SESSION['time_reach_out'] = $time_reach_out     ;
       
        header("Location: ../dashboard.php");
    } 
?>
