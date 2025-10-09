 <?php 


  //nirmal
$servername = "localhost";
// $dbname = 'sac_aam22';
// $username = 'sac_aam';
// $password = 'sac@aam22';

  $dbname = 'aam';
  $username = 'root';
  $password = '';
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?> 

