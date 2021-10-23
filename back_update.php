<?php 
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
    
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "sac";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        //$sql = "INSERT INTO `alumni` (`name`, `address` ,`city`,`state`,`country`,`zipcode`,`mobile`,`dob`) VALUES ('$name', '$address' ,'$city','$state','$country','$zipcode','$mobile','$dob')";
        $sql = "UPDATE `aam` SET `name` = '$name',
                                 `address` = '$address' ,
                                 `city` = '$city',
                                 `state`          = '$state',
                                 `country`        = '$country',
                                 `zipcode`        = '$zipcode',
                                 `mobile`         = '$mobile',
                                 `dob`            = '$dob',
                                 `status`         = '$status',
                                 `certificate`    = '$certificate',
                                 `dosedate`       = '$dosedate',
                                 `marital`        = '$marital', 
                                 `accompaniments` = '$accompaniments' ,
                                 `gh`             = '$gh',
                                 `industry`       = '$industry', 
                                 `profession`     = '$profession',
                                 `organisation`   = '$organisation',
                                 `designation`    = '$designation',
                                 `waddress`       = '$waddress',
                                 `wcity`          = '$wcity',
                                 `wstate`         = '$wstate',
                                 `wcountry`       = '$wcountry',
                                 `wzipcode`       = '$wzipcode',
                                 `rollno`         = '$rollno',
                                 `joinyear`       = '$joinyear',
                                 `degree`         = '$degree',
                                 `dept`           = '$dept',
                                 `hall`           = '$hall',
                                 `yog`            = '$yog',
                                 `involvement`    = '$involvement',
                                 `hobbies`        = '$hobbies',
                                 `cost` = '$cost' WHERE `email` = '$email'";

        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        header("Location: updateSuccessfully.html");
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