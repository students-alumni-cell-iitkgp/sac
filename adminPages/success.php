<?php 
    $title="success"; 
    include 'includeAdmin/header.php'; 
    $path="../connection.php"; 
    include 'config.php'; 
    if(isset($_POST['submit'])){ 
      
        // isset checks if submit key is there or not
        $isSuccess=insert($_POST['Name'],$_POST['email'],$_POST['accompaniments'],$_POST['payment'],$_POST['vaccination'],$_POST['gh'],$_POST['yog']);
        
        if($isSuccess){
            echo "<h1 class='text-success text-center'>Registered succesfully</h1>";
          
        }else{
            echo "<h1>Couildn't register</h1>";
        }
    }
?>
    <?php echo $_POST['Name'].'<br/>' ; ?>
    <?php echo $_POST['email'].'<br/>' ; ?>
    <?php echo $_POST['accompaniments'].'<br/>' ; ?>
    <?php echo $_POST['payment'].'<br/>' ; ?>
    <?php echo $_POST['vaccination'] ; ?>
    <?php echo $_POST['gh'] ; ?>

<?php include 'includeAdmin/footer.php'; ?>