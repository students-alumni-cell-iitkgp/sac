<?php 
session_start();
require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email   = $_SESSION['email']     ;

        $covi_status = $_POST['covi_status'];
        $covi_certi = $_POST['covi_certi'];

        $sql = "UPDATE `hc` SET `covi_status`       = :covi_status,
                                  `covi_certi`        = :covi_certi
                                  WHERE `email` = '$email'";

        $stmt=$GLOBALS["conn"]->prepare($sql);

        $stmt->bindparam(':covi_status',$covi_status);
      $stmt->bindparam(':covi_certi',$covi_certi);
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