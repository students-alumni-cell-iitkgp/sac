<?php
   
//    include ("credentials.php");

   // Create connection
   $conn = new mysqli("localhost", "root", "s@cell#2026", "homecoming");
   // Check connection
   if ($conn->connect_error) 
   {
       die("Connection failed: " . $conn->connect_error);
   } 
  
//     include ("connection.php");

//     try {
    
//     $conn = new PDO("mysql:host=$DB_HOST; dbname=$DB_NAME",$DB_USER, $DB_PASS);
//     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     }
//     catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//    }

?>