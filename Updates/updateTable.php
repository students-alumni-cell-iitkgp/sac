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
        $ids=$_POST['id'];
        $amount=$_POST['Amount-of-Payment'];
        $payment=$_POST['payment-status'];
        $acco=$_POST['acco-status'];
        $reg=$_POST['regdesk-status'];
        $room=$_POST['room-no'];
        $guesthouse=$_POST['guest-house'];
        $comment=$_POST['comment'];
        $accompany=$_POST['accompany'];
        $cardmade=$_POST['card-made'];
        $cardgiven=$_POST['card-given'];

        print_r($_POST);
        $sql = "UPDATE `user` SET amount='$amount', payment_status='$payment',room='$room', acco_status='$acco', guest_house='$guesthouse', reg_status='$reg', comment='$comment', accompany='$accompany', `card_made`='$cardmade',`card_given`='$cardgiven' WHERE id=$ids";
        if ($conn->query($sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        header('Location: index_reg.php');
    }

?>