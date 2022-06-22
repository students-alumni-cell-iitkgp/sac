<?php 
session_start();
require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email   = $_SESSION['email']     ;
        
        $rollno = $_POST['rollno'];
        $yoj = $_POST['yoj'];
        $degree = $_POST['degree'];
        $dept = $_POST['dept'];
        $hall = $_POST['hall'];
        $yog = $_POST['yog'];
        $involvement = $_POST['involvement'];
        $hobbies = $_POST['hobbies'];

        $sql = "UPDATE `hc` SET `rollno`          = :rollno,
                                 `yoj`        = :yoj ,
                                 `degree`       = :degree,
                                 `dept`          = :dept,
                                 `hall`        = :hall,
                                 `yog`        = :yog,
                                 `involvement`         = :involvement,
                                 `hobbies`            = :hobbies
                                  WHERE `email` = '$email'";

        $stmt=$GLOBALS["conn"]->prepare($sql);

        $stmt->bindparam(':rollno',$rollno);
      $stmt->bindparam(':yoj',$yoj);
      $stmt->bindparam(':degree',$degree);
      $stmt->bindparam(':dept',$dept);
      $stmt->bindparam(':hall',$hall);
      $stmt->bindparam(':yog',$yog);
      $stmt->bindparam(':involvement',$involvement);
      $stmt->bindparam(':hobbies',$hobbies);
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
      //}
    }   
?>