<html>
<head>
<link rel="icon" href="img/meet_14.png">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/materialize.min.css">
<title>Gallery</title>
<style type="text/css">
	.normal{
		margin: 10px;
	}
	@media only screen and (max-width: 1350px) {
   	.normal{
    width: 25vw;
  }.video-container{
    width: 25vw;
    margin-left: 20px;
    height: 400px;
  }
    .bigg {
    	width: 48vw !important;
    	padding-right: 0;
    }
}
	@media only screen and (max-width: 992px) {
    .normal {
       height: 200px;
       width: 45vw;
    }
}
	@media only screen and (max-width: 600px) {
    .normal {
       height: 200px;
       width: 350px;
       margin:10px;
    }
    .bigg{
       height: 200px;
       width: 350px !important;
       margin:10px;
       padding-right: 10;
    }
}
</style>
</head>
<body> <center>
<div class="row">
<div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/two.jpg" height="200px" >
        <img class="materialboxed normal" src="img/gallery/three.JPG" height="200px" style="margin-top: 20px;">
</div>
<div class="col l6 m6 s12">
        <div class="video-container normal bigg" style="height:420px; padding-left: 20px;  ">
       <iframe class="frame" src="https://www.youtube.com/embed/TvkgR5gS2j4" frameborder="0" allowfullscreen ></iframe>
      </div>
    </div>
    <div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/five.JPG" height="200px"/> 
</div> 
<div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/six.JPG" height="200px" />
</div>
<div class="col l6 m6 s12">
        <img class="materialboxed normal bigg" src="img/gallery/seven.JPG" height="420px"/>
    </div>
    <div class="col l3 m6 s12">
        <img  class="materialboxed normal" src="img/gallery/eight.JPG" height="200px"/>
    </div>
    <div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/nine.JPG" height="200px"/>
   </div> 
   <div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/ten.JPG" height="200px"/> 
    </div>    
   <div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/eleven.JPG" height="200px"/>
   </div>
   <div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/twelve.JPG" height="200px"/>
   </div>
   <div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/thirteen.JPG" height="200px"/>
   </div> 
   <div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/forteen.jpg" height="200px"/>
</div>
<div class="col l3 m6 s12">
        <img class="materialboxed normal" src="img/gallery/fifteen.JPG" height="200px"/>
   </div>
   <div class="col l6 m6 s12">
        <img class="materialboxed normal bigg" src="img/gallery/sixteen.JPG" height="420px"/>
        </div> 
        <div class="col l6 m6 s12">
        <img class="materialboxed normal bigg" src="img/gallery/one.JPG" height="420px">
        </div> </div>
        </center>

<script type="text/javascript">
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>

</body>
</html>   