<?php
    session_start();   
        // CREATING SESSION  
        $name    = $_SESSION['name']      ;
        $email   = $_SESSION['email']     ;
        $address = $_SESSION['address']   ;
        $city    = $_SESSION['city']      ;
        $state   = $_SESSION['state']     ;
        $country = $_SESSION['country']   ;
        $zipcode = $_SESSION['zipcode']   ;
        $mobile  = $_SESSION['mobile']    ;
        $dob     = $_SESSION['dob']       ;

        $status      = $_SESSION['status']       ;
        //$certificate = $_SESSION['certificate']  ;
        $dosedate    = $_SESSION['valid']        ;

          $marital      = $_SESSION['marital']        ;
        $accompaniments = $_SESSION['accompanyingNo'] ;
          $gh           = $_SESSION['room']           ;
          $cost         = $_SESSION['cost']           ;

        $industry     = $_SESSION['industry']     ;
        $profession   = $_SESSION['profession']   ;
        $organisation = $_SESSION['orgName']      ;
        $designation  = $_SESSION['designation']  ;
        $waddress     = $_SESSION['work_address'] ;
        $wcity        = $_SESSION['work_city']    ;
        $wstate       = $_SESSION['work_state']   ;
        $wcountry     = $_SESSION['work_country'] ;
        $wzipcode     = $_SESSION['work_zipcode'] ;

        $rollno      = $_SESSION['rollNum']         ;
        $joinyear    = $_SESSION['joinYear']        ;
        $degree      = $_SESSION['degree']          ;
        $dept        = $_SESSION['department']      ;
        $hall        = $_SESSION['hall']            ;
        $yog         = $_SESSION['graduatingYear']  ;
        $involvement = $_SESSION['involvements']    ;
        $hobbies     = $_SESSION['hobbies']         ;

        //$reciept = $_SESSION['reciept'] ;  
?>

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
<style>
    li{
        list-style:none;
        display:flex;
    }
    span{
        padding-left:20%;
    }
    .header{
        display:flex;
        justify-content :space-between;
        margin-left:4vw;
        margin-right:2vw;
    }
    
</style>
<body>
    <?php include 'navbar.php' ?>
    <section>
        <div class="wrappers">
            <center>
                <h2 style="font-size: 300%; font-family: 'Raleway', sans-serif;">
                    INFO
                </h2>
            </center>
            <div class="section1">
                    <div class="container">
                        <ul>
                           <div class = "row"> <div class = "col-6">NAME </div><div class = "col-6"><?php echo "$name"?></div> </div>
                           <div class = "row"> <div class = "col-6">EMAIL    </div><div class = "col-6"><?php echo "$email"?>   </div> </div>
                           <div class = "row"> <div class = "col-6">ADDRESS  </div><div class = "col-6"><?php echo "$address"?> </div> </div>
                           <div class = "row"> <div class = "col-6">CITY     </div><div class = "col-6"><?php echo "$city"?>    </div> </div>
                           <div class = "row"> <div class = "col-6">STATE    </div><div class = "col-6"><?php echo "$state"?>   </div> </div>
                           <div class = "row"> <div class = "col-6">COUNTRY  </div><div class = "col-6"><?php echo "$country"?> </div> </div>
                           <div class = "row"> <div class = "col-6">ZIPCODE  </div><div class = "col-6"><?php echo "$zipcode"?> </div> </div>
                           <div class = "row"> <div class = "col-6">MOBILE   </div><div class = "col-6"><?php echo "$mobile"?>  </div> </div>
                           <div class = "row"> <div class = "col-6">DOB      </div><div class = "col-6"><?php echo "$dob"?>     </div> </div>

                           <div class = "row"> <div class = "col-6">INDUSTRY      </div><div class = "col-6"><?php echo "$industry"?>     </div> </div>
                           <div class = "row"> <div class = "col-6">PROFESSION    </div><div class = "col-6"><?php echo "$profession"?>   </div> </div>
                           <div class = "row"> <div class = "col-6">ORGANISATION  </div><div class = "col-6"><?php echo "$organisation"?> </div> </div>
                           <div class = "row"> <div class = "col-6">DESIGNATION   </div><div class = "col-6"><?php echo "$designation"?>  </div> </div>
                           <div class = "row"> <div class = "col-6">WORK ADDRESS  </div><div class = "col-6"><?php echo "$waddress"?>     </div> </div>
                           <div class = "row"> <div class = "col-6">WORK CITY     </div><div class = "col-6"><?php echo "$wcity"?>        </div> </div>
                           <div class = "row"> <div class = "col-6">WORK STATE    </div><div class = "col-6"><?php echo "$wstate"?>       </div> </div>
                           <div class = "row"> <div class = "col-6">WORK COUNTRY  </div><div class = "col-6"><?php echo "$wcountry"?>     </div> </div>
                           <div class = "row"> <div class = "col-6">WORK ZIPCODE  </div><div class = "col-6"><?php echo "$wzipcode"?>     </div> </div>

                           <div class = "row"> <div class = "col-6">ROLL NO    </div><div class = "col-6"><?php echo "$rollno"?>      </div> </div>  
                           <div class = "row"> <div class = "col-6">JOIN YEAR  </div><div class = "col-6"><?php echo "$joinyear"?>    </div> </div>  
                           <div class = "row"> <div class = "col-6">DEGREE     </div><div class = "col-6"><?php echo "$degree"?>      </div> </div>  
                           <div class = "row"> <div class = "col-6">DEPARTMENT </div><div class = "col-6"><?php echo "$dept"?>        </div> </div>  
                           <div class = "row"> <div class = "col-6">HALL       </div><div class = "col-6"><?php echo "$hall"?>                </div> </div>
                           <div class = "row"> <div class = "col-6">YEAR OF GRADUATION </div><div class = "col-6"><?php echo "$yog"?>         </div> </div>
                           <div class = "row"> <div class = "col-6">INVOLVEMENTS       </div><div class = "col-6"><?php echo "$involvement"?> </div> </div>
                           <div class = "row"> <div class = "col-6">HOBBIES            </div><div class = "col-6"><?php echo "$hobbies"?>     </div> </div>

                           <div class = "row"> <div class = "col-6">VACCINATION STATUS </div><div class = "col-6"><?php echo "$status"?>                 </div> </div>
                           <div class = "row"> <div class = "col-6">ABLE TO GET VACCINATED BY 10 JAN </div><div class = "col-6"><?php echo "$dosedate"?> </div> </div>

                           <div class = "row"> <div class = "col-6">MARITAL STATUS  </div><div class = "col-6"><?php echo "$marital"?>          </div> </div>
                           <div class = "row"> <div class = "col-6">ACCOMPANIMENTS  </div><div class = "col-6"><?php echo "$accompaniments"?>  </div> </div>
                           <div class = "row"> <div class = "col-6">GUEST HOUSE     </div><div class = "col-6"><?php echo "$gh"?>            </div> </div>
                           <div class = "row"> <div class = "col-6">TOTAL COST      </div><div class = "col-6"><?php echo "$cost"?>          </div> </div>
                           
                       </ul>         
                    </div>
                    <div class = "header">
                        <div class="text-center">
                            <a class="btn btn-dark" href="update_show.php" role="button">UPDATE</a>
                        </div>
                        <div class="text-center">      
                            <a class="btn btn-outline-dark " href="adminpage.php" role="button">PAYMENT</a>
                        </div>
                    </div>                
            </div>
            
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>
