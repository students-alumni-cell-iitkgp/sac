<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>SAC</title>


    <!-- CSS only -->
    <!-- Bootstrap 4.5.2 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Pathway Font -->
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Source+Sans+Pro:400" rel="stylesheet">

    <!-- Bootstrap 4 Stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>



</head>


<body>
    <?php include 'navbar.php'?>
    <?php
      include 'adminPages/config.php';
      $batch1981=getBatch('1981');$no1981=getBatch('1981');
      $batch1982=getBatch('1982');$no1982=getBatch('1982');
      $batch1996=getBatch('1996');$no1996=getBatch('1996');
      $batch1997=getBatch('1997');$no1997=getBatch('1997');
      $no_of_people1981 = 0;$no_of_people1982 = 0;$no_of_people1996 = 0;$no_of_people1997 = 0;
      while($val=$no1981->fetch(PDO::FETCH_ASSOC)){ $no_of_people1981++;}
      while($val=$no1982->fetch(PDO::FETCH_ASSOC)){ $no_of_people1982++;}
      while($val=$no1996->fetch(PDO::FETCH_ASSOC)){ $no_of_people1996++;}
      while($val=$no1997->fetch(PDO::FETCH_ASSOC)){ $no_of_people1997++;}
    
    ?>
      <div class="container" style="margin-top:2.5vw !important;">
        <ul class="nav justify-content-center" >
          <li class="nav-item">
            <button id="1981_btn" class="btn nav-link active" aria-current="page" onclick="show_1981()">1981 <span style="color:red;"><?php echo "(".$no_of_people1981.")" ?></span></button>
          </li>
          <li class="nav-item">
            <button id="1982_btn" class="btn nav-link" onclick="show_1982()">1982 <span style="color:red;"><?php echo "(".$no_of_people1982.")" ?></span></button>
          </li>
          <li class="nav-item">
            <button id="1996_btn" class="btn nav-link " onclick="show_1996()">1996 <span style="color:red;"><?php echo "(".$no_of_people1996.")" ?></span></button>
          </li>
          <li class="nav-item">
            <button id="1997_btn" class="btn nav-link " onclick="show_1997()">1997 <span style="color:red;"><?php echo "(".$no_of_people1997.")" ?></span></button>
          </li>
        </ul>
        <div id="1981" style="margin-top: 1vw !important;">
          <table class="table ">
              <tr>
                  <th>Name</th>
              </tr>
              <?php   while($value=$batch1981->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['name']; ?></td></tr>
              <?php } ?>
              </tr>
              
          </table>
        </div>
        <div id="1982" style="margin-top: 1vw !important;">
          <table class="table ">
              <tr>
                  <th>Name</th>
              </tr>
              <?php   while($value=$batch1982->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>
        <div id="1996" style="margin-top: 1vw !important;">
          <table class="table ">
              <tr>
                  <th>Name</th>
              </tr>
              <?php   while($value=$batch1996->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>
        <div id="1997" style="margin-top: 1vw !important;">
          <table class="table ">
              <tr>
                  <!-- <th>S.No</th> -->
                  <th>Name</th>
              </tr>
              <?php   while($value=$batch1997->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>
        
      </div>
      <script>
          function show_1981(){
            document.getElementById('1981').style.display = "block";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";
            document.getElementById('1981_btn').className = "btn btn-dark nav-link";
            document.getElementById('1982_btn').className = "btn btn-light nav-link";
            document.getElementById('1996_btn').className = "btn btn-light nav-link";
            document.getElementById('1997_btn').className = "btn btn-light nav-link";
          }
          function show_1982(){
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "block";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";
            document.getElementById('1981_btn').className = "btn btn-light nav-link";
            document.getElementById('1982_btn').className = "btn btn-dark nav-link";
            document.getElementById('1996_btn').className = "btn btn-light nav-link";
            document.getElementById('1997_btn').className = "btn btn-light nav-link";
          }
          function show_1996(){
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "block";
            document.getElementById('1997').style.display = "none";
            document.getElementById('1981_btn').className = "btn btn-light nav-link";
            document.getElementById('1982_btn').className = "btn btn-light nav-link";
            document.getElementById('1996_btn').className = "btn btn-dark nav-link";
            document.getElementById('1997_btn').className = "btn btn-light nav-link";
          }
          function show_1997(){
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "block";
            document.getElementById('1981_btn').className = "btn btn-light nav-link";
            document.getElementById('1982_btn').className = "btn btn-light nav-link";
            document.getElementById('1996_btn').className = "btn btn-light nav-link";
            document.getElementById('1997_btn').className = "btn btn-dark nav-link";
          }

          show_1981();
        </script>
    
</body>
<?php include 'footer.php' ?>
