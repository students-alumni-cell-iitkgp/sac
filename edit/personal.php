<div class="card prof8">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Personal Information</h6>
  </div>
  <div class="card-body pt-4 p-3">
    
<form action="backend\personal.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >

<div class = "row">
    <div class="form-group col-sm-6">
        <label for="username">Name<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="name" id="name" value = "<?php echo "$name"?>" maxlength="150" required />
    </div>
    <div class="form-group col-sm-6">
        <label for="email">Email ID<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="email" id="email" onBlur="checkemailAvailability()" value = "<?php echo "$email"?>" readonly />
        <span id="user-email-availability-status" style="font-size:15px;"></span>
    </div>
</div>
<div class = "row">
    <div class="form-group col-12">
        <label for="password">Address</label>
        <input class="form-control" type="text" name="address" id="address" value = "<?php echo "$address"?>" maxlength="200"/>
    </div>
    </div>
    <div class = "row">
    <div class="form-group col-sm-6">
        <label for="passwordRepeat">City<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="city" id="personal_city" value = "<?php echo "$city"?>" maxlength="50" />
    </div>
    <div class="form-group col-sm-6">
        <label for="passwordRepeat">State</label>
        <input class="form-control" type="text" name="state" id="personal_state" value = "<?php echo "$state"?>" maxlength="50"/>
    </div>
    </div>
    <div class = "row">
    <div class="form-group col-sm-6">
        <label for="passwordRepeat">Country<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="country" id="country" value = "<?php echo "$country"?>" maxlength="50" required />
    </div>
    <div class="form-group col-sm-6">
        <label for="passwordRepeat">Zip Code</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode" value = "<?php echo "$zipcode"?>" maxlength="20"/>
    </div>
    </div>
    <div class = "row">
    <div class="form-group col-sm-6">
        <label for="passwordRepeat">Mobile<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="mobile" id="mobile" value = "<?php echo "$mobile"?>" maxlength="50" required />
    </div>
    <div class="form-group col-sm-6">
        <label for="passwordRepeat">DOB<span style="color:red;">*</span></label>
        <input class="form-control" type="date" name="dob" id="dob" value = "<?php echo "$dob"?>" required />
    </div>
    </div>
    <div class = "row" style="justify-content:center">
        <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Save</button></div>
        </div>
</form>
  </div>
</div>