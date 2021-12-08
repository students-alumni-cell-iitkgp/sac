 <?php 
  include $path;
  //testing
  // $DB_HOST="localhost";
  // $database="admin";
  // $DB_USER="root";
  // $DB_PASS="";
  // $charset="utf8mb4";
  //main

  $DB_NAME = "aam";
   $charset="utf8mb4";

  
  $dsn="mysql:host=$DB_HOST;dbname=$DB_NAME;charset=$charset";
  try { 
    
    $pdo= new PDO($dsn,$DB_USER,$DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e ) {
      echo "<h1>Error connecting to db</h1>";
  }
  include 'operations.php';
  include 'loginfunctions.php';
?> 