<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Add fancyBox -->
<link rel="stylesheet" href="css/fancybox.css" type="text/css" media="screen" />

<style type="text/css">
img
{
    margin-left: 1px;

    margin-bottom: 1px;
}

img.two
{
    width: 200px;
    height: 150px;
}

img.four
{
    width: 410px;
    height: 300px;
}

div.row
{
    margin-bottom: 5px;
}
.col-lg-2{height: 150px; width: 210px;}
.col-lg-4{height:300px;width:420px;}


</style>
<link rel="stylesheet" href="css/animate.css">
    <script src="js/wow.js" ></script>
     <script>
              new WOW().init();
              </script>
</head>
<body style="background:url('img/aadhavinay.jpg')">
<div class="container-fluid">
<div class="wow fadeIn">
<div class="row">
    
    <div class="col-lg-6">
        <div class="col-lg-2">
              <a id="single_2" href="images/1.JPG"><img class="two" src="images/1.JPG"></a><br>
               <a id="single_2" href="images/50.JPG">
                <img class="two" src="images/50.JPG"></a>
        </div>
        <div class="col-lg-2">
            <a id="single_2" href="images/2.jpg"><img class="two" src="images/2.jpg"></a><br>
                        <a id="single_2" href="images/60.JPG"><img class="two" src="images/60.JPG"></a>

        </div>
        <div class="col-lg-2">
            <a id="single_2" href="images/7.JPG"><img class="two" src="images/7.JPG"></a><br>
                        <a id="single_2" href="images/85.JPG"><img class="two" src="images/85.JPG"></a>

        </div>
    </div>

    
    <div class="col-lg-6">
        <div class="col-lg-4">
            <a id="single_2" href="images/44.JPG">
            <img class="four" src="images/44.JPG">
        </a>
        </div>
        <div class="col-lg-2">
            <a id="single_2" href="images/9.JPG">
                <img class="two" src="images/9.JPG"></a>
        <br>
            <a id="single_2" href="images/35.JPG"><img class="two" src="images/35.JPG"></a>
        </div>
    </div>
</div>
<div class="row">
   
    <div class="col-lg-6">
        <div class="col-lg-2">
            <a id="single_2" href="images/63.JPG"><img class="two" src="images/63.JPG"></a>
            <br>
            <a id="single_2" href="images/57.JPG"><img class="two" src="images/57.JPG"></a>
        </div>

        <div class="col-lg-4">
            <a id="single_2" href="images/18.JPG">
            <img class="four" src="images/18.JPG">
        </a>
        </div>
    </div>
   
    <div class="col-lg-6">
        <div class="col-lg-2">
            <a id="single_2" href="images/66.JPG"><img class="two" src="images/66.JPG"></a><br>
                        <a id="single_2" href="images/43.JPG"><img class="two" src="images/43.JPG"></a>

        </div>
        <div class="col-lg-2">
            <a id="single_2" href="images/22.JPG"><img class="two" src="images/22.JPG"></a><br>
                        <a id="single_2" href="images/31.JPG"><img class="two" src="images/31.JPG"></a>

        </div>
        <div class="col-lg-2">
            <a id="single_2" href="images/15.JPG"><img class="two" src="images/15.JPG"></a><br>
            <a id="single_2" href="images/46.JPG">
            <img class="two" src="images/46.JPG">
        </a>
        </div>
    </div>
</div>

</div>

</div>



<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript" src="js/fancybox.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();

        $("#single_2").fancybox({
        openEffect  : 'elastic',
        closeEffect : 'elastic',

        helpers : {
            title : {
                type : 'inside'
            }
        }
    });
    });
</script>
</body>
