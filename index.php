<html>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js" charset="utf-8"></script>
    <head>
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
        <title>Students Alumni Cell &middot; IIT Kharagpur</title>
        <link rel="icon" href="img/meet_14.png">
        <link rel="stylesheet" href="css/materialize.min.css">
        <script src="js/materialize.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">        
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
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=1066517953466827";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="_wrapper">
            <?php include 'navbar.php';?>
            <!--slider-->
            <div class="slider"  style="overflow: hidden;">
                <ul class="slides">
                    <li>
                        <img id="img1" src="img/indexslider/sac-logo.jpg"/>
                    </li>
                    <li>
                        <img src="img/indexslider/aam_2019.jpg" />
                    </li>
                    <li>
                        <img src="img/indexslider/acap.jpg" width="100%" />
                    </li>
                    <li>
                        <img src="img/indexslider/sam4.jpg" />
                    </li>
                    <li>
                        <img src="img/indexslider/mentorship1.jpg"/>
                    </li>
                    <li>
                        <img src="img/indexslider/phonathon1.jpg" />
                    </li>
                    <li>
                        <img src="img/indexslider/guest.jpg"/>
                    </li>
                    <li>
                        <img src="img/indexslider/imprint.jpg"/>
                    </li>
                    <li>
                        <img src="img/indexslider/yoy1.jpg"/>
                    </li>
                    <li>
                        <img src="img/indexslider/alvida.jpg"/>
                    </li>
                    <li>
                        <img src="img/indexslider/convo.jpg"/>
                    </li>
                </ul>
            </div>
            <!--sliderover-->
            <div>
                <!-- <div class="row">
                    <div class="heading">
                        <center>
                            <h class="subheading">
                                <b>About Us</b>
                            </h>
                        </center>
                    </div>                    
                </div> -->
                <div style="margin-top: 30px">
                    <div class="row" style="min-height: 400px">
                        <div class="col l3 eventscol" style="margin-top: 1em;">
                            <div class="row z-depth-1" style="background-color: white">
                                <div id="clockdiv" style="background-color:white; padding:5px;">
                                    <div>
                                        <span class="days" id="day"></span>
                                        <div class="smalltext">DAYS</div>
                                    </div>
                                    <div>
                                        <span class="hours" id="hour"></span>
                                        <div class="smalltext">HOURS</div>
                                    </div>
                                    <div>
                                        <span class="minutes" id="minute"></span>
                                        <div class="smalltext">MINUTES</div>
                                    </div>
                                    <div>
                                        <span class="seconds" id="second"></span>
                                        <div class="smalltext">SECONDS</div>
                                    </div>
                                    <br>                                    
                                </div>
                                <center><b><p style="font-size:19;color: #64bae4">Annual Alumni Meet 2019</p></b></center>
                            </div>                            
                            <div class="row z-depth-1" style="background-color: white"><center><p style="font-size:25;color: black"><b>Notice Board</b></p></center></div>
                            <br>                                                    
                            <div class="row z-depth-1 marquee" id="mholder data" style="background-color: white;height:250px;overflow:hidden;padding:5px;margin-top:-13.5%;overflow:  hidden;">
                                <div class="row">
                                    <div class="card horizontal marqueeElement" style="font-size: 14px;margin-top: -5%" >
                                        <div class="card-stacked">
                                            <div class="card-image col l4" style="margin-top: -2%">
                                                <center>
                                                    <br><font size="5" style="margin-left: -1%"><b>OCT<br>23</b></font><br>
                                                </center>
                                            </div>
                                            <div class="card-content col l8" style="border-bottom: unset;;margin-bottom: -4%">
                                                <p>We are recruiting Freshers for the post of Associates. <a href="firstYrReg.php">Register here.</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card horizontal marqueeElement" style="font-size: 14px;margin-top: -5%" >
                                        <div class="card-stacked">
                                            <div class="card-image col l4" style="margin-top: -2%">
                                                <center>
                                                    <br><font size="5" style="margin-left: -1%"><b>OCT<br>23</b></font><br>
                                                </center>
                                            </div>
                                            <div class="card-content col l8" style="border-bottom: unset;;margin-bottom: -4%">
                                                <p>Students Alumni Meet - Kolkata '18 : Registrations are open now. <a href="samReg.php">Register here.</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card horizontal marqueeElement" style="font-size: 14px">
                                        <div class="card-image col l4" style="margin-top: 2%">
                                            <center>
                                                <br><font size="5" style="margin-left: -1%"><b>SEP<br>30</b></font><br>
                                                <br><br>
                                            </center>
                                        </div>
                                        <div class="card-stacked col l8" >
                                            <div class="card-content" style="border-bottom: unset;margin-left: -6%;margin-top:4%">
                                                <p>Register for the Alumni Career Assistance Programme <a href="acap.php">here</a>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="card horizontal marqueeElement" style="font-size: 14px;margin-top: -6%">
                                        <div class="card-image col l4" style="margin-top: -2%">
                                            <center>
                                                <br><font size="5" style="margin-left: -1%"><b>AUG<br>23</b></font><br>
                                            </center>
                                        </div>
                                        <div class="card-stacked col l8">
                                            <div class="card-content" style="border-bottom: unset;margin-left: -6%">
                                                <p>Kerela is in great need of help . Please <a href="http://alumni.iitkgp.ac.in/Alumniweb/GoThroughCampaign/?camp_id=19&purpose=readmore" target="_blank">donate here</a> as an alumnus.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card horizontal marqueeElement" style="font-size: 14px;margin-top: -5%" >
                                        <div class="card-stacked">
                                            <div class="card-image col l4" style="margin-top: -2%">
                                                <center>
                                                    <br><font size="5" style="margin-left: -1%"><b>AUG<br>6</b></font><br>
                                                </center>
                                            </div>
                                            <div class="card-content col l8" style="border-bottom: unset;;margin-bottom: -4%">
                                                <p>The 16th Annual Alumni Meet registrations are open now. <a href="aam.php">Register here.</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="col l6" style="margin-top: 10px">
                            <div class="heading">
                                <center><h class="subheading"><b>About Us</b></h></center>
                            </div>
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
                        <div class="col l3" style="margin-top: 1em;height:450px">
                            <div id="fbplug" style="background-color: #fff" class="z-depth-1 fb-page" data-href="https://www.facebook.com/iitkgp.alumnicell/?fref=ts" data-tabs="timeline" data-height="490px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" style="height: 450px">
                                <blockquote cite="https://www.facebook.com/iitkgp.alumnicell/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/iitkgp.alumnicell/?fref=ts">Alumni Cell, IIT Kharagpur</a></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wwd" style="width:100%;">
                <div class="heading">
                    <center>
                        <h class="subheading"><b>What We Do</b></h>
                    </center>
                </div>
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
                                    Also, with this interchange, they get a glimpse of the young minds of the nation.
                                </p>
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
                                    in all fields of work. It works towards making their learning experience more holistic.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <?php include 'footer.php';?>
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
            $('.marquee').marquee({
              //speed in milliseconds of the marquee
              duration: 9000,
              //gap in pixels between the tickers
              gap: 0,
              //time in milliseconds before the marquee will start animating
              delayBeforeStart: 0,
              //'left' or 'right'
              direction: 'up',
              //true or false - should the marquee be duplicated to show an effect of continues flow
              duplicated: true,
              pauseOnHover: true
            });
        </script>
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
              $(this).find('.card-reveal').velocity(
                {translateY: 0},
                {
                  duration: 225,
                  queue: false,
                  easing: 'easeInOutQuad',
                  complete: function() {
                    $(this).css({ display: 'none'});
                  }
                });
              });
        </script>
    </body>
</html>