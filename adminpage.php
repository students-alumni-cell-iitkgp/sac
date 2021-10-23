<?php
    session_start();   
        // CREATING SESSION  
          $cost  = $_SESSION['cost']    ;
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>


<body>
    <?php include 'navbar.php' ?>
    <form action = "back_reciept.php" method = "post">
        <div class="wrapper">
                
            <div class="container">
                <div class="row">
                    <h5 style="font-weight: 800; padding-left: 1vw;">Pay the reqired amount to the given account and upload the reciept</h5>
                    <h2 style = "color: #691313f5"><?php echo "$cost"?></h2>

                    <ul style="margin-left:1vw;">
                        <li>ACCOUNT HOLDER NAME: IIT KGP AAIR EVENTS FUND</li>
                        <li>BANK: HDFC BANK</li>
                        <li>ACCOUNT NO: 50100217409918</li>
                        <li>IFSC: HDFC0001065</li>
                        <li>MICR: 721240102</li>
                        <li>SWIFT CODE: HDFCINBBCAL</li>
                    </ul>

                    <div class="col-sm-12 col-md-12">
                        <label for="reciept">Fee Reciept <span style="color:red;">*</span></label>
                        <input class="form-control" type="file" id="reciept" name="reciept" required>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-between justify-content-around guesth">
            <div class=" col-md-2 col-3">  <button class="btn btn-dark"> <a href="AAm.php" style="color:inherit;text-decoration:none" > Skip for now</a></button></div>   
            <div class=" col-md-1 col-3">  <button type="submit" value = "submit" class="btn btn-dark">Submit</button></div>

            </div>
        </div>
    </form>
    <?php include 'footer.php' ?>
</body>



