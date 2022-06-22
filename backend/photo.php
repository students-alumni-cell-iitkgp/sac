<?php
session_start(); 
include '../config.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $pro_pic = $_POST['pro_pic'];
        
        $email = $_SESSION['email'];
        $mobile = $_SESSION['mobile'];

        // file name, type, size, temporary name 
        $file_name = $_FILES['pro_pic']['name']; 
        $file_type = $_FILES['pro_pic']['type']; 
        $ext=explode('.',  $file_name);
        $file_tmp_name = $_FILES['pro_pic']['tmp_name']; 
        $file_size = $_FILES['pro_pic']['size']; 

     
        // target directory 
        $target_dir = "../uploads/"; 
        $fetch_dir="./uploads/";
       
        // uploding file 
        if(move_uploaded_file($file_tmp_name,$target_dir.$mobile.'.'.$ext[1])) 
        { 

          $q = "update `hc22` SET `pro_pic` = '$fetch_dir$mobile.$ext[1].' WHERE `email` = '$email'"; 
          $stmt=$GLOBALS["conn"]->prepare($q);
          $result=$stmt->execute();
          
        } 
        else 
        { 
          echo "File can not be uploaded"; 
        } 
        
      header("Location: ../Utility/get_update.php");
             
      }
?>
