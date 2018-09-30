<html>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  	<title>Students Alumni Cell &middot; IIT Kharagpur</title>
  	<link rel="icon" href="img/meet_14.png">
  	
  	<link rel="stylesheet" href="css/materialize.min.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<script src="js/materialize.min.js"></script>

   	
   	<style> 
    	ul.indicators{z-index: 3;}
    	.slider .indicators .indicator-item{ height: 10px; width: 50px; border-radius: 0px; margin: 5px 12px; background-color: #a4a9b2; }
    	.slider .indicators .indicator-item.active{ background-color: #717375; }
    	@media only screen and (min-width: 768px) {
     		.about {
       		padding: 6px 100px;
     		}
     		.slider .slides li #img1 {
     			background-size: 80% 100%;
      			background-color: #FCFBF9;
      			background-repeat: no-repeat;
      			background-position: center;
    		}
  		}
  		@media only screen and (max-width: 414px){
   			.about{
     			padding-left: .5em;
   			}
 		}
 		@media only screen and (max-width: 995px){
   			#fbplug{
    			display: none;
  			}
		}
		@media (max-width: 767px){
  			.eventscol{
    			display: none;
  			}
  			.wwd{
    			margin-top: -120%;
  			}
		}
		.carousel .carousel-item{
 			width:350px;
  			height:350px;
  			opacity: 1 !important;
		}
		#clockdiv{
    		color: #333;
    		display: inline-block;
    		text-align: center;
    		font-weight: 900;
    		font-size:22;
    		width:100%;
		}
		#clockdiv > div{
   			width:23%;
    		border-radius: 3px;
    		background-color: #e4e4e2;
    		padding-bottom: 8px;
    		display: inline-block;
		}
		#clockdiv div > span{
    		padding: 8px;
    		border-radius: 3px;
    		background-color: #e4e4e2;
    		display: inline-block;
		}
		.smalltext{
    		font-size: 13;
		}
		#mholder {
   			position: absolute;
    		overflow: hidden;
		}
		.marqueeElement {
    		border-bottom: 1px solid;
    		border-bottom-color:  rgb(221,221,221);
    		border-top: 1px solid;
    		border-top-color: rgb(221,221,221);    
		}
	</style>

	<script type="text/javascript">
    	var deadline = new Date("jan 11, 2019 12:00:00").getTime();
 
    	var x = setInterval(function() {
     
    	var now = new Date().getTime();
    	var t = deadline - now;
    	var days = Math.floor(t / (1000 * 60 * 60 * 24));
    	var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
    	var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
    	var seconds = Math.floor((t % (1000 * 60)) / 1000);
    	document.getElementById("day").innerHTML =days ;
    	document.getElementById("hour").innerHTML =hours;
    	document.getElementById("minute").innerHTML = minutes; 
    	document.getElementById("second").innerHTML =seconds; 
    	if (t < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "TIME UP";
            document.getElementById("day").innerHTML ='0';
            document.getElementById("hour").innerHTML ='0';
            document.getElementById("minute").innerHTML ='0' ; 
            document.getElementById("second").innerHTML = '0'; }
    	}, 1000);  
  	</script>

