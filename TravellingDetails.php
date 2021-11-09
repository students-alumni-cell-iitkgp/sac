<?php
    session_start();   
        // CREATING SESSION  
        $doa        = $_SESSION['doa']      ;
        $timetocome = $_SESSION['timetocome']   ;
        $modeofT    = $_SESSION['modeofT']   ;
        $pickup     = $_SESSION['pickup']      ; 
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginpage.css">

    <style>
        body{
                background-image: url("css/bkt.png");
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
    </style>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
        crossorigin="anonymous"></script>-->

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>

<body>
    <?php include 'navbar.php' ?>
    <section>
        <div class="wrappers">
            <center>
                <h2 style="font-size: 180%; color: black; font-family: 'Raleway', sans-serif;">
                    Travelling Details
                </h2>
            </center>
            <div class="progress" style="height:0.2rem;">
                <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <form id="login" action = "back_travel.php" method = "post">
                <div class="section1">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="doa">Date of Arrival<span style="color:red;"></span></label>
                                <input class="form-control" type="date" name="doa" id="doa" value = "<?php echo "$doa"?>">
                            </div>
                            <div class="col-sm-12 ">
                                <label for="timetocome" class="form-label">
                                    Time to reach KGP
                                    <span style="color:red;">**expected time</span>
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class='far fa-clock'></i></span>
                                    <input class="form-control" type="text" name="timetocome" id="timetocome" class="validate" value = "<?php echo "$timetocome"?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="modeofT">Mode of Transportation <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="modeofT" id="modeofT" name="modeofT" value = "<?php echo "$modeofT"?>">
                                     <option value=""></option>
                                     <option value="Train">Train</option> 
                                     <option value="Plane">Plane</option>
                                     <option value="Car">Car</option>
                                     <option value="Ship">Ship</option>
                                    </select>
                                </div >
                            </div >
                            <div class="col-sm-12">
                                <label for="pickup">Do you Want us to pick up you at station <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="pickup" id="pickup" name="pickup" value = "<?php echo "$pickup"?>">
                                        <option value=""></option> 
                                        <option value="Yes">Yes</option> 
                                        <option value="No">No</option>
                                    </select>
                                </div >
                            </div >


                        </div>
                       
                    </div>

                    <div class="row justify-content-between" style = " margin-right:3%;"> 
                        <div class="col-4 text-center">
                            <a class="btn btn-outline-danger " href="get_update.php" role="button">Skip for Now</a>
                        </div>
                        <div class="col-2 text-center">      
                           <button class="btn btn-success" type="submit" value = "submit">Submit</button>
                        </div>
                   </div>
                </div>
            </form>
            <hr />
            <center>
                        <h6>You Can also tell us your travelling details on </h6>
                        <h6><i class="contact-icon fas fa-envelope"></i> Mail: aao@hijli.iitkgp.ernet.in</h6>
                        <h6>informing your date and timing to reach KGP station.........</h6>
                        <!--<h6><i class="contact-icon fas fa-phone"></i> Tarun Majety: 7602443444</h6>             
                        <h6>  <i class="contact-icon fas fa-phone"></i> Vikas Ahlawat: 8397070108</h6>             
                        <h6>&nbsp;  <i class="contact-icon fas fa-phone"></i> Shikha Bagaria: 7479222951</h6> -->            
              </center>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>