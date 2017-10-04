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
    <form action="acco-travel-form-continue2.php" method="post" style="text-align: left;">
       <h3> Travel Details </h3>
    <div class="input-field col s12">
    <select name="arrDate" required value="<?php echo @$query2['arrivaldate']; ?>">
      <option >11th January 2018</option>
      <option >12th January 2018</option>
      <option >13th January 2018</option>
      <option >14th January 2018</option>
    </select>
    <label>Arrival Date</label>
  </div>
      <div class="col s12">
        <label for="arrTime">Arrival Time</label>
        <input  type="time"  name="arrTime" value="<?php echo @$query2['arrivaltime']; ?>" required>
      </div>
      <div class="input-field col s12">
          Arrival Station/Airport
          <input id="last_name" type="text" class="validate" name="arrSt" value="<?php echo @$query2['arrivalstation']; ?>">
        </div>
      <div class="input-field col s12">
          Train/Flight Name
          <input id="last_name" type="text" class="validate" name="trainName" value="<?php echo @$query2['trainname']; ?>">
        </div>
      <div class="input-field col s12">
            Train/Flight Number
          <input id="last_name" type="text" class="validate" name="trainNo" value="<?php echo @$query2['trainno']; ?>">
        </div>
      <div class="input-field col s12">
          Number of Accompanying Persons
          <input id="last_name" type="number" class="validate" name="accNo" value="<?php echo @$query2['accompanyno']; ?>">
        </div>
      <div class="input-field col s12">
          Your Phone Number
          <input id="last_name" type="number" class="validate" name="secPhone"  required value="<?php echo @$query2['secondaryphone']; ?>">
        </div>

      <div >
        Do you require a cab from Kolkata to IIT Kharagpur?
        <select name="iscab"  onchange="checkCab(this)" value="<?php echo @$query2['cabreq']; ?>">
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifcab">
        If Cab is required:<br>
        <div class="input-field col s12">
          Pickup Destination
          <input id="last_name" type="text" class="validate" name="cabWhere" value="<?php echo @$query2['cabfrom']; ?>">
        </div>
        Pickup Date
        <input  type="date"  name="cabDate" value="<?php echo @$query2['departdate']; ?>">
        Pickup Time
        <input  type="time"  name="cabWhen" value="<?php echo @$query2['cabat']; ?>">
        <div class="input-field col s12">
          Total Number of People travelling in cab
          <input id="last_name" type="number" class="validate" name="cabPpl" value="<?php echo @$query2['cabpeople']; ?>">
        </div>
        Cab Preference
        <select name="acabPref" value="<?php echo @$query2['arrivalcabpref']; ?>" >
          <option>Swift dezire</option>
          <option>Scorpio</option>
          <option>Honda City</option>
          <option>Indigo</option>
        </select>
      </div>
      <br><br>
       <div >
        Departure Date
        <select name="depDate" required value="<?php echo @$query2['departdate']; ?>">
            <option>13th January 2018</option>
            <option>14th January 2018</option>
            <option>15th January 2018</option>
            <option>16th January 2018</option>
        </select>
      </div>
      <div >
        On Departure, Do you require a cab to Kolkata?
        <select name="iscab2"  onchange="checkCab2(this)" value="<?php echo @$query2['depcabreq']; ?>">
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifcab2">
        If Cab is required<br>
        <div >
        Departure Time
        <input  type="time" placeholder="Arrival Time" name="depTime" value="<?php echo @$query2['departtime']; ?>">
        </div>
        <div class="input-field col s12">
          Departure Station/Airport
          <input id="last_name" type="text" class="validate" name="depSt" value="<?php echo @$query2['departstation']; ?>">
        </div>
        Cab Preference
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
        Number of Accompanying Person
        <select  name="accNo2" onchange="checkAcc(this)" value="<?php echo @$query4['accompanyno']; ?>">
          <option>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc1" >
        Accompanying Persons<br>
        1.<br>
        <div class="input-field col s12">
        Name of Person
          <input id="last_name" type="text" class="validate" name="accName1" value="<?php echo @$query4['accname1']; ?>">
        </div>
        <div class="input-field col s12">
          Relationship with the Person
          <input id="last_name" type="text" class="validate" name="accRel1" value="<?php echo @$query4['accrel1']; ?>">
        </div>
        <div class="input-field col s12">Age
          <input id="last_name" type="number" class="validate" name="accAge1" value="<?php echo @$query4['accage1']; ?>">
        </div>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc2" >
        2.<br>
        <div class="input-field col s12">
        Name of Person
          <input id="last_name" type="text" class="validate" name="accName2" value="<?php echo @$query4['accname2']; ?>">
        </div>
        <div class="input-field col s12">
          Relationship with the Person
          <input id="last_name" type="text" class="validate" name="accRel2" value="<?php echo @$query4['accrel2']; ?>">
        </div>
        <div class="input-field col s12">Age
          <input id="last_name" type="number" class="validate" name="accAge2" value="<?php echo @$query4['accage2']; ?>">
        </div>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc3" >
        3.<br>
        <div class="input-field col s12">
        Name of Person
          <input id="last_name" type="text" class="validate" name="accName3" value="<?php echo @$query4['accname3']; ?>">
        </div>
        <div class="input-field col s12">
          Relationship with the Person
          <input id="last_name" type="text" class="validate" name="accRel3" value="<?php echo @$query4['accrel3']; ?>">
        </div>
        <div class="input-field col s12">Age
          <input id="last_name" type="number" class="validate" name="accAge3" value="<?php echo @$query4['accage3']; ?>">
        </div>
      </div>
      
      <div  style="margin-top:20px;">
      Preferred Alumni You Want to Share the room/take adjacent room with:<br>
        <div class="input-field col s12">
          Name of Person
          <input id="last_name" type="text" class="validate" name="prefName" value="<?php echo @$query4['prefname']; ?>">
        </div>
        <div class="input-field col s12">
          Year of Graduation of Preferred Person:
          <input id="last_name" type="number" class="validate" name="prefYear" value="<?php echo @$query4['prefyear']; ?>">
        </div>
        <div class="input-field col s12">
          Department of the person
          <input id="last_name" type="text" class="validate" name="prefDep" value="<?php echo @$query4['prefdep']; ?>">
        </div>
        <div class="input-field col s12">
          Hall of the person
          <input id="last_name" type="text" class="validate" name="prefHall" value="<?php echo @$query4['prefhall']; ?>">
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

