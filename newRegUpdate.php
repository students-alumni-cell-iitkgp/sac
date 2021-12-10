<?php
    include ("credentials.php");
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    } 

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['Name'];
        $dep=$_POST['department'];
        $hall=$_POST['hall'];
        $batch=$_POST['batch'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $company=$_POST['company'];
        $desig=$_POST['designation'];
        date_default_timezone_set('Asia/Kolkata');
        $time=date("Y-m-d H:i:s");


        // $sql = "UPDATE `user` SET Amount_of_Payment='$amount', payment_status='$payment',room_no='$room',acco_status='$acco',regdesk_status='$reg', comment='$comment', Accompaniments='$accompany' WHERE id=$ids" ;
        $sql = "INSERT INTO `user` (`timestamp`, `Name`, department, hall, batch,contact,email,company,designation) VALUES ('$time', '$name', '$dep','$hall','$batch','$contact','$email','$company','$desig')";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }


        header('Location: index_reg.php');

    }

?>