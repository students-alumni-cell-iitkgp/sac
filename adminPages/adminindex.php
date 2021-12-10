 

<!-- i have used fetch(PDO::FETCH_ASSOC) instead i hae used fetch() in while loop for view.php -->


<?php   
    $title="index"; 
    include 'includeAdmin/header.php'; 
    include 'includeAdmin/authUser.php';
    //include 'includeAdmin/authUser.php';
    $path="../connection.php"; 
    include 'config.php';
    
?>
    <form class="mt-5" method="post" action="success.php">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name"  name="name" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="accompaniments" class="form-label">No. of accompaniments</label>
            <input type="text" class="form-control" id="accompaniments" name="accompaniments">
        </div>
        <div class="mb-3">
            <label for="payment" class="form-label">Payment Status</label>
            <input type="text" class="form-control" id="payment" name="payment" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="payment" class="form-label">YOG</label>
            <input type="text" class="form-control" id="yog" name="yog" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="vaccination" class="form-label">Vaccination Status</label>
            <input type="text" class="form-control" id="vaccination" name="vaccination" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="gh" class="form-label">Guest House</label>
            <input type="text" class="form-control" id="gh" name="gh" aria-describedby="emailHelp">
            
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
   
<?php  include 'includeAdmin/footer.php'; ?>

