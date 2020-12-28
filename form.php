<!DOCTYPE html>
	<html lang="en">

	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>SAC</title>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@200&display=swap" rel="stylesheet">
    <style>
        body{
        	background-image: url(.../img/Asset.png);
             background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        fieldset {
                border :1px solid black;
                padding:2rem;
                margin:2rem;
}
    </style>
	</head>
	<body>

    <div class="container" style="padding:0 15rem;">	
        <fieldset>	
        <form class="text-dark" style="opacity: 1;" id="form1" method="POST" action = "form.php">
            <div class="row" class="pl-3">
                <h3 class="pl-3">JOIN WITH US</h3>
                </div>
                <hr class="center">
		<div class="form-group">
			<label for="FirstName">Name</label>
			<input type="text" class="form-control" name="name" id="FirstName" aria-describedby="FirstName" required>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="email">Email ID <span style="color:red;">*</span></label>
				<input class="form-control"  type="email"  name="email" id="email" required>
			</div>
			<div class="form-group col-md-6">
			<label for="password">Password (For future login) <span style="color:red;">*</span></label>
				<input  type="password" id="password" name="password" class="form-control" required>  	
            </div>
        </div>
		<div class="form-group">
			<label for="inputAddress">Address</label>
			<input type="text" class="form-control" id="inputAddress" name="address" required>
		</div>
        <div class="form-group">
			<label for="country">Country</label>
			<input type="text" class="form-control" id="country" name="country" required>
        </div>
		<div class="form-row">
			<div class="form-group col-md-4">
			<label for="inputCity">City</label>
			<input type="text" class="form-control" id="inputCity" name="city" required>
			</div>
			<div class="form-group col-md-4">
			<label for="inputState">State</label>
			<input type="text" class="form-control" id="personal_state" name="state" >
			</div>
			<div class="form-group col-md-4">
			<label for="inputZip">Zip Code</label>
			<input type="text" class="form-control" id="inputZip" name="zipCode" required>
			</div>
        </div>
		<div class="form-group">
		<label for="mobile">Mobile <span style="color:red;">*</span></label>
		<input  type="text"  class="form-control"  name="mobile" id="mobile" required>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-6">
			<label for="dob">Date of Birth</label>
			<input type="date" class="form-control" id="dob" placeholder="dob" name="dob">
			</div>
			<div class="form-group col-md-6">
			<label for="marital">Marital Status</label>
			<input  class="form-control" type="text" id="marital" name="marital">
			</div>
		</div>
		<hr class="center">
		<div class="row" class="pl-3">
		<h3 class="pl-3">Work Experience</h3>
		</div>
		<hr class="center">
		<div class="form-row">
			<div class="form-group col-md-6">
			<label for="ind">Industry </label>
			<input  class="form-control" type="text" id="ind" name="industry">
			</div>
			<div class="form-group col-md-6">
			<label for="prof">Profession </label> 
			<input class="form-control" type="text" id="prof" name="profession">	
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			<label for="org">Organisation Name <span style="color:red;">*</span></label>
			<input  class="form-control" type="text" id="org" name="orgName" required>
			</div>
			<div class="form-group col-md-6">
			<label for="desig">Designation <span style="color:red;">*</span></label> 
			<input  class="form-control" type="text" id="desig" name="designation" required>	
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputAddress">Address</label>
			<input type="text" class="form-control"  name="work_address" required>
		</div>
        <div class="form-group">
			<label for="country">Country</label>
			<input type="text" class="form-control" id="work_country" name="work_country" required>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
			<label for="inputCity">City</label>
			<input type="text" class="form-control"  name="work_city" required>
			</div>
			<div class="form-group col-md-4">
			<label for="inputState">State</label>
			<input type="text" class="form-control" name="work_state" >
			</div>
			<div class="form-group col-md-4">
			<label for="inputZip">Zip Code</label>
			<input type="text" class="form-control" name="work_zipCode" required>
			</div>
		</div>
		<hr class="center">	
		<div class="row" class="pl-3">
		<h3 class="pl-3">Nostalgic Section</h3>
		</div>	
		<hr class="center">
		<div class="form-group">
				<label for="roll">Roll Number</label>
				<input  type="text" class="form-control" id="roll" name="rollNum">
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
			<label for="degree">Degree <span style="color:red;">*</span></label>
			<input  type="text" class="form-control" id="degree" name="degree" required>
			
			</div>
			<div class="form-group col-md-4">
			<label for="dept">Department <span style="color:red;">*</span></label>	
			<input  type="text" class="form-control" id="dept" name="department" required>
			</div>
			<div class="form-group col-md-4">
			<label for="hall">Hall <span style="color:red;">*</span></label>	
			<input  type="text" class="form-control"  id="hall" name="hall" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			<label for="join">Join Year <span style="color:red;">*</span></label>
			<input  type="number" min="1951" class="form-control" max="2007" id="join" name="joinYear" required>
			</div>
			<div class="form-group col-md-6">
			<label for="yog">Year of Graduating <span style="color:red;">*</span></label>
			<input  type="number" min="1955" class="form-control" max="2010" id="yog" name="graduatingYear"  required>               	
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="accompanyingNo">Accompaniments(Number of guests)<span style="color:red;">*</span></label>  
				<input  type="number" min="0" id="accompanyingNo" class="form-control" name="accompanyingNo" required> 
			</div>
			<div class="form-group col-md-6">
			<label for="yog">Hobbies</label>  
			<input  type="text" id="hobbies" class="form-control" name="hobbies">         	
			</div>
		</div>
		
        <div class="form-group">
            <label for="yog">Involvements</label>
            <input  type="text" class="form-control" id="involvements" name="involvements">
    </div>
		<div class="pl-3 pt-4">
	            <input class="btn btn-secondary" type="submit" name="submit">
		</div>
        </form>
    </fieldset>	
    </div>        

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
	<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js"></script>
    </body>
    </html>
