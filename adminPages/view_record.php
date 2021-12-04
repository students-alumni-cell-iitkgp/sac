<?php 
    $title="success"; 
    include 'includeAdmin/header.php'; 
    $path="../connection.php"; 
    include 'config.php'; 
    if(isset($_GET['id'])){
        $result=viewrecord($_GET['id']);

    }else{
        echo "error getting the record :(";
    }
?>
<br/><br/>
    <?php echo $result['id'].'<br/>' ; ?>
    <?php echo $result['fname'].'<br/>' ; ?>
    <?php echo $result['lname'].'<br/>' ; ?>
    <?php echo $result['dob'].'<br/>' ; ?>
    <?php echo $result['email'].'<br/>' ; ?>
    <?php echo $result['expertise'] ; ?>

<?php include '../includeAdmin/header.php'; ?> 