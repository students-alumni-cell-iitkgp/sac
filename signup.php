<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Students' Alumni Cell | Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/signup.css">
<link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon">
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
  #alert-msg {
      text-align: center;
      margin-top: 10px;
      margin-bottom: 15px;
      padding: 10px;
      font-size: 16px;
      font-weight: bold;
      color: #8a0000;
      border: 1px solid #8a0000;
      background-color: #e58f8f;
    }
</style>
</head>
<body>
<div class = "section1">
<form action="./backend/signup.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()">

<div class="accordion" id="accordionExample">

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Personal Details
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "name" id="name" placeholder="Name" maxlength="150" required>
            <label for="username">Name<span style="color:red;">*</span></label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="email" class="form-control" name= "email" id="email" placeholder="name@example.com" onBlur="checkemailAvailability()" maxlength="100" required>
             <label for="email">Email address<span style="color:red;">*</span></label>
             <span id="user-email-availability-status" style="font-size:15px;"></span>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "mobile" id="mobile" placeholder="99XX......" maxlength="50" required>
            <label for="username">Mobile<span style="color:red;">*</span></label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="date" class="form-control" name= "dob" id="dob" placeholder="dd-mm-yyyy" required>
             <label for="dob">Date of Birth<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class = "row" style="justify-content:center">
           <div class="mb-3 col-sm-6">
           <input type="file" id="pro_pic" name="pro_pic" accept=".jpg, .jpeg, .png" required>
            <label for="pro_pic">Choose a Photo<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-12">
            <input type="text" class="form-control" name= "address" id="floatingInput" placeholder="XYZ....." maxlength="200">
            <label for="address">Address</label>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "city" id="floatingInput" placeholder="Kharagpur" maxlength="50">
            <label for="city">City</label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "state" id="floatingInput" placeholder="West Bengal" maxlength="50">
             <label for="state">State</label>
           </div>
        </div>
        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "country" id="floatingInput" placeholder="India" maxlength="50">
            <label for="country">Country</label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "zipcode" id="floatingInput" placeholder="38....." maxlength="20">
             <label for="zipcode">Zip Code</label>
           </div>
        </div>
      </div>
    </div>
  </div>

  <!--<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Covid Precaution
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class = "row">
          <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" id="covi_status" name= "covi_status" aria-label="Floating label select example" required>
            <option selected></option>
            <option value="Fully">Fully Vaccinated</option>
            <option value="Partially">Partially Vaccinated</option>
            <option value="Not Vaccinated Yet" >Not Vaccinated Yet</option>
            </select>
             <label for="covi_status">Vaccination Status<span style="color:red;">*</span></label>
          </div>

             <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" name= "covi_certi" id="floatingInput" placeholder= "http://...." maxlength="400">
                <label for="covi_certi">Drive link for Vaccination Certificate</label>
                <small class = "text-muted">If you have accompanying person(s), upload a drive folder containing certificates of all</small>
             </div>
        </div>
      </div>
    </div>
  </div>-->

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accomodation
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">

            <table class="table table-striped" style = "margin-bottom: 0 !important">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Registration Fee<span style="color:red">*</span></th>
                <th scope="col">Amount(INR)</th>
              </tr>
            </thead>
             <tbody>
               <tr>
                 <th scope="row">1</th>
                 <td>Per Alumnus/Alumna</td>
                 <td>8000</td>
               </tr>
               <tr>
                 <th scope="row">2</th>
                 <td>Per Accompanying Person(s)</td>
                 <td>5000</td>
               </tr>
             </tbody>
           </table>
           <small class = "text-muted">Registration Fee includes Food, Transportation and Registration Kit</small>

           <div class="row" style = "margin-top: 15px !important">
          <div class="form-floating mb-3 col-sm-6">
                <input type="number" class="form-control" id="accompaniment" name= "accompaniment" value="0" placeholder= "0" min = "0" onchange="calc_cost()" max= "20" maxlength="10">
                <label for="accompaniment">Accompanying Person(s)</label>
             </div>

             <div class="form-floating mb-3 col-sm-6">
                <input type="number" class="form-control" id="acc_kid" name= "acc_kid" value="0" placeholder= "0" min = "0" max= "20" maxlength="10">
                <label for="acc_kid">Accompanying Kid(s)</label>
                <small class = "text-muted">Kids below 13 years of age won't be charged</small>
             </div>
           </div>

           <div class = "row" style="justify-content:center">
           <div class="mb-3 col-sm-4">
           <input class="form-control" id="acp" name = "acp" type="text" value = "Reg Fee = &#8377;0" readonly>
           </div>
           </div>

           <table class="table table-striped" style = "margin-bottom: 0 !important">
            <thead>
              <tr>
                <th scope="col">Guest House</th>
                <!--<th scope="col">Cost per person(INR)</th>-->
              </tr>
            </thead>
             <!--<tbody>
              <tr>
                 <th scope="row">1</th>
                 <td>Technology Guest House</td>
                 <td>2550</td>
               </tr>
               <tr>
                 <th scope="row">2</th>
                 <td>Sir Ashutosh Mukherjee Hall</td>
                 <td>900</td>
               </tr>
             </tbody>-->
           </table>
           <!--<small class = "text-muted">Rooms are on Shared Bases</small>-->
           <p id="alert-msg">All the rooms in the Institute Guest Houses have been filled.
            <br>
            Please contact with us to get help in booking rooms outside the campus.
            <br>
            <span style="color:darkgreen">
            Syed Ahmad Hasan +91 9423673760
            <br>
            Muskan Turaha +91 9368271624 
            </span>
           </p>


           <div class="row" style = "justify-content:center">
             <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" id = "employee" name= "employee" aria-label="Floating label select example" onchange="emp()" required>
            <option selected value="select">---Select---</option>
            <option value="0">No</option>
            <option value="1">Yes</option>
            </select>
             <label for="employee">Are you a resident of IIT Kharagpur?<span style="color:red;">*</span></label>
          </div>
           </div>

          <div class = "row" id = "gh" style = "justify-content:center">
          <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" id = "g" name= "gh" aria-label="Floating label select example" onchange="emp()" required>
            <!-- <option selected value="NA">Available</option> -->
            <option selected value="select">---Select---</option>
            <option value="TGH">Technology Guest House</option>
            <option value="SAM">Sir Ashutosh Mukherjee Hall</option>
            </select>
             <label for="gh">Guest House<span style="color:red;">*</span></label>
          </div>
        </div>

        <div class="row" id="serial" style = "justify-content:center">
             <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" name= "serial" placeholder= "20.."  maxlength="50">
                <label for="serial">Employee ID</label>
             </div>
        </div>

        <div class = "row" style="justify-content:center">
        <div class="mb-3 col-sm-4">
        <input class="form-control" id="cost" name = "cost" type="text" value = "Total cost = &#8377;0" readonly>
        </div>
        </div>

    </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Work Details
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "industry" id="industry" placeholder="Google" maxlength="100" required>
            <label for="rollno">Industry<span style="color:red;">*</span></label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "profession" id="profession" placeholder="Manger" maxlength="100" required>
             <label for="profession">Profession<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "organisation" id="organisation" placeholder="Google" maxlength="100" required>
            <label for="organisation">Organisation Name<span style="color:red;">*</span></label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "designation" id="floatingInput" placeholder="USA" maxlength="100">
             <label for="designation">Designation</label>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-12">
            <input type="text" class="form-control" name= "waddress" id="floatingInput" placeholder="1035,HN ..." maxlength="200">
            <label for="waddress">Address</label>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "wcity" id="floatingInput" placeholder="Kolkata" maxlength="50">
            <label for="wcity">City</label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "wstate" id="floatingInput" placeholder="West..." maxlength="50">
             <label for="wstate">State</label>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "wcountry" id="floatingInput" placeholder="India" maxlength="50">
            <label for="wcountry">Country</label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "wzipcode" id="floatingInput" placeholder="$7...." maxlength="20">
             <label for="wzipcode">Zip Code</label>
           </div>
        </div>
    </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        Nostalgic Section
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="text" class="form-control" name= "rollno" id="floatingInput" placeholder="17XY...." maxlength="20">
            <label for="rollno">Roll Number</label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "degree" id="floatingInput" placeholder="B. Tech" maxlength="30">
             <label for="degree">Degree</label>
           </div>
        </div>

        <div class = "row">

        <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" id = "dept" name= "dept" aria-label="Floating label select example">
            <option selected value="select">---Select---</option>
								<option value="AE">Aerospace Engineering</option>
								<option value="AG">Agricultural & Food Engineering</option>
								<option value="AR">Architecture & Regional Planning</option>
								<option value="BT">Biotechnology</option>
								<option value="CE">Civil Engineering</option>
								<option value="CH">Chemical Engineering</option>
								<option value="CS">Computer Science & Engineering</option>
								<option value="CY">Chemistry</option>
								<option value="EE">Electrical Engineering</option>
								<option value="EC">Electronics & Electrical Communication Engineering</option>
								<option value="GG">Geology & Geophysics</option>
								<option value="HS">Humanities & Social Sciences</option>
								<option value="IM">Industrial & Systems Engineering</option>
								<option value="MA">Mathematics</option>
								<option value="ME">Mechanical Engineering</option>
								<option value="MT">Metallurgical & Materials Engineering</option>
								<option value="MI">Mining Engineering</option>
								<option value="NA">Ocean Engineering & Naval Architecture</option>
								<option value="PH">Physics</option>
								<option value="ATDC">Advanced Techology Development Center</option>
								<option value="CET">Center for Educational Technology</option>
								<option value="CYE">Cryogenic Engineering</option>
								<option value="MS">Materials Science</option>
								<option value="ORALS">Oceans, Rivers, Atmosphere and Land Sciences</option>
								<option value="CBE">P K Sinha Centre for Bio Energy</option>
								<option value="REC">Reliability Engineering Centre</option>
								<option value="RTC">Rubber Technology Centre</option>
								<option value="RDC">Rural Development Centre</option>
								<option value="GSSST">G S Sanyal School of Telecommunications</option>
								<option value="IT">Information Technology</option>
								<option value="RCIM">Ranbir and Chitra Gupta School of Infrastructure Design and Management</option>
								<option value="RMSEE">Rajendra Mishra School of Engineering Entrepreneurship</option>
								<option value="RGSIPL">Rajiv Gandhi School of Intellectual Property Law</option>
								<option value="MST">Medical Science & Technology</option>
								<option value="SB">School of Bioscience</option>
								<option value="SEST">School of Environment Science and Technology</option>
								<option value="SES">School of Energy Science</option>
								<option value="SNST">School of Nano-Science and Technology</option>
								<option value="SWS">School of Water Resources</option>
								<option value="VGSOM">Vinod Gupta School of Management</option>

            </select>
             <label for="dept">Department</label>
          </div>

           <div class="form-floating mb-3 col-sm-6">
            <select class="form-select" id = "hall" name= "hall" aria-label="Floating label select example">
            <option selected value="select">---Select---</option>
            <option value="SAM">Sir Ashutosh Mukherjee Hall</option>
								<option value="AZ">Azad  Hall</option>
								<option value="BCR">B C Roy  Hall</option>
								<option value="BRAH">B R Ambedkar  Hall</option>
								<option value="GH">Gokhale  Hall</option>
								<option value="HJB">Homi J Bhabha  Hall</option>
								<option value="JCB">J C Bose  Hall</option>
								<option value="LLR">Lala Lajpat Rai  Hall</option>
								<option value="LBS">Lal Bahadur Shastri Hall</option>
								<option value="MMM">Madan Mohan Malviya  Hall</option>
								<option value="MS">Megnad Saha  Hall</option>
								<option value="MT">Mother Teresa  Hall</option>
								<option value="NH">Nehru  Hall</option>
								<option value="PT">Patel  Hall</option>
								<option value="RK">Radha Krishnan  Hall</option>
								<option value="RP">Rajendra Prasad  Hall</option>
								<option value="RLB">Rani Laxmibai  Hall</option>
								<option value="SN">Sarojini Naidu / Indira Gandhi  Hall</option>
								<option value="SNVH"> Sister Nivedita Hall </option>
								<option value="VS">Vidyasagar  Hall</option>
								<option value="VSRC">Vikram Sarabhai Residential Complex</option>
								<option value="ZH">Zakir Hussain  Hall</option>

            </select>
             <label for="hall">Hall</label>
          </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="number" min="1951" max="2020" class="form-control" name= "yoj" id="yoj" placeholder="2010" maxlength="10" required>
            <label for="yoj">Join Year<span style="color:red;">*</span></label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="number" min="1951" max="2020" class="form-control" name= "yog" id="yog" placeholder="2010" maxlength="10" required>
             <label for="yog">Year of Graduating<span style="color:red;">*</span></label>
           </div>
        </div>

      </div>
    </div>
  </div>

  <div class = "row" style="justify-content:center; color:white; margin: 11px">
        <div class="col-1"><button id="submit" class="btn btn-light" onclick = "next()" type = "submit">Submit</button></div>
  </div>
  
  <!--<div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        Payment
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
      <div class="accordion-body">
     /*******************TO BE Added */

    </div>
    </div>
  </div>-->
