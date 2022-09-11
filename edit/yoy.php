<div class="card prof13">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Yearing of Yore</h6>
  </div>
  <div class="card-body pt-4 p-3">
  <form action="backend\yoy.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()" >

  <div class = "row">
    <div class="form-group col-12">
        <label for="yoy">Story/Caption/Writup<span style="color:red;">*</span> </label>
        <input class="form-control" type="text" id="yoy" name="yoy" maxlength="2000" placeholder="Max 2000 words" style = "height: 400px" required>
    </div>
  </div>

  <div class = "row">
    <div class="form-group col-12">
    <label for="yoy_pic">Upload Photo</label>
    <input type="file" id="yoy_pic" name="yoy_pic" accept=".jpg, .jpeg, .png">          
    </div>
  </div>     

    <div class = "row" style="justify-content:center">
        <div class="col-1"><button id="submit" class="btn btn-primary" type = "submit">Save</button></div>
        </div>
</form>      
  </div>
</div>