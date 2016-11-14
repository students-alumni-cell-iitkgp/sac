<?php

    require 'connection.php';
    session_start();
    $email=$_SESSION['email'];
    $query1=" SELECT * FROM travel WHERE email= '$email' ";
    $query3=" SELECT * FROM  accommodation WHERE email= '$email' ";
    $query_run1=$connection->query($query1);
    $query_run2=$connection->query($query3);
    if (($query_run1)&&($query_run2)) {
      if(($query_run1->num_rows > 0)&&($query_run2->num_rows > 0)){       
            $query2 = mysqli_fetch_assoc($query_run1);
            $query4 = mysqli_fetch_assoc($query_run2);

      }
      
    } 
    


?>
 <div class="container-fluid">
    <form action="acco-travel-form-continue.php" method="post" style="text-align: left;">
       <h3> Travel Details </h3>
    <div class="input-field col s12">
    <select name="arrDate" required value="<?php echo @$query2['arrivaldate']; ?>">
      <option >12th January 2017</option>
      <option >13th January 2017</option>
      <option >14th January 2017</option>
      <option >15th January 2017</option>
      <option >16th January 2017</option>
      <option >17th January 2017</option>
    </select>
    <label>Arrival Date</label>
  </div>
      <div class="col s12">
        <label for="Name">Arrival Time</label>
        <input  type="time" placeholder="Arrival Time" name="arrTime" value="<?php echo @$query2['arrivaltime']; ?>" required>
      </div>
      <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="arrSt" value="<?php echo @$query2['arrivalstation']; ?>">
          <label for="last_name">Arrival Station/Airport</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="trainName" value="<?php echo @$query2['trainname']; ?>">
          <label for="last_name">Train/Flight Name</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="trainNo" value="<?php echo @$query2['trainno']; ?>">
          <label for="last_name">Train/Flight Number</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accNo" value="<?php echo @$query2['accompanyno']; ?>">
          <label for="last_name">Number of Accompanying Person</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="secPhone" required value="<?php echo @$query2['secondaryphone']; ?>">
          <label for="last_name">Your Secondary Phone Number</label>
        </div>
      <div >
        <label for="Name">Do you require a cab from Kolkata to IIT Kharagpur?</label>
        <select name="iscab"  onchange="checkCab(this)" value="<?php echo @$query2['cabreq']; ?>">
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifcab">
        <label for="Name">If Cab is required:</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="cabWhere" value="<?php echo @$query2['cabfrom']; ?>">
          <label for="last_name">Pickup Destination</label>
        </div>
        <label for="Name">Pickup Date</label>
        <input  type="date"  name="cabDate" value="<?php echo @$query2['departdate']; ?>">
        <label for="Name">Pickup Time</label>
        <input  type="time"  name="cabWhen" value="<?php echo @$query2['cabat']; ?>">
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="cabPpl" value="<?php echo @$query2['cabpeople']; ?>">
          <label for="last_name">Total Number of People travelling in cab</label>
        </div>
        <label for="Name">Cab Preference</label>
        <select name="acabPref" value="<?php echo @$query2['arrivalcabpref']; ?>" >
          <option>Swift dezire</option>
          <option>Scorpio</option>
          <option>Honda City</option>
          <option>Indigo</option>
        </select>
      </div>
      <br><br>
       <div >
        <label for="Name">Departure Date</label>
        <select name="depDate" required value="<?php echo @$query2['departdate']; ?>">
            <option>14th January 2017</option>
            <option>15th January 2017</option>
            <option>16th January 2017</option>
            <option>17th January 2017</option>
            <option>18th January 2017</option>
            <option>19st January 2017</option>
        </select>
      </div>
      <div >
        <label for="Name">On Departure, Do you require a cab to Kolkata?</label>
        <select name="iscab2"  onchange="checkCab2(this)" value="<?php echo @$query2['depcabreq']; ?>">
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifcab2">
        <label for="Name">If Cab is required</label><br>
        <div >
        <label for="Name">Departure Time</label>
        <input  type="time" placeholder="Arrival Time" name="depTime" value="<?php echo @$query2['departtime']; ?>">
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="depSt" value="<?php echo @$query2['departstation']; ?>">
          <label for="last_name">Departure Station/Airport</label>
        </div>
        <label for="Name">Cab Preference</label>
        <select name="dcabPref" value="<?php echo @$query2['depcabpref']; ?>">
          <option>Swift dezire</option>
          <option>Scorpio</option>
          <option>Honda City</option>
          <option>Indigo</option>
        </select>
      </div>
      <hr>

      <h3> Accommodation Details </h3>
      <div >
        <label for="Name">Number of Accompanying Person</label>
        <select  name="accNo2" onchange="checkAcc(this)" value="<?php echo @$query4['accompanyno']; ?>">
          <option>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc1" >
        <label for="Name">Accompanying Persons</label><br>
        <label for="Name">1.</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accName1" value="<?php echo @$query4['accname1']; ?>">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accRel1" value="<?php echo @$query4['accrel1']; ?>">
          <label for="last_name">Relationship with the Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accAge1" value="<?php echo @$query4['accage1']; ?>">
          <label for="last_name">Age</label>
        </div>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc2" >
        <label for="Name">2.</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accName2" value="<?php echo @$query4['accname2']; ?>">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accRel2" value="<?php echo @$query4['accrel2']; ?>">
          <label for="last_name">Relationship with the Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accAge2" value="<?php echo @$query4['accage2']; ?>">
          <label for="last_name">Age</label>
        </div>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc3" >
        <label for="Name">3.</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accName3" value="<?php echo @$query4['accname3']; ?>">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accRel3" value="<?php echo @$query4['accrel3']; ?>">
          <label for="last_name">Relationship with the Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accAge3" value="<?php echo @$query4['accage3']; ?>">
          <label for="last_name">Age</label>
        </div>
      </div>
      
      <div  style="margin-top:20px;">
      <label>Preferred Alumni You Want to Share the room/take adjacent room with:</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="prefName" value="<?php echo @$query4['prefname']; ?>">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="prefYear" value="<?php echo @$query4['prefyear']; ?>">
          <label for="last_name">Year of Graduation of Preferred Person:</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="prefDep" value="<?php echo @$query4['prefdep']; ?>">
          <label for="last_name">Department of the person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="prefHall" value="<?php echo @$query4['prefhall']; ?>">
          <label for="last_name">Hall of the person</label>
        </div>
        </div>
      <button type="submit" class="btn cyan waves-effect waves-light right" name="button">SUBMIT <i class="mdi-content-send right"></i></button>
    </form>

  </div>


  <script type="text/javascript">
    $(document).ready(function() {
    $('select').material_select();
  });
    function checkCab(x) {
      if(x.options[x.selectedIndex].text=="Yes") {
        document.getElementById("ifcab").style.display="block";
      }
      else {
        document.getElementById("ifcab").style.display="none";
      }
    }

    function checkCab2(x) {
      if(x.options[x.selectedIndex].text=="Yes") {
        document.getElementById("ifcab2").style.display="block";
      }
      else {
        document.getElementById("ifcab2").style.display="none";
      }
    }

    function checkAcc(x) {
      var n=x.options[x.selectedIndex].text;
      var y= new Array("ifacc1","ifacc2","ifacc3");
      var i;
      for(i=0;i<n;i++) {
        document.getElementById(y[i]).style.display="block";
      }
      for(i=n;i<3;i++) {
        document.getElementById(y[i]).style.display="none";
      }
    }
  </script>
