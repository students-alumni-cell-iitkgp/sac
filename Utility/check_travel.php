<?php
session_start();  
include_once('../config.php');

    $email = $_SESSION['email'];

//// Establish database connection 
//
//// Establish database connection using MYSQLI.
//  $db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
//  // Check connection
//  if (mysqli_connect_errno())
//  {
//        echo "Failed to connect to MySQL: " . mysqli_connect_error();
//  }
//
// //####### End of dbconfig.php #######

// code user Email availablity
//if(!empty($email)) {
//
//  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
//    
//    echo "error :you did not enter a valid email.";
//  }
//  else {
    $sql ="SELECT `email` FROM `travel` WHERE `email` = '$email' ";
    $stmt=$GLOBALS["conn"]->prepare($sql);
    $results = $stmt->execute();
    $num_rows =  $stmt->fetchColumn();

    //$results = $stmt->fetchAll();

    //$num_row = 0;

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