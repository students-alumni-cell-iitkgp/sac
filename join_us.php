<?php 
if(isset($_POST['commit'])){
    
    $var1=$_POST['name'];
    $var6=$_POST['designation'];
    $var2=$_POST['email'];
    $var3=$_POST['contact'];
    $var4=$_POST['phone'];
    $var5=$_POST['add'];
    
    include 'connection.php';
    $sql = "INSERT INTO chapter (name,desi, email,contact,phone ,city)
    VALUES ('$var1','$var6','$var2','$var3','$var4','$var5')";
    if (mysqli_query($connection, $sql)) {
        echo "<h1><script>alert('Thanks! Your message has been succesfully sent');</script></h1>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
mysqli_close($connection);
}
 ?>
 <style type="text/css">
     #modal1{
        padding: 30px;
     }
 </style>
<div  style="float: right;margin-right:1.3em"><h5> Associate With Us<hr></h5> <br><a style="margin-top:-1.8em;margin-left: 45px" class="waves-effect waves-light btn modal-trigger" href="#modal1">Join us</a>
</div>
<div id="modal1" class="modal" style="width: 40%;height: 100%">
    <div style="background-color: #26a69a; padding-bottom: 2px;padding-top: 2px" class="modal-content">
      <center><h5 class="modal-title">Get Associated With Us   </h5></center>
    </div>
    <div class="modal-body">
        <form accept-charset="UTF-8" action="" method="post"><div style="display:none"></div>

            <div><h4 style="padding-top: 15px" class="center"> Basic Details </h4>
            </div>

            <div class="field">
                <input type="text" name="name" style="border-radius:5px;" placeholder="Person Name" required><br><br>
            </div>
            <div class="field">
                <input type="text" name="designation" style="border-radius:5px;" placeholder="Designation" required><br><br>
            </div>

            <div class="field">
                <input type="text" name="contact" style="border-radius:5px;" placeholder="Company Details" required><br><br>
            </div>

            <div class="field">
                <input type="email" name="email" style="border-radius:5px;" placeholder="Email Id"  required ><br><br>
            </div>

            <div class="field">
                <input type="text" name="phone" style="border-radius:5px;" maxlength="10" placeholder="Phone No." required><br><br>
            </div>


            <div class="field">
                <input type="text" name="add" style="border-radius:5px;" placeholder="Address" required><br><br>
            </div>




       <center> <div class="actions">
               <input class="btn btn-primary btn-lg" name="commit" type="submit" value="Submit" style="width:200px" />
           </div></center>
        </form>

    </div>

    </div>

