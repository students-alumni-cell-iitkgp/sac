 <?php 
  $host="localhost";
  $db="admin";
  $user="root";
  $pass="";
  $charset="utf8mb4";
  $dsn="mysql:host=$host;dbname=$db;charset=$charset";
  try { 
    $pdo= new PDO($dsn,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e ) {
      echo "<h1>Error connecting to db</h1>";
  }
  include 'operations.php';
  include 'loginfunctions.php';
?> 