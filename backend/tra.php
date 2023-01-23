<?php
session_start(); 
require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email   = $_SESSION['email']     ;
        
        $travel_form    = $_POST['travel_form']   != "" ? $_POST['travel_form']    : "null";
        $mode           = $_POST['mode']          != "" ? $_POST['mode']           : "null"     ;
        $reach_in       = $_POST['reach_in']      != "" ? $_POST['reach_in']       : "null"     ;
        $date_reach_in  = $_POST['date_reach_in']  ;
        $time_reach_in  = $_POST['time_reach_in']  ;
        $flight_no      = $_POST['flight_no']     != "" ? $_POST['flight_no']      : "null"     ;
        $train_no       = $_POST['train_no']      != "" ? $_POST['train_no']       : "null"     ;
        $cab            = $_POST['cab']           != "" ? $_POST['cab']            : "null"     ;
        $cab_type       = $_POST['cab_type']      != "" ? $_POST['cab_type']       : "null"     ;
        $no_acc         = $_POST['no_acc']        != "" ? $_POST['no_acc']         : "null"     ;
        $date_reach_out = $_POST['date_reach_out']    ;
        $time_reach_out = $_POST['time_reach_out']    ;
        $reach_out      = $_POST['reach_out']     != "" ? $_POST['reach_out']      : "null"     ;

        $sql = "UPDATE `hc` SET `travel_form`     = :travel_form,
                                 `mode`          = :mode ,
                                 `reach_in`      = :reach_in,
                                 `date_reach_in` = :date_reach_in,
                                 `time_reach_in` = :time_reach_in,
                                 `flight_no`     = :flight_no,
                                 `train_no`      = :train_no,
                                 `cab`           = :cab,
                                 `cab_type`      = :cab_type,
                                 `no_acc`        = :no_acc,
                                 `date_reach_out` = :date_reach_out,
                                 `time_reach_out` = :time_reach_out,
                                 `reach_out`      = :reach_out
                                  WHERE `email`   = '$email'";

        $stmt=$GLOBALS["conn"]->prepare($sql);

      $stmt->bindparam(':travel_form',$travel_form);
      $stmt->bindparam(':mode',$mode);
      $stmt->bindparam(':reach_in',$reach_in);
      $stmt->bindparam(':date_reach_in',$date_reach_in);
      $stmt->bindparam(':time_reach_in',$time_reach_in);
      $stmt->bindparam(':flight_no',$flight_no);
      $stmt->bindparam(':train_no',$train_no);
      $stmt->bindparam(':cab',$cab);
      $stmt->bindparam(':cab_type',$cab_type);
      $stmt->bindparam(':no_acc',$no_acc);
      $stmt->bindparam(':date_reach_out',$date_reach_out);
      $stmt->bindparam(':time_reach_out',$time_reach_out);
      $stmt->bindparam(':reach_out',$reach_out);
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