</head>
<body>
 	<div id="fb-root"></div>

	<script>
		(function(d, s, id) {
  			var js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=1066517953466827";
  			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>	
 	<script>
   		$(document).ready(function(){
   		if ($(window).width()>992) {
    		(function($){ $('#logo').show();
      		var $navbar= $('#nav'),
      		y_pos =$navbar.offset().top,
      		height = $navbar.height();
      		$('#logo').hide();$navbar.addClass("navbar-fixed");$('.brand-logo').show(); $('.hide-on-med-and-down').addClass('right'); 
 			})(jQuery, undefined);
 		}
    	else{$('#logo').remove(); $('.brand-logo').show();
    		$('#nav').addClass("navbar-fixed")}
    		$('.dropdown-button').dropdown({
      		inDuration: 300,
      		outDuration: 225,
       		constrain_width: false, 
      		hover: true, // Activate on hover
      		gutter: 0, // Spacing from edge
      		belowOrigin: true, // Displays dropdown below the button
      		alignment: 'left' // Displays dropdown with edge aligned to the left of button
    	});
  		});
	</script>


	<style> 
		@media only screen and (max-width: 992px){
    		nav .brand-logo {
      			left: 87%;
      			-webkit-transform: translateX(-50%);
    		}
    		#switch{
      			display: none;
    		}
  		}
 
		@media only screen and (max-width: 600px){
    		nav .brand-logo {
      			top: -10px;
      			left:77%;
    		}
  		}
 		@media only screen and (max-width: 400px){
    		nav .brand-logo {
      			top: -10px;
      			left:75%;
    		}
  		}
  		@media only screen and (max-width: 330px){
    		nav .brand-logo {
      			top: -10px; 
      			left:62%;
    		}
  		}
		.dropdown-content li {
  			text-align: center !important;
		}
 	</style>

	<div class="row" id="logo" style="background-color: white; margin-bottom: 0px; display: none;">
		<div class="col l12 m12 s12 center-align"><img style=" width:200px;" src="img/logo/sac_logo.png"></div>
    </div>

    <!-- Nav Bar -->
	<div  class="white" id="nav" style="margin-top: 0px;">
  		<ul id="events" class="dropdown-content" style="min-width: 200px;">
    		<li><a href="aam.php">Annual Alumni Meet</a></li>
    		<li><a href="homecoming.php">Homecoming</a></li>
    		<li><a href="sam.php">Student Alumni Meet</a></li>
    		<li><a href="phonathon.php">Phonathon</a></li>
    		<li><a href="alumnitalks.php">Alumni Talks</a></li>
    		<li><a href="leadershipsummit.php">Leadership Summit</a></li>
    		<li><a href="alvida.php">Alvida</a></li>
  		</ul>
  		<ul id="initiatives" class="dropdown-content" style="min-width: 200px;">
    		<li><a href="mentorship.php">Mentorship Programme</a></li>
    		<li><a href="imprint.php">My Imprint</a></li>
    		<li><a href="sparc.php">SPARC</a></li>
    		<li><a href="acap.php">ACAP</a></li>
    		<li><a href="https://medium.com/@studentsalumnicell.iitkgp" target="_blank">Alumni Blog</a></li>
  		</ul>
  		<ul id="publications" class="dropdown-content" style="min-width: 200px;">
    		<li><a href="yearbook.php">Yearbook</a></li>
    		<li><a href="yoy.php">Yearnings of Yore</a></li>
    		<li><a href="temposhout_final_6.pdf" target="_blank">Tempo Shout</a></li>
  		</ul>
  		<ul id="sponsors" class="dropdown-content" style="min-width: 200px;">
    		<li><a href="sponsors2018.php">2018</a></li>
    		<li><a href="sponsors2017.php">2017</a></li>
    		<li><a href="sponsors2016.php">2016</a></li>
    		<li><a href="sponsors2015.php">2015</a></li>
    		<li><a href="sponsors2014.php">2014</a></li>
    		<li><a href="sponsors2013.php">2013</a></li>
    		<li><a href="sponsors2012.php">2012</a></li>
  		</ul>
  		<nav>
    		<div class="nav-wrapper white">
      			<a href="index.php" class="brand-logo" style="display: none;"><img src="img/logo/sac_logo.png" width="180" height="70"></a>
      			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				
				<div class="row">
					<ul class="hide-on-med-and-down _textcolor center-align">
        				<li class="col l2"><a href="index.php">Home</a></li>
        				<li class="col l2"><a href="#!" class="dropdown-button" data-activates="events">Events</a></li>
        				<li class="col l2"><a id="drop1" class="dropdown-button" href="#!" data-activates="initiatives">Initiatives</a></li>
        				<li class="col l2"><a id="drop2" class="dropdown-button" href="#!" data-activates="publications" style="min-width: 100; margin-left: 0;">Publications</a></li>
        				<li class="col l2"><a href="team.php">The&nbspTeam</a></li>
        				<li class="col l2"><a id="drop3" class="dropdown-button" href="#!" data-activates="sponsors">Sponsors</a></li> 
					</ul>
				</div>
				
				<!-- The side menu bar for mobile devices -->
      			<ul id="mobile-demo" class="side-nav">        
        			<li><a href="index.php">Home</a></li>
        			<!-- Events -->
        			<li class="no-padding">
          				<ul class="collapsible collapsible-accordion">
            			<li><a class="collapsible-header">Events<i class="mdi-navigation-arrow-drop-down"></i></a>
             			<div class="collapsible-body">
                		<ul>
                  			<li><a href="aam.php">Annual Alumni Meet</a></li>
                  			<li><a href="homecoming.php">Homecoming</a></li>
                  			<li><a href="sam.php">Student Alumni Meet</a></li>
                  			<li><a href="sam.php">Phonathon</a></li>
                  			<li><a href="alumnitalks.php">Alumni Talks</a></li>
                  			<li><a href="leadershipsummit.php">Leadership Summit</a></li>
                  			<li><a href="alvida.php">Alvida</a></li>
                		</ul>
    		  			</div>
    					</li>
    	    			</ul>
    				</li>
    				<!-- Initiatives -->
        			<li class="no-padding">
          				<ul class="collapsible collapsible-accordion">
            			<li><a class="collapsible-header">Initiatives<i class="mdi-navigation-arrow-drop-down"></i></a>
              					<div class="collapsible-body">
                				<ul>
                  					<li><a href="mentorship.php">Mentorship Program</a></li>
                  					<li><a href="imprint.php">My Imprint</a></li>
                  					<li><a href="sparc.php">SPARC</a></li>
                  					<li><a href="acap.php">ACAP</a></li>
                  					<li><a href="https://medium.com/@studentsalumnicell.iitkgp" target="_blank">Alumni Blog</a></li>
                				</ul>
              					</div>
            			</li>
        				</ul>
        			</li>
        			<!-- Publications -->
        			<li class="no-padding">
          				<ul class="collapsible collapsible-accordion">
           				<li><a class="collapsible-header" >Publications<i class="mdi-navigation-arrow-drop-down"></i></a>
              			<div class="collapsible-body">
                		<ul>
                  			<li><a href="yearbook.php">Yearbook</a></li>
                  			<li><a href="yoy.php">Yearnings of Yore</a></li>
                  			<li><a href="temposhout_final_6.pdf" target="_blank">Tempo Shout</a></li> 
                		</ul>
              			</div>
          				</li>
           				</ul>
        			</li>
       				<li><a href="team.php">The Team</a></li>
       				<!-- Sponsors -->
       				<li class="no-padding">
          				<ul class="collapsible collapsible-accordion">
            			<li><a class="collapsible-header">Our Sponsors<i class="mdi-navigation-arrow-drop-down"></i></a>
              			<div class="collapsible-body">
                		<ul>
   							<li><a href="sponsors2018.php">2018</a></li>
    						<li><a href="sponsors2017.php">2017</a></li>
    						<li><a href="sponsors2016.php">2016</a></li>
    						<li><a href="sponsors2015.php">2015</a></li>
    						<li><a href="sponsors2014.php">2014</a></li>
    						<li><a href="sponsors2013.php">2013</a></li>
    						<li><a href="sponsors2012.php">2012</a></li>
                		</ul>
              			</div>
          				</li>
          				</ul>
       				</li>
      			</ul>
    		</div>
  		</nav>
	</div>

 	<!--Carousel-->
	<div class="slider"  style="overflow: hidden;">
		<ul class="slides">
    	<li><img id="img1" src="img/indexslider/sac-logo.jpg"/></li>
    	<li><img src="img/indexslider/aam_2019.jpg" /></li>
    	<li><img src="img/indexslider/acap.jpg" width="100%"/></li>
    	<li><img src="img/indexslider/sam4.jpg" /></li>
    	<li><img src="img/indexslider/mentorship1.jpg"/></li>
   		<li><img src="img/indexslider/phonathon1.jpg" /></li>
   		<li><img src="img/indexslider/guest.jpg"/></li>
 		<li><img src="img/indexslider/imprint.jpg"/></li>
		<li><img src="img/indexslider/yoy1.jpg"/></li>
		<li><img src="img/indexslider/alvida.jpg"/></li>
		<li><img src="img/indexslider/convo.jpg"/></li>
		</ul>
	</div>
	<!--Carousel over-->

  	<div class="row"><div class="heading"><center><h class="subheading"><b>About Us</b></h></center></div></div> 
  	<!-- First row conatining : (1)Recent events (2)About us (3)Fb feed --> 
  	<div class="row" style="min-height: 400px">
  		<!-- Recent events -->
       	<div class="col l3 eventscol" style="margin-top: 1em;">
          	<!-- Timer -->
          	<div class="row z-depth-1" style="background-color: white">            
          		<div id="clockdiv" style="background-color:white; padding:5px;">            
            		<div><span class="days" id="day"></span><div class="smalltext">DAYS</div></div>
            		<div><span class="hours" id="hour"></span><div class="smalltext">HOURS</div></div>
            		<div><span class="minutes" id="minute"></span><div class="smalltext">MINUTES</div></div>
            		<div><span class="seconds" id="second"></span><div class="smalltext">SECONDS</div></div>
            		<br>
            		<p style="font-size:19;color: #64bae4">Annual Alumni Meet 2019</p>            
          		</div>
          	</div>
          	<br><br>
          	<div class="row z-depth-1" id="mholder data" style="background-color: white;height:180px;overflow:scroll;padding:5px;margin-top:-13.5%;overflow:  hidden;">
            	<div class="row"">
              		<div class="card horizontal marqueeElement" style="font-size: 14px;margin-top: -5%" >
              			<div class="card-stacked">
                  			<div class="card-image col l4" style="margin-top: -2%">
                  				<center><br><font size="5" style="margin-left: -1%"><b>AUG<br>6</b></font><br></center>
                  			</div>                
                  			<div class="card-content col l8" style="border-bottom: unset;;margin-bottom: -4%">
                  				<p>The 16th Annual Alumni Meet registrations are open now. <a href="https://sac.iitkgp.ac.in/aam.php">Register here.</a></p>
                  			</div>                  
                		</div>
              		</div>
            	</div>
            	<div class="row">
              		<div class="card horizontal marqueeElement" style="font-size: 14px;margin-top: -6%">
                		<div class="card-image col l4" style="margin-top: -2%">
                			<center><br><font size="5" style="margin-left: -1%"><b>AUG <br> 23</b></font><br><br><br></center>
                		</div>
                		<div class="card-stacked col l8">
                			<div class="card-content" style="border-bottom: unset;margin-left: -6%">
                  				<p>Kerela is in great need of help . Please <a href="http://alumni.iitkgp.ac.in/Alumniweb/GoThroughCampaign/?camp_id=19&purpose=readmore" target="_blank">donate here</a> as an alumnus.</p>
                			</div>                  
                		</div>
              		</div>
            	</div>
           	</div>
       	</div>
       	<!-- About us -->
       	<div class="col l6"> 
        	<div style="background-color: white;">
          		<p class="z-depth-1 text_align" style="font-size: 16px;padding: 1.9em 2.3em">
            		The Students' Alumni Cell, IIT Kharagpur is a voluntary student body working under the aegis 
            		of the Dean of Alumni Affairs and International Relations. It strives to bridge the gap between 
            		IIT Kharagpur and its esteemed alumni community.<br>
            		<br>
            		The Students' Alumni Cell continuously endeavours to strengthen the relations of 
            		the alumni of this Institute and their alma mater. 
            		It has been instrumental in organising the Annual Alumni Meet, Regional Student Alumni Meet, 
            		regular guest lectures by distinguished alumni in the campus, publishing the annual 
            		literary magazine (Yearnings of Yore) & the annual yearbook.  
            		The Students' Alumni Cell also operates the Student - Alumni Mentorship Programme, My Imprint
            		(Giving Back - Alumni contribution) and organises Alvida (the annual farewell dinner).
          		</p>
        	</div>
       	</div>
       	<!-- FB Feed -->
       	<div class="col l3" style="margin-top: 1em;height:450px">
        		<div id="fbplug" style="background-color: #fff" class="z-depth-1 fb-page" data-href="https://www.facebook.com/iitkgp.alumnicell/?fref=ts" data-tabs="timeline" data-height="347px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        			<blockquote cite="https://www.facebook.com/iitkgp.alumnicell/?fref=ts" class="fb-xfbml-parse-ignore">
        				<a href="https://www.facebook.com/iitkgp.alumnicell/?fref=ts">Alumni Cell, IIT Kharagpur</a>
        			</blockquote>
        		</div>
       	</div>
  	</div>
  	
  	<div class="row" style="width:100%;">
  		<div class="heading"><center><h class="subheading"><b>What We Do</b></h></center>
    	</div>
    </div>

    <!-- Second Row begins here -->
    <div class="row" style="margin:auto;width:90%;">
      	<div class="col l4 s12 m4">
        	<div class="card z-depth-0 _card">
          		<div class="card-image waves-effect waves-block waves-light">
            		<img class="activator" width="300px" src="img/alumni.jpg">
          		</div>
          		<div class="card-content">
            		<span class="card-title activator grey-text text-darken-4">For Alumni<i class="material-icons right">more_vert</i></span>
          		</div>
         		<div class="card-reveal">
            		<span class="card-title grey-text text-darken-4">For Alumni<i class="material-icons right">close</i></span>
            		<p class="text_align">The Students' Alumni Cell works towards ensuring mutual benefit of the Students as 
              			well as the Alumni. The Cell helps the alumni in staying connected to their alma mater. 
              			Through regular interactions with the students, the alumni get a chance to share their 
              			experiences and impart the knowledge they have acquired to the next generation of KGPians.
            			Also, with this interchange, they get a glimpse of the young minds of the nation.</p>
          		</div>
        	</div>
      	</div>
      	<div class="col l4 s12 m4">
        	<div class="card z-depth-0 _card">
          		<div class="card-image waves-effect waves-block waves-light">
            		<img class="activator" src="img/insti.jpg">
          		</div>
          		<div class="card-content">
            		<span class="card-title activator grey-text text-darken-4">For Institute<i class="material-icons right">more_vert</i></span>
          		</div>
          		<div class="card-reveal">
            		<span class="card-title grey-text text-darken-4">For Institute<i class="material-icons right">close</i></span>
            		<p class="text_align">The alumni community often takes keen interest in the Institute&#8217;s workings and the prevalent conditions. Students' Alumni Cell reconnects the Institute and alumni, providing the alumni with an avenue to give back to their alma mater. The Institution Development Programme (IDP) aims to promote the Institute's domestic ranking while simultaneously improving the international stature. </p>
          		</div>
        	</div>
      	</div>
      	<div class="col l4 s12 m4">
        	<div class="card z-depth-0 _card">
          		<div class="card-image waves-effect waves-block waves-light">
            		<img class="activator" src="img/students.jpg">
          		</div>
          		<div class="card-content">
            		<span class="card-title activator grey-text text-darken-4">For Students<i class="material-icons right">more_vert</i></span>
          		</div>
          		<div class="card-reveal">
            		<span class="card-title grey-text text-darken-4">For Students<i class="material-icons right">close</i></span>
            		<p class="text_align">Students' Alumni Cell works in conjunction with the student administration bodies and 
              		is therefore constantly in touch with the needs and wants of the students. It connects the students
              		with the alumni, giving them a chance to interact with some of the most eminent personalities 
              		in all fields of work. It works towards making their learning experience more holistic.</p>
          		</div>      
       		</div>
     	</div>
    </div>
  	
	
  	<head>
    	<link rel="stylesheet" href="css/social_icon.css">
    	<link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet"> 
    	<style>
       		@media only screen and (max-width: 992px){
            	#map{
               		display: none;
            	}
            	#social_icon{
            	padding-left: 4em;
               	}
        	}
    	</style>
  	</head>

  	<div class="_footer">
		<footer class="page-footer black">
    		<div class="row">
      			<div class="col m10 l4">                
                	<p class="grey-text text-lighten-4 text_align" style="padding-left: 1em">Office of Alumni Affairs & International Relations,<br>
                  	Indian Institute of Technology, Kharagpur<br>
                    Pin-721302, West Bengal, India<br>
                    Ph: 03222-282236 <br>
                    Email: aao@hijli.iitkgp.ernet.in
                	</p>
        		</div>
        		<div id="map" class=" col l4"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d784.9332419499943
        		!2d87.30956309721707!3d22.3193820950838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a63547376e5
        		c22c!2sMain+Building+IIT+KGP!5e0!3m2!1sen!2sin!4v1471677047994" width="400" height="180" frameborder="0" style="border:0" allowfullscreen></iframe>
        		</div>
        		<div id="social_icons" class="col l4 m6 ac-soc">
            		<ul id="social_icon" class="soc">
               			<li style="color: white;">Connect with us on</li> <br>
                		<li><a class="soc-facebook" href="http://www.facebook.com/iitkgp.alumnicell?fref=ts&ref=br_tf" target="_blank"></a></li>
                		<li><a class="soc-twitter"  href="http://twitter.com/IITKgpAlumni" target="_blank"></a></li>
                		<li><a class="soc-linkedin"  href="https://www.linkedin.com/company-beta/13273135/" target="_blank"></a></li>
                		<li><a class="soc-youtube soc-icon" href="https://www.youtube.com/user/alumnicelliitkgp/videos" target="_blank"></a></li>
                		<li ><a class="socicon-instagram" href="https://www.instagram.com/sac.iitkgp/" target="_blank"  style="font-size: 30px; background-color: red; border-radius: 2000px; "></a></li>
            		</ul>
        		</div>
    		</div>
  			<div class="footer-copyright grey darken-3">
    			<div class="container">&copy; 2018 Students' Alumni Cell</div>
  			</div>
		</footer>
  	</div>

	<script type="text/javascript" src="js/style.js"></script>

	<!-- JS for carousel -->
	<script>
  		var autoScrollTimer = 2500;
  		var scrollspeed = 2000;
  		var v;
  		$(document).ready(function () {
  		$('#carousel').carousel({
      		time_constant: scrollspeed,
      		dist: 0,
      		shift: 0,
      		padding: 20,
      		full_width: false
   			});
    	autoScrollQuick();
    	initializeCarousel();
  		});
  		$('#carousel').mouseenter(function () {
    		stopScroll();
  		});
  		$('#carousel').mouseleave(function () {
    		autoScrollQuick();
  		});
  		function autoScroll() {
    		v = setInterval(next, autoScrollTimer);
  		}
  		function autoScrollQuick() {
    		setTimeout(next, 0);
    		autoScroll();
  		}
  		function stopScroll() {
    		clearInterval(v);
    		$('#carousel').carousel({
      			time_constant: 0
    		});
  		}
  		function next() {
    		$('#carousel').carousel('next');
  		}
  		function prev() {
    		$('#carousel').carousel('prev');
  		}
	</script>

	<!-- JS for cards -->
	<script type="text/javascript">
  		$(".card").mouseenter(function(e){
    		if ($(this).find('> .card-reveal').length) {
      			if ($(e.target).is($('.card .activator')) || $(e.target).is($('.card .activator i')) ) {
    				// Make Reveal animate up
    				$(this).find('.card-reveal').css({ display: 'block'}).velocity("stop", false).velocity({translateY: '-100%'}, {duration: 300, queue: false, easing: 'easeInOutQuad'});
  				}
			}
			$('.card-reveal').closest('.card').css('overflow', 'hidden');
		});
  		$(".card").mouseleave(function(){
  			// Make Reveal animate down and display none
  			$(this).find('.card-reveal').velocity({translateY: 0},{duration: 225,queue: false,easing: 'easeInOutQuad',complete: function() {
        			$(this).css({ display: 'none'});
      			}});
		});
	</script>
</body>
</html>