</div>
</form>
</div>


<script>
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

function checkemailAvailability() {
    jQuery.ajax({
    url: "Utility/check_username_availablity.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
    $("#user-email-availability-status").html(data);
    },
    error:function (){}
    });
}

function calc_cost(){
           let nguest = document.getElementById("accompaniment").value;
           let choice = document.getElementById("g").value;

           let e = document.getElementById("employee").value;
           var cost = 0;
           var c = 0;
           c = 8000 + 5000*nguest;

           if(e == 0)
           { 
               if(choice === "TGH"){
                   cost = 2550 + 8000 + 5000*nguest + 2550*nguest;
               }
               else if(choice === "SAM"){
                   cost = 900 + 8000 + 5000*nguest + 900*nguest;
               }
               else{
                cost =8000 + 5000*nguest;
               }
           }
           else if(e==1){
               cost =8000 + 5000*nguest;
          }
           //console.log(nguest,choice,e);
           document.getElementById("acp").value ="Total Reg Fee = "+c;
           document.getElementById("cost").value ="Total Cost = "+cost;
           //console.log(cost);
       }

function emp()
{

  document.getElementById("serial").style.display = "none";
  document.getElementById("gh").style.display = "none";

  let e = document.getElementById("employee").value;
  if(e == 0)
  {
    document.getElementById("gh").style.display = "block";
    document.getElementById("serial").style.display = "none";
  }
  else if(e==1){
    document.getElementById("serial").style.display = "block";
    document.getElementById("gh").style.display = "none";
  }
  else{
    document.getElementById("serial").style.display = "none";
    document.getElementById("gh").style.display = "none";
  }
 calc_cost();
}
emp();

