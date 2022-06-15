<div class="prof4" id = "prof4" style = "margin: 40px;margin-top:0px; padding:30px">
<form action="backend\covid.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >

<div class = "row">
    <div class="form-group col-sm-6">
        <div class="col-12"><label for="covi_status">Vaccination Status <span style="color:red;">*</span></label></div> 
        <div class="input-group mb-3">
            
            <select  class="form-control form-select" type="list" id="covi_status" onchange="vaccine()" name="covi_status" value = "<?php echo "$covi_status"?>" required>
                <option value=""> </option> 
                <option value="Fully Vaccinated">Fully Vaccinated</option>
                <option value="Partially Vaccinated">Partially Vaccinated</option>
                <option value="Not Vaccinated Yet" >Not Vaccinated Yet</option>
            </select>
            
        </div >
    </div>
    <div class="form-group col-sm-6 certification1">
        <label for="covi_certi">Drive link for Vaccination Certificate</label>
        <input class="form-control" type="text" id="covi_certi" name="covi_certi" maxlength="400" value = "<?php echo "$covi_certi"?>">
        <small  class= "text-muted">If you have accompanying person(s), upload a drive folder containing certificates of all</small>
    </div>
    </div>

    <!--<div class = "row" style="justify-content:center">
    <div class="form-group col-sm-6">
        <div class="valid1" id="valid" style="display:none;">
            <label  for="valid">Will you be able to get fully vaccinated by 10th january?<span style="color:red;">*</span></label>
            <br/>
            <input type="radio" id="yes" name="valid" value="yes"/>
            <label for="yes">Yes</label><br/>
            <input type="radio" id="no" name="valid" value="no"/>
            <label for="no">No</label><br/>
        </div >
    </div>
    </div>-->
    <div class = "row" style="justify-content:center">
        <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Save</button></div>
        </div>

</form>
</div>
