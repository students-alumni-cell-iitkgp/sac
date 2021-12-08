<?php 

function insert($name,$email,$accompaniments,$payment,$vaccination,$gh,$yog){
      try{ 
            //defining the sql statement to be executed
            //backticks are used instead of single quotes!!
            $sql="INSERT INTO `aam`( `Name`, `email`,`accompaniments`, `reciept`, `status`,`gh`,`yog`) VALUES (:name,:email,:accompaniments,:payment,:vaccination,:gh,:yog)";
            //preparing the sql statement for execution
            $stmt=$GLOBALS["pdo"]->prepare($sql);
            $stmt->bindparam(':Name',$name);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':accompaniments',$accompaniments);
            $stmt->bindparam(':payment',$payment);
            $stmt->bindparam(':vaccination',$vaccination);
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
        $sql="SELECT * FROM `aam`";
        $results=$GLOBALS["pdo"]->query($sql);
        return $results;
      } catch(PDOException $e) {
          echo $e->getmessage();
          return false;
      }
  
  }
function viewrecord($id){
    try {
      $sql="SELECT * FROM `aam`  WHERE `id`=:id";
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
      $sql2="UPDATE `aam` SET `boolean` = :bool WHERE `email` = :email;";
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
      $sql="SELECT * FROM `aam`  WHERE `yog`=:batch AND `boolean`='1' ";
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