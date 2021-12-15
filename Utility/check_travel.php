<?php
session_start();  
include_once('../config.php');

    $email = $_SESSION['email'];
    $sql ="SELECT COUNT(*) FROM `travel` WHERE `email` = '$email' ";
    $stmt=$GLOBALS["conn"]->prepare($sql);
    $results = $stmt->execute();
    $num_rows =  $stmt->fetchColumn();


    if($num_rows > 0)
    {
        header("Location: get_travel.php");

    } else{

       ///if this line execute means resigeter is done and email doesnt exist on travel
       $sql = "INSERT INTO `travel` (`email`) VALUES ('$email')";

       $stmt=$GLOBALS["conn"]->prepare($sql);
       $resu = $stmt->execute();
       //$resu = mysqli_query($db, $sql);
       if($resu){
          header("Location: get_travel.php");
       }
       else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully!(travel) We regret the inconvinience caused!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
       </div>';
       header("Location: ../errorpage.html");
       }
    }
  //}
//}
// End code check email
?>