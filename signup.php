<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/signup.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
           <input type="file" id="pro_pic" name="pro_pic" accept=".jpg, .jpeg, .png">
            <label for="username">Choose a Photo</label>
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

            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fee</th>
                <th scope="col">Amount</th>
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
                 <td>6000</td>
               </tr>
             </tbody>
           </table>

           <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Guest House</th>
                <th scope="col">Cost per person</th>
              </tr>
            </thead>
             <tbody>
               <tr>
                 <th scope="row">1</th>
                 <td>Technology Guest House</td>
                 <td>1700</td>
               </tr>
             </tbody>
           </table>

           <div class="row">
             <div class="form-floating mb-3 col-sm-6">
                <input type="number" class="form-control" id="accompaniment" name= "accompaniment" id="floatingInput" value="0" placeholder= "0" min = "0" maxlength="10">
                <label for="accompaniment">Accompanying Person(s)</label>
                <small class = "text-muted">Kids below 13 years of age won't be charged. It's free of cost for them. Don't add them in the accompanying person(s) list</small>
             </div>

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
            <select class="form-select" id = "g" name= "gh" aria-label="Floating label select example" onchange="calc_cost()">
            <option selected value="select">---Select---</option>
            <option value="TGH">Technology Guest House</option>
            </select>
             <label for="gh">Ghest House<span style="color:red;">*</span></label>
          </div>
        </div>

        <div class="row" id="serial" style = "justify-content:center">
             <div class="form-floating mb-3 col-sm-6">
                <input type="text" class="form-control" name= "serial" placeholder= "20.."  maxlength="50" onchange="calc_cost()">
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
            <input type="text" class="form-control" name= "dept" id="floatingInput" placeholder="Electrical....." maxlength="30">
            <label for="dept">Department</label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="text" class="form-control" name= "hall" id="floatingInput" placeholder="RK..." maxlength="50">
             <label for="hall">Hall</label>
           </div>
        </div>

        <div class = "row">
           <div class="form-floating mb-3 col-sm-6">
            <input type="number" min="1951" max="2020" class="form-control" name= "yoj" id="yoj" placeholder="2010" maxlength="10" required>
            <label for="yoj">Join Year<span style="color:red;">*</span></label>
           </div>
  
           <div class="form-floating mb-3 col-sm-6">
             <input type="number" min="1951" max="2020" class="form-control" name= "yog" id="yog" placeholder="2010" maxlength="10" onfocusout = "next()" required>
             <label for="yog">Year of Graduating<span style="color:red;">*</span></label>
           </div>
        </div>

        <div class = "row" style="justify-content:center">
        <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Submit</button></div>
        </div>

      </div>
    </div>
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
           if(e == 0)
           { 
               if(choice === "TGH"){
                   cost = 1700 + 8000 + 6000*nguest + 1700*nguest;
               }
           }
           else if(e==1){
               cost =7000 ;
          }
           console.log(nguest,choice,e);
          
           document.getElementById("cost").value ="Total Cost = (₹) "+cost;
           console.log(cost);
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

          if(!(email.length>0 && name.length>0 && 
          mobile.length>0 && dob.length>0 && employee.length>0 && industry.length>0 && profession.length>0
          && organisation.length>0 && yoj.length>0 && yog.length>0)){
            alert('Please fill all the required fields!');
           }
       } 
</script>

  
</body>
</html>
