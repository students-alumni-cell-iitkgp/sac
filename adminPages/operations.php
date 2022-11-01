<?php 

function insert($name,$email,$accompaniment,$payment,$gh,$yog){
      try{ 
            //defining the sql statement to be executed
            //backticks are used instead of single quotes!!
            //$sql="INSERT INTO `hc`( `Name`, `email`,`accompaniments`, `reciept`, `status`,`gh`,`yog`) VALUES (:name,:email,:accompaniments,:payment,:vaccination,:gh,:yog)";
            $sql="INSERT INTO `hc`( `name`, `email`,`accompaniment`, `reciept`,`gh`,`yog`) VALUES (:name,:email,:accompaniment,:payment,:gh,:yog)";
            //preparing the sql statement for execution
            $stmt=$GLOBALS["pdo"]->prepare($sql);
            $stmt->bindparam(':name',$name);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':accompaniment',$accompaniment);
            $stmt->bindparam(':payment',$payment);
            //$stmt->bindparam(':vaccination',$vaccination);
            $stmt->bindparam(':gh',$gh);
            $stmt->bindparam(':yog',$yog);
            $stmt->execute();
            return true;

      }catch(PDOException $e){
          echo $e->getmessage();
          return false;
      }
  }


function view(){
      try {
        $sql="SELECT * FROM `hc`";
        $results=$GLOBALS["pdo"]->query($sql);
        return $results;
      } catch(PDOException $e) {
          echo $e->getmessage();
          return false;
      }
  
  }
function viewrecord($id){
    try {
      $sql="SELECT * FROM `hc`  WHERE `id`=:id";
      $stmt=$GLOBALS["pdo"]->prepare($sql);
      $stmt->bindparam(':id',$id);
      $stmt->execute();
      $result=$stmt->fetch();
      return $result;
    } catch(PDOException $e) {
        echo $e->getmessage();
        return false;
    }

  }
  // function update($id,$name,$email,$accompaniments,$payment,$vaccination){
  //   try{ 
  //         //defining the sql statement to be executed
  //         //backticks are used instead of single quotes!!
  //         $sql="UPDATE `aam` SET `name` = :name, `email` = :email, `accompaniments` = :accompaniments, `payment` = :payment, `vaccination`=:vaccination WHERE `aam`.`id` = :id;";
  //         //preparing the sql statement for execution
  //         $stmt=$GLOBALS["pdo"]->prepare($sql);
  //         $stmt->bindparam(':name',$name);
  //         $stmt->bindparam(':email',$email);
  //         $stmt->bindparam(':accompaniments',$accompaniments);
  //         $stmt->bindparam(':payment',$payment);
  //         $stmt->bindparam(':id',$id);
  //         $stmt->bindparam(':vaccination',$vaccination);
  //         $stmt->execute();
  //         return true;

  //   }catch(PDOException $e){
  //       echo $e->getmessage();
  //       return false;
  //   }
  // }
  function change_boolean($email,$boolean){
    try {
      $bool=($boolean=='1')?'0':'1';
      $sql2="UPDATE `hc` SET `boolean` = :bool WHERE `email` = :email;";
          //preparing the sql2 statement for execution
      $stmt2=$GLOBALS["pdo"]->prepare($sql2);
      $stmt2->bindparam(':bool',$bool);
      $stmt2->bindparam(':email',$email);
      $result=$stmt2->execute();
      return true;
  
    } catch(PDOException $e){
      echo $e->getmessage();
      return false;
    }
  }
  function change_boolean_pay($email,$boolean){
    try {
      $bool=($boolean=='2'?'0':($boolean=='1'?'2':'2'));
      $sql2="UPDATE `hc` SET `pay_status` = :bool WHERE `email` = :email;";
          //preparing the sql2 statement for execution
      $stmt2=$GLOBALS["pdo"]->prepare($sql2);
      $stmt2->bindparam(':bool',$bool);
      $stmt2->bindparam(':email',$email);
      $result=$stmt2->execute();
      return true;
  
    } catch(PDOException $e){
      echo $e->getmessage();
      return false;
    }
  }

  function getBatch($batch){
    try {

      if($batch == "other")
      {
        $sql="SELECT * FROM `hc`  WHERE `yog`!= '1973' AND `yog`!= '1983' AND `yog`!= '1998' AND `boolean`='0' ";
        $stmt=$GLOBALS["pdo"]->prepare($sql);
        $stmt->execute();
        return $stmt;
      }

      $sql="SELECT * FROM `hc`  WHERE `yog`=:batch AND `boolean`='0' ";
          //preparing the sql2 statement for execution
      $stmt=$GLOBALS["pdo"]->prepare($sql);
      $stmt->bindparam(':batch',$batch);
      $stmt->execute();
      return $stmt;
  
    }catch(PDOException $e){
      echo $e->getmessage();
      return false;
    }
  }
?>