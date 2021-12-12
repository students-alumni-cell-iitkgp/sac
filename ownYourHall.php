<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <style>
    body{
    background-image: url("img/form-bg.jpeg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
    
  .progress-bar{
    background-color: #394149 !important;
}

.wrapper{
    margin-top: 4% !important;
    margin-bottom: 4% !important;
    background-color: white;
    margin: auto;
    width: 95%;
    max-width: 800px;
    box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    padding: 2%;
}

.container{
    margin-bottom: 15vh;
}

.heading{
    width: 50%;
    text-align: center;
    margin: auto;
    padding-left: 15px;
    margin-bottom: 10px;
}

.section{
    padding: 2%;
}

h4{
    font-family: 'Raleway', sans-serif !important ;
    font-weight:200 !important;
    font-size:1.2em !important;
}
.container{
    margin-bottom: 5vh;
}
    
</style>
</head>

<body>
    <?php include 'navbar.php' ?>
    <section>
        <div class="wrapper">
            <!--<center>
                <h2 style="font-size: 300%; color: black; font-family: 'Raleway', sans-serif;">
                    Kuch likhna hai
                </h2>
            </center>-->
            <div class="section6">
                <div class="heading">
                    <h2>Own Your Hall Room</h2>
                    <div class="progress" style="height:0.4rem;">
                        <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                    </div>
                </div>
                <div class="container">
                    <br> 
                    <h4>Over the years we have received unprecedented support from our esteemed alumni for various Developmental Projects of IITKGP.</h4>
                    <h4>Amongst all the initiatives run by the institute, the Hall Development Campaign is one of the well supported campaigns from the alumni... <a href="http://alumni.iitkgp.ac.in/AlumniIITKGP/GoThroughCampaign/?camp_id=46&purpose=readmore" target="_blank" rel="noopener noreferrer">[Read more...........]</a></h4>
                </div>
                <div class="row justify-content-md-between justify-content-around guesth">
                    <div class=" col-md-1 col-3" style="margin-left:2%">
                        <a class="btn btn-outline-primary"  href="Utility/get_update.php" role="button">Skip For Now</a>
                    </div>
                    <div class=" col-md-2 col-3">
                        <a class="btn btn-outline-success"  href="http://alumni.iitkgp.ac.in/AlumniIITKGP/GoThroughCampaign/?camp_id=46&purpose=readmore" target="_blank" rel="noopener noreferrer" role="button">GO</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php include 'footer.php' ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

    // reload the form when users click back button given on brower 
    if(performance.navigation.type == 2){
        location.reload(true);
    }
    if(performance.navigation.type == 2){
        swal({
             title: "Confirm Form Resubmission",
             text: "The page that you're looking for used information that you entered.\n Returning to yhat page might cause any action you took to be reapted.\n Do you want to continue? ",
             icon: "warning",
             buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
           if (willDelete) {
           swal("Poof! Your imaginary file has been deleted!", {
           icon: "success",
           });
         } else {
            swal("Your data file is safe!");
         }
      });
    }
    </script>

</body>