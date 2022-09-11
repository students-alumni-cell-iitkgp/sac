<?php
session_start(); 
require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email   = $_SESSION['email']     ;
        $name = $_SESSION['name'];

        $yoy = $_POST['yoy'];
        
        $em=explode('@',$email);

        // file name, type, size, temporary name 
        $file_name = $_FILES['yoy_pic']['name']; 
        $file_type = $_FILES['yoy_pic']['type']; 
        $ext=explode('.',  $file_name);
        $file_tmp_name = $_FILES['yoy_pic']['tmp_name']; 
        $file_size = $_FILES['yoy_pic']['size']; 

        // target directory 
        $target_dir = "../yoy/"; 
        $fetch_dir="./yoy/";
 
              $qu = "SELECT COUNT(*) FROM `yoy`";
              $stmt=$GLOBALS["conn"]->prepare($qu);
              $result = $stmt->execute();
              $n = $stmt->fetchColumn() +1;
           // uploding file 
           if(move_uploaded_file($file_tmp_name,$target_dir.$n.'.'.$ext[1])) 
           { 

             $sql = "INSERT INTO `yoy` (`name`,`email`, `yoy` ,`yoy_pic`)
             VALUES (:name, :email, :yoy, '$fetch_dir$n.$ext[1]')";

        
              $stmt=$GLOBALS["conn"]->prepare($sql);
      
              $stmt->bindparam(':name',$name);
              $stmt->bindparam(':email',$email);
              $stmt->bindparam(':yoy',$yoy);
            
              $result = $stmt->execute();
             
              if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your entry has been submitted successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>';
      
              echo '<script>alert("updated Successfully")</script>';
              header("Location: ../Utility/get_update.php");
              }
              else{
                  // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>';
              header("Location: ../errorpage.html");
              }

           } 
           else 
           { 
             echo "File can not be uploaded"; 
           } 
    }   
?>

