<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Students' Alumni Cell | Sponsors</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js"></script>
  <link rel="stylesheet" href="css/sponsors.css">
</head>
<body>

<?php include 'navbar.php';?>
    <?php include 'register_spons.php'; ?>
    <br>
    <br><br>
<div class="container">
   <div class="s-1 row">
   <div class="col-sm-12" align="center"><h2> Sponsors </h2><hr> </div> </div>
   <div class="s-1 row">
     <div class="col-lg-6 col-sm-12" align="center" style="margin-bottom:20px;">
       <a href="https://www.iocl.com/" target="_blank">
         <img src="img/spons/2012/1.webp" width="200px" height="150px">
       </a>
     </div>

     <div class="col-lg-6 col-sm-12" align="center"style="margin-bottom:20px;">
       <a href="http://www.infosys.com/pages/index.aspx" target="_blank">
         <img src="img/spons/2012/2.webp" width="250px"height="150px"/>
       </a>
     </div> </div>
     <div class="s-3 row">
     <div class="col-sm-12" align="center">
       <a href="http://www.mallcomindia.com/site/index.php" target="_blank">
         <img src="img/spons/2012/3.webp" width="200px"height="150px"/>
       </a>
     </div>
   </div> </div>
   <br><br>
   <?php include 'footer.php';?>
   <!-- <?php include 'preloader.php' ?> -->
   	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
               integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
               </script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
               integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
               </script>
<script type="text/javascript">
gsap.registerPlugin(ScrollTrigger);

for (var i = 1; i <4; i++) {
  gsap.from(".s-"+i+" h2",{scrollTrigger:".s-"+i+" h2",x:-300, duration: 1.5,opacity:0.2});
  gsap.from(".s-"+i+" .col-sm-12",{scrollTrigger:".s-"+i+" .col-sm-12",x:-300, duration: 1.5,opacity:0.2});

}
</script>
</body>
</html>
