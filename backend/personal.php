<?php
session_start(); 
require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email   = $_SESSION['email']     ;
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $zipcode = $_POST['zipcode'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];

        $sql = "UPDATE `hc22` SET `name`          = :name,
                                 `address`        = :address ,
                                 `city`           = :city,
                                 `state`          = :state,
                                 `country`        = :country,
                                 `zipcode`        = :zipcode,
                                 `mobile`         = :mobile,
                                 `dob`            = :dob
                                  WHERE `email` = '$email'";

        $stmt=$GLOBALS["conn"]->prepare($sql);

        $stmt->bindparam(':name',$name);
      $stmt->bindparam(':address',$address);
      $stmt->bindparam(':city',$city);
      $stmt->bindparam(':state',$state);
      $stmt->bindparam(':country',$country);
      $stmt->bindparam(':zipcode',$zipcode);
      $stmt->bindparam(':mobile',$mobile);
      $stmt->bindparam(':dob',$dob);
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