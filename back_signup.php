<?php
session_start(); 
require 'connection.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $zipcode = $_POST['zipcode'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];

        $status = $_POST['status'];
        $certificate = $_POST['certificate'];
        $dosedate = $_POST['valid'];

        $marital = $_POST['marital'];
        $accompaniments = $_POST['accompanyingNo'];
        $gh = $_POST['room'];
        $cost = $_POST['cost'];

        $industry = $_POST['industry'];
        $profession = $_POST['profession'];
        $organisation = $_POST['orgName'];
        $designation = $_POST['designation'];
        $waddress = $_POST['work_address'];
        $wcity = $_POST['work_city'];
        $wstate = $_POST['work_state'];
        $wcountry = $_POST['work_country'];
        $wzipcode = $_POST['work_zipcode'];

        $rollno = $_POST['rollNum'];
        $joinyear = $_POST['joinYear'];
        $degree = $_POST['degree'];
        $dept = $_POST['department'];
        $hall = $_POST['hall'];
        $yog = $_POST['graduatingYear'];
        $involvement = $_POST['involvements'];
        $hobbies = $_POST['hobbies'];

        //$reciept = $_POST['reciept'];

      $_SESSION['email'] = $email;
      $_SESSION['password'] = $dob;
      $_SESSION['cost'] = $cost;


      // Create a connection
      $database = "aam";
      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $database);
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        //$sql = "INSERT INTO `alumni` (`name`, `address` ,`city`,`state`,`country`,`zipcode`,`mobile`,`dob`) VALUES ('$name', '$address' ,'$city','$state','$country','$zipcode','$mobile','$dob')";
        $target_dir = "aam_reg/";
        $target_file = $target_dir . basename($_FILES["certificate"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $_FILES["certificate"]["name"] = $email."1.pdf";
        $_FILES["certificate"]["name"] = $_FILES["certificate"]["name"].$imageFileType;
        $target_file = $target_dir . basename($_FILES["certificate"]["name"]);

        if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["certificate"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }

        $certificate = $target_file;
        $sql = "INSERT INTO `aam` (`name`,`email`, `address` ,`city`,`state`,`country`,`zipcode`,`mobile`,`dob`,
                 `status`, `certificate` ,`dosedate`,
                 `marital`, `accompaniments` ,`gh`,
                 `industry`, `profession` ,`organisation`,`designation`,`waddress`,`wcity`,`wstate`,`wcountry`,`wzipcode`,
                 `rollno`, `joinyear` ,`degree`,`dept`,`hall`,`yog`,`involvement`,`hobbies`,`cost`)
                 VALUES ('$name', '$email', '$address' ,'$city','$state','$country','$zipcode','$mobile','$dob',
                 '$status', '$certificate' ,'$dosedate',
                 '$marital', '$accompaniments' ,'$gh',
                 '$industry', '$profession' ,'$organisation','$designation','$waddress','$wcity','$wstate','$wcountry','$wzipcode',
                 '$rollno', '$joinyear' ,'$degree','$dept','$hall','$yog','$involvement','$hobbies','$cost')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        header("Location: adminpage.php");
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
