

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

</html>


<?php

session_start();


$DB_NAME = 'acap';
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($connection->connect_error) {
  // die("Connecton failed: ".$connection->connect_error);
  die("It seems that we cannot talk to our DB right now. Please try again in a couple of minutes");
} else {
//  echo "Connection Successful<br>";
}



@$name = $_POST["name"];
@$phone = $_POST["phoneno"];
@$email = $_POST["email"];
@$roll = $_POST["roll"];
$pc1 = $_POST["PC1"];
$pc2 = $_POST["PC2"];
$pc3 = $_POST["PC3"];
$pc4=$_POST["PC4"];
$captcha_s=$_POST["captcha_s"];

if($_SESSION['captcha_code'] == $captcha_s){


if($name!='' && $phone != "" && $email != "" && $roll != ""&& $pc1 != ""&& $pc2 != "" && $pc3 != ""){

$sql = "INSERT INTO students (name,roll,phone,email,pref1,pref2,pref3,prefcompany)
        VALUES ('$name','$roll','$phone','$email','$pc1','$pc2','$pc3','$pc3')";
echo '<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<!-- Modal Trigger -->
<a class="waves-effect waves-light btn modal-trigger" style="display: none;" href="#modal1">Specialization</a>
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Confirmation</h4>
    <p> Congratulations. Your registration is complete
</p>
  </div>
  <div class="modal-footer">
    <a href="acap.php" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
  $("#modal1").openModal();
});
</script>
</body>';

if ($connection->query($sql)) {
  $connection->close();
 // header('Location: ./registration-complete.php');
  exit;
} else {
  echo "Error: " . $connection->error;
}

}

else {
  echo '<body>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" style="display: none;" href="#modal1">Specialization</a>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Error</h4>
      <p> Please fill ALL the details properly
  </p>
    </div>
    <div class="modal-footer">
      <a href="acap.php" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

  <script type="text/javascript">
  	$(document).ready(function() {
    $("#modal1").openModal();
  });
  </script>
  </body>';

}
}
else
{
  echo '<body>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" style="display: none;" href="#modal1">Specialization</a>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Error</h4>
      <p> WRONG CAPTCHA
  </p>
    </div>
    <div class="modal-footer">
      <a href="acap.php" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
    $("#modal1").openModal();
  });
  </script>
  </body>';
}
?>

