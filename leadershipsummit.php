
<html>
<head>
<title>Leadership Summit</title>
<link rel="icon" href="img/meet_14.png">
  <link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">

   @media only screen and (min-width: 768px){
   .leader img {
      height: 240px;
    }
     .summit{
      padding: 10px 100px;
      text-align: justify;
    }
      .ac-summit img{
        margin-left: 80px;
    }
   } 
   @media only screen and (min-width: 600px) and (max-width: 800px){
      .card-image img{
        height:60vh;
      }
      .card{
        margin-left: -3%;
      }
      
    }
  @media only screen and (max-width: 468px){
   .ac-summit img{ 
      height: 30%;
      margin: 0px auto;
      max-width:100%;
    }
  } 
    .card-action{
      display: none;
    }
   .modal { width: 90% !important ; max-height: 85% !important }
</style>
    <script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });


      $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
    </script>
</head>
<body>
<div class="_wrapper">
<?php include 'navbar.php';?>
<div class="row ac-summit">
  <img src="img/summit1.jpg" width="100%" >  
</div>
<br>
    <div class="row" style="padding:0% 8% 0% 8%;">

        <div class="center-align" >
            <div class="col l12 m12 s12 z-depth-1" style="padding-top:1%">
                
                    <center>
                     <div class="heading ac-head" style="border:3px black solid; display: inline-block; padding-top: 2px; margin: 3px;padding-right: 20px;padding-left: 20px;" >
                           <h4><b>Leadership Summit</b></h4> </div>
                    </center> 
                
                
                <p class="summit text_align" style="padding:1% 10% 6% 10%;">
                    Leadership Summit, organized as a part of Guest Lectures, sees the participation of professionals and corporate tycoons sharing the same stage talking about their experiences and guiding the students to become future world leaders. With IIT Kharagpur’s best minds converging at the this event, we weave together complex, seemingly diverse thoughts into an intricate tapestry and provide a platform for them to share their experiences and guide students to become future world leaders. It helps the students to learn how to be effective leaders in their workplace and lifestyle helping them develop confidence and competence to lead others. The summit organized in 2013, 2014 and 2018 was appreciated by the students as well as alumni and witnessed huge turnout of the students.
                    </p>
            </div>
        </div>
    </div>
 <div class="container" style="width:100%;">
  <div class="row leader" style="margin:auto;width:90%;">
        <div class="col s12 m6 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/arunabhkumar.jpg">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <p>Arunabh Kumar</p> 
            </div>
            <div class="card-action">
           <a href="#"></a>   
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/arjunmalhotra.jpg">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <p>Arjun Malhotra</p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/anjanraichaudhuri.jpg">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <p>Anjan Rai Chaudhuri </p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
  </div>
  <div class="row leader" style="margin:auto;width:90%;">
        <div class="col s12 m6 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/gopalrajgarhia.jpg">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <p>Gopal Raj</p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/prasadrmenon.jpg">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <p>Prasad Menon</p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card z-depth-0 _card card1">
            <div class="card-image">
              <img src="img/leadership_speakers/sakyasinharoy.jpg">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <p>Sakya Sinha Roy</p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
          <!-- Modal Trigger -->
         <!-- <a class="waves-effect waves-black btn modal-trigger" href="#modal1">View More</a>
           Modal Structure 
          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Alumni</h4>
              <p>
              ***************************************************************************** Modal content *********************************************************************
        <div class="col s12 m4 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/arunabhkumar.jpg">
              <span class="card-title">Arunab Kumar</span>
            </div>
            <div class="card-content">
              <p></p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
        <div class="col s12 m7 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/arjunmalhotra.jpg">
              <span class="card-title">Arjun Malhotra</span>
            </div>
            <div class="card-content">
              <p> </p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
        <div class="col s12 m7 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/anjanraichaudhuri.jpg">
              <span class="card-title">Anjan Rai Chaudhuri</span>
            </div>
            <div class="card-content">
              <p></p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
  </div>
  <div class="row leader" style="margin:auto;width:90%;">
        <div class="col s12 m4 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/gopalrajgarhia.jpg">
              <span class="card-title">Gopal Raj</span>
            </div>
            <div class="card-content">
              <p></p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
        <div class="col s12 m7 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/prasadrmenon.jpg">
              <span class="card-title">Prasad Menon</span>
            </div>
            <div class="card-content">
              <p></p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
        <div class="col s12 m7 l4">
          <div class="card z-depth-0 _card">
            <div class="card-image">
              <img src="img/leadership_speakers/sakyasinharoy.jpg">
              <span class="card-title">Sakya Sinha Roy</span>
            </div>
            <div class="card-content">
              <p></p>
            </div>
            <div class="card-action">
              <a href="#"></a>
            </div>
          </div>
        </div>
           *****************************************************************************/ Modal content *********************************************************************  
              </p>
            </div>
            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
          </div> -->
  </div>
  </div>
  </div>
  <?php include 'footer.php';?>
<script type="text/javascript" src="js/style.js"></script>  
</body>
</html>


            
