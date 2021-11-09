<?php 

function insert($name,$email,$accompaniments,$payment,$vaccination,$gh){
      try{ 
            //defining the sql statement to be executed
            //backticks are used instead of single quotes!!
            $sql="INSERT INTO `aam`( `name`, `email`,`accompaniments`, `reciept`, `status`,`gh`) VALUES (:name,:email,:accompaniments,:payment,:vaccination,:gh)";
            //preparing the sql statement for execution
            $stmt=$GLOBALS["pdo"]->prepare($sql);
            $stmt->bindparam(':name',$name);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':accompaniments',$accompaniments);
            $stmt->bindparam(':payment',$payment);
            $stmt->bindparam(':vaccination',$vaccination);
            $stmt->bindparam(':gh',$gh);
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
  function delete($id){
    try {
      $sql="DELETE FROM `aam` WHERE `id`=:id";
      $stmt=$GLOBALS['pdo']->prepare($sql);
      $stmt->bindparam(':id',$id);
      $stmt->execute();
      return true;
  
    } catch(PDOException $e){
      echo $e->getmessage();
      return false;
    }
  }
?>