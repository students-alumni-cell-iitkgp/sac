<div class="prof5" id = "prof5" style = "margin: 40px;margin-top:0px; padding:30px">
<form action="backend\work.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >

<div class = "row">
    <div class="form-group col-sm-6">
        <label for="ind">Industry<span style="color:red;">*</span> </label>
        <input class="form-control" type="text" id="ind" name="industry" maxlength="100" value = "<?php echo "$industry"?>" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="prof">Profession<span style="color:red;">*</span> </label>
        <input class="form-control" type="text" id="prof" name="profession" maxlength="100" value = "<?php echo "$profession"?>" required>
    </div>
    </div>

    <div class = "row">
    <div class="form-group col-sm-6">
        <label for="org">Organisation Name <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="org" name="organisation" maxlength="100" value = "<?php echo "$organisation "?>" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="desig">Designation</label>
        <input class="form-control" type="text" id="desig" name="designation" maxlength="100" value = "<?php echo "$designation"?>">
    </div>
    </div>

    <div class = "row">
    <div class="form-group col-12">
        <label for="address">Address</label>
        <input class="form-control" type="text" id="address" name="waddress" maxlength="200" value = "<?php echo "$waddress"?>">        
    </div>
    </div>

    <div class = "row">
    <div class="form-group col-sm-6">
        <label for="city">City</label>
        <input class="form-control" type="text" id="city" name="wcity" maxlength="50" value = "<?php echo "$wcity"?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="state">State</label>
        <input class="form-control" type="text" id="state" name="wstate" maxlength="50" value = "<?php echo "$wstate"?>">
    </div>
    </div>

    <div class = "row">
    <div class="form-group col-sm-6">
        <label for="Country">Country</label>
        <input class="form-control" type="text" id="Country" name="wcountry" maxlength="50" value = "<?php echo "$wcountry"?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="zip">Zip Code</label>
        <input class="form-control" type="text" id="zip" name="wzipcode" maxlength="20" value = "<?php echo "$wzipcode"?>">
    </div>
    </div>


    <div class = "row" style="justify-content:center">
        <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Save</button></div>
        </div>
</form>
</div>
