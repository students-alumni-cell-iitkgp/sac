<div class="prof3" id = "prof3" style = "margin: 40px;margin-top:0px; padding:30px">
<form action="backend\accomodation.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >

<table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fee</th>
                <th scope="col">Amount</th>
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

           <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Guest House</th>
                <th scope="col">Cost per person</th>
              </tr>
            </thead>
             <tbody>
               <tr>
                 <th scope="row">1</th>
                 <td>Technology Guest House</td>
                 <td>2250</td>
               </tr>
             </tbody>
           </table>

         <div class="row">

             <div class="form-group mb-3 col-sm-6">
             <label for="employee">Are you a resident of IIT Kharagpur?<span style="color:red;">*</span></label>
            <select class="form-control form-select" type = "list" id = "employee" name= "employee" onchange="emp()" required>
            <option selected value="select">---Select---</option>
            <option value="0">No</option>
            <option value="1">Yes</option>
            </select>
          </div>

          <div class="form-group mb-3 col-sm-6">
             <label for="accompaniment">Accompanying Person(s)</label>
                <input type="number" class="form-control" id="accompaniment" name= "accompaniment" value="0" placeholder= "0" min = "0"value = "<?php echo "$accompaniment"?>"  max="20" onchange="calc_cost()">
                <small class = "text-muted">Kids below 13 years of age won't be charged. It's free of cost for them. Don't add them in the accompanying person(s) list</small>
             </div>
           </div>

          <div class = "row" id = "gh" style = "justify-content:center">
          <div class="form-group mb-3 col-sm-6">
          <label for="gh">Ghest House<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="gh" id="g" value = "<?php echo "$gh"?>" readonly />
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
