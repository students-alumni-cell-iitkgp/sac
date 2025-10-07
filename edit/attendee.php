<style>
.tabs{
  padding: 5px;
  margin: 5px;
  cursor: pointer;
}
#1973_btn:hover{
<<<<<<< HEAD
  color: #ff0000 ;
}
#1983_btn:hover{
  color: #ff0000 ;
}
#1998_btn:hover{
  color: #ff0000 ;
}

</style>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Sac@123";
$dbname = "Registration";
$port = 4000;

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize counts
$no_of_people1973 = 0;
$no_of_people1983 = 0;
$no_of_people1998 = 0;
$no_of_peopleother = 0;

// Get counts per YOG
$sql = "SELECT yog, COUNT(*) as countGuest FROM AAM GROUP BY yog";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        switch ($row['yog']) {
            case '1973':
                $no_of_people1973 = $row['countGuest'];
                break;
            case '1983':
                $no_of_people1983 = $row['countGuest'];
                break;
            case '1998':
                $no_of_people1998 = $row['countGuest'];
                break;
            default:
                $no_of_peopleother += $row['countGuest'];
        }
    }
}

// helper function
function renderBatchTable($result, $includeYog=false) {
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>Name</th><th>Dept</th><th>Hall</th>';
    if ($includeYog) echo '<th>YOG</th>';
    echo '</tr></thead><tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['name']).'</td>';
        echo '<td>'.htmlspecialchars($row['dept']).'</td>';
        echo '<td>'.htmlspecialchars($row['hall']).'</td>';
        if ($includeYog) echo '<td>'.htmlspecialchars($row['yog']).'</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
}
?>
=======
  color: #D81B60;
}
#1983_btn:hover{
  color: #D81B60;
}
#1998_btn :hover{
  color: #D81B60;
}
#other_btn :hover{
  color: #D81B60;
}

</style>
<?php
      $path="connection.php";
      include 'adminPages/config.php';
      $batch1973=getBatch('1973');$no1973=getBatch('1973');
      $batch1983=getBatch('1983');$no1983=getBatch('1983');
      $batch1998=getBatch('1998');$no1998=getBatch('1998');
      $other=getBatch('other');$noother=getBatch('other');

      $no_of_people1973 = 0;
      $no_of_people1983 = 0;
      $no_of_people1998 = 0;
      $no_of_peopleother = 0;
     
      while($val=$no1973->fetch(PDO::FETCH_ASSOC)){ $no_of_people1973++;}
      while($val=$no1983->fetch(PDO::FETCH_ASSOC)){ $no_of_people1983++;}
      while($val=$no1998->fetch(PDO::FETCH_ASSOC)){ $no_of_people1998++;}
      while($val=$noother->fetch(PDO::FETCH_ASSOC)){ $no_of_peopleother++;}

    ?>
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7

<div class="card prof7">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Attendee</h6>
  </div>

  <div class="card-body pt-4 p-3">
<<<<<<< HEAD
    <div class="row tabs">
       <div class="col-3"><a id="1973_btn" onclick="showBatch('batch-1973')">1973<?php echo "(".$no_of_people1973.")" ?></a></div>
       <div class="col-3"><a id="1983_btn" onclick="showBatch('batch-1983')">1983<?php echo "(".$no_of_people1983.")" ?></a></div>
       <div class="col-3"><a id="1998_btn" onclick="showBatch('batch-1998')">1998<?php echo "(".$no_of_people1998.")" ?></a></div>
       <div class="col-3"><a id="other_btn" onclick="showBatch('batch-other')">Other Batches<?php echo "(".$no_of_peopleother.")" ?></a></div>
    </div>

    <!-- batch 1973 -->
    <div id="batch-1973" style="display:none; text-align:center;">
      <?php
        $sql = "SELECT name, dept, hall, yog FROM AAM WHERE yog = '1973'";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) renderBatchTable($res);
        else echo "<p>No records found for 1973.</p>";
      ?>
    </div>

    <!-- batch 1983 -->
    <div id="batch-1983" style="display:none; text-align:center;">
      <?php
        $sql = "SELECT name, dept, hall, yog FROM AAM WHERE yog = '1983'";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) renderBatchTable($res);
        else echo "<p>No records found for 1983.</p>";
      ?>
    </div>

    <!-- batch 1998 -->
    <div id="batch-1998" style="display:none; text-align:center;">
      <?php
        $sql = "SELECT name, dept, hall, yog FROM AAM WHERE yog = '1998'";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) renderBatchTable($res);
        else echo "<p>No records found for 1998.</p>";
      ?>
    </div>

    <!-- other batches -->
    <div id="batch-other" style="display:none; text-align:center;">
      <?php
        $sql = "SELECT name, dept, hall, yog FROM AAM WHERE yog NOT IN ('1973','1983','1998')";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) renderBatchTable($res, true);
        else echo "<p>No records found for Other batches.</p>";
      ?>
    </div>
  </div>
