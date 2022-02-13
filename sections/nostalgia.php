<div class="section5">
    <div class="form-group">
        <label for="roll">Roll Number</label>
        <input class="form-control" type="text" id="roll" name="rollNum" maxlength="10">
    </div>
    <div class="form-group">
        <label for="join">Join Year <span style="color:red;">*</span></label>
        <input class="form-control" type="number" min="1951" max="2010" id="join" name="joinYear" maxlength="10">
    </div>
    <div class="form-group">
        <label for="degree">Degree <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="degree" name="degree" maxlength="50" required>
    </div>
    <div class="form-group">
        <label for="dept">Department <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="dept" name="department" maxlength="50" required>
    </div>
    <div class="form-group">
        <label for="hall">Hall <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="hall" name="hall" maxlength="50" required>      
    </div>
    <div class="form-group">
        <label for="yog">Year of Graduating <span style="color:red;">*</span></label>
        <input class="form-control" type="number" min="1955" max="2014" id="yog" name="graduatingYear" maxlength="10">
    </div>
    <div class="form-group">
        <label for="yog">Involvements (Societies, Hall Events, etc) </label>
        <input class="form-control" type="text" id="involvements" name="involvements" maxlength="400">
    </div>
    <div class="form-group">
        <label for="yog">Hobbies</label>
        <input class="form-control" type="text" id="hobbies" name="hobbies" maxlength="200">
    </div>
    <div class="m-t-lg">
        <button class="btn btn--form" type = "button" id = "next" onclick="back3()">Back</button>
        <button class="btn btn--form" type = "submit" id = "submit">Submit</button>
    </div>
</div>