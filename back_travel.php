<?php 
session_start(); 
require 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $email = $_SESSION['email'];
        $doa        = $_POST['doa']      ;
        $timetocome = $_POST['timetocome']   ;
        $modeofT    = $_POST['modeofT']   ;
        $pickup     = $_POST['pickup']      ; 
        

      // Create a connection
      $database = 'aam';
      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        $sql = "UPDATE `aam` SET `doa` = '$doa',
                                 `timetocome` = '$timetocome' ,
                                 `modeofT` = '$modeofT',
                                 `pickup`         = '$pickup'
                                  WHERE `email` = '$email'";

        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        header("Location: updatesuccessfully.html");
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
      }

    }   
?>