</div>

<script>
function showBatch(batchId) {
  // hide all first
  document.querySelectorAll("#batch-1973, #batch-1983, #batch-1998, #batch-other")
    .forEach(div => div.style.display = "none");
  // show the clicked one
  document.getElementById(batchId).style.display = "block";
}
</script>
=======
   <div class="row tabs">
     
       <div class="col-3"><a class="active" id = "1973_btn" onclick="show_1973()">1973<?php echo "(".$no_of_people1973.")" ?></a></div>
       <div class="col-3"><a                id = "1983_btn" onclick="show_1983()">1983<?php echo "(".$no_of_people1983.")" ?></a></div>
       <div class="col-3"><a                id = "1998_btn" onclick="show_1998()">1998<?php echo "(".$no_of_people1998.")" ?></a></div>
       <div class="col-3"><a                id = "other_btn" onclick="show_other()">Other Batches<?php echo "(".$no_of_peopleother.")" ?></a></div>
    
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

   <div id="other" style="text-align:center;">
     <table class="table">
         <tr>
             <th scope="row">Names</th>
         </tr>
         <?php   while($value=$other->fetch(PDO::FETCH_ASSOC)){?>
           <tr><td><?php echo  $value['name'].' | '.$value['dept'].' | '.$value['hall'].' | '.$value['yog']; ?></td></tr>
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
            document.getElementById('other').style.display = "none";
           
            document.getElementById("1973_btn").style.color = "#D81B60";
            document.getElementById("1983_btn").style.color     = "black";
            document.getElementById("1998_btn").style.color  = "black";
            document.getElementById("other_btn").style.color  = "black";
            
          }
          function show_1983(){
            document.getElementById('1973').style.display = "none";
            document.getElementById('1983').style.display = "block";
            document.getElementById('1998').style.display = "none";
            document.getElementById('other').style.display = "none";
           
            document.getElementById("1973_btn").style.color = "black";
            document.getElementById("1983_btn").style.color     = "#D81B60";
            document.getElementById("1998_btn").style.color  = "black";
            document.getElementById("other_btn").style.color  = "black";
            
          }
          function show_1998(){
            document.getElementById('1973').style.display = "none";
            document.getElementById('1983').style.display = "none";
            document.getElementById('1998').style.display = "block";
            document.getElementById('other').style.display = "none";
            
            document.getElementById("1973_btn").style.color = "black";
            document.getElementById("1983_btn").style.color     = "black";
            document.getElementById("1998_btn").style.color  = "#D81B60";
            document.getElementById("other_btn").style.color  = "black";
           
          }

          function show_other(){
            document.getElementById('1973').style.display = "none";
            document.getElementById('1983').style.display = "none";
            document.getElementById('1998').style.display = "none";
            document.getElementById('other').style.display = "block";
            
            document.getElementById("1973_btn").style.color = "black";
            document.getElementById("1983_btn").style.color     = "black";
            document.getElementById("1998_btn").style.color  = "black";
            document.getElementById("other_btn").style.color  = "#D81B60";
           
          }

          show_1973();
        </script>
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
