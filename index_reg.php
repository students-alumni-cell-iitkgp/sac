<?php
    include('config.php');
?>
<?php
    include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <script type="text/javascript">
        $(document).ready( function () 
        {
            $('#example').DataTable();
        } );
        
    </script>
</head>
<body style="font-size: 13px;">

    <div>
    <h3>Welcome <?php echo $login_session; ?></h3> 
    <h4><a href = "logout_reg.php">Sign Out</a></h4>
    <h4><a href = "newReg.php"> New Registration</a></h4>
    <table id="example">

        <thead>
            <th style="display: none;">Id</th>
            <th>Submit</th>
            <th>Name</th>
            <th>Comment</th>
            <th>Batch</th>
            <th style="width: 100px;">Department</th>
            <th>Amount</th>
            <th style="width: 50px;">Accompany</th>
            <th>Payment/Acco Status</th>
            <th>Contact</th>
            <th>Guest House</th>
            <th>Room No.</th>
            <th style="width: 150px;">Email</th>
            <th>Hall</th>
        </thead>
        <tbody>
            <?php

                $result = mysqli_query($conn,"SELECT * FROM `user`");

                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo '<form method="POST" action="updateTable.php">';
                        echo "<td style='display: none;'>" . $row['id'] . "</td>";
                        echo "<td> <button type='submit' name='id' value=". $row['id'] .">Submit</button></td>";
                        echo "<td>" . $row['name'] ."</td>";
                        echo "<td><input style='width:70px;' type='text' name='comment' value='".$row['comment']."' ></td>";
                        echo "<td>" . $row['batch'] . "</td>";
                        echo "<td>" . $row['department'] . "</td>";
                            echo "<td><input style='width:70px;' type='number' name='Amount-of-Payment' value=".$row['amount']." ><br>";

                        echo "<td><input style='width:70px;' type='number' name='accompany' value=".$row['accompany']." ></td>";
                        echo"<td>";
                        if($row['payment_status']=='1')
                            {
                                echo "<input type='checkbox' name='payment-status' value=1 checked> payment-status<br>";
                            } 
                        else
                        {
                            echo "<input type='checkbox' name='payment-status' value=1 > payment-status<br>";
                        }
                        if($row['reg_status']=='1')
                            {
                                echo "<input type='checkbox' name='regdesk-status' value=1 checked> regdesk-status<br>";
                            } 
                        else
                        {
                            echo "<input type='checkbox' name='regdesk-status' value=1 > regdesk-status<br>";
                        }
                        if($row['card_made']=='1')
                            {
                                echo "<input type='checkbox' name='card-made' value=1 checked> Card-Made<br>";
                            } 
                        else
                        {
                            echo "<input type='checkbox' name='card-made' value=1 > Card-Made<br>";
                        }
                        if($row['card_given']=='1')
                            {
                                echo "<input type='checkbox' name='card-given' value=1 checked> Card-Given<br>";
                            } 
                        else
                        {
                            echo "<input type='checkbox' name='card-given' value=1 > Card-Given<br>";
                        }
                        if($row['acco_status']=='1')
                            {
                                echo "<input type='checkbox' name='acco-status' value=1 checked > Acco-Status";
                            } 
                        else
                        {
                            echo "<input type='checkbox' name='acco-status' value=1 > Acco-Status";
                        }
                         
                        echo"</td>";
                        echo "<td>" . $row['contact'] . "</td>";
                        echo "<td><input style='width:70px;' type='text' name='guest-house' value='".$row['guest_house']."'></td>";
                        echo "<td><input style='width:70px;' type='text' name='room-no' value='".$row['room']."'><br>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['hall'] . "</td>";
                    echo "</form>";
                    echo "</tr>";
                }
            ?>
            
        </tbody>
    </table>
    </div>
</body>
</html>