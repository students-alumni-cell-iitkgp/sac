
<div class="section1">
    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label for="airdoa">Date of Arrival(KolKata)<span style="color:red;"></span></label>
                                <input class="form-control" type="date" name="airdoa" id="airdoa" value = "<?php echo "$airdoa"?>">
                            </div>
                            <div class="form-group ">
                                <label for="airtimetocome" class="form-label">
                                    Time to reach Kolkata Airport/Station
                                    <span style="color:red;">*expected time</span>
                                </label>
                                <div class="input-group ">
                                    <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class='far fa-clock'></i></span>
                                    <input class="form-control" type="text" name="airtimetocome" id="airtimetocome" class="validate" value = "<?php echo "$airtimetocome"?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="airmodeofT">Mode of Transportation <span style="color:red;"></span></label>
                                <div class="input-group w-100">
                                    <select  class="form-control form-select" type="list" list="airmodeofT" id="airmodeofT" name="airmodeofT" value = "<?php echo "$airmodeofT"?>">
                                     <option value=""></option>
                                     <option value="Train">Train</option> 
                                     <option value="Plane">Plane</option>
                                     <option value="Car">Car</option>
                                    </select>
                                </div >
                            </div >
                            <div class="form-group">
                                <label for="airpickup">Do you want us to pick up you from station <span style="color:red;"></span></label>
                                <div class="input-group ">
                                    <select  class="form-control form-select" type="list" list="airpickup" id="airpickup" name="airpickup" value = "<?php echo "$airpickup"?>">
                                        <option value=""></option> 
                                        <option value="Yes">Yes</option> 
                                        <option value="No">No</option>
                                    </select>
                                </div >
                            </div >
                            <div class="form-group">
                                <label for="airpcount">How many people are coming together<span style="color:red;"></span></label>
                                <input class="form-control" type="text" name="airpcount" id="airpcount" value = "<?php echo "$airpcount"?>">   
                            </div >
                            <div class="form-group">
                                <label for="aircarseater">Do you want Cab service <span style="color:red;">*paid</span></label>
                                <div class="input-group ">
                                    <select  class="form-control form-select" type="list" list="aircarseater" id="aircarseater" name="aircarseater" value = "<?php echo "$aircarseater"?>">
                                        <option value=""></option> 
                                        <option value="4">04 </option> 
                                        <option value="6">06 </option>
                                        <!--<option value="4">04 <span align = "right"> (₹)1000 </span></option> 
                                        <option value="6">06 <span align = "right"> (₹)2000 </span></option>-->
                                    </select>
                                </div >
                            </div >

                        </div>
                        <div class="m-t-lg">
                        <button class="btn btn--form" type = "button" id = "next" onclick="next4()">Next</button>
                    </div>    
     </div>
                    
</div>


<!-- <a id="train" class="active"><i class="fas fa-train"></i></i></a>
      <a id="plane"><i class="fas fa-plane"></i></a> -->