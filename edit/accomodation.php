<?php
require './config.php';
$database = 'aam';
   
  
    $s = "SELECT * FROM acco" ;
    $stmt=$GLOBALS["conn"]->prepare($s);
    $stmt->execute();

    $avs = $stmt->fetchAll();
    
      
    foreach($avs as $a) {         
        if(($a['name'] === 'TGH')) {
             $av_tgh = $a['av'];
        }
        else if(($a['name'] === 'SAM')) {
          $av_sam = $a['av'];
     }
    }  

  
?>

<div class="card prof10">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Accomodation</h6>
  </div>
  <div class="card-body pt-4 p-3">
  <form action="backend\accomodation.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >

<table class="table table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Registration Fee</th>
                <th scope="col">Amount(INR)</th>
              </tr>
            </thead>
             <tbody>
               <tr>
                  <th scope="row">1</th>
                  <td>Per Alumnus/Alumna</td>
                  <td>8000</td>
               </tr>
               <tr>
                 <th scope="row">2</th>
                 <td>Per Accompanying Person(s)</td>
                 <td>5000</td>
               </tr>
             </tbody>
           </table>

           <div class = "row">
           <div class="form-group mb-3 col-sm-6">
             <label for="accompaniment">Accompanying Person(s)</label>
                <input type="number" class="form-control" id="accompaniment" name= "accompaniment" value="0" placeholder= "0" min = "0" value = "<?php echo "$accompaniment"?>"  max="20" onchange="calc_cost()">
             </div>

             <div class="form-group mb-3 col-sm-6">
             <label for="acc_kid">Accompanying Kid(s)</label>
                <input type="number" class="form-control" id="acc_kid" name= "acc_kid" value="0" placeholder= "0" min = "0" value = "<?php echo "$acc_kid"?>"  max="20" >
                <small class = "text-muted">Kids below 13 years of age won't be charged.</small>
             </div>
           </div>

           <div class = "row" style="justify-content:center">
           <div class="mb-3 col-sm-4">
           <input class="form-control" id="acp" name = "acp" type="text" value = "Reg Fee = &#8377;0" readonly>
           </div>
           </div>

           <table class="table table-striped" style = "margin-bottom: 0 !important">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Guest House</th>
                <th scope="col">Cost per person(INR)</th>
              </tr>
            </thead>
             <tbody>
               <tr>
                 <th scope="row">1</th>
                 <td>Technology Guest House</td>
                 <td>2550</td>
               </tr>
               <tr>
                 <th scope="row">2</th>
                 <td>Sir Ashutosh Mukherjee Hall </td>
                 <td>900</td>
               </tr>
             </tbody>
           </table>
           <small class = "text-muted">Rooms are on Shared Bases</small>


         <div class="row" style="justify-content:center">

             <div class="form-group mb-3 col-sm-6">
             <label for="employee">Are you a resident of IIT Kharagpur?<span style="color:red;">*</span></label>
            <select class="form-control form-select" type = "list" id = "employee" name= "employee" onchange="emp()" required>
            <option selected value="select">---Select---</option>
            <option value="0">No</option>
            <option value="1">Yes</option>
            </select>
          </div>
           </div>

          <div class = "row" id = "gh" style = "justify-content:center">
          <div class="form-group mb-3 col-sm-6">
             <label for="gh">Guest House<span style="color:red;">*</span></label>
            <select class="form-control form-select" type = "list" id = "g" name= "gh" onchange="emp()" required>
            <option selected value="select">---Select---</option>
            <option value="TGH">Technology Guest House</option>
            <option value="SAM">Sir Ashutosh Mukherjee Hall</option>
            </select>
          </div>
        </div>

        <div class="row" id="serial" style = "justify-content:center">
             <div class="form-group mb-3 col-sm-6">
             <label for="serial">Employee ID</label>
                <input type="text" class="form-control" name= "serial" placeholder= "KGP...."  maxlength="50">
             </div>
        </div>

        <div class = "row" style="justify-content:center">
        <div class="mb-3 col-sm-4">
        <input class="form-control" id="cost" name = "cost" type="text" value = "Total cost = &#8377;0" readonly>
        </div>
        </div>

    <div class = "row" style="justify-content:center">
        <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Save</button></div>
        </div>
</form>
  </div>
</div>