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
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>SAC</title>


    <!-- CSS only -->
    <!-- Bootstrap 4.5.2 -->
    <link rel="stylesheet" href="css/loginpage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Pathway Font -->
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Source+Sans+Pro:400" rel="stylesheet">

    <!-- Bootstrap 4 Stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/loginpage.css">
        <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>



</head>

<style>
body{
    background-image: url("img/form-bg.jpeg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }

  .dropdown-menu a:hover{
        color:#4169e1;
    }
  .section2{
    display:block;
    width:100%;
    justify-content:center;
    /* margin-bottom:1rem; */

  }
  .navbar-brand img{
    height: 4.5rem;
    width: 6rem;
  }
  .mobilemode{
        display:none;
        width:100%;
  }
  .section2 .row{
   
    margin-top:25px;
    padding:0px;
    z-index: -2;
    display:flex;
    flex-flow:row nowrap;
    justify-content :center;
  }
  .section2 .bord{
      margin-left:20px;
  }

  .section2 button:hover{
    color: #4169e1;
  }
  .bord .d{
    color: #4169e1 !important;
    margin-right:13px;
    
  }
  .textS h2 {
    color: #4169e1;
    font-size: 280%;
  }
   
  .table{
      --bs-table-accent-bg:white;
      --bs-table-striped-bg:white;
      margin-bottom:0;
      padding-bottom:30px;
    }
    th{
      color :  #4169e1 !important;
    }
    .wrappers{
      max-width: 75%;
      margin-bottom:4%;   
      background-color: rgba(255, 255, 255, 0.93);
      
      margin:0 auto;
    }
    .prof6 p{
      color: black;
      font-family: 'Raleway', sans-serif;
      font-weight:500;
    }
    .accordion{
      width:100%;
    }
    @media only screen and (max-width: 900px) {
      .section2{
        display:none;
      }
      .mobilemode{
        display:block;
      }
      .wrappers{
        margin-top:0;
        max-width: 101%;
        width:80%;
        /* margin-bottom:2%;    */
        background-color: rgb(229,228,226);
        padding:0;
      }
    }
    @media only screen and (max-width: 450px) {
      .section2{
        display:none;
      }
      .mobilemode{
        display:block;
      }
      .wrappers{
        margin-top:0;
        max-width: 101%;
        width:98%;
        /* margin-bottom:2%;    */
        background-color: rgb(229,228,226);
        padding:0;
      }
    }
    
    
</style>


<body>
    <?php
      $path="connection.php";
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
      <div class="wrappers section2" >
        <?php include 'dashboard_navbar.php'?>
        <div class="container-fluid" style="margin-top:2.5vw !important;">
          <div class="row">
            <div class="col-md-3">
              <div class="bord" style = "background-color:#fff; width:103%;padding-bottom:10px;margin-left:-10px;">
                <div class="bttons"><button class="my-1" id="1981_btn" onclick="show_1981()">1981 <span style="color:red;"><?php echo "(".$no_of_people1981.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="1982_btn" onclick="show_1982()">1982 <span style="color:red;"><?php echo "(".$no_of_people1982.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="1996_btn" onclick="show_1996()">1996 <span style="color:red;"><?php echo "(".$no_of_people1996.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="1997_btn" onclick="show_1997()">1997 <span style="color:red;"><?php echo "(".$no_of_people1997.")" ?></span></button></div>
              </div>
            </div>
            <div class="col-8" style="background-color:white;">
              <div class="prof1" id="1981" style="text-align:center;">
                <table class="table">
                    <tr>
                        <th scope="row">Name</th>
                    </tr>
                    <?php   while($value=$batch1981->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['Name']; ?></td></tr>
                    <?php } ?>
                    </tr>
                    
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
              <div id="1996" style="text-align:center; ">
                <table class="table">
                    <tr>
                        <th scope="row">Name</th>
                    </tr>
                    <?php   while($value=$batch1996->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['Name']; ?></td></tr>
                    <?php } ?>
                </table>
              </div>
              <div id="1997" style="text-align:center; ">
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
          function show_1981(){
            document.getElementById('1981').style.display = "block";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";
            document.getElementById("1981_btn").style.color = "#4169e1";
            document.getElementById("1982_btn").style.color     = "black";
            document.getElementById("1996_btn").style.color  = "black";
            document.getElementById("1997_btn").style.color    = "black";
          }
          function show_1982(){
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "block";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "none";
            document.getElementById("1981_btn").style.color = "black";
            document.getElementById("1982_btn").style.color     = "#4169e1";
            document.getElementById("1996_btn").style.color  = "black";
            document.getElementById("1997_btn").style.color    = "black";
          }
          function show_1996(){
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "block";
            document.getElementById('1997').style.display = "none";
            document.getElementById("1981_btn").style.color = "black";
            document.getElementById("1982_btn").style.color     = "black";
            document.getElementById("1996_btn").style.color  = "#4169e1";
            document.getElementById("1997_btn").style.color    = "black";
          }
          function show_1997(){
            document.getElementById('1981').style.display = "none";
            document.getElementById('1982').style.display = "none";
            document.getElementById('1996').style.display = "none";
            document.getElementById('1997').style.display = "block";
            document.getElementById("1981_btn").style.color = "black";
            document.getElementById("1982_btn").style.color     = "black";
            document.getElementById("1996_btn").style.color  = "black";
            document.getElementById("1997_btn").style.color    = "#4169e1";
          }

          show_1981();
        </script>
    
</body>
<?php include 'footer.php' ?>
