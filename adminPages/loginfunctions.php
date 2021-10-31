<?php 

function adduser($username,$password){
    try {
        $result=getusername($username);
        if(!$result){                    // $result['num]>0 then we will shift all the condn to the else statement
            $newpass=md5($password.$username);
            $sql="INSERT INTO `admins` (`username`,`password`) VALUES (:username,:password)";
            $stmt=$GLOBALS['pdo']->prepare($sql);
            $stmt->bindparam(':username',$username);
            $stmt->bindparam(':password',$newpass);
            $stmt->execute();
            return true;
        }else{
            echo "oops User already exists";
            return false;
        }
        
    } catch(PDOException $e){
        echo $e->getmessage();
        return false;
    }
   
}
function getuser($username,$password){
    try {
        $newpass=md5($password.$username);
        $sql="SELECT * FROM `admins` WHERE username=:username AND password=:password"; //$sql="SELECT count(*) as num FROM `admins` WHERE username=:username"; 
        $stmt=$GLOBALS['pdo']->prepare($sql);
        $stmt->bindparam(':username',$username);
        $stmt->bindparam(':password',$newpass);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;                                            // return $result ..but result here will be num if nothing then 0

    } catch (PDOException $e) {
        echo $e->getmessage();
        return false;
    }
}

function getusername($username){
    try {
        $sql="SELECT * FROM `admins` WHERE username=:username"; //$sql="SELECT count(*) as num FROM `admins` WHERE username=:username"; 
        $stmt=$GLOBALS['pdo']->prepare($sql);
        $stmt->bindparam(':username',$username);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;                                            // return $result ..but result here will be num if nothing then 0

    } catch (PDOException $e) {
        echo $e->getmessage();
        return false;
    }
}

?>