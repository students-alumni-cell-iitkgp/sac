<?php 
    $title='view records';
    include 'includeAdmin/header.php';
    include 'includeAdmin/authUser.php';
    $path="../connection.php";
    include 'config.php';
    echo getcwd();
    $results=view();
    $copy=view();
    $total=0;
    if(!$results) echo "error retrieving data from mysql";
    else{
        while($copy->fetch(PDO::FETCH_ASSOC)){
            $total++;
        }
    }
    // if($results) foreach($results as $val){print_r("<br/>");print_r($val);} ;
?> 
<style>
.total{
   
    width:100%;
    height:100px;
    display:flex;
    justify-content: center;
    align-items:center;
}

</style>

<div class="total text-center">
Total no of registrations are: &ensp; <h2><?php echo $total ;?></h2>
</div>
<table class="table ">
<tr>
    <!-- <th>S.No</th> -->
    <th>Name</th>
    <th>Email</th>
    <th>No of accompaniments</th>
    <th>Payment status</th>
    <th>Vaccination status</th>
    <th>Guest House</th>
    <th>boolean</th>
    <th>yog</th>
</tr>  
<!-- we were not echoing , we could have used for each too, td ,tr dont messup with them -->
<?php while($value=$results->fetch(PDO::FETCH_ASSOC)){ ?>
<!-- <?//php foreach($results->fetchAll() as $value){ ?> -->
<!-- <?//php foreach($results->fetchAll(PDO::FETCH_ASSOC) as $value){ ?> -->
<tr>
    
    <td><?php echo $value['Name']; ?></td>
    <td><?php echo $value['email']; ?></td>
    <td><?php echo $value['accompaniments']; ?></td>
    <td><?php echo $value['reciept']; ?></td>
    <td><?php echo $value['status'] ;?></td>
    <td><?php echo $value['gh'] ;?></td>
    <td><?php echo $value['boolean'] ;?></td>
    <td><?php echo $value['yog'] ;?></td>
    <td>
        <!-- <a href="view_record.php?id=<?php echo $value['id']; ?>" class="btn btn-primary btn-md" style="text-decoration:none;">View Record</a> -->
        <!-- <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-info btn-md" style="text-decoration:none;">Edit</a>  -->
        <a  href="change_display.php?email=<?php echo $value['email']; ?>&boolean=<?php echo $value['boolean']; ?>" class="btn btn-success btn-md" style="text-decoration:none;">Change_display</a> 
        <!-- <a  href="change_display.php" class="btn btn-success btn-md" style="text-decoration:none;">get batches</a>  -->
        <!--  if we dont use return then it will delete even if we choose cancel -->
    </td>

</tr>
<?php }?>
</table>


<?php include 'includeAdmin/footer.php' ?>