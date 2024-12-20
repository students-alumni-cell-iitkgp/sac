<?php
    session_start();   

    if(!isset($_SESSION['email']))
    {
      header("Location: logout.html");
    }
        // CREATING SESSION  
          $cost  = $_SESSION['cost']    ;
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="css/form.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>


<body>
    <?php include 'navbar.php' ?>
    <form action = "backend\reciept.php" method = "post">
        <div class="wrapper">
                
            <div class="container">
                <div class="row"> 
                    <h5 style="font-weight: 800; padding-left: 1vw;">Pay the reqired amount to the given account and upload the reciept</h5>
                    <div class = "col-12"><h2 style = "color: #691313f5;"><?php echo "$cost"?></h2></div>
                    <div class = "col-12"><ul style="margin-left:1vw;">
                        <li>ACCOUNT HOLDER NAME: IIT KGP AAIR EVENTS FUND</li>
                        <li>BANK: HDFC BANK</li>
                        <li>ACCOUNT NO: 50100217409918</li>
                        <li>IFSC: HDFC0001065</li>
                        <li>MICR: 721240102</li>
                        <li>SWIFT CODE: HDFCINBBCAL</li>
                    </ul></div>

                    <div class="col-sm-12 col-md-12">
                        <label for="reciept">Drive Link for Fee Reciept <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" id="reciept" name="reciept" required>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-between justify-content-around guesth">
            <div class=" col-md-2 col-3">  <button class="btn btn-primary"> <a href="Utility/get_update.php" style="color:inherit;text-decoration:none" > Skip for now</a></button></div>   
            <div class=" col-md-1 col-3">  <button type="submit" id="submit" value = "submit" class="btn btn-primary">Submit</button></div>

            </div>
        </div>
    </form>
    <?php include 'footer.php' ?>
    <script>
    Filevalidation = () => {
        const fi = document.getElementById('reciept');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (var i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                //console.log(file);
                if(fsize > 5242880){
                    //console.log(file);
                    document.getElementById('submit').disabled = true;
                }
            }
        }
    }
</script>
</body>



