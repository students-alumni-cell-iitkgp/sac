<div class="section4">
    <div class="form-group">
        <label for="ind">Industry </label>
        <input class="form-control" type="text" id="ind" name="industry" maxlength="100" value = "<?php echo "$industry"?>">
    </div>
    <div class="form-group">
        <label for="prof">Profession </label>
        <input class="form-control" type="text" id="prof" name="profession" maxlength="100" value = "<?php echo "$profession"?>">
    </div>
    <div class="form-group">
        <label for="org">Organisation Name <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="org" name="orgName" maxlength="100" value = "<?php echo "$organisation "?>" required>
    </div>
    <div class="form-group">
        <label for="desig">Designation <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="desig" name="designation" maxlength="100" value = "<?php echo "$designation"?>" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input class="form-control" type="text" id="address" name="work_address" maxlength="400" value = "<?php echo "$waddress"?>">        
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input class="form-control" type="text" id="city" name="work_city" maxlength="100" value = "<?php echo "$wcity"?>">
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <input class="form-control" type="text" id="state" name="work_state" maxlength="50" value = "<?php echo "$wstate"?>">
    </div>
    <div class="form-group">
        <label for="Country">Country</label>
        <input class="form-control" type="text" id="Country" name="work_country" maxlength="50" value = "<?php echo "$wcountry"?>">
    </div>
    <div class="form-group">
        <label for="zip">Zip Code</label>
        <input class="form-control" type="text" id="zip" name="work_zipcode" maxlength="10" value = "<?php echo "$wzipcode"?>">
    </div>
    <div class="m-t-lg">
        <button class="btn btn--form" type = "button" id = "next" onclick="back2()">Back</button>
        <button class="btn btn--form" type = "button" id = "next" onclick="next3()">Next</button>
    </div>
</div>