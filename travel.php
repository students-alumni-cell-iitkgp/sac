<?php
    session_start();   
        // CREATING SESSION  

        if(!isset($_SESSION['email']))
    {
      header("Location: ../logout.html");
    }
        $kgpdoa        = $_SESSION['kgpdoa']      ;
        $kgptimetocome = $_SESSION['kgptimetocome']   ;
        $kgpmodeofT    = $_SESSION['kgpmodeofT']   ;
        $kgppickup     = $_SESSION['kgppickup']      ; 
        $kgppcount     = $_SESSION['kgppcount']   ;
        $kgpcarseater  = $_SESSION['kgpcarseater']      ; 

        $airdoa        = $_SESSION['airdoa']      ;
        $airtimetocome = $_SESSION['airtimetocome']   ;
        $airmodeofT    = $_SESSION['airmodeofT']   ;
        $airpickup     = $_SESSION['airpickup']      ; 
        $airpcount     = $_SESSION['airpcount']   ;
        $aircarseater  = $_SESSION['aircarseater']      ; 
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Travelling Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="./css/travel.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<?php include('navbar.php') ?>
<div class="signup__container">
  <div class="container__child child1 signup__thumbnail">
    <div class="thumbnail__content text-center">
      <h1 class="heading--primary">Travelling Detail</h1>
      <h2 class="heading--secondary"></h2>
    </div>
    <div class="signup__overlay"></div>
  </div>
  <div class="container__child child2 signup__form">
    <form action="backend\travel.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()">
    <h1 class="heading--primary-inside">Kolkata </h1>  
    <?php include './sections/kolkata.php' ?>
      <?php include './sections/kharagpur.php' ?>
    </form>  
  </div>
</div>
<!-- partial -->

<script>

       function next4(){

        // let airdoa = document.getElementById("airdoa").value;
        // let airmodeofT = document.getElementById("airmodeofT").value;
        // let airpickup = document.getElementById("airpickup").value;
        // let airpcount = document.getElementById("airpcount").value;
        // let yog = document.getElementById("yog").value;

        // if(airdoa.length > 0 && airmodeofT.length>0 && airpickup.length>0 && airpcount.length > 0 ){
            document.getElementsByClassName("section1")[0].style.display = 'none';
            document.getElementsByClassName("section2")[0].style.display = 'block';
            document.getElementsByClassName("heading--primary-inside")[0].innerHTML = "Kharagpur";
        // }
        // else{
        //        alert("Filled the requried Fields!!");
        //    }
       } 

       function back4(){
           document.getElementsByClassName("section1")[0].style.display = 'block';
           document.getElementsByClassName("section2")[0].style.display = 'none';
           document.getElementsByClassName("heading--primary-inside")[0].innerHTML = "Kolkata";
         
       } 



       
    if(performance.navigation.type == 2){
        location.reload(true);
    }
    </script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
</script>
<!-- JS -->
<!--This will facilitate process of background tasks-->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.dirtyforms/2.0.0/jquery.dirtyforms.min.js"></script>
  
</body>
</html>
