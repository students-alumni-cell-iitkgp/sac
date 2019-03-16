<?php

require 'connection.php';
session_start();
$query="SELECT * FROM users WHERE email='".$_SESSION["email"]."'";
if( $query_run = mysqli_query($connection, $query) ){
  $row = mysqli_fetch_assoc($query_run);
  $name = $row['name'];
}

@$file_name = $name.'.'.end(explode(".",$_FILES["filetoupload"]["name"] ));

$target_dir = "upload/";
$target_file = $target_dir . basename($file_name);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  @$check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
  if($check !== false) {
    $message =  "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $message =  "File is not an image.";
    $uploadOk = 0;
  }
}
// Check if file already exists
/*
if (file_exists($target_file)) {
  $message =  "Sorry, file already exists.";
  $uploadOk = 0;
}*/
// Check file size
if ($_FILES["filetoupload"]["size"] > 510000) {
  $message1 =  "Your picture is too large, must be less than 500 Kb";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  $message1 =  "Only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $message =  "Sorry, your picture was not uploaded.";
// if everything is ok, try to upload file
}
else
{
  if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file))
  {
    $sql = "UPDATE users SET url ='$target_file' WHERE email='".$_SESSION["email"]."'";

    
    if ($connection->query($sql)) 
    {
      $connection->close();
      $message =  "Your profile pic has been uploaded";
    } 
    else 
    {
      $message =  "Error: " . $connection->error;
    }

  }
  else 
  {
    $message =  "Sorry, there was an error uploading your file.";
  }
}

?>

<link rel="stylesheet" href="css/materialize.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<body>


  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" style="display: none;" href="#modal_message"></a>
  <div id="modal_message" class="modal">
    <div class="modal-content">
      <?php
      echo $message.'<br>'.@$message1;
      ?>
    </div>
    <div class="modal-footer">
      <a href="home_hc.php" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#modal_message").openModal();
    });
  </script>
</body>
