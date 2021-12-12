<?php
    session_start();   

    if(!isset($_SESSION['email']))
    {
      header("Location: logout.html");
    }
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
          $reciept = $_SESSION['reciept'];

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

        $kgpdoa        = $_SESSION['kgpdoa']       ;
        $kgptimetocome = $_SESSION['kgptimetocome']   ;
        $kgpmodeofT    = $_SESSION['kgpmodeofT']    ;
        $kgppickup     = $_SESSION['kgppickup']       ; 
        $kgppcount     = $_SESSION['kgppcount']    ;
        $kgpcarseater  = $_SESSION['kgpcarseater']       ; 

        $airdoa        = $_SESSION['airdoa']        ;
        $airtimetocome = $_SESSION['airtimetocome']  ;
        $airmodeofT    = $_SESSION['airmodeofT']     ;
        $airpickup     = $_SESSION['airpickup']     ; 
        $airpcount     = $_SESSION['airpcount']      ;
        $aircarseater  = $_SESSION['aircarseater']     ; 

        //echo "<script language='javascript'>";
        //echo "alert('WRONG INFORMATION'+'$email'+'$kgpdoa')";
        //echo "</script>";
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginpage.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>
<style>
    body{
    background-image: url("./img/form-bg.jpeg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }

  .dropdown-menu a:hover{
        color:#4169e1;
    }
  .section2{
    display:blockzz;
    width:100%;
    justify-content:center;
    /* margin-bottom:1rem; */

  }
  .navbar-brand img{
    height: 4.5rem;
    width: 6rem;
  }
  .mobilemode{
        display:none;
        width:100%;
  }
  .section2 .row{
   
    margin-top:25px;
    padding:0px;
    z-index: -2;
    display:flex;
    flex-flow:row nowrap;
    justify-content :center;
  }

  .section2 button:hover{
    color: #4169e1;
  }
  .bord .d{
    color: #4169e1 !important;
    margin-right:13px;
    
  }
  .textS h2 {
    color: #4169e1;
    font-size: 280%;
  }
   
  .table{
      --bs-table-accent-bg:white;
      --bs-table-striped-bg:white;
      margin-bottom:0;
     
    }
    th{
      color :  #4169e1 !important;
    }
    .wrappers{
      max-width: 75%;
      margin-bottom:4%;   
      background-color: rgba(255, 255, 255, 0.93);
      
      margin:0 auto;
    }
    .prof6 p{
      color: black;
      font-family: 'Raleway', sans-serif;
      font-weight:500;
    }
    .accordion{
      width:100%;
    }
    @media only screen and (max-width: 900px) {
      .section2{
        display:none;
      }
      .mobilemode{
        display:block;
      } 
      .wrappers{
        margin-top:0;
        max-width: 101%;
        width:80%;
        /* margin-bottom:2%;    */
        background-color: rgb(229,228,226);
        padding:0;
      }
    }
    @media only screen and (max-width: 450px) {
      .section2{
        display:none;
      }
      .mobilemode{
        display:block;
      }
      .wrappers{
        margin-top:0;
        max-width: 101%;
        width:98%;
        /* margin-bottom:2%;    */
        background-color: rgb(229,228,226);
        padding:0;
      }
    }
    
</style>
<body>
  
    <section>
  <div class="wrappers">
         
  <?php include('dashboard_navbar.php') ?>

        <div class="section2">
          <div class = "row">
            <div class="col-md-3">
              <div class="bord" style = "width:103%;padding-bottom:10px;margin-left:-10px;">
              <div class="bttons"> <button class=" my-1" id = "personal" onclick="personal()" ><i class="fas fa-user d"></i> PERSONAL INFO</button> </div>
              <div class="bttons"> <button class=" my-1" id = "work"     onclick="work()"><i class="fas fa-briefcase d"></i> WORK EXPERIENCE</button> </div>
              <div class="bttons"> <button class=" my-1" id = "nostalg"  onclick="nostalg()"><i class="fas fa-hand-peace d"></i> NOSTALGIC SECTION</button> </div>
              <div class="bttons"> <button class=" my-1" id = "covid"    onclick="covid()"><i class="fas fa-syringe d"></i> COVID INFO</button> </div>
              <div class="bttons"> <button class=" my-1" id = "accomod"  onclick="accomod()"><i class="fas fa-home d"></i> ACCOMMODATION</button> </div>
              <div class="bttons"> <button class=" my-1" id = "travel"   onclick="travel()"><i class="fas fa-plane d"></i>TRAVELLING DETAILS <?php $status = (empty($kgpdoa))? "<span style='color: red'>(Pending)</span>":NULL; echo $status; ?></button> </div>
            </div>
            </div>
            <div class = "col-8">
            <div class="prof1" id = "prof1">
                                
                                <table class="table table-striped">
                                
                                <tbody>
                                                            
                                    <tr>
                                      <th scope="row">NAME</th>
                                      <td><?php echo "$name"?></td>
                                      
                                    </tr>
                                    <tr>
                                      <th scope="row">EMAIL</th>
                                      <td><?php echo "$email"?></td>
                                
                                    </tr>
                                    <tr>
                                      <th scope="row">ADDRESS </th>
                                      <td><?php echo "$address"?></td>
                                
                                    </tr>
                                    <tr>
                                      <th scope="row">CITY </th>
                                      <td><?php echo "$city"?></td>
                                
                                    </tr>
                                    <tr>
                                      <th scope="row">STATE </th>
                                      <td><?php echo "$state"?></td>
                                
                                    </tr>
                                    <tr>
                                      <th scope="row">COUNTRY </th>
                                      <td><?php echo "$country"?></td>
                                
                                    </tr>
                                    <tr>
                                      <th scope="row">ZIPCODE</th>
                                      <td><?php echo "$zipcode"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">MOBILE</th>
                                      <td><?php echo "$mobile"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">DOB</th>
                                      <td><?php echo "$dob"?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                                                         
             </div>
                                                           
                                                            
                                                           <div class="prof2">
                                                           <table class="table table-striped">
                                
                                <tbody>
                                                           <tr>
                                      <th scope="row">INDUSTRY</th>
                                      <td><?php echo "$industry"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">PROFESSION</th>
                                      <td><?php echo "$profession"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">ORGANISATION</th>
                                      <td><?php echo "$organisation"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">DESIGNATION</th>
                                      <td><?php echo "$designation"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">WORK ADDRESS</th>
                                      <td><?php echo "$waddress"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">WORK CITY </th>
                                      <td><?php echo "$wcity"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">WORK STATE</th>
                                      <td><?php echo "$wstate"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">WORK COUNTRY </th>
                                      <td><?php echo "$wcountry"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">WORK ZIPCODE</th>
                                      <td><?php echo "$wzipcode"?></td>
                                    </tr>
                                </tbody>
                                </table>
                                
                                                           </div>
                                                           
                                                            
                                                           <div class="prof3 ">
                                                           <table class="table table-striped">
                                
                                <tbody>
                                                           <tr>
                                      <th scope="row">ROLL NO</th>
                                      <td><?php echo "$rollno"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">JOIN YEAR</th>
                                      <td><?php echo "$joinyear"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">DEGREE </th>
                                      <td><?php echo "$degree"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">DEPARTMENT</th>
                                      <td><?php echo "$dept"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">HALL</th>
                                      <td><?php echo "$hall"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">YEAR OF GRADUATION</th>
                                      <td><?php echo "$yog"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">INVOLVMENT</th>
                                      <td><?php echo "$involvement"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">HOBBIES</th>
                                      <td><?php echo "$hobbies"?></td>
                                    </tr>
                                </tbody>
                                </table>
                                   
                                                           </div>
                                                           <div class="prof4 col">
                                                           <table class="table table-striped">
                                
                                <tbody>
                                                           <tr>
                                      <th scope="row">VACCINATION STATUS </th>
                                      <td><?php echo "$status"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">ABLE TO GET VACCINATED BY 10 JAN </th>
                                      <td><?php echo "$dosedate"?></td>
                                    </tr>
                                    <tr>
                                </tbody>
                                </table>
                                                            </div>
                                                           
                                                           <div class="prof5 col">
                                                           <table class="table table-striped">
                                
                                <tbody>
                                                           <tr>
                                      <th scope="row">MARITAL STATUS  </th>
                                      <td><?php echo "$marital"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">ACCOMPANIMENTS</th>
                                      <td><?php echo "$accompaniments"?></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                      <th scope="row">GUEST HOUSE   </th>
                                      <td><?php echo "$gh"?></td>
                                    </tr>
                                    <tr>
                                      <th scope="row">TOTAL COST</th>
                                      <td><?php echo "$cost"?></td>
                                    </tr>
                                    <tr>
                                </tbody>
                                </table>
                                                </div>        
                                                    <div class="prof6 col">
                                                        <p align = "center">Kharagpur Station<p>
                                                        <hr />
                                                        <table class="table table-striped">
                                                             <tbody>
                                                                    <tr>
                                                                    <th scope="row">Date of Arrival (KGP)</th>
                                                                    <td><?php echo "$kgpdoa"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Time to reach Kharagpur Station</th>
                                                                    <td><?php echo "$kgptimetocome"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Mode of Transportation </th>
                                                                    <td><?php echo "$kgpmodeofT"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Do you want us to pick up you from station</th>
                                                                    <td><?php echo "$kgppickup"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">How many people are coming together</th>
                                                                    <td><?php echo "$kgppcount"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">*Cab info</th>
                                                                    <td><?php echo "$kgpcarseater"?></td>
                                                                  </tr>
                                                              </tbody>
                                                        </table>
                                
                                                        <br>
                                                        <p align = "center">Kolkata Airport<p>
                                                        <hr />
                                                        <table class="table table-striped">
                                                             <tbody>
                                                                  <tr>
                                                                    <th scope="row">Date of Arrival (KOLKATA)</th>
                                                                    <td><?php echo "$airdoa"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Time to reach Kolkata</th>
                                                                    <td><?php echo "$airtimetocome"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Mode of Transportation </th>
                                                                    <td><?php echo "$airmodeofT"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Do you want us to pick up you from station</th>
                                                                    <td><?php echo "$airpickup"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">How many people are coming together</th>
                                                                    <td><?php echo "$airpcount"?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">*Cab info</th>
                                                                    <td><?php echo "$aircarseater"?></td>
                                                                  </tr>
                                                              </tbody>
                                                        </table>
                                                    </div>       
            </div>
         </div>
        </div>
<div class="mobilemode">
    <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn  " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <i class="fas fa-user"></i> Personal Info
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            <div class="col-md-12">
                            
                            <div class="prof1">
                                
      <table class="table table-striped">

      <tbody>
                            
      <tr>
      <th scope="row" class="col-lg-6 col-sm-3">NAME</th>
      <td class="col-lg-6 col-sm-9"><?php echo "$name"?></td>
      
      </tr>
      <tr>
      <th scope="row">EMAIL</th>
      <td><?php echo "$email"?></td>

      </tr>
      <tr>
      <th scope="row">ADDRESS </th>
      <td><?php echo "$address"?></td>

      </tr>
      <tr>
      <th scope="row">CITY </th>
      <td><?php echo "$city"?></td>

      </tr>
      <tr>
      <th scope="row">STATE </th>
      <td><?php echo "$state"?></td>

      </tr>
      <tr>
      <th scope="row">COUNTRY </th>
      <td><?php echo "$country"?></td>

      </tr>
      <tr>
      <th scope="row">ZIPCODE</th>
      <td><?php echo "$zipcode"?></td>
      </tr>
      <tr>
      <th scope="row">MOBILE</th>
      <td><?php echo "$mobile"?></td>
      </tr>
      <tr>
      <th scope="row">DOB</th>
      <td><?php echo "$dob"?></td>
      </tr>
      </tbody>
      </table>

                          
                            </div>
                            
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <i class="fas fa-briefcase"></i> Work Experience
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
            <!-- <div class="prof2"> -->
                                <table class="table table-striped">

      <tbody>
                                <tr>
            <th scope="row">INDUSTRY</th>
            <td><?php echo "$industry"?></td>
          </tr>
          <tr>
            <th scope="row">PROFESSION</th>
            <td><?php echo "$profession"?></td>
          </tr>
          <tr>
            <th scope="row">ORGANISATION</th>
            <td><?php echo "$organisation"?></td>
          </tr>
          <tr>
            <th scope="row">DESIGNATION</th>
            <td><?php echo "$designation"?></td>
          </tr>
          <tr>
            <th scope="row">WORK ADDRESS</th>
            <td><?php echo "$waddress"?></td>
          </tr>
          <tr>
            <th scope="row">WORK CITY </th>
            <td><?php echo "$wcity"?></td>
          </tr>
          <tr>
            <th scope="row">WORK STATE</th>
            <td><?php echo "$wstate"?></td>
          </tr>
          <tr>
            <th scope="row">WORK COUNTRY </th>
            <td><?php echo "$wcountry"?></td>
          </tr>
          <tr>
            <th scope="row">WORK ZIPCODE</th>
            <td><?php echo "$wzipcode"?></td>
          </tr>
      </tbody>
      </table>

                                </div>
            <!-- </div> -->
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-floating  collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <i class="fas fa-hand-peace"></i> Nostalgic Section
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
            <table class="table table-striped ">

      <tbody>
                                <tr>
            <th scope="row">ROLL NO</th>
            <td><?php echo "$rollno"?></td>
          </tr>
          <tr>
            <th scope="row">JOIN YEAR</th>
            <td><?php echo "$joinyear"?></td>
          </tr>
          <tr>
            <th scope="row">DEGREE </th>
            <td><?php echo "$degree"?></td>
          </tr>
          <tr>
            <th scope="row">DEPARTMENT</th>
            <td><?php echo "$dept"?></td>
          </tr>
          <tr>
            <th scope="row">HALL</th>
            <td><?php echo "$hall"?></td>
          </tr>
          <tr>
            <th scope="row">YEAR OF GRADUATION</th>
            <td><?php echo "$yog"?></td>
          </tr>
          <tr>
            <th scope="row">INVOLVMENT</th>
            <td><?php echo "$involvement"?></td>
          </tr>
          <tr>
            <th scope="row">HOBBIES</th>
            <td><?php echo "$hobbies"?></td>
          </tr>
      </tbody>
      </table>
        
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              <i class="fas fa-syringe"></i> Covid Info
              </button>
            </h2>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
            <table class="table table-striped">

      <tbody>
                                <tr>
            <th scope="row">VACCINATION STATUS </th>
            <td><?php echo "$status"?></td>
          </tr>
          <tr>
            <th scope="row">ABLE TO GET VACCINATED BY 10 JAN </th>
            <td><?php echo "$dosedate"?></td>
          </tr>
          <tr>
      </tbody>
      </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              <i class="fas fa-home"></i> Accomodation
              </button>
            </h2>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
            <table class="table table-striped">

      <tbody>
                                <tr>
            <th scope="row">MARITAL STATUS  </th>
            <td><?php echo "$marital"?></td>
          </tr>
          <tr>
            <th scope="row">ACCOMPANIMENTS</th>
            <td><?php echo "$accompaniments"?></td>
          </tr>
          <tr>
          <tr>
            <th scope="row">GUEST HOUSE   </th>
            <td><?php echo "$gh"?></td>
          </tr>
          <tr>
            <th scope="row">TOTAL COST</th>
            <td><?php echo "$cost"?></td>
          </tr>
          <tr>
      </tbody>
      </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <i class="fas fa-plane"></i>Travelling Details<?php $status = (empty($kgpdoa))? "<span style='color: red'>(Pending)</span>":NULL; echo $status; ?>
              </button>
            </h2>
          </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <p align = "center">Kharagpur Station<p>
                                  <hr />
                                  <table class="table table-striped">
                                      <tbody>
                                              <tr>
                                              <th scope="row">Date of Arrival (KGP)</th>
                                              <td><?php echo "$kgpdoa"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Time to reach Kharagpur Station</th>
                                              <td><?php echo "$kgptimetocome"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Mode of Transportation </th>
                                              <td><?php echo "$kgpmodeofT"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Do you want us to pick up you from station</th>
                                              <td><?php echo "$kgppickup"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">How many people are coming together</th>
                                              <td><?php echo "$kgppcount"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">*Cab info</th>
                                              <td><?php echo "$kgpcarseater"?></td>
                                            </tr>
                                        </tbody>
                                  </table>

                                  <br>
                                  <p align = "center">Kolkata Airport<p>
                                  <hr />
                                  <table class="table table-striped">
                                      <tbody>
                                            <tr>
                                              <th scope="row">Date of Arrival (KOLKATA)</th>
                                              <td><?php echo "$airdoa"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Time to reach Kolkata</th>
                                              <td><?php echo "$airtimetocome"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Mode of Transportation </th>
                                              <td><?php echo "$airmodeofT"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Do you want us to pick up you from station</th>
                                              <td><?php echo "$airpickup"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">How many people are coming together</th>
                                              <td><?php echo "$airpcount"?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">*Cab info</th>
                                              <td><?php echo "$aircarseater"?></td>
                                            </tr>
                                        </tbody>
                                  </table>
                </div>
              </div>
              </div>
            </div>
      </div>
        </div>
    </section>
    <?php include 'footer.php' ?>
    
    <script>
 const prof1 = document.getElementsByClassName('prof1')[0];
        const prof2 = document.getElementsByClassName('prof2')[0];
        const prof3 = document.getElementsByClassName('prof3')[0];
        const prof4 = document.getElementsByClassName('prof4')[0];
        const prof5 = document.getElementsByClassName('prof5')[0];
        const prof6 = document.getElementsByClassName('prof6')[0];
        function personal(){
            document.getElementsByClassName('prof1')[0].style.display = "block";
            document.getElementsByClassName('prof2')[0].style.display = "none";
            document.getElementsByClassName('prof3')[0].style.display = "none";
            document.getElementsByClassName('prof4')[0].style.display = "none";
            document.getElementsByClassName('prof5')[0].style.display = "none";
            document.getElementsByClassName('prof6')[0].style.display = "none";

            document.getElementById("personal").style.color = "#4169e1";
            document.getElementById("work").style.color     = "black";
            document.getElementById("nostalg").style.color  = "black";
            document.getElementById("covid").style.color    = "black";
            document.getElementById("accomod").style.color  = "black";
            document.getElementById("travel").style.color   = "black";
        }
        function work(){
            document.getElementsByClassName('prof1')[0].style.display = "none";
            document.getElementsByClassName('prof2')[0].style.display = "block";
            document.getElementsByClassName('prof3')[0].style.display = "none";
            document.getElementsByClassName('prof4')[0].style.display = "none";
            document.getElementsByClassName('prof5')[0].style.display = "none";
            document.getElementsByClassName('prof6')[0].style.display = "none";

            document.getElementById("personal").style.color = "black";
            document.getElementById("work").style.color     = "#4169e1";
            document.getElementById("nostalg").style.color  = "black";
            document.getElementById("covid").style.color    = "black";
            document.getElementById("accomod").style.color  = "black";
            document.getElementById("travel").style.color   = "black";
        }
        function nostalg(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "block";
            prof4.style.display = "none";
            prof5.style.display = "none";
            prof6.style.display = "none";

            document.getElementById("personal").style.color = "black";
            document.getElementById("work").style.color     = "black";
            document.getElementById("nostalg").style.color  = "#4169e1";
            document.getElementById("covid").style.color    = "black";
            document.getElementById("accomod").style.color  = "black";
            document.getElementById("travel").style.color   = "black";
        }
        function covid(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "none";
            prof4.style.display = "block";
            prof5.style.display = "none";
            prof6.style.display = "none";

            document.getElementById("personal").style.color = "black";
            document.getElementById("work").style.color     = "black";
            document.getElementById("nostalg").style.color  = "black";
            document.getElementById("covid").style.color    = "#4169e1";
            document.getElementById("accomod").style.color  = "black";
            document.getElementById("travel").style.color   = "black";
        }
        function accomod(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "none";
            prof4.style.display = "none";
            prof5.style.display = "block";
            prof6.style.display = "none";

            document.getElementById("personal").style.color = "black";
            document.getElementById("work").style.color     = "black";
            document.getElementById("nostalg").style.color  = "black";
            document.getElementById("covid").style.color    = "black";
            document.getElementById("accomod").style.color  = "#4169e1";
            document.getElementById("travel").style.color   = "black";
        }
        function travel(){
            prof1.style.display = "none";
            prof2.style.display = "none";
            prof3.style.display = "none";
            prof4.style.display = "none";
            prof5.style.display = "none";
            prof6.style.display = "block";

            document.getElementById("personal").style.color = "black";
            document.getElementById("work").style.color     = "black";
            document.getElementById("nostalg").style.color  = "black";
            document.getElementById("covid").style.color    = "black";
            document.getElementById("accomod").style.color  = "black";
            document.getElementById("travel").style.color   = "#4169e1";
        }

        travel();

        <?php
          if(is_null($reciept)){
            echo "alert('Your Payment in pending'); window.location.href ='./adminpage.php';";
          }
         ?>

    </script>
</body>
