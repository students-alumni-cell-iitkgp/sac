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
    <link rel="stylesheet" href="css/form.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>

<body>
    <?php include 'navbar.php' ?>
    <section>
        <div class="wrapper">
            <center>
                <h2 style="font-size: 300%; color: black; font-family: 'Raleway', sans-serif;">
                    Register
                </h2>
            </center>

            <form id="register" action = "back_signup.php" method = "post" enctype="multipart/form-data">


            <div class="section1">
                <div class="heading">
                    <h2>Personal Details</h2>
                    <div class="progress" style="height:0.4rem;">
                        <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <label for="name" class="form-label">
                                Name
                                <span style="color:red;">*</span>
                            </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1">@</span>
                                <input class="form-control" type="text" name="name" id="name" class="validate" required>
                            </div>
                        </div>

                         <div class="col-sm-12 col-md-12 ">


                            <label>
                                Email ID
                                <span style="color:red;">*</span>
                            </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                <input class="form-control" type="email" name="email" id="email" onBlur="checkemailAvailability()" required>
                            </div>
                            <span id="user-email-availability-status" style="font-size:15px;"></span>
                            
                        </div>
                        <!-- <div class="col-sm-12 col-md-6">
                            <label for="password">Password (For future login) <span style="color:red;">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                <input class="form-control" type="password" id="password" name="password" required>
                            </div>
                            
                        </div> -->
                        <div class="col-sm-12 ">
                            <label for="address">Address </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                                <input class="form-control" type="text" name="address" id="personal_address">
                            </div>  
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="city">City <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" id="personal_city" name="city" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="state">State </label>
                            <input class="form-control" type="text" id="personal_state" name="state">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="country">Country <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="country" id="country" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="zipcode">Zip Code </label>
                            <input class="form-control" type="text" id="zipcode" name="zipcode">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="mobile">Mobile <span style="color:red;">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                <input class="form-control" type="text" name="mobile" id="mobile" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="dob">DOB <span style="color:red;">*</span></label>
                            <input class="form-control" type="date" name="dob" required id="dob">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-between justify-content-around guesth">
                    <div class=" col-md-1 col-3"></div>
                    <div class=" col-md-1 col-3"><button class="btn btn-dark" type = "button" onclick="next1()">Next</button></div>
                </div>
            </div>

            <div class="section3">
                <div class="heading">
                    <h2>Accomodation</h2>
                    <div class="progress" style="height:0.4rem;">
                        <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                    </div>
                </div>
                <!--jhjyh-->
                <!-- <h1 class="text-center" >Registration Fees</h1> -->
                <table class="mb-5 border-light" style="margin-bottom: 2vh !important;" >
                    <th colspan="4" class="text-center h3 text-decoration-underline font-weight-bold"> Fixed charges</th>
                    <tr>
                       <td data-th="">Alumnus/Alumna </td>
                       <td data-th="No.of Rooms"></td>
                       <td style="text-align: center;" data-th="Cost for Alumni">7500</td>
                       <td style="text-align: center;" data-th="Cost for Accompaniaments"></td>
                    </tr>
                    <tr>
                       <td data-th="">Accompaniments </td>
                       <td data-th="No.of Rooms"></td>
                       <td style="text-align: center;" data-th="Cost for Alumni">4500</td>
                       <td style="text-align: center;" data-th="Cost for Accompaniaments"></td>
                    </tr>
                </table>
                <table class="mb-3 border-light" >
                    <!-- <caption>Room Charges</caption> -->
                    <tr><th colspan="4" class="text-center h3 text-decoration-underline font-weight-bold"> Accomodation charges</th></tr>
                    <tr>
                       <th> Guest House</th>
                       <!-- <th>No.of Rooms</th> -->
                       <th style="text-align: center;">Cost per person(₹)</th>
                       <!-- <th style="text-align: center;">Cost for Accompaniaments(₹)</th> -->
                    </tr>
                    <!-- <tr>
                       <td data-th="">Technology Guest House - SO</td>
                       
                       <td style="text-align: center;" data-th="Cost for Alumni">3000</td>
                       </tr>
                    <tr>
                        <td data-th="">Technology Guest House - DO</td>
                        <td style="text-align: center;" data-th="Cost for Alumni">2250</td>
                       </tr> -->
                    <tr>
                        <td data-th="">Technology Guest House/ Alumni Guest House</td>
                        <td style="text-align: center;" data-th="Cost for Alumni">2250</td>
                       </tr>
                    <tr>
                        <td data-th="">VGH/ SAM</td>
                        <!-- <td data-th="No.of Rooms">7</td> -->
                        <td style="text-align: center;" data-th="Cost for Alumni">900</td>
                        <!-- <td style="text-align: center;" data-th="Cost for Accompaniaments"></td> -->
                    </tr>
                    <!-- <tr>
                        <td data-th="">VGH/CEC - AC - DO</td>
                        <td style="text-align: center;" data-th="Cost for Alumni">900</td>
                       </tr>
                    <tr>
                        <td data-th="">VGH/CEC - Non-AC - SO</td>
                        <td style="text-align: center;" data-th="Cost for Alumni">750</td>
                       </tr>
                    <tr>
                        <td data-th="">VGH 3/4  bedded- DO</td>
                        <td style="text-align: center;" data-th="Cost for Alumni">450</td>
                       </tr>
                    <tr>
                        <td data-th="">AGH - DO</td>
                        <td style="text-align: center;" data-th="Cost for Alumni">2250</td>
                       </tr>
                    <tr>
                        <td data-th="">SAM - DO</td>
                        <td style="text-align: center;" data-th="Cost for Alumni">900</td>
                       </tr> -->
                </table>

                <!-- <table class="mb-5 border-light" style="margin-bottom: 2vh !important;" >
                <th colspan="4" class="text-center h3 text-decoration-underline font-weight-bold"> Accompaniment's charge</th>
                    <tr>
                        <td data-th="">Accomodation per person </td>
        
                        <td style="text-align: center;" data-th="Cost for Alumni">2250</td>
                        <td style="text-align: center;" data-th="Cost for Accompaniaments"></td>
                    </tr> 
                </table> -->
                <!-- <p style="margin-left: 15px; margin-bottom:0 !important; text-align:center;"><i>*Current or past work experiences as per relevance</i></p> -->
                <div class="container">
                    <div class="row">
                       <div class="col-sm-12 col-md-6">
                           <label for="marital">Marital Status</label>
                           <input class="form-control" type="text" name="marital" id="marital">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="accompanyingNo" >Accompaniments (Number of guests)<span style="color:red;">*</span></label>
                            <input class="form-control" type="number" min="0" id="accompanyingNo" name="accompanyingNo" onchange="calc_cost()" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="room">Guest House <span style="color:red;">*</span></label>
                            <div class="input-group mb-3">
                              
                                <select  class="form-control form-select" type="list" onchange="calc_cost()"  list="room" id="room" name="room" required>
                                <!-- <datalist id="room"> -->
                                <option value=""></option> 
                                     <option value="Technology Guest House/ Alumni Guest House">Technology Guest House/ Alumni Guest House</option> 
                                    <!-- <option value="Technology Guest House - DO | Acc">Technology Guest House - DO | Acc(Double Occupancy | Accomodation)</option> -->
                                    <!-- <option value="Technology Guest House - DO | Acc(Double Occupancy | Accomodation)"> -->
                                    <!-- <option value="Technology Guest House - DO | Al(Double Occupancy | Shared)">Technology Guest House - DO | Al(Double Occupancy | Shared)</option> -->
                                     <option value="VGH/ SAM">VGH/ SAM</option>
                                    <!-- <option value="VGH/CEC - AC - DO | Al"> VGH/CEC - AC - DO | Al </option> 
                                    <option value="VGH/CEC - Non-AC - SO"> VGH/CEC - Non-AC - SO</option> 
                                    <option value="VGH 3/4  bedded- DO | Al"> VGH 3/4  bedded- DO | Al</option> 
                                    <option value="AGH - DO | Acc"> AGH - DO | Acc</option> 
                                    <option value="SAM - DO | Al "> SAM - DO | Al </option>  -->
                                </select>
                            </div >
    
                            <!-- </datalist> -->
                            <!--<h4 id="cost" name = "cost" type="text" style="text-align: center;">Total cost = &#8377;0</h4>-->
                            <input class="form-control" id="cost" name = "cost" type="text" value = "Total cost = &#8377; 0 " readonly>
                        </div>
                        <!-- <div class="col-sm-12 col-md-6">
                            <label for="desig">Designation <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" id="desig" name="designation" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="address">Address</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                                <input class="form-control" type="text" id="address" name="work_address">
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="city">City</label>
                            <input class="form-control" type="text" id="city" name="work_city">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="state">State</label>
                            <input class="form-control" type="text" id="state" name="work_state">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="Country">Country</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-globe"></i></i></span>
                                <input class="form-control" type="text" id="Country" name="work_country">
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="zip">Zip Code</label>
                            <input class="form-control" type="text" id="zip" name="work_zipCode">
                        </div> -->
                    </div>
                </div>
                <div class="row justify-content-md-between justify-content-around">
                    <div class=" col-md-2 col-3">  <button class="btn btn-dark"  type = "button" onclick="back1()">Back</button> </div>
                    <div class=" col-md-2 col-3">     <button class="btn btn-dark" type = "button" onclick="next2()">Next</button></div>
                </div>
                
                <!-- <button class="btn btn-dark" onclick="next2()">Next</button> -->
            </div>
            
            <div class="section4">
                <div class="heading">
                    <h2>Work Experience</h2>
                    <div class="progress" style="height:0.4rem;">
                        <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                    </div>
                </div>
                <p style="margin-left: 15px; margin-bottom:0 !important; text-align:center;"><i>*Current or past work experiences as per relevance</i></p>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="ind">Industry </label>
                            <input class="form-control" type="text" id="ind" name="industry">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="prof">Profession </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-briefcase"></i></span>
                                <input class="form-control" type="text" id="prof" name="profession">
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="org">Organisation Name <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" id="org" name="orgName" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="desig">Designation <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" id="desig" name="designation" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="address">Address</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                                <input class="form-control" type="text" id="address" name="work_address">
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="city">City</label>
                            <input class="form-control" type="text" id="city" name="work_city">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="state">State</label>
                            <input class="form-control" type="text" id="state" name="work_state">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="Country">Country</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-globe"></i></i></span>
                                <input class="form-control" type="text" id="Country" name="work_country">
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="zip">Zip Code</label>
                            <input class="form-control" type="text" id="zip" name="work_zipcode">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-between justify-content-around guesth">

                    <div class=" col-md-1 col-3">  <button class="btn btn-dark" type = "button" onclick="back2()">Back</button> </div>
                    <div class=" col-md-1 col-3">     <button class="btn btn-dark" type = "button" onclick="next3()">Next</button></div>

                </div>
                <!-- <button class="btn btn-dark" onclick="next2()">Next</button> -->
            </div>
        
            <div class="section5">
                <div class="heading">
                    <h2>Nostalgic Section</h2>
                    <div class="progress" style="height:0.4rem;">
                        <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="roll">Roll Number</label>
                            <input class="form-control" type="text" id="roll" name="rollNum">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="join">Join Year <span style="color:red;">*</span></label>
                            <input class="form-control" type="number" min="1951" max="2010" id="join" name="joinYear">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="degree">Degree <span style="color:red;">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class="fas fa-graduation-cap"></i></span>
                                <input class="form-control" type="text" id="degree" name="degree" required>
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="dept">Department <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" id="dept" name="department" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="hall">Hall <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" id="hall" name="hall" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="yog">Year of Graduating <span style="color:red;">*</span></label>
                            <input class="form-control" type="number" min="1955" max="2014" id="yog" name="graduatingYear">
                        </div>
                        <div class="col-sm-12">
                            <label for="yog">Involvements (Societies, Hall Events, etc) </label>
                            <input class="form-control" type="text" id="involvements" name="involvements">
                        </div>
                        <div class="col-sm-12">
                            <label for="yog">Hobbies</label>
                            <input class="form-control" type="text" id="hobbies" name="hobbies">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-between justify-content-around guesth">

                    <div class=" col-md-1 col-3">  <button class="btn btn-dark" type = "button" onclick="back3()">Back</button> </div>
                    <div class=" col-md-1 col-3">     <button id="submit" class="btn btn-dark" type = "submit">Submit</button></div>
                </div>
            </div>

            <div class="section2">
                <div class="heading">
                    <h2>Covid Information</h2>
                    <div class="progress" style="height:0.4rem;">
                        <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-2"><label for="note" style="color:red;">Only fully vaccinated Alumnus/Alumna will be allowed in the 18th Annual Alumni Meet</label></div>
                        <div class="col-12"><label for="status">Vaccination Status <span style="color:red;">*</span></label></div> 
                        <div class="input-group mb-3">
                           
                            <select  class="form-control form-select" type="list" id="status" name="status" required>
                                <option value=""> </option> 
                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                <option value="Not Vaccinated Yet" >Not Vaccinated Yet</option>
                            </select>
                            
                        </div >
                        <div class="col-sm-12 col-md-12 mb-3 certification1" style="display:none;">
                            <label for="certificate">Vaccination Certificate if vaccinated <span style="color:red;">  *</span></label>
                            <input class="form-control" type="file" id="certificate" name="certificate" >
                            <p id = "size_file">File size must be less than 5MB</p>

                        </div>
                        
                        <div class="valid1" id="valid" style="display:none;">
                        <label  for="valid">Will you be able to get fully vaccinated by 10th january?<span style="color:red;">*</span></label>
                        <br/>
                            <input type="radio" id="yes" name="valid" value="yes"/>
                            <label for="yes">Yes</label><br/>
                            <input type="radio" id="no" name="valid" value="no"/>
                            <label for="no">No</label><br/>
                        </div >
                    </div>
                </div>
                <div class="row justify-content-md-between justify-content-around guesth">
                    <div class=" col-md-1 col-3">  <button class="btn btn-dark" type = "button" onclick="back4()">Back</button> </div>
                    <div class=" col-md-1 col-3">     <button class="btn btn-dark" type = "button" onclick="next5()">Next</button></div>
                </div>
                <center>

                
              </center>

              </div>
            </form>

        </div>
    </section>
    <?php include 'footer.php' ?>
    <script>
       let next5Allow=0;
       
       function next1(){
           let name = document.getElementById("name").value;
           let city = document.getElementById("personal_city").value;
           let country = document.getElementById("country").value;
           let mobile = document.getElementById("mobile").value;
           let dob = document.getElementById("dob").value;
           console.log(dob.length);
           if(name.length>0&&city.length>0&&country.length>0&&mobile.length>0&&dob.length>0){
                document.getElementsByClassName("section1")[0].style.display = 'none';
                document.getElementsByClassName("section2")[0].style.display = 'block';
           }
       }
       function back1(){
        //    console.log("Im in");
           document.getElementsByClassName("section2")[0].style.display = 'block';
           document.getElementsByClassName("section3")[0].style.display = 'none';
       } 
       function next2(){
        //    console.log("Im in");
           let nguests = document.getElementById("accompanyingNo").value;
           let room = document.getElementById("room").value;

           if(nguests.length>0 && room.length>0){
                document.getElementsByClassName("section3")[0].style.display = 'none';
                document.getElementsByClassName("section4")[0].style.display = 'block';
           }
       } 
       function back2(){
        //    console.log("Im in");
           document.getElementsByClassName("section3")[0].style.display = 'block';
           document.getElementsByClassName("section4")[0].style.display = 'none';
       }
       function next3(){
        //    console.log("Im in");

           let org = document.getElementById("org").value;
           let designation = document.getElementById("desig").value;
           if(org.length>0 && designation.length > 0){
                document.getElementsByClassName("section4")[0].style.display = 'none';
                document.getElementsByClassName("section5")[0].style.display = 'block';
           }
           
       }
       function back3(){

           document.getElementsByClassName("section4")[0].style.display = 'block';
           document.getElementsByClassName("section5")[0].style.display = 'none';

       } 

       function next4(){

        let joinyear = document.getElementById("join").value;
        let degrees = document.getElementById("degree").value;
        let dep = document.getElementById("dept").value;
        let hall = document.getElementById("hall").value;
        let yog = document.getElementById("yog").value;

        if(joinyear.length > 0 && degrees.length>0 && dep.length>0 && hall.length > 0 && yog.length>0){
            document.getElementsByClassName("section5")[0].style.display = 'none';
            document.getElementsByClassName("section6")[0].style.display = 'block';
        }
       }

       function back4(){

           document.getElementsByClassName("section1")[0].style.display = 'block';
           document.getElementsByClassName("section2")[0].style.display = 'none';
         
       } 

       function next5(){
           console.log("next5");
            let status=document.getElementById("status").value;
            let certificate=document.getElementById("certificate").value;
            let yes=document.getElementById("yes").checked;
            let no=document.getElementById("no").checked;
            

            if(status == "Fully Vaccinated"){
                if(certificate !="") next5Allow=1;
            }
            else if(status == "Partially Vaccinated"){
                if((yes || no) && certificate !="") next5Allow=1;
            }
            else if(status == "Not Vaccinated Yet"){
                if(yes || no) next5Allow=1;
            }else{
                next5Allow=0;
            }
            const fi = document.getElementById('certificate');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (var i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                //console.log(file);
                if(fsize > 5242880){
                    console.log(fsize);
                    // document.getElementById('submit').disabled = true;
                    next5Allow = 0;
                    document.getElementById('size_file').style.visibility = "visible";
                    // visibility: visible;
                }
            }
        }
            if(next5Allow){

                document.getElementsByClassName("section2")[0].style.display = 'none';
                document.getElementsByClassName("section3")[0].style.display = 'block';

            }


           
       }

       function back5(){

            document.getElementsByClassName("section5")[0].style.display = 'block';
           document.getElementsByClassName("section6")[0].style.display = 'none';
       }



       function calc_cost(){
           let nguest = document.getElementById("accompanyingNo").value;
           let choice = document.getElementById("room").value;
           console.log(nguest,choice);

           var cost = 0;

           if(choice === "Technology Guest House/ Alumni Guest House"){
                cost = 2250 + 7500 + 4500*nguest + 2250*nguest;
           }
        //    else if(choice === "Technology Guest House - DO | Acc"){
        //        cost = 2250 + 2250*nguest + 7500 + 4500*nguest;
        //    }
        //    else if(choice === "Technology Guest House - DO | Al(Double Occupancy | Shared)"){
        //        cost = 2250 + 7500;
        //    }
        //    else if(choice === "VGH/CEC - AC - SO"){
        //        cost = 1200 + 7500;
        //    }
        //    else if(choice === "VGH/CEC - AC - DO | Al"){
        //        cost = 900 + 7500;
        //    }
        //    else if(choice === "VGH/CEC - Non-AC - SO"){
        //        cost = 750 + 7500;
        //    }
        //    else if(choice === "VGH 3/4  bedded- DO | Al"){
        //        cost = 450 + 7500;
        //    }
           else if(choice === "VGH/ SAM"){
               cost = 900 + 900*nguest + 7500 + 4500*nguest; 
           }
        //    else{
        //        cost = 900 + 7500;
        //    }

           document.getElementById("cost").value =  "Total Cost = Rs"+cost;

           console.log(cost);
       }

       $("#status").change(function(){
            if($(this).val() == "Partially Vaccinated"){
                console.log("pv");
                // document.getElementsByClassName("imp")[0].style.display = 'inline-block';
                document.getElementsByClassName("valid1")[0].style.display = 'block';
                document.getElementsByClassName("certification1")[0].style.display='block';
                
            }
        });
        $("#status").change(function(){
            if($(this).val() == "Not Vaccinated Yet"){
                console.log("nv");
                // document.getElementsByClassName("imp")[0].style.display = 'none';
                document.getElementsByClassName("valid1")[0].style.display = 'block';
                document.getElementsByClassName("certification1")[0].style.display='none';
                
               
            }
        });
        $("#status").change(function(){
            if($(this).val() == "Fully Vaccinated"){
                console.log("fv");
                // document.getElementsByClassName("imp")[0].style.display = 'inline-block';
                document.getElementsByClassName("valid1")[0].style.display = 'none';
                document.getElementsByClassName("certification1")[0].style.display='block';
           
               
            }
        });
       
       /* $.ajax({
                    type: 'post',
                    url: 'back_signup.php',
                    data: {'cost': cost},
                    success: function(response) {
                        console.log(""+cost);
                    }
        });*/
       
      /* $(function() {
            $('#register').on('submit', function(e) {
                e.preventDefault();
                console.log('a');
                $.ajax({
                    type: 'post',
                    url: 'register.php',
                    data: $('#register').serialize(),
                    success: function(response) {
                        if (response == 0) {
                            swal({
                                title: "WRONG CAPTCHA!",
                                text: "Please re-enter the captcha!",
                                icon: "error",
                                buttons: true,
                                dangerMode: true,
                            }).then((value) => {

                            });
                        } else if (response == 1) {
                            swal({
                                title: "REGISTERED!",
                                text: "You can login now!",
                                icon: "success",
                                buttons: true,
                                dangerMode: true,
                            }).then((value) => {
                                window.location = "home.php";

                            });
                            //alert('success');
                        } else {
                            alert(response);
                        }
                    }
                // });

            });

        });

        });*/

    //     Filevalidation = () => {
    //     const fi = document.getElementById('certificate');
    //     // Check if any file is selected.
    //     if (fi.files.length > 0) {
    //         for (var i = 0; i <= fi.files.length - 1; i++) {
  
    //             const fsize = fi.files.item(i).size;
    //             const file = Math.round((fsize / 1024));
    //             // The size of the file.
    //             //console.log(file);
    //             if(fsize > 5242880){
    //                 console.log(file);
    //                 document.getElementById('submit').disabled = true;
    //                 next5allow = 0;
    //             }
    //         }
    //     }
    // }

    </script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
//This function checks email-availability-status
function checkemailAvailability() {
jQuery.ajax({
url: "check_username_availablity.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-email-availability-status").html(data);
},
error:function (){}
});
}
</script>
<!-- JS -->
<!--This will facilitate process of background tasks-->

  
</body>