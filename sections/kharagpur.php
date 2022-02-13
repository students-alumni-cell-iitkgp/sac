
<div class="section2">
    <div class="container">
                        <div class="row">
                        <div class="col-sm-12">
                                <label for="kgpdoa">Date of Arrival (KGP)<span style="color:red;"></span></label>
                                <input class="form-control" type="date" name="kgpdoa" id="kgpdoa" value = "<?php echo "$kgpdoa"?>">
                            </div>
                            <div class="col-sm-12 ">
                                <label for="kgptimetocome" class="form-label">
                                    Time to reach Kharagpur Station
                                    <span style="color:red;">*expected time</span>
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="font-weight: 600;" id="basic-addon1"><i class='far fa-clock'></i></span>
                                    <input class="form-control" type="text" name="kgptimetocome" id="kgptimetocome" class="validate" value = "<?php echo "$kgptimetocome"?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="kgpmodeofT">Mode of Transportation <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="kgpmodeofT" id="kgpmodeofT" name="kgpmodeofT" value = "<?php echo "$kgpmodeofT"?>">
                                     <option value=""></option>
                                     <option value="Train">Train</option> 
                                     <option value="Plane">Plane</option>
                                     <option value="Car">Car</option>
                                    </select>
                                </div >
                            </div >
                            <div class="col-sm-12">
                                <label for="kgppickup">Do you want us to pick up you from station <span style="color:red;"></span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="kgppickup" id="kgppickup" name="kgppickup" value = "<?php echo "$kgppickup"?>">
                                        <option value=""></option> 
                                        <option value="Yes">Yes</option> 
                                        <option value="No">No</option>
                                    </select>
                                </div >
                            </div >
                            <div class="col-sm-12">
                                <label for="kgppcount">How many people are coming together<span style="color:red;"></span></label>
                                <input class="form-control" type="text" name="kgppcount" id="kgppcount" value = "<?php echo "$kgppcount"?>">   
                            </div >
                            <div class="col-sm-12">
                                <label for="kgpcarseater">Do you want Cab service <span style="color:red;">*paid</span></label>
                                <div class="input-group mb-3">
                                    <select  class="form-control form-select" type="list" list="kgpcarseater" id="kgpcarseater" name="kgpcarseater" value = "<?php echo "$kgpcarseater"?>">
                                        <option value=""></option> 
                                        <option value="4">04 </option> 
                                        <option value="6">06 </option>
                                        <!--<option value="4">04 <span align = "right"> (₹)1000 </span></option> 
                                        <option value="6">06 <span align = "right"> (₹)2000 </span></option>-->
                                    </select>
                                </div >
                            </div >


                        </div>

                        </div>
                        <div class="m-t-lg">
                    <button class="btn btn--form" type = "button" id = "next" onclick="back4()">Back</button>
                    <button class="btn btn--form" type = "submit" id = "submit" >Submit</button>
                    </div>
                       
     </div>
                    
</div>
