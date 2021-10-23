<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                background-size: 1300px 750px;
            }
    </style>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
        crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>

<body>
    <?php include 'navbar.php' ?>
    <section>
        <div class="wrappers">
            <center>
                <h2 style="font-size: 300%; color: black; font-family: 'Raleway', sans-serif;">
                    Log In
                </h2>
            </center>
            <form id="login" action = "signup2.php" method = "post">
                <div class="section1">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 ">

                                <label for="name" class="form-label">
                                    Email
                                    <span style="color:red;">*</span>
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="font-weight: 600;" id="basic-addon1">@</span>
                                    <input class="form-control" type="text" name="name" id="name" class="validate"
                                        required>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <label for="dob">DOB <span style="color:red;">*</span></label>
                                <input class="form-control" type="date" name="dob" required id="dob">
                            </div>
                        </div>
                       
                    </div>
                    <!-- <div class="row justify-content-around  justify-content-md-between guesth"> -->
                
                        <div class="text-center">
                            <button class="btn btn-dark" type="submit" value = "submit">Log In</button>
                        </div>
                        
                </div>
            </form>
            <!-- <div class="container"> -->
            <div class="text-center">      
                <hr />
                <a class="btn btn-outline-dark " href="signup.php" role="button">Register</a>
            </div>
            <br>
            <center>
                        <h6>Need Help? Contact Us</h6>
                        <h6><i class="contact-icon fas fa-envelope"></i> &nbsp;Mail: aao@hijli.iitkgp.ernet.in</h6>
                        <h6><i class="contact-icon fas fa-phone"></i> &nbsp;Shikha Bagaria: 7479222951</h6>
                        <h6> &nbsp;&nbsp;&nbsp;<i class="contact-icon fas fa-phone"></i> &nbsp;Namya Swarnkar: 9307436229</h6>             
              </center>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>