function next(){
           let name = document.getElementById("name").value;
           let email = document.getElementById("email").value;
           let mobile = document.getElementById("mobile").value;
           let dob = document.getElementById("dob").value;
           let employee = document.getElementById("employee").value;
           let industry = document.getElementById("industry").value;
           let profession = document.getElementById("profession").value;
           let organisation = document.getElementById("organisation").value;
           let yoj = document.getElementById("yoj").value;
           let yog = document.getElementById("yog").value;
           let pic = document.getElementById("pro_pic").value;

           let str = "";
           if(!(email.length>0))
               str = str + "Email, ";
           if(!(name.length>0))
           str = str + "Name, ";
           if(!(mobile.length>0))
           str = str + "Phone Number, ";
           if(!(dob.length>0))
           str = str + "Date of Birth, ";
           if(!(pic.length>0))
           str = str + "Photo, ";
           if(!(employee.length>0))
           str = str + "Is Residence of KGP,";
           if(!(industry.length>0))
           str = str + "Industry, ";
           if(!(profession.length>0))
           str = str + "Profession, ";
           if(!(organisation.length>0))
           str = str + "Organisation, ";
           if(!(yoj.length>0))
           str = str + "Joining Year, ";
           if(!(yog.length>0))
           str = str + "Graduting Year";

          if(!(email.length>0 && name.length>0 && 
          mobile.length>0 && dob.length>0 && employee.length>0 && industry.length>0 && profession.length>0
          && organisation.length>0 && yoj.length>0 && yog.length>0 && pic.length>0)){
            alert('Please fill '+str+"!");
           }
       } 
</script>

  
</body>
</html>
