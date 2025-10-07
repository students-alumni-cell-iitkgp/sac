 <?php 
<<<<<<< HEAD
  // include $path;
  
  // //testing
  // $DB_HOST="localhost";
  // $database="Registration";
  // $DB_USER="root";
  // $DB_PASS="Sac@123";
  // $charset="utf8mb4";
  // //main

  // $DB_NAME = "AAM";
  // $charset="utf8mb4";

  
  // $conn=new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  // include 'operations.php';
  // include 'loginfunctions.php';

//   $DB_HOST="localhost";
//   $database="Registration";
//   $DB_USER="root";
//   $DB_PASS="Sac@123";
//   $charset="utf8mb4";
//   //main

//   $DB_NAME = "Registration";
//   $charset="utf8mb4";

//    // Create connection
//    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
=======
  include $path;
  //testing
  $DB_HOST="localhost";
  $database="admin";
  $DB_USER="root";
  $DB_PASS="";
  $charset="utf8mb4";
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
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
?> 