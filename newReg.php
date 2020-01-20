<html>
   
   <head>
      <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      </head>

   <body style="overflow-x: hidden;">         
<div class="span3" style="margin-left: 40%;">
   <h2>Sign Up</h2>
   <form method="POST" action="newRegUpdate.php">
      
      <label style="font-size: 17px;">Name</label>
      <input style="width: 350px; height: 35px;" type="text" name="name" class="span3">
      
      <label style="font-size: 17px;">Department</label>
      <input style="width: 350px; height: 35px;" type="text" name="department" class="span3">

      <label style="font-size: 17px;">Hall</label>
      <input style="width: 350px; height: 35px;" type="text" name="hall" class="span3">

      <label style="font-size: 17px;">Batch</label>
      <input style="width: 350px; height: 35px;" type="number" name="batch" class="span3">

      <label style="font-size: 17px;">Contact</label>
      <input style="width: 350px; height: 35px;" type="number" name="contact" class="span3" >
      
      <label style="font-size: 17px;">Email Address</label>
      <input style="width: 350px; height: 35px;" type="email" name="email" class="span3" >

      <label style="font-size: 17px;">Company</label>
      <input style="width: 350px; height: 35px;" type="text" name="company" class="span3">

      <label style="font-size: 17px;">Designation</label>
      <input style="width: 350px; height: 35px;" type="text" name="designation" class="span3">
      <button type='submit' style="left:80px;position: relative; width: 100px; height: 30px;" name="submit" value="Sign up" class="btn btn-primary pull-right">Submit</button>
      <div class="clearfix"></div>
   </form>
</div>
</body>
</html>