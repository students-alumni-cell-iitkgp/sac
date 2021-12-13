<?php 
session_start(); 
require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $email = $_SESSION['email'];

        $kgpdoa        = $_POST['kgpdoa']      ;
        $kgptimetocome = $_POST['kgptimetocome']   ;
        $kgpmodeofT    = $_POST['kgpmodeofT']   ;
        $kgppickup     = $_POST['kgppickup']      ; 
        $kgppcount     = $_POST['kgppcount']   ;
        $kgpcarseater  = $_POST['kgpcarseater']      ; 

        $airdoa        = $_POST['airdoa']      ;
        $airtimetocome = $_POST['airtimetocome']   ;
        $airmodeofT    = $_POST['airmodeofT']   ;
        $airpickup     = $_POST['airpickup']      ; 
        $airpcount     = $_POST['airpcount']   ;
        $aircarseater  = $_POST['aircarseater']      ; 
        

      // Create a connection
      //$database = 'aam';
      //$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $database);
      //// Die if connection was not successful
      //if (!$conn){
      //    die("Sorry we failed to connect: ". mysqli_connect_error());
      //}
      //else{ 
        $sql = "UPDATE `travel` SET `kgpdoa`        = '$kgpdoa',
                                    `kgptimetocome` = '$kgptimetocome' ,
                                    `kgpmodeofT`    = '$kgpmodeofT',
                                    `kgppickup`     = '$kgppickup',
                                    `kgppcount`     = '$kgppcount',
                                    `kgpcarseater`  = '$kgpcarseater',
                                    `airdoa`        = '$airdoa',
                                    `airtimetocome` = '$airtimetocome' ,
                                    `airmodeofT`    = '$airmodeofT',
                                    `airpickup`     = '$airpickup',
                                    `airpcount`     = '$airpcount',
                                    `aircarseater`  = '$aircarseater'
                                  WHERE `email` = '$email'";

        //$result = mysqli_query($conn, $sql);
        $stmt=$GLOBALS["conn"]->prepare($sql);
        $result = $stmt->execute();
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        header("Location: ../Utility/updatesuccessfully.html");
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