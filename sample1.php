


<?php
require 'connection.php';
ob_start();
session_start();
if ($_SESSION["email"] == "") {
  header('Location: aam.php');
  exit();
}
$email=$_SESSION['email'];
$query1=" SELECT * FROM travel WHERE email= '$email' ";
$query3=" SELECT * FROM  accommodation WHERE email= '$email' ";
/* query to get graduating year */
/*till here*/
$query_run1=$connection->query($query1);
$query_run2=$connection->query($query3);
if (($query_run1)&&($query_run2)) {
  if(($query_run1->num_rows > 0)&&($query_run2->num_rows > 0)){
    $query2 = mysqli_fetch_assoc($query_run1);
    $query4 = mysqli_fetch_assoc($query_run2);
  }
}
?>
<?php
$query="SELECT * FROM users WHERE email='".$_SESSION["email"]."'";
if( $query_run = mysqli_query($connection, $query) ){
  $row = mysqli_fetch_assoc($query_run);
  $name = $row['name'];
}
?>
<html>
<head>
  <title>Home</title>
  <link rel="icon" href="img/meet_14.png">
  <link rel="stylesheet" href="css/materialize.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
  <?php include 'navbar.php';?>
  <style type="text/css">
    body {
    }
    #intro{
      line-height: 40px;
    }
    .card-panel{
      width: 100% !important;
    }
    .headl{
      background-color: #666;
      color: white;
      border-radius: 5px;
      border-color: black;
    }
    .input{
      background-color: silver;
      text-align: center;
      border-radius: 5px;
      border-color: black;
      display: inline-block;
    }
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 55;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      overflow-y: scroll;
      transition: 0.5s;
      padding-top: 60px;
      text-align:center;
    }
    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s
    }
    .sidenav a:hover{
      color: #f1f1f1;
    }
    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }
    #ajax{
      width: 60% !important;
      background-color: #fff;
      margin-left: 20%;
      padding: 50px;
      margin-bottom: 50px;
      z-index: 50000;
    }
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
      #ajax{
        width: 90%;
        margin:5%;
      }
    }
    @media screen and (min-height: 992px) {
      #button{
        display: none;
      }
    }
  </style>
  <body>

  
   <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfd1MHuFCIC5r1Kyib0vEyWqExWptGitIkmZcCLW3VJYmJkkw/viewform?embedded=true" width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
    
    
       
<?php include 'footer.php';?>

</body>
</html>
