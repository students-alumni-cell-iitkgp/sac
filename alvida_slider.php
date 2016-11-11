<html>
<head>
	<title>Gallery</title>
<style type="text/css">
	.normal{
		margin: 10px;
	}
	.long{
		width: 300px;
	}
	@media only screen and (max-width: 1350px) {
   	.normal{
    width: 25vw;
    padding-right: 10px;
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
			<img class="materialboxed normal long" src="img/Alvida/three.jpg" height="420" >
		</div>
		<div class="col l6 m6 s12">
			<img class="materialboxed normal bigg" src="img/Alvida/six.jpg" height="420">
		</div>
		<div class="col l3 m6 s12">
			<img  class="materialboxed normal long" src="img/Alvida/five.jpg" height="420" />
		</div>
		<div class="col l6 m6 s12">
			<img class="materialboxed normal bigg" src="img/Alvida/eight.jpg" height="420" >
		</div>
		<div class="col l3 m6 s12">
			<img class="materialboxed normal" src="img/Alvida/seven.jpg" height="200">
		</div>
		<div class="col l3 m6 s12">
			<img  class="materialboxed normal" src="img/Alvida/four.jpg" height="200" />
		</div>
		   <div class="col l3 m6 s12">
			   <img class="materialboxed normal" src="img/Alvida/nine.jpg" height="200" >
		   </div>
		   <div class="col l3 m6 s12">
			   <img class="materialboxed normal" src="img/Alvida/ten.jpg" height="200">
		   </div>
		   <div class="col l3 m6 s12">
			   <img  class="materialboxed normal" src="img/Alvida/eleven.jpg" height="200" />
		   </div>
		<div class="col l3 m6 s12">
			<img class="materialboxed normal" src="img/Alvida/twelve.jpg" height="200" >
		</div>
		<div class="col l3 m6 s12">
			<img class="materialboxed normal" src="img/Alvida/thirteen.jpg" height="200">
		</div>
		<div class="col l3 m6 s12">
			<img  class="materialboxed normal" src="img/Alvida/fourteen.jpg" height="200" />
		</div>

	</div>

</center>

<script type="text/javascript">
	$(document).ready(function(){
		$('.materialboxed').materialbox();
	});
</script>

</body>
</html>
