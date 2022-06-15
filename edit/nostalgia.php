<div class="prof6" id = "prof6" style = "margin: 40px;margin-top:0px; padding:30px">
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
    <div class="form-group col-sm-6 ">
        <label for="dept">Department <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="dept" name="dept" maxlength="30" value = "<?php echo "$dept"?>" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="hall">Hall <span style="color:red;">*</span></label>
        <input class="form-control" type="text" id="hall" name="hall" maxlength="50" value = "<?php echo "$hall"?>" required>      
    </div>
    </div>

    <div class = "row">
    <div class="form-group col-sm-6">
        <label for="join">Join Year <span style="color:red;">*</span></label>
        <input class="form-control" type="number" min="1951" max="2020" id="join" name="yoj" maxlength="10" value = "<?php echo "$yoj"?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="yog">Year of Graduating <span style="color:red;">*</span></label>
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
