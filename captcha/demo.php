
<!doctype html>
<html>
<head>
</head>
<body>

<br>


    <?php if(isset($msg)){?>
    <?php echo $msg;?>
    <?php } ?>
   <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'>
        <br>
        
        <br>
       
    
      
</body>
</html>