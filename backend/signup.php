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

       // $pro_pic = $_POST['pro_pic'];
        //$thumbnail = $_POST['thumbnail'];
        //$password = $_POST['password'];
        //$remember_token = $_POST['remember_token'];
      
       // $covi_status = $_POST['covi_status'];
       // $covi_certi = $_POST['covi_certi'];
        //$covi_dose = "yes";

        //$marital = $_POST['marital'];
        $accompaniment = $_POST['accompaniment'];
        $gh = $_POST['gh'];
        $cost = $_POST['cost'];

        $industry = $_POST['industry'];
        $profession = $_POST['profession'];
        $organisation = $_POST['organisation'];
        $designation = $_POST['designation'];
        $waddress = $_POST['waddress'];
        $wcity = $_POST['wcity'];
        $wstate = $_POST['wstate'];
        $wcountry = $_POST['wcountry'];
        $wzipcode = $_POST['wzipcode'];

        $rollno = $_POST['rollno'];
        $yoj = $_POST['yoj'];
        $degree = $_POST['degree'];
        $dept = $_POST['dept'];
        $hall = $_POST['hall'];
        $yog = $_POST['yog'];
        //$involvement = $_POST['involvement'];
        //$hobbies = $_POST['hobbies'];
        $serial = $_POST['serial'];
        $employee = $_POST['employee'];

        //$reciept = $_POST['reciept'];

      $_SESSION['email'] = $email;
      $_SESSION['password'] = $dob;
      $_SESSION['cost'] = $cost;
      $_SESSION['name'] = $name;
      $_SESSION['gh'] = $gh;
      $_SESSION['accompaniment'] = $accompaniment;

      function convert($str){
        $str = str_replace(".","-",$str);
        $str = str_replace("@","-",$str);
        return $str;
      }
    
      $sql = "INSERT INTO `hc` (`name`,`email`, `address` ,`city`,`state`,`country`,`zipcode`,`mobile`,`dob`,
                 `accompaniment` ,`gh`, `serial`,`employee`,
                 `industry`, `profession` ,`organisation`,`designation`,`waddress`,`wcity`,`wstate`,`wcountry`,`wzipcode`,
                 `rollno`, `yoj` ,`degree`,`dept`,`hall`,`yog`,`cost`)
                 VALUES (:name, :email, :address ,:city, :state, :country, :zipcode, :mobile, :dob,
                 :accompaniment ,:gh,:serial,:employee,
                 :industry, :profession ,:organisation,:designation,:waddress,:wcity,:wstate,:wcountry,:wzipcode,
                 :rollno, :yoj,:degree,:dept,:hall,:yog,:cost)";
       
       // binding params
      $stmt=$GLOBALS["conn"]->prepare($sql);

      $stmt->bindparam(':name',$name);
      $stmt->bindparam(':email',$email);
      $stmt->bindparam(':address',$address);
      $stmt->bindparam(':city',$city);
      $stmt->bindparam(':state',$state);
      $stmt->bindparam(':country',$country);
      $stmt->bindparam(':zipcode',$zipcode);
      $stmt->bindparam(':mobile',$mobile);
      $stmt->bindparam(':dob',$dob);
      //$stmt->bindparam(':covi_status',$covi_status);
      //$stmt->bindparam(':covi_certi',$covi_certi);
      //$stmt->bindparam(':covi_dose',$covi_dose);
      //$stmt->bindparam(':marital',$marital);
      $stmt->bindparam(':serial',$serial);
      $stmt->bindparam(':employee',$employee);
      $stmt->bindparam(':accompaniment',$accompaniment);
      $stmt->bindparam(':gh',$gh);
      $stmt->bindparam(':industry',$industry);
      $stmt->bindparam(':profession',$profession);
      $stmt->bindparam(':organisation',$organisation);
      $stmt->bindparam(':designation',$designation);
      $stmt->bindparam(':waddress',$waddress);
      $stmt->bindparam(':wcity',$wcity);
      $stmt->bindparam(':wstate',$wstate);
      $stmt->bindparam(':wcountry',$wcountry);
      $stmt->bindparam(':wzipcode',$wzipcode);
      $stmt->bindparam(':rollno',$rollno);
      $stmt->bindparam(':yoj',$yoj);
      $stmt->bindparam(':degree',$degree);
      $stmt->bindparam(':dept',$dept);
      $stmt->bindparam(':hall',$hall);
      $stmt->bindparam(':yog',$yog);
      //$stmt->bindparam(':involvement',$involvement);
      //$stmt->bindparam(':hobbies',$hobbies);
      $stmt->bindparam(':cost',$cost);
       
      //executing
      $result=$stmt->execute();
      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your entry has been submitted successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>'; 

      $em=explode('@',  $email);
      // file name, type, size, temporary name 
      $file_name = $_FILES['pro_pic']['name']; 
      $file_type = $_FILES['pro_pic']['type']; 
      $ext=explode('.',  $file_name);
      $file_tmp_name = $_FILES['pro_pic']['tmp_name']; 
      $file_size = $_FILES['pro_pic']['size']; 

   
      // target directory 
      $target_dir = "../uploads/"; 
      $fetch_dir="uploads/";
     
      // uploding file 
      if(move_uploaded_file($file_tmp_name,$target_dir.$em[0].'.'.$ext[1])) 
      { 

        $q = "update `hc` SET `pro_pic` = '$fetch_dir$em[0].$ext[1].' WHERE `email` = '$email'"; 
        $stmt=$GLOBALS["conn"]->prepare($q);
        $result=$stmt->execute();
        
      } 
      else 
      { 
        echo "File can not be uploaded"; 
      } 

        if($gh == 'TGH')
        {
          $sql = "UPDATE `acco` SET `av` = `av`-1 WHERE `name` = 'TGH'";
          $stmt=$GLOBALS["conn"]->prepare($sql);
          $result = $stmt->execute();
        }
        else if($gh == 'SAM')
        {
          $sql = "UPDATE `acco` SET `av` = `av`-1 WHERE `name` = 'SAM'";
          $stmt=$GLOBALS["conn"]->prepare($sql);
          $result = $stmt->execute();
        }
        
     // header("Location: ../Utility/mail.php");
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
      // }

    }   
?>
