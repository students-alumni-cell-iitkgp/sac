<?php
    session_start();
    require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $reciept = $_POST['reciept'];
       

        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        
      // Create a connection
      //$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, "aam");
      //// Die if connection was not successful
      //if (!$conn){
      //    die("Sorry we failed to connect: ". mysqli_connect_error());
      //}
      //else{ 
        // Submit these to a database
        // Sql query to be executed 
        // $target_dir = "AAMuploads/";
        // $target_file = $target_dir . basename($_FILES["reciept"]["name"]);
        // $uploadOk = 1;
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // $_FILES["reciept"]["name"] = $email."2.";
        // $_FILES["reciept"]["name"] = $_FILES["reciept"]["name"].$imageFileType;
        // $target_file = $target_dir . basename($_FILES["reciept"]["name"]);

        // if (move_uploaded_file($_FILES["reciept"]["tmp_name"], $target_file)) {
        //   echo "The file ". htmlspecialchars( basename( $_FILES["reciept"]["name"])). " has been uploaded.";
        // } else {
        //   echo "Sorry, there was an error uploading your file.";
        // }
        $sql = "UPDATE `aam` SET `reciept` = '$reciept' WHERE `email` = '$email'";
        $stmt=$GLOBALS["conn"]->prepare($sql);
        $result = $stmt->execute();
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        header("Location: ../Utility/paymentSuccessful.html");
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