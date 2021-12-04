<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd"
            });
        } );
    </script>
    <title><?php $title ?></title>
</head>
<body>
  
    <div class="container"> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav me-auto">
        <a class="nav-link active" aria-current="page" href="adminindex.php">Home </a>
        
        <a class="nav-link" href="view.php">View Records</a>
      </div>
      <div class="navbar-nav ms-auto">
        <?php if(!($_SESSION['userid'])){ ?>
          <a class="nav-link active" href="adminlogin.php">login</a>
        <?php }else{ ?>
          <a class="nav-link active" href="logout.php">logout</a>
        <?php } ?>
        
      </div>

      </ul>
    </div>
  </div>
</nav>