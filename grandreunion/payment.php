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

    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="./css/payment.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <!-- <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
     CSS only
    <link rel="stylesheet" href="css/form.css">
    JS, Popper.js, and jQuery 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->
</head>


<body>
<?php include('navbar.php') ?>
<div class="signup__container">
  <div class="container__child child1 signup__thumbnail">
    <div class="thumbnail__content text-center">
      <h1 class="heading--primary">Payment</h1>
      <h2 class="heading--secondary"></h2>
    </div>
    <div class="signup__overlay"></div>
  </div>
  <div class="container__child child2 signup__form">
    
    <div class="heading--primary-inside">
    <h5 style="font-weight: 500; padding-left: 1vw;">Pay the reqired amount to the given account and upload the reciept</h5>
                    <div class = "col-12"><h2 style = "color: #002474; font-weight:bold;"><?php echo "$cost"?></h2></div>
                    <div style="font-weight: 400; padding-left: 1vw;"><ul>
                        <div class = "row"> <div class = "col-6">ACCOUNT HOLDER NAME </div><div class = "col-6"> IIT KGP AAIR EVENTS FUND</div></div>
                        <div class = "row"> <div class = "col-6">BANK               </div><div class = "col-6"> HDFC BANK               </div></div>
                        <div class = "row"> <div class = "col-6">ACCOUNT NO         </div><div class = "col-6"> 50100217409918          </div></div>
                        <div class = "row"> <div class = "col-6">IFSC                </div><div class = "col-6"> HDFC0001065             </div></div>
                        <div class = "row"> <div class = "col-6">MICR              </div><div class = "col-6"> 721240102               </div></div>
                        <div class = "row"> <div class = "col-6">SWIFT CODE          </div><div class = "col-6"> HDFCINBBCAL             </div></div>
                    </ul></div>    
    </div>  
    <form action="backend\reciept.php" method = "post" >
    <div class="col-sm-12 col-md-12">
                        <label for="reciept">Drive Link for Fee Reciept <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" id="reciept" name="reciept" required>
                    </div>
                    <div class="m-t-lg col-sm-12 col-md-12">
                    <button class="btn btn--form"> <a href="Utility/get_update.php" style="color:inherit;text-decoration:none" > Skip for now</a></button> 
                   <button type="submit" id="submit" value = "submit" class="btn btn--form">Submit</button>
                </div>
<!-- </div>    <button class="btn btn--form" type = "button" id = "next" onclick="next4()">Next</button> -->
                    
                

    </form>  
  
</div>
</div>

</body>
</head>
</html>