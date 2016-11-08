
 <div class="container-fluid">
  	<form action="acco-travel-form-continue.php" method="post" style="text-align: left;">
       <h3> Travel Details </h3>
    <div class="input-field col s12">
    <select name="arrDate">
      <option value="" disabled selected>Choose your option</option>
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
        <input  type="time" placeholder="Arrival Time" name="arrTime">
      </div>
      <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="arrSt">
          <label for="last_name">Arrival Station/Airport</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="trainName">
          <label for="last_name">Train/Flight Name</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="trainNo">
          <label for="last_name">Train/Flight Number</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accNo">
          <label for="last_name">Number of Accompanying Person</label>
        </div>
      <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="secPhone">
          <label for="last_name">Your Secondary Phone Number</label>
        </div>
      <div >
        <label for="Name">Do you require a cab from Kolkata to IIT Kharagpur?</label>
        <select name="iscab"  onchange="checkCab(this)">
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifcab">
        <label for="Name">If Cab is required:</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="cabWhere">
          <label for="last_name">Pickup Destination</label>
        </div>
        <label for="Name">Pickup Date</label>
        <input  type="date"  name="cabDate">
        <label for="Name">Pickup Time</label>
        <input  type="time"  name="cabWhen">
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="cabPpl">
          <label for="last_name">Total Number of People travelling in cab</label>
        </div>
        <label for="Name">Cab Preference</label>
        <select name="acabPref" >
          <option>Swift dezire</option>
          <option>Scorpio</option>
          <option>Honda City</option>
          <option>Indigo</option>
        </select>
      </div>
      <br><br>
       <div >
        <label for="Name">Departure Date</label>
        <select name="depDate" >
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
        <select name="iscab2"  onchange="checkCab2(this)">
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div  style="display:none; margin-left:5%" id="ifcab2">
        <label for="Name">If Cab is required</label><br>
        <div >
        <label for="Name">Departure Time</label>
        <input  type="time" placeholder="Arrival Time" name="depTime">
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="depSt">
          <label for="last_name">Departure Station/Airport</label>
        </div>
        <label for="Name">Cab Preference</label>
        <select name="dcabPref" >
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
        <select  name="accNo2" onchange="checkAcc(this)">
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
          <input id="last_name" type="text" class="validate" name="accName1">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accRel1">
          <label for="last_name">Relationship with the Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accAge1">
          <label for="last_name">Age</label>
        </div>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc2" >
        <label for="Name">2.</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accName2">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accRel2">
          <label for="last_name">Relationship with the Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accAge2">
          <label for="last_name">Age</label>
        </div>
      </div>
      <div  style="display:none; margin-left:5%" id="ifacc3" >
        <label for="Name">3.</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accName3">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="accRel3">
          <label for="last_name">Relationship with the Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="accAge3">
          <label for="last_name">Age</label>
        </div>
      </div>
      
      <div  style="margin-top:20px;">
      <label>Preferred Alumni You Want to Share the room/take adjacent room with:</label><br>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="prefName">
          <label for="last_name">Name of Person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="number" class="validate" name="prefYear">
          <label for="last_name">Year of Graduation of Preferred Person:</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="prefDep">
          <label for="last_name">Department of the person</label>
        </div>
        <div class="input-field col s12">
          <input id="last_name" type="text" class="validate" name="prefHall">
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
