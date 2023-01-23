<div class="card prof9">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Travel Details</h6>
  </div>
  <div class="card-body pt-4 p-3">

<form action="backend\tra.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >

    <div class = "row">
        <div class="form-group col-12">
            <label for="travel_form">Travelling From? (Please write Country and State)<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="travel_form" id="travel_form" value = "<?php echo "$travel_form"?>" maxlength="100" required />
        </div>
    </div>


    <div class = "row">
        <div class="form-group col-sm-6">
                <label for="mode">Mode of Travelling<span style="color:red;">*</span>: <span style="color:green;font-weight:bold"><?php echo "$mode"?></span></label> 
                <div class="input-group mb-3">
                    <select  class="form-control form-select" type="list" id="mode" name="mode" value = "<?php echo "$mode"?>" required>
                        <option selected value="">---Select---</option> 
                        <option value="Airplane">Airplane</option>
                        <option value="Train">Train</option>
                        <option value="Bus" >Bus</option>
                        <option value="Car">Car</option>
                        <option value="Other" >Other</option>
                    </select>
                </div>
        </div>

        <div class="form-group col-sm-6">
            <label for="reach_in">Where will you be reaching?<span style="color:red;">*</span>: <span style="color:green;font-weight:bold"><?php echo "$reach_in"?></span></label> 
            <div class="input-group mb-3">
                <select  class="form-control form-select" type="list" id="reach_in" name="reach_in" value = "<?php echo "$reach_in"?>" required>
                    <option selected value="">---Select---</option> 
                    <option value="Netaji Airport">Netaji Airport</option>
                    <option value="Kharagpur Junction">Kharagpur Junction</option>
                    <option value="Hijli Junction" >Hijli Junction</option>
                    <option value="Howrah Junction">Howrah Junction</option>
                    <option value="Sealdah Junction" >Sealdah Junction</option>
                    <option value="IIT Kharagpur">IIT Kharagpur</option>
                    <option value="Other" >Other</option>
                </select>
            </div>
        </div>
    </div>

    <div class = "row">
        <div class="form-group col-sm-6">
            <label for="date_reach_in">Date of reaching the above location<span style="color:red;">*</span></label>
            <input class="form-control" type="date" name="date_reach_in" id="date_reach_in" value = "<?php echo "$date_reach_in"?>" required />
        </div>
        <div class="form-group col-sm-6">
            <label for="time_reach_in">Time of reaching the above location</label>
            <input class="form-control" type="time" name="time_reach_in" id="time_reach_in" value = "<?php echo "$time_reach_in"?>"/>
        </div>
    </div>

    <div class = "row">
        <div class="form-group col-sm-6">
            <label for="flight_no">Flight Number</label>
            <input class="form-control" type="text" name="flight_no" id="flight_no" value = "<?php echo "$flight_no"?>" maxlength="50" />
        </div>
        <div class="form-group col-sm-6">
            <label for="train_no">Train Ticket PNR Number</label>
            <input class="form-control" type="text" name="train_no" id="train_no" value = "<?php echo "$train_no"?>" maxlength="50"/>
        </div>
    </div>

    <div class = "row">
        <div class="form-group col-sm-6">
            <label for="cab">Do you need a cab from the above location?<span style="color:red;">*</span>: <span style="color:green;font-weight:bold"><?php echo "$cab"?></span></label>
            <div class="input-group mb-3">
                <select  class="form-control form-select" type="list" id="cab" name="cab" value = "<?php echo "$cab"?>" required>
                    <option value="">---Select---</option> 
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="cab_type">Preferred Cab type: <span style="color:green;font-weight:bold"><?php echo "$cab_type"?></span></label>
            <div class="input-group mb-3">
            <select class="form-control form-select" type="list" name="cab_type" id="cab_type" value = "<?php echo "$cab_type"?>" >
            <option value="">---Select---</option> 
                    <option value="Innova Crysta">Innova Crysta</option>
                    <option value="Toyota Etios">Toyota Etios</option>
                    <option value="Swift Dzire">Swift Dzire</option>
                    <option value="Scorpio">Scorpio</option>
                    <option value="Traveller 25">Traveller 25(if you are ready to travel with 25 people)</option>
                    <option value="Traveller 10">Traveller 10(if you are ready to travel with 10 people)</option>
                </select>
            </div>
        </div>
    </div>

    <div class = "row" style="justify-content:center">
        <div class="form-group col-sm-6">
            <label for="no_acc">Number of Accompaniments</label>
            <input class="form-control" type="number" name="no_acc" id="no_acc" value = "<?php echo "$no_acc"?>" maxlength="10"/>
        </div>
    </div>

    <div class = "row">
        <div class="form-group col-sm-6">
            <label for="date_reach_out">Date to return</label>
            <input class="form-control" type="date" name="date_reach_out" id="date_reach_out" value = "<?php echo "$date_reach_out"?>"/>
        </div>
        <div class="form-group col-sm-6">
            <label for="time_reach_out">Time at which you pefer to leave</label>
            <input class="form-control" type="time" name="time_reach_out" id="time_reach_out" value = "<?php echo "$time_reach_out"?>"/>
        </div>
    </div>

    <div class = "row" style="justify-content:center">
        <div class="form-group col-sm-6">
            <label for="reach_out">Where will you be returning to?: <span style="color:green;font-weight:bold"><?php echo "$reach_out"?></span></label>
            <div class="input-group mb-3">
                <select  class="form-control form-select" type="list" id="reach_out" name="reach_out" value = "<?php echo "$reach_out"?>">
                    <option value="">---Select---</option> 
                    <option value="Netaji Airport">Netaji Airport</option>
                    <option value="Kharagpur Junction">Kharagpur Junction</option>
                    <option value="Hijli Junction" >Hijli Junction</option>
                    <option value="Howrah Junction">Howrah Junction</option>
                    <option value="Sealdah Junction" >Sealdah Junction</option>
                    <option value="IIT Kharagpur">IIT Kharagpur</option>
                    <option value="Other" >Other</option>
                </select>
            </div>
        </div>
    </div>

    <div class = "row" style="justify-content:center">
        <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Save</button></div>
    </div>
</form>
</div>
</div>