<?php
session_start(); 
include '../config.php';
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
        $dosedate = "yes";

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

      function convert($str){
        $str = str_replace(".","-",$str);
        $str = str_replace("@","-",$str);
        return $str;
      }
    
      $sql = "INSERT INTO `aam` (`Name`,`email`, `address` ,`city`,`state`,`country`,`zipcode`,`mobile`,`dob`,
                 `status`, `certificate` ,`dosedate`,
                 `marital`, `accompaniments` ,`gh`,
                 `industry`, `profession` ,`organisation`,`designation`,`waddress`,`wcity`,`wstate`,`wcountry`,`wzipcode`,
                 `rollno`, `joinyear` ,`degree`,`dept`,`hall`,`yog`,`involvement`,`hobbies`,`cost`)
                 VALUES (:Name, :email, :address ,:city,:state,:country,:zipcode,:mobile,:dob,
                 :status, :certificate ,:dosedate,
                 :marital, :accompaniments ,:gh,
                 :industry, :profession ,:organisation,:designation,:waddress,:wcity,:wstate,:wcountry,:wzipcode,
                 :rollno, :joinyear ,:degree,:dept,:hall,:yog,:involvement,:hobbies,:cost)";
        // binding params
      $stmt=$GLOBALS["conn"]->prepare($sql);
      $stmt->bindparam(':Name',$name);$stmt->bindparam(':email',$email);$stmt->bindparam(':address',$address);$stmt->bindparam(':city',$city);$stmt->bindparam(':state',$state);$stmt->bindparam(':country',$country);$stmt->bindparam(':zipcode',$zipcode);$stmt->bindparam(':mobile',$mobile);$stmt->bindparam(':dob',$dob);$stmt->bindparam(':status',$status);$stmt->bindparam(':certificate',$certificate);$stmt->bindparam(':dosedate',$dosedate);$stmt->bindparam(':marital',$marital);$stmt->bindparam(':accompaniments',$accompaniments);$stmt->bindparam(':gh',$gh);$stmt->bindparam(':industry',$industry);$stmt->bindparam(':profession',$profession);$stmt->bindparam(':organisation',$organisation);$stmt->bindparam(':designation',$designation);$stmt->bindparam(':waddress',$waddress);$stmt->bindparam(':wcity',$wcity);$stmt->bindparam(':wstate',$wstate);$stmt->bindparam(':wcountry',$wcountry);$stmt->bindparam(':wzipcode',$wzipcode);$stmt->bindparam(':rollno',$rollno);$stmt->bindparam(':joinyear',$joinyear);$stmt->bindparam(':degree',$degree);$stmt->bindparam(':dept',$dept);$stmt->bindparam(':hall',$hall);$stmt->bindparam(':yog',$yog);$stmt->bindparam(':involvement',$involvement);$stmt->bindparam(':hobbies',$hobbies);$stmt->bindparam(':cost',$cost);
      //executing
      $result=$stmt->execute();
      if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>'; 

           /// insert email in travel table by this we only have to update travel travel
           $sql = "INSERT INTO `travel` (`email`) VALUES (:email)";
           $stmt=$GLOBALS['conn']->prepare($sql);
           $stmt->bindparam(':email',$email);
           $resu = $stmt->execute();
           if($resu){
               header("Location: ../Utility/get_update.php");
               //get_update.php C:\xampp\htdocs\sac\get_update.php
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

        //header("Location: get_update.php");
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
      // }

    }   
?>
