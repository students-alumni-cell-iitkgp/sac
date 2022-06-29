<?php 
    $title="success"; 
    include 'includeAdmin/header.php'; 
    $path="../connection.php"; 
    include 'config.php'; 
    if(isset($_POST['submit'])){ 
      
        // isset checks if submit key is there or not
        //$isSuccess=insert($_POST['name'],$_POST['email'],$_POST['accompaniment'],$_POST['payment'],$_POST['vaccination'],$_POST['gh'],$_POST['yog']);
        $isSuccess=insert($_POST['name'],$_POST['email'],$_POST['accompaniment'],$_POST['payment'],$_POST['gh'],$_POST['yog']);

        if($isSuccess){
            echo "<h1 class='text-success text-center'>Registered succesfully</h1>";
          
        }else{
            echo "<h1>Couldn't register</h1>";
        }
    }
?>
    <?php echo $_POST['name'].'<br/>' ; ?>
    <?php echo $_POST['email'].'<br/>' ; ?>
    <?php echo $_POST['accompaniment'].'<br/>' ; ?>
    <?php echo $_POST['payment'].'<br/>' ; ?>
    <?php /*echo $_POST['vaccination'] ;*/ ?>
    <?php echo $_POST['gh'] ; ?>
    <?php echo $_POST['yog'] ; ?>

<?php include 'includeAdmin/footer.php'; ?>