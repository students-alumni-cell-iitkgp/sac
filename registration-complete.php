<?php session_start(); ?>
<html>

<head>
<link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="_wrapper">
  <?php include "navbar.php"; ?>
  <div class="container-fluid">
    <div class="z-depth-2">
      <div class="container">
        <div class="container-fluid">
          <div align="center">
            <h2>Successfully registered!</h2>
          </div>
          <p>
            You have successfully registered for the 13th Annual Alumni Meet. We will send you an email when you need to come back here!
          </p>
          <div class="col l6">
            <a href="./login.php" class="btn btn-success btn-block">Click here to login</a>
          </div>
          <div class="col l6">
            <a href="./index.php" class="btn btn-success btn-block">Visit Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

</body>

</html>
