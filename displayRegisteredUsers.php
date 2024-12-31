<?php
session_start(); 
 if(!isset($_SESSION['email']))
 {
   
   header("Location: logout.html");
 }
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon">
    <title>SAC</title>


    <!-- CSS only -->
    <!-- Bootstrap 4.5.2 -->
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Pathway Font -->
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Source+Sans+Pro:400" rel="stylesheet">

    <!-- Bootstrap 4 Stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
        <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>



</head>


<body>
    <?php
      $path="connection.php";
      include 'adminPages/config.php';
      $batch1971=getBatch('1971');$no1971=getBatch('1971');
      $batch1972=getBatch('1972');$no1972=getBatch('1972');
      $no_of_people1971 = 0;$no_of_people1972 = 0;
      while($val=$no1971->fetch(PDO::FETCH_ASSOC)){ $no_of_people1971++;}
      while($val=$no1972->fetch(PDO::FETCH_ASSOC)){ $no_of_people1972++;}

      /***AAM batches */

      $batch1981=getBatch('1981');$no1981=getBatch('1981');
      $batch1982=getBatch('1982');$no1982=getBatch('1982');
      $batch1996=getBatch('1996');$no1996=getBatch('1996');
      $batch1997=getBatch('1997');$no1997=getBatch('1997');

      $no_of_people1981 = 0;
      $no_of_people1982 = 0;
      $no_of_people1996 = 0;
      $no_of_people1997 = 0;

      while($val=$no1981->fetch(PDO::FETCH_ASSOC)){ $no_of_people1981++;}
      while($val=$no1982->fetch(PDO::FETCH_ASSOC)){ $no_of_people1982++;}
      while($val=$no1996->fetch(PDO::FETCH_ASSOC)){ $no_of_people1996++;}
      while($val=$no1997->fetch(PDO::FETCH_ASSOC)){ $no_of_people1997++;}


    ?>

      <?php include 'dashboard_navbar.php'?>

  <div class="con">
    <div class="leftbox">
      <nav>
        <a id="profile" class="active" onclick="show_1971()">1971 <span style="color:red;"><?php echo "(".$no_of_people1971.")" ?></a>
        <a id="payment" onclick="show_1972()">1972 <span style="color:red;"><?php echo "(".$no_of_people1972.")" ?></span></a>

        <a id="payment" onclick="show_1981()">1981 <span style="color:red;"><?php echo "(".$no_of_people1981.")" ?></span></a>
        <a id="payment" onclick="show_1982()">1982 <span style="color:red;"><?php echo "(".$no_of_people1982.")" ?></span></a>
        <a id="payment" onclick="show_1996()">1996 <span style="color:red;"><?php echo "(".$no_of_people1996.")" ?></span></a>
        <a id="payment" onclick="show_1997()">1997 <span style="color:red;"><?php echo "(".$no_of_people1997.")" ?></span></a>
      </nav>
    </div>
    <div class="rightbox">
      <div class="col-8" style="background-color:white;">
        <div class="prof1" id="1971" style="text-align:center;">
          <table class="table">
              <tr>
                  <th scope="row">Name</th>
              </tr>
              <?php   while($value=$batch1971->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['Name']; ?></td></tr>
              <?php } ?>
              </tr>
              
          </table>
        </div>
        <div id="1972" style="text-align:center;">
          <table class="table">
              <tr>
                  <th scope="row">Name</th>
              </tr>
              <?php   while($value=$batch1972->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['Name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>

        <div id="1981" style="text-align:center;">
          <table class="table">
              <tr>
                  <th scope="row">Name</th>
              </tr>
              <?php   while($value=$batch1981->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['Name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>

        <div id="1982" style="text-align:center;">
          <table class="table">
              <tr>
                  <th scope="row">Name</th>
              </tr>
              <?php   while($value=$batch1982->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['Name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>

        <div id="1996" style="text-align:center;">
          <table class="table">
              <tr>
                  <th scope="row">Name</th>
              </tr>
              <?php   while($value=$batch1996->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['Name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>

        <div id="1997" style="text-align:center;">
          <table class="table">
              <tr>
                  <th scope="row">Name</th>
              </tr>
              <?php   while($value=$batch1997->fetch(PDO::FETCH_ASSOC)){?>
                <tr><td><?php echo  $value['Name']; ?></td></tr>
              <?php } ?>
          </table>
        </div>

        </div>
      </div>
    </div>
  </div>
        
      <script>
          function show_1971(){
            document.getElementById('1971').style.display = "block";
            document.getElementById('1972').style.display = "none";
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";

           /* document.getElementById("1971_btn").style.color = "#4169e1";
            document.getElementById("1972_btn").style.color     = "black";*/
          }
          function show_1972(){
            document.getElementById('1971').style.display = "none";
            document.getElementById('1972').style.display = "block";
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";
            /*document.getElementById("1971_btn").style.color = "black";
            document.getElementById("1972_btn").style.color     = "#4169e1";*/
          }

          function show_1981(){
            document.getElementById('1971').style.display = "none";
            document.getElementById('1972').style.display = "none";
            document.getElementById('1981').style.display = "block";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";
          }
          function show_1982(){
            document.getElementById('1971').style.display = "none";
            document.getElementById('1972').style.display = "none";
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "block";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";
          }
          function show_1996(){
            document.getElementById('1971').style.display = "none";
            document.getElementById('1972').style.display = "none";
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "block";
            document.getElementById('1997').style.display = "none";
          }
          function show_1997(){
            document.getElementById('1971').style.display = "none";
            document.getElementById('1972').style.display = "none";
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "block";
          }
          show_1971();
        </script>
    
</body>
