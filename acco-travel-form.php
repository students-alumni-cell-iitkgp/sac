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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">













  

<div class="container-fluid">
  <form action="acco-travel-form-continue.php" method="post" style="text-align: left;">
  <div class="row">  
   <h3> Travel Details </h3>
   <div class="input-field col s12 m6">
    Arrival Date
   <!-- <select name="arrDate" required value="<?php //echo @$query2['arrivaldate']; ?>">
      <option >11th January 2018</option>
      <option >12th January 2018</option>
      <option >13th January 2018</option>
      <option >14th January 2018</option>
    </select>
  -->
  <!-- New code to remove the errors -->
  <select name="arrDate" required >
     <option value="10th January 2019" <?php if( @$query2['arrivaldate'] == "10th January 2019") echo 'selected = "selected"';?>>10th January 2019</option>
    <option value="11th January 2019" <?php if( @$query2['arrivaldate'] == "11th January 2019") echo 'selected = "selected"';?> >11th January 2019</option>
    <option value="12th January 2019" <?php if( @$query2['arrivaldate'] == "12th January 2019") echo 'selected = "selected"';?>>12th January 2019</option>
    <option value="13th January 2019" <?php if( @$query2['arrivaldate'] == "13th January 2019") echo 'selected = "selected"';?>>13th January 2019</option>

  </select>

<!--   <label></label>
 --></div><br>
<div class="col s12 m6">
  Arrival Time
  <input  type="time"  name="arrTime" value="<?php echo @$query2['arrivaltime']; ?>" required>
</div>
<div class="row">
</div>
<div class="input-field col s12 m12 l6">
  Arrival Station/Airport
  <input id="last_name" type="text" class="validate" name="arrSt" value="<?php echo @$query2['arrivalstation']; ?>">
</div>
<div class="input-field col s12 m12 l6" style="display: none;">
  Train/Flight Name
  <input id="last_name" type="text" class="validate" name="trainName" value="<?php echo @$query2['trainname']; ?>">
</div>
<div class="input-field col s12 m12 l6">
  Train/Flight Number
  <input id="last_name" type="text" class="validate" name="trainNo" value="<?php echo @$query2['trainno']; ?>">
</div>
</div>
<div class="input-field col s12" style="display: none;">
  Number of Accompanying Persons
  <input id="last_name" type="number" class="validate" name="accNo" value="<?php echo @$query2['accompanyno']; ?>">
</div>
<div class="row">
<div class="input-field col s12 m12 l6" >
  Your Secondary Phone <br>Number                          
  <input id="last_name" type="number" class="validate" name="secPhone"   value="<?php echo @$query2['secondaryphone']; ?>" >
</div>

