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
    <li><a href="affinity.php">Affinity programme</a></li>
</ul>
<ul id="publications" class="dropdown-content" style="min-width: 200px;">
    <li><a href="yearbook.php">Yearbook</a></li>
    <li><a href="yoy.php">Yearnings of Yore</a></li>
    <li><a href="temposhout_final_6.pdf" target="_blank">Tempo Shout</a></li>
</ul>
<ul id="sponsors" class="dropdown-content" style="min-width: 200px;">
    <li><a href="sponsors2020.php">2020</a></li>
    <li><a href="sponsors2019.php">2019</a></li>
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
                                <li><a href="sponsors2019.php">2019</a></li>
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