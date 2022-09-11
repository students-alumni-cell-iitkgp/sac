<div class="card prof12">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Nostalgia</h6>
  </div>
  <div class="card-body pt-4 p-3">
  <form action="backend\nostalgia.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >
   
   <div class = "row">
	   <div class="form-group col-sm-6">
		   <label for="roll">Roll Number</label>
		   <input class="form-control" type="text" id="roll" name="rollno" maxlength="20" value = "<?php echo "$rollno"?>">
	   </div>
	   <div class="form-group col-sm-6">
		   <label for="degree">Degree <span style="color:red;">*</span></label>
		   <input class="form-control" type="text" id="degree" name="degree" maxlength="30" value = "<?php echo "$degree"?>" required>
	   </div>
	   </div>
   
	   <div class = "row ">
   
	   <div class="form-group mb-3 col-sm-6">
				<label for="employee">Department<span style="color:red;">*</span>: <span style="color:green;font-weight:bold"><?php echo "$dept"?></span></label>
			   <select class="form-control form-select" type = "list" id = "dept" name= "dept" value = "<?php echo "$dept"?>" required>
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
			 </div>
   
			 <div class="form-group mb-3 col-sm-6">
				<label for="employee">Hall<span style="color:red;">*</span>: <span style="color:green;font-weight:bold"><?php echo "$hall"?></span></label>
			   <select class="form-control form-select" type = "list" id = "hall" name= "hall" value = "<?php echo "$hall"?>" required>
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
			 </div>
	   
	   </div>
   
	   <div class = "row">
	   <div class="form-group col-sm-6">
		   <label for="join">Join Year <span style="color:red;">*</span></label>
		   <input class="form-control" type="number" min="1951" max="2020" id="join" name="yoj" maxlength="10" value = "<?php echo "$yoj"?>">
	   </div>
	   <div class="form-group col-sm-6">
		   <label for="yog">Year of Graduation <span style="color:red;">*</span></label>
		   <input class="form-control" type="number" min="1955" max="2020" id="yog" name="yog" maxlength="10" value = "<?php echo "$yog"?>">
	   </div>
	   </div>
   
	   <div class = "row">
	   <div class="form-group col-12">
		   <label for="yog">Involvements (Societies, Hall Events, etc) </label>
		   <input class="form-control" type="text" id="involvement" name="involvement" maxlength="300" value = "<?php echo "$involvement"?>">
	   </div>
	   </div>
   
	   <div class = "row">
	   <div class="form-group col-12">
		   <label for="yog">Hobbies</label>
		   <input class="form-control" type="text" id="hobbies" name="hobbies" maxlength="300" value = "<?php echo "$hobbies"?>">
	   </div>
	   </div>
   
   
	   <div class = "row" style="justify-content:center">
		   <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Save</button></div>
		   </div>
   </form>
  </div>
</div>