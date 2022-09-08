<style>
.tabs li{
  float: left;
  list-style-type: none;
  padding: 5px;
  margin: 5px;
}
#1973_btn:hover{
  color: #D81B60;
  cursor: pointer;
}
#1983_btn:hover{
  color: #D81B60;
  cursor: pointer;
}
#1998_btn :hover{
  color: #D81B60;
  cursor: pointer;
}
</style>
<?php
      $path="connection.php";
      include 'adminPages/config.php';
      $batch1973=getBatch('1973');$no1973=getBatch('1973');
      $batch1983=getBatch('1983');$no1983=getBatch('1983');
      $batch1998=getBatch('1998');$no1998=getBatch('1998');

      $no_of_people1973 = 0;
      $no_of_people1983 = 0;
      $no_of_people1998 = 0;
     
      while($val=$no1973->fetch(PDO::FETCH_ASSOC)){ $no_of_people1973++;}
      while($val=$no1983->fetch(PDO::FETCH_ASSOC)){ $no_of_people1983++;}
      while($val=$no1998->fetch(PDO::FETCH_ASSOC)){ $no_of_people1998++;}
     
    ?>

<div class="card prof13">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Attendee</h6>
  </div>

  <div class="card-body pt-4 p-3">
   <div class="row">
     <ul class="tabs">
       <li class="col-3"><a class="active" id = "1973_btn" onclick="show_1973()">1973<?php echo "(".$no_of_people1973.")" ?></a></li>
       <li class="col-3"><a                id = "1983_btn" onclick="show_1983()">1983<?php echo "(".$no_of_people1983.")" ?></a></li>
       <li class="col-3"><a                id = "1998_btn" onclick="show_1998()">1998<?php echo "(".$no_of_people1998.")" ?></a></li>
    </ul>
   </div>

   <div id="1973" style="text-align:center;">
     <table class="table">
         <tr>
             <th scope="row">Names</th>
         </tr>
         <?php   while($value=$batch1973->fetch(PDO::FETCH_ASSOC)){?>
           <tr><td><?php echo  $value['name'].' | '.$value['dept'].' | '.$value['hall']; ?></td></tr>
         <?php } ?>
         </tr> 
     </table>
   </div>

   <div id="1983" style="text-align:center;">
     <table class="table">
         <tr>
             <th scope="row">Names</th>
         </tr>
         <?php   while($value=$batch1983->fetch(PDO::FETCH_ASSOC)){?>
           <tr><td><?php echo  $value['name'].' | '.$value['dept'].' | '.$value['hall']; ?></td></tr>
         <?php } ?>
         </tr> 
     </table>
   </div>

   <div id="1998" style="text-align:center;">
     <table class="table">
         <tr>
             <th scope="row">Names</th>
         </tr>
         <?php   while($value=$batch1998->fetch(PDO::FETCH_ASSOC)){?>
           <tr><td><?php echo  $value['name'].' | '.$value['dept'].' | '.$value['hall']; ?></td></tr>
         <?php } ?>
         </tr> 
     </table>
   </div>

 </div>

</div>
    
      <script>
          function show_1973(){
            document.getElementById('1973').style.display = "block";
            document.getElementById('1983').style.display = "none";
            document.getElementById('1998').style.display = "none";
           
            document.getElementById("1973_btn").style.color = "#D81B60";
            document.getElementById("1983_btn").style.color     = "black";
            document.getElementById("1998_btn").style.color  = "black";
            
          }
          function show_1983(){
            document.getElementById('1973').style.display = "none";
            document.getElementById('1983').style.display = "block";
            document.getElementById('1998').style.display = "none";
           
            document.getElementById("1973_btn").style.color = "black";
            document.getElementById("1983_btn").style.color     = "#D81B60";
            document.getElementById("1998_btn").style.color  = "black";
            
          }
          function show_1998(){
            document.getElementById('1973').style.display = "none";
            document.getElementById('1983').style.display = "none";
            document.getElementById('1998').style.display = "block";
            
            document.getElementById("1973_btn").style.color = "black";
            document.getElementById("1983_btn").style.color     = "black";
            document.getElementById("1998_btn").style.color  = "#D81B60";
           
          }

          show_1973();
        </script>
