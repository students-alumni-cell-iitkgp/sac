<div class="section2">
    <div class="form-group">
        <div class="col-12 mb-2"><label for="note" style="color:red;">If you have accompaniments, upload a drive folder containing certificates of all</label></div>
        <div class="col-12"><label for="status">Vaccination Status <span style="color:red;">*</span></label></div> 
        <div class="input-group mb-3">
            
            <select  class="form-control form-select" type="list" id="status" onchange="vaccine()" name="status" required>
                <option value=""> </option> 
                <option value="Fully Vaccinated">Fully Vaccinated</option>
                <option value="Partially Vaccinated">Partially Vaccinated</option>
                <option value="Not Vaccinated Yet" >Not Vaccinated Yet</option>
            </select>
            
        </div >
    </div>
    <div class="form-group certification1" style="display:none;">
        <label for="certificate">Drive link for Vaccination Certificate<span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="certificate" name="certificate" maxlength="100">
    </div>
    <div class="form-group">
        <div class="valid1" id="valid" style="display:none;">
            <label  for="valid">Will you be able to get fully vaccinated by 10th january?<span style="color:red;">*</span></label>
            <br/>
            <input type="radio" id="yes" name="valid" value="yes"/>
            <label for="yes">Yes</label><br/>
            <input type="radio" id="no" name="valid" value="no"/>
            <label for="no">No</label><br/>
        </div >
    </div>
    <div class="m-t-lg">
        <button class="btn btn--form" type = "button" id = "next" onclick="back4()">Back</button>
        <button class="btn btn--form" type = "button" id = "next" onclick="next5()">Next</button>
    </div>
</div>