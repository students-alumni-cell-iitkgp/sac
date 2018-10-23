<html>
    <head>
        <title>Student Alumni Meet, Kolkata '18</title>
        <link rel="icon" href="img/meet_14.png">
        <link rel="stylesheet" href="css/materialize.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <script>
            $(document).ready(function(){
            if ($(window).width()>992) {
             (function($){ $('#logo').show();
               var $navbar= $('#nav'),
               y_pos =$navbar.offset().top,
               height = $navbar.height();
               $('#logo').hide();$navbar.addClass("navbar-fixed");$('.brand-logo').show(); $('.hide-on-med-and-down').addClass('right'); 
             
              
             })(jQuery, undefined); }
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
        <style>  @media only screen and (max-width: 992px){
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
            left:85%;
            }
            /*Size of brand logo at different pixel view*/
            nav .brand-logo img{
            width:120px;
            height:60px;
            padding-top:20px; 
            }
            }
            @media only screen and (max-width: 400px){
            nav .brand-logo {
            top:-2px;
            left:85%;
            }
            nav .brand-logo img{
            width:100px;
            height:50px;
            padding-top:10px;
            }
            }
            @media only screen and (max-width: 330px){
            nav .brand-logo {
            top: -2 px; 
            left:78%;
            }
            }
            .dropdown-content li {
            text-align: center !important;
            }
        </style>
        <div class="row" id="logo" style="background-color: white; margin-bottom: 0px; display: none;">
            <div class="col l12 m12 s12 center-align"><img style=" width:200px;" src="img/logo/sac_logo.png">
            </div>
        </div>
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
                        <li></li>
                    </ul>
                </div>
                <ul id="mobile-demo" class="side-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Events<i class="mdi-navigation-arrow-drop-down"></i></a>
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
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Initiatives<i class="mdi-navigation-arrow-drop-down"></i></a>
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
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header" >Publications<i class="mdi-navigation-arrow-drop-down"></i></a>
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
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Our Sponsors<i class="mdi-navigation-arrow-drop-down"></i></a>
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
        </nav>
        </div>          
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
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeZGBpFUUQNUIm2ryBRlgGuUJF1zlue2zo4SRnq6jP7LpxCiA/viewform" width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
            <head>
                <link rel="stylesheet" href="css/social_icon.css">
                <style>
                    #social_icon{
                    padding-left: 2em;
                    }
                    @media only screen and (max-width: 992px){
                    #map{
                    display: none;
                    }
                    #address{
                    font-size:3.7vw;
                    }
                    #social_icons{
                    font-size:3.7vw;
                    }
                    .soc li a{
                    width: 10vw;
                    height: 10vw;
                    line-height: 10vw;
                    font-size: 6vw;
                    }
                    #social_icon{
                    padding-left: -0.2em;
                    }
                    #connect-template{
                    padding-top: 5vw;
                    padding-left: 15vw;
                    }
                    }
                </style>
                <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">
            </head>
            <div class="_footer">
            <footer class="page-footer black">
                <div class="row">
                    <div class="col m10 l4">                        
                        <p class="grey-text text-lighten-4 text_align" id="address" style="padding-left: 1em">Office of Alumni Affairs & International Relations,<br>
                            Indian Institute of Technology, Kharagpur<br>
                            Pin-721302, West Bengal, India<br>
                            Ph: 03222-282236 <br>
                            Email: aao@hijli.iitkgp.ernet.in
                        </p>
                    </div>
                    <div id="map" class=" col l4"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d784.9332419499943!2d87.30956309721707!3d22.3193820950838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a63547376e5c22c!2sMain+Building+IIT+KGP!5e0!3m2!1sen!2sin!4v1471677047994" width="400" height="180" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div id="social_icons" class="col l4 m6 ac-soc">
                        <ul id="social_icon" class="soc">
                            <li style="color: white;" id="connect-template">Connect with us on</li>
                            <br>
                            <li><a class="soc-facebook" href="http://www.facebook.com/iitkgp.alumnicell?fref=ts&ref=br_tf" target="_blank"></a></li>
                            <li><a class="soc-twitter"  href="http://twitter.com/IITKgpAlumni" target="_blank"></a></li>
                            <li><a class="soc-linkedin"  href="https://www.linkedin.com/company-beta/13273135/" target="_blank"></a></li>
                            <li><a class="soc-youtube soc-icon" href="https://www.youtube.com/user/alumnicelliitkgp/videos" target="_blank"></a></li>
                            <li ><a class="socicon-instagram" href="https://www.instagram.com/sac.iitkgp/" target="_blank"  style="font-size: 30px; background-color: red; border-radius: 2000px; "></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-copyright grey darken-3">
                    <div class="container">
                        &copy; 2018 Students' Alumni Cell
                    </div>
            </footer>
            </div>
            <script type="text/javascript" src="js/style.js"></script>
    </body>
</html>