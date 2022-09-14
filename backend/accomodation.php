<?php 
session_start();
require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email   = $_SESSION['email']     ;
        $marital       = $_POST['marital'];
        $accompaniment = $_POST['accompaniment'];
        $gh            = $_POST['gh'];
        $serial        = $_POST['serial'];
        $employee      = $_POST['employee'];
        $cost      = $_POST['cost'];

        $sql = "UPDATE `hc` SET `marital`           = :marital,
                                  `accompaniment`        = :accompaniment ,
                                  `gh`           = :gh,
                                  `serial`          = :serial,
                                  `employee`        = :employee,
                                  `cost`        = :cost
                                  WHERE `email` = '$email'";

        $stmt=$GLOBALS["conn"]->prepare($sql);

        $stmt->bindparam(':marital',$marital);
      $stmt->bindparam(':accompaniment',$accompaniment);
      $stmt->bindparam(':gh',$gh);
      $stmt->bindparam(':serial',$serial);
      $stmt->bindparam(':employee',$employee);
      $stmt->bindparam(':cost',$cost);
        $result = $stmt->execute();
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';

       /* if($gh == 'TGH')
        {
          $sql = "UPDATE `acco` SET `av` = `av`-1 WHERE `name` = 'TGH'";
          $stmt=$GLOBALS["conn"]->prepare($sql);
          $result = $stmt->execute();

          $sql = "UPDATE `acco` SET `av` = `av`+1 WHERE `name` = 'SAM'";
          $stmt=$GLOBALS["conn"]->prepare($sql);
          $result = $stmt->execute();
          
        }
        else if($gh == 'SAM')
        {
          $sql = "UPDATE `acco` SET `av` = `av`-1 WHERE `name` = 'SAM'";
          $stmt=$GLOBALS["conn"]->prepare($sql);
          $result = $stmt->execute();

          $sql = "UPDATE `acco` SET `av` = `av`+1 WHERE `name` = 'TGH'";
          $stmt=$GLOBALS["conn"]->prepare($sql);
          $result = $stmt->execute();
        }*/

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