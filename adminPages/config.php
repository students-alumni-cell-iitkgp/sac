 <?php 
  include '../connection.php';
  // $host="localhost";
  // $db="admin";
  // $user="root";
  // $pass="";
  $db="aam";
  $charset="utf8mb4";
  $dsn="mysql:host=$DB_HOST;dbname=$db;charset=$charset";
  // $dsn="mysql:host=$host;dbname=$db;charset=$charset";
  try { 
    // $pdo= new PDO($dsn,$user,$pass);
    $pdo= new PDO($dsn,$DB_USER,$DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e ) {
      echo "<h1>Error connecting to db</h1>";
  }
  include 'operations.php';
  include 'loginfunctions.php';
?> 