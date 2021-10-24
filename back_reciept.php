<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $reciept = $_POST['reciept'];
       

        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        
      // Connecting to the Database
      $servername = "172.17.0.8";
      $username = "root";
      $password = "Sac@123";
      $database = "aam";


      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $target_dir = "./aam_reg/";
        $_FILES["reciept"]["name"] = $email."1";
        $target_file = $target_dir . basename($_FILES["reciept"]["name"]);
        echo $target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["reciept"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["reciept"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
        $sql = "UPDATE `aam` SET `reciept` = '$reciept' WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        header("Location: paymentSuccessful.html");
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