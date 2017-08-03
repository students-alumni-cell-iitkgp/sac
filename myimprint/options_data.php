<?php
require 'connection.php';
session_start();
$rollno = $_SESSION['rollno'];
if(isset($_POST['vote_slab1']) && isset($_POST['vote_slab2']) && isset($_POST['vote_slab3'])){
  if(!empty($_POST['vote_slab1']) && !empty($_POST['vote_slab2']) && !empty($_POST['vote_slab3'])){
    
    $vote_slab1 = $_POST['vote_slab1'];
    $vote_slab2 = $_POST['vote_slab2'];
    $vote_slab3 = $_POST['vote_slab3'];
    
    $query = "update vote set option1 = '$vote_slab1', option2 = '$vote_slab2', option3 = '$vote_slab3'  where rollno = '$rollno'";
    if($query_run = mysql_query($query)){
      echo '<script>alert("Your choices have been recorded.")</script>'
    }
    
  }
}
?>
