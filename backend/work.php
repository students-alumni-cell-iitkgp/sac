<?php 
session_start();
require '../config.php';

if(!isset($_SESSION['email']))
{
  header("Location: ../logout.html");
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email   = $_SESSION['email']     ;
        
        $industry = $_POST['industry'];
        $profession = $_POST['profession'];
        $organisation = $_POST['organisation'];
        $designation = $_POST['designation'];
        $waddress = $_POST['waddress'];
        $wcity = $_POST['wcity'];
        $wstate = $_POST['wstate'];
        $wcountry = $_POST['wcountry'];
        $wzipcode = $_POST['wzipcode'];

        $sql = "UPDATE `hc22` SET `industry`          = :industry,
                                 `profession`        = :profession ,
                                 `organisation`       = :organisation,
                                 `designation`          = :designation,
                                 `waddress`        = :waddress,
                                 `wcity`        = :wcity,
                                 `wstate`         = :wstate,
                                 `wcountry`            = :wcountry,
                                 `wzipcode`            = :wzipcode
                                  WHERE `email` = '$email'";

        $stmt=$GLOBALS["conn"]->prepare($sql);

        $stmt->bindparam(':industry',$industry);
      $stmt->bindparam(':profession',$profession);
      $stmt->bindparam(':organisation',$organisation);
      $stmt->bindparam(':designation',$designation);
      $stmt->bindparam(':waddress',$waddress);
      $stmt->bindparam(':wcity',$wcity);
      $stmt->bindparam(':wstate',$wstate);
      $stmt->bindparam(':wcountry',$wcountry);
      $stmt->bindparam(':wzipcode',$wzipcode);
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
?>