<div class="input-field col s12 m12 l6">
  Do you require a cab from Kolkata to <br>IIT Kharagpur?
       <!-- <select name="iscab"  onchange="checkCab(this)" value="<?php //echo @$query2['cabreq']; ?>">
          <option>No</option>
          <option>Yes</option>
        </select>
      -->
      <select name="iscab"  onchange="checkCab(this)" >
        <option value="No" <?php if( @$query2['cabreq'] == "No") echo 'selected = "selected"';?>>No</option>
        <option value="Yes" <?php if( @$query2['cabreq'] == "Yes") echo 'selected = "selected"';?>>Yes</option>
      </select>
    </div>
    <div  style="display:none; margin-left:5%" id="ifcab">
      If Cab is required:<br>
      <div class="input-field col s12">
        Pickup Destination
        <input id="last_name" type="text" class="validate" name="cabWhere" value="<?php echo @$query2['cabfrom']; ?>">
      </div>
      <div class="row">
        <div class="input-field col s12 m12 l6">
      Pickup Date
      <input  type="date"  name="cabDate" value="<?php echo @$query2['departdate']; ?>">
    </div>
    <div class="input-field col s12 m12 l6">
      Pickup Time
      <input  type="time"  name="cabWhen" value="<?php echo @$query2['cabat']; ?>">
    </div>
  </div>
  <div class="row">
      <div class="input-field col s12 m6 l6">
        Total Number of People travelling in cab
        <input id="last_name" type="number" class="validate" name="cabPpl" value="<?php echo @$query2['cabpeople']; ?>">
      </div>
      <div class="input-field col s12 m12 l6">
      Cab Preference
        <!--
        <select name="acabPref" value="<?php // echo @$query2['arrivalcabpref']; ?>" >
          <option>Swift dezire</option>
          <option>Scorpio</option>
          <option>Honda City</option>
          <option>Indigo</option>
        </select>
      -->
      <select name="acabPref" >
        <option value="Swift dezire" <?php if( @$query2['arrivalcabpref'] == "Swift dezire") echo 'selected = "selected"';?>> Swift dezire </option>
        <option value="Scorpio" <?php if( @$query2['arrivalcabpref'] == "Scorpio") echo 'selected = "selected"';?>> Scorpio </option>
        <option value="Honda City " <?php if( @$query2['arrivalcabpref'] == "Honda City ") echo 'selected = "selected"';?>> Honda City </option>
        <option value="Indigo" <?php if( @$query2['arrivalcabpref'] == "Indigo") echo 'selected = "selected"';?>> Indigo </option>
      </select>
    </div>
  </div>
    </div>
  </div>
    <br>
    <div class="row">
    <div class="input-field col s12 l6">
      Departure Date
        <!--
        <select name="depDate" required value="<?php //echo @$query2['departdate']; ?>">
            <option>13th January 2018</option>
            <option>14th January 2018</option>
            <option>15th January 2018</option>
            <option>16th January 2018</option>
        </select>
      -->
      <select name="depDate" required >
        <option value="13th January 2018" <?php if( @$query2['departdate'] == "13th January 2018") echo 'selected = "selected"';?> >13th January 2019</option>
        <option value="14th January 2018" <?php if( @$query2['departdate'] == "14th January 2018") echo 'selected = "selected"';?>>14th January 2019</option>
        <option value="15th January 2018" <?php if( @$query2['departdate'] == "15th January 2018") echo 'selected = "selected"';?>>15th January 2019</option>
        <option value="16th January 2018" <?php if( @$query2['departdate'] == "16th January 2018") echo 'selected = "selected"';?>>16th January 2019</option>
      </select>
    </div>
    <div class="input-field col s12 l6">
      On Departure, Do you require a cab?
        <!--
        <select name="iscab2"  onchange="checkCab2(this)" value="<?php //echo @$query2['depcabreq']; ?>">
          <option>No</option>
          <option>Yes</option>
        </select>
      -->
      <select name="iscab2"  onchange="checkCab2(this)" >
       <option value="No" <?php if( @$query2['depcabreq'] == "No") echo 'selected = "selected"';?>>No</option>
       <option value="Yes" <?php if( @$query2['depcabreq'] == "Yes") echo 'selected = "selected"';?>>Yes</option>
     </select>
   </div>
   <div  style="display:none; margin-left:5%" id="ifcab2">
    If Cab is required<br>
    
    <div class="input-field col s12">
      Departure Station/Airport
      <input id="last_name" type="text" class="validate" name="depSt" value="<?php echo @$query2['departstation']; ?>">
    </div>
    <div class="row">
    
     <div class="input-field col s12 l6"> 
      Departure Time
      <input  type="time" placeholder="Arrival Time" name="depTime" value="<?php echo @$query2['departtime']; ?>">
    </div>
    <div class="input-field col s12 l6">
    Cab Preference
    <!--
    <select name="dcabPref" value="<?php //echo @$query2['depcabpref']; ?>">
      <option>Swift dezire</option>
      <option>Scorpio</option>
      <option>Honda City</option>
      <option>Indigo</option>
    </select>
  -->
  <select name="dcabPref" >
    <option value="Swift dezire" <?php if( @$query2['depcabpref'] == "Swift dezire") echo 'selected = "selected"';?>> Swift dezire </option>
    <option value="Scorpio" <?php if( @$query2['depcabpref'] == "Scorpio") echo 'selected = "selected"';?>> Scorpio </option>
    <option value="Honda City " <?php if( @$query2['depcabpref'] == "Honda City ") echo 'selected = "selected"';?>> Honda City </option>
    <option value="Indigo" <?php if( @$query2['depcabpref'] == "Indigo") echo 'selected = "selected"';?>> Indigo </option>
  </select>
</div>
</div>
</div>
</div>


<h3> Accommodation Details </h3>
<div >


  Number of Accompanying Person
  <!--
  <select  name="accNo2" onchange="checkAcc(this)" value="<?php //echo @$query4['accompanyno']; ?>">
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
  </select>
-->
<select  name="accNo2" onchange="checkAcc(this)" >
  <option value="0" <?php if( @$query2['accompanyno'] == "0") echo 'selected = "selected"';?>>0</option>
  <option value="1" <?php if( @$query2['accompanyno'] == "1") echo 'selected = "selected"';?>>1</option>
  <option value="2" <?php if( @$query2['accompanyno'] == "2") echo 'selected = "selected"';?>>2</option>
  <option value="3" <?php if( @$query2['accompanyno'] == "3") echo 'selected = "selected"';?>>3</option>
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
  Details of the preferred Alumni You Want to Share the room/take adjacent room with:<br>
  <div class="row">
  <div class="input-field col s12 m6 l6">
    
    <input id="last_name" type="text" class="validate" name="prefName" value="<?php echo @$query4['prefname']; ?>"placeholder="Name">
  </div>
  <div class="input-field col s12 m6 l6">
   
    <input id="last_name" type="number" class="validate" name="prefYear" value="<?php echo @$query4['prefyear']; ?>"placeholder="Year of Graduation">
  </div>
</div>
<div class="row">
  <div class="input-field col s12 m6 l6">
    
    <input id="last_name" type="text" class="validate" name="prefDep" value="<?php echo @$query4['prefdep']; ?>"placeholder="Department">
  </div>
  <div class="input-field col s12 m6 l6">
    
    <input id="last_name" type="text" class="validate" name="prefHall" value="<?php echo @$query4['prefhall']; ?>" placeholder="HALL">
  </div>
</div>

</div>
<div class="fixed-action-btn" style="bottom: 25px; right:100px;" id="cancel">
  <a class="btn-floating btn-large waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="Cancel" name="button" id="backlobby"  onclick="closeNav()" >
<i class="large material-icons" style="position: relative;right: 32px;bottom: 7px;" >clear</i></a>
</div>
<button type="submit" class="btn cyan waves-effect waves-light right" name="button">SUBMIT </button>
</form>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
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
